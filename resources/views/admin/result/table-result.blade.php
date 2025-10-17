<table id="result-table" class="w-full">
    <thead class="text-xs text-white uppercase bg-blue-700">
        <tr>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">No</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">User Name</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Quiz Name</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Score</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Category</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Intelligence</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Date</th>
            <th scope="col" class="px-4 py-4 text-center sm:px-6">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @forelse ($results as $result)
            <tr class="bg-white hover:bg-gray-50">
                <!-- No -->
                <td class="px-4 py-4 font-medium text-gray-900 sm:px-6 whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>

                <!-- User Name -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    <div class="font-medium">{{ $result->user->name }}</div>
                    <div class="text-xs text-gray-500">{{ $result->user->email }}</div>
                </td>

                <!-- Quiz Name -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    {{ $result->quiz->name }}
                </td>

                <!-- Score -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    <span
                        class="inline-flex items-center px-3 py-1 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full">
                        {{ $result->score }}
                    </span>
                </td>

                <!-- Category -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    @if ($result->category)
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                        @if ($result->category == 'sangat_tinggi') bg-green-100 text-green-800
                                        @elseif($result->category == 'tinggi') bg-blue-100 text-blue-800
                                        @elseif($result->category == 'sedang') bg-yellow-100 text-yellow-800
                                        @elseif($result->category == 'rendah') bg-orange-100 text-orange-800
                                        @else bg-red-100 text-red-800 @endif">
                            {{ ucwords(str_replace('_', ' ', $result->category->value)) }}
                        </span>
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </td>

                <!-- Intelligence -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    @if ($result->intelligence)
                        <span
                            class="items-center px-2 py-1 text-xs font-semibold text-purple-800 capitalize bg-purple-100 rounded-full nowrap whitespace-nowrap">
                            {{ $result->intelligence->name }}
                        </span>
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </td>

                <!-- Date -->
                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">
                    <div>{{ $result->created_at->format('d M Y') }}</div>
                    <div class="text-xs text-gray-500">{{ $result->created_at->format('H:i') }}</div>
                </td>

                <!-- Actions -->
                <td class="px-4 py-4 sm:px-6">
                    <div class="flex items-center justify-center gap-2">
                        <!-- Button Delete -->
                        <button type="button" data-url="{{ route('result.destroy', $result->id) }}"
                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 btn-delete"
                            title="Delete Result">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="p-0">
                    <div
                        class="flex flex-col items-center justify-center w-full h-full px-6 py-12 text-center text-gray-500">
                        <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <p class="text-lg font-semibold text-gray-700">No results found</p>
                        <p class="mt-1 text-sm text-gray-500">Results will appear here once users complete quizzes</p>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
