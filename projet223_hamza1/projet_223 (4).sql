-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 05 mars 2023 à 18:08
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_223`
--

-- --------------------------------------------------------

--
-- Structure de la table `admine`
--

DROP TABLE IF EXISTS `admine`;
CREATE TABLE IF NOT EXISTS `admine` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prénom_admin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email_admin` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pass_admin` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admine`
--

INSERT INTO `admine` (`id_admin`, `nom_admin`, `prénom_admin`, `email_admin`, `pass_admin`) VALUES
(2, 'soulemana', 'rumie', 'rumie@rumie.com', '$2y$10$Z4tgFu/awGW.huSqEuUlVe2goeoKiTlZng4H4OVlQ0wNSq.wkuZmC');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `Id_Etudiant` int(10) NOT NULL AUTO_INCREMENT,
  `Etudiant` varchar(100) NOT NULL,
  `Utilisateur` varchar(100) NOT NULL,
  `Passe` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Etudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`Id_Etudiant`, `Etudiant`, `Utilisateur`, `Passe`) VALUES
(1, 'Janka Neumanova', 'Janka', 'Neumanova'),
(2, 'Hamza', 'Hamza', 'Hamza'),
(3, 'Rumie', 'Rumie', 'Rumie');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(10) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(20) CHARACTER SET utf8 NOT NULL,
  `durée` varchar(20) CHARACTER SET utf8 NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `ticket`, `durée`, `titre`, `description`, `img`) VALUES
(1, 'PHP', '6H', 'Langage de programmation PHP', 'Ameliorer votre niveau en langage de programation PHP pages web dynamiques , programation côté serveur.', 'assets/images/logo/php_logo.png'),
(2, 'CSS', '4H', 'Feuille de style en cascade permet d\'appliquer des styles aux pages web pour leur donner l\'aspact voulu.', '', 'assets/images/logo/logo_css.png'),
(3, 'Javascript', '8H', 'Apportez des fonctionnalités dynamiques aux sites web.', '', 'assets/images/logo/logo_js.png');

-- --------------------------------------------------------

--
-- Structure de la table `formation_info`
--

DROP TABLE IF EXISTS `formation_info`;
CREATE TABLE IF NOT EXISTS `formation_info` (
  `id_formation_info` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `formateur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `durée` int(11) DEFAULT NULL,
  `présentation` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `objectifs` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_formation_info`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation_info`
--

INSERT INTO `formation_info` (`id_formation_info`, `titre`, `formateur`, `durée`, `présentation`, `objectifs`, `img`) VALUES
(1, 'langage PHP', 'hamza Takarrouht', 6, '<ul class=\"list-group list-group-flush\"><li class=\"list-group-item\">PHP est un langage de programmation côté serveur, utilisé pour créer des sites web dynamiques.Il permet de générer des pages web dynamiques, de gérer des formulaires, d\'interagir avec des bases de données, de créer des sessions et bien plus encore.PHP est largement utilisé dans le développement web, en particulier avec le système de gestion de contenu WordPress.Le code PHP est exécuté sur le serveur, avant d\'être envoyé au navigateur de l\'utilisateur, ce qui signifie que le code source n\'est pas visible par les visiteurs du site web.</li></ul>', '<p class=\"card-text\">Dans ce cours nous apprendrons les bases de la programmation en PHP, un langage permettant de réaliser un site web dynamique et de dialoguer avec une base de données. En particulier :</p>\r\n                <ul class=\"list-group list-group-flush\">\r\n                  <li class=\"list-group-item\">Savoir installer un environnement de travail adapté (éditeur de texte, serveur local, affichage des erreurs, etc)</li>\r\n                  <li class=\"list-group-item\">Maîtriser les bases du langage PHP (variables, fonctions, boucles, tableaux, etc)</li>\r\n                  <li class=\"list-group-item\">Savoir transmettre des informations de page en page</li>\r\n                  <li class=\"list-group-item\">Connaître les variables superglobales importantes (sessions, cookies, etc)</li>\r\n                  <li class=\"list-group-item\">Savoir lire et écrire des informations dans une base de données</li>\r\n                </ul>', 'assets/images/discovery/php.jpg'),
(2, 'Formation CSS', 'Janka Neumanova', 4, '\r\nCSS (Cascading Style Sheets) est un langage de feuilles de style utilisé pour décrire la présentation d\'un document écrit en HTML ou XML.\r\nIl est utilisé pour ajouter des styles visuels tels que la couleur, la police, la taille et la disposition des éléments HTML, ainsi que pour créer des mises en page de page web complexes.\r\nCSS utilise des sélecteurs pour cibler des éléments HTML spécifiques et des règles de style pour définir l\'apparence de ces éléments.\r\n', '<p class=\"card-text\">Un langage qui permettra aux étudiants de maîtriser les bases de CSS et de créer des designs de pages web élégants et performants.</p>\r\n<ul class=\"list-group list-group-flush\">\r\n<li class=\"list-group-item\">Comprendre les bases de la programmation JavaScript : Un cours de langage JavaScript devrait aider les apprenants à comprendre les fondamentaux de la programmation JavaScript,y compris les types de données, les variables, les fonctions, les boucles et les structures de contrôle.</li>\r\n<li class=\"list-group-item\">\r\nSavoir utiliser les API et les bibliothèques JavaScript : JavaScript est utilisé pour créer des interactions dynamiques dans les sites web et les applications, ainsi que pour accéder aux API et aux bibliothèques JavaScript existantes. \r\nLes apprenants devraient donc être capables d\'utiliser des API telles que l\'API DOM (Document Object Model) pour manipuler les éléments d\'une page web et des bibliothèques telles que jQuery pour simplifier la création de code.</li>\r\n<li class=\"list-group-item\">\r\nConnaître les concepts avancés de JavaScript : Les apprenants devraient être initiés aux concepts avancés de JavaScript, tels que la programmation orientée objet, les événements, les promises, les closures et les templates.\r\n</li>\r\n<li class=\"list-group-item\">\r\nSavoir comment intégrer JavaScript dans des projets web : Les apprenants devraient comprendre comment intégrer \r\nJavaScript dans des projets web, y compris la façon de lier des fichiers JavaScript externes, de créer des scripts inline et d\'utiliser des gestionnaires de paquets JavaScript tels que NPM. Ils devraient également être initiés aux frameworks et bibliothèques JavaScript tels que React et Angular pour la création de projets plus complexes.</li></ul>', 'assets/images/discovery/css.jpg'),
(3, 'Formation JS', 'soulemana Rumie', 8, 'JavaScript est un langage de programmation populaire utilisé pour créer des pages web interactives et dynamiques.\r\nIl est principalement utilisé en conjonction avec HTML et CSS pour créer des effets visuels, des animations, des interactions avec les utilisateurs, et pour rendre les pages web plus dynamiques.JavaScript est un langage de script côté client, ce qui signifie qu\'il est exécuté dans le navigateur Web de l\'utilisateur plutôt que sur un serveur distant.<br>Les avantages de l\'utilisation de JavaScript sont nombreux. Il permet d\'ajouter une interactivité et une dynamique à une page web, de valider les formulaires, de créer des animations, de charger des données dynamiques à partir de serveurs et de modifier le contenu de la page sans avoir besoin de recharger la page entière.Il est principalement utilisé en conjonction avec HTML et CSS pour créer des effets visuels, des animations, des interactions avec les utilisateurs, et pour rendre les pages web plus dynamiques.JavaScript est un langage de script côté client, ce qui signifie qu\'il est exécuté dans le navigateur Web de l\'utilisateur plutôt que sur un serveur distant.', '<p class=\"card-text\">Un langage qui permettra aux étudiants de maîtriser les bases de CSS et de créer des designs de pages web élégants et performants.</p><ul class=\"list-group list-group-flush\"><li class=\"list-group-item\">Comprendre les bases de la programmation JavaScript : Un cours de langage JavaScript devrait aider les apprenants à comprendre les fondamentaux de la programmation JavaScript, y compris les types de données, les variables, les fonctions, les boucles et les structures de contrôle.</li><li class=\"list-group-item\">Savoir utiliser les API et les bibliothèques JavaScript : JavaScript est utilisé pour créer des interactions dynamiques dans les sites web et les applications, ainsi que pour accéder aux API et aux bibliothèques JavaScript existantes. Les apprenants devraient donc être capables d\'utiliser des API telles que l\'API DOM (Document Object Model) pour manipuler les éléments d\'une page web et des bibliothèques telles que jQuery pour simplifier la création de code. </li><li class=\"list-group-item\">Connaître les concepts avancés de JavaScript : Les apprenants devraient être initiés aux concepts avancés de JavaScript, tels que la programmation orientée objet, les événements, les promises, les closures et les templates.</li><li class=\"list-group-item\">Apprendre à déboguer le code JavaScript : Les apprenants devraient être en mesure de déboguer le code JavaScript à l\'aide d\'outils de développement tels que les outils de débogage intégrés aux navigateurs web et des outils externes tels que Node.js. </li></ul>', 'assets/images/discovery/js.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
