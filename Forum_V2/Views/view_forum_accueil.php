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
    <img src="/Forum_V2/Content/img/bandeau_sujet.png" alt="Sujets">
    </div>
    </br>
    

    <br>
    <br>
    <br>
    <br>
    <br>   
    <br>
  


    <div class="new_sujet">
        <a id="new_sujet" href="/Forum_V2/?controller=forum&action=add">Nouveau sujet</a>
    </div>

    <section class="scrollable-section">
    
    <?php 
  
  
   if (is_array($data['QST']) && !empty($data['QST'])) {
       foreach($data['QST'] as $index => $item) {
           
           if (isset($item['titre'], $item['pseudo_auteur'], $item['date_publication'])) {
               ?>
               <div class="<?php echo 'item-' . ($index + 1); ?>">
                   <h2><a href="/Forum_V2/?controller=forum&action=espaceCommentaire&question_id=<?php echo $item['id']; ?>" id="topic-title<?php echo $index + 1; ?>"><?php echo htmlspecialchars($item['titre']); ?></a></h2>
                   <p>Posté par: <span id="user-name<?php echo $index + 1; ?>"><?php echo htmlspecialchars($item['pseudo_auteur']); ?></span> - <span id="post-date<?php echo $index + 1; ?>"><?php echo htmlspecialchars($item['date_publication']); ?></span></p>
                   <?php if ($_SESSION['statut'] === 'admin'): ?>
                   <p><a href="/Forum_V2/?controller=forum&action=deleteQuestion&question_id=<?php echo $item['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?');">❌ Supprimer</a></p>
                   <a href="javascript:void(0);" onclick="showBanForm(<?php echo $item['id_auteur']; ?>);">👮‍♂️ Bannir</a>

                   <?php endif; ?>
               </div>
               <?php
           }
       }
   }
   ?>
</section>

    <div class="page-navigation">
        <button id="previous-page">Page précédente</button>
        <button id="next-page">Page suivante</button>
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
