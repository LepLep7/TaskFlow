@extends('layouts.guest')

@section('title', 'Log In')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-check2-square" style="font-size: 2.5rem; color: #0d6efd;"></i>
                <h2 class="mt-2">Log In to TaskFlow</h2>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Log In</button>

                        <div class="d-flex justify-content-between mt-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-decoration-none">
                                    Forgot your password?
                                </a>
                            @endif

                            <a href="{{ route('register') }}" class="small text-decoration-none">
                                Don't have an account? Register
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection