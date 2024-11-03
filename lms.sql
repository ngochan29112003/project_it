-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2024 at 11:33 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_giang`
--

CREATE TABLE `bai_giang` (
  `ma_bai_giang` int(11) NOT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `ten_bai_giang` text,
  `noi_dung_bai_giang` text,
  `thu_tu_trong_hoc_phan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bai_kiem_tra`
--

CREATE TABLE `bai_kiem_tra` (
  `ma_bai_kiem_tra` int(11) NOT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `ma_sinh_vien_lam` int(11) DEFAULT NULL,
  `tieu_de` text,
  `dap_an_da_chon` text,
  `dap_an_dung` text,
  `so_cau` text,
  `ngay_kiem_tra` text,
  `thoi_gian_lam_bai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bai_tap`
--

CREATE TABLE `bai_tap` (
  `ma_bai_tap` int(11) NOT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `ten_bai_tap` text,
  `noi_dung_bai_tap` text,
  `han_nop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cay_tien_trinh`
--

CREATE TABLE `cay_tien_trinh` (
  `ma_nganh` int(11) NOT NULL,
  `ten_nganh` text,
  `ten_chuyen_nganh` text,
  `hoc_ky` text,
  `ma_mon` text,
  `ten_mon` text,
  `so_chi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hp`
--

CREATE TABLE `chi_tiet_hp` (
  `MaCTHP` int(11) NOT NULL,
  `MaHP` int(11) NOT NULL,
  `MaLHP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_lop_hp`
--

CREATE TABLE `chi_tiet_lop_hp` (
  `MaCTLHP` int(11) NOT NULL,
  `MaLHP` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dang_ky_hoc_phan`
--

CREATE TABLE `dang_ky_hoc_phan` (
  `id` int(11) NOT NULL,
  `id_lop_hoc_phan` int(11) DEFAULT NULL,
  `id_sinh_vien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diem_danh`
--

CREATE TABLE `diem_danh` (
  `ma_diem_danh` int(11) NOT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `nguoi_diem_danh` int(11) DEFAULT NULL,
  `ma_sinh_vien` int(11) DEFAULT NULL,
  `ngay_diem_danh` text,
  `trang_thai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ghi_danh`
--

CREATE TABLE `ghi_danh` (
  `ma_ghi_danh` int(11) NOT NULL,
  `ma_hoc_phan` text,
  `ma_sinh_vien` text,
  `ngay_ghi_danh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `ma_hoc_ky` int(11) NOT NULL,
  `ten_hoc_ky` text,
  `ngay_bd` text,
  `ngay_ht` text,
  `nam_hoc` text,
  `tuan_bat_dau` text,
  `so_tuan` text,
  `loai_hoc_ky` text,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ten_hoc_phan` text,
  `ma_hoc_phan` text,
  `so_chi_ly_thuyet` text,
  `so_chi_thuc_hanh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(17, 'Hệ điều hành', 'TH1208', '2', '1'),
(18, 'Lập trình hướng đối tượng', 'TH1209', '2', '1'),
(19, 'Đồ họa máy tính', 'TH1210', '2', '1'),
(20, 'Lý thuyết ngôn ngữ hình thức & tính toán', 'TH1211', '2', '0'),
(21, 'Phân tích & thiết kế thuật toán', 'TH1212', '2', '0'),
(22, 'Web – Internet', 'TH1213', '2', '1'),
(23, 'Mạng máy tính', 'TH1214', '2', '1'),
(24, 'Truyền số liệu', 'TH1215', '2', '0'),
(25, 'Phần mềm mã nguồn mở', 'TH1216', '1', '1'),
(26, 'An toàn và vệ sinh lao động trong lĩnh vực CNTT', 'TH1217', '1', '0'),
(27, 'Toán rời rạc nâng cao', 'TH1218', '2', '0'),
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
(128, 'Thương mại điện tử', 'TH1606', '2', '1'),
(129, 'Cơ sở dữ liệu phân tán', 'TH1607', '2', '1'),
(130, 'Đồ án CNTT 2', 'TH1512', '0', '2'),
(131, 'Đồ án CNTT 1', 'TH1507', '0', '1'),
(132, NULL, NULL, NULL, NULL),
(133, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ket_qua_kiem_tra`
--

CREATE TABLE `ket_qua_kiem_tra` (
  `ma_ket_qua` int(11) NOT NULL,
  `ma_bai_kiem_tra` int(11) DEFAULT NULL,
  `ma_sinh_vien` int(11) DEFAULT NULL,
  `so_cau_dung` text,
  `so_diem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `ma_khoa` int(11) NOT NULL,
  `ten_khoa` text,
  `truong_khoa` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`ma_khoa`, `ten_khoa`, `truong_khoa`) VALUES
(1, 'Công Nghệ Thông Tin', 'Phan Anh Cang'),
(2, 'Công Nghệ Thực Phẩm', 'Mai Hoa');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `ma_lop` int(11) NOT NULL,
  `ma_khoa` int(11) DEFAULT NULL,
  `ten_lop` text,
  `nam_hoc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`ma_lop`, `ma_khoa`, `ten_lop`, `nam_hoc`) VALUES
(1, 1, '1CTT21A1', '2021-2025'),
(2, 1, '1CTT22A1', '2022-2026'),
(3, 1, '1CTT20A2', '2020-2024'),
(4, 1, '1CTT20A3', '2020-2024'),
(5, 1, '1CTT21A3', '2021-2025');

-- --------------------------------------------------------

--
-- Table structure for table `lop_hoc_phan`
--

CREATE TABLE `lop_hoc_phan` (
  `id_lop_hoc_phan` int(11) NOT NULL,
  `ten_lop_hoc_phan` text,
  `so_luong_sinh_vien` int(11) DEFAULT NULL,
  `giang_vien` int(11) DEFAULT NULL,
  `id_hoc_phan` int(11) DEFAULT NULL,
  `dot` int(11) DEFAULT NULL,
  `loai_lop` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_nguoi_dung` text,
  `ma_khoa` int(11) DEFAULT NULL,
  `ma_lop` int(11) DEFAULT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `hinh_anh` text,
  `gioi_tinh` text,
  `ngay_sinh` text,
  `noi_sinh` text,
  `ho_khau_thuong_tru` text,
  `cccd` text,
  `sdt` text,
  `email` text,
  `ma_quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `ten_nguoi_dung`, `ma_khoa`, `ma_lop`, `ma_hoc_phan`, `hinh_anh`, `gioi_tinh`, `ngay_sinh`, `noi_sinh`, `ho_khau_thuong_tru`, `cccd`, `sdt`, `email`, `ma_quyen`) VALUES
(1, 'Ngọc Hân', 2, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(2, 'Tuấn Anh', 1, NULL, NULL, NULL, 'Nam', NULL, 'Vĩnh Long', 'dưqdqew', 'ewqrqwe', '0943038574', NULL, 1),
(3, 'Ngọc Ngân', 2, 2, NULL, NULL, '1', NULL, 'Vĩnh Long', 'dưqdqew', 'ewqrqwe', 'dsadsa', 'fsdfsd', 3),
(4, 'Huyền Trân', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'Nguyễn Văn A', 1, NULL, NULL, NULL, 'Nam', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(6, 'Ngân', 2, NULL, NULL, NULL, 'Nam', NULL, 'Vĩnh Long', 'dsadsa', 'đâs', 'dsadsa', NULL, 2),
(7, 'Trần Văn B', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(8, 'Giảng Viên', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(9, 'Sinh viên', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(10, 'Admin', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 'Lê Hoàng An', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 'Trần Thái Bảo', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(13, 'Nguyễn Văn Hiếu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(14, 'Trần Thị Tố Loan', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(15, 'Trần Thu Mai', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(16, 'Nguyễn Vạn Năng', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(17, 'Nguyễn Ngọc Nga', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(18, 'Nguyễn Thị Mỹ Nga', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(19, 'Nguyễn Thị Hồng Yến', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(20, 'Lê Thị Hoàng Yến', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(21, 'Lê Thị Hạnh Hiền', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(22, 'Phan Anh Cang', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(23, 'Trần Hồ Đạt', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(24, 'Trần Thị Cẩm Tú', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(25, 'Nguyễn Hoàng Anh', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(26, 'Trần Phan An Trường', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(27, 'Mai Thiên Thư', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(28, 'Trần Thị Kim Ngân', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(29, 'Nguyễn Ngọc Hoàng Quyên', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(30, 'Hồ Chí Hưng', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(31, 'Lê Thị Mỹ Tiên', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(32, 'Nguyễn Khắc Tường', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(33, 'Nguyễn Công Kha', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(34, 'Lê Duy Linh', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nop_bai_tap`
--

CREATE TABLE `nop_bai_tap` (
  `ma_nop_bai` int(11) NOT NULL,
  `ma_bai_tap` int(11) DEFAULT NULL,
  `ma_sinh_vien_nop` int(11) DEFAULT NULL,
  `ngay_nop` text,
  `bai_nop` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ten_quyen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ten_tai_khoan` text,
  `mat_khau` text,
  `ma_nguoi_dung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_tai_khoan`, `ten_tai_khoan`, `mat_khau`, `ma_nguoi_dung`) VALUES
(6, 'ngochan@123', '$2y$12$78/poQ1pOvcHqZ97zhzUv.hCW16Hj4ncKcMbnGpdVLdAEHOcVWZ7W', 1),
(7, 'huyentran@123', '$2y$12$YgFphTYw68Ex3gkq9/wIBuFKkWO7sOGH3b7AboUAjOEJ4BMaKIFGW', 4),
(8, 'tuananh@123', '$2y$12$b5szlQIXbEID6LxGAOtZe.d6erwRTf4adJU2Nx7rWOEIsr3J3CNM.', 2),
(9, 'ngocngan', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 3),
(10, 'gv', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 8),
(11, 'sv', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 9),
(12, 'admin', '$2y$12$52I0KXF8z8jjvxhrBou/Du6LXE0k693sI/CTqhhmOPJmhRjBMw/SK', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_giang`
--
ALTER TABLE `bai_giang`
  ADD PRIMARY KEY (`ma_bai_giang`);

--
-- Indexes for table `bai_kiem_tra`
--
ALTER TABLE `bai_kiem_tra`
  ADD PRIMARY KEY (`ma_bai_kiem_tra`);

--
-- Indexes for table `bai_tap`
--
ALTER TABLE `bai_tap`
  ADD PRIMARY KEY (`ma_bai_tap`);

--
-- Indexes for table `cay_tien_trinh`
--
ALTER TABLE `cay_tien_trinh`
  ADD PRIMARY KEY (`ma_nganh`);

--
-- Indexes for table `dang_ky_hoc_phan`
--
ALTER TABLE `dang_ky_hoc_phan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diem_danh`
--
ALTER TABLE `diem_danh`
  ADD PRIMARY KEY (`ma_diem_danh`);

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
  ADD PRIMARY KEY (`ma_ket_qua`);

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
  MODIFY `ma_bai_giang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bai_kiem_tra`
--
ALTER TABLE `bai_kiem_tra`
  MODIFY `ma_bai_kiem_tra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bai_tap`
--
ALTER TABLE `bai_tap`
  MODIFY `ma_bai_tap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cay_tien_trinh`
--
ALTER TABLE `cay_tien_trinh`
  MODIFY `ma_nganh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dang_ky_hoc_phan`
--
ALTER TABLE `dang_ky_hoc_phan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diem_danh`
--
ALTER TABLE `diem_danh`
  MODIFY `ma_diem_danh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ghi_danh`
--
ALTER TABLE `ghi_danh`
  MODIFY `ma_ghi_danh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  MODIFY `id_hoc_phan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `ket_qua_kiem_tra`
--
ALTER TABLE `ket_qua_kiem_tra`
  MODIFY `ma_ket_qua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ma_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `ma_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lop_hoc_phan`
--
ALTER TABLE `lop_hoc_phan`
  MODIFY `id_lop_hoc_phan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `ma_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
