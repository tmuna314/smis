@extends('layouts.master')

@section('main_content')
<div class="container mt-5">
    <h2>Edit Attendance</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $attendance->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Batch ID</label>
            <input type="number" name="batch_id" class="form-control" value="{{ $attendance->batch_id }}" required>
        </div>

        <div class="form-group">
            <label>Semester ID</label>
            <input type="number" name="semester_id" class="form-control" value="{{ $attendance->semester_id }}" required>
        </div>

        <div class="form-group">
            <label>Subject ID</label>
            <input type="number" name="subject_id" class="form-control" value="{{ $attendance->subject_id }}" required>
        </div>

        <div class="form-group">
            <label>Teacher ID</label>
            <input type="number" name="teacher_id" class="form-control" value="{{ $attendance->teacher_id }}" required>
        </div>

        <div class="form-group">
            <label>Is Present</label>
            <select name="is_present" class="form-control" required>
                <option value="1" {{ $attendance->is_present ? 'selected' : '' }}>Present</option>
                <option value="0" {{ !$attendance->is_present ? 'selected' : '' }}>Absent</option>
            </select>
        </div>

        <div class="form-group">
            <label>Attendance Date</label>
            <input
