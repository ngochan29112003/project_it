-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 04:12 PM
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
-- Database: `lms_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_giang`
--

CREATE TABLE `bai_giang` (
  `ma_bai_giang` int(11) NOT NULL,
  `ten_bai_giang` text DEFAULT NULL,
  `video_path` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `noi_dung_bai_giang` text DEFAULT NULL,
  `id_lop_hoc_phan` int(11) DEFAULT NULL,
  `kiem_tra` int(11) DEFAULT NULL,
  `bai_tap` int(11) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bai_giang`
--

INSERT INTO `bai_giang` (`ma_bai_giang`, `ten_bai_giang`, `video_path`, `link`, `noi_dung_bai_giang`, `id_lop_hoc_phan`, `kiem_tra`, `bai_tap`, `trang_thai`) VALUES
(25, 'Đồ án', 'https://www.youtube.com/watch?v=tkPel6zcw8Q', 'https://ems.vlute.edu.vn/vTKBGiangVien', 'Chúc các em học tốt', 23, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bai_giang_files`
--

CREATE TABLE `bai_giang_files` (
  `bai_giang_id` int(11) NOT NULL,
  `file` text DEFAULT NULL,
  `ma_bai_giang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bai_giang_files`
--

INSERT INTO `bai_giang_files` (`bai_giang_id`, `file`, `ma_bai_giang`) VALUES
(7, 'tttk.docx', 25),
(30, '1733856811_312485546_646407787018023_3176179768033406404_n.jpg', 36);

-- --------------------------------------------------------

--
-- Table structure for table `bai_kiem_tra`
--

CREATE TABLE `bai_kiem_tra` (
  `id_bai_kiem_tra` int(11) NOT NULL,
  `ten_bai_kiem_tra` text DEFAULT NULL,
  `id_lop_hoc_phan` int(11) DEFAULT NULL,
  `thoi_gian` int(11) DEFAULT NULL,
  `so_cau` int(11) DEFAULT NULL,
  `han_chot` datetime DEFAULT NULL,
  `ma_bai_giang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bai_kiem_tra`
--

INSERT INTO `bai_kiem_tra` (`id_bai_kiem_tra`, `ten_bai_kiem_tra`, `id_lop_hoc_phan`, `thoi_gian`, `so_cau`, `han_chot`, `ma_bai_giang`) VALUES
(4, 'kiểm tra 40%', 23, 20, 20, '2024-12-18 08:55:00', 41),
(5, '10%', 23, 1, 10, '2024-12-22 08:22:00', 25);

-- --------------------------------------------------------

--
-- Table structure for table `bai_lam_sinh_vien`
--

CREATE TABLE `bai_lam_sinh_vien` (
  `id` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `id_cau_hoi` int(11) DEFAULT NULL,
  `cau_tra_loi` text DEFAULT NULL,
  `id_lhp` int(11) DEFAULT NULL,
  `bai_kiem_tra` int(11) DEFAULT NULL,
  `ma_bai_giang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bai_lam_sinh_vien`
--

INSERT INTO `bai_lam_sinh_vien` (`id`, `ma_nguoi_dung`, `id_cau_hoi`, `cau_tra_loi`, `id_lhp`, `bai_kiem_tra`, `ma_bai_giang`) VALUES
(191, 9, 31, 'A', 23, 4, 41),
(192, 9, 39, 'A', 23, 4, 41),
(193, 9, 58, 'B', 23, 4, 41),
(194, 9, 42, 'A', 23, 4, 41),
(195, 9, 29, 'A', 23, 4, 41),
(196, 9, 51, 'A', 23, 4, 41),
(197, 9, 43, 'A', 23, 4, 41),
(198, 9, 45, NULL, 23, 4, 41),
(199, 9, 15, NULL, 23, 4, 41),
(200, 9, 47, NULL, 23, 4, 41),
(201, 9, 17, NULL, 23, 4, 41),
(202, 9, 18, NULL, 23, 4, 41),
(203, 9, 20, NULL, 23, 4, 41),
(204, 9, 40, NULL, 23, 4, 41),
(205, 9, 38, NULL, 23, 4, 41),
(206, 9, 53, NULL, 23, 4, 41),
(207, 9, 14, NULL, 23, 4, 41),
(208, 9, 23, NULL, 23, 4, 41),
(209, 9, 28, NULL, 23, 4, 41),
(210, 9, 41, NULL, 23, 4, 41),
(211, 9, 83, 'B', 23, 5, 25),
(212, 9, 79, 'B', 23, 5, 25),
(213, 9, 66, 'A', 23, 5, 25),
(214, 9, 13, 'B', 23, 5, 25),
(215, 9, 55, 'A', 23, 5, 25),
(216, 9, 89, 'C', 23, 5, 25),
(217, 9, 87, 'B', 23, 5, 25),
(218, 9, 95, 'B', 23, 5, 25),
(219, 9, 75, 'C', 23, 5, 25),
(220, 9, 10, 'C', 23, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `bai_tap`
--

CREATE TABLE `bai_tap` (
  `ma_bai_tap` int(11) NOT NULL,
  `tieu_de` text DEFAULT NULL,
  `noi_dung_bai_tap` text DEFAULT NULL,
  `han_nop` datetime DEFAULT NULL,
  `id_lop_hoc_phan` int(11) DEFAULT NULL,
  `ma_bai_giang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bai_tap`
--

INSERT INTO `bai_tap` (`ma_bai_tap`, `tieu_de`, `noi_dung_bai_tap`, `han_nop`, `id_lop_hoc_phan`, `ma_bai_giang`) VALUES
(8, 'Bài tập tuần 1', '<p>C&ocirc;ng ty ABC y&ecirc;u cầu triển khai hệ thống mạng nội bộ với khoảng 10-15 m&aacute;y t&iacute;nh.</p>\r\n<p>Dự to&aacute;n kinh ph&iacute; thực hiện c&ocirc;ng ty sẽ đầu tư mua c&aacute;c thiết bị sau:</p>\r\n<div align=\"center\">\r\n<table border=\"1\" width=\"50%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\"><strong>STT</strong></p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\"><strong>T&ecirc;n thiết bị</strong></p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\"><strong>Số lượng</strong></p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\"><strong>Ghi ch&uacute;</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">1</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">Router</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">1</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">2</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">Switch</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">3</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">3</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">M&aacute;y chủ</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">1</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">4</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">M&aacute;y t&iacute;nh</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">10</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>C&ocirc;ng ty muốn chia mạng VLAN để ph&acirc;n biệt ph&ograve;ng Kế to&aacute;n v&agrave; ph&ograve;ng H&agrave;nh ch&iacute;nh.</p>\r\n<p>C&ocirc;ng ty cũng muốn c&oacute; 1 website nội bộ với t&ecirc;n l&agrave; abc.com, chia sẻ thư mục dữ liệu tr&ecirc;n m&aacute;y chủ theo từng ph&ograve;ng ban trong c&ocirc;ng ty.</p>\r\n<p>L&agrave; người được giao nhiệm vụ triển khai hệ thống mạng của c&ocirc;ng ty, bạn h&atilde;y:</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thiết kế c&aacute;c sơ đồ mạng (Sơ đồ vật l&yacute;, Sơ đồ logic) để thuyết phục Gi&aacute;m đốc k&yacute; hồ sơ triển khai;</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cấu h&igrave;nh triển khai m&ocirc; phỏng tr&ecirc;n packet tracer để lựa chọn thiết bị ph&ugrave; hợp;</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Triển khai c&aacute;c dịch vụ tr&ecirc;n m&aacute;y chủ ảo để đề xuất mua m&aacute;y chủ ph&ugrave; hợp; (gợi &yacute;: dịch vụ Web, FTP)</p>', '2025-01-11 23:16:00', 23, 25),
(9, 'Bài tập 3', '<p>&nbsp;</p>\r\n<p>l&agrave;m b&agrave;i 50 ph&uacute;t</p>', '2024-12-22 08:32:00', 23, 25),
(10, 'bài tập 3', '<p>C&ocirc;ng ty ABC y&ecirc;u cầu triển khai hệ thống mạng nội bộ với khoảng 10-15 m&aacute;y t&iacute;nh.</p>\r\n<p>Dự to&aacute;n kinh ph&iacute; thực hiện c&ocirc;ng ty sẽ đầu tư mua c&aacute;c thiết bị sau:</p>\r\n<div align=\"center\">\r\n<table border=\"1\" width=\"50%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\"><strong>STT</strong></p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\"><strong>T&ecirc;n thiết bị</strong></p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\"><strong>Số lượng</strong></p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\"><strong>Ghi ch&uacute;</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">1</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">Router</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">1</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">2</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">Switch</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">3</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">3</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">M&aacute;y chủ</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">1</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"16%\">\r\n<p align=\"center\">4</p>\r\n</td>\r\n<td valign=\"top\" width=\"32%\">\r\n<p align=\"center\">M&aacute;y t&iacute;nh</p>\r\n</td>\r\n<td valign=\"top\" width=\"26%\">\r\n<p align=\"center\">10</p>\r\n</td>\r\n<td valign=\"top\" width=\"24%\">\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>C&ocirc;ng ty muốn chia mạng VLAN để ph&acirc;n biệt ph&ograve;ng Kế to&aacute;n v&agrave; ph&ograve;ng H&agrave;nh ch&iacute;nh.</p>\r\n<p>C&ocirc;ng ty cũng muốn c&oacute; 1 website nội bộ với t&ecirc;n l&agrave; abc.com, chia sẻ thư mục dữ liệu tr&ecirc;n m&aacute;y chủ theo từng ph&ograve;ng ban trong c&ocirc;ng ty.</p>\r\n<p>L&agrave; người được giao nhiệm vụ triển khai hệ thống mạng của c&ocirc;ng ty, bạn h&atilde;y:</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thiết kế c&aacute;c sơ đồ mạng (Sơ đồ vật l&yacute;, Sơ đồ logic) để thuyết phục Gi&aacute;m đốc k&yacute; hồ sơ triển khai;</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cấu h&igrave;nh triển khai m&ocirc; phỏng tr&ecirc;n packet tracer để lựa chọn thiết bị ph&ugrave; hợp;</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Triển khai c&aacute;c dịch vụ tr&ecirc;n m&aacute;y chủ ảo để đề xuất mua m&aacute;y chủ ph&ugrave; hợp; (gợi &yacute;: dịch vụ Web, FTP)</p>\r\n<p>&nbsp;</p>\r\n<p>Thời gian thực hiện:&nbsp;<strong>90</strong>&nbsp;ph&uacute;t</p>\r\n<p><img src=\"data:image/png;base64,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\"></p>', '2024-12-22 08:30:00', 23, 25);

-- --------------------------------------------------------

--
-- Table structure for table `bai_tap_files`
--

CREATE TABLE `bai_tap_files` (
  `id` int(11) NOT NULL,
  `ten_file` text DEFAULT NULL,
  `ma_bai_giang` int(11) DEFAULT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_bai_tap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bai_tap_files`
--

INSERT INTO `bai_tap_files` (`id`, `ten_file`, `ma_bai_giang`, `ma_nguoi_dung`, `ma_bai_tap`) VALUES
(9, '1734664986_baocaoATANTT-final.pdf', NULL, 9, 6),
(10, '1734744685_question-bank-import (1).xlsx', NULL, 9, 10),
(11, '1734744686_DiemDanh_232_2TH1507_(BT)_KS2A_01_tructiep.xlsx', NULL, 9, 10),
(12, '1734744686_danh-sach-sv-lhp23.xlsx', NULL, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cay_tien_trinh`
--

CREATE TABLE `cay_tien_trinh` (
  `ma_tien_trinh` int(11) NOT NULL,
  `ma_khoa` int(11) DEFAULT NULL,
  `cay_tien_trinh` text DEFAULT NULL,
  `khoa_hoc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cay_tien_trinh`
--

INSERT INTO `cay_tien_trinh` (`ma_tien_trinh`, `ma_khoa`, `cay_tien_trinh`, `khoa_hoc`) VALUES
(1, 1, 'cntt-mmt.png', '2021'),
(2, 1, 'cntt-mmt.png', '2021'),
(3, 3, 'kinhte.jpg', '2022'),
(15, 4, '1731852471_oto.gif', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hp`
--

CREATE TABLE `chi_tiet_hp` (
  `MaCTHP` int(11) NOT NULL,
  `MaHP` int(11) NOT NULL,
  `MaLHP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_lop_hp`
--

CREATE TABLE `chi_tiet_lop_hp` (
  `MaCTLHP` int(11) NOT NULL,
  `MaLHP` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dang_ky_hoc_phan`
--

CREATE TABLE `dang_ky_hoc_phan` (
  `id` int(11) NOT NULL,
  `id_lop_hoc_phan` int(11) DEFAULT NULL,
  `id_sinh_vien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diem_danh`
--

CREATE TABLE `diem_danh` (
  `id` int(11) NOT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ngay_di_hoc` text DEFAULT NULL,
  `di_hoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `diem_danh`
--

INSERT INTO `diem_danh` (`id`, `ma_hoc_phan`, `ma_nguoi_dung`, `ngay_di_hoc`, `di_hoc`) VALUES
(3, 23, 9, '19/12/2024', 1),
(4, 23, 9, '18/12/2024', 1),
(5, 23, 9, '17/12/2024', 1),
(6, 23, 9, '16/12/2024', 0),
(7, 23, 9, '15/12/2024', 1),
(8, 23, 9, '14/12/2024', 1),
(9, 23, 3, '19/12/2024', 1),
(10, 23, 9, '13/12/2024', 1),
(11, 23, 9, '12/12/2024', 1),
(12, 23, 9, '11/12/2024', 1),
(13, 23, 9, '10/12/2024', 1),
(14, 23, 9, '8/12/2024', 1),
(15, 23, 9, '9/12/2024', 1),
(16, 23, 4, '19/12/2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ghi_danh`
--

CREATE TABLE `ghi_danh` (
  `ma_ghi_danh` int(11) NOT NULL,
  `ma_hoc_phan` text DEFAULT NULL,
  `ma_nguoi_dung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ghi_danh`
--

INSERT INTO `ghi_danh` (`ma_ghi_danh`, `ma_hoc_phan`, `ma_nguoi_dung`) VALUES
(12, '22', '9'),
(13, '23', '9'),
(14, '23', '8'),
(15, '24', '8'),
(16, '23', '3'),
(17, '23', '4'),
(18, '18', '8');

-- --------------------------------------------------------

--
-- Table structure for table `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `ma_hoc_ky` int(11) NOT NULL,
  `ten_hoc_ky` text DEFAULT NULL,
  `ngay_bd` text DEFAULT NULL,
  `ngay_ht` text DEFAULT NULL,
  `nam_hoc` text DEFAULT NULL,
  `tuan_bat_dau` text DEFAULT NULL,
  `so_tuan` text DEFAULT NULL,
  `loai_hoc_ky` text DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hoc_ky`
--

INSERT INTO `hoc_ky` (`ma_hoc_ky`, `ten_hoc_ky`, `ngay_bd`, `ngay_ht`, `nam_hoc`, `tuan_bat_dau`, `so_tuan`, `loai_hoc_ky`, `id`) VALUES
(131, 'Học kỳ 1, 2013-2014', '2014-10-01T00:00:00', '2014-10-01T00:00:00', '2013', '1', '32', '1', NULL),
(132, 'Học kỳ 2, 2013 - 2014', '2013-12-17T00:00:00', '2013-12-17T00:00:00', '2013', '19', '30', '2', NULL),
(141, 'Học kỳ 1, 2014-2015', '2014-08-15T00:00:00', '2014-08-15T00:00:00', '2014', '1', '16', '1', NULL),
(142, 'Học kỳ 2, 2014-2015', '2015-01-10T00:00:00', '2015-01-10T00:00:00', '2014', '19', '16', '2', NULL),
(143, 'Học kỳ phụ, 2014-2015', '2015-05-23T00:00:00', '2015-05-23T00:00:00', '2014', '0', '11', '3', NULL),
(151, 'Học kỳ 1, 2015-2016', '2015-09-05T00:00:00', '2015-09-05T00:00:00', '2015', '1', '32', '1', NULL),
(152, 'Học kỳ 2, 2015 - 2016', '2015-12-21T00:00:00', '2015-12-21T00:00:00', '2015', '20', '30', '2', NULL),
(153, 'Học kỳ phụ, 2015-2016, K39', '2016-05-23T00:00:00', '2016-05-23T00:00:00', '2015', '41', '11', '3', NULL),
(161, 'Học kỳ 1, 2016-2017', '2016-08-15T00:00:00', '2016-08-15T00:00:00', '2016', '1', '23', '1', NULL),
(162, 'Học kỳ 2, 2016-2017', '2017-02-13T00:00:00', '2017-02-13T00:00:00', '2016', '27', '21', '2', NULL),
(163, 'Học kỳ phụ, 2016-2017, K39-40', '2016-12-19T00:00:00', '2016-12-19T00:00:00', '2016', '19', '10', '3', NULL),
(164, 'Học kỳ phụ, 2016-2017, K41, K42', '2017-07-03T00:00:00', '2017-07-03T00:00:00', '2016', '47', '11', '4', NULL),
(171, 'Học kỳ 1, 2017-2018', '2017-08-28T00:00:00', '2017-08-28T00:00:00', '2017', '35', '24', '1', NULL),
(172, 'Học kỳ 2, 2017-2018', '2018-02-26T00:00:00', '2018-02-26T00:00:00', '2017', '9', '20', '2', NULL),
(173, 'Học kỳ phụ, 2017-2018', '2018-01-01T00:00:00', '2018-01-01T00:00:00', '2017', '1', '9', '3', NULL),
(174, 'Học kỳ phụ, 2017-2018, K42 và K43', '2018-07-09T00:00:00', '2018-07-09T00:00:00', '2017', '28', '12', '4', NULL),
(181, 'Học kỳ 1, 2018-2019', '2018-09-03T00:00:00', '2018-09-03T00:00:00', '2018', '36', '21', '1', NULL),
(182, 'Học kỳ 2, 2018-2019', '2019-02-11T00:00:00', '2019-02-11T00:00:00', '2018', '7', '23', '2', NULL),
(183, 'Học kỳ phụ, 2018-2019', '2019-01-14T00:00:00', '2019-01-14T00:00:00', '2018', '3', '8', '3', NULL),
(184, 'Học kỳ phụ, 2018-2019, K43 và K44', '2019-07-01T00:00:00', '2019-07-01T00:00:00', '2018', '27', '12', '4', NULL),
(191, 'Học kỳ 1, 2019-2020', '2019-09-02T00:00:00', '2019-09-02T00:00:00', '2019', '36', '18', '1', NULL),
(192, 'Học kỳ 2, 2019-2020', '2020-03-09T00:00:00', '2020-03-09T00:00:00', '2019', '11', '24', '2', NULL),
(193, 'Học kỳ phụ, 2019-2020', '2020-01-06T00:00:00', '2020-01-06T00:00:00', '2019', '2', '9', '3', NULL),
(201, 'Học kỳ 1, 2020-2021', '2020-08-24T00:00:00', '2020-08-24T00:00:00', '2020', '35', '20', '1', NULL),
(202, 'Học kỳ 2, 2020-2021', '2021-03-15T00:00:00', '2021-03-15T00:00:00', '2020', '12', '18', '2', NULL),
(203, 'Học kỳ phụ, 2020-2021', '2021-01-11T00:00:00', '2021-01-11T00:00:00', '2020', '3', '9', '3', NULL),
(204, 'Học kỳ hè, 2020-2021', '2021-07-12T00:00:00', '2021-07-12T00:00:00', '2020', '29', '8', '4', NULL),
(211, 'Học kỳ 1, 2021-2022', '2021-08-02T00:00:00', '2021-08-02T00:00:00', '2021', '32', '30', '1', NULL),
(212, 'Học kỳ 2, 2021-2022', '2022-03-14T00:00:00', '2022-03-14T00:00:00', '2021', '12', '24', '2', NULL),
(213, 'Học kỳ phụ, 2021-2022', '2021-12-27T00:00:00', '2021-12-27T00:00:00', '2021', '1', '12', '3', NULL),
(214, 'Học kỳ hè, 2021-2022', '2022-07-18T00:00:00', '2022-07-18T00:00:00', '2021', '30', '7', '4', NULL),
(221, 'Học kỳ 1, 2022-2023', '2022-09-05T00:00:00', '2022-09-05T00:00:00', '2022', '37', '19', '1', NULL),
(222, 'Học kỳ 2, 2022-2023', '2023-03-13T00:00:00', '2023-03-13T00:00:00', '2022', '12', '19', '2', NULL),
(223, 'Học kỳ phụ, 2022-2023', '2023-01-30T00:00:00', '2023-01-30T00:00:00', '2022', '6', '6', '3', NULL),
(224, 'Học kỳ hè, 2022-2023', '2023-07-03T00:00:00', '2023-07-03T00:00:00', '2022', '28', '9', '4', NULL),
(231, 'Học kỳ 1, 2023-2024', '2023-08-07T00:00:00', '2023-08-07T00:00:00', '2023', '33', '25', '1', NULL),
(232, 'Học kỳ 2, 2023-2024', '2024-02-19T00:00:00', '2024-02-19T00:00:00', '2023', '9', '22', '2', NULL),
(233, 'Học kỳ phụ, 2023-2024', '2024-01-15T00:00:00', '2024-01-15T00:00:00', '2023', '4', '8', '3', NULL),
(234, 'Học kỳ hè, 2023-2024', '2024-07-22T00:00:00', '2024-07-22T00:00:00', '2023', '31', '7', '4', NULL),
(241, 'Học kỳ 1, 2024-2025', '2024-09-09T00:00:00', '2024-09-09T00:00:00', '2024', '37', '19', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hoc_phan`
--

CREATE TABLE `hoc_phan` (
  `id_hoc_phan` int(11) NOT NULL,
  `ten_hoc_phan` text DEFAULT NULL,
  `ma_hoc_phan` text DEFAULT NULL,
  `so_chi_ly_thuyet` text DEFAULT NULL,
  `so_chi_thuc_hanh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hoc_phan`
--

INSERT INTO `hoc_phan` (`id_hoc_phan`, `ten_hoc_phan`, `ma_hoc_phan`, `so_chi_ly_thuyet`, `so_chi_thuc_hanh`) VALUES
(10, 'Toán rời rạc', 'TH1203', '2', '0'),
(12, 'Tin học cơ sở', 'TH1201', '2', '0'),
(13, 'Lập trình căn bản', 'TH1204', '2', '1'),
(14, 'Cấu trúc máy tính', 'TH1205', '2', '1'),
(15, 'Cấu trúc dữ liệu và giải thuật', 'TH1206', '2', '1'),
(16, 'Cơ sở dữ liệu', 'TH1207', '2', '1'),
(18, 'Lập trình hướng đối tượng', 'TH1209', '2', '1'),
(19, 'Đồ họa máy tính', 'TH1210', '2', '1'),
(20, 'Lý thuyết ngôn ngữ hình thức & tính toán', 'TH1211', '2', '0'),
(21, 'Phân tích & thiết kế thuật toán', 'TH1212', '2', '0'),
(22, 'Web – Internet', 'TH1213', '2', '1'),
(23, 'Mạng máy tính', 'TH1214', '2', '1'),
(24, 'Truyền số liệu', 'TH1215', '2', '0'),
(25, 'Phần mềm mã nguồn mở', 'TH1216', '1', '1'),
(26, 'An toàn và vệ sinh lao động trong lĩnh vực CNTT', 'TH1217', '1', '0'),
(28, 'Lập trình căn bản', 'TH1219', '2', '2'),
(29, 'Cấu trúc dữ liệu và giải thuật', 'TH1220', '2', '2'),
(30, 'Lập trình hướng đối tượng', 'TH1221', '2', '2'),
(31, 'Phân tích và thiết kế thuật toán', 'TH1222', '2', '1'),
(32, 'Nhập môn truyền thông đa phương tiện', 'TH1223', '3', '0'),
(33, 'Tác phẩm báo chí', 'TH1224', '3', '0'),
(34, 'Biên tập và soạn thảo văn bản', 'TH1227', '1', '1'),
(35, 'Nhập môn truyền thông đa phương tiện', 'TH1229', '2', '1'),
(36, 'Lập trình Windows', 'TH1301', '2', '1'),
(37, 'Trí tuệ nhân tạo', 'TH1302', '2', '0'),
(38, 'Phát triển phần mềm mã nguồn mở', 'TH1303', '2', '1'),
(39, 'Ngôn ngữ lập trình', 'TH1304', '2', '1'),
(40, 'Phân tích thiết kế hệ thống thông tin', 'TH1305', '2', '1'),
(41, 'Xử lý ảnh', 'TH1306', '2', '0'),
(42, 'Hệ quản trị cơ sở dữ liệu', 'TH1307', '2', '1'),
(43, 'Lập trình Web', 'TH1308', '2', '1'),
(44, 'Lập trình Java', 'TH1309', '2', '1'),
(45, 'Lập trình cơ sở dữ liệu', 'TH1310', '2', '1'),
(46, 'Quản trị mạng máy tính', 'TH1311', '2', '1'),
(47, 'Hệ thống phân tán', 'TH1312', '2', '0'),
(48, 'An toàn hệ thống và an ninh mạng', 'TH1313', '2', '1'),
(49, 'Lập trình mạng', 'TH1314', '2', '1'),
(50, 'Xây dựng ứng dụng phân tán', 'TH1315', '2', '1'),
(51, 'Thiết kế mạng máy tính', 'TH1316', '2', '1'),
(52, 'Xử lý tiếng nói', 'TH1317', '2', '1'),
(53, 'Agent và hệ agent', 'TH1318', '2', '0'),
(54, 'Nguyên lý máy học', 'TH1319', '2', '1'),
(55, 'Thị giác máy tính', 'TH1320', '2', '1'),
(56, 'Nhập môn công nghệ phần mềm', 'TH1321', '2', '1'),
(57, 'Đảm bảo chất lượng phần mềm', 'TH1322', '2', '1'),
(58, 'Kiểm thử phần mềm', 'TH1323', '2', '1'),
(59, 'Phân tích thiết kế hướng đối tượng', 'TH1324', '2', '1'),
(60, 'Phát triển phần mềm hướng dịch vụ', 'TH1325', '1', '1'),
(61, 'Tương tác người máy', 'TH1326', '2', '1'),
(62, 'Quản trị dự án', 'TH1327', '2', '1'),
(63, 'Cơ sở dữ liệu phân tán', 'TH1328', '2', '1'),
(64, 'Hệ thống thông tin quản lý', 'TH1329', '2', '1'),
(65, 'Hệ cơ sở dữ liệu đa phương tiện', 'TH1330', '2', '1'),
(66, 'Khai phá dữ liệu', 'TH1331', '2', '0'),
(67, 'Hệ trợ giúp quyết định', 'TH1332', '2', '1'),
(68, 'Trí tuệ nhân tạo', 'TH1333', '2', '1'),
(69, 'Ngôn ngữ lập trình', 'TH1334', '2', '0'),
(70, 'Xử lý ảnh', 'TH1335', '2', '1'),
(71, 'Lập trình Web', 'TH1336', '2', '2'),
(72, 'Lập trình DotNET', 'TH1337', '2', '2'),
(73, 'Lập trình ứng dụng cho thiết bị di động', 'TH1338', '2', '2'),
(74, 'Quản trị mạng máy tính', 'TH1339', '1', '2'),
(75, 'Hệ thống phân tán', 'TH1340', '2', '1'),
(76, 'An toàn và an ninh thông tin', 'TH1341', '2', '1'),
(77, 'Công nghệ mạng không dây', 'TH1342', '1', '1'),
(78, 'Xử lý âm thanh', 'TH1343', '2', '1'),
(79, 'Mô hình hóa hình học 3D', 'TH1345', '2', '1'),
(80, 'Khai phá dữ liệu', 'TH1346', '2', '1'),
(81, 'Xử lý dữ liệu lớn', 'TH1347', '2', '1'),
(82, 'Quản lý dự án phần mềm', 'TH1349', '2', '1'),
(83, 'Phát triển phần mềm nhúng', 'TH1350', '1', '1'),
(84, 'Anh văn chuyên ngành', 'TH1354', '2', '0'),
(85, 'Hệ thống nhúng', 'TH1355', '1', '2'),
(86, 'Mạng trong IoT', 'TH1356', '2', '1'),
(87, 'Bảo mật ứng dụng Web', 'TH1358', '2', '1'),
(88, 'Internet vạn vật', 'TH1359', '2', '1'),
(89, 'Ứng dụng máy học trong IoT', 'TH1361', '1', '1'),
(90, 'Phát triển ứng dụng IoT', 'TH1369', '1', '2'),
(91, 'Triển khai hệ thống mạng văn phòng', 'TH1370', '1', '2'),
(92, 'Công nghệ phần mềm', 'TH1371', '2', '0'),
(93, 'Kiểm thử và đảm bảo chất lượng phần mềm', 'TH1372', '2', '1'),
(94, 'Phát triển ứng dụng Web', 'TH1373', '1', '2'),
(95, 'Phát triển ứng dụng cho thiết bị di động', 'TH1374', '1', '2'),
(96, 'Lập trình game', 'TH1375', '1', '2'),
(97, 'Sensor và ứng dụng', 'TH1376', '1', '2'),
(98, 'Thị giác máy tính', 'TH1381', '2', '2'),
(99, 'Học sâu - Deep Learning', 'TH1382', '2', '2'),
(100, 'Robotic', 'TH1386', '2', '2'),
(101, 'Phát triển ứng dụng IoT', 'TH1390', '2', '2'),
(102, 'Nguyên lý máy học ', 'TH1391', '2', '2'),
(103, 'Phát triển phần mềm nhúng', 'TH1392', '1', '2'),
(104, 'Điện toán đám mây', 'TH1395', '2', '1'),
(105, 'Cơ sở dữ liệu phân tán', 'TH1396', '2', '2'),
(106, 'Lập trình .NET', 'TH1397', '2', '2'),
(107, 'Anh văn chuyên ngành truyền thông', 'TH1401', '2', '0'),
(108, 'Thiết kế Web truyền thông', 'TH1402', '2', '1'),
(109, 'Thiết kế ấn phẩm báo chí', 'TH1407', '2', '2'),
(110, 'Đồ án cơ sở ngành', 'TH1501', '0', '1'),
(111, 'Đồ án chuyên ngành', 'TH1502', '0', '1'),
(112, 'Đồ án Mạng và truyền thông', 'TH1503', '0', '1'),
(113, 'Đồ án Khoa học máy tính', 'TH1504', '0', '1'),
(114, 'Đồ án Công nghệ phần mềm', 'TH1505', '0', '1'),
(115, 'Đồ án Hệ thống thông tin', 'TH1506', '0', '1'),
(116, 'Thiết kế đồ họa', 'TH1514', '1', '2'),
(117, 'Đồ họa quảng cáo', 'TH1517', '0', '2'),
(118, 'Tin học ứng dụng', 'TH1518', '0', '3'),
(119, 'Lắp ráp cài đặt máy tính', 'TH1521', '0', '2'),
(120, 'Tin học ứng dụng', 'TH1522', '0', '2'),
(121, 'Thiết kế diễn đàn trực tuyến', 'TH1525', '0', '2'),
(122, 'Hệ thống thông tin quang', 'TH1526', '0', '2'),
(123, 'Thực tập tốt nghiệp', 'TH1601', '0', '2'),
(124, 'Khóa luận tốt nghiệp', 'TH1602', '6', '4'),
(125, 'Phát triển hệ thống thương mại điện tử', 'TH1603', '2', '1'),
(126, 'Phát triển ứng dụng cho thiết bị di động', 'TH1604', '2', '2'),
(127, 'Kiến trúc và thuật toán song song', 'TH1605', '2', '1'),
(129, 'Cơ sở dữ liệu phân tán', 'TH1607', '2', '1'),
(130, 'Đồ án CNTT 2', 'TH1512', '0', '2'),
(131, 'Đồ án CNTT 1', 'TH1507', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ket_qua_kiem_tra`
--

CREATE TABLE `ket_qua_kiem_tra` (
  `id` int(11) NOT NULL,
  `bai_kiem_tra` int(11) DEFAULT NULL,
  `ma_bai_giang` int(11) DEFAULT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `so_cau_dung` int(11) DEFAULT NULL,
  `diem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ket_qua_kiem_tra`
--

INSERT INTO `ket_qua_kiem_tra` (`id`, `bai_kiem_tra`, `ma_bai_giang`, `ma_nguoi_dung`, `so_cau_dung`, `diem`) VALUES
(7, 4, 41, 9, 6, 3),
(13, 5, 25, 9, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `ma_khoa` int(11) NOT NULL,
  `ten_khoa` text DEFAULT NULL,
  `truong_khoa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`ma_khoa`, `ten_khoa`, `truong_khoa`) VALUES
(1, 'Công Nghệ Thông Tin', '22'),
(2, 'Công Nghệ Thực Phẩm', '1'),
(3, 'Kinh Tế-Luật', '5'),
(4, 'Công Nghệ Kỹ Thuật Oto', '4'),
(5, 'Công Nghệ Thực Phẩm', '5');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `ma_lop` int(11) NOT NULL,
  `ma_khoa` int(11) DEFAULT NULL,
  `ten_lop` text DEFAULT NULL,
  `nam_hoc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`ma_lop`, `ma_khoa`, `ten_lop`, `nam_hoc`) VALUES
(1, 1, '1CTT21A1', '2021-2025'),
(2, 1, '1CTT22A1', '2022-2026'),
(3, 1, '1CTT20A2', '2020-2024'),
(4, 1, '1CTT20A3', '2020-2024'),
(5, 1, '1CTT21A3', '2021-2025'),
(6, 2, '1CTT21A3', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `lop_hoc_phan`
--

CREATE TABLE `lop_hoc_phan` (
  `id_lop_hoc_phan` int(11) NOT NULL,
  `ten_lop_hoc_phan` text DEFAULT NULL,
  `so_luong_sinh_vien` int(11) DEFAULT NULL,
  `giang_vien` int(11) DEFAULT NULL,
  `id_hoc_phan` int(11) DEFAULT NULL,
  `dot` int(11) DEFAULT NULL,
  `loai_lop` text DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT NULL,
  `hoc_ki` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lop_hoc_phan`
--

INSERT INTO `lop_hoc_phan` (`id_lop_hoc_phan`, `ten_lop_hoc_phan`, `so_luong_sinh_vien`, `giang_vien`, `id_hoc_phan`, `dot`, `loai_lop`, `ngay_tao`, `hoc_ki`) VALUES
(10, '241_1TH1201_KS2A_01_tructiep', 0, 15, 12, 1, 'LT', '2024-11-11 08:12:55', 241),
(11, '241_1TH1201_KS2A_02_tructiep', 0, 15, 12, 1, 'LT', '2024-11-11 08:12:55', 241),
(12, '241_1TH1201_KS2A_03_tructiep', 0, 15, 12, 1, 'LT', '2024-11-11 08:12:55', 241),
(13, '241_1TH1203_KS2A_01_tructiep', 0, 29, 10, 1, 'LT', '2024-11-11 08:20:23', 241),
(14, '241_1TH1203_KS2A_02_tructiep', 0, 29, 10, 1, 'LT', '2024-11-11 08:20:23', 241),
(15, '241_1TH1203_KS2A_03_tructiep', 0, 29, 10, 1, 'LT', '2024-11-11 08:20:23', 241),
(16, '241_1TH1203_KS2A_04_tructiep', 0, 29, 10, 1, 'LT', '2024-11-11 08:20:23', 241),
(18, '241_1TH1219_KS2A_01_tructiep', 0, 23, 28, 1, 'LT', '2024-11-11 08:51:44', 241),
(19, '241_1TH1219_KS2A_02_tructiep', 0, 23, 28, 1, 'LT', '2024-11-11 08:51:44', 241),
(20, '241_1TH1219_KS2A_03_tructiep', 0, 23, 28, 1, 'LT', '2024-11-11 08:51:44', 241),
(21, '241_1TH1219_KS2A_04_tructiep', 0, 23, 28, 1, 'LT', '2024-11-11 08:51:44', 241),
(22, '241_1TH1219_KS2A_05_tructiep', 0, 23, 28, 1, 'LT', '2024-11-11 08:51:44', 241),
(23, '232_2TH1507_(BT)_KS2A_01_tructiep', 0, 8, 131, 2, 'BT', '2024-11-11 10:20:46', 232),
(24, '241_1TH1308_KS2A_01_tructiep', 0, 8, 43, 1, 'LT', '2024-12-13 10:00:45', 241),
(25, '241_1TH1606_KS2A_01_tructiep', 0, 1, 128, 1, 'LT', '2024-12-19 03:06:15', 241),
(26, '241_1TH1606_KS2A_02_tructiep', 0, 1, 128, 1, 'LT', '2024-12-19 03:06:15', 241),
(27, '241_1TH1606_KS2A_03_tructiep', 0, 1, 128, 1, 'LT', '2024-12-19 03:06:15', 241),
(28, '241_1TH1203_KS2A_01_tructiep', 100, 13, 10, 1, 'LT', '2024-12-19 03:23:50', 241),
(29, '241_1TH1203_KS2A_01_tructiep', 30, 7, 10, 1, 'LT', '2024-12-21 01:19:24', 241);

-- --------------------------------------------------------

--
-- Table structure for table `ngan_hang_cau_hoi`
--

CREATE TABLE `ngan_hang_cau_hoi` (
  `id` int(11) NOT NULL,
  `cau_hoi` text DEFAULT NULL,
  `anh_cau_hoi` text DEFAULT NULL,
  `dap_an_a` text DEFAULT NULL,
  `dap_an_b` text DEFAULT NULL,
  `dap_an_c` text DEFAULT NULL,
  `dap_an_d` text DEFAULT NULL,
  `dap_an_dung` text DEFAULT NULL,
  `id_lop_hoc_phan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ngan_hang_cau_hoi`
--

INSERT INTO `ngan_hang_cau_hoi` (`id`, `cau_hoi`, `anh_cau_hoi`, `dap_an_a`, `dap_an_b`, `dap_an_c`, `dap_an_d`, `dap_an_dung`, `id_lop_hoc_phan`) VALUES
(9, 'Câu hỏi mẫu 1', NULL, 'Đáp án A 1', 'Đáp án B 1', 'Đáp án C 1', 'Đáp án D 1', 'A', 23),
(10, 'Câu hỏi mẫu 2', NULL, 'Đáp án A 2', 'Đáp án B 2', 'Đáp án C 2', 'Đáp án D 2', 'A', 23),
(11, 'Câu hỏi mẫu 3', NULL, 'Đáp án A 3', 'Đáp án B 3', 'Đáp án C 3', 'Đáp án D 3', 'A', 23),
(12, 'Câu hỏi mẫu 4', NULL, 'Đáp án A 4', 'Đáp án B 4', 'Đáp án C 4', 'Đáp án D 4', 'A', 23),
(13, 'Câu hỏi mẫu 5', NULL, 'Đáp án A 5', 'Đáp án B 5', 'Đáp án C 5', 'Đáp án D 5', 'A', 23),
(14, 'Câu hỏi mẫu 6', NULL, 'Đáp án A 6', 'Đáp án B 6', 'Đáp án C 6', 'Đáp án D 6', 'A', 23),
(15, 'Câu hỏi mẫu 7', NULL, 'Đáp án A 7', 'Đáp án B 7', 'Đáp án C 7', 'Đáp án D 7', 'A', 23),
(16, 'Câu hỏi mẫu 8', NULL, 'Đáp án A 8', 'Đáp án B 8', 'Đáp án C 8', 'Đáp án D 8', 'A', 23),
(17, 'Câu hỏi mẫu 9', NULL, 'Đáp án A 9', 'Đáp án B 9', 'Đáp án C 9', 'Đáp án D 9', 'A', 23),
(18, 'Câu hỏi mẫu 10', NULL, 'Đáp án A 10', 'Đáp án B 10', 'Đáp án C 10', 'Đáp án D 10', 'A', 23),
(19, 'Câu hỏi mẫu 11', NULL, 'Đáp án A 11', 'Đáp án B 11', 'Đáp án C 11', 'Đáp án D 11', 'A', 23),
(20, 'Câu hỏi mẫu 12', NULL, 'Đáp án A 12', 'Đáp án B 12', 'Đáp án C 12', 'Đáp án D 12', 'A', 23),
(21, 'Câu hỏi mẫu 13', NULL, 'Đáp án A 13', 'Đáp án B 13', 'Đáp án C 13', 'Đáp án D 13', 'A', 23),
(22, 'Câu hỏi mẫu 14', NULL, 'Đáp án A 14', 'Đáp án B 14', 'Đáp án C 14', 'Đáp án D 14', 'A', 23),
(23, 'Câu hỏi mẫu 15', NULL, 'Đáp án A 15', 'Đáp án B 15', 'Đáp án C 15', 'Đáp án D 15', 'A', 23),
(24, 'Câu hỏi mẫu 16', NULL, 'Đáp án A 16', 'Đáp án B 16', 'Đáp án C 16', 'Đáp án D 16', 'A', 23),
(25, 'Câu hỏi mẫu 17', NULL, 'Đáp án A 17', 'Đáp án B 17', 'Đáp án C 17', 'Đáp án D 17', 'A', 23),
(26, 'Câu hỏi mẫu 18', NULL, 'Đáp án A 18', 'Đáp án B 18', 'Đáp án C 18', 'Đáp án D 18', 'A', 23),
(27, 'Câu hỏi mẫu 19', NULL, 'Đáp án A 19', 'Đáp án B 19', 'Đáp án C 19', 'Đáp án D 19', 'A', 23),
(28, 'Câu hỏi mẫu 20', NULL, 'Đáp án A 20', 'Đáp án B 20', 'Đáp án C 20', 'Đáp án D 20', 'A', 23),
(29, 'Câu hỏi mẫu 21', NULL, 'Đáp án A 21', 'Đáp án B 21', 'Đáp án C 21', 'Đáp án D 21', 'A', 23),
(30, 'Câu hỏi mẫu 22', NULL, 'Đáp án A 22', 'Đáp án B 22', 'Đáp án C 22', 'Đáp án D 22', 'A', 23),
(31, 'Câu hỏi mẫu 23', NULL, 'Đáp án A 23', 'Đáp án B 23', 'Đáp án C 23', 'Đáp án D 23', 'A', 23),
(32, 'Câu hỏi mẫu 24', NULL, 'Đáp án A 24', 'Đáp án B 24', 'Đáp án C 24', 'Đáp án D 24', 'A', 23),
(33, 'Câu hỏi mẫu 25', NULL, 'Đáp án A 25', 'Đáp án B 25', 'Đáp án C 25', 'Đáp án D 25', 'A', 23),
(34, 'Câu hỏi mẫu 26', NULL, 'Đáp án A 26', 'Đáp án B 26', 'Đáp án C 26', 'Đáp án D 26', 'A', 23),
(35, 'Câu hỏi mẫu 27', NULL, 'Đáp án A 27', 'Đáp án B 27', 'Đáp án C 27', 'Đáp án D 27', 'A', 23),
(36, 'Câu hỏi mẫu 28', NULL, 'Đáp án A 28', 'Đáp án B 28', 'Đáp án C 28', 'Đáp án D 28', 'A', 23),
(37, 'Câu hỏi mẫu 29', NULL, 'Đáp án A 29', 'Đáp án B 29', 'Đáp án C 29', 'Đáp án D 29', 'A', 23),
(38, 'Câu hỏi mẫu 30', NULL, 'Đáp án A 30', 'Đáp án B 30', 'Đáp án C 30', 'Đáp án D 30', 'A', 23),
(39, 'Câu hỏi mẫu 31', NULL, 'Đáp án A 31', 'Đáp án B 31', 'Đáp án C 31', 'Đáp án D 31', 'A', 23),
(40, 'Câu hỏi mẫu 32', NULL, 'Đáp án A 32', 'Đáp án B 32', 'Đáp án C 32', 'Đáp án D 32', 'A', 23),
(41, 'Câu hỏi mẫu 33', NULL, 'Đáp án A 33', 'Đáp án B 33', 'Đáp án C 33', 'Đáp án D 33', 'A', 23),
(42, 'Câu hỏi mẫu 34', NULL, 'Đáp án A 34', 'Đáp án B 34', 'Đáp án C 34', 'Đáp án D 34', 'A', 23),
(43, 'Câu hỏi mẫu 35', NULL, 'Đáp án A 35', 'Đáp án B 35', 'Đáp án C 35', 'Đáp án D 35', 'A', 23),
(44, 'Câu hỏi mẫu 36', NULL, 'Đáp án A 36', 'Đáp án B 36', 'Đáp án C 36', 'Đáp án D 36', 'A', 23),
(45, 'Câu hỏi mẫu 37', NULL, 'Đáp án A 37', 'Đáp án B 37', 'Đáp án C 37', 'Đáp án D 37', 'A', 23),
(46, 'Câu hỏi mẫu 38', NULL, 'Đáp án A 38', 'Đáp án B 38', 'Đáp án C 38', 'Đáp án D 38', 'A', 23),
(47, 'Câu hỏi mẫu 39', NULL, 'Đáp án A 39', 'Đáp án B 39', 'Đáp án C 39', 'Đáp án D 39', 'A', 23),
(48, 'Câu hỏi mẫu 40', NULL, 'Đáp án A 40', 'Đáp án B 40', 'Đáp án C 40', 'Đáp án D 40', 'A', 23),
(49, 'Câu hỏi mẫu 41', NULL, 'Đáp án A 41', 'Đáp án B 41', 'Đáp án C 41', 'Đáp án D 41', 'A', 23),
(50, 'Câu hỏi mẫu 42', NULL, 'Đáp án A 42', 'Đáp án B 42', 'Đáp án C 42', 'Đáp án D 42', 'A', 23),
(51, 'Câu hỏi mẫu 43', NULL, 'Đáp án A 43', 'Đáp án B 43', 'Đáp án C 43', 'Đáp án D 43', 'A', 23),
(52, 'Câu hỏi mẫu 44', NULL, 'Đáp án A 44', 'Đáp án B 44', 'Đáp án C 44', 'Đáp án D 44', 'A', 23),
(53, 'Câu hỏi mẫu 45', NULL, 'Đáp án A 45', 'Đáp án B 45', 'Đáp án C 45', 'Đáp án D 45', 'A', 23),
(54, 'Câu hỏi mẫu 46', NULL, 'Đáp án A 46', 'Đáp án B 46', 'Đáp án C 46', 'Đáp án D 46', 'A', 23),
(55, 'Câu hỏi mẫu 47', NULL, 'Đáp án A 47', 'Đáp án B 47', 'Đáp án C 47', 'Đáp án D 47', 'A', 23),
(56, 'Câu hỏi mẫu 48', NULL, 'Đáp án A 48', 'Đáp án B 48', 'Đáp án C 48', 'Đáp án D 48', 'A', 23),
(57, 'Câu hỏi mẫu 49', NULL, 'Đáp án A 49', 'Đáp án B 49', 'Đáp án C 49', 'Đáp án D 49', 'A', 23),
(58, 'Câu hỏi mẫu 50', NULL, 'Đáp án A 50', 'Đáp án B 50', 'Đáp án C 50', 'Đáp án D 50', 'A', 23),
(59, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(60, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(61, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(62, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(63, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(64, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(65, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(66, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(67, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(68, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(69, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(70, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(71, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(72, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(73, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(74, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(75, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(76, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(77, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(78, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(79, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(80, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(81, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(82, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(83, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(84, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(85, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(86, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(87, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(88, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(89, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(90, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(91, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(92, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(93, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(94, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(95, '[Hóa học] Ký hiệu hóa học của vàng là gì?', NULL, 'Au', 'Ag', 'Gd', 'Go', 'A', 23),
(96, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(97, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23),
(98, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(99, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(100, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(101, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(102, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(103, '[Khoa học Trái đất] Loại đá nào được hình thành từ magma nguội?', NULL, 'Trầm tích', 'Biến chất', 'Mácma', 'Hóa thạch', 'C', 23),
(104, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(105, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(106, '[Thiên văn học] Hành tinh lớn nhất trong hệ Mặt trời là gì?', NULL, 'Trái Đất', 'Sao Hỏa', 'Sao Mộc', 'Sao Thổ', 'C', 23),
(107, '[Vật lý] Đơn vị đo lực trong hệ SI là gì?', NULL, 'Newton', 'Joule', 'Watt', 'Pascal', 'A', 23),
(108, '[Sinh học] Cơ quan nào trong cơ thể con người sản xuất insulin?', NULL, 'Gan', 'Tụy', 'Thận', 'Dạ dày', 'B', 23);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_nguoi_dung` text DEFAULT NULL,
  `ma_khoa` int(11) DEFAULT NULL,
  `ma_lop` int(11) DEFAULT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `hinh_anh` text DEFAULT NULL,
  `gioi_tinh` text DEFAULT NULL,
  `ngay_sinh` text DEFAULT NULL,
  `noi_sinh` text DEFAULT NULL,
  `ho_khau_thuong_tru` text DEFAULT NULL,
  `cccd` text DEFAULT NULL,
  `sdt` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `ma_quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `ten_nguoi_dung`, `ma_khoa`, `ma_lop`, `ma_hoc_phan`, `hinh_anh`, `gioi_tinh`, `ngay_sinh`, `noi_sinh`, `ho_khau_thuong_tru`, `cccd`, `sdt`, `email`, `ma_quyen`) VALUES
(1, 'Ngọc Hân', 2, NULL, NULL, NULL, 'Nữ', '1997-05-21', 'Hà Nội', 'Phố cổ, Hà Nội', '012345678901', '0905123456', 'ngochan@vlute.vn', 2),
(2, 'Tuấn Anh', 1, NULL, NULL, NULL, 'Nam', '1985-08-12', 'Vĩnh Long', 'Vĩnh Long', '012345678902', '0906123456', 'tuananh@admin.com.vlute', 1),
(3, 'Ngọc Ngân', 2, 2, NULL, NULL, 'Nữ', '2005-09-15', 'Đà Nẵng', 'Đà Nẵng', '012345678903', '0907123456', 'ngocngan@gmail.com', 3),
(4, 'Huyền Trân', 1, NULL, NULL, NULL, 'Nữ', '1980-03-10', 'Cần Thơ', 'Cần Thơ', '012345678904', '0908123456', 'huyentran@admin.com.vlute', 3),
(5, 'Nguyễn Văn A', 1, NULL, NULL, NULL, 'Nam', '1995-04-05', 'TPHCM', 'TPHCM', '012345678905', '0909123456', 'nguyenvana@vlute.vn', 2),
(7, 'Trần Văn B', 1, NULL, NULL, NULL, 'Nam', '1994-12-15', 'Hà Nội', 'Hà Nội', '012345678907', '0911123456', 'tranvanb@vlute.vn', 2),
(8, 'Giảng Viên aaaa', 1, NULL, NULL, '1733854428_310066267_184130727510201_3026934422886984661_n.jpg', 'Nữ', '1996-01-11', 'Vĩnh Long', 'Vĩnh Long', '012345678908', '0912123456', 'giangvien@vlute.vn', 2),
(9, 'Sinh viên', 1, NULL, NULL, '1734709182_Shin3.jpg', 'Nữ', '2006-06-25', 'Vĩnh Long', 'Phường 2, Vĩnh Long', '012345678909', '0913123456', 'sinhvien@gmail.com', 3),
(10, 'Admin', 1, NULL, NULL, NULL, 'Nữ', '1987-11-08', 'TPHCM', 'Quận 1, TPHCM', '012345678910', '0914123456', 'admin@admin.com.vlute', 1),
(11, 'Lê Hoàng An', 1, NULL, NULL, NULL, 'Nam', '1983-04-03', 'Hà Nội', 'Hà Đông, Hà Nội', '012345678911', '0915123456', 'lehoangan@admin.com.vlute', 2),
(12, 'Trần Thái Bảo', 1, NULL, NULL, NULL, 'Nam', '1999-08-18', 'Đà Nẵng', 'Hải Châu, Đà Nẵng', '012345678912', '0916123456', 'tranthaibao@vlute.vn', 2),
(13, 'Nguyễn Văn Hiếu', 1, NULL, NULL, NULL, 'Nam', '1998-02-27', 'TPHCM', 'Quận 5, TPHCM', '012345678913', '0917123456', 'nguyenvanhieu@vlute.vn', 2),
(14, 'Trần Thị Tố Loan', 1, NULL, NULL, NULL, 'Nữ', '1997-11-12', 'Hà Nội', 'Ba Đình, Hà Nội', '012345678914', '0918123456', 'trantitoloan@vlute.vn', 2),
(15, 'Trần Thu Mai', 1, NULL, NULL, NULL, 'Nữ', '1995-03-14', 'Đà Nẵng', 'Ngũ Hành Sơn, Đà Nẵng', '012345678915', '0919123456', 'tranthumai@vlute.vn', 2),
(16, 'Nguyễn Vạn Năng', 1, NULL, NULL, NULL, 'Nam', '1996-09-01', 'Vĩnh Long', 'Tam Bình, Vĩnh Long', '012345678916', '0920123456', 'nguyenvannang@vlute.vn', 2),
(17, 'Nguyễn Ngọc Nga', 1, NULL, NULL, NULL, 'Nữ', '1999-10-11', 'Hà Nội', 'Hoàng Mai, Hà Nội', '012345678917', '0921123456', 'nguyenngocnga@vlute.vn', 2),
(18, 'Nguyễn Thị Mỹ Nga', 1, NULL, NULL, NULL, 'Nữ', '2000-01-20', 'Vĩnh Long', 'Bình Minh, Vĩnh Long', '012345678918', '0922123456', 'nguyenthimynga@vlute.vn', 2),
(19, 'Nguyễn Thị Hồng Yến', 1, NULL, NULL, NULL, 'Nữ', '1997-07-03', 'Đà Nẵng', 'Liên Chiểu, Đà Nẵng', '012345678919', '0923123456', 'nguyenthihongyen@vlute.vn', 2),
(20, 'Lê Thị Hoàng Yến', 1, NULL, NULL, NULL, 'Nữ', '1996-06-15', 'TPHCM', 'Thủ Đức, TPHCM', '012345678920', '0924123456', 'lethihoangyen@vlute.vn', 2),
(21, 'Lê Thị Hạnh Hiền', 1, NULL, NULL, NULL, 'Nữ', '1998-03-28', 'Hà Nội', 'Từ Liêm, Hà Nội', '012345678921', '0925123456', 'lethihanhhien@vlute.vn', 2),
(22, 'Phan Anh Cang', 1, NULL, NULL, NULL, 'Nam', '1995-08-04', 'Hà Nội', 'Đống Đa, Hà Nội', '012345678922', '0926123456', 'phananhcang@vlute.vn', 2),
(23, 'Trần Hồ Đạt', 1, NULL, NULL, NULL, 'Nam', '1997-12-12', 'Đà Nẵng', 'Thanh Khê, Đà Nẵng', '012345678923', '0927123456', 'tranho.dat@vlute.vn', 2),
(24, 'Trần Thị Cẩm Tú', 1, NULL, NULL, NULL, 'Nữ', '1999-05-05', 'Vĩnh Long', 'Trà Ôn, Vĩnh Long', '012345678924', '0928123456', 'tranthicamtu@vlute.vn', 2),
(25, 'Nguyễn Hoàng Anh', 1, NULL, NULL, NULL, 'Nam', '1996-09-16', 'TPHCM', 'Gò Vấp, TPHCM', '012345678925', '0929123456', 'nguyenhoanganh@vlute.vn', 2),
(26, 'Trần Phan An Trường', 1, NULL, NULL, NULL, 'Nam', '1998-03-15', 'Cần Thơ', 'Cần Thơ', '123456789001', '0901234567', 'tranphantruong@vlute.vn', 2),
(27, 'Mai Thiên Thư', 1, NULL, NULL, NULL, 'Nữ', '1997-08-22', 'An Giang', 'An Giang', '123456789002', '0912345678', 'maithienthu@vlute.vn', 2),
(28, 'Trần Thị Kim Ngân', 1, NULL, NULL, NULL, 'Nữ', '1999-11-11', 'Đồng Tháp', 'Đồng Tháp', '123456789003', '0923456789', 'trankimngan@vlute.vn', 2),
(29, 'Nguyễn Ngọc Hoàng Quyên', 1, NULL, NULL, NULL, 'Nữ', '1996-04-19', 'Vĩnh Long', 'Hậu Giang', '123456789004', '0934567890', 'nguyenquyen@vlute.vn', 2),
(30, 'Hồ Chí Hưng', 1, NULL, NULL, NULL, 'Nam', '1995-01-05', 'Hà Nội', 'Nam Định', '123456789005', '0945678901', 'hochihung@vlute.vn', 2),
(31, 'Lê Thị Mỹ Tiên', 1, NULL, NULL, NULL, 'Nữ', '2001-07-18', 'Bến Tre', 'Tiền Giang', '123456789006', '0956789012', 'lemytien@vlute.vn', 2),
(32, 'Nguyễn Khắc Tường', 1, NULL, NULL, NULL, 'Nam', '2002-09-30', 'TP. HCM', 'Bình Dương', '123456789007', '0967890123', 'nguyenkhactuong@vlute.vn', 2),
(33, 'Nguyễn Công Kha', 1, NULL, NULL, NULL, 'Nam', '2003-05-21', 'Đà Nẵng', 'Quảng Nam', '123456789008', '0978901234', 'nguyencongkha@vlute.vn', 2),
(34, 'Lê Duy Linh', 1, NULL, NULL, NULL, 'Nam', '1994-12-02', 'Hải Phòng', 'Thái Bình', '123456789009', '0989012345', 'leduylinh@vlute.vn', 2),
(47, 'Nguyễn Văn A', 1, 2, NULL, NULL, 'Nam', '1995-01-01', 'Hà Nội', 'Hộ khẩu 1', '123456789012', '0901234567', 'nguyenvana@st.vlute.edu.vn', 3),
(48, 'Trần Thị B', 1, 3, NULL, NULL, 'Nữ', '1996-02-02', 'Hải Phòng', 'Hộ khẩu 2', '223456789012', '0902234567', 'tranthib@st.vlute.edu.vn', 3),
(49, 'Lê Minh C', 1, 4, NULL, NULL, 'Nam', '1997-03-03', 'Đà Nẵng', 'Hộ khẩu 3', '323456789012', '0903234567', 'leminhc@st.vlute.edu.vn', 3),
(50, 'Phạm Thị D', 1, 5, NULL, NULL, 'Nữ', '1998-04-04', 'TP. Hồ Chí Minh', 'Hộ khẩu 4', '423456789012', '0904234567', 'phamthid@st.vlute.edu.vn', 3),
(51, 'Hoàng Minh E', 1, 1, NULL, NULL, 'Nam', '1999-05-05', 'Hà Nội', 'Hộ khẩu 5', '523456789012', '0905234567', 'hoangmine@st.vlute.edu.vn', 3),
(52, 'Nguyễn Thị F', 1, 2, NULL, NULL, 'Nữ', '2000-06-06', 'Huế', 'Hộ khẩu 6', '623456789012', '0906234567', 'nguyenthif@st.vlute.edu.vn', 3),
(53, 'Đặng Văn G', 1, 3, NULL, NULL, 'Nam', '1994-07-07', 'Quảng Nam', 'Hộ khẩu 7', '723456789012', '0907234567', 'dangvang@st.vlute.edu.vn', 3),
(54, 'Võ Thị H', 1, 4, NULL, NULL, 'Nữ', '1993-08-08', 'Nghệ An', 'Hộ khẩu 8', '823456789012', '0908234567', 'vothih@st.vlute.edu.vn', 3),
(55, 'Nguyễn Văn I', 1, 5, NULL, NULL, 'Nam', '1992-09-09', 'Nam Định', 'Hộ khẩu 9', '923456789012', '0909234567', 'nguyenvani@st.vlute.edu.vn', 3),
(56, 'Trần Thị K', 1, 1, NULL, NULL, 'Nữ', '1991-10-10', 'Thanh Hóa', 'Hộ khẩu 10', '103456789012', '0910234567', 'tranthik@st.vlute.edu.vn', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nop_bai_tap`
--

CREATE TABLE `nop_bai_tap` (
  `ma_nop_bai` int(11) NOT NULL,
  `ma_bai_tap` int(11) DEFAULT NULL,
  `ma_sinh_vien_nop` int(11) DEFAULT NULL,
  `ngay_nop` text DEFAULT NULL,
  `bai_nop` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ten_quyen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`ma_quyen`, `ten_quyen`) VALUES
(1, 'Admin'),
(2, 'Giảng viên'),
(3, 'Sinh viên');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tai_khoan` int(11) NOT NULL,
  `ten_tai_khoan` text DEFAULT NULL,
  `mat_khau` text DEFAULT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_tai_khoan`, `ten_tai_khoan`, `mat_khau`, `ma_nguoi_dung`) VALUES
(6, 'ngochan@123', '$2y$12$78/poQ1pOvcHqZ97zhzUv.hCW16Hj4ncKcMbnGpdVLdAEHOcVWZ7W', 1),
(8, 'tuananh@123', '$2y$12$b5szlQIXbEID6LxGAOtZe.d6erwRTf4adJU2Nx7rWOEIsr3J3CNM.', 2),
(9, 'ngocngan', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 3),
(10, 'gv', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 8),
(11, 'sv', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 9),
(12, 'admin', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 10),
(13, 'huyentran@123', '$2y$12$Ze1U6Wn1I3/DabGFxrfSDuCXFWKzckX.HzhDdin5a/rC2nsy4VxPu', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_giang`
--
ALTER TABLE `bai_giang`
  ADD PRIMARY KEY (`ma_bai_giang`);

--
-- Indexes for table `bai_giang_files`
--
ALTER TABLE `bai_giang_files`
  ADD PRIMARY KEY (`bai_giang_id`);

--
-- Indexes for table `bai_kiem_tra`
--
ALTER TABLE `bai_kiem_tra`
  ADD PRIMARY KEY (`id_bai_kiem_tra`);

--
-- Indexes for table `bai_lam_sinh_vien`
--
ALTER TABLE `bai_lam_sinh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bai_tap`
--
ALTER TABLE `bai_tap`
  ADD PRIMARY KEY (`ma_bai_tap`);

--
-- Indexes for table `bai_tap_files`
--
ALTER TABLE `bai_tap_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cay_tien_trinh`
--
ALTER TABLE `cay_tien_trinh`
  ADD PRIMARY KEY (`ma_tien_trinh`);

--
-- Indexes for table `dang_ky_hoc_phan`
--
ALTER TABLE `dang_ky_hoc_phan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diem_danh`
--
ALTER TABLE `diem_danh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ghi_danh`
--
ALTER TABLE `ghi_danh`
  ADD PRIMARY KEY (`ma_ghi_danh`);

--
-- Indexes for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  ADD PRIMARY KEY (`ma_hoc_ky`);

--
-- Indexes for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  ADD PRIMARY KEY (`id_hoc_phan`);

--
-- Indexes for table `ket_qua_kiem_tra`
--
ALTER TABLE `ket_qua_kiem_tra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ma_khoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ma_lop`);

--
-- Indexes for table `lop_hoc_phan`
--
ALTER TABLE `lop_hoc_phan`
  ADD PRIMARY KEY (`id_lop_hoc_phan`);

--
-- Indexes for table `ngan_hang_cau_hoi`
--
ALTER TABLE `ngan_hang_cau_hoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`);

--
-- Indexes for table `nop_bai_tap`
--
ALTER TABLE `nop_bai_tap`
  ADD PRIMARY KEY (`ma_nop_bai`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_quyen`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tai_khoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_giang`
--
ALTER TABLE `bai_giang`
  MODIFY `ma_bai_giang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `bai_giang_files`
--
ALTER TABLE `bai_giang_files`
  MODIFY `bai_giang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bai_kiem_tra`
--
ALTER TABLE `bai_kiem_tra`
  MODIFY `id_bai_kiem_tra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bai_lam_sinh_vien`
--
ALTER TABLE `bai_lam_sinh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `bai_tap`
--
ALTER TABLE `bai_tap`
  MODIFY `ma_bai_tap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bai_tap_files`
--
ALTER TABLE `bai_tap_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cay_tien_trinh`
--
ALTER TABLE `cay_tien_trinh`
  MODIFY `ma_tien_trinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dang_ky_hoc_phan`
--
ALTER TABLE `dang_ky_hoc_phan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diem_danh`
--
ALTER TABLE `diem_danh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ghi_danh`
--
ALTER TABLE `ghi_danh`
  MODIFY `ma_ghi_danh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  MODIFY `id_hoc_phan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `ket_qua_kiem_tra`
--
ALTER TABLE `ket_qua_kiem_tra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ma_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `ma_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lop_hoc_phan`
--
ALTER TABLE `lop_hoc_phan`
  MODIFY `id_lop_hoc_phan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ngan_hang_cau_hoi`
--
ALTER TABLE `ngan_hang_cau_hoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nop_bai_tap`
--
ALTER TABLE `nop_bai_tap`
  MODIFY `ma_nop_bai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
