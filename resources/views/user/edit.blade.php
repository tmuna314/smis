@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h1>Edit User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf
        @method('PUT')

        {{-- User Details --}}
        <div class="mb-3">
            <label class="form-label" for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label" for="password">New Password (optional):</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password">
                <span class="input-group-text" onclick="togglePassword('password', this)" style="cursor:pointer;">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label" for="password_confirmation">Confirm New Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                <span class="input-group-text" onclick="togglePassword('password_confirmation', this)" style="cursor:pointer;">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
        </div>

        {{-- Roles as Checkboxes --}}
        <div class="mb-3">
            <label class="form-label">Assign Roles:</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach($roles as $role)
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" 
                               id="role_{{ $role->id }}" 
                               name="roles[]" 
                               value="{{ $role->id }}"
                               {{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="role_{{ $role->id }}">
                            {{ ucfirst($role->name) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(fieldId, el) {
    const input = document.getElementById(fieldId);
    if (input.type === 'password') {
        input.type = 'text';
        el.querySelector('i').classList.remove('fa-eye');
        el.querySelector('i').classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        el.querySelector('i').classList.remove('fa-eye-slash');
        el.querySelector('i').classList.add('fa-eye');
    }
}
</script>
@endpush
