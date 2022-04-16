-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 05:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zippo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_hoadon`, `id_sanpham`, `amount`, `total`) VALUES
(846361283, 866, 1, 1200),
(846361283, 1172, 4, 6000),
(846361283, 2102, 5, 10000),
(846361283, 2397, 1, 1500),
(846361283, 6221, 1, 1000),
(847038860, 1172, 1, 1500),
(847038860, 4246, 1, 2300),
(847038860, 6142, 1, 1000),
(847038860, 7150, 1, 100000),
(1002835636, 866, 1, 1200),
(1002835636, 1172, 16, 24000),
(1002835636, 6221, 1, 1000),
(1233344838, 1172, 1, 1500),
(1233344838, 2102, 1, 2000),
(1233344838, 4246, 7, 16100),
(1233344838, 6142, 1, 1000),
(1399365132, 6142, 1, 1000),
(1399365132, 7008, 1, 10000),
(1765725995, 866, 1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Zippo Armor'),
(2, 'Zippo Sterling Silver'),
(3, 'Zippo Base Models');

-- --------------------------------------------------------

--
-- Table structure for table `diachikhach`
--

CREATE TABLE `diachikhach` (
  `id_user` int(11) NOT NULL,
  `id_addr` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `addr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachikhach`
--

INSERT INTO `diachikhach` (`id_user`, `id_addr`, `name`, `phone`, `addr`) VALUES
(2165, 3883, 'Chong Jong Choo', '0921101528', '150 An Dương Vương, Phường 10, Quận 8'),
(2165, 5846, 'Trần Như', '0152241451', '6 An Dương Vương, Phường 16, quận 8'),
(2165, 7664, 'Lê Yến Như', '0361152456', '6 An Dương Vương, Phường 16, quận 8'),
(2165, 8234, 'Ngô Quốc Đại', '0148854141', '6 An Dương Vương, Phường 16, quận 8');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ngaymua` datetime NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_product` int(11) NOT NULL,
  `magiamgia` varchar(100) DEFAULT NULL,
  `total_money` int(11) NOT NULL,
  `statuss` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hoadon`, `id_user`, `ngaymua`, `fullname`, `phone`, `address`, `total_product`, `magiamgia`, `total_money`, `statuss`) VALUES
(846361283, 2165, '2022-04-13 04:56:21', 'Lê Yến Như', '0361152456', '6 An Dương Vương, Phường 16, quận 8', 12, '22bcee49lt', 17700, 'Đã hủy'),
(847038860, 2165, '2022-04-16 02:33:22', 'Lê Thị Tuyết Sen', '0921101525', '99 An Dương Vương, Phường 16, quận 8', 4, '22bcee49lt', 102800, 'Đã giao'),
(1002835636, 2165, '0000-00-00 00:00:00', 'Trần Như', '0152241451', '6 An Dương Vương, Phường 16, quận 8', 18, '22bcee49lt', 24200, 'Chờ xác nhận'),
(1233344838, 2397, '2022-04-16 02:57:53', 'Trần Đình Lâm', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 10, '', 50600, 'Đang giao'),
(1399365132, 2397, '2022-04-16 03:09:50', 'Trần Đình Lâm', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 2, '', 41000, 'Chờ xác nhận'),
(1765725995, 2165, '2022-03-08 06:06:48', 'Lê Thị Tuyết Sen', '0921101525', '99 An Dương Vương, Phường 16, quận 8', 1, '', 31200, 'Đã xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `makhuyenmai`
--

CREATE TABLE `makhuyenmai` (
  `id_khuyenmai` varchar(100) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `ngayhethan` date NOT NULL,
  `giamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makhuyenmai`
--

INSERT INTO `makhuyenmai` (`id_khuyenmai`, `trangthai`, `ngayhethan`, `giamgia`) VALUES
('22bcee49lt', 1, '2022-03-19', 32000),
('7p2xkezib', 1, '2022-03-19', 33000),
('8qmd6zrpzl', 1, '2022-04-15', 50000),
('96w8z319vz', 0, '2022-03-19', 21000),
('apw8rcst1i', 1, '2022-03-24', 12000),
('bm50k0nr4w', 1, '2022-03-19', 13000),
('ci8a89ecsp', 1, '2022-03-19', 52000),
('cxjpxsrccz', 1, '2022-03-19', 11000),
('g0z51eyjne', 1, '2022-03-19', 12000),
('g2q9jlt05z', 1, '2022-03-19', 15000),
('gh2ca27rey', 1, '2022-03-29', 12000),
('izg4cgle7d', 1, '2022-03-19', 22000),
('kbnbz8issj', 1, '2022-03-19', 32000),
('mdph8pxm7a', 1, '2022-03-19', 17000),
('toankontum', 1, '2022-04-14', 15000),
('XUANHOAI', 1, '2022-04-14', 10);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` bigint(11) DEFAULT NULL,
  `Total` int(11) NOT NULL,
  `Note` varchar(255) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `vnp_response_code` varchar(5) NOT NULL,
  `code_vnpay` varchar(255) NOT NULL COMMENT '\r\n\r\n',
  `BankCode` varchar(255) NOT NULL,
  `PaymentTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `OrderID`, `Total`, `Note`, `vnp_response_code`, `code_vnpay`, `BankCode`, `PaymentTime`) VALUES
(3, 1002835636, 24200, 'Thanh toán đơn hàng', '00', '13723525', 'NCB', '2022-04-13 12:50:45'),
(4, 846361283, 17700, 'Thanh toán đơn hàng', '00', '13723640', 'NCB', '2022-04-13 09:56:41'),
(5, 846361283, 17700, 'Thanh toán đơn hàng', '00', '13723640', 'NCB', '2022-04-13 09:56:41'),
(6, 1765725995, 31200, 'Thanh toán đơn hàng', '00', '13723742', 'NCB', '2022-04-13 11:07:15'),
(7, 847038860, 102800, 'Thanh toán đơn hàng', '00', '13726456', 'NCB', '2022-04-16 07:33:47'),
(8, 1233344838, 50600, 'Thanh toán đơn hàng', '00', '13726458', 'NCB', '2022-04-16 07:58:06'),
(9, 1399365132, 41000, 'Thanh toán đơn hàng', '00', '13726461', 'NCB', '2022-04-16 08:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `material` varchar(20) NOT NULL,
  `madeby` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `img`, `name`, `amount`, `price`, `category`, `material`, `madeby`, `state`) VALUES
(866, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'zippo 8/3', 20, 1200, 'Zippo Sterling Silver', ' Bạc', 'Hàn Quốc', 1),
(1172, '72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg', 'zippo hoang sa', 15, 1500, 'Zippo Armor', ' Đồng', 'Nhật Bản', 1),
(2102, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'zippo 555', 15, 2000, 'Zippo Base Models', ' Vàng', 'Nhật Bản', 1),
(2397, '49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg', 'zippo truong sa', 15, 1500, 'Zippo Sterling Silver', ' Bạc', 'Hàn Quốc', 1),
(4246, 'nvt9hbyl6nlsaaa8kwsr_1024x1024-400x400.jpg', 'zippo 20/10', 0, 2300, 'Zippo Armor', ' Bạc', 'Hàn Quốc', 0),
(6142, '49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg', 'zippo113', 25, 1000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 1),
(6221, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'zippo14', 1, 1000, 'Zippo Sterling Silver', 'Đồng', 'Nhật Bản', 1),
(6704, 'nvt9hbyl6nlsaaa8kwsr_1024x1024-400x400.jpg', 'trademark232333', 1112, 150, 'Zippo Armor', ' Bạc', 'Hàn Quốc', 1),
(7008, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'zippo15', 1, 10000, 'Zippo Sterling Silver', 'Đồng', 'Nhật Bản', 1),
(7024, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'zippo16', 1, 1000000, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 1),
(7056, '49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg', 'zippo ha noi', 12, 1100, 'Zippo Sterling Silver', ' Bạc', 'Hàn Quốc', 1),
(7150, '72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg', 'madeby', 10, 100000, 'Zippo Armor', 'Vàng', 'Hàn Quốc', 1),
(7188, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'zippo17', 1, 10000, 'Zippo Base Models', 'Bạc', 'Hàn Quốc', 1),
(8923, '49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg', 'champa', 25, 1500, 'Zippo Armor', ' Đồng', 'Hàn Quốc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `fullname`, `email`, `password`, `phone`, `address`, `status`) VALUES
(2165, 'Lê Thị Tuyết Sen', 'tuyet2002@gmail.com', '123456', '0921101525', '99 An Dương Vương, Phường 16, quận 8', 0),
(2397, 'Trần Đình Lâm', 'lamlonton2000@gmail.com', '123213123', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 0),
(3478, 'Phạm Ngọc Quang', 'quangqang123@gmail.com', '123456', '0215540201', '123 An Lạc, Phường 13, Quận 8', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_hoadon`,`id_sanpham`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diachikhach`
--
ALTER TABLE `diachikhach`
  ADD PRIMARY KEY (`id_addr`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoadon`,`id_user`);

--
-- Indexes for table `makhuyenmai`
--
ALTER TABLE `makhuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
