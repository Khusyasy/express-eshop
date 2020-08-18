-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 10:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_rubik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `email`, `password`, `name`, `level`) VALUES
(1, 'khusyasy', 'khusyasy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'luthfi khusyasy', 'admin'),
(2, 'luthfi', 'luthfi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'luthfi akjsdjkl', 'user'),
(3, 'test', 'email@emailnya.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sadfasdf', 'user'),
(4, 'test2', 'email@emailnya.com', '827ccb0eea8a706c4c34a16891f84e7b', 'fgdsdfgdfg', 'user'),
(5, 'test1', 'email@emailnya.com', '827ccb0eea8a706c4c34a16891f84e7b', '&lt;script&gt;alert(\\&quot;LOL\\&quot;);&lt;/script', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Championship'),
(2, 'Modding');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `isi_post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `id_thread`, `id_account`, `tanggal_post`, `isi_post`) VALUES
(1, 1, 1, '2020-06-20 00:00:00', 'test doang kok'),
(2, 1, 1, '2020-06-21 00:00:00', '23112312312321312312312312312'),
(4, 1, 1, '2020-06-23 17:07:44', 'test'),
(5, 1, 1, '2020-06-23 17:08:04', 'test2\r\n'),
(6, 1, 1, '2020-06-23 17:08:23', 'test3\r\n'),
(7, 1, 2, '2020-06-23 17:16:07', 'test1\r\n'),
(8, 1, 2, '2020-06-23 17:16:20', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thread`
--

CREATE TABLE `tbl_thread` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `nama_thread` varchar(50) NOT NULL,
  `tanggal_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_thread`
--

INSERT INTO `tbl_thread` (`id`, `id_kategori`, `id_account`, `nama_thread`, `tanggal_buat`) VALUES
(1, 1, 1, 'TESET', '2020-06-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote`
--

CREATE TABLE `tbl_vote` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `tanggal_vote` datetime NOT NULL,
  `upvote` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vote`
--

INSERT INTO `tbl_vote` (`id`, `id_post`, `id_account`, `tanggal_vote`, `upvote`) VALUES
(22, 7, 1, '2020-06-27 08:50:49', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_thread` (`id_thread`),
  ADD KEY `fk_post_account` (`id_account`);

--
-- Indexes for table `tbl_thread`
--
ALTER TABLE `tbl_thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thread_kategori` (`id_kategori`),
  ADD KEY `fk_thread_account` (`id_account`);

--
-- Indexes for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vote_account` (`id_account`),
  ADD KEY `fk_vote_post` (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_thread`
--
ALTER TABLE `tbl_thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `fk_post_account` FOREIGN KEY (`id_account`) REFERENCES `tbl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_post_thread` FOREIGN KEY (`id_thread`) REFERENCES `tbl_thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_thread`
--
ALTER TABLE `tbl_thread`
  ADD CONSTRAINT `fk_thread_account` FOREIGN KEY (`id_account`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thread_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  ADD CONSTRAINT `fk_vote_account` FOREIGN KEY (`id_account`) REFERENCES `tbl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vote_post` FOREIGN KEY (`id_post`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
