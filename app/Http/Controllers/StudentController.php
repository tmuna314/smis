<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view students')->only('index');
        $this->middleware('permission:edit students')->only(['edit', 'update']);
        $this->middleware('permission:delete students')->only('destroy');
    }

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
            'email' => 'required|email|unique:students,email|unique:users,email',
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
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-={}[\]:;"<>?,.\/]).+$/'
            ],
        ], [
            'password.regex' => 'Password must contain at least 1 capital letter, 1 number, and 1 special character.'
        ]);

        // Create user for student
        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        $user->assignRole('Student');
        // Optionally, you can notify the user of their password here

        Student::create($validated);
        return redirect()->route('student.index')->with('success', 'Student and user account created successfully.');
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
    
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }
}
