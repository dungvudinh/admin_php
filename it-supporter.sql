-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 11:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it-supporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_name` char(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `password`) VALUES
(6, '0869370492', '144202');

-- --------------------------------------------------------

--
-- Table structure for table `app_form_client`
--

CREATE TABLE `app_form_client` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `MaBan` int(11) NOT NULL,
  `note` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `unread` tinyint(1) NOT NULL,
  `sdt` char(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `isReceived` tinyint(1) NOT NULL,
  `isAccept` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `app_form_client`
--

INSERT INTO `app_form_client` (`id`, `full_name`, `MaKhoa`, `MaBan`, `note`, `create_at`, `unread`, `sdt`, `email`, `isReceived`, `isAccept`) VALUES
(1, 'Hoàng Thảo Mai', 1, 1, 'Bằng sự nhiệt huyết, em sẽ đóng góp và tạo ra   giá trị', '2023-06-05 07:00:00', 1, '0869370492', 'anhkho881@gmail.com', 1, 0),
(2, 'Nguyễn Thị Dung ', 2, 2, 'em sẽ cố gắng hết mình', '2023-06-18 00:00:00', 1, '0869370492', 'dung@gmail.com', 1, 1),
(3, 'Hoàng Văn Thắng ', 3, 3, 'Đồng hành cùng IT Supporter là 1 vinh dự đối với em', '2023-06-07 08:00:00', 1, '0869370492', 'hoang@gmail.com', 1, 1),
(4, 'Hoàng Thảo Linh', 1, 2, 'hihi', '2023-06-07 06:00:00', 1, '0869370492', 'linh@gmail.com', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_form_server`
--

CREATE TABLE `app_form_server` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `end_time` datetime NOT NULL,
  `image_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_form_server`
--

INSERT INTO `app_form_server` (`id`, `title`, `content`, `end_time`, `image_url`) VALUES
(1, 'Tuyển Thành Viên  Mùa Thứ 15', 'Sân chơi dành cho các bạn có đam mê về quay phim, media, sửa chữa kĩ thuật phần mềm,  phần cứng', '2023-06-10 23:59:59', '999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `MaBan` int(11) NOT NULL,
  `TenBan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`MaBan`, `TenBan`) VALUES
(1, 'Ban Sự Kiện'),
(2, 'Ban Truyền Thông'),
(3, 'Ban Kỹ Thuật');

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `MaCV` int(11) NOT NULL,
  `TenCV` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chuc_vu`
--

INSERT INTO `chuc_vu` (`MaCV`, `TenCV`) VALUES
(1, 'Admin'),
(2, 'Thành Viên'),
(3, 'Thủ Quỹ'),
(4, 'CTV');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_url`) VALUES
('346104065_1436663207137088_7737948052969564715_n.jpg'),
('346104065_1436663207137088_7737948052969564715_n.jpg'),
('346104065_1436663207137088_7737948052969564715_n.jpg'),
('346104065_1436663207137088_7737948052969564715_n.jpg'),
('Capture6.PNG'),
('Capture6.PNG'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
(''),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg'),
('999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` int(11) NOT NULL,
  `TenKhoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`) VALUES
(1, 'Công Nghệ Thông Tin'),
(2, 'Kỹ Thuật Phần Mềm'),
(3, 'Khoa Học Máy Tính');

-- --------------------------------------------------------

--
-- Table structure for table `repair_form`
--

CREATE TABLE `repair_form` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` char(10) NOT NULL,
  `tinh_trang` varchar(200) NOT NULL,
  `mo_ta` varchar(500) NOT NULL,
  `create_at` datetime NOT NULL,
  `unread` tinyint(1) NOT NULL,
  `repair_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_form`
--

INSERT INTO `repair_form` (`id`, `full_name`, `sdt`, `tinh_trang`, `mo_ta`, `create_at`, `unread`, `repair_status`) VALUES
(1, 'Nguyễn Thị Dung ', '0869370492', 'lap không lên nguồn', 'Mình đang dùng bình thường thì máy bị tắt nguồn. Mình đã cố gắng thử cắm sạc nhưng bất thành', '2023-06-06 07:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `su_kien`
--

CREATE TABLE `su_kien` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL,
  `create_at` datetime NOT NULL,
  `unread` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `su_kien`
--

INSERT INTO `su_kien` (`id`, `title`, `image_url`, `content`, `create_at`, `unread`) VALUES
(1, 'Sự kiện chào đón tân sinh viên khóa K17', '144202.jpg', 'Chuỗi hoạt động chào mừng tân sinh viên khóa K17 được tổ chức tại cơ sở Hà Nam. Các trưởng ban chú ý phân công nhiệm vụ cho các thành viên.Đôn đốc để hoat động được diễn ra 1 cách tốt đẹp', '2023-06-05 14:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account_id` int(11) NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` bit(1) NOT NULL,
  `MaCV` int(1) NOT NULL COMMENT '1(Admin), 2(Member),3(Thủ quỹ), 4(CTV)))',
  `status` bit(1) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_joining` date NOT NULL,
  `MaBan` int(1) NOT NULL COMMENT 'ban 1(sự kiện), ban 2(truyền thông), ban 3(kĩ thuật))',
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaKhoa` int(11) NOT NULL COMMENT '1(CNTT), 2(KTPM), 3(KHMT))',
  `phone_number` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account_id`, `avatar`, `full_name`, `gender`, `MaCV`, `status`, `email`, `date_of_joining`, `MaBan`, `address`, `MaKhoa`, `phone_number`) VALUES
(6, '999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De (1).jpg', 'Vũ Đình Dũng', b'0', 1, b'1', 'anhkho881@gmail.com', '2021-03-27', 1, 'Hải Dương', 1, '0869370492');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_form_client`
--
ALTER TABLE `app_form_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_form_server`
--
ALTER TABLE `app_form_server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`MaBan`);

--
-- Indexes for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Indexes for table `repair_form`
--
ALTER TABLE `repair_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_kien`
--
ALTER TABLE `su_kien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `account_id_2` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `app_form_client`
--
ALTER TABLE `app_form_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_form_server`
--
ALTER TABLE `app_form_server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `MaBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `MaCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `MaKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `repair_form`
--
ALTER TABLE `repair_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `su_kien`
--
ALTER TABLE `su_kien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
