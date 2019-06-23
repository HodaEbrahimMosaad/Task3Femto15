-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 04:58 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `hash_password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `hash_password`, `email`) VALUES
(6, 'somaia ibrahi', '$2y$10$Tsk6624VPfu70sFZxY0IheZECL5aq8BYl.wKpFFZGjoXhTqXIriH6', 'hoda@jh.com'),
(9, 'h111ooodaaaa', '12345678', 'hoda@jh.com'),
(10, 'soma', '$2y$10$uFZhyjY.Hg.StiN/Pe2qCe9dotF0144qxtquByFs1KTPNXDoiryKy', 'hokkkda@jh.com'),
(12, 'somaia', '$2y$10$ZJf0MI6rXCZc.yiRtW.x/eN.BDjq2lWXBp0h7g9g6cHHpEawtZR6K', 'hokkkda@jh.com'),
(13, 'kjjhhjh', '$2y$10$Kn4I93zp9wmTctUILXPZ0.NniQI5C.AsXpzrd366yxwnW.f/kzbQe', 'hokkkda@jh.com'),
(14, 'hoda mosaad', '$2y$10$UUDbyWmYx0xSEdaD3LUaeOS2q/pmGc0/9d/JJgs1bsmuWOcNFxs16', 'hokkkda@jh.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `hash_password` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `status` enum('ACCEPTED','BLOCKED') CHARACTER SET utf8 DEFAULT 'BLOCKED',
  `plan` enum('Gold','Silver','Regular') CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `phone_number`, `email`, `hash_password`, `birthdate`, `status`, `plan`) VALUES
(5, 'somai', '0101105594', 'hoda@yahoo.com', '$2y$10$DB61rxkXlJ9FKStENL7tFeKIPikLCWVUm2gieFrGEi/f0CtnqD6d.', '2019-12-31', 'ACCEPTED', 'Silver'),
(6, 'kjkj', 'khkhkh', 'kjhkjhjkhk', 'jhjkhjkh', '2018-11-30', 'BLOCKED', 'Silver'),
(7, 'kklk', 'lklk', 'lklk', 'lklk', '2019-12-31', 'ACCEPTED', 'Regular'),
(8, 'll', 'lkl', 'klklk', 'lklkl', '2018-11-30', 'ACCEPTED', 'Gold'),
(9, 'h', 'h', 'h', 'h', '2018-10-31', 'ACCEPTED', 'Silver'),
(10, 'o', 'o', 'o', 'o', '2017-12-31', 'ACCEPTED', 'Regular'),
(11, 'l', '0101105594', 'hoda@yahoo.com', '', '2018-11-29', 'ACCEPTED', 'Gold'),
(12, 'ooo', '0101105594900', 'hoda@yahoo.com', '', '2014-10-26', 'ACCEPTED', 'Silver'),
(13, 'e', '0101105594', 'hoda@yahoo.com', '', '2018-12-30', 'ACCEPTED', 'Regular'),
(14, 'hoda mosaad', '0101105594', 'hoda@yahoo.com', '$2y$10$Oagi4ltBVeI3w8MC9ndPCe5frq9A4yCoCiS6CuiYypgwCZUn0H9Ky', '2018-12-31', 'ACCEPTED', 'Gold'),
(15, 'we', '0101105594', 'hoda@yahoo.com', '$2y$10$9r05./ro2kBTaV/koK3lJu94cXc.FRW0jDJ0bLL9EHaFgTZILt/46', '2018-12-31', 'ACCEPTED', 'Regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
