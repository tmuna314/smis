<?php

namespace App\Http\Controllers;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
{
    $semesters = Semester::all();
    return view('semesters.index', compact('semesters'));
}

    public function create()
    {
        return view('semesters.create');
    }

    public function store(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'semester_name' => 'required|string|max:255',
    ]);

    // Save to database
    Semester::create([
        'semester_name' => $validated['semester_name'],
    ]);

    // Redirect or return response
    return redirect()->route('semesters.index')->with('success', 'Semester created successfully.');
}


    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        return view('semesters.edit', compact('semester'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'semester_name' => 'required|string|max:255',
            // other validations
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update($validated);

        return redirect()->route('semesters.index')->with('success', 'Semester updated successfully.');
    }

    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->route('semesters.index')->with('success', 'Semester deleted successfully.');
    }
}