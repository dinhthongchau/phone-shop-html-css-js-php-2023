-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 08:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_iphone_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`) VALUES
(1, 1, 'IP 15 SERIES'),
(2, 1, 'IP 14 SERIES'),
(3, 1, 'IP 13 SERIES'),
(4, 3, 'APPLE WATCH 9 SERIES  '),
(5, 0, 'MAC 2024 SERIESs'),
(6, 1, 'IP 12 SERIES'),
(7, 1, 'IP 11 SERIES'),
(10, 0, 'a'),
(12, 7, 'ip2'),
(13, 8, 'IPHONE 15 SERIES'),
(14, 10, 'IPHONE 15 SERIES'),
(15, 0, 'IPHONE 14SERIES'),
(16, 10, 'IP 14 SERIES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'IPHONE '),
(3, 'APPLE WATCH'),
(9, 'MACBOOK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_full_name` varchar(255) NOT NULL,
  `customer_phone_number` int(11) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_ward` varchar(255) NOT NULL,
  `customer_district` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_full_name`, `customer_phone_number`, `customer_address`, `customer_ward`, `customer_district`, `customer_city`, `customer_id`) VALUES
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 11),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 27),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 28),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 29),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 30),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 31),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 32),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 33),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 34),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 35),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 36),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 37),
('Thông', 559607124, 'qweqw qwe', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 38),
('Thông', 559607124, 'Số nhà 11 ', 'Phường Nam Đồng', 'Thành phố Hải Dương', 'Tỉnh Hải Dương', 39),
('Thông', 889281103, 'test đt', 'Phường Nông Tiến', 'Thành phố Tuyên Quang', 'Tỉnh Tuyên Quang', 40),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 41),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 42),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 43),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 44),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 45),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 46),
('Thông', 559607124, 'Số nhà 1123123', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 47),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Quang Trung', 'Thành phố Hà Giang', 'Tỉnh Hà Giang', 48),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Quang Trung', 'Thành phố Hà Giang', 'Tỉnh Hà Giang', 49),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Quang Trung', 'Thành phố Hà Giang', 'Tỉnh Hà Giang', 50),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Quang Trung', 'Thành phố Hà Giang', 'Tỉnh Hà Giang', 51),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Quang Trung', 'Thành phố Hà Giang', 'Tỉnh Hà Giang', 52),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Quang Trung', 'Thành phố Hà Giang', 'Tỉnh Hà Giang', 53),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Vĩnh Phúc', 'Quận Ba Đình', 'Thành phố Hà Nội', 54),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Vĩnh Phúc', 'Quận Ba Đình', 'Thành phố Hà Nội', 55),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Vĩnh Phúc', 'Quận Ba Đình', 'Thành phố Hà Nội', 56),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Vĩnh Phúc', 'Quận Ba Đình', 'Thành phố Hà Nội', 57),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Hàng Mã', 'Quận Hoàn Kiếm', 'Thành phố Hà Nội', 58),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Hàng Mã', 'Quận Hoàn Kiếm', 'Thành phố Hà Nội', 59),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Tứ Liên', 'Quận Tây Hồ', 'Thành phố Hà Nội', 60),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Tứ Liên', 'Quận Tây Hồ', 'Thành phố Hà Nội', 61),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Tứ Liên', 'Quận Tây Hồ', 'Thành phố Hà Nội', 62),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Phường Tứ Liên', 'Quận Tây Hồ', 'Thành phố Hà Nội', 63),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Xã Thượng Trưng', 'Huyện Vĩnh Tường', 'Tỉnh Vĩnh Phúc', 64),
('Thông qweqwe', 889281103, 'Số nhà 1123123', 'Xã Ninh Xá', 'Huyện Thuận Thành', 'Tỉnh Bắc Ninh', 65),
('Thông chau', 559607124, 'Số nhà 1123123', 'Phường Hùng Vương', 'Thành phố Phúc Yên', 'Tỉnh Vĩnh Phúc', 66),
('Thông Nguyễn', 559607124, 'Số nhà 11 Nguyễn Văn Cừ', 'Phường An Khánh', 'Quận Ninh Kiều', 'Thành phố Cần Thơ', 67),
('Thông Nguyễn', 559607123, 'Số nhà 11 ', 'Xã Hàm Rồng', 'Huyện Năm Căn', 'Tỉnh Cà Mau', 68),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Quang Trung', 'Huyện Tứ Kỳ', 'Tỉnh Hải Dương', 69),
('Đình Thông', 559607124, 'Số 15 Mậu Thân', 'Xã Long Châu', 'Huyện Yên Phong', 'Tỉnh Bắc Ninh', 70),
('Đình Thông', 559607124, 'Số 15 Mậu Thân', 'Xã Phùng Nguyên', 'Huyện Lâm Thao', 'Tỉnh Phú Thọ', 71),
('Đình Thông', 559607124, 'Số 15 Mậu Thân 1', 'Xã Vân Hà', 'Huyện Việt Yên', 'Tỉnh Bắc Giang', 72),
('Đình Thông', 559607124, 'Số 15 Mậu Thân 1', 'Xã Vân Hà', 'Huyện Việt Yên', 'Tỉnh Bắc Giang', 73),
('Đình Thông', 559607124, 'Số 15 Mậu Thân 1', 'Xã Vân Hà', 'Huyện Việt Yên', 'Tỉnh Bắc Giang', 74),
('Thông Nguyễn', 559607124, 'Số nhà 1123123', 'Xã Long Châu', 'Huyện Yên Phong', 'Tỉnh Bắc Ninh', 75),
('Thông 1', 889281172, 'Số nhà 1123123', 'Xã Tuấn Đạo', 'Huyện Sơn Động', 'Tỉnh Bắc Giang', 76),
('Thông Nguyễn', 889281172, 'Số nhà 1123123', 'Xã Nghĩa Phương', 'Huyện Lục Nam', 'Tỉnh Bắc Giang', 77),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Phường Nam Sơn', 'Thành phố Bắc Ninh', 'Tỉnh Bắc Ninh', 78),
('Qeu Huong', 839072230, 'Cong THPT VInh Xuan', 'Xã Vĩnh Xuân', 'Huyện Trà Ôn', 'Tỉnh Vĩnh Long', 79),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 80),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 81),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 82),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 83),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 84),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 85),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 86),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 87),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 88),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 89),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 90),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 91),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 92),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 93),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 94),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 95),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 96),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 97),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 98),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 99),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 100),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 101),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 102),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tề Lễ', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', 103),
('Quy Huong', 889281102, 'Số nhà 11 ', 'Phường Phong Cốc', 'Thị xã Quảng Yên', 'Tỉnh Quảng Ninh', 104),
('Thông qweqwe', 559607124, 'Số nhà 11 ', 'Xã Sơn Lôi', 'Huyện Bình Xuyên', 'Tỉnh Vĩnh Phúc', 105),
('Thông Nguyễn', 889281172, 'Số nhà 11 ', 'Xã Đông Cửu', 'Huyện Thanh Sơn', 'Tỉnh Phú Thọ', 106),
('', 0, '', '', '', '', 107),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Tân Lập', 'Huyện Thanh Sơn', 'Tỉnh Phú Thọ', 108),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Hiệp Lực', 'Huyện Ninh Giang', 'Tỉnh Hải Dương', 109),
('', 0, '', '', '', '', 110),
('Thông Nguyễn', 559607123, 'Số nhà 11 ', 'Phường Hùng Vương', 'Thành phố Phúc Yên', 'Tỉnh Vĩnh Phúc', 111),
('Thông Nguyễn', 559607123, 'Số nhà 11 ', 'Xã Đại Bái', 'Huyện Gia Bình', 'Tỉnh Bắc Ninh', 112),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Đại Bái', 'Huyện Gia Bình', 'Tỉnh Bắc Ninh', 113),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Long Châu', 'Huyện Yên Phong', 'Tỉnh Bắc Ninh', 114),
('Thông Nguyễn', 559607124, 'Số nhà 1123123', 'Xã Văn Môn', 'Huyện Yên Phong', 'Tỉnh Bắc Ninh', 115),
('Thông Đỗ', 559607124, 'Số nhà 053', 'Xã Đông Cứu', 'Huyện Gia Bình', 'Tỉnh Bắc Ninh', 116),
('Thông chau', 559607124, 'Số nhà 10', 'Xã Hoàng Lâu', 'Huyện Tam Dương', 'Tỉnh Vĩnh Phúc', 117),
('Thông Nguyễn', 559607123, 'Số nhà 11 ', 'Xã Vân Hà', 'Huyện Việt Yên', 'Tỉnh Bắc Giang', 118),
('Thông CTU', 559607999, 'Số nhà 11 ', 'Phường 14', 'Quận 8', 'Thành phố Hồ Chí Minh', 119),
('Thông Châu', 559607124, 'Số nhà 11  3/2', 'Phường Nam Sơn', 'Thành phố Bắc Ninh', 'Tỉnh Bắc Ninh', 120),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Mường Khoa', 'Huyện Tân Uyên', 'Tỉnh Lai Châu', 121),
('Thông Nguyễn', 559607124, 'Số nhà 11 ', 'Xã Mường Cai', 'Huyện Sông Mã', 'Tỉnh Sơn La', 122);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordered`
--

CREATE TABLE `tbl_ordered` (
  `ordered_id` varchar(255) NOT NULL,
  `ordered_name` varchar(255) NOT NULL,
  `ordered_quantity` int(11) NOT NULL,
  `ordered_price` int(40) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ordered`
--

INSERT INTO `tbl_ordered` (`ordered_id`, `ordered_name`, `ordered_quantity`, `ordered_price`, `customer_id`) VALUES
('280424333', 'Iphone 13 256GB - Đen', 1, 20000000, 85),
('280424333', 'Iphone 13 Đen - 256Gb', 1, 16000000, 85),
('280424251', 'Iphone 13 256GB - Đen', 1, 20000000, 88),
('280424251', 'Iphone 13 Đen - 256Gb', 1, 16000000, 88),
('280424165', 'Iphone 13 256GB - Đen', 1, 20000000, 91),
('280424165', 'Iphone 13 Đen - 256Gb', 1, 16000000, 91),
('280424163', 'Iphone 13 256GB - Đen', 1, 20000000, 96),
('280424163', 'Iphone 13 Đen - 256Gb', 1, 16000000, 96),
('280424327', 'Iphone 13 256GB - Đen', 1, 20000000, 99),
('280424327', 'Iphone 13 Đen - 256Gb', 1, 16000000, 99),
('300424355', 'Iphone 13 256GB - Đen', 1, 20000000, 113),
('300424355', 'Iphone 15 Pro 256GB - Xanh', 3, 27000000, 113),
('300424355', 'Iphone 15 Plus 256GB - Hồng', 1, 25000000, 113),
('300424924', 'Iphone 15 Pro Max 256GB - Titan', 1, 30000000, 114),
('030524813', 'Iphone 15 Pro Max 256GB - Titan', 1, 30000000, 116),
('030524813', 'Iphone 12 64Gb - Đỏ 1 ', 2, 8000000, 116),
('030524813', 'Iphone 13 Đen - 256Gb', 1, 16000000, 116),
('030524813', 'Iphone 15 Pro 256GB - Xanh', 2, 27000000, 116),
('030524730', 'Iphone 15 Pro 256GB - Xanh', 1, 27000000, 117),
('040524359', 'Iphone 15 Pro Max 256GB - Titan', 1, 30000000, 118),
('040524548', 'Iphone 15 Pro Max 256GB -Titan', 2, 280000000, 119),
('060524241', 'Iphone 15 Pro Max 256GB - Titan', 1, 29000, 122);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` int(40) NOT NULL,
  `product_price_new` int(40) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_price`, `product_price_new`, `product_desc`, `product_img`) VALUES
(703, 'Iphone 15 Pro 256GB - Xanh', 1, 1, 28000000, 27000000, '<p>IPhone 15 Pro. Được đúc từ titan và trang bị chip<strong> A17 Pro</strong> đột phá, nút Tác Vụ có thể tùy chỉnh, và hệ thống&nbsp;camera chuyên nghiệp linh hoạt hơn.</p>', 'iphone-15-pro-blue-1-2-650x650.png'),
(716, 'Iphone 13 Đen - 256Gb', 1, 3, 18000000, 17000000, '<p>Iphone 13 Đen - 256Gb <strong>likenew</strong></p>', 'iphone-13-black-1-2-3-650x650.png'),
(718, 'Iphone 11 128GB - Trắng', 1, 7, 12000000, 10000000, '<p>Iphone 11 128GB - Trắng likenew</p>', 'iphone-11-white-1-2-3-650x650.png'),
(800, 'Iphone 12 128Gb - Đỏ', 1, 6, 12000000, 9500000, '<p>Iphone 12 - Đỏ <strong>likenew</strong></p>', 'iphone-12-red-1-2-3-650x650.png'),
(806, 'Iphone 11 64GB - Trắng', 1, 7, 12000000, 10000000, '<p>Iphone 11 - Trắng likenew</p>', 'iphone-11-white-1-2-3-650x650.png'),
(807, 'Iphone 12 64gb- Đỏ', 1, 6, 12000000, 9000000, '<p>Iphone 12 - Đỏ <strong>likenew</strong></p>', 'iphone-12-red-1-2-3-650x650.png'),
(808, 'Iphone 14 128Gb - Trắng', 1, 2, 20000000, 18000000, '<p>Iphone 14 - <strong>Trắng</strong></p>', 'iphone-14-white-1-2-650x650.png'),
(809, 'Iphone 13 Đen - 128gb', 1, 3, 18000000, 16000000, '<p>Iphone 13 Đen <strong>likenew</strong></p>', 'iphone-13-black-1-2-3-650x650.png'),
(810, 'Iphone 14 256gb- Trắng', 1, 2, 20000000, 19000000, '<p>Iphone 14 - <strong>Trắng</strong></p>', 'iphone-14-white-1-2-650x650.png'),
(812, 'Iphone 15 Pro 5125b- Xanh', 1, 1, 28000000, 28000000, '<p>IPhone 15 Pro. Được đúc từ titan và trang bị chip<strong> A17 Pro</strong> đột phá, nút Tác Vụ có thể tùy chỉnh, và hệ thống camera chuyên nghiệp linh hoạt hơn.</p>', 'iphone-15-pro-blue-1-2-650x650.png'),
(813, 'Iphone 12 256GB- Đỏ', 1, 6, 12000000, 10000000, '<p>Iphone 12 - Đỏ <strong>likenew</strong></p>', 'iphone-12-red-1-2-3-650x650.png'),
(815, 'Iphone 15 Pro Max 256GB - Titan', 1, 1, 30000, 29000, '<p>Iphone 15 Pro Max 256GB - Titan <strong>mới&nbsp;</strong></p>', 'iphone-15-pro-gold-1-2-650x650.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_img_desc`
--

INSERT INTO `tbl_product_img_desc` (`product_id`, `product_img_desc`) VALUES
(1, 'product2.png'),
(1, 'product3.png'),
(1, 'product4.png'),
(2, 'product2.png'),
(2, 'product3.png'),
(2, 'product4.png'),
(6, 'ip13.png'),
(6, 'ip15.png'),
(71, 'product2.png'),
(71, 'product3.png'),
(702, 'dathongbao.png'),
(703, 'iphone-15-pro-blue-1-650x650..png'),
(703, 'iphone-15-pro-blue-2-650x650.png'),
(704, 'iphone-15-plus-xanh-2-650x650.png'),
(704, 'iphone-15-plus-xanh-3-650x650.png'),
(705, 'iphone-13-den-1-650x650.png'),
(705, 'iphone-13-den-2-650x650.png'),
(706, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(706, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(707, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(708, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(708, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(709, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(709, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(710, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(710, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(711, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(711, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(712, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(712, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(713, 'dathongbao.png'),
(714, 'iphone-11-trang-1-650x650.png'),
(714, 'iphone-11-trang-2-650x650.png'),
(715, 'iphone-12-red-1-650x650.png'),
(715, 'iphone-12-red-2-650x650.png'),
(716, 'iphone-13-den-1-650x650.png'),
(716, 'iphone-13-den-2-650x650.png'),
(717, 'iphone-12-red-1-650x650.png'),
(717, 'iphone-12-red-2-650x650.png'),
(718, 'iphone-11-trang-1-650x650.png'),
(718, 'iphone-11-trang-2-650x650.png'),
(722, 'is.png'),
(723, 'airpod.png'),
(724, 'Screenshot 2023-10-12 145739.png'),
(724, 'Screenshot 2023-10-12 150713.png'),
(725, 'iphone_14_pdp_position-2_design-2-1-650x650.png'),
(725, 'iphone-11-trang-1-650x650.png'),
(725, 'iphone-11-trang-2-650x650.png'),
(726, ''),
(727, ''),
(729, ''),
(739, 'sp2.png'),
(738, 'appstore.png'),
(721, 'airpod.png'),
(720, 'appstore.png'),
(801, ''),
(719, 'yt.png'),
(719, 'zl.png'),
(802, ''),
(803, 'iphone_14_pdp_position-1_starlight_color-1-650x650.png'),
(804, 'search.png'),
(805, 'fb1.png'),
(808, 'iphone_14_pdp_position-1_starlight_color-1-650x650.png'),
(808, 'iphone_14_pdp_position-2_design-2-1-650x650.png'),
(800, 'iphone-12-red-1-650x650.png'),
(800, 'iphone-12-red-2-650x650.png'),
(812, 'iphone-15-pro-blue-1-650x650..png'),
(812, 'iphone-15-pro-blue-2-650x650.png'),
(813, 'iphone-12-red-1-650x650.png'),
(813, 'iphone-12-red-2-650x650.png'),
(806, 'iphone-11-trang-1-650x650.png'),
(806, 'iphone-11-trang-2-650x650.png'),
(807, 'iphone-12-red-1-650x650.png'),
(807, 'iphone-12-red-2-650x650.png'),
(809, 'iphone-13-den-1-650x650.png'),
(809, 'iphone-13-den-2-650x650.png'),
(811, 'iphone-13-den-1-650x650.png'),
(811, 'iphone-13-den-2-650x650.png'),
(810, 'iphone-11-trang-1-650x650.png'),
(810, 'iphone-11-trang-2-650x650.png'),
(814, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(814, 'iphone-15-pro-tu-nhien-2-650x650.png'),
(815, 'iphone-15-pro-tu-nhien-1-650x650.png'),
(815, 'iphone-15-pro-tu-nhien-2-650x650.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_ordered`
--
ALTER TABLE `tbl_ordered`
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=816;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ordered`
--
ALTER TABLE `tbl_ordered`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
