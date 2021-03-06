<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('font/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
</head>
<body>
        @include('layouts.partials.navbar')
        <main class="py-4">
            @yield('content')
        </main>
        <script src="{{ asset('js/app.js') }}" defer></script> 
        <script src="{{ asset('admin/js/prism.js') }}" defer></script>
</body>
</html>
