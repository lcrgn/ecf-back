<?php

namespace Application\models\posts;

require_once('./bdd/database.php');

use Application\bdd\database\connectionDataBase;
use Application\models\topics\postTopic;

class Post extends postTopic{

    public string $id;
    public string $postId;
    public string $title;
    public string $message;

    public function __construct(){
        $this -> id = "";
        $this -> postId = "";
        $this -> title = "";
        $this -> message = "";
    }
}

class publicationP { 
    public connectionDataBase $connection;

    public function createPost($title, $message){
        $query = $this -> connection -> getDataBase() -> prepare(
            "INSERT INTO `posts`(`id`, `postId`, `title`, `message`) VALUES(:postId, :title, :message)"
        );
        $query -> bindparam(':postId', $postId);
        $query -> bindparam(':title', $title);
        $query -> bindparam(':message', $message);
        $query -> execute();
    }

    public function allPost(){
        $resultat = $this -> connection -> getDataBase() -> prepare(
            "SELECT * FROM posts"
        );
        $resultat -> execute();
        return $resultat -> fetchAll(\PDO::FETCH_ASSOC);
    }

    public function postUser(int $topicId){
        $resultat = $this -> connection -> getDataBase() -> prepare(
            "SELECT * FROM posts WHERE topicId=?"
        );
        $resultat -> execute([$topicId]);
        $posts = [];
        while(($row = $resultat -> fetch())){
            $post = new Post();
            $post -> id = $row['id'];
            $post -> topicId = $row['topicId'];
            $post -> title = $row['title'];
            $post -> message = $row['message'];

            $posts[] = $post;
        }
        return $posts;
    }
}