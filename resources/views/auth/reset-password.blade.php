@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-key" style="font-size: 2.5rem; color: #0d6efd;"></i>
                <h2 class="mt-2">Reset Password</h2>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $request->email) }}"
                                   required
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection