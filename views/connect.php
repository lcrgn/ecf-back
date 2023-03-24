<?php $title = "Connexion"; ?>

<?php ob_start(); ?>
    <nav>
        <h2>Connexion</h2>
    </nav>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>

<div>

    <form action="index.php?action=subConnect" method="post">

        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de Passe">
        <button type="submit">Se connecter</button>

    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php require("./template.php"); ?>