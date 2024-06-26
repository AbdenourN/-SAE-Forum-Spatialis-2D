<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="Content/css/forum.css" rel="stylesheet" >
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

   
    <br>    
    <div class="logo">
    <img src="/Forum_V2/Content/img/bandeau_accueil.png" alt="Accueil">
    </div>
    </br>
    <br>


    <br>
    <br>
    <br>
    <br>
    <br>   
    <br>
  
    <section>
    <h3>Sujets récents</h3>
   <?php 
  
  if (is_array($data['QST']) && !empty($data['QST'])) {
      $count = 0; 
      foreach ($data['QST'] as $index => $item) {
          if ($count >= 2) { 
              break; 
          }
  
          if (isset($item['titre'], $item['pseudo_auteur'], $item['date_publication'])) {
              ?>
              <div class="item-<?php echo $index + 1; ?>">
                  <h2><a href="/Forum_V2/?controller=forum&action=espaceCommentaire&question_id=<?php echo $item['id']; ?>" id="topic-title<?php echo $index + 1; ?>"><?php echo htmlspecialchars($item['titre']); ?></a></h2>
                  <p>Posté par: <span id="user-name<?php echo $index + 1; ?>"><?php echo htmlspecialchars($item['pseudo_auteur']); ?></span> - <span id="post-date<?php echo $index + 1; ?>"><?php echo htmlspecialchars($item['date_publication']); ?></span></p>
              </div>
              <?php
          }
          $count++; 
      }
  }
  ?>
  
  <div class="info-section">
    <h3>Informations</h3>
    <div class="suna-info">
        <a href="/Forum_V2/?controller=forum&action=map" class="suna-link">
            <img src="/Forum_V2/Content/img/konoha.jpeg" alt="Logo Konoha" class="suna-logo">
            <span><h2>Monde de Spatialisation en 2D</h2>
            Bienvenue à Konoha, le cœur vibrant de notre communauté ! Ici, vous plongez dans un monde de spatialisation en 2D, où chaque élément de l'univers Naruto prend vie. Naviguez à travers des cartes interactives, explorez des lieux emblématiques, et découvrez des easter eggs cachés. C'est un espace pour vivre votre passion pour Naruto d'une manière immersive et novatrice.
        </span>
        </a>
        <br>
        <a href="/Forum_V2/?controller=forum" class="suna-link">
            <img src="/Forum_V2/Content/img/iwa.png" alt="Logo Iwa" class="suna-logo">
            <span><h2>Sujets et Discussions entre Membres</h2>
            Iwa, la forteresse de pierre, est le lieu de rencontre pour des discussions profondes et des débats animés. Ce forum est votre espace pour partager opinions, théories et analyses sur l'univers de Naruto. Posez vos questions, proposez des sujets, et engagez-vous dans des conversations enrichissantes avec d'autres fans. Iwa est le fondement de notre communauté, où chaque voix compte.
</span>
</a>
<br>
        <a href="/Forum_V2/?controller=forum&action=galerie" class="suna-link">
            <img src="/Forum_V2/Content/img/suna.jpg" alt="Logo Suna" class="suna-logo">
            <span><h2>Galerie Photo des Personnages de Naruto</h2>
            Entrez dans l'étendue désertique de Suna, où les dunes révèlent les visages familiers de la saga Naruto. Notre galerie photo est un hommage à tous les personnages, des héros bien-aimés aux antagonistes charismatiques. Feuilletez les albums, partagez vos images préférées, et même téléchargez des fan arts uniques. Chaque portrait raconte une histoire, et ici, chaque fan trouve son personnage favori.
</span>
        </a>
        <br>
        <a href="/Forum_V2/?controller=mp" class="suna-link">
            <img src="/Forum_V2/Content/img/kumo.png" alt="Logo Kiri" class="suna-logo">
            <span><h2>Messages Privés</h2>
            Enfin, prenez votre envol vers Kumo, le village caché dans les nuages, pour accéder à vos messages privés. Cette plateforme sécurisée vous permet d'échanger des messages avec d'autres membres en toute confidentialité. Que ce soit pour planifier des rencontres, partager des idées secrètes, ou simplement pour discuter, Kumo est votre ligne directe avec le reste de la communauté.</span>
        </a>
        <br>
        <a href="/Forum_V2/?controller=profil" class="suna-link">
            <img src="/Forum_V2/Content/img/kiri.png" alt="Logo Kumo" class="suna-logo">
            <span><h2>Profil et Informations Personnelles</h2>
            Naviguez dans la brume mystérieuse de Kiri pour accéder à votre espace personnel. Cette section est dédiée à la personnalisation de votre profil. Mettez à jour vos informations, gérez vos abonnements et suivez vos contributions au forum. Ici, vous pouvez aussi consulter les profils des autres membres, découvrir leurs intérêts et nouer des liens avec des fans partageant les mêmes passions.</span>
        </a>
        <br>
    </div>
</div>

</section>

</br>
</br>
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
