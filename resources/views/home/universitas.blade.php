<div class="mt-6">
    <div class="mb-4 border-b border-blue-300 dark:border-blue-100 bg-white dark:bg-blue-400 shadow-md rounded-lg p-1">
    <ul class="flex flex-wrap text-sm font-medium text-center" id="studyTab" data-tabs-toggle="#studyTabContent" role="tablist">
        <li class="me-1" role="presentation">
             <button class="inline-block p-3 border-b-2 border-transparent rounded-t-lg text-white dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 ease-in-out" 
                    id="umum-tab" data-tabs-target="#umum" type="button" role="tab" aria-controls="umum" aria-selected="false">
                Universitas Negeri Umum
            </button>
        </li>
        <li class="me-1" role="presentation">
            <button class="inline-block p-3 border-b-2 border-transparent rounded-t-lg text-white dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 ease-in-out" 
                    id="uin-tab" data-tabs-target="#uin" type="button" role="tab" aria-controls="uin" aria-selected="false">
                Universitas Negeri Agama (UIN)
            </button>
        </li>
        <li class="me-1" role="presentation">
            <button class="inline-block p-3 border-b-2 border-transparent rounded-t-lg text-white dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 ease-in-out" 
                    id="institut-tab" data-tabs-target="#institut" type="button" role="tab" aria-controls="institut" aria-selected="false">
                Institut
            </button>
        </li>
        <li class="me-1" role="presentation">
            <button class="inline-block p-3 border-b-2 border-transparent rounded-t-lg text-white dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 ease-in-out" 
                    id="politeknik-tab" data-tabs-target="#politeknik" type="button" role="tab" aria-controls="politeknik" aria-selected="false">
                Politeknik
            </button>
        </li>
        <li class="me-1" role="presentation">
            <button class="inline-block p-3 border-b-2 border-transparent rounded-t-lg text-white dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 ease-in-out" 
                    id="st-tab" data-tabs-target="#st" type="button" role="tab" aria-controls="st" aria-selected="false">
                Sekolah Tinggi
            </button>
        </li>
        <li role="presentation">
            <button class="inline-block p-3 border-b-2 border-transparent rounded-t-lg text-white dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 ease-in-out" 
                    id="akademi-tab" data-tabs-target="#akademi" type="button" role="tab" aria-controls="akademi" aria-selected="false">
                Akademi
            </button>
        </li>
    </ul>
</div>

    <div id="studyTabContent">
        
        <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-br from-blue-50 to-indigo-50" id="umum" role="tabpanel" aria-labelledby="umum-tab">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Universitas Negeri Umum</h3>
            <ul class="space-y-2 text-lg text-gray-700 mb-6">
                <li><strong>Spesialisasi Ilmu:</strong> Sains, sosial, humaniora, teknik, kedokteran, dan lainnya.</li>
                <li><strong>Jenis Pendidikan:</strong> Sarjana (S1), Magister (S2), Doktor (S3).</li>
                <li><strong>Tujuan Pendidikan:</strong> Mengembangkan kemampuan akademik dan riset.</li>
                <li><strong>Contoh Tempat Studi:</strong> UI, UGM, UNAIR.</li>
            </ul>
            <hr class="my-6 border-blue-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">Data Detail Universitas</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-100/70 border-b border-blue-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Univ</th>
                            <th scope="col" class="px-6 py-3">Nama Prodi</th>
                            <th scope="col" class="px-6 py-3">Akreditasi</th>
                            <th scope="col" class="px-6 py-3">Jenjang</th>
                            <th scope="col" class="px-6 py-3">Kuota MABA</th>
                            <th scope="col" class="px-6 py-3">Alumni Lolos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">UI</td><td class="px-6 py-4">Ilmu Komputer</td><td class="px-6 py-4 text-green-600 font-semibold">A</td><td class="px-6 py-4">S1</td><td class="px-6 py-4">120</td><td class="px-6 py-4">Andi, Budi</td></tr>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">UGM</td><td class="px-6 py-4">Kedokteran</td><td class="px-6 py-4 text-green-600 font-semibold">Unggul</td><td class="px-6 py-4">S1</td><td class="px-6 py-4">150</td><td class="px-6 py-4">Citra, Dewi</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden p-6 rounded-2xl shadow-xl bg-gradient-to-br from-blue-50 to-indigo-50" id="uin" role="tabpanel" aria-labelledby="uin-tab">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Universitas Negeri Agama (UIN)</h3>
            <ul class="space-y-2 text-lg text-gray-700 mb-6">
                <li><strong>Spesialisasi Ilmu:</strong> Keagamaan Islam, hukum Islam, dakwah, pendidikan, ekonomi syariah.</li>
                <li><strong>Jenis Pendidikan:</strong> Sarjana (S1), Magister (S2), Doktor (S3).</li>
                <li><strong>Tujuan Pendidikan:</strong> Mengintegrasikan ilmu agama dan umum.</li>
                <li><strong>Contoh Tempat Studi:</strong> UIN Jakarta, UIN Yogyakarta.</li>
            </ul>
            <hr class="my-6 border-blue-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">Data Detail Universitas</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-100/70 border-b border-blue-200">
                        <tr><th scope="col" class="px-6 py-3">Nama Univ</th><th scope="col" class="px-6 py-3">Nama Prodi</th><th scope="col" class="px-6 py-3">Akreditasi</th><th scope="col" class="px-6 py-3">Jenjang</th><th scope="col" class="px-6 py-3">Kuota MABA</th><th scope="col" class="px-6 py-3">Alumni Lolos</th></tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">UIN Syarif Hidayatullah</td><td class="px-6 py-4">Ekonomi Syariah</td><td class="px-6 py-4 text-green-600 font-semibold">A</td><td class="px-6 py-4">S1</td><td class="px-6 py-4">80</td><td class="px-6 py-4">Faris</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden p-6 rounded-2xl shadow-xl bg-gradient-to-br from-blue-50 to-indigo-50" id="institut" role="tabpanel" aria-labelledby="institut-tab">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Institut</h3>
            <ul class="space-y-2 text-lg text-gray-700 mb-6">
                <li><strong>Spesialisasi Ilmu:</strong> Teknik, pertanian, seni, dan teknologi.</li>
                <li><strong>Jenis Pendidikan:</strong> Sarjana (S1), Magister (S2), Doktor (S3).</li>
                <li><strong>Tujuan Pendidikan:</strong> Menghasilkan lulusan ahli di bidang sains terapan dan teknologi.</li>
                <li><strong>Contoh Tempat Studi:</strong> ITB, IPB.</li>
            </ul>
            <hr class="my-6 border-blue-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">Data Detail Institut</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-100/70 border-b border-blue-200">
                        <tr><th scope="col" class="px-6 py-3">Nama Univ</th><th scope="col" class="px-6 py-3">Nama Prodi</th><th scope="col" class="px-6 py-3">Akreditasi</th><th scope="col" class="px-6 py-3">Jenjang</th><th scope="col" class="px-6 py-3">Kuota MABA</th><th scope="col" class="px-6 py-3">Alumni Lolos</th></tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">ITB</td><td class="px-6 py-4">Teknik Sipil</td><td class="px-6 py-4 text-green-600 font-semibold">A</td><td class="px-6 py-4">S1</td><td class="px-6 py-4">100</td><td class="px-6 py-4">Gita, Hani</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden p-6 rounded-2xl shadow-xl bg-gradient-to-br from-blue-50 to-indigo-50" id="politeknik" role="tabpanel" aria-labelledby="politeknik-tab">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Politeknik</h3>
            <ul class="space-y-2 text-lg text-gray-700 mb-6">
                <li><strong>Spesialisasi Ilmu:</strong> Teknik, bisnis, pariwisata, informatika, kesehatan.</li>
                <li><strong>Jenis Pendidikan:</strong> D3, D4 (Sarjana Terapan).</li>
                <li><strong>Tujuan Pendidikan:</strong> Mempersiapkan tenaga ahli siap kerja.</li>
                <li><strong>Contoh Tempat Studi:</strong> PNJ, PENS.</li>
            </ul>
            <hr class="my-6 border-blue-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">Data Detail Politeknik</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-100/70 border-b border-blue-200">
                        <tr><th scope="col" class="px-6 py-3">Nama Univ</th><th scope="col" class="px-6 py-3">Nama Prodi</th><th scope="col" class="px-6 py-3">Akreditasi</th><th scope="col" class="px-6 py-3">Jenjang</th><th scope="col" class="px-6 py-3">Kuota MABA</th><th scope="col" class="px-6 py-3">Alumni Lolos</th></tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">PNJ</td><td class="px-6 py-4">Teknik Elektro</td><td class="px-6 py-4 text-green-600 font-semibold">A</td><td class="px-6 py-4">D3</td><td class="px-6 py-4">60</td><td class="px-6 py-4">Indra, Jaka</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden p-6 rounded-2xl shadow-xl bg-gradient-to-br from-blue-50 to-indigo-50" id="st" role="tabpanel" aria-labelledby="st-tab">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Sekolah Tinggi</h3>
            <ul class="space-y-2 text-lg text-gray-700 mb-6">
                <li><strong>Spesialisasi Ilmu:</strong> Ekonomi, hukum, kesehatan, teknologi.</li>
                <li><strong>Jenis Pendidikan:</strong> S1, S2.</li>
                <li><strong>Tujuan Pendidikan:</strong> Menghasilkan tenaga profesional di bidang spesifik.</li>
                <li><strong>Contoh Tempat Studi:</strong> STAN, STTB.</li>
            </ul>
            <hr class="my-6 border-blue-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">Data Detail Sekolah Tinggi</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-100/70 border-b border-blue-200">
                        <tr><th scope="col" class="px-6 py-3">Nama Univ</th><th scope="col" class="px-6 py-3">Nama Prodi</th><th scope="col" class="px-6 py-3">Akreditasi</th><th scope="col" class="px-6 py-3">Jenjang</th><th scope="col" class="px-6 py-3">Kuota MABA</th><th scope="col" class="px-6 py-3">Alumni Lolos</th></tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">STAN</td><td class="px-6 py-4">Akuntansi</td><td class="px-6 py-4 text-green-600 font-semibold">A</td><td class="px-6 py-4">D4</td><td class="px-6 py-4">200</td><td class="px-6 py-4">Kartika, Leo</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden p-6 rounded-2xl shadow-xl bg-gradient-to-br from-blue-50 to-indigo-50" id="akademi" role="tabpanel" aria-labelledby="akademi-tab">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Akademi</h3>
            <ul class="space-y-2 text-lg text-gray-700 mb-6">
                <li><strong>Spesialisasi Ilmu:</strong> Keperawatan, kebidanan, penerbangan, pariwisata.</li>
                <li><strong>Jenis Pendidikan:</strong> D1–D3.</li>
                <li><strong>Tujuan Pendidikan:</strong> Menghasilkan tenaga kerja siap pakai dan terampil.</li>
                <li><strong>Contoh Tempat Studi:</strong> Akper, Akpar.</li>
            </ul>
            <hr class="my-6 border-blue-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">Data Detail Akademi</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-100/70 border-b border-blue-200">
                        <tr><th scope="col" class="px-6 py-3">Nama Univ</th><th scope="col" class="px-6 py-3">Nama Prodi</th><th scope="col" class="px-6 py-3">Akreditasi</th><th scope="col" class="px-6 py-3">Jenjang</th><th scope="col" class="px-6 py-3">Kuota MABA</th><th scope="col" class="px-6 py-3">Alumni Lolos</th></tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-blue-50/50"><td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Akper X</td><td class="px-6 py-4">Keperawatan</td><td class="px-6 py-4 text-green-600 font-semibold">B</td><td class="px-6 py-4">D3</td><td class="px-6 py-4">50</td><td class="px-6 py-4">Maya</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
