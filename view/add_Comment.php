<div>
    <form method="post" action="../public/index.php?route=addComment&post_id=<?= htmlspecialchars($post->getId()); ?>">
    <label for="titlePost">Titre</label><br>
        <input type="text" id="titleComment" name="titleComment" value="<?= htmlspecialchars($post->getTitleComment()); ?>"><br>
        <?= isset($errors['titleComment']) ? $errors['titleComment'] : ''; ?>
        <label for="contentComment">Contenu</label><br>
        <textarea id="contentComment" name="contentComment"><?= htmlspecialchars($post->getContentComment()); ?></textarea><br>
        <?= isset($errors['contentComment']) ? $errors['contentComment'] : ''; ?>
        <input type="submit" value="Envoyer le commentaire" id="submit" name="submit">
    </form>
</div>