<?php

namespace Application\Controllers\connect;

require_once("./bdd/database.php");
require_once("./models/users.php");

use Application\bdd\database\getDataBase;
use Application\models\userPost;

class connect{
    public function execute(){
        if(empty(htmlspecialchars($_POST['email']))){
            throw new \Exception("Veuillez saisir l'email");
        }
        else{
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        }
        if(empty(htmlspecialchars($_POST['password']))){
            throw new \Exception("Veuillez saisir le mot de passe");
        }
        else{
            $password = htmlspecialchars($_POST['password']);
        }
        $userPost = new userPost();
        $userPost -> connection = new getDataBase();
        $userPost -> userConnect($email, $password);

        require('./views/connect.php');
    }
    public function page(){
        require_once('./views/connect.php');
    }
}

