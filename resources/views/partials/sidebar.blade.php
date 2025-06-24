<div x-data="{ collapsed: false }"
    class="hidden md:flex bg-gray-50 border-r border-gray-200 flex-col transition-all duration-300"
    :class="collapsed ? 'w-16' : 'md:w-64 lg:w-72 xl:w-80'">

    <div class="flex items-center px-4 pt-4" x-show="collapsed" x-transition>
        <img src="{{ asset('asset/images/logo/NEXORALOGO.svg') }}" class="w-16 h-8" />
    </div>

    <!-- Header -->
    <div class="hidden md:flex items-center justify-between px-4 py-3 border-b border-gray-20">
        <div class="flex items-center gap-3" x-show="!collapsed" x-transition>
            <img src="{{ asset('asset/images/logo/NEXORA.svg') }}" class="w-16 h-8" />
        </div>

        <button id="collapse-sidebar" class="p-2 hover:bg-gray-100 rounded-lg transition-colors"
            title="Collapse sidebar" @click="collapsed = !collapsed">
            <template x-if="!collapsed">
                <i class="fa-solid fa-angles-left w-5 h-5 text-gray-400"></i>
            </template>
            <template x-if="collapsed">
                <i class="fa-solid fa-angles-right w-5 h-5 text-gray-400"></i>
            </template>
        </button>
    </div>

    <!-- New Chat Button -->
    <div class="p-4 border-b border-gray-200" x-show="!collapsed || collapsed" x-transition>
        <a href="/" onclick="event.preventDefault(); startNewConversation();"
            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            <i class="fa-solid fa-plus w-4 h-4"></i>
            <span x-show="!collapsed" x-transition>New conversation</span>
        </a>
    </div>

    <!-- Conversations -->
    <div class="flex-1 overflow-y-auto p-2 max-h-[80vh]">
        <div class="space-y-1" id="chat-history-section" x-show="!collapsed" x-transition>
            {{-- chat history load to heare --}}
        </div>
    </div>

    <!-- User Section -->
    <div class="p-4 border-t border-gray-200" x-show="!collapsed || collapsed" x-transition>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full overflow-hidden flex items-center justify-center bg-gray-200">
                <img src="https://avatar.vercel.sh/{{ urlencode($userName) }}.svg}}" alt="{{ $userName }}"
                    class="w-8 h-8 object-fit">
            </div>
            <template x-if="!collapsed">
                <div class="flex-1 min-w-0" x-transition>
                    <div class="text-sm font-medium text-gray-900 truncate">{{ $userName }}</div>
                    <div class="text-xs text-gray-500">{{ $userEmail }}</div>
                </div>
            </template>
            <template x-if="!collapsed">
                <div class="relative" x-data="{ userDropdown: false }">
                    <button class="p-1 hover:bg-gray-100 rounded-lg transition-colors"
                        @click="userDropdown = !userDropdown">
                        <i class="fa-solid fa-ellipsis-vertical w-4 h-4 text-gray-400"></i>
                    </button>
                    <div x-show="userDropdown" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute bottom-full right-0 mb-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1"
                        @click.away="userDropdown = false" style="display: none;">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings
                            (Soon)</a>
                        <a href="{{route('help')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Help
                            & Support</a>
                        <div class="border-t border-gray-100 mt-1 pt-1">
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" type="button" onclick="logOutUser()"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Log out
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
