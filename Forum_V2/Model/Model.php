<?php

class Model
{
    
    private $bd;

    private static $instance = null;

    private function __construct()
    {
        $this->bd = new PDO($dsn="mysql:host=localhost;dbname=forum",
        $login="root",
        $mdp="");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    public function checkIfUserExists($pseudo) {
      $req = $this->bd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
      $req->execute(array($pseudo));
      return $req->rowCount() > 0;
  }

  public function insertUser($pseudo, $lastname, $firstname, $email, $password) {
      $req = $this->bd->prepare('INSERT INTO users(pseudo, lastname, firstname, email, password_hash, created_at, last_login) VALUES(?, ?, ?, ?, ?, NOW(), NOW())');
      $req->execute(array($pseudo, $lastname, $firstname, $email, $password));
  }

  public function getUserInfos($pseudo) {
      $req = $this->bd->prepare('SELECT * FROM users WHERE pseudo = ?');
      $req->execute(array($pseudo));
      return $req->fetch();
  }


     public static function getModel()
     {
         if (!isset(self::$instance)) {
             self::$instance = new Model();
         }
         return self::$instance;
     }

        public function verifyCredentials($email, $password)
        {
           
    
            $stmt = $this->bd->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return password_verify($password, $user['password_hash']);
            }
    
            return false;
        }

        public function getUserByPseudo($pseudo) {
          $req = $this->bd->prepare("SELECT * FROM users WHERE pseudo = ?");
          $req->execute(array($pseudo));
          return $req->fetch();
      }

      public function checkIfEmailExists($email) {
        $req = $this->bd->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?");
        $req->execute(array($email));
        $result = $req->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            return true; 
        } else {
            return false; 
        }
    }

      public function getUserByEmail($email) {
        $req = $this->bd->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute(array($email));
        return $req->fetch();
    }

      public function updateLastLoginUser($pseudo){
        $req = $this->bd->prepare("UPDATE users SET last_login = NOW() WHERE pseudo = ?");
        $req->execute(array($pseudo));      
      }

      public function publierquestion($question_title,$question_description,$question_content, $question_id_auteur, $question_pseudo_auteur){

        $req = $this->bd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES (?, ?, ?, ?, ?, NOW())');
                $req->execute(
                    array($question_title, 
                        $question_description, 
                        $question_content, 
                        $question_id_auteur, 
                        $question_pseudo_auteur
                    )
                );
            }
                
    public function voirquestion(){
        
$req = $this->bd->prepare('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');
$req->execute();
return $req->fetchAll() ; 

}


public function insertComment($from_user_id, $question_id, $content) {
    $req = $this->bd->prepare('INSERT INTO messages(from_user_id, question_id, content, created_at) VALUES (?, ?, ?, NOW())');
    $req->execute(array($from_user_id, $question_id, $content));
}


    
    public function getQuestionById($question_id)
    {
        $req = $this->bd->prepare('SELECT * FROM questions WHERE id = ?');
        $req->execute(array($question_id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentairesByQuestionId($question_id){
        $req = $this->bd->prepare('SELECT * FROM messages WHERE question_id = ?');
        $req->execute(array($question_id));
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($comments as &$comment) {
            $comment['auteur'] = $this->getUserByUserId($comment['from_user_id']);
            
        }
    
        return $comments;
    }

    public function getUserByUserId($id) {
        $req = $this->bd->prepare("SELECT * FROM users WHERE user_id = $id");
        $req->execute();
        return $req->fetch();
    }

    public function updateProfile($pseudo, $firstname, $lastname, $email, $id) {
        $req = $this->bd->prepare('UPDATE users SET pseudo = ?, firstname = ?, lastname = ?, email = ? WHERE user_id = ?');
        $req->execute(array($pseudo, $firstname, $lastname, $email, $id));
    }
    
    public function showallprofil($id){
        $req = $this->bd->prepare("SELECT pseudo, email, firstname, lastname, last_login FROM users WHERE user_id = :user_id ");
        $req->bindParam(':user_id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch() ;
    
    }

    
    public function isUserBanned($userId) {
        $req = $this->bd>prepare("SELECT banned, ban_end FROM users WHERE user_id = ?");
        $req->execute(array($userId));
        $user = $req->fetch();

        if ($user && $user['banned']) {
            if ($user['ban_end'] === null || new DateTime() < new DateTime($user['ban_end'])) {
                return true; 
            }
        }
        return false;
    }

        public function deleteQuestion($questionId) {
            $req = $this->bd->prepare("DELETE FROM questions WHERE id = ?");
            $req->execute(array($questionId));
        }
    
        public function deleteMessage($messageId) {
            $req = $this->bd->prepare("DELETE FROM messages WHERE message_id = ?");
            $req->execute(array($messageId));
        }

        public function banUser($userId, $duration = null) {
            $banUntil = $duration ? date('Y-m-d H:i:s', time() + $duration) : null;
            $req = $this->bd->prepare("UPDATE users SET is_banned = TRUE, ban_until = ? WHERE user_id = ?");
            $req->execute(array($banUntil, $userId));
        }

        public function getAllUser() {
            $req = $this->bd->prepare('SELECT * FROM users');
            $req->execute();
            return $req->fetchAll();
        }

        public function banUserI($userId) {
            $req = $this->bd->prepare("UPDATE users SET is_banned = 1, ban_until = NOW() WHERE user_id = ?");
            return $req->execute(array($userId));
        }
    
        public function unbanUser($userId) {
            $req = $this->bd->prepare("UPDATE users SET is_banned = 0, ban_until = NULL WHERE user_id = ?");
            return $req->execute(array($userId));
        }

        
        public function getBannedUser($userId) {
            $req = $this->bd->prepare('SELECT user_id, pseudo FROM users WHERE is_banned = 1 AND user_id != ?');
            $req->execute(array($userId));
            return $req->fetchAll();
        }
        
        public function getNoBannedUser($userId) {
            $req = $this->bd->prepare('SELECT user_id, pseudo FROM users WHERE is_banned = 0 AND user_id != ?');
            $req->execute(array($userId));
            return $req->fetchAll();
        }

        public function sendMessage($senderId, $receiverId, $message) {
            $req = $this->bd->prepare("INSERT INTO private_messages (sender_id, receiver_id, message, sent_at) VALUES (?, ?, ?, NOW())");
            return $req->execute(array($senderId, $receiverId, $message));
    }

        public function getMessages($userId, $otherUserId) {
            $req = $this->bd->prepare("SELECT * FROM private_messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY sent_at");
            $req->execute(array($userId, $otherUserId, $otherUserId, $userId));
            return $req->fetchAll();
        }

        public function getAllMessage($userId) {
            $req = $this->bd->prepare("SELECT * FROM private_messages WHERE (sender_id = ? OR receiver_id = ?) ORDER BY sent_at DESC");
        
            $req->execute(array($userId, $userId));
        
            return $req->fetchAll();
        }
      
        
}
 // fin model