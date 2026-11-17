-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2026 at 10:58 AM
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
-- Database: `festival_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Lucas Martin'),
(2, 'Emma Laurent'),
(3, 'Nathan Bernard'),
(4, 'Chloe Petit'),
(5, 'Hugo Moreau'),
(6, 'Sarah Robert'),
(7, 'Leo Richard'),
(8, 'Julie Simon');

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`id`, `name`) VALUES
(2, 'Electric Waves'),
(4, 'Neon Pulse'),
(3, 'Silver Horizon'),
(1, 'The Midnight Echoes');

-- --------------------------------------------------------

--
-- Table structure for table `band_artist`
--

CREATE TABLE `band_artist` (
  `band_id` int UNSIGNED NOT NULL,
  `artist_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `band_artist`
--

INSERT INTO `band_artist` (`band_id`, `artist_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 6),
(4, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `day_id` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `booked_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `day_id`, `quantity`, `booked_at`) VALUES
(1, 1, 1, 2, '2027-05-01 10:15:00'),
(2, 2, 1, 1, '2027-05-02 14:30:00'),
(3, 3, 2, 3, '2027-05-03 09:45:00'),
(4, 4, 2, 2, '2027-05-04 16:20:00'),
(5, 5, 3, 4, '2027-05-05 11:00:00'),
(6, 6, 1, 2, '2027-05-06 13:10:00'),
(7, 7, 3, 1, '2027-05-07 17:45:00'),
(8, 1, 2, 2, '2027-05-08 12:30:00'),
(9, 2, 3, 3, '2027-05-09 15:00:00'),
(10, 3, 1, 1, '2027-05-10 08:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(254) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Thomas', 'Durand', 'thomas.durand@gmail.com'),
(2, 'Julie', 'Morel', 'julie.morel@gmail.com'),
(3, 'Antoine', 'Petit', 'antoine.petit@gmail.com'),
(4, 'Camille', 'Robert', 'camille.robert@gmail.com'),
(5, 'Maxime', 'Simon', 'maxime.simon@gmail.com'),
(6, 'Laura', 'Michel', 'laura.michel@gmail.com'),
(7, 'Alexandre', 'Garcia', 'alex.garcia@gmail.com'),
(8, 'Manon', 'Lefebvre', 'manon.lefebvre@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `festival_day`
--

CREATE TABLE `festival_day` (
  `id` int UNSIGNED NOT NULL,
  `day_date` date NOT NULL,
  `pass_price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festival_day`
--

INSERT INTO `festival_day` (`id`, `day_date`, `pass_price`) VALUES
(1, '2027-07-16', 45.00),
(2, '2027-07-17', 50.00),
(3, '2027-07-18', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `festival_show`
--

CREATE TABLE `festival_show` (
  `id` int UNSIGNED NOT NULL,
  `band_id` int UNSIGNED NOT NULL,
  `stage_id` int UNSIGNED NOT NULL,
  `day_id` int UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festival_show`
--

INSERT INTO `festival_show` (`id`, `band_id`, `stage_id`, `day_id`, `start_time`, `end_time`) VALUES
(1, 1, 1, 1, '18:00:00', '19:00:00'),
(2, 2, 2, 1, '19:30:00', '20:30:00'),
(3, 3, 1, 1, '21:00:00', '22:30:00'),
(4, 4, 3, 1, '22:00:00', '23:30:00'),
(5, 2, 1, 2, '18:00:00', '19:30:00'),
(6, 3, 2, 2, '20:00:00', '21:00:00'),
(7, 1, 1, 2, '21:30:00', '23:00:00'),
(8, 4, 1, 3, '17:00:00', '18:30:00'),
(9, 3, 3, 3, '19:00:00', '20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `name`) VALUES
(3, 'Electronic Stage'),
(1, 'Main Stage'),
(2, 'Rock Stage');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `band_artist`
--
ALTER TABLE `band_artist`
  ADD PRIMARY KEY (`band_id`,`artist_id`),
  ADD KEY `band_id` (`band_id`,`artist_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`day_id`),
  ADD KEY `day_id` (`day_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `festival_day`
--
ALTER TABLE `festival_day`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day_date` (`day_date`);

--
-- Indexes for table `festival_show`
--
ALTER TABLE `festival_show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `band_id` (`band_id`),
  ADD KEY `stage_id` (`stage_id`,`day_id`),
  ADD KEY `day_id` (`day_id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `festival_day`
--
ALTER TABLE `festival_day`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `festival_show`
--
ALTER TABLE `festival_show`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `band_artist`
--
ALTER TABLE `band_artist`
  ADD CONSTRAINT `band_artist_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `band_artist_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `festival_day` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `festival_show`
--
ALTER TABLE `festival_show`
  ADD CONSTRAINT `festival_show_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `festival_show_ibfk_2` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `festival_show_ibfk_3` FOREIGN KEY (`day_id`) REFERENCES `festival_day` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
