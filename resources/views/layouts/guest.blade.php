<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskFlow') - TaskFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #3d3494 0%, #534AB7 30%, #1D9E75 70%, #0f6e56 100%);
            position: relative;
            overflow-x: hidden;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.35;
            pointer-events: none;
        }

        .blob-1 {
            width: 500px;
            height: 500px;
            background: #7F77DD;
            top: -120px;
            left: -120px;
            animation: float1 12s ease-in-out infinite;
        }

        .blob-2 {
            width: 400px;
            height: 400px;
            background: #1D9E75;
            bottom: -100px;
            right: -100px;
            animation: float2 15s ease-in-out infinite;
        }

        .blob-3 {
            width: 300px;
            height: 300px;
            background: #AFA9EC;
            top: 40%;
            left: 60%;
            animation: float3 10s ease-in-out infinite;
        }

        .blob-4 {
            width: 250px;
            height: 250px;
            background: #5DCAA5;
            top: 20%;
            right: 20%;
            animation: float4 18s ease-in-out infinite;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%       { transform: translate(60px, 40px) scale(1.08); }
            66%       { transform: translate(-30px, 60px) scale(0.95); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%       { transform: translate(-50px, -40px) scale(1.1); }
            66%       { transform: translate(40px, -60px) scale(0.92); }
        }

        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%       { transform: translate(-80px, 50px) scale(1.15); }
        }

        @keyframes float4 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25%       { transform: translate(40px, 30px) scale(0.9); }
            75%       { transform: translate(-30px, -50px) scale(1.1); }
        }

        .guest-main {
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }

        .flash-success {
            background: rgba(234, 243, 222, 0.95);
            border-left: 4px solid #1D9E75;
            color: #3B6D11;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div>

    <main class="guest-main container py-5">

        @if (session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>