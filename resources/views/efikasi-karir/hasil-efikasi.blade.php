@extends('layouts.guest')

@section('title', 'Hasil Efikasi Karier')

@section('content')
    <div class="max-w-4xl px-6 py-16 mx-auto space-y-10">

        <h1 class="text-4xl font-extrabold tracking-tight text-center text-blue-700">
            Hasil Kuesioner Efikasi Karier
        </h1>

        @if (session('success'))
            <div class="p-4 mb-8 text-green-900 bg-green-100 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <section class="p-8 bg-white border border-blue-200 shadow-lg rounded-xl">
            <h2 class="pb-2 mb-6 text-2xl font-semibold text-blue-800 border-b border-blue-300">
                Ringkasan Hasil
            </h2>
            <p class="mb-3 text-lg text-gray-800">
                <strong>Skor Total:</strong> <span class="font-semibold text-blue-600">{{ $result->score }}</span>
            </p>
            <p class="mb-3 text-lg text-gray-800">
                <strong>Kategori Efikasi Karier:</strong>
                <span class="font-semibold text-blue-700 capitalize">
                    {{ ucwords(str_replace('_', ' ', strtolower($result->category->value))) }}
                </span>
            </p>
        </section>

        <section class="p-8 bg-white border border-blue-200 shadow-lg rounded-xl">
            <h2 class="pb-2 mb-6 text-2xl font-semibold text-blue-800 border-b border-blue-300">
                Kriteria Penilaian
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-700 border-collapse table-auto">
                    <thead>
                        <tr class="font-semibold text-blue-900 bg-blue-100">
                            <th class="px-5 py-3 border border-blue-200">Kategori</th>
                            <th class="px-5 py-3 border border-blue-200">Rentang Skor</th>
                            <th class="px-5 py-3 border border-blue-200">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criteriaList as $criteria)
                            <tr class="transition-colors duration-200 even:bg-gray-50 hover:bg-blue-50">
                                <td class="px-5 py-3 capitalize border border-blue-200">
                                    {{ ucwords(str_replace('_', ' ', strtolower($criteria->category->value))) }}
                                </td>
                                <td class="px-5 py-3 text-center border border-blue-200">
                                    {{ $criteria->min_score_range }} - {{ $criteria->max_score_range }}
                                </td>
                                <td class="px-5 py-3 border border-blue-200">
                                    {{ $criteria->description ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <div class="text-center">
            <a href="{{ route('home') }}"
                class="inline-block px-8 py-3 font-semibold text-white transition-colors duration-300 bg-blue-600 rounded-full shadow-md hover:bg-blue-700">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection