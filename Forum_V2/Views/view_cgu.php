<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../Content/css/cgu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="icon" type="image/vnd.icon" href="../Content/img/Icon.ico">
    <title>Conditions Générales d'Utilisation</title>
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
    <h1>Conditions Générales d'Utilisation</h1>

    <p> Bienvenue sur notre site web. En naviguant sur ce site, vous acceptez d'être lié par les présentes conditions d'utilisation, lesquelles régissent la relation entre vous et [Nom de l'entreprise] concernant l'utilisation de ce site web.</p>

    <h2> 1. Utilisation du site</h2>
    <p> En accédant à ce site, vous acceptez de l'utiliser uniquement à des fins légales et conformément aux présentes conditions. Vous acceptez de ne pas utiliser ce site :</p>
    <ul>
        <li>de manière qui enfreint les lois ou règlements locaux, nationaux ou internationaux applicables;</li>
        <li>de manière frauduleuse ou nuisible, ou en relation avec une activité illégale ou frauduleuse;</li>
        <li>pour transmettre intentionnellement des virus, vers, chevaux de Troie, bombes logiques ou tout autre matériel nuisible ou technologiquement dangereux;</li>
        <li>pour collecter ou suivre les informations personnelles d'autrui;</li>
        <li>pour du courrier indésirable, spam, chaînes de lettres ou tout autre type de sollicitation similaire.</li>
    </ul>

    <h2>2. Propriété intellectuelle</h2>
    <p>Le contenu de ce site, y compris mais sans s'y limiter, le texte, les graphiques, les images, les logos, les boutons, les icônes, les logiciels et les clips audio, est la propriété de [Nom de l'entreprise] ou de ses fournisseurs de contenu et est protégé par les lois nationales et internationales sur le droit d'auteur.</p>

    <h2>3. Limitation de responsabilité</h2>
    <p>Nous nous efforçons de garantir que les informations sur ce site sont correctes et à jour. Cependant, nous ne garantissons pas l'exactitude, l'exhaustivité ou la pertinence du contenu. L'utilisation de ce site est à vos propres risques.</p>

    <h2>4. Modifications des conditions d'utilisation</h2>
    <p>Nous nous réservons le droit de modifier ces conditions d'utilisation à tout moment. Les modifications prendront effet dès leur publication sur ce site. En continuant à utiliser ce site après la publication des modifications, vous acceptez lesdites modifications.</p>

    <h2>5. Contact</h2>
    <p>Si vous avez des questions concernant ces conditions d'utilisation, veuillez nous contacter à l'adresse suivante : <a href="mailto:contact@anbu-naruto.com">contact@anbu-naruto.com</a> .</p>

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
