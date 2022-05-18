-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 mai 2022 à 16:34
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vtc`
--

-- --------------------------------------------------------

--
-- Structure de la table `association_vehicule_conducteur`
--

DROP TABLE IF EXISTS `association_vehicule_conducteur`;
CREATE TABLE IF NOT EXISTS `association_vehicule_conducteur` (
  `id_association` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehicule` int(11) NOT NULL,
  `id_conducteur` int(11) NOT NULL,
  PRIMARY KEY (`id_association`),
  UNIQUE KEY `id_vehicule` (`id_vehicule`,`id_conducteur`),
  KEY `id_conducteur` (`id_conducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `association_vehicule_conducteur`
--

INSERT INTO `association_vehicule_conducteur` (`id_association`, `id_vehicule`, `id_conducteur`) VALUES
(1, 501, 1),
(5, 501, 3),
(2, 502, 2),
(3, 503, 3),
(4, 504, 4);

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

DROP TABLE IF EXISTS `conducteur`;
CREATE TABLE IF NOT EXISTS `conducteur` (
  `id_conducteur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_conducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`id_conducteur`, `prenom`, `nom`) VALUES
(1, 'Julien', 'Avigny'),
(2, 'Morgane', 'Alamia'),
(3, 'Philippe', 'Pandre'),
(4, 'Amelie', 'Blondelle'),
(5, 'Alex', 'Richy'),
(6, 'Anthony', 'Fresnel'),
(7, 'Julienne', 'pokemon');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=511 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `marque`, `modele`, `couleur`, `immatriculation`) VALUES
(501, 'Peugeot', '807', 'noir', 'AB-355-CA'),
(502, 'Citroen', 'C8', 'bleu', 'CE-122-AE'),
(503, 'Mercedes', 'C1s', 'vert', 'FG-953-HI'),
(504, 'Volkswagen', 'Touran', 'noir', 'SO-322-NV'),
(505, 'Sloda', 'Octavia', 'gris', 'PB-631-TK'),
(506, 'Volskswagen', 'Passat', 'gris', 'XN-973-MM'),
(507, 'Renault', 'Clio', 'Noir', 'AM-255-MP'),
(508, 'ferrari', 'f50', 'Rouge', 'HY-858-FR'),
(509, 'Porsch', 'carrerra', 'Mauve', 'MF-485-FD'),
(510, 'ducati', 'venom', 'noir', 'hy-854-nj');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association_vehicule_conducteur`
--
ALTER TABLE `association_vehicule_conducteur`
  ADD CONSTRAINT `association_vehicule_conducteur_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `association_vehicule_conducteur_ibfk_2` FOREIGN KEY (`id_conducteur`) REFERENCES `conducteur` (`id_conducteur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
