-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2021 at 12:27 PM
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
CREATE DATABASE IF NOT EXISTS `db_milestone` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_milestone`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `interest` varchar(50) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`nama`, `username`, `email`, `password`, `interest`, `education`, `bio`) VALUES
('bayu', 'bayu', 'tes@example.com', '000000', 'programming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id` varchar(100) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `postid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_friends`
--

CREATE TABLE `tb_friends` (
  `idfriends` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userfriend` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `username` varchar(100) NOT NULL,
  `posts` text NOT NULL,
  `image` text DEFAULT NULL,
  `postid` varchar(100) NOT NULL,
  `picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD KEY `tb_comment_FK` (`username`),
  ADD KEY `tb_comment_FK_1` (`postid`);

--
-- Indexes for table `tb_friends`
--
ALTER TABLE `tb_friends`
  ADD PRIMARY KEY (`idfriends`),
  ADD KEY `tb_friends_FK` (`username`),
  ADD KEY `tb_friends_FK_1` (`userfriend`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `tb_post_FK` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `tb_comment_FK` FOREIGN KEY (`username`) REFERENCES `tb_akun` (`username`),
  ADD CONSTRAINT `tb_comment_FK_1` FOREIGN KEY (`postid`) REFERENCES `tb_post` (`postid`);

--
-- Constraints for table `tb_friends`
--
ALTER TABLE `tb_friends`
  ADD CONSTRAINT `tb_friends_FK` FOREIGN KEY (`username`) REFERENCES `tb_akun` (`username`),
  ADD CONSTRAINT `tb_friends_FK_1` FOREIGN KEY (`userfriend`) REFERENCES `tb_akun` (`username`);

--
-- Constraints for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD CONSTRAINT `tb_post_FK` FOREIGN KEY (`username`) REFERENCES `tb_akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
