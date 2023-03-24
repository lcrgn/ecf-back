<?php

namespace Application\controllers\subscribe;

require_once('./bdd/database.php');
require_once('./models/users.php');

use Application\bdd\database\connectionDataBase;
use Application\models\users\userPost;

class subscribe{
    public function execute(){
        if(empty($_POST['pseudo']) && empty($_POST['email']) && empty($_POST['password'])){
            throw new \Exception('Veuillez remplir tous les champs');
        }
        else{
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
        $userPost = new userPost();
        $userPost -> connection = new connectionDataBase();
        $userPost -> newUser($pseudo, $email, $password);
        require('./views/subscribe.php');
        return $create = "Votre compte a été crée";
    }

    public function page(){
        require('./views/template.php');
    }
}