<?php ob_start(); ?>

<nav>
    <h2>Mon profil</h2>
</nav>

<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>

<div>
    <form action="index.php?action=userModif" method="post">
        <h3>Vos information</h3>

        <input type="text" name="pseudo" value="<?= $resultat["pseudo"] ?>">
        <input type="email" name="email" value="<?= $resultat["email"] ?>">
        <input type="password" name="password" placeholder="Modifiez votre mot de passe">

        <button type="submit">Modifier mes données</button>
    </form>

    <div>
        <h3>Vos posts</h3>

        <?php if(empty($messages)) { ?>
            <p>Vous n'avez pas posté pour le moment</p>
        <?php } else {?>
            <?php foreach($messages as $message){?>
                <p><?= $message -> content ?></p>
                <form action="index.php?action=deletePost" method="post">
                    <input type="hidden" name="id" value="<?= $message->id ?>">
                </form>
            <?php } ?>
        <?php } ?>
    </div>


    <!-- Formulaire pour ajouter un message -->
    <div>
        <h4>Poster un message</h4>

        <form action="index.php?action=submitMessage" method="post">
            <label>Catégorie</label>
            <select name="category">
                <option value="Sante">Santé</option>
                <option value="Alimentation">Alimentation</option>
                <option value="Education">Éducation</option>
                <option value="Prenoms">Prénoms</option>
            </select>
    <!-- 
            <label>Créer une sous catégorie</label>
            <input type="text" name="subcategory" placeholder="Saisir une sous-catégorie"> -->

            <textarea name="message" placeholder="Ecrivez nous"></textarea>


            <button type="submit">Poster</button>

        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("./template.php"); ?>



