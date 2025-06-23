@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Create Teacher</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
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
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
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
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
