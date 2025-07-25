@extends('layouts.master')

@section('main_content')
<h2>Edit Teacher Assignment</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('teacher_assignments.update', $teacher_assignment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Faculty ID:</label>
    <input type="number" name="faculty_id" value="{{ old('faculty_id', $teacher_assignment->faculty_id) }}" required><br><br>

    <label>Batch ID:</label>
    <input type="number" name="batch_id" value="{{ old('batch_id', $teacher_assignment->batch_id) }}" required><br><br>

    <label>Semester ID:</label>
    <input type="number" name="semester_id" value="{{ old('semester_id', $teacher_assignment->semester_id) }}" required><br><br>

    <label>Subject ID:</label>
    <input type="number" name="subject_id" value="{{ old('subject_id', $teacher_assignment->subject_id) }}" required><br><br>

    <label>Teacher ID:</label>
    <input type="number" name="teacher_id" value="{{ old('teacher_id', $teacher_assignment->teacher_id) }}" required><br><br>

    <label>Is Active:</label>
    <select name="is_active" required>
        <option value="1" {{ (old('is_active', $teacher_assignment->is_active) == 1) ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (old('is_active', $teacher_assignment->is_active) == 0) ? 'selected' : '' }}>No</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('teacher_assignments.index') }}">Back to List</a>
@endsection
