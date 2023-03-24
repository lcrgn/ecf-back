<?php

namespace Application\Controllers\homePage;

require_once('./bdd/database.php');
require_once('./models/topics.php');

use Application\bdd\database\connectionDataBase;
use Application\models\topics\postTopic;

class homePage{

    public function execute(){
        $connection = new connectionDataBase;
        $sante = (new postTopic()) -> getTopicsByCategory("sante");
        $alimentation = (new postTopic()) -> getTopicsByCategory("alimentation");
        $education = (new postTopic()) -> getTopicsByCategory("education");
        $prenom = (new postTopic()) -> getTopicsByCategory("prenom");
        require('./views/homePage.php');
    }
    
}