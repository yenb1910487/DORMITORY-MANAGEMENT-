-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th3 11, 2023 lúc 03:28 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25
create database ktx1;
use ktx1;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ktx1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `idnv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `taikhoan`, `matkhau`, `idnv`) VALUES
(7, 'admin', '202cb962ac59075b964b07152d234b70', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(10) NOT NULL,
  `madichvu` varchar(10) NOT NULL,
  `tendichvu` varchar(50) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id`, `madichvu`, `tendichvu`, `dongia`) VALUES
(2, 'XEMAY', 'Gửi xe máy 2', 100000),
(5, 'XEDAP', 'Gửi xe đạp', 20000),
(7, 'QR', 'Quét rác', 25000),
(8, 'VS', 'Vệ sinh khu vực', 70000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) NOT NULL,
  `mahoadon` varchar(10) NOT NULL,
  `sodien` int(10) NOT NULL,
  `tiendien` float NOT NULL,
  `sonuoc` int(10) NOT NULL,
  `tiennuoc` float NOT NULL,
  `ngaylap` date NOT NULL,
  `kiemtra` int(1) NOT NULL,
  `id_ktx` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `mahoadon`, `sodien`, `tiendien`, `sonuoc`, `tiennuoc`, `ngaylap`, `kiemtra`, `id_ktx`) VALUES
(37, '101', 10, 75000, 50, 200000, '2022-11-20', 1, 1),
(43, '102', 11, 82500, 22, 88000, '2022-11-24', 0, 4),
(44, '103', 2, 15000, 22, 88000, '2022-11-24', 0, 5),
(45, '104', 2, 15000, 244, 976000, '2022-11-24', 0, 7),
(46, '105', 22, 165000, 213, 852000, '2022-11-24', 1, 10),
(47, '106', 22, 165000, 16, 64000, '2022-11-24', 1, 21),
(48, '107', 22, 165000, 16, 64000, '2022-11-24', 1, 22),
(49, '108', 22, 165000, 16, 64000, '2022-11-24', 0, 23),
(50, '109', 22, 165000, 16, 64000, '2022-11-24', 1, 24),
(51, '110', 22, 165000, 168, 672000, '2022-11-24', 0, 25),
(52, '111', 22, 165000, 74, 296000, '2022-11-24', 0, 8),
(53, '112', 111, 832500, 22, 88000, '2022-11-24', 1, 26),
(54, '113', 111, 832500, 222, 888000, '2022-11-24', 0, 27),
(55, '114', 111, 832500, 16, 64000, '2022-11-24', 1, 28),
(56, '115', 111, 832500, 2, 8000, '2022-11-24', 1, 29),
(57, '116', 111, 832500, 255, 1020000, '2022-11-24', 0, 30),
(58, '117', 22, 165000, 12, 48000, '2022-11-25', 0, 31),
(59, '118', 22, 165000, 12, 48000, '2022-11-25', 0, 32),
(60, '119', 22, 165000, 12, 48000, '2022-11-25', 0, 33),
(61, '120', 22, 165000, 12, 48000, '2022-11-25', 0, 34),
(62, '121', 33, 247500, 22, 88000, '2022-11-25', 0, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` int(10) NOT NULL,
  `ngaylap` date NOT NULL,
  `idnv` int(10) NOT NULL,
  `idkytucxa` int(10) NOT NULL,
  `idsinhvien_da_o` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id`, `ngaylap`, `idnv`, `idkytucxa`, `idsinhvien_da_o`) VALUES
(134, '2022-11-20', 10, 1, 151),
(135, '2022-11-20', 10, 1, 152),
(136, '2022-11-20', 10, 1, 153),
(137, '2022-11-20', 10, 1, 154),
(138, '2022-11-20', 10, 1, 155),
(139, '2022-11-20', 10, 1, 156),
(140, '2022-11-20', 10, 1, 157),
(142, '2022-11-20', 10, 5, 159),
(143, '2022-11-20', 10, 10, 160),
(144, '2022-11-20', 10, 10, 161),
(145, '2022-11-20', 10, 21, 162),
(146, '2022-11-20', 10, 21, 163),
(147, '2022-11-20', 10, 23, 164),
(148, '2022-11-20', 10, 23, 165),
(149, '2022-11-20', 10, 23, 166),
(150, '2022-11-20', 10, 24, 167),
(151, '2022-11-20', 10, 27, 168),
(152, '2022-11-20', 10, 28, 169),
(153, '2022-11-20', 10, 29, 170),
(154, '2022-11-20', 10, 31, 171),
(155, '2022-11-20', 10, 31, 172),
(156, '2022-11-20', 10, 33, 173),
(157, '2022-11-20', 10, 9, 174),
(158, '2022-11-20', 10, 9, 175),
(159, '2022-11-20', 10, 9, 176),
(160, '2022-11-20', 10, 1, 177),
(161, '2022-11-20', 10, 29, 178),
(162, '2022-11-23', 10, 48, 179),
(163, '2023-03-09', 10, 21, 180);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kytucxa`
--

CREATE TABLE `kytucxa` (
  `id` int(10) NOT NULL,
  `toanha` varchar(5) NOT NULL,
  `phong` varchar(5) NOT NULL,
  `loaiphong` varchar(7) NOT NULL,
  `songuoihientai` int(2) NOT NULL,
  `songuoitoida` int(2) NOT NULL,
  `giaphong` float NOT NULL,
  `tinhtrangphong` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kytucxa`
--

INSERT INTO `kytucxa` (`id`, `toanha`, `phong`, `loaiphong`, `songuoihientai`, `songuoitoida`, `giaphong`, `tinhtrangphong`) VALUES
(1, 'A1', '101', 'Nam', 8, 8, 12000, 0),
(4, 'A1', '102', 'Nam', 0, 8, 120000, 1),
(5, 'A1', '103', 'Nam', 1, 8, 120000, 0),
(7, 'A1', '104', 'Nam', 0, 8, 120000, 0),
(8, 'A2', '101', 'Nữ', 0, 8, 190000, 0),
(9, 'A3', '101', 'Nữ', 3, 8, 210000, 0),
(10, 'A1', '105', 'Nam', 2, 8, 120000, 0),
(11, 'B2', '101', 'Nam', 0, 8, 170000, 0),
(12, 'B2', '102', 'Nam', 0, 8, 170000, 0),
(13, 'B2', '103', 'Nam', 0, 8, 170000, 0),
(14, 'B2', '104', 'Nam', 0, 8, 170000, 0),
(15, 'B2', '105', 'Nam', 0, 8, 170000, 0),
(16, 'B1', '101', 'Nữ', 0, 8, 120000, 0),
(17, 'B1', '102', 'Nữ', 0, 8, 120000, 0),
(18, 'B1', '103', 'Nữ', 0, 8, 120000, 0),
(19, 'B1', '104', 'Nữ', 0, 8, 120000, 0),
(20, 'B1', '105', 'Nữ', 0, 8, 120000, 0),
(21, 'A1', '106', 'Nam', 3, 8, 120000, 0),
(22, 'A1', '107', 'Nam', 0, 8, 120000, 0),
(23, 'A1', '108', 'Nam', 3, 8, 120000, 0),
(24, 'A1', '109', 'Nam', 1, 8, 120000, 0),
(25, 'A1', '110', 'Nam', 0, 8, 120000, 1),
(26, 'A2', '102', 'Nữ', 0, 8, 190000, 1),
(27, 'A2', '103', 'Nữ', 1, 8, 190000, 0),
(28, 'A2', '104', 'Nữ', 1, 8, 190000, 0),
(29, 'A2', '105', 'Nữ', 2, 8, 190000, 0),
(30, 'A2', '106', 'Nữ', 0, 8, 190000, 0),
(31, 'A2', '107', 'Nữ', 2, 8, 190000, 0),
(32, 'A2', '108', 'Nữ', 0, 8, 190000, 0),
(33, 'A2', '109', 'Nữ', 1, 8, 190000, 0),
(34, 'A2', '110', 'Nữ', 0, 8, 190000, 0),
(35, 'B1', '106', 'Nữ', 0, 8, 120000, 0),
(36, 'B1', '107', 'Nữ', 0, 8, 120000, 0),
(37, 'B1', '108', 'Nữ', 0, 8, 120000, 0),
(38, 'B1', '109', 'Nữ', 0, 8, 120000, 0),
(39, 'B1', '110', 'Nữ', 0, 8, 120000, 0),
(40, 'B2', '106', 'Nam', 0, 8, 170000, 0),
(41, 'B2', '107', 'Nam', 0, 8, 170000, 0),
(42, 'B2', '108', 'Nam', 0, 8, 170000, 0),
(43, 'B2', '109', 'Nam', 0, 8, 170000, 0),
(44, 'B2', '110', 'Nam', 0, 8, 170000, 0),
(45, 'B2', '111', 'Nam', 0, 8, 170000, 0),
(46, 'A3', '102', 'Nữ', 0, 8, 210000, 0),
(47, 'A3', '103', 'Nữ', 0, 8, 210000, 0),
(48, 'A3', '104', 'Nữ', 1, 8, 210000, 0),
(49, 'A3', '105', 'Nữ', 0, 8, 210000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenvong_ktx`
--

CREATE TABLE `nguyenvong_ktx` (
  `id` int(10) NOT NULL,
  `id_sv` int(10) NOT NULL,
  `id_ktx` int(10) NOT NULL,
  `ngaydangky` datetime NOT NULL,
  `trangthai` int(10) NOT NULL,
  `ghichu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenvong_ktx`
--

INSERT INTO `nguyenvong_ktx` (`id`, `id_sv`, `id_ktx`, `ngaydangky`, `trangthai`, `ghichu`) VALUES
(102, 9, 1, '2022-11-20 06:58:36', 1, ''),
(103, 11, 1, '2022-11-20 06:59:11', 1, ''),
(104, 12, 21, '2023-03-09 16:44:05', 1, ''),
(105, 13, 5, '2022-11-20 07:00:16', 0, ''),
(106, 14, 1, '2022-11-20 07:00:33', 1, ''),
(107, 15, 1, '2022-11-20 07:00:56', 1, ''),
(108, 16, 1, '2022-11-20 07:01:12', 1, ''),
(109, 17, 8, '2022-11-20 07:01:41', 0, ''),
(110, 18, 9, '2022-11-20 07:02:03', 1, ''),
(111, 19, 9, '2022-11-20 07:02:22', 1, ''),
(112, 20, 48, '2022-11-20 07:02:50', 1, ''),
(113, 21, 47, '2022-11-20 07:03:06', -1, ''),
(114, 29, 1, '2022-11-20 07:03:28', 1, ''),
(115, 30, 1, '2022-11-20 07:03:46', 1, ''),
(117, 32, 4, '2022-11-20 07:04:19', -1, 'ĐANG SỬA CHỮA'),
(118, 33, 10, '2022-11-20 07:04:38', 1, ''),
(119, 34, 11, '2022-11-20 07:05:09', 0, ''),
(120, 35, 21, '2022-11-20 07:05:34', 1, ''),
(121, 36, 1, '2022-11-20 07:21:56', -1, 'ĐỦ NGƯỜI'),
(122, 37, 27, '2022-11-20 07:06:03', 1, ''),
(123, 38, 31, '2022-11-20 07:06:17', 0, ''),
(124, 39, 29, '2022-11-20 07:06:29', 1, ''),
(125, 40, 33, '2022-11-20 07:06:41', 1, ''),
(126, 41, 28, '2022-11-20 07:08:05', 1, ''),
(127, 44, 23, '2022-11-20 07:08:27', 1, ''),
(128, 45, 42, '2022-11-20 07:08:45', 0, ''),
(129, 43, 31, '2022-11-20 07:08:56', 1, ''),
(130, 42, 31, '2022-11-20 07:09:08', 1, ''),
(131, 46, 5, '2022-11-20 07:10:04', 1, ''),
(132, 47, 10, '2022-11-25 13:31:57', 0, ''),
(133, 48, 23, '2022-11-20 07:10:32', 1, ''),
(134, 49, 10, '2022-11-20 07:10:45', 1, ''),
(135, 50, 4, '2022-11-20 07:10:57', -1, 'ĐANG SỬA CHỮA'),
(136, 51, 27, '2022-11-20 07:11:12', 0, ''),
(137, 52, 9, '2022-11-20 07:11:30', 1, ''),
(138, 53, 20, '2022-11-20 07:11:57', 0, ''),
(139, 54, 20, '2022-11-20 07:12:13', 0, ''),
(140, 55, 35, '2022-11-20 07:12:32', 0, ''),
(141, 56, 23, '2022-11-20 07:12:53', 1, ''),
(142, 57, 24, '2022-11-20 07:13:08', 1, ''),
(143, 58, 25, '2022-11-20 07:13:25', -1, 'ĐANG SỬA CHỮA'),
(144, 59, 21, '2022-11-20 07:13:40', 1, ''),
(145, 60, 25, '2022-11-20 07:13:53', -1, 'ĐANG SỬA CHỮA'),
(146, 61, 25, '2022-11-20 07:14:05', -1, 'ĐANG SỬA CHỮA'),
(147, 31, 1, '2022-11-20 07:21:32', 1, ''),
(148, 68, 29, '2022-11-20 11:24:26', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) NOT NULL,
  `msnv` varchar(10) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `gioitinh` varchar(7) NOT NULL,
  `quequan` varchar(50) NOT NULL,
  `vitri` varchar(20) NOT NULL,
  `luong` float NOT NULL,
  `sodienthoai` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `msnv`, `hoten`, `gioitinh`, `quequan`, `vitri`, `luong`, `sodienthoai`) VALUES
(8, '102', 'Nguyễn Trần Thái Bảo', 'Nam', 'Long Xuyên', 'Bảo Vệ', 700000, '01242882856'),
(9, '106', 'Lê Tư Thành', 'Nữ', 'Thái Nguyên', 'Quản lý', 700000, '01242882857'),
(10, '105', 'Nguyễn Thị Bằng', 'Nữ', 'An Châu', 'Quản lý', 700000, '01242882856'),
(12, '104', 'Lý Phật Mã', 'Nữ', 'Long Xuyên', 'Bảo Vệ', 700000, '01242882856'),
(41, '103', 'Hồ Hán Thương', 'Nữ', 'An Giang', 'Bảo Vệ', 6000000, '0917349907'),
(60, '101', 'Lý Công Uẩn', 'Nữ', 'An Giang', 'Bảo Vệ', 9000000, '012428828567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien_chua_o`
--

CREATE TABLE `sinhvien_chua_o` (
  `id` int(10) NOT NULL,
  `mssv` varchar(10) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` varchar(50) NOT NULL,
  `gioitinh` varchar(7) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `nganh` varchar(20) NOT NULL,
  `lop` varchar(10) NOT NULL,
  `kiemtra` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien_chua_o`
--

INSERT INTO `sinhvien_chua_o` (`id`, `mssv`, `matkhau`, `hoten`, `email`, `ngaysinh`, `quequan`, `gioitinh`, `sodienthoai`, `nganh`, `lop`, `kiemtra`) VALUES
(9, 'B1834567', '202cb962ac59075b964b07152d234b70', 'Bùi bé tư', 'khoab1910240@gmail.com', '2022-10-21', 'Cà Mau', 'Nam', '0917349907', 'Chế biến', 'DI1978A8', '1'),
(11, 'B1910245', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', 'VanA@gmail.com', '2001-10-22', 'Kiên Giang', 'Nam', '01242882857', 'Bảo vệ thực vật', 'DI19V7A5', '1'),
(12, 'B1910246', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn B', 'B@gmail.com', '2001-05-22', 'An Giang', 'Nam', '01242882857', 'Bảo vệ thực vật', 'DI19V7A3', '1'),
(13, 'B1910247', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn C', 'C@gmail.com', '2002-10-22', 'Tiền Giang', 'Nam', '01242882857', 'CNTT', 'DI19V7A5', '0'),
(14, 'B1910248', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn D', 'D@gmail.com', '2003-10-03', 'Vĩnh Long', 'Nam', '01242882857', 'Điện', 'DI19V7A2', '1'),
(15, 'B1910249', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn E', 'E@gmail.com', '2004-11-22', 'Kiên Giang', 'Nam', '01242882857', 'Kỹ thuật phần mềm', 'DI19V7A1', '1'),
(16, 'B2012345', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn F', 'F@gmail.com', '2004-02-22', 'Kiên Giang', 'Nam', '01242882857', 'Xây dựng', 'DI19V7A5', '1'),
(17, 'B2012348', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn G', 'G@gmail.com', '2004-10-04', 'Cần Thơ', 'Nữ', '01242882855', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(18, 'B2012349', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn H', 'H@gmail.com', '2001-10-15', 'Kiên Giang', 'Nữ', '01242824857', 'Bảo vệ thực vật', 'DI19V7A5', '1'),
(19, 'B2012340', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn I', 'I@gmail.com', '2002-10-22', 'Kiên Giang', 'Nữ', '01244782857', 'Bảo vệ thực vật', 'DI19V7A5', '1'),
(20, 'B2012331', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn J', 'J@gmail.com', '2005-10-22', 'Kiên Giang', 'Nữ', '01242882857', 'Bảo vệ thực vật', 'DI19V7A5', '1'),
(21, 'B2012332', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn K', 'K@gmail.com', '2001-10-22', 'Kiên Giang', 'Nữ', '01242882857', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(29, 'B2210240', '202cb962ac59075b964b07152d234b70', 'Trần Văn A', 'TranvanA@gmail.com', '2022-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A3', '1'),
(30, 'B2210241', '202cb962ac59075b964b07152d234b70', 'Trần Văn B', 'VanB@gmail.com', '2001-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A3', '1'),
(31, 'B2210242', '202cb962ac59075b964b07152d234b70', 'Trần Văn C', 'Khai@gmail.com', '2002-12-10', 'Long An', 'Nam', '01242882856', 'Bảo vệ thực vật', 'DI19V7A3', '1'),
(32, 'B2210243', '202cb962ac59075b964b07152d234b70', 'Trần Văn D', 'hihi@gmail.com', '2002-12-10', 'Long An', 'Nam', '01242882856', 'Điện', 'DI19V7A9', '0'),
(33, 'B2210245', '202cb962ac59075b964b07152d234b70', 'Trần Văn E', 'khoab1910240@gmail.com', '2022-10-30', 'Long Giang', 'Nam', '01242882856', 'CNTT', 'DI19V7A5', '1'),
(34, 'B2210244', '202cb962ac59075b964b07152d234b70', 'Trần Văn F', 'khoab1910240@gmail.com', '2022-10-10', 'Quảng Châu', 'Nam', '01242882856', 'CNTT', 'DI19V7A6', '0'),
(35, 'B2210246', '202cb962ac59075b964b07152d234b70', 'Trần Văn G', 'khoab1910240@gmail.com', '2022-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A2', '1'),
(36, 'B2210247', '202cb962ac59075b964b07152d234b70', 'Trần Văn H', 'khoab1910240@gmail.com', '2022-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A5', '0'),
(37, 'B2210300', '202cb962ac59075b964b07152d234b70', 'Mai Thị Văn B', 'khoab1910240@gmail.com', '2001-10-10', 'Long An', 'Nữ', '01242882856', 'CNTT', 'DI19V7A3', '1'),
(38, 'B2210301', '202cb962ac59075b964b07152d234b70', 'Mai Thị C', 'khoab1910240@gmail.com', '2002-12-10', 'Long An', 'Nữ', '01242882856', 'Bảo vệ thực vật', 'DI19V7A3', '0'),
(39, 'B2210302', '202cb962ac59075b964b07152d234b70', 'Mai Thị Văn D', 'khoab1910240@gmail.com', '2002-12-10', 'Long An', 'Nữ', '01242882856', 'Điện', 'DI19V7A9', '1'),
(40, 'B2210303', '202cb962ac59075b964b07152d234b70', 'Mai Thị Văn E', 'khoab1910240@gmail.com', '2022-10-30', 'Long Giang', 'Nữ', '01242882856', 'CNTT', 'DI19V7A5', '1'),
(41, 'B2210304', '202cb962ac59075b964b07152d234b70', 'Mai Thị Văn F', 'khoab1910240@gmail.com', '2022-10-10', 'Quảng Châu', 'Nữ', '01242882856', 'CNTT', 'DI19V7A6', '1'),
(42, 'B2210305', '202cb962ac59075b964b07152d234b70', 'Mai Thị Văn G', 'khoab1910240@gmail.com', '2022-10-10', 'Long An', 'Nữ', '01242882856', 'CNTT', 'DI19V7A2', '1'),
(43, 'B2210306', '202cb962ac59075b964b07152d234b70', 'Mai Thị Văn H', 'khoab1910240@gmail.com', '2022-10-10', 'Long An', 'Nữ', '01242882856', 'CNTT', 'DI19V7A5', '1'),
(44, 'B1834599', '202cb962ac59075b964b07152d234b70', 'Nguyễn Cao Miên', 'thanh@gmail.com', '2002-10-21', 'Cà Mau', 'Nam', '0917349907', 'Chế biến', 'DI1978A8', '1'),
(45, 'B1810212', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn Trỗi', 'Thetu@gmail.com', '2001-10-22', 'Kiên Giang', 'Nam', '01242882857', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(46, 'B1810213', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thị Bình', 'Ntbinh@gmail.com', '2001-05-22', 'An Giang', 'Nam', '01242882857', 'Bảo vệ thực vật', 'DI19V7A3', '1'),
(47, 'B1910214', '202cb962ac59075b964b07152d234b70', 'Trần Cảnh', 'tranCanh@gmail.com', '2002-10-22', 'Tiền Giang', 'Nam', '01242882857', 'CNTT', 'DI19V7A5', '0'),
(48, 'B1910215', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn Tới', 'vanToi@gmail.com', '2003-10-03', 'Vĩnh Long', 'Nam', '01242882857', 'Điện', 'DI19V7A2', '1'),
(49, 'B1910216', '202cb962ac59075b964b07152d234b70', 'Nguyễn Công Cơ', 'ncongco@gmail.com', '2004-11-22', 'Kiên Giang', 'Nam', '01242882857', 'Kỹ thuật phần mềm', 'DI19V7A1', '1'),
(50, 'B2012317', '202cb962ac59075b964b07152d234b70', 'Thái Châu Khanh', 'chauK@gmail.com', '2004-02-22', 'Kiên Giang', 'Nam', '01242882857', 'Xây dựng', 'DI19V7A5', '0'),
(51, 'B2012318', '202cb962ac59075b964b07152d234b70', 'Bùi Đắc Tuyên', 'BDtuyen@gmail.com', '2004-10-04', 'Cần Thơ', 'Nữ', '01242882855', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(52, 'B2012319', '202cb962ac59075b964b07152d234b70', 'Thái Công Minh', 'tcongminh@gmail.com', '2001-10-15', 'Kiên Giang', 'Nữ', '01242824857', 'Bảo vệ thực vật', 'DI19V7A5', '1'),
(53, 'B2012320', '202cb962ac59075b964b07152d234b70', 'Thái Công Tâm', 'tcongtam@gmail.com', '2002-10-22', 'Kiên Giang', 'Nữ', '01244782857', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(54, 'B2012321', '202cb962ac59075b964b07152d234b70', 'Thái Công Pháp', 'tcongphap@gmail.com', '2005-10-22', 'Kiên Giang', 'Nữ', '01242882857', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(55, 'B2012322', '202cb962ac59075b964b07152d234b70', 'Nghĩa Tuân', 'nghiatuan@gmail.com', '2001-10-22', 'Kiên Giang', 'Nữ', '01242882857', 'Bảo vệ thực vật', 'DI19V7A5', '0'),
(56, 'B2210223', '202cb962ac59075b964b07152d234b70', 'Đinh Bộ Lĩnh', 'dblinh@gmail.com', '2022-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A3', '1'),
(57, 'B2210224', '202cb962ac59075b964b07152d234b70', 'Đinh Tiên Hoàng', 'dtienhoang@gmail.com', '2001-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A3', '1'),
(58, 'B2210225', '202cb962ac59075b964b07152d234b70', 'Trần Bá Tiên', 'tbtien@gmail.com', '2002-12-10', 'Long An', 'Nam', '01242882856', 'Bảo vệ thực vật', 'DI19V7A3', '0'),
(59, 'B2210226', '202cb962ac59075b964b07152d234b70', 'Lê Công Cơ', 'lcco@gmail.com', '2002-12-10', 'Long An', 'Nam', '01242882856', 'Điện', 'DI19V7A9', '1'),
(60, 'B2210227', '202cb962ac59075b964b07152d234b70', 'Mai Văn E', 'maivane@gmail.com', '2022-10-30', 'Long Giang', 'Nam', '01242882856', 'CNTT', 'DI19V7A5', '0'),
(61, 'B2210228', '202cb962ac59075b964b07152d234b70', 'Mai Văn F', 'maivanf@gmail.com', '2022-10-10', 'Quảng Châu', 'Nam', '01242882856', 'CNTT', 'DI19V7A6', '0'),
(62, 'B2210229', '202cb962ac59075b964b07152d234b70', 'Mai Văn G', 'maivang@gmail.com', '2022-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A2', '0'),
(63, 'B2210230', '202cb962ac59075b964b07152d234b70', 'Mai Văn H', 'maivanh@gmail.com', '2022-10-10', 'Long An', 'Nam', '01242882856', 'CNTT', 'DI19V7A5', '0'),
(64, 'B2210331', '202cb962ac59075b964b07152d234b70', 'Thiết Thị Văn B', 'thiet@gmail.com', '2001-10-10', 'Long An', 'Nữ', '01242882856', 'CNTT', 'DI19V7A3', '0'),
(65, 'B2210332', '202cb962ac59075b964b07152d234b70', 'Thiết Thị C', 'thietcc@gmail.com', '2002-12-10', 'Long An', 'Nữ', '01242882856', 'Bảo vệ thực vật', 'DI19V7A3', '0'),
(66, 'B2210333', '202cb962ac59075b964b07152d234b70', 'Thiết Thị Văn D', 'thietdd@gmail.com', '2002-12-10', 'Long An', 'Nữ', '01242882856', 'Điện', 'DI19V7A9', '0'),
(67, 'B2210334', '202cb962ac59075b964b07152d234b70', 'Thiết Thị Văn E', 'thietbb@gmail.com', '2022-10-30', 'Long Giang', 'Nữ', '01242882856', 'CNTT', 'DI19V7A5', '0'),
(68, 'B2106485', '202cb962ac59075b964b07152d234b70', 'Châu An Khang', 'cakhang@gmail.com', '2001-10-10', 'An Giang', 'Nữ', '01242882856', 'Điện', 'DI19V7A3', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien_da_o`
--

CREATE TABLE `sinhvien_da_o` (
  `id` int(10) NOT NULL,
  `idsv` int(10) NOT NULL,
  `idktx` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien_da_o`
--

INSERT INTO `sinhvien_da_o` (`id`, `idsv`, `idktx`) VALUES
(151, 9, 1),
(152, 11, 1),
(153, 14, 1),
(154, 15, 1),
(155, 16, 1),
(156, 29, 1),
(157, 30, 1),
(159, 46, 5),
(160, 33, 10),
(161, 49, 10),
(162, 35, 21),
(163, 59, 21),
(164, 44, 23),
(165, 48, 23),
(166, 56, 23),
(167, 57, 24),
(168, 37, 27),
(169, 41, 28),
(170, 39, 29),
(171, 43, 31),
(172, 42, 31),
(173, 40, 33),
(174, 19, 9),
(175, 52, 9),
(176, 18, 9),
(177, 31, 1),
(178, 68, 29),
(179, 20, 48),
(180, 12, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suachua_csvc`
--

CREATE TABLE `suachua_csvc` (
  `id` int(10) NOT NULL,
  `tensuachua` varchar(50) NOT NULL,
  `soluong` int(2) NOT NULL,
  `ghichu` varchar(50) NOT NULL,
  `idsv` int(10) NOT NULL,
  `idktx` int(10) NOT NULL,
  `ngaygui` date NOT NULL,
  `xacnhan` int(2) NOT NULL,
  `lydo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suachua_csvc`
--

INSERT INTO `suachua_csvc` (`id`, `tensuachua`, `soluong`, `ghichu`, `idsv`, `idktx`, `ngaygui`, `xacnhan`, `lydo`) VALUES
(64, 'Vòi nước', 1, 'Rỉ rỉ quài ạ', 151, 1, '2022-11-20', 0, ''),
(65, 'Đèn', 1, 'Tối hù', 152, 1, '2022-11-20', 0, ''),
(66, 'assasa', 2, '', 152, 1, '2022-11-20', 0, ''),
(67, 'OK', 1, '', 168, 27, '2022-11-20', 1, ''),
(68, 'Cửa nhà tắm', 2, 'Không đóng được', 168, 27, '2022-11-20', 1, ''),
(69, 'Mái lợp nước', 1, 'Mưa lớn sẽ bị ảnh hưởng', 169, 28, '2022-11-20', 0, ''),
(70, 'Điện hư', 3, 'Nhà tắm hư đèn điện', 151, 1, '2022-11-25', 0, ''),
(71, 'AAAA', 2, '', 151, 1, '2022-11-25', 2, 'Không hợp lệ'),
(72, 'Ổ điện giường', 2, 'cháy ổ', 167, 24, '2022-11-25', 0, ''),
(73, 'Đèn phòng', 2, 'Mờ đục', 167, 24, '2022-11-25', 0, ''),
(74, 'Vòi sen', 1, 'Hư', 167, 24, '2022-11-25', 0, ''),
(75, 'Bóng đèn', 1, 'Hư', 180, 21, '2023-03-09', 2, 'ĐANG BẬN');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnv` (`idnv`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ktx` (`id_ktx`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkytucxa` (`idkytucxa`),
  ADD KEY `idsinhvien_da_o` (`idsinhvien_da_o`),
  ADD KEY `idnv` (`idnv`);

--
-- Chỉ mục cho bảng `kytucxa`
--
ALTER TABLE `kytucxa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyenvong_ktx`
--
ALTER TABLE `nguyenvong_ktx`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sv` (`id_sv`),
  ADD KEY `id_ktx` (`id_ktx`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinhvien_chua_o`
--
ALTER TABLE `sinhvien_chua_o`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinhvien_da_o`
--
ALTER TABLE `sinhvien_da_o`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsv` (`idsv`),
  ADD KEY `idktx` (`idktx`);

--
-- Chỉ mục cho bảng `suachua_csvc`
--
ALTER TABLE `suachua_csvc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsv` (`idsv`),
  ADD KEY `idktx` (`idktx`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `kytucxa`
--
ALTER TABLE `kytucxa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `nguyenvong_ktx`
--
ALTER TABLE `nguyenvong_ktx`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `sinhvien_chua_o`
--
ALTER TABLE `sinhvien_chua_o`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `sinhvien_da_o`
--
ALTER TABLE `sinhvien_da_o`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT cho bảng `suachua_csvc`
--
ALTER TABLE `suachua_csvc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idnv`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`idnv`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_ktx`) REFERENCES `kytucxa` (`id`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`id_ktx`) REFERENCES `kytucxa` (`id`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_1` FOREIGN KEY (`idkytucxa`) REFERENCES `kytucxa` (`id`),
  ADD CONSTRAINT `hopdong_ibfk_2` FOREIGN KEY (`idsinhvien_da_o`) REFERENCES `sinhvien_da_o` (`id`),
  ADD CONSTRAINT `hopdong_ibfk_3` FOREIGN KEY (`idkytucxa`) REFERENCES `kytucxa` (`id`),
  ADD CONSTRAINT `hopdong_ibfk_4` FOREIGN KEY (`idsinhvien_da_o`) REFERENCES `sinhvien_da_o` (`id`),
  ADD CONSTRAINT `hopdong_ibfk_5` FOREIGN KEY (`idnv`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `nguyenvong_ktx`
--
ALTER TABLE `nguyenvong_ktx`
  ADD CONSTRAINT `nguyenvong_ktx_ibfk_1` FOREIGN KEY (`id_sv`) REFERENCES `sinhvien_chua_o` (`id`),
  ADD CONSTRAINT `nguyenvong_ktx_ibfk_2` FOREIGN KEY (`id_sv`) REFERENCES `sinhvien_chua_o` (`id`),
  ADD CONSTRAINT `nguyenvong_ktx_ibfk_3` FOREIGN KEY (`id_ktx`) REFERENCES `kytucxa` (`id`);

--
-- Các ràng buộc cho bảng `sinhvien_da_o`
--
ALTER TABLE `sinhvien_da_o`
  ADD CONSTRAINT `sinhvien_da_o_ibfk_1` FOREIGN KEY (`idsv`) REFERENCES `sinhvien_chua_o` (`id`),
  ADD CONSTRAINT `sinhvien_da_o_ibfk_2` FOREIGN KEY (`idktx`) REFERENCES `kytucxa` (`id`),
  ADD CONSTRAINT `sinhvien_da_o_ibfk_3` FOREIGN KEY (`idsv`) REFERENCES `sinhvien_chua_o` (`id`),
  ADD CONSTRAINT `sinhvien_da_o_ibfk_4` FOREIGN KEY (`idktx`) REFERENCES `kytucxa` (`id`);

--
-- Các ràng buộc cho bảng `suachua_csvc`
--
ALTER TABLE `suachua_csvc`
  ADD CONSTRAINT `suachua_csvc_ibfk_1` FOREIGN KEY (`idsv`) REFERENCES `sinhvien_da_o` (`id`),
  ADD CONSTRAINT `suachua_csvc_ibfk_2` FOREIGN KEY (`idktx`) REFERENCES `kytucxa` (`id`),
  ADD CONSTRAINT `suachua_csvc_ibfk_3` FOREIGN KEY (`idsv`) REFERENCES `sinhvien_da_o` (`id`),
  ADD CONSTRAINT `suachua_csvc_ibfk_4` FOREIGN KEY (`idktx`) REFERENCES `kytucxa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
