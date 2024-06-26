<?php require_once "view_begin.php" ?>
    <link rel="stylesheet" href="Content/css/map.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.55.2/phaser.min.js"></script>
    <link rel="icon" type="image/vnd.icon" href="Content/img/Icon.ico">
    <script src="Content/js/game.js"></script>
       
</head>

<body>

    <div id="characterSelection">

        <p>Bienvenue Joueur <input type="text" id="pseudoInput" value="<?php echo $_SESSION['username']?>" disabled></p>
        <div id="characters">
            <img src="Content/icon/n1.jpeg" data-character="Content/Ninja_Monk/Walk" onclick="selectCharacter(this)">
            <img src="Content/icon/n2.jpg" data-character="Content/Ninja_Peasant/Walk" onclick="selectCharacter(this)">
            <img src="Content/icon/n3.jpg" data-character="Content/Kunoichi/Walk" onclick="selectCharacter(this)">
        </div>
        
        <button onclick="startGame()">OK</button>
    </div>

    <div id="gameContainer"></div>

    <div id="chatContainer">
        <input type="text" id="messageInput" placeholder="Tapez votre message ici...">
        <button onclick="sendMessage()">Envoyer</button>
    </div>
    <div id="messageContainer"></div>

    
</body>
<script>
    function sendMessage() {
        var messageInput = document.getElementById("messageInput");
        var message = messageInput.value;
        var messageContainer = document.getElementById("messageContainer");

        if (message) {
            messageContainer.innerHTML = message;
            messageContainer.style.display = "block";

            setTimeout(function() {
                messageContainer.style.display = "none";
            }, 10000); 

            messageInput.value = ""; 
        }
    }
    </script>
</html>
