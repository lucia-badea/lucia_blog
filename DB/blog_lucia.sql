-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte: 127.0.0.1:3306
-- Généré le: aug. 04, 2021 la 04:15 PM
-- Version du serveur: 5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_lucia`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titleComment` varchar(255) NOT NULL,
  `contentComment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `titleComment`, `contentComment`, `user_id`, `post_id`, `created_at`, `published`) VALUES
(73, 'Le Projet 2', 'Ce projet n\'était pas très dur. J\'ai appris toutes pleins de choses sur Wordpress', 9, 35, '2021-08-03 21:49:17', 1),
(74, 'Le Projet 1', 'Lorem ipsum dolor sit amet. Et ratione sunt non consequatur porro quo nesciunt nihil eos ipsa reiciendis aut quia iusto qui dolor earum. ', 9, 34, '2021-08-03 21:51:15', 1),
(75, 'Je ne savais pas que le planning c\'est comme ça', 'Qui beatae blanditiis qui labore mollitia ex assumenda minima ut minus quos! Ut dolores omnis in facere reiciendis quo laudantium doloremque eum obcaecati quia et veritatis nemo ut vitae repellendus ex accusamus vero.', 9, 34, '2021-08-03 21:52:25', 1),
(76, 'Le Projet 3', 'Apprendre CSS et HTML c\'était cool !', 19, 31, '2021-08-03 21:57:40', 1),
(77, 'Blog PHP', 'PHP c\'est dur', 9, 9, '2021-08-03 21:59:37', 1),
(78, 'Projet 7', 'Je ne suis pas encore ici !', 9, 4, '2021-08-03 22:02:47', 0),
(79, 'Le projet 4', 'Id consequatur quia quo accusantium quam 33 quia eaque eum quidem alias. Et autem suscipit a internos voluptatum non animi culpa ad galisum aperiam ut dolore ullam et accusantium laudantium.', 19, 32, '2021-08-03 22:04:28', 1),
(80, 'C\'est un commentaire test', 'Quo voluptas quia aut accusamus debitis et molestias temporibus est reprehenderit quam est galisum provident est facere quod et dignissimos nostrum.', 19, 34, '2021-08-03 22:39:45', 1),
(81, 'C\'est un commentaire test', 'Quo voluptas quia aut accusamus debitis et molestias temporibus est reprehenderit quam est galisum provident est facere quod et dignissimos nostrum.', 19, 34, '2021-08-03 22:57:00', 0),
(88, 'cvvcvcvcv', 'cvcvcvcvcv', 19, 35, '2021-08-03 23:36:52', 0),
(89, 'lmlmlmlm', 'lmlmlmlmlm', 19, 35, '2021-08-03 23:37:40', 0),
(90, 'ùùùùfgfgfgfgfg', 'fgfgfgfgfgfg', 19, 34, '2021-08-03 23:38:30', 0),
(91, 'bnbnbnn', 'bnbnbnbnbnbn', 19, 34, '2021-08-03 23:40:22', 1),
(92, 'bnbnbnn', 'bnbnbnbnbnbn', 19, 34, '2021-08-03 23:40:42', 0),
(94, 'Projet -8', 'Je ne suis pas encore sur ce projet !', 19, 3, '2021-08-04 17:45:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlePost` varchar(255) NOT NULL,
  `headerPost` text NOT NULL,
  `contentPost` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `actif` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `titlePost`, `headerPost`, `contentPost`, `updated_at`, `actif`, `user_id`) VALUES
(3, 'PROJET - 8', 'Améliorez une application existante de ToDo & Co', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '2021-06-16 15:26:12', 1, 9),
(4, 'PROJET - 7', '\"Créez un web service exposant une API.\"', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a neque sit amet felis finibus lacinia non sit amet ligula. Morbi nec tellus lacinia, posuere nibh et, sagittis ipsum. Donec egestas ante sem. In at auctor ante. Nulla eleifend est et luctus varius. In porta, est tempor pellentesque hendrerit, ipsum tortor hendrerit justo, ut accumsan arcu lorem vel enim. Maecenas pretium pulvinar orci quis viverra. Suspendisse et nulla vel justo elementum finibus et nec purus. Praesent eget ullamcorper risus.', '2021-07-25 01:16:39', 1, 2),
(5, 'PROJET - 6', 'Développez de A à Z le site communautaire SnowTricks', 'Test Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a neque sit amet felis finibus lacinia non sit amet ligula. Morbi nec tellus lacinia, posuere nibh et, sagittis ipsum. Donec egestas ante sem. In at auctor ante. Nulla eleifend est et luctus varius. In porta, est tempor pellentesque hendrerit, ipsum tortor hendrerit justo, ut accumsan arcu lorem vel enim. Maecenas pretium pulvinar orci quis viverra. Suspendisse et nulla vel justo elementum finibus et nec purus. Praesent eget ullamcorper risus.', '2021-07-25 01:15:42', 1, 9),
(9, 'PROJET - 5', ' Créez votre premier blog en PHP', 'Id consequatur quia quo accusantium quam 33 quia eaque eum quidem alias. Et autem suscipit a internos voluptatum non animi culpa ad galisum aperiam ut dolore ullam et accusantium laudantium. Quo voluptas quia aut accusamus debitis et molestias temporibus est reprehenderit quam est galisum provident est facere quod et dignissimos nostrum. Et consequatur eligendi sit autem quia et internos reprehenderit eos commodi labore ea itaque quae. Est rerum sunt rem doloremque Quis aut doloremque deserunt ad dicta voluptates. Hic harum ducimus id explicabo minima est neque fuga eos vitae enim. Ut Quis dolorum ut veritatis voluptas id nihil neque ut totam perspiciatis At culpa enim et dolor internos.\r\n\r\nEos aspernatur a molestias perspiciatis ut consequuntur modi sit deleniti doloremque in quasi quam est numquam voluptatibus? Id internos reiciendis sed iusto inventore aut facere repellendus. Ab odio earum non sunt beatae eum explicabo iste ut temporibus sunt sit voluptatum delectus. Ut ipsa voluptas non autem consectetur ut sapiente exercitationem in galisum dolores et delectus iusto sed excepturi eaque. Est adipisci necessitatibus et neque optio ut nostrum odit est molestiae nobis est sunt dolorem ut obcaecati beatae est nemo voluptas. Nam laudantium praesentium quo accusantium tempore est delectus quam non corrupti numquam ut pariatur dolor et similique voluptatem aut aspernatur provident. Et delectus nemo non laborum voluptas cum assumenda ipsum. Eos distinctio magni et facere maxime qui voluptate molestias ut voluptatum velit! 33 consequuntur nulla non amet quam non molestiae enim sed quaerat quia sit deserunt deserunt qui molestias maiores est consequuntur autem.', '2021-08-04 17:38:02', 1, 19),
(15, '12345', 'bONJOUR', 'Salut', '2021-07-13 19:05:16', 0, 1),
(25, 'vreau sa incerc', 'qsqs', 'qsqs', '2021-07-15 10:41:28', 0, 1),
(27, 'Azi este joi', 'maine va fi vineri', 'este ziua mea duminica', '2021-07-23 16:49:07', 0, 9),
(28, 'Un article connu bien', 'cvcvcv', 'cvcvcv', '2021-07-23 19:46:22', 0, 9),
(31, 'PROJET - 3', '\"Analysez les besoins de votre client pour son festival de films\"', 'Lorem ipsum dolor sit amet. 33 quia molestias sit tempora libero quo accusamus eius? Sit aliquid consectetur et quaerat blanditiis rem rerum laudantium sed fugit illum non dolor voluptatem At commodi temporibus. Qui corrupti iusto qui fuga ducimus qui iusto sunt et maiores fugiat et unde sequi qui deleniti laboriosam. Sed perspiciatis consequuntur eum minima deleniti At tempore impedit. Sed blanditiis excepturi cum quia reprehenderit eos numquam quia qui dolores rerum est facere sint. Ea similique maxime non aperiam ducimus non assumenda consequatur. Ad reiciendis exercitationem et mollitia quasi id minima aliquam ut tenetur consequuntur sit atque provident sed dolorem Quis quo cumque odio. Aut iusto inventore sit officia voluptatibus eum maiores velit. Est eius impedit aut magni accusamus non consequatur internos qui recusandae asperiores aut minus autem id velit dolor cum deleniti suscipit. Ea optio soluta quo velit molestias est repellat quisquam est nostrum obcaecati est ducimus quia qui impedit assumenda est inventore galisum! Ut ullam accusantium id voluptas aspernatur eum molestiae sint qui molestias dicta!\r\n\r\nUt sequi quod ut esse eius non ullam fuga. Aut voluptas minus eum odio voluptatem ad repellendus optio ut animi dolorum id consectetur nihil. Ut quia aliquid id quia doloremque non facere inventore eos laboriosam sunt aut impedit exercitationem! Hic Quis omnis non enim culpa qui aspernatur sunt sit laudantium quaerat est galisum placeat facere molestiae rem commodi corporis. Id aspernatur cumque in reprehenderit dolore et omnis molestias. Id sequi vero ut ratione nobis sed Quis modi. Qui dolorum repellat eum neque accusamus quo saepe aspernatur aut ullam velit aut impedit quia et omnis dolorem. Sed vero perspiciatis aut sunt ducimus hic fugit alias eum adipisci iusto.\r\n\r\nEt quia natus est nulla pariatur ut aliquid necessitatibus qui repellendus aliquam ut Quis fuga. Ut inventore soluta eos dignissimos autem quo commodi tenetur est officiis sint eos ducimus aliquid qui voluptatem ratione. Eos blanditiis expedita qui porro voluptas qui amet galisum At voluptates dolore ea aperiam quia. Sit recusandae voluptatem et eaque assumenda eos cumque et ipsa quisquam. Ut saepe incidunt et quia maxime eum autem vero aut molestiae consequatur. Eum sunt voluptatem in ipsam doloribus et odit excepturi vel blanditiis laudantium eum quos Quis qui soluta ipsam. Sed harum maiores qui laboriosam voluptatem hic fugiat veritatis et aliquam blanditiis. Eos dolores magnam qui corporis facilis ut dolorem consequatur qui veritatis minima qui praesentium veritatis aut delectus velit non accusamus dolores? Est illum quae et rerum galisum At magni iste ea modi sed cupiditate alias ea aliquam odit sit sint galisum. Non minus voluptate et quasi nostrum qui earum quas. Sit unde obcaecati non debitis maxime qui internos ipsum nam quia excepturi sit consectetur consectetur et commodi similique At nobis atque.', '2021-07-28 00:44:22', 1, 9),
(32, 'PROJET - 4 ', '\"Concevez la solution technique d\'une application de restauration en ligne, ExpressFood\"', 'Lorem ipsum dolor sit amet. Et ratione sunt non consequatur porro quo nesciunt nihil eos ipsa reiciendis aut quia iusto qui dolor earum. Et facere alias ab cupiditate ipsum non autem esse est molestias voluptatibus et minima ducimus. Qui beatae blanditiis qui labore mollitia ex assumenda minima ut minus quos! Ut dolores omnis in facere reiciendis quo laudantium doloremque eum obcaecati quia et veritatis nemo ut vitae repellendus ex accusamus vero. In dicta fugiat ut soluta veniam in eaque quod ut quam incidunt aut iste blanditiis est odio fugit qui tempora consequatur. Ut dolores nisi id possimus magni id distinctio sint et quia internos sit sunt tempore. Eum voluptatibus consequuntur est alias consequatur est nulla optio ea tempora quisquam. Sed rerum soluta qui iste error At consequuntur maxime. Et voluptatem quidem At totam omnis aut galisum molestiae ut repudiandae itaque.\r\n\r\nId consequatur quia quo accusantium quam 33 quia eaque eum quidem alias. Et autem suscipit a internos voluptatum non animi culpa ad galisum aperiam ut dolore ullam et accusantium laudantium. Quo voluptas quia aut accusamus debitis et molestias temporibus est reprehenderit quam est galisum provident est facere quod et dignissimos nostrum. Et consequatur eligendi sit autem quia et internos reprehenderit eos commodi labore ea itaque quae. Est rerum sunt rem doloremque Quis aut doloremque deserunt ad dicta voluptates. Hic harum ducimus id explicabo minima est neque fuga eos vitae enim. Ut Quis dolorum ut veritatis voluptas id nihil neque ut totam perspiciatis At culpa enim et dolor internos.\r\n\r\nEos aspernatur a molestias perspiciatis ut consequuntur modi sit deleniti doloremque in quasi quam est numquam voluptatibus? Id internos reiciendis sed iusto inventore aut facere repellendus. Ab odio earum non sunt beatae eum explicabo iste ut temporibus sunt sit voluptatum delectus. Ut ipsa voluptas non autem consectetur ut sapiente exercitationem in galisum dolores et delectus iusto sed excepturi eaque. Est adipisci necessitatibus et neque optio ut nostrum odit est molestiae nobis est sunt dolorem ut obcaecati beatae est nemo voluptas. Nam laudantium praesentium quo accusantium tempore est delectus quam non corrupti numquam ut pariatur dolor et similique voluptatem aut aspernatur provident. Et delectus nemo non laborum voluptas cum assumenda ipsum. Eos distinctio magni et facere maxime qui voluptate molestias ut voluptatum velit! 33 consequuntur nulla non amet quam non molestiae enim sed quaerat quia sit deserunt deserunt qui molestias maiores est consequuntur autem.', '2021-08-03 19:25:59', 1, 1),
(34, 'PROJET - 1', ' \"Définissez votre stratégie d\'apprentissage\"!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis finibus ipsum. Suspendisse vel tellus quam. Donec sem odio, vulputate id mattis porttitor, tristique eu est. Curabitur non aliquet dolor, vitae volutpat risus. In vel elit id tortor varius finibus ultricies semper tortor. Vivamus vitae arcu luctus, tincidunt nisi ultricies, maximus purus. Aliquam imperdiet at urna id condimentum.\r\n\r\nNulla facilisi. Nam justo massa, egestas in orci ut, aliquam aliquet nibh. In ultricies nunc vel tortor vestibulum mollis eu ac turpis. Etiam mattis elit at sodales aliquet. Vestibulum et rhoncus purus. Sed a enim quis dui semper interdum. Donec eleifend dolor a orci accumsan, in sodales quam rhoncus. Maecenas vitae neque tristique, cursus nibh id, semper lacus. Nullam nec velit magna. Praesent feugiat aliquet justo, at tempus sem vulputate et.\r\n\r\nAenean convallis ac metus et tempus. Nam non mi neque. Aliquam tincidunt tortor at justo consequat rutrum. Donec leo augue, egestas vehicula dui ac, varius commodo urna. Ut eu rutrum leo. Nullam iaculis sed sem sed malesuada. Ut molestie fermentum ligula, nec facilisis nunc ultrices viverra. Nullam nec mi libero. Cras nec est massa.\r\n\r\nPraesent iaculis, ipsum ac vehicula facilisis, lectus nisl volutpat lectus, eu pharetra ex justo sit amet neque. In commodo quis risus vitae auctor. Ut non porttitor nulla. Sed ut suscipit nulla, a aliquam enim. Aliquam id suscipit lorem. Sed diam arcu, facilisis quis interdum eu, egestas ac orci. Nam malesuada nibh vitae est ullamcorper, sollicitudin efficitur massa consectetur. Aenean non rhoncus quam. Nunc eget nulla porttitor, sollicitudin sem ac, ultricies libero.\r\nNullam fermentum, urna in facilisis lobortis, metus lectus ultrices orci, sed tempus nunc erat ac nunc. Morbi finibus tempor pharetra. Nam laoreet metus vitae elit dapibus, condimentum scelerisque magna semper. Phasellus et libero dignissim, scelerisque eros quis, ultrices ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas at libero id nisi tempor luctus eget at dolor. Pellentesque vehicula placerat finibus. Sed eu orci mi. Mauris quis posuere dolor, id laoreet elit.', '2021-08-03 21:01:45', 1, 9),
(35, 'PROJET - 2 ', '\"Intégrez un thème Wordpress pour un client\"', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-08-03 21:13:36', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `description`, `pseudo`) VALUES
(1, 'Administrateur', 'admin'),
(2, 'Membre', 'member');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `userName`, `firstName`, `lastName`, `email`, `password`, `enabled`, `role_id`) VALUES
(1, 'lucia.badea', 'Lucia', 'Badea', 'lucia_badea@gmail.com', 'eusunt', 1, 1),
(2, 'bogdan.humulescu', 'Bogdan', 'Bogdan', 'bogdan@gmail.com', 'eu-bogdan', 1, 2),
(3, 'lucica', 'Lucia', 'Humulescu', 'badealucia88@yahoo.com', '$2y$10$ZFTd71syasPHishpaOgjG.FB.6ED6eBwO951koQJk3QEBJQI1POda', 1, 2),
(4, 'lucian', 'lucian', 'bogdan', 'humulescubogdan@yahoo.com', '$2y$10$qU1/xY5nykDKP1/y/ylMNu4S2UKQcKShW8ELvIigZwjfWnASyyjv.', 1, 2),
(9, 'kiki', 'kiki', 'riki', 'riki@email.com', '$2y$10$2T.6O9wQpaD1fVlWbWh84.ube.szWw1GuSIWeiCnt1npNMJ/ZLUwi', 1, 1),
(10, 'hjhj', 'hjhj', 'hjhj', 'badealucia88@yahoo.com', '$2y$10$zfTkzLh/viNDCB0ufiAEg.JWrphc9MVEhzcOSmfM9ODeFADKoH0Zy', 1, 2),
(12, 'kiki', 'Lucia', 'Humulescu', 'badealucia88@yahoo.com', '$2y$10$2T.6O9wQpaD1fVlWbWh84.ube.szWw1GuSIWeiCnt1npNMJ/ZLUwi', 1, 2),
(14, 'kiki', 'Lucia', 'Humulescu', 'badealucia88@yahoo.com', '$2y$10$2T.6O9wQpaD1fVlWbWh84.ube.szWw1GuSIWeiCnt1npNMJ/ZLUwi', 1, 2),
(15, 'kiki', 'bonjour', 'TANTUC', 'badealucia88@yahoo.com', '$2y$10$2T.6O9wQpaD1fVlWbWh84.ube.szWw1GuSIWeiCnt1npNMJ/ZLUwi', 1, 2),
(17, 'lucian.bogdan', 'SVETLANA', 'TANTUC', 'badealucia88@yahoo.com', '$2y$10$bqOqkCA3nBdzlKElrVwPAes2bXJQvw8NZ0lq0Re5Cw1pUM3KWywJ6', 1, 2),
(19, 'lucia', 'Lucia', 'HUMULESCU-BADEA', 'badealucia88@yahoo.com', '$2y$10$P.cVHCAuc8jQA4uSe.ZWF.yAJfy/OZ1YvpAxpYICSLh1yy9yR7.Lq', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
