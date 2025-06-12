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
    <div class="flex items-center justify-between group px-3 py-2 rounded-lg ${styleClass} hover:bg-white transition-colors" id="history${chat.session_id}">
        <a href="#" onclick="setChatActive(${chat.session_id})" class="flex items-center gap-3 flex-1">
            <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span class="text-sm text-gray-700 truncate flex-1">
                ${chat.title ?? 'Untitled Chat'}
            </span>
        </a>
        <button onclick="deleteChat(${chat.session_id})" class="text-gray-500 group-hover:text-red-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
            </svg>
        </button>
    </div>
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

function deleteChat(session_id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This will delete the chat permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/chat/delete/${session_id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => {
                    if (!response.ok) throw new Error("Failed to delete chat");
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        const chatElement = document.getElementById(`history${session_id}`);
                        if (chatElement) chatElement.remove();

                        if (localStorage.getItem('chatSessionId') == session_id) {
                            localStorage.removeItem('chatSessionId');
                            location.reload();
                        }
                        loadChatHistory();

                        Swal.fire('Deleted!', 'The chat has been deleted.', 'success');
                    } else {
                        Swal.fire('Oops!', 'Something went wrong.', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error!', error.message, 'error');
                });
        }
    });
}



window.onload = function () {
    localStorage.removeItem('chatSessionId');
    loadChatHistory();
};


