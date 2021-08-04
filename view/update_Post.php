<?php
$this->title = "Modifier l'article";
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/update-post.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1 class="update">Modifier l'Article</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                </div>
                <div>
                    <form id="contactForm" method="post" action="../public/index.php?route=updatePost&post_id=<?= htmlspecialchars($post->get('id')); ?>">
                        <label for="titlePost">Titre</label><br>
                        <input class="form-control" type="text" id="titlePost" name="titlePost" value="<?= htmlspecialchars($post->get('titlePost')); ?>"><br>
                        <?= isset($errors['titlePost']) ? $errors['titlePost'] : ''; ?>
                        <label for="headerPost">L'êntete</label><br>
                        <textarea class="form-control" id="headerPost" name="headerPost"> <?= htmlspecialchars($post->get('headerPost')); ?></textarea><br>
                        <?= isset($errors['headerPost']) ? $errors['headerPost'] : ''; ?>
                        <label for="contentPost">Contenu</label><br>
                        <textarea class="form-control" id="contentPost" name="contentPost" style="height: 12rem"><?= htmlspecialchars($post->get('contentPost')); ?></textarea><br>
                        <?= isset($errors['contentPost']) ? $errors['contentPost'] : ''; ?>
                        <input class="btn btn-primary text-uppercase" type="submit" value="Modifier l'article" id="submitButton" name="submit"><br><br>
                    </form>
                </div>
            </div>
            <a href="../public/index.php" class="btn btn-default">Revenir sur la Page Principale</a>
</main>