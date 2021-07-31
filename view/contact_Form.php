<?php $this->title = "Contacter"; ?>

<div>
    <form method="post" action="../public/index.php?route=contactForm">

        <label for="name">Votre nom</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">E-mail</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="object">Objet</label><br>
        <input type="text" id="object" name="object"><br>
        <label for="message">Message</label><br>
        <textarea id="message" name="message"></textarea><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Revenir sur la Page Principale</a>
</div>