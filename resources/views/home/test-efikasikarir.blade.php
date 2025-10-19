@extends('layouts.guest')

@section('title', 'Kuesioner Efikasi Karier')

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
      
        <section class="text-center mb-10">
            <h1 class="text-4xl font-bold text-blue-700 mb-3">Kuesioner Efikasi Karier</h1>
            <p class="text-gray-600 text-lg">Isi setiap pernyataan sesuai tingkat keyakinan Anda menggunakan skala 1–5.</p>
        </section>

        
        <div class="bg-white dark:bg-blue-500 rounded-3xl shadow-xl p-8 sm:p-10">
            <form id="careerForm" action="{{ route('hasil-efikasikarir') }}" method="POST" class="space-y-6">
                @csrf
                <div id="questionsContainer" class="space-y-6"></div>

                <div class="text-center pt-6">
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3 dark:bg-indigo-700 dark:hover:bg-blue-600">
                        Kirim Jawaban
                    </button>
                </div>
            </form>
        </div>

        <div class="relative h-24 mt-16">
            <svg class="absolute inset-x-0 bottom-0" viewBox="0 0 1200 120" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 Q300,100 600,60 T1200,60 L1200,120 L0,120 Z" fill="#3b82f6" opacity="0.05" />
            </svg>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const questions = [
        "Saya yakin dapat menentukan karier yang sesuai dengan minat saya.",
        "Saya yakin dapat mencapai cita-cita karier saya.",
        "Saya dapat mengatasi hambatan dalam mencapai tujuan karier.",
        "Saya tahu langkah-langkah yang perlu dilakukan untuk mencapai karier impian.",
        "Saya percaya diri dalam memilih jurusan atau bidang studi.",
        "Saya dapat membuat keputusan karier dengan mempertimbangkan kemampuan saya.",
        "Saya mampu bersaing dengan orang lain dalam dunia kerja.",
        "Saya yakin dapat beradaptasi dengan perubahan pekerjaan.",
        "Saya percaya diri berbicara dengan orang lain tentang pilihan karier saya.",
        "Saya tahu kelebihan dan kekurangan diri saya terkait karier.",
        "Saya yakin dapat menghadapi kegagalan dalam perjalanan karier saya.",
        "Saya dapat mengatur waktu untuk mempersiapkan masa depan karier.",
        "Saya yakin dapat mengembangkan kemampuan diri sesuai bidang pekerjaan.",
        "Saya dapat mencari informasi terkait karier secara mandiri.",
        "Saya yakin dapat menyelesaikan masalah yang berkaitan dengan karier.",
        "Saya dapat berinisiatif mencari peluang kerja atau magang.",
        "Saya merasa percaya diri menghadapi proses wawancara kerja.",
        "Saya yakin dapat menyesuaikan diri di lingkungan kerja baru.",
        "Saya percaya diri bekerja sama dengan orang lain.",
        "Saya yakin dapat meningkatkan kemampuan profesional saya.",
        "Saya tahu nilai dan minat saya dalam memilih karier.",
        "Saya yakin dapat mengambil keputusan penting terkait masa depan karier.",
        "Saya mampu menghadapi tekanan dalam lingkungan kerja.",
        "Saya yakin dapat berprestasi di bidang yang saya pilih.",
        "Saya percaya diri menghadapi masa depan karier saya."
    ];

    const container = document.getElementById("questionsContainer");

   
    questions.forEach((text, i) => {
        const questionNum = i + 1;
        const questionDiv = document.createElement("div");
        questionDiv.className =
            "p-4 border border-gray-200 dark:border-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition";
        questionDiv.innerHTML = `
            <p class="font-medium text-gray-800 dark:text-white mb-3">${questionNum}. ${text}</p>
            <div class="flex flex-col sm:flex-row justify-between gap-2 sm:gap-4 text-center">
                ${[
                    { val: 1, label: "Sangat Tidak Setuju" },
                    { val: 2, label: "Tidak Setuju" },
                    { val: 3, label: "Netral" },
                    { val: 4, label: "Setuju" },
                    { val: 5, label: "Sangat Setuju" },
                ].map(opt => `
                    <div class="flex items-center justify-center w-full">
                        <input id="q${questionNum}_${opt.val}" type="radio" value="${opt.val}" name="q${questionNum}"
                            class="w-4 h-4 appearance-none border-2 border-gray-300 rounded-full bg-white 
                                   checked:border-orange-500 checked:bg-orange-500 focus:ring-2 focus:ring-orange-400 focus:ring-offset-0
                                   transition duration-200 cursor-pointer">
                        <label for="q${questionNum}_${opt.val}" 
                            class="ml-2 text-sm font-medium text-gray-700 dark:text-white">${opt.label}</label>
                    </div>
                `).join("")}
            </div>
        `;
        container.appendChild(questionDiv);
    });

    
    document.getElementById("careerForm").addEventListener("submit", (e) => {
        e.preventDefault();
        e.target.submit();
    });
});
</script>
@endsection
