<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'We Peka') }} - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Izitoast --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen font-sans antialiased text-gray-900 bg-gray-50">
        {{-- Header --}}
        @include('layouts.partials.guest-navigation')

        {{-- Wrapper --}}
        <div class="relative min-h-screen">
            <main class="container px-4 py-8 mx-auto">
                {{-- Main Content --}}
                <div class="pt-16 lg:pt-20">
                    @yield('content')
                </div>
            </main>

            {{-- Button Chat --}}
            <button id="chat-toggle"
                class="fixed z-40 inline-flex items-center gap-2 px-4 py-3 text-white rounded-full shadow-lg bg-violet-800 bottom-6 right-6 hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v9z" stroke-width="1.5" />
                </svg>
                <span>Tanya</span>
            </button>

            {{-- Chat Panel --}}
            @include('layouts.partials.chat-panel')

            {{-- Footer --}}
            @include('layouts.partials.guest-footer')
        </div>

        {{-- JavaScripts --}}
        {{-- Flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- iziToast -->
        <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

        {{-- Sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        @yield('scripts')
    </body>

</html>
