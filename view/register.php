<?php $this->title = "Inscription"; ?>
<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="userName">Pseudo</label><br>
        <input type="text" id="userName" name="userName" value="<?= isset($post) ? htmlspecialchars($post->get('userName')): ''; ?>"><br>
        <?= isset($errors['userName']) ? $errors['userName'] : ''; ?>
        <label for="firstName">Nom</label><br>
        <input type="text" id="firstName" name="firstName" value="<?= isset($post) ? htmlspecialchars($post->get('firstName')): ''; ?>"><br>
        <?= isset($errors['firstName']) ? $errors['firstName'] : ''; ?>
        <label for="lastName">Prenom</label><br>
        <input type="text" id="lastName" name="lastName" value="<?= isset($post) ? htmlspecialchars($post->get('lastName')): ''; ?>"><br>
        <?= isset($errors['lastName']) ? $errors['lastName'] : ''; ?>
        <label for="email">E-maill</label><br>
        <input type="email" id="email" name="email"><br>
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Revenir sur la Page Principale</a>
</div>