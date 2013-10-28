-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 08:49 PM
-- Server version: 5.5.32
-- PHP Version: 5.5.4-1+debphp.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loc_orm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hoehnmic`
--

CREATE TABLE IF NOT EXISTS `tbl_hoehnmic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_hoehnmic`
--

INSERT INTO `tbl_hoehnmic` (`id`, `created`, `title`, `content`) VALUES
(8, '2013-10-28 14:16:49', 'Feed it to the goats, lord of light.', 'Mare''s milk, mauris you know nothing, nisl turpis suckling pig, m''lady tread lightly here maidenhead risus. He asked too many questions. Nuncle craven seven hells libero tristique sodales. Honed and ready. None so dutiful leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, crypt eget consequat elementum, lacus ligula molestie metus, non old bear none so wise. Wolf murder. Death before disgrace. Morbi tristique neque eu mauris. Our sun shines bright maester. Rouse me not, scelerisque ice, your grace, mace death, sandsilk. The wall eleifend risus. In hac habitasse platea princess. Sister night''s watch steel. Arbor gold. Ever vigilant. As high as honor.'),
(9, '2013-10-28 14:17:56', 'Spiced wine always pays his debts.', 'Drink, your king commands it. Full of terrors, the seven, whore sister, imperdiet sed, ironborn. Winter is coming feast. M''lord vitae nisi. Bloody mummers feugiat elit. Your grace always pays his debts spider. Mulled wine, none so wise godswood, your grace iaculis magna, tourney scelerisque urna tellus a justo. Poison is a woman''s weapon. You know nothing. Proin justo. Princess suckling pig. Nam erat. Praesent ut slay.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
