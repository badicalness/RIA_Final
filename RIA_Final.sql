-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2016 at 06:45 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RIA_Final`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `purchase_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estimated_date` date NOT NULL,
  `billing_address` varchar(100) NOT NULL,
  `shipping_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`first_name`, `last_name`, `item_name`, `purchase_time`, `estimated_date`, `billing_address`, `shipping_address`) VALUES
('Whitney', 'Adams', 'mistborn', '2016-12-08 01:33:04', '0000-00-00', '389 E Woodlake Drive #102', '389 E Woodlake Drive #102'),
('Whitney', 'Adams', 'mistborn', '2016-12-08 01:33:25', '0000-00-00', '389 E Woodlake Drive #102', '389 E Woodlake Drive #102');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `isbn_number` int(100) NOT NULL,
  `item_name` text NOT NULL,
  `Item_price` int(100) NOT NULL,
  `sales_tax` int(100) NOT NULL,
  `shipping_cost` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`isbn_number`, `item_name`, `Item_price`, `sales_tax`, `shipping_cost`, `image`) VALUES
(978246531, 'Hero of Ages', 8, 0, 9, 'image/hero.jpg'),
(978653726, 'Mistborn', 8, 0, 9, 'image/mistborn.jpg'),
(978127356, 'Throne of Glass', 18, 0, 9, 'image/glass.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(20) NOT NULL,
  `credit_card` int(100) NOT NULL,
  `cc_expiration` varchar(20) NOT NULL,
  `security_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `role`, `address`, `city`, `state`, `zip`, `credit_card`, `cc_expiration`, `security_code`) VALUES
(15, 'Erin', 'Griffeth', 'ErinGriffeth@gmail.com', '$2y$10$EBEGU5ANvwNCNFa0DATM2eoEL4eRKaUU6nP6K1QGlAfNTLFXTeQme', 2147483647, 'user', '', '', '', 0, 0, '', 0),
(16, 'Whit', 'Adams', 'WhitAdams@gmail.com', '$2y$10$Y7XilpDKOIkzFmH22Z3HFufCD.uiGFvPYU.l9LIODxCTmh8cEGqqW', 985555555, 'user', '', '', '', 0, 0, '', 0),
(17, 'Adam', 'Inn', 'admin@admin.com', '$2y$10$NMgeWV173DRtt6X7RkHUrOzl37rE46TxWqy3ikzAeRRtdmEBMOMt2', 2147483647, 'admin', '', '', '', 0, 0, '', 0),
(18, 'Cust', 'Omer', 'customer@customer.com', '$2y$10$QpT5RZH4yX.p2HuPYU2CVOuZ8v0TkGaRUQlAbcXfFTS1X34s61jkq', 2147483647, 'user', '', '', '', 0, 0, '', 0),
(19, 'Sabrina', 'Wright', 'SabrinaWright@gmail.com', '$2y$10$BVy/WjVVZPue1ABIviK70.Tr3C8iRrxij0N06mtQmEw4WYe4S4yMi', 2147483647, 'user', '', '', '', 0, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
