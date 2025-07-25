@extends('layouts.master') <!-- Make sure this matches your layout file -->

@section('main_content')
<div class="container">
    <h2>Edit Faculty</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faculty.update', $faculty->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Faculty Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="shortcode">Shortcode</label>
            <input type="text" name="shortcode" id="shortcode" class="form-control" value="{{ old('shortcode') }}" required>
        </div>

        <div class="form-group">
            <label for="affiliated_to">Affiliated To</label>
            <input type="text" name="affiliated_to" id="affiliated_to" class="form-control" value="{{ old('affiliated_to') }}" required>
        </div>

        <div class="form-group">
            <label for="created_by">Created By</label>
            <input type="text" name="created_by" id="created_by" class="form-control" value="{{ old('created_by') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update faculty</button>
        <a href="{{ route('faculty.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
