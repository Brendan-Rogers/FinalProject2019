-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 17, 2019 at 10:27 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_odp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(100) UNSIGNED NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `upload_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `img_status` tinyint(3) DEFAULT '0',
  `mod_approve` varchar(50) DEFAULT '0',
  `mod_decline` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` mediumint(10) UNSIGNED NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_lastlogin` varchar(30) DEFAULT NULL,
  `user_failed` int(5) DEFAULT NULL,
  `user_suspended` tinyint(1) DEFAULT NULL,
  `user_new` tinyint(1) NOT NULL DEFAULT '1',
  `user_mod` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_ip`, `user_date`, `user_lastlogin`, `user_failed`, `user_suspended`, `user_new`, `user_mod`) VALUES
(6, 'brenda1', 'swag1', '$2y$10$Yn5/y9PjRTrnoGhCiUimv.zuFw9jMn.c5hhpb6puQHF.Qg6SNqEpS', 'new@email.com', '127.0.0.1', '2019-02-07 20:29:23', '2019/03/17', 0, 0, 0, 1),
(7, 'Christine', 'lopez', '$2y$10$Tf3mc8nzvLSWFDy8y9tUsODu6SLdFf2uE7SwyGTJC4iXMuTowxmKa', 'dog@net.com', '127.0.0.1', '2019-03-04 15:46:14', '2019/03/17', NULL, NULL, 0, 0),
(9, 'aiden', 'popcorn', '$2y$10$eq3aeRY0CyioeMzD/spLXOdinh30fTVLCogPisamN9ncaOQQMwQeG', 'dog@net.com', '127.0.0.1', '2019-03-04 23:00:53', '2019/03/17', NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` mediumint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
