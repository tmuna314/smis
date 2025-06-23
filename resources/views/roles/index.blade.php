@extends('layouts.master')
@section('main_content')
<div class="container">
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create Role</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @php
                            $maxToShow = 5;
                            $permCount = $role->permissions->count();
                        @endphp
                        @foreach($role->permissions->take($maxToShow) as $permission)
                            <span class="badge bg-info">{{ $permission->name }}</span>
                        @endforeach
                        @if($permCount > $maxToShow)
                            <span class="badge bg-secondary">+{{ $permCount - $maxToShow }} more</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('roles.show', $role) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
