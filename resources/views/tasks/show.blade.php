@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <a href="{{ route('tasks.index') }}" class="text-decoration-none text-muted small">
                <i class="bi bi-arrow-left"></i> Back to Tasks
            </a>
            <h1 class="mt-2">{{ $task->title }}</h1>
        </div>

        @if ($task->isCompleted())
            <span class="badge bg-success fs-6">Completed</span>
        @else
            <span class="badge bg-warning text-dark fs-6">Pending</span>
        @endif
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <h6 class="text-muted">Description</h6>
            <p class="mb-4">
                {{ $task->description ?? 'No description provided.' }}
            </p>

            <div class="row mb-4">
                <div class="col-md-4">
                    <h6 class="text-muted">Due Date</h6>
                    <p>{{ $task->due_date?->format('d M Y') ?? 'No due date' }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $task->created_at->format('d M Y, h:i A') }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">Last Updated</h6>
                    <p>{{ $task->updated_at->format('d M Y, h:i A') }}</p>
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-primary">
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
    </div>

@endsection