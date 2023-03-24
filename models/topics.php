<?php

namespace Application\models\topics;

require_once('./bdd/database.php');

use Application\bdd\database\connectionDataBase;

class topic{

    public string $id;
    public string $topicId;
    public string $title;
    public string $category;

    public function __construct(){
        $this -> id = "";
        $this -> topicId = "";
        $this -> title = "";
        $this -> category = "";
    }

}

class postTopic {

    public connectionDataBase $connection;

    public function createTopic($title, $category){

        $query = $this -> connection -> getDataBase() -> prepare(
            "INSERT INTO `topics`(`title`, `category`) VALUES (:title, :category)"
        );
        $query -> bindparam(':title', $title);
        $query -> bindparam(':category', $category);
        $query - execute();
    }

    public function getTopics(){
        $query = (new connectionDataBase()) -> getDataBase() -> prepare(
            "SELECT * FROM topics LEFT JOIN posts"
        );
        $query -> execute();
        return $query -> fetchAll((\PDO::FETCH_ASSOC));
    }

    public function getTopicsByCategory($category){
        $query = (new connectionDataBase()) -> getDataBase() -> prepare(
            "SELECT * FROM topics LEFT JOIN `posts` WHERE category= ?" 
        );
        $query -> execute([$category]);
        return $query -> fetchAll(\PDO::FETCH_ASSOC);
    }

}