-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 12:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(75) NOT NULL,
  `money` int(11) NOT NULL,
  `count` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `password`, `name`, `money`, `count`) VALUES
(1, 'admin', 'admin', 0, 0),
(2, 'testtest', 'Mohamed Ali Ahmed', 21000, 0),
(3, 'testtest', 'mina rasheed sameh', 30000, 2),
(100, 'hossam100', 'Hossam Moamed Ahmed', 34000, 0),
(101, 'mazen101', 'Mazen Mohamed Ibrahim', 30500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `account` varchar(16) NOT NULL,
  `acc_card_no` bigint(16) NOT NULL,
  `tdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `client_id`, `type`, `amount`, `account`, `acc_card_no`, `tdate`) VALUES
(1, 2, 'add', 1000, 'paypal', 2147483647, '2020-08-03'),
(2, 2, 'add', 1000, 'master card', 145635555, '2020-08-03'),
(3, 2, 'add', 5000, 'pioneer', 4569785236985147, '2020-08-03'),
(4, 2, 'add', 50000, 'western union', 555555555555555, '2020-08-03'),
(5, 2, 'add', 4000, 'master card', 9223372036854775807, '2020-08-03'),
(6, 2, 'add', 40000, 'pioneer', 1111111111111111, '2020-08-03'),
(7, 2, 'add', 40000, 'pioneer', 1111111111111111, '2020-08-03'),
(8, 2, 'add', 40000, 'pioneer', 569875412356, '2020-08-03'),
(9, 2, 'add', 50000, 'master card', 50000000000000000, '2020-08-03'),
(10, 2, 'add', 1000, 'visa card', 454654656455, '2020-08-03'),
(11, 2, 'add', 1000, 'visa card', 454654656455, '2020-08-03'),
(12, 2, 'add', 1000, 'paypal', 9223372036854775807, '2020-08-03'),
(13, 2, 'add', 1000, 'paypal', 9223372036854775807, '2020-08-03'),
(14, 2, 'add', 555, 'paypal', 555555555, '2020-08-03'),
(49, 2, 'add', 1000, 'paypal', 8664, '2020-08-03'),
(50, 2, 'add', 1000, 'paypal', 8664, '2020-08-03'),
(51, 2, 'add', 1000, 'paypal', 8664, '2020-08-03'),
(52, 2, 'add', 1000, 'master card', 645546465, '2020-08-03'),
(53, 2, 'add', 1000, 'master card', 645546465, '2020-08-03'),
(54, 2, 'add', 1000, 'master card', 645546465, '2020-08-03'),
(55, 2, 'add', 1000, 'pioneer', 1551, '2020-08-03'),
(56, 2, 'add', 50, 'pioneer', 54646645896, '2020-08-03'),
(58, 2, 'add', 100, 'paypal', 566166651, '2020-08-03'),
(59, 2, 'add', 50, 'visa card', 56565155355, '2020-08-03'),
(60, 2, 'add', 50, 'visa card', 56565155355, '2020-08-03'),
(61, 2, 'add', 50, 'visa card', 56565155355, '2020-08-03'),
(62, 2, 'add', 50, 'visa card', 56565155355, '2020-08-03'),
(63, 2, 'add', 100, 'paypal', 46546468153, '2020-08-03'),
(64, 2, 'add', 100, 'master card', 12515648, '2020-08-03'),
(65, 2, 'withdraw', 100, 'pioneer', 546456645, '2020-08-03'),
(66, 2, 'withdraw', 100, 'master card', 6464, '2020-08-03'),
(68, 2, 'add', 10000, 'pioneer', 7895632598741256, '2020-08-03'),
(69, 2, 'withdraw', 350, 'master card', 8569321596583265, '2020-08-03'),
(76, 2, 'add', 1000, 'visa card', 506556561456, '2020-08-04'),
(78, 2, 'add', 15000, 'pioneer', 4569874532156985, '2020-08-04'),
(80, 2, 'add', 500, 'paypal', 4568953215689632568, '2020-08-04'),
(81, 2, 'withdraw', 2000, 'master card', 4565895632157894, '2020-08-04'),
(83, 100, 'add', 1000, 'visa card', 456895369874256, '2020-08-04'),
(84, 100, 'withdraw', 500, 'western union', 5489365893658741, '2020-08-04'),
(86, 100, 'add', 10000, 'pioneer', 1259875369863215, '2020-08-04'),
(88, 2, 'add', 10000, 'visa card', 1256987435698745, '2020-08-04'),
(89, 2, 'withdraw', 7000, 'western union', 4785698532156987, '2020-08-04'),
(91, 2, 'add', 1000, 'master card', 4569874532156985, '2020-08-04'),
(92, 2, 'withdraw', 15000, 'western union', 1235698756485, '2020-08-04'),
(94, 2, 'add', 10000, 'paypal', 45698452656665, '2020-08-04'),
(96, 100, 'add', 500, 'visa card', 4569853698521, '2020-08-04'),
(98, 2, 'add', 1500, 'master card', 1245698736589658, '2020-08-04'),
(99, 2, 'withdraw', 8000, 'master card', 4598632569853269, '2020-08-04'),
(101, 2, 'add', 1500, 'visa card', 659865875215, '2020-08-04'),
(102, 2, 'withdraw', 500, 'paypal', 7895321568547598, '2020-08-04'),
(104, 100, 'add', 3000, 'visa card', 45689566565656, '2020-08-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
