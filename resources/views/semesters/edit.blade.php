@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h2>Edit Semester</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('semesters.update', $semester->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="semester_name">Semester Name</label>
            <input type="text" name="semester_name" class="form-control" value="{{ old('semester_name', $semester->semester_name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
        <a href="{{ route('semesters.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>
</div>
@endsection
