<?php require_once "view_begin.php" ?>
<link href="Content/css/profil.css" rel="stylesheet" >
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
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
   



<?php if ($_SESSION['statut'] === 'user'): ?>
<div class="profile-container">
<div class="profile-header">
        <h1>Éditer Profil</h1>
    </div>
    <form id="profileForm" class="profile-form" action="profileController.php" method="post">
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" value="<?php echo $data['infos']['pseudo'] ?>">
        </div>
        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $data['infos']['firstname'] ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $data['infos']['lastname'] ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" value="<?php echo $data['infos']['email'] ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="submit-button">Mettre à jour</button>
        </div>
    </form>
</div>
<?php endif; ?>


<?php if ($_SESSION['statut'] === 'admin'): ?>
    <div class="profile-container">
    <div class="admin-panel">
    <h2>Utilisateurs Bannis</h2>
    <table>
        <?php foreach ($data['userB'] as $user): ?>
            <tr>
                <td><?php echo $user['user_id']; ?>   </td>
                <td><?php echo $user['pseudo']; ?></td>
                <td><a href="/Forum_V2/?controller=profil&action=unbanUserAction&user_id=<?php echo $user['user_id']; ?>">Débannir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <h2>Autres Utilisateurs</h2>
    <table>
        <?php foreach ($data['userNB'] as $user): ?>
            <tr>
                <td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['pseudo']; ?></td>
                <td><a href="/Forum_V2/?controller=profil&action=banUserAction&user_id=<?php echo $user['user_id']; ?>">Bannir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
        </div>
<?php endif; ?>


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
