@extends('layouts.master')

@section('main_content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}">
                <i class="fa fa-plus"></i> Create New User
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success" role="alert"> 
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
   <tr>
       <th>No</th>
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th width="280px">Action</th>
   </tr>

   @php $i = ($users->currentPage() - 1) * $users->perPage(); @endphp

   @foreach ($users as $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @foreach($user->getRoleNames() as $roleName)
               <label class="badge bg-success">{{ $roleName }}</label>
          @endforeach
        </td>
        <td>
             <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">
                <i class="fa-solid fa-list"></i> Show
             </a>
             <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">
                <i class="fa-solid fa-pen-to-square"></i> Edit
             </a>
              <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline" onsubmit="return confirm('Are you sure want to delete this user?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fa-solid fa-trash"></i> Delete
                  </button>
              </form>
        </td>
    </tr>
   @endforeach
</table>

{!! $users->links('pagination::bootstrap-5') !!}
@endsection
