<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalFaculties = Faculty::count();
        $totalSemesters = Semester::count();
        $totalAttendances = Attendance::count();

        return view('dashboard', compact(
            'totalUsers',
            'totalStudents',
            'totalTeachers',
            'totalFaculties',
            'totalSemesters',
            'totalAttendances'
        ));
    }
}
