<style>
    #chatbot-container {
        position: fixed;
        bottom: 10%;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 400px; /* Set max width for desktop */
        height: 80vh;
        max-height: 600px;
        background: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px 10px 0 0;
        display: none;
        flex-direction: column;
        overflow: hidden;
        z-index: 1000;
    }
    @media (min-width: 768px) {  /* Tablets & larger screens */
        #chatbot-button {
            left: 20px;
            transform: none;
        }
    
        #chatbot-container {
            left: 20px;
            transform: none;
        }
    }
    @media (max-width: 600px) {
        #chatbot-container {
            height: 100%;
            border-radius: 0;
        }
    }

    #chatbot-header {
        background-image: radial-gradient(circle at 35% center, #032e53 0, #011b31 65%) !important;
        background-color: #011b31 !important;
        color: white;
        padding: 15px;
        text-align: center;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #chatbot-close {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }

    #chatbot-messages {
        flex: 1;
        padding: 10px;
        overflow-y: auto;
        background: #f9f9f9;
        display: flex;
        flex-direction: column;
        font-size: 14px;
    }

    .user-message {
        align-self: flex-end;
        background: var(--main-color-one);
        color: white;
        padding: 10px;
        border-radius: 10px;
        max-width: 80%;
        margin-bottom: 10px;
        line-height:15px;
        /*text-align:right;*/
    }

    .bot-message {
        align-self: flex-start;
        background: #ddd;
        padding: 10px;
        border-radius: 10px;
        max-width: 80%;
        margin-bottom: 10px;
        line-height:15px;
    }

    #chatbot-input {
        display: flex;
        padding: 10px;
        border-top: 1px solid #ddd;
        background: white;
    }

    #chatbot-input input {
        /*flex: 1;*/
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 5px;
        outline: none;
        height:50px;
        width:90%;
    }

    #chatbot-input button {
        width: 10%; /* Ensure button width is consistent */
        height: 50px; /* Make sure it is a square */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0; /* Remove extra padding */
        font-size: 18px; /* Adjust icon size */
        border-radius: 5px;
        background-image: radial-gradient(circle at 35% center, #032e53 0, #011b31 65%) !important;
        background-color: #011b31 !important;
        color: white;
        border: none;
        cursor: pointer;
    }

    #chatbot-button {
        position: fixed;
        bottom: 20px;
        left: 50px;
        transform: translateX(-50%);
        background-color: var(--main-color-one);
        color: white;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        font-size: 24px;
        z-index: 1001;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    #chatbot-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: none;
        z-index: 999;
    }
</style>

<script>
    var chatInterval = null;
    var allMessages = 0;
    
    function toggleChatbot() {
        var chatbot = document.getElementById('chatbot-container');
        var backdrop = document.getElementById('chatbot-backdrop');
        
        if (chatbot.style.display === 'flex') {
            chatbot.style.display = 'none';
            backdrop.style.display = 'none';
            stopFetchingMessages();
        } else {
            chatbot.style.display = 'flex';
            backdrop.style.display = 'block';
            startFetchingMessages();
        }
    }
    
    function closeChatbot() {
        document.getElementById('chatbot-container').style.display = 'none';
        document.getElementById('chatbot-backdrop').style.display = 'none';
        stopFetchingMessages();
    }   

    document.addEventListener("DOMContentLoaded", function () {
        var input = document.getElementById("chat-input");

        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                sendMessage();
            }
        });
    });

    let userId = localStorage.getItem("userId") || "Visitor" + Math.floor(Math.random() * 100);
    localStorage.setItem("userId", userId);
    
    function sendMessage() {
        var input = document.getElementById("chat-input");
        var message = input.value.trim();

        if (message) {
            var messagesDiv = document.getElementById("chatbot-messages");

            var messageHTML = `<div class="user-message"><small><b>You:</b><br/></small>${message}</div>`;
            messagesDiv.innerHTML += messageHTML;
            input.value = "";
            messagesDiv.scrollTop = messagesDiv.scrollHeight;

            
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "<?= base_url() ?>send-message-webhook.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    try {
                        let response = JSON.parse(xhr.responseText);
                        
                        if (!response.status) {
                            alert(response.message);
                            console.error("ERROR:", response.message);
                        }
                    } catch (error) {
                        console.error("ERROR:", error.message);
                        console.error("RESPONSE:", xhr.responseText);
                    }
                }
            };
            xhr.send("message=" + encodeURIComponent(message) + "&userId="+encodeURIComponent(userId) + "&flow=customer");
        }
    }
    
    function fetchMessages() {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "<?= base_url() ?>send-message-webhook.php?userId=" + encodeURIComponent(userId), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status) {
                        updateChatUI(response.messages);
                    } else {
                        console.error("ERROR:", response.message);
                    }
                } catch (error) {
                    console.error("ERROR:", error.message);
                    console.error("RESPONSE:", xhr.responseText);
                }
            }
        };
        xhr.send();
    }
    
    function updateChatUI(messages) {
        
        let messagesDiv = document.getElementById("chatbot-messages");
        messagesDiv.innerHTML = "";
    
        messages.forEach(msg => {
            
            let cleanMessage = msg.message.replace(/^@\S+\s*/, ""); 
            let messageHTML;
    
            if (msg.sender === "Web Visitor") {
                messageHTML = `<div class="user-message"><small><b>You:</b><br/></small>${cleanMessage}</div>`;
            } else {
                messageHTML = `<div class="bot-message"><small><b>${msg.sender}:</b></small><br>${cleanMessage}</div>`;
            }
    
            messagesDiv.innerHTML += messageHTML;
            
            if (allMessages < messages.length){
                allMessages = messages.length;
                playBeep();
            }
        });
    
        messagesDiv.scrollTop = messagesDiv.scrollHeight; // Auto-scroll to latest message
    }
    
    function startFetchingMessages() {
        if (!chatInterval) {
            chatInterval = setInterval(fetchMessages, 5000);
        }
    }
    
    function stopFetchingMessages() {
        if (chatInterval) {
            clearInterval(chatInterval);
            chatInterval = null;
        }
    }
    
    function playBeep() {
        var beep = new Audio("<?= base_url() ?>uploads/beep.mp3");
        beep.play();
    }
    
    $(document).ready(function(){
        document.getElementById("chatbot-button").addEventListener("click", fetchMessages);
    });
    
</script>

<!-- Chatbox UI -->
<div id="chatbot-backdrop" onclick="closeChatbot()"></div>
<div id="chatbot-container">
    <div id="chatbot-header">
        <span>At your service, Lets Chat!</span>
        <button id="chatbot-close" onclick="closeChatbot()">✖</button>
    </div>
    <div id="chatbot-messages">
        <p class="text-center" style="color:#CCC;">loading older chat if incase you revisited ...</p>
    </div>
    <div id="chatbot-input">
        <input type="text" id="chat-input" placeholder="No bot, you are texting a human :)">
        <button onclick="sendMessage()"><i class="fa fa-paper-plane"></i></button>
    </div>
</div>

<!-- Floating Chat Button -->
<button id="chatbot-button" onclick="toggleChatbot()"><i class="fa fa-comment"></i></button>