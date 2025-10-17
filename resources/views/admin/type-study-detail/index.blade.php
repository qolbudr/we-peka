@extends('layouts.app')

@section('title', 'Detail Tipe Studi')

@section('content')
    <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg mt-14 bg-white shadow-md">

        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Data Detail Tipe Studi</h1>
            <button data-modal-target="addDetailModal" data-modal-toggle="addDetailModal"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition">
                + Tambah Detail
            </button>
        </div>

        
        <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Tipe Studi</th>
                        <th class="px-6 py-3">Spesialisasi</th>
                        <th class="px-6 py-3">Level</th>
                        <th class="px-6 py-3">Tujuan</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($typeStudyDetails as $index => $detail)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $detail->typeStudy->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4">{{ $detail->science_specialization }}</td>
                            <td class="px-6 py-4">{{ ucfirst($detail->level) }}</td>
                            <td class="px-6 py-4">{{ $detail->purpose }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">
                                
                                <button data-modal-target="editDetailModal{{ $detail->id }}"
                                    data-modal-toggle="editDetailModal{{ $detail->id }}"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 transition">
                                    Edit
                                </button>

                               
                                <form action="{{ route('study-details.destroy', $detail->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                      
                        <div id="editDetailModal{{ $detail->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex justify-center items-center bg-gray-900/60 backdrop-blur-sm">
                            <div class="relative w-full max-w-md p-4">
                                <div class="relative bg-white rounded-2xl shadow-xl border border-gray-200 p-6">
                                    <div class="flex justify-between items-center border-b pb-3">
                                        <h3 class="text-lg font-semibold text-gray-800">Edit Detail Tipe Studi</h3>
                                        <button data-modal-hide="editDetailModal{{ $detail->id }}"
                                            class="text-gray-400 hover:text-gray-700">✕</button>
                                    </div>

                                    <form action="{{ route('study-details.update', $detail->id) }}" method="POST" class="space-y-4 mt-4">
                                        @csrf
                                        @method('PUT')

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Studi</label>
                                            <select name="type_study_id" required
                                                class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                                @foreach (\App\Models\TypeStudy::all() as $type)
                                                    <option value="{{ $type->id }}" {{ $detail->type_study_id == $type->id ? 'selected' : '' }}>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Spesialisasi</label>
                                            <input type="text" name="science_specialization" required
                                                value="{{ $detail->science_specialization }}"
                                                class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                                            <select name="level" required
                                                class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                                @foreach (\App\Enums\Level::cases() as $level)
                                                    <option value="{{ $level->value }}" {{ $detail->level == $level->value ? 'selected' : '' }}>
                                                        {{ ucfirst($level->value) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                                            <input type="text" name="purpose" required
                                                value="{{ $detail->purpose }}"
                                                class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                        </div>

                                        <div class="flex justify-end space-x-3 pt-4 border-t">
                                            <button type="button" data-modal-hide="editDetailModal{{ $detail->id }}"
                                                class="px-4 py-2 text-sm text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 text-sm text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data detail tipe studi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    
    <div id="addDetailModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-gray-900/60 backdrop-blur-sm">
        <div class="relative w-full max-w-md p-4">
            <div class="relative bg-white rounded-2xl shadow-xl border border-gray-200 p-6">
                <div class="flex justify-between items-center border-b pb-3">
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Detail Tipe Studi</h3>
                    <button data-modal-hide="addDetailModal" class="text-gray-400 hover:text-gray-700">✕</button>
                </div>

                <form action="{{ route('study-details.store') }}" method="POST" class="space-y-4 mt-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Studi</label>
                        <select name="type_study_id" required
                            class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                            <option value="">-- Pilih Tipe Studi --</option>
                            @foreach (\App\Models\TypeStudy::all() as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Spesialisasi</label>
                        <input type="text" name="science_specialization" required
                            class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                            placeholder="Contoh: Teknologi Informasi">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                        <select name="level" required
                            class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                            @foreach (\App\Enums\Level::cases() as $level)
                                <option value="{{ $level->value }}">{{ ucfirst($level->value) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                        <input type="text" name="purpose" required
                            class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                            placeholder="Contoh: Pengembangan keahlian profesional">
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t">
                        <button type="button" data-modal-hide="addDetailModal"
                            class="px-4 py-2 text-sm text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
