-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2019 at 09:26 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_odp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

DROP TABLE IF EXISTS `tbl_images`;
CREATE TABLE IF NOT EXISTS `tbl_images` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `upload_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `img_status` tinyint(3) DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `mod_approve` varchar(50) DEFAULT NULL,
  `mod_decline` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `f_name`, `l_name`, `email`, `file_name`, `upload_time`, `img_status`, `featured`, `mod_approve`, `mod_decline`) VALUES
(21, 'Aiden', 'Riekenbrauck', 'rv.rogers@hotmail.com', 'aiden_1553523824.png', '2019-03-25 14:23:44.206642', 1, 0, NULL, NULL),
(22, 'Brendan', 'Rogers', 'brendanrogers781@gmail.com', 'brendan_1553523976.png', '2019-03-25 14:26:16.230607', 1, 1, NULL, NULL),
(23, 'Christine', 'Lopez', 'christine@lopez.ca', 'christine_1553523993.png', '2019-03-25 14:26:33.861571', 1, 0, NULL, NULL),
(24, 'Ethan', 'Dodd', 'edot@gmail.com', 'ethan_1553524027.png', '2019-03-25 14:27:07.918303', 1, 0, NULL, NULL),
(25, 'Drew', 'Shewaga', 'drew@shewaga.com', 'drew_1553524460.png', '2019-03-25 14:34:20.155426', 1, 0, NULL, NULL),
(26, 'Rob', 'Rogers', 'rv.rogers@hotmail.com', 'rob_1553524561.png', '2019-03-25 14:36:01.677951', 1, 1, NULL, NULL),
(27, 'Vicki', 'Lynn', 'death@grips.online', 'vicki_1553524583.png', '2019-03-25 14:36:23.465133', 1, 0, NULL, NULL),
(28, 'Jarrod', 'Osterbeck', 'dog@net.com', 'jarrod_1553524634.png', '2019-03-25 14:37:14.190789', 1, 0, NULL, NULL),
(29, 'Logan', 'Wolfe', 'logan@wolfe.com', 'logan_1553524702.png', '2019-03-25 14:38:22.535116', 1, 0, NULL, NULL),
(30, 'Robert', 'Colqhoun', 'AIDEN@gmail.com', 'robert_1553524716.png', '2019-03-25 14:38:36.974983', 1, 0, NULL, NULL),
(31, 'Brad', 'Anstey', 'brad@anstey.com', 'brad_1553524731.png', '2019-03-25 14:38:51.248544', 1, 0, NULL, NULL),
(32, 'Hannah', 'Bos', 'hannah@bos.com', 'hannah_1553524749.png', '2019-03-25 14:39:09.345500', 1, 1, NULL, NULL),
(33, 'Dog', 'Petterson', 'dog@net.com', 'dog_1553524769.png', '2019-03-25 14:39:29.306927', 1, 0, NULL, NULL),
(34, 'Sasha', 'Balazic', 'sasha@groovetown.ca', 'sasha_1553524851.png', '2019-03-25 14:40:51.864624', 1, 0, NULL, NULL),
(35, 'Lori', 'Ogilvie', 'lori@ogilvie.ca', 'lori_1553524935.png', '2019-03-25 14:42:15.345596', 1, 0, NULL, NULL),
(36, 'Franny', 'Chestnut', 'brendanr11@gmail.com', 'franny_1553525097.png', '2019-03-25 14:44:57.631330', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` mediumint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `user_mod` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_ip`, `user_date`, `user_lastlogin`, `user_failed`, `user_suspended`, `user_new`, `user_mod`) VALUES
(6, 'brenda1', 'swag1', '$2y$10$Yn5/y9PjRTrnoGhCiUimv.zuFw9jMn.c5hhpb6puQHF.Qg6SNqEpS', 'new@email.com', '::1', '2019-02-07 20:29:23', '2019/03/25', 0, 0, 0, 1),
(7, 'Christine', 'lopez', '$2y$10$Tf3mc8nzvLSWFDy8y9tUsODu6SLdFf2uE7SwyGTJC4iXMuTowxmKa', 'dog@net.com', '::1', '2019-03-04 15:46:14', '2019/03/18', NULL, NULL, 0, 0),
(9, 'aiden', 'popcorn', '$2y$10$eq3aeRY0CyioeMzD/spLXOdinh30fTVLCogPisamN9ncaOQQMwQeG', 'dog@net.com', '::1', '2019-03-04 23:00:53', '2019/03/25', NULL, NULL, 0, 0),
(10, 'Doug', 'coogler', '$2y$10$/e3Jr3tkiDOnFVR.fIaQ7.y9cUFEGdacgUls.f865BWCI5Jl7/JjS', 'death@grips.online', '::1', '2019-03-18 19:45:11', '2019/03/18', NULL, NULL, 0, 0),
(11, 'Larry', 'stockton', '$2y$10$DTSbC.zFQv.ZgwlV8e/qm.crXLRfERKWM8RGiqDOc.FD40FhlFaDW', 'vred@g.ca', '::1', '2019-03-18 19:45:48', '2019/03/18', NULL, NULL, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
