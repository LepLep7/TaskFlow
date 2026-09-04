@php
    $initials = collect(explode(' ', auth()->user()->name))
        ->map(fn($w) => strtoupper($w[0]))
        ->take(2)
        ->implode('');
@endphp

<aside class="sidebar">
    <a class="sidebar-brand" href="{{ route('dashboard') }}">
        <i class="bi bi-check2-square"></i> TaskFlow
    </a>

    <a href="{{ route('dashboard') }}"
       class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2"></i> Dashboard
    </a>

    <a href="{{ route('tasks.index') }}"
       class="nav-item {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
        <i class="bi bi-list-check"></i> My Tasks
    </a>

    <a href="{{ route('profile.edit') }}"
       class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i> Profile
    </a>

    <div class="sidebar-user">
        <div class="sidebar-avatar">{{ $initials }}</div>
        <div>
            <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="sidebar-user-action"
                        style="background:none;border:none;padding:0;cursor:pointer;">
                    Log out
                </button>
            </form>
        </div>
    </div>
</aside>