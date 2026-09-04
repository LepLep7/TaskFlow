@extends('layouts.app')

@section('title', 'New Task')

@section('content')

    <a href="{{ route('tasks.index') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Tasks
    </a>

    <div class="page-header">
        <h1 class="page-title">New Task</h1>
    </div>

    <div class="form-card">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}"
                       placeholder="e.g. Submit project report">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Optional details about this task">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date"
                       class="form-control @error('due_date') is-invalid @enderror"
                       value="{{ old('due_date') }}">
                <div style="font-size:12px;color:#aaa;margin-top:4px;">Must be a future date.</div>
                @error('due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-gradient">
                    <i class="bi bi-check-lg"></i> Create Task
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>

@endsection