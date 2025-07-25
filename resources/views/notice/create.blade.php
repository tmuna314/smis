@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h2>Create Notice</h2>

    <form action="{{ route('notice.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" required></textarea>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="isTuRelated" value="1">
            <label class="form-check-label">Is TU Related</label>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="isHoliday" value="1">
            <label class="form-check-label">Is Holiday</label>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="isForAll" value="1">
            <label class="form-check-label">Is For All</label>
        </div>

       <div class="mb-3">
            <label class="form-label">Created By</label>
            <input type="text" class="form-control" name="created_by" value="{{ auth()->user()->name }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('notice.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
