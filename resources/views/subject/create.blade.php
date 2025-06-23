@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Create Subject</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('subject.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" name="class" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="faculty_id" class="form-label">Faculty</label>
                            <select name="faculty_id" class="form-control" required>
                                <option value="">Select Faculty</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="batch_id" class="form-label">Batch</label>
                            <select name="batch_id" class="form-control" required>
                                <option value="">Select Batch</option>
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}">{{ $batch->name ?? $batch->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" name="subject_name" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('subject.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
