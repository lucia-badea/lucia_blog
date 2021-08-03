<?php $this->title = "Contacter"; ?>

<?= $this->session->display('contact_Form'); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contactez-nous</h1>
                            <span class="subheading">Vous avez des questions? J'ai les reponses.</span>
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
    <form id="contactForm" method="post" action="../public/index.php?route=contactForm" data-sb-form-api-token="API_TOKEN">
    <div class="form-floating">
        <input class="form-control" type="text" placeholder="Entrez vôtre nom..." id="name" name="name" value="<?= isset($post) ? htmlspecialchars($post->get('name')): ''; ?>">
        <label for="name">Votre nom</label>
        <?= isset($errors['name']) ? $errors['name'] : ''; ?>
    </div>
    <div class="form-floating">
        <input class="form-control" type="email" id="email" name="email" placeholder="Adresse email..." value="<?= isset($post) ? htmlspecialchars($post->get('email')): ''; ?>">
        <label for="email">E-mail</label>
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>
    </div>
    <div class="form-floating">
        <input class="form-control" type="text" id="object" name="object" placeholder="Sujet" value="<?= isset($post) ? htmlspecialchars($post->get('object')): ''; ?>">
        <label for="object">Sujet</label>
        <?= isset($errors['object']) ? $errors['object'] : ''; ?>
</div>
<div class="form-floating">
        <textarea class="form-control" id="message" name="message" placeholder="Entrez vôtre message ici..." style="height: 12rem"><?= isset($post) ? htmlspecialchars($post->get('message')): ''; ?></textarea>
        <label for="message">Message</label><br>
        <?= isset($errors['message']) ? $errors['message'] : ''; ?>
</div>
        <input class="btn btn-primary text-uppercase"   type="submit" value="Envoyer" id="submitButton" name="submit">
    </form>
    </div>
                </div>
            </div>
        </main>
        

