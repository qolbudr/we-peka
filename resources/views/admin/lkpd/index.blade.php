@extends('layouts.app')

@section('title', 'LKPD')

@section('content')
    <div class="p-4 mt-20 sm:p-6 lg:p-8">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">LKPD Management</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your lkpd</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="relative overflow-auto rounded-lg shadow-md">
            @include('admin.lkpd.table-lkpd')
        </div>
    </div>

    <!-- Modal untuk setiap LKPD -->
    @foreach ($lkpds as $lkpd)
        @include('admin.lkpd.detail', ['lkpd' => $lkpd])
    @endforeach
@endsection
