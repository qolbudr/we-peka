@extends('layouts.app')

@section('title', 'Quota Maba')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
        <div class="flex items-center justify-center h-48 mb-4 bg-white rounded-lg shadow">
            <p class="text-2xl text-gray-900">
                data quota maba
                @foreach ($quotaMabas as $quota)
                    {{ $quota->university_id }}
                @endforeach
            </p>
        </div>
    </div>
@endsection
