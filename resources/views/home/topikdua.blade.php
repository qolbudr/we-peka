@extends('layouts.guest')

@section('title', 'Topik 2')

@section('content')
    <div class="relative w-full min-h-screen py-16 overflow-hidden bg-gradient-to-br from-blue-50 via-sky-50 to-white">
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="tabPattern" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1.5" fill="#8b5cf6" />
                </pattern>
                <rect width="100%" height="100%" fill="url(#tabPattern)" />
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

            <div class="overflow-hidden bg-white shadow-2xl rounded-3xl">
                <div class="grid gap-0 lg:grid-cols-12">
                    <div class="p-6 lg:col-span-3 bg-gradient-to-br from-blue-600 via-sky-600 to-indigo-600">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white">Materi Pembelajaran</h3>
                            <p class="mt-1 text-sm text-white/80">Pilih topik untuk dipelajari</p>
                        </div>

                        <nav class="space-y-2">
                            <button id="tab-penilaian" onclick="showTab('penilaian')"
                                class="w-full flex items-center px-4 py-3.5 text-left text-white transition-all duration-200 rounded-xl tab-btn bg-white/20 backdrop-blur-sm hover:bg-white/30 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3 transition-transform group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                                <span class="font-medium">Penilaian Diri</span>
                            </button>

                            <button id="tab-informasi" onclick="showTab('informasi')"
                                class="w-full flex items-center px-4 py-3.5 text-left text-white transition-all duration-200 rounded-xl tab-btn bg-white/10 hover:bg-white/30 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3 transition-transform group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium">Informasi Karir</span>
                            </button>

                            <button id="tab-tujuan" onclick="showTab('tujuan')"
                                class="w-full flex items-center px-4 py-3.5 text-left text-white transition-all duration-200 rounded-xl tab-btn bg-white/10 hover:bg-white/30 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3 transition-transform group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                                <span class="font-medium">Pemilihan Tujuan</span>
                            </button>

                            <button id="tab-perencanaan" onclick="showTab('perencanaan')"
                                class="w-full flex items-center px-4 py-3.5 text-left text-white transition-all duration-200 rounded-xl tab-btn bg-white/10 hover:bg-white/30 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3 transition-transform group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span class="font-medium">Perencanaan</span>
                            </button>

                            <button id="tab-pemecahan" onclick="showTab('pemecahan')"
                                class="w-full flex items-center px-4 py-3.5 text-left text-white transition-all duration-200 rounded-xl tab-btn bg-white/10 hover:bg-white/30 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3 transition-transform group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                <span class="font-medium">Pemecahan Masalah</span>
                            </button>

                            <button id="tab-lkpd" onclick="showTab('lkpd')"
                                class="w-full flex items-center px-4 py-3.5 text-left text-white transition-all duration-200 rounded-xl tab-btn bg-white/10 hover:bg-white/30 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3 transition-transform group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span class="font-medium">LKPD</span>
                            </button>
                        </nav>
                    </div>

                    <div class="p-8 lg:col-span-9 lg:p-12">
                        <div id="content-penilaian" class="tab-content">
                            <div class="mb-6">
                                <div
                                    class="inline-block px-4 py-2 mb-4 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">
                                    Dimensi 1
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">Dimensi Penilaian Diri</h2>
                            </div>
                            <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl">
                                <p class="text-lg leading-relaxed text-gray-700">
                                    <span class="font-bold text-blue-600">Dimensi penilaian diri</span> adalah berbagai
                                    aspek yang dievaluasi oleh individu tentang dirinya sendiri, seperti kinerja,
                                    keterampilan, nilai-nilai, kekuatan, kelemahan, dan pencapaian. Dimensi-dimensi ini
                                    digunakan untuk introspeksi guna mendapatkan pemahaman yang lebih baik tentang diri
                                    sendiri, mendorong pertumbuhan pribadi, dan menyelaraskan tujuan pribadi dengan tujuan
                                    organisasi.
                                </p>
                                <div class="text-center mt-6">
                <a href="{{ route('test-multipleintelligent') }}"
                   class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-orange-500 to-blue-600 
                          rounded-full shadow-md hover:scale-105 hover:shadow-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                    Mulai Tes Multiple Intelligence
                </a>
            </div>
                            </div>
                        </div>

                        <div id="content-informasi" class="hidden tab-content">
                            <div class="mb-6">
                                <div
                                    class="inline-block px-4 py-2 mb-4 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">
                                    Dimensi 2
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">Informasi Karir</h2>
                            </div>

                            <div class="space-y-6">
                                <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl">
                                    <h3 class="flex items-center mb-4 text-2xl font-bold text-blue-700">
                                        <svg class="w-6 h-6 mr-2 text-blue-700" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Tentang Dimensi Informasi Karir
                                    </h3>

                                    <p class="text-lg leading-relaxed text-gray-700">
                                        <span class="font-bold text-blue-600">Dimensi informasi karier</span> adalah aspek
                                        kematangan karier yang mengukur sejauh mana seseorang aktif mencari dan menggunakan
                                        informasi tentang dunia kerja, serta sejauh mana mereka memiliki pengetahuan yang
                                        memadai mengenai pilihan karier. Ini mencakup sikap terhadap sumber informasi
                                        (seperti orang tua, guru, atau konselor), motivasi untuk eksplorasi karier, dan
                                        pemahaman tentang berbagai jenis pekerjaan serta tuntutan di dalamnya.
                                    </p>
                                </div>

                                <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl">
                                    <h3 class="flex items-center mb-4 text-2xl font-bold text-blue-700">
                                        <svg class="w-6 h-6 mr-2 text-blue-700" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        Eksplorasi Pilihan Studi
                                    </h3>

                                    @include('home.universitas')
                                </div>
                            </div>
                        </div>

                        <div id="content-tujuan" class="hidden space-y-8 tab-content">
                            <div>
                                <div
                                    class="inline-block px-4 py-2 mb-4 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">
                                    Dimensi 3
                                </div>
                                <h2 class="mb-4 text-3xl font-bold text-gray-900">Pemilihan Tujuan</h2>
                                <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl">
                                    <p class="text-lg leading-relaxed text-gray-700">
                                        <span class="font-bold text-blue-600">Dimensi pemilihan tujuan</span> merujuk
                                        pada aspek-aspek yang membentuk proses penetapan dan pencapaian tujuan, yang
                                        mencakup jangka waktu (jangka pendek, menengah, panjang), arah (dari atas ke bawah,
                                        bawah ke atas, atau horizontal), dan sifat (misalnya, apakah tujuannya spesifik atau
                                        umum).
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">Chaos Theory</h3>
                                <div class="p-6 bg-gradient-to-br from-indigo-50 to-sky-50 rounded-2xl">
                                    <p class="text-base leading-relaxed text-gray-700">
                                        <span class="font-bold text-indigo-600">Chaos theory</span> adalah pendekatan
                                        pengembangan karier yang melihat karier sebagai proses yang kompleks, dinamis, dan
                                        tidak dapat diprediksi, yang dipengaruhi oleh banyak faktor yang terus berubah.
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">Tujuan Chaos Theory</h3>
                                <div class="p-6 bg-gradient-to-br from-sky-50 to-cyan-50 rounded-2xl">
                                    <p class="text-base leading-relaxed text-gray-700">
                                        <span class="font-bold text-sky-600">Tujuan chaos theory</span> adalah untuk
                                        membantu individu menavigasi ketidakpastian dan kompleksitas karier dengan
                                        menanamkan pola pikir yang adaptif, tangguh, dan fleksibel.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="content-perencanaan" class="hidden space-y-8 tab-content">
                            <div>
                                <div
                                    class="inline-block px-4 py-2 mb-4 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">
                                    Dimensi 4
                                </div>
                                <h2 class="mb-4 text-3xl font-bold text-gray-900">Dimensi Perencanaan</h2>
                                <div class="p-6 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl">
                                    <p class="text-lg leading-relaxed text-gray-700">
                                        <span class="font-bold text-blue-600">Dimensi perencanaan dalam efikasi
                                            karir</span> merujuk pada tiga dimensi utama dari keyakinan individu terhadap
                                        kemampuan mereka untuk melakukan tugas-tugas yang diperlukan dalam perencanaan
                                        karir.
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">Metode SMART</h3>
                                <div class="p-6 mb-6 bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl">
                                    <p class="mb-4 text-base leading-relaxed text-gray-700">
                                        <span class="font-bold text-cyan-600">Metode SMART</span> adalah kerangka kerja
                                        perencanaan yang menguraikan tujuan menjadi kriteria: Specific (Spesifik),
                                        Measurable (Terukur), Achievable (Dapat Dicapai), Relevant (Relevan), dan Time-bound
                                        (Terikat Waktu).
                                    </p>
                                </div>

                                <h4 class="mb-4 text-xl font-bold text-gray-900">Contoh Penerapan Metode SMART</h4>
                                <div class="p-6 space-y-4 bg-white border-2 border-teal-200 rounded-2xl">
                                    <div class="p-4 bg-teal-50 rounded-xl">
                                        <p class="mb-2 font-bold text-teal-800">Tujuan Awal:</p>
                                        <p class="text-gray-700">Ingin menjadi profesional di bidang digital marketing</p>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="flex items-start p-3 space-x-3 rounded-lg bg-violet-50">
                                            <span
                                                class="flex items-center justify-center flex-shrink-0 w-8 h-8 font-bold text-white rounded-lg bg-violet-600">S</span>
                                            <div>
                                                <p class="font-semibold text-violet-900">Specific:</p>
                                                <p class="text-sm text-gray-700">"Saya ingin mendapatkan posisi sebagai
                                                    Digital Marketing Specialist di perusahaan rintisan yang sedang
                                                    berkembang."</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start p-3 space-x-3 rounded-lg bg-indigo-50">
                                            <span
                                                class="flex items-center justify-center flex-shrink-0 w-8 h-8 font-bold text-white bg-indigo-600 rounded-lg">M</span>
                                            <div>
                                                <p class="font-semibold text-indigo-900">Measurable:</p>
                                                <ul class="mt-1 space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>Menyelesaikan 3 kursus online terkait SEO, SEM, dan Content
                                                        Marketing</li>
                                                    <li>Membangun portofolio proyek marketing di 2 perusahaan</li>
                                                    <li>Melamar ke minimal 50 lowongan pekerjaan selama 3 bulan</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="flex items-start p-3 space-x-3 rounded-lg bg-blue-50">
                                            <span
                                                class="flex items-center justify-center flex-shrink-0 w-8 h-8 font-bold text-white bg-blue-600 rounded-lg">A</span>
                                            <div>
                                                <p class="font-semibold text-blue-900">Achievable:</p>
                                                <ul class="mt-1 space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>Mendaftar kursus dan belajar 2 jam setiap malam</li>
                                                    <li>Mendaftar magang di perusahaan sesuai minat</li>
                                                    <li>Mendapatkan referensi dari profesional</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="flex items-start p-3 space-x-3 rounded-lg bg-purple-50">
                                            <span
                                                class="flex items-center justify-center flex-shrink-0 w-8 h-8 font-bold text-white bg-purple-600 rounded-lg">R</span>
                                            <div>
                                                <p class="font-semibold text-purple-900">Relevant:</p>
                                                <p class="text-sm text-gray-700">"Posisi ini sangat relevan dengan minat
                                                    saya dan akan membuka banyak peluang di masa depan."</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start p-3 space-x-3 rounded-lg bg-pink-50">
                                            <span
                                                class="flex items-center justify-center flex-shrink-0 w-8 h-8 font-bold text-white bg-pink-600 rounded-lg">T</span>
                                            <div>
                                                <p class="font-semibold text-pink-900">Time-bound:</p>
                                                <ul class="mt-1 space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>Menyelesaikan 3 kursus dalam 4 bulan</li>
                                                    <li>Menyelesaikan portofolio dalam 3 bulan</li>
                                                    <li>Mengirimkan 50 lamaran dalam 3 bulan</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="content-pemecahan" class="hidden space-y-8 tab-content">
                            <div>
                                <div
                                    class="inline-block px-4 py-2 mb-4 text-sm font-medium text-orange-700 bg-orange-100 rounded-full">
                                    Dimensi 5
                                </div>
                                <h2 class="mb-4 text-3xl font-bold text-gray-900">Pemecahan Masalah</h2>
                                <div class="p-6 bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl">
                                    <p class="text-lg leading-relaxed text-gray-700">
                                        <span class="font-bold text-orange-600">Dimensi pemecahan masalah</span> dalam
                                        efikasi karir merujuk pada keyakinan individu terhadap kemampuannya untuk mengatasi
                                        tugas-tugas karier yang bervariasi tingkat kesulitannya.
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">Contoh Tantangan dalam Merencanakan Karir
                                </h3>
                                <div class="p-6 bg-gradient-to-br from-amber-50 to-yellow-50 rounded-2xl">
                                    <p class="text-base leading-relaxed text-gray-700">
                                        <span class="font-bold text-amber-600">Contoh tantangan</span> meliputi kurangnya
                                        keterampilan yang relevan, tidak adanya tujuan karir yang jelas, lingkungan kerja
                                        yang tidak mendukung, perubahan industri yang cepat, serta kesulitan menyeimbangkan
                                        antara karir dan kehidupan pribadi.
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">Video Motivasi</h3>
                                <div class="overflow-hidden bg-gray-900 shadow-2xl rounded-2xl aspect-video">
                                    <iframe class="w-full h-full"
                                        src="https://www.youtube.com/embed/Il7wvSC6xvs?si=cdxKDZaKAPm269Wl"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>

                        <div id="content-lkpd" class="hidden tab-content">
                            <div class="mb-8">
                                <div
                                    class="inline-block px-4 py-2 mb-4 text-sm font-medium rounded-full text-emerald-700 bg-emerald-100">
                                    Latihan
                                </div>
                                <h2 class="mb-2 text-3xl font-bold text-gray-900">LKPD Perencanaan Karier (SMART)</h2>
                                <p class="text-gray-600">Lengkapi form berikut untuk merencanakan karier menggunakan metode
                                    SMART</p>
                            </div>

                            <form class="space-y-6">
                                <div
                                    class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-violet-300 focus-within:border-violet-500 focus-within:shadow-lg">
                                    <label for="specific" class="block mb-3 text-base font-semibold text-gray-900">
                                        <span class="flex items-center">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 mr-2 text-white rounded-lg bg-violet-600">1</span>
                                            Apa tujuan karier yang ingin kamu capai secara jelas?
                                        </span>
                                    </label>
                                    <textarea id="specific" name="specific" rows="3"
                                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-violet-500 focus:bg-white"
                                        placeholder="Contoh: Saya ingin menjadi..."></textarea>
                                </div>

                                <div
                                    class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-indigo-300 focus-within:border-indigo-500 focus-within:shadow-lg">
                                    <label for="measurable" class="block mb-3 text-base font-semibold text-gray-900">
                                        <span class="flex items-center">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-indigo-600 rounded-lg">2</span>
                                            Bagaimana kamu bisa mengukur kemajuan menuju tujuan tersebut?
                                        </span>
                                    </label>
                                    <textarea id="measurable" name="measurable" rows="3"
                                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                                        placeholder="Contoh: Menyelesaikan 3 kursus, membangun portofolio..."></textarea>
                                </div>

                                <div
                                    class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-blue-300 focus-within:border-blue-500 focus-within:shadow-lg">
                                    <label for="achievable" class="block mb-3 text-base font-semibold text-gray-900">
                                        <span class="flex items-center">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-blue-600 rounded-lg">3</span>
                                            Apakah tujuan ini realistis? Langkah apa yang akan dilakukan?
                                        </span>
                                    </label>
                                    <textarea id="achievable" name="achievable" rows="3"
                                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white"
                                        placeholder="Contoh: Belajar 2 jam setiap malam, mendaftar magang..."></textarea>
                                </div>

                                <div
                                    class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-purple-300 focus-within:border-purple-500 focus-within:shadow-lg">
                                    <label for="relevant" class="block mb-3 text-base font-semibold text-gray-900">
                                        <span class="flex items-center">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-purple-600 rounded-lg">4</span>
                                            Mengapa tujuan ini penting bagimu?
                                        </span>
                                    </label>
                                    <textarea id="relevant" name="relevant" rows="3"
                                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:bg-white"
                                        placeholder="Contoh: Sesuai dengan minat saya di bidang..."></textarea>
                                </div>

                                <div
                                    class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-pink-300 focus-within:border-pink-500 focus-within:shadow-lg">
                                    <label for="timebound" class="block mb-3 text-base font-semibold text-gray-900">
                                        <span class="flex items-center">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-pink-600 rounded-lg">5</span>
                                            Kapan kamu menargetkan tujuan ini tercapai?
                                        </span>
                                    </label>
                                    <textarea id="timebound" name="timebound" rows="3"
                                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-pink-500 focus:bg-white"
                                        placeholder="Contoh: Dalam 3 bulan, 6 bulan, 1 tahun..."></textarea>
                                </div>

                                <div class="flex justify-center pt-4">
                                    <button type="submit"
                                        class="inline-flex items-center px-8 py-4 text-base font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-violet-600 to-purple-600 rounded-xl hover:shadow-2xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Kirim Jawaban
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));

            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('bg-white/20', 'backdrop-blur-sm', 'shadow-lg');
                b.classList.add('bg-white/10');
            });

            document.getElementById('content-' + tabName).classList.remove('hidden');

            const activeBtn = document.getElementById('tab-' + tabName);
            activeBtn.classList.remove('bg-white/10');
            activeBtn.classList.add('bg-white/20', 'backdrop-blur-sm', 'shadow-lg');
        }

        document.addEventListener('DOMContentLoaded', function() {
            showTab('penilaian');
        });
    </script>

    {{-- Universitas --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.study-tab-btn');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-tabs-target');
                    const targetPanel = document.querySelector(targetId);

                    // Hide all panels
                    document.querySelectorAll('[role="tabpanel"]').forEach(panel => {
                        panel.classList.add('hidden');
                    });

                    tabButtons.forEach(btn => {
                        btn.classList.remove('bg-white', 'text-blue-700', 'shadow-md');

                        btn.classList.add('bg-white/20', 'text-white/90',
                            'hover:bg-white/40', 'hover:text-white',
                            'hover:-translate-y-0.5');
                        btn.setAttribute('aria-selected', 'false');
                    });

                    if (targetPanel) {
                        targetPanel.classList.remove('hidden');
                    }

                    this.classList.remove('bg-white/20', 'text-white/90', 'hover:bg-white/40',
                        'hover:text-white', 'hover:-translate-y-0.5');

                    this.classList.add('bg-white', 'text-blue-700', 'shadow-md');
                    this.setAttribute('aria-selected', 'true');
                });
            });
        });
    </script>
@endsection
