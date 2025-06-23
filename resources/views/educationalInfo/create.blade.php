@extends('layouts.master')

@section('main_content')
<div class="container">
    <h1>Add Educational Info</h1>
    <form action="{{ route('educationalInfo.store') }}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" name="student_id" class="form-control @error('student_id') is-invalid @enderror" value="{{ old('student_id') }}" required>
            @error('student_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label for="symbol_no" class="form-label">Symbol No</label>
            <input type="text" name="symbol_no" class="form-control @error('symbol_no') is-invalid @enderror" value="{{ old('symbol_no') }}" required>
            @error('symbol_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label for="board" class="form-label">Board</label>
            <input type="text" name="board" class="form-control @error('board') is-invalid @enderror" value="{{ old('board') }}" required>
            @error('board') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label for="passed_year" class="form-label">Passed Year</label>
            <input type="number" name="passed_year" class="form-control @error('passed_year') is-invalid @enderror" value="{{ old('passed_year') }}" required>
            @error('passed_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label for="marks_obtained" class="form-label">Marks Obtained</label>
            <input type="number" name="marks_obtained" class="form-control @error('marks_obtained') is-invalid @enderror" value="{{ old('marks_obtained') }}" required>
            @error('marks_obtained') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
