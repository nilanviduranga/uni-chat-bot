// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('4aca60db8dc6ebf6ef0d', {
    cluster: 'eu'
});

const userId = window.Laravel?.userId;
console.log(userId);

var channel = pusher.subscribe(`my-channel.${userId}`);
channel.bind('my-event', function (receivedData) {
    data = receivedData.data;
    console.log(data);
    let isBot = Boolean(data.isBot);
    const markdownHTML = marked.parse(data.message); // convert markdown to HTML
    localStorage.setItem('chatSessionId', data.sessionId);
    loadChatHistory()


    if (!isBot) {
        //User Message
        console.log('User Message Sending Successfull!');
        document.getElementById('chat-box').innerHTML +=
            `
                        <div class="flex justify-end mb-1">
                            <div class="max-w-2xl bg-nexora border text-white rounded-lg px-4 py-3">
                                <p class="text-sm leading-relaxed">${markdownHTML}</p>
                            </div>
                        </div>
`;
    } else {
        //Assistant Message
        console.log('Bot message received!');
        document.getElementById('chat-box').innerHTML +=
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
                                    ${markdownHTML}
                                </div>
                            </div>
                        </div>
`;

    }

});





//send user data to server
// function sendMessage() {
//     const message = document.getElementById('chat-input').value;
//     const sessionId = (localStorage.getItem('chatSessionId'));

//     if (message.trim() === '') {
//         return;
//     } else {
//         console.log(message);

//         //send message to server
//         fetch('/message/send', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({ message, sessionId })
//         });
//     }
// }

function sendMessage() {
    const message = document.getElementById('chat-input').value.trim();
    const sessionId = localStorage.getItem('chatSessionId');

    document.getElementById('chat-input').value = ''; // clear input

    welcomeScreen?.classList.add('hidden');
    chatArea?.classList.remove('hidden');

    if (!message) return;

    console.log(message);

    fetch('/message/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message, sessionId })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Message send failed');
            }
            return response.json();
        })
        .then(data => {
            console.log('Server Response:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


