<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'We Peka') }} - Chats</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        {{-- Izitoast --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.3s ease-out;
            }

            #chat-box::-webkit-scrollbar,
            #users-list::-webkit-scrollbar {
                width: 6px;
            }

            #chat-box::-webkit-scrollbar-track,
            #users-list::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            #chat-box::-webkit-scrollbar-thumb,
            #users-list::-webkit-scrollbar-thumb {
                background: #cbd5e0;
                border-radius: 3px;
            }

            #chat-box::-webkit-scrollbar-thumb:hover,
            #users-list::-webkit-scrollbar-thumb:hover {
                background: #a0aec0;
            }

            * {
                transition-property: background-color, border-color, color, fill, stroke;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
        </style>
    </head>

    <body>
        <div class="flex h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">

            {{-- Mobile Header --}}
            @include('admin.chat.mobile-header')

            {{-- Sidebar - User List --}}
            @include('admin.chat.sidebar-user-list')

            {{-- Overlay mobile --}}
            <div id="sidebar-overlay" class="fixed inset-0 z-20 hidden bg-black bg-opacity-50 md:hidden"></div>

            <main class="flex flex-col flex-1 w-full mt-14 md:mt-0">
                {{-- Chat Header --}}
                <div class="flex items-center justify-between px-4 py-4 bg-white border-b shadow-sm md:px-6">
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center justify-center w-10 h-10 text-sm font-bold text-white rounded-full bg-gradient-to-br from-blue-500 to-blue-600 md:w-12 md:h-12"
                            id="chat-avatar">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-gray-900 md:text-lg" id="chat-header">Select a
                                conversation</h2>
                            <p class="text-xs text-gray-500" id="chat-status">Pick a user to start messaging</p>
                        </div>
                    </div>
                </div>

                {{-- Messages Container --}}
                <div class="flex-1 p-4 overflow-y-auto bg-gray-50" id="chat-box">
                    <div class="flex flex-col items-center justify-center h-full text-center" id="empty-state">
                        <div class="p-6 bg-white rounded-full shadow-lg">
                            <svg class="w-16 h-16 mx-auto text-blue-500 md:w-20 md:h-20" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-gray-900 md:text-xl">No messages yet</h3>
                        <p class="mt-2 text-sm text-gray-500 md:text-base">Select a user from the list to start
                            chatting</p>
                    </div>
                </div>

                {{-- Message Input --}}
                <div class="px-4 py-4 bg-white border-t shadow-lg md:px-6">
                    <form id="message-form" class="flex items-end space-x-2 md:space-x-3">
                        <div class="flex-1">
                            <textarea id="message-input" rows="1"
                                class="w-full px-4 py-3 text-sm transition-all border border-gray-300 resize-none rounded-2xl md:text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-100 disabled:cursor-not-allowed max-h-32"
                                placeholder="Type your message..." disabled></textarea>
                        </div>

                        <button type="submit" id="send-btn"
                            class="p-3 mb-1 text-white transition-all transform rounded-full shadow-lg bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:from-gray-400 disabled:to-gray-400 disabled:cursor-not-allowed disabled:shadow-none hover:scale-105 active:scale-95"
                            disabled>
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </main>
        </div>

        {{-- jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        {{-- iziToast --}}
        <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

        {{-- Sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                let selectedUserId = null;
                let selectedUserName = null;
                const currentUserId = {{ Auth::id() }};

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Mobile Menu Toggle
                $('#mobile-menu-btn').on('click', function() {
                    $('#sidebar').removeClass('-translate-x-full');
                    $('#sidebar-overlay').removeClass('hidden');
                    $('body').addClass('overflow-hidden');
                });

                $('#close-sidebar, #sidebar-overlay').on('click', function() {
                    $('#sidebar').addClass('-translate-x-full');
                    $('#sidebar-overlay').addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                });

                // Auto-resize textarea
                $('#message-input').on('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });

                // Search Users
                $('#search-users').on('keyup', function() {
                    const searchTerm = $(this).val().toLowerCase();
                    $('.user-item').each(function() {
                        const userName = $(this).data('user-name').toLowerCase();
                        const userEmail = $(this).find('.text-gray-500').text().toLowerCase();

                        if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                            $(this).removeClass('hidden');
                        } else {
                            $(this).addClass('hidden');
                        }
                    });
                });

                // Select User
                $('.user-item').on('click', function() {
                    selectedUserId = $(this).data('user-id');
                    selectedUserName = $(this).data('user-name');

                    // Update UI
                    $('.user-item').removeClass('bg-gradient-to-r from-blue-100 to-blue-50 border-blue-500');
                    $(this).addClass('bg-gradient-to-r from-blue-100 to-blue-50 border-blue-500');

                    // Update chat header
                    const firstLetter = selectedUserName.charAt(0).toUpperCase();
                    $('#chat-header').text(selectedUserName);
                    $('#chat-status').text('Online');
                    $('#mobile-chat-title').text(selectedUserName);
                    $('#chat-avatar').html(firstLetter);

                    // Enable input
                    $('#message-input').prop('disabled', false).focus();
                    $('#send-btn').prop('disabled', false);

                    // Hide empty state
                    $('#empty-state').addClass('hidden');

                    // Close mobile sidebar
                    if (window.innerWidth < 768) {
                        $('#sidebar').addClass('-translate-x-full');
                        $('#sidebar-overlay').addClass('hidden');
                        $('body').removeClass('overflow-hidden');
                    }

                    // Load messages
                    loadMessages(selectedUserId);
                });

                // Load Messages
                function loadMessages(userId) {
                    $.ajax({
                        url: `/chat/messages/${userId}`,
                        method: 'GET',
                        success: function(messages) {
                            $('#chat-box').empty();

                            if (messages.length === 0) {
                                $('#chat-box').html(`
                                <div class="flex flex-col items-center justify-center h-full text-center">
                                    <div class="p-6 bg-white rounded-full shadow-lg">
                                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="mt-6 text-lg font-semibold text-gray-900">Start the conversation!</h3>
                                    <p class="mt-2 text-sm text-gray-500">Send your first message to ${selectedUserName}</p>
                                </div>
                            `);
                            } else {
                                messages.forEach(function(message) {
                                    appendMessage(message);
                                });
                                scrollToBottom();
                            }
                        }
                    });
                }

                // Send Message
                $('#message-form').on('submit', function(e) {
                    e.preventDefault();

                    const message = $('#message-input').val().trim();

                    if (message === '' || selectedUserId === null) {
                        return;
                    }

                    // Disable button while sending
                    $('#send-btn').prop('disabled', true);

                    $.ajax({
                        url: '/chat/send',
                        method: 'POST',
                        data: {
                            receiver_id: selectedUserId,
                            message: message
                        },
                        success: function(response) {
                            $('#message-input').val('').css('height', 'auto');
                            appendMessage(response.message);
                            scrollToBottom();
                            $('#send-btn').prop('disabled', false);
                            $('#message-input').focus();
                        },
                        error: function(xhr) {
                            alert('Error sending message');
                            $('#send-btn').prop('disabled', false);
                        }
                    });
                });

                // Append Message
                function appendMessage(message) {
                    const isSent = message.from_user_id === currentUserId;
                    const time = new Date(message.created_at).toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    let messageHtml = '';

                    if (isSent) {
                        messageHtml = `
                        <div class="flex justify-end mb-4 animate-fade-in">
                            <div class="max-w-xs md:max-w-md lg:max-w-lg">
                                <div class="px-4 py-3 text-white shadow-md bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl rounded-br-md">
                                    <p class="text-sm break-words md:text-base">${escapeHtml(message.message)}</p>
                                </div>
                                <div class="flex items-center justify-end mt-1 space-x-1">
                                    <span class="text-xs text-gray-500">${time}</span>
                                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    `;
                    } else {
                        messageHtml = `
                        <div class="flex justify-start mb-4 animate-fade-in">
                            <div class="max-w-xs md:max-w-md lg:max-w-lg">
                                <div class="px-4 py-3 bg-white border border-gray-200 shadow-md rounded-2xl rounded-bl-md">
                                    <p class="mb-1 text-xs font-semibold text-blue-600">${escapeHtml(message.sender.name)}</p>
                                    <p class="text-sm text-gray-800 break-words md:text-base">${escapeHtml(message.message)}</p>
                                </div>
                                <div class="mt-1 ml-1">
                                    <span class="text-xs text-gray-500">${time}</span>
                                </div>
                            </div>
                        </div>
                    `;
                    }

                    $('#chat-box').append(messageHtml);
                }

                function escapeHtml(text) {
                    const map = {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#039;'
                    };
                    return text.replace(/[&<>"']/g, function(m) {
                        return map[m];
                    });
                }

                function scrollToBottom() {
                    const chatBox = $('#chat-box');
                    chatBox.animate({
                        scrollTop: chatBox[0].scrollHeight
                    }, 300);
                }

                window.Echo.private(`chat.${currentUserId}`)
                    .listen('ChatMessageSent', (e) => {
                        console.log('New message received:', e);

                        if (selectedUserId === e.sender_id) {
                            appendMessage({
                                id: e.id,
                                message: e.message,
                                from_user_id: e.sender_id,
                                sender: {
                                    name: e.sender_name
                                },
                                created_at: new Date()
                            });
                            scrollToBottom();
                        }
                    });
            });
        </script>
    </body>

</html>
