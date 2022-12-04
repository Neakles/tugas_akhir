-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 03:12 PM
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
-- Database: `tugas_akhir`
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
(2, 1),
(2, 3),
(2, 6);

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
(153, '::1', 'elscine@gmail.com', 2, '2022-11-23 06:38:25', 1);

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
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1665283429, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `no_telp` int(15) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `kamar` varchar(30) DEFAULT NULL,
  `wali` varchar(30) DEFAULT NULL,
  `no_wali` int(13) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `no_telp`, `jk`, `kamar`, `wali`, `no_wali`, `thn_masuk`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mine@gmail.com', 'mine', 'Mine', 'default.svg', 12345, 'Laki-laki', 'KH. Abd Muiz', 'qwerty', 123456, 2020, '$2y$10$Dl.WYq/yERQA4xbULYYZsO9UqXRLNtcIuasDEPCFlrZKwE5lDACg.', NULL, NULL, NULL, '5e421b8302efadb5c030b33b90a53cd0', NULL, NULL, 1, 0, '2022-10-08 21:48:46', '2022-10-08 21:48:46', NULL),
(2, 'elscine@gmail.com', 'elscine', 'Elscine', 'default.svg', 21345, 'Perempuan', 'Sunan Bonang', 'ertyui', 123456, 2022, '$2y$10$eSiaslzDYr07zTaFPT0Ix.kbLO12DwExSFiWwidEt1iyXsfx30n22', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-08 23:16:52', '2022-10-08 23:16:52', NULL),
(3, 'neakles@gmail.com', 'neakles', 'Neakles', 'default.svg', 12345, 'Laki-laki', 'Sunan Kalijaga', 'mkoh', 12345, 2019, '$2y$10$Ap8yd.lujV63E.ELHEFSfOpFohyG2G5Js3chMaPTZeJPQD46eLHF6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-09 04:27:59', '2022-10-09 04:27:59', NULL),
(6, 'tric201@gmail.com', 'amtricahyo', NULL, 'default.svg', 12345, 'Perempuan', 'Abah Habib', 'eawfaf', 1241234, 2021, '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-09 00:57:04', '2022-11-09 00:57:04', NULL);

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
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
