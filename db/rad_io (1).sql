-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2025 at 05:06 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rad.io`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `password` int NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `security_key` int NOT NULL,
  PRIMARY KEY (`security_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`, `last_updated`, `security_key`) VALUES
(123456798, '2024-11-07 15:54:21', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `uid` int NOT NULL,
  `gid` int NOT NULL,
  `game` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `icon` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`uid`,`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `gid` int NOT NULL,
  `racing` int NOT NULL,
  `shooter` int NOT NULL,
  `action_` int NOT NULL,
  `open_world` int NOT NULL,
  `adventure` int NOT NULL,
  `fpp` int NOT NULL,
  `tpp` int NOT NULL,
  PRIMARY KEY (`gid`,`action_`,`adventure`,`open_world`,`racing`,`fpp`,`tpp`,`shooter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`gid`, `racing`, `shooter`, `action_`, `open_world`, `adventure`, `fpp`, `tpp`) VALUES
(36, 1, 0, 0, 1, 0, 1, 1),
(37, 1, 1, 1, 1, 1, 0, 1),
(38, 0, 0, 1, 1, 1, 0, 1),
(39, 0, 1, 1, 0, 0, 1, 0),
(40, 1, 1, 1, 1, 0, 1, 1),
(41, 1, 1, 1, 1, 0, 0, 1),
(42, 0, 1, 1, 0, 0, 1, 0),
(43, 0, 1, 1, 0, 1, 0, 1),
(44, 0, 1, 1, 1, 1, 1, 1),
(45, 0, 1, 1, 0, 0, 1, 0),
(46, 0, 1, 1, 0, 1, 1, 0),
(47, 0, 0, 1, 1, 1, 0, 1),
(48, 0, 0, 1, 0, 1, 0, 1),
(49, 0, 0, 1, 1, 1, 0, 1),
(50, 1, 1, 1, 1, 1, 0, 1),
(51, 0, 1, 1, 1, 1, 1, 0),
(52, 0, 1, 1, 1, 1, 0, 1),
(53, 0, 0, 1, 0, 1, 0, 1),
(54, 1, 1, 1, 1, 1, 1, 1),
(55, 0, 1, 1, 1, 1, 0, 1),
(58, 0, 0, 1, 1, 1, 0, 1),
(69, 0, 1, 1, 0, 1, 0, 1),
(70, 0, 1, 1, 0, 1, 1, 0),
(71, 0, 1, 1, 1, 1, 1, 0),
(72, 0, 1, 1, 0, 1, 1, 0),
(73, 0, 0, 1, 1, 1, 0, 1),
(74, 0, 0, 1, 0, 1, 0, 1),
(75, 0, 1, 1, 0, 1, 1, 0),
(76, 0, 1, 1, 0, 1, 1, 0),
(77, 1, 1, 1, 1, 1, 1, 0),
(78, 1, 1, 1, 1, 1, 1, 0),
(79, 1, 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE IF NOT EXISTS `library` (
  `uid` int NOT NULL,
  `gid` int NOT NULL,
  `game` varchar(50) NOT NULL,
  `icon` varchar(70) DEFAULT NULL,
  `price` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refund` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `game` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL,
  `ram` int NOT NULL DEFAULT '8',
  `cpu` int NOT NULL DEFAULT '5',
  `hdd` int NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `video` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`gid`, `game`, `icon`, `price`, `ram`, `cpu`, `hdd`, `publisher`, `video`, `description`) VALUES
(36, 'forza horizon 5', 'forza.jpg', 1249, 16, 5, 150, 'microsoft studios', 'forza5.mp4', 'Forza Horizon 5 is a 2021 racing video game developed by Playground Games and published by Xbox Game Studios. It is the fifth Forza Horizon title and twelfth main instalment in the Forza series. The game is set in a fictionalised representation of Mexico.'),
(37, 'mad max', 'madmax.jpeg', 540, 4, 3, 60, 'wb', 'Mad Max gameplay trailer _ PS4.mp4', '	Play as Mad Max, a reluctant hero and survivor who wants nothing more than to leave the madness behind and find solace.'),
(38, 'asassins creed:unity', 'acu.jpeg', 870, 8, 5, 35, 'ubisoft', 'acunity.mp4', '	Assassin’s Creed Unity tells the story of Arno, a young man who embarks upon an extraordinary journey to expose the true powers behind the French Revolution. In the brand new co-op mode, you and your friends will also be thrown in the middle of a ruthless struggle for the fate of a nation'),
(39, 'crysis remastered', 'crysis.jpeg', 795, 8, 5, 20, 'crytek', 'Crysis Remastered.mp4', 'Crysis is back and better than ever The classic first-person shooter from Crytek is back with the action-packed gameplay, sandbox world, and thrilling epic battles you loved the first time around – now with remastered graphics optimized for a new generation of hardware.\r\n	'),
(40, 'GTA IV', 'gta4.jpeg', 560, 2, 3, 20, 'rockstar games', 'gta4.mp4', 'Grand Theft Auto IV is an action-adventure game played from a third-person perspective. Players complete missions—linear scenarios with set objectives—to progress through the story. It is possible to have several active missions running at one time, as some require players to wait for further instructions or events.\r\n\r\n'),
(41, 'saints row the third re', 's3.jpeg', 1250, 8, 3, 25, 'deep silver', 'saints3re.mp4', 'Saints Row: The Third- Remastered gives you control of the Saints at the height of their power, and you live the life to show for it. This is your City. These are your rules. Remastered with enhanced graphics, Steelport the original city of sin, has never looked so good as it drowns in sex, drugs and guns.'),
(42, 'titanfall 2', 'tf2.jpeg', 580, 8, 3, 45, 'electronic arts', 'Titanfall 2.mp4', 'Titanfall 2 features a single player campaign packed with action and inventive twists. Play as a Militia rifleman stranded behind enemy lines, who encounters a veteran Vanguard-class Titan. The two must work together to uphold a mission they were never meant to carry out.'),
(43, 'quantum break', 'qbreakjpeg.jpeg', 870, 8, 5, 68, 'remedy', 'Quantum Break.mp4', 'In the aftermath of a split second of destruction that fractures time itself, two people find they have changed and gained extraordinary abilities. One of them travels through time and becomes hell-bent on controlling this power. The other uses these new abilities to attempt to defeat him – and fix time before it tears itself irreparably apart. Both face overwhelming odds and make dramatic choices that will determine the shape of the future. Quantum Break is a unique experience; one part hard-hitting video game, one part thrilling live action show, featuring a stellar cast, including Shawn Ashmore as the hero Jack Joyce, Aidan Gillen as his nemesis Paul Serene and Dominic Monaghan as Jack’s genius brother William. Quantum Break is full of the vivid storytelling, rich characters and dramatic twists Remedy Entertainment are renowned for. Your choices in-game will affect the outcome of this fast-paced fusion between game and show giving the player a completely unique entertainment experience.'),
(44, 'red dead redemption 2', 'rdr2.jpeg', 1280, 16, 5, 120, 'rockstar games', 'Red Dead Redemption 2.mp4', 'Red Dead Redemption 2 is a Western-themed action-adventure game. Played from a first- or third-person perspective, the game is set in an open-world environment featuring a fictionalized version of the United States in 1899.\r\n'),
(45, 'battlefield 3', 'bf3.jpeg', 750, 2, 3, 20, 'electronic arts', 'Battlefield 3.mp4', 'Enjoy total freedom to fight the way you want. Explore 29 massive multiplayer maps and use loads of vehicles, weapons, and gadgets to help you turn up the heat. Every second of battle gets you closer to unlocking tons of extras and moving up in the Ranks. So get in the action'),
(46, 'doom', 'doom.jpeg', 1300, 8, 5, 65, 'betthesda softworks', 'DOOM .mp4', 'Doom is a first-person shooter game developed and published by id Software. Released on December 10, 1993, for DOS, it is the first installment in the Doom franchise. The player assumes the role of a space marine, later unofficially referred to as Doomguy, fighting through hordes of undead humans and invading demons.\r\n'),
(47, 'spider man ', 'sm.jpeg', 1680, 8, 5, 80, 'insomniac games', 'Marvel’s Spider-Man.mp4', 'Developed by Insomniac Games in collaboration with Marvel, and optimized for PC by Nixxes Software, Marvel’s Spider-Man Remastered on PC introduces an experienced Peter Parker who’s fighting big crime and iconic villains in Marvel’s New York. At the same time, he’s struggling to balance his chaotic personal life and career while the fate of Marvel’s New York rests upon his shoulders.'),
(48, 'shadow of the tomb raider', 'sotr.jpeg', 1740, 8, 5, 60, 'square enix', 'Sotr.mp4', 'In Shadow of the Tomb Raider, Lara must master a deadly jungle, overcome terrifying tombs, and persevere through her darkest hour. As she races to save the world from a Maya apocalypse, Lara must become the Tomb Raider she is destined to be. Survive and Thrive: Master the jungle to survive'),
(49, 'batman:arkham knight', 'batman.jpeg', 680, 8, 5, 60, 'wb', 'Batman_ Arkham Knight.mp4', 'Batman: Arkham Knight is a 2015 action-adventure game developed by Rocksteady Studios and published by Warner Bros. Interactive Entertainment. Based on the DC Comics superhero Batman, it is the successor to the 2013 video game Batman: Arkham Origins, a direct sequel to Batman: Arkham City (2011) and the fourth main installment in the Batman: Arkham series	'),
(50, 'just cause 3', 'jc3.jpeg', 1299, 8, 5, 60, 'square enix', 'Just Cause 3.mp4', 'Set six years after its predecessor, Just Cause 3 follows series protagonist Rico Rodriguez as he returns to his homeland of Medici, a fictional Mediterranean island country under the control of dictator General Sebastiano Di Ravello\r\n'),
(51, 'farcry 3', 'fc3.jpg', 980, 2, 3, 15, 'ubisoft', 'Far Cry 3.mp4', 'Far Cry 3 is a first-person shooter set on the fictional Rook Islands, a tropical archipelago somewhere in the Pacific, controlled by pirates and mercenaries. Players control Jason Brody and can approach missions and objectives in a variety of ways.\r\n'),
(52, 'watch dogs', 'wd.jpg', 480, 8, 3, 30, 'ubisoft', 'Watch Dogs.mp4', 'Watch Dogs is a 2014 action-adventure game developed by Ubisoft Montreal and published by Ubisoft. It is the first installment in the Watch Dogs series. The game is played from a third-person perspective, and its world is navigated on foot or by vehicle.	'),
(53, 'god of war', 'gow.jpeg', 1400, 8, 5, 60, 'santa monica studios', 'God of War.mp4', 'Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply personal quest. “The son is the humanity that Kratos lost.\r\n'),
(54, 'gta v', 'gta v.png', 1200, 4, 3, 95, 'rockstar games', 'gtav.mp4', 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.'),
(55, 'death stranding', 'ds.jpg', 699, 8, 5, 80, '505 games official', 'ds.mp4', 'The game is set in the United States following a cataclysmic event which caused destructive creatures to begin roaming the Earth. Players control Sam Porter Bridges (Norman Reedus), a courier tasked with delivering supplies to isolated colonies and reconnecting them via a wireless communications network.'),
(58, 'Ghost of Tsushima', 'gots.jpg', 3200, 8, 5, 70, 'playstation pc llc', 'gots.webm', 'Ghost of Tsushima is an action game set in feudal Japan. Players take the role of Jin Sakai, a samurai risking everything to defend Tsushima from the Mongol invaders pillaging the land. Players travel the Japanese countryside helping civilians and defending them from the Mongol invaders. Frequent sword battles take place in 3rd person melee and ranged combat. Successful attacks can result in dismemberment and decapitation, often accompanied by large blood-splatter effects. Players can also use stealth to take out enemies unseen, with assassination kills. Cinematics and other scenes show other examples of intense violence and gore, including a scene where a civilian is burned alive, a scene showing a person beheaded and the decapitated man’s head held up towards the camera. Red blood can be seen in environments, on clothing, and spraying from successful attacks.'),
(69, 'star wars:jedi fallen order', 'swjf.jpeg', 1680, 8, 5, 60, 'electronic arts', 'swjfo.mp4', 'Star Wars Jedi: Fallen Order is a 2019 action-adventure game developed by Respawn Entertainment and published by Electronic Arts. The story is set in the Star Wars universe, five years after Star Wars: Episode III – Revenge of the Sith. '),
(70, 'Call of Duty Infinite Warfare', 'codiw.jpeg', 1200, 8, 5, 80, 'activision', 'codiw.mp4', 'Call of Duty: Infinite Warfare is a 2016 first-person shooter video game developed by Infinity Ward and published by Activision. It is the thirteenth installment in the Call of Duty series and was released worldwide for PlayStation 4, Windows, and Xbox One on November 4, 2016. '),
(71, 'Dying Light', 'dlight.jpg', 1234, 8, 5, 60, 'wb', 'dyinglight.mp4', 'Explore the ultimate parkour zombie-slaying franchise and experience worlds loved by 40 Million Players.\r\n'),
(72, 'battlefield 1', 'bf1.jpg', 800, 8, 5, 70, 'electronic arts', 'bf1.mp4', 'Battlefield 1 is a first-person shooter game developed by DICE and published by Electronic Arts. It is the tenth installment in the Battlefield series[1] and the first main entry in the series since Battlefield 4 in 2013.[2] It was released for PlayStation 4, Windows, and Xbox One in October 2016.'),
(73, 'spider man:miles morales', 'miles.webp', 1500, 16, 5, 80, 'insomniac games', 'miles.mp4', 'After the events of Marvel’s Spider-Man Remastered, teenage Miles Morales is adjusting to his new home while following in the footsteps of his mentor, Peter Parker, as a new Spider-Man.	'),
(74, 'Sekiro: Shadows Die Twice', 'sekiro.jpg', 3000, 8, 3, 20, 'activision', 'sekiro.mp4', 'Sekiro: Shadows Die Twice is a 2019 action-adventure game developed by FromSoftware. It was released in Japan by FromSoftware and internationally by Activision for the PlayStation 4, Windows and Xbox One in March 2019 and for Stadia in October 2020.'),
(75, 'battlefield 4', 'bf4.jpg', 750, 4, 3, 30, 'electronic arts', 'bf4.mp4', 'Battlefield 4 is a 2013 first-person shooter video game developed by DICE and published by Electronic Arts'),
(76, 'call of duty modern warfare', 'cod4.jpg', 2400, 8, 3, 70, 'activision', 'mw.mp4', 'Call of Duty: Modern Warfare Remastered is a 2016 first-person shooter game developed by Raven Software and published by Activision.'),
(77, 'farcry 4', 'fc4.jpg', 1200, 8, 3, 50, 'ubisoft', 'fc4.mp4', 'Far Cry 4 is a 2014 first-person shooter game developed by Ubisoft Montreal and published by Ubisoft. It is the successor to the 2012 video game Far Cry 3, and the fourth main installment in the Far Cry series.'),
(78, 'farcry 5', 'fc5.jpeg', 1500, 8, 5, 80, 'ubisoft', 'fc5.mp4', 'Discover the open world of Hope County, Montana, besieged by a fanatical doomsday cult. Dive into the action solo or two-player co-op in the story campaign, use a vast arsenal of weapons and allies, and free Hope County from Joseph Seed and his cult'),
(79, 'watch dogs 2', 'wd2.jpeg', 500, 8, 5, 25, 'ubisoft', 'wd2.mp4', 'open world game set in san fransisco, a sequel to watch dogs 1 with emphasiz on hacking and parkour');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL,
  `doj` date NOT NULL,
  `ram` int NOT NULL DEFAULT '4',
  `cpu` int NOT NULL DEFAULT '3',
  `hdd` int NOT NULL DEFAULT '256',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `email`, `doj`, `ram`, `cpu`, `hdd`) VALUES
(18, 'jack', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', 'joyjack@gmail.com', '2025-01-09', 4, 3, 256);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewsell`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `viewsell`;
CREATE TABLE IF NOT EXISTS `viewsell` (
`COUNT(*)` bigint
,`game` varchar(50)
,`icon` varchar(70)
);

-- --------------------------------------------------------

--
-- Structure for view `viewsell`
--
DROP TABLE IF EXISTS `viewsell`;

DROP VIEW IF EXISTS `viewsell`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewsell`  AS SELECT count(0) AS `COUNT(*)`, `library`.`game` AS `game`, `library`.`icon` AS `icon` FROM `library` GROUP BY `library`.`game` ORDER BY count(0) DESC ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
