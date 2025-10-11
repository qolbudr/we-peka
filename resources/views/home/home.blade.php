@extends('layouts.guest')

@section('title', 'Home')

@section('content')
    <div class="flex items-center justify-center w-full min-h-screen bg-white border shadow rounded-2xl">
        <div class="w-full max-w-xl px-6 py-16 border rounded-2xl bg-zinc-800">
            <h1 class="text-4xl font-semibold text-center text-white md:text-5xl lg:text-6xl">
                DANCOK KOE LET
            </h1>
            <p class="mt-4 text-center text-zinc-300">
                PEKOK
            </p>
        </div>
    </div>

    {{-- Button Chat --}}
    <button id="chat-toggle"
        class="fixed z-40 inline-flex items-center gap-2 px-4 py-3 text-white rounded-full shadow-lg bg-violet-600 bottom-6 right-6 hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-white">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v9z" stroke-width="1.5" />
        </svg>
        <span>Tanya</span>
    </button>

    {{-- Chat Panel --}}
    @include('home.chat-panel')
@endsection

@section('scripts')
    <script>
        const btn = document.getElementById('chat-toggle');
        const panel = document.getElementById('chat-panel');
        const closeBtn = document.getElementById('chat-close');
        const form = document.getElementById('chat-form');
        const input = document.getElementById('chat-input');
        const messages = document.getElementById('chat-messages');

        // Toggle panel
        const open = () => {
            panel.classList.remove('hidden');
            panel.focus();
            requestAnimationFrame(() => input.focus({
                preventScroll: true
            }));
        };
        const close = () => panel.classList.add('hidden');
        btn.addEventListener('click', open);
        closeBtn.addEventListener('click', close);

        // Autosize textarea
        input.addEventListener('input', () => {
            input.style.height = 'auto';
            input.style.height = Math.min(input.scrollHeight, 160) + 'px';
        });

        // Data pesan
        const msgs = [{
                id: 1,
                role: 'guru',
                text: 'Halo! Ada yang bisa dibantu?',
            },
            {
                id: 2,
                role: 'siswa',
                text: 'Mau tanya cara testnya gimana yaa ?',
            },
            {
                id: 3,
                role: 'guru',
                text: 'Langung klik boss',
            },
        ];

        // Typing state
        let typingTimer = null;

        function showTyping() {
            const node = document.createElement('div');
            node.id = 'typing';
            node.className = 'flex items-start gap-2';
            node.innerHTML = `
                <img src="https://i.pravatar.cc/80?img=12" class="w-6 h-6 rounded-full" alt="">
                <div class="px-3 py-2 bg-white border rounded-tl-none shadow-sm rounded-2xl border-slate-200">
                    <div class="flex gap-1">
                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce [animation-delay:-.3s]"></span>
                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce [animation-delay:-.15s]"></span>
                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce"></span>
                    </div>
                </div>`;
            removeTyping();
            messages.appendChild(node);
            messages.scrollTop = messages.scrollHeight;
        }

        function removeTyping() {
            const t = document.getElementById('typing');
            if (t) t.remove();
        }

        // Render Messages
        function renderMessages() {
            messages.innerHTML = '';
            msgs.forEach(m => {
                const isSiswa = m.role === 'siswa';
                const row = document.createElement('div');
                row.className = isSiswa ? 'flex justify-end' : 'flex items-start gap-2';
                row.innerHTML = isSiswa ? `
                    <div class="break-words rounded-2xl rounded-tr-none bg-violet-600 text-white px-3 py-2 shadow max-w-[80%]">
                    <p class="text-sm">${escapeHtml(m.text)}</p>
                    </div>` : `
                    <img src="https://i.pravatar.cc/80?img=12" class="w-6 h-6 rounded-full" alt="">
                    <div class="break-words rounded-2xl rounded-tl-none bg-white border border-slate-200 px-3 py-2 shadow-sm max-w-[80%]">
                    <p class="text-sm text-slate-800">${escapeHtml(m.text)}</p>
                    </div>`;
                messages.appendChild(row);
            });
            messages.scrollTop = messages.scrollHeight;
        }
        renderMessages();

        // Submit
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const text = input.value.trim();
            if (!text) return;

            msgs.push({
                id: Date.now(),
                role: 'user',
                text,
                ts: 'Baru'
            });
            renderMessages();
            input.value = '';
            input.style.height = 'auto';

            // Simulasi balasan
            showTyping();
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                removeTyping();
                msgs.push({
                    id: Date.now() + 1,
                    role: 'agent',
                    text: 'Terima kasih! Tim akan segera merespons.',
                    ts: 'Baru'
                });
                renderMessages();
            }, 700);
        });

        // Escape helper
        function escapeHtml(str) {
            return str.replace(/[&<>"']/g, s => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            } [s]));
        }
    </script>
@endsection
