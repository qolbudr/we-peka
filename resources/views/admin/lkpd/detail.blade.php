<!-- Main modal -->
<div id="detail-lkpd-modal-{{ $lkpd->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white shadow rounded-2xl">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                <h3 class="text-xl font-semibold text-gray-900 capitalize">
                    Detail Jawaban LKPD - {{ $lkpd->user->name }}
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto "
                    data-modal-hide="detail-lkpd-modal-{{ $lkpd->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-6 overflow-y-auto md:p-5 max-h-96">

                <!-- 1. SPESIFIK -->
                <div class="p-4 border-l-4 rounded-lg border-violet-500 bg-violet-50">
                    <h4 class="mb-3 text-lg font-bold text-violet-900">1. SPESIFIK</h4>

                    <div class="mb-3">
                        <p class="mb-1 text-sm font-semibold text-gray-700">Apa tujuan karier spesifik kamu setelah
                            lulus dari Sekolah Menengah Atas?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['spesifik_1'] ?? '-' }}</p>
                    </div>

                    <div class="mb-3">
                        <p class="mb-1 text-sm font-semibold text-gray-700">Dimana tempat jenjang karier lanjutan yang
                            ingin kamu tuju?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['spesifik_2'] ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="mb-1 text-sm font-semibold text-gray-700">Siapa saja orang yang mengispirasi atau
                            mendukungmu dalam memilih tujuan karier tersebut?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['spesifik_3'] ?? '-' }}</p>
                    </div>
                </div>

                <!-- 2. MEASURABLE -->
                <div class="p-4 border-l-4 border-indigo-500 rounded-lg bg-indigo-50">
                    <h4 class="mb-3 text-lg font-bold text-indigo-900">2. MEASURABLE</h4>

                    <div>
                        <p class="mb-1 text-sm font-semibold text-gray-700">Bagaimana langkah-langkah atau kegiatan yang
                            akan kamu lakukan untuk mencapai tujuan kariermu?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['measurable_1'] ?? '-' }}</p>
                    </div>
                </div>

                <!-- 3. ACHIEVABLE -->
                <div class="p-4 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                    <h4 class="mb-3 text-lg font-bold text-blue-900">3. ACHIEVABLE</h4>

                    <div class="mb-3">
                        <p class="mb-1 text-sm font-semibold text-gray-700">Apakah tujuan karier tersebut sudah
                            realistis dan kamu merasa dapat mencapainya dengan potensi dirimu?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['achievable_1'] ?? '-' }}</p>
                    </div>

                    <div class="mb-3">
                        <p class="mb-1 text-sm font-semibold text-gray-700">Apakah ada hambatan dalam mencapai tujuan
                            karier kamu?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['achievable_2'] ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="mb-1 text-sm font-semibold text-gray-700">Jika iya apa yang harus kamu lakukan?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['achievable_3'] ?? '-' }}</p>
                    </div>
                </div>

                <!-- 4. RELEVANT -->
                <div class="p-4 border-l-4 border-purple-500 rounded-lg bg-purple-50">
                    <h4 class="mb-3 text-lg font-bold text-purple-900">4. RELEVANT</h4>

                    <div class="mb-3">
                        <p class="mb-1 text-sm font-semibold text-gray-700">Apakah tujuan karier yang kamu pilih sudah
                            sesuai dengan potensi yang kamu miliki?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['relevant_1'] ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="mb-1 text-sm font-semibold text-gray-700">Apakah tujuan karier yang kamu pilih akan
                            menyokong kehidupanmu dalam jangka panjang?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['relevant_2'] ?? '-' }}</p>
                    </div>
                </div>

                <!-- 5. TIME-BOUND -->
                <div class="p-4 border-l-4 border-pink-500 rounded-lg bg-pink-50">
                    <h4 class="mb-3 text-lg font-bold text-pink-900">5. TIME-BOUND</h4>

                    <div class="mb-3">
                        <p class="mb-1 text-sm font-semibold text-gray-700">Kapan kamu akan memulai melatih diri untuk
                            menggapai langkah-langkah menuju tujuan karier kamu?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['timebound_1'] ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="mb-1 text-sm font-semibold text-gray-700">Dan dalam kurun waktu berapa lama kamu ingin
                            menggapai tujuan kariermu tersebut?</p>
                        <p class="text-sm text-gray-600">{{ $lkpd->answers['timebound_2'] ?? '-' }}</p>
                    </div>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                <a href="{{ route('lkpd.pdf', $lkpd->id) }}" target="_blank"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Download PDF
                </a>
                <button data-modal-hide="detail-lkpd-modal-{{ $lkpd->id }}" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
