<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LoggerService;
use App\Models\Lawyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class LawyerController extends Controller
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
             $data = Lawyer::select('*');
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $id = $row->id;
                     $btn = '<a class="btn btn-warning" href="' . route("lawyer.edit", $id) . '"><i class="bi bi-exclamation-square-fill"></i></a>&nbsp; <button class="btn btn-danger delete-item" data-id="' . $id . '"><i class="bi bi-trash-fill"></i></button>';
                     return $btn;
                 })
                 ->addColumn('image', function ($row) {
                     // Assuming 'image' is the field containing the image path or URL
                     $imagePath = $row->image;
                     $imgTag = '<img src="' . asset('storage/lawyer') . '/' . $imagePath . '" alt="Franchise Image" width="200" height="200">';
                     return $imgTag;
                 })
                 ->rawColumns(['action', 'image'])
                 ->make(true);
         }
         return view('admin.lawyer.index');
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('admin.lawyer.create');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         try {
             $request->validate([
                 'name' => 'required'
             ]);
 
             // Handle image upload
             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('public/lawyer', $imageName);
                 // You can also store the image path in the database if needed
             }

             $request->merge([
                'created_by' => Auth::user()->name
            ]);
 
             Lawyer::create($request->except('image') + ['image' => $imageName ?? null]);
             return redirect()->route('lawyer.index')->with('success', 'Created New Franchise Successfully.');
         } catch (\Exception $e) {
             //send to log provider
             $message = $e->getMessage();
             $this->logger->logMessage($message);
 
             return redirect()->back()->with('error', 'An error occurred while create the lawyer.');
         }
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Lawyer $lawyer)
     {
         return view('admin.lawyer.edit', compact('lawyer'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, Lawyer $lawyer)
     {
         try {
             $request->validate([
                'name' => 'required'
             ]);
             // Handle image upload
             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('public/lawyer', $imageName);
                 // You can also update the image path in the database if needed
                 if (Storage::exists('public/lawyer/' . $lawyer->image)) {
                     Storage::delete('public/lawyer/' . $lawyer->image);
                 }
 
                 $lawyer->image = $imageName;
             }

             $request->merge([
                 'updated_by' => Auth::user()->name
             ]);
 
             $lawyer->update($request->except('image'));
 
             return redirect()->route('lawyer.index')->with('success', 'Updated Franchise Successfully.');
         } catch (\Exception $e) {
             //send to log provider
             $message = $e->getMessage();
             $this->logger->logMessage($message);
 
             return redirect()->back()->with('error', 'An error occurred while update the Franchise.');
         }
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function delete(Request $request)
     {
         try {
             $id = $request->itemID;
             $record = Lawyer::find($id);
 
             if (Storage::exists('public/lawyer/' . $record->image)) {
                 Storage::delete('public/lawyer/' . $record->image);
             }
             
             $record->delete();
 
             return response()->json(['status' => 'success', 'message' => 'Franchise deleted successfully']);
         } catch (\Exception $e) {
             $this->logger->logMessage($e->getMessage());
             return response()->json(['status' => 'failed', 'message' => 'Franchise deleted failed']);
         }
     }
}
