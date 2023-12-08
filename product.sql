-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 01:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(300) NOT NULL,
  `iduser` int(6) NOT NULL,
  `idprd` int(6) NOT NULL,
  `date` varchar(35) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`id`, `noidung`, `iduser`, `idprd`, `date`, `user`) VALUES
(30, 'sản phẩm hay', 4, 19, '08/12/2023 07:11:23pm', 'user1'),
(31, 'Giá tốt. Đáng mua\n', 4, 21, '08/12/2023 07:12:22pm', 'user1'),
(32, 'sản phẩm hay', 4, 17, '08/12/2023 07:12:44pm', 'user1'),
(33, 'Camera nét', 4, 17, '08/12/2023 07:13:12pm', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `iduser` int(6) NOT NULL,
  `idsp` int(6) NOT NULL,
  `soluong` int(4) NOT NULL,
  `id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`iduser`, `idsp`, `soluong`, `id`) VALUES
(8, 17, 2, 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id` int(6) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL,
  `hienthi` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id`, `tendanhmuc`, `hienthi`) VALUES
(3, 'Apple', 1),
(4, 'SamSung', 1),
(10, 'Xiaomi', 1),
(12, 'Khác', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int(15) NOT NULL,
  `madonhang` varchar(17) NOT NULL,
  `noidung` varchar(3000) NOT NULL,
  `thanhtien` int(15) NOT NULL,
  `iduser` int(6) DEFAULT NULL,
  `hovaten` varchar(30) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `madonhang`, `noidung`, `thanhtien`, `iduser`, `hovaten`, `sdt`, `email`, `address`, `pttt`, `date`) VALUES
(13, 'SP', 'Xiaomi Redmi Note 12 Pro 5G * 1', 8490000, 4, 'Lê Khả Duy', '0917880045', 'duy@gmail.com', 'Ktx khu A', 1, '08/12/2023 07:15pm'),
(14, 'SP', 'Samsung Galaxy S23 Ultra 256GB * 1, Samsung Galaxy A54 5G 8GB 128GB * 1', 33280000, 4, 'Lê Khả Duy', '0917880045', 'duy@gmail.com', 'Quận bình thạnh', 1, '08/12/2023 07:15pm'),
(15, 'SP', 'OPPO Reno10 5G 8GB 256GB * 1, Xiaomi Redmi Note 12 Pro 5G * 1', 18980000, 0, 'Duy', '0917880045', 'email@gmail.com', 'Trần phú', 1, '08/12/2023 07:20pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhegioithieu`
--

CREATE TABLE `tbl_lienhegioithieu` (
  `id` tinyint(1) NOT NULL DEFAULT 1,
  `gioithieu` text DEFAULT 'Đây là phần giới thiệu...',
  `lienhe` text DEFAULT 'Đây là phần liên hệ...',
  `tintuc` text NOT NULL DEFAULT 'Tin tức'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lienhegioithieu`
--

INSERT INTO `tbl_lienhegioithieu` (`id`, `gioithieu`, `lienhe`, `tintuc`) VALUES
(1, 'Đây là phần giới thiệu về chúng tôi... <br>\r\nGiới thiệu 1', 'Đây là phần liên hệ của chúng tôi...<br>\r\n- Sđt 1: 1900000', '     <h1>Tin tức mới nhất: </h1>\r\n  Các khuyến mãi : Chương trình giảm giá mừng giáng sinh. <br>\r\n  Sản phẩm mới: Iphone 15 đã ra mắt.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` int(6) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `gia` double(10,0) NOT NULL DEFAULT 0,
  `iddanhmuc` int(6) NOT NULL,
  `sptieubieu` tinyint(1) NOT NULL DEFAULT 0,
  `mota` varchar(300) DEFAULT NULL,
  `chitiet` text DEFAULT NULL,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `watch` int(10) NOT NULL DEFAULT 0,
  `buy` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `tensp`, `image`, `gia`, `iddanhmuc`, `sptieubieu`, `mota`, `chitiet`, `hienthi`, `watch`, `buy`) VALUES
(9, 'iPhone 14 Pro Max 256GB', '../upload/iphone14.jpg', 27190000, 3, 0, 'iPhone 14 Pro Max đem đến những trải nghiệm không thể tìm thấy trên mọi thế hệ iPhone trước đó với màu Tím Deep Purple sang trọng, camera 48MP lần đầu xuất hiện, chip A16 Bionic và màn hình “viên thuốc” Dynamic Island linh hoạt, nịnh mắt.', 'iPhone 14 Pro Max thiết kế màn hình đục lỗ Dynamic Island độc đáo. Camera 48MP nâng cấp độ phân giải. Chip A16 Bionic bùng nổ sức mạnh. Thời lượng pin cũng đã được cải thiện trên iPhone 14 Pro Max, cao hơn 1 giờ so với iPhone 13 Pro Max và có thể kéo dài lên đến 29 giờ khi xem video.', 1, 3, 1),
(17, 'iPhone 15 Pro Max | Chính hãng VN/A', '../upload/iphone15_promax.jpg', 33390000, 3, 1, 'iPhone 15 Pro Max đem lại một diện mạo hoàn toàn mới và sở hữu nhiều tính năng ưu việt cùng công nghệ tiên tiến. Hãy khám phá các đánh giá chi tiết về sản phẩm về khía cạnh thiết kế, màn hình, hiệu năng, thời lượng pin và bộ camera độc đáo qua các thông tin dưới đây!', 'iPhone 15 Pro Max thiết kế mới với chất liệu titan chuẩn hàng không vũ trụ bền bỉ, trọng lượng nhẹ, đồng thời trang bị nút Action và cổng sạc USB-C tiêu chuẩn giúp nâng cao tốc độ sạc. Khả năng chụp ảnh đỉnh cao của iPhone 15 bản Pro Max đến từ camera chính 48MP, camera UltraWide 12MP và camera telephoto có khả năng zoom quang học đến 5x. Bên cạnh đó, iPhone 15 ProMax sử dụng chip A17 Pro mới mạnh mẽ. Xem thêm chi tiết những điểm nổi bật của sản phẩm qua thông tin sau!', 1, 13, 61),
(18, 'Samsung Galaxy S23 Ultra 256GB', '../upload/Samsung Galaxy S23 Ultra 256GB.png', 23990000, 4, 1, 'Sau sự đổ bộ thành công của Samsung Galaxy S22 những chiếc điện thoại dòng Flagship tiếp theo - Điện thoại Samsung Galaxy S23 Ultra là đối tượng được Samfans hết mực săn đón. Kiểu dáng thanh lịch sang chảnh kết hợp với những bước đột phá trong công nghệ đã kiến tạo nên siêu phẩm Flagship nhà Samsung', 'Samsung S23 Ultra là dòng điện thoại cao cấp của Samsung, sở hữu camera độ phân giải 200MP ấn tượng, chip Snapdragon 8 Gen 2 mạnh mẽ, bộ nhớ RAM 8GB mang lại hiệu suất xử lý vượt trội cùng khung viền vuông vức sang trọng. Sản phẩm được ra mắt từ đầu năm 2023.', 1, 4, 8),
(19, 'Xiaomi 13T Pro 5G (12GB - 512GB) ', '../upload/Xiaomi13TPro5G.jpg', 15990000, 10, 1, 'Xiaomi 13T Pro 5G là mẫu điện thoại sang trọng với cấu hình mạnh mẽ và khả năng chụp ảnh vô cùng ấn tượng. Chắc chắn khi sở hữu bạn sẽ có những trải nghiệm khó quên đồng thời có thể thoải mái khám phá mọi điều trong cuộc sống. Còn chần chừ gì nữa không đến ngay CellphoneS để đặt ngay sản phẩm và sở ', 'Xiaomi 13T Pro là flagship mới nhất nhà Xiaomi, mạnh mẽ ấn tượng với chip MediaTek Dimensity 9200+, cùng với đó là RAM 12GB và bộ nhớ trong lên tới 512GB. Đặc biệt, khả năng chụp ảnh đỉnh cao nhờ cụm camera siêu chất, viên pin lớn 5000mAh cùng sạc nhanh 120W. Tất cả sẽ mang tới một siêu phẩm đình đám giúp bạn có được trải nghiệm độc đáo và khẳng định được cá tính của mình.', 1, 12, 6),
(20, 'Samsung Galaxy A54 5G 8GB 128GB', '../upload/samsung-galaxy-a54.jpg', 9290000, 4, 1, 'Nối tiếp thành công từ sản phẩm Galaxy A14 trước đó, Samsung đã phát triển thế hệ tiếp theo của dòng A series mang tên điện thoại Samsung Galaxy A54 5G - nổi bật với màn hình cong tràn viền và nhiều nâng cấp cấu hình đáng chú ý.', 'Samsung Galaxy A54 có những điểm đột phá mới như: màn hình Super AMOLED 6.4 inch tràn viền vô cực Infinity-O, độ sáng đến 1000 nits, tần số quét lên đến 120Hz. Samsung A54 cũng sở hữu cụm 3 camera phân giải cao 50.0 MP + 12.0 MP + 5.0 MP với tính năng ổn định kỹ thuật số và Auto-framing kết hợp chống rung OIS.', 1, 6, 2),
(21, 'Xiaomi Redmi Note 12 Pro 5G', '../upload/Xiaomi-Redmi-Note-12-Pro-5G.jpg', 8490000, 10, 1, 'Redmi Note 12 Pro là phiên bản nâng cấp của Note 11 Pro do đó thiết bị sở hữu những điểm giống và khác so với phiên bản tiền nhiệm. Theo đó, bên cạnh một thiết kế có nhiều điểm tương đồng như màn hình 6.67 inch cùng thiết kế nốt rồi thì mẫu điện thoại Xiaomi thế hệ mới này còn sở hữu một số điểm cải', 'Xiaomi Redmi Note 12 Pro sở hữu cấu hình vượt trội gồm chip MediaTek Dimensity 1080, hệ thống ba camera với cảm biến chính 50MP và mạng 5G. Ngoài ra, màn hình Note 12 Pro 5G có kích thước khá lớn khoảng 6.67 inch, tấm nền AMOLED, tần số quét 120Hz khiến chiếc điện thoại nổi bật trong tầm giá dưới 8 triệu.', 1, 12, 9),
(22, 'OPPO Reno10 5G 8GB 256GB', '../upload/oppo-reno-10-5g.jpeg', 10490000, 12, 1, 'Oppo Reno10 5G nhận về nhiều lời khen bởi thiết kế ấn tượng cùng nhiều cải tiến mới về tính năng. Vậy sản phẩm có những điểm nào nổi bật so với Oppo Reno 8T? Xem ngay bảng chi tiết sau đây nhé!', 'Điện thoại OPPO Reno 10 sở hữu hiệu năng vô cùng mạnh mẽ khi được trang bị chipset MediaTek Dimensity 7050. Chất lượng hình ảnh của máy có độ sắc nét, mượt mà nhờ sở hữu tấm nền 3D AMOLED hiện đại với độ phân giải FHD+ 2412 × 1080 pixel cùng tần số quét 120Hz. Bên cạnh đó, Reno 10 còn sở hữu một vài ưu điểm khác như dung lượng Pin 5000mAh với sạc nhanh SUPERVOOC 67W cùng cụm camera 64MP sắc nét giúp nâng cao trải nghiệm của người dùng.', 1, 3, 16),
(23, 'iPhone 13 128GB | Chính hãng VN/A', '../upload/iphone-13-pink-2.jpg', 15890000, 3, 0, 'Cuối năm 2020, bộ 4 iPhone 12 đã được ra mắt với nhiều cái tiến. Sau đó, mọi sự quan tâm lại đổ dồn vào sản phẩm tiếp theo – iPhone 13. Vậy iP 13 sẽ có những gì nổi bật, hãy tìm hiểu ngay sau đây nhé!', 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao Không gian hiển thị sống động - Màn hình 6.1', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(6) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` int(20) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(300) NOT NULL DEFAULT 'upload/userdf.jpg',
  `sdt` varchar(11) DEFAULT '',
  `banchat` tinyint(1) NOT NULL DEFAULT 0,
  `banbuy` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `address`, `email`, `user`, `password`, `role`, `avatar`, `sdt`, `banchat`, `banbuy`) VALUES
(4, 'Lê Khả Duy', 'Ktx khu A', 'duy@gmail.com', 'user1', 123, 0, 'upload/userdf.jpg', '0917880045', 0, 0),
(5, NULL, NULL, 'duy@gmail.com', 'admin1', 123, 1, 'upload/userdf.jpg', '', 0, 0),
(8, NULL, NULL, 'duy.le42125@hcmut.edu.vn', 'user2', 123, 0, 'upload/userdf.jpg', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binhluan_user` (`iduser`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`iduser`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`iddanhmuc`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD CONSTRAINT `fk_binhluan_user` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`iddanhmuc`) REFERENCES `tbl_danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
