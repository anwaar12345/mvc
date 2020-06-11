-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 03:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'images.jpg',
  `islead` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`, `islead`, `created_at`) VALUES
(23, 'rfftr', 'a@s', '$2y$10$.YeRe93.1bPFsDZjde86NOZddjZgYEzShgLlrYwoVRSPzaa5isxF.', 'download.jfif', 0, '2020-06-11 16:48:41'),
(24, 'Syed Anwar Ahmed Shah', 'syed.anwar@nextgeni.dev', '$2y$10$UQamImdN3E.ZN4TsUL1.MeMUOdQIJtRq4TRuBPBrd2A0QcDZegmze', 'pak.png', 0, '2020-06-11 17:34:40'),
(25, 'Syed Anwar Ahmed Shah', 's@1', '$2y$10$uXFlO1f4HVrNg7MiJw.n5.brdwUDJ2lROUFgnf9clrn6IWMPervtW', 'pak.png', 0, '2020-06-11 17:39:14'),
(26, 'khan', 'k@kq', '$2y$10$dW9MHNv/W5sokc6Im8FKA.SAO1ZYbot904b1MJMSC/MKB0hIclggS', 'pak.png', 0, '2020-06-11 17:43:18'),
(27, 'Syed Anwar Ahmed Shah', 'syed.anwar@nextgeni.devssxc', '$2y$10$q2tl4stCbqRqPtT9Rgk5/Op3MbHRK2j7LIk0B3.72TujZL.nSgFZi', 'pak.png', 0, '2020-06-11 17:45:15'),
(28, 'k', 'k@k2w', '$2y$10$P99GoiUbq0WBezVRZ0SvDeH4TaNz8v8C2W8ODioh823JVSLoI1u6y', 'pak.png', 0, '2020-06-11 17:52:35'),
(29, 'khan', 'asas@w', '$2y$10$qzwxrDdiRKtQ6ck4PTnHJeqQS9EoWL9zW74iGbTvP9egSSuPCrLQG', 'pak.png', 0, '2020-06-11 17:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
