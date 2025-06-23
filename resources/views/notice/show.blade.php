@extends('layouts.master')

@section('main_content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">{{ $notice->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>For:</strong> {{ $notice->isForAll ? 'All' : ($notice->isFor ?? 'N/A') }}
                    </div>
                    <div class="mb-3">
                        <strong>Type:</strong>
                        @if($notice->isTuRelated)
                            <span class="badge bg-info">TU Related</span>
                        @endif
                        @if($notice->isHoliday)
                            <span class="badge bg-success">Holiday</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Created By:</strong> {{ $notice->creator->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>Created At:</strong> {{ $notice->created_at->format('Y-m-d H:i') }}<br>
                        <strong>Updated At:</strong> {{ $notice->updated_at->format('Y-m-d H:i') }}
                    </div>
                    <a href="{{ route('notice.index') }}" class="btn btn-secondary">Back to Notices</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
