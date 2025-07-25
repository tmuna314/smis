@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Batch List</h2>
    <a href="{{ route('batch.create') }}" class="btn btn-primary mb-3">Create New Batch</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Is Active</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Faculty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($batches as $batch)
                <tr>
                    <td>{{ $batch->id }}</td>
                    <td>{{ $batch->name }}</td>
                    <td>{{ $batch->is_active ? 'Yes' : 'No' }}</td>
                    <td>{{ $batch->created_by }}</td>
                    <td>{{ $batch->created_at }}</td>
                    <td>{{ $batch->updated_at }}</td>
                    <td>{{ $batch->faculty->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('batch.edit', $batch->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('batch.destroy', $batch->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this batch?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
