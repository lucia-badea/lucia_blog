<?php
$this->title = "Article"; 
?>

<?php
    //while($post = $posts->fetch())
    {
?>
<div>
    <h2><?= htmlspecialchars($post->getTitlePost());?></h2>
    <p><?= htmlspecialchars($post->getHeaderPost());?></p>
    <p><?= htmlspecialchars($post->getContentPost());?></p>
    <p>Créé le : <?= htmlspecialchars($post->getUpdated_at());?></p>
    <!--<p>Par : <?//= htmlspecialchars($post->lastName . ' ' . $post->firstName);?></p>-->
</div>
<br>
<div>
    <a href="../public/index.php?route=updatePost&post_id=<?= $post->getId(); ?>">Modifier l'article</a>
    <a href="../public/index.php?route=deletePost&post_id=<?= $post->getId(); ?>">Supprimer l'article</a>
</div>
<br>
<?php
}
// $posts->closeCursor();
?>
<a href="../public/index.php">Revenir sur la Page Principale</a>
<div id="comments">
    <h3>Ajouter un commentaire</h3>
    <?php include('add_Comment.php'); ?>
    <h3>Commentaires</h3>
    <?php 
    // while($comment = $comments->fetch())
    foreach($comments as $comment)
    {
    ?>
    <!--<h4><?//= htmlspecialchars($comment->lastName . ' ' . $comment->firstName);?></h4>-->
    <h2><?= htmlspecialchars($comment->getTitleComment());?></h2>
    <p><?= htmlspecialchars($comment->getContentComment());?></p>
    <p>Posté le <?= htmlspecialchars($comment->getCreated_at());?></p>
    <?php
    }
    // $comments->closeCursor();
    ?>
<!--<form action="../public/index.php?route=addComment" method="POST">
    <h3>Vous voulez réagir ? Faites le ici !</h3>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="post_id" value="<?//= $post_id ?>">
    <button>Commenter !</button>
</form>-->
</div>
