<?php $title = "Accueil"; ?>


<?php ob_start(); ?>

<nav>
    <a href="#sante">Santé</a>
    <a href="#alimentation">alimentation</a>
    <a href="#education">Éducation</a>
    <a href="#prenom">Prénoms</a>
</nav>

<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>

 <!-- titre Topic + catégory -->
 <!-- post -->

 <?php if (!empty($sante)) { ?>

    <div id="sante">
        <h2>
            <?php if (isset($sante[0]["category"])) {
                echo strtoupper($sante[0]["category"]);
            } ?>
        </h2>
    </div>
    
    <div>
        <?php foreach ($sante as $key => $value) { ?>

            <h3><?php $value["title"] ?></h3>
            <?php $value['message'] ?>

        <?php } ?>
    </div>


<?php } ?>


<?php $content = ob_get_clean(); ?>

<?php require("./views/template.php"); ?>
