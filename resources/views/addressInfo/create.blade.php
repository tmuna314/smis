@extends('layouts.master')

@section('main_content')
<div class="container">
    <h1>Create Address Info</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('addressinfo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="student_id">Student ID</label>
            <input type="number" name="student_id" class="form-control" required value="{{ old('student_id') }}">
        </div>

        <div class="mb-3">
            <label for="province">Province</label>
            <input type="text" name="province" class="form-control" required value="{{ old('province') }}">
        </div>

        <div class="mb-3">
            <label for="district">District</label>
            <input type="text" name="district" class="form-control" required value="{{ old('district') }}">
        </div>

        <div class="mb-3">
            <label for="ward_or_vdc">Ward or VDC</label>
            <input type="text" name="ward_or_vdc" class="form-control" required value="{{ old('ward_or_vdc') }}">
        </div>

        <div class="mb-3">
            <label for="tole_or_street">Tole or Street</label>
            <input type="text" name="tole_or_street" class="form-control" required value="{{ old('tole_or_street') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_permanent" class="form-check-input" id="is_permanent" {{ old('is_permanent') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_permanent">Is Permanent?</label>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('addressinfo.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
