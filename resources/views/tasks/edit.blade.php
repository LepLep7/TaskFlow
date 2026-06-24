@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="text-decoration-none text-muted small">
            <i class="bi bi-arrow-left"></i> Back to Tasks
        </a>
        <h1 class="mt-2">Edit Task</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text"
                           id="title"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $task->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date"
                               id="due_date"
                               name="due_date"
                               class="form-control @error('due_date') is-invalid @enderror"
                               value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status"
                                name="status"
                                class="form-select @error('status') is-invalid @enderror">
                            <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Task
                    </button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>

            </form>

        </div>
    </div>

@endsection