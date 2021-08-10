<?php
$this->title = "Ajouter un article";
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/article.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Ajouter un Article</h1>
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
                <p>Ajoutez un article !</p>
                <div class="my-5">
                </div>

                <form id="contactForm" method="post" action="../public/index.php?route=addPost">
                    <div class="form-floating">
                        <input class="form-control" type="text" placeholder="Entrez le titre..." id="titlePost" name="titlePost">
                        <label for="titlePost">Titre</label>
                        <?= isset($errors['titlePost']) ? $errors['titlePost'] : ''; ?>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="headerPost" name="headerPost" placeholder="Entrez vôtre êntete ici..." style="height: 12rem"></textarea>
                        <label for="headerPost">L'êntete</label>
                        <?= isset($errors['headerPost']) ? $errors['headerPost'] : ''; ?>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="contentPost" name="contentPost" placeholder="Entrez vôtre contenu ici..." style="height: 12rem"></textarea>
                        <label for="contentPost">Contenu</label><br><br>
                        <?= isset($errors['contentPost']) ? $errors['contentPost'] : ''; ?>
                    </div>
                    <input class="btn btn-primary text-uppercase" type="submit" value="Ajouter" id="submitButton" name="submit"><br><br>
                </form>

            </div>
            <a href="../public/index.php" class="btn btn-default">Revenir sur la Page Principale</a>
        </div>
</main>