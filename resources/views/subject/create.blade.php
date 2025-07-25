@extends('layout.master')

@section('content')
<div class="container">
    <h2>Create Subject</h2>
    <form action="{{ route('subject.store') }}" method="POST">
        @csrf

        <!-- Class Input -->
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" name="class" class="form-control" required>
        </div>

        <!-- Faculty Dropdown -->
        <div class="mb-3">
            <label for="faculty_id" class="form-label">Faculty</label>
            <select name="faculty_id" class="form-control" required>
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Batch Dropdown -->
        <div class="mb-3">
            <label for="batch_id" class="form-label">Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">Select Batch</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Semester Dropdown -->
        <div class="mb-3">
            <label for="semester_id" class="form-label">Semester</label>
            <select name="semester_id" class="form-control" required>
                <option value="">Select Semester</option>
                @foreach($semesters as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Subject Name -->
        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" name="subject_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
