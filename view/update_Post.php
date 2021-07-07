<?php
$this->title = "Modifier l'article";
 ?>
<div>
    <form method="post" action="../public/index.php?route=updatePost&post_id=<?= htmlspecialchars($post->getId()); ?>">
        <label for="titlePost">Titre de l'article</label><br>
        <input type="text" id="titlePost" name="titlePost" value="<?= htmlspecialchars($post->getTitlePost()); ?>"><br>
        <label for="headerPost">L'êntete</label><br>
        <input type="text" id="headerPost" name="headerPost" value="<?= htmlspecialchars($post->getHeaderPost()); ?>"><br>
        <label for="contentPost">Contenu</label><br>
        <textarea id="contentPost" name="contentPost"><?= htmlspecialchars($post->getContentPost()); ?></textarea><br>
        <input type="submit" value="Mettre à jour l'article" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>