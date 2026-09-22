@extends('layouts.guest')

@section('title', 'Register')

@section('content')

    <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div style="width: 100%; max-width: 480px;">

            {{-- Logo & Title --}}
            <div style="text-align:center; margin-bottom: 28px;">
                <div style="width:56px;height:56px;border-radius:14px;background:rgba(255,255,255,0.2);backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px;color:#fff;border:1px solid rgba(255,255,255,0.3);">
                    <i class="bi bi-check2-square"></i>
                </div>
                <div style="font-size:22px;font-weight:700;color:#fff;">Create an account</div>
                <div style="font-size:13px;color:rgba(255,255,255,0.8);margin-top:4px;">Join TaskFlow and start managing your tasks</div>
            </div>

            {{-- Card --}}
            <div style="background:rgba(255,255,255,0.92);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-radius:20px;padding:36px;box-shadow:0 8px 32px rgba(0,0,0,0.18);border:1px solid rgba(255,255,255,0.5);">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:600;color:#555;margin-bottom:6px;display:block;">
                            Full Name
                        </label>
                        <div style="position:relative;">
                            <i class="bi bi-person" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#bbb;font-size:15px;"></i>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   style="padding-left:36px;border-radius:10px;border:1.5px solid #e8e8e8;background:#fafafa;"
                                   value="{{ old('name') }}"
                                   placeholder="Alif Hykal"
                                   autofocus>
                        </div>
                        @error('name')
                            <div style="font-size:12px;color:#A32D2D;margin-top:5px;background:#FCEBEB;padding:6px 10px;border-radius:6px;">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

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
                                   placeholder="you@example.com">
                        </div>
                        @error('email')
                            <div style="font-size:12px;color:#A32D2D;margin-top:5px;background:#FCEBEB;padding:6px 10px;border-radius:6px;">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:600;color:#555;margin-bottom:6px;display:block;">
                            Password
                        </label>
                        <div style="position:relative;">
                            <i class="bi bi-lock" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#bbb;font-size:15px;"></i>
                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   style="padding-left:36px;border-radius:10px;border:1.5px solid #e8e8e8;background:#fafafa;"
                                   placeholder="Min. 8 characters">
                        </div>
                        @error('password')
                            <div style="font-size:12px;color:#A32D2D;margin-top:5px;background:#FCEBEB;padding:6px 10px;border-radius:6px;">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label style="font-size:13px;font-weight:600;color:#555;margin-bottom:6px;display:block;">
                            Confirm Password
                        </label>
                        <div style="position:relative;">
                            <i class="bi bi-lock-fill" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#bbb;font-size:15px;"></i>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   style="padding-left:36px;border-radius:10px;border:1.5px solid #e8e8e8;background:#fafafa;"
                                   placeholder="Repeat your password">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            style="width:100%;background:linear-gradient(135deg,#534AB7,#1D9E75);color:#fff;border:none;padding:12px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;">
                        <i class="bi bi-person-plus"></i> Create account
                    </button>

                </form>

            </div>

            {{-- Login link --}}
            <div style="text-align:center;margin-top:20px;font-size:13px;color:rgba(255,255,255,0.8);">
                Already have an account?
                <a href="{{ route('login') }}" style="color:#fff;font-weight:700;text-decoration:none;">
                    Log in
                </a>
            </div>

        </div>
    </div>

@endsection