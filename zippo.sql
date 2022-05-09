-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 06:08 PM
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
  `id_hoadon` bigint(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_hoadon`, `id_sanpham`, `amount`, `total`) VALUES
(20220508001920, 1370, 1, 400000),
(20220508001920, 3901, 1, 1),
(20220508014649, 7534, 1, 1),
(20220508014907, 8865, 1, 500000),
(20220508020412, 1370, 2, 800000),
(20220508020412, 8865, 1, 500000),
(20220508033556, 3901, 1, 1),
(20220508033556, 4560, 15, 2250000),
(20220508033556, 7534, 1, 1),
(20220508033556, 8330, 1, 1),
(20220508033556, 8881, 1, 1),
(20220508192926, 6921, 1, 800000),
(20220508192926, 8781, 1, 1200000),
(20220508192926, 8865, 1, 500000),
(20220508193713, 3901, 1, 1),
(20220508193713, 7534, 1, 1),
(20220509102153, 4560, 1, 150000),
(20220509102153, 6921, 1, 800000),
(20220509102153, 8865, 1, 500000),
(20220509102618, 6921, 1, 800000),
(20220509102618, 8865, 1, 500000);

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
  `addr` varchar(100) NOT NULL,
  `loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachikhach`
--

INSERT INTO `diachikhach` (`id_user`, `id_addr`, `name`, `phone`, `addr`, `loai`) VALUES
(12255, 1349, 'Trần Thị Tuyết Mai', '0925501215', '23 Phạm Ngũ Lão, Phường 4, Quan 3, TP HCM', 0),
(97419, 2893, 'Le Mai Tran', '0922201315', '99 An Dương Vương, Phường 16, Quận 8', 0),
(12255, 3196, 'Nguyen Cong Dai', '0821154520', '99 An Dương Vương, Phường 16, Quận 8', 0),
(12255, 3932, 'Yên Như', '0821154522', '99 An Dương Vương, Phường 16, Quận 8', 0),
(97419, 5094, 'Lê Ngọc Toàn', '0921151456', '23 Phạm Ngũ Lão, Phuong 4, Too3, Quận 3, TP Hồ Chí Minh', 1),
(12255, 6174, 'Tran Thi Thanh Mai', '0821154521', '99 An Dương Vương, Phường 16, Quận 8', 0),
(97419, 7652, 'Yên Như', '0921141711', '99 An Dương Vương, Phường 16, Quận 8', 0),
(12255, 9197, 'Nguyen Huu Loi', '0921141712', '99 An Dương Vương, Phường 16, Quận 8', 0),
(97419, 9990, 'Le Mai Tran', '0922201313', '99 An Dương Vương, Phường 16, Quận 8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` bigint(11) NOT NULL,
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
(20220508001920, 97419, '2022-05-08 00:19:20', 'Le Ngoc Toan', '0321124854', '23 Pham Ngu Lao, Phuong 4, Quan 3, TP HCM', 2, '', 430001, 'Đã giao'),
(20220508014649, 97419, '2022-05-08 01:46:49', 'Le Ngoc Toan', '0921151452', '23 Phạm Ngu Lao, Phuong 4, Quan 3, TP HCM', 1, '', 40001, 'Đã xác nhận'),
(20220508014907, 97419, '2022-05-08 01:49:07', 'Le Ngoc Toan', '0921151452', '23 Phạm Ngu Lao, Phuong 4, Quan 3, TP HCM', 1, 'ANHYEU', 10000, 'Đã hủy'),
(20220508020412, 97419, '2022-05-08 02:04:12', 'Le Ngoc Toan', '0921151452', '23 Phạm Ngu Lao, Phuong 4, Quan 3, TP HCM', 3, 'XUANHOAI', 1330000, 'Đã xác nhận'),
(20220508033556, 12255, '2022-05-08 03:35:56', 'Tran Thi Tuyet Mai', '0925501213', '23 Pham Ngu Lao, Phuong 4, Quan 3, TP HCM', 19, '', 2290004, 'Đã hủy'),
(20220508192926, 12255, '2022-05-08 19:29:26', 'Tran Thi Tuyet Mai', '0925501213', '23 Pham Ngu Lao, Phuong 4, Quan 3, TP HCM', 3, '', 2540000, 'Chờ xác nhận'),
(20220508193713, 12255, '2022-05-08 19:37:13', 'Yên Như', '0821154522', '99 An Dương Vương, Phường 16, Quận 8', 2, '', 40002, 'Đã hủy'),
(20220509102153, 97419, '2022-05-09 10:21:53', 'Lê Ngọc Toàn', '0921151456', '23 Phạm Ngũ Lão, Phuong 4, Too3, Quận 3, TP Hồ Chí Minh', 3, '', 1490000, 'Đã giao'),
(20220509102618, 97419, '2022-05-09 10:26:18', 'Lê Ngọc Toàn', '0921151456', '23 Phạm Ngũ Lão, Phuong 4, Too3, Quận 3, TP Hồ Chí Minh', 2, '', 1340000, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai_khachhang`
--

CREATE TABLE `khuyenmai_khachhang` (
  `makhuyenmai` varchar(100) NOT NULL,
  `manguoidung` int(11) NOT NULL,
  `sudung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khuyenmai_khachhang`
--

INSERT INTO `khuyenmai_khachhang` (`makhuyenmai`, `manguoidung`, `sudung`) VALUES
('ANHYEU', 12255, 1),
('ANHYEU', 97419, 0);

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
('1f07fpzsvp', 0, '2022-05-10', 1500000),
('8qjfqqodz8j', 0, '2022-04-22', 1500000),
('8skf4mn8is', 0, '2022-04-22', 1500000),
('ANHYEU', 1, '2022-05-22', 1500000),
('cvetyyv7fui', 0, '2022-04-22', 1500000),
('iw3h4ltkra', 0, '2022-04-07', 222222),
('jztjllps6v', 0, '2022-04-20', 120000),
('l5n0gxtg6f', 0, '2022-04-22', 1500000),
('p23a2rmaxf', 0, '2022-04-22', 1500000),
('p9y5cjadzs', 0, '2022-04-22', 1500000),
('r07jqnjty3', 0, '2022-04-30', 1500000),
('rk7m0nrb8x', 0, '2022-04-22', 1500000),
('toankontum', 0, '2022-04-14', 15000),
('va473qqkv4', 0, '2022-04-22', 1500000);

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
(46, 20220508001920, 430001, 'Thanh toán đơn hàng', '00', '13741139', 'NCB', '2022-05-08 00:19:20'),
(47, 20220508014649, 40001, 'Thanh toán đơn hàng', '00', '13741142', 'NCB', '2022-05-08 01:46:49'),
(48, 20220508014907, 10000, 'Thanh toán đơn hàng', '00', '13741143', 'NCB', '2022-05-08 01:49:07'),
(49, 20220508020412, 1330000, 'Thanh toán đơn hàng', '00', '13741144', 'NCB', '2022-05-08 02:04:12'),
(50, 20220508033556, 2290004, 'Thanh toán đơn hàng', '00', '13741145', 'NCB', '2022-05-08 03:35:56'),
(51, 20220508192926, 2540000, 'Thanh toán đơn hàng', '00', '13741294', 'NCB', '2022-05-08 19:29:26'),
(52, 20220508193713, 40002, 'Thanh toán đơn hàng', '00', '13741296', 'NCB', '2022-05-08 19:37:13'),
(53, 20220509102153, 1490000, 'Thanh toán đơn hàng', '00', '13741599', 'NCB', '2022-05-09 10:21:53'),
(54, 20220509102618, 1340000, 'Thanh toán đơn hàng', '00', '13741610', 'NCB', '2022-05-09 10:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `ResetID` int(11) NOT NULL,
  `ResetEmail` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ResetSelector` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `ResetToken` varchar(60) COLLATE utf8_vietnamese_ci NOT NULL,
  `ResetExpire` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`ResetID`, `ResetEmail`, `ResetSelector`, `ResetToken`, `ResetExpire`) VALUES
(33, 'hentaiktvn321@gmail.com', 'a7ece1bea02dfc2f', '$2y$10$tr8hluNyE1H7MmLc5KBMo.D.FSYo/p.XwpRZJsEqQ1cVy.2oituG.', '1652091168');

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
  `intro` varchar(250) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `img`, `name`, `amount`, `price`, `category`, `material`, `madeby`, `intro`, `state`) VALUES
(1370, '72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg', 'Zippo maj vangf', 22, 40000, 'Zippo Armor', 'Đồng', 'Hàn Quốc', 'sadasdasdas', 1),
(2520, '19047-800x800-2-768x768.jpg', 'Zippo hải long', 1, 15000000, 'Zippo Base Models', 'Vàng', 'Nhật Bản', 'sdsdsd', 1),
(2614, '29964-1-1-768x768.jpg', 'Zippo sọc xanh', 1, 1800000, 'Zippo Base Models', 'Bạc', 'Hàn Quốc', 'sdsdsdsdsd', 1),
(3571, '49036-1-768x768.jpg', 'Zippo N4', 1, 23000000, 'Zippo Sterling Silver', 'Vàng', 'Hàn Quốc', 'fdfdfdfsdcdcd', 1),
(3901, '49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg', 'Zippo caribe', 1, 1, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'toàn cậu bé đạo lý', 1),
(4238, '49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg', 'Zippo thiên chúa', 1, 12000000, 'Zippo Armor', 'Vàng', 'Hàn Quốc', 'sdsdsdsd', 1),
(4560, '72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg', 'zippo 1', 15, 150000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'zippo 1', 1),
(4580, '49805-1-768x768.jpg', 'Zippo la bàn núi', 1, 18000000, 'Zippo Base Models', 'Vàng', 'Nhật Bản', 'dsdsdsds', 1),
(6921, '49809-1-768x768.jpg', 'Zippo moon knight', 1, 800000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'sexy 4', 1),
(7534, '49810-5-300x300.jpg', 'Zippo sông tĩnh lặng', 1, 1, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 'cậu bé núi rừng', 1),
(8330, 'bat-lua-zippo-bac-co-tron-vo-day-1208262914_crop_both_1531743984.jpg', 'Zippo cơ bản 1', 1, 1, 'Zippo Armor', 'Bạc', 'Hàn Quốc', 'tùng lịt', 1),
(8781, 'bat-lua-zippo-bac-khoi-cao-cap-khac-hinh-quan-van-truong-armor-597860668_crop_both_1543043201.jpg', 'Zippo Quan Vũ', 1, 1200000, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 'sdsdssdsxcscsc', 1),
(8865, 'bat-lua-zippo-bac-nguyen-khoi-cao-cap-khac-ong-tho-dia-vo-day-ban-armor-1586501312_crop_both_1585041859.jpg', 'Zippo Thánh công', 1, 500000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'dsdsfedfdv', 1),
(8881, 'bat-lua-zippo-chinh-hang-dong-tron-254b-1315829986_crop_both_1531745802.jpg', 'Zippo cơ bản trơn', 1, 1, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 'sdsdsdsscsc', 1);

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
(12255, 'Trần Thị Tuyết Mai', 'tuyet2002@gmail.com', '123456', '0925501215', '23 Phạm Ngũ Lão, Phường 4, Quan 3, TP HCM', 1),
(97419, 'Lê Ngọc Toàn', 'hentaiktvn321@gmail.com', '123456', '0921151456', '23 Phạm Ngũ Lão, Phuong 4, Too3, Quận 3, TP Hồ Chí Minh', 1);

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
  ADD PRIMARY KEY (`id_hoadon`);

--
-- Indexes for table `khuyenmai_khachhang`
--
ALTER TABLE `khuyenmai_khachhang`
  ADD PRIMARY KEY (`makhuyenmai`,`manguoidung`),
  ADD KEY `manguoidung` (`manguoidung`);

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
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`ResetID`);

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
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `ResetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khuyenmai_khachhang`
--
ALTER TABLE `khuyenmai_khachhang`
  ADD CONSTRAINT `khuyenmai_khachhang_ibfk_1` FOREIGN KEY (`makhuyenmai`) REFERENCES `makhuyenmai` (`id_khuyenmai`),
  ADD CONSTRAINT `khuyenmai_khachhang_ibfk_2` FOREIGN KEY (`manguoidung`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
