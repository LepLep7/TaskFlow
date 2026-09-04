@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <a href="{{ route('tasks.index') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Tasks
    </a>

    <div class="page-header">
        <h1 class="page-title">{{ $task->title }}</h1>
        @if ($task->isCompleted())
            <span class="badge-completed" style="font-size:13px;padding:6px 14px;">Completed</span>
        @else
            <span class="badge-pending" style="font-size:13px;padding:6px 14px;">Pending</span>
        @endif
    </div>

    <div class="form-card">

        <div class="mb-4">
            <div class="form-label">Description</div>
            <p style="color:#444;font-size:15px;line-height:1.7;">
                {{ $task->description ?? 'No description provided.' }}
            </p>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="form-label">Due Date</div>
                <p style="font-size:15px;">
                    <i class="bi bi-calendar3 me-1" style="color:#534AB7;"></i>
                    {{ $task->due_date?->format('d M Y') ?? 'No due date' }}
                </p>
            </div>
            <div class="col-md-4">
                <div class="form-label">Created At</div>
                <p style="font-size:15px;">
                    <i class="bi bi-clock me-1" style="color:#1D9E75;"></i>
                    {{ $task->created_at->format('d M Y, h:i A') }}
                </p>
            </div>
            <div class="col-md-4">
                <div class="form-label">Last Updated</div>
                <p style="font-size:15px;">
                    <i class="bi bi-arrow-clockwise me-1" style="color:#BA7517;"></i>
                    {{ $task->updated_at->format('d M Y, h:i A') }}
                </p>
            </div>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('tasks.edit', $task) }}" class="btn-gradient">
                <i class="bi bi-pencil"></i> Edit
            </a>

            @if ($task->isCompleted())
                <form action="{{ route('tasks.pending', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-outline-warning">
                        <i class="bi bi-arrow-counterclockwise"></i> Mark as Pending
                    </button>
                </form>
            @else
                <form action="{{ route('tasks.complete', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-outline-success">
                        <i class="bi bi-check-lg"></i> Mark as Completed
                    </button>
                </form>
            @endif

            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                  onsubmit="return confirm('Delete this task? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>

    </div>

@endsection