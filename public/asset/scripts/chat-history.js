function loadChatHistory() {
    fetch('/chat/history')
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            console.log("Chat history:", data);

            const chatSection = document.getElementById('chat-history-section');
            chatSection.innerHTML = ''; // Optional: clear old content

            data.forEach(chat => {

                const chatSessionId = (localStorage.getItem('chatSessionId'));
                if (chatSessionId == chat.session_id) {
                    styleClass = "bg-white";
                } else {
                    styleClass = "hover:bg-white";
                }

                chatSection.innerHTML += `
                    <a href="#" onclick="setChatActive(${chat.session_id})">
                        <div id="history${chat.session_id}"
                            class="group flex items-center gap-3 px-3 py-2 rounded-lg ${styleClass} cursor-pointer transition-colors ">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-sm text-gray-700 truncate flex-1">
                                ${chat.title ?? 'Untitled Chat'}
                            </span>
                        </div>
                    </a>
                `;
            });
        })
        .catch(error => {
            console.error("Error loading chat history:", error);
        });
}


function setChatActive(id) {
    console.log(`buttonclicked${id}`);

    welcomeScreen?.classList.add('hidden');
    chatArea?.classList.remove('hidden');
    const chatBox = document.getElementById('chat-box');
    chatBox.innerHTML = ''; // Optional: clear old content

    localStorage.setItem('chatSessionId', id);
    loadChatHistory();

    fetch(`/chat/history/get/${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            console.log("Chat history:", data)
            data.forEach(chat => {
                console.log(chat)
                if (chat.role == 'user') {
                    //User Message
                    chatBox.innerHTML +=
                        `
                        <div class="flex justify-end mb-1">
                            <div class="max-w-2xl bg-nexora border text-white rounded-lg px-4 py-3">
                                <p class="text-sm leading-relaxed">${chat.content}</p>
                            </div>
                        </div>
`;
                } else {
                    //Assistant Message
                    chatBox.innerHTML +=
                        `
                        <div class="flex items-start gap-3 mb-3">
                            <div
                                class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="white" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="flex-1 max-w-2xl">
                                <div class="bg-gray-50 border rounded-lg px-4 py-3">
                                    ${chat.content}
                                </div>
                            </div>
                        </div>
`;

                }

            });
        })
        .catch(error => {
            console.error("Error loading chat history:", error);
        });

}

window.onload = function () {
    localStorage.removeItem('chatSessionId');
    loadChatHistory();
};
