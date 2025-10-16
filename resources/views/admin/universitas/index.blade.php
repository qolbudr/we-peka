@extends('layouts.app')

@section('title', 'Universitas')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">

        @php
            use App\Models\TypeStudy;
            $typeStudies = TypeStudy::all();
        @endphp


        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-900">Data Universitas</h1>

            <button data-modal-target="addUniversityModal" data-modal-toggle="addUniversityModal"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                + Tambah Universitas
            </button>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Universitas</th>
                        <th scope="col" class="px-6 py-3">Tipe Studi</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($universities as $index => $univ)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $univ->name }}</td>
                            <td class="px-6 py-4">{{ $univ->typeStudy->name ?? 'Tidak ada data' }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">


                                <button data-modal-target="editUniversityModal{{ $univ->id }}"
                                    data-modal-toggle="editUniversityModal{{ $univ->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2">
                                    Edit
                                </button>


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


                        <div id="editUniversityModal{{ $univ->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900/70 backdrop-blur-sm">
                            <div class="relative w-full max-w-md p-4">
                                <div
                                    class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-6">


                                    <div class="flex items-center justify-between pb-4 border-b dark:border-gray-700">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Edit Universitas
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg text-sm w-8 h-8 flex justify-center items-center transition"
                                            data-modal-hide="editUniversityModal{{ $univ->id }}">
                                            ✕
                                        </button>
                                    </div>


                                    <form action="{{ route('universitas.update', $univ->id) }}" method="POST"
                                        class="pt-6 space-y-6">
                                        @csrf
                                        @method('PUT')


                                        <div>
                                            <label for="name-{{ $univ->id }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Nama Universitas
                                            </label>
                                            <input type="text" id="name-{{ $univ->id }}" name="name" value="{{ $univ->name }}"
                                                class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3 transition"
                                                placeholder="Masukkan nama universitas" required>
                                        </div>


                                        <div>
                                            <label for="type_study_id-{{ $univ->id }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Tipe Studi
                                            </label>
                                            <select id="type_study_id-{{ $univ->id }}" name="type_study_id"
                                                class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3 transition"
                                                required>
                                                <option value="">-- Pilih Tipe Studi --</option>
                                                @foreach ($typeStudies as $type)
                                                    <option value="{{ $type->id }}" {{ $univ->type_study_id == $type->id ? 'selected' : '' }}>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div
                                            class="pt-6 flex justify-end space-x-3 border-t border-gray-200 dark:border-gray-700">
                                            <button type="button" data-modal-hide="editUniversityModal{{ $univ->id }}"
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
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data universitas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



    <div id="addUniversityModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg p-6">
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg">


                <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Universitas</h3>
                    <button type="button" data-modal-hide="addUniversityModal"
                        class="text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg p-2 transition">
                        ✕
                    </button>
                </div>


                <form action="{{ route('universitas.store') }}" method="POST" class="px-6 py-5 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama
                            Universitas</label>
                        <input type="text" name="name" required
                            class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                            placeholder="Contoh: Universitas Indonesia">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipe Studi</label>
                        <select name="type_study_id" required
                            class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                            <option value="">-- Pilih Tipe Studi --</option>
                            @foreach ($typeStudies as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2 pt-2">
                        <button type="button" data-modal-hide="addUniversityModal"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-300 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection