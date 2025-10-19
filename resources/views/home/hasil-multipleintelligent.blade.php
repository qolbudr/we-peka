@extends('layouts.guest')

@section('title', 'Hasil Tes Multiple Intelligence')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-blue-50 py-16">
    <div class="max-w-4xl mx-auto px-6">

        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Hasil Tes Multiple Intelligence</h1>
            <p class="text-gray-500 text-sm">Berikut hasil analisis dari jawaban Anda berdasarkan 8 jenis kecerdasan.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 space-y-6">
            @php
                $intelligences = [
                    'Kecerdasan Linguistik (Verbal)' => 'Kemampuan menggunakan kata dan bahasa dengan efektif, baik secara lisan maupun tulisan.',
                    'Kecerdasan Logis-Matematis' => 'Kemampuan berpikir logis, menganalisis masalah, dan menggunakan penalaran.',
                    'Kecerdasan Visual-Spasial' => 'Kemampuan memvisualisasikan bentuk, ruang, dan arah.',
                    'Kecerdasan Kinestetik' => 'Kemampuan menggunakan tubuh secara terampil untuk mengekspresikan ide dan menyelesaikan tugas.',
                    'Kecerdasan Musikal' => 'Kemampuan memahami, mencipta, dan mengekspresikan musik serta irama.',
                    'Kecerdasan Interpersonal' => 'Kemampuan memahami dan berinteraksi dengan orang lain secara efektif.',
                    'Kecerdasan Intrapersonal' => 'Kemampuan memahami diri sendiri, perasaan, dan tujuan pribadi.',
                    'Kecerdasan Naturalis' => 'Kemampuan mengenali dan mengklasifikasikan flora, fauna, dan fenomena alam.'
                ];
            @endphp

            @foreach ($intelligences as $type => $desc)
                <div class="p-5 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 hover:shadow-lg transition">
                    <h3 class="text-xl font-bold text-blue-800 mb-2">{{ $type }}</h3>
                    <p class="text-gray-700">{{ $desc }}</p>
                </div>
            @endforeach
        </div>

       
        <div class="text-center mt-10">
            <a href="{{ route('test-multipleintelligent') }}"
               class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-orange-500 to-blue-600 rounded-full shadow-md hover:scale-105 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Tes
            </a>
        </div>
    </div>
</div>
@endsection
