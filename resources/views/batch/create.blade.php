@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Create Batch</h2>
    <form action="{{ route('batch.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Batch Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        
        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active</label>
            <select class="form-select" name="is_active">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="faculty_id" class="form-label">Faculty ID</label>
            <input type="number" class="form-control" name="faculty_id" required>
        </div>

        <div class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <input type="text" class="form-control" name="created_by">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

