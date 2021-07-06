<?php

use App\src\model\PostModel;
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
        <a href="../public/index.php?route=addPost">Nouvel article</a>
        <?php
        //while($post = $posts->fetch())
        foreach ($posts as $post)
        {
        ?>
        <div>
            <h2><?= htmlspecialchars($post->getTitlePost());?></h2>
            <p><?= htmlspecialchars($post->getHeaderPost());?></p>
            <p><?= htmlspecialchars($post->getContentPost());?></p>
            <p>Créé le : <?= htmlspecialchars($post->getUpdated_at());?></p>
            <a href="../public/index.php?route=post&post_id=<?= htmlspecialchars($post->getId()); ?>">Lire la suite</a>
        </div>
        <br>
        <?php
        }
        //$posts->closeCursor();
        ?>
    </div>
    </body>
</html>