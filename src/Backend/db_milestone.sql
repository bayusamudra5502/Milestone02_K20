-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2021 at 09:42 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_milestone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_accounts`
--

CREATE TABLE `tb_accounts` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `interest` varchar(50) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `birthday` date NOT NULL,
  `facebook_url` text DEFAULT NULL,
  `instagram_url` text DEFAULT NULL,
  `linkedin_url` text DEFAULT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_accounts`
--

INSERT INTO `tb_accounts` (`nama`, `username`, `email`, `password`, `interest`, `education`, `bio`, `birthday`, `facebook_url`, `instagram_url`, `linkedin_url`, `photo`) VALUES
('bayu', 'bayu', 'tes@example.com', '9999', 'programming', NULL, NULL, '0000-00-00', '', '', '', NULL),
('Bayu Samudra', 'bayus', 'hayoloh@ba.cang', '$2y$10$l4iiSA7pgGqXOThz/h8pOeS8J3k69cGoteE543ipZUYprMYLkyJpS', 'programming', NULL, NULL, '2002-05-05', NULL, NULL, NULL, NULL),
('Bayu Samudra', 'bayusam', 'hayoloh@ba.cang', '$2y$10$Ukul4J80N.uet6HmCAhca.4XYbyPVLujpgRfMWwkRmBu8VzbMR8EO', 'programming', NULL, NULL, '2002-05-05', NULL, NULL, NULL, NULL),
('Bayu Samudra', 'hai', 'hayoloh@ba.cang', '$2y$10$sLl2bsoncT41sI40.NYI5uEX8VJPr4w.BLV2.NS57lY34XUf56AMC', 'programming', NULL, NULL, '2002-05-05', NULL, NULL, NULL, NULL),
('Bayu Samudra', 'haikamu', 'hayoloh@ba.cang', '$2y$10$l6JgsqX79g42uhfwpfelAO9gdVx.7ZtQ/7FcemnrfI0GMlt5kai/O', 'programming', NULL, NULL, '2002-05-05', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `postid` int(100) NOT NULL,
  `timepublish` datetime NOT NULL,
  `timeupdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_friends`
--

CREATE TABLE `tb_friends` (
  `id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userfriend` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_likes`
--

CREATE TABLE `tb_likes` (
  `id` int(11) NOT NULL,
  `posts` int(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_logged`
--

CREATE TABLE `tb_logged` (
  `id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_logged`
--

INSERT INTO `tb_logged` (`id`, `token`, `username`, `expired`) VALUES
(4, 'f2075c9870a6a4f5a976c2e2b6c719ce62429abbf1b8056f9720b14c925ab03849caf453ee534f636356bbe9610fcbfa4330c65ac1cb9a8e2acd6532664a1613', 'bayus', '2021-08-16 09:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `posts` text NOT NULL,
  `media` text DEFAULT NULL,
  `timepublish` datetime DEFAULT NULL,
  `timeupdated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`id`, `username`, `posts`, `media`, `timepublish`, `timeupdated`) VALUES
(1, 'bayu', 'assds', 'asdsads', NULL, NULL),
(2, 'bayu', 'Halo, Dunia Apa kabarnya', 'Ini File', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_accounts`
--
ALTER TABLE `tb_accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_FK` (`username`) USING BTREE,
  ADD KEY `post_id_FK` (`postid`) USING BTREE;

--
-- Indexes for table `tb_friends`
--
ALTER TABLE `tb_friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_friends_FK` (`username`),
  ADD KEY `tb_friends_FK_1` (`userfriend`);

--
-- Indexes for table `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_likes_FK` (`username`),
  ADD KEY `tb_likes_FK_1` (`posts`);

--
-- Indexes for table `tb_logged`
--
ALTER TABLE `tb_logged`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `tb_logged_FK` (`username`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_post_FK` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_logged`
--
ALTER TABLE `tb_logged`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comment_FK` FOREIGN KEY (`username`) REFERENCES `tb_accounts` (`username`),
  ADD CONSTRAINT `tb_comment_FK_1` FOREIGN KEY (`postid`) REFERENCES `tb_posts` (`id`);

--
-- Constraints for table `tb_friends`
--
ALTER TABLE `tb_friends`
  ADD CONSTRAINT `tb_friends_FK` FOREIGN KEY (`username`) REFERENCES `tb_accounts` (`username`),
  ADD CONSTRAINT `tb_friends_FK_1` FOREIGN KEY (`userfriend`) REFERENCES `tb_accounts` (`username`);

--
-- Constraints for table `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD CONSTRAINT `tb_likes_FK` FOREIGN KEY (`username`) REFERENCES `tb_accounts` (`username`),
  ADD CONSTRAINT `tb_likes_FK_1` FOREIGN KEY (`posts`) REFERENCES `tb_posts` (`id`);

--
-- Constraints for table `tb_logged`
--
ALTER TABLE `tb_logged`
  ADD CONSTRAINT `tb_logged_FK` FOREIGN KEY (`username`) REFERENCES `tb_accounts` (`username`);

--
-- Constraints for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD CONSTRAINT `tb_post_FK` FOREIGN KEY (`username`) REFERENCES `tb_accounts` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
