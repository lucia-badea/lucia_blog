<?php
$this->title = "Home";
?>
<?= $this->session->display('register'); ?>
<?= $this->session->display('login'); ?>
<?= $this->session->display('logout'); ?>
<?= $this->session->display('delete_Compte'); ?>
<?php
if ($this->session->get('userName')) {
    ?>
    <a href="../public/index.php?route=logout">Déconnectez-vous</a><br><br>
    <a href="../public/index.php?route=compte">Mon compte</a><br><br>
    <?php if($this->session->get('role') === 'admin') { ?>
    <a href="../public/index.php?route=admin">Admin</a>
    <?php } 

} else {
    ?>
    <a href="../public/index.php?route=register">Inscrivez-vous</a><br><br>
    <a href="../public/index.php?route=login">Connectez-vous</a>
    <?php
}
?>
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
        <p>Par : <?= htmlspecialchars($post->getEditor());?></p>
        <a href="../public/index.php?route=post&post_id=<?= htmlspecialchars($post->getId()); ?>">Lire la suite</a>
    </div>
    <br>
    <?php
    }
    //$posts->closeCursor();
    ?>
    </div>
   