<table id="quiz-table" class="w-full">
    <thead class="text-xs text-white uppercase bg-blue-700">
        <tr>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">No</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Quiz Name</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Description</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Category</th>
            <th scope="col" class="px-4 py-4 text-center sm:px-6">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @forelse ($quizzes as $quiz)
            <tr class="bg-white">
                <td class="px-4 py-4 font-medium text-gray-900 sm:px-6 whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    {{ $quiz->name }}
                </td>
                <td class="max-w-xs px-4 py-4 text-gray-900 sm:px-6">
                    {{ $quiz->description ?? '-' }}
                </td>
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    {{ ucwords(str_replace('_', ' ', strtolower($quiz->category->value))) }}
                </td>
                <td class="px-4 py-4 sm:px-6">
                    <div class="flex items-center justify-center gap-2">
                        <!-- Button Edit -->
                        <button data-modal-target="edit-modal_{{ $quiz->id }}"
                            data-modal-toggle="edit-modal_{{ $quiz->id }}"
                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300"
                            title="Edit Quiz">
                            <x-icon-edit />
                        </button>

                        {{-- Modal Edit --}}
                        @include('admin.quiz.edit-modal')

                        <!-- Button Delete -->
                        <button type="button" data-url="{{ route('quiz.destroy', $quiz->id) }}"
                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 btn-delete"
                            title="Delete Quiz">
                            <x-icon-delete />
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <p class="text-lg font-semibold text-gray-700">No quizzes found</p>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating your first quiz.</p>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
