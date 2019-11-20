-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 09:28 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autostore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `model` text NOT NULL,
  `year` int(4) NOT NULL,
  `price` int(6) NOT NULL,
  `stock` int(4) NOT NULL,
  `image` varchar(120) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `model`, `year`, `price`, `stock`, `image`, `description`) VALUES
(1, 'Toyota', 2006, 11, 4, '', '4-door luxury style care.<br> All leather interior, with choice of black or tan.<br> 34mph highway.'),
(2, 'Ford', 2008, 8, 4, '', '4-door pickup with all wheel drive.<br> 22mpg highway.<br>'),
(3, 'Nissan' 2009, 12, 3, '', '4-door car includes v6 engine and turbocharge.<br> All brown leather interior.<br> 28mpg highway.'),
(4, 'Kia', 2014, 10, 5, '', '4-door car with front wheel drive.<br>On screen navigation and bluetooth player. 29mpg highway.'),
(5, 'Chevrolet', 2009, 8, '', '2-door pickup with coverbed.<br> Rubber coated exterior trim.<br> 23mph highway.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
