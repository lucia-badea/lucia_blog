<?php
$this->title = "Connexion";
 ?>
<?= $this->session->display('error_conection'); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Inscrivez-vous</h1>
                            <span class="subheading">Si vous voulez faire partie de nôtre communauté remplissez le formulaire pour vous inscrire !</span>
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
                        <p>Avez-vous besoin de plus d'informations? Remplissez le formulaire et je vais vous repondre les plus vite possible!</p>
                        <div class="my-5">
                        </div>

    <form id="contactForm" method="post" action="../public/index.php?route=login" data-sb-form-api-token="API_TOKEN">
    <div class="form-floating">
        <input class="form-control" type="text" placeholder="Entrez vôtre Pseudonime..." id="userName" name="userName" value="<?= isset($post) ? htmlspecialchars($post->get('userName')): ''; ?>">
        <label for="userName">Pseudo</label>
    </div>
    <div class="form-floating">
        <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe">
        <label for="password">Mot de passe</label><br>
</div>
        <input class="btn btn-primary text-uppercase"   type="submit" value="Connexion" id="submitButton" name="submit">
    </form>
    </div>
                </div>
            </div>
            <a href="../public/index.php">Revenir sur la Page Principale</a>
        </main>