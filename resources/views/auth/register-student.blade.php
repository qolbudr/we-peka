@extends('layouts.auth-layout')

@section('title', 'Register Student')

@section('content')
    <div class="relative z-10 w-full max-w-xl bg-white shadow rounded-2xl">
        <div class="p-6 md:p-8">
            <!-- Header -->
            <div class="mb-6 text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-white border-2 rounded-full shadow-2xl border-violet-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-violet-600 md:w-10 md:h-10" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Buat Akun Siswa</h1>
                <p class="text-sm text-slate-600">Daftar sekarang dan mulai perjalanan belajar</p>
            </div>

            <form id="registerForm" method="POST" action="{{ route('register-student.store') }}"
                class="grid grid-cols-1 gap-4 md:grid-cols-2" novalidate>
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name"
                        required
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:outline-none"
                        placeholder="Masukkan nama lengkap" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        required
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:outline-none"
                        placeholder="name@gmail.com" />
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block mb-2 text-sm font-semibold text-gray-700">Nomor Telepon</label>
                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel"
                        required
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:outline-none"
                        placeholder="08xxxxxxxxxx" />
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block mb-2 text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                    <select id="gender" name="gender" required
                        class="w-full px-4 py-2 text-sm text-gray-900 bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:outline-none">
                        <option value="" disabled selected>Pilih jenis kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-semibold text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:outline-none"
                        placeholder="Minimal 8 karakter" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-semibold text-gray-700">Konfirmasi
                        Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="new-password" required
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:outline-none"
                        placeholder="Ulangi password" />
                </div>

                <!-- Submit + footer -->
                <div class="col-span-1 mt-4 space-y-4 md:col-span-2">
                    <button type="submit"
                        class="w-full px-6 py-2 text-base font-semibold text-white transition-all duration-200 shadow-lg rounded-xl bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-violet-300">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                            Daftar Sekarang
                        </span>
                    </button>

                    <p class="pt-4 text-sm text-center text-gray-600 border-t border-gray-200">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}"
                            class="font-semibold text-violet-600 hover:text-violet-800 hover:underline">Login di
                            sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#registerForm').on('submit', function(e) {
                if (!this.checkValidity()) {
                    e.preventDefault();
                    ['name', 'email', 'phone', 'gender', 'password', 'password_confirmation'].forEach(
                        function(id) {
                            const el = document.getElementById(id);
                            if (el && !el.value) {
                                el.setAttribute('aria-invalid', 'true');
                                iziToast.error({
                                    title: 'Error',
                                    message: (id === 'password_confirmation' ?
                                            'Konfirmasi password' : 'Field ' + id) +
                                        ' wajib diisi',
                                    position: 'topRight'
                                });
                            } else if (el) {
                                el.removeAttribute('aria-invalid');
                            }
                        });
                    return;
                }

                e.preventDefault();

                $.ajax({
                        url: this.action,
                        method: 'POST',
                        data: $(this).serialize(),
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .done(function() {
                        iziToast.success({
                            title: 'Success',
                            message: 'Registrasi berhasil',
                            position: 'topRight'
                        });
                    })
                    .fail(function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON?.errors) {
                            Object.values(xhr.responseJSON.errors).flat().forEach(function(msg) {
                                iziToast.error({
                                    title: 'Error',
                                    message: msg,
                                    position: 'topRight'
                                });
                            });
                        } else {
                            const msg = xhr.responseJSON?.message || 'Terjadi kesalahan. Coba lagi.';
                            iziToast.error({
                                title: 'Gagal',
                                message: msg,
                                position: 'topRight'
                            });
                        }
                    });
            });
        });
    </script>
@endsection
