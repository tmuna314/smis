<?php

namespace App\Http\Controllers;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Show all subjects
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    // Show form to create a new subject
    public function create()
    {
        return view('subjects.create');
    }

    // Store a new subject
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'faculty_id' => 'required|integer',
            'batch_id' => 'required|integer',
        ]);

        Subject::create([
            'subject_name' => $request->subject_name,
            'class' => $request->class,
            'faculty_id' => $request->faculty_id,
            'batch_id' => $request->batch_id,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    // Show form to edit an existing subject
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    // Update subject
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'faculty_id' => 'required|integer',
            'batch_id' => 'required|integer',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'subject_name' => $request->subject_name,
            'class' => $request->class,
            'faculty_id' => $request->faculty_id,
            'batch_id' => $request->batch_id,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    // Delete subject
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}