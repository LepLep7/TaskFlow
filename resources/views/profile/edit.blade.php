@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <div class="page-header">
        <h1 class="page-title">Profile</h1>
    </div>

    <div class="row g-4">

        <div class="col-lg-4">
            <div style="background:#fff;border-radius:16px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,0.07);text-align:center;">

                {{-- Avatar --}}
                @if (auth()->user()->profile_photo)
                    <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                        alt="Profile Photo"
                        style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin:0 auto 12px;display:block;border:3px solid #EEEDFE;">
                @else
                    <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#534AB7,#1D9E75);display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700;color:#fff;margin:0 auto 12px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif

                <div style="font-size:16px;font-weight:600;color:#1a1a2e;">{{ auth()->user()->name }}</div>
                <div style="font-size:13px;color:#aaa;margin-top:2px;">{{ auth()->user()->email }}</div>

                {{-- Upload photo form --}}
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                    style="margin-top:16px;">
                    @csrf
                    @method('PATCH')

                    {{-- Hidden fields supaya validation pass --}}
                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                    <label for="profile_photo"
                        style="display:inline-flex;align-items:center;gap:6px;background:#EEEDFE;color:#534AB7;border:none;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:500;cursor:pointer;">
                        <i class="bi bi-camera"></i>
                        Change photo
                        <input type="file"
                            id="profile_photo"
                            name="profile_photo"
                            accept="image/*"
                            style="display:none;"
                            onchange="this.form.submit()">
                    </label>

                    @error('profile_photo')
                        <div style="font-size:12px;color:#A32D2D;margin-top:6px;background:#FCEBEB;padding:6px 10px;border-radius:6px;">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror

                    <div style="font-size:11px;color:#bbb;margin-top:8px;">
                        JPG, PNG, GIF — max 2MB
                    </div>
                </form>

                {{-- Stats --}}
                <div style="margin-top:16px;padding-top:16px;border-top:1px solid #f0f0f0;display:flex;justify-content:space-around;text-align:center;">
                    <div>
                        <div style="font-size:20px;font-weight:700;color:#534AB7;">{{ auth()->user()->tasks()->count() }}</div>
                        <div style="font-size:11px;color:#aaa;">Total</div>
                    </div>
                    <div>
                        <div style="font-size:20px;font-weight:700;color:#BA7517;">{{ auth()->user()->tasks()->pending()->count() }}</div>
                        <div style="font-size:11px;color:#aaa;">Pending</div>
                    </div>
                    <div>
                        <div style="font-size:20px;font-weight:700;color:#0F6E56;">{{ auth()->user()->tasks()->completed()->count() }}</div>
                        <div style="font-size:11px;color:#aaa;">Done</div>
                    </div>
                </div>

                <div style="margin-top:16px;padding-top:16px;border-top:1px solid #f0f0f0;text-align:left;">
                    <div style="font-size:13px;color:#555;display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                        <i class="bi bi-calendar3" style="color:#534AB7;"></i>
                        Joined {{ auth()->user()->created_at->format('d M Y') }}
                    </div>
                    <div style="font-size:13px;color:#555;display:flex;align-items:center;gap:8px;">
                        <i class="bi bi-shield-check" style="color:#1D9E75;"></i>
                        Account active
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-8">

            {{-- Update Name & Email --}}
            <div style="background:#fff;border-radius:16px;padding:28px;box-shadow:0 2px 12px rgba(0,0,0,0.07);margin-bottom:20px;">

                <div style="display:flex;align-items:center;gap:12px;margin-bottom:6px;">
                    <div style="width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#EEEDFE,#E1F5EE);display:flex;align-items:center;justify-content:center;color:#534AB7;font-size:18px;">
                        <i class="bi bi-person"></i>
                    </div>
                    <div>
                        <div style="font-size:16px;font-weight:600;color:#1a1a2e;">Personal information</div>
                        <div style="font-size:12px;color:#aaa;">Update your name and email address.</div>
                    </div>
                </div>

                <hr style="border-color:#f0f0f0;margin:16px 0;">

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:500;color:#555;margin-bottom:6px;display:block;">Name</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', auth()->user()->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:500;color:#555;margin-bottom:6px;display:block;">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-gradient">
                        <i class="bi bi-check-lg"></i> Save changes
                    </button>

                </form>
            </div>

            {{-- Change Password --}}
            <div style="background:#fff;border-radius:16px;padding:28px;box-shadow:0 2px 12px rgba(0,0,0,0.07);margin-bottom:20px;">

                <div style="display:flex;align-items:center;gap:12px;margin-bottom:6px;">
                    <div style="width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#FAEEDA,#E1F5EE);display:flex;align-items:center;justify-content:center;color:#BA7517;font-size:18px;">
                        <i class="bi bi-lock"></i>
                    </div>
                    <div>
                        <div style="font-size:16px;font-weight:600;color:#1a1a2e;">Change password</div>
                        <div style="font-size:12px;color:#aaa;">Use a strong password to keep your account secure.</div>
                    </div>
                </div>

                <hr style="border-color:#f0f0f0;margin:16px 0;">

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:500;color:#555;margin-bottom:6px;display:block;">Current Password</label>
                        <input type="password" name="current_password"
                               class="form-control @error('current_password', 'updatePassword') is-invalid @enderror">
                        @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:500;color:#555;margin-bottom:6px;display:block;">New Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password', 'updatePassword') is-invalid @enderror">
                        @error('password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:500;color:#555;margin-bottom:6px;display:block;">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn-gradient" style="background:linear-gradient(135deg,#BA7517,#1D9E75);">
                        <i class="bi bi-shield-check"></i> Update password
                    </button>

                </form>
            </div>

            {{-- Danger Zone --}}
            <div style="background:#fff;border-radius:16px;padding:28px;box-shadow:0 2px 12px rgba(0,0,0,0.07);border:1.5px solid #FCEBEB;">

                <div style="display:flex;align-items:center;gap:12px;margin-bottom:6px;">
                    <div style="width:38px;height:38px;border-radius:10px;background:#FCEBEB;display:flex;align-items:center;justify-content:center;color:#A32D2D;font-size:18px;">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <div>
                        <div style="font-size:16px;font-weight:600;color:#A32D2D;">Danger zone</div>
                        <div style="font-size:12px;color:#aaa;">Once deleted, your account and all tasks cannot be recovered.</div>
                    </div>
                </div>

                <hr style="border-color:#FCEBEB;margin:16px 0;">

                <form method="POST" action="{{ route('profile.destroy') }}"
                      onsubmit="return confirm('Are you sure? This will permanently delete your account and ALL your tasks.');">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label style="font-size:13px;font-weight:500;color:#A32D2D;margin-bottom:6px;display:block;">Confirm your password to delete account</label>
                        <input type="password" name="password"
                               class="form-control"
                               placeholder="Enter your password"
                               style="border-color:#f0a0a0;">
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" style="background:linear-gradient(135deg,#A32D2D,#E24B4A);color:#fff;border:none;padding:10px 20px;border-radius:10px;font-size:14px;font-weight:500;cursor:pointer;display:inline-flex;align-items:center;gap:7px;">
                        <i class="bi bi-trash"></i> Delete account
                    </button>

                </form>
            </div>

        </div>

    </div>

@endsection