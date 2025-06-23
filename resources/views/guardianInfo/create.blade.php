@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Add Guardian Info</h2>

    <form action="{{ url('/guardian-info/store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Student ID</label>
            <input type="number" name="student_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Contact No</label>
            <input type="text" name="contact_no" class="form-control">
        </div>

        <div class="mb-3">
            <label>Contact Address</label>
            <input type="text" name="contact_address" class="form-control">
        </div>

        <div class="mb-3">
            <label>Relation</label>
            <input type="text" name="relation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ url('/guardian-info') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
