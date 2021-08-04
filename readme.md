Projet 5 OpenClassrooms du Parcours PHP/Symfony - "Créez votre premier blog en PHP"

Les functionnalités principales disponibles :

Le visiteur:
- Visiter la Page d'Accueil, Page Blog, Page Article, ouvrir les liens disponible (CV, les liens GitHub, Twitter et Facebook disponibles dans le pied de page)
- Contacter l'Administrateur du Blog par le formulaire de contact
- Parcourir les commentaires associés à chaque article
- S'inscrire comme utilisateur Membre par le formulaire d'inscription

L'utilisateur Membre:
- Les mêmes fonctionnalités que le visiteur
- Se connecter sur le site s'il est inscrit
- Ajouter des commentaires

L'administrateur:
- Les mêmes fonctionnalités que le visiteur et le Membre
- Ajouter/modifier/supprimer des articles
- Valider/supprimer des commentaires
- Supprimer des utilisateurs Membres

Design:
Pour la mise en forme a été utilisée le thème Bootstrap "Clean Blog" by Start Bootstrap

Installation projet: 
1. Cloner le repositorie avec le lien https://github.com/lucia-badea/lucia_blog.git
2. Créer une base de données avec le fichier blog_lucia.sql qui se trouve dans le dossier DB dans ce projet.
3. Configurer les constantes du fichier src/model/Db.php avec les informations d'accès à vôtre BDD
4. Installer composer > composer install et > composer update
5. Configurer le fichier src/services/Mailer.php avec les informations d'accès à votre email.
6. Votre projet doit être fonctionnel.

Librairies externes:
- PHPMailer;

Ressources: 
1. https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php
2. https://www.udemy.com/course/php-formation-complete-pour-debutants/
3. https://codededev.com/cours
4. https://www.udemy.com/course/formation-complete-du-modele-mvc-en-php-procedural/