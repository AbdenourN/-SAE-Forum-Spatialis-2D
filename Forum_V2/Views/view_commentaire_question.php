<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Content/css/comment.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="icon" type="image/vnd.icon" href="Content/img/Icon.ico">
  <title><?= $title?></title>


</head>
<body>
    

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/Forum_V2/?controller=forum&action=accueil">Accueil</a></li>
      <li><a href="/Forum_V2/?controller=forum&action=carte">Carte</a></li>
      <li><a href="/Forum_V2/?controller=forum">Sujets</a></li>
      <li><a href="/Forum_V2/?controller=forum&action=galerie">Galerie</a></li>
    <li><a href="/Forum_V2/?controller=forum&action=map">Retour à la map</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ☰
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Forum_V2/?controller=profil">Profil</a>
          <a class="dropdown-item" href="/Forum_V2/?controller=auth&action=logout">Déconnexion</a>
        </div>
      </li>
    </ul>
    <form class="navbar-form navbar-right">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form> 
  </div>
</nav> 


<div class="container">
    <div class="comment-section" id="commentsContainer">
        <h2 class="mb-4 text-center text-danger">Question n°<?php echo htmlspecialchars($data['question']['id']); ?> : <?php echo htmlspecialchars($data['question']['titre']); ?></h2>
    </div>

    <div class="comment-container">
        <?php foreach ($data['commentaire'] as $index => $commentaire) : ?>
            <div class="comment-block" data-page="<?php echo floor($index / 5) + 1; ?>">
                <img src = "Content/img/avatar.jpg" class = "avatar-logo"/>
                <h2><?php echo $commentaire['content'] ?></h2>
                <p>Posté par: <span><?php echo htmlspecialchars($commentaire['auteur']['pseudo']); ?></span> - <span><?php echo htmlspecialchars($commentaire['created_at']); ?></span></p>
                
                <?php if ($_SESSION['statut'] === 'admin'): ?>
                <a href="/Forum_V2/?controller=forum&action=deleteMessage&message_id=<?php echo $commentaire['message_id']; ?>&question_id=<?php echo $data['question']['id']; ?>">❌ Supprimer</a><br>
                <a href="javascript:void(0);" onclick="showBanForm(<?php echo $commentaire['from_user_id']; ?>);">👮‍♂️ Bannir</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="comment-form">
        <form action="/Forum_V2/?controller=forum&action=insertComment" method="post">
            <input type="hidden" name="from_user_id"
                   value="<?php if (isset($_SESSION['id'])) {
                       echo $_SESSION['id'];
                   } ?>">
            <input type="hidden" name="question_id" value="<?php echo $data['question']['id']; ?>">
            <textarea name="content" placeholder="Votre commentaire"></textarea>
            <button type="submit">Ajouter un commentaire</button>
        </form>
    </div>
</div>

<div id="banFormOverlay">
    <div id="banForm">
        <span class="close-btn" onclick="closeBanForm()">&times;</span>
        <form action="/Forum_V2/?controller=forum&action=banUserAction" method="post">
            <input type="hidden" name="user_id" id="banUserId" value="">
            <label for="banDuration">Durée du Bannissement (en secondes):</label>
            <input type="number" id="banDuration" name="duration" required>
            <input type="submit" value="Bannir l'Utilisateur">
        </form>
    </div>
</div>


<br><br>
<footer>
    <p>© 2024 Forum de Naruto</p>
    <p><a href="/Forum_V2/Views/view_cgu.php" class="">CGU</a> - <a href="/Forum_V2/Views/view_pc.php" class="">PC</a></p>
</footer>
<script>

document.getElementById("menuButton").addEventListener("click", function() {
var dropdown = document.getElementById("dropdownMenu");
if (dropdown.style.display === "none" || dropdown.style.display === "") {
    dropdown.style.display = "block";
} else {
    dropdown.style.display = "none";
}
});

function showBanForm(userId) {
        document.getElementById('banUserId').value = userId;
        document.getElementById('banFormOverlay').style.display = 'block';
    }

    function closeBanForm() {
        document.getElementById('banFormOverlay').style.display = 'none';
    }

</script>

</body>
</html>