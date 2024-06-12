-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 04:16 AM
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
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `congty`
--

CREATE TABLE `congty` (
  `ten_CT` varchar(50) NOT NULL,
  `ma_nganh` varchar(50) NOT NULL,
  `yc_GPA` float NOT NULL,
  `so_luong` int(11) NOT NULL,
  `chi_tiet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `congty`
--

INSERT INTO `congty` (`ten_CT`, `ma_nganh`, `yc_GPA`, `so_luong`, `chi_tiet`) VALUES
('DYNAMIC', 'DT', 2.8, 4, 'https://www.topcv.vn/viec-lam/ky-su-dien-tu-dong-hoa-di-lam-ngay-thanh-tri-ha-noi/1317127.html'),
('DZ', 'DT', 2.9, 3, 'https://www.topcv.vn/viec-lam/ky-su-dien-dien-tu-co-khi-lam-viec-tai-bac-ninh-co-xe-dua-don/1311138.html?ta_source=JobSearchList_LinkDetail&u_sr_id=bGD2obVzytaCMhrssWgl6lSx9FcaOKO2LzkkzIf8_1714751134'),
('FPT', 'CN', 3, 3, 'https://daotao.ptit.edu.vn/tintuc/cong-ty-cp-fpt-tuyen-dung-can-bo-kiem-soat-tai-chinh-1616682578231'),
('HADUY', 'DT', 3.1, 5, 'https://www.topcv.vn/viec-lam/ky-su-co-dien-mec-elc-giam-sat-hien-truong/1316352.html?ta_source=JobListInNormalCompany_LinkDetail'),
('MobiFone', 'VT', 3.25, 4, 'https://www.topcv.vn/viec-lam/truong-nhom-kinh-doanh-giai-phap-vien-thong-cntt-nghi-thu-7-chu-nhat-thu-nhap-tu-20-25-trieu-tai-ha-noi/1317051.html?ta_source=JobSearchList_LinkDetail&u_sr_id=bGD2obVzytaCMhrssWgl6lSx9FcaOKO2LzkkzIf8_1714751272'),
('SAMSUNG', 'CN', 3.2, 0, 'https://portal.ptit.edu.vn/thong-bao-tuyen-dung-mang-ai-tai-samsung-rd-ha-noi/'),
('VIETTEL', 'CN', 3.4, 4, 'https://daotao.ptit.edu.vn/tintuc/tap-doan-cong-nghiep-vien-thong-quan-doi-viettel-thong-bao-tuyen-dung-1598513897275'),
('VNPT', 'VT', 3, 2, 'https://www.topcv.vn/brand/vnpttechnology/tuyen-dung/mobile-developers-j1320690.html?ta_source=JobSearchList_LinkDetail&u_sr_id=bGD2obVzytaCMhrssWgl6lSx9FcaOKO2LzkkzIf8_1714751272');

-- --------------------------------------------------------

--
-- Table structure for table `congty_sinhvien`
--

CREATE TABLE `congty_sinhvien` (
  `id` int(100) NOT NULL,
  `ten_CT` varchar(50) NOT NULL,
  `ma_SV` varchar(50) NOT NULL,
  `stt_nguyenvong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `congty_sinhvien`
--

INSERT INTO `congty_sinhvien` (`id`, `ten_CT`, `ma_SV`, `stt_nguyenvong`) VALUES
(6, 'FPT', 'B21DCCN004', 1),
(8, 'HADUY', 'B21DCCN004', 3),
(10, 'SAMSUNG', 'B21DCCN004', 2),
(11, 'VIETTEL', 'B21DCCN003', 1),
(17, 'SAMSUNG', 'B21DCCN002', 1),
(18, 'SAMSUNG', 'B21DCCN003', 2),
(19, 'FPT', 'B21DCCN001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `ma_nganh` varchar(50) NOT NULL,
  `ten_nganh` varchar(255) NOT NULL,
  `mo_ta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`ma_nganh`, `ten_nganh`, `mo_ta`) VALUES
('CN', 'Công nghệ thông tin', '1. Mã ngành: CN\r\n2. Khối lượng chương trình: 150 tín chỉ (không bao gồm Giáo dục thể chất, Giáo dục quốc phòng và Kỹ năng mềm)\r\n3. Triển vọng nghề nghiệp\r\nSau khi tốt nghiệp sinh viên có thể làm việc tại các vị trí cụ thể:\r\n   - Các Cục, Vụ: Cục Công ng'),
('DT', 'Điện tử', '1. Mã ngành: DT\r\n2. Khối lượng chương trình: 150 tín chỉ (không bao gồm Giáo dục thể chất, Giáo dục quốc phòng và Kỹ năng mềm)\r\n3. Triển vọng nghề nghiệp\r\nSau khi tốt nghiệp sinh viên có thể làm việc tại các vị trí cụ thể:\r\n   - Các Cục, Vụ: Cục Công nghệ'),
('VT', 'Viễn thông', '1. Mã ngành: VT\r\n2. Khối lượng chương trình: 150 tín chỉ (không bao gồm Giáo dục thể chất, Giáo dục quốc phòng và Kỹ năng mềm)\r\n3. Triển vọng nghề nghiệp\r\nSau khi tốt nghiệp sinh viên có thể làm việc tại các vị trí cụ thể:\r\n   - Các Cục, Vụ: Cục Công nghệ');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `ma_SV` varchar(50) NOT NULL,
  `ma_nganh` varchar(50) NOT NULL,
  `GPA` float NOT NULL,
  `lop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`ma_SV`, `ma_nganh`, `GPA`, `lop`) VALUES
('B21DCCN001', 'CN', 3.66, 'D21CQCN11-B'),
('B21DCCN002', 'CN', 3.34, 'D21CQCN01-B'),
('B21DCCN003', 'CN', 3.52, 'D21CQCN01-B'),
('B21DCCN004', 'CN', 3.2, 'D21CQCN01-B'),
('B21DCCN005', 'CN', 2.9, 'D21CQCN02-B'),
('B21DCCN006', 'CN', 3.05, 'D21CQCN01-B'),
('B21DCCN355', 'CN', 0.03, '1002'),
('B21DCCN779', 'CN', 1.02, '111111'),
('B21DCDT001', 'DT', 3, 'D21CQDT01-B'),
('B21DCDT002', 'DT', 2.6, 'D21CQDT01-B'),
('B21DCDT003', 'DT', 2.8, 'D21CQDT02-B'),
('B21DCDT004', 'DT', 3.25, 'D21CQDT01-B'),
('B21DCDT005', 'DT', 2.5, 'D21CQDT02-B'),
('B21DCVT001', 'VT', 3.36, 'D21CQVT01-B'),
('B21DCVT002', 'VT', 3.15, 'D21CQVT01-B'),
('B21DCVT003', 'VT', 3.15, 'D21CQVT02-B'),
('B21DCVT004', 'VT', 2.88, 'D21CQVT01-B'),
('B21DCVT005', 'VT', 3.2, 'D21CQVT02-B');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL DEFAULT '123',
  `fullname` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `avata` varchar(255) DEFAULT '/uploads/avata_mac_dinh.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`user`, `pass`, `fullname`, `birth`, `gender`, `phone`, `email`, `addr`, `role`, `avata`) VALUES
('admin', '123', 'Phạm Thị Ngọc Mai', '2003-02-10', 'Nữ', '0583891780', 'admin@gmail.com', 'Thủy Nguyên, Hải Phòng', 0, '/QLSV/images/anhsv/101.png'),
('B21DCCN001', '123', 'Phạm Thị Ngọc Mai', '2003-02-10', 'Nữ', '0911234567', 'sv001test@gmail.com', 'Thủy Nguyên, Hải Phòng', 1, '/QLSV/images/anhsv/101.png'),
('B21DCCN002', '123', 'Phạm Nguyễn Mai Thương', '2003-07-28', 'Nữ', '0981234567', 'sv002@gmail.com', '369 Nguyễn Huệ, Hà Nội', 1, '/QLSV/images/anhsv/102.jpg'),
('B21DCCN003', '123', 'Phạm Quốc Hùng', '2003-03-25', 'Nam', '0512345678', 'sv003@gmail.com', '654 Nguyễn Văn Linh, Đà Nẵng', 1, '/QLSV/images/anhsv/103.jpg'),
('B21DCCN004', '123', 'Nguyễn Mạc Quang Anh', '2003-05-07', 'Nam', '0366661234', 'sv004@gmail.com', 'Hà Đông, Hà Nội', 1, '/QLSV/images/anhsv/104.png'),
('B21DCCN005', '123', 'Đỗ Thùy Anh', '2003-09-02', 'Nữ', '0987654321', 'sv005@gmail.com', '852 Nguyễn Thị Minh Khai, Hà Nội', 1, '/QLSV/images/anhsv/105.png'),
('B21DCCN006', '123', 'Đỗ Hải Long', '2003-06-12', 'Nam', '0912345672', 'sv006@gmail.com', '654 Nguyễn Văn Linh, TP. Đà Nẵng', 1, '/QLSV/images/anhsv/106.jpg'),
('B21DCCN355', '123', 'Pham Thi Ngoc Mai', '0000-00-00', 'Nữ', '0583891780', 'mai.pham.1022k3@gmail.com', '', 1, ''),
('B21DCCN779', '123', 'Pham Thi Ngoc Mai', '0000-00-00', '', '0583891780', 'mai.pham.1022k3@gmail.com', '', 1, '/QLSV/images/avatar-default.svg'),
('B21DCDT001', '123', 'Nguyễn Thị Minh', '2003-06-01', 'Nữ', '0765432198', 'sv007@gmail.com', '951 Trần Phú, Đà Nẵng', 1, '/QLSV/images/anhsv/107.png'),
('B21DCDT002', '123', 'Hoàng Thị Hồng Lê', '2003-09-20', 'Nữ', '0987654321', 'sv008@gmail.com', '753 Lê Lợi, Hải Phòng', 1, '/QLSV/images/anhsv/108.png'),
('B21DCDT003', '123', 'Nguyễn Văn Quân', '2003-05-01', 'Nam', '0912345676', 'sv009@gmail.com', '789 Nguyễn Trãi, Hà Nội', 1, '/QLSV/images/anhsv/109.png'),
('B21DCDT004', '123', 'Bùi Nhật Mai', '2003-10-03', 'Nữ', '0987654320', 'sv010@gmail.com', '654 Lý Thường Kiệt, Quảng Ninh', 1, '/QLSV/images/anhsv/1010.png'),
('B21DCDT005', '123', 'Đào Minh Quân', '2003-09-18', 'Nam', '0543219876', 'sv011@gmail.com', '456 Lê Lai, Hà Nội', 1, '/QLSV/images/anhsv/1011.png'),
('B21DCVT001', '123', 'Phạm Thị Thu Phương', '2003-02-28', 'Nữ', '0987654323', 'sv012@gmail.com', '6 Nguyễn Trãi, Hải Phòng', 1, '/QLSV/images/anhsv/1012.png'),
('B21DCVT002', '123', 'Tạ Phương Linh', '2003-12-22', 'Nữ', '0765432198', 'sv013@gmail.com', '258 Hai Bà Trưng, Hà Nội', 1, '/QLSV/images/anhsv/1013.png'),
('B21DCVT003', '123', 'Đỗ Cẩm Chi', '2003-04-11', 'Nữ', '0123456794', 'sv014@gmail.com', '789 Ngô Gia Tự, Hà Nội', 1, '/QLSV/images/anhsv/1014.png'),
('B21DCVT004', '123', 'Trần Anh Dũng', '2003-04-15', 'Nam', '0987654321', 'sv015@gmail.com', '333 Trần Hưng Đạo, Hải Phòng', 1, '/QLSV/images/anhsv/1017.jpg'),
('B21DCVT005', '123', 'Nguyễn Việt Tú', '2003-03-15', 'Nam', '0986654321', 'sv016@gmail.com', '654 Lý Thường Kiệt, Quảng Ninh', 1, '/QLSV/images/anhsv/1016.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `congty`
--
ALTER TABLE `congty`
  ADD PRIMARY KEY (`ten_CT`),
  ADD KEY `ma_nganh` (`ma_nganh`);

--
-- Indexes for table `congty_sinhvien`
--
ALTER TABLE `congty_sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sinhvien` (`ma_SV`),
  ADD KEY `fk_congty` (`ten_CT`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`ma_nganh`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`ma_SV`),
  ADD KEY `ma_nganh` (`ma_nganh`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congty_sinhvien`
--
ALTER TABLE `congty_sinhvien`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `congty`
--
ALTER TABLE `congty`
  ADD CONSTRAINT `congty_ibfk_1` FOREIGN KEY (`ma_nganh`) REFERENCES `nganh` (`ma_nganh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `congty_sinhvien`
--
ALTER TABLE `congty_sinhvien`
  ADD CONSTRAINT `fk_congty` FOREIGN KEY (`ten_CT`) REFERENCES `congty` (`ten_CT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sinhvien` FOREIGN KEY (`ma_SV`) REFERENCES `sinhvien` (`ma_SV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`ma_SV`) REFERENCES `taikhoan` (`user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`ma_nganh`) REFERENCES `nganh` (`ma_nganh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
