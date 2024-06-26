<?php
require_once "Model/Model.php";
require_once "Utils/credentials.php";

class Controller_forum extends Controller {

    public function action_default(){

        $model = Model::getModel();
        $allforforum = $model->voirquestion();
        $data = [
            'title' => 'Questions' , 'QST' => $allforforum    ];
        $this->render('forum_accueil', $data);
        
    }

    public function action_add(){

        $this->render('poster_message');
    }

    public function action_publishQ(){
      
     
        if(isset($_POST['poster'])){
            
            
            
            if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['message'])){
                 
                //Les données liée à la question
                $question_title = htmlspecialchars($_POST['titre']);
                $question_description = nl2br(htmlspecialchars($_POST['description']));
                $question_content = nl2br(htmlspecialchars($_POST['message']));
                $question_id_auteur = $_SESSION['id'];
                $question_pseudo_auteur = $_SESSION['username'];
        
                //Insérer la question sur la question
                $model = Model::getModel();
                $model->publierquestion($question_title,$question_description,$question_content, $question_id_auteur, $question_pseudo_auteur);
                
                header('Location: /Exo/Forum_V2/chrislin?controller=forum');
                $successMsg = "Votre question a bien été publiée sur le site";
                
            }else{
                $errorMsg = "Veuillez compléter tous les champs...";
            }
        
        }
    }


    public function action_carte(){
        $data = [
            'title' => 'Carte',
        ];
        $this->render('carte', $data);
    }

    public function action_accueil(){
        $model = Model::getModel();
        $allforforum = $model->voirquestion();
        $data = [
            'title' => 'Accueil' , 'QST' => $allforforum    ];
        $this->render('accueil', $data);

    }

    public function action_galerie(){
        $model = Model::getModel();
        $data = [
            'title' => 'Galerie Photo'];
        $this->render('galerie', $data);

    }

    
    public function action_espaceCommentaire() {
        if (isset($_GET['question_id'])) {
            $question_id = $_GET['question_id'];
    
            $model = Model::getModel();
            $question = $model->getQuestionById($question_id);
            $commentaires = $model->getCommentairesByQuestionId($question_id);

            $data = [
                'title' => 'Forum de commentaires',
                'question' => $question,
                'commentaire'=>$commentaires
            ];

            $this->render('commentaire_question', $data);
        }
    }
    
    public function action_insertComment() {
        if (isset($_SESSION['id'], $_POST['question_id'], $_POST['content'])) {
            $from_user_id = $_SESSION['id'];
            $question_id = $_POST['question_id'];
            $content = $_POST['content'];
    
            $model = Model::getModel();
            $model->insertComment($from_user_id, $question_id, $content);
    
            header('Location: /Forum_V2/?controller=forum&action=espaceCommentaire&question_id=' . $question_id);
            exit;
        }
    }

    public function action_map(){

        $model = Model::getModel();
        $pseudo = $_SESSION['username'];
        $data = [
            'title' => 'Village de Konoha','pseudo'=>$pseudo   ];
        $this->render('map', $data);

    }


    
    public function action_deleteQuestion() {
        $model = Model::getModel();
        $questionId = $_GET['question_id'];
        if ($_SESSION['statut'] === 'admin') { 
            $model->deleteQuestion($questionId);
            header('Location: /Forum_V2/?controller=forum&action=home');
            exit;
        } else {
            echo "Action non autorisée ou question non trouvée.";
        }
    }

    public function action_deleteMessage() {
        $model = Model::getModel();
        $messageId = $_GET['message_id'];
        $questionId = $_GET['question_id'] ?? null;
    
        if ($_SESSION['statut'] === 'admin' && $questionId) {
            $model->deleteMessage($messageId);
            header('Location: /Forum_V2/?controller=forum&action=espaceCommentaire&question_id=' . $questionId);
        } else {
            echo "Action non autorisée ou message non trouvé.";
        }
    }

    public function action_banUserAction() {
        $model = Model::getModel();
        if ($_SESSION['statut'] === 'admin') {
            $userId = $_POST['user_id'];
            $duration = $_POST['duration'];
            $model->banUser($userId, $duration);
            header('Location: /Forum_V2/?controller=forum&action=home');
            exit;
        } else {
            echo "Action non autorisée.";
        }
    }

}
