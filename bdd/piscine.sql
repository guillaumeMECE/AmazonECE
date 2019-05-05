-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 21:15
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
  `photoProfil` varchar(255) DEFAULT NULL,
  `photoBg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `firstname`, `mail`, `password`, `type`, `photoProfil`, `photoBg`) VALUES
(1, 'Benzakine', 'Clara', 'clara.benzakine@edu.ece.fr', 'azerty', NULL, 'img/clara.jpg', 'img/clara-fond.jpg\r\n'),
(13, 'Jura', 'Valentine', 'valentine@edu.ece.fr', 'azerty', NULL, 'img/valentine.jpg', 'img/valentine-fond.jpg');

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
  `nbvente` int(11) DEFAULT '0',
  PRIMARY KEY (`id_book`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id_book`, `title`, `auteur`, `date`, `editeur`, `prix`, `photo`, `video`, `description`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`, `nbvente`) VALUES
(1, 'Le Rouge et le Noir', 'Stendhal', '2019-04-17', 'Larousse', 7.4, 'img/retn.jpg', NULL, 'Roman', NULL, 'roman', 0, 1, NULL, 0),
(3, 'Assommoire', 'Zola', '2019-05-04', '', 4, 'img/1556789084Assommoire.jpg', NULL, '', NULL, 'Roman', 20, 1, NULL, 3),
(7, 'Harry Potter 2', 'J.K. Rowling', '1998-08-02', 'Folio Junior', 8.7, 'img/harry-potter.jpg', NULL, 'Une rentree fracassante en voiture volante, une etrange malediction qui s abat sur les eleves, cette deuxieme annee a l ecole des sorciers ne s annonce pas de tout repos !', NULL, 'Roman', 30, 3, 1, 13),
(6, 'Le petit prince', 'Antoine de saint-exupery', '1943-05-01', 'Folio', 6.9, 'img/Le-Petit-Prince.jpg', NULL, 'Le Petit Prince est une oeuvre de langue francaise, la plus connue d Antoine de Saint-Exupery.', NULL, 'Roman', 7, 4, 1, 9),
(8, 'Le Misanthrope', 'Moliere', '1666-01-02', 'Folio', 2, 'img/misanthrope.jpg', NULL, 'Alceste est un melancolique qui s aveugle sur lui-meme pour mieux condamner les autres.', NULL, 'Roman', 4, 1, 1, 1),
(11, 'Tintin au Congo', 'Herge', '1931-09-13', 'Casterman', 11.5, 'img/tintin.jpg', NULL, 'A peine rentre d URSS, Tintin repart pour le Congo.', NULL, 'bd', 15, 5, 1, 6),
(12, 'L\'Odyssee d\'Asterix', 'Albert Uderzo ', '1981-07-11', 'Les Editions Albert Rene', 9.5, 'img/asterix.jpg', NULL, 'Asterix et Obelix, s embarquent pour un long voyage au Moyen-Orient, a la recherche de l huile de roche, ingredient essentiel a la fabrication de la celebre potion magique.', NULL, 'bd', 4, 1, 1, 2),
(10, 'Therese Raquin', 'Emile Zola', '1867-02-13', 'Folio', 3, 'img/emile.jpg', NULL, 'Roman Classique Emile Zola', NULL, 'Roman', 5, 6, 1, 2),
(15, 'Paris est une fete', 'Ernest Hemingway', '1964-05-09', 'Folio', 8.4, 'img/paris.jpg', NULL, 'Au cours de l ete 1957, Hemingway commenca a travailler sur les Vignettes parisiennes, comme il appelait alors Paris est une fete.', NULL, 'Roman', 3, 1, 1, 0),
(14, 'L\'Ecume des jours', 'Boris Vian', '1947-03-08', 'Gallimard', 6.9, 'img/ecume-des-jours.jpg', NULL, 'Un titre leger et lumineux qui annonce une histoire d’amour drole ou grincante, tendre ou grave, fascinante et inoubliable, composee par un ecrivain de vingt-six ans.', NULL, 'Roman', 6, 1, 1, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `buyer`
--

INSERT INTO `buyer` (`id_buyer`, `id_card`, `name`, `firstname`, `password`, `picture`, `mail`, `adresse`, `ville`, `cp`, `pays`, `tel`, `type`) VALUES
(1, NULL, 'Guillaume', '', 'azerty', 'img/guillaume.jpg', 'guillaume.maurin@edu.ece.fr', '11 Rue de Gramont', 'Chambourcy', '78240', 'France', '0760577499', 'MasterCard'),
(6, 5, 'michmich', 'mmm', 'hello', NULL, 'grouhel.claire98@gmail.com', '33', 'nice', '65432', 'Choisir...', '06', 'buyer');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`id_card`, `nomcarte`, `numero`, `datefin`, `crypto`, `type`) VALUES
(1, 'Guillaume Maurin', '1234567890', '2019-05-05', '123', 'MasterCard'),
(2, 'Guillaume Maurin', '1234567890', '2019-05-05', '123', 'MasterCard'),
(3, 'yo', '890', '2019-05-01', '123', 'Visa'),
(4, 'heyyo', '890', '2019-05-01', '567', 'AmericanExpress'),
(5, 'michmich', '12345', '2019-04-03', '000', 'MasterCard');

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
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produit`, `user_id`, `nombre_cart`, `prix_unit`, `type`, `type_user`) VALUES
(47, 3, 1, 19, 4, 'book', 'buyer'),
(46, 1, 1, 5, 7.4, 'book', 'buyer'),
(45, 5, 1, 2, 17.12, 'music', 'buyer'),
(44, 6, 1, 1, 12, 'cloth', 'buyer'),
(48, 4, 1, 2, 11.42, 'music', 'buyer'),
(54, 46, 1, 2, 7.4, 'music', 'buyer'),
(53, 3, 1, 3, 4.5, 'music', 'buyer'),
(55, 7, 1, 1, 8.7, 'book', 'buyer'),
(56, 47, 1, 1, 12.99, 'music', 'buyer');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demandevendeur`
--

INSERT INTO `demandevendeur` (`id_demvendeur`, `mail`, `name`, `firstname`, `password`, `type`, `photoProfil`, `photoBg`) VALUES
(13, 'charlotte@hotmail.fr', 'Paris', 'Charlotte', 'hello', NULL, 'img/charlotte.jpg', 'img/charlotte-fond.jpg'),
(14, 'Romain@gmail.com', 'De la Foret', 'Romain', 'roro', NULL, 'img/Romain.jpg', 'img/Romain-fond.jpg'),
(15, 'christophe@yahoo.com', 'Malle', 'Christophe', 'undeux', NULL, 'img/Christophe.jpg', 'img/Christophe-fond.jpg'),
(17, 'clothilde@wanadoo.fr', 'Rouget', 'Clothilde', 'bonjour', NULL, 'img/Clothilde.jpg', 'img/Clothilde-fond.jpg');

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
  `nbvente` int(11) DEFAULT '0',
  PRIMARY KEY (`id_music`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `music`
--

INSERT INTO `music` (`id_music`, `nom`, `auteur`, `datesortie`, `taille`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`, `nbvente`) VALUES
(1, 'Tranquility Base Hotel ', 'Arctic Monkeys', '2019-04-03', '45', 'img/am.jpg', NULL, 'Album', 7.29, NULL, 'indie rock', 0, 1, NULL, 2),
(3, 'A Quick One', 'the Who', '2019-04-03', '45', 'img/who.jpg', NULL, 'Album', 4.5, NULL, 'rock', 10, 3, NULL, 3),
(4, 'Greatest Hit - the Police', 'The Police', '2019-04-03', '45', 'img/tp.jpg', NULL, 'Album', 11.42, NULL, 'rock', 8, 4, NULL, 1),
(5, 'A Horse With No Name', 'America', '2019-04-03', '45', 'img/america.jpg', NULL, 'Album - Tom Bug EDIT', 17.12, NULL, 'rock', 7, 1, NULL, 2),
(47, 'Brol', 'Angele', '2018-10-05', '45', 'img/angele.jpg', NULL, 'Musique Pop', 12.99, NULL, 'Pop', 7, 5, 1, 9),
(48, '13', 'Indochine', '2017-07-19', '45', 'img/13.jpg', NULL, 'Dernier Album d\'Indochine', 15.95, NULL, 'Rock', 1, 3, 1, 5),
(49, 'Racine Carree', 'Stromae', '2013-05-02', '45', 'img/stromae.jpg', NULL, 'Musique Pop', 14.99, NULL, 'Pop', 19, 6, 1, 8),
(50, 'Mylo Xyloto', 'Coldplay', '2011-05-17', '45', 'img/coldplay.jpg', NULL, 'Groupe Pop Rock', 17.95, NULL, 'Pop Rock', 12, 1, 1, 7),
(51, '25', 'Adele', '2015-10-18', '45', 'img/adele.jpg', NULL, 'Musique Pop', 20.99, NULL, 'Pop', 20, 1, 2, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`id_seller`, `mail`, `name`, `firstname`, `password`, `type`, `photoProfil`, `photoBg`) VALUES
(1, 'claire.grouhel@edu.ece.fr', 'grouhel', 'claire', 'azerty', NULL, 'img/claire.jpg', 'img/claire-fond.jpg\r\n'),
(3, 'jean@gmail.com', 'dujardin', 'jean', 'azerty', 'buyer', 'img/j.jpg', 'img/1556837644bgdujardinjean.jpg'),
(4, 'ivan@gmail.com', 'vankof', 'ivan', 'azerty', 'buyer', 'img/ivan.jpg', 'img/1556837718bgvankofivan.jpg'),
(5, 'lisa@gmail.com', 'France', 'Lisa', 'lisa', 'buyer', 'img/Lisa.jpg', 'img/Lisa-fond.jpg\r\n'),
(6, 'lucie@yahoo.com', 'Montagne', 'Lucie', 'azerty', NULL, 'img/Lucie.jpg', 'img/Lucie-fond.jpg\r\n');

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
  `nbvente` int(11) DEFAULT '0',
  PRIMARY KEY (`id_sl`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sportsloisirs`
--

INSERT INTO `sportsloisirs` (`id_sl`, `nom`, `marque`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`, `nbvente`) VALUES
(1, 'Pure Drive 2017', 'Babolat', 'img/raquette1.jpg', NULL, 'Offrant une combinaison incroyable de vitesse, de puissance et d effets, la Pure Drive est l une des raquettes les plus populaires et polyvalentes jamais creees !', 169.9, NULL, '', 0, 1, NULL, 2),
(24, 'Pointes Classiques', 'Repetto', 'img/danse.jpg', NULL, 'Pointes de danse de qualite', 34.99, NULL, 'Chaussons de danse', 0, 1, 2, 0),
(20, 'Casque Audio', 'Dr Dre', 'img/casque.jpg', NULL, 'Casque Bluetooth Rose\r\nStereo\r\nAgreable et pratique a utiliser', 120, NULL, 'Casque Audio', 30, 3, 1, 7),
(21, 'Kit de Plongee', 'Decathlon', 'img/kit.jpg', NULL, 'Kit de plongee pour debutant ', 18.99, NULL, 'Kit Plongee', 9, 4, 1, 4),
(22, 'Balle de Volley', 'Kipsta', 'img/volley.jpg', NULL, 'Balle de Volley pour les professionnels\r\n\r\n', 18.99, NULL, 'Balle', 10, 5, 1, 5),
(25, 'Halteres 20 kg', 'Decathlon', 'img/haltere.jpg', NULL, 'Lot de 2 halteres de 20 kg\r\nBonne prise en main \r\nAdequates pour les sportifs de haut-niveau', 20, NULL, 'Halteres', 5, 1, 2, 0);

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
  `nbvente` int(11) DEFAULT '0',
  PRIMARY KEY (`id_vetement`),
  KEY `id_seller` (`id_seller`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetements`
--

INSERT INTO `vetements` (`id_vetement`, `nom`, `taille`, `couleur`, `sexe`, `marque`, `photo`, `video`, `description`, `prix`, `categorie`, `genre`, `nombre`, `id_seller`, `nbPhoto`, `nbvente`) VALUES
(1, 'T-Shirt Champion', 'M', 'Blanc', 'Homme', 'Champion', 'img/champion.jpg', NULL, 'T-shirt Blanc', 21, '', '', 8, 1, NULL, 3),
(6, 'T-Shirt Champion ', 'XS', 'Blanc', 'Femme', 'Champion', 'img/1556882096tshirt.jpg', NULL, 'T shirt casual sport Champion', 12, NULL, 'Pull', 0, 3, 2, 5),
(7, 'Casquette NY', 'S', 'Gris', 'Femme', '', 'img/casquette', NULL, 'Casquette street style pour femme', 35.95, NULL, 'Casquette', 60, 1, 2, 3),
(8, 'Manteau ', 'L', 'Bleu', 'Homme', 'Superdry', 'img/manteau.jpg', NULL, 'Manteau mi-saison\r\nSans capuche', 130, NULL, 'Manteau', 12, 5, 1, 3),
(9, 'Robe simple', 'S', 'noir', 'Femme', 'Nafnaf', 'img/robe.jpg', NULL, 'Petite robe noire simple et elegante', 57, NULL, 'Robe', 12, 6, 1, 0),
(10, 'Basket Ville', '40', 'Blanc', 'Femme', 'Converse', 'img/converse.jpg', NULL, 'Basket pratique pour la ville\r\nEn toile, ideal pour l\'ete', 59.99, NULL, 'Basket', 7, 1, 3, 4),
(11, 'Short de Ville', 'L', 'Rouge', 'Homme', 'Zara', 'img/short.jpg', NULL, 'Short coton leger', 44.5, NULL, 'Short', 7, 3, 1, 0),
(12, 'Chemise', 'M', 'Bleu', 'Homme', 'Tommy Hilfiger', 'img/chemise.jpg', NULL, 'Chemise coton parfaite pour l\'ete', 34.99, NULL, 'Chemise', 20, 4, 1, 2),
(13, 'Jean', 'XS', 'Bleu', 'Femme', 'Asos', 'img/jean.jpg', NULL, 'Jean taille basse', 30, NULL, 'Jean', 18, 5, NULL, 0),
(14, 'Sweat Palace', 'M', 'Vert ', 'Homme', 'Palace', 'img/sweat.jpg', NULL, 'Sweat Capuche manches longues', 150, NULL, 'Sweat', 6, 6, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
