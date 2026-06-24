@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 class="mb-4">Welcome, {{ auth()->user()->name }} 👋</h1>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Tasks</h6>
                    <h2 class="fw-bold">{{ $totalTasks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Pending</h6>
                    <h2 class="fw-bold text-warning">{{ $pendingTasks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Completed</h6>
                    <h2 class="fw-bold text-success">{{ $completedTasks }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Recent Tasks</h5>
        <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
    </div>

    @forelse ($recentTasks as $task)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $task->title }}</strong>
                    <div class="text-muted small">
                        Due: {{ $task->due_date?->format('d M Y') ?? 'No due date' }}
                    </div>
                </div>

                @if ($task->isCompleted())
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-warning text-dark">Pending</span>
                @endif
            </div>
        </div>
    @empty
        <p class="text-muted">No tasks yet. <a href="{{ route('tasks.create') }}">Add your first task.</a></p>
    @endforelse

@endsection