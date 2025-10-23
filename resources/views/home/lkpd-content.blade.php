<div id="content-lkpd" class="hidden tab-content">
    <div class="mb-8">
        <div class="inline-block px-4 py-2 mb-4 text-sm font-medium rounded-full text-emerald-700 bg-emerald-100">
            Latihan
        </div>
        <h2 class="mb-2 text-3xl font-bold text-gray-900">LKPD Perencanaan Karier (SMART)</h2>
        <p class="text-gray-600">Lengkapi form berikut untuk merencanakan karier menggunakan metode SMART</p>
    </div>

    <form id="lkpd-form" class="space-y-6">
        @csrf

        {{-- 1. SPESIFIK --}}
        <div
            class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-violet-300 focus-within:border-violet-500 focus-within:shadow-lg">
            <div class="flex items-center mb-4">
                <span class="flex items-center justify-center w-8 h-8 mr-2 text-white rounded-lg bg-violet-600">1</span>
                <h3 class="text-lg font-bold text-gray-900">SPESIFIK</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="spesifik_1" class="block mb-2 text-sm font-semibold text-gray-700">
                        Apa tujuan karier spesifik kamu setelah lulus dari Sekolah Menengah Atas?
                    </label>
                    <textarea id="spesifik_1" name="spesifik_1" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-violet-500 focus:bg-white"
                        placeholder="Contoh: Saya ingin menjadi dokter spesialis bedah...">{{ old('spesifik_1', $lkpdAnswer->answers['spesifik_1'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="spesifik_2" class="block mb-2 text-sm font-semibold text-gray-700">
                        Dimana tempat jenjang karier lanjutan yang ingin kamu tuju?
                    </label>
                    <textarea id="spesifik_2" name="spesifik_2" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-violet-500 focus:bg-white"
                        placeholder="Contoh: Fakultas Kedokteran Universitas Indonesia...">{{ old('spesifik_2', $lkpdAnswer->answers['spesifik_2'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="spesifik_3" class="block mb-2 text-sm font-semibold text-gray-700">
                        Siapa saja orang yang mengispirasi atau mendukungmu dalam memilih tujuan karier tersebut?
                    </label>
                    <textarea id="spesifik_3" name="spesifik_3" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-violet-500 focus:bg-white"
                        placeholder="Contoh: Dr. Tirta, orangtua saya, dan guru BK...">{{ old('spesifik_3', $lkpdAnswer->answers['spesifik_3'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- 2. MEASURABLE --}}
        <div
            class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-indigo-300 focus-within:border-indigo-500 focus-within:shadow-lg">
            <div class="flex items-center mb-4">
                <span class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-indigo-600 rounded-lg">2</span>
                <h3 class="text-lg font-bold text-gray-900">MEASURABLE</h3>
            </div>

            <div>
                <label for="measurable_1" class="block mb-2 text-sm font-semibold text-gray-700">
                    Bagaimana langkah-langkah atau kegiatan yang akan kamu lakukan untuk mencapai tujuan kariermu?
                </label>
                <textarea id="measurable_1" name="measurable_1" rows="4" required
                    class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                    placeholder="Contoh: 1) Belajar rutin 4 jam sehari, 2) Ikut bimbel UTBK, 3) Latihan soal HOTS...">{{ old('measurable_1', $lkpdAnswer->answers['measurable_1'] ?? '') }}</textarea>
            </div>
        </div>

        {{-- 3. ACHIEVABLE --}}
        <div
            class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-blue-300 focus-within:border-blue-500 focus-within:shadow-lg">
            <div class="flex items-center mb-4">
                <span class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-blue-600 rounded-lg">3</span>
                <h3 class="text-lg font-bold text-gray-900">ACHIEVABLE</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="achievable_1" class="block mb-2 text-sm font-semibold text-gray-700">
                        Apakah tujuan karier tersebut sudah realistis dan kamu merasa dapat mencapainya dengan potensi
                        dirimu?
                    </label>
                    <textarea id="achievable_1" name="achievable_1" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white"
                        placeholder="Contoh: Ya, saya merasa mampu karena nilai IPA saya konsisten di atas 85...">{{ old('achievable_1', $lkpdAnswer->answers['achievable_1'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="achievable_2" class="block mb-2 text-sm font-semibold text-gray-700">
                        Apakah ada hambatan dalam mencapai tujuan karier kamu?
                    </label>
                    <textarea id="achievable_2" name="achievable_2" rows="3"
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white"
                        placeholder="Contoh: Biaya kuliah kedokteran yang mahal, persaingan ketat di SNBP...">{{ old('achievable_2', $lkpdAnswer->answers['achievable_2'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="achievable_3" class="block mb-2 text-sm font-semibold text-gray-700">
                        Jika iya apa yang harus kamu lakukan?
                    </label>
                    <textarea id="achievable_3" name="achievable_3" rows="3"
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white"
                        placeholder="Contoh: Mencari beasiswa LPDP, KIP Kuliah, atau jalur prestasi...">{{ old('achievable_3', $lkpdAnswer->answers['achievable_3'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- 4. RELEVANT --}}
        <div
            class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-purple-300 focus-within:border-purple-500 focus-within:shadow-lg">
            <div class="flex items-center mb-4">
                <span class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-purple-600 rounded-lg">4</span>
                <h3 class="text-lg font-bold text-gray-900">RELEVANT</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="relevant_1" class="block mb-2 text-sm font-semibold text-gray-700">
                        Apakah tujuan karier yang kamu pilih sudah sesuai dengan potensi yang kamu miliki?
                    </label>
                    <textarea id="relevant_1" name="relevant_1" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:bg-white"
                        placeholder="Contoh: Ya, sangat sesuai. Saya suka pelajaran biologi dan senang membantu orang...">{{ old('relevant_1', $lkpdAnswer->answers['relevant_1'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="relevant_2" class="block mb-2 text-sm font-semibold text-gray-700">
                        Apakah tujuan karier yang kamu pilih akan menyokong kehidupanmu dalam jangka panjang?
                    </label>
                    <textarea id="relevant_2" name="relevant_2" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:bg-white"
                        placeholder="Contoh: Ya, profesi dokter sangat dibutuhkan dan memberikan penghasilan stabil...">{{ old('relevant_2', $lkpdAnswer->answers['relevant_2'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- 5. TIME-BOUND --}}
        <div
            class="p-6 transition-all duration-200 border-2 border-gray-200 rounded-2xl hover:border-pink-300 focus-within:border-pink-500 focus-within:shadow-lg">
            <div class="flex items-center mb-4">
                <span class="flex items-center justify-center w-8 h-8 mr-2 text-white bg-pink-600 rounded-lg">5</span>
                <h3 class="text-lg font-bold text-gray-900">TIME-BOUND</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="timebound_1" class="block mb-2 text-sm font-semibold text-gray-700">
                        Kapan kamu akan memulai melatih diri untuk menggapai langkah-langkah menuju tujuan karier kamu?
                    </label>
                    <textarea id="timebound_1" name="timebound_1" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-pink-500 focus:bg-white"
                        placeholder="Contoh: Mulai dari bulan ini (Oktober 2025), saya akan ikut bimbel intensif...">{{ old('timebound_1', $lkpdAnswer->answers['timebound_1'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="timebound_2" class="block mb-2 text-sm font-semibold text-gray-700">
                        Dan dalam kurun waktu berapa lama kamu ingin menggapai tujuan kariermu tersebut?
                    </label>
                    <textarea id="timebound_2" name="timebound_2" rows="3" required
                        class="block w-full p-4 text-sm text-gray-900 transition-all border-0 rounded-xl bg-gray-50 focus:ring-2 focus:ring-pink-500 focus:bg-white"
                        placeholder="Contoh: Target lulus S1 dalam 4-5 tahun, lalu spesialis dalam 7 tahun total...">{{ old('timebound_2', $lkpdAnswer->answers['timebound_2'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-center pt-4">
            <button type="submit" id="submit-btn"
                class="inline-flex items-center px-8 py-4 text-base font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-violet-600 to-purple-600 rounded-xl hover:shadow-2xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                <span id="btn-text">Kirim Jawaban</span>
            </button>
        </div>
    </form>
</div>
