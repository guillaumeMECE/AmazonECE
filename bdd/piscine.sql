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
-- Structure de la table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `id_buyer` int(255) NOT NULL AUTO_INCREMENT,
  `id_card` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_buyer`),
  KEY `id_card` (`id_card`)
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
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `bgpic` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
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
  `prix` float(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `id_music` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `datesortie` date DEFAULT NULL,
  `taille` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(11) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_music`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `id_seller` int(255) NOT NULL AUTO_INCREMENT,
  `bgpic` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sportsloisirs`
--

DROP TABLE IF EXISTS `sportsloisirs`;
CREATE TABLE IF NOT EXISTS `sportsloisirs` (
  `id_sl` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(11) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_sl`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(255) NOT NULL AUTO_INCREMENT,
  `id_produit` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vetements`
--

DROP TABLE IF EXISTS `vetements`;
CREATE TABLE IF NOT EXISTS `vetements` (
  `id_vetement` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  PRIMARY KEY(`id_vetement`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*INSERT ADMIN*/
INSERT INTO `admin` (`id_admin`, `name`, `firstname`, `mail`, `password`, `type`) VALUES (NULL, 'Benzakine', 'Clara', 'clara.benzakine@edu.ece.fr', 'azerty', NULL);
/*INSERT USER*/
INSERT INTO `buyer` (`id_buyer`, `id_card`, `name`, `password`, `picture`, `mail`, `adresse`, `ville`, `cp`, `pays`, `tel`, `type`) VALUES (NULL, NULL, 'Guillaume', 'azerty', '', 'guillaume.maurin@edu.ece.fr', '11 Rue de Gramont', 'Chambourcy', '78240', 'France', '0760577499', 'MasterCard');
/*INSERT MUSIC*/
INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'Suck it and See', 'Arctic Monkeys', '2019-04-03', '45', 'img/am.jpg', NULL, 'Album', '9.98', NULL, 'indie rock', '3', NULL);
INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'Hot Sugar', 'Red Hot Chili Peppers', '2019-04-03', '45', 'img/rhcp.jpg', NULL, 'Album', '8.32', NULL, 'pop rock', '5', NULL);
INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'A Quick One', 'the Who', '2019-04-03', '45', 'img/who.jpg', NULL, 'Album', '4.5', NULL, 'rock', '12', NULL);
INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'Greatest Hit - the Police', 'The Police', '2019-04-03', '45', 'img/tp.jpg', NULL, 'Album', '11.42', NULL, 'rock', '9', NULL);

INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'A Horse With No Name', 'America', '2019-04-03', '45', 'img/america.jpg', NULL, 'Album', '27.12', NULL, 'rock', '8', NULL);

/*INSERT SELLER*/
INSERT INTO `seller` (`id_seller`, `bgpic`, `mail`, `name`, `firstname`,  `password`, `picture`, `type`) VALUES (NULL, '4', 'claire.grouhel@edu.ece.fr', 'Grouhel', 'Claire', 'azerty', '5', NULL);

/*INSERT CARD*/
INSERT INTO `card`(`id_card`, `nomcarte`, `numero`, `datefin`, `crypto`, `type`) VALUES (NULL, 'Guillaume Maurin', '095', '2019-04-18', '666', 'Master Card');

/*INSERT BOOKS*/
INSERT INTO `book` (`id_book`, `title`, `auteur`, `date`, `editeur`, `prix`, `photo`, `video`, `description`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'Le Rouge et le Noir', 'Stendhal', '2019-04-17', 'Larousse', '7.4', 'img/retn.jpg', NULL, '', NULL, 'roman', '1', NULL);
INSERT INTO `book` (`id_book`, `title`, `auteur`, `date`, `editeur`, `prix`, `photo`, `video`, `description`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'Les Misérables', 'Victor Hugo', '2019-04-17', 'Petit furet', '9.87', 'img/miserable.jpg', NULL, '', NULL, 'roman', '1', NULL);

/*INSERT CLOTHING*/
INSERT INTO `vetements` (`id_vetement`, `nom`, `taille`, `couleur`, `sexe`, `marque`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'T-Shirt Champion', 'M', 'Blanc', 'M', 'Champion', 'img/champion.jpg', NULL, '', '21.00', '', '', '7', NULL);
/*INSERT SPORTS*/
INSERT INTO `sportsloisirs` (`id_sl`, `nom`, `marque`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`) VALUES (NULL, 'Pure Drive 2017', 'Babolat', 'img/babolat.jpg', NULL, 'Offrant une combinaison incroyable de vitesse, de puissance et d\'effets, la Pure Drive est l\'une des raquettes les plus populaires et polyvalentes jamais créées !', '169.90', NULL, '', '23', NULL);
