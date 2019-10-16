-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:2610
-- Generation Time: Oct 16, 2019 at 07:13 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lechidung_product`
--

CREATE TABLE `lechidung_product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productImage` varchar(500) NOT NULL,
  `productPrice` double NOT NULL,
  `productSale` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lechidung_product`
--

INSERT INTO `lechidung_product` (`productID`, `productName`, `productImage`, `productPrice`, `productSale`) VALUES
(13, 'Combo 2 Nước Xả Vải Downy Dịu Nhẹ Hương Sả Dạng Túi', '../../public/img/imgProducts/[tiki.vn][801]601a989f7a722e7569ec437203b67dfb.jpg', 331000, 25),
(14, 'Sữa Bột Friso Gold 5 Dành Cho Bé Từ 4 Tuổi Trở Lên 1500g', '../../public/img/imgProducts/[tiki.vn][941]bdc48f73092681240fd786a4ac511b40.jpg', 599000, 1),
(15, ' Sữa Bột Enfagrow A+ 4 (870g)', '../../public/img/imgProducts/[tiki.vn][970]f7043e094d3c787743d0ca8a1dbd8a84.jpg', 499000, 10),
(16, 'Thùng 48 Hộp Sữa Bột Pha Sẵn Friso Gold Rtd Vani (48 x 180Ml)', '../../public/img/imgProducts/[tiki.vn][226]21b3c824776b38dc7a3a366e376fea88.jpg', 700000, 7),
(17, 'Khăn Ứớt Bobby Gói Bổ Sung (80 Miếng)', '../../public/img/imgProducts/[tiki.vn][207]cf0e2c1112ed904c70f7d15571d489c3.jpg', 34000, 15),
(18, 'Combo 3 Gói Tã Dán Huggies Dry Gói Cực Đại M76 (76 Miếng) - Bao Bì Mới', '../../public/img/imgProducts/[tiki.vn][216]aa47cd545651fde912b3d4cfd9b2e5d1.jpg', 960000, 21),
(19, ' Siêu thị tã bỉm Tài trợ (?) Tã Dán Huggies Dry Gói Cực Đại L68 (68 Miếng) - Bao Bì Mới', '../../public/img/imgProducts/[tiki.vn][85]70148404d6ab4ccea8f9ff39c3d689f5.jpg', 320000, 21),
(20, 'Combo 3 Gói Tã Quần Huggies Dry Gói Cực Đại L68 (68 Miếng) - Bao Bì Mới', '../../public/img/imgProducts/[tiki.vn][173]7e38d7cf5e26112db6b66451b46a5bdf.jpg', 1170000, 22),
(21, 'Tã Dán Sơ Sinh Huggies Dry Newborn S56 (56 Miếng)', '../../public/img/imgProducts/[tiki.vn][653]20f5d88c5bbbcc418ab9a2a731a61e74.jpg', 210000, 19),
(22, ' CRM - Sữa Enfamil A + 1 360° Brain DHA+ MFGM PRO (400g)', '../../public/img/imgProducts/[tiki.vn][950]90316f66346fa95005d340b8770132fa.jpg', 240000, 0),
(23, 'Miếng Lót Sơ Sinh Huggies Dry Newborn 1-100 (100 Miếng)', '../../public/img/imgProducts/[tiki.vn][335]7346d8249bf08f2d2ed9d625ec841f12.jpg', 142000, 18),
(24, ' CRM - Sữa Bột Nestle NAN Optipro 4 (900g)', '../../public/img/imgProducts/[tiki.vn][39]a3ca4dd9dfa1e078e3869e8aa4d0e2b5.jpg', 391000, 6),
(25, ' Miếng Lót Sơ Sinh Bobby Fresh Newborn 2 - 60 (60 Miếng) + Tặng Thêm 6 Miếng Tã Quần (Size M)', '../../public/img/imgProducts/[tiki.vn][233]ffac29c7dbbca7773fbd54749d8e31cc.jpg', 130000, 16),
(26, 'Sữa Bột Friso Gold 2 900g', '../../public/img/imgProducts/[tiki.vn][282]e439f4e6c61966c07e3152ae198a8a3a.jpg', 490000, 0),
(27, 'Khăn Ướt Bobby Nắp Nhựa (100 Miếng)', '../../public/img/imgProducts/[tiki.vn][236]4ebf9040c8f7a604f13c62c45d5ad475.jpg', 41000, 21),
(28, 'Tã Quần Bobby Ultra Jumbo XXL56 Siêu Siêu Lớn (Size XXL) - 56 Miếng', '../../public/img/imgProducts/[tiki.vn][52]e343629f7e9714dab31c74364555f189.jpg', 395000, 14),
(29, 'Dung Dịch Giặt Quần Áo Cho Bé D-Nee - Chai 3000ml (Tím)', '../../public/img/imgProducts/[tiki.vn][977]68123f61ec869d14f711b79f98fd2011.jpg', 215000, 14),
(30, 'Tã Quần Huggies Dry Gói Cực Đại XXL56 (56 Miếng) - Bao Bì Mới', '../../public/img/imgProducts/[tiki.vn][166]473e5c7934f33504487eb661cf1d01be.jpg', 390000, 20),
(31, 'Tã Quần Bobby Gói Mega Jumbo XL102 (102 Miếng)', '../../public/img/imgProducts/[tiki.vn][8]bda358af29707a2dbc22a530d57f0693.jpg', 623000, 22),
(32, 'Tã Quần Bobby Gói Lớn L36 (36 Miếng)', '../../public/img/imgProducts/[tiki.vn][82]457b92dcdcb089130b4834c2d60e75ad.jpg', 225000, 17),
(33, 'Tã Quần Pampers Gói Đại L54 (54 Miếng)', '../../public/img/imgProducts/[tiki.vn][229]e167a56d54e785f95d315fafba0abe70.jpg', 299, 14);

-- --------------------------------------------------------

--
-- Table structure for table `lechidung_users`
--

CREATE TABLE `lechidung_users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(300) NOT NULL,
  `user_registerdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lechidung_users`
--

INSERT INTO `lechidung_users` (`user_id`, `user_fname`, `user_lname`, `user_username`, `user_email`, `user_pass`, `user_registerdate`, `user_level`) VALUES
(107, 'Dung', 'Le', 'admin', 'luvsosad2412@gmail.com', '$2y$10$ZGcxedhariNMztFan518Se73fF3MGBcp/APLBbVyUC6dVQEHdLA9O', '2019-10-12 05:47:35', 1),
(114, 'aaa', 'aaa', 'dung1', 'boydungbg1@yahoo.com', '$2y$10$aYgKC2Yv8X5cevTTKgjRUe9rxrG3pWJhxYa5YAiQPfoB7xezWa2aa', '2019-10-16 09:46:45', 2),
(115, 'aaa', 'aaa', 'dung2', 'boydungbg2@yahoo.com', '$2y$10$AYAKm5EBFp9Nl7JwEe2yH.JIaui1K0WUNeEZWLnCqs8WrOYC88tC2', '2019-10-16 09:47:02', 2),
(116, 'aaa', 'aaa', 'dung3', 'boydungbg3@yahoo.com', '$2y$10$C2k4vc2YCKjEzkWRJmIkmer/J0Rg593UXdUkcckFXfPhrq4Wha2qa', '2019-10-16 09:47:23', 2),
(117, 'aaa', 'aaa', 'dung4', 'boydungbg4@yahoo.com', '$2y$10$urRWV.UXOzLVsSf.v1puxOd9vnO3DQiylccee5bdkal7bJIVLazki', '2019-10-16 09:47:42', 2),
(118, 'aaa', 'aaa', 'dung5', 'boydungbg5@yahoo.com', '$2y$10$Qd15TzICYE17kQyuGFbSCegxUGvCATxpB7T78EXQNJGrL4usicjPe', '2019-10-16 09:48:02', 2),
(119, 'aaa', 'aaa', 'dung6', 'boydungbg6@yahoo.com', '$2y$10$uIVjfBesUnapqTsaqC6geelYJKaTib3CMENp14O7tzf50Vscxze1a', '2019-10-16 09:48:23', 2),
(120, 'aaa', 'aaa', 'dung 7', 'boydungbg7@yahoo.com', '$2y$10$tF2uHFa4pAWiBE3NXoQfvOsaVRzlry1WCQgt1HlIp8e6aTBLUMFdW', '2019-10-16 09:48:50', 2),
(121, 'aaa', 'aaa', 'dung8', 'boydungbg8@yahoo.com', '$2y$10$yihYyJh7GBYBs3k9owmYZeRWyXr7mW4P1g2NcKNydrvhJpIeQKK2y', '2019-10-16 09:49:09', 2),
(122, 'aaa', 'aaa', 'dung9', 'boydungbg9@yahoo.com', '$2y$10$SE6sHpufHc/MviKcrjnqOODtLi7zGsmB40pZRXUL/Z.prfuqFv.S2', '2019-10-16 09:49:57', 2),
(123, 'aaa', 'aaa', 'dung10', 'boydungbg10@yahoo.com', '$2y$10$JEr2IzGBxyRxf71HHDxCf.aW2xXkF2RbOTOkwTodDxFxamoWcF1Va', '2019-10-16 09:50:26', 2),
(124, 'aaa', 'aaa', 'dung11', 'boydungbg11@yahoo.com', '$2y$10$OCyXFul6QcSuHHjInXOuCO3LwiEeXZbgpU8iIT/pejV7J2D8H86Xe', '2019-10-16 09:50:38', 2),
(125, 'aaa', 'aaa', 'dung12', 'boydungbg12@yahoo.com', '$2y$10$rC8We802GeJaQ4Sj98qjSu.yvEQmLnjYynndgAEvtsEdPX//WQvGm', '2019-10-16 09:51:00', 2),
(126, 'aaa', 'aaa', 'dung13', 'boydungbg13@yahoo.com', '$2y$10$nQeM/7R5G/zfN0XTxk7CKO0pHILnOxiM5o/Q/rhwHVcskA.3kOEY.', '2019-10-16 09:51:16', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lechidung_product`
--
ALTER TABLE `lechidung_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `lechidung_users`
--
ALTER TABLE `lechidung_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lechidung_product`
--
ALTER TABLE `lechidung_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `lechidung_users`
--
ALTER TABLE `lechidung_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
