-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 07:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 49),
(2, 50),
(2, 52),
(2, 53),
(2, 54),
(2, 56),
(2, 59),
(2, 99),
(2, 102);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'mine@gmail.com', 1, '2022-10-08 21:50:07', 0),
(2, '::1', 'mine@gmail.com', 1, '2022-10-08 21:50:31', 1),
(3, '::1', 'mine@gmail.com', 1, '2022-10-08 23:13:13', 1),
(4, '::1', 'elscine@gmail.com', 2, '2022-10-08 23:16:59', 1),
(5, '::1', 'elscine', NULL, '2022-10-09 03:37:23', 0),
(6, '::1', 'elmine', NULL, '2022-10-09 03:37:34', 0),
(7, '::1', 'elscine@gmail.com', 2, '2022-10-09 03:37:41', 1),
(8, '::1', 'elscine@gmail.com', NULL, '2022-10-09 03:37:55', 0),
(9, '::1', 'elscine@gmail.com', 2, '2022-10-09 03:38:00', 1),
(10, '::1', 'mine@gmail.com', 1, '2022-10-09 03:38:13', 1),
(11, '::1', 'mine@gmail.com', NULL, '2022-10-09 03:38:22', 0),
(12, '::1', 'mine@gmail.com', 1, '2022-10-09 03:38:28', 1),
(13, '::1', 'mine@gmail.com', 1, '2022-10-09 03:42:30', 1),
(14, '::1', 'elscine@gmail.com', 2, '2022-10-09 03:44:24', 1),
(15, '::1', 'mine', NULL, '2022-10-09 03:44:58', 0),
(16, '::1', 'mine@gmail.com', 1, '2022-10-09 03:45:04', 1),
(17, '::1', 'mine@gmail.com', 1, '2022-10-09 04:09:06', 1),
(18, '::1', 'elsicne', NULL, '2022-10-09 04:13:00', 0),
(19, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:13:05', 1),
(20, '::1', 'elscine', NULL, '2022-10-09 04:13:20', 0),
(21, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:13:27', 1),
(22, '::1', 'mine@gmail.com', 1, '2022-10-09 04:13:36', 1),
(23, '::1', 'mine@gmail.com', 1, '2022-10-09 04:13:43', 1),
(24, '::1', 'elscine@gmail.com', NULL, '2022-10-09 04:13:49', 0),
(25, '::1', 'neakles@outlook.com', NULL, '2022-10-09 04:13:54', 0),
(26, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:15:52', 1),
(27, '::1', 'neakles@gmail.com', 3, '2022-10-09 04:30:14', 1),
(28, '::1', 'nekles', NULL, '2022-10-09 04:30:25', 0),
(29, '::1', 'mine@gmail.com', 1, '2022-10-09 04:30:31', 1),
(30, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:30:43', 1),
(31, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:36:33', 1),
(32, '::1', 'mine@gmail.com', 1, '2022-10-09 04:36:50', 1),
(33, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:40:52', 1),
(34, '::1', 'mine@gmail.com', 1, '2022-10-09 04:41:01', 1),
(35, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:45:59', 1),
(36, '::1', 'mine@gmail.com', 1, '2022-10-09 04:46:19', 1),
(37, '::1', 'elscine@gmail.com', 2, '2022-10-09 04:50:57', 1),
(38, '::1', 'mine@gmail.com', 1, '2022-10-09 05:11:38', 1),
(39, '::1', 'elscine@gmail.com', 2, '2022-10-09 05:11:46', 1),
(40, '::1', 'mine@gmail.com', 1, '2022-10-09 05:24:40', 1),
(41, '::1', 'elscine@gmail.com', 2, '2022-10-09 05:25:57', 1),
(42, '::1', 'elscine@gmail.com', 2, '2022-10-09 05:26:17', 1),
(43, '::1', 'elscine@gmail.com', 2, '2022-10-17 20:20:04', 1),
(44, '::1', 'mine@gmail.com', 1, '2022-10-17 20:21:40', 1),
(45, '::1', 'elscine@gmail.com', 2, '2022-10-17 20:38:37', 1),
(46, '::1', 'elscine@gmail.com', 2, '2022-10-17 20:38:56', 1),
(47, '::1', 'mine@gmail.com', 1, '2022-10-17 20:39:46', 1),
(48, '::1', 'elscine@gmail.com', 2, '2022-10-17 20:40:18', 1),
(49, '::1', 'elscine@gmail.com', 2, '2022-11-02 09:30:06', 1),
(50, '::1', 'mine@gmail.com', 1, '2022-11-03 21:11:15', 1),
(51, '::1', 'elscine@gmail.com', 2, '2022-11-06 02:12:50', 1),
(52, '::1', 'elscine@gmail.com', 2, '2022-11-06 02:13:01', 1),
(53, '::1', 'mine@gmail.com', 1, '2022-11-06 02:13:09', 1),
(54, '::1', 'mine@gmail.com', 1, '2022-11-06 02:14:17', 1),
(55, '::1', 'elscine@gmail.com', 2, '2022-11-06 02:15:45', 1),
(56, '::1', 'elscine@gmail.com', 2, '2022-11-06 02:36:29', 1),
(57, '::1', 'mine@gmail.com', 1, '2022-11-06 02:36:38', 1),
(58, '::1', 'mine@gmail.com', 1, '2022-11-06 03:14:32', 1),
(59, '::1', 'elscine@gmail.com', 2, '2022-11-06 03:14:48', 1),
(60, '::1', 'mine@gmail.com', 1, '2022-11-06 03:15:42', 1),
(61, '::1', 'elscine@gmail.com', 2, '2022-11-06 03:29:54', 1),
(62, '::1', 'mine@gmail.com', 1, '2022-11-06 03:38:54', 1),
(63, '::1', 'mine@gmail.com', 1, '2022-11-06 03:39:06', 1),
(64, '::1', 'elscine@gmail.com', 2, '2022-11-06 03:39:19', 1),
(65, '::1', 'elscine@gmail.com', 2, '2022-11-06 03:41:54', 1),
(66, '::1', 'elscine@gmail.com', 2, '2022-11-06 04:24:40', 1),
(67, '::1', 'elscine@gmail.com', 2, '2022-11-06 04:25:05', 1),
(68, '::1', 'elscine@gmail.com', 2, '2022-11-06 04:25:48', 1),
(69, '::1', 'mine@gmail.com', 1, '2022-11-06 04:26:27', 1),
(70, '::1', 'elscine@gmail.com', 2, '2022-11-06 07:43:48', 1),
(71, '::1', 'elscine@gmail.com', 2, '2022-11-06 07:44:44', 1),
(72, '::1', 'elscine@gmail.com', 2, '2022-11-06 07:48:43', 1),
(73, '::1', 'mine@gmail.com', 1, '2022-11-06 07:58:56', 1),
(74, '::1', 'elscine@gmail.com', 2, '2022-11-06 07:59:07', 1),
(75, '::1', 'mine@gmail.com', 1, '2022-11-06 07:59:22', 1),
(76, '::1', 'elscine@gmail.com', 2, '2022-11-06 08:00:51', 1),
(77, '::1', 'mine@gmail.com', 1, '2022-11-06 08:08:39', 1),
(78, '::1', 'elscine', NULL, '2022-11-06 08:10:09', 0),
(79, '::1', 'elscine@gmail.com', 2, '2022-11-06 08:10:14', 1),
(80, '::1', 'elscine@gmail.com', 2, '2022-11-06 08:29:01', 1),
(81, '::1', 'elscine@gmail.com', 2, '2022-11-06 09:22:01', 1),
(82, '::1', 'elscine@gmail.com', 2, '2022-11-06 23:32:33', 1),
(83, '::1', 'elscine@gmail.com', 2, '2022-11-07 02:43:47', 1),
(84, '::1', 'elscine@gmail.com', 2, '2022-11-07 03:10:19', 1),
(85, '::1', 'elscine@gmail.com', 2, '2022-11-07 03:41:26', 1),
(86, '::1', 'elscine@gmail.com', 2, '2022-11-07 09:28:02', 1),
(87, '::1', 'elscine@gmail.com', 2, '2022-11-07 22:59:04', 1),
(88, '::1', 'elscine@gmail.com', 2, '2022-11-08 00:08:16', 1),
(89, '::1', 'mine@gmail.com', 1, '2022-11-08 00:08:26', 1),
(90, '::1', 'elscine@gmail.com', 2, '2022-11-08 00:09:03', 1),
(91, '::1', 'mine@gmail.com', 1, '2022-11-08 00:10:43', 1),
(92, '::1', 'mine@gmail.com', 1, '2022-11-08 00:29:47', 1),
(93, '::1', 'elscine@gmail.com', 2, '2022-11-08 00:30:00', 1),
(94, '::1', 'mine@gmail.com', 1, '2022-11-08 03:57:12', 1),
(95, '::1', 'elscine@gmail.com', 2, '2022-11-08 04:14:43', 1),
(96, '::1', 'mine@gmail.com', 1, '2022-11-08 04:15:00', 1),
(97, '::1', 'elscine@gmail.com', 2, '2022-11-08 04:16:56', 1),
(98, '::1', 'mine@gmail.com', 1, '2022-11-08 04:17:31', 1),
(99, '::1', 'elscine@gmail.com', 2, '2022-11-08 07:09:42', 1),
(100, '::1', 'elscine@gmail.com', 2, '2022-11-08 07:09:43', 1),
(101, '::1', 'elscine@gmail.com', 2, '2022-11-08 12:51:17', 1),
(102, '::1', 'mine@gmail.com', 1, '2022-11-08 13:09:08', 1),
(103, '::1', 'elscine@gmail.com', 2, '2022-11-08 13:17:14', 1),
(104, '::1', 'elscine@gmail.com', 2, '2022-11-08 20:19:11', 1),
(105, '::1', 'elscine@gmail.com', 2, '2022-11-09 00:33:51', 1),
(106, '::1', 'tric201@gmail.com', 6, '2022-11-09 00:57:26', 1),
(107, '::1', 'elscine@gmail.com', 2, '2022-11-09 00:57:43', 1),
(108, '::1', 'elscine@gmail.com', 2, '2022-11-10 23:34:18', 1),
(109, '::1', 'elscine@gmail.com', NULL, '2022-11-11 05:11:44', 0),
(110, '::1', 'elscine@gmail.com', 2, '2022-11-11 05:11:50', 1),
(111, '::1', 'asd@gmail.com', 7, '2022-11-12 01:41:54', 1),
(112, '::1', 'elscine@gmail.com', 2, '2022-11-12 01:42:02', 1),
(113, '::1', 'elscine@gmail.com', NULL, '2022-11-13 11:34:32', 0),
(114, '::1', 'elscine@gmail.com', 2, '2022-11-13 11:34:38', 1),
(115, '::1', 'elscine@gmail.com', 2, '2022-11-13 23:20:20', 1),
(116, '::1', 'elscine@gmail.com', 2, '2022-11-14 01:26:18', 1),
(117, '::1', 'elscine@gmail.com', 2, '2022-11-14 05:27:05', 1),
(118, '::1', 'asd@gmail.com', NULL, '2022-11-14 05:32:35', 0),
(119, '::1', 'mine@gmail.com', 1, '2022-11-14 05:32:41', 1),
(120, '::1', 'elscine@gmail.com', 2, '2022-11-14 05:33:51', 1),
(121, '::1', 'elscine@gmail.com', 2, '2022-11-14 08:42:26', 1),
(122, '::1', 'elscine@gmail.com', 2, '2022-11-15 16:44:43', 1),
(123, '::1', 'elscine@gmail.com', 2, '2022-11-15 19:13:39', 1),
(124, '::1', 'elscine@gmail.com', 2, '2022-11-15 20:42:42', 1),
(125, '::1', 'elscine@gmail.com', 2, '2022-11-15 23:19:50', 1),
(126, '::1', 'elscine@gmail.com', 2, '2022-11-16 00:44:42', 1),
(127, '::1', 'elscine@gmail.com', 2, '2022-11-16 00:45:04', 1),
(128, '::1', 'elscine@gmail.com', 2, '2022-11-16 04:02:09', 1),
(129, '::1', 'elscine@gmail.com', 2, '2022-11-16 23:58:09', 1),
(130, '::1', 'elscine@gmail.com', NULL, '2022-11-17 04:08:27', 0),
(131, '::1', 'elscine@gmail.com', 2, '2022-11-17 04:08:33', 1),
(132, '::1', 'elscine@gmail.com', 2, '2022-11-17 23:54:01', 1),
(133, '::1', 'elscine@gmail.com', 2, '2022-11-18 05:06:18', 1),
(134, '::1', 'elscine@gmail.com', 2, '2022-11-19 10:08:25', 1),
(135, '::1', 'tric201@gmail.com', 6, '2022-11-20 11:21:47', 1),
(136, '::1', 'elscine@gmail.com', 2, '2022-11-20 11:22:17', 1),
(137, '::1', 'elscine@gmail.com', 2, '2022-11-20 17:43:02', 1),
(138, '::1', 'elscine@gmail.com', 2, '2022-11-20 18:25:41', 1),
(139, '::1', 'elscine@gmail.com', 2, '2022-11-20 18:26:05', 1),
(140, '::1', 'elscine@gmail.com', 2, '2022-11-20 18:27:10', 1),
(141, '::1', 'elscine@gmail.com', 2, '2022-11-20 18:27:41', 1),
(142, '::1', 'elscine@gmail.com', 2, '2022-11-21 07:39:47', 1),
(143, '::1', 'elscine@gmail.com', 2, '2022-11-21 09:36:36', 1),
(144, '::1', 'elscine@gmail.com', 2, '2022-11-21 10:43:37', 1),
(145, '::1', 'elscine@gmail.com', 2, '2022-11-21 16:39:23', 1),
(146, '::1', 'elscine@gmail.com', 2, '2022-11-21 22:07:59', 1),
(147, '::1', 'elscine@gmail.com', 2, '2022-11-22 03:10:46', 1),
(148, '::1', 'elscine@gmail.com', 2, '2022-11-22 08:56:51', 1),
(149, '::1', 'elscine@gmail.com', 2, '2022-11-22 12:11:15', 1),
(150, '::1', 'elscine@gmail.com', NULL, '2022-11-23 03:21:14', 0),
(151, '::1', 'elscine@gmail.com', NULL, '2022-11-23 03:21:19', 0),
(152, '::1', 'elscine@gmail.com', 2, '2022-11-23 03:21:27', 1),
(153, '::1', 'elscine@gmail.com', 2, '2022-11-23 06:38:25', 1),
(154, '::1', 'tric201@gmail.com', 6, '2022-11-23 10:14:16', 1),
(155, '::1', 'elscine@gmail.com', 2, '2022-11-23 10:14:44', 1),
(156, '::1', 'elscine@gmail.com', NULL, '2022-11-23 12:41:54', 0),
(157, '::1', 'elscine@gmail.com', 2, '2022-11-23 12:42:00', 1),
(158, '::1', 'elscine@gmail.com', 2, '2022-11-24 16:08:04', 1),
(159, '::1', 'elscine@gmail.com', 2, '2022-11-28 07:31:08', 1),
(160, '::1', 'elscine@gmail.com', 2, '2022-11-28 13:54:44', 1),
(161, '::1', 'elscine@gmail.com', 2, '2022-11-29 01:26:12', 1),
(162, '::1', 'elscine@gmail.com', 2, '2022-11-29 13:58:12', 1),
(163, '::1', 'elscine@gmail.com', 2, '2022-11-29 14:00:10', 1),
(164, '::1', 'tric201@gmail.com', 6, '2022-11-29 14:12:32', 1),
(165, '::1', 'elscine@gmail.com', 2, '2022-11-29 14:32:16', 1),
(166, '::1', 'elscine@gmail.com', 2, '2022-11-29 21:17:02', 1),
(167, '::1', 'elscine@gmail.com', 2, '2022-11-30 11:42:14', 1),
(168, '::1', 'elscine@gmail.com', 2, '2022-11-30 15:54:10', 1),
(169, '::1', 'elscine@gmail.com', 2, '2022-11-30 18:59:13', 1),
(170, '::1', 'elscine@gmail.com', 2, '2022-12-01 02:38:43', 1),
(171, '::1', 'elscine@gmail.com', 2, '2022-12-01 07:00:48', 1),
(172, '::1', 'elscine@gmail.com', NULL, '2022-12-01 16:12:04', 0),
(173, '::1', 'elscine@gmail.com', NULL, '2022-12-01 16:12:04', 0),
(174, '::1', 'elscine@gmail.com', 2, '2022-12-01 16:12:10', 1),
(175, '::1', 'elscine@gmail.com', 2, '2022-12-01 20:54:36', 1),
(176, '::1', 'elscine@gmail.com', NULL, '2022-12-02 17:06:59', 0),
(177, '::1', 'elscine@gmail.com', 2, '2022-12-02 17:07:05', 1),
(178, '::1', 'elscine@gmail.com', 2, '2022-12-02 23:51:33', 1),
(179, '::1', 'elscine@gmail.com', 2, '2022-12-03 11:24:00', 1),
(180, '::1', 'elscine@gmail.com', 2, '2022-12-03 20:18:35', 1),
(181, '::1', 'elscine@gmail.com', 2, '2022-12-03 21:45:24', 1),
(182, '::1', 'asd@gmail.com', 52, '2022-12-03 21:54:29', 0),
(183, '::1', 'cahyo', 50, '2022-12-03 21:55:08', 0),
(184, '::1', 'elscine@gmail.com', 2, '2022-12-03 21:55:25', 1),
(185, '::1', 'trica', NULL, '2022-12-03 21:57:15', 0),
(186, '::1', 'am_tricahyo', 49, '2022-12-03 21:57:47', 0),
(187, '::1', 'elscine@gmail.com', 2, '2022-12-03 22:02:21', 1),
(188, '::1', 'qwerty', 53, '2022-12-04 00:57:41', 0),
(189, '::1', 'tric201@gmail.com', 49, '2022-12-04 01:04:52', 1),
(190, '::1', 'elscine@gmail.com', 2, '2022-12-04 15:35:04', 1),
(191, '::1', 'elscine@gmail.com', 2, '2022-12-04 16:23:28', 1),
(192, '::1', 'cahyo', 50, '2022-12-04 16:24:02', 0),
(193, '::1', 'cahyo@gmail.com', 50, '2022-12-04 16:25:47', 1),
(194, '::1', 'elscine@gmail.com', NULL, '2022-12-04 18:24:10', 0),
(195, '::1', 'elscine@gmail.com', 2, '2022-12-04 18:24:16', 1),
(196, '::1', 'elscine@gmail.com', 2, '2022-12-04 18:26:39', 1),
(197, '::1', 'elscine@gmail.com', 2, '2022-12-05 10:53:42', 1),
(198, '::1', 'elscine@gmail.com', 2, '2022-12-05 17:38:08', 1),
(199, '::1', 'elscine@gmail.com', 2, '2022-12-05 19:36:43', 1),
(200, '::1', 'tric201@gmail.com', 49, '2022-12-05 19:36:57', 1),
(201, '::1', 'tric201@gmail.com', 49, '2022-12-05 19:37:41', 1),
(202, '::1', 'elscine@gmail.com', 2, '2022-12-05 19:37:52', 1),
(203, '::1', 'mine@gmail.com', NULL, '2022-12-05 19:38:13', 0),
(204, '::1', 'asd@gmail.com', 52, '2022-12-05 19:38:22', 1),
(205, '::1', 'elscine@gmail.com', 2, '2022-12-05 19:46:23', 1),
(206, '::1', 'elscine@gmail.com', 2, '2022-12-05 19:53:58', 1),
(207, '::1', 'mine@gmail.com', NULL, '2022-12-05 20:13:53', 0),
(208, '::1', 'tric201@gmail.com', 49, '2022-12-05 20:13:58', 1),
(209, '::1', 'saya', NULL, '2022-12-05 23:08:30', 0),
(210, '::1', 'saya', NULL, '2022-12-05 23:08:46', 0),
(211, '::1', 'saya', NULL, '2022-12-05 23:08:55', 0),
(212, '::1', 'mine@gmail.com', NULL, '2022-12-05 23:11:00', 0),
(213, '::1', 'asd@gmail.com', 52, '2022-12-05 23:11:06', 1),
(214, '::1', 'saya', NULL, '2022-12-05 23:18:15', 0),
(215, '::1', 'saya', NULL, '2022-12-05 23:20:58', 0),
(216, '::1', 'saya', NULL, '2022-12-05 23:21:49', 0),
(217, '::1', 'new', NULL, '2022-12-05 23:23:13', 0),
(218, '::1', 'new', NULL, '2022-12-05 23:23:52', 0),
(219, '::1', 'new', 85, '2022-12-05 23:26:29', 0),
(220, '::1', 'new', 85, '2022-12-05 23:27:29', 0),
(221, '::1', 'new', 85, '2022-12-05 23:27:35', 0),
(222, '::1', 'new@ndew', 85, '2022-12-05 23:27:54', 1),
(223, '::1', 'elscine@gmail.com', 2, '2022-12-06 05:24:16', 1),
(224, '::1', 'elscine@gmail.com', 2, '2022-12-06 05:32:16', 1),
(225, '::1', 'cahyo@gmail.com', 50, '2022-12-06 05:32:43', 1),
(226, '::1', 'elscine@gmail.com', 2, '2022-12-06 05:40:40', 1),
(227, '::1', 'asd@gmail.com', 52, '2022-12-06 06:42:55', 1),
(228, '::1', 'elscine@gmail.com', 2, '2022-12-06 06:43:59', 1),
(229, '::1', 'elscine@gmail.com', 2, '2022-12-06 08:59:17', 1),
(230, '::1', 'elscine@gmail.com', 2, '2022-12-06 12:16:07', 1),
(231, '::1', 'elscine@gmail.com', 2, '2022-12-06 22:19:39', 1),
(232, '::1', 'elscine@gmail.com', 2, '2022-12-07 22:03:42', 1),
(233, '::1', 'elscine@gmail.com', 2, '2022-12-08 18:51:55', 1),
(234, '::1', 'elscine@gmail.com', 2, '2022-12-08 19:01:07', 1),
(235, '::1', 'elscine@gmail.com', 2, '2022-12-08 19:09:26', 1),
(236, '127.0.0.1', 'elscine@gmail.com', 2, '2022-12-10 10:48:35', 1),
(237, '::1', 'elscine@gmail.com', 2, '2022-12-10 19:01:52', 1),
(238, '::1', 'elscine@gmail.com', 2, '2022-12-10 19:05:27', 1),
(239, '127.0.0.1', 'elscine@gmail.com', 2, '2022-12-11 13:00:05', 1),
(240, '127.0.0.1', 'elscine@gmail.com', 2, '2022-12-11 13:01:38', 1),
(241, '::1', 'elscine@gmail.com', 2, '2022-12-11 13:46:23', 1),
(242, '::1', 'elscine@gmail.com', 2, '2022-12-12 08:38:51', 1),
(243, '::1', 'elscine@gmail.com', 2, '2022-12-12 16:39:43', 1),
(244, '::1', 'asd@gmail.com', 52, '2022-12-12 16:47:32', 1),
(245, '::1', 'elscine@gmail.com', 2, '2022-12-12 18:17:05', 1),
(246, '::1', 'munir@gmail.com', 52, '2022-12-12 19:06:17', 1),
(247, '::1', 'elscine@gmail.com', NULL, '2022-12-12 19:31:22', 0),
(248, '::1', 'elscine', NULL, '2022-12-12 19:31:31', 0),
(249, '::1', 'admin@gmail.com', 2, '2022-12-12 19:31:40', 1),
(250, '::1', 'cahyo', NULL, '2022-12-12 19:59:21', 0),
(251, '::1', 'cahyo', NULL, '2022-12-12 19:59:28', 0),
(252, '::1', 'cahyo@gmail.com', 49, '2022-12-12 19:59:36', 1),
(253, '::1', 'admin@gmail.com', 2, '2022-12-12 20:12:51', 1),
(254, '::1', 'cahyo@gmail.com', 49, '2022-12-12 20:36:41', 1),
(255, '::1', 'cahyo@gmail.com', 49, '2022-12-13 04:58:51', 1),
(256, '::1', 'munir@gmail.com', 52, '2022-12-13 05:00:11', 1),
(257, '::1', 'cahyo@gmail.com', 49, '2022-12-13 05:05:03', 1),
(258, '::1', 'admin@gmail.com', 2, '2022-12-13 05:33:31', 1),
(259, '::1', 'cahyo@gmail.com', 49, '2022-12-13 05:57:07', 1),
(260, '::1', 'admin@gmail.com', 2, '2022-12-13 09:08:42', 1),
(261, '::1', 'admin@gmail.com', 2, '2022-12-13 20:12:13', 1),
(262, '::1', 'cahyo@gmail.com', 49, '2022-12-13 20:17:03', 1),
(263, '::1', 'admin@gmail.com', 2, '2022-12-13 20:18:00', 1),
(264, '::1', 'admin@gmail.com', 2, '2022-12-13 22:01:12', 1),
(265, '::1', 'cahyo@gmail.com', 49, '2022-12-13 23:01:19', 1),
(266, '::1', 'alfian@gmail.com', 54, '2022-12-13 23:09:59', 1),
(267, '::1', 'admin@gmail.com', 2, '2022-12-13 23:10:49', 1),
(268, '::1', 'elscine@gmail.com', NULL, '2022-12-14 00:20:16', 0),
(269, '::1', 'admin@gmail.com', 2, '2022-12-14 00:20:23', 1),
(270, '::1', 'cahyo@gmail.com', 49, '2022-12-14 00:21:05', 1),
(271, '::1', 'admin', NULL, '2022-12-14 00:22:01', 0),
(272, '::1', 'admin@gmail.com', 2, '2022-12-14 00:22:11', 1),
(273, '::1', 'cahyo@gmail.com', 49, '2022-12-14 00:25:41', 1),
(274, '::1', 'admin@gmail.com', 2, '2022-12-14 08:55:09', 1),
(275, '::1', 'cahyo@gmail.com', 49, '2022-12-14 09:20:29', 1),
(276, '::1', 'elscine@gmail.com', NULL, '2022-12-17 09:12:46', 0),
(277, '::1', 'admin@gmail.com', 2, '2022-12-17 09:12:56', 1),
(278, '::1', 'admin@gmail.com', 2, '2022-12-20 02:20:04', 1),
(279, '::1', 'admin', NULL, '2022-12-20 08:23:07', 0),
(280, '::1', 'admin@gmail.com', 2, '2022-12-20 08:23:12', 1),
(281, '::1', 'admin@gmail.com', 2, '2022-12-21 18:40:22', 1),
(282, '::1', 'cahyo@gmail.com', 49, '2022-12-21 18:50:49', 1),
(283, '::1', 'admin@gmail.com', 2, '2022-12-22 10:32:12', 1),
(284, '::1', 'admin@gmail.com', 2, '2022-12-22 14:25:45', 1),
(285, '::1', 'cahyo@gmail.com', 49, '2022-12-22 15:26:17', 1),
(286, '::1', 'admin@gmail.com', 2, '2022-12-23 20:09:55', 1),
(287, '::1', 'cahyo@gmail.com', 49, '2023-03-19 10:27:34', 1),
(288, '::1', 'admin@gmail.com', 2, '2023-06-02 11:11:29', 1),
(289, '::1', 'cahyo@gmail.com', 49, '2023-06-02 19:15:36', 1),
(290, '::1', 'admin@gmail.com', 2, '2023-06-02 19:17:25', 1),
(291, '::1', 'admin@gmail.com', 2, '2023-06-02 19:19:58', 1),
(292, '::1', 'admin@gmail.com', 2, '2023-06-02 19:44:26', 1),
(293, '::1', 'admin@gmail.com', 2, '2023-06-03 13:29:24', 1),
(294, '::1', 'admin@gmail.com', 2, '2023-06-04 16:37:45', 1),
(295, '::1', 'cahyo@gmail.com', 49, '2023-06-04 17:53:09', 1),
(296, '::1', 'didi@gmail.com', 50, '2023-06-04 17:53:45', 1),
(297, '::1', 'cahyo@gmail.com', 49, '2023-06-04 17:58:33', 1),
(298, '::1', 'admin@gmail.com', 2, '2023-06-04 18:01:21', 1),
(299, '::1', 'admin@gmail.com', 2, '2023-06-04 18:20:29', 1),
(300, '::1', 'admin@gmail.com', 2, '2023-06-17 12:48:11', 1),
(301, '::1', 'admin', NULL, '2023-06-17 20:25:54', 0),
(302, '::1', 'admin@gmail.com', 2, '2023-06-17 20:26:02', 1),
(303, '::1', 'cahyo@gmail.com', 49, '2023-06-17 20:26:28', 1),
(304, '::1', 'admin@gmail.com', 2, '2023-06-18 22:48:46', 1),
(305, '::1', 'admin@gmail.com', 2, '2023-06-18 23:17:56', 1),
(306, '::1', 'admin@gmail.com', 2, '2023-06-19 15:32:13', 1),
(307, '::1', 'admin', NULL, '2023-06-20 15:23:03', 0),
(308, '::1', 'admin', NULL, '2023-06-20 15:23:11', 0),
(309, '::1', 'admin@gmail.com', 2, '2023-06-20 15:23:47', 1),
(310, '::1', 'admin@gmail.com', 2, '2023-06-20 16:01:21', 1),
(311, '::1', 'admin@gmail.com', 2, '2023-06-20 18:34:11', 1),
(312, '::1', 'admin@gmail.com', 2, '2023-06-20 19:52:06', 1),
(313, '::1', 'admin@gmail.com', 2, '2023-06-20 22:56:10', 1),
(314, '::1', 'admin@gmail.com', 2, '2023-06-21 12:10:55', 1),
(315, '::1', 'admin@gmail.com', 2, '2023-06-21 16:00:26', 1),
(316, '::1', 'admin@gmail.com', 2, '2023-06-22 05:16:15', 1),
(317, '::1', 'admin@gmail.com', 2, '2023-06-22 19:58:10', 1),
(318, '::1', 'admin@gmail.com', 2, '2023-06-23 01:10:30', 1),
(319, '::1', 'admin@gmail.com', 2, '2023-06-23 05:48:21', 1),
(320, '::1', 'admin@gmail.com', 2, '2023-06-24 07:37:05', 1),
(321, '::1', 'tric201@gmail.com', NULL, '2023-06-24 10:54:14', 0),
(322, '::1', 'tric201@gmail.com', NULL, '2023-06-24 10:59:59', 0),
(323, '::1', 'admin@gmail.com', 2, '2023-06-24 11:00:24', 1),
(324, '::1', 'tric201@gmail.com', 99, '2023-06-24 16:11:41', 1),
(325, '::1', 'admin@gmail.com', 2, '2023-06-24 16:12:49', 1),
(326, '::1', 'admin@gmail.com', 2, '2023-06-25 11:57:16', 1),
(327, '::1', 'admin@gmail.com', 2, '2023-06-25 14:29:52', 1),
(328, '::1', 'cahyo@gmail.com', 49, '2023-06-25 17:12:06', 1),
(329, '::1', 'tric201@gmail.com', 99, '2023-06-25 17:16:01', 1),
(330, '::1', 'admin@gmail.com', 2, '2023-06-25 17:16:10', 1),
(331, '::1', 'email@email.com', NULL, '2023-06-25 17:17:36', 0),
(332, '::1', 'email@email.com', NULL, '2023-06-25 17:17:47', 0),
(333, '::1', 'admin@gmail.com', 2, '2023-06-25 17:22:55', 1),
(334, '::1', 'admin@gmail.com', 2, '2023-06-25 17:25:20', 1),
(335, '::1', 'user', NULL, '2023-06-25 17:27:05', 0),
(336, '::1', 'admin@gmail.com', 2, '2023-06-25 17:34:44', 1),
(337, '::1', 'user', NULL, '2023-06-25 17:55:40', 0),
(338, '::1', 'user', NULL, '2023-06-25 17:55:50', 0),
(339, '::1', 'email@email.com', 101, '2023-06-25 17:56:18', 1),
(340, '::1', 'admin@gmail.com', 2, '2023-06-25 17:57:29', 1),
(341, '::1', 'user', NULL, '2023-06-25 17:58:20', 0),
(342, '::1', 'user', NULL, '2023-06-25 17:59:08', 0),
(343, '::1', 'cahyo@gmail.com', 49, '2023-06-25 17:59:55', 1),
(344, '::1', 'admin', NULL, '2023-06-25 19:27:35', 0),
(345, '::1', 'admin@gmail.com', 2, '2023-06-25 19:27:42', 1),
(346, '::1', 'cahyo@gmail.com', 49, '2023-06-25 19:29:53', 1),
(347, '::1', 'user', NULL, '2023-06-25 20:33:57', 0),
(348, '::1', 'didi@gmail.com', 50, '2023-06-25 20:34:03', 1),
(349, '::1', 'admin@gmail.com', 2, '2023-06-25 20:46:25', 1),
(350, '::1', 'cahyo@gmail.com', 49, '2023-06-26 09:16:20', 1),
(351, '::1', 'cahyo@gmail.com', 49, '2023-06-26 16:25:12', 1),
(352, '::1', 'admin@gmail.com', 2, '2023-06-26 18:37:05', 1),
(353, '::1', 'cahyo@gmail.com', 49, '2023-06-26 22:46:33', 1),
(354, '::1', 'cahyo@gmail.com', 49, '2023-06-27 12:06:48', 1),
(355, '::1', 'cahyo@gmail.com', 49, '2023-06-27 14:13:20', 1),
(356, '::1', 'cahyo@gmail.com', 49, '2023-06-27 16:23:15', 1),
(357, '::1', 'cahyo@gmail.com', 49, '2023-06-27 21:40:57', 1),
(358, '::1', 'cahyo@gmail.com', 49, '2023-06-28 05:21:02', 1),
(359, '::1', 'cahyo@gmail.com', 49, '2023-06-28 06:06:42', 1),
(360, '::1', 'cahyo@gmail.com', 49, '2023-06-28 15:36:23', 1),
(361, '::1', 'cahyo@gmail.com', 49, '2023-06-28 22:43:09', 1),
(362, '::1', 'cahyo@gmail.com', 49, '2023-06-29 05:32:49', 1),
(363, '::1', 'cahyo', NULL, '2023-06-29 13:17:01', 0),
(364, '::1', 'cahyo@gmail.com', 49, '2023-06-29 13:17:16', 1),
(365, '::1', 'didi@gmail.com', 50, '2023-06-29 13:50:36', 1),
(366, '::1', 'cahyo@gmail.com', 49, '2023-06-29 13:53:51', 1),
(367, '::1', 'didi@gmail.com', 50, '2023-06-29 13:57:12', 1),
(368, '::1', 'didi@gmail.com', 50, '2023-06-29 14:08:12', 1),
(369, '::1', 'cahyo@gmail.com', 49, '2023-06-29 15:44:06', 1),
(370, '::1', 'didi@gmail.com', 50, '2023-06-29 18:37:48', 1),
(371, '::1', 'cahyo@gmail.com', 49, '2023-06-30 03:34:06', 1),
(372, '::1', 'didi@gmail.com', 50, '2023-06-30 03:41:11', 1),
(373, '::1', 'ikaaa@gmail.com', 53, '2023-06-30 03:42:57', 1),
(374, '::1', 'didi@gmail.com', 50, '2023-06-30 04:07:21', 1),
(375, '::1', 'cahyo@gmail.com', 49, '2023-06-30 04:23:39', 1),
(376, '::1', 'cahyo@gmail.com', 49, '2023-06-30 05:26:06', 1),
(377, '::1', 'didi@gmail.com', 50, '2023-06-30 05:27:34', 1),
(378, '::1', 'cahyo@gmail.com', 49, '2023-06-30 10:40:16', 1),
(379, '::1', 'rizka@gmail.com', 56, '2023-06-30 11:20:06', 1),
(380, '::1', 'rizka@gmail.com', 56, '2023-06-30 13:48:25', 1),
(381, '::1', 'rizka', NULL, '2023-06-30 21:41:34', 0),
(382, '::1', 'rizka@gmail.com', 56, '2023-06-30 21:41:48', 1),
(383, '::1', 'rizka', NULL, '2023-07-01 12:08:58', 0),
(384, '::1', 'rizka@gmail.com', 56, '2023-07-01 12:09:05', 1),
(385, '::1', 'cahyo@gmail.com', 49, '2023-07-01 12:24:25', 1),
(386, '::1', 'cahyo@gmail.com', 49, '2023-07-01 19:39:30', 1),
(387, '::1', 'admin@gmail.com', 2, '2023-07-01 19:40:15', 1),
(388, '::1', 'admin@gmail.com', 2, '2023-07-02 20:34:38', 1),
(389, '::1', 'didi@gmail.com', 50, '2023-07-02 20:46:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-user', 'Manage all users'),
(2, 'manage-profile', 'Manage user\'s profile'),
(3, 'tambah-santri', 'Tambah Data Santri'),
(4, 'edit-profile', 'Edit Profile '),
(5, 'hapus-santri', 'Hapus Data Santri'),
(6, 'data-santri', 'Data Santri'),
(7, 'detail-santri', 'Detail Data Santri');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama_bulan` varchar(10) CHARACTER SET latin1 NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`, `no`) VALUES
('01', 'Januari', 1),
('02', 'Februari', 2),
('03', 'Maret', 3),
('04', 'April', 4),
('05', 'Mei', 5),
('06', 'Juni', 6),
('07', 'Juli', 7),
('08', 'Agustus', 8),
('09', 'September', 9),
('10', 'Oktober', 10),
('11', 'November', 11),
('12', 'Desember', 12);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id_gender` int(11) NOT NULL,
  `sex` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id_gender`, `sex`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kamar_santri`
--

CREATE TABLE `kamar_santri` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(30) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar_santri`
--

INSERT INTO `kamar_santri` (`id_kamar`, `nama_kamar`, `gender_id`) VALUES
(1, 'Utsman bin Affan', 1),
(2, 'Ali Bin Abi Tholib', 1),
(3, 'KH. Mahfud', 1),
(4, 'KH. Bajuri', 1),
(5, 'KH. Abdul Muiz', 1),
(6, 'Abah Syafi\'udin', 1),
(7, 'Abah Habib', 1),
(8, 'Abah Mugianto', 1),
(9, 'KH. Samsul Rizal', 1),
(10, 'KH. Dahlan Nur Roib', 1),
(11, 'Abu Bakar', 1),
(12, 'Salman Al-Farisi', 1),
(13, 'Abah Suwaji', 1),
(14, 'Umar Bin Khottob', 1),
(15, 'Sunan Bonang', 1),
(16, 'Sunan Kudus', 1),
(17, 'Sunan Giri', 1),
(18, 'Sunan Ampel', 1),
(19, 'Sunan Kalijaga', 1),
(20, 'Sunan Drajad', 1),
(21, 'Fatmawati', 2),
(22, 'Cut Meutia', 2),
(23, 'Siti Asiyah', 2),
(24, 'Cut Nyak Dien', 2),
(25, 'Fathanah', 2),
(26, 'R.A Kartini', 2),
(27, 'Dewi Sartika', 2),
(28, 'Amanah', 2),
(29, 'Uswatun Hasanah', 2),
(30, 'Hj. Sri Rahayu', 2),
(31, 'Hj. Isti\'Aroh', 2),
(32, 'Hj. Sringatin', 2),
(33, 'Hj. Luluk Chumaidah', 2),
(34, 'Shofwa', 2),
(35, 'Makkah', 2),
(36, 'Robi\'Ah Al Adawiyah', 2),
(37, 'Halimatus Sa\'Diyah', 2),
(38, 'Saudah', 2),
(39, 'Zaenab', 2),
(40, 'Ummu Sulaim', 2),
(41, 'Zulaikha', 2),
(42, 'Siti Sarah', 2),
(43, 'Siti Masyithoh', 2),
(44, 'Siti Hajar', 2),
(45, 'Mariatul Qibthiyah', 2),
(46, 'Siti Hawa', 2),
(47, 'Siti Aisyah', 2),
(48, 'Umi Kultsum', 2),
(49, 'Khodijah', 2),
(50, 'Fathimah Az-Zahrah', 2),
(51, 'Siti Maryam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1665283429, 1),
(2, '2022-12-04-050647', 'App\\Database\\Migrations\\UsersAddGenderId', 'default', 'App', 1670131539, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(11) DEFAULT NULL,
  `id_users` int(20) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0=belum dibayar, 1=pending, 2=lunas, 3=gagal',
  `total_bulan` int(11) DEFAULT NULL,
  `total_nominal` int(50) DEFAULT NULL,
  `order_id` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_users`, `tanggal_bayar`, `status`, `total_bulan`, `total_nominal`, `order_id`) VALUES
(620232358, 6062023, 49, NULL, 0, 0, 0, '0'),
(620233423, 6062023, 50, NULL, 0, 0, 0, '0'),
(620234375, 6062023, 52, NULL, 0, 0, 0, '0'),
(620235254, 6062023, 53, NULL, 0, 0, 0, '0'),
(620235326, 6062023, 54, NULL, 0, 0, 0, '0'),
(620236513, 6062023, 56, '2023-06-30', 2, 1, 0, '0'),
(620238656, 6062023, 59, NULL, 0, 0, 0, '0'),
(620238742, 6062023, 99, NULL, 0, 0, 0, '0'),
(720231234, 7072023, 102, NULL, 0, NULL, NULL, NULL),
(720232358, 7072023, 59, NULL, 0, NULL, NULL, NULL),
(720233423, 7072023, 50, NULL, 0, NULL, NULL, NULL),
(720234375, 7072023, 56, NULL, 0, NULL, NULL, NULL),
(720235254, 7072023, 49, NULL, 0, NULL, NULL, NULL),
(720235326, 7072023, 52, NULL, 0, NULL, NULL, NULL),
(720236513, 7072023, 99, NULL, 0, NULL, NULL, NULL),
(720238656, 7072023, 54, NULL, 0, NULL, NULL, NULL),
(720238742, 7072023, 53, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `bulan`, `tahun`) VALUES
(6062023, 'Juni', 2023),
(7072023, 'Juli', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nis` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `no_telp` varchar(15) DEFAULT NULL,
  `gender_id` int(5) DEFAULT NULL,
  `kamar` int(11) DEFAULT NULL,
  `j_syahriyah` varchar(10) NOT NULL COMMENT 'normal=250000, khusus=100000',
  `nominal` int(20) NOT NULL,
  `wali` varchar(30) DEFAULT NULL,
  `no_wali` varchar(15) DEFAULT NULL,
  `thn_masuk` year(4) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis`, `email`, `username`, `fullname`, `user_image`, `no_telp`, `gender_id`, `kamar`, `j_syahriyah`, `nominal`, `wali`, `no_wali`, `thn_masuk`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 8324, 'admin@gmail.com', 'admin', 'Administrator', 'default.svg', NULL, NULL, NULL, '', 0, NULL, NULL, NULL, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-08 23:16:52', '2022-10-08 23:16:52', NULL),
(49, 5254, 'cahyo@gmail.com', 'cahyo', 'Ahmad Muhlish Tri Cahyo', 'default.svg', '05658388607', 1, 19, '1', 250000, 'wali', '8388607', 2018, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(50, 3423, 'didi@gmail.com', 'didi', 'Bagus Abdillah Zulkarnain', 'default.svg', '0234763184', 1, 17, '2', 100000, 'wali', '5864354', 2020, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(52, 5326, 'munir@gmail.com', 'munir', 'Ahmad Munir Fuady', 'default.svg', '0864621414', 1, 4, '2', 100000, 'asd', '8388607', 2011, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(53, 8742, 'ikaaa@gmail.com', 'ikaaa', 'Hidayatus Sholihah', 'default.svg', '04548388607', 2, 49, '1', 250000, 'qwerty', '8388607', 2012, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(54, 8656, 'alfian@gmail.com', 'alfian', 'Alfian Ahsani Nasrulloh', 'default.svg', '076578388607', 1, 12, '1', 250000, 'bapak', '8388607', 2013, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(56, 4375, 'rizka@gmail.com', 'rizka', 'Rizka Qusnul Qotimah', 'default.svg', '089673671520', 2, 30, '2', 100000, 'dsfds', '089673671520', 2019, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(59, 2358, 'nawal@gmail.com', 'nawal', 'M Nawal Ma\'ali', 'default.svg', '0987654321', 1, 5, '1', 250000, 'qwerty', '0987654321', 2012, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', NULL, NULL),
(99, 6513, 'tric201@gmail.com', 'tri', 'Cahyo', 'default.svg', '082331203169', 1, 15, '1', 250000, NULL, NULL, NULL, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(102, 1234, 'user@user.com', 'user', 'User', 'default.svg', '082331203169', 2, 38, '2', 100000, NULL, NULL, 2023, '$2y$10$VaarQW/2eLY0CtExmqpe5OArixPW0RY1yG4Y7kLE7AalJiju8/ZS6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `group_id_user_id` (`group_id`,`user_id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `kamar_santri`
--
ALTER TABLE `kamar_santri`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id_gender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar_santri`
--
ALTER TABLE `kamar_santri`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
