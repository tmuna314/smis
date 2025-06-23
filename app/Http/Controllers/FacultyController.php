<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view faculties')->only('index');
        $this->middleware('permission:create faculties')->only(['create', 'store']);
        $this->middleware('permission:edit faculties')->only(['edit', 'update']);
        $this->middleware('permission:delete faculties')->only('destroy');
    }
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculty.index', compact('faculties'));
    }

    // Show the form for creating a new faculty
    public function create()
    {
        return view('faculty.create');
    }

    // Store a newly created faculty in the database
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'shortcode' => 'required|string|max:10|unique:faculties,shortcode',
            'affiliated_to' => 'nullable|string|max:255',
            'created_by' => 'nullable|string|max:255', // This can still be validated if needed
        ]);

        // Create new faculty and manually set 'created_by' to a name (fixed or user input)
        Faculty::create([
            'name' => $request->name,
            'shortcode' => $request->shortcode,
            'affiliated_to' => $request->affiliated_to,
            'created_by' => $request->created_by ?? 'Default User', // If no 'created_by' input, use a default name
        ]);

        // Redirect to index with success message
        return redirect()->route('faculty.index')->with('success', 'Faculty created successfully.');
    }

    // Show the form for editing a faculty
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id); // Ensure the faculty exists
        return view('faculty.edit', compact('faculty'));
    }

    // Update the specified faculty in the database
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'shortcode' => 'required|string|max:10|unique:faculties,shortcode,' . $id,
            'affiliated_to' => 'nullable|string|max:255',
            'created_by' => 'nullable|string|max:255', // This can still be validated if needed
        ]);

        // Find and update faculty
        $faculty = Faculty::findOrFail($id); // Ensure the faculty exists
        $faculty->update([
            'name' => $request->name,
            'shortcode' => $request->shortcode,
            'affiliated_to' => $request->affiliated_to,
            'created_by' => $request->created_by ?? 'Default User', // Set default if not provided
        ]);

        // Redirect to index with success message
        return redirect()->route('faculty.index')->with('success', 'Faculty updated successfully.');
    }

    // Remove the specified faculty from the database
    public function destroy($id)
    {
        Faculty::findOrFail($id)->delete(); // Ensure the faculty exists
        return redirect()->route('faculty.index')->with('success', 'Faculty deleted successfully.');
    }
}
