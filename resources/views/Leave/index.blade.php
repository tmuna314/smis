@extends('layouts.master')

@section('main_content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Leave Requests</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Submit New Leave Request</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Reason</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->student_id }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->start_date->format('d/m/Y') }}</td>
                <td>{{ $leave->end_date->format('d/m/Y') }}</td>
                <td>
                    @if($leave->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($leave->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
                <td>{{ $leave->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this leave?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No leave requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
