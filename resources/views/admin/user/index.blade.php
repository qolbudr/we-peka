@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="p-4 mt-20 border-2 border-gray-200 border-dashed rounded-lg">
        <div class="flex items-center justify-center h-48 mb-4 bg-white rounded-lg shadow">
            <p class="text-2xl text-gray-900">
                @foreach ($users as $item)
                    {{ $item->name }}
                @endforeach
            </p>
        </div>
    </div>
@endsection
