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

        @if (!isset($result))
            <div class="p-6 text-center text-yellow-800 bg-yellow-100 border border-yellow-300 rounded-lg">
                <p class="text-lg font-semibold">Belum ada hasil tes yang tersedia untuk akun ini.</p>
            </div>
        @else
            {{-- Ringkasan Hasil --}}
            <section class="p-8 bg-white border border-blue-200 shadow-lg rounded-xl">
                <h2 class="pb-2 mb-6 text-2xl font-semibold text-blue-800 border-b border-blue-300">
                    Ringkasan Hasil
                </h2>

                <p class="mb-3 text-lg text-gray-800">
                    <strong>Nama Peserta:</strong>
                    <span class="font-semibold text-blue-600">{{ $result->user->name ?? 'Anonim' }}</span>
                </p>

                <p class="mb-3 text-lg text-gray-800">
                    <strong>Jenis Kecerdasan:</strong>
                    <span class="font-semibold text-blue-700 capitalize">
                        {{ $result->intelligence->name ?? 'Tidak Diketahui' }}
                    </span>
                </p>

                <p class="mb-3 text-lg text-gray-800">
                    <strong>Skor:</strong>
                    <span class="font-semibold text-blue-600">
                        {{ $result->score ?? '0' }}
                    </span>
                </p>

                <p class="mb-3 text-lg text-gray-800">
                    <strong>Kategori:</strong>
                    <span class="font-semibold text-blue-600 capitalize">
                        {{ $result->category ? ucwords(str_replace('_', ' ', strtolower($result->category))) : '-' }}
                    </span>
                </p>
                 <p class="mb-3 text-lg text-gray-800">
                    <strong>Nama Pekerjaan:</strong>
                    <span class="font-semibold text-blue-600">
                        @foreach ( $result->intelligence->jobIntelligences as $job )
                            {{ $job->name }}
                            @if (!$loop->last)
                                , 
                            @endif
                        
                        @endforeach
                    </span>
                </p>
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
