-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 07:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addtocart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `shoe_id`, `quantity`, `price`) VALUES
(12, 7, 3, 22500),
(13, 8, 2, 28900),
(14, 6, 2, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color1` varchar(20) NOT NULL,
  `color2` varchar(20) DEFAULT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `quantity`, `color1`, `color2`, `brand`, `model`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'Dunk Low University', 30000, 1, 'White', 'Blue', 'Nike', '1', 'uploads/66301a22a1b27_76e7febf-9ebb-4e0a-88d2-b970385383e5.png', 'uploads/30aedcbc-aa8e-4e5e-993b-17fa765ac747.png', 'uploads/b3db1fa5-9a42-4f55-b5c6-19e0ea49007f.png', 'uploads/5a83afa5-eee8-47d8-9418-017385148863.png'),
(4, 'Dunk Low Retro', 34500, 1, 'White', 'Blue', 'Nike', '1', 'uploads/66301a8cc5410_dunk-low-retro-mens-shoes-5FQWGR-removebg-preview.png', 'uploads/dunk-low-retro-mens-shoes-5FQWGR-removebg-preview.png', 'uploads/dunk-low-retro-mens-shoes-5FQWGR__1_-removebg-preview.png', 'uploads/dunk-low-retro-mens-shoes-5FQWGR__2_-removebg-preview.png'),
(5, 'Samba OG White Black', 22000, 1, 'White', 'Black', 'Adidas', '1', 'uploads/66301ade29b96_4c319510-3a1f-4e9d-b5b5-1a8485e40dee.png', 'uploads/d9950c93-129a-4085-8452-a31d0d141218.png', 'uploads/14647d82-8e90-4aec-8f02-42c1cb8be87b.png', 'uploads/7a41ebcc-3a4f-4038-9bd2-df062a25d996.png'),
(6, 'Air Jordan 4 Craft Olive GS', 45000, 1, 'Green', 'Black', 'Air Jordan', '1', 'uploads/66301b1ce1478_c5b61da3-6557-4490-b2d7-c083aa9d3ea5.png', 'uploads/82211853-64d7-4d1e-8f6e-a22aa7744c22.png', 'uploads/aea3e5c1-7282-4c00-99c5-bcb7a3572227.png', 'uploads/cd764151-4682-47a7-9975-fcfeab928657.png'),
(7, 'New Balance 530 White Black GS', 22500, 1, 'White', 'Black', 'New Balance', '1', 'uploads/66301dcc5706c_f964fde6-4807-41a0-86a4-fa3f9d8cef12.png', 'uploads/3cd27db9-b783-45cd-aa6a-edbd9f1e1319.png', 'uploads/8d1d5529-8edd-40c8-9e87-be1794f25871.png', 'uploads/1b0afa56-ac63-47d1-a426-80bbb19c5234.png'),
(8, 'New Balance 530 White Silver Navy', 28900, 1, 'White', 'White', 'New Balance', '1', 'uploads/66301e2866a46_11c39876-db31-4d2e-92b1-b26381496225.png', 'uploads/1bc9668c-a8f7-4cf4-8ebf-38187aa78c67.png', 'uploads/82fab65f-cd35-4814-94a2-19883e61fa18.png', 'uploads/0fae25a7-6d2b-4f2c-b3b7-20e67537b2f5.png'),
(9, 'Lacoste Chaymon Leather', 40800, 1, 'Blue', 'Black', 'Lacoste', '1', 'uploads/66301e62da7dc_40CMA0043_NB0_01-removebg-preview.png', 'uploads/40CMA0043_NB0_05-removebg-preview.png', 'uploads/40CMA0043_NB0_04-removebg-preview.png', 'uploads/40CMA0043_NB0_02-removebg-preview.png'),
(10, 'Air Jordan 1 Retro High OG Yellow Toe', 40000, 1, 'Yellow', 'White', 'Air Jordan', '1', 'uploads/66301e9994508_b839e493-7571-45b6-9693-770af12c5d97.png', 'uploads/443014c5-41b9-4763-8718-1e7a9f8c59e9.png', 'uploads/3f9e38b7-74ac-4e39-8163-5d29dd270e38.png', 'uploads/3bd90e16-7d0d-4a20-b2a2-de09bada7831.png');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(32, 'qwerty', 'romina', 'a@g.com', '$2y$10$6N9'),
(33, 'abc', 'romina', 'b@g.com', '123'),
(34, 'sehara', 'Fernando', 'sehara@gmail.com', 'abc@123'),
(35, 'Saman', 'Perera', 's@gmail.com', '?C1??8??*?'),
(36, 'Kasun', 'Perera', 'k@gmail.com', '%???2;E8??'),
(37, 'Tharuka', 'Prabhashana', 'tp@gmail.com', 'b24331b1a1'),
(38, 'Divan', 'Sathsara', 'ds@gmail.com', 'b24331b1a138cde62aa1f679164fc62f'),
(39, 'Shiny', 'Fernando', 'shinyfernando719@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
