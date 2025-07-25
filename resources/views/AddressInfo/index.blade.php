@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Address Info</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('addressinfo.create') }}" class="btn btn-primary mb-3">Add Address</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Province</th>
                <th>District</th>
                <th>Ward/VDC</th>
                <th>Tole/Street</th>
                <th>Is Permanent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addresses as $address)
            <tr>
                <td>{{ $address->student_id }}</td>
                <td>{{ $address->province_name }}</td>
                <td>{{ $address->district_name }}</td>
                <td>{{ $address->ward_vdc }}</td>
                <td>{{ $address->tole_street }}</td>
                <td>{{ $address->is_permanent ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('addressinfo.edit', $address->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('addressinfo.destroy', $address->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
