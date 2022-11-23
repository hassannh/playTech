-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 nov. 2022 à 09:41
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `playtech`
--

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `quantity` int(50) DEFAULT NULL,
  `Price` varchar(300) NOT NULL,
  `Add_Date` date NOT NULL,
  `Image` varchar(300) NOT NULL,
  `categories` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`Item_ID`, `Name`, `Description`, `quantity`, `Price`, `Add_Date`, `Image`, `categories`) VALUES
(1, 'mannette', 'mannette ps4 ', 10000, '300dh', '2022-11-16', 'r.jpg', 'Control'),
(2, 'mannette', 'mannette ps4 ', 10000, '300dh', '2022-11-16', 'r2.jpg', 'Control'),
(3, 'mannette', 'mannette ps4 ', 213, '400dh', '2022-11-16', 'r3.jpg', 'Control'),
(4, 'mannette', 'mannette ps4 ', 213, '500dh', '2022-11-16', 'r4.jpg', 'Control'),
(5, 'pc', 'pc portable', 231, '44 000 dh', '2022-11-16', 'p.jpg', 'Screen'),
(6, 'pc', 'pc portable', 213, '10000DH', '2022-11-16', 'p2.jpg', 'Screen'),
(7, 'pc', 'pc portable', 213, '45000dh', '2022-11-16', 'p3.jpg', 'Screen'),
(8, 'pc', 'pc portable', 31, '30000dh', '2022-11-16', 'p4.jpg', 'Screen'),
(9, 'Spitgate games', 'games', 42, '30dh', '2022-11-16', 'g.jpg', 'Games'),
(10, 'Grand Theft Auto V', 'games', 421, '40dh', '2022-11-16', 'g2.jpg', 'Games'),
(11, 'Efootball 2023', 'game of football', 12, '50dh', '2022-11-16', 'g3.jpg', 'Games'),
(12, 'Fortnite', 'game', 444, '10dh', '2022-11-16', 'g4.jpg', 'Games'),
(13, 'clavier', 'clavier', 44, '4000dh', '2022-11-16', 'k3.jpg', 'KeyBoards'),
(14, 'mouse', 'mouse', 33, '120dh', '2022-11-16', 'm.jpg', 'Mouses'),
(15, 'keyboard', 'keyboard', 45, '230dh', '2022-11-16', 'k4.jpg', 'KeyBoards'),
(16, 'mouse', 'mouse', 30, '700dh', '2022-11-16', 'm2.jpg', 'Mouses'),
(17, 'mouse', 'mouse', 30, '200dh', '2022-11-16', 'm3.jpg', 'Mouses'),
(18, 'mouse', 'mouse', 20, '10000dh', '2022-11-16', 'm4.jpg', 'Mouses'),
(19, 'keyboard', 'keyboard', 45, '230dh', '2022-11-16', 'k.jpg', 'KeyBoards'),
(20, 'keyboard', 'keyboard', 45, '230dh', '2022-11-16', 'k2.jpg', 'KeyBoards');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(300) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `FullName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `FullName`) VALUES
(1, 'hassan', '12345', 'hassannouhi91@gmail.com', 'hassan nouhi'),
(2, 'marouane', '123', 'uanemaro216@gmail.com', 'marouane'),
(3, 'Youssef', '123', 'youssef@gmail.com', 'Youssef\r\n');

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
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
