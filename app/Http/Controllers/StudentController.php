<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    $students = Student::all();
    return view('student.index', compact('students'));
}

    public function create() {
        return view('student.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'registration_number' => 'required|unique:students,registration_number',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'college_email' => 'nullable|email',
            'mobile' => 'required|string|max:15',
            'landline' => 'nullable|string|max:15',
            'blood_group' => 'nullable|string|max:5',
            'date_of_birth' => 'required|date',
            'batch_id' => 'required|integer',
            'father_name' => 'required|string|max:255',
            'father_mobile' => 'required|string|max:15',
            'father_email' => 'required|email',
            'father_occupation' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'mother_mobile' => 'required|string|max:15',
            'mother_email' => 'required|email',
            'mother_occupation' => 'required|string',
        ]);
        Student::create($validated);
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    public function edit($id) {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:students,email,$id",
            'college_email' => 'nullable|email',
            'mobile' => 'required|string|max:15',
            'landline' => 'nullable|string|max:15',
            'blood_group' => 'nullable|string|max:5',
            'date_of_birth' => 'required|date',
            'batch_id' => 'required|integer',
            'father_name' => 'required|string|max:255',
            'father_mobile' => 'required|string|max:15',
            'father_email' => 'required|email',
            'father_occupation' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'mother_mobile' => 'required|string|max:15',
            'mother_email' => 'required|email',
            'mother_occupation' => 'required|string',
        ]);

        $student->update($validated);
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    
        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
    
}


    
