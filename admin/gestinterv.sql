-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 20 Décembre 2014 à 13:57
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestinterv`
--

-- --------------------------------------------------------

--
-- Structure de la table `tclients`
--

CREATE TABLE IF NOT EXISTS `tclients` (
`id` int(11) NOT NULL,
  `nom` char(50) CHARACTER SET latin1 NOT NULL,
  `prenom` char(50) CHARACTER SET latin1 NOT NULL,
  `telFixe` char(20) CHARACTER SET latin1 NOT NULL,
  `telPort` char(20) COLLATE latin1_general_ci NOT NULL,
  `adresse` char(50) CHARACTER SET latin1 NOT NULL,
  `mail` text COLLATE latin1_general_ci NOT NULL,
  `magasin` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `rdv` int(11) DEFAULT NULL,
  `pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tfacturation`
--

CREATE TABLE IF NOT EXISTS `tfacturation` (
`id` int(11) NOT NULL,
  `codeIntervention` int(11) NOT NULL,
  `codeClient` int(11) NOT NULL,
  `dateFacturation` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `observations` char(200) COLLATE latin1_general_ci NOT NULL,
  `coutHT` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `coutTTC` varchar(15) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tinterventions`
--

CREATE TABLE IF NOT EXISTS `tinterventions` (
`id` int(11) NOT NULL,
  `codeClient` int(11) NOT NULL,
  `codePreInterv` int(11) NOT NULL,
  `dateInterv` char(10) COLLATE latin1_general_ci DEFAULT NULL,
  `antivirus` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `malwares` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `spybot` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `logiciels` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `maj` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `virus` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `sauvegarde` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `poidsSauvegarde` int(11) NOT NULL,
  `ram` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `intervention` char(50) COLLATE latin1_general_ci NOT NULL,
  `materiel` char(50) COLLATE latin1_general_ci NOT NULL,
  `observations` text COLLATE latin1_general_ci NOT NULL,
  `technicien` char(50) COLLATE latin1_general_ci NOT NULL,
  `prix` char(15) COLLATE latin1_general_ci NOT NULL,
  `coutAnnexe` text COLLATE latin1_general_ci NOT NULL,
  `statut` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tlogiciels`
--

CREATE TABLE IF NOT EXISTS `tlogiciels` (
`id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

CREATE TABLE IF NOT EXISTS `tnews` (
`id` int(11) NOT NULL,
  `news` text CHARACTER SET latin1 NOT NULL,
  `dateNews` char(20) CHARACTER SET latin1 NOT NULL,
  `auteur` char(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tpreinterv`
--

CREATE TABLE IF NOT EXISTS `tpreinterv` (
`id` int(11) NOT NULL,
  `codeClient` int(11) NOT NULL,
  `dateDepot` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `dateRestitution` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `materiel` char(25) CHARACTER SET latin1 DEFAULT NULL,
  `typeInterv` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `observations` text CHARACTER SET latin1,
  `password` char(30) COLLATE latin1_general_ci DEFAULT NULL,
  `dossierMesDocs` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `dossierClt` char(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ttechniciens`
--

CREATE TABLE IF NOT EXISTS `ttechniciens` (
`id` int(11) NOT NULL,
  `nom` char(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ttypeinterv`
--

CREATE TABLE IF NOT EXISTS `ttypeinterv` (
`id` int(11) NOT NULL,
  `nom` char(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ttypemateriel`
--

CREATE TABLE IF NOT EXISTS `ttypemateriel` (
`id` int(11) NOT NULL,
  `nom` char(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tclients`
--
ALTER TABLE `tclients`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tfacturation`
--
ALTER TABLE `tfacturation`
 ADD PRIMARY KEY (`id`), ADD KEY `codeIntervention` (`codeIntervention`), ADD KEY `codeClient` (`codeClient`);

--
-- Index pour la table `tinterventions`
--
ALTER TABLE `tinterventions`
 ADD PRIMARY KEY (`id`), ADD KEY `codeClient` (`codeClient`), ADD KEY `codePreInterv` (`codePreInterv`);

--
-- Index pour la table `tlogiciels`
--
ALTER TABLE `tlogiciels`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tnews`
--
ALTER TABLE `tnews`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tpreinterv`
--
ALTER TABLE `tpreinterv`
 ADD PRIMARY KEY (`id`), ADD KEY `codeClient` (`codeClient`);

--
-- Index pour la table `ttechniciens`
--
ALTER TABLE `ttechniciens`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ttypeinterv`
--
ALTER TABLE `ttypeinterv`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ttypemateriel`
--
ALTER TABLE `ttypemateriel`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tclients`
--
ALTER TABLE `tclients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tfacturation`
--
ALTER TABLE `tfacturation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tinterventions`
--
ALTER TABLE `tinterventions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tlogiciels`
--
ALTER TABLE `tlogiciels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tnews`
--
ALTER TABLE `tnews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tpreinterv`
--
ALTER TABLE `tpreinterv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ttechniciens`
--
ALTER TABLE `ttechniciens`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ttypeinterv`
--
ALTER TABLE `ttypeinterv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ttypemateriel`
--
ALTER TABLE `ttypemateriel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
