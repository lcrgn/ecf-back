<?php

namespace Application\bdd\Database;

class connectionDataBase{

    public ?\PDO $database = null;

    public function getDataBase():\PDO{

        if($this-> database === null){
            $this -> database = new \PDO('mysql:host=localhost;dbname=chatforum;charset=utf8', 'root', '');
        }
        return $this-> database;
    }
}