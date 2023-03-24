<?php $title = "Inscription"; ?>

<?php ob_start(); ?>

<nav>
    <h2>Inscrivez vous</h2>
</nav>

<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>


<form action="index.php?action=subscribe" method="post">
    <input type="text" name="pseudo" placeholder="Pseudo">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name ="password" placeholder="Mot de passe">
    <button type="submit">S'inscrire</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once('./template.php');