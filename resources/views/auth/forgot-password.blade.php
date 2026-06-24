@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-key" style="font-size: 2.5rem; color: #0d6efd;"></i>
                <h2 class="mt-2">Forgot Password</h2>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <p class="text-muted small">
                        Enter your email and we'll send you a password reset link.
                    </p>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Email Password Reset Link
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection