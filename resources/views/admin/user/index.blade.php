@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <div class="p-4 mt-20 rounded-lg">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">All Users</h1>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="overflow-auto rounded-2xl">
            <table id="user-table" class="w-full overflow-auto rounded-lg">
                <thead class="text-xs text-white uppercase bg-blue-700">
                    <tr>
                        <th scope="col" class="px-4 py-4 text-start sm:px-6">No</th>
                        <th scope="col" class="px-4 py-4 text-start sm:px-6">Name</th>
                        <th scope="col" class="px-4 py-4 text-start sm:px-6">Email</th>
                        <th scope="col" class="px-4 py-4 text-start sm:px-6">Gender</th>
                        <th scope="col" class="px-4 py-4 text-center sm:px-6">Phone</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="bg-white">
                            <td class="px-4 py-4 font-medium text-gray-900 sm:px-6 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-4 text-gray-900 sm:px-6">
                                {{ $user->name }}
                            </td>
                            <td class="max-w-xs px-4 py-4 text-gray-900 sm:px-6">
                                {{ $user->email ?? '-' }}
                            </td>
                            <td class="px-4 py-4 text-gray-900 sm:px-6">
                                {{ ucwords(str_replace('-', ' ', strtolower($user->gender->value))) }}
                            </td>
                            <td class="max-w-xs px-4 py-4 text-gray-900 sm:px-6">
                                {{ $user->phone ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-0">
                                <div
                                    class="flex flex-col items-center justify-center w-full h-full px-6 py-12 text-center text-gray-500">
                                    <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-semibold text-gray-700">No users found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
