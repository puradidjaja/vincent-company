-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2012 at 03:24 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vc`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `avatar_url` varchar(150) NOT NULL,
  `profile` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `link` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_id`, `name`, `avatar_url`, `profile`, `address`, `phone`, `link`) VALUES
(1, 1, 'Shinji Kagawa', 'http://localhost/vincent-company/uploads/images/blank.jpg', '', '', '', ''),
(2, 2, 'Robin Van Persie', 'http://localhost/vincent-company/uploads/images/blank.jpg', '', '', '', 'robin-van-persie2012-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `is_linked` tinyint(1) NOT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `thumb` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `author` varchar(100) NOT NULL,
  `tags` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `link`, `summary`, `is_linked`, `image_url`, `thumb`, `status`, `content`, `create_date`, `update_date`, `author`, `tags`) VALUES
(2, 'Artikel Bebas', 'artikel-bebas-2012-08-28', 'Bebas tapi sopan, naik gratis turun bayar', 1, 'http://localhost/vincent-company/uploads/images/Jellyfish.jpg', 'http://localhost/vincent-company/uploads/thumbs/Jellyfish.jpg', 2, '<h1>Test</h1>\r\n<p>yakinlah ini cuma test aja</p>', '2012-08-28 01:23:21', '2012-08-28 01:23:21', 'admin', 'test'),
(3, 'Coba Lagi', 'coba-lagi-2012-08-28', 'Coba Lagi Aja', 0, '', '', 2, '<h1>Sudah Betul</h1>', '2012-08-28 02:32:47', '2012-08-28 02:32:47', 'admin', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(7) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `file`, `type`, `caption`, `description`, `date`, `thumb_url`) VALUES
(16, 'Koala.jpg', 'Koala.jpg', 'image/j', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/Koala.jpg'),
(17, 'Lighthouse.jpg', 'Lighthouse.jpg', 'image/j', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/Lighthouse.jpg'),
(18, 'Penguins.jpg', 'Penguins.jpg', 'image/j', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/Penguins.jpg'),
(19, 'Tulips.jpg', 'Tulips.jpg', 'image/j', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/Tulips.jpg'),
(20, 'Jellyfish.jpg', 'Jellyfish.jpg', 'image/j', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/Jellyfish.jpg'),
(21, 'Logo_Resmi_SWG_Crop_30p.jpg', 'Logo_Resmi_SWG_Crop_30p.jpg', 'image/j', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/Logo_Resmi_SWG_Crop_30p.jpg'),
(22, 'logohohoresize.png', 'logohohoresize.png', 'image/p', '', '', '2012-08-26 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/logohohoresize.png'),
(23, 'keripik_lele_logo_large.png', 'keripik_lele_logo_large.png', 'image/p', '', '', '2012-08-28 00:00:00', 'http://localhost/vincent-company/uploads/thumbs/keripik_lele_logo_large.png');

-- --------------------------------------------------------

--
-- Table structure for table `logger`
--

CREATE TABLE IF NOT EXISTS `logger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(64) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `logger`
--

INSERT INTO `logger` (`id`, `ip`, `link`, `date_time`) VALUES
(14, '127.0.0.1', 'http://localhost/vincent-company/', '2012-08-26 07:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `thumb` varchar(150) NOT NULL,
  `is_gallery` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `logo_thumb` varchar(200) NOT NULL,
  `addr_x` decimal(8,5) NOT NULL,
  `addr_y` decimal(8,5) NOT NULL,
  `about` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `website_name`, `name`, `address`, `logo`, `logo_thumb`, `addr_x`, `addr_y`, `about`, `contact`, `email`) VALUES
(1, 'Man-Utd', 'DEFAULT', 'Taman Hewan 22, Bandung', 'http://localhost/vincent-company/uploads/images/keripik_lele_logo_large.png', 'http://localhost/vincent-company/uploads/thumbs/keripik_lele_logo_large.png', -6.89372, 107.60841, '<h1><img class="float_left" src="http://localhost/vincent-company/uploads/thumbs/Logo_Resmi_SWG_Crop_30p.jpg?w=300&amp;h=95" alt="" width="300" /></h1>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<h2 style="padding-left: 30px;">&nbsp;</h2>\r\n<h1>About SWG [Siliwangi Wirakarya Ganesha]</h1>\r\n<p>&nbsp;SWG is one of the best ''We will do it if we can'' Company in the region.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '022-87283291', 'info@pt-swg.com');

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE IF NOT EXISTS `statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(32) NOT NULL,
  `action` varchar(32) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `statistic`
--

INSERT INTO `statistic` (`id`, `section`, `action`, `uri`, `ip`, `date_time`) VALUES
(43, 'home', 'index', '', '127.0.0.1', '2012-08-28 12:53:14'),
(44, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:13:56'),
(45, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:15:43'),
(46, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:17:13'),
(47, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:17:42'),
(48, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:19:28'),
(49, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:20:45'),
(50, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:21:01'),
(51, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:24:27'),
(52, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:26:34'),
(53, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:26:53'),
(54, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:27:01'),
(55, 'home', 'index', '', '127.0.0.1', '2012-08-28 01:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `last_logged_in` datetime NOT NULL,
  `last_ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `last_logged_in`, `last_ip`) VALUES
(1, 'shinji_kagawa@man-utd.co.uk', 'asdqwe123', 2, '0000-00-00 00:00:00', ''),
(2, 'rvp@man-utd.co.uk', 'd164b39e9ec43f65376629da9ccf41780775f656', 2, '0000-00-00 00:00:00', ''),
(3, 'satria.prayoga@gmail.com', 'd164b39e9ec43f65376629da9ccf41780775f656', 1, '2012-08-28 00:17:47', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(50) NOT NULL,
  `thumbnail_src` varchar(150) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `src`, `thumbnail_src`, `name`) VALUES
(15, 'cfOa1a8hYP8', 'http://img.youtube.com/vi/cfOa1a8hYP8/0.jpg', 'Radiohead - Lotus Flower'),
(17, 'RUmmsMeHAaE', 'http://img.youtube.com/vi/RUmmsMeHAaE/0.jpg', 'Gnarls Barkley - Reckoner (Radiohead cover li'),
(18, 'SDTZ7iX4vTQ', 'http://img.youtube.com/vi/SDTZ7iX4vTQ/0.jpg', 'Foster The People - Pumped Up Kicks'),
(19, 'U8NNHmV3QPw', 'http://img.youtube.com/vi/U8NNHmV3QPw/0.jpg', 'Spirit Science 12 - The Human History Movie'),
(20, '7rDRQ0wwLVw', 'http://img.youtube.com/vi/7rDRQ0wwLVw/0.jpg', 'Standup Comedy Show Metro TV Spesial Akhir Ta');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
