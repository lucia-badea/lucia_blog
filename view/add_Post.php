<?php
$this->title = "Ajouter un article";
?>
<div>
    <form method="post" action="../public/index.php?route=addPost">
        <label for="titlePost">Titre</label><br>
        <input type="text" id="titlePost" name="titlePost"><br>
        <?= isset($errors['titlePost']) ? $errors['titlePost'] : ''; ?>
        <label for="headerPost">L'êntete</label><br>
        <textarea id="headerPost" name="headerPost"></textarea><br>
        <?= isset($errors['headerPost']) ? $errors['headerPost'] : ''; ?>
        <label for="contentPost">Contenu</label><br>
        <textarea id="contentPost" name="contentPost"></textarea><br>
        <?= isset($errors['contentPost']) ? $errors['contentPost'] : ''; ?>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Revenir sur la Page Principale</a>
</div>