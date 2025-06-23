@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h2>Edit Notice</h2>

    <form action="{{ route('notice.update', $notice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $notice->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" required>{{ $notice->description }}</textarea>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="isTuRelated" value="1" {{ $notice->isTuRelated ? 'checked' : '' }}>
            <label class="form-check-label">Is TU Related</label>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="isHoliday" value="1" {{ $notice->isHoliday ? 'checked' : '' }}>
            <label class="form-check-label">Is Holiday</label>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="isForAll" value="1" {{ $notice->isForAll ? 'checked' : '' }}>
            <label class="form-check-label">Is For All</label>
        </div>

        <div class="mb-3">
            <label class="form-label">Is For</label>
            <input type="text" class="form-control" name="isFor" value="{{ $notice->isFor }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Created By</label>
            <input type="text" class="form-control" name="created_by" value="{{ $notice->created_by }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('notice.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
