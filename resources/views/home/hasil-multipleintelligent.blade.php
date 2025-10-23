@extends('layouts.guest')

@section('title', 'Hasil Tes Multiple Intelligence')

@section('content')
    <div class="max-w-4xl px-6 py-16 mx-auto space-y-10">
        <h1 class="text-4xl font-extrabold tracking-tight text-center text-blue-700">
            Hasil Tes Multiple Intelligence
        </h1>

        @if (session('success'))
            <div class="p-4 mb-8 text-green-900 bg-green-100 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        {{-- Jika data hasil kosong --}}
        @if (!isset($results) || $results->isEmpty())
            <div class="p-6 text-center text-yellow-800 bg-yellow-100 border border-yellow-300 rounded-lg">
                <p class="text-lg font-semibold">Belum ada hasil tes yang tersedia untuk akun ini.</p>
            </div>
        @else
            {{-- Ambil salah satu data hasil untuk ambil nama user --}}
            @php
                $firstResult = $results->first();
            @endphp

            {{-- Ringkasan Hasil --}}
            <section class="p-8 bg-white border border-blue-200 shadow-lg rounded-xl">
                <h2 class="pb-2 mb-6 text-2xl font-semibold text-blue-800 border-b border-blue-300">
                    Ringkasan Hasil
                </h2>
                <p class="mb-3 text-lg text-gray-800">
                    <strong>Nama Peserta:</strong> 
                    <span class="font-semibold text-blue-600">{{ $firstResult->user->name ?? 'Anonim' }}</span>
                </p>
                <p class="mb-3 text-lg text-gray-800">
                    <strong>Kategori Kecerdasan Dominan:</strong>
                    <span class="font-semibold text-blue-700 capitalize">{{ $dominant ?? 'Belum tersedia' }}</span>
                </p>
                <p class="mb-3 text-lg text-gray-800">
                    <strong>Skor Tertinggi (Dominan):</strong>
                    <span class="font-semibold text-blue-600">{{ $highestScore ?? '0' }}</span>
                </p>
            </section>

            {{-- Detail Hasil per Kecerdasan --}}
            <section class="p-8 bg-white border border-blue-200 shadow-lg rounded-xl">
                <h2 class="pb-2 mb-6 text-2xl font-semibold text-blue-800 border-b border-blue-300">
                    Detail Hasil Analisis per Kecerdasan
                </h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-gray-700 border-collapse table-auto">
                        <thead>
                            <tr class="font-semibold text-blue-900 bg-blue-100">
                                <th class="px-5 py-3 border border-blue-200">Jenis Kecerdasan</th>
                                <th class="px-5 py-3 border border-blue-200">Skor</th>
                                <th class="px-5 py-3 border border-blue-200">Deskripsi/Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $item)
                                <tr class="transition-colors duration-200 even:bg-gray-50 hover:bg-blue-50">
                                    <td class="px-5 py-3 font-semibold text-blue-700 border border-blue-200">
                                        {{ $item->intelligence->name ?? 'Tidak Diketahui' }}
                                    </td>
                                    <td class="px-5 py-3 text-center border border-blue-200">
                                        {{ $item->score > 0 ? $item->score : '-' }}
                                    </td>
                                    <td class="px-5 py-3 border border-blue-200 capitalize">
                                        @if ($item->category)
                                            {{ ucwords(str_replace('_', ' ', strtolower($item->category->value))) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @endif

        {{-- Tombol kembali --}}
        <div class="text-center">
            <a href="{{ route('home') }}"
                class="inline-block px-8 py-3 font-semibold text-white transition-colors duration-300 bg-blue-600 rounded-full shadow-md hover:bg-blue-700">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection
