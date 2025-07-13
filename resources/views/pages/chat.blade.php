@extends('layouts.app')

@section('Title', 'Nexora Chat')

@push('header_scripts')
<script>
    window.Laravel = {
        userId: {
            {
                $userId
            }
        }
    };
</script>
@endpush

@section('content')
<div class="flex min-h-dvh max-h-dvh">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col w-full">
        <!-- Header -->
        <div class="md:hidden z-10 flex items-center justify-between px-4 py-3 border-b border-gray-200 bg-white">
            <!-- Mobile Sidebar with Alpine.js -->
            @include('partials.mobile-sidebar')

            <div class="md:hidden flex items-center gap-2">
                <a href="/" onclick="event.preventDefault(); startNewConversation();"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fa-solid fa-plus w-4 h-4"></i>
                </a>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="flex-1 flex flex-col overflow-y-scroll py-8">
            <!-- Welcome State -->
            <div id="welcome-screen" class="flex-1 flex flex-col items-center justify-center px-4 py-8 max-h-[80vh] hidden">
                <div class="text-center max-w-2xl mx-auto">
                    <h1 class="text-4xl font-semibold text-gray-900 mb-4">
                        Hey
                        {{ Str::of($userName)->explode(' ')->last() }},
                        how can I help you today?
                    </h1>
                    <p class="text-base text-gray-500 mb-8">I'm Nexora, your campus AI assistant. I can help you find
                        class and bus schedules, cafeteria menus, and many more.
                    </p>

                    <div class="flex flex-wrap gap-3 items-center justify-center">
                        <button
                            class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200 flex items-center gap-3">
                            <i
                                class="fa-solid fa-calendar-days w-5 h-5 text-blue-600 rounded-lg flex items-center justify-center"></i>
                            <h3 class="font-medium text-sm">Class Schedule</h3>
                        </button>
                        <button
                            class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200 flex items-center gap-3">
                            <i
                                class="fa-solid fa-bus w-5 h-5 text-green-600 rounded-lg flex items-center justify-center"></i>
                            <h3 class="font-medium text-sm">Bus Timings</h3>
                        </button>
                        <button
                            class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200 flex items-center gap-3">
                            <i
                                class="fa-solid fa-utensils w-5 h-5 text-violet-600 rounded-lg flex items-center justify-center"></i>
                            <h3 class="font-medium text-sm">Cafeteria Menu</h3>
                        </button>
                        <button
                            class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-left transition-colors border border-gray-200 flex items-center gap-3">
                            <i
                                class="fa-solid fa-star w-5 h-5 text-orange-600 rounded-lg flex items-center justify-center"></i>
                            <h3 class="font-medium text-sm">Campus Events</h3>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Chat Messages -->
            <div id="chat-area" class="flex-1 hidden">
                <div class="max-w-3xl mx-auto px-4 py-6 space-y-6">
                    <div id="chat-box">
                        <!-- Messages will be dynamically added here -->
                    </div>
                    <div id="waiting-reply" class="hidden">
                        <div class="flex items-start gap-3 mb-3">
                            <div
                                class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fa-solid fa-bolt w-4 h-4 text-white"></i>
                            </div>
                            <div class="flex-1 max-w-2xl">
                                <div class="rounded-lg px-4 py-3">
                                    <!-- Waiting for reply animation -->
                                    <div class="flex items-center space-x-1 mt-2">
                                        <div
                                            class="w-2 h-2 bg-gray-400 rounded-full animate-bounce [animation-delay:-0.3s]">
                                        </div>
                                        <div
                                            class="w-2 h-2 bg-gray-400 rounded-full animate-bounce [animation-delay:-0.15s]">
                                        </div>
                                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <!-- <div class="relative px-4 h-fit">
                <div class="max-w-3xl mx-auto bg-white p-4 border rounded-2xl shadow-sm">
                    <div class="flex gap-2">
                        <textarea id="chat-input" placeholder="Message Nexora..."
                            class="w-full resize-none border border-gray-300 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-nexora focus:border-transparent text-sm leading-relaxed min-h-[44px] max-h-32"
                            rows="1"></textarea>
                        <button id="send-button" onclick="clickSendMessage()"
                            class="w-12 h-12 bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800 rounded-full flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                            <i class="fa-solid fa-paper-plane w-4 h-4"></i>
                        </button>
                    </div>
                </div>
                <div class="max-w-3xl mx-auto text-center mb-4">
                    <p class="text-xs text-gray-500 mt-2 text-center">Nexora can make mistakes. Consider checking
                        important information.</p>
                </div>
            </div> -->

        <!-- Input Area -->
        <div class="relative px-4 h-fit">
            <div class="max-w-3xl mx-auto bg-white p-4 border rounded-2xl shadow-sm">
                <!-- File Preview Area -->
                <div id="file-preview" class="mt-3 mb-3"></div>

                <div class="flex items-end gap-2">

                    <!-- Textarea with Attachment -->
                    <div class="relative w-full">
                        <!-- Actual Textarea -->
                        <textarea id="chat-input" placeholder="Message Nexora..."
                            class="w-full resize-none border border-gray-300 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent text-sm leading-relaxed min-h-[44px] max-h-32"
                            rows="1"></textarea>

                        <!-- Attachment Button inside textarea -->
                        <label for="file-upload"
                            class="absolute right-2 bottom-2 text-violet-600 hover:text-violet-800 p-2 rounded-full hover:bg-violet-50 transition cursor-pointer">
                            <i class="fa-solid fa-paperclip"></i>
                        </label>
                        <input id="file-upload" type="file" class="hidden" />
                    </div>

                    <!-- Send Button -->
                    <button id="send-button" onclick="clickSendMessage()"
                        class="w-12 h-12 bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800 rounded-full flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        <i class="fa-solid fa-paper-plane w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="max-w-3xl mx-auto text-center mb-4">
                <p class="text-xs text-gray-500 mt-2">Nexora can make mistakes. Consider checking important information.</p>
            </div>
        </div>




    </div>
</div>
@endsection

@push('scripts')
<script>
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

    // Utility to detect if device likely has no physical keyboard (mobile/tablet)
    function isTouchDevice() {
        return (('ontouchstart' in window) ||
            (navigator.maxTouchPoints > 0) ||
            (navigator.msMaxTouchPoints > 0));
    }

    // Chat input Enter key handling
    chatInput?.addEventListener('keydown', (e) => {
        if (!isTouchDevice()) {
            // Desktop: Enter sends, Shift+Enter new line
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                clickSendMessage();
                // sendMessage();
            }
        }
    });

    sendButton?.addEventListener('click', sendMessage);

    // Suggestion cards
    const suggestionCards = document.querySelectorAll('#welcome-screen button');
    suggestionCards.forEach(card => {
        card.addEventListener('click', () => {
            const title = card.querySelector('h3')?.textContent;
            if (title && chatInput) {
                chatInput.value = `Can I know about ${title.toLowerCase()}`;
                chatInput.focus();
                sendButton.disabled = false;
            }
        });
    });

    function startNewConversation() {
        // Clear the chat area
        document.getElementById('chat-box').innerHTML = '';

        // Show welcome screen again
        document.getElementById('welcome-screen').classList.remove('hidden');
        document.getElementById('chat-area').classList.add('hidden');

        // Clear any existing input
        document.getElementById('chat-input').value = '';

        localStorage.removeItem('chatSessionId');
        loadChatHistory();
    }
</script>

<script type="text/javascript" src="{{ asset('asset/scripts/live-chat.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/scripts/chat-history.js') }}"></script>

<script>
    const fileInput = document.getElementById("file-upload");
    const filePreview = document.getElementById("file-preview");

    fileInput.addEventListener("change", function() {
        const file = this.files[0];
        filePreview.innerHTML = ""; // Clear existing preview

        if (!file) return;

        const fileType = file.type;
        const previewBox = document.createElement("div");
        previewBox.className = "relative inline-block";

        const removeBtn = document.createElement("button");
        removeBtn.className = "absolute top-1 right-1 bg-white text-red-500 border border-gray-300 rounded-full w-6 h-6 text-xs flex items-center justify-center shadow hover:bg-red-100 transition";
        removeBtn.innerHTML = "&times;";
        removeBtn.title = "Remove file";

        removeBtn.onclick = () => {
            fileInput.value = ""; // Clear file input
            filePreview.innerHTML = ""; // Clear preview area
        };

        // Preview for images
        if (fileType.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.alt = "Preview";
                img.className = "max-w-xs max-h-40 rounded-lg shadow border";
                previewBox.appendChild(img);
                previewBox.appendChild(removeBtn);
                filePreview.appendChild(previewBox);
            };
            reader.readAsDataURL(file);
        }
        // Preview for PDF
        else if (fileType === "application/pdf") {
            const pdfBox = document.createElement("div");
            pdfBox.className = "p-2 border border-gray-300 bg-gray-50 rounded relative text-sm text-gray-700";
            pdfBox.textContent = `📄 PDF Selected: ${file.name}`;
            previewBox.appendChild(pdfBox);
            previewBox.appendChild(removeBtn);
            filePreview.appendChild(previewBox);
        }
        // Other file types
        else {
            const fileBox = document.createElement("div");
            fileBox.className = "p-2 border border-gray-300 bg-gray-50 rounded relative text-sm text-gray-700";
            fileBox.textContent = `📎 File Selected: ${file.name}`;
            previewBox.appendChild(fileBox);
            previewBox.appendChild(removeBtn);
            filePreview.appendChild(previewBox);
        }
    });
</script>

@endpush