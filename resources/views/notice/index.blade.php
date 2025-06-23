@extends('layouts.master')

@section('main_content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Notices</h2>
        @if(auth()->user() && auth()->user()->hasRole('Admin'))
        <a href="{{ route('notice.create') }}" class="btn btn-primary">Create Notice</a>
        @endif
    </div>
    <div class="row">
        @forelse ($notices as $notice)
            <div class="col-12 mb-4">
                <div class="card shadow-sm h-100 w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $notice->title }}</h5>
                        <p class="card-text mb-1">
                            <strong>For:</strong> {{ $notice->isForAll ? 'All' : ($notice->isFor ?? 'N/A') }}
                        </p>
                        <p class="card-text mb-1">
                            <strong>Type:</strong>
                            @if($notice->isTuRelated)
                                <span class="badge bg-info">TU Related</span>
                            @endif
                            @if($notice->isHoliday)
                                <span class="badge bg-danger">Holiday</span>
                            @endif
                        </p>
                            <p class="card-text">
                            <small class="text-muted">Published Date: {{ $notice->created_at->format('Y-m-d H:i') }}</small><br>
                            <small class="text-muted"> Posted By: {{ $notice->creator->name ?? 'N/A' }} </small>
                            </p>
                        <p class="card-text">
                            {{ $notice->description}}
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            @if(auth()->user() && auth()->user()->hasRole('Admin'))
                                <a href="{{ route('notice.edit', $notice->id) }}" class="btn btn-sm btn-warning mx-1">Edit</a>
                                <form action="{{ route('notice.destroy', $notice->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger mx-1">Delete</button>
                                </form>
                                <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-sm btn-info mx-1">View</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">No notices found.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
