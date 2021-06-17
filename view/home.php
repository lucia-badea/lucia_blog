<?php

require '../vendor/autoload.php';

use App\src\manager\PostManager;
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
        <p>C'est ma page principale</p>
        <?php
        $post = new PostManager();
        $posts = $post->getPosts();
        while($post = $posts->fetch())
        {
        ?>
        <div>
            <h2><?= htmlspecialchars($post->titlePost);?></h2>
            <p><?= htmlspecialchars($post->headerPost);?></p>
            <p><?= htmlspecialchars($post->contentPost);?></p>
            <p>Créé le : <?= htmlspecialchars($post->updated_at);?></p>
            <a href="single.php?id=<?= htmlspecialchars($post->id); ?>">Lire la suite</a>
        </div>
        <br>
        <?php
        }
        $posts->closeCursor();
        ?>
    </div>
    </body>
</html>