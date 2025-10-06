<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'We Peka') }} - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen font-sans antialiased text-gray-900 bg-gray-50">
        {{-- Header --}}
        @include('layouts.partials.guest-navigation')

        {{-- Wrapper --}}
        <div class="min-h-screen">
            <main class="container px-4 py-8 mx-auto">
                {{-- Main Content --}}
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('layouts.partials.guest-footer')
        </div>

        {{-- JavaScripts --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        @yield('scripts')
    </body>


</html>
