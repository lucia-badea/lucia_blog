<?php
$this->title = "Article"; 
?>
<?= $this->session->display('add_Comment'); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?= htmlspecialchars($post->getTitlePost());?></h1>
                            <h2 class="subheading"><?= htmlspecialchars($post->getHeaderPost());?></h2>
                            <span class="meta">
                            <p>Créé par <?= htmlspecialchars($post->getEditor());?> le : <?= htmlspecialchars($post->getUpdated_at());?> </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<?php
    //while($post = $posts->fetch())
    {
?>
      <!-- Post Content-->
      <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">


    <p><?= htmlspecialchars($post->getContentPost());?></p>
    <!--<h4><?//= htmlspecialchars($post->lastName . ' ' . $post->firstName);?></h4>-->
    </div>
                </div>
            </div>
        </article>  


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
           

