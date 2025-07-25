<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;



class TeacherController extends Controller
{
    // Display a list of all teachers
    public function index()
    {
        $teachers = Teacher::all();  // Fetch all teachers from DB
        return view('teachers.index', compact('teachers'));
    }

    // Show the form to create a new teacher
    public function create()
    {
        return view('teachers.create');

    }
    

    // Save a new teacher to the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|integer',
            'subject' => 'required|string|max:100',
            'address' => 'required|string|max:50',
        ]);

        // Create teacher record
        Teacher::create($request->all());

        // Redirect after success
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
    }

    // Show a specific teacher by id
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    // Show form to edit a teacher
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    // Update teacher info
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|integer',
            'subject' => 'required|string|max:100',
            'address' => 'required|string|max:50',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    // Delete a teacher
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
