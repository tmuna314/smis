@extends('layouts.master')

@section('main_content')
<div class="container">
    <div class="text-center my-4">
        <h2 class="text-white bg-primary p-3 rounded">Welcome to the SMIS Dashboard</h2>
    </div>

    <div class="row">
        <!-- Total Users -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-users fa-2x text-primary"></i>
                    <h5 class="mt-2">Total Users</h5>
                    <h3>{{ $totalUsers }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Students -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-user-graduate fa-2x text-success"></i>
                    <h5 class="mt-2">Total Students</h5>
                    <h3>{{ $totalStudents }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Teachers -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-chalkboard-teacher fa-2x text-warning"></i>
                    <h5 class="mt-2">Total Teachers</h5>
                    <h3>{{ $totalTeachers }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Faculties -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-university fa-2x text-info"></i>
                    <h5 class="mt-2">Total Faculties</h5>
                    <h3>{{ $totalFaculties }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Semesters -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-layer-group fa-2x text-secondary"></i>
                    <h5 class="mt-2">Total Semesters</h5>
                    <h3>{{ $totalSemesters }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Attendances -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-clipboard-list fa-2x text-danger"></i>
                    <h5 class="mt-2">Total Attendances</h5>
                    <h3>{{ $totalAttendances }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
