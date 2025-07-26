<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Batch; 
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('student')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $students = Student::all();
        $batches = Batch::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('attendance.create', compact('students', 'batches', 'semesters', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'    => 'required|exists:students,id',
            'batch_id'      => 'required|integer|exists:batches,id',
            'semester_id'   => 'required|integer|exists:semesters,id',
            'subject_id'    => 'required|integer|exists:subjects,id',
            'teacher_id'    => 'required|integer|exists:teachers,id',
            'is_present'    => 'required|boolean',
            'attendance_at' => 'required|date',
        ]);

        Attendance::create($validated);

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $students = Student::all();
        $batches = Batch::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('attendance.edit', compact('attendance', 'students', 'batches', 'semesters', 'subjects', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'student_id'    => 'required|exists:students,id',
            'batch_id'      => 'required|integer|exists:batches,id',
            'semester_id'   => 'required|integer|exists:semesters,id',
            'subject_id'    => 'required|integer|exists:subjects,id',
            'teacher_id'    => 'required|integer|exists:teachers,id',
            'is_present'    => 'required|boolean',
            'attendance_at' => 'required|date',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($validated);

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}