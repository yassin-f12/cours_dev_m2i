-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2026 at 09:24 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netfloux`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint UNSIGNED NOT NULL,
  `cat_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `category_is_archived` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `category_is_archived`) VALUES
(1, 'Action', 0),
(2, 'Romantique', 0),
(3, 'Science-fiction', 0),
(4, 'Thriller', 0),
(5, 'Comédie', 0),
(6, 'Drame', 0),
(7, 'Fantastique', 0),
(8, 'Aventure', 0),
(9, 'Western', 0),
(10, 'Horreur', 0),
(11, 'Japonais', 1),
(12, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `summary` text COLLATE utf8mb4_general_ci,
  `movie_year` year DEFAULT NULL,
  `movie_time` time DEFAULT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_watched` tinyint NOT NULL DEFAULT '0',
  `rank` tinyint NOT NULL DEFAULT '0',
  `picture` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_category` tinyint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `summary`, `movie_year`, `movie_time`, `trailer`, `is_watched`, `rank`, `picture`, `id_category`, `created_at`) VALUES
(7, 'Parasite', 'Une famille pauvre réussit progressivement à s\'introduire dans le quotidien d\'une famille très riche. Mais leur stratagème va provoquer des événements inattendus.', '2019', '02:11:00', 'e_sUpjVgqU4', 0, 4, '07ad3fbc.jpg', 4, '2026-11-25 14:50:16'),
(9, 'The Dark Knight : Le Chevalier noir', 'Batman tente de protéger Gotham face au Joker, un criminel imprévisible qui cherche à plonger la ville dans le chaos.', '2008', '02:32:00', 'XGqgxGBn7Qw', 0, 5, '55e9cefa.jpg', 1, '2026-11-25 14:53:44'),
(10, 'Intouchables', 'Un aristocrate devenu tétraplégique engage comme aide à domicile un jeune homme issu d\'un quartier populaire. Une amitié inattendue va naître entre eux.', '2011', '01:50:00', '1__cRI3e1_A', 0, 4, NULL, 5, '2026-11-25 15:02:23'),
(11, 'Incendies', 'Lorsque le notaire Lebel fait à Jeanne et Simon Marwan la lecture du testament de leur mère Nawal, les jumeaux sont sidérés de se voir remettre deux enveloppes, l\'une destinée à un père qu\'ils croyaient mort et l\'autre à un frère dont ils ignoraient l\'existence.', '2010', '02:00:00', 'KBDacCF1Mzg', 0, 5, '23d088a2.jpg', 6, '2026-11-26 09:21:49'),
(12, 'Le Terminal', 'Un immigrant fuyant la guerre qui ravage sa patrie minuscule d\'Europe de l\'Est se retrouve dans le terminal d\'un aéroport de New York. Quand la guerre détruit totalement sa nation d\'origine, l\'homme comprend que son passeport et tous ses papiers d\'identité ne sont plus valides. Tel un sans-abri, il s\'installe dans le terminal, se lie d\'amitié avec le personnel de l\'aéroport et va jusqu\'à tomber amoureux d\'une hôtesse de l\'air...', '2004', '02:08:00', 'cXIEY59W7GQ', 1, 4, 'b4876c14.jpg', 2, '2026-11-26 09:28:14'),
(13, 'Ratatouille', 'Rémy n\'est pas un jeune rat comme les autres. Il a un véritable don, celui de cuisiner, marier les saveurs, découvrir de nouveaux arômes et un rêve : devenir un grand chef et le premier rat de goût. Il est prêt à tout pour vivre sa passion, notamment venir s\'installer avec sa famille sous les cuisines d\'un des plus grands restaurants parisiens : celui d\'Auguste Gusteau, la star des fourneaux.', '2007', '01:51:00', 'XWtfH6ksmUQ', 1, 4, '0bf29c52.jpg', 5, '2026-11-27 09:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `user_email`, `user_password`, `created_at`, `user_is_admin`) VALUES
('21986580', 'yasnoadmin', 'dfd@gmail.com', '$2y$10$xsjB183IN6IWSeaC2E/TN.LDUTsB/.gdgT4JICY0VPkSuXbyPIywa', '2026-11-25 16:42:38', 0),
('9e2d86c1', 'yass', 'sa@gmail.com', '$2y$10$PkICT16srKHOqd/Yf.4GY.DLPxvHHS1WDkQohgZ/kiwWZmE080AM.', '2026-11-25 09:23:14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
