@extends('layouts.master')

@section('main_content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">Welcome to the SMIS Dashboard</h2>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center mt-4">
                        <div class="col-12 mb-4">
                            <div class="row g-3 justify-content-center">
                                <div class="col-12 col-md-4">
                                    <div class="card text-center border-primary">
                                        <div class="card-body">
                                            <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                            <h5 class="card-title">Total Users</h5>
                                            <p class="display-6">{{ $totalUsers }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card text-center border-success">
                                        <div class="card-body">
                                            <i class="fas fa-user-graduate fa-2x text-success mb-2"></i>
                                            <h5 class="card-title">Total Students</h5>
                                            <p class="display-6">{{ $totalStudents }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card text-center border-warning">
                                        <div class="card-body">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-warning mb-2"></i>
                                            <h5 class="card-title">Total Teachers</h5>
                                            <p class="display-6">{{ $totalTeachers }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
