<?php $this->title = "Contacter"; ?>

<?= $this->session->display('contact_Form'); ?>

<div>
    <form method="post" action="../public/index.php?route=contactForm">

        <label for="name">Votre nom</label><br>
        <input type="text" id="name" name="name" value="<?= isset($post) ? htmlspecialchars($post->get('name')): ''; ?>"><br>
        <?= isset($errors['name']) ? $errors['name'] : ''; ?>
        <label for="email">E-mail</label><br>
        <input type="email" id="email" name="email" value="<?= isset($post) ? htmlspecialchars($post->get('email')): ''; ?>"><br>
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>
        <label for="object">Objet</label><br>
        <input type="text" id="object" name="object" value="<?= isset($post) ? htmlspecialchars($post->get('object')): ''; ?>"><br>
        <?= isset($errors['object']) ? $errors['object'] : ''; ?>
        <label for="message">Message</label><br>
        <textarea id="message" name="message"><?= isset($post) ? htmlspecialchars($post->get('message')): ''; ?></textarea><br>
        <?= isset($errors['message']) ? $errors['message'] : ''; ?>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Revenir sur la Page Principale</a>
</div>