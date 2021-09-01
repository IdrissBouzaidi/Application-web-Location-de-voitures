-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 01 sep. 2021 à 16:59
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `applicationweblocationdevoitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `imagesvoitures`
--

CREATE TABLE `imagesvoitures` (
  `Num` int(50) NOT NULL,
  `id` int(50) NOT NULL,
  `CheminImage` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imagesvoitures`
--

INSERT INTO `imagesvoitures` (`Num`, `id`, `CheminImage`) VALUES
(1, 1, 'Images/Voitures/1.png'),
(13, 5, 'Images/Voitures/13.png'),
(12, 4, 'Images/Voitures/12.png'),
(11, 4, 'Images/Voitures/11.png'),
(10, 4, 'Images/Voitures/10.png'),
(9, 3, 'Images/Voitures/9.png'),
(8, 3, 'Images/Voitures/8.png'),
(7, 3, 'Images/Voitures/7.png'),
(6, 2, 'Images/Voitures/6.png'),
(5, 2, 'Images/Voitures/5.png'),
(4, 2, 'Images/Voitures/4.png'),
(3, 1, 'Images/Voitures/3.png'),
(2, 1, 'Images/Voitures/2.png'),
(14, 5, 'Images/Voitures/14.png'),
(15, 5, 'Images/Voitures/15.png'),
(16, 6, 'Images/Voitures/16.png'),
(17, 6, 'Images/Voitures/17.png'),
(18, 6, 'Images/Voitures/18.png'),
(19, 7, 'Images/Voitures/19.png'),
(20, 7, 'Images/Voitures/20.png'),
(21, 7, 'Images/Voitures/21.png'),
(22, 8, 'Images/Voitures/22.png'),
(23, 8, 'Images/Voitures/23.png'),
(24, 8, 'Images/Voitures/24.png'),
(25, 9, 'Images/Voitures/25.png'),
(26, 9, 'Images/Voitures/26.png'),
(27, 9, 'Images/Voitures/27.png'),
(28, 10, 'Images/Voitures/28.png'),
(29, 10, 'Images/Voitures/29.png'),
(30, 10, 'Images/Voitures/30.png'),
(31, 11, 'Images/Voitures/31.png'),
(32, 11, 'Images/Voitures/32.png'),
(33, 11, 'Images/Voitures/33.png'),
(34, 12, 'Images/Voitures/34.png'),
(35, 12, 'Images/Voitures/35.png'),
(36, 12, 'Images/Voitures/36.png'),
(37, 13, 'Images/Voitures/37.png'),
(38, 13, 'Images/Voitures/38.png'),
(39, 13, 'Images/Voitures/39.png'),
(40, 14, 'Images/Voitures/40.png'),
(41, 14, 'Images/Voitures/41.png'),
(42, 14, 'Images/Voitures/42.png'),
(43, 15, 'Images/Voitures/43.png'),
(44, 15, 'Images/Voitures/44.png'),
(45, 15, 'Images/Voitures/45.png'),
(46, 16, 'Images/Voitures/46.png'),
(47, 16, 'Images/Voitures/47.png'),
(48, 16, 'Images/Voitures/48.png'),
(49, 17, 'Images/Voitures/49.png'),
(50, 17, 'Images/Voitures/50.png'),
(51, 17, 'Images/Voitures/51.png'),
(52, 18, 'Images/Voitures/52.png'),
(53, 18, 'Images/Voitures/53.png'),
(54, 18, 'Images/Voitures/54.png'),
(55, 19, 'Images/Voitures/55.png'),
(56, 19, 'Images/Voitures/56.png'),
(57, 19, 'Images/Voitures/57.png'),
(58, 20, 'Images/Voitures/58.png'),
(59, 20, 'Images/Voitures/59.png'),
(60, 20, 'Images/Voitures/60.png'),
(61, 21, 'Images/Voitures/61.png'),
(62, 21, 'Images/Voitures/62.png'),
(63, 21, 'Images/Voitures/63.png'),
(64, 22, 'Images/Voitures/64.png'),
(65, 22, 'Images/Voitures/65.png'),
(66, 22, 'Images/Voitures/66.png'),
(67, 23, 'Images/Voitures/67.png'),
(68, 23, 'Images/Voitures/68.png'),
(69, 23, 'Images/Voitures/69.png'),
(70, 24, 'Images/Voitures/70.png'),
(71, 24, 'Images/Voitures/71.png'),
(72, 24, 'Images/Voitures/72.png'),
(73, 25, 'Images/Voitures/73.png'),
(74, 25, 'Images/Voitures/74.png'),
(75, 25, 'Images/Voitures/75.png'),
(76, 26, 'Images/Voitures/76.png'),
(77, 26, 'Images/Voitures/77.png'),
(78, 26, 'Images/Voitures/78.png'),
(79, 27, 'Images/Voitures/79.png'),
(80, 27, 'Images/Voitures/80.png'),
(81, 27, 'Images/Voitures/81.png'),
(82, 28, 'Images/Voitures/82.png'),
(83, 28, 'Images/Voitures/83.png'),
(84, 28, 'Images/Voitures/84.png'),
(85, 29, 'Images/Voitures/85.png'),
(86, 29, 'Images/Voitures/86.png'),
(87, 29, 'Images/Voitures/87.png'),
(88, 30, 'Images/Voitures/88.png'),
(89, 30, 'Images/Voitures/89.png'),
(90, 30, 'Images/Voitures/90.png'),
(91, 31, 'Images/Voitures/91.png'),
(92, 31, 'Images/Voitures/92.png'),
(93, 31, 'Images/Voitures/93.png'),
(94, 32, 'Images/Voitures/94.png'),
(95, 32, 'Images/Voitures/95.png'),
(96, 32, 'Images/Voitures/96.png'),
(97, 33, 'Images/Voitures/97.png'),
(98, 33, 'Images/Voitures/98.png'),
(99, 33, 'Images/Voitures/99.png'),
(100, 34, 'Images/Voitures/100.png'),
(101, 34, 'Images/Voitures/101.png'),
(102, 34, 'Images/Voitures/102.png'),
(103, 35, 'Images/Voitures/103.png'),
(104, 35, 'Images/Voitures/104.png'),
(105, 35, 'Images/Voitures/105.png'),
(106, 36, 'Images/Voitures/106.png'),
(107, 36, 'Images/Voitures/107.png'),
(108, 36, 'Images/Voitures/108.png'),
(109, 37, 'Images/Voitures/109.png'),
(110, 37, 'Images/Voitures/110.png'),
(111, 37, 'Images/Voitures/111.png'),
(112, 38, 'Images/Voitures/112.png'),
(113, 38, 'Images/Voitures/113.png'),
(114, 38, 'Images/Voitures/114.png'),
(115, 39, 'Images/Voitures/115.png'),
(116, 39, 'Images/Voitures/116.png'),
(117, 39, 'Images/Voitures/117.png'),
(118, 40, 'Images/Voitures/118.png'),
(119, 40, 'Images/Voitures/119.png'),
(120, 40, 'Images/Voitures/120.png'),
(121, 41, 'Images/Voitures/121.png'),
(122, 41, 'Images/Voitures/122.png'),
(123, 41, 'Images/Voitures/123.png'),
(124, 42, 'Images/Voitures/124.png'),
(125, 42, 'Images/Voitures/125.png'),
(126, 42, 'Images/Voitures/126.png'),
(127, 43, 'Images/Voitures/127.png'),
(128, 43, 'Images/Voitures/128.png'),
(129, 43, 'Images/Voitures/129.png'),
(130, 44, 'Images/Voitures/130.png'),
(131, 44, 'Images/Voitures/131.png'),
(132, 44, 'Images/Voitures/132.png'),
(133, 45, 'Images/Voitures/133.png'),
(134, 45, 'Images/Voitures/134.png'),
(135, 45, 'Images/Voitures/135.png'),
(136, 46, 'Images/Voitures/136.png'),
(137, 46, 'Images/Voitures/137.png'),
(138, 46, 'Images/Voitures/138.png'),
(139, 47, 'Images/Voitures/139.png'),
(140, 47, 'Images/Voitures/140.png'),
(141, 47, 'Images/Voitures/141.png'),
(142, 48, 'Images/Voitures/142.png'),
(143, 48, 'Images/Voitures/143.png'),
(144, 48, 'Images/Voitures/144.png'),
(145, 49, 'Images/Voitures/145.png'),
(146, 49, 'Images/Voitures/146.png'),
(147, 49, 'Images/Voitures/147.png'),
(148, 50, 'Images/Voitures/148.png'),
(149, 50, 'Images/Voitures/149.png'),
(150, 50, 'Images/Voitures/150.png'),
(151, 51, 'Images/Voitures/151.png'),
(152, 51, 'Images/Voitures/152.png'),
(153, 51, 'Images/Voitures/153.png'),
(154, 52, 'Images/Voitures/154.png'),
(155, 52, 'Images/Voitures/155.png'),
(156, 52, 'Images/Voitures/156.png'),
(157, 53, 'Images/Voitures/157.png'),
(158, 53, 'Images/Voitures/158.png'),
(159, 53, 'Images/Voitures/159.png'),
(160, 54, 'Images/Voitures/160.png'),
(161, 54, 'Images/Voitures/161.png'),
(162, 54, 'Images/Voitures/162.png'),
(163, 55, 'Images/Voitures/163.png'),
(164, 55, 'Images/Voitures/164.png'),
(165, 55, 'Images/Voitures/165.png'),
(166, 56, 'Images/Voitures/166.png'),
(167, 56, 'Images/Voitures/167.png'),
(168, 56, 'Images/Voitures/168.png'),
(169, 57, 'Images/Voitures/169.png'),
(170, 57, 'Images/Voitures/170.png'),
(171, 57, 'Images/Voitures/171.png'),
(172, 58, 'Images/Voitures/172.png'),
(173, 58, 'Images/Voitures/173.png'),
(174, 58, 'Images/Voitures/174.png'),
(175, 59, 'Images/Voitures/175.png'),
(176, 59, 'Images/Voitures/176.png'),
(177, 59, 'Images/Voitures/177.png'),
(178, 60, 'Images/Voitures/178.png'),
(179, 60, 'Images/Voitures/179.png'),
(180, 60, 'Images/Voitures/180.png'),
(181, 61, 'Images/Voitures/181.png'),
(182, 61, 'Images/Voitures/182.png'),
(183, 61, 'Images/Voitures/183.png'),
(184, 62, 'Images/Voitures/184.png'),
(185, 62, 'Images/Voitures/185.png'),
(186, 62, 'Images/Voitures/186.png'),
(187, 63, 'Images/Voitures/187.png'),
(188, 63, 'Images/Voitures/188.png'),
(189, 63, 'Images/Voitures/189.png'),
(190, 64, 'Images/Voitures/190.png'),
(191, 64, 'Images/Voitures/191.png'),
(192, 64, 'Images/Voitures/192.png'),
(193, 65, 'Images/Voitures/193.png'),
(194, 65, 'Images/Voitures/194.png'),
(195, 65, 'Images/Voitures/195.png'),
(196, 66, 'Images/Voitures/196.png'),
(197, 66, 'Images/Voitures/197.png'),
(198, 66, 'Images/Voitures/198.png'),
(199, 67, 'Images/Voitures/199.png'),
(200, 67, 'Images/Voitures/200.png'),
(201, 67, 'Images/Voitures/201.png'),
(202, 68, 'Images/Voitures/202.png'),
(203, 68, 'Images/Voitures/203.png'),
(204, 68, 'Images/Voitures/204.png'),
(205, 69, 'Images/Voitures/205.png'),
(206, 69, 'Images/Voitures/206.png'),
(207, 69, 'Images/Voitures/207.png');

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AdresseUtilisateur` varchar(100) NOT NULL,
  `Marque` varchar(50) NOT NULL,
  `Modele` varchar(50) NOT NULL,
  `DateDebutDisponible` date DEFAULT NULL,
  `DateFinDisponible` date DEFAULT NULL,
  `Pays` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Prix` int(5) NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `NombreVisites` int(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `AdresseUtilisateur`, `Marque`, `Modele`, `DateDebutDisponible`, `DateFinDisponible`, `Pays`, `Ville`, `Prix`, `Description`, `NombreVisites`) VALUES
(1, 'idriss.monkey.d@gmail.com', 'BMW', 'X1', NULL, '2021-08-13', 'Morocco', 'Casablanca', 300, 'Bonjour à vous, je vous propose ma voiture, qui est BMW X1, et je vous propose aussi un bon prix qui est 300DH/jour, j\'en suis sûr que vous ne pouvez pas trouver un prix convenable que celui là. Et donc qu\'est ce que vous attendez, vous pouvez m\'appeler dès maintenant.', 19),
(2, 'idriss.monkey.d@gmail.com', 'BMW', 'M5', '2021-09-05', NULL, 'Morocco', 'Casablanca', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 6),
(3, 'anass.bouzaidi@hotmail.com', 'BMW', 'M5', NULL, NULL, 'Morocco', 'Fés', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(4, 'Alfie.Allen@gmail.com', 'BMW', 'Série 1', NULL, NULL, 'Morocco', 'Tanger', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 5),
(5, 'Aidan.Gillen@gmail.com', 'BMW', 'Série 1', NULL, NULL, 'Morocco', 'Marrakech', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(6, 'kamal.arif@gmail.com', 'BMW', 'Série 2 Active Tourer', NULL, NULL, 'Morocco', 'Salé', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(7, 'Esme.Bianco@gmail.com', 'BMW', 'Série 2 Active Tourer', NULL, NULL, 'Morocco', 'Meknès', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(8, 'Isaac.Hempstead-Wright@gmail.com', 'BMW', 'Série 2 Cabriolet', NULL, NULL, 'Morocco', 'Rabat', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(9, 'Jack.Gleeson@gmail.com', 'BMW', 'Série 2 Cabriolet', NULL, NULL, 'Morocco', 'Oujda', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(10, 'Jason.Momoa@gmail.com', 'BMW', 'Série 2 Coupé', NULL, NULL, 'Morocco', 'Kénitra', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(11, 'Joel.Fry@gmail.com', 'BMW', 'Série 2 Coupé', NULL, NULL, 'Morocco', 'Agadir', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(12, 'Kit.Harington@gmail.com', 'BMW', 'Série 2 Gran Coupé', NULL, NULL, 'Morocco', 'Tétouan', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(13, 'Maisie.Williams@mail.com', 'BMW', 'Série 2 Gran Coupé', NULL, NULL, 'Morocco', 'Témara', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(14, 'Michiel.Huisman@gmail.com', 'BMW', 'Série 2 Gran Tourer', NULL, NULL, 'Morocco', 'Casablanca', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(15, 'Nikolaj.Coster-Waldau@gmail.com', 'BMW', 'Série 2 Gran Tourer', NULL, NULL, 'Morocco', 'Fés', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(16, 'Nonso.Anozie@gmail.com', 'BMW', 'Série 3 Berline', NULL, NULL, 'Morocco', 'Tanger', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(17, 'Pedro.Pascal@gmail.com', 'BMW', 'Série 3 Berline', NULL, NULL, 'Morocco', 'Marrakech', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(18, 'Peter.Dinklage@gmail.com', 'BMW', 'Série 3 Gran Turismo', NULL, NULL, 'Morocco', 'Salé', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(19, 'Richard.Madden@gmail.com', 'BMW', 'Série 3 Gran Turismo', NULL, NULL, 'Morocco', 'Meknès', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(20, 'Sean.Bean@gmail.Com', 'BMW', 'Série 3 Touring', NULL, NULL, 'Morocco', 'Rabat', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(21, 'Sophie.Turner@gmail.com', 'BMW', 'Série 3 Touring', NULL, NULL, 'Morocco', 'Oujda', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(22, 'Thomas.Brodie-Sangster@gmail.com', 'BMW', 'Série 4', NULL, NULL, 'Morocco', 'Kénitra', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(23, 'idriss.monkey.d@gmail.com', 'BMW', 'Série 4', '2021-09-16', '2022-12-01', 'Morocco', 'Agadir', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 5),
(24, 'anass.bouzaidi@hotmail.com', 'BMW', 'Série 4 Cabriolet', NULL, NULL, 'Morocco', 'Tétouan', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(25, 'Alfie.Allen@gmail.com', 'BMW', 'Série 4 Cabriolet', NULL, NULL, 'Morocco', 'Témara', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(26, 'Aidan.Gillen@gmail.com', 'BMW', 'Série 4 Gran Coupé', NULL, NULL, 'Morocco', 'Safi', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 2),
(27, 'kamal.arif@gmail.com', 'BMW', 'Série 4 Gran Coupé', NULL, NULL, 'Morocco', 'Mohammédia', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(28, 'Esme.Bianco@gmail.com', 'BMW', 'Série 5', NULL, NULL, 'Morocco', 'Khouribga', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(29, 'Isaac.Hempstead-Wright@gmail.com', 'BMW', 'Série 5', NULL, NULL, 'Morocco', 'El Jadida', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(30, 'Jack.Gleeson@gmail.com', 'BMW', 'Série 5 Gran Turismo', NULL, NULL, 'Morocco', 'Casablanca', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(31, 'Jason.Momoa@gmail.com', 'BMW', 'Série 5 Gran Turismo', NULL, NULL, 'Morocco', 'Fés', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(32, 'Joel.Fry@gmail.com', 'BMW', 'Série 5 Touring', NULL, NULL, 'Morocco', 'Tanger', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(33, 'Kit.Harington@gmail.com', 'BMW', 'Série 5 Touring', NULL, NULL, 'Morocco', 'Marrakech', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(34, 'Maisie.Williams@mail.com', 'BMW', 'Série 6 Coupé', NULL, NULL, 'Morocco', 'Salé', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(35, 'Michiel.Huisman@gmail.com', 'BMW', 'Série 6 Coupé', NULL, NULL, 'Morocco', 'Meknès', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(36, 'Nikolaj.Coster-Waldau@gmail.com', 'BMW', 'Série 6 Gran Turismo', NULL, NULL, 'Morocco', 'Rabat', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(37, 'Nonso.Anozie@gmail.com', 'BMW', 'Série 6 Gran Turismo', NULL, NULL, 'Morocco', 'Oujda', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(38, 'Pedro.Pascal@gmail.com', 'BMW', 'Série 7 Berline', NULL, NULL, 'Morocco', 'Kénitra', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(39, 'Peter.Dinklage@gmail.com', 'BMW', 'Série 7 Berline', NULL, NULL, 'Morocco', 'Agadir', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(40, 'Richard.Madden@gmail.com', 'BMW', 'Série 7 Limousine', NULL, NULL, 'Morocco', 'Tétouan', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(41, 'Sean.Bean@gmail.Com', 'BMW', 'Série 7 Limousine', NULL, NULL, 'Morocco', 'Témara', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(42, 'Sophie.Turner@gmail.com', 'BMW', 'Série 8 Gran Coupe', NULL, NULL, 'Morocco', 'Safi', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(43, 'Thomas.Brodie-Sangster@gmail.com', 'BMW', 'Série 8 Gran Coupe', NULL, NULL, 'Morocco', 'Mohammédia', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(44, 'idriss.monkey.d@gmail.com', 'BMW', 'X1', NULL, NULL, 'Morocco', 'Khouribga', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(45, 'anass.bouzaidi@hotmail.com', 'BMW', 'X1', NULL, NULL, 'Morocco', 'El Jadida', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(46, 'Alfie.Allen@gmail.com', 'BMW', 'X2', NULL, NULL, 'Morocco', 'Béni Mellal', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(47, 'Aidan.Gillen@gmail.com', 'BMW', 'X2', NULL, NULL, 'Morocco', 'Nador', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 2),
(48, 'kamal.arif@gmail.com', 'BMW', 'X3', NULL, NULL, 'Morocco', 'Taza', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(49, 'Esme.Bianco@gmail.com', 'BMW', 'X3', NULL, NULL, 'Morocco', 'Khémisset', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(50, 'Isaac.Hempstead-Wright@gmail.com', 'BMW', 'X4', NULL, NULL, 'Morocco', 'Casablanca', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(51, 'Jack.Gleeson@gmail.com', 'BMW', 'X4', NULL, NULL, 'Morocco', 'Fés', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(52, 'Jason.Momoa@gmail.com', 'BMW', 'X5', NULL, NULL, 'Morocco', 'Tanger', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(53, 'Joel.Fry@gmail.com', 'BMW', 'X5', NULL, NULL, 'Morocco', 'Marrakech', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(54, 'Kit.Harington@gmail.com', 'BMW', 'X6', NULL, NULL, 'Morocco', 'Salé', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(55, 'Maisie.Williams@mail.com', 'BMW', 'X6', NULL, NULL, 'Morocco', 'Meknès', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(56, 'Michiel.Huisman@gmail.com', 'BMW', 'X7', NULL, NULL, 'Morocco', 'Rabat', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(57, 'Nikolaj.Coster-Waldau@gmail.com', 'BMW', 'X7', NULL, NULL, 'Morocco', 'Oujda', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(58, 'Nonso.Anozie@gmail.com', 'BMW', 'Z4', NULL, NULL, 'Morocco', 'Kénitra', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(59, 'Pedro.Pascal@gmail.com', 'BMW', 'Z4', NULL, NULL, 'Morocco', 'Agadir', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(60, 'Peter.Dinklage@gmail.com', 'BMW', 'i3', NULL, NULL, 'Morocco', 'Tétouan', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(61, 'Richard.Madden@gmail.com', 'BMW', 'i3', NULL, NULL, 'Morocco', 'Témara', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(62, 'Sean.Bean@gmail.Com', 'BMW', 'i3s', NULL, NULL, 'Morocco', 'Safi', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(63, 'Sophie.Turner@gmail.com', 'BMW', 'i3s', NULL, NULL, 'Morocco', 'Mohammédia', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(64, 'Thomas.Brodie-Sangster@gmail.com', 'BMW', 'i8', NULL, NULL, 'Morocco', 'Khouribga', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(65, 'idriss.monkey.d@gmail.com', 'BMW', 'i8', NULL, NULL, 'Morocco', 'El Jadida', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 6),
(66, 'anass.bouzaidi@hotmail.com', 'BMW', 'i8 Coupé', NULL, NULL, 'Morocco', 'Béni Mellal', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(67, 'Alfie.Allen@gmail.com', 'BMW', 'i8 Coupé', NULL, NULL, 'Morocco', 'Nador', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0),
(68, 'Aidan.Gillen@gmail.com', 'BMW', 'i8 Roadster', NULL, NULL, 'Morocco', 'Taza', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 1),
(69, 'kamal.arif@gmail.com', 'BMW', 'i8 Roadster ', NULL, NULL, 'Morocco', 'Khémisset', 500, 'Bonjour, je vous propose ma voiture avec un prix convenable', 0);

-- --------------------------------------------------------

--
-- Structure de la table `marques_noms`
--

CREATE TABLE `marques_noms` (
  `Marque` varchar(34) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marques_noms`
--

INSERT INTO `marques_noms` (`Marque`) VALUES
('40019  SANT\'AGATA – BOLOGNESE (BO)'),
('ALFA ROMEO'),
('ARO'),
('ASIA'),
('ASTON MARTIN'),
('AUDI'),
('AUTO BIANCHI'),
('AUVERLAND'),
('BENTLEY'),
('BMW'),
('BUGATTI'),
('CARBODIES'),
('CHEVROLET'),
('CHRYSLER'),
('CITROEN'),
('CM'),
('com'),
('DACIA'),
('DAEWOO'),
('DAIHATSU'),
('DE LA CHAPELLE'),
('DE TOMASO'),
('DIAMOND STAR'),
('DODGE'),
('EBRO'),
('FAAM'),
('FERRARI'),
('FIAT'),
('FIAT FSM'),
('FORD'),
('FSO'),
('GM DAEWOO'),
('HOMMELL'),
('HONDA'),
('HUMMER'),
('HYUNDAI'),
('HYUNDAI PRECISION'),
('JAGUAR'),
('JEEP'),
('KIA'),
('LADA'),
('LAGONDA'),
('LAMBORGHINI'),
('LANCIA'),
('LAND ROVER'),
('LEXUS'),
('LINCOLN'),
('LOTUS'),
('LTI'),
('MARTIN TTM'),
('MASERATI'),
('MAYBACH'),
('MAZDA'),
('MERCEDES–BENZ'),
('MERCURY'),
('MITSUBISHI'),
('MSC'),
('N.S.U.'),
('NISSAN'),
('NMUK'),
('OPEL'),
('PEUGEOT'),
('PGO'),
('PININFARINA'),
('PORSCHE'),
('PUSHER 7000'),
('QUATTRO'),
('RAYTON FISSORE'),
('RENAULT'),
('ROLLS ROYCE'),
('SAAB'),
('SANTANA'),
('SEAT'),
('SKODA'),
('SMART'),
('SMS'),
('SOVRA LM'),
('SSANGYONG'),
('SUBARU'),
('SUZUKI'),
('TATA'),
('TOYOTA'),
('UMM'),
('VAUXHALL'),
('VENTURI'),
('VOLKSWAGEN'),
('VOLVO'),
('WESTFIELD'),
('WIESMANN'),
('WILLYS');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `pays` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`pays`) VALUES
('Afghanistan'),
('Albania'),
('Algeria'),
('Andorra'),
('Angola'),
('Anguilla'),
('Antigua_and_Barbuda'),
('Argentina'),
('Armenia'),
('Aruba'),
('Australia'),
('Austria'),
('Azerbaijan'),
('Bahamas'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Belarus'),
('Belgium'),
('Belize'),
('Benin'),
('Bermuda'),
('Bhutan'),
('Bolivia'),
('Bonaire Saint Eustatius and Saba'),
('Bosnia_and_Herzegovina'),
('Botswana'),
('Brazil'),
('British_Virgin_Islands'),
('Brunei_Darussalam'),
('Bulgaria'),
('Burkina_Faso'),
('Burundi'),
('Cambodia'),
('Cameroon'),
('Canada'),
('Cape_Verde'),
('Cayman_Islands'),
('Central_African_Republic'),
('Chad'),
('Chile'),
('China'),
('Colombia'),
('Comoros'),
('Congo'),
('Costa_Rica'),
('Cote_dIvoire'),
('Croatia'),
('Cuba'),
('Curaçao'),
('Cyprus'),
('Czechia'),
('Democratic_Republic_of_the_Congo'),
('Denmark'),
('Djibouti'),
('Dominica'),
('Dominican_Republic'),
('Ecuador'),
('Egypt'),
('El_Salvador'),
('Equatorial_Guinea'),
('Eritrea'),
('Estonia'),
('Eswatini'),
('Ethiopia'),
('Falkland_Islands_(Malvinas)'),
('Faroe_Islands'),
('Fiji'),
('Finland'),
('France'),
('French_Polynesia'),
('Gabon'),
('Gambia'),
('Georgia'),
('Germany'),
('Ghana'),
('Gibraltar'),
('Greece'),
('Greenland'),
('Grenada'),
('Guam'),
('Guatemala'),
('Guernsey'),
('Guinea'),
('Guinea_Bissau'),
('Guyana'),
('Haiti'),
('Holy_See'),
('Honduras'),
('Hungary'),
('Iceland'),
('India'),
('Indonesia'),
('Iran'),
('Iraq'),
('Ireland'),
('Isle_of_Man'),
('Israel'),
('Italy'),
('Jamaica'),
('Japan'),
('Jersey'),
('Jordan'),
('Kazakhstan'),
('Kenya'),
('Kosovo'),
('Kuwait'),
('Kyrgyzstan'),
('Laos'),
('Latvia'),
('Lebanon'),
('Lesotho'),
('Liberia'),
('Libya'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Madagascar'),
('Malawi'),
('Malaysia'),
('Maldives'),
('Mali'),
('Malta'),
('Marshall_Islands'),
('Mauritania'),
('Mauritius'),
('Mexico'),
('Moldova'),
('Monaco'),
('Mongolia'),
('Montenegro'),
('Montserrat'),
('Morocco'),
('Mozambique'),
('Myanmar'),
('Namibia'),
('Nepal'),
('Netherlands'),
('New_Caledonia'),
('New_Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('Northern_Mariana_Islands'),
('North_Macedonia'),
('Norway'),
('Oman'),
('Pakistan'),
('Palestine'),
('Panama'),
('Papua_New_Guinea'),
('Paraguay'),
('Peru'),
('Philippines'),
('Poland'),
('Portugal'),
('Puerto_Rico'),
('Qatar'),
('Romania'),
('Russia'),
('Rwanda'),
('Saint_Kitts_and_Nevis'),
('Saint_Lucia'),
('Saint_Vincent_and_the_Grenadines'),
('San_Marino'),
('Sao_Tome_and_Principe'),
('Saudi_Arabia'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra_Leone'),
('Singapore'),
('Sint_Maarten'),
('Slovakia'),
('Slovenia'),
('Solomon_Islands'),
('Somalia'),
('South_Africa'),
('South_Korea'),
('South_Sudan'),
('Spain'),
('Sri_Lanka'),
('Sudan'),
('Suriname'),
('Sweden'),
('Switzerland'),
('Syria'),
('Taiwan'),
('Tajikistan'),
('Thailand'),
('Timor_Leste'),
('Togo'),
('Trinidad_and_Tobago'),
('Tunisia'),
('Turkey'),
('Turks_and_Caicos_islands'),
('Uganda'),
('Ukraine'),
('United_Arab_Emirates'),
('United_Kingdom'),
('United_Republic_of_Tanzania'),
('United_States_of_America'),
('United_States_Virgin_Islands'),
('Uruguay'),
('Uzbekistan'),
('Vanuatu'),
('Venezuela'),
('Vietnam'),
('Wallis_and_Futuna'),
('Yemen'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `MotDePasse` varchar(100) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `Adresse`, `MotDePasse`, `Nom`, `Prenom`, `Telephone`, `Image`) VALUES
(1, 'idriss.monkey.d@gmail.com', '1234567890', 'Drissi El-Bouzaidi', 'Idriss', '0601020304', 'Images/Utilisateurs/1.jpg'),
(2, 'anass.bouzaidi@hotmail.com', '1234567890', 'Bouzaidi', 'Anass', '0641523654', 'Images/Utilisateurs/2.jpg'),
(5, 'Alfie.Allen@gmail.com', '1234567890', 'Allen', 'Alfie', '0908461523', 'Images/Utilisateurs/5.jpg'),
(4, 'Aidan.Gillen@gmail.com', '1234567890', 'Gillen', 'Aidan', '0102030405', 'Images/Utilisateurs/4.png'),
(3, 'kamal.arif@gmail.com', '1234567890', 'Arif', 'Kamal', '0606000060', 'Images/Utilisateurs/3.jpg'),
(6, 'Esme.Bianco@gmail.com', '1234567890', 'Bianco', 'Esmé', '051362487', 'Images/Utilisateurs/6.jpg'),
(7, 'Isaac.Hempstead-Wright@gmail.com', '1234567890', 'Hempstead-Wright', 'Isaac', '916253403', 'Images/Utilisateurs/7.jpg'),
(8, 'Jack.Gleeson@gmail.com', '1234567890', 'Gleeson', 'Jack', '4562354785', 'Images/Utilisateurs/8.jpg'),
(9, 'Jason.Momoa@gmail.com', '1234567890', 'Momoa', 'Jason', '0213652486', 'Images/Utilisateurs/9.jpg'),
(10, 'Joel.Fry@gmail.com', '1234567890', 'Fry', 'Joel', '0532165428', 'Images/Utilisateurs/10.png'),
(11, 'Kit.Harington@gmail.com', '1234567890', 'Harington', 'Kit', '0326541358', 'Images/Utilisateurs/11.jpg'),
(12, 'Maisie.Williams@mail.com', '1234567890', 'Williams', 'Maisie', '0526351426', 'Images/Utilisateurs/12.jpg'),
(13, 'Michiel.Huisman@gmail.com', '1234567890', 'Huisman', 'Michiel', '0451623548', 'Images/Utilisateurs/13.jpg'),
(14, 'Nathalie.Emmanuel@gmail.com', '1234567890', 'Emmanuel', 'Nathalie', '056124584', 'Images/Utilisateurs/14.jpg'),
(15, 'Nikolaj.Coster-Waldau@gmail.com', '1234567890', 'Coster-Waldau', 'Nikolaj', '0615236547', 'Images/Utilisateurs/15.jpg'),
(16, 'Nonso.Anozie@gmail.com', '1234567890', 'Anozie', 'Nonso', '0516235478', 'Images/Utilisateurs/16.jpg'),
(17, 'Pedro.Pascal@gmail.com', '1234567890', 'Pascal', 'Pedro', '0532614587', 'Images/Utilisateurs/17.jpg'),
(18, 'Peter.Dinklage@gmail.com', '1234567890', 'Dinklage', 'Peter', '6541235462', 'Images/Utilisateurs/18.jpeg'),
(19, 'Richard.Madden@gmail.com', '1234567890', 'Madden', 'Richard', '0512365426', 'Images/Utilisateurs/19.jpg'),
(20, 'Sean.Bean@gmail.Com', '1234567890', 'Bean', 'Sean', '0541235462', 'Images/Utilisateurs/20.jpg'),
(21, 'Sophie.Turner@gmail.com', '1234567890', 'Turner', 'Sophie', '0654123541', 'Images/Utilisateurs/21.jpg'),
(22, 'Thomas.Brodie-Sangster@gmail.com', '1234567890', 'Brodie-Sangster', 'Thomas', '0547859641', 'Images/Utilisateurs/22.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `imagesvoitures`
--
ALTER TABLE `imagesvoitures`
  ADD PRIMARY KEY (`Num`),
  ADD UNIQUE KEY `CheminImage` (`CheminImage`);

--
-- Index pour la table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `marques_noms`
--
ALTER TABLE `marques_noms`
  ADD PRIMARY KEY (`Marque`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`pays`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Adresse`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Telephone` (`Telephone`) USING BTREE,
  ADD KEY `Image` (`Image`) USING BTREE,
  ADD KEY `Image_3` (`Image`) USING BTREE,
  ADD KEY `Image_2` (`Image`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
