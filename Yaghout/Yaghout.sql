-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2013 at 10:01 AM
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
CREATE DATABASE `yaghout` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yaghout`;

-- --------------------------------------------------------

--
-- Table structure for table `gl_acos`
--

CREATE TABLE IF NOT EXISTS `gl_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=329 ;

--
-- Dumping data for table `gl_acos`
--

INSERT INTO `gl_acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 554),
(2, 1, NULL, NULL, 'Comments', 2, 27),
(3, 2, NULL, NULL, 'admin_index', 3, 4),
(5, 2, NULL, NULL, 'admin_view', 7, 8),
(6, 2, NULL, NULL, 'admin_publish_comment', 9, 10),
(7, 2, NULL, NULL, 'admin_unpublish_comment', 11, 12),
(8, 2, NULL, NULL, 'admin_delete', 13, 14),
(9, 2, NULL, NULL, 'admin_replyComment', 15, 16),
(10, 2, NULL, NULL, 'admin_editComment', 17, 18),
(11, 2, NULL, NULL, 'admin_dispatch', 19, 20),
(12, 1, NULL, NULL, 'ContactDetails', 28, 49),
(13, 12, NULL, NULL, 'admin_add', 29, 30),
(14, 12, NULL, NULL, 'admin_edit', 31, 32),
(15, 12, NULL, NULL, 'admin_delete', 33, 34),
(16, 12, NULL, NULL, 'admin_index', 35, 36),
(17, 12, NULL, NULL, 'admin_getLinkItem', 37, 38),
(19, 12, NULL, NULL, 'admin_dispatch', 41, 42),
(20, 1, NULL, NULL, 'ContentCategories', 50, 79),
(21, 20, NULL, NULL, 'admin_add', 51, 52),
(22, 20, NULL, NULL, 'admin_index', 53, 54),
(23, 20, NULL, NULL, 'admin_delete', 55, 56),
(24, 20, NULL, NULL, 'admin_edit', 57, 58),
(25, 20, NULL, NULL, 'admin_publish', 59, 60),
(26, 20, NULL, NULL, 'admin_unPublish', 61, 62),
(27, 20, NULL, NULL, 'admin_getLinkItem', 63, 64),
(28, 20, NULL, NULL, 'admin_dispatch', 65, 66),
(29, 1, NULL, NULL, 'Contents', 80, 149),
(30, 29, NULL, NULL, 'admin_index', 81, 82),
(31, 29, NULL, NULL, 'admin_add', 83, 84),
(32, 29, NULL, NULL, 'admin_delete', 85, 86),
(33, 29, NULL, NULL, 'admin_edit', 87, 88),
(34, 29, NULL, NULL, 'admin_move', 89, 90),
(35, 29, NULL, NULL, 'admin_publish', 91, 92),
(36, 29, NULL, NULL, 'admin_unPublish', 93, 94),
(37, 29, NULL, NULL, 'admin_addToFrontPage', 95, 96),
(38, 29, NULL, NULL, 'admin_removeFromFrontPage', 97, 98),
(39, 29, NULL, NULL, 'admin_allowComment', 99, 100),
(40, 29, NULL, NULL, 'admin_disallowComment', 101, 102),
(41, 29, NULL, NULL, 'admin_getLinkItem', 103, 104),
(48, 29, NULL, NULL, 'admin_dispatch', 117, 118),
(49, 1, NULL, NULL, 'Dashboards', 150, 159),
(50, 49, NULL, NULL, 'admin_index', 151, 152),
(51, 49, NULL, NULL, 'admin_dispatch', 153, 154),
(52, 1, NULL, NULL, 'GalleryCategories', 160, 185),
(53, 52, NULL, NULL, 'admin_index', 161, 162),
(54, 52, NULL, NULL, 'admin_add', 163, 164),
(55, 52, NULL, NULL, 'admin_edit', 165, 166),
(56, 52, NULL, NULL, 'admin_delete', 167, 168),
(57, 52, NULL, NULL, 'admin_publish', 169, 170),
(58, 52, NULL, NULL, 'admin_unPublish', 171, 172),
(59, 52, NULL, NULL, 'admin_getLinkItem', 173, 174),
(61, 52, NULL, NULL, 'admin_dispatch', 177, 178),
(62, 1, NULL, NULL, 'GalleryItems', 186, 217),
(63, 62, NULL, NULL, 'admin_index', 187, 188),
(64, 62, NULL, NULL, 'admin_add', 189, 190),
(65, 62, NULL, NULL, 'admin_edit', 191, 192),
(66, 62, NULL, NULL, 'admin_delete', 193, 194),
(67, 62, NULL, NULL, 'admin_unPublish', 195, 196),
(68, 62, NULL, NULL, 'admin_publish', 197, 198),
(71, 62, NULL, NULL, 'admin_move', 203, 204),
(72, 62, NULL, NULL, 'admin_getLinkItem', 205, 206),
(73, 62, NULL, NULL, 'admin_dispatch', 207, 208),
(74, 1, NULL, NULL, 'MenuTypes', 218, 235),
(75, 74, NULL, NULL, 'admin_index', 219, 220),
(76, 74, NULL, NULL, 'admin_add', 221, 222),
(77, 74, NULL, NULL, 'admin_edit', 223, 224),
(78, 74, NULL, NULL, 'admin_getTypes', 225, 226),
(79, 74, NULL, NULL, 'admin_delete', 227, 228),
(80, 74, NULL, NULL, 'admin_dispatch', 229, 230),
(81, 1, NULL, NULL, 'Menus', 236, 261),
(82, 81, NULL, NULL, 'admin_index', 237, 238),
(83, 81, NULL, NULL, 'admin_add', 239, 240),
(84, 81, NULL, NULL, 'admin_edit', 241, 242),
(85, 81, NULL, NULL, 'admin_delete', 243, 244),
(86, 81, NULL, NULL, 'admin_move', 245, 246),
(87, 81, NULL, NULL, 'admin_publish', 247, 248),
(88, 81, NULL, NULL, 'admin_unPublish', 249, 250),
(90, 81, NULL, NULL, 'admin_dispatch', 253, 254),
(91, 1, NULL, NULL, 'Pages', 262, 273),
(93, 91, NULL, NULL, 'admin_dispatch', 265, 266),
(94, 1, NULL, NULL, 'Settings', 274, 287),
(95, 94, NULL, NULL, 'admin_index', 275, 276),
(97, 94, NULL, NULL, 'admin_dispatch', 279, 280),
(98, 1, NULL, NULL, 'SliderItems', 288, 313),
(99, 98, NULL, NULL, 'admin_index', 289, 290),
(100, 98, NULL, NULL, 'admin_add', 291, 292),
(101, 98, NULL, NULL, 'admin_edit', 293, 294),
(102, 98, NULL, NULL, 'admin_delete', 295, 296),
(103, 98, NULL, NULL, 'admin_move', 297, 298),
(104, 98, NULL, NULL, 'admin_publish', 299, 300),
(105, 98, NULL, NULL, 'admin_unPublish', 301, 302),
(107, 98, NULL, NULL, 'admin_dispatch', 305, 306),
(108, 1, NULL, NULL, 'Users', 314, 347),
(109, 108, NULL, NULL, 'admin_login', 315, 316),
(110, 108, NULL, NULL, 'admin_logout', 317, 318),
(112, 108, NULL, NULL, 'admin_dispatch', 321, 322),
(113, 1, NULL, NULL, 'WeblinkCategories', 348, 365),
(114, 113, NULL, NULL, 'admin_index', 349, 350),
(115, 113, NULL, NULL, 'admin_add', 351, 352),
(116, 113, NULL, NULL, 'admin_edit', 353, 354),
(117, 113, NULL, NULL, 'admin_delete', 355, 356),
(118, 113, NULL, NULL, 'admin_getLinkItem', 357, 358),
(119, 113, NULL, NULL, 'admin_dispatch', 359, 360),
(120, 1, NULL, NULL, 'Weblinks', 366, 389),
(121, 120, NULL, NULL, 'admin_index', 367, 368),
(122, 120, NULL, NULL, 'admin_add', 369, 370),
(123, 120, NULL, NULL, 'admin_edit', 371, 372),
(124, 120, NULL, NULL, 'admin_delete', 373, 374),
(125, 120, NULL, NULL, 'admin_publish', 375, 376),
(126, 120, NULL, NULL, 'admin_unPublish', 377, 378),
(128, 120, NULL, NULL, 'admin_dispatch', 381, 382),
(135, 1, NULL, NULL, 'TinyMCE', 390, 391),
(136, 1, NULL, NULL, 'UploadPack', 392, 393),
(137, 1, NULL, NULL, 'AclPermissions', 394, 407),
(138, 137, NULL, NULL, 'admin_index', 395, 396),
(139, 137, NULL, NULL, 'admin_editPermission', 397, 398),
(140, 137, NULL, NULL, 'admin_sync', 399, 400),
(141, 137, NULL, NULL, 'admin_dispatch', 401, 402),
(161, 29, NULL, NULL, 'index', 133, 134),
(162, 1, NULL, NULL, 'Places', 408, 423),
(163, 162, NULL, NULL, 'admin_index', 409, 410),
(164, 162, NULL, NULL, 'admin_dispatch', 411, 412),
(165, 1, NULL, NULL, 'DebugKit', 424, 437),
(166, 165, NULL, NULL, 'ToolbarAccess', 425, 436),
(167, 166, NULL, NULL, 'history_state', 426, 427),
(168, 166, NULL, NULL, 'sql_explain', 428, 429),
(169, 166, NULL, NULL, 'admin_dispatch', 430, 431),
(170, 1, NULL, NULL, 'Degrees', 438, 453),
(171, 170, NULL, NULL, 'admin_index', 439, 440),
(172, 170, NULL, NULL, 'admin_add', 441, 442),
(173, 170, NULL, NULL, 'admin_edit', 443, 444),
(174, 170, NULL, NULL, 'admin_delete', 445, 446),
(175, 170, NULL, NULL, 'admin_dispatch', 447, 448),
(176, 162, NULL, NULL, 'admin_add', 413, 414),
(177, 162, NULL, NULL, 'admin_edit', 415, 416),
(178, 162, NULL, NULL, 'admin_delete', 417, 418),
(179, 1, NULL, NULL, 'Rastes', 454, 469),
(180, 179, NULL, NULL, 'admin_index', 455, 456),
(181, 179, NULL, NULL, 'admin_add', 457, 458),
(182, 179, NULL, NULL, 'admin_edit', 459, 460),
(183, 179, NULL, NULL, 'admin_delete', 461, 462),
(184, 179, NULL, NULL, 'admin_dispatch', 463, 464),
(185, 1, NULL, NULL, 'Certificates', 470, 497),
(186, 185, NULL, NULL, 'admin_index', 471, 472),
(197, 185, NULL, NULL, 'admin_changeDocs', 489, 490),
(189, 185, NULL, NULL, 'admin_delete', 473, 474),
(190, 185, NULL, NULL, 'admin_dispatch', 475, 476),
(191, 185, NULL, NULL, 'getCountRequest', 477, 478),
(192, 185, NULL, NULL, 'admin_view', 479, 480),
(193, 185, NULL, NULL, 'view', 481, 482),
(194, 185, NULL, NULL, 'admin_changeStatus', 483, 484),
(195, 185, NULL, NULL, 'admin_remove', 485, 486),
(196, 185, NULL, NULL, 'admin_changeWarden', 487, 488),
(198, 185, NULL, NULL, 'admin_print', 491, 492),
(225, 215, NULL, NULL, 'countNewMessages', 519, 520),
(224, 215, NULL, NULL, 'admin_read', 517, 518),
(212, 1, NULL, NULL, 'Profile', 498, 507),
(213, 212, NULL, NULL, 'view', 499, 500),
(214, 212, NULL, NULL, 'admin_dispatch', 501, 502),
(215, 1, NULL, NULL, 'Pms', 508, 533),
(216, 215, NULL, NULL, 'admin_add', 509, 510),
(218, 215, NULL, NULL, 'admin_index', 511, 512),
(219, 215, NULL, NULL, 'admin_delete', 513, 514),
(223, 215, NULL, NULL, 'admin_dispatch', 515, 516),
(226, 108, NULL, NULL, 'admin_add', 327, 328),
(227, 108, NULL, NULL, 'admin_index', 329, 330),
(228, 108, NULL, NULL, 'admin_active', 331, 332),
(229, 108, NULL, NULL, 'admin_inactive', 333, 334),
(230, 108, NULL, NULL, 'admin_edit', 335, 336),
(231, 108, NULL, NULL, 'admin_delete', 337, 338),
(232, 108, NULL, NULL, 'login', 339, 340),
(233, 108, NULL, NULL, 'logout', 341, 342),
(283, 166, NULL, NULL, 'dispatch', 432, 433),
(282, 120, NULL, NULL, 'dispatch', 385, 386),
(281, 113, NULL, NULL, 'dispatch', 361, 362),
(280, 108, NULL, NULL, 'dispatch', 343, 344),
(238, 20, NULL, NULL, 'index', 67, 68),
(239, 20, NULL, NULL, 'add', 69, 70),
(240, 20, NULL, NULL, 'edit', 71, 72),
(241, 20, NULL, NULL, 'delete', 73, 74),
(279, 98, NULL, NULL, 'dispatch', 309, 310),
(278, 94, NULL, NULL, 'dispatch', 283, 284),
(277, 179, NULL, NULL, 'dispatch', 465, 466),
(276, 212, NULL, NULL, 'dispatch', 503, 504),
(275, 215, NULL, NULL, 'dispatch', 521, 522),
(274, 162, NULL, NULL, 'dispatch', 419, 420),
(273, 91, NULL, NULL, 'dispatch', 269, 270),
(272, 81, NULL, NULL, 'dispatch', 257, 258),
(271, 74, NULL, NULL, 'dispatch', 231, 232),
(270, 62, NULL, NULL, 'dispatch', 213, 214),
(269, 52, NULL, NULL, 'dispatch', 181, 182),
(268, 170, NULL, NULL, 'dispatch', 449, 450),
(267, 49, NULL, NULL, 'dispatch', 155, 156),
(266, 29, NULL, NULL, 'dispatch', 135, 136),
(265, 20, NULL, NULL, 'dispatch', 75, 76),
(264, 12, NULL, NULL, 'dispatch', 45, 46),
(263, 2, NULL, NULL, 'dispatch', 23, 24),
(262, 185, NULL, NULL, 'dispatch', 493, 494),
(261, 137, NULL, NULL, 'dispatch', 403, 404),
(284, 29, NULL, NULL, 'listArticles', 137, 138),
(285, 29, NULL, NULL, 'add', 139, 140),
(286, 29, NULL, NULL, 'edit', 141, 142),
(287, 29, NULL, NULL, 'delete', 143, 144),
(288, 29, NULL, NULL, 'addAbout', 145, 146),
(289, 215, NULL, NULL, 'index', 523, 524),
(290, 215, NULL, NULL, 'add', 525, 526),
(291, 215, NULL, NULL, 'read', 527, 528),
(292, 215, NULL, NULL, 'delete', 529, 530),
(301, 299, NULL, NULL, 'dispatch', 537, 538),
(300, 299, NULL, NULL, 'admin_dispatch', 535, 536),
(299, 1, NULL, NULL, 'Complaints', 534, 541),
(296, 137, NULL, NULL, 'admin_settings', 405, 406),
(297, 185, NULL, NULL, 'admin_settings', 495, 496),
(298, 2, NULL, NULL, 'admin_settings', 25, 26),
(302, 299, NULL, NULL, 'admin_settings', 539, 540),
(303, 12, NULL, NULL, 'admin_settings', 47, 48),
(304, 20, NULL, NULL, 'admin_settings', 77, 78),
(305, 29, NULL, NULL, 'admin_settings', 147, 148),
(306, 49, NULL, NULL, 'admin_settings', 157, 158),
(307, 170, NULL, NULL, 'admin_settings', 451, 452),
(308, 52, NULL, NULL, 'admin_settings', 183, 184),
(309, 62, NULL, NULL, 'admin_settings', 215, 216),
(310, 74, NULL, NULL, 'admin_settings', 233, 234),
(311, 81, NULL, NULL, 'admin_settings', 259, 260),
(312, 91, NULL, NULL, 'admin_settings', 271, 272),
(313, 162, NULL, NULL, 'admin_settings', 421, 422),
(314, 215, NULL, NULL, 'admin_settings', 531, 532),
(315, 212, NULL, NULL, 'admin_settings', 505, 506),
(316, 179, NULL, NULL, 'admin_settings', 467, 468),
(317, 94, NULL, NULL, 'admin_settings', 285, 286),
(318, 98, NULL, NULL, 'admin_settings', 311, 312),
(319, 1, NULL, NULL, 'Smses', 542, 553),
(320, 319, NULL, NULL, 'admin_settings', 543, 544),
(321, 319, NULL, NULL, 'admin_send', 545, 546),
(322, 319, NULL, NULL, 'admin_index', 547, 548),
(323, 319, NULL, NULL, 'admin_dispatch', 549, 550),
(324, 319, NULL, NULL, 'dispatch', 551, 552),
(325, 108, NULL, NULL, 'admin_settings', 345, 346),
(326, 113, NULL, NULL, 'admin_settings', 363, 364),
(327, 120, NULL, NULL, 'admin_settings', 387, 388),
(328, 166, NULL, NULL, 'admin_settings', 434, 435);

-- --------------------------------------------------------

--
-- Table structure for table `gl_aros`
--

CREATE TABLE IF NOT EXISTS `gl_aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gl_aros`
--

INSERT INTO `gl_aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Roles', 1, 8),
(2, 1, 'Role', 1, 'Admin', 2, 3),
(3, 1, 'Role', 2, 'Super Admin', 4, 5),
(4, 1, 'Role', 3, 'Register', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `gl_aros_acos`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=295 ;

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
(199, 2, 93, '1', '1', '1', '1'),
(200, 3, 163, '1', '1', '1', '1'),
(201, 3, 164, '1', '1', '1', '1'),
(202, 3, 176, '1', '1', '1', '1'),
(203, 3, 177, '1', '1', '1', '1'),
(204, 3, 178, '1', '1', '1', '1'),
(205, 3, 171, '1', '1', '1', '1'),
(206, 3, 172, '1', '1', '1', '1'),
(207, 3, 173, '1', '1', '1', '1'),
(208, 3, 174, '1', '1', '1', '1'),
(209, 3, 175, '1', '1', '1', '1'),
(210, 3, 180, '1', '1', '1', '1'),
(211, 3, 181, '1', '1', '1', '1'),
(212, 3, 182, '1', '1', '1', '1'),
(213, 3, 183, '1', '1', '1', '1'),
(214, 3, 184, '1', '1', '1', '1'),
(215, 3, 186, '1', '1', '1', '1'),
(226, 3, 197, '1', '1', '1', '1'),
(225, 3, 196, '1', '1', '1', '1'),
(218, 3, 189, '1', '1', '1', '1'),
(219, 3, 190, '1', '1', '1', '1'),
(220, 3, 191, '1', '1', '1', '1'),
(221, 3, 192, '1', '1', '1', '1'),
(228, 3, 213, '1', '1', '1', '1'),
(227, 3, 198, '1', '1', '1', '1'),
(224, 3, 195, '1', '1', '1', '1'),
(223, 3, 194, '1', '1', '1', '1'),
(222, 3, 193, '1', '1', '1', '1'),
(229, 3, 214, '1', '1', '1', '1'),
(230, 3, 216, '1', '1', '1', '1'),
(232, 3, 218, '1', '1', '1', '1'),
(233, 3, 219, '1', '1', '1', '1'),
(249, 2, 225, '1', '1', '1', '1'),
(247, 3, 225, '1', '1', '1', '1'),
(237, 3, 223, '1', '1', '1', '1'),
(238, 2, 216, '1', '1', '1', '1'),
(240, 2, 218, '1', '1', '1', '1'),
(241, 2, 219, '1', '1', '1', '1'),
(248, 2, 224, '1', '1', '1', '1'),
(246, 3, 224, '1', '1', '1', '1'),
(245, 2, 223, '1', '1', '1', '1'),
(250, 3, 226, '1', '1', '1', '1'),
(251, 2, 226, '1', '1', '1', '1'),
(252, 2, 227, '1', '1', '1', '1'),
(253, 2, 228, '1', '1', '1', '1'),
(254, 2, 229, '1', '1', '1', '1'),
(255, 2, 230, '1', '1', '1', '1'),
(256, 2, 231, '1', '1', '1', '1'),
(257, 3, 227, '1', '1', '1', '1'),
(258, 3, 228, '1', '1', '1', '1'),
(259, 3, 229, '1', '1', '1', '1'),
(260, 3, 230, '1', '1', '1', '1'),
(261, 3, 231, '1', '1', '1', '1'),
(262, 4, 232, '1', '1', '1', '1'),
(263, 4, 233, '1', '1', '1', '1'),
(264, 4, 238, '1', '1', '1', '1'),
(265, 4, 239, '1', '1', '1', '1'),
(266, 4, 240, '1', '1', '1', '1'),
(267, 4, 241, '1', '1', '1', '1'),
(268, 4, 265, '1', '1', '1', '1'),
(269, 4, 161, '1', '1', '1', '1'),
(270, 4, 266, '1', '1', '1', '1'),
(271, 4, 285, '1', '1', '1', '1'),
(272, 4, 286, '1', '1', '1', '1'),
(273, 4, 287, '1', '1', '1', '1'),
(274, 4, 288, '1', '1', '1', '1'),
(275, 4, 275, '1', '1', '1', '1'),
(276, 4, 289, '1', '1', '1', '1'),
(277, 4, 290, '1', '1', '1', '1'),
(278, 4, 291, '1', '1', '1', '1'),
(279, 4, 292, '1', '1', '1', '1'),
(280, 4, 225, '1', '1', '1', '1'),
(287, 3, 320, '1', '1', '1', '1'),
(282, 4, 263, '1', '1', '1', '1'),
(286, 2, 305, '1', '1', '1', '1'),
(285, 3, 305, '1', '1', '1', '1'),
(288, 3, 321, '1', '1', '1', '1'),
(289, 3, 322, '1', '1', '1', '1'),
(290, 3, 323, '1', '1', '1', '1'),
(291, 2, 320, '1', '1', '1', '1'),
(292, 2, 321, '1', '1', '1', '1'),
(293, 2, 322, '1', '1', '1', '1'),
(294, 2, 323, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gl_comments`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `gl_comments`
--

INSERT INTO `gl_comments` (`id`, `parent_id`, `content_id`, `name`, `email`, `website`, `content`, `published`, `created`) VALUES
(1, 0, 2, '456', 'dsf@df.sd', 'http://www.df.df', '12312333333333333333333333333333333333333333333333333333333', 0, '1391-10-14 13:41:31'),
(2, 0, 5, 'dfg', 'dsf@df.sd', 'http://www.df.df', 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 0, '1391-10-22 19:23:17'),
(3, 0, 5, 'sdf', 'dsf@df.sd', 'http://www.df.df', 'sddsdsssssssssssssssssssssssssssss', 0, '1391-10-22 19:24:47'),
(4, 0, 5, 'dfg', 'dsf@df.sd', 'http://www.df.df', '456666665555555555555555555555555555555555555555555555555', 0, '1391-10-22 19:32:18'),
(5, 0, 5, 'sdf', 'dsf@df.sd', 'http://www.df.df', '12333333333333333333333333333333333333333333333333333333', 0, '1391-10-22 19:37:28'),
(6, 0, 5, 'sdf', 'dsf@df.sd', 'http://www.df.df', '12333333333333333333333333333333333333333333333333333333', 0, '1391-10-22 19:40:24'),
(7, 0, 5, 'sdf', 'dsf@df.sd', 'http://www.df.df', '12333333333333333333333333333333333333333333333333333333', 0, '1391-10-22 19:40:48'),
(8, 0, 5, 'df', 'dsf@df.sd', 'http://www.df.df', 'sdfdfsddssddssdsddssssssssssssssfsdfs', 0, '1391-10-22 19:41:13'),
(9, 0, 5, 'df', 'dsf@df.sd', 'http://www.df.df', 'sdfdfsddssddssdsddssssssssssssssfsdfs', 0, '1391-10-22 19:41:18'),
(10, 0, 5, 'df', 'dsf@df.sd', 'http://www.df.df', 'sdfdfsddssddssdsddssssssssssssssfsdfs', 0, '1391-10-22 19:41:35'),
(11, 0, 5, 'df', 'dsf@df.sd', 'http://www.df.df', 'sdfdfsddssddssdsddssssssssssssssfsdfs', 0, '1391-10-22 19:41:42'),
(12, 0, 5, 'df', 'dsf@df.sd', 'http://www.df.df', 'sdfdfsddssddssdsddssssssssssssssfsdfs', 0, '1391-10-22 19:42:01'),
(13, 0, 5, 'df', 'dsf@df.sd', 'http://www.df.df', 'sdfdfsddssddssdsddssssssssssssssfsdfs', 0, '1391-10-22 19:42:08'),
(14, 0, 5, 'dfg', 'dsf@df.sd', 'http://www.df.df', 'dssddddddddddddddddddddddddddddddddddddd', 0, '1391-10-22 19:42:29'),
(15, 0, 5, 'dfg', 'dsf@df.sd', 'http://www.df.df', 'dssddddddddddddddddddddddddddddddddddddd', 0, '1391-10-22 19:45:24'),
(16, 0, 5, 'dfg', 'dsf@df.sd', 'http://www.df.df', 'dssddddddddddddddddddddddddddddddddddddd', 0, '1391-10-22 19:46:36'),
(17, 0, 5, 'fdg', 'dsf@df.sd', 'http://www.df.df', 'asdfasdddddddddddddddddddddd', 0, '1391-10-22 21:41:59'),
(18, 0, 5, 'fdg', 'dsf@df.sd', 'http://www.df.df', 'asdfasdddddddddddddddddddddd', 0, '1391-10-22 21:43:27'),
(19, 0, 8, 'cb', 'dsf@df.sd', 'http://www.df.df', 'cvbcxbvcxb xcv bcxv bcdf gdsf dfs', 0, '1391-10-23 09:59:53'),
(20, 0, 11, 'xcvb', 'dsf@df.sd', 'http://www.df.df', 'xcvbcxvbcxvbcxvbcxvbcxvbxcv', 0, '1391-10-23 14:33:31'),
(21, 0, 11, 'تا', 'dfh@fg.fg', 'http://dfghfdh.fdh', 'اتتاتتاتااللاااااااااااااااااااااااااااااااااااااااااااااااا', 0, '1391-10-24 11:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `gl_contact_details`
--

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
-- Table structure for table `gl_content_categories`
--

CREATE TABLE IF NOT EXISTS `gl_content_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0' COMMENT 'parent id of a category default is 0 this mean the category is parent! ',
  `name` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'name of category',
  `descriptions` text COLLATE utf8_persian_ci,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `access` int(11) DEFAULT NULL COMMENT 'نشان می دهد که این مجموعه کجا باید نمایش داده شود.',
  `is_lock` int(11) DEFAULT NULL COMMENT 'اگر قفل باشد دیگر غیر قابل ویرایش و حذف است',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gl_content_categories`
--

INSERT INTO `gl_content_categories` (`id`, `user_id`, `parent_id`, `name`, `descriptions`, `published`, `access`, `is_lock`, `lft`, `rght`, `level`) VALUES
(1, 0, NULL, 'درباره اعضا', '<p>در این مجموعه اطلاعاتی که هر عضو درباره خود می دهد قرار می گیرد. این مجموعه غیرقابل حذف و ویرایش است</p>', 1, 1, 1, 1, 2, 0),
(4, 2, NULL, 'تست', '<p>تست</p>', 1, 1, 0, 5, 6, 0),
(5, 2, NULL, 'تست 2', '<p>سیسیییییییییییییییییییییییییییییییییییییییییییییی</p>', 1, 1, 0, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_contents`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `gl_contents`
--

INSERT INTO `gl_contents` (`id`, `user_id`, `content_category_id`, `title`, `slug`, `intro`, `content`, `allow_comment`, `published_comment`, `frontpage`, `published`, `created`, `modified`, `lft`, `rght`, `parent_id`) VALUES
(1, 1, 0, 'چگونگی درخواست پروانه', 'چگونگی_درخواست_پروانه', '<p>با توجه به نوع اطلاعاتی که در دو اتحادیه هتل آپارتمان و محصولات فرهنگی دیده شد. متوجه می شویم که باید اطلاعات را به دو گونه تقسیم بندی کنیم</p>\r\n<p>اطلاعات عمومی که برای همگی مشترک است .</p>\r\n<p>اطلاعاتی که مختص همان اتحادیه است.</p>\r\n<p>\r\n', '\r\n</p>\r\n<h3>اطلاعات عمومی :</h3>\r\n<p><strong>اطلاعات فردی :</strong> نام - نام خانوادگی - کد ملی - شماره شناسنامه - محل صدور - تاریخ تولد - مدرک تحصیلی - جنسیت - وضعیت تاهل - افراد تحت تکفل - آدرس - تلفن منزل - کدپستی -تلفن همراه - وضعیت نظام وظیفه</p>\r\n<p><strong>اطلاعات شغل :</strong> عنوان - آدرس - تلفن ثابت - کد پستی- منطقه شهرداری - نوع مالکیت - کد (یا نام) رسته -</p>\r\n<p>&nbsp;</p>\r\n<h3>اطلاعات مختص هر اتحادیه :</h3>\r\n<p><strong>محصولات فرهنگی : </strong></p>\r\n<p>وضعیت ایثارگری - شاغل دولتی هست یا نه - عضو اتحادیه دیگر هست یا نه - پروانه کسب از اتحادیه دیگر دارد یا نه - مشاغل قبل از تقاضا - سابقه کار</p>\r\n<p>علاوه بر اطلاعات فوق فرمی است که بازرس باید تائید نماید که شامل موارد ذیل است</p>\r\n<p>در حریم آرایشگاه زنانه یا نه - در حریم مدرسه یا نه - در حریم باشگاه یا نه - در حریم فروشگاه یا نه - زیرزمین یا نه - طبقه فوقانی یا نه - مکان مورد مورد تائید است یا نه</p>\r\n<p>&nbsp;</p>\r\n<p>پرداخت مبالغ مرود که از قرار زیر است :</p>\r\n<p>حساب اتحادیه به مبلغ 300 تومان - حساب خزانه به مبلغ 3 تومان - حساب آموزش فرانگران به مبلغ 12 تومان</p>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<p>&nbsp;</p>\r\n<p><strong>هتل آپارتمان:</strong></p>\r\n<p>تعداد کل واحد - تعداد اتاق - تعداد سوئیت - تعداد یک خوابه - تعداد دو خوابه - تعداد سه خوابه - شماره بهره برداری از اداره میراث و گردشگری</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>مدارک مورد نیاز</h3>\r\n<p><strong>محصولات فرهنگی :</strong></p>\r\n<p>2 سری تمام صفحات شناسنامه - 2 سری پایان خدمت - 2 سری آخرین مدرک تحصیلی - 20 تا عکس 3 در چهار - 2 سری کارت ملی - کد &divide;ستی 10 رقمی - 2 سری اجاره نامه یا سند مالکیت - کپی تجاری مغازه</p>\r\n<p>&nbsp;</p>\r\n<p><strong>هتل آپارتمان :</strong></p>\r\n<p>مجوز بهره برداری - تمام صفحات سند مالکیت - پروانه و پایان کار - تمام صفحات شناسنامه مالک و تمام شرکا (در صورت داشتن شریک) - رضایت نامه یا وکالت نامه شرکا - کارت پایان خدمت یا معافیت - آخرین مدرک تحصیلی - 10 تا عکس 3 در 4 - کارت ملی - کد پستی 10 رقمی</p>', 0, 0, 1, 1, '1391-10-08 11:20:57', '1391-10-14 10:41:51', 1, 2, NULL),
(2, 1, 0, 'ذخیره اطلاعات پروانه', 'ذخیره_اطلاعات_پروانه', '<p>با توجه به بحثی که گفته شد. تقسیم بندی اینگونه خواهد شد.</p>\r\n<p>اطلاعات فردی - اطلاعات کسب و کار - مدارک که باید به صورت تیک مانند باشد - سایر شرایط (که البته فقط در محصولات فرهنگی داشتیم. در جایی که بازرس باید مکان را تایید می کرد)</p>\r\n<p>&nbsp;</p>\r\n<p>البته محمد این گونه تقسیم بندی کرده بود</p>\r\n<p>تمامی اطلاعات در یک جدول آورده شود ولی اطلاعات رسته - منطقه یا شهر - درجه در جداول دیگری باشد تا حالت دینامیک داشته باشد.</p>\r\n<p>ولی به نظر من می توان جداول را بهتر نیز کرد. به گونه ای که اطلاعات فردی در یک جدول و اطلاعات کسب و کار در جدول دیگر. ولی باید دید آیا لزومی دارد یا نه.</p>', NULL, 1, 0, 1, 1, '1391-10-08 15:10:02', '1391-10-14 13:41:04', 3, 4, NULL),
(6, 2, 1, 'درباره حمید ممدوحی', 'درباره_حمید_ممدوحی', '<p>بیوگرافی- فعالیت های شغلی</p>', NULL, 1, 0, 0, 1, '1391-10-22 20:37:03', '1391-10-24 09:40:49', 5, 6, NULL),
(12, 3, 0, 'تغییرات صورت گرفته در جداول', 'تغییرات_صورت_گرفته_در_جداول', '<p>کارهایی که برای امکان صفحه شخصی داشتن در جداول صورت گرفت</p>\r\n<p>1- ایجاد ستون is_lock در جدول ContentCategory برای قفل کردن مجموعه های سیستمی</p>\r\n<p>2- ایجاد ستون user_id در جدول ContentCategory برای شخصی سازی مجموعه ها</p>\r\n<p>3- ایجاد ستون access در جدول ContentCategory که اگر 1 بود یعنی فقط باید در صفحات شخصی نمایش داده شود و در غیر این صورت برای نمایش عموم حتما باید مقدار NULL داشته باشد. زیرا اگر غیر از NULL داشته باشد برای نمایش مطالب بدون مجموعه دچار مشکل می شویم</p>', NULL, 0, 0, 1, 1, '1391-10-23 11:12:28', '1391-10-23 16:36:21', 9, 10, NULL),
(11, 2, 4, 'مقدمه', 'مقدمه', '<p>این مطلب برای صفحه شخصی من است .</p>\r\n<p>به نظرم مطالبی که برای صفحات شخصی درج می شوند باید قابلیت های ذیلا را داشته باشند.</p>\r\n<p>1- فقط در صفحه شخصی نویسنده نمایش داده شوند.</p>\r\n<p>2- پرچم های انتشار و نظر دهی باید فعال و باقی پرچم ها مانند نمایش در صفحه اصلی و نمایش بدون تائید نظرات غیر فعال.</p>\r\n', '\r\n<p>3- فقط به مجموعه هایی دسترسی داشته باشد که خودش تعریف کرده است</p>\r\n<p>4- فقط به مطالبی دسترسی داشته باشد که خودش تعریف کرده است</p>\r\n<p>&nbsp;</p>\r\n<p>بروزرسانی توسط مدیریت :</p>\r\n<p>1- مدیریت باید بتواند تمامی نظرات خود را روی این مطالب اعمال کند</p>', 1, 0, 0, 1, '1391-10-23 10:38:10', '1391-10-24 12:02:59', 7, 8, NULL),
(13, 2, 5, 'طزرذ', 'طزرذزطرذطزرذ', '<p>طزرذزطرذطزرذطزرذطزرذ</p>', NULL, 1, 0, 0, 1, '1391-10-24 11:14:27', '1391-10-24 11:14:27', 11, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_gallery_categories`
--

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
-- Table structure for table `gl_link_types`
--

CREATE TABLE IF NOT EXISTS `gl_link_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `check_path` tinyint(4) DEFAULT NULL COMMENT 'check rule of url',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gl_link_types`
--

INSERT INTO `gl_link_types` (`id`, `name`, `path`, `check_path`) VALUES
(1, 'مطلب', 'Contents', NULL),
(2, 'مجموعه مطالب', 'ContentCategories', NULL),
(3, 'تماس', 'ContactDetails', NULL),
(4, 'مجموعه گالری', 'GalleryCategories', NULL),
(5, 'گالری', 'GalleryItems', NULL),
(6, 'مجموعه لینک', 'WeblinkCategories', NULL),
(8, 'لینک خارجی', NULL, 1),
(9, 'صفحه اصلی', '/', NULL),
(10, 'جدا کننده', '#', NULL),
(11, 'لینک داخلی', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_menu_types`
--

CREATE TABLE IF NOT EXISTS `gl_menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gl_menu_types`
--

INSERT INTO `gl_menu_types` (`id`, `type`, `title`, `description`) VALUES
(1, 'منوی بالا', 'main_menu', 'منویی که در ابتدای سایت نمایش داده می شود.');

-- --------------------------------------------------------

--
-- Table structure for table `gl_menus`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gl_menus`
--

INSERT INTO `gl_menus` (`id`, `parent_id`, `title`, `link`, `link_type_id`, `menu_type_id`, `published`, `lft`, `rght`, `level`) VALUES
(1, 0, 'خانه', '/', 9, 1, 1, 1, 2, 0),
(2, 4, 'ثبت درخواست', '/Certificates/register', 11, 1, 1, 4, 5, 1),
(4, 0, 'درخواست پروانه', '#', 10, 1, 1, 3, 8, 0),
(5, 4, 'مشاهده درخواست', '/Certificates/view', 11, 1, 1, 6, 7, 1),
(6, 0, 'لیست اعضا', '/Certificates', 11, 1, 1, 9, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_roles`
--

CREATE TABLE IF NOT EXISTS `gl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gl_roles`
--

INSERT INTO `gl_roles` (`id`, `name`, `title`, `lft`, `rght`, `parent_id`) VALUES
(1, 'Admin', 'مدیریت', 1, 2, NULL),
(2, 'SuperAdmin', 'مدیریت ارشد', 3, 4, NULL),
(3, 'Register', 'عضو', 5, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_settings`
--

CREATE TABLE IF NOT EXISTS `gl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `namedSection` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `params` text COLLATE utf8_persian_ci,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gl_settings`
--

INSERT INTO `gl_settings` (`id`, `section`, `namedSection`, `key`, `value`, `alias`, `params`, `modified`) VALUES
(1, 'Site', 'سایت', 'Name', 'بیگ آی تی بلاگ', 'عنوان سایت', NULL, '1391-10-29 09:06:37'),
(2, 'Site', 'سایت', 'Keywords', 'گیلاس,سیستم مدیریت محتوای فارسی,کیک پی اچ پی,CMS,CakePHP,Gilas', 'توضیحات', NULL, '1391-10-29 09:06:37'),
(3, 'Site', 'سایت', 'Description', 'سیستم مدیریت محتوای گیلاس تولید شده در دپارتمان وب شرکت اندیشه نوین', 'توضیحات', NULL, '1391-10-29 09:06:37'),
(4, 'Site', 'سایت', 'FootNote', 'کلیه حقوق مادی و معنوی این نرم افزار متعلق به شرکت اندیشه نوین می باشد.', 'پانویس', NULL, '1391-10-29 09:06:37'),
(5, 'Site', 'سایت', 'AdminAddress', 'admin', 'آدرس مدیریت', NULL, '1391-10-29 09:06:37'),
(6, 'Error', 'خطای سیستمی', 'Code-11', 'خطای شماره 11 - امکان ورود به سیستم وجود ندارد!', 'خطای شماره 11', NULL, '1391-10-29 09:06:37'),
(7, 'Error', 'خطای سیستمی', 'Code-12', 'خطای شماره 12 - درخواست شما نا معتبر است و امکان بررسی آن وجود ندارد!', 'خطای شماره 12', NULL, '1391-10-29 09:06:37'),
(8, 'Error', 'خطای سیستمی', 'Code-13', 'خطای شماره 13 - اطلاعات وارد شده معتبر نمی باشد. لطفا به خطاهای سیستم دقت کرده و مجددا تلاش نمایید!', 'خطای شماره 13', NULL, '1391-10-29 09:06:37'),
(9, 'Error', 'خطای سیستمی', 'Code-14', 'خطای شماره 14 – امکان انجام عملیات درخواستی بدلیل ارسال نادرست اطلاعات وجود ندارد!', 'خطای شماره 14', NULL, '1391-10-29 09:06:37'),
(10, 'Error', 'خطای سیستمی', 'Code-15', 'خطای شماره 15 – امکان حذف به علت دارا بودن آیتم های زیر مجموعه وجود ندارد. لطفا ابتدا آیتم های زیر مجموعه را حذف نمایید!', 'خطای شماره 15', NULL, '1391-10-29 09:06:37'),
(11, 'Error', 'خطای سیستمی', 'Code-16', 'خطای شماره 16 - به هر دلیلی امکان حذف وجود ندارد!', 'خطای شماره 16', NULL, '1391-10-29 09:06:37'),
(12, 'Site', 'سایت', 'Email', '', 'ایمیل سایت', NULL, '1391-10-29 09:06:37'),
(13, 'Error', 'خطای سیستمی', 'Code-17', 'خطای شماره 17 - اشکال در انجام تراکنش', 'خطای شماره 17', NULL, '1391-10-29 09:06:37'),
(14, 'Site', 'سایت', 'Template', 'Freely', 'قالب سایت', NULL, '1391-10-29 09:06:37'),
(16, 'Error', 'خطای سیستمی', 'Code-18', 'این آیتم به صورت سیستمی تعریف شده است و امکان ویرایش یا حذف آن وجود ندارد', 'خطای شماره 18', NULL, '1391-10-29 09:06:37'),
(17, 'Content', 'مطالب', 'count', '1', 'تعداد مطالب در صفحه اصلی', NULL, '1391-10-30 08:42:26'),
(18, 'Content', 'مطالب', 'comment_for_registers', '0', 'قابلیت نظردهی برای مطالب اعضا', 'a:1:{s:7:"options";a:2:{i:0;s:6:"خیر";i:1;s:6:"بله";}}', '1391-10-30 08:42:26'),
(19, 'Content', 'مطالب', 'register_has_content', '1', 'قابلیت نوشتن مطلب توسط اعضا', 'a:1:{s:7:"options";a:2:{i:0;s:6:"خیر";i:1;s:6:"بله";}}', '1391-10-30 08:42:26'),
(20, 'SMS', 'پیامک', 'username', '4gdfh  df hhjfj56', 'نام کاربری', NULL, '1391-10-29 18:48:56'),
(21, 'SMS', 'پیامک', 'password', '456', 'رمز عبور', NULL, '1391-10-29 18:48:56'),
(22, 'SMS', 'پیامک', 'number', '456', 'شماره پیامک', NULL, '1391-10-29 18:48:56'),
(23, 'SMS', 'پیامک', 'link', '456', 'آدرس صفحه وب', NULL, '1391-10-29 18:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `gl_slider_items`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gl_users`
--

INSERT INTO `gl_users` (`id`, `username`, `password`, `name`, `email`, `active`, `role_id`, `registered_date`, `last_logged_in`, `last_ip_logged_in`) VALUES
(1, 'admin', '9ee2c9367485427679bd7a0ec1c7f3263869b387', 'جمال طوسی', 'jamal4533@yahoo.com', 1, 2, '0000-00-00 00:00:00', '1391-10-30 08:51:24', '127.0.0.1'),
(2, 'hamid', 'ddd20c26354abe5caefbdce42621716d09dcbe3f', 'حمید ممدوحی', 'hamid.mamdoohi@gmail.com', 1, 3, '0000-00-00 00:00:00', '1391-10-25 17:03:33', '127.0.0.1'),
(3, 'razzaghi', '6017b1c16ab39a4f14f2a579fa9aa629936c78b6', 'محمد رزاقی', '1razzaghi@gmail.com', 1, 2, '0000-00-00 00:00:00', '1391-10-24 11:24:17', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `gl_weblink_categories`
--

CREATE TABLE IF NOT EXISTS `gl_weblink_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_weblinks`
--

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
-- Table structure for table `yg_complaints`
--

CREATE TABLE IF NOT EXISTS `yg_complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment_file_name` varchar(100) DEFAULT NULL,
  `comp_name` varchar(50) NOT NULL,
  `comp_family` varchar(50) NOT NULL,
  `comp_email` varchar(100) DEFAULT NULL,
  `comp_mobile` varchar(11) NOT NULL,
  `comp_address` varchar(255) DEFAULT NULL,
  `user_defence` text,
  `commit_vote` text,
  `created` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `status_desc` text NOT NULL,
  `code_rahgiri` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yg_complaints`
--

INSERT INTO `yg_complaints` (`id`, `user_id`, `subject`, `content`, `attachment_file_name`, `comp_name`, `comp_family`, `comp_email`, `comp_mobile`, `comp_address`, `user_defence`, `commit_vote`, `created`, `status`, `status_desc`, `code_rahgiri`) VALUES
(1, 2, '123', '21312', NULL, '123', '213', '', '21312333333', '', NULL, NULL, '1391-10-30 08:53:51', 0, 'a:1:{i:0;a:2:{s:6:"status";i:0;s:4:"date";s:19:"1391-10-30 08:53:51";}}', 'C-0853510001');

-- --------------------------------------------------------

--
-- Table structure for table `yg_degrees`
--

CREATE TABLE IF NOT EXISTS `yg_degrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yg_degrees`
--

INSERT INTO `yg_degrees` (`id`, `name`) VALUES
(2, 'درجه 1');

-- --------------------------------------------------------

--
-- Table structure for table `yg_docs`
--

CREATE TABLE IF NOT EXISTS `yg_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `user_information_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yg_docs`
--

INSERT INTO `yg_docs` (`id`, `option_id`, `user_information_id`, `value`, `description`) VALUES
(1, 8, 17, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `yg_messages`
--

CREATE TABLE IF NOT EXISTS `yg_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `created` char(20) DEFAULT NULL,
  `files` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yg_messages`
--

INSERT INTO `yg_messages` (`id`, `user_id`, `subject`, `message`, `created`, `files`) VALUES
(1, 3, 'sdfgdsfg', '<p>dsgdsfg</p>', '1391-10-24 09:34:30', NULL),
(2, 2, 'sdfg', '<p>sdfgsdfg</p>', '1391-10-24 09:34:44', NULL),
(3, 2, 'ghgh', '<p>ghghhg</p>', '1391-10-24 09:34:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yg_messages_users`
--

CREATE TABLE IF NOT EXISTS `yg_messages_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `read_date` char(20) DEFAULT NULL,
  `new` int(2) DEFAULT NULL,
  `folder` int(1) DEFAULT NULL,
  `is_sender` tinyint(4) NOT NULL COMMENT 'if this user iis sender set true',
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `yg_messages_users`
--

INSERT INTO `yg_messages_users` (`id`, `message_id`, `user_id`, `read_date`, `new`, `folder`, `is_sender`, `parent_id`, `lft`, `rght`) VALUES
(1, 1, 3, '1391-10-24 11:26:44', 0, 2, 1, 0, 1, 6),
(2, 1, 2, '1391-10-24 11:54:27', 0, 1, 0, 0, 7, 12),
(3, 2, 2, '1391-10-24 11:54:27', 0, 2, 1, 2, 8, 9),
(4, 2, 3, '1391-10-24 11:26:44', 0, 1, 0, 1, 2, 3),
(5, 3, 2, '1391-10-24 11:54:27', 0, 2, 1, 2, 10, 11),
(6, 3, 3, '1391-10-24 11:26:44', 0, 1, 0, 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `yg_options`
--

CREATE TABLE IF NOT EXISTS `yg_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL COMMENT 'نام جدولی که از این فیلد استفاده می کند در اینجا قرار میگیرد',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='این جدول شامل گزینه هایی است که در برنامه استفاده می شود' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `yg_options`
--

INSERT INTO `yg_options` (`id`, `name`, `section`) VALUES
(1, 'در حریم آرایشگاه زنانه', 'warden'),
(2, 'در حریم مسجد', 'warden'),
(3, 'در حریم مدرسه', 'warden'),
(4, 'در حریم باشگاه', 'warden'),
(5, 'در حریم فروشگاه', 'warden'),
(6, 'زیر زمین', 'warden'),
(7, 'طبقه فوقانی', 'warden'),
(8, 'تصویر تمام صفحات شناسنامه (2 سری)', 'docs'),
(9, 'تصویر کارت پایان خدمت پشت و رو (2 سری)', 'docs'),
(10, 'تصویر آخرین مدرک تحصیلی (2 برگ)', 'docs'),
(11, 'عکس 3 در 4 رنگی (20 قطعه)', 'docs'),
(12, 'کد پستی 10 رقمی محل کار و سکونت', 'docs'),
(13, 'تصویر اجاره خط یا سند مغازه بعد از بازدید و تائید اتحادیه (2 برگ)', 'docs'),
(14, 'کپی تجاری مغازه (2 سری)', 'docs');

-- --------------------------------------------------------

--
-- Table structure for table `yg_places`
--

CREATE TABLE IF NOT EXISTS `yg_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'name of place : for example shandiz',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yg_places`
--

INSERT INTO `yg_places` (`id`, `name`) VALUES
(1, 'مکان 1');

-- --------------------------------------------------------

--
-- Table structure for table `yg_rastes`
--

CREATE TABLE IF NOT EXISTS `yg_rastes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yg_rastes`
--

INSERT INTO `yg_rastes` (`id`, `name`) VALUES
(1, 'رسته 1');

-- --------------------------------------------------------

--
-- Table structure for table `yg_sms`
--

CREATE TABLE IF NOT EXISTS `yg_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` char(14) DEFAULT NULL,
  `to` char(14) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created` char(20) DEFAULT NULL,
  `identifier` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yg_states`
--

CREATE TABLE IF NOT EXISTS `yg_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=303 ;

--
-- Dumping data for table `yg_states`
--

INSERT INTO `yg_states` (`id`, `name`, `parent_id`) VALUES
(1, 'آذربایجان شرقی', 0),
(2, 'آذربایجان غربی', 0),
(3, 'اردبیل', 0),
(4, 'اصفهان', 0),
(5, 'البرز', 0),
(6, 'ایلام', 0),
(7, 'بوشهر', 0),
(8, 'تهران', 0),
(9, 'چهارمحال و بختیاری', 0),
(10, 'خراسان جنوبی', 0),
(11, 'خراسان رضوی', 0),
(12, 'خراسان شمالی', 0),
(13, 'خوزستان', 0),
(14, 'زنجان', 0),
(15, 'سمنان', 0),
(16, 'سیستان و بلوچستان', 0),
(17, 'فارس', 0),
(18, 'قزوین', 0),
(19, 'قم', 0),
(20, 'کردستان', 0),
(21, 'کرمان', 0),
(22, 'کرمانشاه', 0),
(23, 'کهگیلویه و بویراحمد', 0),
(24, 'گلستان', 0),
(25, 'گیلان', 0),
(26, 'لرستان', 0),
(27, 'مازندران', 0),
(28, 'مرکزی', 0),
(29, 'هرمزگان', 0),
(30, 'همدان', 0),
(31, 'یزد', 0),
(32, 'اهر', 1),
(33, 'تیریز', 1),
(34, 'جلفا', 1),
(35, 'سراب', 1),
(36, 'شبستر', 1),
(37, 'عجب شیر', 1),
(38, 'کلیبر', 1),
(39, 'مراغه', 1),
(40, 'مرند', 1),
(41, 'میانه', 1),
(42, 'هشترود', 1),
(43, 'ورزقان', 1),
(44, 'ارومیه', 2),
(45, 'اشنویه', 2),
(46, 'بوکان', 2),
(47, 'تکاب', 2),
(48, 'چالدران', 2),
(49, 'خوی', 2),
(50, 'سردشت', 2),
(51, 'ماکو', 2),
(52, 'مهاباد', 2),
(53, 'نقده', 2),
(58, 'کوثر', 3),
(57, 'شهر نمین', 3),
(56, 'سرعین', 3),
(55, 'پارس آباد', 3),
(54, 'اردبیل', 3),
(60, 'مشکین شهر', 3),
(59, 'گرمی', 3),
(61, 'اردستان ', 4),
(62, 'اصفهان', 4),
(63, 'آران وبیدگل', 4),
(64, 'تیران و کرون', 4),
(65, 'خوانسار', 4),
(66, 'سمیرم', 4),
(67, 'شاهین شهر', 4),
(68, 'شهررضا', 4),
(69, 'قمصر', 4),
(70, 'کاشان', 4),
(71, 'گلپایگان', 4),
(72, 'نایین', 4),
(73, 'نجف آباد', 4),
(74, 'نطنز', 4),
(75, 'نیاسر', 4),
(76, 'ساوجبلاغ', 5),
(77, 'طالقان', 5),
(78, 'کرج', 5),
(79, 'نظرآباد', 5),
(80, 'ایلام', 6),
(81, 'ایوان', 6),
(82, 'آبدانان', 6),
(83, 'دره شهر', 6),
(84, 'دهلران', 6),
(85, 'شیروان و چرداول', 6),
(86, 'اشتهارد', 5),
(87, 'برازجان', 7),
(88, 'بوشهر', 7),
(89, 'تنگستان ', 7),
(90, 'جم', 7),
(91, 'خورموج', 7),
(92, 'دشتی', 7),
(93, 'کنگان', 7),
(94, 'تهران', 8),
(95, 'دماوند', 8),
(96, 'ری', 8),
(97, 'شهریار', 8),
(98, 'فیروزکوه', 8),
(99, 'ورامین', 8),
(100, 'اردل', 9),
(101, 'بروجن', 9),
(102, 'چلگرد', 9),
(103, 'شهرکرد', 9),
(104, 'کوهرنگ', 9),
(105, 'لردگان', 9),
(106, 'بیرجند', 10),
(107, 'درمیان', 10),
(108, 'سرایان', 10),
(109, 'سربیشه', 10),
(110, 'فردوس', 10),
(111, 'قائنات', 10),
(112, 'نهبندان', 10),
(113, 'تربت جام', 11),
(114, 'تربت حیدریه', 11),
(115, 'خواف', 11),
(116, 'درگز', 11),
(117, 'سبزوار', 11),
(118, 'سرخس', 11),
(119, 'شیروان', 11),
(120, 'فردوس', 11),
(121, 'قوچان', 11),
(122, 'کاشمر', 11),
(123, 'گناباد', 11),
(124, 'مشهد', 11),
(125, 'نیشابور', 11),
(126, 'فارسان', 9),
(127, 'اسفراین', 12),
(128, 'آشخانه', 12),
(129, 'بجنورد', 12),
(130, 'پیش فلعه', 12),
(131, 'حصار گرم خان', 12),
(132, 'درق', 12),
(133, 'راز', 12),
(134, 'فاروج', 12),
(135, 'قاضی', 12),
(136, 'گرمه', 12),
(137, 'لوجلی', 12),
(138, 'اندیمشک', 13),
(139, 'اهواز', 13),
(140, 'ایذه', 13),
(141, 'آبادان', 13),
(142, 'بهبهان', 13),
(143, 'خرمشهر', 13),
(144, 'دزفول', 13),
(145, 'دشت آزادگان', 13),
(146, 'رامهرمز', 13),
(147, 'شادگان', 13),
(148, 'شوش', 13),
(149, 'شوشتر', 13),
(150, 'ماهشهر', 13),
(151, 'مسجدسلیمان', 13),
(152, 'ابهر', 14),
(153, 'خدابنده', 14),
(154, 'زنجان', 14),
(155, 'ماهنشان', 14),
(156, 'دامغان', 15),
(157, 'سمنان', 15),
(158, 'شاهرود', 15),
(159, 'گرمسار', 15),
(160, 'ایرانشهر', 16),
(161, 'چابهار', 16),
(162, 'خاش', 16),
(163, 'زابل', 16),
(164, 'زاهدان', 16),
(165, 'سروان', 16),
(166, 'نیکشهر', 16),
(167, 'جهرم', 17),
(168, 'سپیدان', 17),
(169, 'شیراز', 17),
(170, 'فیروزآباد', 17),
(171, 'کازرون', 17),
(172, 'مرودشت', 17),
(173, 'قزوین', 18),
(174, 'تاکستان', 18),
(175, 'بوئین زهرا', 18),
(176, 'جعفریه', 19),
(177, 'دستجرد', 19),
(178, 'قم', 19),
(179, 'کهک', 19),
(180, 'بانه', 20),
(181, 'بیجار', 20),
(182, 'دیواندره', 20),
(183, 'سقز', 20),
(184, 'سنندج', 20),
(185, 'قروه', 20),
(186, 'کامیاران', 20),
(187, 'مریوان', 20),
(188, 'بافت', 21),
(189, 'بم', 21),
(190, 'راین', 21),
(191, 'رفسنجان', 21),
(192, 'شهربابک', 21),
(193, 'کرمان', 21),
(194, 'ماهان', 21),
(195, 'اسلام آباد غرب', 22),
(196, 'پاوه', 22),
(197, 'دالاهو', 22),
(198, 'سرپل ذهاب', 22),
(199, 'صحنه', 22),
(200, 'قصر شیرین', 22),
(201, 'کرمانشاه', 22),
(202, 'کنگاور', 22),
(203, 'گیلان غرب', 22),
(204, 'هرسین', 22),
(205, 'باشت', 23),
(206, 'چرام', 23),
(207, 'دوگنبدان', 23),
(208, 'دهدشت', 23),
(209, 'دیموشک', 23),
(210, 'سی سخت', 23),
(211, 'قلعه رئیسی', 23),
(212, 'گچساران', 23),
(213, 'گراب سفلی', 23),
(214, 'لنده', 23),
(215, 'لیکک', 23),
(216, 'یاسوج', 23),
(217, 'آزادشهر', 24),
(218, 'بندر ترکمن', 24),
(219, 'بندر گز', 24),
(220, 'رامیان', 24),
(221, 'علی آباد', 24),
(222, 'کردکوی', 24),
(223, 'گرگان', 24),
(224, 'گنبدکاووس', 24),
(225, 'مینودشت', 24),
(226, 'نوکده', 24),
(227, 'آستارا', 25),
(228, 'آستانه اشرفیه', 25),
(229, 'بندر انزلی', 25),
(230, 'تالش', 25),
(231, 'رشت', 25),
(232, 'رودبار', 25),
(233, 'رودسر', 25),
(234, 'سیاهکل', 25),
(235, 'فومن', 25),
(236, 'لاهیجان', 25),
(237, 'لنگرود', 25),
(238, 'ماسوله', 25),
(239, 'منجیل', 25),
(240, 'ازنا', 26),
(241, 'الیگودرز', 26),
(242, 'بروجرد', 26),
(243, 'پل دختر', 26),
(244, 'خرم آباد', 26),
(245, 'دلفان', 26),
(246, 'دورود', 26),
(247, 'سلسله', 26),
(248, 'کوهدشت', 26),
(249, 'آمل ', 27),
(250, 'بابل ', 27),
(251, 'بابلسرد', 27),
(252, 'بهشهر', 27),
(253, 'تنکابن ', 27),
(254, 'جویبار', 27),
(255, 'چالوس', 27),
(256, 'رامسر', 27),
(257, 'ساری', 27),
(258, 'سوادکوه', 27),
(259, 'قائم شهر', 27),
(260, 'محمود آباد', 27),
(261, 'نکا', 27),
(262, 'نور', 27),
(263, 'نور ', 27),
(264, 'نوشهر', 27),
(265, 'اراک', 28),
(266, 'آشتیان', 28),
(267, 'خمین', 28),
(268, 'دلیجان', 28),
(269, 'ساوه', 28),
(270, 'شازند', 28),
(271, 'کمیجان', 28),
(272, 'محلات', 28),
(273, 'بستک', 29),
(274, 'بندر کنگ', 29),
(275, 'بندر لنگه', 29),
(276, 'بندر عباس', 29),
(277, 'جزیره قشم', 29),
(278, 'جزیره کیش', 29),
(279, 'جزیره هرمز', 29),
(280, 'رودان', 29),
(281, 'میناب', 29),
(282, 'اسد آباد', 30),
(283, 'بهار', 30),
(284, 'تویسرکان', 30),
(285, 'رزن', 30),
(286, 'کبودر آهنگ', 30),
(287, 'ملایر', 30),
(288, 'نهاوند', 30),
(289, 'همدان', 30),
(290, 'ابرکوه', 31),
(291, 'اردکان', 31),
(292, 'اشکذر', 31),
(293, 'بافق', 31),
(294, 'تفت', 31),
(295, 'زارچ', 31),
(296, 'صدوق', 31),
(297, 'طبس', 31),
(298, 'مهریز', 31),
(299, 'میبد', 31),
(300, 'یزد', 31),
(301, 'استهبان', 17),
(302, 'سلماس', 2);

-- --------------------------------------------------------

--
-- Table structure for table `yg_user_informations`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `yg_user_informations`
--

INSERT INTO `yg_user_informations` (`id`, `user_id`, `first_name`, `last_name`, `place_id`, `raste_id`, `degree_id`, `father_name`, `gender`, `code_melli`, `shenasnameh_number`, `mahale_sodoor`, `birth_day`, `din`, `mazhab`, `vazifeh_omoomi`, `madrak_tahsili`, `taahol`, `sarparast`, `afrad_tahte_takafol`, `isargari`, `gov_employment`, `reg_other_union`, `parvaneh_other_union`, `latest_employment`, `history_duration`, `postal_code`, `telephone`, `home_address`, `mobile`, `market_name`, `market_sign`, `market_address`, `market_telephone`, `market_fax`, `market_postal_code`, `mantagheh_shahrdari`, `nahiye_shahrdari`, `hozeh_kalantari`, `vazeyat_joghrafiaee`, `mahale_esteghrar`, `vazeyat_malekiat`, `market_masahat`, `code_rahgiri`, `status`, `status_desc`, `created`) VALUES
(17, 2, 'حمید', 'ممدوحی', 1, 1, 2, 'احمد', 1, '0946217742', '21572', '124', '1367-04-26', 'اسلام', 'شیعه', 3, 7, 1, 2, NULL, 0, '', '', NULL, '', NULL, '1232131231', '05116580907', 'بلوار توس - توس 65/6 - کوچه گلستان - پلاک 37', '09159922885', 'سیاحت شرق', '', 'ابوذر غفاری 13 - پلاک 98', '05118467980', '05118464994', '1231231231', 0, NULL, '', 1, 1, 2, 89, '2227310017', 1, 'a:5:{i:0;a:3:{s:6:"status";s:2:"-1";s:4:"date";s:19:"1391-10-28 10:20:47";s:4:"desc";s:5:"gfgjh";}i:1;a:3:{s:6:"status";s:2:"-1";s:4:"date";s:19:"1391-10-28 10:21:29";s:4:"desc";s:17:"asfdsadf cxv xcvb";}i:2;a:3:{s:6:"status";s:2:"-3";s:4:"date";s:19:"1391-10-28 10:27:17";s:4:"desc";s:9:"3215456\r\n";}i:3;a:3:{s:6:"status";s:1:"3";s:4:"date";s:19:"1391-10-28 10:27:35";s:4:"desc";N;}i:4;a:3:{s:6:"status";s:1:"1";s:4:"date";s:19:"1391-10-30 09:00:37";s:4:"desc";N;}}', '1391-10-13 22:27:31'),
(21, 0, 'gh', 'hg', 1, 1, 0, 'gh', 1, '0945981961', '123', '32', '1300-01-01', 'gh', 'gh', 1, 1, 1, 1, NULL, 0, '', '', '', '', NULL, '1324646546', '456666666666', 'fd', '54666666666', '456', '', '46555555555555555555555', '465555555555', '654444444444', '5644444444', 127, NULL, '', 1, 1, 1, 45, '0849030021', -1, NULL, '1391-10-30 08:49:03'),
(22, 0, '123', '123', 1, 1, 0, '123', 1, '0945981961', '213', '32', '1300-01-01', '12', '213', 1, 1, 1, 1, NULL, 0, '', '', '', '', NULL, '1213222223', '123333333333', '213', '12333333333', '123', '', '21111', '123333333333', '213333333333', '1233333333', 127, NULL, '', 1, 1, 1, 127, '0850490022', -1, NULL, '1391-10-30 08:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `yg_wardens`
--

CREATE TABLE IF NOT EXISTS `yg_wardens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `user_information_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yg_wardens`
--

INSERT INTO `yg_wardens` (`id`, `option_id`, `user_information_id`, `value`, `description`) VALUES
(1, 1, 17, -1, 'gfgfgf'),
(2, 2, 17, -1, ''),
(3, 3, 17, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;