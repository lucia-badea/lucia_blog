<?php
$this->title = "Article"; 
?>
<?= $this->session->display('add_Comment'); ?>

<?php
    //while($post = $posts->fetch())
    {
?>
<div>
    <h2><?= htmlspecialchars($post->getTitlePost());?></h2>
    <p><?= htmlspecialchars($post->getHeaderPost());?></p>
    <p><?= htmlspecialchars($post->getContentPost());?></p>
    <p>Créé le : <?= htmlspecialchars($post->getUpdated_at());?></p> 
    <p>Par : <?= htmlspecialchars($post->getEditor());?></p>
    <!--<h4><?//= htmlspecialchars($post->lastName . ' ' . $post->firstName);?></h4>-->
    
</div>
<br>

<?php
}
// $posts->closeCursor();
?>
<a href="../public/index.php">Revenir sur la Page Principale</a>
<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}
?>
    <h3>Ajouter un commentaire</h3>
    <?php require('add_Comment.php'); ?>
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
    <p>Commenté par : <?= htmlspecialchars($post->getEditor());?></p>
    <?php
    }

    // $comments->closeCursor();
    ?>
           

