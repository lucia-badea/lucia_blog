<?php
$this->title = "Connexion";
 ?>

<?= $this->session->display('error_conection'); ?>

<div>
    <form method="post" action="../public/index.php?route=login">
        <label for="userName">Pseudo</label><br>
        <input type="text" id="userName" name="userName" value="<?= isset($post) ? htmlspecialchars($post->get('userName')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Revenir sur la Page Principale</a>
</div>