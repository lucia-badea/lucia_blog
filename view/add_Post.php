<?php
$this->title = "Ajouter un article";
?>
<div>
    <form method="post" action="../public/index.php?route=addPost">
        <label for="titlePost">Titre</label><br>
        <input type="text" id="titlePost" name="titlePost"><br>
        <label for="headerPost">L'êntete</label><br>
        <textarea id="headerPost" name="headerPost"></textarea><br>
        <label for="contentPost">Contenu</label><br>
        <textarea id="contentPost" name="contentPost"></textarea><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>