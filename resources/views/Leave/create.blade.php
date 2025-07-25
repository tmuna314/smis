@extends('layouts.master')

@section('main_content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Submit Leave Request</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaves.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="number" name="student_id" id="student_id" class="form-control" value="{{ old('student_id') }}" required>
        </div>

        <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <textarea name="reason" id="reason" class="form-control" rows="4" required>{{ old('reason') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="from_date" class="form-label">From Date</label>
            <input type="date" name="from_date" id="from_date" class="form-control" value="{{ old('from_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="to_date" class="form-label">To Date</label>
            <input type="date" name="to_date" id="to_date" class="form-control" value="{{ old('to_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Leave Request</button>
    </form>
</div>
@endsection
