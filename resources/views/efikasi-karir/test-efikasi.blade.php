@extends('layouts.guest')

@section('title', 'Kuesioner Efikasi Karier')

@section('content')
    @php
        $inputValue = [
            1 => 'Sangat Tidak Setuju',
            2 => 'Tidak Setuju',
            3 => 'Netral',
            4 => 'Setuju',
            5 => 'Sangat Setuju',
        ];
    @endphp

    <div class="relative flex flex-col min-h-screen bg-gradient-to-tr from-blue-100 via-white to-blue-50">
        <div class="absolute inset-0 pointer-events-none opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                <defs>
                    <pattern id="dots" width="50" height="50" patternUnits="userSpaceOnUse">
                        <circle cx="25" cy="25" r="1.5" fill="#2563eb" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dots)" />
            </svg>
        </div>

        <main class="relative flex-grow w-full max-w-5xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
            <section class="px-2 mb-12 text-center sm:px-0">
                <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-blue-700 sm:text-5xl">
                    {{ $quizFirst->name }}
                </h1>
                @if ($quizFirst->description)
                    <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">{{ $quizFirst->description }}</p>
                @endif
                <p class="max-w-lg mx-auto mt-3 font-semibold text-gray-600 text-md sm:text-lg">
                    Isi setiap pernyataan sesuai tingkat keyakinan Anda (1–5).
                </p>
            </section>

            <div
                class="p-8 transition border border-blue-200 shadow-lg bg-white/90 backdrop-blur-lg rounded-3xl hover:shadow-blue-300">
                <form id="careerForm" action="{{ route('submit.efikasi-karir') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quizFirst->id }}">

                    @foreach ($quizFirst->questions as $quest)
                        <div class="p-6 transition border border-gray-200 rounded-xl hover:border-blue-400">
                            <p class="mb-5 text-lg font-medium leading-snug text-gray-900 sm:text-xl">
                                {{ $loop->iteration }}. {{ $quest->question }}
                            </p>
                            <div class="grid grid-cols-1 gap-4 text-center md:grid-cols-5">
                                @foreach ($inputValue as $val => $label)
                                    <label for="{{ $quest->id }}-{{ $val }}"
                                        class="flex items-center cursor-pointer md:flex-col group">
                                        <input type="radio" id="{{ $quest->id }}-{{ $val }}"
                                            name="{{ $quest->id }}" value="{{ $val }}" class="sr-only peer">
                                        <div
                                            class="w-5 h-5 transition-colors border-2 border-gray-300 rounded-full md:mb-2 peer-checked:border-blue-600 peer-checked:bg-blue-600 group-hover:border-blue-400">
                                        </div>
                                        <span
                                            class="ml-2 text-xs text-gray-700 select-none md:ml-0 group-hover:text-blue-600">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="text-center">
                        <button type="submit"
                            class="px-10 py-2 font-semibold text-white transition bg-blue-600 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            Kirim Jawaban
                        </button>
                    </div>
                </form>
            </div>

            <footer class="mt-16 text-sm text-center text-gray-500 select-none">
                <p>Terima kasih telah berpartisipasi dengan jujur.</p>
            </footer>
        </main>
    </div>
@endsection

@section('scripts')
    <script>
        $('#careerForm').on('submit', function(e) {
            e.preventDefault();

            if (!this.checkValidity()) {
                Swal.fire('Error', 'Harap isi semua pertanyaan.', 'error');
                return;
            }

            $.ajax({
                url: this.action,
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(resp) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: resp.message || 'Jawaban berhasil dikirim.',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        if (resp.redirect_url) {
                            window.location.href = resp.redirect_url;
                        }
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        Object.values(xhr.responseJSON.errors).flat().forEach(function(msg) {
                            iziToast.error({
                                title: 'Error',
                                message: msg,
                                position: 'topRight'
                            });
                        });
                    } else {
                        iziToast.error({
                            title: 'Gagal',
                            message: xhr.responseJSON?.message ||
                                'Terjadi kesalahan. Coba lagi.',
                            position: 'topRight'
                        });
                    }
                }
            });
        });
    </script>
@endsection