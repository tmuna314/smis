@extends('layouts.master')
@section('title','educationalInfo')
@section('main_content')
<div class="container">
    <h1>Educational Information</h1>
    <a href="{{ route('educationalInfo.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Symbol No</th>
                <th>Board</th>
                <th>Passed Year</th>
                <th>Marks Obtained</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educationalInfos as $info)
            <tr>
                <td>{{ $info->id }}</td>
                <td>{{ $info->student_id }}</td>
                <td>{{ $info->symbol_no }}</td>
                <td>{{ $info->board }}</td>
                <td>{{ $info->passed_year }}</td>
                <td>{{ $info->marks_obtained }}</td>
                <td>
                    <a href="{{ route('educationalInfo.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <!-- Delete Form -->
                    <form action="{{ route('educationalInfo.destroy', $info->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
