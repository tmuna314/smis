<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the batches.
     */
    public function index()
    {
        $batches = Batch::all();
        return view('batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new batch.
     */
    public function create()
    {
        $faculties = \App\Models\Faculty::all();
        return view('batch.create', compact('faculties'));
    }

    /**
     * Store a newly created batch in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'faculty_id' => 'required|integer',
            'created_by' => 'nullable|string|max:255',
        ]);

        Batch::create($request->all());

        return redirect()->route('batch.index')->with('success', 'Batch created successfully.');
    }

    /**
     * Show the form for editing the specified batch.
     */
    public function edit(Batch $batch)
    {
        return view('batch.edit', compact('batch'));
    }

    /**
     * Update the specified batch in storage.
     */
    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'faculty_id' => 'required|integer',
            'created_by' => 'nullable|string|max:255',
        ]);

        $batch->update($request->all());

        return redirect()->route('batch.index')->with('success', 'Batch updated successfully.');
    }

    /**
     * Remove the specified batch from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batch.index')->with('success', 'Batch deleted successfully.');
    }
}
