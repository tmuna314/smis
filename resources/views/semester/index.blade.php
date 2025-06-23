@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Semesters</h2>
        <a href="{{ route('semester.create') }}" class="btn btn-primary">Create Semester</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Semester Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semesters as $semester)
                    <tr>
                        <td>{{ $semester->id }}</td>
                        <td>{{ $semester->semester_name }}</td>
                        <td>
                            <a href="{{ route('semester.edit', $semester->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('semester.destroy', $semester->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No semesters found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
