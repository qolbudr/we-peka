@extends('layouts.app')

@section('title', 'Universitas')

@section('content')
    <div class="p-4 mt-20 sm:p-6 lg:p-8">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Universitas</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola daftar universitas</p>
                </div>

                <!-- Tombol Tambah -->
                <button data-modal-target="addUniversityModal" data-modal-toggle="addUniversityModal"
                    class="inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                    focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    + Tambah Universitas
                </button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="relative overflow-auto rounded-lg shadow-md bg-white">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-blue-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Universitas</th>
                        <th scope="col" class="px-6 py-3">Tipe Studi</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($universities as $index => $univ)
                        <tr class="bg-white border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $univ->name }}</td>
                            <td class="px-6 py-4">{{ $univ->typeStudy->name ?? 'Tidak ada data' }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">

                                <!-- Tombol Edit -->
                                <button data-modal-target="editUniversityModal{{ $univ->id }}"
                                    data-modal-toggle="editUniversityModal{{ $univ->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('universitas.destroy', $univ->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus universitas ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div id="editUniversityModal{{ $univ->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="relative w-full max-w-lg p-4">
        <div class="relative bg-white rounded-2xl shadow-lg p-8">
            <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Edit Universitas</h3>
                <button type="button" data-modal-hide="editUniversityModal{{ $univ->id }}"
                    class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
            </div>

            <form action="{{ route('universitas.update', $univ->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name-{{ $univ->id }}" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Universitas
                    </label>
                    <input type="text" id="name-{{ $univ->id }}" name="name" value="{{ $univ->name }}" required
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5"
                        placeholder="Masukkan nama universitas">
                </div>

                <div>
                    <label for="type_study_id-{{ $univ->id }}" class="block text-sm font-medium text-gray-700 mb-1">
                        Tipe Studi
                    </label>
                    <select id="type_study_id-{{ $univ->id }}" name="type_study_id" required
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                        <option value="">-- Pilih Tipe Studi --</option>
                        @foreach ($typeStudies as $type)
                            <option value="{{ $type->id }}"
                                {{ $univ->type_study_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-4">
                    <button type="button" data-modal-hide="editUniversityModal{{ $univ->id }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 
                        rounded-lg transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                        rounded-lg focus:ring-4 focus:ring-blue-300 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data universitas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
 <div id="addUniversityModal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="relative w-full max-w-lg p-4">
        <div class="relative bg-white rounded-2xl shadow-lg p-8">
            <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Tambah Universitas</h3>
                <button type="button" data-modal-hide="addUniversityModal"
                    class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
            </div>

            <form action="{{ route('universitas.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Universitas</label>
                    <input type="text" name="name" required
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5"
                        placeholder="Contoh: Universitas Indonesia">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Studi</label>
                    <select name="type_study_id" required
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                        <option value="">-- Pilih Tipe Studi --</option>
                        @foreach ($typeStudies as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-4">
                    <button type="button" data-modal-hide="addUniversityModal"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 
                        rounded-lg transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                        rounded-lg focus:ring-4 focus:ring-blue-300 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
