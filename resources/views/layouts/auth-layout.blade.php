<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'We Peka') }} - @yield('title')</title>

        <link rel="icon" href="{{ asset('images/wepeka-logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Izitoast --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen font-sans antialiased text-gray-900 bg-gray-50">
        <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-blue-600">
            <div class="relative flex items-center justify-center min-h-screen p-4 overflow-hidden md:p-6">
                {{-- Decorative rings --}}
                <div
                    class="absolute border-4 rounded-full pointer-events-none -bottom-32 -left-20 h-96 w-96 border-white/20">
                </div>
                <div
                    class="pointer-events-none absolute bottom-20 left-20 h-[28rem] w-[28rem] rounded-full border-4 border-white/20">
                </div>
                <div
                    class="pointer-events-none absolute -top-20 -right-20 h-[35rem] w-[35rem] rounded-full border-4 border-white/20">
                </div>

                {{-- Floating shapes --}}
                <div
                    class="absolute w-10 h-10 rotate-45 rounded-lg pointer-events-none top-20 left-6 md:left-20 bg-white/20 animate-bounce">
                </div>
                <div
                    class="absolute w-8 h-8 rounded-full pointer-events-none bottom-10 left-10 md:left-44 bg-white/20 animate-pulse">
                </div>
                <div
                    class="absolute w-12 h-12 rounded-full pointer-events-none right-10 md:right-36 top-1/3 bg-white/20 animate-ping">
                </div>

                {{-- Content --}}
                @yield('content')
            </div>
        </div>

        {{-- JavaScripts --}}

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- iziToast -->
        <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

        @yield('scripts')
    </body>

</html>
