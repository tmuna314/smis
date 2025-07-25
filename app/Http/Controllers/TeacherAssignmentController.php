<?php

namespace App\Http\Controllers;
use App\Models\TeacherAssignment;
use Illuminate\Http\Request;

class TeacherAssignmentController extends Controller
{
    public function index()
    {
        $teacherAssignments = \App\Models\TeacherAssignment::all();
        return view('teacher_assignments.index', compact('teacherAssignments'));
    }
    

    public function create()
    {
        return view('teacher_assignments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required',
            'batch_id' => 'required',
            'semester_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'is_active' => 'required|boolean',
        ]);

        TeacherAssignment::create($request->all());

        return redirect()->route('teacher_assignments.index')->with('success', 'Assignment created.');
    }

    public function show(TeacherAssignment $teacherAssignment)
    {
        return view('teacher_assignments.show', compact('teacherAssignment'));
    }

    public function edit(TeacherAssignment $teacherAssignment)
    {
        return view('teacher_assignments.edit', compact('teacherAssignment'));
    }

    public function update(Request $request, TeacherAssignment $teacherAssignment)
    {
        $request->validate([
            'faculty_id' => 'required',
            'batch_id' => 'required',
            'semester_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'is_active' => 'required|boolean',
        ]);

        $teacherAssignment->update($request->all());

        return redirect()->route('teacher_assignments.index')->with('success', 'Assignment updated.');
    }

    public function destroy(TeacherAssignment $teacherAssignment)
    {
        $teacherAssignment->delete();
        return redirect()->route('teacher_assignments.index')->with('success', 'Assignment deleted.');
    }
}
