@php
    $user = Auth::user();
@endphp

<nav class="fixed top-0 z-50 w-full shadow-lg bg-gradient-to-r from-blue-700 to-indigo-700">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            <!-- Left Section -->
            <div class="flex items-center space-x-4">
                <!-- Mobile Toggle Button -->
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-white transition-all duration-200 rounded-lg sm:hidden hover:bg-white/20 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-white/30">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <svg class="w-8 h-8 transition-transform duration-300 group-hover:scale-110" viewBox="0 0 50 50"
                            xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="navLogoGrad" x1="0%" y1="0%" x2="100%"
                                    y2="100%">
                                    <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#0004ff;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <circle cx="25" cy="25" r="23" fill="url(#navLogoGrad)" />
                            <path d="M15,20 L25,15 L35,20 L35,30 L25,35 L15,30 Z" fill="white" opacity="0.9" />
                            <circle cx="25" cy="25" r="5" fill="url(#navLogoGrad)" />
                        </svg>
                    </div>
                    <div class="">
                        <h1 class="text-xl font-bold text-white drop-shadow-md">
                            WE PEKA
                        </h1>
                    </div>
                </a>
            </div>

            {{--  User Profile --}}
            <div class="flex items-center space-x-3">
                <div class="relative flex items-center">
                    <button type="button"
                        class="flex items-center justify-center text-white transition-all duration-200 rounded-full md:p-2 md:space-x-3 md:rounded-lg"
                        data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}"
                                class="object-cover w-10 h-10 rounded-full shadow-lg ring-2 ring-white/30">
                        @else
                            <div
                                class="flex items-center justify-center w-10 h-10 font-bold text-white rounded-full shadow-lg bg-gradient-to-br from-blue-500 to-indigo-500">
                                {{ \App\Helpers\GetInitialsHelper::getInitials($user->name) }}
                            </div>
                        @endif
                        <div class="hidden text-left lg:block">
                            <p class="text-sm font-semibold text-white capitalize">{{ $user->name }}</p>
                            <p class="text-xs font-medium text-blue-200 capitalize">
                                {{ $user->roles->pluck('name')->join(', ') }}
                            </p>
                        </div>
                        <svg class="hidden w-4 h-4 text-white transition-transform duration-200 lg:block" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- User Dropdown Menu --}}
                    <div id="dropdown-user"
                        class="absolute right-0 z-50 hidden w-56 mt-2 bg-white divide-y divide-blue-100 shadow-2xl top-full rounded-2xl ring-1 ring-blue-200">
                        <div class="px-4 py-3 bg-gradient-to-br from-blue-50 to-purple-50 rounded-t-2xl">
                            <p class="text-sm font-semibold text-blue-900 capitalize">{{ $user->name }}</p>
                            <p class="text-xs truncate text-blue-600 mt-0.5">{{ $user->email }}</p>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-4 py-2.5 mx-2 text-sm font-medium transition-all duration-200 rounded-lg text-blue-700 hover:bg-blue-100 hover:text-blue-900 active:bg-blue-200">
                                <svg class="flex-shrink-0 w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                My Profile
                            </a>
                        </div>
                        <div class="py-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2.5 mx-2 text-sm font-medium text-left text-red-600 transition-all duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 active:bg-red-100">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
