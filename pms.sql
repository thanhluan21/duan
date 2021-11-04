-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 02:18 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'admin',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`) VALUES
(2, 'Thành', 'Luân', 'admin@admin.com', '0898399941', '21232f297a57a5a743894a0e4a801fc3', 'admin', '_114253856_messi.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvan`
--

CREATE TABLE `hocvan` (
  `id1` int(11) NOT NULL,
  `tenhocvan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocvan`
--

INSERT INTO `hocvan` (`id1`, `tenhocvan`) VALUES
(1, 'Đại Học'),
(2, 'Cao Đẳng'),
(3, 'Trung Cấp'),
(4, 'THPT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'manager',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `mahocvan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `managers`
--

INSERT INTO `managers` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `mahocvan`) VALUES
(42, 'b', '7', '34@gmail.com', '4323123213', 'c4ca4238a0b923820dcc509a6f75849b', 'manager', 'avatar.png', 2),
(43, 'Nam', 'Luân', 'luanbeo21@gmail.com', '0898399941', 'bb02b7d493154e498afd9ad425d67e23', 'manager', 'avatar.png', 1),
(44, 'k', 'a', 'ahihi@gmail.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'manager', 'avatar.png', 4),
(55, '1', '1', 'luanbs@gmail.com', '2321', 'c4ca4238a0b923820dcc509a6f75849b', 'manager', 'avatar.png', 2),
(57, 'Thái', 'Luân', 'luanbeo21@gmial.com', '3434434', '63dc83cae253f1a8a9458891cd133a21', 'manager', 'avatar.png', 3),
(90, 'Nguyễn', 'Quân', 'luan', '123', 'c4ca4238a0b923820dcc509a6f75849b', 'manager', 'avatar.png', 1),
(91, 'Thành', '1', 'a', '156', 'c4ca4238a0b923820dcc509a6f75849b', 'manager', 'avatar.png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'pharmacist',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `mahocvan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `mahocvan`) VALUES
(12, 'a', 'a', 'agigi@gmail.com', '0898399941', 'c4ca4238a0b923820dcc509a6f75849b', 'pharmacist', 'avatar.png', 3),
(15, 'a', 'a', 'luanbeo21@gmail.com', '1', 'b5ffb4aa3011ea1b551b926e88b97bcf', 'pharmacist', 'avatar.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salesmans`
--

CREATE TABLE `salesmans` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'salesman',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `mahocvan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `salesmans`
--

INSERT INTO `salesmans` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `mahocvan`) VALUES
(21, 'Thái', 'Luân', '1@gmail.com', '0898399941', 'c4ca4238a0b923820dcc509a6f75849b', 'salesman', 'avatar.png', 2),
(22, 'a', 'v', 'luan.tt.60cntt@ntu.edu.vn', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'salesman', 'avatar.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocvan`
--
ALTER TABLE `hocvan`
  ADD PRIMARY KEY (`id1`);

--
-- Chỉ mục cho bảng `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `khoaphuhocvan` (`mahocvan`);

--
-- Chỉ mục cho bảng `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `khoaphuhocvan4` (`mahocvan`);

--
-- Chỉ mục cho bảng `salesmans`
--
ALTER TABLE `salesmans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `khoaphuhocvan2` (`mahocvan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hocvan`
--
ALTER TABLE `hocvan`
  MODIFY `id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `salesmans`
--
ALTER TABLE `salesmans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `khoaphuhocvan` FOREIGN KEY (`mahocvan`) REFERENCES `hocvan` (`id1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD CONSTRAINT `khoaphuhocvan4` FOREIGN KEY (`mahocvan`) REFERENCES `hocvan` (`id1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `salesmans`
--
ALTER TABLE `salesmans`
  ADD CONSTRAINT `khoaphuhocvan2` FOREIGN KEY (`mahocvan`) REFERENCES `hocvan` (`id1`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
