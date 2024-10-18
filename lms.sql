-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 08:06 AM
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
  `so_chi_ly_thuyet` text,
  `so_chi_thuc_hanh` text,
  `ma_hoc_phan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoc_phan`
--

INSERT INTO `hoc_phan` (`id_hoc_phan`, `ten_hoc_phan`, `so_chi_ly_thuyet`, `so_chi_thuc_hanh`, `ma_hoc_phan`) VALUES
(1, 'Lập trình web', '2', '2', NULL),
(2, 'Lập trình mạng', '2', '1', NULL),
(8, 'Lập trình mạng', '1', '1', NULL);

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
(1, 'Công nghệ thông tin', 'Phan Anh Cang');

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
(1, 1, '1CTT21A1', '2023-2024'),
(2, 1, '1CTT21A1', '2021-2022'),
(3, 1, '1CTT21A2', '2020-2021'),
(4, 1, '1CTT21A3', '2023-2024'),
(5, 1, '1CTT21A3', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `lop_hoc_phan`
--

CREATE TABLE `lop_hoc_phan` (
  `id_lop_hoc_phan` int(11) NOT NULL,
  `ten_lop_hoc_phan` text
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
(1, 'Ngọc Hân', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Tuấn Anh', 1, NULL, NULL, NULL, 'Nam', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(3, 'Ngọc Ngân', 1, 1, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(4, 'Huyền Trân', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'Nguyễn Văn A', 1, NULL, NULL, NULL, 'Nam', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(6, 'Na Na', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(7, 'Trần Văn B', 1, NULL, NULL, NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, 2);

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
(8, 'tuananh@123', '$2y$12$b5szlQIXbEID6LxGAOtZe.d6erwRTf4adJU2Nx7rWOEIsr3J3CNM.', 2);

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
  MODIFY `id_hoc_phan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ket_qua_kiem_tra`
--
ALTER TABLE `ket_qua_kiem_tra`
  MODIFY `ma_ket_qua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ma_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `ma_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
