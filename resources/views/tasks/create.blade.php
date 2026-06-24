@extends('layouts.app')

@section('title', 'New Task')

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="text-decoration-none text-muted small">
            <i class="bi bi-arrow-left"></i> Back to Tasks
        </a>
        <h1 class="mt-2">New Task</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text"
                           id="title"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}"
                           placeholder="e.g. Submit project report">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Optional details about this task">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date"
                           id="due_date"
                           name="due_date"
                           class="form-control @error('due_date') is-invalid @enderror"
                           value="{{ old('due_date') }}">
                    <div class="form-text">Must be a future date.</div>
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Create Task
                    </button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>

            </form>

        </div>
    </div>

@endsection