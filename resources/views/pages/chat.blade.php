@extends('layouts.app')

@section('Title', 'Nexora Chat')

@push('header_scripts')
    <script>
        window.Laravel = {
            userId: {{ $userId }}
        };
    </script>
@endpush

@section('content')
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 lg:w-72 xl:w-80 bg-gray-50 border-r border-gray-200 flex-col">
            <!-- Header -->
            <div class="p-4 border-b border-gray-200">
                <button
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New conversation
                </button>
            </div>

            <!-- Conversations -->
            <div class="flex-1 overflow-y-auto p-2">
                <div class="space-y-1">
                    @for ($i = 1; $i <= 12; $i++)
                        <div
                            class="group flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white cursor-pointer transition-colors">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-sm text-gray-700 truncate flex-1">
                                @if ($i == 1)
                                    How to build modern web apps
                                @elseif($i == 2)
                                    Explain machine learning concepts
                                @elseif($i == 3)
                                    Laravel best practices guide
                                @elseif($i == 4)
                                    JavaScript async/await patterns
                                @elseif($i == 5)
                                    Database optimization tips
                                @else
                                    Chat {{ $i }}
                                @endif
                            </span>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- User Section -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-nexora rounded-full flex items-center justify-center">
                        <span class="text-xs font-medium text-white">U</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-gray-900 truncate">{{ $userName }}</div>
                        <div class="text-xs text-gray-500">{{ $userEmail }}</div>
                    </div>
                    <div class="relative">
                        <button id="user-menu" class="p-1 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                        <div id="user-dropdown"
                            class="absolute bottom-full right-0 mb-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings
                                (Soon)</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Help &
                                Support (Soon)</a>
                            <div class="border-t border-gray-100 mt-1 pt-1">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        Log out
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar -->
        <div id="mobile-sidebar" class="fixed inset-0 z-50 md:hidden hidden">
            <div class="fixed inset-0 bg-black/50" id="sidebar-backdrop"></div>
            <div class="fixed left-0 top-0 bottom-0 w-80 bg-gray-50 border-r border-gray-200 flex flex-col">
                <!-- Mobile Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <img src="{{ asset('asset/images/logo/NEXORA.svg') }}" class="w-16" />
                    <button id="close-sidebar" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile New Chat -->
                <div class="p-4 border-b border-gray-200">
                    <button
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New conversation
                    </button>
                </div>

                <!-- Mobile Conversations -->
                <div class="flex-1 overflow-y-auto p-2">
                    <div class="space-y-1">
                        @for ($i = 1; $i <= 12; $i++)
                            <div
                                class="group flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white cursor-pointer transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span class="text-sm text-gray-700 truncate">Chat {{ $i }}</span>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 bg-white">
                <div class="flex items-center gap-3">
                    <button id="mobile-menu" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <img src="{{ asset('asset/images/logo/NEXORA BLACK.svg') }}" class="w-16 h-8" />
                </div>

                <div class="md:hidden">
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Chat Area -->
            <div class="flex-1 flex flex-col">
                <!-- Welcome State -->
                <div id="welcome-screen" class="flex-1 flex flex-col items-center justify-center px-4 py-8">
                    <div class="text-center max-w-2xl mx-auto">
                        <h1 class="text-4xl font-semibold text-gray-900 mb-4">How can I help you today?</h1>
                        <p class="text-lg text-gray-500 mb-8">I'm Nexora, your AI assistant. I can help with writing,
                            analysis, math, coding, and much more.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl">
                            <button
                                class="p-4 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900 mb-1">Writing & Editing</h3>
                                        <p class="text-sm text-gray-500">Help with emails, essays, creative writing,
                                            and more</p>
                                    </div>
                                </div>
                            </button>

                            <button
                                class="p-4 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900 mb-1">Analysis & Research</h3>
                                        <p class="text-sm text-gray-500">Data analysis, research, and insights</p>
                                    </div>
                                </div>
                            </button>

                            <button
                                class="p-4 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-violet-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900 mb-1">Programming</h3>
                                        <p class="text-sm text-gray-500">Code review, debugging, and development help
                                        </p>
                                    </div>
                                </div>
                            </button>

                            <button
                                class="p-4 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900 mb-1">Learning & Education</h3>
                                        <p class="text-sm text-gray-500">Explanations, tutorials, and study help</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div id="chat-area" class="flex-1 overflow-y-auto hidden">
                    <div class="max-w-3xl mx-auto px-4 py-6 space-y-6">
                        <div id="chat-box">
                            <!-- Messages will be dynamically added here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Area -->
            <div class="border-t border-gray-200 bg-white p-4">
                <div class="max-w-3xl mx-auto">
                    <div class="flex gap-2">
                        <textarea id="chat-input" placeholder="Message Nexora..."
                            class="w-full resize-none border border-gray-300 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-nexora focus:border-transparent text-sm leading-relaxed min-h-[44px] max-h-32"
                            rows="1"></textarea>
                        <button id="send-button" onclick="sendMessage()"
                            class="size-12 bg-nexora hover:bg-nexora-light text-white rounded-lg flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 text-center">Nexora can make mistakes. Consider checking
                        important information.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Mobile sidebar toggle
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const sidebarBackdrop = document.getElementById('sidebar-backdrop');

        mobileMenu?.addEventListener('click', () => {
            mobileSidebar.classList.remove('hidden');
        });

        closeSidebar?.addEventListener('click', () => {
            mobileSidebar.classList.add('hidden');
        });

        sidebarBackdrop?.addEventListener('click', () => {
            mobileSidebar.classList.add('hidden');
        });

        // User menu dropdown
        const userMenu = document.getElementById('user-menu');
        const userDropdown = document.getElementById('user-dropdown');

        userMenu?.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', () => {
            userDropdown?.classList.add('hidden');
        });

        // Chat input handling
        const chatInput = document.getElementById('chat-input');
        const sendButton = document.getElementById('send-button');
        const welcomeScreen = document.getElementById('welcome-screen');
        const chatArea = document.getElementById('chat-area');

        // Auto-resize textarea
        chatInput?.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 128) + 'px';

            // Enable/disable send button
            sendButton.disabled = !this.value.trim();
        });

        // Send message
        function sendMessage() {
            if (chatInput.value.trim()) {
                welcomeScreen?.classList.add('hidden');
                chatArea?.classList.remove('hidden');
                chatInput.value = '';
                chatInput.style.height = 'auto';
                sendButton.disabled = true;
            }
        }

        sendButton?.addEventListener('click', sendMessage);

        chatInput?.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });

        // New conversation
        const newChatButtons = document.querySelectorAll('button');
        newChatButtons.forEach(button => {
            if (button.textContent.includes('New conversation')) {
                button.addEventListener('click', () => {
                    welcomeScreen?.classList.remove('hidden');
                    chatArea?.classList.add('hidden');
                    mobileSidebar?.classList.add('hidden');
                    chatInput.value = '';
                    chatInput.style.height = 'auto';
                    sendButton.disabled = true;
                });
            }
        });

        // Suggestion cards
        const suggestionCards = document.querySelectorAll('#welcome-screen button');
        suggestionCards.forEach(card => {
            card.addEventListener('click', () => {
                const title = card.querySelector('h3')?.textContent;
                if (title && chatInput) {
                    chatInput.value = `Help me with ${title.toLowerCase()}`;
                    chatInput.focus();
                    sendButton.disabled = false;
                }
            });
        });
    </script>
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script type="text/javascript" src="{{ asset('asset/scripts/pusher.js') }}"></script>
@endpush
