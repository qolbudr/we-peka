@extends('layouts.guest')

@section('title', 'Home')

@section('content')
    <div class="relative w-full min-h-screen overflow-hidden bg-gradient-to-br from-blue-50 to-white">
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="1" fill="#8b5cf6" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Hero Section  --}}
            <section class="relative mb-16 lg:mb-24">
                <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-12">
                    <div class="order-2 lg:order-1">
                        <div
                            class="inline-block px-4 py-2 mb-4 text-sm font-medium rounded-full text-sky-700 bg-sky-100">
                            ✨ Platform Edukasi Digital
                        </div>
                        <h1 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl lg:text-6xl">
                            WE PEKA
                        </h1>
                        <p class="mb-8 text-lg leading-relaxed text-gray-600 sm:text-xl">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#tujuan"
                                class="inline-flex items-center px-6 py-3 text-base font-medium text-white transition-all duration-300 transform rounded-lg shadow-lg bg-blue-600 hover:bg-blue-700 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                                Mulai Eksplorasi
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2">
                        <div class="relative">
                            <svg class="w-full h-auto" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%"
                                        y2="100%">
                                        <stop offset="0%" style="stop-color:#60a5fa;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <circle cx="250" cy="250" r="200" fill="url(#grad1)" opacity="0.1" />
                                <circle cx="250" cy="250" r="150" fill="url(#grad1)" opacity="0.2" />
                                <circle cx="250" cy="250" r="100" fill="url(#grad1)" opacity="0.3" />
                                <path d="M250,150 L300,200 L250,250 L200,200 Z" fill="#60a5fa" opacity="0.8" />
                                <circle cx="250" cy="250" r="30" fill="#fff" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <div class="relative h-16 mb-16">
                <svg class="absolute inset-x-0 bottom-0" viewBox="0 0 1200 120" preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,50 C300,80 600,20 900,50 C1050,70 1150,50 1200,40 L1200,120 L0,120 Z" fill="#3b82f6"
                        opacity="0.1" />
                </svg>
            </div>

            {{-- Section Tujuan --}}
            <section id="tujuan" class="mb-16 lg:mb-24">
                <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-12">
                    <div class="flex items-center justify-center">
                        <div class="relative p-8 bg-blue-100 rounded-3xl">
                            <svg class="w-48 h-48 sm:w-64 sm:h-64" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="100" cy="100" r="80" fill="#3b82f6" opacity="0.2" />
                                <path d="M100,40 L130,80 L120,120 L80,120 L70,80 Z" fill="#3b82f6" />
                                <circle cx="100" cy="100" r="20" fill="#fff" />
                                <path d="M100,60 L115,90 L85,90 Z" fill="#3b82f6" />
                            </svg>
                        </div>
                    </div>

                    <div>
                        <h2 class="mb-6 text-3xl font-bold text-gray-900 sm:text-4xl lg:text-5xl">
                            Tujuan WE PEKA
                        </h2>
                        <p class="mb-6 text-lg leading-relaxed text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 w-6 h-6 mt-1 mr-3 text-blue-600" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Meningkatkan kesadaran dan pemahaman</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 w-6 h-6 mt-1 mr-3 text-blue-600" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Memberikan edukasi berkualitas</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- About Section --}}
            <section class="mb-16 lg:mb-24">
                <div class="p-8 bg-white shadow-xl rounded-3xl sm:p-12 lg:p-16">
                    <div class="max-w-3xl mx-auto text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-blue-100">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="mb-6 text-3xl font-bold text-gray-900 sm:text-4xl lg:text-5xl">
                            About WE PEKA
                        </h2>
                        <p class="text-lg leading-relaxed text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Button CTA --}}
            <section class="py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-4xl mx-auto text-center">
        <h3 class="mb-10 text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Pilih Topik Pembelajaran
        </h3>

        <div class="grid gap-8 sm:grid-cols-2 justify-center">
            <!-- Topik 1 -->
            <a href="{{ route('topiksatu') }}"
                class="relative px-10 py-8 overflow-hidden text-center text-white shadow-lg group 
                       bg-gradient-to-br from-blue-500 via-indigo-500 to-blue-700 
                       rounded-2xl hover:shadow-2xl hover:scale-105 
                       transition-all duration-300 ease-out transform w-full sm:w-72 mx-auto">
                
                <div
                    class="absolute top-0 right-0 w-24 h-24 transition-transform duration-300 transform 
                           translate-x-10 -translate-y-10 bg-white rounded-full opacity-10 
                           group-hover:scale-150">
                </div>
                
                <div class="relative">
                    <div
                        class="mb-3 text-4xl transform transition-transform duration-300 group-hover:-translate-y-1">
                        📚
                    </div>
                    <span class="text-xl font-semibold tracking-wide">Topik 1</span>
                    <p class="mt-2 text-sm opacity-90 text-blue-100">
                        Pelajari dasar-dasar pengetahuan menarik.
                    </p>
                </div>
            </a>

            <!-- Topik 2 -->
            <a href="{{ route('topikdua') }}"
                class="relative px-10 py-8 overflow-hidden text-center text-white shadow-lg group 
                       bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 
                       rounded-2xl hover:shadow-2xl hover:scale-105 
                       transition-all duration-300 ease-out transform w-full sm:w-72 mx-auto">
                
                <div
                    class="absolute top-0 right-0 w-24 h-24 transition-transform duration-300 transform 
                           translate-x-10 -translate-y-10 bg-white rounded-full opacity-10 
                           group-hover:scale-150">
                </div>
                
                <div class="relative">
                    <div
                        class="mb-3 text-4xl transform transition-transform duration-300 group-hover:-translate-y-1">
                        🎯
                    </div>
                    <span class="text-xl font-semibold tracking-wide">Topik 2</span>
                    <p class="mt-2 text-sm opacity-90 text-blue-100">
                        Fokus pada aplikasi dan penerapan nyata.
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>


            <div class="relative h-24 mt-16">
                <svg class="absolute inset-x-0 bottom-0" viewBox="0 0 1200 120" preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,60 Q300,100 600,60 T1200,60 L1200,120 L0,120 Z" fill="#3b82f6" opacity="0.05" />
                </svg>
            </div>
        </div>
    </div>
@endsection
