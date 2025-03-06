<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="{
    theme: localStorage.getItem('theme') ||
        localStorage.setItem('theme', 'system')
}" x-init="$watch('theme', val => localStorage.setItem('theme', val))"
    x-bind:class="{
        'dark': theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)')
            .matches)
    }"
    class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' - ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}</title>

    <meta name="description"
        content="Desc ">
    <meta name="keywords"
        content="Kaesa">
    <meta property="og:title"
        content="{{ isset($title) ? $title . ' - ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}">
    <meta property="og:description"
        content="Desc ">
    <meta property="og:image" content="/favicon.ico"> <!-- atau link gambar yang lebih besar -->
    <meta property="og:url" content="{{ request()->url() }}">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Image Icons --}}
    <link rel="icon" type="image/png" href="/favicon.ico">

    @stack('styles')
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-950">

        <!-- Page Heading -->
        @isset($header)
            {{ $header }}
        @else
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @isset($footer)
            {{ $footer }}
        @else
        @endisset
    </div>

    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
