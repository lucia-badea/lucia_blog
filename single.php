<?php
require 'Db.php';
require 'Post.php';
require 'Comment.php';
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
        $posts = $post->showPost($_GET['id']);
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
        <div id="comments">
        <h3>Commentaires</h3>
        <?php 
        $comment = new Comment();
        $comments = $comment->findCommentsByPost($_GET['id']);
        while($comment = $comments->fetch())
        {
        ?>
        <h4><?= htmlspecialchars($comment->user_id);?></h4>
                <p><?= htmlspecialchars($comment->content);?></p>
                <p>Posté le <?= htmlspecialchars($comment->created_at);?></p>
                <?php
        }
        $comments->closeCursor();
        ?>
        </div>
    </div>
    </body>
</html>