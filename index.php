<?php

session_start();

require_once("./controllers/homePage.php");
require_once('./controllers/subscribe.php');
require_once('./controllers/connect.php');
require_once('./controllers/profil.php');
require_once('./controllers/deconnection.php');

use Application\Controllers\homePage\homePage;
use Application\Controllers\subscribe\subscribe;
use Application\Controllers\connect\connect;
use Application\Controllers\profil\profil;
use Application\Controllers\deconnection\deconnection;


try{
    if (isset($_GET["action"]) && $_GET["action"] !== ""){
        if($_GET["action"] === "login"){
            (new subscribe()) -> execute();
        }
        elseif($_GET['action'] === "connect"){
            (new connect()) -> page();
        }
        elseif($_GET['action'] === "deconnection"){
            (new deconnection()) -> page();
        }
        elseif($_GET['action'] === "subConnect"){
            (new connect()) -> execute();
        }
        elseif($_GET['action'] === "profil"){
            if(isset($_SESSION) && !empty($_SESSION)){
                (new profil()) -> execute();
            }
            else{
                (new profil()) -> page();
            }
        }
        elseif($_GET['action'] === "userModif"){
            (new profil()) -> updateUser();
        }
        elseif($_GET['action'] === "submitMessage"){
            (new profil()) -> createPost();
        }
    }
    else{
        (new homePage()) -> execute();
    }

}
catch (Exception $e) {
    echo "Veuillez nous excuser, une erreur a eu lieu";
}
