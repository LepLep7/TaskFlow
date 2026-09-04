@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

    <a href="{{ route('tasks.index') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to Tasks
    </a>

    <div class="form-wrap">

        <div class="form-header">
            <div class="form-header-top">
                <div class="form-icon" style="background: linear-gradient(135deg, #E1F5EE, #EEEDFE);">
                    <i class="bi bi-pencil-square" style="color:#1D9E75;"></i>
                </div>
                <div class="form-heading">Edit task</div>
            </div>
            <div class="form-subheading">Update the details for "{{ $task->title }}".</div>
        </div>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

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
                           value="{{ old('title', $task->title) }}"
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
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>
                </div>
                <div class="char-count"><span id="desc-count">0</span> / 500</div>
                @error('description')
                    <div class="enhanced-error">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Due Date + Status --}}
            <div class="form-field-row">

                <div class="field-group" style="margin-bottom:0;">
                    <label class="field-label">
                        <i class="bi bi-calendar3"></i> Due Date
                    </label>
                    <div class="input-wrap">
                        <i class="bi bi-calendar-event field-icon"></i>
                        <input type="date"
                               name="due_date"
                               class="form-control @error('due_date') is-invalid @enderror"
                               value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">
                    </div>
                    @error('due_date')
                        <div class="enhanced-error">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field-group" style="margin-bottom:0;">
                    <label class="field-label">
                        <i class="bi bi-circle-half"></i> Status
                    </label>

                    @php $currentStatus = old('status', $task->status); @endphp

                    <input type="hidden" name="status" id="status-input" value="{{ $currentStatus }}">

                    <div class="status-options">
                        <div class="status-option {{ $currentStatus === 'pending' ? 'is-pending' : '' }}"
                             onclick="selectStatus('pending')">
                            <div class="status-dot dot-pending"></div>
                            <span class="status-text">Pending</span>
                        </div>
                        <div class="status-option {{ $currentStatus === 'completed' ? 'is-completed' : '' }}"
                             onclick="selectStatus('completed')">
                            <div class="status-dot dot-completed"></div>
                            <span class="status-text">Completed</span>
                        </div>
                    </div>

                    @error('status')
                        <div class="enhanced-error">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="form-footer">
                <button type="submit" class="btn-gradient">
                    <i class="bi bi-check-lg"></i> Update task
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

        function selectStatus(value) {
            document.getElementById('status-input').value = value;
            document.querySelectorAll('.status-option').forEach(function(el) {
                el.classList.remove('is-pending', 'is-completed');
            });
            const options = document.querySelectorAll('.status-option');
            if (value === 'pending') {
                options[0].classList.add('is-pending');
            } else {
                options[1].classList.add('is-completed');
            }
        }
    </script>

@endsection