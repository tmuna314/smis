@extends('layouts.master')

@section('main_content')
<div class="container">
    <h1>Role Details</h1>
    <div class="mb-3">
        <strong>Name:</strong> {{ $role->name }}
    </div>
    <div class="mb-3">
        <strong>Permissions:</strong>
        <ul>
            @foreach($role->permissions as $permission)
                <li>{{ $permission->name }}</li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to Roles</a>
    <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">Edit Role</a>
</div>
@endsection