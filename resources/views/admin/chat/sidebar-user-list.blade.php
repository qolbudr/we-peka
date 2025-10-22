<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-30 flex flex-col w-full transition-transform duration-300 transform -translate-x-full bg-white border-r shadow-xl md:relative md:translate-x-0 md:w-80 lg:w-96">
    <!-- Sidebar Header -->
    <div
        class="flex items-center justify-between px-4 py-4 border-b mt-14 md:mt-0 md:py-5 bg-gradient-to-r from-blue-600 to-blue-700">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.dashboard') }}"
                class="hidden p-2 text-white transition-colors rounded-lg md:block hover:bg-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-bold text-white">Messages</h2>
                <p class="text-xs text-blue-100">{{ count($users) }} contacts</p>
            </div>
        </div>
        <button id="close-sidebar" class="p-2 text-white rounded-lg md:hidden hover:bg-blue-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Search Bar -->
    <div class="px-4 py-3 bg-white border-b">
        <div class="relative">
            <input type="text" id="search-users" placeholder="Search conversations..."
                class="w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>

    <!-- User List -->
    <div class="flex-1 overflow-y-auto" id="users-list">
        @foreach ($users as $user)
            <div class="relative px-4 py-3 transition-all duration-200 border-l-4 border-transparent cursor-pointer user-item group hover:bg-gradient-to-r hover:from-blue-50 hover:to-transparent hover:border-blue-500"
                data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
                <div class="flex items-center space-x-3">

                    <div class="relative flex-shrink-0">
                        <div
                            class="flex items-center justify-center w-12 h-12 text-lg font-bold text-white rounded-full shadow-md bg-gradient-to-br from-blue-500 to-blue-600">
                            {{ \App\Helpers\GetInitialsHelper::getInitials($user->name) }}
                        </div>
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                        </div>
                        <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                    </div>

                    <div class="transition-opacity opacity-0 group-hover:opacity-100">
                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</aside>
