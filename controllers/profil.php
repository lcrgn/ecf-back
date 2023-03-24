<?php

namespace Application\controllers\profil;

require_once('./bdd/database.php');
require_once('./models/users.php');
require_once('./models/posts.php');
require_once('./models/topics.php');

use Application\bdd\database\connectionDataBase;
use Application\models\users\userPost;
use Application\models\posts\publicationP;
use Application\models\topics\postTopic;

class profil{
    public function execute(){
        $topicId = htmlspecialchars($_SESSION['id']);

        $userPost = new userPost();
        $userPost -> connection = new connectionDataBase();
        $resultat = $userPost -> userDetail($id);

        $publicationP = new publicationP();
        $publicationP -> connection = new connectionDataBase();
        $posts = $publicationP -> postUser($topicId);
    }

    public function updateUser(){
        if(!empty(htmlspecialchars($_POST['password']))){
            $password = password_hash($_POST('password'), PASSWORD_DEFAULT);
        }
        else{
            throw new \Exception('Veuillez saisir un mot de passe correct');
        }
    }

    public function createPost(){
        $topicId = htmlspecialchars($_SESSION['id']);
        if(!empty(htmlspecialchars($_POST['title'])) && !empty(htmlspecialchars($_POST["category"]))){
            $title = $_POST['title'];
            $message = $_POST['message'];

            $userPost = new userPost();
            $userPost -> connection = new connectionDataBase();
            $resultat = $userPost -> userDetail($topicId);

            $publicationP = new publicationP();
            $publicationP -> connection = new connectionDataBase();
            $publicationP -> createPost($title, $message);
            header('Location: index.php?action=profil');
            exit;
        }
        else{
            throw new \Exception('Votre publication ne peut pas être publiée, veuillez la vérifier');
        }
    }
}
