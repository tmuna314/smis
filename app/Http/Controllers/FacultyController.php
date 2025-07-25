<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
   
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculty.index', compact('faculties'));
    }

    
    public function create()
    {
        return view('faculty.create');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'shortcode' => 'required|string|max:50',
            'affiliated_to' => 'required|string|max:100',
            'created_by' => 'required|string|max:100',
        ]);

        Faculty::create($validated);

        return redirect()->route('faculty.index')->with('success', 'Faculty created successfully.');
    }

   
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty.edit', compact('faculty'));
    }

    
    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'shortcode' => 'required|string|max:50',
            'affiliated_to' => 'required|string|max:100',
            'created_by' => 'required|string|max:100',
        ]);

        $faculty->update($validated);

        return redirect()->route('faculty.index')->with('success', 'Faculty updated successfully.');
    }

    
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();

        return redirect()->route('faculty.index')->with('success', 'Faculty deleted successfully.');
        return view('faculty.edit', compact('faculty'));

    }
}