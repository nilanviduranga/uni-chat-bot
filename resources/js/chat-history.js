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
            // You can loop through data and display messages here
        })
        .catch(error => {
            console.error("Error loading chat history:", error);
        });
}


window.onload = function () {
    loadChatHistory();
};
