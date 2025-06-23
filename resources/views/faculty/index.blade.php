@extends('layouts.master')


@section('main_content')
<div class="container">
    <h1>Faculty List</h1>
    <a href="{{ route('faculty.create') }}" class="btn btn-primary mb-3">Add New Faculty</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Shortcode</th>
                <th>Affiliated To</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->id }}</td>
                    <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->shortcode }}</td>
                    <td>{{ $faculty->affiliated_to }}</td>
                    <td>{{ $faculty->created_by }}</td>
                    <td>{{ $faculty->created_at->format('d M, Y H:i') }}</td>
                    <td>{{ $faculty->updated_at->format('d M, Y H:i') }}</td>
                    <td>
                        <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No faculty records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
