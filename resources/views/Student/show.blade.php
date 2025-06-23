@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Student Details</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Registration Number</dt>
                        <dd class="col-sm-8">{{ $student->registration_number }}</dd>
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ $student->name }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $student->email }}</dd>
                        <dt class="col-sm-4">College Email</dt>
                        <dd class="col-sm-8">{{ $student->college_email }}</dd>
                        <dt class="col-sm-4">Mobile</dt>
                        <dd class="col-sm-8">{{ $student->mobile }}</dd>
                        <dt class="col-sm-4">Landline</dt>
                        <dd class="col-sm-8">{{ $student->landline }}</dd>
                        <dt class="col-sm-4">Blood Group</dt>
                        <dd class="col-sm-8">{{ $student->blood_group }}</dd>
                        <dt class="col-sm-4">Date of Birth</dt>
                        <dd class="col-sm-8">{{ $student->date_of_birth }}</dd>
                        <dt class="col-sm-4">Batch ID</dt>
                        <dd class="col-sm-8">{{ $student->batch_id }}</dd>
                        <dt class="col-sm-4">Father Name</dt>
                        <dd class="col-sm-8">{{ $student->father_name }}</dd>
                        <dt class="col-sm-4">Father Mobile</dt>
                        <dd class="col-sm-8">{{ $student->father_mobile }}</dd>
                        <dt class="col-sm-4">Father Occupation</dt>
                        <dd class="col-sm-8">{{ $student->father_occupation }}</dd>
                        <dt class="col-sm-4">Mother Name</dt>
                        <dd class="col-sm-8">{{ $student->mother_name }}</dd>
                        <dt class="col-sm-4">Mother Mobile</dt>
                        <dd class="col-sm-8">{{ $student->mother_mobile }}</dd>
                        <dt class="col-sm-4">Mother Occupation</dt>
                        <dd class="col-sm-8">{{ $student->mother_occupation }}</dd>
                    </dl>
                    <a href="{{ route('student.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
