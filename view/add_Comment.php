<?php
$this->title = "Ajouter un commentaire";
?>
<div>
    <form id="contactForm" method="post" action="../public/index.php?route=addComment&post_id=<?= htmlspecialchars($article->getId()); ?>">
        <div class="form-floating">
            <label for="titlePost">Titre</label><br>
            <input class="form-control" type="text" id="titleComment" name="titleComment"><br>
            <?= isset($errors['titleComment']) ? $errors['titleComment'] : ''; ?>
        </div>
        <div class="form-floating">
            <label for="contentComment">Contenu</label><br>
            <textarea class="form-control" id="contentComment" name="contentComment"></textarea><br>
            <?= isset($errors['contentComment']) ? $errors['contentComment'] : ''; ?>
        </div>
        <input class="btn btn-primary text-uppercase" type="submit" value="Envoyer le commentaire" id="submitButton" name="submit">
    </form>
</div>