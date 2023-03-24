<?php var_dump($nav); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title> <?= $title ?> </title>
</head>
<body>

        <nav>
            <div>
                <a href="./index.php">Accueil</a>
                <?php if(isset($_SESSION) && !empty($_SESSION)){?>  
                    <a href="./index.php?action=profil">Mon compte</a>
                    <button type="button">
                        <a href="./index.php?action=deconnection">Déconnexion</a>
                    </button>
                <?php} else {?>
                    <button type="button">
                        <a href="./index.php?action=connect">Connexion</a>
                    </button>
                    <button type="button">
                        <a href="./index.php?action=login">Inscription</a>
                    </button>
                <?php }; ?>
            </div>
        </nav>
        <?= $nav; ?>
    
    <body>
        <?= $content; ?>
    </body>

    <footer>LR Production</footer>
        
</body>
</html>