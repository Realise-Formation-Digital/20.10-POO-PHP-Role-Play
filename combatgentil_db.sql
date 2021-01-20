-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: maria_db:3306
-- Generation Time: Jan 20, 2021 at 07:27 AM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `combatgentil_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Hero`
--

CREATE TABLE `Hero` (
  `id` int(4) NOT NULL,
  `heroName` varchar(60) DEFAULT NULL,
  `health` int(4) DEFAULT NULL,
  `xp` int(4) DEFAULT NULL,
  `strength` int(4) DEFAULT NULL,
  `stamina` int(4) DEFAULT NULL,
  `bitcoin` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hero`
--

INSERT INTO `Hero` (`id`, `heroName`, `health`, `xp`, `strength`, `stamina`, `bitcoin`) VALUES
(1, 'Arthur', 10, 0, 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `heroWeapon`
--

CREATE TABLE `heroWeapon` (
  `id` int(4) NOT NULL,
  `idHero` int(4) NOT NULL,
  `idWeapon` int(4) NOT NULL,
  `gear` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heroWeapon`
--

INSERT INTO `heroWeapon` (`id`, `idHero`, `idWeapon`, `gear`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `NPC`
--

CREATE TABLE `NPC` (
  `id` int(4) NOT NULL,
  `npcName` varchar(60) DEFAULT NULL,
  `xp` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `NPC`
--

INSERT INTO `NPC` (`id`, `npcName`, `xp`) VALUES
(1, 'Merlin', 35),
(2, 'Amrul', 3),
(3, 'Ganesh', 6),
(4, 'Sagun', 19),
(5, 'Suyash', 26);

-- --------------------------------------------------------

--
-- Table structure for table `npcWeapon`
--

CREATE TABLE `npcWeapon` (
  `id` int(4) NOT NULL,
  `idNPC` int(4) NOT NULL,
  `idWeapon` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `npcWeapon`
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
-- Table structure for table `Vilain`
--

CREATE TABLE `Vilain` (
  `id` int(4) NOT NULL,
  `idWeapon` int(4) DEFAULT NULL,
  `vilainName` varchar(60) DEFAULT NULL,
  `xp` int(4) DEFAULT NULL,
  `health` int(4) DEFAULT NULL,
  `stamina` int(4) DEFAULT NULL,
  `strength` int(4) DEFAULT NULL,
  `bitcoin` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vilain`
--

INSERT INTO `Vilain` (`id`, `idWeapon`, `vilainName`, `xp`, `health`, `stamina`, `strength`, `bitcoin`) VALUES
(1, 27, 'Virus Mage', 49, 10, 16, 38, 4),
(2, 28, 'Rad Burn', 25, 10, 4, 1, 18),
(3, 29, 'Dark Vader', 46, 10, 23, 32, 23),
(4, 30, 'Dirt Rot', 39, 10, 18, 33, 15),
(5, 31, 'Bite Gut', 20, 10, 18, 6, 40);

-- --------------------------------------------------------

--
-- Table structure for table `Weapon`
--

CREATE TABLE `Weapon` (
  `id` int(4) NOT NULL,
  `weaponName` varchar(60) DEFAULT NULL,
  `strength` int(4) DEFAULT NULL,
  `stamina` int(4) DEFAULT NULL,
  `bitcoin` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Weapon`
--

INSERT INTO `Weapon` (`id`, `weaponName`, `strength`, `stamina`, `bitcoin`) VALUES
(1, 'Excalibur', 1, 0, 25),
(2, 'Daydream', 35, 35, 48),
(3, 'Frostmourne Sword', 3, 3, 18),
(4, 'Doomshadow', 6, 6, 27),
(5, 'Nethersong', 19, 19, 46),
(6, 'Crystal of Redemption', 26, 26, 44),
(7, 'Baton of Fools', 1, 1, 17),
(8, 'Pact of Eternal Rest', 27, 27, 44),
(9, 'Windsong Globule', 43, 43, 18),
(10, 'Primal Aspect', 28, 28, 16),
(11, 'Judgement Torch', 40, 40, 18),
(12, 'Scorchvine', 12, 12, 21),
(13, 'Soulflare', 13, 13, 23),
(14, 'Deluge', 26, 26, 14),
(15, 'Firestorm Heart', 2, 2, 16),
(16, 'Oath of Widows', 7, 7, 15),
(17, 'Protector of Thunder', 40, 40, 40),
(18, 'Flamestone', 36, 36, 30),
(19, 'Netherbane', 34, 34, 37),
(20, 'Eye of the Damned', 43, 43, 47),
(21, 'Bruiser of Holy Might', 37, 37, 48),
(22, 'Dire Charm', 11, 11, 10),
(23, 'Celestia', 48, 48, 14),
(24, 'Furious Cudgel', 24, 24, 28),
(25, 'Hope of the Moon', 14, 14, 10),
(26, 'Defender of Hatred', 29, 29, 37),
(27, 'Dawnbreaker', 22, 41, 22),
(28, 'Abyssal Shard', 11, 3, 7),
(29, 'Lightsaber', 43, 15, 11),
(30, 'Destroyer of Dragonsouls', 24, 27, 5),
(31, 'Copper Shortsword', 2, 18, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hero`
--
ALTER TABLE `Hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heroWeapon`
--
ALTER TABLE `heroWeapon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHero` (`idHero`),
  ADD KEY `idWeapon` (`idWeapon`);

--
-- Indexes for table `NPC`
--
ALTER TABLE `NPC`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `npcWeapon`
--
ALTER TABLE `npcWeapon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idWeapon` (`idWeapon`),
  ADD KEY `idNPC` (`idNPC`);

--
-- Indexes for table `Vilain`
--
ALTER TABLE `Vilain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Weapon`
--
ALTER TABLE `Weapon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Hero`
--
ALTER TABLE `Hero`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `heroWeapon`
--
ALTER TABLE `heroWeapon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `NPC`
--
ALTER TABLE `NPC`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `npcWeapon`
--
ALTER TABLE `npcWeapon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Vilain`
--
ALTER TABLE `Vilain`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Weapon`
--
ALTER TABLE `Weapon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `heroWeapon`
--
ALTER TABLE `heroWeapon`
  ADD CONSTRAINT `heroWeapon_ibfk_1` FOREIGN KEY (`idHero`) REFERENCES `Hero` (`id`),
  ADD CONSTRAINT `heroWeapon_ibfk_2` FOREIGN KEY (`idWeapon`) REFERENCES `Weapon` (`id`);

--
-- Constraints for table `npcWeapon`
--
ALTER TABLE `npcWeapon`
  ADD CONSTRAINT `npcWeapon_ibfk_1` FOREIGN KEY (`idWeapon`) REFERENCES `Weapon` (`id`),
  ADD CONSTRAINT `npcWeapon_ibfk_2` FOREIGN KEY (`idNPC`) REFERENCES `NPC` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
