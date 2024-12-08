<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-[#141414] via-[#0E0E0E] to-[#1A1A1A] text-gray-200">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-black/70 via-black/60 to-black/50">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-red-600" />
            </a>
        </div>
        <div class="font-extralight fill-current text-red-600">
            <h2>
                Login
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gradient-to-br from-[#1F1F1F] via-[#2C2C2C] to-[#262626] shadow-xl shadow-red-900/20 border border-gray-800 overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    </body>
</html>
