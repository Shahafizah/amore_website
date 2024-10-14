-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amore_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact`, `comment`, `submitted_at`) VALUES
(1, 'izzah', 'i@gmail.com', '0123456789', 'improve', '2024-09-04 12:46:03'),
(2, 'izzah', 'i@gmail.com', '0123456789', 'improve', '2024-09-04 12:49:00'),
(3, 'izzah', 'i@gmail.com', '0123456789', 'improve', '2024-09-04 12:49:02'),
(4, 'izzah', 'i@gmail.com', '0123456789', 'imrpove', '2024-09-04 12:49:39'),
(5, 'izzah', 'i@gmail.com', '0123456789', 'imrpove', '2024-09-04 12:49:44'),
(6, 'izzah', 'i@gmail.com', '0123456789', 'imrpove', '2024-09-04 14:37:58'),
(7, 'nana', 'nana@gmail.com', '0123456789', 'helo', '2024-09-07 10:36:36'),
(8, 'nan', 'nana@gmail.com', '0108862232', 'app', '2024-09-07 10:37:59'),
(9, 'J', 'j@gmail.com', '0123456789', 'im', '2024-09-07 10:46:54'),
(10, 'J', 'j@gmail.com', '0123456789', 'j', '2024-09-07 10:51:59'),
(11, 'J', 'j@gmail.com', '0123456789', 'j', '2024-09-07 10:52:18'),
(12, 'J', 'j@gmail.com', '0108862232', 'j', '2024-09-07 10:52:36'),
(13, 'J', 'j@gmail.com', '0167061802', 'jj', '2024-09-07 10:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(100) NOT NULL,
  `User_email` varchar(100) NOT NULL,
  `User_contact` varchar(15) NOT NULL,
  `User_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`User_id`, `User_name`, `User_email`, `User_contact`, `User_password`) VALUES
(1, 'Izzah', 'i@gmail.com', '0123456789', '$2y$10$6NriYidvbkPuaI/VsJKaBO.L0ytq6hrW9bDvhx7bnIVpUI4lpEiu.'),
(3, 'Izzah', 'a@gmail.com', '0123456789', '$2y$10$zpzhb525k06wATWSp/FsYehgy7q1q1KQHgzLVK2ChVlGWQRpcqaeW'),
(4, 'J', 'j@gmail.com', '0123456789', '$2y$10$hD2Vk1q0yg50c5MojmoaQeVXF2NPAYKpopkR0T/Pv3aDR4eVGaGjG'),
(6, 'J', 'o@gmail.com', '0167061802', '$2y$10$bnN8N6pypRY0YaCPGM8.C.TSpJtPMNlg/Ky4EUHk30cbNBB0YoY9u'),
(7, 'nana', 'nana6@gmail.com', '0123652563', 'Nanana@6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_email` (`User_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
