@extends('layouts.master')

@section('main_content')
<div class="container mt-5">
    <h1 class="mb-4">Batch List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('batch.create') }}" class="btn btn-primary mb-3">Create New Batch</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Batch Name</th>
                <th>Faculty</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($batches as $key => $batch)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $batch->name }}</td>
                    <td>{{ $batch->faculty->name ?? 'N/A' }}</td>
                    <td>{{ $batch->created_by }}</td>
                    <td>{{ $batch->created_at->format('Y-m-d') }}</td>
                    <td>{{ $batch->updated_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('batch.edit', $batch->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('batch.destroy', $batch->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No batches found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
