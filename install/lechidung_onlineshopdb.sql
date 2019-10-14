-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:2610
-- Generation Time: Oct 14, 2019 at 07:10 AM
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
(4, 'NGOC LAN', '../../public/img/imgProducts/52434220_557155538105194_6025390640097918976_n.jpg', 1000000, 22),
(5, 'NGOC LAN', '../../public/img/imgProducts/67883838_662085177612229_5347839740764749824_o.jpg', 1000000, 22),
(6, 'Dung dep zai', '../../public/img/imgProducts/70705176_2347330218839323_5717472855415848960_n.jpg', 11111, 88),
(7, 'Dung dep zai', '../../public/img/imgProducts/70403238_128700105096428_7124894017241743360_n.jpg', 1000000, 22);

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
(111, 'le', 'dung', 'boydungbg', 'boydungbg@yahoo.com', '$2y$10$3DxXy/LutJ9EOOCNPio9UeUqniLO/sE/FXgwZmSnvTOhpoDnhLyfC', '2019-10-14 11:27:26', 2);

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
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lechidung_users`
--
ALTER TABLE `lechidung_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
