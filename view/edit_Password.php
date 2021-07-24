<?php 
$this->title = 'Modifier le mot de passe'; 
?>

<div>
    <p>Modifier le mot de passe de <?= $this->session->get('userName'); ?></p>
    <form method="post" action="../public/index.php?route=editPassword">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Modifier" id="submit" name="submit">
    </form>
</div>
<br>
<a href="../public/index.php">Revenir sur la Page Principale</a>