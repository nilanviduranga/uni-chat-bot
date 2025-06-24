<div x-data="{ open: false }" class="md:hidden">
    <!-- Sidebar Backdrop & Panel -->
    <template x-teleport="body">
        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50" style="display: none;">
            <div class="fixed inset-0 bg-black/50" @click="open = false"></div>
            <div class="fixed left-0 top-0 bottom-0 w-80 bg-gray-50 border-r border-gray-200 flex flex-col"
                x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full" @click.away="open = false"
                @keydown.escape.window="open = false">
                <!-- Mobile Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <img src="{{ asset('asset/images/logo/NEXORA.svg') }}" class="w-16" />
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors" @click="open = false">
                        <i class="fa-solid fa-xmark w-5 h-5"></i>
                    </button>
                </div>

                <!-- Mobile New Chat -->
                <div class="p-4 border-b border-gray-200">
                    <a href="/" onclick="event.preventDefault(); startNewConversation();" @click="open = false"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-plus w-4 h-4"></i>
                        New conversation
                    </a>
                </div>

                <!-- Mobile Conversations -->
                <div class="flex-1 overflow-y-auto p-2">
                    <div class="space-y-1" id="chat-history-section-mobile">
                    </div>
                </div>

                <!-- User Section -->
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full overflow-hidden flex items-center justify-center bg-gray-200">
                            <img src="https://avatar.vercel.sh/{{ urlencode($userName) }}.svg}}"
                                alt="{{ $userName }}" class="w-8 h-8 object-fit">
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-gray-900 truncate">{{ $userName ?? '' }}
                            </div>
                            <div class="text-xs text-gray-500">{{ $userEmail ?? '' }}</div>
                        </div>
                        <div class="relative" x-data="{ userDropdown: false }">
                            <button class="p-1 hover:bg-gray-100 rounded-lg transition-colors"
                                @click="userDropdown = !userDropdown">
                                <i class="fa-solid fa-ellipsis-vertical w-4 h-4 text-gray-400"></i>
                            </button>
                            <div x-show="userDropdown" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute bottom-full right-0 mb-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1"
                                @click.away="userDropdown = false">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings
                                    (Soon)</a>
                                <a href="{{route('help')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Help
                                    & Support</a>
                                <div class="border-t border-gray-100 mt-1 pt-1">
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" type="button" onclick="logOutUser()"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        Log out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <!-- Mobile menu button -->
    <button class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors" @click="open = true"
        aria-label="Open sidebar">
        <i class="fa-solid fa-bars w-5 h-5"></i>
    </button>
</div>
