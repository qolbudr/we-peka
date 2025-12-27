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
                                <span class="font-bold text-blue-600">Self-efficacy</span> dalam konteks karier dapat diartikan
                                sebagai keyakinan seseorang terhadap kepercayaan dirinya dalam menghadapi tugas-tugas perkembangan bidang kariernya
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
                            <p class="mb-4 text-justify leading-relaxed text-gray-700">
                                <span class="font-bold text-cyan-600">Pentingnya efikasi karir</span> Seseorang yang memiliki keyakinan tinggi dalam kemampuan dirinya akan dapat menghadapi kesulitan,
                                mengatasi rintangan, serta tetap bertahan dalam menjalankan tantangan yang diperlukan untuk meraih tujuan kariernya. Sedangkan seseorang yang memiliki
                                self-efficacy karier yang rendah akan dihadapkan pada tantangan berat dalam pengembangan karier mereka, mereka cepat merasa putus asa dalam berusaha dan memilih untuk menyerah, mereka juga lambat untuk meningkatkan kemampuan atau memulihkan keyakinan pada kemampuan mereka saat mengalami kegagalan.Oleh karena itu, indikator dari keyakinan dalam karier ini menjadi ukuran penting untuk menilai seberapa tinggi keyakinan seseorang dalam karier dan bagaimana hal itu berperan dalam pencapaian sukses di bidang karier.

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
                                Dimensi Efikasi Karier
                            </h2>
                            <p class="mb-4 text-justify leading-relaxed text-gray-700">
                                <span class="font-bold text-indigo-600">Taylor dan Betz membangun 5 dimensi self-efficacy
                                    </span> karier berdasarkan teori self-efficacy Albert Bandura. Taylor dan Betz menjabarkan 5 dimensi self-efficacy karier (Betz dan Hacket, 2006 dalam Putri. M, F. 2025):
                            </p>
                            <p class="text-base leading-relaxed text-gray-600">
                                <li>
                                    Dimensi Self-Appraisal (Penilaian Diri)
                                    <p class="text-justify leading-relaxed">
                                        Dimensi penilaian diri ini bertujuan untuk mengukur kekuatan serta kelemahan terhadap kemampuan diri individu. Dengan mengetahui kekuatan serta kelemahan diri hal ini berguna dalam kegiatan
                                        perencanaan karier, di mana seorang individu dinilai dapat menentukan pilihan kariernya dengan mempertimbangkan apa yang menjadi kekuatan individu tersebut. Individu yang mengetahui kekuatan serta kelemahannya dinilai memiliki self-efficacy karier yang tinggi, karena individu tersebut dapat mengetahui batasan dirinya dan mencoba untuk memperbaiki kelemahannya.

                                    </p>
                                </li>
                                <li>
                                    Dimensi Gathering Occupational Information (Pengumpulan Informasi Karier atau Pekerjaan)
                                    <p class="text-justify leading-relaxed">
                                        Dimensi informasi karier mengukur pada keyakinan individu terhadap pemahaman informasi yang berkaitan dengan jenis, persyaratan, peluang karier, serta keterampilan yang dibutuhkan dalam sebuah pekerjaan. Pemahaman terhadap informasi-informasi tersebut akan meningkatkan self-efficacy karier individu. Sedangkan individu yang tidak berusaha mendalami informasi seputar karier pekerjaan akan mengalami ketidakyakinan terhadap perencanaan karier kedepannya.
                                    </p>
                                </li>
                                <li>
                                    Dimensi Goal Selection (Pemilihan Tujuan)
                                    <p class="text-justify leading-relaxed">
                                        Dimensi pemilihan tujuan ini mengarah kepada keyakinan individu terhadap kemampuan penentuan tujuan karier yang sesuai dengan potensi dirinya.
                                        Dimensi ini meliputi kemampuan dalam menentukan jenjang karier dengan tepat, serta menentukan tujuan yang ingin diraih dalam proses perencanaan kariernya.
                                    </p>
                                </li>
                                <li>
                                    Dimensi Planning for the Future (Perencanaan Masa Depan)
                                    <p class="text-justify leading-relaxed">
                                        Dimensi perencanaan dalam self-efficacy karier mengarah pada keyakinan individu terhadap kemampuan individu dalam merancang perencanaan karier mereka serta mengikuti prosedur dalam
                                        mencapai tujuan kariernya. Individu dengan self-efficacy karier yang tinggi akan merasa percaya diri terhadap menhadapi tugas-tugas yang akan dihadapi dalam perencanaan karienya. Berbalik dengan individu yang self-efficacynya rendah akan mersa takut dan tidak percaya diri dalam menhadapi tugas-tugas atau hambatan dalam perencanaan kariernya.
                                    </p>
                                </li>
                                <li>
                                    Dimensi Problem Solving (Pemecahan Masalah)
                                    <p class="text-justify leading-relaxed">
                                        Dimensi pemecahan masalah ini mengarah pada keyakinan individu dalam menghadapi dan menyelesaikan segala tantangan yang muncul dalam perencanaan karier mereka. Individu dengan self-efficacy yang tinggi akan mampu menganalisis dan menentukan solusi yang tepat dalam menghadapi hambatan dan tidak mudah menyerah dalam
                                        perencanaan karier. Berbalik dengan individu yang self-efficacy rendah akan mengalami kesusahan dalam menghadapi hambatan dan banyak keraguan dalam perencanaan kariernya.
                                    </p>
                                </li>
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
                                Sumber Utama Efikasi Karier
                            </h2>
                            <p class="mb-4 text-justify leading-relaxed text-gray-700">
                                <span class="font-bold text-cyan-600">Self-efficacy dalam konteks karier</span> mengacu pada
                                keyakinan peserta didik terhadap kemampuan diri dalam penyelesaian tugas kariernya. Maka dari itu peserta didik perlu meningkatkan self-efficacy karier
                                mereka agar mereka dapat mencapai hasil karier yang sempurna. Bandura (1997) menjabarkan adanya 5 sumber utama yang dapat meningkatkan self-efficacy karier (Lianto, 2019):
                                <li>
                                    Melalui Pengalaman Keberhasilan Langsung
                                    <p class="text-justify leading-relaxed">
                                        Peningkatan self-efficacy melalui keberhasilan langsung
                                        merupakan sumber yang paling kuat diantara yang
                                        lainnya. Di mana ketika individu mengalami
                                        keberhasilan dalam suatu hal maka hal tersebut akan
                                        meningkatkan self-efficacy dari individu. Berbalik
                                        dengan ketika individu yang mengalami kegagalan
                                        dalam suatu hal akan mengakibatkan self-efficacy
                                        individu tersebut bisa menurun.
                                    </p>
                                </li>
                                <li>
                                    Melalui Pengalaman Orang lain
                                    <p class="text-justify leading-relaxed">
                                        Peningkatan self-efficacy melalui keberhasilan orang
                                        lain, seorang individu akan cenderung melakukan
                                        perbandingan dirinya dengan keberhasilan orang lain
                                        yang ada di sekitarnya. Ketika orang disekitarnya yang
                                        dianggap memiliki kesetaraan dengannya mengalami
                                        keberhasilan maka individu tersebut akan ikut
                                        termotivasi dan yakin juga terhadap kemampuan
                                        dirinya dalam penyelesaian tugas yang sama. Berbalik
                                        dengan ketika individu melihat orang disekitarnya
                                        yang dianggap memiliki kesetaraan dengannya
                                        mengalami kegagalan self-efficacy atau keyakinan
                                        terhadap kemampuan individu tersebut akan
                                        menurun.
                                    </p>
                                </li>
                                <li>
                                    Melalui Persuasi Verbal
                                    <p class="text-justify leading-relaxed">
                                        Peningkatan self-efficacy melalui persuasi verbal,
                                        seorang individu akan meningkat self-efficacynya
                                        ketika ada orang disekitarnya dapat menunjukan
                                        bahwasannya individu tersebut mampu melakukan
                                        penyelesaian tugas. Namun ketika orang disekitarnya
                                        mempertanyakan kemampuannya hal tersebut akan
                                        semakin menurunkan self-efficacy individu tersebut.
                                    </p>
                                </li>
                                <li>
                                    Melalui Kondisi Fisiologis
                                    <p class="text-justify leading-relaxed">
                                        Peningkatan self-efficacy melalui kondisi fisiologis
                                        berarti keyakinan seorang individu dipengaruhi oleh
                                        keadaan fisik maupun emosionalnya. Ketika seorang
                                        individu mengalami kondisi fisik dan emosional yang
                                        kurang baik seperti sedang sakit, merasa cemas, tidak
                                        dalam mood yang baik hal ini dapat menurunkan
                                        keyakinan individu dalam penyelesaian tugasnya
                                        karena ketidak seimbangan kondisik fisiologis dat
                                        menghambat motivasi individu untuk berkembang.
                                    </p>
                                </li>
                            </p>
                           
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
