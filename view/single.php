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
                            <h1><?= htmlspecialchars($article->getTitlePost());?></h1>
                            <h2 class="subheading"><?= htmlspecialchars($article->getHeaderPost());?></h2>
                            <span class="meta">
                            <p>Créé par <?= htmlspecialchars($article->getEditor());?> Le : <?= htmlspecialchars($article->getUpdated_at());?> </p>
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


    <p><?= htmlspecialchars($article->getContentPost());?></p>
    <!--<h4><?//= htmlspecialchars($post->lastName . ' ' . $post->firstName);?></h4>-->



<?php
}
// $posts->closeCursor();
if (empty($comments))
{
?>
<p class="custom-comment">Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}
?>
    <h3>Ajouter un commentaire</h3>
    <?php require('add_Comment.php'); ?><br>
    <h2>Commentaires</h2>
    <?php 
    // while($comment = $comments->fetch())
    foreach($comments as $comment)
    {
    ?>
    <!-- Divider-->
    <hr class="my-4" />
    <!--<h4><?//= htmlspecialchars($comment->lastName . ' ' . $comment->firstName);?></h4>-->
    <h3><?= htmlspecialchars($comment->getTitleComment());?></h3>
    <p><?= htmlspecialchars($comment->getContentComment());?></p>
    <p class="font-weight-light">Posté le <?= htmlspecialchars($comment->getCreated_at());?></p>
    <p class="font-weight-light">Commenté par : <?= htmlspecialchars($article->getEditor());?></p>
    <?php
    }

    // $comments->closeCursor();
    ?>
        </div>
                </div>
                <a href="../public/index.php" class="btn btn-default">Revenir sur la Page Principale</a>
            </div>
        </article>  
        
           

