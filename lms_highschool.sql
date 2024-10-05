-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2024 at 08:19 AM
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
-- Database: `lms_highschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ma_admin` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ten_admin` text,
  `hinh_anh` text,
  `gioi_tinh` text,
  `ngay_sinh` text,
  `noi_sinh` text,
  `ho_khau_thuong_tru` text,
  `cccd` text,
  `email` text,
  `so_dien_thoai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bai_hoc`
--

CREATE TABLE `bai_hoc` (
  `ma_bai_hoc` int(11) NOT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ten_bai_hoc` text,
  `noi_dung_bai_hoc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bai_kiem_tra`
--

CREATE TABLE `bai_kiem_tra` (
  `ma_bai_kt` int(11) NOT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ma_hoc_sinh` int(11) DEFAULT NULL,
  `ma_diem` int(11) DEFAULT NULL,
  `dap_an_da_chon` text,
  `dap_an_cau` text,
  `so_cau` text,
  `tieu_de` text,
  `thoi_gian_lam_bai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bai_tap`
--

CREATE TABLE `bai_tap` (
  `ma_bai_tap` int(11) NOT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ten_bai_tap` int(11) NOT NULL,
  `noi_dung_bt` int(11) NOT NULL,
  `han_nop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bo_mon`
--

CREATE TABLE `bo_mon` (
  `ma_bo_mon_giang_day` int(11) NOT NULL,
  `ma_giao_vien` int(11) DEFAULT NULL,
  `truong_bo_mon` int(11) DEFAULT NULL,
  `ten_bo_mon` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dang_ky_mon_hoc`
--

CREATE TABLE `dang_ky_mon_hoc` (
  `ma_dang_ky` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ngay_dang_ky` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `ma_danh_gia` int(11) NOT NULL,
  `ma_hoc_sinh` int(11) DEFAULT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `nam_hoc` text,
  `hoc_ky` text,
  `noi_dung` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `ma_diem` int(11) NOT NULL,
  `mai_bai_kt` int(11) DEFAULT NULL,
  `diem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diem_danh`
--

CREATE TABLE `diem_danh` (
  `ma_diem_danh` int(11) NOT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ma_hoc_sinh` int(11) DEFAULT NULL,
  `ngay_diem_danh` text,
  `trang_thai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giao_vien`
--

CREATE TABLE `giao_vien` (
  `ma_giao_vien` int(11) NOT NULL,
  `ma_bo_mon_giang_day` text,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ten_giao_vien` text,
  `hinh_anh` text,
  `gioi_tinh` text,
  `ngay_sinh` text,
  `noi_sinh` text,
  `dia_chi_thuong_tru` text,
  `cccd` text,
  `so_dien_thoai` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoc_sinh`
--

CREATE TABLE `hoc_sinh` (
  `ma_hoc_sinh` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_lop` int(11) DEFAULT NULL,
  `ten_hoc_sinh` text,
  `email` text,
  `so_dien_thoai` text,
  `hinh_anh` text,
  `gioi_tinh` text,
  `ngay_sinh` text,
  `noi_sinh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khoi`
--

CREATE TABLE `khoi` (
  `ma_khoi` int(11) NOT NULL,
  `ten_khoi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ky_thi`
--

CREATE TABLE `ky_thi` (
  `ma_kiem_tra` int(11) NOT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ten_ky_thi` text,
  `ngay_thi` text,
  `thoi_gian_tao` text,
  `thoi_gian_cap_nhat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `ma_lop` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_khoi` int(11) DEFAULT NULL,
  `ten_lop` text,
  `nien_khoa` text,
  `hoc_ky` text,
  `trang_thai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `ma_mon` int(11) NOT NULL,
  `ma_lop` int(11) DEFAULT NULL,
  `ma_giao_vien` int(11) DEFAULT NULL,
  `ten_mon` text,
  `noi_dung_mon_hoc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_tai_khoan` text,
  `mat_khau` text,
  `quyen` text,
  `anh_dai_dien` text,
  `ho_ten` text,
  `email` text,
  `sdt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nop_bai`
--

CREATE TABLE `nop_bai` (
  `ma_nop_bai` int(11) NOT NULL,
  `ma_bai_tap` int(11) DEFAULT NULL,
  `ma_hoc_sinh` int(11) DEFAULT NULL,
  `ngay_nop` text,
  `bai_nop` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thong_bao`
--

CREATE TABLE `thong_bao` (
  `ma_thong_bao` int(11) NOT NULL,
  `ma_giao_vien` int(11) NOT NULL,
  `ma_hoc_sinh` int(11) NOT NULL,
  `tieu_de` text NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` text NOT NULL,
  `loai_thong_bao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma_admin`);

--
-- Indexes for table `bai_hoc`
--
ALTER TABLE `bai_hoc`
  ADD PRIMARY KEY (`ma_bai_hoc`);

--
-- Indexes for table `bai_kiem_tra`
--
ALTER TABLE `bai_kiem_tra`
  ADD PRIMARY KEY (`ma_bai_kt`);

--
-- Indexes for table `bo_mon`
--
ALTER TABLE `bo_mon`
  ADD PRIMARY KEY (`ma_bo_mon_giang_day`);

--
-- Indexes for table `dang_ky_mon_hoc`
--
ALTER TABLE `dang_ky_mon_hoc`
  ADD PRIMARY KEY (`ma_dang_ky`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`ma_danh_gia`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`ma_diem`);

--
-- Indexes for table `diem_danh`
--
ALTER TABLE `diem_danh`
  ADD PRIMARY KEY (`ma_diem_danh`);

--
-- Indexes for table `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`ma_giao_vien`);

--
-- Indexes for table `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD PRIMARY KEY (`ma_hoc_sinh`);

--
-- Indexes for table `khoi`
--
ALTER TABLE `khoi`
  ADD PRIMARY KEY (`ma_khoi`);

--
-- Indexes for table `ky_thi`
--
ALTER TABLE `ky_thi`
  ADD PRIMARY KEY (`ma_kiem_tra`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ma_lop`);

--
-- Indexes for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`ma_mon`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`);

--
-- Indexes for table `nop_bai`
--
ALTER TABLE `nop_bai`
  ADD PRIMARY KEY (`ma_nop_bai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ma_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bai_hoc`
--
ALTER TABLE `bai_hoc`
  MODIFY `ma_bai_hoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bai_kiem_tra`
--
ALTER TABLE `bai_kiem_tra`
  MODIFY `ma_bai_kt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bo_mon`
--
ALTER TABLE `bo_mon`
  MODIFY `ma_bo_mon_giang_day` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dang_ky_mon_hoc`
--
ALTER TABLE `dang_ky_mon_hoc`
  MODIFY `ma_dang_ky` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `ma_danh_gia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diem`
--
ALTER TABLE `diem`
  MODIFY `ma_diem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diem_danh`
--
ALTER TABLE `diem_danh`
  MODIFY `ma_diem_danh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `ma_giao_vien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  MODIFY `ma_hoc_sinh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoi`
--
ALTER TABLE `khoi`
  MODIFY `ma_khoi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ky_thi`
--
ALTER TABLE `ky_thi`
  MODIFY `ma_kiem_tra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `ma_lop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `ma_mon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nop_bai`
--
ALTER TABLE `nop_bai`
  MODIFY `ma_nop_bai` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
