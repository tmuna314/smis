@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Create Semester</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('semester.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="semester_name" class="form-label">Semester Name</label>
                            <input type="text" name="semester_name" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('semester.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
