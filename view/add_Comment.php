<div>
    <form method="post" action="../public/index.php?route=addComment&post_id=<?= htmlspecialchars($post->getId()); ?>">
        <label for="titleComment">Titre Commentaire</label><br>
        <input type="text" id="titleComment" name="titleComment"><br>
        <label for="contentComment">Contenu</label><br>
        <textarea id="contentComment" name="contentComment"></textarea><br>
        <input type="submit" value="Ajouter un commentaire" id="submit" name="submit">
    </form>
</div>