-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 25, 2019 at 02:58 PM
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
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `mod_approve` varchar(50) DEFAULT NULL,
  `mod_decline` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
