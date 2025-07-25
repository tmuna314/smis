<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    
    public function index()
    {
        $batches = Batch::all();  
        return view('batch.index', compact('batches')); 
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('batch.create', compact('faculties'));
    }
    

   
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'boolean',
            'faculty_id' => 'nullable|exists:faculties,id',
        ]);

        
        Batch::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? true,
            'created_by' => Auth::id(),
            'faculty_id' => $request->faculty_id,
        ]);

        return redirect()->route('batch.index')->with('success', 'Batch added successfully!');
    }

    
    public function edit($id)
    {
        $batch = Batch::findOrFail($id);
        $faculties = Faculty::all();
        return view('batch.edit', compact('batch', 'faculties'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'boolean',
            'faculty_id' => 'nullable|exists:faculties,id',
        ]);

        $batch = Batch::findOrFail($id);  
        $batch->update([
            'name' => $request->name,
            'is_active' => $request->is_active ?? true,
            'faculty_id' => $request->faculty_id,
        ]);

       
        return redirect()->route('batch.index')->with('success', 'Batch updated successfully!');
    }

    
    public function destroy($id)
    {
        Batch::destroy($id);  
        return back()->with('success', 'Batch deleted!');
    }

  
    public function show($id)
    { 
        $batch = Batch::findOrFail($id); 
        return view('batch.show', compact('batch'));  
    }
}

