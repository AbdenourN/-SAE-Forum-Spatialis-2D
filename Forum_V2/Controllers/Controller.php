<?php

// Classe abstraite de base pour les contrôleurs
abstract class Controller
{
    /**
     * Constructeur. Lance l'action correspondante.
     */
    public function __construct()
    {
        // On détermine s'il existe dans l'URL un paramètre "action" correspondant à une action du contrôleur
        if (isset($_GET['action']) && method_exists($this, "action_" . $_GET["action"])) {
            // Si c'est le cas, on appelle cette action
            $action = "action_" . $_GET["action"];
            $this->$action();
        } else {
            // Sinon, on appelle l'action par défaut
            $this->action_default();
        }
    }

    /**
     * Action par défaut du contrôleur (à définir dans les classes filles).
     */
    abstract public function action_default();

    /**
     * Affiche la vue.
     *
     * @param string $view Nom de la vue.
     * @param array $data Tableau contenant les données à passer à la vue.
     * @return void
     */
    protected function render($view, $data = [])
    {
        // On extrait les données à afficher
        extract($data); // Cela crée les variables en fonction des clés du tableau

        // On teste si la vue existe
        $file_path = "Views/view_" . $view . '.php';

        if (is_readable($file_path)) {
            // Si oui, on l'inclut et elle aura accès aux variables extraites précédemment
            require_once $file_path;
        } else {
            // Si la vue n'existe pas, on lance une erreur
            die("Error 404: not found!");
        }
    }

    /**
     * Affiche une page d'erreur.
     *
     * @param string $message Message d'erreur à afficher.
     * @return void
     */
    protected function action_error($message = '')
    {
        $data = [
            'title' => "Erreur",
            'message' => $message,
        ];

        // Affiche la page d'erreur en utilisant la méthode render
        // $this->render("message", $data);

        die($message);
    }
}
