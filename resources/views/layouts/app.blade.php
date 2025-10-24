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

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        {{-- Izitoast --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.partials.app-navigation')

            <!-- Page Content -->
            <main>
                {{-- Sidebar --}}
                @include('layouts.partials.app-sidebar')

                {{-- Content --}}
                <div class="p-4 sm:ml-72">
                    @yield('content')
                </div>
            </main>
        </div>

        {{-- JavaScripts --}}

        {{-- jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        {{-- iziToast --}}
        <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        {{-- Sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield('scripts')
    </body>

</html>
