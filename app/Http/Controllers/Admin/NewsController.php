<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\LoggerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    protected $logger;

    public function __construct(LoggerService $logger)
    {
        $this->logger = $logger;
    }
    
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = News::select('*');
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $id = $row->id;
                     $btn = '<a class="btn btn-warning" href="' . route("news.edit", $id) . '"><i class="bi bi-exclamation-square-fill"></i></a>&nbsp; <button class="btn btn-danger delete-item" data-id="' . $id . '"><i class="bi bi-trash-fill"></i></button>';
                     return $btn;
                 })
                 ->addColumn('image', function ($row) {
                     // Assuming 'image' is the field containing the image path or URL
                     $imagePath = $row->image;
                     $imgTag = '<img src="' . asset('storage/news') . '/' . $imagePath . '" alt="News Image" width="200" height="200">';
                     return $imgTag;
                 })
                 ->rawColumns(['action', 'image'])
                 ->make(true);
         }
         return view('admin.news.index');
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('admin.news.create');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         try {
             $request->validate([
                 'title' => 'required',
                 'short_desc' => 'required',
                 'date' => 'required',
                 'slug' => 'required',
             ]);
 
             // Handle image upload
             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $imageName = time() . '-' . $request->title . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('public/news', $imageName);
                 // You can also store the image path in the database if needed
             }

             $request->merge([
                'created_by' => Auth::user()->name
            ]);
 
             News::create($request->except('image') + ['image' => $imageName ?? null]);
             return redirect()->route('news.index')->with('success', 'Created New News Successfully.');
         } catch (\Exception $e) {
             //send to log provider
             $message = $e->getMessage();
             $this->logger->logMessage($message);
 
             return redirect()->back()->with('error', 'An error occurred while create the news.');
         }
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(News $news)
     {
         return view('admin.news.edit', compact('news'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, News $news)
     {
         try {
             $request->validate([
                'title' => 'required',
                'short_desc' => 'required',
                'date' => 'required',
                'slug' => 'required',
             ]);
             // Handle image upload
             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $imageName = time() . '-' . $request->title . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('public/news', $imageName);
                 // You can also update the image path in the database if needed
                 if (Storage::exists('public/news/' . $news->image)) {
                     Storage::delete('public/news/' . $news->image);
                 }
 
                 $news->image = $imageName;
             }
 
             $request->merge([
                 'updated_by' => Auth::user()->name
             ]);
 
             $news->update($request->except('image'));
 
             return redirect()->route('news.index')->with('success', 'Updated News Successfully.');
         } catch (\Exception $e) {
             //send to log provider
             $message = $e->getMessage();
             $this->logger->logMessage($message);
 
             return redirect()->back()->with('error', 'An error occurred while update the News.');
         }
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function delete(Request $request)
     {
         try {
             $id = $request->itemID;
             $record = News::find($id);
 
             if (Storage::exists('public/news/' . $record->image)) {
                 Storage::delete('public/news/' . $record->image);
             }
             
             $record->delete();
 
             return response()->json(['status' => 'success', 'message' => 'News deleted successfully']);
         } catch (\Exception $e) {
             $this->logger->logMessage($e->getMessage());
             return response()->json(['status' => 'failed', 'message' => 'News deleted failed']);
         }
     }
}
