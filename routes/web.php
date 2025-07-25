<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EducationalInfoController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GuardianInfoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AddressInfoController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SemesterController;
Auth::routes();

Route::get('/', function () { 
    return view('landing');
});


Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');


Route::middleware(['auth'])->group(function(){
//student
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');
Route::get('/student/{id}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::put('/student/{id}/edit', [StudentController::class, 'update'])->name('student.update');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');

// faculty
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index'); 
Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::get('/faculty/{id}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
Route::delete('/faculty/{id}', [FacultyController::class, 'destroy'])->name('faculty.destroy');
Route::post('/faculty', [FacultyController::class, 'store'])->name('faculty.store');
Route::put('/faculty/{id}', [FacultyController::class, 'update'])->name('faculty.update');

//Notices
Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');        
Route::get('/notice/create', [NoticeController::class, 'create'])->name('notice.create'); 
Route::post('/notice', [NoticeController::class, 'store'])->name('notice.store');         
Route::get('/notice/{id}/edit', [NoticeController::class, 'edit'])->name('notice.edit');  
Route::put('/notice/{id}', [NoticeController::class, 'update'])->name('notice.update');   
Route::delete('/notice/{id}', [NoticeController::class, 'destroy'])->name('notice.destroy');
Route::get('/notice/{id}', [NoticeController::class, 'show'])->name('notice.show');


// EducationalInfo Routes
Route::get('/educational-info', [EducationalInfoController::class, 'index'])->name('educationalInfo.index');
Route::get('/educational-info/create', [EducationalInfoController::class, 'create'])->name('educationalInfo.create');
Route::post('/educational-info', [EducationalInfoController::class, 'store'])->name('educationalInfo.store');
Route::get('/educational-info/edit/{id}', [EducationalInfoController::class, 'edit'])->name('educationalInfo.edit');
Route::put('/educational-info/{id}', [EducationalInfoController::class, 'update'])->name('educationalInfo.update');
Route::delete('/educational-info/{id}', [EducationalInfoController::class, 'destroy'])->name('educationalInfo.destroy');



//guardianInfo
Route::get('/guardian-info', [GuardianInfoController::class, 'index']);
Route::get('/guardian-info/create', [GuardianInfoController::class, 'create']);
Route::post('/guardian-info/store', [GuardianInfoController::class, 'store']);
Route::get('/guardian-info/edit/{id}', [GuardianInfoController::class, 'edit']);
Route::post('/guardian-info/update/{id}', [GuardianInfoController::class, 'update']);
Route::get('/guardian-info/delete/{id}', [GuardianInfoController::class, 'destroy']);


// Display all batches
Route::get('/batches', [BatchController::class, 'index'])->name('batch.index');
Route::get('/batches/create', [BatchController::class, 'create'])->name('batch.create');
Route::post('/batches', [BatchController::class, 'store'])->name('batch.store');
Route::get('/batches/{batch}/edit', [BatchController::class, 'edit'])->name('batch.edit');
Route::put('/batches/{batch}', [BatchController::class, 'update'])->name('batch.update');
Route::delete('/batches/{batch}', [BatchController::class, 'destroy'])->name('batch.destroy');

//Address Info
Route::get('address-info', [AddressInfoController::class, 'index'])->name('addressinfo.index');
Route::get('address-info/create', [AddressInfoController::class, 'create'])->name('addressinfo.create');
Route::post('address-info', [AddressInfoController::class, 'store'])->name('addressinfo.store');
Route::get('address-info/{id}/edit', [AddressInfoController::class, 'edit'])->name('addressinfo.edit');
Route::put('address-info/{id}', [AddressInfoController::class, 'update'])->name('addressinfo.update');
Route::delete('address-info/{id}', [AddressInfoController::class, 'destroy'])->name('addressinfo.destroy');


//UserController
    Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});


// Role Management
    Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});


// Teacher
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

// Subject
Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');
Route::get('/subject/{subject}', [SubjectController::class, 'show'])->name('subject.show');


// Semester
Route::get('/semester', [SemesterController::class, 'index'])->name('semester.index');
Route::get('/semester/create', [SemesterController::class, 'create'])->name('semester.create');
Route::post('/semester', [SemesterController::class, 'store'])->name('semester.store');
Route::get('/semester/{semester}/edit', [SemesterController::class, 'edit'])->name('semester.edit');
Route::put('/semester/{semester}', [SemesterController::class, 'update'])->name('semester.update');
Route::delete('/semester/{semester}', [SemesterController::class, 'destroy'])->name('semester.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// // Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// register
Route::get('register', [RegisterController::class, 'showRegisterForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');

//Api  
Route::get('api/getStudent',[App\Http\Controllers\ApiController::class,'getStudent']);
Route::post('api/saveStudent',[App\Http\Controllers\ApiController::class,'saveStudent']);


