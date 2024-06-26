<?php
require_once "Model/Model.php";
require_once "Utils/credentials.php";

class Controller_mp extends Controller {

    public function action_default() {
        $model = Model::getModel();
        $userId = $_SESSION['id'];
        $mpR = $model->getAllMessage($userId);
        $data = [
            'title' => 'Message privée',
            'mpR' => $mpR,
            'id' => $userId
        ];
        $this->render('mp', $data);
    }


public function action_sendMessage() {
        $model = Model::getModel();

        $senderId = $_SESSION['id'];
        $receiverId = $_POST['receiver_id'];
        $message = $_POST['message'];

        if($model->sendMessage($senderId, $receiverId, $message)){
            header('Location: /Forum_V2/?controller=mp&action=default');
            exit;
        } else {
            echo "Erreur lors de l'envoie du message.";
        }

    }

    public function action_viewMessages() {
        $model = Model::getModel();
        $userId = $_POST[''];
        $otherUserId = $_POST[''];

        $messages = $model->getMessages($userId, $otherUserId);
        
    }

}