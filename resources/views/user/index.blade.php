<!-- resources/views/user/index.blade.php -->
@extends('layouts.master')

@section('main_content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
      <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Add New User</a>

        <!-- Table to display users -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

    <form method="POST" action="{{ route('user.destroy', $user->id) }}" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
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