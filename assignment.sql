-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 08:25 PM
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Project_ID` int(5) NOT NULL,
  `Title` varchar(25) NOT NULL,
  `Descript` varchar(250) NOT NULL,
  `Img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Project_ID`, `Title`, `Descript`, `Img`) VALUES
(1, 'Teledrama Theom Song Sing', 'This is the theme song of the tele drama KINDURADARI aired on Hiru TV and it was sung by me', 0x2e2f696d616765732f766f63616c312e4d4f56),
(2, 'Dubbing 1', 'This is a cartoon movie aired on TV Derana channel and I am involved with the dubbing team of this cartoon MEE MEDIA as the character of the lady rat GEETHA you see in the video.', 0x2e2f696d616765732f64756262696e67312e4d4f56),
(3, 'Cover Song', 'This is a cover song sung by me and my sister Prabodha Iroshini during an interview on Rhythm Beat ,Charana TV.', 0x2e2f696d616765732f766f63616c322e4d4f56),
(4, 'Dubbing 3', 'This is a Teledrama aired on TV Derana channel and I am involved with the dubbing team of this cartoon HIMANTHARA as the character HIMANTHARA', 0x2e2f696d616765732f64756262696e67322e4d4f56),
(5, 'Dubbing 2', 'This is a cartoon movie aired on TV Derana channel and I am involved with the dubbing team of this cartoon WALAS MULLA as the character of the little squirrel DANTHAJA', 0x2e2f696d616765732f64756262696e67322e4d4f56);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'K.H.De Silva', '$2y$10$2bSWYj2sKlQdNZNYWx5YhuRuPD/uWPGqUVyA9gqOeu.9VamWW/d2a'),
(7, 'D.K.A.Rajapaksha', '$2y$10$YnapGOniV4jXXVQHXnmO0u9RHTJXWw5Q52xJP8VTBkqd8Okv8YXpy'),
(8, 'K.N.M.Perera', '$2y$10$u0V.QE52Q9ysfuHHZ/DzDONNENks9QJyjjQ6HsREsDlUQ.IgPQi2C'),
(12, 'asb1920109', '$2y$10$I6AbcwUGw5l0FUNiM5jCceXeEaf90Xu5vMkrUzkfDhlpocUf2VFoO');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Project_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
