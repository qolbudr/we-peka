@php
    $teacher = \App\Models\User::role('guru')->first();
@endphp

@if ($teacher)
    <div id="floating-chat-widget" class="fixed z-50 bottom-6 right-6">
        <button id="chat-toggle-btn"
            class="relative flex items-center justify-center p-4 text-white transition-all duration-300 bg-blue-600 rounded-full shadow-lg hover:bg-blue-700"
            onclick="toggleChat()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                </path>
            </svg>

            {{-- Badge notifikasi --}}
            <span id="chat-badge"
                class="absolute flex items-center justify-center hidden w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full -top-1 -right-1">0</span>
        </button>

        <div id="chat-widget-box" class="hidden bg-white rounded-lg shadow-2xl w-96 h-[500px] flex flex-col">
            {{-- Header --}}
            <div class="flex items-center justify-between px-4 py-3 text-white bg-blue-600 rounded-t-lg">
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-8 h-8 text-sm font-bold bg-blue-400 rounded-full">
                        {{ strtoupper(substr($teacher->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold">{{ $teacher->name }}</h3>
                        <p class="text-xs text-blue-100">Guru</p>
                    </div>
                </div>
                <button onclick="toggleChat()" class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            {{-- Messages Area --}}
            <div id="widget-chat-messages" class="flex-1 p-4 space-y-3 overflow-y-auto bg-gray-50">
                <div class="py-8 text-sm text-center text-gray-500">
                    <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                        </path>
                    </svg>
                    <p class="text-xs">Kirim pesan ke {{ $teacher->name }}</p>
                </div>
            </div>

            <div class="p-3 bg-white border-t border-gray-200 rounded-b-lg">
                <form id="widget-chat-form" class="flex space-x-2">
                    <input type="text" id="widget-message-input"
                        class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Ketik pesan..." autocomplete="off">
                    <button type="submit"
                        class="px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scriptjs')
        <script>
            $(document).ready(function() {
                const currentUserId = {{ Auth::id() }};
                const teacherId = {{ $teacher->id }};
                const teacherName = "{{ $teacher->name }}";
                let unreadCount = 0;
                let isWidgetOpen = false;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    }
                });

                // Toggle Chat Widget
                window.toggleChat = function() {
                    const chatBox = document.getElementById('chat-widget-box');
                    const chatBtn = document.getElementById('chat-toggle-btn');
                    const badge = document.getElementById('chat-badge');

                    if (chatBox.classList.contains('hidden')) {
                        chatBox.classList.remove('hidden');
                        chatBtn.classList.add('hidden');
                        badge.classList.add('hidden');
                        isWidgetOpen = true;
                        unreadCount = 0;
                        updateBadge();
                        loadWidgetMessages();
                    } else {
                        chatBox.classList.add('hidden');
                        chatBtn.classList.remove('hidden');
                        isWidgetOpen = false;
                    }
                };

                // Load Messages
                function loadWidgetMessages() {
                    $.ajax({
                        url: `/chat/messages/${teacherId}`,
                        method: 'GET',
                        success: function(messages) {
                            const chatBox = $('#widget-chat-messages');
                            chatBox.empty();

                            if (messages.length === 0) {
                                chatBox.html(`
                        <div class="py-8 text-sm text-center text-gray-500">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                            <p class="text-xs">Kirim pesan ke ${teacherName}</p>
                        </div>
                    `);
                            } else {
                                messages.forEach(function(message) {
                                    appendWidgetMessage(message);
                                });
                                scrollWidgetToBottom();
                            }
                        },
                        error: function(xhr) {
                            console.error('Error loading messages:', xhr);
                        }
                    });
                }

                // Send Message
                $('#widget-chat-form').on('submit', function(e) {
                    e.preventDefault();

                    const message = $('#widget-message-input').val().trim();

                    if (message === '') {
                        return;
                    }

                    const headers = {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    };

                    if (window.Echo && window.Echo.socketId()) {
                        headers['X-Socket-ID'] = window.Echo.socketId();
                    }

                    $.ajax({
                        url: '/chat/send',
                        method: 'POST',
                        headers: headers,
                        data: {
                            receiver_id: teacherId,
                            message: message
                        },
                        success: function(response) {
                            $('#widget-message-input').val('');
                            appendWidgetMessage(response.message);
                            scrollWidgetToBottom();
                        },
                        error: function(xhr) {
                            console.error('Error sending message:', xhr);
                            alert('Gagal mengirim pesan');
                        }
                    });
                });

                // Append Message
                function appendWidgetMessage(message) {
                    const isSent = message.sender_id === currentUserId || message.from_user_id ===
                        currentUserId;
                    const time = new Date(message.created_at).toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    let messageHtml = '';

                    if (isSent) {
                        messageHtml = `
                <div class="flex justify-end">
                    <div class="max-w-xs">
                        <div class="px-3 py-2 text-white bg-blue-600 rounded-lg rounded-br-none shadow-sm">
                            <p class="text-sm break-words">${escapeHtml(message.message)}</p>
                        </div>
                        <div class="mt-1 text-xs text-right text-gray-400">${time}</div>
                    </div>
                </div>
            `;
                    } else {
                        messageHtml = `
                <div class="flex justify-start">
                    <div class="max-w-xs">
                        <div class="px-3 py-2 bg-white border border-gray-200 rounded-lg rounded-bl-none shadow-sm">
                            <p class="mb-1 text-xs font-semibold text-blue-600">${teacherName}</p>
                            <p class="text-sm text-gray-800 break-words">${escapeHtml(message.message)}</p>
                        </div>
                        <div class="mt-1 text-xs text-gray-400">${time}</div>
                    </div>
                </div>
            `;
                    }

                    $('#widget-chat-messages').append(messageHtml);
                }

                function escapeHtml(text) {
                    const map = {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#039;'
                    };
                    return text.replace(/[&<>"']/g, m => map[m]);
                }

                function scrollWidgetToBottom() {
                    const chatBox = document.getElementById('widget-chat-messages');
                    chatBox.scrollTop = chatBox.scrollHeight;
                }

                function updateBadge() {
                    const badge = document.getElementById('chat-badge');
                    if (unreadCount > 0) {
                        badge.textContent = unreadCount > 9 ? '9+' : unreadCount;
                        badge.classList.remove('hidden');
                    } else {
                        badge.classList.add('hidden');
                    }
                }

                window.Echo.private(`chat.${currentUserId}`)
                    .listen('ChatMessageSent', (e) => {

                        if (e.sender_id === teacherId) {
                            if (isWidgetOpen) {
                                appendWidgetMessage({
                                    id: e.id,
                                    message: e.message,
                                    sender_id: e.sender_id,
                                    from_user_id: e.sender_id,
                                    sender: {
                                        name: e.sender_name
                                    },
                                    created_at: new Date()
                                });
                                scrollWidgetToBottom();
                            } else {
                                unreadCount++;
                                updateBadge();
                            }
                        }
                    });
            });
        </script>
    @endpush
@endif
