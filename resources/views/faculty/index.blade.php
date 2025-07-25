@extends('layouts.master')

@section('title', 'Faculty List')

@section('main_content')
<div class="container">
    <h2>Faculty List</h2>
    
    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Button to Create New Faculty -->
    <a href="{{ route('faculty.create') }}" class="btn btn-primary mb-3">Add New Faculty</a>

    <!-- Faculty Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Shortcode</th>
                <th>Affiliated To</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->id }}</td>
                    <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->shortcode }}</td>
                    <td>{{ $faculty->affiliated_to }}</td>
                    <td>{{ $faculty->created_by }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this faculty?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
