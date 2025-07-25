<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AddressInfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherAssignmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LeaveController;



Route::get('/', function () {
    return view('landing');
});


use App\Models\Student;

Auth::routes();
Route::get('/', function () {
    // Fetch total number of students from the database (optional)
    $studentCount = Student::count();
    
    // Pass the data to the view
    return view('home', compact('studentCount'));
});



Route::middleware(['auth'])->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');  // <-- add this
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    

//student routes
Route::get('/students/index',[StudentController::class,'index'])->name('student.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::put('/students/{id}/edit', [StudentController::class, 'update'])->name('student.update');


//faculty routes
Route::get('faculties/index', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculties/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::post('/faculties/store', [FacultyController::class, 'store'])->name('faculty.store');
Route::get('/faculties/{id}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
Route::put('/faculties/{id}/edit', [FacultyController::class, 'update'])->name('faculty.update');
Route::delete('/faculty/{id}', [FacultyController::class, 'destroy'])->name('faculty.destroy');

// Batch Routes
Route::get('/batches/index', [BatchController::class, 'index'])->name('batch.index');
Route::get('/batches/create', [BatchController::class, 'create'])->name('batch.create');
Route::post('/batches/store', [BatchController::class, 'store'])->name('batch.store');
Route::get('/batches/{id}/edit', [BatchController::class, 'edit'])->name('batch.edit');
Route::put('/batches/{id}', [BatchController::class, 'update'])->name('batch.update');
Route::delete('/batches/{id}', [BatchController::class, 'destroy'])->name('batch.destroy');

//AddressInfo Routes
Route::get('/addressinfo', [AddressInfoController::class, 'index'])->name('addressinfo.index');
Route::get('/addressinfo/create', [AddressInfoController::class, 'create'])->name('addressinfo.create');
Route::post('/addressinfo', [AddressInfoController::class, 'store'])->name('addressinfo.store');
Route::get('/addressinfo/{id}/edit', [AddressInfoController::class, 'edit'])->name('addressinfo.edit');
Route::put('/addressinfo/{id}', [AddressInfoController::class, 'update'])->name('addressinfo.update');
Route::delete('/addressinfo/{id}', [AddressInfoController::class, 'destroy'])->name('addressinfo.destroy');


//Attendance Routes

Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/attendances/{id}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
Route::put('/attendances/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');


//Semester Routes
Route::get('/semesters', [SemesterController::class, 'index'])->name('semesters.index');
Route::get('/semesters/create', [SemesterController::class, 'create'])->name('semesters.create');
Route::post('/semesters', [SemesterController::class, 'store'])->name('semesters.store');
Route::get('/semesters/{id}/edit', [SemesterController::class, 'edit'])->name('semesters.edit');
Route::put('/semesters/{id}', [SemesterController::class, 'update'])->name('semesters.update');
Route::delete('/semesters/{id}', [SemesterController::class, 'destroy'])->name('semesters.destroy');


//teacher Routes

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

//subject Routes
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

//teacher assignment

Route::get('/teacherassignments', [TeacherAssignmentController::class, 'index'])->name('teacher_assignments.index');
Route::get('/teacherassignments/create', [TeacherAssignmentController::class, 'create'])->name('teacher_assignments.create');
Route::post('/teacherassignments', [TeacherAssignmentController::class, 'store'])->name('teacher_assignments.store');
Route::get('/teacherassignments/{id}/edit', [TeacherAssignmentController::class, 'edit'])->name('teacher_assignments.edit');
Route::put('/teacherassignments/{id}', [TeacherAssignmentController::class, 'update'])->name('teacher_assignments.update');
Route::delete('/teacherassignments/{id}', [TeacherAssignmentController::class, 'destroy'])->name('teacher_assignments.destroy');

//roles routes
Route::middleware(['auth'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});
// leaves routes
Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
Route::get('/leaves/{id}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
Route::put('/leaves/{id}', [LeaveController::class, 'update'])->name('leaves.update');
Route::delete('/leaves/{id}', [LeaveController::class, 'destroy'])->name('leaves.destroy');

Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//api routes
Route::get('/api/getStudents',[App\Http\Controllers\ApiController::class,'getstudents']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
