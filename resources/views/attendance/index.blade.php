@extends('layouts.master')

@section('main_content')
<div class="container mt-5">
    <h2>Attendance Records</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('attendance.create') }}" class="btn btn-primary mb-3">Add Attendance</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Batch ID</th>
                <th>Semester ID</th>
                <th>Subject ID</th>
                <th>Teacher ID</th>
                <th>Is Present</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->student->name ?? 'N/A' }}</td>
                    <td>{{ $attendance->batch_id }}</td>
                    <td>{{ $attendance->semester_id }}</td>
                    <td>{{ $attendance->subject_id }}</td>
                    <td>{{ $attendance->teacher_id }}</td>
                    <td>{{ $attendance->is_present ? 'Present' : 'Absent' }}</td>
                    <td>{{ $attendance->attendance_at }}</td>
                    <td>
                        <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No attendance records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
