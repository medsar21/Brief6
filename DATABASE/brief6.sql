-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 10:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataware2`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(10) NOT NULL,
  `nom_equipe` char(100) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`, `date_creation`, `id_pro`) VALUES
(1, 'teamdaali', '2023-05-10', 4),
(2, 'nightcrawlers', '2023-07-09', NULL),
(3, 'GODDID', '2023-10-07', 4),
(4, 'nightstalkers', '2023-11-23', NULL),
(5, 'venture', '2023-10-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `id_pro` int(10) NOT NULL,
  `nom_pro` char(100) DEFAULT NULL,
  `descrp_pro` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id_pro`, `nom_pro`, `descrp_pro`) VALUES
(1, 'Travigo travel', 'amelioration d\'un site web de voyage'),
(2, 'Restaurant pizza', 'maquetter et mettre en oeuvre site web de pizza restaurant'),
(3, 'Salle de sport', 'realiser et implementer un site web de salle de sport'),
(4, 'Gamebit', 'concevoir un site d\'une société de gaming'),
(5, 'Datware', 'gerer le personnel de l\'entreprise dataware');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `nom` char(100) DEFAULT NULL,
  `prenom` char(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` char(100) DEFAULT NULL,
  `tel` varchar(55) DEFAULT NULL,
  `statut` char(100) DEFAULT NULL,
  `role` char(100) DEFAULT NULL,
  `equipe` int(10) DEFAULT NULL,
  `projet` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `pass`, `tel`, `statut`, `role`, `equipe`, `projet`) VALUES
(1, 'abounasr', 'soufiane', 'soufiane@gmail.com', 'souf123', '664589784', 'active', 'ProductOwner', NULL, NULL),
(2, 'hiba', 'beghdi', 'hibabegh@gmail.com', 'hiba123', '615878477', 'active', 'membre', NULL, 1),
(3, 'Toto', 'Mouad', 'mouadtoto123@gmail.com', 'Mouad123', '687459165', 'active', 'ScrumMaster', NULL, 4),
(4, 'Houas', 'Chaimae', 'chaimaeh123@gmail.com', 'chaimae123', '684516578', 'active', 'membre', NULL, NULL),
(5, 'mouad', 'mahrouch', 'moad123@gmail.com', 'mahrouch123', '616457899', 'active', 'membre', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipe` (`equipe`),
  ADD KEY `projet` (`projet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `projet` (`id_pro`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`equipe`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`projet`) REFERENCES `projet` (`id_pro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
