-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Mars 2018 à 14:54
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ihm`
--

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE IF NOT EXISTS `prix` (
  `utilisateuridUtilisateur` int(10) DEFAULT NULL,
  `idPrix` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `produitidProd` int(10) DEFAULT NULL,
  PRIMARY KEY (`idPrix`),
  KEY `FKprix975451` (`utilisateuridUtilisateur`),
  KEY `FKprix268111` (`produitidProd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProd` int(10) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prixActuel` double DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `dateAjout` datetime DEFAULT NULL,
  `etat` varchar(255) DEFAULT 'dispo',
  `utilisateuridUtilisateur` int(10) DEFAULT NULL,
  `produitVenduidProdV` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProd`),
  KEY `acheter ou ajouter` (`utilisateuridUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProd`, `nomProduit`, `description`, `prixActuel`, `image`, `dateAjout`, `etat`, `utilisateuridUtilisateur`, `produitVenduidProdV`) VALUES
(1, 'Dell Vostro', 'Core i5 ram 4Go', 0, '11521553899.png', '2018-03-20 14:51:39', 'dispo', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produitvendu`
--

CREATE TABLE IF NOT EXISTS `produitvendu` (
  `idProdV` int(11) NOT NULL AUTO_INCREMENT,
  `produitidProd` int(10) NOT NULL,
  `prixVendu` double DEFAULT NULL,
  `idVendeur` int(11) DEFAULT NULL,
  `idAcheteur` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idProdV`),
  KEY `FKproduitVen288369` (`produitidProd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `dateNaiss` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `prenom`, `adresse`, `tel`, `genre`, `dateNaiss`, `mail`, `mdp`) VALUES
(1, 'andry', 'andry', 'andry', 'andry', 'andry', 'andry', 'randrianaivoandry4@gmail.com', 'aaaa');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `prix`
--
ALTER TABLE `prix`
  ADD CONSTRAINT `FKprix268111` FOREIGN KEY (`produitidProd`) REFERENCES `produit` (`idProd`),
  ADD CONSTRAINT `FKprix975451` FOREIGN KEY (`utilisateuridUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `acheter ou ajouter` FOREIGN KEY (`utilisateuridUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `produitvendu`
--
ALTER TABLE `produitvendu`
  ADD CONSTRAINT `FKproduitVen288369` FOREIGN KEY (`produitidProd`) REFERENCES `produit` (`idProd`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
