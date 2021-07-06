<?php

use App\src\model\PostModel;
use App\src\model\CommentModel;
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
        <?php
        }
       // $posts->closeCursor();
        ?>
        <a href="../public/index.php">Revenir sur la Page Principale</a>
        <div id="comments">
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
    </div>
    </body>
</html>