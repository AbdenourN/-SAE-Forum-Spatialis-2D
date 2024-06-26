<?php require_once "view_begin.php" ?>
<link href="Content/css/mp.css" rel="stylesheet" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="icon" type="image/vnd.icon" href="Content/img/Icon.ico">
  <title><?= $title?></title>
</head>


<body>
    <nav>
        <ul class="nav-links">
            <li aria-current="true"><a href="/Forum_V2/?controller=forum&action=accueil">Accueil</a></li>
            <li><a href="/Forum_V2/?controller=forum&action=carte">Carte</a></li>
            <li><a href="/Forum_V2/?controller=forum">Sujets</a></li>
            <li aria-current="false"><a href="/Forum_V2/?controller=forum&action=galerie">Galerie</a></li>
            <li aria-current="false"><a href="/Forum_V2/?controller=forum&action=map">Retour à la map</a></li>
        </ul>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Recherche" name="search">
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div class="menu-container">
        <button id="menuButton" class="menu-button">☰</button>
        <div id="dropdownMenu" class="dropdown-menu">
            <a href="/Forum_V2/?controller=mp">Messages privés</a>
            <a href="/Forum_V2/?controller=profil">Profil</a>
            <a href="/Forum_V2/?controller=auth&action=logout">Déconnexion</a>
        </div>
    </div>
    </nav>


    <div class="message-form-container">
    <form method="post" action="/Forum_V2/?controller=mp&action=sendMessage" class="form-send-message">
        <div class="form-group">
            <label for="receiver_id">ID du Destinataire:</label>
            <input type="text" id="receiver_id" name="receiver_id" value="">
        </div>
        <div class="form-group">
            <label for="message">Votre Message:</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <button type="submit" class="btn-send">Envoyer</button>
    </form>
</div>

<div class="messages-container">
    <h1>Messages Privés</h1>
    <?php foreach ($mpR as $message): ?>
        <div class="message">
            <p class="message-sender"><strong>De:</strong> <?=  htmlspecialchars($message['sender_id'] == $data['id'] ? 'Vous' : 'Autre utilisateur') ?>             <p class="message-sender"><strong>A:</strong> <?=  htmlspecialchars($message['receiver_id'] == $data['id'] ? 'Vous' : 'Autre utilisateur') ?></p>
</p>
            <p class="message-content"><?= htmlspecialchars($message['message']) ?></p>
            <p class="message-date"><small>Envoyé le: <?= htmlspecialchars($message['sent_at']) ?></small></p>
        </div>
    <?php endforeach; ?>
</div>




    <footer>
        <p>© 2024 Forum de Naruto</p>
        <p><a href="/Forum_V2/Views/view_cgu.php" class="">CGU</a> - <a href="/Forum_V2/Views/view_pc.php" class="">PC</a></p>
    </footer>
    <script src="script_forum.js"></script>
    <script>
    
    document.getElementById("menuButton").addEventListener("click", function() {
    var dropdown = document.getElementById("dropdownMenu");
    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
});

</script>
</body>

</html>
