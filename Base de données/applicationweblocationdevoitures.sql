-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 27 août 2021 à 19:28
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
  `id` int(50) NOT NULL,
  `CheminImage` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imagesvoitures`
--

INSERT INTO `imagesvoitures` (`id`, `CheminImage`) VALUES
(1, 'Images/Voitures/1.png');

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AdresseUtilisateur` varchar(100) NOT NULL,
  `Marque` varchar(50) NOT NULL,
  `Modele` varchar(50) NOT NULL,
  `DateDisponible` date NOT NULL,
  `Pays` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Prix` int(5) NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `NombreVisites` int(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `AdresseUtilisateur`, `Marque`, `Modele`, `DateDisponible`, `Pays`, `Ville`, `Prix`, `Description`, `NombreVisites`) VALUES
(1, 'idriss.monkey.d@gmail.com', 'BMW', 'X1', '2021-08-10', 'Morocco', 'Casablanca', 300, 'Bonjour à vous, je vous propose ma voiture, qui est BMW X1, et je vous propose aussi un bon prix qui est 300DH/jour, j\'en suis sûr que vous ne pouvez pas trouver un prix convenable que celui là. Et donc qu\'est ce que vous attendez, vous pouvez m\'appeler dès maintenant.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `marques_noms`
--

CREATE TABLE `marques_noms` (
  `marque` varchar(34) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marques_noms`
--

INSERT INTO `marques_noms` (`marque`) VALUES
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
(4, 'anass.bouzaidi@hotmail.com', '19991999', 'Anass', 'Bouzaidi', '0641523654', 'Images/Voitures/4.gif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `imagesvoitures`
--
ALTER TABLE `imagesvoitures`
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
  ADD PRIMARY KEY (`marque`);

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
