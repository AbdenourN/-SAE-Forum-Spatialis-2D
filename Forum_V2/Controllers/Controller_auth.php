<?php
require_once "Model/Model.php";
require_once "Utils/credentials.php";

class Controller_auth extends Controller {

    public function action_form_login() {
        $data = [
            'title' => 'Connexion',
        ];
        $this->render('login', $data);
    }

    public function action_login() {
        $model = Model::getModel();
    
        if (isset($_POST['validate'])) {
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    
            if (!empty($email) && !empty($password)) {
                $user = $model->getUserByEmail($email);
    
                if ($user && password_verify($password, $user['password_hash'])) {
    
                    if ($user['is_banned']) {
                        echo '<script>alert("Votre compte est temporairement suspendu.");</script>';
                    } else {
                        $model->updateLastLoginUser($email);
    
                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $user['user_id'];
                        $_SESSION['username'] = $user['pseudo'];
                        $_SESSION['statut'] = $user['statut'];
                        $pseudo = $_SESSION['username'];
    
                        $data = ["pseudo" => $pseudo];
                        $this->render("carte", $data);
                        exit(); 
                    }
                } else {
                    echo '<script>alert("Pseudo ou mot de passe incorrect.");</script>';
                }
            } else {
                echo '<script>alert("Aucune donnée envoyée");</script>';
            }
        }
        
        $data = ['title' => 'Connexion'];
        $this->render('login', $data);
    }
    
        
    
    public function action_register() {
        $model = Model::getModel();
    
        if (isset($_POST['validate'])) {
            $pseudo = $_POST['pseudo'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
            if (!empty($pseudo) && !empty($lastname) && !empty($firstname) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (!$model->checkIfUserExists($pseudo)) {
                    if (!$model->checkIfEmailExists($email)) {
                        $model->insertUser($pseudo, $lastname, $firstname, $email, $password);
                        $userInfo = $model->getUserInfos($pseudo);
    
                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $userInfo['user_id'];
                        $_SESSION['lastname'] = $userInfo['lastname'];
                        $_SESSION['firstname'] = $userInfo['firstname'];
                        $_SESSION['pseudo'] = $userInfo['pseudo'];
                        $_SESSION['email'] = $userInfo['email'];
    
                        header('Location: ?controller=home');
                        exit();
                    } else {
                        echo '<script>alert("L\'adresse e-mail est déjà utilisée par un autre compte.");</script>';
                    }
                } else {
                    echo '<script>alert("Pseudo déjà utilisé.");</script>';
                }
            } else {
                echo '<script>alert("Veuillez remplir tous les champs.");</script>';
            }
        }
    }
    

    public function action_default() {
       
        $data = [
            'title' => 'Page de connexion',
            'content' => 'Contenu de la page par défaut',
        ];
        $this->render('login', $data);
    }

    public function action_logout() {
        
        session_destroy();

       $_SESSION['auth']=false;
        header('Location: /Forum_V2/?controller=auth');
        exit(); 
    }


}
?>