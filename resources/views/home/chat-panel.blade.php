<div id="chat-panel" tabindex="-1"
    class="fixed bottom-24 right-6 z-40 w-[340px] max-w-[92vw] rounded-2xl bg-white shadow-2xl border border-slate-200 hidden overflow-hidden">
    {{-- Header --}}
    <div class="flex items-center justify-between px-4 py-3 border-b border-slate-200 bg-violet-600">
        <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/80?img=12" alt="Foto tujuan chat"
                class="w-8 h-8 rounded-full ring-2 ring-violet-100">
            <div>
                <p class="text-sm font-semibold text-white">Maulana • Guru BK</p>
            </div>
        </div>
        <div class="flex items-center gap-1">
            <button id="chat-close" class="p-1.5 rounded" aria-label="Tutup chat">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M6 6l12 12M6 18L18 6" stroke-width="1.5" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Messages --}}
    <div id="chat-messages" aria-live="polite"
        class="p-4 space-y-3 overflow-y-auto min-h-[280px] max-h-[300px] bg-slate-50">
        {{-- Pesan di render disini. Function JS nya renderMessage --}}
    </div>

    {{-- Form --}}
    <form id="chat-form" class="p-3 bg-white border-t border-slate-200">
        <div class="flex items-end gap-2">
            <textarea id="chat-input" rows="1" placeholder="Tulis pertanyaan singkat..."
                class="flex-1 px-3 py-2 text-sm bg-white border rounded-lg shadow-sm resize-none border-slate-300 text-slate-900 placeholder-slate-400 focus:border-violet-500 focus:ring-2 focus:ring-violet-200 max-h-40"></textarea>
            <button type="submit"
                class="inline-flex items-center justify-center text-white rounded-lg bg-violet-600 shrink-0 h-9 w-9 hover:bg-violet-700 disabled:opacity-40"
                aria-label="Kirim">
                <svg class="w-5 h-5 rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M5 12l14-8-5 8 5 8-14-8z" stroke-width="1.5" />
                </svg>
            </button>
        </div>
    </form>
</div>
