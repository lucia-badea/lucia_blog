<?php
$this->title = "Home";
?>
<?= $this->session->display('add_Post'); ?>
<?= $this->session->display('update_Post'); ?>
<a href="../public/index.php?route=addPost">Ajouter un Article</a>
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
   