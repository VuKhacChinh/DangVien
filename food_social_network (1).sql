-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 09:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`iduser`, `username`, `password`, `name`, `active`) VALUES
(1, 'yonad', 'e807f1fcf82d132f9bb018ca6738a19f', 'yon bun thorn', 1),
(3, 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 'Admin', 1),
(5, 'songoku99999', 'c4ca4238a0b923820dcc509a6f75849b', 'Vũ Khắc Chinh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `favoritefoods`
--

CREATE TABLE `favoritefoods` (
  `idfood` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `idfood` int(11) NOT NULL,
  `idres` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '/images/defaultavatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`idfood`, `idres`, `name`, `price`, `avatar`) VALUES
(2, 1, 'Gà quay ngũ vị', 100000, 'monan2.jpg'),
(3, 4, 'Bánh tráng trộn', 50000, '/images/monan3.jpg'),
(8, 4, 'gà rán', 10000, '/images/66jf9GZalY4s0dPUf2ZX.jpg'),
(10, 4, 'cơm gà chua ngọt', 100000, '/images/h7PbHbXbsu470Amm06tR.jpg'),
(14, 4, 'gà rán', 3000, '/images/tGA2M7Eq9OE8gnszgMyD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `iduser` int(11) NOT NULL,
  `idteams` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `idmessage` int(11) NOT NULL,
  `idteam` int(11) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`idmessage`, `idteam`, `iduser`, `content`, `time`, `type`) VALUES
(2, 5, 5, 'Hello', '2022-01-02 11:03:43', 0),
(3, 5, 4, 'Hello 2', '2022-01-02 11:03:43', 0),
(4, 9, 5, 'h', '2022-01-09 00:36:25', 0),
(5, 9, 5, 'hell', '2022-01-09 00:39:15', 0),
(6, 9, 3, 'mấy giờ đi ăn', '2022-01-09 00:40:33', 0),
(7, 9, 5, 'lát', '2022-01-09 00:45:08', 0),
(8, 9, 3, 'đã vào nhóm', '2022-01-08 06:04:59', 1),
(9, 9, 3, 'Đã rời nhóm', '2022-01-08 06:21:32', 1),
(10, 9, 5, 'he', '2022-01-09 19:44:13', 0),
(11, 9, 3, 'đã vào nhóm', '2022-01-09 12:45:19', 1),
(12, 9, 3, 'alo', '2022-01-09 19:45:27', 0),
(13, 9, 5, 'gif', '2022-01-09 19:45:41', 0),
(14, 9, 3, 'dg', '2022-01-09 19:50:05', 0),
(15, 9, 5, 'helloo', '2022-01-09 20:35:46', 0),
(16, 9, 3, 'hol', '2022-01-09 20:37:41', 0),
(17, 9, 3, 'h', '2022-01-09 20:38:49', 0),
(18, 9, 3, 'j', '2022-01-09 20:40:39', 0),
(19, 9, 3, 'k', '2022-01-09 20:41:50', 0),
(20, 9, 3, 'k', '2022-01-09 20:42:01', 0),
(21, 9, 3, 'alo', '2022-01-09 20:44:56', 0),
(22, 9, 3, 'h', '2022-01-09 20:49:18', 0),
(23, 9, 3, 'Đã rời nhóm', '2022-01-09 01:49:22', 1),
(24, 4, 5, 'đã vào nhóm', '2022-01-09 01:50:40', 1),
(25, 4, 5, 'alo', '2022-01-09 20:51:30', 0),
(26, 4, 3, 'lô', '2022-01-09 20:51:55', 0),
(27, 4, 3, 'Đã rời nhóm', '2022-01-09 01:53:01', 1),
(28, 5, 3, 'Đã rời nhóm', '2022-01-09 01:56:48', 1),
(29, 5, 3, 'h', '2022-01-09 20:56:57', 0),
(30, 9, 3, 'đã vào nhóm', '2022-01-09 02:07:37', 1),
(31, 9, 5, 'Đã rời nhóm', '2022-01-09 02:08:23', 1),
(32, 9, 5, 'đã vào nhóm', '2022-01-09 02:08:33', 1),
(33, 9, 5, 'Đã rời nhóm', '2022-01-09 02:09:40', 1),
(34, 9, 5, 'đã vào nhóm', '2022-01-09 02:09:46', 1),
(35, 9, 5, 'Đã rời nhóm', '2022-01-09 02:09:55', 1),
(36, 9, 5, 'đã vào nhóm', '2022-01-09 02:10:04', 1),
(37, 9, 5, 'Đã rời nhóm', '2022-01-09 02:13:06', 1),
(38, 9, 5, 'đã vào nhóm', '2022-01-09 02:13:27', 1),
(39, 9, 5, 'Đã rời nhóm', '2022-01-09 02:13:46', 1),
(40, 9, 5, 'đã vào nhóm', '2022-01-09 02:13:51', 1),
(41, 9, 5, 'Đã rời nhóm', '2022-01-09 02:14:45', 1),
(42, 9, 5, 'đã vào nhóm', '2022-01-09 02:14:49', 1),
(43, 9, 5, 'Đã rời nhóm', '2022-01-09 02:15:06', 1),
(44, 9, 5, 'đã vào nhóm', '2022-01-09 02:15:18', 1),
(45, 9, 5, 'Đã rời nhóm', '2022-01-09 02:27:18', 1),
(46, 4, 3, 'đã vào nhóm', '2022-01-09 02:29:35', 1),
(47, 5, 3, 'đã vào nhóm', '2022-01-09 02:30:19', 1),
(48, 4, 3, 'm', '2022-01-09 21:30:45', 0),
(49, 5, 3, 'm', '2022-01-09 21:30:53', 0),
(50, 9, 3, 'm', '2022-01-09 21:31:12', 0),
(51, 9, 5, 'đã vào nhóm', '2022-01-09 02:31:38', 1),
(52, 9, 5, 'Đã rời nhóm', '2022-01-09 02:32:01', 1),
(53, 4, 5, 'Đã rời nhóm', '2022-01-09 02:32:35', 1),
(54, 4, 5, 'đã vào nhóm', '2022-01-09 02:32:41', 1),
(55, 4, 5, 'Đã rời nhóm', '2022-01-09 02:34:36', 1),
(56, 9, 5, 'đã vào nhóm', '2022-01-09 02:34:49', 1),
(57, 4, 5, 'đã vào nhóm', '2022-01-09 02:35:27', 1),
(58, 9, 5, 'Đã rời nhóm', '2022-01-09 02:36:34', 1),
(59, 9, 5, 'đã vào nhóm', '2022-01-09 02:36:40', 1),
(60, 9, 5, 'Đã rời nhóm', '2022-01-09 02:42:02', 1),
(61, 4, 4, 'Đã rời nhóm', '2022-01-09 02:43:30', 1),
(62, 4, 5, 'Đã rời nhóm', '2022-01-09 02:45:05', 1),
(63, 9, 5, 'đã vào nhóm', '2022-01-09 02:46:13', 1),
(64, 4, 5, 'đã vào nhóm', '2022-01-09 02:46:24', 1),
(65, 4, 5, 'Đã rời nhóm', '2022-01-09 02:46:53', 1),
(66, 9, 5, 'Đã rời nhóm', '2022-01-09 02:47:05', 1),
(67, 9, 5, 'đã vào nhóm', '2022-01-09 02:52:30', 1),
(68, 4, 5, 'đã vào nhóm', '2022-01-09 02:52:40', 1),
(69, 5, 5, 'đã vào nhóm', '2022-01-09 02:52:48', 1),
(70, 9, 5, 'Đã rời nhóm', '2022-01-09 02:54:13', 1),
(71, 4, 5, 'Đã rời nhóm', '2022-01-09 02:54:44', 1),
(72, 9, 5, 'đã vào nhóm', '2022-01-09 02:57:50', 1),
(73, 4, 5, 'đã vào nhóm', '2022-01-09 02:58:00', 1),
(74, 4, 5, 'Đã rời nhóm', '2022-01-09 02:59:26', 1),
(75, 9, 5, 'Đã rời nhóm', '2022-01-09 02:59:37', 1),
(76, 5, 5, 'Đã rời nhóm', '2022-01-09 03:27:55', 1),
(77, 9, 5, 'đã vào nhóm', '2022-01-14 08:20:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idorder` int(11) NOT NULL,
  `idteam` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `state` int(3) NOT NULL DEFAULT 0,
  `phonenumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idorder`, `idteam`, `time`, `state`, `phonenumber`) VALUES
(5, 5, '2022-01-02 06:25:08', -1, '1234567890'),
(6, 5, '2022-01-15 09:58:53', 1, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `idpost` int(11) NOT NULL,
  `idres` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `time` datetime NOT NULL,
  `numlike` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `img1` varchar(100) DEFAULT NULL,
  `img2` varchar(100) DEFAULT NULL,
  `img3` varchar(100) DEFAULT NULL,
  `img4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`idpost`, `idres`, `content`, `time`, `numlike`, `active`, `img1`, `img2`, `img3`, `img4`) VALUES
(1, 1, 'Mon ngon cho quy khach', '2021-09-29 18:06:10', 0, 1, 'avata.jpg', 'avata.jpg', 'avata.jpg', 'avata.jpg'),
(2, 1, 'Tuyet pham mua dong', '2021-09-29 18:38:39', 0, 1, 'monan1.jpg', 'monan2.jpg', 'monan3.jpg', 'monan4.jpg'),
(6, 4, 'Cơm chiên gà cay là món ăn hấp dẫn nhất vừa qua, chúc quý khách ngon miệng', '2022-01-16 07:26:08', 0, 1, '/images/88JwBjI9kCquTL8iwab6.jpg', '/images/39FyC3Y7QhJWhfF9wTlE.jpg', '/images/zC4GmesFoilMui43ZK11.jpg', '/images/FGrzVA2OHJtlrF36yuHZ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `idpromotion` int(11) NOT NULL,
  `idres` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '/images/qua.jpg',
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`idpromotion`, `idres`, `name`, `content`, `avatar`, `active`) VALUES
(3, 4, 'Tặng xe máy', 'Khách hàng đi ăn sẽ được bốc thăm trúng thưởng để nhận được xe máy', '/images/qua.jpg', 1),
(4, 4, 'Tặng xe máy', 'Khách hàng đi ăn sẽ được bốc thăm trúng thưởng để nhận được xe máy', '/images/qua.jpg', 1),
(5, 4, 'Tặng xe đạp', 'Khách hàng đi ăn sẽ được bốc thăm trúng thưởng để nhận được xe đạp', '/images/qua.jpg', 1),
(6, 4, 'khuyến mãi lớn nè', 'quý khách đi ăn sẽ được bốc thăm trúng thưởng điện thoại xịn', '/images/MskTi2luVFWfQZ6C4qRo.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reslikes`
--

CREATE TABLE `reslikes` (
  `idres` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reslikes`
--

INSERT INTO `reslikes` (`idres`, `iduser`) VALUES
(1, 3),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `resmanagers`
--

CREATE TABLE `resmanagers` (
  `idres` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `numstar` float NOT NULL DEFAULT 0,
  `numreview` int(11) NOT NULL DEFAULT 0,
  `numlike` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(100) NOT NULL DEFAULT '/images/defaultavatar.jpg',
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resmanagers`
--

INSERT INTO `resmanagers` (`idres`, `username`, `password`, `name`, `address`, `numstar`, `numreview`, `numlike`, `avatar`, `active`) VALUES
(1, 'nhahang1', '1234567890', 'Nha hang Hai Au', 'Ha Noi', 4, 1, 2, 'nhahang1.jpg', 1),
(2, 'nhahang2', '1234567890', 'Tây Hồ quán', 'Hồ Tây', 0, 0, 0, 'nhahang2.jpg', 1),
(3, 'nhahang2', '1234567890', 'Tây Hồ quán', 'Hồ Tây', 0, 0, 0, 'nhahang2.jpg', 1),
(4, 'thuonghai', 'e10adc3949ba59abbe56e057f20f883e', 'Nhà hàng Hải Cảng', 'Thượng Hải', 12, 3, 0, '/images/aG4jpk6s4ffFsYFzO30E.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `idreview` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idres` int(11) NOT NULL,
  `content` text NOT NULL,
  `numstar` int(6) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`idreview`, `iduser`, `idres`, `content`, `numstar`, `time`) VALUES
(12, 5, 4, 'tốtt', 4, '2021-12-08'),
(14, 4, 4, 'Tuyệt vời', 4, '2022-01-20'),
(19, 5, 4, 'Ngon lắm nha mọi người', 5, '2022-01-14'),
(20, 5, 4, 'good job', 3, '2022-01-14'),
(21, 5, 4, 'phở ngon', 4, '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `idteam` int(11) NOT NULL,
  `idres` int(11) NOT NULL,
  `nummember` int(11) NOT NULL,
  `idleader` int(11) NOT NULL,
  `lastmess` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`idteam`, `idres`, `nummember`, `idleader`, `lastmess`) VALUES
(4, 2, 0, 3, '2022-01-09 02:58:00'),
(5, 4, 3, 2, '2022-01-09 02:52:48'),
(9, 1, 2, 3, '2022-01-14 08:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `idteam` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`idteam`, `iduser`) VALUES
(4, 3),
(5, 2),
(5, 3),
(5, 4),
(9, 3),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '/images/defaultavata.jpg',
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `name`, `address`, `avatar`, `active`) VALUES
(2, '0395625925', 'e807f1fcf82d132f9bb018ca6738a19f', 'Vũ Khắc Chinh', 'Hà Nội', 'defaultavatar.jpg', 1),
(3, 'chinh140599', 'e807f1fcf82d132f9bb018ca6738a19f', 'Vũ Khắc Chinh', 'Hà Nội', 'defaultavatar.jpg', 1),
(4, '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', '1234567890', '1234567890', 'defaultavatar.jpg', 1),
(5, 'songoku99999', 'e807f1fcf82d132f9bb018ca6738a19f', 'Yon Bun Thon', 'Cambodia', '/images/q5uL4mV1OgnatpVxt2qK.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `favoritefoods`
--
ALTER TABLE `favoritefoods`
  ADD PRIMARY KEY (`idfood`,`iduser`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`idfood`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`iduser`,`idteams`),
  ADD KEY `idteams` (`idteams`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `idteam` (`idteam`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idteams` (`idteam`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idres` (`idres`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`idpromotion`),
  ADD KEY `idres` (`idres`);

--
-- Indexes for table `reslikes`
--
ALTER TABLE `reslikes`
  ADD PRIMARY KEY (`idres`,`iduser`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `resmanagers`
--
ALTER TABLE `resmanagers`
  ADD PRIMARY KEY (`idres`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`idreview`),
  ADD KEY `idres` (`idres`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`idteam`),
  ADD KEY `idres` (`idres`),
  ADD KEY `idleader` (`idleader`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`idteam`,`iduser`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `idfood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `idpromotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resmanagers`
--
ALTER TABLE `resmanagers`
  MODIFY `idres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `idreview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favoritefoods`
--
ALTER TABLE `favoritefoods`
  ADD CONSTRAINT `favoritefoods_ibfk_1` FOREIGN KEY (`idfood`) REFERENCES `foods` (`idfood`),
  ADD CONSTRAINT `favoritefoods_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`idteams`) REFERENCES `teams` (`idteam`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idteam`) REFERENCES `teams` (`idteam`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idteam`) REFERENCES `teams` (`idteam`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idres`) REFERENCES `resmanagers` (`idres`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`idres`) REFERENCES `resmanagers` (`idres`);

--
-- Constraints for table `reslikes`
--
ALTER TABLE `reslikes`
  ADD CONSTRAINT `reslikes_ibfk_1` FOREIGN KEY (`idres`) REFERENCES `resmanagers` (`idres`),
  ADD CONSTRAINT `reslikes_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`idres`) REFERENCES `resmanagers` (`idres`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`idres`) REFERENCES `resmanagers` (`idres`),
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`idleader`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_ibfk_1` FOREIGN KEY (`idteam`) REFERENCES `teams` (`idteam`),
  ADD CONSTRAINT `team_user_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
