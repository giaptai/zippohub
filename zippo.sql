-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.16

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
(187580696, 866, 1, 1200),
(187580696, 1172, 1, 15000),
(187580696, 2102, 1, 2000),
(187580696, 6142, 1, 1000),
(187580696, 6221, 1, 1000),
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
(1332579308, 1370, 1, 400000),
(1399365132, 6142, 1, 1000),
(1399365132, 7008, 1, 10000),
(1638417013, 1172, 1, 15000),
(1638417013, 4246, 1, 2300),
(1638417013, 6142, 1, 1000),
(1765725995, 866, 1, 1200),
(1897988423, 866, 1, 1200),
(1897988423, 1172, 5, 75000),
(1897988423, 2102, 2, 4000),
(1897988423, 2397, 1, 1200000),
(1897988423, 6704, 1, 150);

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
(98648, 1410, 'Le Mai Tran', '0923301414', '99 An Dương Vương, Phường 16, Quận 8'),
(98648, 1598, 'Le Mai Tran', '0921148541', '99 An Dương Vương, Phường 16, Quận 8'),
(22659, 3933, 'Le Ngoc Toan', '0921141215', '23 Pham Ngu Lao, Phuong 4, Quan 3, TP HCM'),
(2165, 5090, 'Nguyễn Mai Như', '0921145127', '99 An Dương Vương, Phường 16, Quận 8'),
(2165, 5483, 'Nguyễn Mai Như', '0921145124', '99 An Dương Vương, Phường 16, Quận 8'),
(2165, 6673, 'Yên Như', '0321451252', '99 An Dương Vương, Phường 16, Quận 8'),
(98648, 7295, 'Le Mai Tran', '0922201315', '99 An Dương Vương, Phường 16, Quận 8'),
(98648, 8668, 'Nguyễn Mai Như', '0921145120', '99 An Dương Vương, Phường 16, Quận 8');

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
(1, 1, '2022-04-16 04:30:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(2, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(3, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Chờ xác nhận'),
(4, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Chờ xác nhận'),
(5, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Chờ xác nhận'),
(6, 1, '2022-03-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(7, 1, '2022-01-19 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(8, 1, '2022-02-25 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(9, 1, '2022-01-24 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(10, 1, '2022-01-31 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(11, 1, '2022-02-03 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(12, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Chờ xác nhận'),
(13, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Chờ xác nhận'),
(14, 1, '2022-04-16 00:00:00', 'Tran Van Long', '0120125415', '12 Pham Ngu Lao,Phương 2, Quan 5', 5, '', 50000, 'Đã xác nhận'),
(113, 98648, '2022-04-13 13:50:17', '20-04-2022 04:23:19', 'Lê Yến Như', '0361152456', 99, '', 2000, 'Đã xác nhận'),
(114, 98648, '0000-00-00 00:00:00', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(115, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(116, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(117, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(118, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(119, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(120, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(121, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(122, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(123, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(124, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(125, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(126, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(127, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(128, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(129, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(130, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Đã xác nhận'),
(131, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(132, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 2, '', 2000, 'Chờ xác nhận'),
(187580696, 98648, '2022-04-20 04:23:19', 'Lê Yến Như', '0361152456', '99 An Duong Vuong', 5, '', 50200, 'Chờ xác nhận'),
(846361283, 2165, '2022-04-13 04:56:21', 'Lê Yến Như', '0361152456', '6 An Dương Vương, Phường 16, quận 8', 12, '22bcee49lt', 17700, 'Đã hủy'),
(847038860, 2165, '2022-04-16 02:33:22', 'Lê Thị Tuyết Sen', '0921101525', '99 An Dương Vương, Phường 16, quận 8', 4, '22bcee49lt', 102800, 'Đã giao'),
(1002835636, 2165, '2022-02-12 14:00:06', 'Trần Như', '0152241451', '6 An Dương Vương, Phường 16, quận 8', 18, '22bcee49lt', 24200, 'Đã xác nhận'),
(1233344838, 2397, '2022-04-16 02:57:53', 'Trần Đình Lâm', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 10, '', 50600, 'Đang giao'),
(1332579308, 98648, '2022-04-21 02:01:12', 'Quốc Việt', '0361121414', '6 An Duong Vuong', 1, '22bcee49lt', 398000, 'Chờ xác nhận'),
(1399365132, 2397, '2022-04-16 03:09:50', 'Trần Đình Lâm', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 2, '', 41000, 'Chờ xác nhận'),
(1638417013, 2165, '2022-04-18 09:03:55', 'Lê Thị Tuyết Sen', '0921142152', '99 An Dương Vương, Phường 16, quận 8', 3, '', 48300, 'Đã xác nhận'),
(1765725995, 2165, '2022-03-08 06:06:48', 'Lê Thị Tuyết Sen', '0921101525', '99 An Dương Vương, Phường 16, quận 8', 1, '', 31200, 'Đã xác nhận'),
(1897988423, 2165, '2022-04-18 05:30:33', 'Lê Yến Như', '0361152456', '6 An Dương Vương, Phường 16, quận 8', 10, '', 1310350, 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `makhuyenmai`
--

CREATE TABLE `makhuyenmai` (
  `id_user` int(11) DEFAULT NULL,
  `id_khuyenmai` varchar(100) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `ngayhethan` date NOT NULL,
  `giamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makhuyenmai`
--

INSERT INTO `makhuyenmai` (`id_user`, `id_khuyenmai`, `trangthai`, `ngayhethan`, `giamgia`) VALUES
(98648, '1f07fpzsvp', 1, '2022-04-22', 1500000),
(NULL, '55e3fmkxdh', 1, '2022-04-22', 1500000),
(98648, '86tflzmwuml', 1, '2022-04-22', 1500000),
(NULL, '8qjfqqodz8j', 1, '2022-04-22', 1500000),
(98648, '8skf4mn8is', 1, '2022-04-22', 1500000),
(98648, 'cvetyyv7fui', 1, '2022-04-22', 1500000),
(NULL, 'iw3h4ltkra', 0, '2022-04-07', 222222),
(NULL, 'jztjllps6v', 0, '2022-04-20', 120000),
(98648, 'l5n0gxtg6f', 1, '2022-04-22', 1500000),
(98648, 'mp9veeeykl', 0, '2022-04-27', 1500000),
(98648, 'np3k98dnmz', 1, '2022-04-22', 1500000),
(NULL, 'p23a2rmaxf', 1, '2022-04-22', 1500000),
(98648, 'p9y5cjadzs', 1, '2022-04-22', 1500000),
(NULL, 'r07jqnjty3', 1, '2022-04-30', 1500000),
(NULL, 'rk7m0nrb8x', 1, '2022-04-22', 1500000),
(98648, 'rzmp95k7zu', 1, '2022-04-22', 200000),
(NULL, 'tfpnojv2dh', 1, '2022-04-22', 1500000),
(98648, 'toankontum', 1, '2022-04-14', 15000),
(NULL, 'va473qqkv4', 1, '2022-04-22', 1500000),
(98648, 'XUANHOAI', 1, '2022-04-14', 10000);

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
(9, 1399365132, 41000, 'Thanh toán đơn hàng', '00', '13726461', 'NCB', '2022-04-16 08:10:07'),
(10, 1897988423, 1310350, 'Thanh toán đơn hàng', '00', '13726878', 'NCB', '2022-04-18 10:30:54'),
(11, 1638417013, 48300, 'Thanh toán đơn hàng', '00', '13727133', 'NCB', '2022-04-18 02:04:12'),
(12, 187580696, 50200, 'Thanh toán đơn hàng', '00', '13728932', 'NCB', '2022-04-20 09:23:37'),
(13, 1332579308, 398000, 'Thanh toán đơn hàng', '00', '13730830', 'NCB', '2022-04-21 07:01:38');

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
(1370, 'sexy3.jpg', 'sexy 3', 1, 400000, 'Zippo Armor', 'Đồng', 'Hàn Quốc', 'sexy 3', 1),
(2520, 'havi1.jpg', 'havi 1', 1, 150000000, 'Zippo Base Models', 'Vàng', 'Nhật Bản', 'haivi 1', 1),
(2614, 'sexy6.jpg', 'sexy 6', 1, 1800000, 'Zippo Base Models', 'Bạc', 'Hàn Quốc', 'sexy 6', 1),
(3571, 'havi3.jpg', 'havi3 ', 1, 230000000, 'Zippo Sterling Silver', 'Vàng', 'Hàn Quốc', 'havi 3', 1),
(3901, 'toan4.jpg', 'toàn a còng', 1, 1, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'toàn cậu bé đạo lý', 1),
(4238, 'havi4.jpg', 'hai vi 4', 1, 120000000, 'Zippo Armor', 'Vàng', 'Hàn Quốc', 'havi 4', 1),
(4560, '72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg', 'zippo 1', 15, 150000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'zippo 1', 1),
(4580, 'havi2.jpg', 'havi 2', 1, 180000000, 'Zippo Base Models', 'Vàng', 'Nhật Bản', 'havi 2', 1),
(6921, 'sexy4.jpg', 'sexy 4', 1, 800000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'sexy 4', 1),
(7534, 'tung1.jpg', 'tùng núi', 1, 1, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 'cậu bé núi rừng', 1),
(8330, 'tung2.jpg', 'tùng thanh lịch', 1, 1, 'Zippo Armor', 'Bạc', 'Hàn Quốc', 'tùng lịt', 1),
(8781, 'sexy5.jpg', 'sexy 5', 1, 1200000, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 'sexy 5 2022', 1),
(8865, 'sexy2.jpg', 'sexy 2 2022', 1, 500000, 'Zippo Armor', 'Đồng', 'Nhật Bản', 'sexy 2', 1),
(8881, 'tung3.jpg', 'tùng dẹo', 1, 1, 'Zippo Sterling Silver', 'Bạc', 'Hàn Quốc', 'chấm hỏi', 1),
(9807, 'sexy1.jpg', 'sexy 1', 1, 150000000, 'Zippo Armor', 'Bạc', 'Hàn Quốc', 'sexy 1', 1);

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
(2165, 'Nguyễn Mai Như', 'mainhu123@gmail.com', '123456', '0921145127', '99 An Dương Vương, Phường 16, Quận 8', 0),
(2397, 'Trần Đình Lâm', 'lamlonton2000@gmail.com', '123213123', '0258121302', '120 Phạm Văn Đồng,tổ 10,  Phường 4, quận Bình Thạn', 0),
(3478, 'Phạm Ngọc Quang', 'quangqang123@gmail.com', '123456', '0215540201', '123 An Lạc, Phường 13, Quận 8', 0),
(22211, 'Lê Yến Như', 'tuyet2001@gmail.com', '123456', '0361152456', '99 An Duong Vuong, Phuong 16, Quan 8, TP HCM', 1),
(22659, 'Le Ngoc Toan', 'tien23851@gmail.com', 'tiendaide', '0921141215', '23 Pham Ngu Lao, Phuong 4, Quan 3, TP HCM', 1),
(28539, 'Lê Yến Như', 'tuyet2001@gmail.com', '123456', '0361152456', '99 An Duong Vuong', 1),
(32583, 'Lê Yến Như', 'tuyet2001@gmail.com', '123456', '0361152456', '99 An Duong Vuong', 1),
(50521, 'Lê Yến Như', 'tuyet2001@gmail.com', '123456', '0361152456', '99 An Duong Vuong', 1),
(66194, 'Lê Yến Như', 'tuyet2001@gmail.com', '123456', '0361152456', '99 An Duong Vuong', 1),
(86738, 'Tran Thi Tuyet Mai', 'tuyetmai@gmail.com', '123', '0321124854', '23 Pham Ngu Lao, Phuong 4, Quan 3, TP HCM', 1),
(98648, 'Lê Yến Như', 'tuyet2001@gmail.com', '123456', '0361121414', '99 An Duong Vuong, Phường 16, Quận 8', 1);

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
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `ResetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
