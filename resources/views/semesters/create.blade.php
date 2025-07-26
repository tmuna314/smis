@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h1>Create New Semester</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('semesters.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="semester_name" class="form-label">Semester Name</label>
            <select id="semester_name" name="semester_name" class="form-select" required>
                <option value="">-- Select Semester Name --</option>
                <option value="first semester" {{ old('semester_name') == 'first semester' ? 'selected' : '' }}>First</option>
                <option value="second semester" {{ old('semester_name') == 'second semester' ? 'selected' : '' }}>Second</option>
                <option value="third semester" {{ old('semester_name') == 'third semester' ? 'selected' : '' }}>Third</option>
                <option value="fourth semester" {{ old('semester_name') == 'fourth semester' ? 'selected' : '' }}>Fourth</option>
                <option value="fifth semester" {{ old('semester_name') == 'fifth semester' ? 'selected' : '' }}>Fifth</option>
                <option value="sixth semester" {{ old('semester_name') == 'sixth semester' ? 'selected' : '' }}>Sixth</option>
                <option value="seventh semester" {{ old('semester_name') == 'seventh semester' ? 'selected' : '' }}>Seventh</option>
                <option value="eighth semester" {{ old('semester_name') == 'eighth semester' ? 'selected' : '' }}>Eighth</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
