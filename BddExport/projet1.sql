-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 oct. 2022 à 14:12
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet1`
--

-- --------------------------------------------------------

--
-- Structure de la table `developeur`
--

CREATE TABLE `developeur` (
  `DevMod` tinyint(1) NOT NULL DEFAULT 1,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `developeur`
--

INSERT INTO `developeur` (`DevMod`, `id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `intitule` varchar(500) NOT NULL,
  `idTheme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `intitule`, `idTheme`) VALUES
(4, 'Combien de temps a duré la guerre de cent ans ?', 1),
(5, 'Quelle est la date de la révolution française ?', 1),
(6, 'Quel est le siècle de de la fin de l\'empire Romain ?', 1),
(7, 'Quelle est la date de la découverte de l\'Amérique par Christophe Colomb ?', 1),
(8, 'Quelle est la capitale de la Suisse ?', 3),
(10, 'Qui est l\'auteur du célèbre Roman les fleurs du mal ?', 6),
(11, 'Qui a écrit le poème \"Demain, dès l\'aube…\" ?', 6),
(12, 'Quel poète n\'a écrit que pendant pour devenir marchant d\'arme ?', 6),
(13, 'Quelle est la capitale du brésil ?', 3),
(14, 'En quelle année Napoléon 1er s\'est il couronnée ?', 1),
(15, 'Quelle est la capitale du Nicaragua ?', 3),
(17, 'Quelle est la capitale de la Suède ?', 3),
(18, 'Quelle est la capitale de l\'Argentine ?', 3),
(19, 'Quelle est la capitale de l\'Egypte ?', 3),
(20, 'Quelle est la capitale du Maroc ?', 3),
(21, 'Qui a écrit les Fables de la Fontaine ?', 6),
(22, 'Qui est le dramaturge du Malade Imaginaire ?', 6),
(23, 'Qui est l\'auteur du roman vingt mille lieues sous les mers ?', 6),
(24, 'Quelle est la date la séparation de l\'église et de l\'état en France ?', 1),
(25, 'En quelle année l\'école devient elle laïque gratuite et obligatoire en France ?', 1);

-- --------------------------------------------------------

--
-- Structure de la table `remarques`
--

CREATE TABLE `remarques` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `source` varchar(40) DEFAULT NULL,
  `IDProfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `remarques`
--

INSERT INTO `remarques` (`id`, `pseudo`, `commentaire`, `source`, `IDProfil`) VALUES
(6, 'fgfg', 'test rapide.', 'PageMere', NULL),
(7, 'test', 'ddddddddddddddd\r\nddddddddddddddd\r\nddddddddddddd', 'PageMere', NULL),
(8, 'ruhi', 'blablabla', 'PageMere', NULL),
(9, 'popo', 'ffffffffffffffffffff\r\nffffffffffffffffff', 'PageMere', NULL),
(10, 'gole', 'dddddddd', 'PageMere', NULL),
(11, 'eee', 'eee', 'PageMere', NULL),
(12, 'zzz', 'zzzzzz', 'PageMere', NULL),
(13, 'ghgj', 'ddddddddddd', 'PageMere', NULL),
(14, 'ffff', 'gggggggggggg', 'PageMere', NULL),
(15, 'ggg', 'gggggggggg', 'PageMere', NULL),
(16, 'sss', 'ssssssssss', 'PageMere', NULL),
(17, 'ddd', 'ddddd', 'PageMere', NULL),
(18, 'sera', 'ddddddddddddddddddd\r\ndddddddddddddddddddd\r\ndddddddddddddddddddddd\r\nddddddddddddddddddddd\r\ndddddddddddddddddddddd\r\nddddddddddddddddddddd\r\ndddddddddddddddddddddd\r\nddddddddddddddddddddddd\r\nddddddddddddddddddddddd', 'PageMere', NULL),
(19, 'tesrrr', 'fffffffffff', 'PageMere', NULL),
(20, 'marche', 'test', 'EndPage', NULL),
(21, 'dfddddd ddd', 'ddddddddddddddddddd\r\ndddddddddddddddddddd\r\ndddddddddddddddddd\r\nddddddddd', 'EndPage', NULL),
(22, 'fgg', 'ffffff', 'PageMere', NULL),
(23, 'dfff', 'fffffffffffffff', 'PageMere', NULL),
(24, 'SomonQ', 'Je suis débile.', 'PageMere', NULL),
(25, 'QueuQ d\'land', 'Ceci est un test.', 'PageMere', NULL),
(26, 'dd', 'ddddddddddd', 'PageMere', NULL),
(27, 'SDF', 'C\'était nul à chier ma race.', 'EndPage', NULL),
(28, 'df', 'dfdffdf', 'EndPage', 114),
(29, 'fuck you!!!', 'fuck you!!!\r\nfuck you!!!\r\nfuck you!!!', 'EndPage', 114),
(30, 'dfe', 'testdernier', 'PageMere', 114),
(31, 'ff', 'ff', 'PageMere', 118),
(32, 'ff', 'ff', 'PageMere', 118),
(33, 'ee', 'ee', 'PageMere', 118),
(34, 'r', 'r', 'PageMere', 118),
(35, 'd', 'd', 'PageMere', 118),
(36, 'd', 'd', 'PageMere', 119),
(37, 'zd', 'zd', 'EndPage', 119),
(38, 'd', 'd', 'EndPage', 119),
(39, '00', '00->', 'PageMere', 120),
(40, '0', '0', 'PageMere', 120),
(41, 'ff', 'f', 'PageMere', 120),
(42, 'v', 'v', 'EndPage', 121),
(43, 'jk', 'klkl', 'PageMere', 123),
(44, 'dd', 'd', 'EndPage', 126),
(45, 'df', 'dfdfd', 'PageMere', 136),
(46, 'fgffgf', 'fgfgf', 'EndPage', 136);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `intitule` varchar(500) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `VoF` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `intitule`, `idQuestion`, `VoF`) VALUES
(5, '100 ans', 4, 0),
(6, '95 ans', 4, 0),
(7, '116 ans', 4, 1),
(8, '50 ans', 4, 0),
(9, '1789', 5, 1),
(10, '1799', 5, 0),
(11, '1784', 5, 0),
(12, '1788', 5, 0),
(13, '3eme siècle ap JC ', 6, 0),
(14, '3eme siècle av JC', 6, 0),
(15, '5eme siècle ap JC ', 6, 1),
(16, '5eme siècle av JC', 6, 0),
(17, '1452', 7, 0),
(18, '1486', 7, 0),
(19, '1479', 7, 0),
(20, '1492', 7, 1),
(21, 'Genève', 8, 0),
(22, 'Zurich', 8, 0),
(23, 'Berne', 8, 1),
(24, 'Vanne', 8, 0),
(25, 'Baudelaire', 10, 1),
(26, 'Victor Hugo', 10, 0),
(27, 'Voltaire', 10, 0),
(28, 'Rousseau', 10, 0),
(29, 'Rimbaud', 11, 0),
(30, 'Victor Hugo', 11, 1),
(31, 'Verlaine', 11, 0),
(32, 'Rimbaud', 11, 0),
(38, 'Lamartine', 12, 0),
(39, 'Rimbaud', 12, 1),
(40, 'Racine', 12, 0),
(41, 'Verlaine', 12, 0),
(46, 'Rio de Janeiro', 13, 0),
(47, 'Lima', 13, 0),
(48, 'Brasília', 13, 1),
(49, 'Buenos Aires', 13, 0),
(50, '1800', 14, 0),
(51, '1805', 14, 0),
(52, '1809', 14, 0),
(53, '1807', 14, 1),
(54, 'Managua', 15, 1),
(55, 'Rama', 15, 0),
(56, 'Rivas', 15, 0),
(57, 'San Carlos', 15, 0),
(58, 'Oslo', 17, 0),
(59, 'Helsinki', 17, 0),
(60, 'Stockholm', 17, 1),
(61, 'Amsterdam', 17, 0),
(62, 'Buenos Aires ', 18, 1),
(63, 'Ushuaia ', 18, 0),
(64, 'La Paz', 18, 0),
(65, 'Santiago', 18, 0),
(70, 'Le Caire', 19, 1),
(71, 'Gizeh', 19, 0),
(72, 'Tripoli', 19, 0),
(73, 'Médine', 19, 0),
(74, 'Rabat', 20, 1),
(75, 'Tunis', 20, 0),
(76, 'Alger', 20, 0),
(77, 'Marrakech', 20, 0),
(78, 'Jean de la Fontaine', 21, 1),
(79, 'Voltaire', 21, 0),
(80, 'Molière', 21, 0),
(81, 'Rimbaud', 21, 0),
(82, 'Molière', 22, 1),
(83, 'Racine', 22, 0),
(84, 'Rostand', 21, 0),
(85, 'Corneille', 22, 0),
(86, 'Jules Verne', 23, 1),
(87, 'Baudelaire', 23, 0),
(88, 'Racine', 23, 0),
(89, 'Camus', 23, 0),
(90, '1900', 24, 0),
(91, '1905', 24, 1),
(92, '1894', 24, 0),
(93, '1910', 24, 0),
(94, '1882', 25, 1),
(95, '1889', 25, 0),
(96, '1892', 25, 0),
(97, '1899', 25, 0),
(98, 'Michael Schumarer', 22, 0);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`) VALUES
(1, 'Mangas'),
(2, 'Jeux-Videos'),
(3, 'E-sport'),
(4, 'Retro'),
(5, 'Japon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `identitee` int(10) NOT NULL DEFAULT 0,
  `nom` varchar(50) DEFAULT NULL,
  `pnom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `score` int(30) DEFAULT NULL,
  `nivEtude` varchar(50) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `temps_abs` int(11) NOT NULL DEFAULT 0,
  `temps_rel` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `identitee`, `nom`, `pnom`, `mail`, `score`, `nivEtude`, `Telephone`, `temps_abs`, `temps_rel`) VALUES
(1, 0, 'jack', 'beauregard', 'mail@mail.fr', 5, 'jsp', NULL, 0, 0),
(4, 0, 'tgh', 'med', 'jki@gh.fg', 0, 'Collège', NULL, 0, 0),
(6, 0, 'tester', 'tester', 'tester@ui.fr', 8, 'Master', NULL, 0, 0),
(9, 0, 'test2', 'testgh2', 'vb@hi.de', 1, 'Lycée', NULL, 0, 0),
(40, 0, 'tes morts', 'mange', 'bk@ji.fr', 2, 'Collège', NULL, 0, 0),
(59, 0, 'tyu', 'opo', 'kl@kl.fr', 4, 'Bac', NULL, 0, 0),
(60, 0, 'Magi', 'DUfrey', 'df@gjk.fr', 0, 'Lycée', NULL, 0, 0),
(61, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(62, 0, 'test3', 'fgh', 'fg@hg.fr', 2, 'Collège', '0654818194', 0, 0),
(63, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(64, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(65, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(66, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(67, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(68, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(69, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(70, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(71, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(72, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(73, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(74, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(75, 0, 'dfddfd', 'dddf', 'fg@fg.fr', 0, 'Collège', '0202020202', 0, 0),
(76, 0, 'mased', '', 'fg@fg.fg', 0, '', '1515151515', 0, 0),
(77, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(78, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(79, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(80, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(81, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(82, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(83, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(84, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(85, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(86, 0, 'Sapristi', 'Saucisse', 'df@df.fr', 8, '', '0202020202', 0, 0),
(87, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(88, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(89, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(90, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(91, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(92, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(93, 0, 'test88', 'test88', 'df@df.df', 1, 'Collège', '0202020202', 0, 0),
(94, 0, 'test88', 'test88', 'df@df.df', 1, '', '0202020202', 0, 0),
(95, 0, 'dddddddddddd', 'Saucisse', 'df@df.fr', 4, '', '0202020202', 0, 0),
(96, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(97, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(98, 0, 'Alfred', '', 'df@df.fr', 6, '', '0202020202', 0, 0),
(99, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(100, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(101, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(102, 0, 'Quade', '', 'df@hj.fr', 5, 'Bac', '0101010101', 0, 0),
(103, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(104, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(105, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(106, 0, 'test3', 'med', 'fg@hg.fr', 0, '', '0654818194', 0, 0),
(107, 0, 'test3', 'med', 'fg@hg.fr', 0, '', '0654818194', 0, 0),
(108, 0, 'fg', 'fgh', 'fg@hg.fr', 0, '', '0654818194', 0, 0),
(109, 0, 'test3', 'Pruno', 'fg@fg.fg', 0, '', '0654818194', 0, 0),
(110, 0, 'Von Jasmin', 'med', 'ftg@uno.fr', 0, '', '0654818194', 0, 0),
(111, 0, 'Jean Kevin', 'fgh', 'ftg@uno.fr', 0, '', '0654818194', 0, 0),
(112, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(113, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(114, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(115, 0, 'test3', 'Sebastien', 'ftg@ui.fr', 0, '', '0654818194', 0, 0),
(116, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(117, 0, 'Von Jasmin', 'med', 'ty@lm.fr', 0, '', '0654818194', 0, 0),
(118, 0, 'Quio', 'tyu', 'p@p.p', 4, 'Master', '0202020202', 0, 0),
(119, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(120, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(121, 0, 'Sapristi', 'Saucisse', 'df@df.fr', 5, '', '0202020202', 0, 0),
(122, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(123, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(124, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(125, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(126, 0, 'test3', 'fgh', 'ftg@uno.fr', 0, '', '0654818194', 0, 0),
(127, 0, 'test3', 'fgh', 'fg@fg.fg', 0, '', '0654818194', 0, 0),
(128, 0, 'Sapristi', 'Saucisse', 'df@df.fr', 0, '', '0202020202', 0, 0),
(129, 0, 'Sapristi', 'Saucisse', 'df@df.fr', 0, '', '0202020202', 0, 0),
(130, 0, 'test3', 'fgh', 'fg@fg.fg', 4, '', '0654818194', 0, 0),
(131, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(132, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(133, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(134, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(135, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(136, 0, 'Sapristji', 'Saucisse', 'df@df.fr', 4, '', '0202020202', 0, 0),
(137, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(138, 0, 'Sapristi56', 'Saucisse', 'df@df.fr', 2, '', '0202020202', 0, 0),
(139, 0, 'Sapristi', 'Saucisse', 'df@df.fr', 5, '', '0202020202', 0, 0),
(140, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(141, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(142, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(143, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(144, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(145, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(146, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(147, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(148, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(149, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(150, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(151, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(152, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(153, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(154, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(155, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(156, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(157, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(158, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(159, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(160, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(161, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(162, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(163, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(164, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(165, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(166, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(167, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(168, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(169, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(170, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(171, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(172, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(173, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(174, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(175, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(176, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(177, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(178, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(179, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(180, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(181, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(182, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(183, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(184, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(185, 707480998, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(186, 943072712, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(187, 765324355, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(188, 578831591, 'Von Jasmink', 'med', 'fg@hg.fr', 0, '', '0654818194', 0, 0),
(189, 776271270, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(190, 400021456, 'test3', 'Pruno', 'ftg@uno.fr', 4, '', '0654818194', 0, 0),
(191, 482179617, 'test3', 'df', 'ty@lm.fr', 0, '', '0654818194', 0, 0),
(192, 453837702, 'Von Jasmin', 'Pruno', 'ty@lm.fr', 0, '', '0654818194', 0, 0),
(193, 580664174, 'Jean Kevin', 'fg', 'ty@lm.fr', 0, '', '0654818194', 124, 0),
(194, 330169898, 'Jean Kevin', 'df', 'ty@lm.fr', 0, '', '0654818194', 1667220541, 714);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `developeur`
--
ALTER TABLE `developeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKey1` (`idTheme`);

--
-- Index pour la table `remarques`
--
ALTER TABLE `remarques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKey2` (`idQuestion`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `developeur`
--
ALTER TABLE `developeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `remarques`
--
ALTER TABLE `remarques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `foreignKey2` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
