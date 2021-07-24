<?php $this->title = 'Mon compte'; ?>

<?= $this->session->display('edit_Password'); ?>

<div>
    <h2><?= $this->session->get('userName'); ?></h2>
    <p><?= $this->session->get('id'); ?></p>
    <a href="../public/index.php?route=editPassword">Modifier le mot de passe</a>
    <a href="../public/index.php?route=deleteCompte">Supprimer le compte</a>
</div>
<br>
<a href="../public/index.php">Revenir sur la Page Principale</a>