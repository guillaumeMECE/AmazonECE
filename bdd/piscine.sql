-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 mai 2019 à 00:56
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

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
  `photoProfil` varchar(255) DEFAULT NULL,
  `photoBg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `firstname`, `mail`, `password`, `type`, `photoProfil`, `photoBg`) VALUES
(1, 'Benzakine', 'Clara', 'clara.benzakine@edu.ece.fr', 'azerty', NULL, NULL, NULL),
(4, 'maurin', 'marc', 'marc@gmail.com', 'azerty', 'admin', 'img/1556827000maurinmarc.jpg', 'img/1556827000bgmaurinmarc.jpg'),
(12, 'azer', 'ty', 'ty@gmail.com', 'azerty', 'admin', 'img/1556871887azerty.jpg', 'img/1556871887bgazerty.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `editeur` varchar(255) DEFAULT NULL,
  `prix` float NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  `nbPhoto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id_book`, `title`, `auteur`, `date`, `editeur`, `prix`, `photo`, `video`, `description`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`) VALUES
(1, 'Le Rouge et le Noir', 'Stendhal', '2019-04-17', 'Larousse', 7.4, 'img/retn.jpg', NULL, 'Roman', NULL, 'roman', 0, 1, NULL),
(3, 'Assommoire', 'Zola', '2019-05-04', '', 4, 'img/1556789084Assommoire.jpg', NULL, '', NULL, 'Roman', 22, 1, NULL),
(4, 'tstlivre', 'efsfd', '2019-05-30', 'rgfd', 8.31, 'img/1556886199tstlivre.jpg', NULL, 'zegrfds', NULL, 'egfd', 0, 1, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `buyer`
--

INSERT INTO `buyer` (`id_buyer`, `id_card`, `name`, `firstname`, `password`, `picture`, `mail`, `adresse`, `ville`, `cp`, `pays`, `tel`, `type`) VALUES
(1, NULL, 'Guillaume', '', 'azerty', '', 'guillaume.maurin@edu.ece.fr', '11 Rue de Gramont', 'Chambourcy', '78240', 'France', '0760577499', 'MasterCard'),
(2, 2, 'tst', 'tstf', 'azerty', NULL, 'tst@gmail.com', '', '', '', '', '', NULL),
(3, NULL, 'Maurin', 'guillaume', 'azertyuiop', NULL, 'guillaumemaurin.gm@gmail.com', '11 Rue de Gramont', 'Chambourcy', '78240', 'France', '0760577499', 'buyer'),
(4, NULL, 'tst', 'yo', 'wxcvbn', NULL, 'gui@mail.com', '1', '2', '43635', 'Belgique', '0760577499', 'buyer'),
(5, 4, 'hyy', 'hey', 'wxcvbn', NULL, 'hey@yo.com', 'AEDQ', 'sfzef', '12344', 'Portugal', '1433211', 'buyer');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`id_card`, `nomcarte`, `numero`, `datefin`, `crypto`, `type`) VALUES
(1, 'Guillaume Maurin', '1234567890', '2019-05-05', '123', 'MasterCard'),
(2, 'Guillaume Maurin', '1234567890', '2019-05-05', '123', 'MasterCard'),
(3, 'yo', '890', '2019-05-01', '123', 'Visa'),
(4, 'heyyo', '890', '2019-05-01', '567', 'AmericanExpress');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(255) NOT NULL AUTO_INCREMENT,
  `id_produit` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `nombre_cart` int(11) DEFAULT NULL,
  `prix_unit` float DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `type_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produit`, `user_id`, `nombre_cart`, `prix_unit`, `type`, `type_user`) VALUES
(39, 5, 1, 1, 17.12, 'music', 'buyer'),
(36, 3, 1, 1, 4.5, 'music', 'buyer'),
(37, 1, 1, 1, 21, 'cloth', 'buyer'),
(38, 1, 1, 1, 169.9, 'sports', 'buyer'),
(35, 3, 1, 1, 4, 'book', 'buyer');

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
  `type` varchar(255) DEFAULT NULL,
  `photoProfil` varchar(255) DEFAULT NULL,
  `photoBg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_demvendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demandevendeur`
--

INSERT INTO `demandevendeur` (`id_demvendeur`, `mail`, `name`, `firstname`, `password`, `type`, `photoProfil`, `photoBg`) VALUES
(8, 'jean@gmail.com', 'dujardin', 'jean', 'azerty', 'seller', 'img/1556837644dujardinjean.jpg', 'img/1556837644bgdujardinjean.jpg'),
(10, 'ivan@gmail.com', 'vankof', 'ivan', 'azerty', 'seller', 'img/1556837718vankofivan.jpg', 'img/1556837718bgvankofivan.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `id_music` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `datesortie` date DEFAULT NULL,
  `taille` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  `nbPhoto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_music`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `music`
--

INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`) VALUES
(1, 'Tranquility Base Hotel & Casino', 'Arctic Monkeys', '2019-04-03', '45', 'img/am.jpg', NULL, 'Album', 7.29, NULL, 'indie rock', 6, 1, NULL),
(3, 'A Quick One', 'the Who', '2019-04-03', '45', 'img/who.jpg', NULL, 'Album', 4.5, NULL, 'rock', 12, 1, NULL),
(4, 'Greatest Hit - the Police', 'The Police', '2019-04-03', '45', 'img/tp.jpg', NULL, 'Album', 11.42, NULL, 'rock', 9, 2, NULL),
(5, 'A Horse With No Name', 'America', '2019-04-03', '45', 'img/america.jpg', NULL, 'Album - Tom Bug EDIT', 17.12, NULL, 'rock', 7, 1, NULL),
(46, 'tstmusic', 'azedf', '2019-05-10', '45', 'img/1556886105tstmusic.jpg', NULL, 'ef', 7.4, NULL, 'zedfg', 3, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `id_seller` int(255) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `photoProfil` varchar(255) DEFAULT NULL,
  `photoBg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`id_seller`, `mail`, `name`, `firstname`, `password`, `type`, `photoProfil`, `photoBg`) VALUES
(1, 'claire.grouhel@edu.ece.fr', 'grouhel', 'claire', 'azerty', NULL, NULL, NULL),
(3, 'jean@gmail.com', 'dujardin', 'jean', 'azerty', 'buyer', 'img/1556837644dujardinjean.jpg', 'img/1556837644bgdujardinjean.jpg'),
(4, 'ivan@gmail.com', 'vankof', 'ivan', 'azerty', 'buyer', 'img/1556837718vankofivan.jpg', 'img/1556837718bgvankofivan.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sportsloisirs`
--

DROP TABLE IF EXISTS `sportsloisirs`;
CREATE TABLE IF NOT EXISTS `sportsloisirs` (
  `id_sl` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  `nbPhoto` int(11) DEFAULT '1',
  PRIMARY KEY (`id_sl`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sportsloisirs`
--

INSERT INTO `sportsloisirs` (`id_sl`, `nom`, `marque`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`) VALUES
(1, 'Pure Drive 2017', 'Babolat', 'img/babolat.jpg', NULL, 'Offrant une combinaison incroyable de vitesse, de puissance et d effets, la Pure Drive est l une des raquettes les plus populaires et polyvalentes jamais creees !', 169.9, NULL, '', 27, 1, NULL),
(19, 'tstsports', 'azert', 'img/1556885918tstsports.jpg', NULL, 'zefd', 136, NULL, 'azer', 234, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `vetements`
--

DROP TABLE IF EXISTS `vetements`;
CREATE TABLE IF NOT EXISTS `vetements` (
  `id_vetement` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `taille` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `nombre` int(11) NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  `nbPhoto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vetement`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetements`
--

INSERT INTO `vetements` (`id_vetement`, `nom`, `taille`, `couleur`, `sexe`, `marque`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`) VALUES
(1, 'T-Shirt Champion', 'M', 'Blanc', 'M', 'Champion', 'img/champion.jpg', NULL, 'T-shirt Blanc', 21, '', '', 8, 1, NULL),
(6, 'tshirt', 'XS', 'Blanc', 'Homme', 'champ', 'img/1556882096tshirt.jpg', NULL, 'zer', 12, NULL, 'Pull', 5, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
