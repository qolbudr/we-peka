@extends('layouts.app')

@section('title', 'Answers')

@section('content')
    <div class="p-4 mt-20 sm:p-6 lg:p-8">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Answers</h1>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="relative overflow-auto rounded-lg shadow-md">
            @include('admin.answer.table-answers')
        </div>
    </div>
@endsection
