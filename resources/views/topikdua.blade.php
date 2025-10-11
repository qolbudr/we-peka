@extends('layouts.guest')

@section('title', 'Home')

@section(section: 'content')
    <div class="w-full bg-violet-400 rounded-2xl overflow-hidden">



        <div class="md:flex p-6 rounded-lg">
            
            <ul class="flex flex-col space-y-3 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-6">
                <li>
                    <button id="tab-penilaian" onclick="showTab('penilaian')"
                        class="tab-btn w-full text-left px-4 py-3 rounded-lg bg-violet-800 text-gray-300 hover:bg-white hover:text-violet-500 transition">
                        Penilaian Diri
                    </button>
                </li>
                <li>
                    <button id="tab-informasi" onclick="showTab('informasi')"
                        class="tab-btn w-full text-left px-4 py-3 rounded-lg bg-violet-800 text-gray-300 hover:bg-white hover:text-violet-500 transition">
                        Informasi Karir
                    </button>
                </li>
                <li>
                    <button id="tab-tujuan" onclick="showTab('tujuan')"
                        class="tab-btn w-full text-left px-4 py-3 rounded-lg bg-violet-800 text-gray-300 hover:bg-white hover:text-violet-500 transition">
                        Pemilihan Tujuan
                    </button>
                </li>
                <li>
                    <button id="tab-perencanaan" onclick="showTab('perencanaan')"
                        class="tab-btn w-full text-left px-4 py-3 rounded-lg bg-violet-800 text-gray-300 hover:bg-white hover:text-violet-500 transition">
                        Perencanaan
                    </button>
                </li>
                <li>
                    <button id="tab-pemecahan" onclick="showTab('pemecahan')"
                        class="tab-btn w-full text-left px-4 py-3 rounded-lg bg-violet-800 text-gray-300 hover:bg-white hover:text-violet-500 transition">
                        Pemecahan Masalah
                    </button>
                </li>
                <li>
                    <button id="tab-lkpd" onclick="showTab('lkpd')"
                        class="tab-btn w-full text-left px-4 py-3 rounded-lg bg-violet-800 text-gray-300 hover:bg-white hover:text-violet-500 transition">
                        LKPD
                    </button>
                </li>
            </ul>

            
            <div
                class="m-4 p-6 bg-purple-50 text-medium text-gray-700 dark:text-white dark:bg-violet-300 rounded-lg w-full shadow-md">

                
                <div id="content-penilaian" class="tab-content">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Dimensi penilaian diri</h2>
                    <p> <strong class="font-bold text-white md:text-l">Dimensi penilaian diri</strong> adalah berbagai aspek
                        yang dievaluasi oleh individu tentang dirinya sendiri,
                        seperti kinerja, keterampilan, nilai-nilai, kekuatan, kelemahan, dan pencapaian. Dimensi-dimensi ini
                        digunakan untuk introspeksi guna mendapatkan pemahaman yang lebih baik tentang diri sendiri,
                        mendorong pertumbuhan pribadi, dan menyelaraskan tujuan pribadi dengan tujuan organisas</p>
                </div>

                
                <div id="content-informasi" class="tab-content hidden">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Informasi Karir</h2>
                    <p> <strong class="font-bold text-white md:text-l">Dimensi informasi karier</strong> adalah aspek
                        kematangan karier yang mengukur sejauh mana seseorang aktif
                        mencari dan menggunakan informasi tentang dunia kerja, serta sejauh mana mereka memiliki pengetahuan
                        yang memadai mengenai pilihan karier. Ini mencakup sikap terhadap sumber informasi (seperti orang
                        tua, guru, atau konselor), motivasi untuk eksplorasi karier, dan pemahaman tentang berbagai jenis
                        pekerjaan serta tuntutan di dalamnya</p>
                </div>

                
                <div id="content-tujuan" class="tab-content hidden">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Pemilihan Tujuan</h2>
                    <p><strong class="font-bold text-white md:text-l">"Dimensi pemilihan tujuan"</strong> merujuk pada
                        aspek-aspek yang membentuk proses penetapan dan pencapaian
                        tujuan, yang mencakup jangka waktu (jangka pendek, menengah, panjang), arah (dari atas ke bawah,
                        bawah ke atas, atau horizontal), dan sifat (misalnya, apakah tujuannya spesifik atau umum).
                        Dimensi-dimensi ini membantu organisasi atau individu dalam merencanakan tindakan yang tepat dan
                        mengantisipasi kondisi masa depan untuk mencapai hasil yang diinginkan. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Chaos Theory</h2>
                    <p><strong class="font-bold text-white md:text-l">Chaos theory</strong> adalah pendekatan pengembangan
                        karier yang melihat karier sebagai proses yang kompleks, dinamis, dan tidak dapat diprediksi, yang
                        dipengaruhi oleh banyak faktor yang terus berubah. Teori ini menekankan pentingnya adaptasi,
                        fleksibilitas, dan kemampuan untuk merespons perubahan dan kejadian tak terduga, alih-alih mencoba
                        merencanakan setiap langkah karier secara kaku. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Tujuan chaos Theory</h2>
                    <p><strong class="font-bold text-white md:text-l">Tujuan chaos theory</strong> adalah untuk membantu
                        individu menavigasi ketidakpastian dan kompleksitas karier dengan menanamkan pola pikir yang
                        adaptif, tangguh, dan fleksibel alih-alih berpegang pada rencana linier yang kaku. Teori ini
                        membantu orang memahami bahwa perkembangan karier bersifat non-linier, dipengaruhi oleh kejadian tak
                        terduga dan kebetulan, dan bertujuan untuk memberdayakan mereka agar dapat mengeksplorasi
                        kemungkinan, beradaptasi dengan perubahan, dan mengembangkan kesadaran diri serta keterampilan yang
                        dapat ditransfer. </p>
                </div>

                
                <div id="content-perencanaan" class="tab-content hidden">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Dimensi Perencanaan</h2>
                    <p><strong class="font-bold text-white md:text-l">Dimensi perencanaan dalam
                            efikasi karir</strong> merujuk pada tiga dimensi utama dari keyakinan individu terhadap
                        kemampuan mereka
                        untuk melakukan tugas-tugas yang diperlukan dalam perencanaan karir, yaitu level (tingkat kesulitan
                        tugas), generality (cakupan tugas yang mampu diatasi), dan strength (kekuatan keyakinan dalam
                        menghadapi kesulitan). Ini adalah indikator career decision making self efficacy yang memengaruhi
                        individu dalam membuat keputusan karir. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Metode SMART</h2>
                    <p><strong class="font-bold text-white md:text-l">Metode SMART</strong> adalah kerangka kerja
                        perencanaan
                        yang menguraikan tujuan menjadi kriteria: Specific (Spesifik), Measurable (Terukur), Achievable
                        (Dapat Dicapai), Relevant (Relevan), dan Time-bound (Terikat Waktu). Dengan membatasi tujuan sesuai
                        kriteria ini, tujuan menjadi lebih jelas, mudah dipantau, dan meningkatkan kemungkinan untuk
                        tercapai. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Tujuan Metode SMART</h2>
                    <p><strong class="font-bold text-white md:text-l">Tujuan Metode SMART</strong> aadalah untuk membuat
                        tujuan menjadi lebih jelas, terarah, terukur, dan dapat dicapai, sehingga meningkatkan fokus,
                        motivasi, dan akuntabilitas untuk mencapai target secara lebih efisien dan efektif. Metode ini juga
                        membantu dalam memecah tujuan besar menjadi langkah-langkah kecil yang bisa dikelola, serta
                        menyediakan kerangka kerja untuk memantau kemajuan dan melakukan evaluasi. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Contoh penerapan metode SMART
                    </h2>
                    <p>

                    <h3> <strong class="font-bold text-white md:text-l">Tujuan Awal:</strong> Ingin menjadi profesional
                        di bidang digital marketing </h3>
                    <p><strong class="font-bold text-white md:text-l">S - Specific:</strong> "Saya ingin mendapatkan
                        posisi sebagai Digital Marketing Specialist di perusahaan rintisan (startup) yang sedang
                        berkembang."</p>
                    <p><strong class="font-bold text-white md:text-l">M - Measurable:</strong>
                    <ul class="list-disc list-inside text-white dark:text-white space-y-2">
                        <li class="pl-4 ">
                            "Saya akan menyelesaikan 3 kursus online terkait SEO, SEM, dan Content Marketing."
                        </li>
                        <li class="pl-4">
                            "Saya akan membangun portofolio proyek marketing di 2 perusahaan, termasuk magang."
                        </li>
                        <li class="pl-4">
                            "Saya akan melamar ke minimal 50 lowongan pekerjaan selama 3 bulan."
                        </li>
                    </ul>
                    <p><strong class="font-bold text-white md:text-l">A - Achievable:</strong>
                    <ul class="list-disc list-inside text-white dark:text-white space-y-2">
                        <li class="pl-4 ">
                            "Saya akan mendaftar kursus dan mengatur waktu untuk belajar 2 jam setiap malam."
                        </li>
                        <li class="pl-4">
                            "Saya akan mendaftar magang di perusahaan yang sesuai dengan minat saya."
                        </li>
                        <li class="pl-4">
                            "Saya akan mendapatkan referensi dari teman atau profesional yang sudah bekerja di bidang ini."
                        </li>
                    </ul>
                    <p><strong class="font-bold text-white md:text-l">R - Relevant:</strong>
                    <ul class="list-disc list-inside text-white dark:text-white space-y-2">
                        <li class="pl-4 ">
                            "Posisi Digital Marketing Specialist ini sangat relevan dengan minat saya di bidang pemasaran
                            digital dan akan membuka banyak peluang di masa depan."
                        </li>
                    </ul>
                    <p><strong class="font-bold text-white md:text-l">T - Time-bound:</strong>
                    <ul class="list-disc list-inside text-white dark:text-white space-y-2">
                        <li class="pl-4 ">
                            "Saya akan menyelesaikan 3 kursus dalam 4 bulan."
                        </li>
                        <li class="pl-4">
                            "Saya akan menyelesaikan portofolio proyek magang dalam waktu 3 bulan."
                        </li>
                        <li class="pl-4">
                            "Saya akan mengirimkan 50 lamaran kerja dalam 3 bulan setelah menyelesaikan kursus dan magang."
                        </li>
                    </ul>
                    </p>

                </div>

                
                <div id="content-pemecahan" class="tab-content hidden">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Pemecahan Masalah</h2>
                    <p><strong class="font-bold text-white md:text-l">Dimensi pemecahan masalah</strong> alam efikasi karir
                        merujuk pada keyakinan individu terhadap kemampuannya untuk mengatasi tugas-tugas karier yang
                        bervariasi tingkat kesulitannya. Dimensi ini mencakup penilaian seberapa yakin seseorang dalam
                        menyelesaikan pekerjaan yang mudah, rumit, atau sangat sulit, serta kemampuan untuk tetap gigih saat
                        menghadapi tantangan. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Contoh tantangan dalam
                        merencanakan karir</h2>
                    <p><strong class="font-bold text-white md:text-l">Contoh tantangan dalam merencanakan karir</strong>
                        meliputi kurangnya keterampilan yang relevan, tidak adanya tujuan karir yang jelas, lingkungan kerja
                        yang tidak mendukung, perubahan industri yang cepat, serta kesulitan menyeimbangkan antara karir dan
                        kehidupan pribadi. Tantangan lain juga bisa berupa kurangnya jaringan profesional, hambatan
                        keuangan, diskriminasi, atau tantangan pribadi seperti kurangnya rasa percaya diri atau
                        ketidakmampuan beradaptasi. </p>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-fuchsia-800 mb-2">Vidio Motivasi</h2>
                    <div class="w-full aspect-video rounded-lg overflow-hidden shadow-md">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/Il7wvSC6xvs?si=cdxKDZaKAPm269Wl"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>

                </div>

                
                <div id="content-lkpd" class="tab-content hidden">
                    <h2 class="text-2xl font-bold text-fuchsia-800 mb-6">LKPD Perencanaan Karier (SMART)</h2>

                    <form class="max-w-2xl mx-auto bg-white dark:bg-white p-6 rounded-2xl shadow-lg space-y-6">
                        
                        <div>
                            <label for="specific" class="block mb-2 text-sm font-semibold text-gray-950 dark:text-gray-950">
                                Apa tujuan karier yang ingin kamu capai secara jelas?
                            </label>
                            <textarea id="specific" name="specific" rows="3"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-400 dark:border-gray-300 dark:text-white dark:focus:ring-violet-400 dark:focus:border-violet-400"
                                placeholder="Tuliskan tujuan kariermu di sini..."></textarea>
                        </div>

                        
                        <div>
                            <label for="measurable"
                                class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-950">
                                Bagaimana kamu bisa mengukur kemajuan menuju tujuan tersebut?
                            </label>
                            <textarea id="measurable" name="measurable" rows="3"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-400 dark:border-gray-300 dark:text-white dark:focus:ring-violet-400 dark:focus:border-violet-400"
                                placeholder="Tuliskan indikator atau ukuran keberhasilanmu..."></textarea>
                        </div>

                        
                        <div>
                            <label for="achievable"
                                class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-950">
                                Apakah tujuan ini realistis dan bisa dicapai dengan kemampuanmu sekarang? Langkah apa yang
                                akan dilakukan?
                            </label>
                            <textarea id="achievable" name="achievable" rows="3"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-400 dark:border-gray-300 dark:text-white dark:focus:ring-violet-400 dark:focus:border-violet-400"
                                placeholder="Tuliskan langkah-langkah atau rencana tindakanmu..."></textarea>
                        </div>

                        
                        <div>
                            <label for="relevant" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-950">
                                Mengapa tujuan ini penting bagimu? Apakah sesuai dengan minat dan bakatmu?
                            </label>
                            <textarea id="relevant" name="relevant" rows="3"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-400 dark:border-gray-300 dark:text-white dark:focus:ring-violet-400 dark:focus:border-violet-400"
                                placeholder="Tuliskan alasan mengapa tujuan ini penting..."></textarea>
                        </div>

                        
                        <div>
                            <label for="timebound"
                                class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-950">
                                Kapan kamu menargetkan tujuan ini tercapai?
                            </label>
                            <textarea id="timebound" name="timebound" rows="3"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-400 dark:border-gray-300 dark:text-white dark:focus:ring-violet-400 dark:focus:border-violet-400"
                                placeholder="Tuliskan waktu atau target pencapaianmu..."></textarea>
                        </div>

                        
                        <div class="pt-4 text-center">
                            <button type="submit"
                                class="px-6 py-2.5 bg-violet-600 text-white font-semibold rounded-lg hover:bg-violet-700 focus:ring-4 focus:ring-violet-300 transition-all duration-200">
                                Kirim Jawaban
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>

        
        <script>
            function showTab(tabName) {
                
                document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));

                
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('bg-violet-600', 'text-white', 'dark:bg-violet-500');
                    b.classList.add('bg-violet-100', 'dark:bg-violet-800', 'text-gray-800', 'dark:text-gray-200');
                });

                
                document.getElementById('content-' + tabName).classList.remove('hidden');

                
                const activeBtn = document.getElementById('tab-' + tabName);
                activeBtn.classList.remove('bg-violet-100', 'dark:bg-violet-800', 'text-gray-800', 'dark:text-gray-200');
                activeBtn.classList.add('bg-violet-600', 'text-white', 'dark:bg-violet-500');
            }
        </script>


    </div>




@endsection