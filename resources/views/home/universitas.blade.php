<div class="mt-6">
    <div
        class="p-2 mb-6 border border-blue-300 shadow-lg bg-gradient-to-br from-blue-600 via-sky-600 to-indigo-600 rounded-xl">
        <ul class="flex flex-wrap gap-2" id="studyTab" role="tablist">
            @foreach ($studies as $index => $study)
                <li role="presentation">
                    <button
                        class="study-tab-btn inline-block px-5 py-3 text-sm font-semibold transition-all duration-300 ease-in-out rounded-lg
                        {{ $index === 0
                            ? 'bg-white text-blue-700 shadow-md'
                            : 'bg-white/20 text-white/90 hover:bg-white/40 hover:text-white hover:-translate-y-0.5' }}"
                        id="study-{{ $study->id }}-tab" data-tabs-target="#study-{{ $study->id }}"
                        data-index="{{ $index }}" type="button" role="tab"
                        aria-controls="study-{{ $study->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        {{ $study->name }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    @php
        $accreditationColors = [
            'A' => 'bg-green-100 text-green-700',
            'B' => 'bg-blue-100 text-blue-700',
            'C' => 'bg-yellow-100 text-yellow-700',
            'Unggul' => 'bg-emerald-100 text-emerald-700',
            'Baik Sekali' => 'bg-cyan-100 text-cyan-700',
            'Baik' => 'bg-amber-100 text-amber-700',
        ];

        $bulletColors = ['bg-blue-500', 'bg-indigo-500', 'bg-purple-500', 'bg-pink-500', 'bg-rose-500'];
    @endphp

    <div id="studyTabContent">
        @foreach ($studies as $index => $study)
            <div class="{{ $index === 0 ? '' : 'hidden' }} p-6 transition-all duration-300 shadow-xl rounded-2xl bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50"
                id="study-{{ $study->id }}" role="tabpanel" aria-labelledby="study-{{ $study->id }}-tab">

                {{-- Study Information --}}
                <div class="mb-6">
                    <h3 class="mb-4 text-2xl font-bold text-blue-700">{{ $study->name }}</h3>
                    <div class="p-5 space-y-3 bg-white shadow-sm rounded-xl">
                        @forelse ($study->typeStudyDetails as $detailIndex => $detail)
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-2 h-2 mt-2 mr-3 {{ $bulletColors[$detailIndex % count($bulletColors)] }} rounded-full"></span>
                                <div class="flex-1">
                                    <span class="font-semibold text-gray-800">Spesialisasi Ilmu:</span>
                                    <span
                                        class="ml-2 text-gray-700">{{ $detail->science_specialization ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-2 h-2 mt-2 mr-3 {{ $bulletColors[($detailIndex + 1) % count($bulletColors)] }} rounded-full"></span>
                                <div class="flex-1">
                                    <span class="font-semibold text-gray-800">Jenjang:</span>
                                    <span class="ml-2 text-gray-700">{{ $detail->level ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-2 h-2 mt-2 mr-3 {{ $bulletColors[($detailIndex + 2) % count($bulletColors)] }} rounded-full"></span>
                                <div class="flex-1">
                                    <span class="font-semibold text-gray-800">Tujuan Pendidikan:</span>
                                    <span class="ml-2 text-gray-700">{{ $detail->purpose ?? '-' }}</span>
                                </div>
                            </div>
                            @if (!$loop->last)
                                <hr class="my-4 border-gray-200">
                            @endif
                        @empty
                            <div class="flex items-center justify-center py-4 text-gray-500">
                                <p>Tidak ada detail informasi</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Title --}}
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-blue-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span
                            class="px-4 text-sm font-medium text-gray-600 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
                            Data Universitas
                        </span>
                    </div>
                </div>

                {{-- University Table --}}
                <div>
                    <h4 class="mb-4 text-xl font-bold text-gray-800">Data Detail {{ $study->name }}</h4>
                    <div class="overflow-hidden border border-blue-100 shadow-md rounded-xl">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead
                                    class="text-xs font-semibold text-blue-700 uppercase bg-gradient-to-r from-blue-100 to-indigo-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 whitespace-nowrap">Nama Universitas</th>
                                        <th scope="col" class="px-6 py-4 whitespace-nowrap">Program Studi</th>
                                        <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">Akreditasi
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">Kuota MABA
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">Alumni Lolos
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @forelse ($study->universities as $university)
                                        {{-- Seng iki mboot --}}
                                        @php
                                            $programStudy = $university->programStudies->first();
                                            $totalQuota = $university->quotaMabas->sum('quota') ?? 0;
                                            $totalAlumni = $university->alumnis->count() ?? 0;
                                        @endphp

                                        <tr class="transition-colors duration-200 hover:bg-blue-50">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                {{ $university->name }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-700">
                                                @if ($university->programStudies->count() > 0)
                                                    <div class="space-y-1">
                                                        @foreach ($university->programStudies as $program)
                                                            <div>{{ $program->name ?? '-' }}</div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if ($programStudy && isset($programStudy->accreditation))
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full {{ $accreditationColors[$programStudy->accreditation] ?? 'bg-gray-100 text-gray-700' }}">
                                                        {{ $programStudy->accreditation }}
                                                    </span>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center text-gray-700">
                                                <span
                                                    class="font-medium">{{ $totalQuota > 0 ? number_format($totalQuota) : '-' }}</span>
                                            </td>
                                            <td class="px-6 py-4 text-center text-gray-700">
                                                <span
                                                    class="font-medium">{{ $totalAlumni > 0 ? number_format($totalAlumni) : '-' }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg class="w-16 h-16 mb-4 text-gray-300" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                    </svg>
                                                    <p class="font-medium text-gray-500">Belum ada data universitas
                                                        untuk kategori ini</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
