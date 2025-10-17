@extends('layouts.auth-layout')

@section('title', 'Register Choosen')

@section('content')
    <div class="relative w-full max-w-2xl p-6 bg-white shadow rounded-2xl md:p-10">
        {{-- Decorative Elements --}}
        <div
            class="absolute top-0 left-0 w-32 h-32 rounded-full pointer-events-none -z-10 bg-blue-200 opacity-20 blur-3xl">
        </div>
        <div
            class="absolute bottom-0 right-0 w-40 h-40 bg-indigo-300 rounded-full pointer-events-none -z-10 opacity-20 blur-3xl">
        </div>

        {{-- Header --}}
        <div class="relative col-span-2 mb-6 text-center">
            <div class="absolute inset-0 opacity-50 -z-10 rounded-xl bg-gradient-to-r from-blue-100 to-indigo-100 blur-sm">
            </div>
            <h1 class="text-3xl font-bold text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text">
                Selamat Datang di We Peka
            </h1>
            <p class="mt-2 text-sm text-gray-600 md:text-base">Pilih jenis akun untuk melanjutkan</p>
            <div class="flex justify-center gap-2 mt-3">
                <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                <span class="w-2 h-2 rounded-full bg-blue-400"></span>
            </div>
        </div>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-10">
            {{-- Siswa Card --}}
            <a href="{{ route('register.student') }}"
                class="relative flex flex-col items-center justify-center h-full p-6 transition-all duration-300 border-2 group rounded-xl border-blue-200 bg-gradient-to-br from-blue-50 to-purple-50 hover:-translate-y-2 hover:border-blue-400 hover:shadow-xl md:p-8">

                {{-- Glow --}}
                <div
                    class="absolute inset-0 transition-opacity duration-300 opacity-0 pointer-events-none -z-10 rounded-xl bg-gradient-to-br from-blue-400 to-indigo-500 blur-xl group-hover:opacity-30">
                </div>

                {{-- Icon --}}
                <div class="relative mb-4 md:mb-6">
                    <div
                        class="absolute inset-0 transition-transform duration-300 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 group-hover:scale-110">
                    </div>
                    <div
                        class="relative flex items-center justify-center w-16 h-16 transition-transform duration-300 bg-white rounded-full group-hover:rotate-6 md:h-20 md:w-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600 md:h-10 md:w-10"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span
                        class="absolute px-2 py-1 text-xs font-semibold text-white transition-transform duration-300 rounded-full -right-2 -top-2 bg-blue-500 group-hover:scale-110">✨</span>
                </div>

                <h5 class="text-xl font-bold text-blue-700 md:text-2xl">Siswa</h5>
                <p class="mt-1 text-xs text-center text-gray-600 md:text-sm">Akses layanan konseling</p>

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 mt-4 transition-transform duration-300 text-blue-400 group-hover:translate-x-1"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            {{-- Guru Card --}}
            <a href="{{ route('register.teacher') }}"
                class="relative flex flex-col items-center justify-center h-full p-6 transition-all duration-300 border-2 border-indigo-200 group rounded-xl bg-gradient-to-br from-indigo-50 to-violet-50 hover:-translate-y-2 hover:border-indigo-400 hover:shadow-xl md:p-8">

                {{-- Glow --}}
                <div
                    class="absolute inset-0 transition-opacity duration-300 opacity-0 pointer-events-none -z-10 rounded-xl bg-gradient-to-br from-indigo-400 to-violet-500 blur-xl group-hover:opacity-30">
                </div>

                {{-- Icon --}}
                <div class="relative mb-4 md:mb-6">
                    <div
                        class="absolute inset-0 transition-transform duration-300 rounded-full bg-gradient-to-br from-indigo-400 to-violet-500 group-hover:scale-110">
                    </div>
                    <div
                        class="relative flex items-center justify-center w-16 h-16 transition-transform duration-300 bg-white rounded-full group-hover:rotate-6 md:h-20 md:w-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600 md:h-10 md:w-10"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span
                        class="absolute px-2 py-1 text-xs font-semibold text-white transition-transform duration-300 bg-indigo-500 rounded-full -right-2 -top-2 group-hover:scale-110">🎓</span>
                </div>

                <h5 class="text-xl font-bold text-indigo-700 md:text-2xl">Guru BK</h5>
                <p class="mt-1 text-xs text-center text-gray-600 md:text-sm">Berikan layanan konseling</p>

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 mt-4 text-indigo-400 transition-transform duration-300 group-hover:translate-x-1"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        {{-- Footer --}}
        <div class="mt-8 text-center">
            <p class="text-xs text-gray-500 md:text-sm">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                    class="font-semibold text-transparent transition-colors bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text hover:from-blue-700 hover:to-indigo-700">
                    Login di sini
                </a>
            </p>
            <div class="flex items-center justify-center mt-4">
                <div class="h-px w-28 bg-gradient-to-r from-transparent via-blue-300 to-transparent"></div>
            </div>
        </div>

    </div>
@endsection
