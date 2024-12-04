-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2023 lúc 12:53 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ffstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaLoaiSP` int(11) NOT NULL,
  `TenLoaiSP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaLoaiSP`, `TenLoaiSP`) VALUES
(2, 'Hoa Tốt Nghiệp'),
(3, 'Hoa Sinh Nhật'),
(4, 'Hoa Cưới'),
(5, 'Hoa Tươi'),
(6, 'Hoa Khai Trương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDDH` int(20) NOT NULL,
  `MaKH` int(20) DEFAULT NULL,
  `TenKH` varchar(20) DEFAULT NULL,
  `MaSP` int(20) DEFAULT NULL,
  `TongThanhTien` float DEFAULT NULL,
  `TrangThaiDonDatHang` varchar(20) DEFAULT 'Đang Xử Lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDDH`, `MaKH`, `TenKH`, `MaSP`, `TongThanhTien`, `TrangThaiDonDatHang`) VALUES
(116, 3, 'Nguyễn Văn OK', 29, 1060000, 'Đang Xử Lý'),
(117, 3, 'Nguyễn Văn OK', 35, 2500000, 'Đang Xử Lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(20) NOT NULL,
  `HoTenKH` varchar(20) NOT NULL,
  `GioiTinh` varchar(5) NOT NULL,
  `DiaChi` varchar(20) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `MatKhau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `HoTenKH`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `NgaySinh`, `MatKhau`) VALUES
(2, 'Trần Dần', 'Nữ', 'America', '0707777777', 'trandan@gmail.com', '2022-12-01', 'user123'),
(3, 'Nguyễn Văn OK', 'nam', 'Cần Thơ haha', '0939999999', 'ok@gmail.com', '2023-02-03', 'user123'),
(10, 'thuan', 'nam', 'cần thơ', '093123', 'admin@gmail.com', '2023-05-20', '12345'),
(17, 'hvu', 'Nam', 'Cần Thơ', '0707777777', 'admin@gmail.com', '2023-05-10', '11111'),
(22, 'Hoàng Vũ', 'Nam', 'Cần Thơ', '0707777777', 'admin@gmail.com', '2023-05-09', 'hv123'),
(45, 'Admin', 'Nam', 'Hà Nội', '078787874', 'admin@gmail.com', '2023-05-10', 'admin123'),
(46, 'thuanne', 'nam', 'cần thơ', '093123', 'thuan123@gmail.com', '2023-05-26', 'Thuan123'),
(47, 'thuanne', 'nam', 'cần thơ', '093123', 'thuan123@gmail.com', '2023-05-26', 'Thuan123'),
(49, 'Nguyễn Hữu Thuận', 'Nam', 'cần thơ', '09312312', 'NHT@gmail.com', '2002-03-06', 'Thuan123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(20) NOT NULL,
  `TenSP` varchar(20) DEFAULT NULL,
  `Gia` int(20) DEFAULT NULL,
  `HinhAnh` varchar(150) DEFAULT NULL,
  `MoTaSP` varchar(100) DEFAULT NULL,
  `TrangThaiSP` varchar(20) DEFAULT NULL,
  `MaLoaiSP` int(11) DEFAULT NULL,
  `SoLuong` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `HinhAnh`, `MoTaSP`, `TrangThaiSP`, `MaLoaiSP`, `SoLuong`) VALUES
(25, 'Mãi Bên Nhau', 550000, 'mai-ben-nhau.jpg', 'Hoa hồng luôn là biểu tượng cho sự trường tồn, vĩnh cửu, thể hiện một tình yêu mãnh liệt, bất diện, ', 'Còn Hàng', 4, 10),
(26, 'Ẩn Dấu', 460000, 'An Dau.jpg', 'Bình hoa hồng đỏ kết hợp cùng các loại hoa phụ đầy dễ thương và tinh tế. Hãy cùng Flower Corner nói ', 'Còn Hàng', 3, 20),
(27, 'Tình Bạn', 220000, 'mai-ben-nhau.jpg', 'hoa tốt nghiệp hihi', 'Còn Hàng', 2, 10),
(28, 'Luôn Bên Em', 460000, 'luon-ben-em.jpg', 'Giữa cuộc sống với bao nhiêu khó khăn, căng thẳng và tấp nập, một chút nhẹ nhàng, hồn nhiên của đóa ', 'Còn Hàng', 3, 10),
(29, 'Yêu Kiều', 530000, 'yeu-kieu.jpg', 'Hạnh phúc đôi khi không được tính bằng năm, bằng tháng mà hạnh phúc có thể đong đầy dù trong một kho', 'Còn Hàng', 3, 10),
(30, 'First Date', 530000, 'Bo Hoa Tinh Yeu.jpg', 'Ngày hẹn hò đầu tiên rất quan trọng', 'Còn Hàng', 3, 10),
(31, 'Sunny', 330000, 'sunny.jpg', 'Ngày em ra đời mọi thứ tươi sáng như ánh mặt trời', 'Còn Hàng', 3, 10),
(32, 'Mẫu Đơn Hồng', 1260000, 'mau-don-hong.jpg', 'Đối với những cô nàng yêu hoa và luôn cập nhật xu hướng thì một bó hoa mẫu đơn là món quà tuyệt vời ', 'Còn Hàng', 2, 10),
(33, 'Yêu Thương Tím', 1600000, 'yeu-thuong-tim.jpg', 'Lẵng hoa là sự phối hợp giữa các màu sắc khác nhau, đem đến một không khí đầy tươi vui và ngập tràn ', 'Còn Hàng', 2, 10),
(34, 'Ánh Ngọc', 1000000, 'anh-ngoc.png', 'Hoa tulip vàng mang trong mình màu sắc vui tươi, sáng bừng và đầy hy vọng của nắng.', 'Còn Hàng', 2, 10),
(35, 'Trọn Vẹn', 2500000, 'tron-ven.jpg', 'Bó hoa được thiết kế từ những cánh hồng mang màu đỏ rực rỡ, lãng mạng như một giấc mơ.', 'Còn Hàng', 2, 10),
(36, 'Mắc Cưới', 600000, 'mat-cuoi.jpg', 'Tự nhiên MẮC CƯỚI -_-', 'Còn Hàng', 4, 1),
(37, 'Happy Ending', 1350000, 'hoa-cuoi-tulip.jpg', 'Tình yêu thuần khiết, niềm đam mê, sự bình yên, chiến thắng và sự tha thứ.', 'Còn Hàng', 4, 1),
(38, 'Nắng Bên Thềm', 1100000, 'sen-cuoi-hong.png', 'Tình yêu của ta như bông hoa sen, từ số 0 đến lúc đẹp nhất', 'Còn Hàng', 4, 1),
(39, 'Tươi Sáng', 700000, 'tuoi-sang.jpg', 'Lẵng hoa khai trương Tươi Sáng mang tông màu sáng đầy vui tươi, ngập tràn ánh nắng và niềm vui hân h', 'Còn Hàng', 6, 10),
(40, 'Chúc Thành Công', 1200000, 'chuc-thanh-cong.jpg', 'Lẵng hoa khai trương chúc thành công như tên gọi của nó giúp bạn gửi lời chúc mừng khai trương thành', 'Còn Hàng', 6, 10),
(41, 'Khởi Sắc', 2300000, 'khoi-sac.jpg', 'Vẻ đẹp thanh cao mang trong mình sự dịu dàng và yên bình đến lạ của tulip sẽ là món quà tuyệt vời', 'Còn Hàng', 6, 10),
(42, 'Phú Tài', 700000, 'phu-tai.jpg', 'Nếu tặng cho người bạn yêu thương thì phú quí và tài lộc sẽ bên người đó.', 'Còn Hàng', 6, 10),
(43, 'Lung Linh', 1400000, 'Lung Linh.jpg', 'Muôn vàn loài hoa với nhiều sắc thái kết hợp với nhau tựa vô vàn cảm xúc thi nhau lên tiếng, cất lên', 'Còn Hàng', 6, 10),
(44, 'Hạ Về', 500000, 'ha-ve.jpg', 'Một bó hoa cúc tana sẽ là sự lựa chọn hoàn hảo để dành tặng cho người yêu.', 'Còn Hàng', 5, 10),
(48, 'Hoa Hồng Trắng', 700000, 'perfect.png', 'Một bó hoa tươi Perfect cho ngày hẹn hò', 'Còn Hàng', 5, 10),
(49, 'Hoa Hướng Dương', 500000, 'Sắc Vàng Ấm Áp.jpg', 'Hướng dương luôn mang một luồng năng lượng tươi trẻ, tích cực và tràn đầy ấm áp.', 'Còn Hàng', 5, 10),
(50, 'Cẩm Tú Cầu', 1200000, 'camtucau.jpg', 'Giữa thế giới rộng lớn, phái đẹp luôn mong ước sẽ may mắn tìm được người mình yêu chung thủy đến suố', 'Còn Hàng', 5, 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDDH`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoaiSP` (`MaLoaiSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `MaDDH` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `dondathang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `dondathang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoaiSP`) REFERENCES `danhmuc` (`MaLoaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
