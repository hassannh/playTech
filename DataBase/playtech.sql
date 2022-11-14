-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 15 nov. 2022 à 00:50
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `playtech`
--

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` text NOT NULL,
  `Price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`Item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Image`, `Approve`) VALUES
(1, 'USB', 'USB 32Go', '150DH', '2022-06-13', 'Morocco', '', 0),
(2, 'gormette chargeur', 'Chargeur De Téléphone Devient Une Gourmet', '150DH', '2022-06-13', 'Morocco', '', 1),
(3, 'Souri sans fil', 'Souri sans fil 150m', '300dh', '2022-06-13', 'Morocco', '', 0),
(4, 'Adapteur USB', 'Adapteur USB Wifi et Bluetooth', '150DH', '2022-06-13', 'Morocco', '', 1),
(6, 'Microphone', 'Good Microphone', '200DH', '2022-06-13', 'Morocco', '', 1),
(7, 'Playstations', 'Playstations Games ', '44 000', '2022-09-10', 'Morocco', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL COMMENT 'To identify User',
  `Username` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Username To login',
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Password To login',
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `FullName` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `FullName`) VALUES
(1, 'marouane', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'uanemaro216@gmail.com', 'marouane'),
(2, 'Hassan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hassan@gmail.com', 'hassan'),
(3, 'Youssef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Youssef@gmail.com', 'Youssef');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To identify User', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
