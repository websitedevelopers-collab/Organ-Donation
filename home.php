<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gift of Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        html{
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }

        body {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #e48a23;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            width: 100%;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            margin: 20px;
            width: 80%;
        }

        .hero-container {
            flex: 1;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .button {
            padding: 12px 20px;
            border-radius: 5px;
            background-color: #e48a23;
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #a05d11;
        }

        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #e48a23;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .chat-box {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 300px;
            height: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        .chat-messages {
            flex-grow: 1;
            overflow-y: auto;
            padding: 10px;
            max-height: 300px;
        }

        .user-message {
            background-color: #007bff;
            color: white;
            padding: 8px;
            border-radius: 5px;
            text-align: right;
            margin: 5px 0;
        }

        .bot-message {
            background-color: #ddd;
            padding: 8px;
            border-radius: 5px;
            text-align: left;
            margin: 5px 0;
        }

        .chat-input {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        .chat-input input {
            flex-grow: 1;
            padding: 5px;
            border: none;
            outline: none;
        }

        .chat-input button {
            padding: 5px 10px;
            background-color: #e48a23;
            color: white;
            border: none;
            cursor: pointer;
        }

        .suggestions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
        }

        .suggestion {
            background-color: #f1f1f1;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .suggestion:hover {
            background-color: #ddd;
        }

        .hidden {
            display: none;
        }

        /* footer {
            text-align: center;
            padding: 15px;
            background-color: #e97529;
            color: white;
            font-size: 14px;
            width: 100%;
            margin-top: 20px;
        } */
        
        footer {
            background-color: #e48a23;
            color: white;
            text-align: center;
            padding: 15px 0;
            width: 100%;
        }


    </style>
</head>

<body>

<header>
    Gift of Life
</header>

<div class="content-wrapper">
    <div class="hero-container">
        <h2>Be a Hero</h2>
        <p>Your small act, their big chance! Be the game-changer someone’s life is hanging on dearly to.</p>
        <h3>Our Mission</h3>
        <p>To foster a fully aware, donating culture that saves lives!</p>
        <h4>Testimonials</h4>
        <p>From happy receivers to even happier donors—we’ve got them all.</p>
        <div class="buttons">
            <a href="donor.php" class="button">Are You a Donor?</a>
            <a href="receiver.php" class="button">Are You a Receiver?</a>
            <a href="guest.html" class="button">Are You a Guest?</a>
        </div>
    </div>
</div>

<button class="chat-button" onclick="toggleChat()">💬</button>

<div class="chat-box hidden" id="chatBox">
    <div class="chat-messages" id="chatMessages"></div>
    
    <div class="suggestions">
        <div class="suggestion" onclick="fillInput('How do I register as a donor?')">How do I register as a donor?</div>
        <div class="suggestion" onclick="fillInput('Can I donate organs after death?')">Can I donate organs after death?</div>
        <div class="suggestion" onclick="fillInput('What are the legal aspects of donation?')">What are the legal aspects of donation?</div>
    </div>

    <div class="chat-input">
        <input type="text" id="userInput" placeholder="Type your message..." />
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
    function toggleChat() {
        document.getElementById("chatBox").classList.toggle("hidden");
    }

    function sendMessage() {
        let userInputElement = document.getElementById("userInput");
        let chatbox = document.getElementById("chatMessages");

        if (!userInputElement) {
            console.error("Error: userInput element not found!");
            return;
        }

        let userInput = userInputElement.value.trim();
        if (userInput === "") return;

        let userText = document.createElement("div");
        userText.className = "user-message";
        userText.innerText = userInput;
        chatbox.appendChild(userText);

        let botText = document.createElement("div");
        botText.className = "bot-message";
        botText.innerHTML = getBotResponse(userInput);
        chatbox.appendChild(botText);

        userInputElement.value = "";
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    function getBotResponse(input) {
        if (input.includes("register")) {
            return "You can register as an organ donor <a href='donor.php'>here</a>.";
        }
        if (input.includes("after death")) {
            return "Yes, you can donate organs after death if prior consent is given.";
        }
        if (input.includes("legal")) {
            return "Organ donation laws vary by country. Check here: <a href='legal-info.html'>Legal Info</a>.";
        }
        return "I’m not sure about that. Try selecting a question above!";
    }

    function fillInput(text) {
        document.getElementById("userInput").value = text;
    }
</script>
<footer>
    <p>&copy; 2024 Gift of Life. All rights reserved.</p>
</footer>

</body>
</html>
