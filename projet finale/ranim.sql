-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 01:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ranim`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `photo`) VALUES
(2, 'PRP', 'fgg', 'sddd'),
(22, 'prp avant /apres', 'la medecin', 'sddd'),
(55, 'info', 'info22', 'zzzzzzz'),
(77, 'steezy la marque', 'AAAAAAAA', 'AAAAAA'),
(1222, 'steezy est la', 'fgg', 'sddd');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_article` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `nom`, `email`, `comments`, `date`, `id_article`) VALUES
(5, 'amine', 'benrejebamine22@gmail.com', 'xx', '2022-03-28 23:00:00', 55),
(12, 'amine', 'benrejebamine22@gmail.com', 'ooooooooo', '2022-04-26 23:00:00', 77),
(14, 'DJJO#8725', 'amine@ESPRIT.tn', 'bonjour', '2022-05-04 23:00:00', 22),
(29, 'Khalil', 'khalilbaccar@gmail.com ', 'merci mr amine pour le travail ', '2022-04-23 15:01:34', 55),
(34, 'Ranim', 'rotaract.lamarsaplage@gmail.com', 'hahahahah c pas nrml ', '2022-04-23 16:56:27', 2),
(43, 'melek', 'MELE@GMAIL.COM', 'ooooooooo', '2022-04-26 08:54:17', 55),
(44, 'Trousers', 'benrejebamine22@gmail.com', 'hello thanks', '2022-04-23 10:11:28', 22),
(55, 'Pull ', 'benrejebamine22@gmail.com', 'bonjour merci pour tout', '2022-05-03 23:00:00', 22),
(111, 'Aziz ', 'Aziz@esprit.tn', 'xxhahahah', '2022-04-23 10:13:49', 55),
(124, 'melek ben rejeb ', 'melek@gmail.com', 'helooo mr amine', '2022-04-23 10:17:37', 22),
(1111, 'wessim', 'wessim@eprit.tn', 'bonsoir , super travail', '2022-04-23 13:22:21', 1222);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_article` (`id_article`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
