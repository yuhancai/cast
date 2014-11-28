-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2014 at 12:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fuel_l`
--

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE IF NOT EXISTS `a` (
  `ID` int(11) NOT NULL,
  `SCORE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a`
--

INSERT INTO `a` (`ID`, `SCORE`) VALUES
(1, 28),
(2, 33),
(3, 33),
(4, 89),
(5, 99),
(6, 68);

-- --------------------------------------------------------

--
-- Table structure for table `draws`
--

CREATE TABLE IF NOT EXISTS `draws` (
`id` int(11) NOT NULL,
  `qishu` int(11) NOT NULL COMMENT '每个产品抽的期数',
  `luckynum` int(11) NOT NULL,
  `begin_at` datetime NOT NULL COMMENT '每期开奖时间',
  `lucky_at` datetime NOT NULL COMMENT '中奖者夺宝时间',
  `open_at` datetime NOT NULL COMMENT '结束时间',
  `itemid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `draws`
--

INSERT INTO `draws` (`id`, `qishu`, `luckynum`, `begin_at`, `lucky_at`, `open_at`, `itemid`) VALUES
(1, 2, 10000333, '2014-10-09 22:16:29', '2014-10-09 23:35:24', '2014-10-10 07:39:56', 1),
(2, 3, 10006207, '2014-10-10 07:39:56', '2014-10-10 11:34:12', '2014-10-10 12:18:05', 1),
(3, 4, 10004950, '2014-10-10 12:18:05', '2014-10-10 15:15:21', '2014-10-10 15:23:15', 1),
(4, 5, 10002461, '2014-10-10 15:23:15', '2014-10-10 16:35:55', '2014-10-10 17:35:56', 1),
(5, 6, 10001880, '2014-10-10 17:35:56', '2014-10-10 21:00:18', '2014-10-10 21:10:01', 1),
(6, 7, 10006597, '2014-10-10 21:10:01', '2014-10-10 21:57:53', '2014-10-10 22:22:57', 1),
(7, 8, 10006947, '2014-10-10 22:22:57', '2014-10-10 22:25:00', '2014-10-11 00:03:47', 1),
(8, 9, 10003646, '2014-10-11 00:03:47', '2014-10-11 08:32:29', '2014-10-11 08:34:06', 1),
(9, 10, 10000164, '2014-10-11 08:34:06', '2014-10-11 10:17:25', '2014-10-11 10:51:13', 1),
(10, 11, 10002111, '2014-10-11 10:51:13', '2014-10-11 10:58:45', '2014-10-11 12:51:42', 1),
(11, 12, 10002372, '2014-10-11 12:51:42', '2014-10-11 14:34:51', '2014-10-11 14:43:39', 1),
(12, 13, 10007587, '2014-10-11 14:43:39', '2014-10-11 15:41:19', '2014-10-11 16:29:03', 1),
(13, 14, 10003978, '2014-10-11 16:29:03', '2014-10-11 17:52:48', '2014-10-11 19:00:05', 1),
(14, 15, 10002863, '2014-10-11 19:00:05', '2014-10-11 19:27:46', '2014-10-11 22:29:22', 1),
(15, 16, 10001231, '2014-10-11 22:29:22', '2014-10-11 22:52:40', '2014-10-12 09:16:33', 1),
(16, 17, 10004877, '2014-10-12 09:16:33', '2014-10-12 10:52:45', '2014-10-12 12:38:14', 1),
(17, 18, 10002604, '2014-10-12 12:38:14', '2014-10-12 16:10:31', '2014-10-12 16:52:29', 1),
(18, 19, 10006990, '2014-10-12 16:52:29', '2014-10-12 18:20:56', '2014-10-12 20:53:33', 1),
(19, 20, 10006256, '2014-10-12 20:53:33', '2014-10-13 00:21:44', '2014-10-13 00:29:27', 1),
(20, 21, 10006702, '2014-10-13 00:29:27', '2014-10-13 09:38:11', '2014-10-13 10:35:43', 1),
(21, 22, 10005257, '2014-10-13 10:35:43', '2014-10-13 11:27:04', '2014-10-13 12:53:22', 1),
(22, 23, 10000803, '2014-10-13 12:53:22', '2014-10-13 13:36:02', '2014-10-13 14:11:06', 1),
(23, 24, 10004167, '2014-10-13 14:11:06', '2014-10-13 14:21:00', '2014-10-13 15:08:14', 1),
(24, 25, 10004485, '2014-10-13 15:08:14', '2014-10-13 15:24:31', '2014-10-13 16:15:01', 1),
(25, 26, 10002074, '2014-10-13 16:15:01', '2014-10-13 16:15:09', '2014-10-13 18:24:51', 1),
(26, 27, 10006730, '2014-10-13 18:24:51', '2014-10-13 18:37:37', '2014-10-13 20:39:07', 1),
(27, 28, 10001434, '2014-10-13 20:39:07', '2014-10-13 22:05:38', '2014-10-13 22:58:34', 1),
(28, 29, 10002112, '2014-10-13 22:58:34', '2014-10-14 05:29:21', '2014-10-14 07:33:12', 1),
(29, 30, 10005677, '2014-10-14 07:33:12', '2014-10-14 08:46:07', '2014-10-14 11:03:15', 1),
(30, 31, 10004869, '2014-10-14 11:03:15', '2014-10-14 11:15:00', '2014-10-14 12:45:00', 1),
(31, 32, 10007464, '2014-10-14 12:45:00', '2014-10-14 14:57:20', '2014-10-14 15:10:01', 1),
(32, 33, 10004939, '2014-10-14 15:10:01', '2014-10-14 16:02:32', '2014-10-14 17:00:53', 1),
(33, 34, 10001143, '2014-10-14 17:00:53', '2014-10-14 18:35:05', '2014-10-14 19:54:40', 1),
(34, 35, 10001193, '2014-10-14 19:54:40', '2014-10-14 20:11:02', '2014-10-14 22:17:24', 1),
(35, 36, 10007279, '2014-10-14 22:17:24', '2014-10-15 00:01:30', '2014-10-15 00:46:40', 1),
(36, 37, 10003865, '2014-10-15 00:46:40', '2014-10-15 01:30:47', '2014-10-15 10:14:44', 1),
(37, 38, 10005345, '2014-10-15 10:14:44', '2014-10-15 10:18:40', '2014-10-15 12:09:33', 1),
(38, 39, 10001032, '2014-10-15 12:09:33', '2014-10-15 13:58:59', '2014-10-15 14:01:34', 1),
(39, 40, 10005194, '2014-10-15 14:01:34', '2014-10-15 15:47:43', '2014-10-15 15:56:03', 1),
(40, 41, 10005162, '2014-10-15 15:56:03', '2014-10-15 17:12:58', '2014-10-15 17:55:29', 1),
(41, 42, 10004785, '2014-10-15 17:55:29', '2014-10-15 19:14:38', '2014-10-15 20:43:13', 1),
(42, 43, 10003334, '2014-10-15 20:43:13', '2014-10-15 21:54:55', '2014-10-15 22:21:57', 1),
(43, 44, 10006940, '2014-10-15 22:21:57', '2014-10-15 22:50:08', '2014-10-15 23:29:17', 1),
(44, 45, 10004945, '2014-10-15 23:29:17', '2014-10-15 23:37:09', '2014-10-16 07:44:18', 1),
(45, 46, 10003477, '2014-10-16 07:44:18', '2014-10-16 08:19:06', '2014-10-16 10:24:49', 1),
(46, 47, 10001808, '2014-10-16 10:24:49', '2014-10-16 11:20:12', '2014-10-16 11:22:09', 1),
(47, 48, 10007327, '2014-10-16 11:22:09', '2014-10-16 11:27:40', '2014-10-16 12:58:59', 1),
(48, 49, 10006079, '2014-10-16 12:58:59', '2014-10-16 14:01:12', '2014-10-16 14:21:02', 1),
(49, 50, 10003646, '2014-10-16 14:21:02', '2014-10-16 14:50:53', '2014-10-16 15:45:20', 1),
(50, 51, 10000094, '2014-10-16 15:45:20', '2014-10-16 16:15:05', '2014-10-16 17:20:45', 1),
(51, 2, 10004795, '2014-08-03 16:31:54', '2014-08-05 22:25:45', '2014-08-05 23:43:04', 2),
(52, 3, 10000378, '2014-08-05 23:43:04', '2014-08-06 20:31:55', '2014-08-07 12:15:46', 2),
(53, 4, 10007281, '2014-08-07 12:15:46', '2014-08-07 16:18:01', '2014-08-08 11:46:57', 2),
(54, 5, 10002587, '2014-08-08 11:46:57', '2014-08-08 15:19:40', '2014-08-09 14:27:28', 2),
(55, 6, 10006354, '2014-08-09 14:27:28', '2014-08-09 16:48:18', '2014-08-10 22:37:51', 2),
(56, 7, 10005510, '2014-08-10 22:37:51', '2014-08-11 12:38:38', '2014-08-12 12:50:01', 2),
(57, 8, 10005068, '2014-08-12 12:50:01', '2014-08-12 16:12:06', '2014-08-13 17:10:54', 2),
(58, 9, 10004103, '2014-08-13 17:10:54', '2014-08-15 08:57:58', '2014-08-15 09:36:09', 2),
(59, 10, 10002994, '2014-08-15 09:36:09', '2014-08-15 11:56:16', '2014-08-16 12:27:56', 2),
(60, 11, 10005567, '2014-08-16 12:27:56', '2014-08-18 09:57:58', '2014-08-18 10:42:13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL COMMENT '物品ID',
  `itemname` varchar(200) NOT NULL,
  `itemtype` int(11) DEFAULT NULL COMMENT '物品的类型',
  `itemabbr` varchar(100) DEFAULT NULL COMMENT '物品名称拼音缩写',
  `forurl` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemname`, `itemtype`, `itemabbr`, `forurl`) VALUES
(1, 'joly', NULL, NULL, '01-37'),
(2, 'joly', NULL, NULL, '00-80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draws`
--
ALTER TABLE `draws`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `draws`
--
ALTER TABLE `draws`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '物品ID',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
