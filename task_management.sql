-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 03:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `color` varchar(20) DEFAULT NULL,
  `due_date` date DEFAULT current_timestamp(),
  `priority` varchar(50) DEFAULT NULL,
  `completion_status` varchar(255) NOT NULL DEFAULT '''Incomplete''',
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `users_id`, `title`, `content`, `created_at`, `updated_at`, `color`, `due_date`, `priority`, `completion_status`, `category`) VALUES
(1, 1, 'SDT TEST', 'Test: Daily Task Management System', '2024-01-25 23:43:08', '2024-01-26 14:17:07', 'rgb(242, 215, 213)', '2024-01-26', 'High', 'Completed', 'TEST'),
(2, 1, 'SDT AA', '1.0	PROJECT SCOPE', '2024-01-25 23:43:59', '2024-01-26 14:17:14', 'rgb(242, 215, 213)', '2024-02-03', 'Medium', 'Incomplete', 'AA'),
(3, 1, 'DB P3', 'Subject : Database (SECD2523)', '2024-01-25 23:46:17', '2024-01-26 14:17:22', 'rgb(246, 221, 204)', '2024-02-07', 'Medium', 'Incomplete', 'PROJECT'),
(4, 1, 'DB AA', 'TBD', '2024-01-25 23:46:48', '2024-01-25 23:46:48', 'rgb(246, 221, 204)', '2024-02-11', 'Medium', 'Incomplete', 'AA'),
(5, 2, 'SEM II 23/24 COURSE REGISTRATION', 'REGISTERED', '2024-01-25 23:52:10', '2024-01-25 23:52:10', 'rgb(212, 230, 241)', '2024-01-18', 'High', 'Completed', 'ACADEMIC'),
(7, 1, 'NC FINAL', 'TBD', '2024-01-26 00:00:22', '2024-01-26 00:00:22', 'rgb(232, 218, 239)', '2024-02-06', 'High', 'Incomplete', 'FINAL'),
(8, 3, '[ ACCOUNTING T-SHIRT DESIGN CONTEST ]', '21 November until 8 December 2023 (Submission)', '2024-01-26 01:19:20', '2024-01-26 03:50:26', 'rgb(212, 230, 241)', '2023-12-08', 'Low', 'Completed', 'MERIT'),
(9, 1, 'SEM II 23/24 COURSE REGISTRATION', 'REGISTERED', '2024-01-26 04:38:42', '2024-01-26 04:38:42', 'rgb(212, 230, 241)', '2024-01-18', 'High', 'Completed', 'ACADEMIC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`) VALUES
(1, 'taskx', '$2y$10$S3oXo/YPoxEedXJKTYc0VOQmyFSeVAga1BIJgV4IMgTtxAZNZU6jC'),
(2, 'ksx', '$2y$10$ov9nxPVrSjG5TXhNQeZizuMCwXzBG74MiyFha9RZgnkcXhmx5SWX6'),
(3, 'wong', '$2y$10$zV0u81s8qk9.re6nNmEhMe9ub9foPVw0qH4T.8gMiC0SgMFMaWPwW'),
(4, 'ali', '$2y$10$4Guvk2cRpV1cM645EpVeuOe3wijnvfmKvd4arDmpUAKw2ldmZCveG'),
(5, 'abu', '$2y$10$JXVrxRXyiEsuIuVGBvgG8OaIuIFj7wSMTHcMrjwwbzfPKfNfpoB/u'),
(6, 'abi', '$2y$10$LkhCJKQ6H0nXL6ASe7cWJeWiqh4PPymRpaevfRJD8bmHNWl7Jss92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
