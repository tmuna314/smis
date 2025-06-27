<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Faculty;
use App\Models\Batch;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();
        $batches = Batch::all();
        $subjects = Subject::all();
        return view('subject.create', compact('faculties', 'batches', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
            'batch_id' => 'required|exists:batches,id',
            'subject_name' => 'required|string|max:255',
        ]);
        Subject::create($request->only('class', 'faculty_id', 'batch_id', 'subject_name'));
        return redirect()->route('subject.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view('subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $faculties = Faculty::all();
        $batches = Batch::all();
        return view('subject.edit', compact('subject', 'faculties', 'batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'class' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
            'batch_id' => 'required|exists:batches,id',
            'subject_name' => 'required|string|max:255',
        ]);
        $subject->update($request->only('class', 'faculty_id', 'batch_id', 'subject_name'));
        return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }
}
