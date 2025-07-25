@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h2>Create New Subject</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" name="subject_name" class="form-control" id="subject_name" value="{{ old('subject_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" name="class" class="form-control" id="class" value="{{ old('class') }}" required>
        </div>

        <div class="mb-3">
            <label for="faculty_id" class="form-label">Faculty ID</label>
            <input type="number" name="faculty_id" class="form-control" id="faculty_id" value="{{ old('faculty_id') }}" required>
        </div>

        <div class="mb-3">
            <label for="batch_id" class="form-label">Batch ID</label>
            <input type="number" name="batch_id" class="form-control" id="batch_id" value="{{ old('batch_id') }}" required>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Subject</button>
        </div>
    </form>
</div>
@endsection
