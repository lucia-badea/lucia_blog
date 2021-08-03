<?php $this->title = 'Mon compte'; ?>

<?= $this->session->display('edit_Password'); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/login.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Mon Compte</h1>
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
                    <h2><?= $this->session->get('userName'); ?></h2><br><br>
                    <a href="../public/index.php?route=editPassword" class="btn btn-warning">Modifier le mot de passe</a>
                    <a href="../public/index.php?route=deleteCompte" class="btn btn-danger">Supprimer le compte</a>
                </div>
                <br>
            </div>
            <a href="../public/index.php" class="btn btn-default">Revenir sur la Page Principale</a>
        </div>
</main>