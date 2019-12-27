-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 11:38 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone_no`, `address`, `password`) VALUES
(2, 'Tushar', 'tushar@gmail.com', '0123456789', 'Dhaka', 'df7c905d9ffebe7cda405cf1c82a3add'),
(3, 'test', 'test@test.com', '0321654987', 'Cumilla', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'ratul', 'ratul@gmail.com', '0384940294', 'Dhaka', 'db2a9a88f5fbc333deff1bb22d483298');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `product_quantity`, `product_name`, `product_price`, `product_image`) VALUES
('5e014bf006d93', 4, 5, 'Gaming product', 1200, 'productsImage/5df7ea5eb7eb5.png'),
('5e014bf006d93', 6, 2, 'LG tv', 60000, 'productsImage/5e009f64f0107.jpg'),
('5e014bf006d93', 8, 1, 'One Plus 7pro', 60000, 'productsImage/5e00a146e09da.jpg'),
('5e014d6f5205c', 6, 1, 'LG tv', 60000, 'productsImage/5e009f64f0107.jpg'),
('5e014d6f5205c', 3, 3, 'FInally one test', 4564, 'productsImage/5e009fe5e9bce.jpg'),
('5e014d6f5205c', 7, 2, 'Emotion Superior Wireless Earphone', 4500, 'productsImage/5e00a0bc28e79.jpg'),
('5e014d6f5205c', 8, 1, 'One Plus 7pro', 60000, 'productsImage/5e00a146e09da.jpg'),
('5e014bf006d93', 3, 4, 'FInally one test', 4564, 'productsImage/5e009fe5e9bce.jpg'),
('5e01e48c4a356', 3, 1, 'FInally one test', 4564, 'productsImage/5e009fe5e9bce.jpg'),
('5e01e48c4a356', 7, 1, 'Emotion Superior Wireless Earphone', 4500, 'productsImage/5e00a0bc28e79.jpg'),
('5e05dc580f73b', 8, 1, 'One Plus 7pro', 60000, 'productsImage/5e00a146e09da.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Camera'),
(2, 'TV'),
(3, 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` text,
  `product_quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` text,
  `product_short_description` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `featured_product` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `product_name`, `product_price`, `product_image`, `product_short_description`, `product_description`, `featured_product`, `category_id`) VALUES
(7, 'Emotion Superior Wireless Earphone', 4500, 'productsImage/5e00a0bc28e79.jpg', 'short descrip jgfsjkjogjojgjsjgsjgjs', 'UPDATEsfsfDescription iuhsfihsidjhfliashkfhasjlidfhjliashfljsbdnjfbsahujdhfipashfpijajsdjlifhalsjidhfjiasdhfljashidjfhasijdfhijsadhfijsahdfijasijfhasjifhdj', 1, 3),
(8, 'One Plus 7pro', 60000, 'productsImage/5e00a146e09da.jpg', 'fsdfsdfshort description jshdfhsjihdfijlashlfdhasjlfhjlishflijshad', 'sfdsdfsdDescription iuhsfihsidjhfliashkfhasjlidfhjliashfljsbdnjfbsahujdhfipashfpijajsdjlifhalsjidhfjiasdhfljashidjfhasijdfhijsadhfijsahdfijasijfhasjifhdj', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transection_paypal`
--

CREATE TABLE `transection_paypal` (
  `id` int(20) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `transection_paypal`
--
ALTER TABLE `transection_paypal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transection_paypal`
--
ALTER TABLE `transection_paypal`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product_order` (`order_id`);

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
