<?php
// Démarrage de la session
session_start();

// Inclusion de la fonction e() pour échapper les données affichées
require_once "Utils/functions.php";

// Inclusion du modèle
require_once "Model/Model.php";

// Inclusion de la classe Controller
require_once "Controllers/Controller.php";

// Liste des contrôleurs disponibles
$controllers = ["auth", "forum", "profil","mp"];

// Nom du contrôleur par défaut
$controller_default = "auth";

// On teste si le paramètre "controller" existe et correspond à un contrôleur de la liste $controllers
if (isset($_GET['controller']) && in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
} else {
    // Si le paramètre n'est pas défini ou ne correspond pas à un contrôleur valide, on utilise le contrôleur par défaut
    $nom_controller = $controller_default;
}

// On détermine le nom de la classe du contrôleur
$nom_classe = 'Controller_' . $nom_controller;

// On détermine le nom du fichier contenant la définition du contrôleur
$nom_fichier = 'Controllers/' . $nom_classe . '.php';



// Si le fichier existe et est accessible en lecture
if (is_readable($nom_fichier)) {
    // On l'inclut et on instancie un objet de cette classe
    require_once $nom_fichier;
    new $nom_classe();
} else {
    // Si le fichier du contrôleur n'est pas trouvé, renvoyer une erreur 404
    die("Error 404: not found!");
}
