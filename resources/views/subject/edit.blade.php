@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white">
                    <h3 class="mb-0">Edit Subject</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" name="class" class="form-control" value="{{ $subject->class }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="faculty_id" class="form-label">Faculty</label>
                            <select name="faculty_id" class="form-control" required>
                                <option value="">Select Faculty</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ $subject->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="batch_id" class="form-label">Batch</label>
                            <select name="batch_id" class="form-control" required>
                                <option value="">Select Batch</option>
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}" {{ $subject->batch_id == $batch->id ? 'selected' : '' }}>{{ $batch->name ?? $batch->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" name="subject_name" class="form-control" value="{{ $subject->subject_name }}" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('subject.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
