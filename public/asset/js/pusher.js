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
    let isBot = Boolean(data.isBot);
    console.log(isBot);

    if (isBot) {
        console.log('Bot message received');
        document.getElementById('chat-box').innerHTML +=
            `

<div class="col-start-1 col-end-8 p-3 rounded-lg">
    <div class="flex flex-row items-center">
        <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
            <div>${data.content}</div>
        </div>
    </div>
</div>

`;
    } else {

        console.log('Bot message received');
        document.getElementById('chat-box').innerHTML +=
            `
<div class="col-start-6 col-end-13 p-3 rounded-lg">
    <div class="flex items-center justify-start flex-row-reverse">
        <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
            <div>${data.content}</div>
        </div>
    </div>
</div>

`;

    }

});





//send user data to server
function sendMessage() {
    const message = document.getElementById('message-input').value;
    if (message.trim() === '') {
        return;
    } else {
        console.log(message);

        //send message to server
        fetch('/message/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message })
        });
    }
}

