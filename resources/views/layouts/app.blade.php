<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskFlow') - TaskFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/taskflow.css') }}">
</head>
<body>

<div class="app-wrapper">

    @include('layouts.navigation')

    <main class="main-content">

        @if (session('success'))
            <div class="flash-success">
                <span><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" style="background:none;border:none;cursor:pointer;color:#3B6D11;font-size:16px;">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div class="flash-error">
                <span><i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" style="background:none;border:none;cursor:pointer;color:#A32D2D;font-size:16px;">&times;</button>
            </div>
        @endif

        @yield('content')

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>