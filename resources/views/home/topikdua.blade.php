@extends('layouts.guest')

@section('title', 'Topik 2')

@section('content')
    <style>
        @keyframes slide-in {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }
    </style>

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
                                <div class="mt-6 text-center">
                                    <a href="{{ route('test.intelligence') }}"
                                        class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white transition duration-300 rounded-full shadow-md bg-gradient-to-r from-orange-500 to-blue-600 hover:scale-105 hover:shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
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

                                    <p class="text-justify leading-relaxed text-gray-700">
                                        <span class="font-bold text-blue-600">Dimensi informasi karier</span> mengukur pada
                                        keyakinan individu terhadap pemahaman
                                        informasi yang berkaitan dengan jenis,
                                        persyaratan, peluang karier, serta keterampilan
                                        yang dibutuhkan dalam sebuah pekerjaan.
                                        Pemahaman terhadap informasi-informasi tersebut
                                        akan meningkatkan self-efficacy karier individu.
                                        Sedangkan individu yang tidak berusaha
                                        mendalami informasi seputar karier pekerjaan
                                        akan mengalami ketidakyakinan terhadap
                                        perencanaan karier kedepannya.
                                    </p>
                                </div>

                                <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl">
                                    <h3 class="flex items-center mb-4 text-2xl font-bold text-blue-700">
                                        <svg class="w-6 h-6 mr-2 text-blue-700" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Tentang Perguruan Tinggi Negeri
                                    </h3>

                                    <p class="text-justify leading-relaxed text-gray-700">
                                        <span class="font-bold text-blue-600">Pendidikan Tinggi</span> merupakan lembaga yang
                                        menawarkan tingkat pendidikan lanjutan setelah
                                        menyelesaikan sekolah tingkat menengah. Perguruan
                                        tinggi mencakup program studi diploma, sarjana,
                                        magister, spesialis, serta doctor. Perguruan tinggi negeri
                                        yang diselenggarakan di negara Indonesia ada
                                        beberapa jenis, seperti universitas, institute, politeknik,
                                        sekolah tinggi dan akademi.
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
                                        <span class="font-bold text-blue-600">Dimensi pemilihan tujuan</span> 
                                        ini mengarah kepada
                                        keyakinan individu terhadap kemampuan
                                        penentuan tujuan karier yang sesuai dengan
                                        potensi dirinya. Dimensi ini meliputi kemampuan
                                        dalam menentukan jenjang karier dengan tepat,
                                        serta menentukan tujuan yang ingin diraih dalam
                                        proses perencanaan kariernya.

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
                                        <span class="font-bold text-blue-600">Dimensi perencanaan dalam self-efficacy karier </span> 
                                        mengarah pada keyakinan individu terhadap
                                        kemampuan individu dalam merancang
                                        perencanaan karier mereka serta mengikuti
                                        prosedur dalam mencapai tujuan kariernya.
                                        Individu dengan self-efficacy karier yang tinggi
                                        akan merasa percaya diri terhadap menhadapi
                                        tugas-tugas yang akan dihadapi dalam
                                        perencanaan karienya. Berbalik dengan individu
                                        yang self-efficacynya rendah akan mersa takut dan
                                        tidak percaya diri dalam menhadapi tugas-tugas
                                        atau hambatan dalam perencanaan kariernya.

                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">Metode SMART</h3>
                                <div class="p-6 mb-6 bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl">
                                    <p class="mb-4 text-base leading-relaxed text-gray-700">
                                        <span class="font-bold text-cyan-600">Metode SMART</span> 
                                        merupakan metode perencanaan sasaran atau
                                        tujuan yang jelas dan dapat diukur, yang juga bisa
                                        dicapai dengan realistis, serta memiliki relevansi dan
                                        batas waktu tertentu. Metode perencanaan SMART
                                        memiliki 5 karakteristik perencanaan, sebagai berikut:
                                        <ol class="list-decimal list-inside space-y-4">
                                            <li>
                                                <span class="font-semibold">
                                                    Specific (Spesifik)
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Penulisan tujuan yang ingin dicapai harus jelas dan
                                                    juga terperinci. Hindari menulis tujuan yang terlalu
                                                    umum agar perencanaan kita lebih efektif.
                                                </p>
                                            </li>
                                            <li>
                                                <span class="font-semibold">
                                                    Measurable (Terukur)
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Penulisan tujuan harus dapat diukur agar kita
                                                    mengetahui tujuan-tujuan apa saja yang sudah bisa
                                                    dinyatakan berhasil dan belum berhasil kita capai.
                                                    Dengan kita melihat ketercapaian tujuan kita akan
                                                    mempermudah diri kita untuk mengetahui kemajuan
                                                    apa saja yang sudah kita lakukan.
                                                </p>
                                            </li>
                                            <li>
                                                <span class="font-semibold">
                                                    Achievable (Dapat Dicapai)
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Penulisan tujuan haruslah realistis dengan kemampuan
                                                    serta waktu yang kita miliki. Dengan kita memiliki
                                                    tujuan yang realistis tentu saja akan menambah
                                                    keyakinan diri kita untuk dapat mencapai tujuan yang
                                                    telah kita buat.
                                                </p>
                                            </li>
                                            <li>
                                                <span class="font-semibold">
                                                    Relevant (Relevan)
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Penulisan tujuan harus sesuai dengan kebutuhan
                                                    jangka panjang kita kedepannya pula. Dengan kita
                                                    menuliskan tujuan yang relevan sejalan dengan
                                                    kebutuhan jangka panjang kita akan membuat diri kita
                                                    semakin termotivasi dalam mencapai tujuan
                                                    perencanaan yang telah kita buat.
                                                </p>
                                            </li>
                                            <li>
                                                <span class="font-semibold">
                                                    Time Bound (Terikat Waktu)
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Penulisan tujuan harus disertai dengan tenggat waktu
                                                    atau batas waktu yang jelas. Dengan kita menyertakan
                                                    tenggat waktu dalam perencanaan kita akan membuat
                                                    kita terdorong untuk segera mencapai tujuan-tujuan
                                                    yang kita buat. Sedangkan jika kita tidak menyertakan
                                                    tenggat waktu kita bisa terus menunda-nunda.
                                                </p>
                                            </li>
                                        </ol>
                                    </p>
                                </div>

                                <div class="p-4 bg-teal-50 rounded-xl">
                                        <p class="mb-2 font-bold text-teal-800">Tujuan :</p>
                                        <p class="text-gray-700">
                                            Tujuan dari perencanaan karier dengan metode SMART
                                            dibuat untuk membuat rencana karier menjadi lebih
                                            jelas, dapat diukur, realistis, relevan, dan memiliki
                                            waktu yang ditentukan, guna memastikan pencapaian
                                            karir yang nyata dan terarah. Dengan menggunakan
                                            metode SMART ini, peserta didik yang dibantu oleh
                                            guru BK dapat merancang langkah-langkah karier
                                            dengan cara yang teratur, melihat perkembangan, dan
                                            menyesuaikan rencana dengan baik.
                                        </p>
                                    </div>

                                <h4 class="mb-4 text-xl font-bold text-gray-900">Contoh Penerapan Metode SMART</h4>
                                <div class="p-6 space-y-4 bg-white border-2 border-teal-200 rounded-2xl">
                                    

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
                                        <span class="font-bold text-orange-600">Dimensi pemecahan masalah</span>  ini mengarah pada
                                            keyakinan individu dalam menghadapi dan
                                            menyelesaikan segala tantangan yang muncul
                                            dalam perencanaan karier mereka. Individu
                                            dengan self-efficacy yang tinggi akan mampu
                                            menganalisis dan menentukan solusi yang tepat
                                            dalam menghadapi hambatan dan tidak mudah
                                            menyerah dalam perencanaan karier. Berbalik
                                            dengan individu yang self-efficacy rendah akan
                                            mengalami kesusahan dalam menghadapi
                                            hambatan dan banyak keraguan dalam
                                            perencanaan kariernya.
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">
                                    Contoh Tantangan dalam Merencanakan Karir
                                </h3>

                                <div class="p-6 bg-gradient-to-br from-amber-50 to-yellow-50 rounded-2xl">
                                    <ul class="space-y-3 list-disc list-inside text-base leading-relaxed text-gray-700">
                                        <ol class="list-decimal list-inside space-y-4">
                                            <li>
                                                <span class="font-semibold">
                                                    Ketidakpastian yang mengelilingi pasar kerja
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Dengan adanya perubahan cepat dalam dunia
                                                    teknologi, ekonomi, dan industri, banyak pekerjaan
                                                    mengalami perubahan atau bahkan lenyap, sementara
                                                    pekerjaan baru yang memerlukan keterampilan yang
                                                    berbeda mulai bermunculan. Ketidakpastian ini
                                                    menimbulkan kekhawatiran bagi orang-orang
                                                    mengenai seberapa sesuai keterampilan yang mereka
                                                    miliki.
                                                    <br>
                                                    <br>
                                                    Untuk menghadapi ketidakstabilan di pasar kerja yang
                                                    disebabkan oleh perubahan dalam teknologi, ekonomi,
                                                    dan sektor industri, penting untuk melakukan
                                                    pembelajaran terus-menerus. Identifikasi keterampilan
                                                    yang akan diperlukan di masa depan, seperti
                                                    kecerdasan buatan (AI), analisis data, atau
                                                    keterampilan interpersonal yang fleksibel, melalui
                                                    kursus online gratis yang tersedia di platform seperti
                                                    Coursera dan LinkedIn Learning. Perluas pilihan karir
                                                    dengan membuat portofolio tambahan, menjalin
                                                    hubungan di komunitas profesional seperti LinkedIn
                                                    atau asosiasi psikologi perilaku, serta menjalani rotasi
                                                    pekerjaan sementara untuk mengeksplorasi dan
                                                    mengasah keterampilan baru. Terapkan metode
                                                    SMART untuk merumuskan rencana karier cadangan.
                                                </p>
                                            </li>

                                            <li>
                                                <span class="font-semibold">
                                                    Kesulitan dalam mengidentifikasi potensi, minat serta keterampilan diri
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Banyak orang mengalami kesulitan mengenai apa yang
                                                    mereka inginkan dari karir. Akibatnya, mereka bisa
                                                    terjebak dalam pekerjaan yang tidak memuaskan atau
                                                    tidak sesuai dengan minat mereka. Ketidakpahaman
                                                    tentang diri ini sering kali diperburuk oleh tekanan dari
                                                    sekitar, seperti harapan dari keluarga, teman, atau
                                                    masyarakat. Tanpa pemahaman yang baik tentang diri
                                                    sendiri, orang sering merasa tidak puas dalam
                                                    pekerjaan mereka, yang bisa mempengaruhi kesehatan
                                                    mental mereka.
                                                    <br>
                                                    <br>
                                                    Untuk membantu menghadapi tantangan dalam
                                                    mengetahui potensi, minat, potensi serta keahlian diri,
                                                    lakukan penilaian diri secara berkala dengan
                                                    menggunakan alat yang tepat seperti tes MBTI, tes
                                                    Multiple Intelligence atau Holland Code. Ini akan
                                                    membantu Anda memahami pilihan karier secara lebih
                                                    objektif.
                                                </p>
                                            </li>

                                            <li>
                                                <span class="font-semibold">
                                                    Kurangnya dukungan dalam pengembangan sumber daya manusia
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Dalam sistem pendidikan di negara Indonesia tidak
                                                    memiliki cara yang terstruktur, teratur dan jelas untuk
                                                    mengembangkan potensi, minat serta keterampilan
                                                    untuk perencanaan karier dari usia dini. Situasi ini
                                                    dapat membuat seseorang merasa diabaikan atau tidak
                                                    memiliki kesempatan untuk maju. Mempersiapkan diri
                                                    untuk karier tujuan adalah proses yang panjang jadi
                                                    sebaiknya pemberian latihan dapat diolah dari usia
                                                    dini. Tidak melulu membicarakan teori namun
                                                    pendidikan juga sebaiknya memberikan pelatihan
                                                    keterampilan praktik juga. Tentu saja hal ini akan
                                                    mengurangi keyakinan dalam diri seseorang dalam
                                                    merencanakan atau menuju karier yang akan dipilih.
                                                    <br>
                                                    <br>
                                                    Untuk mengatasi masalah kurangnya dukungan dalam
                                                    pengembangan sumber daya manusia di sistem
                                                    pendidikan Indonesia yang tidak teratur, diperlukan
                                                    inisiatif mandiri. Ini bisa dilakukan melalui program
                                                    ekstrakurikuler atau workshop di sekolah yang
                                                    menggabungkan minat, bakat, serta potensi peserta
                                                    didik dengan pelatihan praktis. Contohnya adalah
                                                    simulasi wawancara kerja atau proyek magang kecil
                                                    yang dimulai dari sekolah dasar hingga sekolah
                                                    menengah. Selain itu, kerjasama dengan komunitas
                                                    atau platform daring, seperti Prakerja dan Ruangguru
                                                    Karier, sangat penting untuk menawarkan kursus
                                                    keterampilan praktis.
                                                </p>
                                            </li>

                                            <li>
                                                <span class="font-semibold">
                                                    Kurangnya akses terhadap bimbingan karier yang memadai
                                                </span>
                                                <p class="mt-2 text-justify leading-relaxed">
                                                    Banyak orang tidak dapat menjangkau tenaga
                                                    profesional yang bisa memberikan saran dan wawasan
                                                    berguna tentang perkembangan karier. Di era digital
                                                    saat ini, meskipun terdapat banyak data yang bisa
                                                    diakses, tidak semua informasi tersebut sesuai atau
                                                    membantu. Oleh karena itu, orang perlu memiliki
                                                    kemampuan literasi informasi yang baik untuk
                                                    memilah informasi yang mereka terima.
                                                    <br>
                                                    <br>
                                                    Untuk mengatasi masalah terbatasnya akses pada
                                                    bimbingan karir serta perolehan informasi yang beredar
                                                    di zaman digital, kita dapat memanfaatkan berbagai
                                                    platform gratis yang memang sudah terpercaya seperti
                                                    LinkedIn Learning, Coursera Career Guidance, atau
                                                    saluran YouTube yang dapat dipercaya (seperti TED
                                                    Talks tentang karir).
                                                </p>
                                            </li>
                                        </ol>
                                    </ul>
                                </div>
                            </div>


                           <div>
                                <h3 class="mb-6 text-2xl font-bold text-gray-900">
                                    Video Motivasi
                                </h3>

                                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                    
                                    <!-- Video 1 -->
                                    <div class="overflow-hidden bg-gray-900 shadow-2xl rounded-2xl aspect-video">
                                        <iframe class="w-full h-full"
                                            src="https://www.youtube.com/embed/cBjLhHfvdfY"
                                            title="Video Motivasi 1" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                    <!-- Video 2 -->
                                    <div class="overflow-hidden bg-gray-900 shadow-2xl rounded-2xl aspect-video">
                                        <iframe class="w-full h-full"
                                            src="https://www.youtube.com/embed/57UxnHwuzEE?si=9c0Oup4BqsLCVzKE"
                                            title="Video Motivasi 2" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                    <!-- Video 3 -->
                                    <div class="overflow-hidden bg-gray-900 shadow-2xl rounded-2xl aspect-video">
                                        <iframe class="w-full h-full"
                                            src="https://www.youtube.com/embed/Jvzzo4jpd4s?si=7ozBaLMgRIKgT8T"
                                            title="Video Motivasi 3" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                    <div class="overflow-hidden bg-gray-900 shadow-2xl rounded-2xl aspect-video">
                                        <iframe class="w-full h-full"
                                            src="https://www.youtube.com/embed/iiEjl6dCuoo?si=nzuKUO5AiosEvP"
                                            title="Video Motivasi 4" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                    <div class="overflow-hidden bg-gray-900 shadow-2xl rounded-2xl aspect-video">
                                        <iframe class="w-full h-full"
                                            src="https://www.youtube.com/embed/sdZVBETg7OM?si=8XDJLNPq3KZGCnhz"
                                            title="Video Motivasi 5" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                </div>
                            </div>

                        </div>

                        @include('home.lkpd-content')

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

    {{-- LKPD --}}
    <script>
        $(document).ready(function() {
            $('#lkpd-form').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('#submit-btn');
                const btnText = $('#btn-text');
                submitBtn.prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
                btnText.html(
                    '<svg class="inline w-5 h-5 mr-2 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Menyimpan...'
                );

                const formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('lkpd.store') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        submitBtn.prop('disabled', false).removeClass(
                            'opacity-50 cursor-not-allowed');
                        btnText.html(
                            'Kirim Jawaban'
                        );

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            confirmButtonColor: '#8b5cf6',
                            confirmButtonText: 'OK'
                        });

                        $('#lkpd-form')[0].reset();
                    },
                    error: function(xhr) {
                        submitBtn.prop('disabled', false).removeClass(
                            'opacity-50 cursor-not-allowed');
                        btnText.html(
                            'Kirim Jawaban'
                        );

                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;

                            if (errors) {
                                Object.values(errors).forEach(function(errorArray) {
                                    errorArray.forEach(function(errorMessage) {
                                        iziToast.error({
                                            title: 'Error',
                                            message: errorMessage,
                                            position: 'topRight',
                                            timeout: 5000
                                        });
                                    });
                                });
                            } else {
                                iziToast.error({
                                    title: 'Error',
                                    message: 'Mohon lengkapi semua field yang wajib diisi!',
                                    position: 'topRight',
                                    timeout: 5000
                                });
                            }
                        } else {
                            iziToast.error({
                                title: 'Error',
                                message: 'Terjadi kesalahan. Silakan coba lagi!',
                                position: 'topRight',
                                timeout: 5000
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
