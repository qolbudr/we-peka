@extends('layouts.guest')

@section('title', 'Home')

@section(section: 'content')
    <div class="w-full bg-violet-400 rounded-2xl overflow-hidden">
        <div class="flex items-start justify-start w-full p-12">
            <div class="max-w-xl">
                <h1 class="text-4xl font-semibold text-white md:text-5xl lg:text-6xl">
                    WE PEKA
                </h1>
                <p class="mt-4 text-white/90">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex
                    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit
                    anim id est laborum.
                </p>
            </div>
        </div>

        <div class="flex items-start justify-end w-full p-12">
            <div class="max-w-xl">
                <h1 class="text-4xl font-semibold text-white md:text-5xl lg:text-6xl">
                    TUJUAN WE PEKA
                </h1>
                <p class="mt-4 text-white/90">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex
                    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit
                    anim id est laborum.
                </p>
            </div>
        </div>

        <div class="flex items-start justify-start w-full p-12">
            <div class="max-w-xl">
                <h1 class="text-4xl font-semibold text-white md:text-5xl lg:text-6xl">
                    ABOUT WE PEKA
                </h1>
                <p class="mt-4 text-white/90">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex
                    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit
                    anim id est laborum.
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center p-12 space-x-4">
            <a href="{{ route('topiksatu') }}" class="text-white bg-gradient-to-r from-violet-500 via-violet-600 to-violet-700 
                  hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-violet-300 
                  dark:focus:ring-white font-medium rounded-lg text-xl px-8 py-4 text-center inline-block">
                Topik 1
            </a>


            <a href="{{ route('topikdua') }}" class="text-white bg-gradient-to-r from-violet-500 via-violet-600 to-violet-700 
                       hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-violet-300 
                       dark:focus:ring-white font-medium rounded-lg text-xl px-8 py-4 text-center inline-block">
                Topik 2
            </a>

            <a href="halaman-lain.html" class="text-white bg-gradient-to-r from-violet-500 via-violet-600 to-violet-700 
                       hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-violet-300 
                       dark:focus:ring-white font-medium rounded-lg text-xl px-8 py-4 text-center inline-block">
                Topik 3
            </a>
        </div>
    </div>




@endsection