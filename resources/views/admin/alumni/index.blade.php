@extends('layouts.app')

@section('title', 'Data Alumni')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-900">Data Alumni</h1>

            <button data-modal-target="addAlumniModal" data-modal-toggle="addAlumniModal"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                + Tambah Alumni
            </button>
        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Alumni</th>
                        <th class="px-6 py-3">Jenis Kelamin</th>
                        <th class="px-6 py-3">Tahun Lulus</th>
                        <th class="px-6 py-3">Universitas</th>
                        <th class="px-6 py-3">Program Studi</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alumnis as $index => $alumni)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $alumni->name }}</td>
                            <td class="px-6 py-4">
                                {{ $alumni->gender ? ucfirst($alumni->gender->value) : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $alumni->graduation_year ? $alumni->graduation_year : '-' }}
                            </td>
                            <td class="px-6 py-4">{{ $alumni->university->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $alumni->programStudy->name ?? '-' }}</td>

                            <td class="px-6 py-4 text-center flex justify-center space-x-2">
                                {{-- Tombol Edit --}}
                                <button data-modal-target="editAlumniModal{{ $alumni->id }}"
                                    data-modal-toggle="editAlumniModal{{ $alumni->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2">
                                    Edit
                                </button>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('alumnis.destroy', $alumni->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data alumni ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div id="editAlumniModal{{ $alumni->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
                            <div class="relative w-full max-w-lg p-4">
                                <div class="relative bg-white rounded-2xl shadow-lg p-8">
                                    <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
                                        <h3 class="text-lg font-semibold text-gray-900">Edit Data Alumni</h3>
                                        <button type="button" data-modal-hide="editAlumniModal{{ $alumni->id }}"
                                            class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
                                    </div>

                                    <form action="{{ route('alumnis.update', $alumni->id) }}" method="POST" class="space-y-6">
                                        @csrf
                                        @method('PUT')

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Alumni</label>
                                            <input type="text" name="name" value="{{ $alumni->name }}" required
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                        </div>

                                        {{-- Jenis Kelamin --}}
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                                            <select name="gender" required
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="male" {{ $alumni->gender?->value === 'male' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="female" {{ $alumni->gender?->value === 'female' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Lulus</label>
                                            <input type="number" name="graduation_year" value="{{ $alumni->graduation_year }}"
                                                required
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                        </div>

                                        <div class="grid grid-cols-2 gap-5">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Universitas</label>
                                                <select name="university_id" required
                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                    focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                                    <option value="">-- Pilih Universitas --</option>
                                                    @foreach ($universities as $univ)
                                                        <option value="{{ $univ->id }}"
                                                            {{ $alumni->university_id == $univ->id ? 'selected' : '' }}>
                                                            {{ $univ->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                                                <select name="program_study_id" required
                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                    focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5">
                                                    <option value="">-- Pilih Program Studi --</option>
                                                    @foreach ($programStudies as $prody)
                                                        <option value="{{ $prody->id }}"
                                                            {{ $alumni->program_study_id == $prody->id ? 'selected' : '' }}>
                                                            {{ $prody->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-4">
                                            <button type="button" data-modal-hide="editAlumniModal{{ $alumni->id }}"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
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
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data alumni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah Alumni --}}
    <div id="addAlumniModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg p-6">
            <div class="relative bg-white rounded-2xl shadow-lg">
                <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Data Alumni</h3>
                    <button type="button" data-modal-hide="addAlumniModal"
                        class="text-gray-400 hover:bg-gray-200 rounded-lg p-2 transition">✕</button>
                </div>

                <form action="{{ route('alumnis.store') }}" method="POST" class="px-6 py-5 space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Alumni</label>
                        <input type="text" name="name" required
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 px-3 py-2" placeholder="Masukkan nama alumni">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="gender" required
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Lulus</label>
                        <input type="number" name="graduation_year" required
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 px-3 py-2" placeholder="Contoh: 2023">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Universitas</label>
                            <select name="university_id" required
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                                <option value="">-- Pilih Universitas --</option>
                                @foreach ($universities as $univ)
                                    <option value="{{ $univ->id }}">{{ $univ->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                            <select name="program_study_id" required
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                                <option value="">-- Pilih Program Studi --</option>
                                @foreach ($programStudies as $prody)
                                    <option value="{{ $prody->id }}">{{ $prody->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-2">
                        <button type="button" data-modal-hide="addAlumniModal"
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
