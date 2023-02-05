-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 05 fév. 2023 à 13:17
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` datetime DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_article` text NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  KEY `pseudo_auteur` (`pseudo_auteur`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `pseudo_auteur`, `date_publication`, `titre`, `description`, `image_article`, `id_category`) VALUES
(39, 'florian', '2023-02-04 12:44:59', 'fdsfsdg', 'fdsfdsfds', 'gfdgfdgsd', 18);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JAVA-SCRIPT'),
(4, 'PHP'),
(5, 'MYSQL'),
(6, 'SQL'),
(7, 'VS-CODE'),
(8, 'BOOTSTRAP'),
(9, 'LINUX');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_pseudo` varchar(255) NOT NULL,
  `receiver_pseudo` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` varchar(255) NOT NULL,
  `pseudo_profil` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL DEFAULT 'bienvenu sur mon profil',
  `nombre_de_clic` int(11) NOT NULL DEFAULT '1',
  `profil_image` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`),
  KEY `pseudo_profil` (`pseudo_profil`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `id_auteur`, `pseudo_profil`, `date_inscription`, `description`, `nombre_de_clic`, `profil_image`) VALUES
(5, '114', 'florian', '2023-02-02 15:32:32', 'bienvenu sur mon profildddd', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS1lLgyjanPJdH0E7sDq83-Q6H1BQWG0E-eA&usqp=CAU'),
(6, '115', 'admin', '2023-02-02 15:32:49', 'bienvenu sur mon profil', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6QtOt1lXuHsUC1fncf7PpGDmooIsuiE2fnvr4mDRMvYxHCAtMMT8va8tY-J13TM_Kw4s&usqp=CAU'),
(7, '116', 'rodolf', '2023-02-02 15:34:03', 'bienvenu sur cxxdsmon profilvdsvds', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEdRWx5r7mGPYHXnS4op0R50QPyCbwFmyAVA&usqp=CAU');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`),
  KEY `pseudo_auteur` (`pseudo_auteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mdp`, `email`) VALUES
(115, 'admin', 'admin', 'admin', '$2y$10$pWf1V0u7C4ukHYIt/ruBReM6FuiR57OaohEGUD8MZuGDYMV12lWAi', 'admin'),
(116, 'rodolf', 'rodolf', 'rodolf', '$2y$10$aM1MxUv3lJ4T16Vk.3VzUOIXFtMGbEptZP9Tc.v2j6QCLAHf0q1fi', 'fdsfds@msn.fr'),
(114, 'florian', 'florian', 'florian', '$2y$10$P6E6f/9L57v0e1nBK/VRJOlx37l.ZO4sQHGj25Xk40oZANZ/sgli6', 'florian');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
