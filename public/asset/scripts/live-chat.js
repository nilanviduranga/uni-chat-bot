// function clickSendMessage() {
//     const message = document.getElementById("chat-input").value.trim();
//     if (message) {
//         welcomeScreen?.classList.add("hidden");
//         chatArea?.classList.remove("hidden");
//         document.getElementById("chat-input").value = "";
//         displaySendMessage(message);
//         document.getElementById("waiting-reply").classList.remove("hidden");
//         sendMessage(r);
//     } else {
//         return "Empty Message";
//     }
// }

function clickSendMessage() {
    const message = document.getElementById("chat-input").value.trim();
    const fileInput = document.getElementById("file-upload");
    const file = fileInput.files[0];

    // Nothing to send
    if (!message && !file) {
        return "Empty Message";
    }

    welcomeScreen?.classList.add("hidden");
    chatArea?.classList.remove("hidden");

    // Display the message and/or file
    displaySendMessage(message, file);

    // Clear message and file input
    document.getElementById("chat-input").value = "";
    document.getElementById("file-preview").innerHTML = "";
    fileInput.value = "";

    document.getElementById("waiting-reply").classList.remove("hidden");

    // Call API or handler (pass message + file if needed)
    sendMessage(message, file); // update your backend to support file if needed
}

// function sendMessage(message) {
//     if (message) {
//         const sessionId = localStorage.getItem("chatSessionId");
//         fetch("/message/send", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-CSRF-TOKEN": document
//                     .querySelector('meta[name="csrf-token"]')
//                     .getAttribute("content"),
//             },
//             body: JSON.stringify({ message, sessionId }),
//         })
//             .then((response) => {
//                 if (!response.ok) {
//                     throw new Error("Message send failed");
//                 }
//                 return response.json();
//             })
//             .then((data) => {
//                 receiveMessage(data);
//             })
//             .catch((error) => {
//                 console.error("Error:", error);
//             });
//     }
// }
function sendMessage(message, file = null) {
    const sessionId = localStorage.getItem("chatSessionId");

    const formData = new FormData();
    formData.append("message", message);
    formData.append("sessionId", sessionId);

    if (file) {
        formData.append("file", file);
    }

    fetch("/message/send", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            // Don't manually set Content-Type here!
        },
        body: formData,
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Message send failed");
            }
            return response.json();
        })
        .then((data) => {
            receiveMessage(data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function receiveMessage(data) {
    localStorage.setItem("chatSessionId", data.sessionId);
    loadChatHistory();
    document.getElementById("waiting-reply").classList.add("hidden");
    displayResiveMessage(data.message);
}

// function displaySendMessage(message) {
//     document.getElementById("chat-box").innerHTML += `
//        <div class="flex justify-end mb-3">
//             <div class="max-w-2xl bg-nexora border text-white rounded-2xl px-4 py-3">
//                 <div class="text-sm leading-relaxed whitespace-pre-wrap break-words">${message}</div>
//             </div>
//         </div>
//     `;
// }

function displaySendMessage(message, file) {
    const chatBox = document.getElementById("chat-box");

    // Wrapper div
    const wrapper = document.createElement("div");
    wrapper.className = "flex justify-end mb-3";

    // Bubble
    const bubble = document.createElement("div");
    bubble.className =
        "max-w-2xl bg-nexora border text-white rounded-2xl px-4 py-3 space-y-2";

    // If there's a message
    if (message) {
        const messageDiv = document.createElement("div");
        messageDiv.className =
            "text-sm leading-relaxed whitespace-pre-wrap break-words";
        messageDiv.textContent = message;
        bubble.appendChild(messageDiv);
    }

    // If there's a file
    if (file) {
        const fileType = file.type;

        if (fileType.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.alt = "Sent Image";
                img.className = "rounded-lg max-w-xs max-h-40 border";
                bubble.appendChild(img);
                wrapper.appendChild(bubble);
                chatBox.appendChild(wrapper);
                chatBox.scrollTop = chatBox.scrollHeight;
            };
            reader.readAsDataURL(file);
            return; // Wait for async image to append
        } else {
            const fileDiv = document.createElement("div");
            fileDiv.className = "text-sm text-gray-200";
            fileDiv.innerHTML = `📎 ${file.name}`;
            bubble.appendChild(fileDiv);
        }
    }

    wrapper.appendChild(bubble);
    chatBox.appendChild(wrapper);
    chatBox.scrollTop = chatBox.scrollHeight;
}

async function displayResiveMessage(markdownMessage) {
    const chatBox = document.getElementById("chat-box");

    // Outer wrapper
    const messageWrapper = document.createElement("div");
    messageWrapper.className =
        "flex items-start gap-3 mb-3 w-full overflow-x-auto";

    // Icon/Avatar
    const iconHTML = `
        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
            <svg class="w-4 h-4 text-white" fill="white" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>`;

    // Chat bubble
    const messageBubble = document.createElement("div");
    messageBubble.className = "flex-1 max-w-2xl relative group";

    const uniqueId = `chat-content-${Date.now()}`;

    messageBubble.innerHTML = `
        <div class="bg-gray-50 border rounded-2xl px-4 py-3 leading-relaxed" id="${uniqueId}">
            <div class="animated-text"></div>
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
    `;

    // Combine all
    messageWrapper.innerHTML = iconHTML;
    messageWrapper.appendChild(messageBubble);
    chatBox.appendChild(messageWrapper);

    // Markdown to HTML (sanitized)
    const html = `<div class="markdown-content">${DOMPurify.sanitize(
        marked.parse(markdownMessage)
    )}</div>`;
    const tempDiv = document.createElement("div");
    tempDiv.innerHTML = html;

    // Animate it into the real bubble
    const container = messageBubble.querySelector(".animated-text");
    await typeElement(tempDiv, container, 10);
}

async function typeElement(source, target, speed) {
    for (let node of source.childNodes) {
        if (node.nodeType === Node.TEXT_NODE) {
            await typeTextNode(node, target, speed);
        } else if (node.nodeType === Node.ELEMENT_NODE) {
            const clone = node.cloneNode(false); // clone the tag only
            target.appendChild(clone);
            await typeElement(node, clone, speed); // recurse into children
        }
    }
}

async function typeTextNode(textNode, container, speed) {
    const text = textNode.textContent;
    for (let i = 0; i < text.length; i++) {
        container.appendChild(document.createTextNode(text[i]));
        await new Promise((resolve) => setTimeout(resolve, speed));
    }
}
