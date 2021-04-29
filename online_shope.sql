-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 11:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shope`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `email`, `password`, `create_at`) VALUES
(1, 'Yazeed Bani-Ata', 'yazeed@gmail.com', 'yazeed1234', '2021-04-25 22:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_type` enum('M','L','W') NOT NULL,
  `product_position` char(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `for_Model` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_old_price` double(10,2) NOT NULL,
  `product_new_price` double(10,2) NOT NULL,
  `product_ram` char(5) NOT NULL,
  `product_storage` varchar(100) NOT NULL,
  `product_camera` varchar(100) NOT NULL,
  `product_screen_size` varchar(150) NOT NULL,
  `product_processor` varchar(150) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_register` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`product_id`, `product_name`, `product_type`, `product_position`, `category`, `for_Model`, `product_brand`, `product_old_price`, `product_new_price`, `product_ram`, `product_storage`, `product_camera`, `product_screen_size`, `product_processor`, `product_image`, `product_register`) VALUES
(1, 'Samsung Galaxy 10', 'M', 'R_A', 'Mobile', 'Samsung1', 'Samsung', 0.00, 152.00, '2', '16', '12', '15-inc', '', 'img/products/1.png', '2020-10-04 17:03:57'),
(2, 'Redmi Note 7', 'M', 'R_A', 'Mobile', 'Redmi1', 'Redmi', 0.00, 122.00, '3', '32', '13', '16-inc', '', 'img/products/2.png', '2020-10-04 17:07:48'),
(3, 'iPhone x', 'M', 'R_A', 'Mobile', 'Apple1', 'Apple', 0.00, 200.00, '4', '64', '16', '14.5-inc', '', 'img/products/13.png', '2020-10-04 17:07:48'),
(4, 'Samsung Galaxy S7', 'M', 'R_A', 'Mobile', 'Samsung2', 'Samsung', 0.00, 165.00, '3', '32', '15', '11-inc', '', 'img/products/12.png', '2020-10-04 17:09:45'),
(5, 'iPhone 5', 'M', 'R_A', 'Mobile', 'Apple2', 'Apple', 0.00, 75.00, '1', '12', '2', '10-inc', '', 'img/products/14.png', '2020-10-04 17:09:45'),
(6, 'Redmi Note 9', 'M', 'R_A', 'Mobile', 'Redmi2', 'Redmi', 0.00, 125.15, '4', '64', '32', '16-inc', '', 'img/products/8.png', '2020-10-04 17:11:22'),
(7, 'ASUS ZenBook Pro Duo', 'L', 'R_A', 'Laptop', 'Asusu1', 'Asus ', 0.00, 1705.40, '16', '1TB PCIe SSD', '', '14-inc', '2.4-GHz Intel Core i9-9980HK', 'img/products/PL1.jpg', '2020-10-04 17:16:15'),
(8, 'Atek Philippe', 'W', 'R_A', 'Watches', 'Philippe1', 'Philippe', 0.00, 125.99, '', '', '', '', '', 'img/products/W1.jpg', '2020-10-04 17:18:09'),
(9, 'STag Heuer', 'W', 'R_A', 'Watches', 'Heuer1', 'Heuer', 0.00, 210.99, '', '', '', '', '', 'img/products/W2.jpg', '2020-10-04 17:21:13'),
(10, 'Redmi Note', 'M', 'T_S', 'Mobile', 'Redmi3', 'Redmi', 110.50, 95.50, '2', '16', '5', '10-inc', '', 'img/products/10.png', '2020-10-06 11:25:13'),
(11, 'Redmi Note 5', 'M', 'T_S', 'Mobile', 'Redmi4', 'Redmi', 180.00, 166.99, '2', '32', '13', '12-inc', '', 'img/products/3.png', '2020-10-06 11:33:44'),
(12, 'iPhone 6', 'M', 'T_S', 'Mobile', 'Apple3', 'Apple', 165.45, 155.45, '2', '16', '12', '12-inc', '', 'img/products/15.png', '2020-10-06 11:37:15'),
(13, 'Samsung Galaxy S6', 'M', 'T_S', 'Mobile', 'Samsung3', 'Samsung', 95.99, 90.60, '3', '32', '13', '14-inc', '', 'img/products/11.png', '2020-10-06 11:37:15'),
(14, 'Redmi Note 4', 'M', 'T_S', 'Mobile', 'Redmi5', 'Redmi', 122.00, 110.20, '2', '16', '13', '12-inc', '', 'img/products/5.png', '2020-10-06 11:40:05'),
(15, 'Redmi Note 8', 'M', 'T_S', 'Mobile', 'Redmi6', 'Redmi', 190.99, 175.99, '4', '32', '15', '14-inc', '', 'img/products/6.png', '2020-10-06 11:40:05'),
(16, 'Smart Band 4', '', 'O_P', '', 'offer', 'Xiaomi', 250.00, 225.99, '', '', '', '10-inc', '', 'img/products/exclusive.png', '2020-10-06 14:27:10'),
(17, 'DELL', 'L', 'R_A', 'Laptop', 'DELL1', 'DELL', 0.00, 899.45, '8', '500 SSD', '12', '14-inc', 'Core-i5-6210M', 'img/products/PL2.png', '2020-11-12 14:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`) VALUES
(21, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `register_user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_datetime`) VALUES
(5, 'yazeed', 'yazeedteat@yahoo.com', '4321', '2021-04-05 14:06:44'),
(8, 'Jone', 'Jone1991@hotmail.com', '|J	Ê7b¯aå• ”=Âd”ø”', '2021-04-27 17:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `Subscribe_ID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Subscribe_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`Subscribe_ID`, `email`, `Subscribe_Time`) VALUES
(1, 'yazeedtest@yahoo.com', '2021-04-06 15:20:17'),
(2, 'yazeed@gmail.com', '2021-04-24 18:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`register_user_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`Subscribe_ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `Subscribe_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
