<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\Attendance;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $totalUsers = User::count();
    $totalStudents = Student::count();
    $totalTeachers = Teacher::count();
    $totalFaculties = Faculty::count();
    $totalSemesters = Semester::count();
    $totalAttendances = Attendance::count();

    return view('home', compact(
        'totalUsers',
        'totalStudents',
        'totalTeachers',
        'totalFaculties',
        'totalSemesters',
        'totalAttendances'
    ));
}
    
}

