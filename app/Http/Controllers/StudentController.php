<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view students')->only('index');
        // $this->middleware('permission:create student')->only(['create', 'store']); // Allow public create/store
        $this->middleware('permission:edit student')->only(['edit', 'update']);
        $this->middleware('permission:delete student')->only('destroy');
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
            'mobile' => ['required', 'regex:/^\d{10,}$/'],
            'landline' => 'nullable|string|max:15',
            'blood_group' => 'nullable|string|max:5',
            'date_of_birth' => 'required|date',
            'batch_id' => 'required|integer',
            'father_name' => 'required|string|max:255',
            'father_mobile' => ['required', 'regex:/^\d{10,}$/'],
            'father_email' => 'required|email',
            'father_occupation' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'mother_mobile' => ['required', 'regex:/^\d{10,}$/'],
            'mother_email' => 'required|email',
            'mother_occupation' => 'required|string',
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-={}[\]:;\"<>?,.\/]).+$/'
            ],
        ], [
            'mobile.regex' => 'Number must be at least 10 digits!',
            'father_mobile.regex' => 'Number must be at least 10 digits!',
            'mother_mobile.regex' => 'Number must be at least 10 digits!',
            'password.regex' => 'Password must contain at least 1 capital letter, 1 number, and 1 special character.'
        ]);

        // If validation fails, Laravel will automatically redirect back with errors.
        // If validation passes, continue with user and student creation.
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        unset($validated['password']);
        $user->assignRole('Student');
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
            'mobile' => ['required', 'regex:/^\d{10,}$/'],
            'landline' => 'nullable|string|max:15',
            'blood_group' => 'nullable|string|max:5',
            'date_of_birth' => 'required|date',
            'batch_id' => 'required|integer',
            'father_name' => 'required|string|max:255',
            'father_mobile' => ['required', 'regex:/^\d{10,}$/'],
            'father_email' => 'required|email',
            'father_occupation' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'mother_mobile' => ['required', 'regex:/^\d{10,}$/'],
            'mother_email' => 'required|email',
            'mother_occupation' => 'required|string',
        ], [
            'mobile.regex' => 'Number must be at least 10 digits!',
            'father_mobile.regex' => 'Number must be at least 10 digits!',
            'mother_mobile.regex' => 'Number must be at least 10 digits!'
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
