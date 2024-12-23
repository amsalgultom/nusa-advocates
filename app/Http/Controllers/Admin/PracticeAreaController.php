<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class PracticeAreaController extends Controller
{
     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = PracticeArea::select('*');
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $id = $row->id;
                     $btn = '<a class="btn btn-warning" href="' . route("practice.edit", $id) . '"><i class="bi bi-exclamation-square-fill"></i></a>&nbsp; <button class="btn btn-danger delete-item" data-id="' . $id . '"><i class="bi bi-trash-fill"></i></button>';
                     return $btn;
                 })
                 ->make(true);
         }
         return view('admin.practice.index');
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('admin.practice.create');
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

             $request->merge([
                'created_by' => Auth::user()->name
            ]);
 
             PracticeArea::create($request->all());
             return redirect()->route('practice.index')->with('success', 'Created New PracticeArea Successfully.');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while create the practice.');
        }     
    }
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(PracticeArea $practice)
     {
         return view('admin.practice.edit', compact('practice'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, PracticeArea $practice)
     {
         try {
             $request->validate([
                'name' => 'required'
             ]);
             // Handle image upload
             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('public/practice', $imageName);
                 // You can also update the image path in the database if needed
                 if (Storage::exists('public/practice/' . $practice->image)) {
                     Storage::delete('public/practice/' . $practice->image);
                 }
 
                 $practice->image = $imageName;
             }

             $request->merge([
                 'updated_by' => Auth::user()->name
             ]);
 
             $practice->update($request->except('image'));
 
             return redirect()->route('practice.index')->with('success', 'Updated PracticeArea Successfully.');
         } catch (\Exception $e) {
             return redirect()->back()->with('error', 'An error occurred while update the PracticeArea.');
         }
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function delete(Request $request)
     {
         try {
             $id = $request->itemID;
             $record = PracticeArea::find($id);
 
             if (Storage::exists('public/practice/' . $record->image)) {
                 Storage::delete('public/practice/' . $record->image);
             }
             
             $record->delete();
 
             return response()->json(['status' => 'success', 'message' => 'PracticeArea deleted successfully']);
         } catch (\Exception $e) {
             return response()->json(['status' => 'failed', 'message' => 'PracticeArea deleted failed']);
         }
     }
}
