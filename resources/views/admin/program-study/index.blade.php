@extends('layouts.app')

@section('title', 'Program Studi')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-900">Data Program Studi</h1>

            <button data-modal-target="addProgramStudyModal" data-modal-toggle="addProgramStudyModal"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                + Tambah Program Studi
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Program Studi</th>
                        <th scope="col" class="px-6 py-3">Universitas</th>
                        <th scope="col" class="px-6 py-3">Akreditasi</th>
                        <th scope="col" class="px-6 py-3">Jenjang</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($programStudies as $index => $prody)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $prody->name }}</td>
                            <td class="px-6 py-4">{{ $prody->university->name ?? 'Tidak ada data' }}</td>
                            <td class="px-6 py-4">{{ $prody->accreditation ?? '-' }}</td>
                            <td class="px-6 py-4 capitalize">{{ $prody->level }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">


                                <button data-modal-target="editProgramStudyModal{{ $prody->id }}"
                                    data-modal-toggle="editProgramStudyModal{{ $prody->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2">
                                    Edit
                                </button>


                                <form action="{{ route('program-studies.destroy', $prody->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus program studi ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>


                        <div id="editProgramStudyModal{{ $prody->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
                            <div class="relative w-full max-w-lg p-4">
                                <div class="relative bg-white rounded-2xl shadow-lg p-8">

                                    <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
                                        <h3 class="text-lg font-semibold text-gray-900">Edit Program Studi</h3>
                                        <button type="button" data-modal-hide="editProgramStudyModal{{ $prody->id }}"
                                            class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
                                    </div>


                                    <form action="{{ route('program-studies.update', $prody->id) }}" method="POST"
                                        class="space-y-6">
                                        @csrf
                                        @method('PUT')


                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Program
                                                Studi</label>
                                            <input type="text" name="name" value="{{ $prody->name }}" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5"
                                                placeholder="Masukkan nama program studi">
                                        </div>


                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Universitas</label>
                                            <select name="university_id" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                                <option value="">-- Pilih Universitas --</option>
                                                @foreach (\App\Models\University::all() as $univ)
                                                    <option value="{{ $univ->id }}" {{ $prody->university_id == $univ->id ? 'selected' : '' }}>
                                                        {{ $univ->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="grid grid-cols-2 gap-5">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Akreditasi</label>
                                                <input type="text" name="accreditation" value="{{ $prody->accreditation }}"
                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5" placeholder="Contoh: A / B / C">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                                                <select name="level" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                                    <option value="">-- Pilih Jenjang --</option>
                                                    @foreach (\App\Enums\Level::cases() as $level)
                                                        <option value="{{ $level->value }}" {{ $prody->level === $level->value ? 'selected' : '' }}>
                                                            {{ ucfirst($level->value) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>




                                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-4">
                                            <button type="button" data-modal-hide="editProgramStudyModal{{ $prody->id }}"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
                                                Batal
                                            </button>
                                            <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
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
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data program studi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div id="addProgramStudyModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg p-6">
            <div class="relative bg-white rounded-2xl shadow-lg">
                <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Program Studi</h3>
                    <button type="button" data-modal-hide="addProgramStudyModal"
                        class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
                </div>

                <form action="{{ route('program-studies.store') }}" method="POST" class="px-6 py-5 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Program Studi</label>
                        <input type="text" name="name" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                            placeholder="Masukkan nama program studi">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Universitas</label>
                        <select name="university_id" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                            <option value="">-- Pilih Universitas --</option>
                            @foreach (\App\Models\University::all() as $univ)
                                <option value="{{ $univ->id }}">{{ $univ->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Akreditasi</label>
                            <input type="text" name="accreditation" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 px-3 py-2" placeholder="Contoh: A / B / C">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                            <select name="level" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                                <option value="">-- Pilih Jenjang --</option>
                                @foreach (\App\Enums\Level::cases() as $level)
                                    <option value="{{ $level->value }}">{{ ucfirst($level->value) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-2">
                        <button type="button" data-modal-hide="addProgramStudyModal"
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