-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 10:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(32) NOT NULL,
  `my_id` int(32) NOT NULL,
  `friend_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `my_id`, `friend_id`) VALUES
(4, 13, 12),
(9, 12, 20),
(10, 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(32) NOT NULL,
  `sender` int(32) NOT NULL,
  `recipient` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `sender`, `recipient`) VALUES
(15, 18, 16),
(16, 18, 17),
(17, 15, 17),
(18, 15, 18),
(20, 20, 16),
(23, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(32) NOT NULL,
  `body` varchar(32) NOT NULL,
  `user_id` int(32) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `likes` int(32) DEFAULT NULL,
  `photo` varchar(32) NOT NULL,
  `privacy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `user_id`, `time`, `likes`, `photo`, `privacy`) VALUES
(29, 'hello world', 12, '2020-05-17 19:20:04', 0, '', 1),
(30, 'hey friends', 12, '2020-05-17 19:20:29', 0, 'download.jpg', 0),
(31, 'worldddddd 😂❤️', 13, '2020-05-17 19:23:05', 0, 'German4Free.png', 1),
(44, 'wala ? elly fi baly?', 12, '2020-05-17 20:09:37', 0, 'img1.jpg', 0),
(45, 'wala ? elly fi baly?', 12, '2020-05-17 20:11:34', 0, 'img1.jpg', 0),
(46, 'directed by robert b weide', 12, '2020-05-17 20:11:52', 0, '', 0),
(48, 'samo3leiko ', 15, '2020-05-17 20:18:14', 0, '', 0),
(49, 'hey there !', 17, '2020-05-17 20:21:59', 0, '', 1),
(50, 'this is for friends', 17, '2020-05-17 20:22:17', 0, 'img6.jpeg', 0),
(51, 'hello world', 18, '2020-05-17 20:29:08', 0, '', 0),
(52, 'hello friends ! ❤️', 18, '2020-05-17 20:29:32', 0, 'img6.jpeg', 0),
(56, 'hello world', 20, '2020-05-17 20:42:41', 0, '', 1),
(57, 'ana tl3t fi el tv !😂', 20, '2020-05-17 20:43:24', 0, 'img2.png', 0),
(58, 'esht8al ? esht8al', 16, '2020-05-17 20:47:44', 0, 'img10.jpeg', 1),
(59, 'lw fi error .. ', 15, '2020-05-17 20:49:13', 0, 'img7.jpeg', 0),
(60, 'addar w lataf 😂😂', 15, '2020-05-17 20:49:40', 0, 'img4.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(32) NOT NULL,
  `home` varchar(32) NOT NULL,
  `relationship` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL,
  `aboutMe` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `pw`, `email`, `gender`, `date`, `phone`, `home`, `relationship`, `photo`, `aboutMe`) VALUES
(12, 'user1', 'first', '202cb962ac59075b964b07152d234b70', 'u1@gmail.com', 'Male', '1999-02-02', '01111339067', 'alex', 'Single', 'boy', 'hey there!'),
(13, 'user2', 'second', '202cb962ac59075b964b07152d234b70', 'u2@gmail.com', 'Female', '1989-01-12', '01111339066', 'cairo', 'In a relationship', 'Screenshot (23).png', 'hello!'),
(15, 'mirna', 'adel', '202cb962ac59075b964b07152d234b70', 'mirna@gmail.com', 'Female', '1999-09-27', '01111339067', 'alex', 'Single', 'img3.jpg', 'hey there!'),
(16, 'yasmine', 'ahmed', '202cb962ac59075b964b07152d234b70', 'yassoo@gmail.com', 'Female', '1999-09-27', '01111339067', 'alex', 'Single', 'img9.jpeg', 'lol'),
(17, 'nono', 'hesham', '202cb962ac59075b964b07152d234b70', 'mh@gmail.com', 'Female', '1998-12-12', '01111339067', 'alex', 'Married', 'img4.jpeg', 'hello!'),
(18, 'mohamed', 'hesham', '202cb962ac59075b964b07152d234b70', 'mha@gmail.com', 'Male', '1999-02-10', '01111339067', 'alex', 'Single', 'img1.jpg', 'hey there!'),
(20, 'mirnana', 'nasrallah', '202cb962ac59075b964b07152d234b70', 'na@gmail.com', 'Female', '1999-10-10', '01111339067', 'alex', 'Engaged', 'img3.jpg', 'helloooo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
