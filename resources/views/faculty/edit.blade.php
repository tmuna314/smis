@extends('layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Faculty</h1>

    <form action="{{ route('faculty.update', $faculty->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $faculty->name) }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Shortcode</label>
            <input type="text" name="shortcode" class="form-control @error('shortcode') is-invalid @enderror" value="{{ old('shortcode', $faculty->shortcode) }}" required>
            @error('shortcode') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Affiliated To</label>
            <input type="text" name="affiliated_to" class="form-control @error('affiliated_to') is-invalid @enderror" value="{{ old('affiliated_to', $faculty->affiliated_to) }}">
            @error('affiliated_to') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Created By</label>
            <input type="text" name="created_by" class="form-control @error('created_by') is-invalid @enderror" value="{{ old('created_by', $faculty->created_by) }}">
            @error('created_by') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('faculty.index') }}" class="btn btn-secondary">Cancel</a>
    

    </form>
</div>
@endsection
