-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 20 août 2021 à 01:02
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
-- Structure de la table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AdresseUtilisateur` varchar(100) DEFAULT NULL,
  `Marque` varchar(50) DEFAULT NULL,
  `Modele` varchar(50) DEFAULT NULL,
  `DateDisponible` date DEFAULT NULL,
  `Pays` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Prix` int(5) NOT NULL,
  `Image` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `AdresseUtilisateur`, `Marque`, `Modele`, `DateDisponible`, `Pays`, `Ville`, `Prix`, `Image`, `Description`) VALUES
(1, 'idriss.monkey.d@gmail.com', 'BMW', 'X1', '2021-08-10', 'Maroc', 'Casablanca', 300, 'Images/Voitures/1.png', 'Bonjour à vous, je vous propose ma voiture, qui est BMW X1, et je vous propose aussi un bon prix qui est 300DH/jour, j\'en suis sûr que vous ne pouvez pas trouver un prix convenable que celui là. Et donc qu\'est ce que vous attendez, vous pouvez m\'appeler dès maintenant.');

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
  `codepays` varchar(3) DEFAULT NULL,
  `pays` varchar(32) DEFAULT NULL,
  `population2019` varchar(26) DEFAULT NULL,
  `continent` varchar(7) DEFAULT NULL,
  `NULL` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`codepays`, `pays`, `population2019`, `continent`, `NULL`) VALUES
('AFG', 'Afghanistan', '38041757', 'Asia', NULL),
('ALB', 'Albania', '2862427', 'Europe', NULL),
('DZA', 'Algeria', '43053054', 'Africa', NULL),
('AND', 'Andorra', '76177', 'Europe', NULL),
('AGO', 'Angola', '31825299', 'Africa', NULL),
('AIA', 'Anguilla', '14872', 'America', NULL),
('ATG', 'Antigua_and_Barbuda', '97115', 'America', NULL),
('ARG', 'Argentina', '44780675', 'America', NULL),
('ARM', 'Armenia', '2957728', 'Europe', NULL),
('ABW', 'Aruba', '106310', 'America', NULL),
('AUS', 'Australia', '25203200', 'Oceania', NULL),
('AUT', 'Austria', '8858775', 'Europe', NULL),
('AZE', 'Azerbaijan', '10047719', 'Europe', NULL),
('BHS', 'Bahamas', '389486', 'America', NULL),
('BHR', 'Bahrain', '1641164', 'Asia', NULL),
('BGD', 'Bangladesh', '163046173', 'Asia', NULL),
('BRB', 'Barbados', '287021', 'America', NULL),
('BLR', 'Belarus', '9452409', 'Europe', NULL),
('BEL', 'Belgium', '11455519', 'Europe', NULL),
('BLZ', 'Belize', '390351', 'America', NULL),
('BEN', 'Benin', '11801151', 'Africa', NULL),
('BMU', 'Bermuda', '62508', 'America', NULL),
('BTN', 'Bhutan', '763094', 'Asia', NULL),
('BOL', 'Bolivia', '11513102', 'America', NULL),
('BES', '\"Bonaire', ' Saint Eustatius and Saba\"', '25983', 'America'),
('BIH', 'Bosnia_and_Herzegovina', '3300998', 'Europe', NULL),
('BWA', 'Botswana', '2303703', 'Africa', NULL),
('BRA', 'Brazil', '211049519', 'America', NULL),
('VGB', 'British_Virgin_Islands', '30033', 'America', NULL),
('BRN', 'Brunei_Darussalam', '433296', 'Asia', NULL),
('BGR', 'Bulgaria', '7000039', 'Europe', NULL),
('BFA', 'Burkina_Faso', '20321383', 'Africa', NULL),
('BDI', 'Burundi', '11530577', 'Africa', NULL),
('KHM', 'Cambodia', '16486542', 'Asia', NULL),
('CMR', 'Cameroon', '25876387', 'Africa', NULL),
('CAN', 'Canada', '37411038', 'America', NULL),
('CPV', 'Cape_Verde', '549936', 'Africa', NULL),
('CYM', 'Cayman_Islands', '64948', 'America', NULL),
('CAF', 'Central_African_Republic', '4745179', 'Africa', NULL),
('TCD', 'Chad', '15946882', 'Africa', NULL),
('CHL', 'Chile', '18952035', 'America', NULL),
('CHN', 'China', '1433783692', 'Asia', NULL),
('COL', 'Colombia', '50339443', 'America', NULL),
('COM', 'Comoros', '850891', 'Africa', NULL),
('COG', 'Congo', '5380504', 'Africa', NULL),
('CRI', 'Costa_Rica', '5047561', 'America', NULL),
('CIV', 'Cote_dIvoire', '25716554', 'Africa', NULL),
('HRV', 'Croatia', '4076246', 'Europe', NULL),
('CUB', 'Cuba', '11333484', 'America', NULL),
('CUW', 'Curaçao', '163423', 'America', NULL),
('CYP', 'Cyprus', '875899', 'Europe', NULL),
('CZE', 'Czechia', '10649800', 'Europe', NULL),
('COD', 'Democratic_Republic_of_the_Congo', '86790568', 'Africa', NULL),
('DNK', 'Denmark', '5806081', 'Europe', NULL),
('DJI', 'Djibouti', '973557', 'Africa', NULL),
('DMA', 'Dominica', '71808', 'America', NULL),
('DOM', 'Dominican_Republic', '10738957', 'America', NULL),
('ECU', 'Ecuador', '17373657', 'America', NULL),
('EGY', 'Egypt', '100388076', 'Africa', NULL),
('SLV', 'El_Salvador', '6453550', 'America', NULL),
('GNQ', 'Equatorial_Guinea', '1355982', 'Africa', NULL),
('ERI', 'Eritrea', '3497117', 'Africa', NULL),
('EST', 'Estonia', '1324820', 'Europe', NULL),
('SWZ', 'Eswatini', '1148133', 'Africa', NULL),
('ETH', 'Ethiopia', '112078727', 'Africa', NULL),
('FLK', 'Falkland_Islands_(Malvinas)', '3372', 'America', NULL),
('FRO', 'Faroe_Islands', '48677', 'Europe', NULL),
('FJI', 'Fiji', '889955', 'Oceania', NULL),
('FIN', 'Finland', '5517919', 'Europe', NULL),
('FRA', 'France', '67012883', 'Europe', NULL),
('PYF', 'French_Polynesia', '279285', 'Oceania', NULL),
('GAB', 'Gabon', '2172578', 'Africa', NULL),
('GMB', 'Gambia', '2347696', 'Africa', NULL),
('GEO', 'Georgia', '3996762', 'Europe', NULL),
('DEU', 'Germany', '83019213', 'Europe', NULL),
('GHA', 'Ghana', '30417858', 'Africa', NULL),
('GIB', 'Gibraltar', '33706', 'Europe', NULL),
('GRC', 'Greece', '10724599', 'Europe', NULL),
('GRL', 'Greenland', '56660', 'America', NULL),
('GRD', 'Grenada', '112002', 'America', NULL),
('GUM', 'Guam', '167295', 'Oceania', NULL),
('GTM', 'Guatemala', '17581476', 'America', NULL),
('GGY', 'Guernsey', '64468', 'Europe', NULL),
('GIN', 'Guinea', '12771246', 'Africa', NULL),
('GNB', 'Guinea_Bissau', '1920917', 'Africa', NULL),
('GUY', 'Guyana', '782775', 'America', NULL),
('HTI', 'Haiti', '11263079', 'America', NULL),
('VAT', 'Holy_See', '815', 'Europe', NULL),
('HND', 'Honduras', '9746115', 'America', NULL),
('HUN', 'Hungary', '9772756', 'Europe', NULL),
('ISL', 'Iceland', '356991', 'Europe', NULL),
('IND', 'India', '1366417756', 'Asia', NULL),
('IDN', 'Indonesia', '270625567', 'Asia', NULL),
('IRN', 'Iran', '82913893', 'Asia', NULL),
('IRQ', 'Iraq', '39309789', 'Asia', NULL),
('IRL', 'Ireland', '4904240', 'Europe', NULL),
('IMN', 'Isle_of_Man', '84589', 'Europe', NULL),
('ISR', 'Israel', '8519373', 'Asia', NULL),
('ITA', 'Italy', '60359546', 'Europe', NULL),
('JAM', 'Jamaica', '2948277', 'America', NULL),
('JPN', 'Japan', '126860299', 'Asia', NULL),
('JEY', 'Jersey', '107796', 'Europe', NULL),
('JOR', 'Jordan', '10101697', 'Asia', NULL),
('KAZ', 'Kazakhstan', '18551428', 'Asia', NULL),
('KEN', 'Kenya', '52573967', 'Africa', NULL),
('XKX', 'Kosovo', '1798506', 'Europe', NULL),
('KWT', 'Kuwait', '4207077', 'Asia', NULL),
('KGZ', 'Kyrgyzstan', '6415851', 'Asia', NULL),
('LAO', 'Laos', '7169456', 'Asia', NULL),
('LVA', 'Latvia', '1919968', 'Europe', NULL),
('LBN', 'Lebanon', '6855709', 'Asia', NULL),
('LSO', 'Lesotho', '2125267', 'Africa', NULL),
('LBR', 'Liberia', '4937374', 'Africa', NULL),
('LBY', 'Libya', '6777453', 'Africa', NULL),
('LIE', 'Liechtenstein', '38378', 'Europe', NULL),
('LTU', 'Lithuania', '2794184', 'Europe', NULL),
('LUX', 'Luxembourg', '613894', 'Europe', NULL),
('MDG', 'Madagascar', '26969306', 'Africa', NULL),
('MWI', 'Malawi', '18628749', 'Africa', NULL),
('MYS', 'Malaysia', '31949789', 'Asia', NULL),
('MDV', 'Maldives', '530957', 'Asia', NULL),
('MLI', 'Mali', '19658023', 'Africa', NULL),
('MLT', 'Malta', '493559', 'Europe', NULL),
('MHL', 'Marshall_Islands', '58791', 'Oceania', NULL),
('MRT', 'Mauritania', '4525698', 'Africa', NULL),
('MUS', 'Mauritius', '1269670', 'Africa', NULL),
('MEX', 'Mexico', '127575529', 'America', NULL),
('MDA', 'Moldova', '4043258', 'Europe', NULL),
('MCO', 'Monaco', '33085', 'Europe', NULL),
('MNG', 'Mongolia', '3225166', 'Asia', NULL),
('MNE', 'Montenegro', '622182', 'Europe', NULL),
('MSF', 'Montserrat', '4991', 'America', NULL),
('MAR', 'Morocco', '36471766', 'Africa', NULL),
('MOZ', 'Mozambique', '30366043', 'Africa', NULL),
('MMR', 'Myanmar', '54045422', 'Asia', NULL),
('NAM', 'Namibia', '2494524', 'Africa', NULL),
('NPL', 'Nepal', '28608715', 'Asia', NULL),
('NLD', 'Netherlands', '17282163', 'Europe', NULL),
('NCL', 'New_Caledonia', '282757', 'Oceania', NULL),
('NZL', 'New_Zealand', '4783062', 'Oceania', NULL),
('NIC', 'Nicaragua', '6545503', 'America', NULL),
('NER', 'Niger', '23310719', 'Africa', NULL),
('NGA', 'Nigeria', '200963603', 'Africa', NULL),
('MKD', 'North_Macedonia', '2077132', 'Europe', NULL),
('MNP', 'Northern_Mariana_Islands', '57213', 'Oceania', NULL),
('NOR', 'Norway', '5328212', 'Europe', NULL),
('OMN', 'Oman', '4974992', 'Asia', NULL),
('PAK', 'Pakistan', '216565317', 'Asia', NULL),
('PSE', 'Palestine', '4981422', 'Asia', NULL),
('PAN', 'Panama', '4246440', 'America', NULL),
('PNG', 'Papua_New_Guinea', '8776119', 'Oceania', NULL),
('PRY', 'Paraguay', '7044639', 'America', NULL),
('PER', 'Peru', '32510462', 'America', NULL),
('PHL', 'Philippines', '108116622', 'Asia', NULL),
('POL', 'Poland', '37972812', 'Europe', NULL),
('PRT', 'Portugal', '10276617', 'Europe', NULL),
('PRI', 'Puerto_Rico', '2933404', 'America', NULL),
('QAT', 'Qatar', '2832071', 'Asia', NULL),
('ROU', 'Romania', '19414458', 'Europe', NULL),
('RUS', 'Russia', '145872260', 'Europe', NULL),
('RWA', 'Rwanda', '12626938', 'Africa', NULL),
('KNA', 'Saint_Kitts_and_Nevis', '52834', 'America', NULL),
('LCA', 'Saint_Lucia', '182795', 'America', NULL),
('VCT', 'Saint_Vincent_and_the_Grenadines', '110593', 'America', NULL),
('SMR', 'San_Marino', '34453', 'Europe', NULL),
('STP', 'Sao_Tome_and_Principe', '215048', 'Africa', NULL),
('SAU', 'Saudi_Arabia', '34268529', 'Asia', NULL),
('SEN', 'Senegal', '16296362', 'Africa', NULL),
('SRB', 'Serbia', '6963764', 'Europe', NULL),
('SYC', 'Seychelles', '97741', 'Africa', NULL),
('SLE', 'Sierra_Leone', '7813207', 'Africa', NULL),
('SGP', 'Singapore', '5804343', 'Asia', NULL),
('SXM', 'Sint_Maarten', '42389', 'America', NULL),
('SVK', 'Slovakia', '5450421', 'Europe', NULL),
('SVN', 'Slovenia', '2080908', 'Europe', NULL),
('SLB', 'Solomon_Islands', '669821', 'Oceania', NULL),
('SOM', 'Somalia', '15442906', 'Africa', NULL),
('ZAF', 'South_Africa', '58558267', 'Africa', NULL),
('KOR', 'South_Korea', '51225321', 'Asia', NULL),
('SSD', 'South_Sudan', '11062114', 'Africa', NULL),
('ESP', 'Spain', '46937060', 'Europe', NULL),
('LKA', 'Sri_Lanka', '21323734', 'Asia', NULL),
('SDN', 'Sudan', '42813237', 'Africa', NULL),
('SUR', 'Suriname', '581363', 'America', NULL),
('SWE', 'Sweden', '10230185', 'Europe', NULL),
('CHE', 'Switzerland', '8544527', 'Europe', NULL),
('SYR', 'Syria', '17070132', 'Asia', NULL),
('TWN', 'Taiwan', '23773881', 'Asia', NULL),
('TJK', 'Tajikistan', '9321023', 'Asia', NULL),
('THA', 'Thailand', '69625581', 'Asia', NULL),
('TLS', 'Timor_Leste', '1293120', 'Asia', NULL),
('TGO', 'Togo', '8082359', 'Africa', NULL),
('TTO', 'Trinidad_and_Tobago', '1394969', 'America', NULL),
('TUN', 'Tunisia', '11694721', 'Africa', NULL),
('TUR', 'Turkey', '82003882', 'Europe', NULL),
('TCA', 'Turks_and_Caicos_islands', '38194', 'America', NULL),
('UGA', 'Uganda', '44269587', 'Africa', NULL),
('UKR', 'Ukraine', '43993643', 'Europe', NULL),
('ARE', 'United_Arab_Emirates', '9770526', 'Asia', NULL),
('GBR', 'United_Kingdom', '66647112', 'Europe', NULL),
('TZA', 'United_Republic_of_Tanzania', '58005461', 'Africa', NULL),
('USA', 'United_States_of_America', '329064917', 'America', NULL),
('VIR', 'United_States_Virgin_Islands', '104579', 'America', NULL),
('URY', 'Uruguay', '3461731', 'America', NULL),
('UZB', 'Uzbekistan', '32981715', 'Asia', NULL),
('VUT', 'Vanuatu', '299882', 'Oceania', NULL),
('VEN', 'Venezuela', '28515829', 'America', NULL),
('VNM', 'Vietnam', '96462108', 'Asia', NULL),
('WLF', 'Wallis_and_Futuna', '', 'Oceania', NULL),
('YEM', 'Yemen', '29161922', 'Asia', NULL),
('ZMB', 'Zambia', '17861034', 'Africa', NULL),
('ZWE', 'Zimbabwe', '14645473', 'Africa', NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL),
('ANS', 'Anass', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
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

INSERT INTO `utilisateurs` (`Adresse`, `MotDePasse`, `Nom`, `Prenom`, `Telephone`, `Image`) VALUES
('idriss.monkey.d@gmail.com', '1234567890', 'Drissi El-Bouzaidi', 'Idriss', '0601020304', 'Images/Utilisateurs/1.jpg');

--
-- Index pour les tables déchargées
--

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
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Adresse`);

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
