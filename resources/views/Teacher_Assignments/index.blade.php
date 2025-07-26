@extends('layouts.master')

@section('main_content')

@if(session('success'))
<div style="color: green">{{ session('success') }}</div>
@endif
<div class="container mt-3">
    <h2>Teacher Assignments</h2>
    
    <a href="{{ route('teacher_assignments.create') }}" class="btn btn-primary">Create New Assignment</a>

    <table class="table" border="1" cellpadding="5" cellspacing="0" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Faculty ID</th>
                <th>Batch ID</th>
                <th>Semester ID</th>
                <th>Subject ID</th>
                <th>Teacher ID</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teacherAssignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ $assignment->faculty_id }}</td>
                    <td>{{ $assignment->batch_id }}</td>
                    <td>{{ $assignment->semester_id }}</td>
                    <td>{{ $assignment->subject_id }}</td>
                    <td>{{ $assignment->teacher_id }}</td>
                    <td>{{ $assignment->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('teacher_assignments.edit', $assignment->id) }}">Edit</a>
                        <form action="{{ route('teacher_assignments.destroy', $assignment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

