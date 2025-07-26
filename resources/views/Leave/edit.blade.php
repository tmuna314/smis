@extends('layouts.master')

@section('main_content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Update Leave Status</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student ID</label>
            <input type="text" class="form-control" value="{{ $leave->student_id }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Reason</label>
            <textarea class="form-control" rows="3" disabled>{{ $leave->reason }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">From Date</label>
            <input type="text" class="form-control" value="{{ $leave->from_date->format('d/m/Y') }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">To Date</label>
            <input type="text" class="form-control" value="{{ $leave->to_date->format('d/m/Y') }}" disabled>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
        <a href="{{ route('leaves.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
