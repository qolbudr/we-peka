@extends('layouts.auth-layout')

@section('title', 'Confirm Password')

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
                <h1 class="text-2xl font-bold text-slate-900">Konfirmasi Password</h1>
                <p class="text-sm text-slate-600">
                    This is a secure area of the application. Please confirm your password before continuing.
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                    <input id="password" name="password" type="password" value="{{ old('password') }}" required autofocus
                        autocomplete="current-password"
                        class="w-full px-4 py-2 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-300 focus:ring-offset-0 focus:outline-none placeholder:text-gray-400"
                        placeholder="password" />
                    @error('password')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full shadow-xl py-2 px-6 text-[15px] font-medium rounded-md text-white bg-violet-800 hover:bg-violet-900 focus:outline-none focus:ring-4 focus:ring-violet-300">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
