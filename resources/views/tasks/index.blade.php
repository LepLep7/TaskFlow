@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

    <div class="page-header">
        <h1 class="page-title">My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> New Task
        </a>
    </div>

    @if ($tasks->isEmpty())
        <div class="empty-state">
            <i class="bi bi-clipboard-x"></i>
            <p>No tasks yet. Start by adding one!</p>
            <a href="{{ route('tasks.create') }}" class="btn-gradient">Add Your First Task</a>
        </div>
    @else
        @foreach ($tasks as $task)
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

                <div class="d-flex gap-2">
                    @if ($task->isCompleted())
                        <form action="{{ route('tasks.pending', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="icon-action" title="Mark as Pending">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('tasks.complete', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="icon-action success" title="Mark as Completed">
                                <i class="bi bi-check-lg"></i>
                            </button>
                        </form>
                    @endif

                    <a href="{{ route('tasks.edit', $task) }}" class="icon-action" title="Edit">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                          onsubmit="return confirm('Delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="icon-action danger" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center mt-4">
            {{ $tasks->links() }}
        </div>
    @endif

@endsection