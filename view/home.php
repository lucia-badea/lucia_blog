<?php
$this->title = "Home";
?>
<?= $this->session->display('register'); ?>
<?= $this->session->display('login'); ?>
<?= $this->session->display('logout'); ?>
<?= $this->session->display('delete_Compte'); ?>

   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>L'artiste de vos sites web</h1>
                            <span class="subheading">Mon Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <?php
    //while($post = $posts->fetch())
    foreach ($posts as $post)
    {
    ?>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-preview">
                    <a href="../public/index.php?route=post&post_id=<?= htmlspecialchars($post->getId()); ?>">
                            <h2 class="post-title"><?= htmlspecialchars($post->getTitlePost());?></h2></a>
                            <h3 class="post-subtitle"><?= htmlspecialchars($post->getHeaderPost());?></h3> 
                    
                            <p class="post-meta">
                           Posté par : <?= htmlspecialchars($post->getEditor());?>
                            Créé le : <?= htmlspecialchars($post->getUpdated_at());?>
                            </p>
                            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="../public/index.php?route=post&post_id=<?= htmlspecialchars($post->getId()); ?>">Lire la suite</a></div>
                   
                </div>

                    <!-- Divider-->
                    <hr class="my-4" />
            </div>
    </div>
    </div>
    <?php
    }
    //$posts->closeCursor();
    ?>
   
