-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 03:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educar`
--

-- --------------------------------------------------------

--
-- Table structure for table `Alumnos`
--

CREATE TABLE `Alumnos` (
  `CodAlu` tinyint(7) NOT NULL,
  `NomAlu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `ApeAlu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `DocAlu` char(15) COLLATE latin1_spanish_ci NOT NULL,
  `FecNacAlu` date NOT NULL,
  `DomAlu` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `CodTipSex` tinyint(2) NOT NULL,
  `CodEstCiv` tinyint(2) NOT NULL,
  `CodPais` tinyint(3) NOT NULL,
  `CodTipSan` tinyint(3) NOT NULL,
  `CorAlu` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `CelAlu` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `TelAlu` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `CodTipDoc` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ano`
--

CREATE TABLE `Ano` (
  `CodAno` tinyint(2) NOT NULL,
  `NomAno` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `AbrAno` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `Inactivo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Carrera`
--

CREATE TABLE `Carrera` (
  `CodCar` tinyint(2) NOT NULL,
  `NomCar` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `AbrCar` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `CanAnoCar` tinyint(1) NOT NULL,
  `Inactivo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Contrasena`
--

CREATE TABLE `Contrasena` (
  `DocUsr` tinyint(9) NOT NULL,
  `CanPsw` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `FecPsw` date NOT NULL,
  `Psw` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Inactiva` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Division`
--

CREATE TABLE `Division` (
  `CodDiv` tinyint(2) NOT NULL,
  `NomDiv` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `AbrDiv` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `Inactivo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `HisAluMat`
--

CREATE TABLE `HisAluMat` (
  `AnoLec` tinyint(4) NOT NULL,
  `CodPlan` tinyint(4) NOT NULL,
  `CodCar` tinyint(2) NOT NULL,
  `CodAno` tinyint(2) NOT NULL,
  `CodDiv` tinyint(2) NOT NULL,
  `CodMat` tinyint(3) NOT NULL,
  `CodAlu` tinyint(7) NOT NULL,
  `FecIngreso` date NOT NULL,
  `EstMat` bit(1) NOT NULL,
  `FecApro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `HisProMat`
--

CREATE TABLE `HisProMat` (
  `AnoLec` tinyint(4) NOT NULL,
  `CodPlan` tinyint(4) NOT NULL,
  `CodCar` tinyint(2) NOT NULL,
  `CodAno` tinyint(2) NOT NULL,
  `CodDiv` tinyint(2) NOT NULL,
  `CodMat` tinyint(3) NOT NULL,
  `CodPro` tinyint(7) NOT NULL,
  `FecIngreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Materia`
--

CREATE TABLE `Materia` (
  `CodMat` tinyint(3) NOT NULL,
  `NomMat` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `AbrMat` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `Inactivo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Paises`
--

CREATE TABLE `Paises` (
  `CodPais` int(11) NOT NULL,
  `AbrPais` char(2) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NomPais` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `Paises`
--

INSERT INTO `Paises` (`CodPais`, `AbrPais`, `NomPais`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Table structure for table `PlanEdu`
--

CREATE TABLE `PlanEdu` (
  `CodPlan` tinyint(4) NOT NULL,
  `NomPlan` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `DesFecPlan` date NOT NULL,
  `HasFecPlan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Profesor`
--

CREATE TABLE `Profesor` (
  `CodPro` tinyint(4) NOT NULL,
  `NomPro` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `ApePro` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `DocPro` char(15) COLLATE latin1_spanish_ci NOT NULL,
  `FecNacPro` date NOT NULL,
  `CorPro` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `CelPro` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `TelPro` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `DirPro` varchar(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TipDoc`
--

CREATE TABLE `TipDoc` (
  `CodTipDoc` tinyint(2) NOT NULL,
  `DesTipDoc` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `AbrTipDoc` varchar(4) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `TipDoc`
--

INSERT INTO `TipDoc` (`CodTipDoc`, `DesTipDoc`, `AbrTipDoc`) VALUES
(1, 'Documento', 'DNI');

-- --------------------------------------------------------

--
-- Table structure for table `TipEstCiv`
--

CREATE TABLE `TipEstCiv` (
  `CodEstCiv` tinyint(2) NOT NULL,
  `DesEstCiv` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `AbrEstCiv` varchar(3) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `TipEstCiv`
--

INSERT INTO `TipEstCiv` (`CodEstCiv`, `DesEstCiv`, `AbrEstCiv`) VALUES
(1, 'Soltero/a', 'SOL'),
(2, 'Casado/a', 'CAS'),
(3, 'Divorciado/a', 'DIV');

-- --------------------------------------------------------

--
-- Table structure for table `TipSan`
--

CREATE TABLE `TipSan` (
  `CodTipSan` tinyint(2) NOT NULL,
  `AbrTipSan` varchar(3) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `TipSan`
--

INSERT INTO `TipSan` (`CodTipSan`, `AbrTipSan`) VALUES
(1, 'A+'),
(2, 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `TipSex`
--

CREATE TABLE `TipSex` (
  `CodTipSex` tinyint(2) NOT NULL,
  `DesSex` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `AbrSex` varchar(2) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `TipSex`
--

INSERT INTO `TipSex` (`CodTipSex`, `DesSex`, `AbrSex`) VALUES
(1, 'Masculino', 'M'),
(2, 'Femenino', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `DocUsr` tinyint(9) NOT NULL,
  `TipUsr` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `Inactivo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD PRIMARY KEY (`CodAlu`);

--
-- Indexes for table `Ano`
--
ALTER TABLE `Ano`
  ADD PRIMARY KEY (`CodAno`);

--
-- Indexes for table `Carrera`
--
ALTER TABLE `Carrera`
  ADD PRIMARY KEY (`CodCar`);

--
-- Indexes for table `Contrasena`
--
ALTER TABLE `Contrasena`
  ADD KEY `DocUsr` (`DocUsr`),
  ADD KEY `CanPsw` (`CanPsw`);

--
-- Indexes for table `Division`
--
ALTER TABLE `Division`
  ADD PRIMARY KEY (`CodDiv`);

--
-- Indexes for table `HisAluMat`
--
ALTER TABLE `HisAluMat`
  ADD KEY `AnoLec` (`AnoLec`),
  ADD KEY `CodPlan` (`CodPlan`),
  ADD KEY `CodCar` (`CodCar`),
  ADD KEY `CodAno` (`CodAno`),
  ADD KEY `CodDiv` (`CodDiv`),
  ADD KEY `CodMat` (`CodMat`),
  ADD KEY `CodAlu` (`CodAlu`),
  ADD KEY `FecIngreso` (`FecIngreso`),
  ADD KEY `EstMat` (`EstMat`),
  ADD KEY `FecApro` (`FecApro`);

--
-- Indexes for table `HisProMat`
--
ALTER TABLE `HisProMat`
  ADD KEY `AnoLec` (`AnoLec`),
  ADD KEY `CodPlan` (`CodPlan`),
  ADD KEY `CodCar` (`CodCar`),
  ADD KEY `CodAno` (`CodAno`),
  ADD KEY `CodDiv` (`CodDiv`),
  ADD KEY `CodMat` (`CodMat`),
  ADD KEY `CodPro` (`CodPro`),
  ADD KEY `FecIngreso` (`FecIngreso`);

--
-- Indexes for table `Materia`
--
ALTER TABLE `Materia`
  ADD PRIMARY KEY (`CodMat`);

--
-- Indexes for table `Paises`
--
ALTER TABLE `Paises`
  ADD PRIMARY KEY (`CodPais`);

--
-- Indexes for table `PlanEdu`
--
ALTER TABLE `PlanEdu`
  ADD PRIMARY KEY (`CodPlan`),
  ADD KEY `NomPlan` (`NomPlan`),
  ADD KEY `DesFecPlan` (`DesFecPlan`),
  ADD KEY `HasFecPlan` (`HasFecPlan`);

--
-- Indexes for table `Profesor`
--
ALTER TABLE `Profesor`
  ADD PRIMARY KEY (`CodPro`);

--
-- Indexes for table `TipDoc`
--
ALTER TABLE `TipDoc`
  ADD PRIMARY KEY (`CodTipDoc`);

--
-- Indexes for table `TipEstCiv`
--
ALTER TABLE `TipEstCiv`
  ADD PRIMARY KEY (`CodEstCiv`);

--
-- Indexes for table `TipSan`
--
ALTER TABLE `TipSan`
  ADD PRIMARY KEY (`CodTipSan`);

--
-- Indexes for table `TipSex`
--
ALTER TABLE `TipSex`
  ADD PRIMARY KEY (`CodTipSex`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`DocUsr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Paises`
--
ALTER TABLE `Paises`
  MODIFY `CodPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
