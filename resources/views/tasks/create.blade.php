@extends('layouts.app')

@section('title', 'New Task')

@section('content')

    <a href="{{ route('tasks.index') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Tasks
    </a>

    <div class="form-wrap">

        <div class="form-header">
            <div class="form-header-top">
                <div class="form-icon">
                    <i class="bi bi-clipboard-plus"></i>
                </div>
                <div class="form-heading">New task</div>
            </div>
            <div class="form-subheading">Fill in the details below to add a new task to your list.</div>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            {{-- Title --}}
            <div class="field-group">
                <label class="field-label">
                    <i class="bi bi-pencil"></i> Title <span class="req">*</span>
                </label>
                <div class="input-wrap">
                    <i class="bi bi-pencil field-icon"></i>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}"
                           placeholder="e.g. Submit project report"
                           autofocus>
                </div>
                @error('title')
                    <div class="enhanced-error">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="field-group">
                <label class="field-label">
                    <i class="bi bi-text-left"></i> Description
                </label>
                <div class="input-wrap">
                    <textarea name="description"
                              rows="4"
                              id="description"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Optional details about this task">{{ old('description') }}</textarea>
                </div>
                <div class="char-count"><span id="desc-count">0</span> / 500</div>
                @error('description')
                    <div class="enhanced-error">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Due Date --}}
            <div class="field-group">
                <label class="field-label">
                    <i class="bi bi-calendar3"></i> Due Date
                </label>
                <div class="input-wrap">
                    <i class="bi bi-calendar-event field-icon"></i>
                    <input type="date"
                           name="due_date"
                           class="form-control @error('due_date') is-invalid @enderror"
                           value="{{ old('due_date') }}">
                </div>
                <div class="field-hint">
                    <i class="bi bi-info-circle"></i> Must be a future date.
                </div>
                @error('due_date')
                    <div class="enhanced-error">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-gradient">
                    <i class="bi bi-check-lg"></i> Create task
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>

        </form>
    </div>

    <script>
        const textarea = document.getElementById('description');
        const counter = document.getElementById('desc-count');
        if (textarea && counter) {
            counter.textContent = textarea.value.length;
            textarea.addEventListener('input', function() {
                counter.textContent = this.value.length;
            });
        }
    </script>

@endsection