-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2012 at 11:12 AM
-- Server version: 5.1.65
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mhau_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `gl_acos`
--

DROP TABLE IF EXISTS `gl_acos`;
CREATE TABLE IF NOT EXISTS `gl_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=162 ;

--
-- Dumping data for table `gl_acos`
--

INSERT INTO `gl_acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 310),
(2, 1, NULL, NULL, 'Comments', 2, 23),
(3, 2, NULL, NULL, 'admin_index', 3, 4),
(5, 2, NULL, NULL, 'admin_view', 7, 8),
(6, 2, NULL, NULL, 'admin_publish_comment', 9, 10),
(7, 2, NULL, NULL, 'admin_unpublish_comment', 11, 12),
(8, 2, NULL, NULL, 'admin_delete', 13, 14),
(9, 2, NULL, NULL, 'admin_replyComment', 15, 16),
(10, 2, NULL, NULL, 'admin_editComment', 17, 18),
(11, 2, NULL, NULL, 'admin_dispatch', 19, 20),
(12, 1, NULL, NULL, 'ContactDetails', 24, 41),
(13, 12, NULL, NULL, 'admin_add', 25, 26),
(14, 12, NULL, NULL, 'admin_edit', 27, 28),
(15, 12, NULL, NULL, 'admin_delete', 29, 30),
(16, 12, NULL, NULL, 'admin_index', 31, 32),
(17, 12, NULL, NULL, 'admin_getLinkItem', 33, 34),
(19, 12, NULL, NULL, 'admin_dispatch', 37, 38),
(20, 1, NULL, NULL, 'ContentCategories', 42, 59),
(21, 20, NULL, NULL, 'admin_add', 43, 44),
(22, 20, NULL, NULL, 'admin_index', 45, 46),
(23, 20, NULL, NULL, 'admin_delete', 47, 48),
(24, 20, NULL, NULL, 'admin_edit', 49, 50),
(25, 20, NULL, NULL, 'admin_publish', 51, 52),
(26, 20, NULL, NULL, 'admin_unPublish', 53, 54),
(27, 20, NULL, NULL, 'admin_getLinkItem', 55, 56),
(28, 20, NULL, NULL, 'admin_dispatch', 57, 58),
(29, 1, NULL, NULL, 'Contents', 60, 115),
(30, 29, NULL, NULL, 'admin_index', 61, 62),
(31, 29, NULL, NULL, 'admin_add', 63, 64),
(32, 29, NULL, NULL, 'admin_delete', 65, 66),
(33, 29, NULL, NULL, 'admin_edit', 67, 68),
(34, 29, NULL, NULL, 'admin_move', 69, 70),
(35, 29, NULL, NULL, 'admin_publish', 71, 72),
(36, 29, NULL, NULL, 'admin_unPublish', 73, 74),
(37, 29, NULL, NULL, 'admin_addToFrontPage', 75, 76),
(38, 29, NULL, NULL, 'admin_removeFromFrontPage', 77, 78),
(39, 29, NULL, NULL, 'admin_allowComment', 79, 80),
(40, 29, NULL, NULL, 'admin_disallowComment', 81, 82),
(41, 29, NULL, NULL, 'admin_getLinkItem', 83, 84),
(48, 29, NULL, NULL, 'admin_dispatch', 97, 98),
(49, 1, NULL, NULL, 'Dashboards', 116, 121),
(50, 49, NULL, NULL, 'admin_index', 117, 118),
(51, 49, NULL, NULL, 'admin_dispatch', 119, 120),
(52, 1, NULL, NULL, 'GalleryCategories', 122, 143),
(53, 52, NULL, NULL, 'admin_index', 123, 124),
(54, 52, NULL, NULL, 'admin_add', 125, 126),
(55, 52, NULL, NULL, 'admin_edit', 127, 128),
(56, 52, NULL, NULL, 'admin_delete', 129, 130),
(57, 52, NULL, NULL, 'admin_publish', 131, 132),
(58, 52, NULL, NULL, 'admin_unPublish', 133, 134),
(59, 52, NULL, NULL, 'admin_getLinkItem', 135, 136),
(61, 52, NULL, NULL, 'admin_dispatch', 139, 140),
(62, 1, NULL, NULL, 'GalleryItems', 144, 171),
(63, 62, NULL, NULL, 'admin_index', 145, 146),
(64, 62, NULL, NULL, 'admin_add', 147, 148),
(65, 62, NULL, NULL, 'admin_edit', 149, 150),
(66, 62, NULL, NULL, 'admin_delete', 151, 152),
(67, 62, NULL, NULL, 'admin_unPublish', 153, 154),
(68, 62, NULL, NULL, 'admin_publish', 155, 156),
(71, 62, NULL, NULL, 'admin_move', 161, 162),
(72, 62, NULL, NULL, 'admin_getLinkItem', 163, 164),
(73, 62, NULL, NULL, 'admin_dispatch', 165, 166),
(74, 1, NULL, NULL, 'MenuTypes', 172, 185),
(75, 74, NULL, NULL, 'admin_index', 173, 174),
(76, 74, NULL, NULL, 'admin_add', 175, 176),
(77, 74, NULL, NULL, 'admin_edit', 177, 178),
(78, 74, NULL, NULL, 'admin_getTypes', 179, 180),
(79, 74, NULL, NULL, 'admin_delete', 181, 182),
(80, 74, NULL, NULL, 'admin_dispatch', 183, 184),
(81, 1, NULL, NULL, 'Menus', 186, 207),
(82, 81, NULL, NULL, 'admin_index', 187, 188),
(83, 81, NULL, NULL, 'admin_add', 189, 190),
(84, 81, NULL, NULL, 'admin_edit', 191, 192),
(85, 81, NULL, NULL, 'admin_delete', 193, 194),
(86, 81, NULL, NULL, 'admin_move', 195, 196),
(87, 81, NULL, NULL, 'admin_publish', 197, 198),
(88, 81, NULL, NULL, 'admin_unPublish', 199, 200),
(90, 81, NULL, NULL, 'admin_dispatch', 203, 204),
(91, 1, NULL, NULL, 'Pages', 208, 215),
(93, 91, NULL, NULL, 'admin_dispatch', 211, 212),
(94, 1, NULL, NULL, 'Settings', 216, 225),
(95, 94, NULL, NULL, 'admin_index', 217, 218),
(97, 94, NULL, NULL, 'admin_dispatch', 221, 222),
(98, 1, NULL, NULL, 'SliderItems', 226, 247),
(99, 98, NULL, NULL, 'admin_index', 227, 228),
(100, 98, NULL, NULL, 'admin_add', 229, 230),
(101, 98, NULL, NULL, 'admin_edit', 231, 232),
(102, 98, NULL, NULL, 'admin_delete', 233, 234),
(103, 98, NULL, NULL, 'admin_move', 235, 236),
(104, 98, NULL, NULL, 'admin_publish', 237, 238),
(105, 98, NULL, NULL, 'admin_unPublish', 239, 240),
(107, 98, NULL, NULL, 'admin_dispatch', 243, 244),
(108, 1, NULL, NULL, 'Users', 248, 261),
(109, 108, NULL, NULL, 'admin_login', 249, 250),
(110, 108, NULL, NULL, 'admin_logout', 251, 252),
(112, 108, NULL, NULL, 'admin_dispatch', 255, 256),
(113, 1, NULL, NULL, 'WeblinkCategories', 262, 275),
(114, 113, NULL, NULL, 'admin_index', 263, 264),
(115, 113, NULL, NULL, 'admin_add', 265, 266),
(116, 113, NULL, NULL, 'admin_edit', 267, 268),
(117, 113, NULL, NULL, 'admin_delete', 269, 270),
(118, 113, NULL, NULL, 'admin_getLinkItem', 271, 272),
(119, 113, NULL, NULL, 'admin_dispatch', 273, 274),
(120, 1, NULL, NULL, 'Weblinks', 276, 295),
(121, 120, NULL, NULL, 'admin_index', 277, 278),
(122, 120, NULL, NULL, 'admin_add', 279, 280),
(123, 120, NULL, NULL, 'admin_edit', 281, 282),
(124, 120, NULL, NULL, 'admin_delete', 283, 284),
(125, 120, NULL, NULL, 'admin_publish', 285, 286),
(126, 120, NULL, NULL, 'admin_unPublish', 287, 288),
(128, 120, NULL, NULL, 'admin_dispatch', 291, 292),
(135, 1, NULL, NULL, 'TinyMCE', 296, 297),
(136, 1, NULL, NULL, 'UploadPack', 298, 299),
(137, 1, NULL, NULL, 'AclPermissions', 300, 309),
(138, 137, NULL, NULL, 'admin_index', 301, 302),
(139, 137, NULL, NULL, 'admin_editPermission', 303, 304),
(140, 137, NULL, NULL, 'admin_sync', 305, 306),
(141, 137, NULL, NULL, 'admin_dispatch', 307, 308),
(161, 29, NULL, NULL, 'index', 113, 114);

-- --------------------------------------------------------

--
-- Table structure for table `gl_aros`
--

DROP TABLE IF EXISTS `gl_aros`;
CREATE TABLE IF NOT EXISTS `gl_aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gl_aros`
--

INSERT INTO `gl_aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Roles', 1, 6),
(2, 1, 'Role', 1, 'Admin', 2, 3),
(3, 1, 'Role', 2, 'Super Admin', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gl_aros_acos`
--

DROP TABLE IF EXISTS `gl_aros_acos`;
CREATE TABLE IF NOT EXISTS `gl_aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) DEFAULT NULL,
  `aco_id` int(11) DEFAULT NULL,
  `_create` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `_read` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `_update` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `_delete` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aco_id` (`aco_id`),
  KEY `aro_id` (`aro_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=200 ;

--
-- Dumping data for table `gl_aros_acos`
--

INSERT INTO `gl_aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 3, '1', '1', '1', '1'),
(2, 2, 50, '1', '1', '1', '1'),
(3, 2, 138, '-1', '-1', '-1', '-1'),
(4, 2, 78, '1', '1', '1', '1'),
(5, 2, 30, '1', '1', '1', '1'),
(6, 2, 110, '1', '1', '1', '1'),
(7, 2, 109, '1', '1', '1', '1'),
(8, 2, 140, '-1', '-1', '-1', '-1'),
(9, 2, 139, '-1', '-1', '-1', '-1'),
(10, 2, 141, '-1', '-1', '-1', '-1'),
(11, 2, 53, '1', '1', '1', '1'),
(12, 2, 54, '1', '1', '1', '1'),
(13, 2, 55, '1', '1', '1', '1'),
(14, 2, 14, '1', '1', '1', '1'),
(15, 2, 16, '1', '1', '1', '1'),
(16, 2, 11, '1', '1', '1', '1'),
(17, 2, 19, '1', '1', '1', '1'),
(18, 2, 28, '1', '1', '1', '1'),
(19, 2, 10, '1', '1', '1', '1'),
(20, 2, 9, '1', '1', '1', '1'),
(21, 2, 8, '1', '1', '1', '1'),
(22, 2, 5, '1', '1', '1', '1'),
(23, 2, 6, '1', '1', '1', '1'),
(24, 2, 7, '1', '1', '1', '1'),
(25, 2, 13, '1', '1', '1', '1'),
(26, 2, 17, '1', '1', '1', '1'),
(27, 2, 31, '1', '1', '1', '1'),
(28, 2, 32, '1', '1', '1', '1'),
(29, 2, 34, '1', '1', '1', '1'),
(30, 2, 35, '1', '1', '1', '1'),
(31, 2, 36, '1', '1', '1', '1'),
(32, 2, 37, '1', '1', '1', '1'),
(33, 2, 38, '1', '1', '1', '1'),
(34, 2, 39, '1', '1', '1', '1'),
(35, 2, 40, '1', '1', '1', '1'),
(36, 2, 41, '1', '1', '1', '1'),
(37, 2, 48, '1', '1', '1', '1'),
(38, 2, 15, '1', '1', '1', '1'),
(39, 2, 21, '1', '1', '1', '1'),
(40, 2, 22, '1', '1', '1', '1'),
(41, 2, 23, '1', '1', '1', '1'),
(42, 2, 24, '1', '1', '1', '1'),
(43, 2, 25, '1', '1', '1', '1'),
(44, 2, 26, '1', '1', '1', '1'),
(45, 2, 27, '1', '1', '1', '1'),
(46, 2, 33, '1', '1', '1', '1'),
(47, 2, 121, '1', '1', '1', '1'),
(48, 2, 122, '1', '1', '1', '1'),
(49, 2, 123, '1', '1', '1', '1'),
(50, 2, 124, '1', '1', '1', '1'),
(51, 2, 125, '1', '1', '1', '1'),
(52, 2, 126, '1', '1', '1', '1'),
(53, 2, 128, '1', '1', '1', '1'),
(54, 2, 114, '1', '1', '1', '1'),
(55, 2, 115, '1', '1', '1', '1'),
(56, 2, 116, '1', '1', '1', '1'),
(57, 2, 117, '1', '1', '1', '1'),
(58, 2, 118, '1', '1', '1', '1'),
(59, 2, 119, '1', '1', '1', '1'),
(60, 2, 112, '1', '1', '1', '1'),
(61, 2, 99, '1', '1', '1', '1'),
(62, 2, 100, '1', '1', '1', '1'),
(63, 2, 101, '1', '1', '1', '1'),
(64, 2, 102, '1', '1', '1', '1'),
(65, 2, 103, '1', '1', '1', '1'),
(66, 2, 104, '1', '1', '1', '1'),
(67, 2, 105, '1', '1', '1', '1'),
(68, 2, 107, '1', '1', '1', '1'),
(69, 2, 95, '1', '1', '1', '1'),
(70, 2, 97, '1', '1', '1', '1'),
(71, 2, 82, '1', '1', '1', '1'),
(72, 2, 83, '1', '1', '1', '1'),
(73, 2, 84, '1', '1', '1', '1'),
(74, 2, 85, '1', '1', '1', '1'),
(75, 2, 86, '1', '1', '1', '1'),
(76, 2, 87, '1', '1', '1', '1'),
(77, 2, 88, '1', '1', '1', '1'),
(78, 2, 90, '1', '1', '1', '1'),
(79, 2, 75, '1', '1', '1', '1'),
(80, 2, 76, '1', '1', '1', '1'),
(81, 2, 77, '1', '1', '1', '1'),
(82, 2, 79, '1', '1', '1', '1'),
(83, 2, 80, '1', '1', '1', '1'),
(84, 2, 63, '1', '1', '1', '1'),
(85, 2, 64, '1', '1', '1', '1'),
(86, 2, 65, '1', '1', '1', '1'),
(87, 2, 66, '1', '1', '1', '1'),
(88, 2, 67, '1', '1', '1', '1'),
(89, 2, 68, '1', '1', '1', '1'),
(90, 2, 71, '1', '1', '1', '1'),
(91, 2, 72, '1', '1', '1', '1'),
(92, 2, 73, '1', '1', '1', '1'),
(93, 2, 56, '1', '1', '1', '1'),
(94, 2, 57, '1', '1', '1', '1'),
(95, 2, 58, '1', '1', '1', '1'),
(96, 2, 59, '1', '1', '1', '1'),
(97, 2, 61, '1', '1', '1', '1'),
(98, 2, 51, '1', '1', '1', '1'),
(99, 3, 3, '1', '1', '1', '1'),
(100, 3, 5, '1', '1', '1', '1'),
(101, 3, 6, '1', '1', '1', '1'),
(102, 3, 7, '1', '1', '1', '1'),
(103, 3, 8, '1', '1', '1', '1'),
(104, 3, 9, '1', '1', '1', '1'),
(105, 3, 10, '1', '1', '1', '1'),
(106, 3, 11, '1', '1', '1', '1'),
(107, 3, 13, '1', '1', '1', '1'),
(108, 3, 14, '1', '1', '1', '1'),
(109, 3, 15, '1', '1', '1', '1'),
(110, 3, 16, '1', '1', '1', '1'),
(111, 3, 17, '1', '1', '1', '1'),
(112, 3, 19, '1', '1', '1', '1'),
(113, 3, 21, '1', '1', '1', '1'),
(114, 3, 22, '1', '1', '1', '1'),
(115, 3, 23, '1', '1', '1', '1'),
(116, 3, 24, '1', '1', '1', '1'),
(117, 3, 25, '1', '1', '1', '1'),
(118, 3, 26, '1', '1', '1', '1'),
(119, 3, 27, '1', '1', '1', '1'),
(120, 3, 28, '1', '1', '1', '1'),
(121, 3, 30, '1', '1', '1', '1'),
(122, 3, 31, '1', '1', '1', '1'),
(123, 3, 32, '1', '1', '1', '1'),
(124, 3, 33, '1', '1', '1', '1'),
(125, 3, 34, '1', '1', '1', '1'),
(126, 3, 35, '1', '1', '1', '1'),
(127, 3, 36, '1', '1', '1', '1'),
(128, 3, 37, '1', '1', '1', '1'),
(129, 3, 38, '1', '1', '1', '1'),
(130, 3, 39, '1', '1', '1', '1'),
(131, 3, 40, '1', '1', '1', '1'),
(132, 3, 41, '1', '1', '1', '1'),
(133, 3, 48, '1', '1', '1', '1'),
(134, 3, 161, '-1', '-1', '-1', '-1'),
(135, 3, 50, '1', '1', '1', '1'),
(136, 3, 51, '1', '1', '1', '1'),
(137, 3, 53, '1', '1', '1', '1'),
(138, 3, 54, '1', '1', '1', '1'),
(139, 3, 55, '1', '1', '1', '1'),
(140, 3, 56, '1', '1', '1', '1'),
(141, 3, 57, '1', '1', '1', '1'),
(142, 3, 58, '1', '1', '1', '1'),
(143, 3, 59, '1', '1', '1', '1'),
(144, 3, 61, '1', '1', '1', '1'),
(145, 3, 63, '1', '1', '1', '1'),
(146, 3, 64, '1', '1', '1', '1'),
(147, 3, 65, '1', '1', '1', '1'),
(148, 3, 66, '1', '1', '1', '1'),
(149, 3, 67, '1', '1', '1', '1'),
(150, 3, 68, '1', '1', '1', '1'),
(151, 3, 71, '1', '1', '1', '1'),
(152, 3, 72, '1', '1', '1', '1'),
(153, 3, 73, '1', '1', '1', '1'),
(154, 3, 75, '1', '1', '1', '1'),
(155, 3, 76, '1', '1', '1', '1'),
(156, 3, 77, '1', '1', '1', '1'),
(157, 3, 78, '1', '1', '1', '1'),
(158, 3, 79, '1', '1', '1', '1'),
(159, 3, 80, '1', '1', '1', '1'),
(160, 3, 82, '1', '1', '1', '1'),
(161, 3, 83, '1', '1', '1', '1'),
(162, 3, 84, '1', '1', '1', '1'),
(163, 3, 85, '1', '1', '1', '1'),
(164, 3, 86, '1', '1', '1', '1'),
(165, 3, 87, '1', '1', '1', '1'),
(166, 3, 88, '1', '1', '1', '1'),
(167, 3, 90, '1', '1', '1', '1'),
(168, 3, 93, '1', '1', '1', '1'),
(169, 3, 95, '1', '1', '1', '1'),
(170, 3, 97, '1', '1', '1', '1'),
(171, 3, 99, '1', '1', '1', '1'),
(172, 3, 100, '1', '1', '1', '1'),
(173, 3, 101, '1', '1', '1', '1'),
(174, 3, 102, '1', '1', '1', '1'),
(175, 3, 103, '1', '1', '1', '1'),
(176, 3, 104, '1', '1', '1', '1'),
(177, 3, 105, '1', '1', '1', '1'),
(178, 3, 107, '1', '1', '1', '1'),
(179, 3, 109, '1', '1', '1', '1'),
(180, 3, 110, '1', '1', '1', '1'),
(181, 3, 112, '1', '1', '1', '1'),
(182, 3, 114, '1', '1', '1', '1'),
(183, 3, 115, '1', '1', '1', '1'),
(184, 3, 116, '1', '1', '1', '1'),
(185, 3, 117, '1', '1', '1', '1'),
(186, 3, 118, '1', '1', '1', '1'),
(187, 3, 119, '1', '1', '1', '1'),
(188, 3, 121, '1', '1', '1', '1'),
(189, 3, 122, '1', '1', '1', '1'),
(190, 3, 123, '1', '1', '1', '1'),
(191, 3, 124, '1', '1', '1', '1'),
(192, 3, 125, '1', '1', '1', '1'),
(193, 3, 126, '1', '1', '1', '1'),
(194, 3, 128, '1', '1', '1', '1'),
(195, 3, 138, '1', '1', '1', '1'),
(196, 3, 139, '1', '1', '1', '1'),
(197, 3, 140, '1', '1', '1', '1'),
(198, 3, 141, '1', '1', '1', '1'),
(199, 2, 93, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gl_comments`
--

DROP TABLE IF EXISTS `gl_comments`;
CREATE TABLE IF NOT EXISTS `gl_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id of comment for replying from users for example administrator reply a comment which posted from Mohammad and it will be show in a quote tag in below the parent comment \r\n default is set to 0 for the main(parent) comments',
  `content_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'first name of user who add the comment this field is for guest users who haven''t user account in site',
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'user email address',
  `website` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'web site address',
  `content` text COLLATE utf8_persian_ci COMMENT 'comment body',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'comment is published or not By default all comment is published => published = 1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_contact_details`
--

DROP TABLE IF EXISTS `gl_contact_details`;
CREATE TABLE IF NOT EXISTS `gl_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'title of contact',
  `manager` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'manager name of company or web site',
  `telephone_1` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company tel #1 example : 05118456628',
  `telephone_2` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company tel #2 example : 05118456629',
  `fax` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company fax number',
  `mobile` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'manger mobile number or company mobile number',
  `sms_center` varchar(14) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'company sms center for example : 3000662849',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_contents`
--

DROP TABLE IF EXISTS `gl_contents`;
CREATE TABLE IF NOT EXISTS `gl_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'the id of user from users table who post the content',
  `content_category_id` int(11) NOT NULL COMMENT 'id of content category',
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `intro` text COLLATE utf8_persian_ci NOT NULL,
  `content` text COLLATE utf8_persian_ci,
  `allow_comment` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'determine users can adding comments to this post or not?',
  `published_comment` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'this field determine comment show after added by users or after published by administrator',
  `frontpage` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'status of content to show on the frontpage or not in the other pages By default all content is in other pages!',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'status of content to be published or not By default all content is published',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_gl_contents_slug` (`slug`),
  KEY `content_category_id` (`content_category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_content_categories`
--

DROP TABLE IF EXISTS `gl_content_categories`;
CREATE TABLE IF NOT EXISTS `gl_content_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0' COMMENT 'parent id of a category default is 0 this mean the category is parent! ',
  `name` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'name of category',
  `descriptions` text COLLATE utf8_persian_ci,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_gallery_categories`
--

DROP TABLE IF EXISTS `gl_gallery_categories`;
CREATE TABLE IF NOT EXISTS `gl_gallery_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'category parent id  By default all category added to the app is parent while the admin did ''nt  select a parent for its',
  `name` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `folder_name` varchar(50) COLLATE utf8_persian_ci NOT NULL COMMENT 'category folder name for inserting images! for example image category folder is stored to : app/webroot/images/gallery \r\n and category name is MyFreinds so the images which added to this category will stored into :  app/webroot/images/gallery/MyFreinds',
  `published` int(11) DEFAULT NULL,
  `lft` tinyint(4) NOT NULL,
  `rght` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_gallery_items`
--

DROP TABLE IF EXISTS `gl_gallery_items`;
CREATE TABLE IF NOT EXISTS `gl_gallery_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'user id who added this image!',
  `gallery_category_id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'image title',
  `image_file_name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'image name for accessing to it on gallery category folder',
  `description` text COLLATE utf8_persian_ci COMMENT 'image descriptions',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'By default all images is published!',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_category_id` (`gallery_category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_gilas_sessions`
--

DROP TABLE IF EXISTS `gl_gilas_sessions`;
CREATE TABLE IF NOT EXISTS `gl_gilas_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  `ip` char(15) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gl_link_types`
--

DROP TABLE IF EXISTS `gl_link_types`;
CREATE TABLE IF NOT EXISTS `gl_link_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gl_link_types`
--

INSERT INTO `gl_link_types` (`id`, `name`, `path`) VALUES
(1, 'مطلب', 'Contents'),
(2, 'مجموعه مطالب', 'ContentCategories'),
(3, 'تماس', 'ContactDetails'),
(4, 'مجموعه گالری', 'GalleryCategories'),
(5, 'گالری', 'GalleryItems'),
(6, 'مجموعه لینک', 'WeblinkCategories'),
(8, 'لینک خارجی', NULL),
(9, 'صفحه اصلی', '/'),
(10, 'جدا کننده', '#');

-- --------------------------------------------------------

--
-- Table structure for table `gl_menus`
--

DROP TABLE IF EXISTS `gl_menus`;
CREATE TABLE IF NOT EXISTS `gl_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'menu parent id for example a gallery menu which link''s to My Friends Gallery is a Child of Gallery menu which was an separator menu type   By default all menu is parent=>0',
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'menu alias for using on slugs',
  `link_type_id` int(11) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL COMMENT 'menu type for example :  1) contact 2) gallery 3) static page(linked to content) 4) web links 5) register 6) menu separator 7) site map ,.....',
  `published` int(1) NOT NULL DEFAULT '1' COMMENT 'By default all menu is published',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gl_menus`
--

INSERT INTO `gl_menus` (`id`, `parent_id`, `title`, `link`, `link_type_id`, `menu_type_id`, `published`, `lft`, `rght`, `level`) VALUES
(1, 0, 'خانه', '/', 9, 1, 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_menu_types`
--

DROP TABLE IF EXISTS `gl_menu_types`;
CREATE TABLE IF NOT EXISTS `gl_menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_roles`
--

DROP TABLE IF EXISTS `gl_roles`;
CREATE TABLE IF NOT EXISTS `gl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_roles`
--

INSERT INTO `gl_roles` (`id`, `name`, `title`, `lft`, `rght`, `parent_id`) VALUES
(1, 'Admin', 'مدیریت', 1, 2, NULL),
(2, 'SuperAdmin', 'مدیریت ارشد', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_settings`
--

DROP TABLE IF EXISTS `gl_settings`;
CREATE TABLE IF NOT EXISTS `gl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `gl_settings`
--

INSERT INTO `gl_settings` (`id`, `section`, `key`, `value`, `alias`, `modified`) VALUES
(1, 'Site', 'Title', '', 'عنوان سایت', '1391-08-20 11:39:15'),
(2, 'Site', 'Keywords', 'گیلاس,سیستم مدیریت محتوای فارسی,کیک پی اچ پی,CMS,CakePHP,Gilas', 'توضیحات', '1391-08-20 11:39:15'),
(3, 'Site', 'Description', 'سیستم مدیریت محتوای گیلاس تولید شده در دپارتمان وب شرکت اندیشه نوین', 'توضیحات', '1391-08-20 11:39:15'),
(4, 'Site', 'FootNote', 'کلیه حقوق مادی و معنوی این نرم افزار متعلق به شرکت اندیشه نوین می باشد.', 'پانویس', '1391-08-20 11:39:15'),
(5, 'Site', 'AdminAddress', 'admin', 'آدرس مدیریت', '1391-08-20 11:39:15'),
(6, 'Error', 'Code-11', 'خطای شماره 11 - امکان ورود به سیستم وجود ندارد!', 'خطای شماره 11', '1391-08-09 13:22:18'),
(7, 'Error', 'Code-12', 'خطای شماره 12 - درخواست شما نا معتبر است و امکان بررسی آن وجود ندارد!', 'خطای شماره 12', '1391-08-09 13:22:18'),
(8, 'Error', 'Code-13', 'خطای شماره 13 - اطلاعات وارد شده معتبر نمی باشد. لطفا به خطاهای سیستم دقت کرده و مجددا تلاش نمایید!', 'خطای شماره 13', '1391-08-09 13:22:18'),
(9, 'Error', 'Code-14', 'خطای شماره 14 – امکان انجام عملیات درخواستی بدلیل ارسال نادرست اطلاعات وجود ندارد!', 'خطای شماره 14', '1391-08-09 13:22:18'),
(10, 'Error', 'Code-15', 'خطای شماره 15 – امکان حذف به علت دارا بودن آیتم های زیر مجموعه وجود ندارد. لطفا ابتدا آیتم های زیر مجموعه را حذف نمایید!', 'خطای شماره 15', '1391-08-09 13:22:18'),
(11, 'Error', 'Code-16', 'خطای شماره 16 - به هر دلیلی امکان حذف وجود ندارد!', 'خطای شماره 16', '1391-08-09 13:22:18'),
(12, 'Site', 'Email', '', 'ایمیل سایت', '1391-08-20 11:39:15'),
(13, 'Error', 'Code-17', 'خطای شماره 17 - اشکال در انجام تراکنش', 'خطای شماره 17', '1391-08-09 13:22:18'),
(14, 'Site', 'Template', '', 'قالب سایت', '1391-08-20 11:39:15'),
(16, 'Error', 'Code-18', 'این آیتم به صورت سیستمی تعریف شده است و امکان ویرایش یا حذف آن وجود ندارد', 'خطای شماره 18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_slider_items`
--

DROP TABLE IF EXISTS `gl_slider_items`;
CREATE TABLE IF NOT EXISTS `gl_slider_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'reference link for this slide',
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL COMMENT 'image title',
  `description` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'image description for displaying under title!',
  `image_file_name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'image name for accessing the true image on the slider folder! for example :  app/webroot/images/slider/slide_01.jpg',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'By default all images in slider is published!',
  `created` datetime NOT NULL,
  `link_type_id` int(11) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_users`
--

DROP TABLE IF EXISTS `gl_users`;
CREATE TABLE IF NOT EXISTS `gl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'username must be unique',
  `password` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'Both Of first name and last name',
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'activation status of users By default all users is deactivated',
  `role_id` int(11) NOT NULL,
  `registered_date` datetime NOT NULL,
  `last_logged_in` datetime NOT NULL COMMENT 'latest login of user to the web site',
  `last_ip_logged_in` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_gl_users_username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_users`
--

INSERT INTO `gl_users` (`id`, `username`, `password`, `name`, `email`, `active`, `role_id`, `registered_date`, `last_logged_in`, `last_ip_logged_in`) VALUES
(1, 'admin', '9ee2c9367485427679bd7a0ec1c7f3263869b387', 'جمال طوسی', 'jamal4533@yahoo.com', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'hamid', '9ee2c9367485427679bd7a0ec1c7f3263869b387', 'حمید ممدوحی', NULL, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `gl_weblinks`
--

DROP TABLE IF EXISTS `gl_weblinks`;
CREATE TABLE IF NOT EXISTS `gl_weblinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weblink_category_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL COMMENT 'links title',
  `description` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'links description',
  `address` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'link address',
  `hits` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'number of link hits after each click on link hits +1',
  `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'By default all link is published',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `weblink_category_id` (`weblink_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_weblink_categories`
--

DROP TABLE IF EXISTS `gl_weblink_categories`;
CREATE TABLE IF NOT EXISTS `gl_weblink_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
