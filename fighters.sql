-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 27 Novembre 2018 à 11:28
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `combat`
--

-- --------------------------------------------------------

--
-- Structure de la table `fighters`
--

CREATE TABLE `fighters` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `damage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fighters`
--

INSERT INTO `fighters` (`id`, `pseudo`, `damage`) VALUES
(14, '546', 0),
(15, '546', 0),
(16, '546', 0),
(17, '546', 0),
(18, '546', 0),
(19, '546', 0),
(20, '546', 0),
(21, '546', 0),
(22, '546', 0),
(23, '546', 0),
(24, '546', 0),
(25, '546', 0),
(26, '546', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `fighters`
--
ALTER TABLE `fighters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fighters`
--
ALTER TABLE `fighters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
