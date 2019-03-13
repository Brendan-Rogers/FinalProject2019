-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 13, 2019 at 02:13 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_odp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pre_images`
--

CREATE TABLE `tbl_pre_images` (
  `id` int(100) UNSIGNED NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `upload_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `img_status` tinyint(3) DEFAULT '0',
  `moderator` varchar(50) DEFAULT NULL
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
  `user_new` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_ip`, `user_date`, `user_lastlogin`, `user_failed`, `user_suspended`, `user_new`) VALUES
(6, 'brenda1', 'swag1', '$2y$10$Yn5/y9PjRTrnoGhCiUimv.zuFw9jMn.c5hhpb6puQHF.Qg6SNqEpS', 'new@email.com', '::1', '2019-02-07 20:29:23', '2019/03/04', 0, 0, 0),
(7, 'Christine', 'lopez', '$2y$10$Tf3mc8nzvLSWFDy8y9tUsODu6SLdFf2uE7SwyGTJC4iXMuTowxmKa', 'dog@net.com', '::1', '2019-03-04 15:46:14', '2019/03/13', NULL, NULL, 0),
(8, 'Aiden', 'dogs', '$2y$10$g0NmO7jrFWTXD8nAPjxiee3bMY/FZT03iGvKHGClEReSviTwvBDB.', 'brend@net.ca', NULL, '2019-03-04 19:47:52', NULL, NULL, NULL, 1),
(9, 'aiden', 'popcorn', '$2y$10$eq3aeRY0CyioeMzD/spLXOdinh30fTVLCogPisamN9ncaOQQMwQeG', 'dog@net.com', '::1', '2019-03-04 23:00:53', '2019/03/13', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pre_images`
--
ALTER TABLE `tbl_pre_images`
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
-- AUTO_INCREMENT for table `tbl_pre_images`
--
ALTER TABLE `tbl_pre_images`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` mediumint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
