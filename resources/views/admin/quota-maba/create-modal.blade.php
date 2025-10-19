<div id="create-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t md:p-5">
                <h3 class="text-xl font-semibold text-gray-900">
                    Create New Quota
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
            <form id="formCreate" action="{{ route('quota-mabas.store') }}" method="POST">
                @csrf
                <div class="p-4 space-y-4 md:p-5">
                    <!-- University Name -->
                    <div id="university-wrapper">
                        <label for="university-id" class="block mb-2 text-sm font-medium text-gray-900">
                            University Name <span class="text-red-500">*</span>
                        </label>
                        <select name="university_id" id="university-id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 capitalize">
                            <option value="" selected disabled>Choose a university</option>
                            @foreach ($universities as $univ)
                                <option value="{{ $univ->id }}" class="capitalize">{{ $univ->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center w-full gap-4">
                        <!-- Quota -->
                        <div class="w-full">
                            <label for="quota" class="block mb-2 text-sm font-medium text-gray-900">
                                Quota <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="quota" id="quota" min="0" step="1"
                                oninput="validity.valid||(value='');" onkeypress="return event.charCode != 45"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="100">
                        </div>

                        <!-- Year -->
                        <div class="w-full">
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900">
                                Year <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="year" id="year" min="0"
                                onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '+'"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="2025">
                        </div>
                    </div>

                    <!-- Link -->
                    <div class="w-full">
                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900">
                            Link <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="link" id="link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="https://link-universitas.com">
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900">
                            Notes
                        </label>
                        <textarea name="notes" id="notes" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter notes"></textarea>
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
                        Create Quota
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
