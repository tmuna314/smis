{{-- resources/views/students/create.blade.php --}}

@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <h1>Student Form</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('student.store') }}">
        @csrf

        {{-- Student Details --}}
        <div class="mb-3">
            <label class="form-label">Registration Number</label>
            <input type="text" class="form-control" name="registration_number">
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label class="form-label">College Email</label>
            <input type="email" class="form-control" name="college_email">
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="tel" class="form-control" name="mobile">
        </div>

        <div class="mb-3">
            <label class="form-label">Landline</label>
            <input type="tel" class="form-control" name="landline">
        </div>

        <div class="mb-3">
            <label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group" required>
            <option value="">-- Select Blood Group --</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth">
        </div>

        <div class="mb-3">
            <label class="form-label">Batch ID</label>
            <input type="number" class="form-control" name="batch_id">
        </div>

        {{-- Guardian Info --}}
        <h2 class="mt-4">Guardian Info</h2>

        <div class="mb-3">
            <label class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="father_name">
        </div>

        <div class="mb-3">
            <label class="form-label">Father's Mobile</label>
            <input type="tel" class="form-control" name="father_mobile">
        </div>

        <div class="mb-3">
            <label class="form-label">Father's Email</label>
            <input type="email" class="form-control" name="father_email">
        </div>

        <div class="mb-3">
            <label class="form-label">Father's Occupation</label>
            <input type="text" class="form-control" name="father_occupation">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Name</label>
            <input type="text" class="form-control" name="mother_name">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Mobile</label>
            <input type="tel" class="form-control" name="mother_mobile">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Email</label>
            <input type="email" class="form-control" name="mother_email">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Occupation</label>
            <input type="text" class="form-control" name="mother_occupation">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
