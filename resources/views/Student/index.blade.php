<!-- resources/views/student/index.blade.php -->
@extends('layouts.master')

@section('main_content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Students</h1>
          </div><!-- /.col -->
       <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <a href="{{ route('student.create') }}" class="btn btn-primary mb-3">Add New Student</a>

        <!-- Table to display students -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Registration No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>College Email</th>
                    <th>Mobile</th>
                    <th>Landline</th>
                    <th>Blood Group</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $student->registration_number }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->college_email }}</td>
    <td>{{ $student->mobile }}</td>
    <td>{{ $student->landline }}</td>
    <td>{{ $student->blood_group }}</td>
    <td>{{ $student->date_of_birth }}</td>
    <td>
    <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-info" title="View Details">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <form method="POST" action="{{ route('student.destroy', $student->id) }}" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">
            Delete
        </button>
    </form>
    </td>
</tr>
@endforeach
  </tbody>
  </table>
    </div>
</section>

@endsection