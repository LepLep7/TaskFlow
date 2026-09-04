@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="page-header">
        <h1 class="page-title">Good day, {{ auth()->user()->name }} 👋</h1>
        <a href="{{ route('tasks.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> New Task
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card stat-total">
                <div class="stat-label">Total Tasks</div>
                <div class="stat-number text-purple">{{ $totalTasks }}</div>
                <div class="stat-sub">All time</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card stat-pending">
                <div class="stat-label">Pending</div>
                <div class="stat-number text-amber">{{ $pendingTasks }}</div>
                <div class="stat-sub">In progress</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card stat-completed">
                <div class="stat-label">Completed</div>
                <div class="stat-number text-teal">{{ $completedTasks }}</div>
                <div class="stat-sub">Well done!</div>
            </div>
        </div>
    </div>

    <div class="section-heading">
        Recent Tasks
        <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>

    @forelse ($recentTasks as $task)
        <div class="task-card">
            <div class="task-check {{ $task->isCompleted() ? 'completed' : '' }}">
                @if ($task->isCompleted())
                    <i class="bi bi-check" style="font-size:12px;"></i>
                @endif
            </div>
            <div style="flex:1;">
                <a href="{{ route('tasks.show', $task) }}"
                   class="task-title-text {{ $task->isCompleted() ? 'is-completed' : '' }}">
                    {{ $task->title }}
                </a>
                <div class="task-due-text">
                    <i class="bi bi-calendar3"></i>
                    {{ $task->due_date?->format('d M Y') ?? 'No due date' }}
                </div>
            </div>
            @if ($task->isCompleted())
                <span class="badge-completed">Completed</span>
            @else
                <span class="badge-pending">Pending</span>
            @endif
        </div>
    @empty
        <div class="empty-state">
            <i class="bi bi-clipboard-x"></i>
            <p>No tasks yet.</p>
            <a href="{{ route('tasks.create') }}" class="btn-gradient">Add your first task</a>
        </div>
    @endforelse

@endsection