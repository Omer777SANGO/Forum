-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 sep. 2021 à 14:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exo_forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(20) NOT NULL,
  `id_question` int(11) NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `id_auteur`, `pseudo_auteur`, `id_question`, `reponse`) VALUES
(1, 2, 'omersango', 1, 'Coucou magnifique'),
(2, 2, 'omersango', 2, 'Voici commentaire'),
(3, 2, 'omersango', 2, 'Voici commentaire'),
(4, 2, 'omersango', 2, 'Appel commentaire'),
(5, 2, 'omersango', 1, 'Coudou'),
(6, 3, 'admin', 2, 'Le garant des commentaires');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(15) NOT NULL,
  `date_publication` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `titre`, `description`, `contenu`, `id_auteur`, `pseudo_auteur`, `date_publication`) VALUES
(1, 'Coucou', 'Coucous<br />\r\nComment ça va', 'Bonjour Germaine,<br />\r\nJe t\'écris pour prendre de tes nouvelles. Soit saluer depuis ta position.<br />\r\n123', 2, 'omersango', '13/09/2021'),
(2, 'Salut', 'Salut la famille<br />\r\nJe suis ravi de vous écrire', 'Je viens par cet écris vous inviter au restaurant ce soir pour un dîner. Soyez présent les gars, ça sera du lourd.', 2, 'omersango', '13/09/2021'),
(3, 'Bonjour', 'Bonjour', 'Bonjour', 2, 'omersango', '13/09/2021'),
(6, 'Question', 'Question de l\'admin', 'Essayer de répondre à cette question fabuleuse.', 3, 'admin', '14/09/2021');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mdp`) VALUES
(1, 'assamisango', 'SANGO', 'Assami', '12345'),
(2, 'omersango', 'SANGO', 'Omer', '$2y$10$FSvEtQ.1GsnpFBauQ1oY5O5HjvuOh5oz6ysP8WrTRqkIEsk4FG8e.'),
(3, 'admin', 'Admin', 'Admin', '$2y$10$NEx0mBh4QzAdM3fI9KDJxenoISI8Sh1RaIBUjH0/yxs5Ja7B7EaKi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
