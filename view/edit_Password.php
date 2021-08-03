<?php
$this->title = 'Modifier le mot de passe';
?>
<header class="masthead" style="background-image: url('assets/img/register.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Modifier le mot de passe !</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                </div>
                <div class="container">
                    <p class="font-weight-bold">Modifier le mot de passe de <?= $this->session->get('userName'); ?></p>

                    <form method="post" action="../public/index.php?route=editPassword">
                        <label for="password">Nouveau mot de passe</label><br>
                        <input type="password" id="password" name="password"><br><br>
                        <input class="btn btn-primary text-uppercase" type="submit" value="Modifier" id="submitButton" name="submit">
                    </form>
                </div>
                <br>
            </div>
            <a href="../public/index.php" class="btn btn-default">Revenir sur la Page Principale</a>
        </div>
</main>