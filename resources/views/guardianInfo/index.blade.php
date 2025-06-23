@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Guardian Information</h2>

    <a href="{{ url('/guardian-info/create') }}" class="btn btn-primary mb-3">Add Guardian</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Address</th>
                <th>Relation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guardianInfos as $info)
            <tr>
                <td>{{ $info->id }}</td>
                <td>{{ $info->student_id }}</td>
                <td>{{ $info->name }}</td>
                <td>{{ $info->mobile }}</td>
                <td>{{ $info->email }}</td>
                <td>{{ $info->contact_no }}</td>
                <td>{{ $info->contact_address }}</td>
                <td>{{ $info->relation }}</td>
                <td>
                    <a href="{{ url('/guardian-info/edit/'.$info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ url('/guardian-info/delete/'.$info->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this guardian info?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
