@extends('layouts.auth-layout')

@section('title', 'Forgot Password')

@section('content')
    <div class="relative min-h-[60vh] flex items-center justify-center bg-white rounded-xl">
        <div class="w-full max-w-md p-6">
            {{-- Header --}}
            <div class="mb-6 text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-white border-2 rounded-full shadow-2xl border-violet-800">
                    <svg class="w-8 h-8 text-violet-600 md:w-10 md:h-10" viewBox="0 0 24 24" fill="none" role="img"
                        aria-labelledby="lockTitle lockDesc">
                        <path d="M7 10V8a5 5 0 0 1 10 0v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <rect x="4" y="10" width="16" height="10" rx="2.5" stroke="currentColor"
                            stroke-width="1.8" />
                        <circle cx="12" cy="15" r="1" fill="currentColor" />
                        <path d="M12 16v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Lupa Password</h1>
                <p class="text-sm text-slate-600">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password
                    reset link that will allow you to choose a new one.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="grid grid-cols-2 gap-4">
                @csrf

                <div class="col-span-2 space-y-2">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        autocomplete="email"
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:ring-offset-0 focus:outline-none placeholder:text-gray-400"
                        placeholder="name@example.com" />
                    @error('email')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2 pt-2">
                    <button type="submit"
                        class="w-full shadow-xl py-2 px-6 text-[15px] font-medium rounded-md text-white bg-violet-800 hover:bg-violet-900 focus:outline-none focus:ring-4 focus:ring-violet-300">
                        Kirim Link Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
