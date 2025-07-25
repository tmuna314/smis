@extends('layouts.master') <!-- Adjust layout name if different -->

@section('main_content')
    <h1>All Semesters</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('semesters.create') }}" class="btn btn-primary">Create New Semester</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Semester Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semesters as $semester)
                <tr>
                    <td>{{ $semester->id }}</td>
                    <td>{{ $semester->semester_name }}</td>
                    <td>{{ $semester->created_at }}</td>
                    <td>
                        <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('semesters.destroy', $semester->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this semester?')" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
