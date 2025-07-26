@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h2>Subjects List</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add New Subject</a>
    </div>

    @if($subjects->isEmpty())
        <p>No subjects found.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject Name</th>
                    <th>Class</th>
                    <th>Faculty ID</th>
                    <th>Batch ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->subject_name }}</td>
                        <td>{{ $subject->class }}</td>
                        <td>{{ $subject->faculty_id }}</td>
                        <td>{{ $subject->batch_id }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this subject?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
