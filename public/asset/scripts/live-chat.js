function clickSendMessage() {
    const message = document.getElementById("chat-input").value.trim();
    if (message) {
        welcomeScreen?.classList.add("hidden");
        chatArea?.classList.remove("hidden");
        document.getElementById("chat-input").value = "";
        displaySendMessage(message);
        document.getElementById("waiting-reply").classList.remove("hidden");
        sendMessage(message);
    } else {
        return "Empty Message";
    }
}

function sendMessage(message) {
    if (message) {
        const sessionId = localStorage.getItem("chatSessionId");
        fetch("/message/send", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({ message, sessionId }),
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
}

function receiveMessage(data) {
    localStorage.setItem("chatSessionId", data.sessionId);
    loadChatHistory();
    document.getElementById("waiting-reply").classList.add("hidden");
    displayResiveMessage(data.message);
}

function displaySendMessage(message) {
    document.getElementById("chat-box").innerHTML += `
       <div class="flex justify-end mb-3">
            <div class="max-w-2xl bg-nexora border text-white rounded-2xl px-4 py-3">
                <div class="text-sm leading-relaxed whitespace-pre-wrap break-words">${message}</div>
            </div>
        </div>
    `;
}

async function displayResiveMessage(markdownMessage) {
    const chatBox = document.getElementById("chat-box");

    const messageWrapper = document.createElement("div");
    messageWrapper.className =
        "flex items-start gap-3 mb-3 w-full overflow-x-auto";

    const iconHTML = `
        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
            <svg class="w-4 h-4 text-white" fill="white" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>`;

    const messageBubble = document.createElement("div");
    messageBubble.className = "flex-1 max-w-2xl";
    messageBubble.innerHTML = `
         <div class="bg-gray-50 border rounded-2xl px-4 py-3 leading-relaxed"><div class="animated-text"></div></div>`;
    messageWrapper.innerHTML = iconHTML;
    messageWrapper.appendChild(messageBubble);
    chatBox.appendChild(messageWrapper);

    const container = messageBubble.querySelector(".animated-text");

    // Convert Markdown to HTML DOM
    const html = `<div class="markdown-content">${DOMPurify.sanitize(
        marked.parse(markdownMessage)
    )}</div>`;
    const tempDiv = document.createElement("div");
    tempDiv.innerHTML = html;

    // Recursively animate DOM nodes
    await typeElement(tempDiv, container, 10); // adjust speed here
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
