@extends('layouts.guest')

@section('title', 'Topik 1')

@section('content')
    <div class="relative w-full min-h-screen py-16 overflow-hidden bg-gradient-to-br from-blue-50 via-sky-50 to-white">
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="contentPattern" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1.5" fill="#8b5cf6" />
                </pattern>
                <rect width="100%" height="100%" fill="url(#contentPattern)" />
            </svg>
        </div>

        <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="/"
                    class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white transition-all duration-300 transform rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-sky-600 hover:shadow-xl hover:scale-105 hover:from-blue-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

            {{-- Bagian konten utama --}}
            <section class="mb-16">
                <div class="overflow-hidden bg-white shadow-xl rounded-3xl">
                    <div class="grid items-center gap-8 lg:grid-cols-2">
                        <div class="p-8 lg:p-12">
                            <div
                                class="inline-block px-4 py-2 mb-4 text-sm font-medium rounded-full text-blue-700 bg-blue-100">
                                Konsep Dasar
                            </div>
                            <h1 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">
                                Definisi Efikasi Karir
                            </h1>
                            <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                <span class="font-bold text-blue-600">Efikasi karir adalah</span> keyakinan diri seseorang
                                terhadap kemampuannya untuk berhasil dalam melakukan tugas-tugas yang berkaitan dengan
                                pengembangan, pilihan, dan penyesuaian karir.
                            </p>
                            <p class="text-base leading-relaxed text-gray-600">
                                Seseorang dengan efikasi karir yang tinggi akan lebih termotivasi, berani menghadapi
                                tantangan, dan mampu membuat keputusan karir yang lebih rasional dan realistis.
                            </p>
                        </div>
                        <div class="flex items-center justify-center p-8 bg-gradient-to-br from-blue-100 to-sky-100 lg:p-12">
                            <svg class="w-full h-auto max-w-md" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#0284c7;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <circle cx="200" cy="150" r="120" fill="url(#grad1)" opacity="0.1" />
                                <circle cx="200" cy="150" r="90" fill="url(#grad1)" opacity="0.2" />
                                <path d="M200,80 L240,120 L200,160 L160,120 Z" fill="#3b82f6" />
                                <circle cx="200" cy="150" r="30" fill="white" />
                                <path d="M190,145 L200,155 L220,135" stroke="#3b82f6" stroke-width="4" fill="none"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Bagian 2 --}}
            <section class="mb-16">
                <div class="overflow-hidden bg-white shadow-xl rounded-3xl">
                    <div class="grid items-center gap-8 lg:grid-cols-2">
                        <div class="flex items-center justify-center order-2 p-8 bg-gradient-to-br from-sky-100 to-cyan-100 lg:order-1 lg:p-12">
                            <svg class="w-full h-auto max-w-md" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#06b6d4;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#0ea5e9;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <rect x="100" y="80" width="60" height="140" fill="url(#grad2)" opacity="0.3" rx="8" />
                                <rect x="170" y="60" width="60" height="160" fill="url(#grad2)" opacity="0.5" rx="8" />
                                <rect x="240" y="40" width="60" height="180" fill="url(#grad2)" opacity="0.7" rx="8" />
                                <circle cx="200" cy="100" r="40" fill="#06b6d4" />
                                <path d="M185,100 L195,110 L215,90" stroke="white" stroke-width="4" fill="none"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="order-1 p-8 lg:order-2 lg:p-12">
                            <div class="inline-block px-4 py-2 mb-4 text-sm font-medium text-cyan-700 bg-cyan-100 rounded-full">
                                Manfaat Utama
                            </div>
                            <h2 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">
                                Pentingnya Efikasi Karir
                            </h2>
                            <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                <span class="font-bold text-cyan-600">Pentingnya efikasi karir</span> adalah untuk
                                meningkatkan kepercayaan diri individu dalam menentukan pilihan karir, mengurangi
                                kebimbangan dan kesulitan dalam membuat keputusan, serta membantu mengarahkan pada
                                pengembangan karir yang lebih baik.
                            </p>
                            <p class="text-base leading-relaxed text-gray-600">
                                Individu dengan efikasi karir yang tinggi cenderung memiliki kejelasan tujuan, lebih
                                terfokus pada kegiatan relevan, dan lebih mampu mengelola diri dalam menapaki jenjang karir
                                mereka.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="mb-16">
                <div class="overflow-hidden bg-white shadow-xl rounded-3xl">
                    <div class="grid items-center gap-8 lg:grid-cols-2">
                        <div class="p-8 lg:p-12">
                            <div class="inline-block px-4 py-2 mb-4 text-sm font-medium text-indigo-700 bg-indigo-100 rounded-full">
                                Komponen Penting
                            </div>
                            <h2 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">
                                Aspek Efikasi Karir
                            </h2>
                            <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                <span class="font-bold text-indigo-600">Aspek efikasi karir menurut Taylor dan Betz
                                    (1983)</span> meliputi penilaian diri yang akurat, pengumpulan informasi tentang
                                pekerjaan, pemilihan tujuan karir, perencanaan masa depan, dan pemecahan masalah terkait
                                karir.
                            </p>
                            <p class="text-base leading-relaxed text-gray-600">
                                Aspek-aspek ini mencakup keyakinan individu akan kemampuannya untuk melakukan tugas-tugas
                                yang diperlukan dalam proses pengambilan keputusan karir, mulai dari memahami diri sendiri
                                hingga merencanakan dan mengatasi tantangan di masa depan.
                            </p>
                        </div>
                        <div class="flex items-center justify-center p-8 bg-gradient-to-br from-indigo-100 to-blue-100 lg:p-12">
                            <svg class="w-full h-auto max-w-md" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="200" cy="150" r="80" fill="#6366f1" opacity="0.2" />
                                <circle cx="200" cy="150" r="60" fill="#6366f1" opacity="0.3" />
                                <circle cx="200" cy="150" r="40" fill="#6366f1" opacity="0.4" />
                                <circle cx="200" cy="70" r="20" fill="#6366f1" />
                                <circle cx="280" cy="150" r="20" fill="#6366f1" />
                                <circle cx="200" cy="230" r="20" fill="#6366f1" />
                                <circle cx="120" cy="150" r="20" fill="#6366f1" />
                                <circle cx="200" cy="150" r="25" fill="#4f46e5" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            
            <div class="flex justify-center mt-20">
                <a href="{{ route('test-efikasikarir') }}"
                    class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white transition-all duration-300 transform rounded-xl shadow-lg bg-gradient-to-r from-blue-600 via-sky-600 to-indigo-600 hover:from-blue-700 hover:via-sky-700 hover:to-indigo-700 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    Lanjut ke Pengukuran Efikasi Karir
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
