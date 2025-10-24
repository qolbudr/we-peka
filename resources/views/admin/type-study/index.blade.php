@extends('layouts.app')

@section('title', 'Type Study')

@section('content')
    <div class="p-4 mt-20 sm:p-6 lg:p-8">
        <!-- Header -->
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Type Study</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola daftar tipe studi</p>
            </div>

            <button data-modal-target="addTypeModal" data-modal-toggle="addTypeModal"
                class="inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                + Tambah Type Study
            </button>
        </div>

        <!-- Table -->
        <div class="relative overflow-auto rounded-lg shadow-md bg-white">
            <table id="typeStudyTable" class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-blue-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Type Study</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($typeStudies as $type)
                        <tr class="bg-white border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $type->name }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">

                                <button data-modal-target="editTypeModal-{{ $type->id }}"
                                    data-modal-toggle="editTypeModal-{{ $type->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 
                                    font-medium rounded-lg text-xs px-3 py-2">
                                    Edit
                                </button>

                                <form action="{{ route('type-study.destroy', $type->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 
                                        font-medium rounded-lg text-xs px-3 py-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div id="editTypeModal-{{ $type->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
                            <div class="relative w-full max-w-lg p-4">
                                <div class="relative bg-white rounded-2xl shadow-lg p-8">
                                    <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
                                        <h3 class="text-lg font-semibold text-gray-900">Edit Type Study</h3>
                                        <button type="button" data-modal-hide="editTypeModal-{{ $type->id }}"
                                            class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
                                    </div>

                                    <form action="{{ route('type-study.update', $type->id) }}" method="POST" class="space-y-6">
                                        @csrf
                                        @method('PUT')

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Nama Type Study
                                            </label>
                                            <input type="text" name="name" value="{{ $type->name }}" required
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5"
                                                placeholder="Masukkan nama type study">
                                        </div>

                                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-4">
                                            <button type="button" data-modal-hide="editTypeModal-{{ $type->id }}"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 
                                                rounded-lg">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                                                rounded-lg focus:ring-4 focus:ring-blue-300">
                                                Simpan
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

    <!-- Modal Tambah -->
    <div id="addTypeModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg p-6">
            <div class="relative bg-white rounded-2xl shadow-lg">
                <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Type Study</h3>
                    <button type="button" data-modal-hide="addTypeModal"
                        class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
                </div>

                <form action="{{ route('type-study.store') }}" method="POST" class="px-6 py-5 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Type Study</label>
                        <input type="text" name="name" required
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                            placeholder="Contoh: Universitas Negeri">
                    </div>

                    <div class="flex justify-end space-x-2 pt-2">
                        <button type="button" data-modal-hide="addTypeModal"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
