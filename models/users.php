<?php

namespace Application\models\users;

require_once("bdd/database.php");

use Application\bdd\database\getDataBase;

class User{
    public string $id;
    public string $pseudo;
    public string $email;
    public string $password;
}

class userPost{
    public getDataBase $connection;

    public function userDetail($id){
        $query = $this -> connection -> getDataBase() -> prepare(
            "SELECT * FROM users WHERE id = ?"
        );
        $query -> execute([$id]);
        $resultat = $query -> fetch();
        return $resultat;
    }

    public function userConnect($email, $password){
        $query = $this -> connection -> getDataBase() -> prepare(
            "SELECT * FROM users WHERE email = ?"
        );
        $query -> execute([$email]);
        $resultat = $query -> fetch();

        if($query -> rowCount() == 0){
            throw new \Exception("L'utilisateur n'existe pas, veuillez vérifier vos données ou créer un compte");
        }
        else{
            if(password_verify($password, $resultat['password'])){
                session_start();
                $_SESSION['connecte'] = 1;
                $_SESSION['email'] = $resultat['email'];
                $_SESSION['id'] = $resultat['id'];
                header("Location: index.php?action=account");
                exit;
            }
            else{
                throw new \Exception("Le mot de passe n'est pas valide.");
            }
        }
    }

    public function newUser($pseudo, $email, $password){
        $query = $this -> connection -> getDataBase() -> prepare(
            "INSERT INTO users (pseudo, email, password) VALUES(?,?,?)"
        );
        $query -> execute([$pseudo, $email, $password]);
        header("Location: index.php?action=account");
        exit;
    }

    public function updateUser($pseudo, $email, $password){
        $query = $this -> connection -> getDataBase() -> prepare(
            "UPDATE users SET pseudo = ?, email = ?, password = ? WHERE id = ?"
        );
        $query -> execute ([$pseudo, $email, $password, $_SESSION['id']]);
        header("Location: .//index.php?action=account");
        exit;
    }
}