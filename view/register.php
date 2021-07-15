<?php $this->title = "Inscription"; ?>
<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="userName">Pseudo</label><br>
        <input type="text" id="userName" name="userName"><br>
        <label for="firstName">Nom</label><br>
        <input type="text" id="firstName" name="firstName"><br>
        <label for="lastName">Prenom</label><br>
        <input type="text" id="lastName" name="lastName"><br>
        <label for="email">E-maill</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Revenir sur la Page Principale</a>
</div>