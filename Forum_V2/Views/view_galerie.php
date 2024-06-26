<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="Content/css/galery.css" rel="stylesheet" >
<link href="Content/css/lightbox.min.css" rel="stylesheet">
<script type="text/javascript" src="Content/js/lightbox-plus-jquery.min.js"></script>
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

    <div class="logo">
    <img src="/Forum_V2/Content/img/galerie.jpg" alt="Galerie Photo">
    </div>
    <div class="gallery">

        <a href="/Forum_V2/Content/img/itachi-big.png" data-lightbox="mygallery" data-title="Itachi Uchiha, du manga Naruto, est un prodige du clan Uchiha, maître du Sharingan, avec un passé complexe mêlant sacrifice familial et loyauté envers Konoha. Son charisme, son intelligence et sa force en font un personnage emblématique de la série."><img src = "Content/img/itachi-small.jpg"/></a>

        <a href="/Forum_V2/Content/img/kakashi-big.jpg" data-lightbox="mygallery" data-title="Kakashi Hatake est un ninja émérite de l'univers Naruto, connu pour sa maîtrise du Sharingan, son intelligence exceptionnelle et son style de combat calme et stratégique. Il occupe le rôle de sensei auprès de l'équipe 7, formant Naruto, Sasuke et Sakura."><img src = "Content/img/kakashi-small.jpg"/></a>

        <a href="/Forum_V2/Content/img/minato-big.jpg"data-lightbox="mygallery" data-title="Minato Namikaze, également connu sous le nom de l'Éclair Jaune de Konoha, est un ninja légendaire de Naruto reconnu pour sa vitesse fulgurante, sa maîtrise du Rasengan, et il est le père de Naruto Uzumaki. Minato est admiré pour ses compétences exceptionnelles en tant que Quatrième Hokage et sa bravoure héroïque lors de la protection de Konoha."><img src = "Content/img/minato-small.jpg"/></a>

        <a href="/Forum_V2/Content/img/naruto-big.jpg"data-lightbox="mygallery" data-title="Naruto Uzumaki, le héros éponyme de Naruto, est un ninja au grand cœur cherchant à devenir le Hokage de Konoha. Doté d'une ténacité inébranlable, il surmonte les défis avec sa détermination, son amitié profonde et son pouvoir colossal issu du démon-renard à neuf queues scellé en lui."><img src = "Content/img/naruto-small.jpg"/></a>

        <a href="/Forum_V2/Content/img/obito-big.jpg"data-lightbox="mygallery" data-title="Obito Uchiha, un personnage clé de Naruto, évolue d'un jeune ninja joyeux à l'identité mystérieuse de Tobi. Marqué par des tragédies, il est manipulé par des forces obscures pour devenir l'antagoniste. Son histoire complexe explore le thème du sacrifice et de la rédemption dans le monde ninja."><img src = "Content/img/obito.jpg"/></a>

        <a href="/Forum_V2/Content/img/gai-big.png"data-lightbox="mygallery" data-title = "Gai Maito, un personnage de Naruto, est un ninja dynamique et déterminé, connu pour son énergie contagieuse et son sourire éclatant, incarnant des valeurs d'amitié et de persévérance.En tant que sensei de l'équipe Guy, il excelle dans les arts martiaux et incarne des valeurs telles que la persévérance, la détermination et l'amitié."><img src = "Content/img/gai.jpg"/></a>

        <a href="/Forum_V2/Content/img/madara-big.jpg"data-lightbox="mygallery" data-title = "Madara Uchiha, figure emblématique de Naruto, est un puissant ninja doté d'une force extraordinaire et d'une sagesse exceptionnelle. En tant que fondateur du clan Uchiha, il aspire à réaliser ses idéaux en instaurant un monde où la puissance domine. Sa quête de pouvoir le conduit à devenir un antagoniste central de l'histoire, avec une présence charismatique et une maîtrise redoutable du combat."><img src = "Content/img/madara.jpg"/></a>

        <a href="/Forum_V2/Content/img/hashirama-big.jpg"data-lightbox="mygallery" data-title="Hashirama Senju, fondateur charismatique de Konoha et maître du Mokuton, symbolise l'espoir et la sagesse dans l'univers de Naruto, guidant son village vers la prospérité tout en poursuivant son rêve de paix. Sa force et sa détermination inspirent respect et admiration, faisant de lui une figure emblématique de la série.
"><img src = "Content/img/hashirama.jpg"/></a>

        <a href="/Forum_V2/Content/img/sasuke-big.jpg"data-lightbox="mygallery" data-title = "Sasuke Uchiha, protagoniste complexe de Naruto, évolue d'un ninja vengeur cherchant à venger son clan à un individu cherchant la vérité et l'équilibre. Son voyage est marqué par des choix difficiles, la recherche de puissance et une quête personnelle de rédemption, faisant de lui un personnage central avec une dualité fascinante."><img src = "Content/img/sasuke.png"/></a>

        <a href="/Forum_V2/Content/img/jiraya-big.jpg"data-lightbox="mygallery" data-title = "Jiraiya, le légendaire Sannin dans Naruto, est un maître ninja, écrivain et mentor de Naruto. Connu pour sa jovialité, son intelligence et ses compétences en arts martiaux, Jiraiya joue un rôle crucial dans la vie de Naruto en lui enseignant des valeurs essentielles et en contribuant à sa croissance en tant que ninja. Son histoire est teintée de courage, de sagesse et d'une tragédie marquante."><img src = "Content/img/jiraya.jpg"/></a>
        
    </div>
    <br>

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