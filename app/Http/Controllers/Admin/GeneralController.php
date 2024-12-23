<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\General;
use App\Services\LoggerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
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
             $data = General::select('*');
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $id = $row->id;
                     $btn = '<a class="btn btn-warning" href="' . route("general.edit", $id) . '"><i class="bi bi-exclamation-square-fill"></i></a>&nbsp; <button class="btn btn-danger delete-item" data-id="' . $id . '"><i class="bi bi-trash-fill"></i></button>';
                     return $btn;
                 })
                 ->addColumn('value_file', function ($row) {
                     // Assuming 'value_file' is the field containing the value_file path or URL
                     $value_filePath = $row->value_file;
                     $imgTag = '<a href="' . asset('storage/general') . '/' . $value_filePath . '"  target="_blank">File Upload Link</a>';
                     return $imgTag;
                 })
                 ->rawColumns(['action', 'value_file'])
                 ->make(true);
         }
         return view('admin.general.index');
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('admin.general.create');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         try {
             $request->validate([
                 'params' => 'required'
             ]);
 
             // Handle value_file upload
             if ($request->hasFile('value_file')) {
                 $value_file = $request->file('value_file');
                 $value_fileName = time() . '-' . $request->params . '.' . $value_file->getClientOriginalExtension();
                 $value_file->storeAs('public/general', $value_fileName);
                 // You can also store the value_file path in the database if needed
             }

             $request->merge([
                'created_by' => Auth::user()->name
            ]);
 
             General::create($request->except('value_file') + ['value_file' => $value_fileName ?? null]);
             return redirect()->route('general.index')->with('success', 'Created New General Successfully.');
         } catch (\Exception $e) {
             //send to log provider
             $message = $e->getMessage();
             $this->logger->logMessage($message);
 
             return redirect()->back()->with('error', 'An error occurred while create the general.');
         }
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(General $general)
     {
         return view('admin.general.edit', compact('general'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, General $general)
     {
         try {
             $request->validate([
                'params' => 'required'
             ]);
             // Handle value_file upload
             if ($request->hasFile('value_file')) {
                 $value_file = $request->file('value_file');
                 $value_fileName = time() . '-' . $request->params . '.' . $value_file->getClientOriginalExtension();
                 $value_file->storeAs('public/general', $value_fileName);
                 // You can also update the value_file path in the database if needed
                 if (Storage::exists('public/general/' . $general->value_file)) {
                     Storage::delete('public/general/' . $general->value_file);
                 }
 
                 $general->value_file = $value_fileName;
             }

             $request->merge([
                 'updated_by' => Auth::user()->name
             ]);
 
             $general->update($request->except('value_file'));
 
             return redirect()->route('general.index')->with('success', 'Updated General Successfully.');
         } catch (\Exception $e) {
             //send to log provider
             $message = $e->getMessage();
             $this->logger->logMessage($message);
 
             return redirect()->back()->with('error', 'An error occurred while update the General.');
         }
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function delete(Request $request)
     {
         try {
             $id = $request->itemID;
             $record = General::find($id);
 
             if (Storage::exists('public/general/' . $record->value_file)) {
                 Storage::delete('public/general/' . $record->value_file);
             }
             
             $record->delete();
 
             return response()->json(['status' => 'success', 'message' => 'General deleted successfully']);
         } catch (\Exception $e) {
             $this->logger->logMessage($e->getMessage());
             return response()->json(['status' => 'failed', 'message' => 'General deleted failed']);
         }
     }
}
