<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-={}[\]:;"<>?,.\/]).+$/'
            ],
        ], [
            'password.regex' => 'Password must contain at least 1 capital letter, 1 number, and 1 special character.'
        ]);

        // Create user for teacher
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole('Teacher');

        Teacher::create($request->only('name', 'email', 'phone', 'address', 'subject'));

        return redirect()->route('teacher.index')->with('success', 'Teacher and user account created successfully.');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->only('name', 'email', 'phone', 'address', 'subject'));

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
