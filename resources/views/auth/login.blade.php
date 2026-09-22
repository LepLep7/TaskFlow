@extends('layouts.guest')

@section('title', 'Log In')

@section('content')

    <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div style="width: 100%; max-width: 480px;">

            {{-- Logo & Title --}}
            <div style="text-align:center; margin-bottom: 28px;">
                <div style="width:56px;height:56px;border-radius:14px;background:rgba(255,255,255,0.2);backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px;color:#fff;border:1px solid rgba(255,255,255,0.3);">
                    <i class="bi bi-check2-square"></i>
                </div>
                <div style="font-size:22px;font-weight:700;color:#fff;">Welcome back</div>
                <div style="font-size:13px;color:rgba(255,255,255,0.8);margin-top:4px;">Log in to your TaskFlow account</div>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div style="background:#EAF3DE;border-left:4px solid #1D9E75;color:#3B6D11;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:14px;">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Card --}}
            <div style="background:rgba(255,255,255,0.92);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-radius:20px;padding:36px;box-shadow:0 8px 32px rgba(0,0,0,0.18);border:1px solid rgba(255,255,255,0.5);">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:600;color:#555;margin-bottom:6px;display:block;">
                            Email Address
                        </label>
                        <div style="position:relative;">
                            <i class="bi bi-envelope" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#bbb;font-size:15px;"></i>
                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   style="padding-left:36px;border-radius:10px;border:1.5px solid #e8e8e8;background:#fafafa;"
                                   value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   autofocus>
                        </div>
                        @error('email')
                            <div style="font-size:12px;color:#A32D2D;margin-top:5px;background:#FCEBEB;padding:6px 10px;border-radius:6px;">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
                            <label style="font-size:13px;font-weight:600;color:#555;">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   style="font-size:12px;color:#534AB7;text-decoration:none;">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div style="position:relative;">
                            <i class="bi bi-lock" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#bbb;font-size:15px;"></i>
                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   style="padding-left:36px;border-radius:10px;border:1.5px solid #e8e8e8;background:#fafafa;"
                                   placeholder="Your password">
                        </div>
                        @error('password')
                            <div style="font-size:12px;color:#A32D2D;margin-top:5px;background:#FCEBEB;padding:6px 10px;border-radius:6px;">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="mb-4" style="display:flex;align-items:center;gap:8px;">
                        <input type="checkbox"
                               name="remember"
                               id="remember"
                               style="width:16px;height:16px;accent-color:#534AB7;cursor:pointer;">
                        <label for="remember" style="font-size:13px;color:#666;cursor:pointer;margin:0;">
                            Remember me
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            style="width:100%;background:linear-gradient(135deg,#534AB7,#1D9E75);color:#fff;border:none;padding:12px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;">
                        <i class="bi bi-box-arrow-in-right"></i> Log in
                    </button>

                </form>

            </div>

            {{-- Register link --}}
            <div style="text-align:center;margin-top:20px;font-size:13px;color:rgba(255,255,255,0.8);">
                Don't have an account?
                <a href="{{ route('register') }}" style="color:#fff;font-weight:700;text-decoration:none;">
                    Create one
                </a>
            </div>

        </div>
    </div>

@endsection