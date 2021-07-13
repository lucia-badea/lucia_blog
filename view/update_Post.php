<?php
$this->title = "Modifier l'article";
 ?>
<div>
    <form method="post" action="../public/index.php?route=updatePost&post_id=<?= htmlspecialchars($article->getId()); ?>">
        <label for="titlePost">Titre</label><br>
        <input type="text" id="titlePost" name="titlePost" value="<?= htmlspecialchars($article->getTitlePost()); ?>"><br>
        <label for="headerPost">L'êntete</label><br>
        <textarea id="headerPost" name="headerPost"><?= htmlspecialchars($article->getHeaderPost()); ?></textarea><br>
        <label for="contentPost">Contenu</label><br>
        <textarea id="contentPost" name="contentPost"><?= htmlspecialchars($article->getContentPost()); ?></textarea><br>
        <input type="submit" value="Modifier l'article" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>