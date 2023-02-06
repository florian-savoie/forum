-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 05 fév. 2023 à 18:11
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `pseudo_auteur`, `date_publication`, `titre`, `description`, `image_article`, `id_category`) VALUES
(40, 'florian', '2023-02-05 15:56:45', 'html', 'html', 'data:image/png;base64,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', 1);

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
  `delete_msg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `sender_pseudo`, `receiver_pseudo`, `subject`, `content`, `date`, `is_read`, `delete_msg`) VALUES
(1, 'florian', 'admin', 'fdd', 'fdsf', '2023-02-05 16:26:29', 1, 0),
(2, 'florian', 'florian', 'fddgg', 'gfd', '2023-02-05 16:42:01', 1, 1),
(3, 'florian', 'florian', 'gdfg', 'gfdgdf', '2023-02-05 16:46:06', 1, 1),
(4, 'florian', 'florian', 'coucou florian', 'salur j\'espere que tu vas bien mon ami', '2023-02-05 17:32:23', 1, 1),
(5, 'florian', 'florian', 'fdd', 'gfddd', '2023-02-05 17:50:37', 1, 0),
(6, 'florian', 'admin', 'fddgg', 'gfg', '2023-02-05 18:32:32', 0, 0),
(7, 'florian', 'florian', 'bvcb', 'bvcbcv', '2023-02-05 18:58:53', 1, 0);

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
