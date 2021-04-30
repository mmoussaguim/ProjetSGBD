-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 03 déc. 2020 à 21:06
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ProjetSGBD`
--

-- --------------------------------------------------------

--
-- Structure de la table `APPARTENANCE`
--

CREATE TABLE `APPARTENANCE` (
  `NUMERO_LICENCE` int(11) NOT NULL,
  `NUMERO_EQUIPE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `APPARTENANCE`
--

INSERT INTO `APPARTENANCE` (`NUMERO_LICENCE`, `NUMERO_EQUIPE`) VALUES
(156175, 1),
(156176, 1),
(156177, 1),
(156178, 1),
(156179, 1),
(156180, 1),
(156181, 1),
(156182, 1),
(156183, 1),
(156184, 2),
(156185, 2),
(156186, 2),
(156187, 2),
(156188, 2),
(156189, 2),
(156190, 2),
(156191, 2),
(156192, 2),
(156193, 3),
(156194, 3),
(156195, 3),
(156196, 3),
(156197, 3),
(156198, 3),
(156199, 3),
(156200, 3),
(156201, 3),
(156202, 4),
(156203, 4),
(156204, 4),
(156205, 4),
(156206, 4),
(156207, 4),
(156208, 4),
(156209, 4),
(156210, 4),
(156211, 5),
(156212, 5),
(156213, 5),
(156214, 5),
(156215, 5),
(156216, 5),
(156217, 5),
(156218, 5),
(156219, 5),
(156220, 6),
(156221, 6),
(156222, 6),
(156223, 6),
(156224, 6),
(156225, 6),
(156226, 6),
(156227, 6),
(156228, 6),
(156229, 7),
(156230, 7),
(156231, 7),
(156232, 7),
(156233, 7),
(156234, 7),
(156235, 7),
(156236, 7),
(156237, 7),
(156238, 8),
(156239, 8),
(156240, 8),
(156241, 8),
(156242, 8),
(156243, 8),
(156244, 8),
(156245, 8),
(156246, 8),
(156247, 9),
(156248, 9),
(156249, 9),
(156250, 9),
(156251, 9),
(156252, 9),
(156253, 9),
(156254, 9),
(156255, 9),
(156256, 10),
(156257, 10),
(156258, 10),
(156259, 10),
(156260, 10),
(156261, 10),
(156262, 10),
(156263, 10),
(156264, 10),
(156265, 11),
(156266, 11),
(156267, 11),
(156268, 11),
(156269, 11),
(156270, 11),
(156271, 11),
(156272, 11),
(156273, 11),
(156274, 12),
(156275, 12),
(156276, 12),
(156277, 12),
(156278, 12),
(156279, 12),
(156280, 12),
(156281, 12),
(156282, 12),
(156283, 13),
(156284, 13),
(156285, 13),
(156286, 13),
(156287, 13),
(156288, 13),
(156289, 13),
(156290, 13),
(156291, 13),
(156292, 14),
(156293, 14),
(156294, 14),
(156295, 14),
(156296, 14),
(156297, 14),
(156298, 14),
(156299, 14),
(156300, 14),
(156301, 15),
(156302, 15),
(156303, 15),
(156304, 15),
(156305, 15),
(156306, 15),
(156307, 15),
(156308, 15),
(156309, 15),
(156310, 16),
(156311, 16),
(156312, 16),
(156313, 16),
(156314, 16),
(156315, 16),
(156316, 16),
(156317, 16),
(156318, 16);

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `NUMERO_CATEGORIE` int(11) NOT NULL,
  `NOM_CATEGORIE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `CATEGORIE`
--

INSERT INTO `CATEGORIE` (`NUMERO_CATEGORIE`, `NOM_CATEGORIE`) VALUES
(1, 'Benjamin'),
(2, 'Minime'),
(3, 'Cadet'),
(4, 'Junior');

-- --------------------------------------------------------

--
-- Structure de la table `CLUB`
--

CREATE TABLE `CLUB` (
  `NUMERO_CLUB` int(11) NOT NULL,
  `NOM_CLUB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `CLUB`
--

INSERT INTO `CLUB` (`NUMERO_CLUB`, `NOM_CLUB`) VALUES
(1, 'GIRONDAIS DE BORDEAUX '),
(2, 'EHB EYSINES HANDBALL'),
(3, 'PHB PESSAC HANDBALL'),
(4, 'MHB MERIGNAC HANDBALL');

-- --------------------------------------------------------

--
-- Structure de la table `ENTRAINEMENT`
--

CREATE TABLE `ENTRAINEMENT` (
  `NUMERO_ENTRAINEUR` int(11) NOT NULL,
  `NUMERO_EQUIPE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ENTRAINEMENT`
--

INSERT INTO `ENTRAINEMENT` (`NUMERO_ENTRAINEUR`, `NUMERO_EQUIPE`) VALUES
(1, 14),
(2, 15),
(3, 13),
(4, 16),
(5, 5),
(6, 8),
(7, 6),
(8, 7),
(9, 9),
(10, 10),
(11, 11),
(11, 12),
(12, 4),
(13, 3),
(14, 2),
(15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ENTRAINEUR`
--

CREATE TABLE `ENTRAINEUR` (
  `NUMERO_ENTRAINEUR` int(11) NOT NULL,
  `NUMERO_CLUB` int(11) NOT NULL,
  `NOM_ENTRAINEUR` varchar(50) NOT NULL,
  `PRENOM_ENTRAINEUR` varchar(50) DEFAULT NULL,
  `DATE_ENTREE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ENTRAINEUR`
--

INSERT INTO `ENTRAINEUR` (`NUMERO_ENTRAINEUR`, `NUMERO_CLUB`, `NOM_ENTRAINEUR`, `PRENOM_ENTRAINEUR`, `DATE_ENTREE`) VALUES
(1, 4, 'ROHMER', 'ERIC', '2020-10-19'),
(2, 4, 'BESSON', 'LUC', '2020-10-19'),
(3, 4, 'BAUDE', 'LUC', '2018-10-09'),
(4, 4, 'MALE', 'LOUIS', '2019-11-19'),
(5, 2, 'SAUTET', 'LUC', '2020-10-19'),
(6, 2, 'BRUN', 'LUCAS', '2019-10-09'),
(7, 2, 'MATE', 'CATY', '2019-01-19'),
(8, 2, 'CHAR', 'LOUISA', '2019-11-19'),
(9, 3, 'COCTEAU', 'LUC', '2019-12-19'),
(10, 3, 'BESAV', 'MONIQUE', '2018-05-09'),
(11, 3, 'MALE', 'LARA', '2019-11-25'),
(12, 1, 'YVAN', 'BENOIT', '2018-10-25'),
(13, 1, 'BRADE', 'PETER', '2019-04-09'),
(14, 1, 'MATE', 'BRANDON', '2019-05-19'),
(15, 1, 'MARTY', 'PATRICK', '2019-05-19');

-- --------------------------------------------------------

--
-- Structure de la table `EQUIPE`
--

CREATE TABLE `EQUIPE` (
  `NUMERO_EQUIPE` int(11) NOT NULL,
  `NUMERO_CLUB` int(11) NOT NULL,
  `NUMERO_CATEGORIE` int(11) NOT NULL,
  `NOM_EQUIPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `EQUIPE`
--

INSERT INTO `EQUIPE` (`NUMERO_EQUIPE`, `NUMERO_CLUB`, `NUMERO_CATEGORIE`, `NOM_EQUIPE`) VALUES
(1, 1, 1, 'GB-BenjaminI'),
(2, 1, 2, 'GB-MinimeI'),
(3, 1, 3, 'GB-CadetI'),
(4, 1, 4, 'GB-JuniorI'),
(5, 2, 1, 'EHB-BenjaminI'),
(6, 2, 2, 'EHB-MinimeI'),
(7, 2, 3, 'EHB-CadetI'),
(8, 2, 4, 'EHB-JuniorI'),
(9, 3, 1, 'PHB-BenjaminI'),
(10, 3, 2, 'PHB-MinimeI'),
(11, 3, 3, 'PHB-CadetI'),
(12, 3, 4, 'PHB-JuniorI'),
(13, 4, 1, 'MHB-BenjaminI'),
(14, 4, 2, 'MHB-MinimeI'),
(15, 4, 3, 'MHB-CadetI'),
(16, 4, 4, 'MHB-JuniorI');

-- --------------------------------------------------------

--
-- Structure de la table `FONCTION`
--

CREATE TABLE `FONCTION` (
  `NUMERO_CLUB` int(11) NOT NULL,
  `NUMERO_PERSONNEL` int(11) NOT NULL,
  `NOM_POSTE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FONCTION`
--

INSERT INTO `FONCTION` (`NUMERO_CLUB`, `NUMERO_PERSONNEL`, `NOM_POSTE`) VALUES
(1, 383630, 'Président'),
(1, 383631, 'Vice-Président'),
(1, 383632, 'Trésorier'),
(1, 383633, 'Secrétaire'),
(2, 383626, 'Président'),
(2, 383627, 'Vice-Président'),
(2, 383628, 'Trésorier'),
(2, 383629, 'Secrétaire'),
(3, 383621, 'Président'),
(3, 383623, 'Vice-Président'),
(3, 383624, 'Trésorier'),
(3, 383625, 'Secrétaire'),
(4, 383634, 'Président'),
(4, 383635, 'Vice-Président'),
(4, 383636, 'Trésorier'),
(4, 383637, 'Secrétaire');

-- --------------------------------------------------------

--
-- Structure de la table `JOUEUR`
--

CREATE TABLE `JOUEUR` (
  `NUMERO_LICENCE` int(11) NOT NULL,
  `NUMERO_CLUB` int(11) NOT NULL,
  `NOM_JOUEUR` varchar(50) NOT NULL,
  `PRENOM_JOUEUR` varchar(50) DEFAULT NULL,
  `ADRESSE` varchar(50) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `DATE_ENTREE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `JOUEUR`
--

INSERT INTO `JOUEUR` (`NUMERO_LICENCE`, `NUMERO_CLUB`, `NOM_JOUEUR`, `PRENOM_JOUEUR`, `ADRESSE`, `DATE_DE_NAISSANCE`, `DATE_ENTREE`) VALUES
(156175, 1, 'ZIDII', 'CLAUDE', '19 Avenue Jean Jaures 33300 Bordeaux', '2008-05-23', '2020-01-10'),
(156176, 1, 'SALY', 'MANUEL', '10 Avenue Jean Jaures 33300 Bordeaux', '2008-03-05', '2020-01-10'),
(156177, 1, 'SOW', 'IBRAHIM', '19 Avenue Saige 33600 Pessac', '2008-02-20', '2020-01-10'),
(156178, 1, 'FERRON', 'XAVIER', '19 Avenue Maguelant 33400 Talence', '2008-05-09', '2020-01-10'),
(156179, 1, 'DUPONT', 'FELIX', '15 Avenue Barriére de Paris 33300 Bordeaux', '2009-08-15', '2020-01-10'),
(156180, 1, 'FARBE', 'DAVID', '22 Rue La vache 33300 Bordeaux', '2009-09-03', '2020-01-10'),
(156181, 1, 'BROWN', 'YANICK', '19 Avenue Gambetta 33300 Bordeaux', '2008-05-23', '2020-01-15'),
(156182, 1, 'DUBOIT', 'ANGEL', '19 Avenue des Gustave EIffel 33600 Pessac', '2009-06-23', '2020-01-11'),
(156183, 1, 'CARTER', 'BENOIT', '23 Avenue Marechal Forch 33600 Pessac', '2008-04-03', '2020-01-11'),
(156184, 1, 'BLARD', 'YVES', '23 Avenue Stade Nautique 33600 Pessac', '2007-12-23', '2020-01-10'),
(156185, 1, 'SADKI', 'MOUAD', '10 Avenue Jean Jaures 33300 Bordeaux', '2006-03-05', '2020-01-10'),
(156186, 1, 'DIOP', 'BOUBA', '19 Avenue Saige 33600 Pessac', '2007-02-20', '2020-01-10'),
(156187, 1, 'FAVY', 'YVAN', '19 Avenue Maguelant 33400 Talence', '2006-05-09', '2020-01-10'),
(156188, 1, 'DARMET', 'FABIEN', '15 Avenue Barriére de Paris 33300 Bordeaux', '2007-08-15', '2020-01-10'),
(156189, 1, 'FARBE', 'DENIS', '22 Rue La vache 33300 Bordeaux', '2007-09-03', '2020-01-10'),
(156190, 1, 'BRANDON', 'PITER', '19 Avenue Gambetta 33300 Bordeaux', '2006-05-23', '2020-01-15'),
(156191, 1, 'VINGH', 'MANNON', '19 Avenue des Gustave EIffel 33600 Pessac', '2007-06-23', '2020-01-11'),
(156192, 1, 'CARTER', 'HUGO', '23 Avenue Marechal Forch 33600 Pessac', '2006-04-03', '2020-01-11'),
(156193, 1, 'HAMET', 'BARBE', '23 Avenue Stade Nautique 33600 Pessac', '2005-01-23', '2020-01-10'),
(156194, 1, 'BOIS', 'CLAUDE', '10 Avenue Jean Jaures 33300 Bordeaux', '2004-03-05', '2020-01-10'),
(156195, 1, 'BA', 'BERNARD', '19 Avenue Unitec 33600 Pessac', '2005-02-20', '2020-03-10'),
(156196, 1, 'DOS SANTOS', 'PATRICK', '19 Avenue Maguelant 33400 Talence', '2004-07-09', '2020-01-10'),
(156197, 1, 'SANTOS', 'FERDINAND', '15 Avenue Barriére de Paris 33300 Bordeaux', '2004-08-15', '2020-01-10'),
(156198, 1, 'GUEDON', 'FABRICE', '22 Rue du LAC 33300 Bordeaux', '2004-09-03', '2020-01-10'),
(156199, 1, 'WALICE', 'MEGAN', '19 Avenue Gambetta 33300 Bordeaux', '2005-05-23', '2020-01-15'),
(156200, 1, 'MARTE', 'ADAMA', '19 Avenue des Gustave EIffel 33600 Pessac', '2005-06-23', '2020-01-11'),
(156201, 1, 'TARAN', 'BEN', '23 Avenue Marechal Forch 33600 Pessac', '2005-04-03', '2020-01-11'),
(156202, 1, 'ANGLADE', 'BASTIEN', '23 Avenue France Alouette 33600 Pessac', '2003-01-23', '2020-01-10'),
(156203, 1, 'NEWMAN', 'TOM', '10 Avenue Jean Jaures 33300 Bordeaux', '2002-03-05', '2020-01-10'),
(156204, 1, 'RENO', 'ALEX', '19 Avenue Unitec 33600 Pessac', '2002-02-20', '2020-03-10'),
(156205, 1, 'SANTOS', 'TANGUY', '19 Avenue Maguelant 33400 Talence', '2002-08-19', '2020-01-10'),
(156206, 1, 'BARR', 'AMELIE', '15 Avenue Barriére de Paris 33300 Bordeaux', '2002-05-15', '2020-01-10'),
(156207, 1, 'LANGLET', 'FABRIE', '22 Rue de Borderouge 33300 Bordeaux', '2002-07-03', '2020-01-10'),
(156208, 1, 'RIVIERE', 'PAUL', '19 Avenue Saint Nicolas 33300 Bordeaux', '2003-05-23', '2020-01-15'),
(156209, 1, 'CESAR', 'ADAM', '19 Avenue des Gustave EIffel 33600 Pessac', '2003-06-23', '2020-01-11'),
(156210, 1, 'HONORE', 'BEN', '23 Avenue Marechal Gallieni 33300 Bordeaux', '2003-04-03', '2020-01-11'),
(156211, 2, 'BRETON', 'DENIS', '19 Avenue des Facultés 33400 Talence', '2008-05-09', '2020-01-10'),
(156212, 2, 'LYON', 'NICOLAS', '10 Avenue Jean Jaures 33300 Bordeaux', '2008-03-05', '2020-01-10'),
(156213, 2, 'CHEVALIER', 'JACOB', '19 Avenue Saige 33600 Pessac', '2008-02-20', '2020-01-10'),
(156214, 2, 'GEO', 'SIMON', '19 Avenue Maguelant 33400 Talence', '2008-05-09', '2020-01-10'),
(156215, 2, 'GOURIER', 'THIBAUT', '15 Avenue Barriére de Paris 33300 Bordeaux', '2009-08-15', '2020-01-10'),
(156216, 2, 'GOURIOT', 'LEO', '22 Rue Michel Teule33300 Bordeaux', '2009-09-03', '2020-01-10'),
(156217, 2, 'MARCHAL', 'THEO', '19 Avenue Gambetta 33300 Bordeaux', '2008-05-09', '2020-01-15'),
(156218, 2, 'LEMARCHANT', 'CLEMENT', '19 Avenue des Gustave EIffel 33600 Pessac', '2009-06-09', '2020-01-11'),
(156219, 2, 'BIGO', 'BARBARA', '09 Avenue Marechal Forch 33600 Pessac', '2008-04-03', '2020-01-11'),
(156220, 2, 'BOUCHER', 'MARINE', '19 Avenue des Facultés 33400 Talence', '2006-05-09', '2020-01-10'),
(156221, 2, 'LELIEVRE', 'EVA', '10 Avenue Jean Jaures 33300 Bordeaux', '2006-03-05', '2020-01-10'),
(156222, 2, 'DUBOIT', 'MOHAMED', '19 Avenue Saige 33600 Pessac', '2006-02-20', '2020-01-10'),
(156223, 2, 'LECOQ', 'SABRINA', '19 Avenue Maguelant 33400 Talence', '2006-05-09', '2020-01-10'),
(156224, 2, 'COLLETON', 'THIBAUT', '15 Avenue Barriére de Paris 33300 Bordeaux', '2007-08-15', '2020-01-10'),
(156225, 2, 'VERIER', 'ERIC', '22 Rue Michel Teule33300 Bordeaux', '2007-09-03', '2020-01-10'),
(156226, 2, 'BECAN', 'ZIBER', '19 Avenue Gambetta 33300 Bordeaux', '2006-05-09', '2020-01-15'),
(156227, 2, 'DARTIER', 'SOULEYMANE', '19 Avenue des Gustave EIffel 33600 Pessac', '2007-06-09', '2020-01-11'),
(156228, 2, 'CISSE', 'LAMINE', '09 Avenue Marechal Forch 33600 Pessac', '2006-04-03', '2020-01-11'),
(156229, 2, 'MAESTRO', 'MAX', '19 Avenue des Facultés 33400 Talence', '2005-05-09', '2020-01-10'),
(156230, 2, 'LITT', 'ALEX', '10 Avenue Jean Jaures 33300 Bordeaux', '2005-03-05', '2020-01-10'),
(156231, 2, 'SPECTEUR', 'EMMA', '19 Avenue Saige 33600 Pessac', '2005-02-20', '2020-01-10'),
(156232, 2, 'MBAPPE', 'GASTON', '19 Avenue Maguelant 33400 Talence', '2005-05-09', '2020-01-10'),
(156233, 2, 'SAMOTTE', 'GUTAMBERT', '15 Avenue Barriére de Paris 33300 Bordeaux', '2004-08-15', '2020-01-10'),
(156234, 2, 'LODZINA', 'VINCENT', '22 Rue Michel Teule33300 Bordeaux', '2004-09-03', '2020-01-10'),
(156235, 2, 'GIROU', 'THOMAS', '19 Avenue Gambetta 33300 Bordeaux', '2005-05-09', '2020-01-15'),
(156236, 2, 'SAMATE', 'MARVIN', '19 Avenue des Gustave EIffel 33600 Pessac', '2004-06-09', '2020-01-11'),
(156237, 2, 'GUEDJ', 'BENJAMIN', '09 Avenue Marechal Forch 33600 Pessac', '2005-04-03', '2020-01-11'),
(156238, 2, 'ROSS', 'AMADOU', '19 Avenue des Facultés 33400 Talence', '2002-05-09', '2020-01-10'),
(156239, 2, 'BARTE', 'ARTHUR', '10 Avenue Jean Jaures 33300 Bordeaux', '2002-03-05', '2020-01-10'),
(156240, 2, 'JEAN-MARIE', 'NALA', '19 Avenue Saige 33600 Pessac', '2002-02-20', '2020-01-10'),
(156241, 2, 'DECHANT', 'VAGELARD', '19 Avenue Maguelant 33400 Talence', '2002-05-09', '2020-01-10'),
(156242, 2, 'HENNEUSE', 'CHRIS', '15 Avenue Barriére de Paris 33300 Bordeaux', '2003-08-15', '2020-01-10'),
(156243, 2, 'LECLERC', 'MIKE', '22 Rue Michel Teule33300 Bordeaux', '2003-09-03', '2020-01-10'),
(156244, 2, 'AUCHAN', 'THOMAS', '19 Avenue Gambetta 33300 Bordeaux', '2002-05-09', '2020-01-15'),
(156245, 2, 'HADAD', 'GERARD', '19 Avenue des Gustave EIffel 33600 Pessac', '2003-06-09', '2020-01-11'),
(156246, 2, 'TOUTPOUR', 'BERNABIER', '09 Avenue Marechal Forch 33600 Pessac', '2002-04-03', '2020-01-11'),
(156247, 3, 'EBINTO', 'ROUAN', '19 Avenue des Facultés 33700 Merignac', '2008-05-09', '2020-01-10'),
(156248, 3, 'WOUDORD', 'IZAC', '10 Avenue Jean Jaures 33300 Bordeaux', '2008-03-05', '2020-01-10'),
(156249, 3, 'KIPENBE', 'KORNOR', '19 Avenue Saige 33600 Pessac', '2008-02-20', '2020-01-10'),
(156250, 3, 'HENNON', 'CHRISTIAN', '19 Avenue Maguelant 33700 Merignac', '2008-05-09', '2020-01-10'),
(156251, 3, 'PERSSON', 'LOUIS', '15 Avenue Barriére de Paris 33300 Bordeaux', '2009-08-15', '2020-01-10'),
(156252, 3, 'HERLING', 'ARNAUD', '22 Rue Michel Teule33300 Bordeaux', '2009-09-03', '2020-01-10'),
(156253, 3, 'RACANIER', 'BERNARD', '19 Avenue Gambetta 33300 Bordeaux', '2008-05-09', '2020-01-15'),
(156254, 3, 'CHEVALIER', 'HENRI', '19 Avenue des Gustave EIffel 33600 Pessac', '2009-06-09', '2020-01-11'),
(156255, 3, 'RACAMIER', 'ALAIN', '09 Avenue Marechal Forch 33600 Pessac', '2008-04-03', '2020-01-11'),
(156256, 3, 'ESKOVAR', 'ROUAN', '19 Avenue de Tonnell 33700 Merignac', '2007-05-09', '2020-01-10'),
(156257, 3, 'TATA', 'IZAC', '10 Avenue Jean Jaures 33300 Bordeaux', '2007-03-05', '2020-01-10'),
(156258, 3, 'FERNANDES', 'KORNOR', '19 Avenue Saige 33600 Pessac', '2007-02-20', '2020-01-10'),
(156259, 3, 'HERNANDES', 'CHRISTIAN', '19 Avenue Maguelant 33700 Merignac', '2007-05-09', '2020-01-10'),
(156260, 3, 'ABDALLAH', 'YANIS', '15 Avenue Barriére de Paris 33300 Bordeaux', '2006-08-15', '2020-01-10'),
(156261, 3, 'LECHEVALIER', 'ARNAUD', '22 Rue Michel Teule 33300 Bordeaux', '2006-09-03', '2020-01-10'),
(156262, 3, 'CHARPENTIER', 'BERNARD', '19 Avenue Gambetta 33300 Bordeaux', '2007-05-09', '2020-01-15'),
(156263, 3, 'BERGO', 'HENRI', '19 Avenue des Gustave EIffel 33600 Pessac', '2006-06-09', '2020-01-11'),
(156264, 3, 'BESCON', 'ALAIN', '09 Avenue Marechal Forch 33600 Pessac', '2007-04-03', '2020-01-11'),
(156265, 3, 'GALLE', 'ROBERT', '19 Avenue de Tonnell 33700 Merignac', '2004-05-09', '2020-01-10'),
(156266, 3, 'DALLE', 'MOISE', '10 Avenue Jean Jaures 33300 Bordeaux', '2004-06-05', '2020-01-10'),
(156267, 3, 'BISON', 'KONOR', '19 Avenue Saige 33600 Pessac', '2004-02-20', '2020-01-10'),
(156268, 3, 'TEISSON', 'CHRISTIAN', '19 Avenue Maguelant 33700 Merignac', '2004-05-09', '2020-01-10'),
(156269, 3, 'BESOSS', 'LOUIS', '15 Avenue Barriére de Paris 33300 Bordeaux', '2004-08-15', '2020-01-10'),
(156270, 3, 'ZUKA', 'ARNAUD', '22 Rue Jackou 33300 Bordeaux', '2004-09-16', '2020-01-10'),
(156271, 3, 'DIALLO', 'ZIBER', '19 Avenue Gambetta 33300 Bordeaux', '2004-05-09', '2020-01-15'),
(156272, 3, 'GARBA', 'MOUSTAPHA', '19 Avenue des Gustave EIffel 33600 Pessac', '2004-06-09', '2020-01-11'),
(156273, 3, 'BARKIRE', 'HASSANE', '09 Avenue Marechal Forch 33600 Pessac', '2004-04-16', '2020-01-11'),
(156274, 3, 'BERGO', 'KEVIN', '19 Avenue des Facultés 33700 Merignac', '2002-05-09', '2020-01-10'),
(156275, 3, 'BESCON', 'RENAULD', '10 Avenue Jean Jaures 33300 Bordeaux', '2003-03-05', '2020-01-10'),
(156276, 3, 'BISON', 'HAROLD', '19 Avenue Saige 33600 Pessac', '2003-02-20', '2020-01-10'),
(156277, 3, 'CHARPENTIER', 'CHRISTIAN', '19 Avenue Maguelant 33700 Merignac', '2003-05-09', '2020-01-10'),
(156278, 3, 'FERNANDES', 'LOUIS', '15 Avenue Barriére de Paris 33300 Bordeaux', '2002-08-15', '2020-01-10'),
(156279, 3, 'HERNANDES', 'MARIN', '22 Rue Michel Teule 33300 Bordeaux', '2002-09-03', '2020-01-10'),
(156280, 3, 'GALLE', 'GUSTAVE', '19 Avenue Gambetta 33300 Bordeaux', '2003-05-09', '2020-01-15'),
(156281, 3, 'GUEDON', 'FORCH', '19 Avenue des Gustave EIffel 33600 Pessac', '2002-06-09', '2020-01-11'),
(156282, 3, 'BARTE', 'DORIAN', '09 Avenue Marechal Forch 33600 Pessac', '2003-04-03', '2020-01-11'),
(156283, 4, 'SEBA', 'LICENDRO', '19 Avenue des Facultés 33700 Merignac', '2008-05-09', '2020-01-10'),
(156284, 4, 'KAMPALA', 'DAV', '10 Avenue Jean Jaures 33300 Bordeaux', '2008-03-05', '2020-01-10'),
(156285, 4, 'MAGUELANT', 'AXEL', '19 Avenue Henri Mares 33600 Pessac', '2008-02-20', '2020-01-10'),
(156286, 4, 'JACKSON', 'CHRIS', '19 Avenue Maguelant 33700 Merignac', '2008-05-09', '2020-01-10'),
(156287, 4, 'MARLEY', 'WAYEL', '15 Avenue Barriére de Paris 33300 Bordeaux', '2009-08-15', '2020-01-10'),
(156288, 4, 'SANGARE', 'KAIS', '22 Rue Michel Teule33300 Bordeaux', '2009-09-03', '2020-01-10'),
(156289, 4, 'LELASSEUX', 'BERNARD', '19 Avenue Gambetta 33300 Bordeaux', '2008-05-09', '2020-01-15'),
(156290, 4, 'INNOSSENTI', 'HENRI', '19 Avenue des Gustave EIffel 33600 Pessac', '2009-06-09', '2020-01-11'),
(156291, 4, 'RAY', 'ALAIN', '09 Avenue Marechal Forch 33600 Pessac', '2008-04-03', '2020-01-11'),
(156292, 4, 'INNOCENT', 'ROUAN', '19 Avenue de Tonnell 33700 Merignac', '2007-05-09', '2020-01-10'),
(156293, 4, 'TONI', 'IMEN', '10 Avenue Jean Jaures 33300 Bordeaux', '2007-03-05', '2020-01-10'),
(156294, 4, 'FERNAND', 'AMEL', '19 Avenue Henri Mares 33600 Pessac', '2007-02-20', '2020-01-10'),
(156295, 4, 'FERDIAND', 'CAMRON', '19 Avenue Maguelant 33700 Merignac', '2007-05-09', '2020-01-10'),
(156296, 4, 'COLY', 'KARAN', '15 Avenue Barriére de Paris 33300 Bordeaux', '2006-08-15', '2020-01-10'),
(156297, 4, 'LAPOSTE', 'JESSIE', '22 Rue Michel Teule 33300 Bordeaux', '2006-09-03', '2020-01-10'),
(156298, 4, 'BOURGEOIS', 'BERNARD', '19 Avenue Charles De Gaulle 33300 Bordeaux', '2007-05-09', '2020-01-15'),
(156299, 4, 'DUPONT', 'RAVI', '19 Avenue des Gustave EIffel 33600 Pessac', '2006-06-09', '2020-01-11'),
(156300, 4, 'DUPUIS', 'GREGOIRE', '09 Avenue Marechal Forch 33600 Pessac', '2007-04-03', '2020-01-11'),
(156301, 4, 'DUPOND', 'BERTRAND', '19 Avenue de Tonnell 33400 Talence', '2004-05-09', '2020-01-10'),
(156302, 4, 'BINETA', 'LUC', '10 Avenue Jean Jaures 33300 Bordeaux', '2004-06-05', '2020-01-10'),
(156303, 4, 'CASTOR', 'KONOR', '19 Avenue Henri Mares 33600 Pessac', '2004-02-20', '2020-01-10'),
(156304, 4, 'CASSAGNE', 'GREGORIE', '19 Avenue Maguelant 33400 Talence', '2004-05-09', '2020-01-10'),
(156305, 4, 'DELABLACH', 'KESSO', '21 Avenue Barriére de Paris 33300 Bordeaux', '2004-08-21', '2020-01-10'),
(156306, 4, 'VIDAL', 'ARNAUD', '22 Rue Jackou 33300 Bordeaux', '2004-09-16', '2020-01-10'),
(156307, 4, 'PICARR', 'EDAN', '19 Avenue Gambetta 33300 Bordeaux', '2004-05-09', '2020-01-21'),
(156308, 4, 'RAYMOND', 'JOSEPH', '19 Avenue des Gustave EIffel 33600 Pessac', '2004-06-09', '2020-01-11'),
(156309, 4, 'ROUSTAING', 'MAYLON', '09 Avenue Marechal Forch 33600 Pessac', '2004-04-16', '2020-01-11'),
(156310, 4, 'LIBAN', 'KEVIN', '19 Avenue des Facultés 33400 Talence', '2002-05-09', '2020-01-10'),
(156311, 4, 'RENE', 'HENRI', '10 Avenue Jean Jaures 33300 Bordeaux', '2003-03-05', '2020-01-10'),
(156312, 4, 'BLANC', 'HAROLD', '19 Avenue Henri Mares 33600 Pessac', '2003-02-20', '2020-01-10'),
(156313, 4, 'LENORMAND', 'JULIANNE', '19 Avenue Maguelant 33400 Talence', '2003-05-09', '2020-01-10'),
(156314, 4, 'FORCH', 'LOUIS', '21 Avenue Barriére de Paris 33300 Bordeaux', '2002-08-21', '2020-01-10'),
(156315, 4, 'POULI', 'JULIEN', '22 Rue Michel Teule 33300 Bordeaux', '2002-09-03', '2020-01-10'),
(156316, 4, 'VOULET', 'NILAN', '19 Avenue Gambetta 33300 Bordeaux', '2003-05-09', '2020-01-21'),
(156317, 4, 'CHANOINE', 'LIAM', '19 Avenue des Gustave EIffel 33600 Pessac', '2002-06-09', '2020-01-11'),
(156318, 4, 'BARTE', 'KENIN', '09 Avenue Marechal Forch 33600 Pessac', '2003-04-03', '2020-01-11');

-- --------------------------------------------------------

--
-- Structure de la table `PARTIE`
--

CREATE TABLE `PARTIE` (
  `NUMERO_RENCONTRE` int(11) NOT NULL,
  `NUMERO_EQUIPE1` int(11) NOT NULL,
  `NUMERO_EQUIPE2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `PARTIE`
--

INSERT INTO `PARTIE` (`NUMERO_RENCONTRE`, `NUMERO_EQUIPE1`, `NUMERO_EQUIPE2`) VALUES
(1, 1, 5),
(2, 9, 13),
(3, 1, 13),
(4, 5, 9),
(5, 5, 13),
(6, 1, 9),
(7, 2, 6),
(8, 10, 14),
(9, 2, 14),
(10, 6, 10),
(11, 6, 14),
(12, 2, 10),
(13, 3, 7),
(14, 11, 15),
(15, 3, 15),
(16, 11, 7),
(17, 3, 11),
(18, 7, 15),
(19, 4, 8),
(20, 12, 16),
(21, 4, 12),
(22, 8, 16),
(23, 8, 12),
(24, 4, 16);

-- --------------------------------------------------------

--
-- Structure de la table `PERSONNEL`
--

CREATE TABLE `PERSONNEL` (
  `NUMERO_PERSONNEL` int(11) NOT NULL,
  `NOM_PERSONNEL` varchar(50) NOT NULL,
  `PRENOM_PERSONNEL` varchar(50) DEFAULT NULL,
  `ADRESSE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `PERSONNEL`
--

INSERT INTO `PERSONNEL` (`NUMERO_PERSONNEL`, `NOM_PERSONNEL`, `PRENOM_PERSONNEL`, `ADRESSE`) VALUES
(383621, 'RICHOUT', 'CLEMENT', '19 Rue de l\'Aspirant 33600 Pessac'),
(383623, 'GROSSOLEIL', 'ELSA', '10 Rue de l\'Aspirant 33600 Pessac'),
(383624, 'BOURDALLE', 'LAURENT', '19 Avenue des Facultés 33600 Pessac'),
(383625, 'DUPERE', 'JEAN-MICHEL', '10 Rue du Charcutier 33300 Bordeaux'),
(383626, 'AZZARELO', 'FRANCIS', '15 Rue Doyen Gosse 33400 Talence'),
(383627, 'ETIENOT', 'ANTONY', '19 Avenue Gambetta 33700 Merignac'),
(383628, 'GAFSI', 'SABRINA', '23 Bariére de Toulouse 33300 Bordeaux'),
(383629, 'TORNERO', 'NICOLAS', '10 Avenue Trois cocus 33300 Bordeaux'),
(383630, 'MALICHECK', 'CHRISTIAN', '23 Rue de la Marne 33300 Bordeaux'),
(383631, 'DROUIN', 'FABIEN', '23 Rue de la Victoire 33300 Bordeaux'),
(383632, 'GUINOBERT', 'DOMINIQUE', '23 Bariére de Paris 33300 Bordeaux'),
(383633, 'GUEGANT', 'JOEL', '23 Rue de la Marne 33300 Bordeaux'),
(383634, 'ZAUG', 'ALEXANDRE', '19 Avenue Gambetta 33700 Merignac'),
(383635, 'MORGANTI', 'PASCAL', '23 Rue de la Marne 33300 Bordeaux'),
(383636, 'MAURY', 'WILHEMINE', '20 Rue de la Victoire 33300 Bordeaux'),
(383637, 'MAURALY', 'DIDIER', '19 Avenue Gambetta 33700 Merignac');

-- --------------------------------------------------------

--
-- Structure de la table `POINT_JOUEUR`
--

CREATE TABLE `POINT_JOUEUR` (
  `NUMERO_LICENCE` int(11) NOT NULL,
  `NUMERO_RENCONTRE` int(11) NOT NULL,
  `POINTS_MARQUES` int(11) NOT NULL,
  `FAUTES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `POINT_JOUEUR`
--

INSERT INTO `POINT_JOUEUR` (`NUMERO_LICENCE`, `NUMERO_RENCONTRE`, `POINTS_MARQUES`, `FAUTES`) VALUES
(156175, 6, 3, 1),
(156177, 1, 5, 1),
(156178, 1, 0, 2),
(156178, 3, 3, 1),
(156178, 6, 3, 0),
(156179, 1, 4, 2),
(156179, 3, 6, 3),
(156179, 6, 1, 0),
(156180, 3, 4, 2),
(156181, 1, 6, 0),
(156181, 3, 2, 1),
(156182, 1, 4, 0),
(156183, 6, 3, 1),
(156184, 7, 7, 1),
(156184, 9, 5, 1),
(156185, 7, 5, 0),
(156185, 9, 4, 0),
(156186, 7, 1, 0),
(156186, 9, 1, 1),
(156191, 12, 6, 0),
(156192, 12, 3, 1),
(156193, 13, 4, 0),
(156193, 15, 4, 0),
(156194, 15, 3, 0),
(156197, 13, 3, 2),
(156200, 17, 5, 0),
(156201, 17, 4, 0),
(156203, 21, 5, 0),
(156204, 21, 5, 0),
(156205, 24, 3, 0),
(156208, 24, 4, 2),
(156209, 19, 8, 0),
(156210, 19, 0, 2),
(156211, 1, 8, 0),
(156211, 4, 6, 1),
(156211, 5, 6, 1),
(156212, 4, 6, 3),
(156212, 5, 5, 0),
(156213, 1, 7, 3),
(156213, 4, 4, 2),
(156213, 5, 4, 0),
(156214, 4, 3, 1),
(156217, 1, 4, 1),
(156217, 5, 3, 1),
(156220, 7, 2, 0),
(156220, 10, 5, 1),
(156221, 7, 4, 0),
(156223, 7, 4, 2),
(156225, 10, 4, 0),
(156225, 11, 3, 0),
(156226, 10, 6, 1),
(156226, 11, 3, 1),
(156227, 7, 6, 1),
(156229, 13, 4, 1),
(156229, 16, 7, 1),
(156230, 13, 2, 0),
(156230, 16, 6, 0),
(156230, 18, 5, 0),
(156231, 18, 5, 0),
(156238, 22, 5, 0),
(156238, 23, 5, 0),
(156239, 22, 4, 0),
(156239, 23, 4, 0),
(156244, 19, 4, 5),
(156245, 19, 4, 0),
(156247, 2, 8, 0),
(156247, 4, 6, 4),
(156247, 6, 3, 0),
(156248, 4, 7, 0),
(156249, 2, 6, 2),
(156250, 4, 7, 2),
(156250, 6, 4, 0),
(156251, 6, 2, 2),
(156252, 6, 3, 1),
(156253, 2, 4, 1),
(156253, 4, 5, 1),
(156256, 8, 5, 1),
(156256, 10, 5, 0),
(156257, 10, 5, 0),
(156259, 8, 5, 0),
(156259, 10, 0, 2),
(156262, 8, 0, 2),
(156263, 12, 4, 0),
(156264, 12, 2, 0),
(156265, 14, 4, 0),
(156265, 16, 8, 0),
(156266, 16, 3, 0),
(156269, 14, 5, 2),
(156269, 17, 6, 0),
(156270, 14, 2, 2),
(156270, 17, 6, 0),
(156274, 20, 5, 0),
(156274, 21, 4, 2),
(156275, 21, 8, 0),
(156275, 23, 6, 0),
(156276, 23, 6, 0),
(156280, 20, 4, 0),
(156283, 5, 3, 4),
(156284, 2, 6, 1),
(156284, 3, 4, 0),
(156284, 5, 4, 0),
(156285, 2, 0, 3),
(156286, 2, 2, 3),
(156286, 3, 5, 0),
(156287, 3, 3, 2),
(156288, 2, 5, 0),
(156288, 3, 1, 1),
(156289, 2, 5, 0),
(156290, 5, 6, 2),
(156291, 5, 5, 1),
(156292, 8, 6, 0),
(156292, 9, 5, 0),
(156295, 11, 4, 0),
(156296, 8, 4, 0),
(156296, 9, 5, 0),
(156296, 11, 2, 0),
(156300, 8, 4, 2),
(156300, 9, 5, 0),
(156301, 14, 4, 1),
(156301, 15, 4, 1),
(156305, 14, 6, 0),
(156305, 15, 3, 0),
(156305, 18, 6, 0),
(156306, 14, 3, 2),
(156309, 18, 5, 0),
(156310, 22, 4, 0),
(156312, 24, 4, 0),
(156313, 24, 4, 0),
(156315, 22, 6, 0),
(156317, 20, 4, 0),
(156318, 20, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `RENCONTRE`
--

CREATE TABLE `RENCONTRE` (
  `NUMERO_RENCONTRE` int(11) NOT NULL,
  `POINTE1` int(11) NOT NULL,
  `POINTE2` int(11) NOT NULL,
  `DATE_RENCONTRE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `RENCONTRE`
--

INSERT INTO `RENCONTRE` (`NUMERO_RENCONTRE`, `POINTE1`, `POINTE2`, `DATE_RENCONTRE`) VALUES
(1, 19, 19, '2020-11-17'),
(2, 18, 18, '2020-11-17'),
(3, 15, 13, '2020-11-18'),
(4, 19, 25, '2020-11-18'),
(5, 18, 18, '2020-11-19'),
(6, 10, 12, '2020-11-19'),
(7, 13, 16, '2020-11-20'),
(8, 10, 14, '2020-11-20'),
(9, 10, 15, '2020-11-21'),
(10, 15, 10, '2020-11-21'),
(11, 6, 6, '2020-11-22'),
(12, 9, 6, '2020-11-22'),
(13, 7, 6, '2020-11-23'),
(14, 11, 13, '2020-11-23'),
(15, 7, 7, '2020-11-24'),
(16, 11, 13, '2020-11-24'),
(17, 9, 12, '2020-11-25'),
(18, 10, 11, '2020-11-25'),
(19, 8, 8, '2020-11-27'),
(20, 9, 6, '2020-11-27'),
(21, 10, 12, '2020-11-28'),
(22, 9, 10, '2020-11-28'),
(23, 9, 12, '2020-11-29'),
(24, 7, 8, '2020-11-29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `APPARTENANCE`
--
ALTER TABLE `APPARTENANCE`
  ADD PRIMARY KEY (`NUMERO_LICENCE`,`NUMERO_EQUIPE`);

--
-- Index pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`NUMERO_CATEGORIE`);

--
-- Index pour la table `CLUB`
--
ALTER TABLE `CLUB`
  ADD PRIMARY KEY (`NUMERO_CLUB`);

--
-- Index pour la table `ENTRAINEMENT`
--
ALTER TABLE `ENTRAINEMENT`
  ADD PRIMARY KEY (`NUMERO_ENTRAINEUR`,`NUMERO_EQUIPE`);

--
-- Index pour la table `ENTRAINEUR`
--
ALTER TABLE `ENTRAINEUR`
  ADD PRIMARY KEY (`NUMERO_ENTRAINEUR`),
  ADD KEY `fk1_entraineur` (`NUMERO_CLUB`);

--
-- Index pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  ADD PRIMARY KEY (`NUMERO_EQUIPE`),
  ADD KEY `fk1_equipe` (`NUMERO_CLUB`),
  ADD KEY `fk2_equipe` (`NUMERO_CATEGORIE`);

--
-- Index pour la table `FONCTION`
--
ALTER TABLE `FONCTION`
  ADD PRIMARY KEY (`NUMERO_CLUB`,`NUMERO_PERSONNEL`),
  ADD KEY `NUMERO_PERSONNEL` (`NUMERO_PERSONNEL`);

--
-- Index pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD PRIMARY KEY (`NUMERO_LICENCE`),
  ADD KEY `fk1_joueur` (`NUMERO_CLUB`);

--
-- Index pour la table `PARTIE`
--
ALTER TABLE `PARTIE`
  ADD PRIMARY KEY (`NUMERO_RENCONTRE`,`NUMERO_EQUIPE1`,`NUMERO_EQUIPE2`);

--
-- Index pour la table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  ADD PRIMARY KEY (`NUMERO_PERSONNEL`);

--
-- Index pour la table `POINT_JOUEUR`
--
ALTER TABLE `POINT_JOUEUR`
  ADD PRIMARY KEY (`NUMERO_LICENCE`,`NUMERO_RENCONTRE`);

--
-- Index pour la table `RENCONTRE`
--
ALTER TABLE `RENCONTRE`
  ADD PRIMARY KEY (`NUMERO_RENCONTRE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ENTRAINEUR`
--
ALTER TABLE `CLUB`
  MODIFY `NUMERO_CLUB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- AUTO_INCREMENT pour la table `ENTRAINEUR`
--
ALTER TABLE `ENTRAINEUR`
  MODIFY `NUMERO_ENTRAINEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  MODIFY `NUMERO_LICENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156319;


--
-- AUTO_INCREMENT pour la table `FONCTION`
--
ALTER TABLE `FONCTION`
  MODIFY `NUMERO_PERSONNEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383638;

--
-- AUTO_INCREMENT pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  MODIFY `NUMERO_EQUIPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  MODIFY `NUMERO_PERSONNEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383638;

--
-- AUTO_INCREMENT pour la table `RENCONTRE`
--
ALTER TABLE `RENCONTRE`
  MODIFY `NUMERO_RENCONTRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ENTRAINEUR`
--
ALTER TABLE `ENTRAINEUR`
  ADD CONSTRAINT `fk1_entraineur` FOREIGN KEY (`NUMERO_CLUB`) REFERENCES `CLUB` (`NUMERO_CLUB`) ON DELETE CASCADE;

--
-- Contraintes pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  ADD CONSTRAINT `fk1_equipe` FOREIGN KEY (`NUMERO_CLUB`) REFERENCES `CLUB` (`NUMERO_CLUB`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_equipe` FOREIGN KEY (`NUMERO_CATEGORIE`) REFERENCES `CATEGORIE` (`NUMERO_CATEGORIE`) ON DELETE CASCADE;


--
-- Contraintes pour la table `FONCTION`
--
ALTER TABLE `FONCTION`
  ADD CONSTRAINT `fk1_fonction` FOREIGN KEY (`NUMERO_CLUB`) REFERENCES `CLUB` (`NUMERO_CLUB`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_fonction` FOREIGN KEY (`NUMERO_PERSONNEL`) REFERENCES `PERSONNEL` (`NUMERO_PERSONNEL`) ON DELETE CASCADE;


--
-- Contraintes pour la table `PARTIE`
--
ALTER TABLE `PARTIE`
  ADD CONSTRAINT `fk1_partie` FOREIGN KEY (`NUMERO_EQUIPE2`) REFERENCES `EQUIPE` (`NUMERO_EQUIPE`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_partie` FOREIGN KEY (`NUMERO_EQUIPE1`) REFERENCES `EQUIPE` (`NUMERO_EQUIPE`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk3_partie` FOREIGN KEY (`NUMERO_RENCONTRE`) REFERENCES `RENCONTRE` (`NUMERO_RENCONTRE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `POINT_JOUEUR`
--
ALTER TABLE `POINT_JOUEUR`
  ADD CONSTRAINT `fk1_point_joueur` FOREIGN KEY (`NUMERO_LICENCE`) REFERENCES `JOUEUR` (`NUMERO_LICENCE`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_point_joueur` FOREIGN KEY (`NUMERO_RENCONTRE`) REFERENCES `RENCONTRE` (`NUMERO_RENCONTRE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `APPARTENANCE`
--
ALTER TABLE `APPARTENANCE`
  ADD CONSTRAINT `fk1_appartenance` FOREIGN KEY (`NUMERO_LICENCE`) REFERENCES `JOUEUR` (`NUMERO_LICENCE`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_appartenance` FOREIGN KEY (`NUMERO_EQUIPE`) REFERENCES `EQUIPE` (`NUMERO_EQUIPE`) ON DELETE CASCADE;


--
-- Contraintes pour la table `ENTRAINEMENT`
--
ALTER TABLE `ENTRAINEMENT`
  ADD CONSTRAINT `fk1_entrainement` FOREIGN KEY (`NUMERO_ENTRAINEUR`) REFERENCES `ENTRAINEUR` (`NUMERO_ENTRAINEUR`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_entrainement` FOREIGN KEY (`NUMERO_EQUIPE`) REFERENCES `EQUIPE` (`NUMERO_EQUIPE`) ON DELETE CASCADE;


--
-- Contraintes pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD CONSTRAINT `fk1_joueur` FOREIGN KEY (`NUMERO_CLUB`) REFERENCES `CLUB` (`NUMERO_CLUB`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
