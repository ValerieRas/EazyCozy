-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 avr. 2023 à 14:57
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eazycozy`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nomadmin` varchar(100) DEFAULT NULL,
  `mailadmin` varchar(100) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `nomadmin`, `mailadmin`, `motdepasse`) VALUES
(1, 'Valérie', 'val@gmail.com', '$2y$10$dIrdFj9g3Ujt./Nf50PSOeGz0suJ88QHx/V1Ytz8x17Wr0t0Pp2Ei'),
(2, 'Lucas', 'lucas@gmail.com', '$2y$10$f3RN9jjV2/Hu5IilVgENhebC4NHUdOmBtFojHpIitlhB.Yg9nqAoC');

-- --------------------------------------------------------

--
-- Structure de la table `attentcom`
--

CREATE TABLE `attentcom` (
  `commid` int(11) NOT NULL,
  `idcli` int(11) DEFAULT NULL,
  `idprod` int(250) DEFAULT NULL,
  `idpaie` int(250) DEFAULT NULL,
  `quant` int(250) DEFAULT NULL,
  `statucom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `attentcom`
--

INSERT INTO `attentcom` (`commid`, `idcli`, `idprod`, `idpaie`, `quant`, `statucom`) VALUES
(3, 2, 22, 1788562672, 1, 'En attente'),
(4, 2, 18, 508240212, 1, 'En attente'),
(5, 4, 10, 232801496, 1, 'En attente'),
(6, 4, 10, 1814097384, 1, 'En attente'),
(7, 4, 16, 1444684889, 1, 'En attente'),
(8, 4, 19, 1883372667, 1, 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcat` int(11) NOT NULL,
  `nomcat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `nomcat`) VALUES
(1, 'Pulls'),
(2, 'Jupe'),
(3, 'Pantalon'),
(4, 'Ensemble'),
(5, 'Haut'),
(6, 'Robe'),
(7, 'Décoration'),
(8, 'jouet'),
(9, 'accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idcli` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `dateNaissance` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `imgclient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idcli`, `nom`, `prenom`, `dateNaissance`, `adresse`, `tel`, `mail`, `motdepasse`, `imgclient`) VALUES
(3, 'Jean', 'Marc', '2000-06-06', 'Grenoble', 1234567891, 'jean@gmail.com', '$2y$10$8uBZQsSZdf0E67RFBv87ZuxP5FhtLcnYkbDcOhXxgdrI/ZlUbi9X2', 'IMG_9300.JPEG'),
(4, 'Martin', 'Jade', '2011-07-08', 'Lyon', 2147483647, 'jade@gmail.com', '$2y$10$ctq/1B3Sy.cZTIrfc95PjulZr713A.M291UkDPJAKGfaZ2f5l5ijm', 'IMG_9303.JPEG'),
(5, 'Thomas', 'louisa', '2007-05-10', 'Eybens', 986523417, 'Louisa@gmail.com', '$2y$10$hwAfB2eHbf348ezDz229JuAXp5vFZxDih.lvXoJA2Y7ElYEXgOyN.', 'IMG_9303.JPEG'),
(6, 'petit', 'rose', '1999-09-14', 'Lyon', 123564896, 'rose@gmail.com', '$2y$10$EJ1deRJousyfD1b6.UncMeNFQKzbukHwm/ab.lrseXIaL0CQWpI56', 'IMG_9312.JPEG'),
(7, 'bonnet', 'Chloé', '1993-05-30', 'Grenoble', 1256348965, 'chloe@gmail.com', '$2y$10$Y4We6WmBaffiqI7nz3.VQeeDPGkpUgQWnr7hK0stASPC8xh85/dQ.', 'IMG_9308.JPEG'),
(8, 'Muller', 'Zoe', '1999-11-23', 'Grenoble', 2147483647, 'zoe@gmail.com', '$2y$10$9FNHDf7suvoa4CN1IfbPz.KCOnbMjBzwri9jwpSvzlt4VRxG6D4Xa', 'IMG_9314.JPEG');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idcomm` int(11) NOT NULL,
  `idcli` int(11) DEFAULT NULL,
  `prixcom` int(250) DEFAULT NULL,
  `idpaie` int(250) DEFAULT NULL,
  `nbrprod` int(250) DEFAULT NULL,
  `datcom` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statucom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idcomm`, `idcli`, `prixcom`, `idpaie`, `nbrprod`, `datcom`, `statucom`) VALUES
(4, 2, 100, 1788562672, 4, '2023-02-10 23:20:13', 'En attente'),
(5, 2, 60, 508240212, 3, '2023-02-11 17:55:31', 'Payé');

-- --------------------------------------------------------

--
-- Structure de la table `createur`
--

CREATE TABLE `createur` (
  `idcreat` int(11) NOT NULL,
  `nomcreat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `createur`
--

INSERT INTO `createur` (`idcreat`, `nomcreat`) VALUES
(1, 'Noorvana'),
(2, 'mahum'),
(3, 'Molly'),
(4, 'Beach'),
(5, 'KIKI'),
(6, 'kittengrl');

-- --------------------------------------------------------

--
-- Structure de la table `paiement_client`
--

CREATE TABLE `paiement_client` (
  `idfact` int(11) NOT NULL,
  `idpaie` int(11) DEFAULT NULL,
  `idcomm` int(11) DEFAULT NULL,
  `prixcom` int(11) DEFAULT NULL,
  `date_paie` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `paiement_client`
--

INSERT INTO `paiement_client` (`idfact`, `idpaie`, `idcomm`, `prixcom`, `date_paie`) VALUES
(1, 508240212, 5, 60, '2023-02-11 17:55:31'),
(2, 232801496, NULL, 40, '2023-02-12 11:58:57'),
(3, 1814097384, NULL, 40, '2023-02-20 00:25:29'),
(4, 1444684889, NULL, 25, '2023-02-20 00:31:17'),
(5, 1883372667, NULL, 100, '2023-02-20 09:21:26');

-- --------------------------------------------------------

--
-- Structure de la table `panierclient`
--

CREATE TABLE `panierclient` (
  `prodid` int(11) DEFAULT NULL,
  `idclient` int(11) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `det_panier` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idprod` int(11) NOT NULL,
  `prodnom` varchar(50) DEFAULT NULL,
  `descprod` varchar(200) DEFAULT NULL,
  `prod_motcle` varchar(200) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  `idcreat` int(11) DEFAULT NULL,
  `img1prod` varchar(250) DEFAULT NULL,
  `img2prod` varchar(250) DEFAULT NULL,
  `img3prod` varchar(250) DEFAULT NULL,
  `prodprix` int(11) DEFAULT NULL,
  `quantité` int(11) DEFAULT NULL,
  `dateprod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idprod`, `prodnom`, `descprod`, `prod_motcle`, `idcat`, `idcreat`, `img1prod`, `img2prod`, `img3prod`, `prodprix`, `quantité`, `dateprod`) VALUES
(5, 'Robe noire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'robe noir noorvana longue ', 6, 1, 'IMG_9201.JPEG', 'IMG_9202.JPEG', 'IMG_9203.JPEG', 100, 5, '2023-02-11 23:47:37'),
(6, 'Robe glitter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'robe dos nu beige glitter', 6, 1, 'IMG_9212.JPEG', 'IMG_9213.JPEG', 'IMG_9215.JPEG', 100, 10, '2023-02-03 11:30:41'),
(7, 'Ensemble beige', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'ensemble jupe top haut beige', 4, 1, 'IMG_9216.JPEG', 'IMG_9217.JPEG', 'IMG_9218.JPEG', 100, 5, '2023-02-03 11:31:40'),
(8, 'Robe sleeve', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'robe manche longue verte noorvana', 6, 1, 'IMG_9219.JPEG', 'IMG_9220.JPEG', 'IMG_9219.JPEG', 100, 10, '2023-02-03 11:33:05'),
(9, 'Pull molly shoulder', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'pull molly manche longue ', 1, 3, 'IMG_9224.JPEG', 'IMG_9225.JPEG', 'IMG_9226.JPEG', 60, 5, '2023-02-03 11:35:07'),
(10, 'Pull molly open', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'pull molly manche longue ouvert open ', 1, 3, 'IMG_9227.JPEG', 'IMG_9228.JPEG', 'IMG_9229.JPEG', 40, 10, '2023-02-03 11:36:40'),
(11, 'Pull molly cerise', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'pull molly manche longue cerise', 1, 3, 'IMG_9232.JPEG', 'IMG_9233.JPEG', 'IMG_9232.JPEG', 100, 5, '2023-02-03 11:37:42'),
(12, 'sweet crop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Crop top white manche courte blanc', 5, 2, 'IMG_9242.JPEG', 'IMG_9244.JPEG', 'IMG_9245.JPEG', 25, 5, '2023-02-03 11:39:16'),
(13, 'corset top', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'corset top manche courte jaune haut', 5, 2, 'IMG_9246.JPEG', 'IMG_9247.JPEG', 'IMG_9248.JPEG', 25, 5, '2023-02-03 11:40:26'),
(14, 'mesh top ', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'top blue bleu haut ', 5, 2, 'IMG_9263.JPEG', 'IMG_9264.JPEG', 'IMG_9265.JPEG', 25, 5, '2023-02-03 11:47:36'),
(15, 'veste golden', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'veste vert dore bouton ouvert', 5, 2, 'IMG_9249.JPEG', 'IMG_9250.JPEG', 'IMG_9251.JPEG', 60, 5, '2023-02-03 11:48:52'),
(16, 'débardeur corset', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'corset haut top noir blanc', 5, 2, 'IMG_9260.JPEG', 'IMG_9261.JPEG', 'IMG_9262.JPEG', 25, 10, '2023-02-03 11:50:31'),
(17, 'crop veste', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'crop veste beige blanc ', 5, 2, 'IMG_9266.JPEG', 'IMG_9267.JPEG', 'IMG_9268.JPEG', 40, 5, '2023-02-03 11:51:40'),
(18, 'mudkip', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'mudkip bleu orange pokemon', 8, 6, 'IMG_9280.JPEG', 'IMG_9281.JPEG', 'IMG_9282.JPEG', 60, 3, '2023-02-03 12:00:43'),
(19, 'mewtwo', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'mewtwo violet pokemon', 8, 6, 'IMG_9284.JPEG', 'IMG_9285.JPEG', 'IMG_9286.JPEG', 100, 3, '2023-02-03 12:02:59'),
(20, 'Lapras', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'Lapras pokeon bleu bleue', 8, 6, 'IMG_9291.JPEG', 'IMG_9293.JPEG', 'IMG_9294.JPEG', 40, 3, '2023-02-03 12:05:01'),
(21, 'meganium', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'meganium pokemon jouet', 8, 6, 'IMG_9295.JPEG', 'IMG_9296.JPEG', 'IMG_9298.JPEG', 100, 3, '2023-02-03 12:12:00'),
(22, 'Flared pants', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'pantalon flared elephant éléphant ', 3, 5, 'IMG_9382.JPEG', 'IMG_9383.JPEG', 'IMG_9384.JPEG', 100, 5, '2023-02-03 12:14:21'),
(23, 'kiki pants', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'pantalon kiki rose ', 3, 5, 'IMG_9385.JPEG', 'IMG_9386.JPEG', 'IMG_9387.JPEG', 25, 3, '2023-02-03 12:15:06'),
(24, 'Beach crop top', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'beach outfit  summer top haut crop', 5, 4, 'IMG_9362.JPEG', 'IMG_9363.JPEG', 'IMG_9364.JPEG', 40, 10, '2023-02-03 12:16:17'),
(25, 'Beach butterly ensemble', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'Butterfly, top, crop, knitted, beach, vert bleu ', 4, 4, 'IMG_9365.JPEG', 'IMG_9367.jpeg', 'IMG_9370.JPEG', 100, 5, '2023-02-03 12:26:02'),
(26, 'Beach Ensemble dark', 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'beach outfit  summer dark haut jupe', 4, 4, 'IMG_9374.JPEG', 'IMG_9375.JPEG', 'IMG_9376.jpeg', 100, 3, '2023-02-03 12:27:06'),
(28, 'frog', 'frog', 'frog', 8, 6, 'IMG_9302.JPEG', 'IMG_9301.JPEG', 'IMG_9308.JPEG', 25, 3, '2023-02-20 13:01:34');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `idvend` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `dateNaissance` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `motdepasse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `attentcom`
--
ALTER TABLE `attentcom`
  ADD PRIMARY KEY (`commid`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idcli`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idcomm`);

--
-- Index pour la table `createur`
--
ALTER TABLE `createur`
  ADD PRIMARY KEY (`idcreat`);

--
-- Index pour la table `paiement_client`
--
ALTER TABLE `paiement_client`
  ADD PRIMARY KEY (`idfact`),
  ADD KEY `paiement_client_ibfk_1` (`idcomm`);

--
-- Index pour la table `panierclient`
--
ALTER TABLE `panierclient`
  ADD KEY `idclient` (`idclient`),
  ADD KEY `prodid` (`prodid`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idprod`),
  ADD KEY `produit_ibfk_1` (`idcat`),
  ADD KEY `produit_ibfk_2` (`idcreat`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`idvend`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `attentcom`
--
ALTER TABLE `attentcom`
  MODIFY `commid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idcomm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `createur`
--
ALTER TABLE `createur`
  MODIFY `idcreat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `paiement_client`
--
ALTER TABLE `paiement_client`
  MODIFY `idfact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paiement_client`
--
ALTER TABLE `paiement_client`
  ADD CONSTRAINT `paiement_client_ibfk_1` FOREIGN KEY (`idcomm`) REFERENCES `commande` (`idcomm`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `panierclient`
--
ALTER TABLE `panierclient`
  ADD CONSTRAINT `panierclient_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `client` (`idcli`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `panierclient_ibfk_2` FOREIGN KEY (`prodid`) REFERENCES `produit` (`idprod`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
