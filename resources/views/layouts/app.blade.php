<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-mono tracking-wider">
    <div class="p-4 min-h-screen bg-neutral-900 text-white">
        @include('layouts.navigation')
        <main class="mb-20">
            @yield('content')
        </main>
    </div>
</body>
</html>
