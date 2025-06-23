@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h1>User Registration Form</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.store') }}">
        @csrf

        {{-- User Details --}}
        <div class="mb-3">
            <label class="form-label" for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label" for="password">Password:</label>
            <div class="input-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                <span class="input-group-text" onclick="togglePassword('password', this)" style="cursor:pointer;">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label" for="password_confirmation">Confirm Password:</label>
            <div class="input-group">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                <span class="input-group-text" onclick="togglePassword('password_confirmation', this)" style="cursor:pointer;">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
            @error('password_confirmation')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="roles">Roles:</label>
            <select class="form-control" id="roles" name="roles[]" multiple required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted"></small>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
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
