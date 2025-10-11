@extends('layouts.guest')

@section('title', 'Topik 1')

@section('content')
    <div class="relative w-full min-h-screen py-16 overflow-hidden bg-gradient-to-br from-violet-50 via-purple-50 to-white">
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
                    class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white transition-all duration-300 transform rounded-lg shadow-lg bg-gradient-to-r from-violet-600 to-purple-600 hover:shadow-xl hover:scale-105 hover:from-violet-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

            <section class="mb-16">
                <div class="overflow-hidden bg-white shadow-xl rounded-3xl">
                    <div class="grid items-center gap-8 lg:grid-cols-2">
                        <div class="p-8 lg:p-12">
                            <div
                                class="inline-block px-4 py-2 mb-4 text-sm font-medium rounded-full text-violet-700 bg-violet-100">
                                Konsep Dasar
                            </div>
                            <h1 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">
                                Definisi Efikasi Karir
                            </h1>
                            <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                <span class="font-bold text-violet-600">Efikasi karir adalah</span> keyakinan diri seseorang
                                terhadap kemampuannya untuk berhasil dalam melakukan tugas-tugas yang berkaitan dengan
                                pengembangan, pilihan, dan penyesuaian karir.
                            </p>
                            <p class="text-base leading-relaxed text-gray-600">
                                Seseorang dengan efikasi karir yang tinggi akan lebih termotivasi, berani menghadapi
                                tantangan, dan mampu membuat keputusan karir yang lebih rasional dan realistis.
                            </p>
                        </div>
                        <div
                            class="flex items-center justify-center p-8 bg-gradient-to-br from-violet-100 to-purple-100 lg:p-12">
                            <svg class="w-full h-auto max-w-md" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%"
                                        y2="100%">
                                        <stop offset="0%" style="stop-color:#8b5cf6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#6366f1;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <circle cx="200" cy="150" r="120" fill="url(#grad1)" opacity="0.1" />
                                <circle cx="200" cy="150" r="90" fill="url(#grad1)" opacity="0.2" />
                                <path d="M200,80 L240,120 L200,160 L160,120 Z" fill="#8b5cf6" />
                                <circle cx="200" cy="150" r="30" fill="white" />
                                <path d="M190,145 L200,155 L220,135" stroke="#8b5cf6" stroke-width="4" fill="none"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-16">
                <div class="overflow-hidden bg-white shadow-xl rounded-3xl">
                    <div class="grid items-center gap-8 lg:grid-cols-2">
                        <div
                            class="flex items-center justify-center order-2 p-8 bg-gradient-to-br from-purple-100 to-pink-100 lg:order-1 lg:p-12">
                            <svg class="w-full h-auto max-w-md" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%"
                                        y2="100%">
                                        <stop offset="0%" style="stop-color:#a855f7;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <rect x="100" y="80" width="60" height="140" fill="url(#grad2)" opacity="0.3"
                                    rx="8" />
                                <rect x="170" y="60" width="60" height="160" fill="url(#grad2)" opacity="0.5"
                                    rx="8" />
                                <rect x="240" y="40" width="60" height="180" fill="url(#grad2)" opacity="0.7"
                                    rx="8" />
                                <circle cx="200" cy="100" r="40" fill="#a855f7" />
                                <path d="M185,100 L195,110 L215,90" stroke="white" stroke-width="4" fill="none"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="order-1 p-8 lg:order-2 lg:p-12">
                            <div
                                class="inline-block px-4 py-2 mb-4 text-sm font-medium text-purple-700 bg-purple-100 rounded-full">
                                Manfaat Utama
                            </div>
                            <h2 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">
                                Pentingnya Efikasi Karir
                            </h2>
                            <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                <span class="font-bold text-purple-600">Pentingnya efikasi karir</span> adalah untuk
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
                            <div
                                class="inline-block px-4 py-2 mb-4 text-sm font-medium text-indigo-700 bg-indigo-100 rounded-full">
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
                        <div
                            class="flex items-center justify-center p-8 bg-gradient-to-br from-indigo-100 to-blue-100 lg:p-12">
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

            <section>
                <div
                    class="overflow-hidden shadow-2xl bg-gradient-to-br from-violet-600 via-purple-600 to-indigo-600 rounded-3xl">
                    <div class="p-8 lg:p-12">
                        <div class="max-w-4xl mx-auto">
                            <div
                                class="inline-block px-4 py-2 mb-6 text-sm font-medium bg-white rounded-full text-violet-900">
                                Faktor Pembentuk
                            </div>
                            <h2 class="mb-8 text-4xl font-bold leading-tight text-white sm:text-5xl">
                                Sumber Efikasi Karir
                            </h2>

                            <div class="grid gap-6 md:grid-cols-2">
                                <div
                                    class="p-6 transition-all duration-300 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                                                <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-2 text-lg font-bold text-white">Pengalaman Penguasaan Pribadi
                                            </h3>
                                            <p class="text-sm leading-relaxed text-white/90">
                                                Ini adalah sumber paling kuat dalam membentuk efikasi diri. Individu akan
                                                memiliki keyakinan yang lebih tinggi terhadap kemampuannya jika mereka telah
                                                berhasil dalam tugas atau aktivitas sebelumnya.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="p-6 transition-all duration-300 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-2 text-lg font-bold text-white">Pengalaman Vicarious</h3>
                                            <p class="text-sm leading-relaxed text-white/90">
                                                Dengan melihat orang lain yang mirip dengan diri mereka berhasil dalam
                                                karier, individu dapat merasa bahwa mereka juga mampu mencapai hal yang
                                                sama.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="p-6 transition-all duration-300 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-2 text-lg font-bold text-white">Persuasi Verbal</h3>
                                            <p class="text-sm leading-relaxed text-white/90">
                                                Ini adalah dorongan dan keyakinan yang diberikan orang lain kepada individu.
                                                Dukungan dan kata-kata positif dari lingkungan dapat meningkatkan keyakinan
                                                diri seseorang.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="p-6 transition-all duration-300 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-2 text-lg font-bold text-white">Afek (Kondisi Emosional)</h3>
                                            <p class="text-sm leading-relaxed text-white/90">
                                                Perasaan dan suasana hati individu dapat memengaruhi efikasi diri. Kondisi
                                                emosional yang positif dapat meningkatkan keyakinan, sementara kecemasan
                                                dapat menguranginya.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
