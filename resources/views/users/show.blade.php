@extends('layouts.master')

@section('main_content')
<div class="row mb-3">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h2>Show User</h2>
        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <strong>Name:</strong>
        <p>{{ $user->name }}</p>
    </div>
    <div class="col-12 mb-3">
        <strong>Email:</strong>
        <p>{{ $user->email }}</p>
    </div>
    <div class="col-12 mb-3">
        <strong>Roles:</strong><br>
        @if($user->getRoleNames()->isNotEmpty())
            @foreach($user->getRoleNames() as $role)
                <span class="badge bg-success">{{ $role }}</span>
            @endforeach
        @else
            <span class="text-muted">No roles assigned</span>
        @endif
    </div>
</div>
@endsection
