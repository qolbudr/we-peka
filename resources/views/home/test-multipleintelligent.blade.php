@extends('layouts.guest')

@section('title', 'Tes Multiple Intelligences')

@section('content')
<div class="relative w-full min-h-screen overflow-hidden bg-gradient-to-br from-blue-50 to-white">
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="#3b82f6" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <div class="relative px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{-- Header --}}
        <section class="text-center mb-10">
            <h1 class="text-4xl font-bold text-blue-700 mb-3">Tes Multiple Intelligences</h1>
            <p class="text-gray-600 text-lg">
                Pilih tingkat kesesuaian setiap pernyataan dengan diri Anda menggunakan skala 1–5.
            </p>
        </section>

        {{-- Kartu Tes --}}
        <div class="bg-white dark:bg-blue-500 rounded-3xl shadow-xl p-8 sm:p-10">
            <form id="miForm" action="{{ route('hasil-multipleintelligent') }}" method="POST">
                @csrf
                <div id="questionsContainer" class="space-y-6"></div>

                <div class="text-center pt-8">
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-base px-6 py-3 transition duration-300">
                        Kirim Jawaban
                    </button>
                </div>
            </form>
        </div>

        {{-- Footer wave --}}
        <div class="relative h-24 mt-16">
            <svg class="absolute inset-x-0 bottom-0" viewBox="0 0 1200 120" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 Q300,100 600,60 T1200,60 L1200,120 L0,120 Z" fill="#3b82f6" opacity="0.05" />
            </svg>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    const questions = [
        "Saya senang menulis cerita, puisi, atau jurnal pribadi.",
        "Saya mudah memahami makna kata-kata dan suka bermain dengan bahasa.",
        "Saya sering memecahkan masalah atau teka-teki logika.",
        "Saya suka berhitung atau bermain dengan angka.",
        "Saya merasa mudah mengingat pola atau urutan.",
        "Saya menikmati kegiatan fisik seperti olahraga, menari, atau membuat sesuatu dengan tangan.",
        "Saya lebih mudah memahami sesuatu dengan praktik langsung.",
        "Saya sering mengetuk meja, bernyanyi, atau bersenandung tanpa sadar.",
        "Saya mudah mengingat lirik lagu dan irama musik.",
        "Saya merasa nyaman bekerja sama dengan orang lain.",
        "Saya dapat memahami perasaan dan kebutuhan orang lain.",
        "Saya menikmati waktu sendiri untuk berpikir dan merenung.",
        "Saya mengenal dengan baik kelebihan dan kekurangan diri saya.",
        "Saya senang berada di alam terbuka atau memelihara hewan.",
        "Saya tertarik dengan tanaman, cuaca, dan lingkungan sekitar.",
        "Saya mudah mengingat tempat dan arah jalan.",
        "Saya suka menggambar, melukis, atau membuat desain visual.",
        "Saya suka menganalisis situasi dan membuat perencanaan langkah demi langkah.",
        "Saya merasa mudah mengatur sesuatu agar berjalan sistematis.",
        "Saya senang membantu teman dalam memecahkan masalah mereka.",
        "Saya merasa lebih produktif saat bekerja dalam kelompok.",
        "Saya senang mencari tahu tentang fenomena alam atau eksperimen sains.",
        "Saya sering membayangkan atau membuat visualisasi dalam pikiran.",
        "Saya sering mengatur waktu dengan disiplin dan mandiri.",
        "Saya percaya diri dalam membuat keputusan berdasarkan pertimbangan diri sendiri."
    ];

    const container = document.getElementById("questionsContainer");

    // tampilkan pertanyaan dengan jarak antar soal yang rapi
    questions.forEach((text, i) => {
        const questionNum = i + 1;
        const questionDiv = document.createElement("div");
        questionDiv.className = `
            p-6 border border-gray-200 dark:border-white rounded-xl bg-white dark:bg-blue-600 
            hover:bg-gray-50 dark:hover:bg-blue-700 shadow-sm transition
        `;
        questionDiv.innerHTML = `
            <p class="font-semibold text-gray-800 dark:text-white mb-4">${questionNum}. ${text}</p>
            <div class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-5 text-center">
                ${[
                    { val: 1, label: "Sangat Tidak Sesuai" },
                    { val: 2, label: "Tidak Sesuai" },
                    { val: 3, label: "Netral" },
                    { val: 4, label: "Sesuai" },
                    { val: 5, label: "Sangat Sesuai" },
                ].map(opt => `
                    <div class="flex items-center justify-center w-full">
                        <input id="q${questionNum}_${opt.val}" type="radio" value="${opt.val}" name="q${questionNum}"
                            class="w-4 h-4 appearance-none border-2 border-gray-400 rounded-full bg-white 
                                   checked:border-orange-500 checked:bg-orange-500 focus:ring-2 focus:ring-orange-400 
                                   transition duration-200 cursor-pointer">
                        <label for="q${questionNum}_${opt.val}" 
                            class="ml-2 text-sm font-medium text-gray-700 dark:text-white">${opt.label}</label>
                    </div>
                `).join("")}
            </div>
        `;
        container.appendChild(questionDiv);
    });

    // kirim tanpa validasi (meskipun ada pertanyaan kosong)
    const form = document.getElementById("miForm");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        form.submit();
    });
});
</script>
@endsection
