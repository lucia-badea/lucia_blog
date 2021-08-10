<?php
$this->title = 'Admin';
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/admin.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Espace Administrateur</h1>
                </div>
            </div>
        </div>
</header>

<div class="container border">

    <div class="btn-group">
        <a href="../public/index.php?route=addPost" class="btn btn-primary active" aria-current="page">Ajouter un Article</a>
        <a href="../public/index.php" class="btn btn-primary">Revenir sur la Page Principale</a>
    </div>
</div>
<div id="session">
    <?= $this->session->display('add_Post'); ?>
    <?= $this->session->display('update_Post'); ?>
    <?= $this->session->display('delete_Post'); ?>
    <?= $this->session->display('delete_Membre'); ?>
    <?= $this->session->display('published_Comment'); ?>
    <?= $this->session->display('delete_Comment'); ?>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Entête</th>
                <th>Contenu</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //while($post = $posts->fetch())
            foreach ($articles as $article) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($article->getId()); ?></td>
                    <td><?= htmlspecialchars($article->getTitlePost()); ?></td>
                    <td><?= /*limiter l'affichage à 50 caracteres*/ substr(htmlspecialchars($article->getHeaderPost()), 0, 50); ?></td>
                    <td><?= substr(htmlspecialchars($article->getContentPost()), 0, 200); ?></td>
                    <td>Par : <?= htmlspecialchars($article->getEditor()); ?></td>
                    <td>Créé le : <?= htmlspecialchars($article->getUpdated_at()); ?></td>

                    <td><a href="../public/index.php?route=article&post_id=<?= $article->getId(); ?>" class="btn btn-secondary">Lire la suite</a>
                        <a href="../public/index.php?route=updatePost&post_id=<?= $article->getId(); ?>" class="btn btn-warning">Modifier</a>
                        <a href="../public/index.php?route=deletePost&post_id=<?= $article->getId(); ?>" class="btn btn-danger">Supprimer</a>
                    </td>

                </tr>
        </tbody>
        <br>
    <?php
            }
            //$posts->closeCursor();
    ?>
    </table>
</div><br><br>
<div class="table-responsive">
    <h2>Les Commentaires en attente de validation</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Le titre</th>
                <th>Le contenu</th>
                <th>Date de création</th>
                <th>L'auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($comments as $comment) {
            ?>
                <tr>
                    <!--<h4><? //= htmlspecialchars($comment->lastName . ' ' . $comment->firstName);
                            ?></h4>-->
                    <td><?= htmlspecialchars($comment->getTitleComment()); ?></td>
                    <td><?= substr(htmlspecialchars($comment->getContentComment()), 0, 100); ?></td>
                    <td>Posté le <?= htmlspecialchars($comment->getCreated_at()); ?></td>
                    <td><?= htmlspecialchars($comment->getAuthorComment()); ?></td>
                    <td>
                        <a href="../public/index.php?route=isApprovedComment&comment_id=<?= $comment->getId(); ?>" class="btn btn-success">Valider</a>
                        <a href="../public/index.php?route=deleteComment&comment_id=<?= $comment->getId(); ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
        </tbody>
    <?php
            }
            // $comments->closeCursor();
    ?>
    </table>
</div><br><br>
<div class="table-responsive">
    <h2>Les Utilisateurs</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($user as $user) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($user->getId()); ?></td>
                    <td><?= htmlspecialchars($user->getUserName()); ?></td>
                    <td><?= htmlspecialchars($user->getFirstName()); ?></td>
                    <td><?= htmlspecialchars($user->getLastName()); ?></td>
                    <td><?= htmlspecialchars($user->getEmail()); ?></td>
                    <td><?= htmlspecialchars($user->getRole()); ?></td>
                    <td>
                        <?php
                        if ($user->getRole() != 'admin') {
                        ?>
                            <a href="../public/index.php?route=deleteMembre&user_id=<?= $user->getId(); ?>" class="btn btn-danger">Supprimer l'utilisateur</a>
                        <?php } else {
                        ?>
                            Suppresion impossible
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>