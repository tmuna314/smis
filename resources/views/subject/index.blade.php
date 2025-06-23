@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Subjects</h2>
        <a href="{{ route('subject.create') }}" class="btn btn-primary">Create Subject</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Faculty</th>
                    <th>Batch</th>
                    <th>Subject Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->class }}</td>
                        <td>{{ $subject->faculty->name ?? $subject->faculty_id }}</td>
                        <td>{{ $subject->batch->name ?? $subject->batch_id }}</td>
                        <td>{{ $subject->subject_name }}</td>
                        <td>
                            <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No subjects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
