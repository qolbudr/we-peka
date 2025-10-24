<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b shadow-lg bg-white/80 backdrop-blur-lg border-violet-100"
    x-data="{ open: false, profileOpen: false }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            {{-- Logo --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                <div class="relative">
                    <img src="{{ asset('images/wepeka-logo.png') }}" alt="Logo WE PEKA"
                        class="w-10 h-10 rounded-full object-cover transition-transform duration-300 group-hover:scale-110 shadow-md">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-blue-700 drop-shadow-md">
                        WE PEKA
                    </h1>
                </div>
            </a>

            {{-- Desktop --}}
            <div class="flex items-center space-x-4">
                @auth
                {{-- Desktop User Profile Dropdown --}}
                <div class="relative hidden md:block" @click.away="profileOpen = false">
                    <button @click="profileOpen = !profileOpen"
                        class="flex items-center p-2 space-x-3 transition-all duration-200 rounded-lg hover:bg-violet-50 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                        <div class="relative">
                            @if (Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                    class="object-cover w-10 h-10 rounded-full">
                            @else
                                <div
                                    class="flex items-center justify-center w-10 h-10 font-bold text-white rounded-full bg-gradient-to-br from-violet-600 to-purple-600">
                                    {{ \App\Helpers\GetInitialsHelper::getInitials(Auth::user()->name) }}
                                </div>
                            @endif
                            <div
                                class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full">
                            </div>
                        </div>
                        <div class="hidden text-left lg:block">
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Str::limit(Auth::user()->email, 20) }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-600 transition-transform duration-200"
                            :class="{ 'rotate-180': profileOpen }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- Dropdown Menu User --}}
                    <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        x-cloak
                        class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 shadow-xl rounded-xl ring-1 ring-black ring-opacity-5">
                        <div class="px-4 py-3">
                            <p class="text-sm font-medium text-gray-900">Signed in as</p>
                            <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        @if (Auth::user()->hasRole('guru'))
                                    <div class="py-1">
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-violet-50 hover:text-violet-600">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    </div>
                                    @endcan

                                    <div class="py-1">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center w-full px-4 py-2 text-sm text-left text-red-600 transition-colors hover:bg-red-50">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                Sign out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                <div class="hidden md:block">
                    <a href="{{ route('login') }}"
                        class="relative inline-flex items-center px-6 py-2.5 text-sm font-semibold text-white overflow-hidden transition-all duration-300 bg-gradient-to-r from-indigo-600 via-blue-600 to-sky-600 rounded-lg shadow-lg group hover:shadow-xl hover:scale-105">
                        <span
                            class="absolute top-0 right-0 w-12 h-12 transition-all duration-1000 transform translate-x-12 -translate-y-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40"></span>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span class="relative">Login</span>
                    </a>
                </div>
                @endauth

                {{-- Hamburger Menu Button --}}
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-700 transition-colors rounded-lg md:hidden hover:bg-violet-50 hover:text-violet-600 focus:outline-none focus:ring-2 focus:ring-violet-500">
                    <svg class="w-6 h-6" :class="{ 'hidden': open, 'block': !open }" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6" :class="{ 'block': open, 'hidden': !open }" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" x-cloak
        class="border-t md:hidden bg-white/95 backdrop-blur-lg border-violet-100">
        <div class="px-4 pt-2 pb-4 space-y-2">
            <div class="pt-4 mt-4 border-t border-gray-200">
                @auth
                <div class="flex items-center px-4 py-3 mb-2 space-x-3 rounded-lg bg-violet-50">
                    @if (Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                            class="object-cover w-12 h-12 rounded-full">
                    @else
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-lg font-bold text-white rounded-full bg-gradient-to-br from-violet-600 to-purple-600">
                            {{ \App\Helpers\GetInitialsHelper::getInitials(Auth::user()->name) }}
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                {{-- Mobile User Profile --}}
                <div class="space-y-2">
                    @if (Auth::user()->hasRole('guru'))
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition-colors rounded-lg hover:bg-violet-50">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                            @endcan

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-3 text-sm font-medium text-left text-red-600 transition-colors rounded-lg hover:bg-red-50">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                {{-- Login Button Mobile --}}
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center w-full px-4 py-3 text-base font-semibold text-white transition-all rounded-lg shadow-lg bg-gradient-to-r from-violet-600 to-indigo-600 hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login
                </a>
                @endauth
            </div>
        </div>
    </div>
</nav>