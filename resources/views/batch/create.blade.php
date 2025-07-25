@extends('layouts.master')

@section('main_content')
<div class="container mt-5">
    <h2>Create New Batch</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('batch.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Batch Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter batch name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="faculty_id" class="form-label">Faculty</label>
            <select name="faculty_id" class="form-select">
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                        {{ $faculty->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Is Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Batch</button>
        <a href="{{ route('batch.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection


