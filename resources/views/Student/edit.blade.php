@extends('layouts.master') 

@section('main_content')
<div class="container">
    <h2>Edit Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Registration Number</label>
            <input type="text" class="form-control" name="registration_number" value="{{ old('registration_number', $student->registration_number) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}">

        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $student->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">College Email</label>
            <input type="email" class="form-control" name="college_email" value="{{ old('college_email', $student->college_email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="tel" class="form-control" name="mobile" value="{{ old('mobile', $student->mobile) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Landline</label>
            <input type="tel" class="form-control" name="landline" value="{{ old('landline', $student->landline) }}">
        </div>

        <div class="mb-3">
            <label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group" required>
                <option value="">-- Select Blood Group --</option>
                <option value="A+" {{ old('blood_group', $student->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ old('blood_group', $student->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ old('blood_group', $student->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ old('blood_group', $student->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ old('blood_group', $student->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ old('blood_group', $student->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ old('blood_group', $student->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ old('blood_group', $student->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Batch ID</label>
            <input type="number" class="form-control" name="batch_id" value="{{ old('batch_id', $student->batch_id) }}">
        </div>

        {{-- Guardian Info --}}
        <h2 class="mt-4">Guardian Info</h2>

        <div class="mb-3">
            <label class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="father_name" value="{{ old('father_name', $student->father_name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Father's Mobile</label>
            <input type="tel" class="form-control" name="father_mobile" value="{{ old('father_mobile', $student->father_mobile) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Father's Email</label>
            <input type="email" class="form-control" name="father_email" value="{{ old('father_email', $student->father_email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Father's Occupation</label>
            <input type="text" class="form-control" name="father_occupation" value="{{ old('father_occupation', $student->father_occupation) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Name</label>
            <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name', $student->mother_name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Mobile</label>
            <input type="tel" class="form-control" name="mother_mobile" value="{{ old('mother_mobile', $student->mother_mobile) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Email</label>
            <input type="email" class="form-control" name="mother_email" value="{{ old('mother_email', $student->mother_email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mother's Occupation</label>
            <input type="text" class="form-control" name="mother_occupation" value="{{ old('mother_occupation', $student->mother_occupation) }}">
        </div>

        <button type="submit" class="btn btn-success">Update Student</button>
        <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection