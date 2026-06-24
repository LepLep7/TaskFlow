@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> New Task
        </a>
    </div>

    @if ($tasks->isEmpty())

        <div class="text-center py-5">
            <i class="bi bi-clipboard-x" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No tasks yet.</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Your First Task</a>
        </div>

    @else

        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="text-decoration-none fw-semibold">
                                    {{ $task->title }}
                                </a>
                            </td>
                            <td>
                                {{ $task->due_date?->format('d M Y') ?? '-' }}
                            </td>
                            <td>
                                @if ($task->isCompleted())
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td class="text-end">

                                @if ($task->isCompleted())
                                    <form action="{{ route('tasks.pending', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-warning" title="Mark as Pending">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('tasks.complete', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Mark as Completed">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $tasks->links() }}
        </div>

    @endif

@endsection