@extends('layouts.master')

@section('main_content')
<h1>Teachers List</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Subject</th><th>Address</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->subject }}</td>
            <td>{{ $teacher->address }}</td>
            <td>
                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this teacher?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
