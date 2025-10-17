<table id="answers-table" class="w-full">
    <thead class="text-xs text-white uppercase bg-blue-700">
        <tr>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">No</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">User</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Quiz</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Question</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Intelligence</th>
            <th scope="col" class="px-4 py-4 text-center sm:px-6">Answer Value</th>
            <th scope="col" class="px-4 py-4 text-start sm:px-6">Date</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @forelse ($answers as $answer)
            <tr class="bg-white hover:bg-gray-50">
                <!-- No -->
                <td class="px-4 py-4 font-medium text-gray-900 sm:px-6 whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>

                <!-- User -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    <div class="font-medium">{{ $answer->result->user->name }}</div>
                    <div class="text-xs text-gray-500">{{ $answer->result->user->email }}</div>
                </td>

                <!-- Quiz -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    <div>{{ $answer->result->quiz->name }}</div>
                    <div class="text-xs text-gray-500">
                        Score: {{ $answer->result->score }}
                    </div>
                </td>

                <!-- Question -->
                <td class="max-w-xs px-4 py-4 text-sm text-gray-900 sm:px-6">
                    <div class="font-medium text-gray-700">Q{{ $answer->question->question_number ?? '#' }}
                    </div>
                    <div class="text-xs text-gray-600 line-clamp-2">
                        {{ Str::limit($answer->question->question, 80) }}
                    </div>
                </td>

                <!-- Intelligence -->
                <td class="px-4 py-4 text-gray-900 sm:px-6">
                    @if ($answer->question->intelligence)
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold text-purple-800 capitalize bg-purple-100 rounded-full">
                            {{ $answer->question->intelligence->name }}
                        </span>
                    @else
                        <span class="text-sm text-gray-400">-</span>
                    @endif
                </td>

                <!-- Answer Value -->
                <td class="px-4 py-4 text-center sm:px-6">
                    @php
                        $colors = [
                            1 => 'bg-red-100 text-red-800',
                            2 => 'bg-orange-100 text-orange-800',
                            3 => 'bg-yellow-100 text-yellow-800',
                            4 => 'bg-blue-100 text-blue-800',
                            5 => 'bg-green-100 text-green-800',
                        ];
                        $badgeClass = $colors[$answer->answer_value] ?? 'bg-gray-100 text-gray-800';
                    @endphp

                    <span
                        class="inline-flex items-center justify-center w-10 h-10 text-lg font-bold rounded-full {{ $badgeClass }}">
                        {{ $answer->answer_value }}
                    </span>
                </td>

                <!-- Date -->
                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">
                    <div>{{ $answer->created_at->format('d M Y') }}</div>
                    <div class="text-xs text-gray-500">{{ $answer->created_at->format('H:i') }}</div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="p-0">
                    <div
                        class="flex flex-col items-center justify-center w-full h-full px-6 py-12 text-center text-gray-500">
                        <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <p class="text-lg font-semibold text-gray-700">No answers found</p>
                        <p class="mt-1 text-sm text-gray-500">Answers will appear here once users complete
                            quizzes</p>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
