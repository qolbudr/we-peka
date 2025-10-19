@extends('layouts.guest')

@section('title', 'Hasil Tes Efikasi Karir')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-orange-50 py-16">
    <div class="max-w-3xl mx-auto px-6">

       
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Hasil Tes Efikasi Karir</h1>
            <p class="text-gray-500 text-sm">Berikut hasil analisis dari jawaban Anda terhadap 25 pernyataan.</p>
        </div>

   
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="p-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Tingkat Efikasi Karir Anda</h2>

                <div class="relative w-48 h-48 mx-auto mb-6">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="96" cy="96" r="80" stroke="#E5E7EB" stroke-width="14" fill="none" />
                        <circle cx="96" cy="96" r="80" 
                                stroke="url(#grad)" stroke-width="14" fill="none"
                                stroke-dasharray="502" 
                                stroke-dashoffset="calc(502 - (502 * {{ $score ?? 75 }}) / 100)" 
                                stroke-linecap="round" />
                        <defs>
                            <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#f97316" />
                                <stop offset="100%" stop-color="#2563eb" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-4xl font-extrabold text-gray-800">{{ $score ?? 75 }}%</span>
                    </div>
                </div>

                
                @php
                    $level = 'Sedang';
                    $desc = 'Anda memiliki keyakinan yang cukup baik terhadap kemampuan diri dalam mengambil keputusan karir dan menghadapi tantangan.';
                    if(($score ?? 75) >= 85) {
                        $level = 'Tinggi';
                        $desc = 'Anda memiliki efikasi karir yang tinggi. Anda percaya diri, mampu mengatasi hambatan, dan yakin terhadap arah karir yang diambil.';
                    } elseif(($score ?? 75) <= 60) {
                        $level = 'Rendah';
                        $desc = 'Efikasi karir Anda masih perlu ditingkatkan. Cobalah memperkuat keyakinan diri dan mencari pengalaman karir yang lebih beragam.';
                    }
                @endphp

                <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-white rounded-full
                             {{ $level === 'Tinggi' ? 'bg-green-500' : ($level === 'Sedang' ? 'bg-yellow-500' : 'bg-red-500') }}">
                    {{ $level }}
                </span>

                <p class="text-gray-700 leading-relaxed max-w-xl mx-auto">{{ $desc }}</p>
            </div>
        </div>

       
        <div class="mt-10 bg-gradient-to-br from-blue-600 via-sky-600 to-indigo-600 text-white rounded-3xl shadow-lg p-8">
            <h3 class="text-2xl font-bold mb-4">Saran Pengembangan Diri</h3>
            <ul class="space-y-3 text-white/90 text-sm leading-relaxed">
                <li>• Ikuti pelatihan atau seminar tentang perencanaan karir.</li>
                <li>• Perbanyak pengalaman baru di bidang yang diminati.</li>
                <li>• Cari mentor atau panutan yang sudah sukses dalam bidang serupa.</li>
                <li>• Tetap percaya diri dan evaluasi kekuatan serta kelemahan diri.</li>
            </ul>
        </div>

        
       <div class="text-center mt-12">
    <a href="{{ route('test-efikasikarir') }}"
       class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-orange-500 to-blue-600 
              rounded-full shadow-md hover:scale-105 hover:shadow-lg transition duration-300">
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
