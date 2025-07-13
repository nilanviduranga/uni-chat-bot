function loadChatHistory() {
    fetch("/chat/history")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Chat history:", data);

            const chatSection = document.getElementById("chat-history-section");
            const chatSectionMobile = document.getElementById(
                "chat-history-section-mobile"
            );

            chatSection.innerHTML = ""; // Optional: clear old content
            chatSectionMobile.innerHTML = ""; // Optional: clear old content

            data.forEach((chat) => {
                const chatSessionId = localStorage.getItem("chatSessionId");
                if (chatSessionId == chat.session_id) {
                    styleClass = "bg-gray-100 border border-gray-300";
                } else {
                    styleClass = "hover:bg-gray-100 hover:border-gray-300";
                }

                const chatHTML = `
    <div @click="open = false" class="flex items-center justify-between group px-3 py-2 rounded-lg ${styleClass} hover:bg-gray-100 transition-colors" id="history${
                    chat.session_id
                }">
        <a href="#" onclick="setChatActive('${
            chat.session_id
        }')" class="flex items-center gap-3 flex-1">
            <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span class="text-sm text-gray-700 truncate flex-1">
                '${chat.title ?? "Untitled Chat"}'
            </span>
        </a>
        <button onclick="deleteChat('${
            chat.session_id
        }')" class="text-gray-500 group-hover:text-red-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
            </svg>
        </button>
    </div>
`;

                chatSection.innerHTML += chatHTML;
                chatSectionMobile.innerHTML += chatHTML;
            });
        })
        .catch((error) => {
            console.error("Error loading chat history:", error);
        });
}

function setChatActive(id) {
    console.log(`buttonclicked${id}`);

    welcomeScreen?.classList.add("hidden");
    chatArea?.classList.remove("hidden");
    const chatBox = document.getElementById("chat-box");
    chatBox.innerHTML = ""; // Optional: clear old content

    localStorage.setItem("chatSessionId", id);
    loadChatHistory();

    fetch(`/chat/history/get/${id}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Chat history:", data);

            data.forEach((chat) => {
                const markdownHTML = `<div class="markdown-content">${DOMPurify.sanitize(
                    marked.parse(chat.content)
                )}</div>`;

                if (chat.role == "user") {
                    //User Message
                    chatBox.innerHTML += `
                        <div class="flex justify-end mb-3">
                            <div class="max-w-2xl bg-nexora border text-white rounded-2xl px-4 py-3">
                                <div class="text-sm leading-relaxed">${markdownHTML}</div>
                            </div>
                        </div>
`;
                } else {
                    //Assistant Message
                    chatBox.innerHTML += `
    <div class="flex items-start gap-3 mb-3 w-full overflow-x-auto">
        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
            <svg class="w-4 h-4 text-white" fill="white" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <div class="flex-1 max-w-2xl group relative">
            <div class="bg-gray-50 border rounded-2xl px-4 py-3 leading-relaxed" id="chat-content-${Date.now()}">
                ${markdownHTML}
            </div>
            <button onclick="copyChatContent(this)" title="Copy"
                class="absolute top-2 right-2 hidden group-hover:inline-flex items-center justify-center rounded-md p-1 hover:bg-gray-200 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600 icon-default" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2M16 8h2a2 2 0 012 2v8a2 2 0 01-2 2h-8a2 2 0 01-2-2v-2" />
                </svg>
                <span class="hidden text-xs text-green-600 ml-1 icon-copied">Copied</span>
            </button>
        </div>
    </div>
`;
                }
            });
        })
        .catch((error) => {
            console.error("Error loading chat history:", error);
        });
}

function copyChatContent(button) {
    const content = button.parentElement.querySelector('.leading-relaxed').innerText;

    navigator.clipboard.writeText(content).then(() => {
        const icon = button.querySelector('.icon-default');
        const copiedText = button.querySelector('.icon-copied');

        icon.classList.add('hidden');
        copiedText.classList.remove('hidden');

        setTimeout(() => {
            icon.classList.remove('hidden');
            copiedText.classList.add('hidden');
        }, 1200);
    }).catch(err => {
        alert("Failed to copy: " + err);
    });
}


function deleteChat(session_id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This will delete the chat permanently!",
        showCancelButton: true,
        confirmButtonText: '<span class="font-medium">Yes, delete it!</span>',
        cancelButtonText: '<span class="font-medium">Cancel</span>',
        customClass: {
            popup: "rounded-2xl px-6 py-8 max-w-[300px]",
            confirmButton:
                "w-full py-2 rounded-lg duration-100 transition-all bg-gradient-to-t from-rose-700 to-rose-600 shadow-md text-white hover:bg-rose-800",
            cancelButton:
                "bg-transparent border border-violet-700 text-violet-700 hover:bg-violet-50 w-full py-2 rounded-lg duration-100 transition-all",
            title: "text-gray-900 text-xl font-semibold",
            htmlContainer: "text-gray-600 text-base",
        },
        buttonsStyling: true,
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/chat/delete/${session_id}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => {
                    if (!response.ok) throw new Error("Failed to delete chat");
                    return response.json();
                })
                .then((data) => {
                    if (data.status === "success") {
                        const chatElement = document.getElementById(
                            `history${session_id}`
                        );
                        if (chatElement) chatElement.remove();

                        if (
                            localStorage.getItem("chatSessionId") == session_id
                        ) {
                            localStorage.removeItem("chatSessionId");
                            location.reload();
                        }
                        loadChatHistory();

                        Swal.fire({
                            title: "Deleted!",
                            text: "The chat has been deleted.",
                            icon: "success",
                            customClass: {
                                popup: "rounded-2xl px-6 py-8 w-fit max-w-[300px]",
                                confirmButton:
                                    "w-full py-2 rounded-lg duration-100 transition-all bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800",
                                title: "text-gray-900 text-xl font-semibold",
                                htmlContainer: "text-gray-600 text-base",
                            },
                            buttonsStyling: true,
                        });
                    } else {
                        Swal.fire({
                            title: "Oops!",
                            text: "Something went wrong.",
                            icon: "error",
                            customClass: {
                                popup: "rounded-2xl px-6 py-8 w-fit max-w-[300px]",
                                confirmButton:
                                    "w-full py-2 rounded-lg duration-100 transition-all bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800",
                                title: "text-gray-900 text-xl font-semibold",
                                htmlContainer: "text-gray-600 text-base",
                            },
                            buttonsStyling: true,
                        });
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error!",
                        text: error.message,
                        icon: "error",
                        customClass: {
                            popup: "rounded-2xl px-6 py-8 w-fit max-w-[300px]",
                            confirmButton:
                                "w-full py-2 rounded-lg duration-100 transition-all bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800",
                            title: "text-gray-900 text-xl font-semibold",
                            htmlContainer: "text-gray-600 text-base",
                        },
                        buttonsStyling: true,
                    });
                });
        }
    });
}

function logOutUser() {
    Swal.fire({
        title: "Log out of Nexora?",
        text: "You will be signed out of your account.",
        showCancelButton: true,
        confirmButtonText: '<span class="font-medium">Log Out</span>',
        cancelButtonText: '<span class="font-medium">Cancel</span>',
        customClass: {
            popup: "rounded-2xl px-6 py-8 max-w-[300px]",
            confirmButton:
                "w-full py-2 rounded-lg duration-100 transition-all bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800",
            cancelButton:
                "bg-transparent border border-violet-700 text-violet-700 hover:bg-violet-50 w-full py-2 rounded-lg duration-100 transition-all",
            title: "text-gray-900 text-xl font-semibold",
            htmlContainer: "text-gray-600 text-base",
        },
        buttonsStyling: true,
    }).then((result) => {
        if (result.isConfirmed) {
            try {
                document.getElementById("logout-form").submit();
            } catch (error) {
                console.error("Logout error:", error);
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong while logging out.",
                    icon: "error",
                    customClass: {
                        popup: "rounded-2xl px-6 py-8 w-fit max-w-[300px]",
                        confirmButton:
                            "w-full py-2 rounded-lg duration-100 transition-all bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800",
                        title: "text-gray-900 text-xl font-semibold",
                        htmlContainer: "text-gray-600 text-base",
                    },
                    buttonsStyling: true,
                });
            }
        }
    });
}

// window.onload = function () {
//     localStorage.removeItem("chatSessionId");
//     loadChatHistory();
// };

window.onload = function () {
    loadChatHistory();

    const chatSessionId = localStorage.getItem("chatSessionId");
    if (chatSessionId) {
        setChatActive(chatSessionId);
        chatBox.scrollTop = chatBox.scrollHeight;
    } else {
        welcomeScreen?.classList.remove("hidden");
    }
};
