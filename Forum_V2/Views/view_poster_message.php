<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="Content/css/poster.css" rel="stylesheet" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</head>
<body>

<?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>


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
</br>
</br>
    <div class="container">
    <form action="/Forum_V2/?controller=forum&action=publishQ" method="post">
        <h2>Nouveau Sujet</h2>
        <input type="text" name="titre" placeholder="Saisir le titre du sujet" class="title-input">
        <input type="text" name="description" placeholder="Saisir la description du sujet" class="description-input">
        <div class="text-editor">
            <textarea name="message" placeholder="Votre message..."></textarea>
        </div>
        <input type="submit" name="poster" value="Poster" > 
        </form>
    </div>
    </br>
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

</script>
</body>
</html>
