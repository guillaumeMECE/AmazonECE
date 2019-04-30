-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 avr. 2019 à 17:52
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `id_buyer` int(255) DEFAULT NULL AUTO_INCREMENT,
  `id_card` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_buyer`)
  KEY `id_card` (`id_card`),
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id_card` int(255) NOT NULL AUTO_INCREMENT,
  `nomcarte` varchar(255) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `datefin` date DEFAULT NULL,
  `crypto` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_card`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demandevendeur`
--

DROP TABLE IF EXISTS `demandevendeur`;
CREATE TABLE IF NOT EXISTS `demandevendeur` (
  `id_demvendeur` int(255) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `bgpic` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_demvendeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `prix` float(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_book`)
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `id_music` int(255) DEFAULT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `datesortie` date DEFAULT NULL,
  `taille` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(255) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_musique`)
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `id_seller` int(255) DEFAULT NULL AUTO_INCREMENT,
  `bg_pic` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
 PRIMARY KEY (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sportsloisirs`
--

DROP TABLE IF EXISTS `sportsloisirs`;
CREATE TABLE IF NOT EXISTS `sportsloisirs` (
  `id_sl` int(255) DEFAULT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(255) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_sl`)
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `vetements`
--

DROP TABLE IF EXISTS `vetements`;
CREATE TABLE IF NOT EXISTS `vetements` (
  `id_vetement` int(255) DEFAULT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY(`id_vetement`)
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
