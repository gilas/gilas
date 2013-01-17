-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2013 at 07:57 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yaghout`
--

-- --------------------------------------------------------

--
-- Table structure for table `yg_user_informations`
--

DROP TABLE IF EXISTS `yg_user_informations`;
CREATE TABLE IF NOT EXISTS `yg_user_informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'this field determine the user id of registered user but by default have 0 value. when the request has been submitted then a user record will be create for this user and that user id completed with this',
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'users first name',
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'users last name',
  `place_id` int(11) NOT NULL COMMENT 'id of place which user added request for that',
  `raste_id` int(11) NOT NULL COMMENT 'user paper class id ',
  `degree_id` int(11) NOT NULL COMMENT 'users degree id which will complete By System Administrator',
  `father_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'users father name',
  `gender` tinyint(4) DEFAULT NULL COMMENT 'users gender',
  `code_melli` varchar(10) CHARACTER SET utf8 NOT NULL,
  `shenasnameh_number` varchar(10) CHARACTER SET utf8 NOT NULL,
  `mahale_sodoor` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `birth_day` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `din` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mazhab` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `vazifeh_omoomi` tinyint(4) DEFAULT NULL,
  `madrak_tahsili` tinyint(4) DEFAULT NULL,
  `taahol` tinyint(4) DEFAULT NULL,
  `sarparast` tinyint(4) DEFAULT NULL,
  `afrad_tahte_takafol` tinyint(4) DEFAULT NULL COMMENT 'number of people who is takafol him :)',
  `isargari` tinyint(4) DEFAULT NULL,
  `gov_employment` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '0 means not',
  `reg_other_union` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '0 means not',
  `parvaneh_other_union` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '0 means not',
  `latest_employment` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '0 means not other employments',
  `history_duration` tinyint(4) DEFAULT NULL COMMENT '0 means not',
  `postal_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `telephone` varchar(12) CHARACTER SET utf8 DEFAULT NULL COMMENT '0511-8519648',
  `home_address` text CHARACTER SET utf8,
  `mobile` varchar(11) CHARACTER SET utf8 NOT NULL,
  `market_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `market_sign` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `market_address` text CHARACTER SET utf8,
  `market_telephone` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `market_fax` varchar(12) CHARACTER SET utf32 DEFAULT NULL,
  `market_postal_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `mantagheh_shahrdari` tinyint(4) DEFAULT NULL,
  `nahiye_shahrdari` tinyint(4) DEFAULT NULL,
  `hozeh_kalantari` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `vazeyat_joghrafiaee` tinyint(4) DEFAULT NULL,
  `mahale_esteghrar` tinyint(4) DEFAULT NULL,
  `vazeyat_malekiat` tinyint(4) DEFAULT NULL,
  `market_masahat` tinyint(4) DEFAULT NULL,
  `code_rahgiri` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `status_desc` text CHARACTER SET utf8,
  `created` char(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `yg_user_informations`
--

INSERT INTO `yg_user_informations` (`id`, `user_id`, `first_name`, `last_name`, `place_id`, `raste_id`, `degree_id`, `father_name`, `gender`, `code_melli`, `shenasnameh_number`, `mahale_sodoor`, `birth_day`, `din`, `mazhab`, `vazifeh_omoomi`, `madrak_tahsili`, `taahol`, `sarparast`, `afrad_tahte_takafol`, `isargari`, `gov_employment`, `reg_other_union`, `parvaneh_other_union`, `latest_employment`, `history_duration`, `postal_code`, `telephone`, `home_address`, `mobile`, `market_name`, `market_sign`, `market_address`, `market_telephone`, `market_fax`, `market_postal_code`, `mantagheh_shahrdari`, `nahiye_shahrdari`, `hozeh_kalantari`, `vazeyat_joghrafiaee`, `mahale_esteghrar`, `vazeyat_malekiat`, `market_masahat`, `code_rahgiri`, `status`, `status_desc`, `created`) VALUES
(17, 2, 'حمید', 'ممدوحی', 1, 1, 2, 'احمد', 1, '0946217742', '21572', '124', '1367-04-26', 'اسلام', 'شیعه', 3, 7, 1, 2, NULL, 0, '', '', NULL, '', NULL, '1232131231', '05116580907', 'بلوار توس - توس 65/6 - کوچه گلستان - پلاک 37', '09159922885', 'سیاحت شرق', '', 'ابوذر غفاری 13 - پلاک 98', '05118467980', '05118464994', '1231231231', 0, NULL, '', 1, 1, 2, 89, '2227310017', 3, 'a:4:{i:-1;a:2:{s:4:"date";s:19:"1391-10-27 22:19:50";s:4:"desc";s:8:"ghjgjjhg";}i:2;a:2:{s:4:"date";s:19:"1391-10-27 22:22:13";s:4:"desc";N;}i:-3;a:2:{s:4:"date";s:19:"1391-10-27 22:25:29";s:4:"desc";s:0:"";}i:3;a:2:{s:4:"date";s:19:"1391-10-27 22:26:44";s:4:"desc";N;}}', '1391-10-13 22:27:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
