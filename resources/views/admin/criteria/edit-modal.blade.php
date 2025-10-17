<div id="edit-modal_{{ $criteria->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full p-4">
        <div class="relative bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t md:p-5">
                <h3 class="text-xl font-semibold text-gray-900">
                    Update Criteria
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                    data-modal-hide="edit-modal_{{ $criteria->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form id="formEdit" action="{{ route('criteria.update', $criteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="p-4 space-y-4 md:p-5">
                    <!-- Quiz -->
                    <div>
                        <label for="criteria-id-{{ $criteria->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900">
                            Quiz Name <span class="text-red-500">*</span>
                        </label>
                        <select name="quiz_id" id="criteria-id-{{ $criteria->id }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 capitalize">
                            @foreach ($quizzes as $quiz)
                                <option value="{{ $quiz->id }}" class="capitalize"
                                    {{ $quiz->id == $criteria->quiz_id ? 'selected' : '' }}>
                                    {{ $quiz->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Min Score Range -->
                    <div>
                        <label for="min-score-range-{{ $criteria->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900">
                            Min Score Range <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="min_score_range" id="min-score-range-{{ $criteria->id }}"
                            value="{{ old('min_score_range', $criteria->min_score_range) }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter Min Score Range" min="1">
                    </div>

                    <!-- Max Score Range -->
                    <div>
                        <label for="max-score-range-{{ $criteria->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900">
                            Max Score Range <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="max_score_range" id="max-score-range-{{ $criteria->id }}"
                            value="{{ old('max_score_range', $criteria->max_score_range) }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter Max Score Range" min="1">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="quiz-category-{{ $criteria->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select name="category" id="quiz-category-{{ $criteria->id }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" disabled {{ !$criteria->category ? 'selected' : '' }}>
                                Choose a category
                            </option>
                            <option value="sangat_rendah"
                                {{ old('category', $criteria->category) == 'sangat_rendah' ? 'selected' : '' }}>
                                Sangat Rendah
                            </option>
                            <option value="rendah"
                                {{ old('category', $criteria->category) == 'rendah' ? 'selected' : '' }}>
                                Rendah
                            </option>
                            <option value="sedang"
                                {{ old('category', $criteria->category) == 'sedang' ? 'selected' : '' }}>
                                Sedang
                            </option>
                            <option value="tinggi"
                                {{ old('category', $criteria->category) == 'tinggi' ? 'selected' : '' }}>
                                Tinggi
                            </option>
                            <option value="sangat_tinggi"
                                {{ old('category', $criteria->category) == 'sangat_tinggi' ? 'selected' : '' }}>
                                Sangat Tinggi
                            </option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description-{{ $criteria->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900">
                            Description
                        </label>
                        <textarea name="description" id="description-{{ $criteria->id }}" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter description">{{ old('description', $criteria->description) }}</textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end gap-3 p-4 border-t border-gray-200 rounded-b md:p-5">
                    <button type="button" data-modal-hide="edit-modal_{{ $criteria->id }}"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update Criteria
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
