<?php 
$this->title = 'Admin'; 
?>

<?= $this->session->display('add_Post'); ?>
<?= $this->session->display('update_Post'); ?>
<?= $this->session->display('delete_Post'); ?>
<?= $this->session->display('delete_Member'); ?>

<h2>Les Articles</h2>
<a href="../public/index.php?route=addPost">Ajouter un Article</a><br><br>
<a href="../public/index.php">Revenir sur la Page Principale</a>

<!-- mettre les articles de la Page Admin dans un tableau -->
<table>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Entête</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    //while($post = $posts->fetch())
    foreach ($posts as $post)
    {
    ?>
    <tr>
        <td><?= htmlspecialchars($post->getId());?></td>
        <td><?= htmlspecialchars($post->getTitlePost());?></td>
        <td><?= /*limiter l'affichage à 50 caracteres*/ substr(htmlspecialchars($post->getHeaderPost()), 0, 50);?></td>
        <td><?= substr(htmlspecialchars($post->getContentPost()), 0, 200);?></td>
        <td>Par : <?= htmlspecialchars($post->getEditor());?></td>
        <td>Créé le : <?= htmlspecialchars($post->getUpdated_at());?></td>
        
        
        <td><a href="../public/index.php?route=post&post_id=<?= htmlspecialchars($post->getId()); ?>">Lire la suite</a></td>
        <td>
            <a href="../public/index.php?route=updatePost&post_id=<?= $post->getId(); ?>">Modifier l'article</a>
            <a href="../public/index.php?route=deletePost&post_id=<?= $post->getId(); ?>">Supprimer l'article</a>
        </td>
    </tr>
    <br>
    <?php
    }
    //$posts->closeCursor();
    ?>
   </table> 

   


<!--<h2>Les Commentaires signalés</h2>-->

<h2>Les Utilisateurs</h2>
<table>
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Email</td>
        <td>Role</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($user as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getId());?></td>
            <td><?= htmlspecialchars($user->getUserName());?></td>
            <td><?= htmlspecialchars($user->getFirstName());?></td>
            <td><?= htmlspecialchars($user->getLastName());?></td>
            <td><?= htmlspecialchars($user->getEmail());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td>
                <?php
                if($user->getRole() != 'admin') {
                ?>
                <a href="../public/index.php?route=deleteMembre&user_id=<?= $user->getId(); ?>">Supprimer l'utilisateur</a>
                <?php }
                else {
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
</table>