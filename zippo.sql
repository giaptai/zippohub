-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 04:21 PM
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
(983809017, 1172, 17, 25500),
(983809017, 4246, 1, 2300),
(983809017, 6142, 1, 1000),
(1152101364, 1172, 17, 25500),
(1152101364, 4246, 1, 2300),
(1152101364, 6142, 1, 1000);

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
(2165, 5915, 'Trần Huỳnh Văn Phố', '0361152456', '99 An Dương Vương, Phường 16, Quận 8');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ngaymua` varchar(11) NOT NULL,
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
(122902, 2165, '11-03-2022', 'Lê Thị Tuyết Sen', '0921114525', '99 An Dương Vương, Phường 16, quận 8', 4, NULL, 3101001, 'Đã xác nhận'),
(183083, 2165, '18-03-2022', 'Chong Jong Choo', '0321121451', '99 An Dương Vương, Phường 16, Quận 8', 3, NULL, 3001001, 'Đã hủy'),
(197662, 2165, '18-03-2022', 'Lê Thị Tuyết Sen', '0921114525', '99 An Dương Vương, Phường 16, quận 8', 11, NULL, 18013001, 'Đã hủy'),
(226490, 2165, '28-03-2022', 'Lê Thị Tuyết Sen', '0921111222', '99 An Dương Vương, Phường 16, quận 8', 44, NULL, 52800, 'Chờ xác nhận'),
(252542, 2165, '28-03-2022', 'Lê Thị Tuyết Sen', '0921111222', '99 An Dương Vương, Phường 16, quận 8', 0, NULL, 0, 'Chờ xác nhận'),
(448474, 2165, '09-03-2022', 'Lee Ngot Toan ', '0921154215', '141Pham Ngu Lao,  Phường 10, Quận 8', 2, NULL, 3000001, 'Đã xác nhận'),
(848300, 2165, '09-03-2022', 'Lê Thị Tuyết', '0923301452', '99 An Dương Vương, Phường 16, quận 8', 7, NULL, 8000004, 'Đã hủy'),
(868250, 2165, '28-03-2022', 'Lê Thị Tuyết Sen', '0921111222', '99 An Dương Vương, Phường 16, quận 8', 0, NULL, 0, 'Chờ xác nhận'),
(916584, 2165, '28-03-2022', 'Lê Thị Tuyết Sen', '0921111222', '99 An Dương Vương, Phường 16, quận 8', 13, NULL, 26000, 'Chờ xác nhận'),
(949579938, 2165, '2022-04-06 ', 'Trần Huỳnh Văn Phố', '0361152456', '99 An Dương Vương, Phường 16, Quận 8', 19, '22bcee49lt', 26800, 'Chờ xác nhận'),
(983809017, 2165, '2022-04-06 ', 'Trần Huỳnh Văn Phố', '0361152456', '99 An Dương Vương, Phường 16, Quận 8', 19, '22bcee49lt', 26800, 'Chờ xác nhận'),
(1152101364, 2165, '2022-04-06 ', 'Trần Huỳnh Văn Phố', '0361152456', '99 An Dương Vương, Phường 16, Quận 8', 19, '22bcee49lt', 26800, 'Chờ xác nhận');

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
('96w8z319vz', 1, '2022-03-19', 21000),
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
(0, 949579938, 26800, 'Thanh toán đơn hàng', '00', '13720008', 'NCB', '2022-04-06 03:40:50');

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
(2165, 'Lê Thị Tuyết Sen', 'tuyet2002@gmail.com', '123456', '0921111222', '99 An Dương Vương, Phường 16, quận 8', 0),
(2397, 'Trần Đình Lâm', 'lamlonton2000@gmail.com', '123213123', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 0),
(3478, 'Phạm Ngọc Quang', 'quangqang123@gmail.com', '123456', '0215540201', '123 An Lạc, Phường 13, Quận 8', 0),
(5739, 'Nguyễn Vĩnh Tiến', 'tiencute123@gmail.com', '123456', '0924418754', '99 An Dương Vương, Phường 16, quận 8', 0),
(8550, 'Ngô Công Lâm', 'lam123@gmail.com', '123456', '0215584745', '99 An Dương Vương, Phường 16, Quận 8', 0),
(8715, 'Lê Ngọc Toàn', 'toanocho321@gmail.com', '123456', '0152414854', '99 An Dương Vương, Phường 16, quận 8', 0),
(28527, 'madeby08', 'made08@gmail.com', '123123', '0823456789', 'asasasadasd1', 1),
(30197, 'madeby04', 'made04@gmail.com', '123123', '0423456789', 'asasasadasd1', 1),
(30805, 'Ngô Công Lâm', 'lamlonton2000@gmail.com', '123456', '0921141215', '99 An Dương Vương, Phường 16, Quận 8', 1),
(33168, 'madeby123123213', 't12312312319@gmail.com', '123123', '12312312323', 'asasa123123', 1),
(39561, 'madeby123123213', 'toa123123123219@gmail.com', '123123', '12312312312', 'asasasasas', 1),
(40919, 'madeby06', 'made06@gmail.com', '123123', '0623456789', 'asasasadasd1', 1),
(46716, 'madeby123123213', 'toan232332n99@gmail.com', '123123', '03845521451', 'asasasasas', 1),
(47757, 'madeby123', 'toanchodien99@gmail.com', '123123', '03845521451', 'asasasasas', 1),
(50239, 'Chong Jong Cho', 'toanchodien@gmail.com', '123456', '0214412145', '12/3A Phan Chu Trinh', 1),
(52035, 'madeby05', 'made05@gmail.com', '123123', '0523456789', 'asasasadasd1', 1),
(56058, 'Nguyễn Giáp Tài', 'tridanchoi113@gmail.com', '123456', '0632251211', '12/4a An Duong Vuong, phuong 16, quan 8', 1),
(57696, 'madeby09', 'made09@gmail.com', '123123', '0923456789', 'asasasadasd1', 1),
(63731, 'madeby07', 'made07@gmail.com', '123123', '0723456789', 'asasasadasd1', 1),
(68837, 'Nguyen Giap Tai', 'tuyet112@gmail.com', '123456', '0124414514', '12/4a An Duong Vuong, phuong 16, quan 8', 1),
(71332, 'madeby03', 'made03@gmail.com', '123123', '0323456789', 'asasasadasd1', 1),
(72905, 'Nguyen Giap Tai', 'tridanchoi@gmail.com', '123456', '0152214145', '12/4a An Duong Vuong, phuong 16, quan 8', 1),
(77393, 'madeby01', 'made01@gmail.com', '123123', '0123456780', '22 Phạm Văn Đồng, phường lê lợi, thành phố kon tum', 1),
(88177, 'Nguyen Giap Tai', 'tridanchoi113@gmail.com', '123456', '0321145214', '12/4a An Duong Vuong, phuong 16, quan 8', 1),
(90290, 'madeby02', 'made02@gmail.com', '123123', '0223456789', 'asasasadasd1', 1),
(92633, 'madeby123123213', 'toan232332n99@gmail.com', '123123', '32323232323', 'asasasasas', 1);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
