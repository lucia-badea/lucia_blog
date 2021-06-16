<?php
require 'Db.php';
require 'Post.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon blog</title>
    </head>
    <body>
    <div>
        <h1>Le Blog de Lucia</h1>
        <p>C'est ma page Article</p>
        <?php
        $post = new Post();
        $posts = $post->showPost(3);
        while($post = $posts->fetch())
        {
        ?>
        <div>
            <h2><?= htmlspecialchars($post->titlePost);?></h2>
            <p><?= htmlspecialchars($post->headerPost);?></p>
            <p><?= htmlspecialchars($post->contentPost);?></p>
            <p>Créé le : <?= htmlspecialchars($post->updated_at);?></p>
            <p>Par : <?= htmlspecialchars($post->user_id);?></p>
        </div>
        <br>
        <?php
        }
        $posts->closeCursor();
        ?>
        <a href="home.php">Revenir sur la Page Principale</a>
    </div>
    </body>
</html>