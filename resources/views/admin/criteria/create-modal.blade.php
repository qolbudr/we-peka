<div id="create-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t md:p-5">
                <h3 class="text-xl font-semibold text-gray-900">
                    Create New Criteria
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                    data-modal-hide="create-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form id="formCreate" action="{{ route('criteria.store') }}" method="POST">
                @csrf
                <div class="p-4 space-y-4 md:p-5">
                    <!-- Quiz Name -->
                    <div>
                        <label for="quiz-id" class="block mb-2 text-sm font-medium text-gray-900">
                            Quiz Name <span class="text-red-500">*</span>
                        </label>
                        <select name="quiz_id" id="quiz-id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 capitalize">
                            <option value="" selected disabled>Choose a quiz</option>
                            @foreach ($quizzes as $quiz)
                                <option value="{{ $quiz->id }}">
                                    {{ $quiz->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Min Score Range -->
                        <div>
                            <label for="min-score-range" class="block mb-2 text-sm font-medium text-gray-900">
                                Min Score Range <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="min_score_range" id="min-score-range" value="1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Enter Min Score Range">
                        </div>

                        <!-- Max Score Range -->
                        <div>
                            <label for="max-score-range" class="block mb-2 text-sm font-medium text-gray-900">
                                Max Score Range <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="max_score_range" id="max-score-range" value="1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Enter Max Score Range">
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select name="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected disabled>Choose a category</option>
                            <option value="sangat_rendah">Sangat Rendah</option>
                            <option value="rendah">Rendah</option>
                            <option value="sedang">Sedang</option>
                            <option value="tinggi">Tinggi</option>
                            <option value="sangat_tinggi">Sangat Tinggi</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                            Description
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter quiz description"></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end gap-3 p-4 border-t border-gray-200 rounded-b md:p-5">
                    <button type="button" data-modal-hide="create-modal"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Create Criteria
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
