<?php $this->title = "Inscription"; ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/register.jpg')">
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
                <p>Rejoignez-nous ! Pour vous inscrire remplisez le formulaire !</p>
                <div class="my-5">
                </div>

                <form id="contactForm" method="post" action="../public/index.php?route=register" data-sb-form-api-token="API_TOKEN">
                    <div class="form-floating">
                        <input class="form-control" type="text" placeholder="Entrez vôtre Pseudonime..." id="userName" name="userName" value="<?= isset($post) ? htmlspecialchars($post->get('userName')) : ''; ?>">
                        <label for="userName">Pseudo</label>
                        <?= isset($errors['userName']) ? $errors['userName'] : ''; ?>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="text" placeholder="Entrez vôtre nom..." id="firstName" name="firstName" value="<?= isset($post) ? htmlspecialchars($post->get('firstName')) : ''; ?>">
                        <label for="firstName">Votre nom</label>
                        <?= isset($errors['firstName']) ? $errors['firstName'] : ''; ?>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="text" placeholder="Entrez vôtre prénom..." id="lastName" name="lastName" value="<?= isset($post) ? htmlspecialchars($post->get('lastName')) : ''; ?>">
                        <label for="name">Votre prenom</label>
                        <?= isset($errors['lastName']) ? $errors['lastName'] : ''; ?>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="email" id="email" name="email" placeholder="Adresse email..." value="<?= isset($post) ? htmlspecialchars($post->get('email')) : ''; ?>">
                        <label for="email">E-mail</label>
                        <?= isset($errors['email']) ? $errors['email'] : ''; ?>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe">
                        <label for="password">Mot de passe</label><br>
                        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
                    </div>
                    <input class="btn btn-primary text-uppercase" type="submit" value="Inscription" id="submitButton" name="submit">
                </form>
            </div>
        </div>
        <a href="../public/index.php" class="btn btn-default">Revenir sur la Page Principale</a>
    </div>

</main>