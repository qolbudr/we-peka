@extends('layouts.auth-layout')

@section('title', 'Login')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen p-6">
        <div class="grid items-center w-full max-w-6xl gap-10 md:grid-cols-2">
            {{-- Content Left --}}
            <div class="max-w-lg max-md:mx-auto max-md:text-center">
                <a href="/" class="text-5xl font-semibold !leading-tight text-white italic">
                    We Peka
                </a>
                <h1 class="text-4xl font-semibold !leading-tight text-white">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </h1>
                <p class="text-[15px] mt-6 text-white leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi nemo obcaecati vero
                    dolores consequatur officiis ab libero error, at iste!
                </p>
                <p class="text-[15px] mt-12 text-white">
                    Don't have an account
                    <a href="{{ route('register.choosen') }}" class="ml-1 font-semibold text-white underline">
                        Register here
                    </a>
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Form Login --}}
            <form id="loginForm" method="POST" action="{{ route('login') }}"
                class="w-full max-w-md px-8 py-12 bg-white rounded-xl md:ml-auto max-md:mx-auto">
                @csrf

                <h2 class="mb-12 text-3xl font-bold text-slate-900">
                    Welcome Back
                </h2>

                <div class="space-y-4">
                    <div>
                        <input name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                            class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:ring-offset-0"
                            placeholder="Email address" />
                    </div>

                    <div>
                        <input name="password" type="password" autocomplete="current-password"
                            class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:ring-offset-0"
                            placeholder="Password" />
                    </div>

                    <div class="flex items-center justify-between w-full">
                        <div>
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="border-gray-300 rounded shadow-sm text-violet-600 focus:ring-violet-500"
                                    name="remember">
                                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}"
                                    class="font-medium text-violet-600 hover:underline">
                                    Forgot your password?
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-12">
                    <button type="submit"
                        class="w-full shadow-xl py-2 px-6 text-[15px] font-medium rounded-md text-white bg-violet-800 hover:bg-violet-900 focus:outline-0 cursor-pointer">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#loginForm').on('submit', function(e) {
            if (!this.checkValidity()) {
                e.preventDefault();

                if (!this.email.value) iziToast.error({
                    title: 'Error',
                    message: 'Email wajib diisi',
                    position: 'topRight'
                });
                if (!this.password.value) iziToast.error({
                    title: 'Error',
                    message: 'Password wajib diisi',
                    position: 'topRight'
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
                },
                success: function() {
                    iziToast.success({
                        title: 'Success',
                        message: 'Login berhasil',
                        position: 'topRight'
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        Object.values(xhr.responseJSON.errors).flat().forEach(function(msg) {
                            iziToast.error({
                                title: 'Error',
                                message: "Email atau Password salah",
                                position: 'topRight'
                            });
                        });
                    } else {
                        const msg = xhr.responseJSON?.message || 'Email atau password salah.';
                        iziToast.error({
                            title: 'Login gagal',
                            message: msg,
                            position: 'topRight'
                        });
                    }
                }
            });
        });
    </script>
@endsection
