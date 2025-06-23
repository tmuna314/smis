@extends('layouts.master')

@section('main_content')
<div class="container">
    <h1 class="mb-4">Address Information</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('addressinfo.create') }}" class="btn btn-primary mb-3">Add New Address</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Province</th>
                <th>District</th>
                <th>Ward or VDC</th>
                <th>Tole or Street</th>
                <th>Is Permanent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($addressinfos as $address)
                <tr>
                    <td>{{ $address->id }}</td>
                    <td>{{ $address->student_id }}</td>
                    <td>{{ $address->province }}</td>
                    <td>{{ $address->district }}</td>
                    <td>{{ $address->ward_or_vdc }}</td>
                    <td>{{ $address->tole_or_street }}</td>
                    <td>{{ $address->is_permanent ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('addressinfo.edit', $address->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('addressinfo.destroy', $address->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this address?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No address records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
