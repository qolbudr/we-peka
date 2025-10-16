@extends('layouts.app')

@section('title', 'Type Study')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Daftar Type Study</h2>


            <button data-modal-target="addTypeModal" data-modal-toggle="addTypeModal"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                Tambah Type Study
            </button>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
            <table id="typeStudyTable" class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs uppercase bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Type Study</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($typeStudies as $type)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $type->name }}</td>
                            <td class="px-6 py-3 text-center space-x-2">


                                <button data-modal-target="editTypeModal-{{ $type->id }}"
                                    data-modal-toggle="editTypeModal-{{ $type->id }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs">
                                    Edit
                                </button>


                                <form action="{{ route('type-study.destroy', $type->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>


                        <div id="editTypeModal-{{ $type->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900/70 backdrop-blur-sm">
                            <div class="relative w-full max-w-md p-4">
                                <div
                                    class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-6">


                                    <div class="flex items-center justify-between pb-4 border-b dark:border-gray-700">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Edit Type Study
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg text-sm w-8 h-8 flex justify-center items-center transition"
                                            data-modal-hide="editTypeModal-{{ $type->id }}">
                                            ✕
                                        </button>
                                    </div>


                                    <form action="{{ route('type-study.update', $type->id) }}" method="POST"
                                        class="pt-6 space-y-6">
                                        @csrf
                                        @method('PUT')


                                        <div>
                                            <label for="type-name-{{ $type->id }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Nama Type Study
                                            </label>
                                            <input type="text" id="type-name-{{ $type->id }}" name="name"
                                                value="{{ $type->name }}"
                                                class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3 transition"
                                                placeholder="Masukkan nama type study" required>
                                        </div>


                                        <div
                                            class="pt-6 flex justify-end space-x-3 border-t border-gray-200 dark:border-gray-700">
                                            <button type="button" data-modal-hide="editTypeModal-{{ $type->id }}"
                                                class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 rounded-lg transition">
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data Type Study.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div id="addTypeModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex justify-between items-center p-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold">Tambah Type Study</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-900"
                        data-modal-hide="addTypeModal">✕</button>
                </div>
                <form action="{{ route('type-study.store') }}" method="POST" class="p-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Type Study</label>
                        <input type="text" name="name"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Contoh: Universitas Negeri" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

   

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new DataTable('#typeStudyTable', {
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "›",
                        previous: "‹"
                    }
                }
            });
        });
    </script>
@endpush