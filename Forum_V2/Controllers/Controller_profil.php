<?php
require_once "Model/Model.php";
require_once "Utils/credentials.php";

class Controller_profil extends Controller {

    public function action_default(){

        $userId = $_SESSION['id'];
        $model = Model::getModel();
        $profile = $model->showallprofil($userId);
        $userB = $model->getBannedUser($userId);
        $userNB = $model->getNoBannedUser($userId);

      
        $data = [
            'title' => 'Profil',
            'infos' => $profile,
            'userB' => $userB,
            'userNB' => $userNB
        ];
        $this->render('profil', $data);
        
        
    }

    public function action_profil(){
        
        $model = Model::getModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pseudo = $_POST['pseudo'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $id = $_SESSION['user_id']; 
            $updateStatus = $model->updateProfile($pseudo, $firstname, $lastname, $email, $id);

        
            if ($updateStatus) {
                header('Location: /Forum_V2/?controller=default'); 
                exit;
            } else {
                $errorMessage = "Une erreur est survenue lors de la mise à jour du profil.";
            }
        }
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /Forum_V2/?controller=auth');
            exit;
        }
    }

        public function action_banUserAction() {
            $model = Model::getModel();
            $userId = $_GET['user_id']; 
            if ($_SESSION['statut'] === 'admin') {
                $model->banUserI($userId);
                header('Location: /Forum_V2/?controller=profil');
                exit;
            } else {
                echo "Action non autorisée.";
            }
        }

        public function action_unbanUserAction() {
            $model = Model::getModel();
            $userId = $_GET['user_id'];
            if ($_SESSION['statut'] === 'admin') {
                $model->unbanUser($userId);
                header('Location: /Forum_V2/?controller=profil');
                exit;
            } else {
                echo "Action non autorisée.";
            }
        }



}
?>
