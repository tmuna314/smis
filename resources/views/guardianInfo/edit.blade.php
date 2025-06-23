@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Edit Guardian Info</h2>

    <form action="{{ url('/guardian-info/update/'.$guardianInfo->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Student ID</label>
            <input type="number" name="student_id" class="form-control" value="{{ $guardianInfo->student_id }}" required>
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $guardianInfo->name }}" required>
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" value="{{ $guardianInfo->mobile }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $guardianInfo->email }}">
        </div>

        <div class="mb-3">
            <label>Contact No</label>
            <input type="text" name="contact_no" class="form-control" value="{{ $guardianInfo->contact_no }}">
        </div>

        <div class="mb-3">
            <label>Contact Address</label>
            <input type="text" name="contact_address" class="form-control" value="{{ $guardianInfo->contact_address }}">
        </div>

        <div class="mb-3">
            <label>Relation</label>
            <input type="text" name="relation" class="form-control" value="{{ $guardianInfo->relation }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/guardian-info') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
