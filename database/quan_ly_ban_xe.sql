-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2022 lúc 03:56 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_ban_xe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123'),
('admin1', 'haitruong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `id_hoa_don` int(11) NOT NULL,
  `id_xe` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`id_hoa_don`, `id_xe`, `so_luong`, `gia`) VALUES
(12, 33, 1, 147490000),
(13, 37, 1, 39900000),
(13, 40, 2, 79900000),
(14, 43, 1, 25700000),
(14, 39, 2, 68900000),
(15, 35, 1, 1050000000),
(15, 41, 1, 48600000),
(16, 33, 1, 147490000),
(16, 35, 1, 1050000000),
(16, 40, 1, 79900000),
(17, 43, 1, 25700000),
(17, 36, 1, 27900000),
(18, 33, 1, 147490000),
(18, 43, 1, 25700000),
(19, 34, 1, 105390000),
(19, 35, 1, 1050000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_xe`
--

CREATE TABLE `chi_tiet_xe` (
  `id_xe_chi_tiet` int(11) NOT NULL,
  `id_xe` int(11) NOT NULL,
  `so_khung` varchar(20) NOT NULL,
  `so_may` varchar(20) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: chưa bán, 2: đã bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_xe`
--

CREATE TABLE `hang_xe` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hang_xe`
--

INSERT INTO `hang_xe` (`id`, `name`) VALUES
(1, 'Yamaha'),
(2, 'Suzuki'),
(3, 'Honda'),
(4, 'SYM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `ngay_mua` date NOT NULL,
  `so_tien_khach_tra` int(11) NOT NULL,
  `tong_tien_phai_tra` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chờ Xử Lý\r\n1: Chưa Thanh Toán\r\n\r\n2: Đã Thánh Toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `id_nhan_vien`, `id_khach_hang`, `ngay_mua`, `so_tien_khach_tra`, `tong_tien_phai_tra`, `trang_thai`) VALUES
(12, 1, 1, '2022-07-05', 147490000, 147490000, 2),
(13, 1, 1, '2022-07-09', 200000000, 199700000, 2),
(14, 2, 3, '2022-07-13', 165000000, 163500000, 0),
(15, 1, 2, '2022-07-04', 1000000000, 1098600000, 1),
(16, 17, 2, '2022-07-07', 1280000000, 1277390000, 0),
(17, 1, 1, '2022-07-08', 50000000, 53600000, 1),
(18, 2, 5, '2022-07-09', 170000000, 173190000, 1),
(19, 2, 1, '2022-07-07', 1200000000, 1155390000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(25) NOT NULL,
  `dia_chi` varchar(250) NOT NULL,
  `so_dien_thoai` int(12) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Đã kích hoạt 2: Đã khóa\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ho_ten`, `dia_chi`, `so_dien_thoai`, `ngay_sinh`, `status`) VALUES
(1, 'Ngô Văn Hải Trường', '      Hà Lam Thăng Bình Quảng Nam      ', 373705810, '2002-09-05', 1),
(2, 'Trần Viết Thái', '99 Tô Hiến Thành Sơn Trà Đà Nẵng', 945028481, '2002-07-31', 1),
(3, 'Dương văn nguyên', '  Quảng Nam ', 945031218, '2002-10-20', 1),
(5, 'Ngô Duy Hưng', 'Huế', 373705810, '2005-10-26', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `so_dien_thoai` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ho_ten`, `email`, `so_dien_thoai`) VALUES
(1, 'Nguyễn Thành Ý', 'thanh_y@gmail.com', 945028485),
(2, 'Nguyễn Văn Thành', 'thanh@gmail.com', 945028481),
(17, 'Thái Văn Nhật', 'nhat@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhap`
--

CREATE TABLE `nhap` (
  `id` int(11) NOT NULL,
  `id_hang_xe` int(11) NOT NULL,
  `ten_xe` varchar(250) NOT NULL,
  `mauxe` varchar(10) NOT NULL,
  `so_luong` int(100) NOT NULL,
  `thongso` text NOT NULL,
  `gia` int(11) NOT NULL,
  `images` varchar(20) NOT NULL,
  `ngay_nhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhap`
--

INSERT INTO `nhap` (`id`, `id_hang_xe`, `ten_xe`, `mauxe`, `so_luong`, `thongso`, `gia`, `images`, `ngay_nhap`) VALUES
(23, 3, 'Honda CB150R The Streetster', 'Đen - Đỏ', 6, '', 105390000, 'cbr.jpg', '2022-07-01'),
(24, 3, 'Honda CBR1000RR-R Fireblade SP', 'Xanh', 3, '', 1050000000, 'cbr1k.jpg', '2022-07-01'),
(25, 1, 'Yamaha Luvias', 'Trắng - Đỏ', 6, '', 27900000, 'luvias.jpg', '2022-07-02'),
(26, 1, 'Yamaha Nozza Grande', 'Xanh', 6, '', 39900000, 'grande.jpg', '2022-07-02'),
(27, 1, 'Yamaha Exciter 155', 'Xanh - Đen', 8, '', 55900000, 'exciter.jpg', '2022-07-02'),
(28, 2, 'Suzuki Bandit 150', 'Đen - Đỏ', 10, '', 68900000, 'bandit.jpeg', '2022-07-03'),
(29, 2, 'Suzuki GSX-R150', 'Xanh - Đen', 3, '', 79900000, 'gsx.jpg', '2022-07-03'),
(30, 2, 'Suzuki Burgman Street', 'Đen', 3, '', 48600000, 'burgman.jpg', '2022-07-03'),
(31, 4, 'SYM PASSING 50', 'Đen', 6, '', 25700000, 'passing.jpg', '2022-07-04'),
(32, 4, 'SYM Attila 50', 'Đỏ', 7, '', 25700000, 'attila.jpg', '2022-07-04'),
(33, 4, 'SYM ELEGANT 50', 'Đen - Đỏ', 5, '', 16600000, 'elegant.jpg', '2022-07-04'),
(37, 3, 'Sh 2023', 'Xanh', 6, '', 17, 'cb500f.jpg', '2022-07-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `id` int(11) NOT NULL,
  `id_nhap` int(11) NOT NULL,
  `id_hang` int(11) NOT NULL,
  `ten_xe` varchar(50) NOT NULL,
  `mau_xe` varchar(10) NOT NULL,
  `thongso` text NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong_nhap` int(100) NOT NULL,
  `soluong_da_ban` int(100) NOT NULL,
  `images` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`id`, `id_nhap`, `id_hang`, `ten_xe`, `mau_xe`, `thongso`, `gia`, `soluong_nhap`, `soluong_da_ban`, `images`) VALUES
(33, 22, 3, 'Honda CB500F 2021', 'Đen', '', 147490000, 7, 1, 'cb500f.jpg'),
(34, 23, 3, 'Honda CB150R The Streetster', 'Đen - Đỏ', '', 105390000, 6, 1, 'cbr.jpg'),
(35, 24, 3, 'Honda CBR1000RR-R Fireblade SP', 'Xanh', '', 1050000000, 3, 1, 'cbr1k.jpg'),
(36, 25, 1, 'Yamaha Luvias', 'Trắng - Đỏ', '', 27900000, 6, 1, 'yamaha_luvias.jpg'),
(37, 26, 1, 'Yamaha Nozza Grande', 'Xanh', '', 39900000, 6, 1, 'grande.jpg'),
(38, 27, 1, 'Yamaha Exciter 155', 'Xanh - Đen', '', 55900000, 8, 0, 'exciter.jpg'),
(39, 28, 2, 'Suzuki Bandit 150', 'Đen - Đỏ', '', 68900000, 10, 2, 'bandit.jpeg'),
(40, 29, 2, 'Suzuki GSX-R150', 'Xanh - Đen', '', 79900000, 3, 1, 'gsx.jpg'),
(41, 30, 2, 'Suzuki Burgman Street', 'Đen', '', 48600000, 3, 1, 'burgman.jpg'),
(42, 31, 4, 'SYM PASSING 50', 'Đen', '', 25700000, 6, 0, 'passing.jpg'),
(43, 32, 4, 'SYM Attila 50', 'Đỏ', '', 25700000, 7, 1, 'dshow.exe'),
(44, 33, 4, 'SYM ELEGANT 50', 'Đen - Đỏ', '', 16600000, 5, 0, 'elegant.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD KEY `id_xe` (`id_xe`),
  ADD KEY `id_hoa_don` (`id_hoa_don`);

--
-- Chỉ mục cho bảng `chi_tiet_xe`
--
ALTER TABLE `chi_tiet_xe`
  ADD PRIMARY KEY (`id_xe_chi_tiet`),
  ADD KEY `id_xe` (`id_xe`);

--
-- Chỉ mục cho bảng `hang_xe`
--
ALTER TABLE `hang_xe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhap`
--
ALTER TABLE `nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hang` (`id_hang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_xe`
--
ALTER TABLE `chi_tiet_xe`
  MODIFY `id_xe_chi_tiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hang_xe`
--
ALTER TABLE `hang_xe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nhap`
--
ALTER TABLE `nhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_don` (`id`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`id_xe`) REFERENCES `xe` (`id`);

--
-- Các ràng buộc cho bảng `chi_tiet_xe`
--
ALTER TABLE `chi_tiet_xe`
  ADD CONSTRAINT `chi_tiet_xe_ibfk_1` FOREIGN KEY (`id_xe`) REFERENCES `xe` (`id`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`id_hang`) REFERENCES `hang_xe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
