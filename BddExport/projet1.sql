-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 oct. 2022 à 06:49
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `DevMod` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nom` varchar(50) DEFAULT NULL,
  `pnom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `score` int(30) DEFAULT NULL,
  `nivEtude` varchar(50) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `pnom`, `mail`, `score`, `nivEtude`, `Telephone`) VALUES
(1, 'jack', 'beauregard', 'mail@mail.fr', 5, 'jsp', NULL),
(4, 'tgh', 'med', 'jki@gh.fg', 0, 'Collège', NULL),
(6, 'tester', 'tester', 'tester@ui.fr', 8, 'Master', NULL),
(9, 'test2', 'testgh2', 'vb@hi.de', 1, 'Lycée', NULL),
(40, 'tes morts', 'mange', 'bk@ji.fr', 2, 'Collège', NULL),
(59, 'tyu', 'opo', 'kl@kl.fr', 4, 'Bac', NULL),
(60, 'Magi', 'DUfrey', 'df@gjk.fr', 0, 'Lycée', NULL),
(61, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'test3', 'fgh', 'fg@hg.fr', 2, 'Collège', '0654818194'),
(63, NULL, NULL, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'dfddfd', 'dddf', 'fg@fg.fr', 0, 'Collège', '0202020202'),
(76, 'mased', '', 'fg@fg.fg', 0, '', '1515151515'),
(77, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, NULL, NULL, NULL, NULL, NULL),
(79, NULL, NULL, NULL, NULL, NULL, NULL),
(80, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, NULL, NULL, NULL, NULL, NULL),
(82, NULL, NULL, NULL, NULL, NULL, NULL),
(83, NULL, NULL, NULL, NULL, NULL, NULL),
(84, NULL, NULL, NULL, NULL, NULL, NULL),
(85, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Sapristi', 'Saucisse', 'df@df.fr', 8, '', '0202020202'),
(87, NULL, NULL, NULL, NULL, NULL, NULL),
(88, NULL, NULL, NULL, NULL, NULL, NULL),
(89, NULL, NULL, NULL, NULL, NULL, NULL),
(90, NULL, NULL, NULL, NULL, NULL, NULL),
(91, NULL, NULL, NULL, NULL, NULL, NULL),
(92, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'test88', 'test88', 'df@df.df', 1, 'Collège', '0202020202'),
(94, 'test88', 'test88', 'df@df.df', 1, '', '0202020202'),
(95, 'dddddddddddd', 'Saucisse', 'df@df.fr', 4, '', '0202020202'),
(96, NULL, NULL, NULL, NULL, NULL, NULL),
(97, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Alfred', '', 'df@df.fr', 6, '', '0202020202'),
(99, NULL, NULL, NULL, NULL, NULL, NULL),
(100, NULL, NULL, NULL, NULL, NULL, NULL),
(101, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Quade', '', 'df@hj.fr', 5, 'Bac', '0101010101'),
(103, NULL, NULL, NULL, NULL, NULL, NULL),
(104, NULL, NULL, NULL, NULL, NULL, NULL),
(105, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'test3', 'med', 'fg@hg.fr', 0, '', '0654818194'),
(107, 'test3', 'med', 'fg@hg.fr', 0, '', '0654818194'),
(108, 'fg', 'fgh', 'fg@hg.fr', 0, '', '0654818194'),
(109, 'test3', 'Pruno', 'fg@fg.fg', 0, '', '0654818194'),
(110, 'Von Jasmin', 'med', 'ftg@uno.fr', 0, '', '0654818194'),
(111, 'Jean Kevin', 'fgh', 'ftg@uno.fr', 0, '', '0654818194'),
(112, NULL, NULL, NULL, NULL, NULL, NULL),
(113, NULL, NULL, NULL, NULL, NULL, NULL),
(114, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'test3', 'Sebastien', 'ftg@ui.fr', 0, '', '0654818194'),
(116, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Von Jasmin', 'med', 'ty@lm.fr', 0, '', '0654818194'),
(118, 'Quio', 'tyu', 'p@p.p', 4, 'Master', '0202020202'),
(119, NULL, NULL, NULL, NULL, NULL, NULL),
(120, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Sapristi', 'Saucisse', 'df@df.fr', 5, '', '0202020202'),
(122, NULL, NULL, NULL, NULL, NULL, NULL),
(123, NULL, NULL, NULL, NULL, NULL, NULL),
(124, NULL, NULL, NULL, NULL, NULL, NULL),
(125, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'test3', 'fgh', 'ftg@uno.fr', 0, '', '0654818194'),
(127, 'test3', 'fgh', 'fg@fg.fg', 0, '', '0654818194'),
(128, 'Sapristi', 'Saucisse', 'df@df.fr', 0, '', '0202020202'),
(129, 'Sapristi', 'Saucisse', 'df@df.fr', 0, '', '0202020202'),
(130, 'test3', 'fgh', 'fg@fg.fg', 4, '', '0654818194'),
(131, NULL, NULL, NULL, NULL, NULL, NULL),
(132, NULL, NULL, NULL, NULL, NULL, NULL),
(133, NULL, NULL, NULL, NULL, NULL, NULL),
(134, NULL, NULL, NULL, NULL, NULL, NULL),
(135, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Sapristji', 'Saucisse', 'df@df.fr', 4, '', '0202020202'),
(137, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Sapristi56', 'Saucisse', 'df@df.fr', 2, '', '0202020202'),
(139, 'Sapristi', 'Saucisse', 'df@df.fr', 5, '', '0202020202');

--
-- Index pour les tables déchargées
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
