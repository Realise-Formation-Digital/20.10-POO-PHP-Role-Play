-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : maria_db:3306
-- Généré le : mer. 20 jan. 2021 à 20:48
-- Version du serveur :  10.5.8-MariaDB-1:10.5.8+maria~focal
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `combatgentil_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `Hero`
--

CREATE TABLE `Hero` (
  `id` int(4) NOT NULL,
  `heroName` varchar(60) NOT NULL,
  `health` int(4) NOT NULL,
  `xp` int(4) NOT NULL,
  `strength` int(4) NOT NULL,
  `stamina` int(4) NOT NULL,
  `bitcoin` int(4) NOT NULL,
  `image` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Hero`
--

INSERT INTO `Hero` (`id`, `heroName`, `health`, `xp`, `strength`, `stamina`, `bitcoin`, `image`) VALUES
(1, 'Arthur', 10, 0, 1, 1, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `heroWeapon`
--

CREATE TABLE `heroWeapon` (
  `id` int(1) NOT NULL,
  `idHero` int(1) NOT NULL,
  `idWeapon` int(2) NOT NULL,
  `gear` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `heroWeapon`
--

INSERT INTO `heroWeapon` (`id`, `idHero`, `idWeapon`, `gear`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `NPC`
--

CREATE TABLE `NPC` (
  `id` int(1) NOT NULL,
  `npcName` varchar(60) NOT NULL,
  `xp` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `NPC`
--

INSERT INTO `NPC` (`id`, `npcName`, `xp`) VALUES
(1, 'Merlin', 45),
(2, 'Amrul', 26),
(3, 'Ganesh', 50),
(4, 'Sagun', 29),
(5, 'Suyash', 6);

-- --------------------------------------------------------

--
-- Structure de la table `npcWeapon`
--

CREATE TABLE `npcWeapon` (
  `id` int(1) NOT NULL,
  `idNPC` int(2) NOT NULL,
  `idWeapon` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `npcWeapon`
--

INSERT INTO `npcWeapon` (`id`, `idNPC`, `idWeapon`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 4, 5),
(5, 5, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 2, 11),
(11, 2, 12),
(12, 2, 13),
(13, 2, 14),
(14, 3, 15),
(15, 3, 16),
(16, 3, 17),
(17, 3, 18),
(18, 4, 19),
(19, 4, 20),
(20, 4, 21),
(21, 4, 22),
(22, 5, 23),
(23, 5, 24),
(24, 5, 25),
(25, 5, 26);

-- --------------------------------------------------------

--
-- Structure de la table `Vilain`
--

CREATE TABLE `Vilain` (
  `id` int(1) NOT NULL,
  `idWeapon` int(2) DEFAULT NULL,
  `vilainName` varchar(60) DEFAULT NULL,
  `xp` int(2) DEFAULT NULL,
  `health` int(2) DEFAULT NULL,
  `stamina` int(2) DEFAULT NULL,
  `strength` int(2) DEFAULT NULL,
  `bitcoin` int(2) DEFAULT NULL,
  `image` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Vilain`
--

INSERT INTO `Vilain` (`id`, `idWeapon`, `vilainName`, `xp`, `health`, `stamina`, `strength`, `bitcoin`, `image`) VALUES
(1, 27, 'Virus Mage', 49, 10, 45, 4, 35, 6),
(2, 28, 'Rad Burn', 3, 10, 2, 3, 12, 8),
(3, 29, 'Dark Vader', 25, 10, 5, 11, 30, 8),
(4, 30, 'Dirt Rot', 21, 10, 18, 6, 16, 5),
(5, 31, 'Bite Gut', 14, 10, 9, 13, 11, 6);

-- --------------------------------------------------------

--
-- Structure de la table `Weapon`
--

CREATE TABLE `Weapon` (
  `id` int(1) NOT NULL,
  `weaponName` varchar(60) DEFAULT NULL,
  `strength` int(2) DEFAULT NULL,
  `stamina` int(2) DEFAULT NULL,
  `bitcoin` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Weapon`
--

INSERT INTO `Weapon` (`id`, `weaponName`, `strength`, `stamina`, `bitcoin`) VALUES
(1, 'Excalibur', 1, 0, 33),
(2, 'Daydream', 45, 45, 8),
(3, 'Frostmourne Sword', 26, 26, 22),
(4, 'Doomshadow', 50, 50, 30),
(5, 'Nethersong', 29, 29, 21),
(6, 'Crystal of Redemption', 6, 6, 19),
(7, 'Baton of Fools', 28, 28, 9),
(8, 'Pact of Eternal Rest', 8, 8, 29),
(9, 'Windsong Globule', 10, 10, 20),
(10, 'Primal Aspect', 17, 17, 36),
(11, 'Judgement Torch', 37, 37, 9),
(12, 'Scorchvine', 32, 32, 28),
(13, 'Soulflare', 8, 8, 15),
(14, 'Deluge', 31, 31, 9),
(15, 'Firestorm Heart', 4, 4, 37),
(16, 'Oath of Widows', 20, 20, 38),
(17, 'Protector of Thunder', 26, 26, 34),
(18, 'Flamestone', 7, 7, 40),
(19, 'Netherbane', 9, 9, 30),
(20, 'Eye of the Damned', 29, 29, 6),
(21, 'Bruiser of Holy Might', 21, 21, 13),
(22, 'Dire Charm', 7, 7, 38),
(23, 'Celestia', 34, 34, 38),
(24, 'Furious Cudgel', 4, 4, 47),
(25, 'Hope of the Moon', 8, 8, 17),
(26, 'Defender of Hatred', 20, 20, 34),
(27, 'Dawnbreaker', 4, 19, 42),
(28, 'Abyssal Shard', 3, 3, 14),
(29, 'Lightsaber', 4, 5, 16),
(30, 'Destroyer of Dragonsouls', 17, 8, 12),
(31, 'Copper Shortsword', 3, 2, 21);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Hero`
--
ALTER TABLE `Hero`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `heroWeapon`
--
ALTER TABLE `heroWeapon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHero` (`idHero`),
  ADD KEY `idWeapon` (`idWeapon`);

--
-- Index pour la table `NPC`
--
ALTER TABLE `NPC`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `npcWeapon`
--
ALTER TABLE `npcWeapon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idWeapon` (`idWeapon`),
  ADD KEY `idNPC` (`idNPC`);

--
-- Index pour la table `Vilain`
--
ALTER TABLE `Vilain`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Weapon`
--
ALTER TABLE `Weapon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Hero`
--
ALTER TABLE `Hero`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `heroWeapon`
--
ALTER TABLE `heroWeapon`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `NPC`
--
ALTER TABLE `NPC`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `npcWeapon`
--
ALTER TABLE `npcWeapon`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `Vilain`
--
ALTER TABLE `Vilain`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Weapon`
--
ALTER TABLE `Weapon`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `heroWeapon`
--
ALTER TABLE `heroWeapon`
  ADD CONSTRAINT `heroWeapon_ibfk_1` FOREIGN KEY (`idHero`) REFERENCES `Hero` (`id`),
  ADD CONSTRAINT `heroWeapon_ibfk_2` FOREIGN KEY (`idWeapon`) REFERENCES `Weapon` (`id`);

--
-- Contraintes pour la table `npcWeapon`
--
ALTER TABLE `npcWeapon`
  ADD CONSTRAINT `npcWeapon_ibfk_1` FOREIGN KEY (`idWeapon`) REFERENCES `Weapon` (`id`),
  ADD CONSTRAINT `npcWeapon_ibfk_2` FOREIGN KEY (`idNPC`) REFERENCES `NPC` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
