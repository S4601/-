-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2023 at 11:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'Ð—Ð´Ñ€Ð°Ð²ÐµÐ¹|Ð·Ð´Ñ€Ð°Ð²ÐµÐ¹|Ð—Ð´Ñ€Ð°ÑÑ‚Ð¸|Ð·Ð´Ñ€Ð°ÑÑ‚Ð¸|Ð”Ð¾Ð±ÑŠÑ€ Ð´ÐµÐ½|Ð´Ð¾Ð±ÑŠÑ€ Ð´ÐµÐ½', 'Ð—Ð´Ñ€Ð°Ð²ÐµÐ¹Ñ‚Ðµ! ÐšÐ°Ðº Ð¼Ð¾Ð³Ð° Ð´Ð° Ð’Ð¸ Ð¿Ð¾Ð¼Ð¾Ð³Ð½Ð°?'),
(2, 'ÑƒÑ‡ÐµÐ±Ð½Ð¸Ðº|ÐšÐ°Ðº Ð´Ð° Ð½Ð°Ð¼ÐµÑ€Ñ ÑƒÑ‡ÐµÐ±Ð½Ð¸Ðº|Ð¢ÑŠÑ€ÑÑ ÑƒÑ‡ÐµÐ±Ð½Ð¸Ðº', 'Ð—Ð° Ð´Ð° Ð½Ð°Ð¼ÐµÑ€Ð¸Ñ‚Ðµ ÑƒÑ‡ÐµÐ±Ð½Ð¸Ðº Ñ‚Ñ€ÑÐ±Ð²Ð° Ð´Ð° ÐºÐ»Ð¸ÐºÐ½ÐµÑ‚Ðµ Ð²ÑŠÑ€Ñ…Ñƒ Ð¼ÐµÐ½ÑŽÑ‚Ð¾ \"ÐžÐ±ÑÐ²Ð¸\". Ð¢Ð°Ð¼ ÑÐµ Ð½Ð°Ð¼Ð¸Ñ€Ð°Ñ‚ Ð²ÑÐ¸Ñ‡ÐºÐ¸Ñ‚Ðµ ÐºÐ°Ñ‡ÐµÐ½Ð¸ Ð¾Ð±ÑÐ²Ð¸! ÐœÐ¾Ð¶Ðµ Ð´Ð° ÑƒÐ»ÐµÑÐ½Ð¸Ñ‚Ðµ Ñ‚ÑŠÑ€ÑÐµÐ½ÐµÑ‚Ð¾ ÐºÐ°Ñ‚Ð¾ Ð¸Ð·Ð¿Ð¾Ð»Ð·Ð²Ð°Ñ‚Ðµ Ñ„Ð¸Ð»Ñ‚Ñ€Ð¸Ñ‚Ðµ!'),
(3, 'Ñ‚Ð°ÐºÑÐ°|Ñ‚Ð°ÐºÑÐ¸|Ð¿Ð»Ð°Ñ‰Ð°Ð½Ðµ|Ð±ÐµÐ·Ð¿Ð»Ð¾Ñ‚Ð½Ð¾|Ð¿Ð»Ð°Ñ‚ÐµÐ½Ð¾', 'Ð˜Ð·Ð¿Ð¾Ð»Ð·Ð²Ð°Ð½ÐµÑ‚Ð¾ Ð½Ð° ÑƒÐµÐ± ÑÐ°Ð¹Ñ‚Ð° Ðµ Ð½Ð°Ð¿ÑŠÐ»Ð½Ð¾ Ð±ÐµÐ·Ð¿Ð»Ð°Ñ‚Ð½Ð¾!'),
(7, 'Ð¿Ñ€Ð¾Ð±Ð»ÐµÐ¼|Ð°Ð´Ð¼Ð¸Ð½|ÑÐ²ÑŠÑ€Ð·Ð²Ð°Ð½Ðµ Ñ Ð²Ð°Ñ|ÑÐ²ÑŠÑ€Ð¶Ð° Ñ Ð²Ð°Ñ|ÐšÐ°Ðº Ð´Ð° ÑÐµ ÑÐ²ÑŠÑ€Ð¶Ð° Ñ Ð²Ð°Ñ|ÐºÐ°Ðº Ð´Ð° ÑÐµ ÑÐ²ÑŠÑ€Ð¶Ð° Ñ Ð²Ð°Ñ?|ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð¸|ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð¸', 'ÐŸÐ¸ÑˆÐµÑ‚Ðµ Ð½Ð¸ Ð½Ð° Ð½Ð°ÑˆÐ°Ñ‚Ð° Instagram ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ð° @borsaaxg(Ð½Ð°Ð»Ð¸Ñ‡ÐµÐ½ Ðµ Ð»Ð¸Ð½Ðº Ð¿Ñ€Ð¸ Ð½Ð°Ñ‚Ð¸ÑÐºÐ°Ð½Ðµ Ð½Ð° Ð±ÑƒÑ‚Ð¾Ð½Ð° \"ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð¸\")');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `img_dir` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `img_dir`) VALUES
(6, 'img', 'uploads/IMG-634029e4323ef0.38960866.jpg'),
(7, 'img', 'uploads/IMG-63419267f30090.77877244.jpg'),
(8, 'img', 'uploads/IMG-62346895087333.44312834.jpg'),
(9, 'img', 'uploads/IMG-63274820e75057.38776324.jpg'),
(10, 'img', 'uploads/IMG-623124e9868171.44476537.jpg'),
(11, 'img', 'uploads/IMG-6350e333234518.88568483.jpg'),
(12, 'img', 'uploads/IMG-6350e33322b6c6.06569873.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `users_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_title` varchar(256) NOT NULL,
  `post_description` varchar(256) NOT NULL,
  `post_subject` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `post_price` int(5) NOT NULL,
  `post_area` varchar(50) NOT NULL,
  `post_place` varchar(50) NOT NULL,
  `img_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`users_id`, `post_id`, `post_title`, `post_description`, `post_subject`, `class`, `publisher`, `post_price`, `post_area`, `post_place`, `img_id`) VALUES
(1, 36, 'Ð£Ñ‡ÐµÐ±Ð½Ð¸Ðº Ð¿Ð¾ Ð±Ð¸Ð¾Ð»Ð¾Ð³Ð¸Ñ', 'ÐœÐ½Ð¾Ð³Ð¾ Ð·Ð°Ð¿Ð°Ð·ÐµÐ½!', 'Biology', '10. class', 'ÐÐ½ÑƒÐ±Ð¸Ñ', 10, 'ÐŸÐ»Ð¾Ð²Ð´Ð¸Ð²', 'ÐŸÐ»Ð¾Ð²Ð´Ð¸Ð²', '6 7'),
(1, 37, 'Ð£Ñ‡ÐµÐ±Ð½Ð¸Ðº Ð¿Ð¾ Ð³ÐµÐ¾Ð³Ñ€Ð°Ñ„Ð¸Ñ', 'ÐœÐ½Ð¾Ð³Ð¾ Ð·Ð°Ð¿Ð°Ð·ÐµÐ½ ÑƒÑ‡ÐµÐ±Ð½Ð¸Ðº!', 'Geography', '10. class', 'ÐŸÑ€Ð¾ÑÐ²ÐµÑ‚Ð° ÐŸÐ»ÑŽÑ', 9, 'Ð¡Ð¾Ñ„Ð¸Ñ', 'Ð¡Ð¾Ñ„Ð¸Ñ', '8 9'),
(1, 38, 'Ð£Ñ‡ÐµÐ±Ð½Ð¸Ðº Ð¿Ð¾ Ð±ÑŠÐ»Ð³Ð°Ñ€ÑÐºÐ¸ ÐµÐ·Ð¸Ðº', 'Ð£Ñ‡ÐµÐ±Ð½Ð¸ÐºÑŠÑ‚ Ðµ Ð¼Ð½Ð¾Ð³Ð¾ Ð·Ð°Ð¿Ð°Ñ‡ÐµÐ½!', 'Bulgarian', '10. class', 'Ð‘ÑƒÐ»Ñ‚ÐµÑÑ‚ Ð¡Ñ‚Ð°Ð½Ð´Ð°Ñ€Ñ‚', 9, 'Ð’Ð°Ñ€Ð½Ð°', 'Ð’Ð°Ñ€Ð½Ð°', '10'),
(1, 39, 'Ð£Ñ‡ÐµÐ±Ð½Ð¸Ðº Ð¿Ð¾ Ð¼Ð°Ñ‚ÐµÐ¼Ð°Ñ‚Ð¸ÐºÐ°', 'ÐžÑ‚Ð»Ð¸Ñ‡Ð½Ð¾ Ð·Ð°Ð¿Ð°Ð·ÐµÐ½ ÑƒÑ‡ÐµÐ±Ð»Ð¸Ðº!', 'Math', '11. class', 'ÐÐ½ÑƒÐ±Ð¸Ñ', 10, 'ÐŸÐ»Ð¾Ð²Ð´Ð¸Ð²', 'ÐŸÐ»Ð¾Ð²Ð´Ð¸Ð²', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rateID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ratedUser` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rateID`, `userID`, `ratedUser`, `rate`) VALUES
(40, 10, 1, 3),
(41, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `phone` int(9) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `phone`, `usersPwd`, `rate`) VALUES
(1, 'Sasho Sasho', 'asdasd@gmail.com', 'sasho123', 0, '$2y$10$IqTzRWGN3wBR3OJVJoqscu9LttoTkwzrN6OyLxG7tn0TsrDVBuqwq', 2.5),
(10, 'TestAcc', 'TestAcc@gmail.com', 'TestAcc', 12, '$2y$10$DlA.FDy9IYuNuviDG0rqSOPW9x04N2x19O0Yua34BbnkqobyFDIli', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rateID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
