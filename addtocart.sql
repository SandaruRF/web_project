-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 02:25 PM
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
(1, 'Dunk Low University', 30000, 1, 'White', 'Blue', 'Nike', '1', 'uploads/66301a22a168c_76e7febf-9ebb-4e0a-88d2-b970385383e5.png', 'uploads/66301a22a1931_76e7febf-9ebb-4e0a-88d2-b970385383e5.png', 'uploads/66301a22a1b27_76e7febf-9ebb-4e0a-88d2-b970385383e5.png', 'uploads/66301a22a1e9c_76e7febf-9ebb-4e0a-88d2-b970385383e5.png'),
(4, 'Dunk Low Retro', 34500, 1, 'White', 'Blue', 'Nike', '1', 'uploads/66301a8cc51cd_dunk-low-retro-mens-shoes-5FQWGR.png', 'uploads/66301a8cc5410_dunk-low-retro-mens-shoes-5FQWGR.png', 'uploads/66301a8cc5629_dunk-low-retro-mens-shoes-5FQWGR.png', 'uploads/66301a8cc59a1_dunk-low-retro-mens-shoes-5FQWGR.png'),
(5, 'Samba OG White Black', 22000, 1, 'White', 'Black', 'Adidas', '1', 'uploads/66301ade29551_4c319510-3a1f-4e9d-b5b5-1a8485e40dee.png', 'uploads/66301ade297a3_4c319510-3a1f-4e9d-b5b5-1a8485e40dee.png', 'uploads/66301ade29986_4c319510-3a1f-4e9d-b5b5-1a8485e40dee.png', 'uploads/66301ade29b96_4c319510-3a1f-4e9d-b5b5-1a8485e40dee.png'),
(6, 'Air Jordan 4 Craft Olive GS', 45000, 1, 'Green', 'Black', 'Air Jordan', '1', 'uploads/66301b1ce0cc2_c5b61da3-6557-4490-b2d7-c083aa9d3ea5.png', 'uploads/66301b1ce0f2d_c5b61da3-6557-4490-b2d7-c083aa9d3ea5.png', 'uploads/66301b1ce1171_c5b61da3-6557-4490-b2d7-c083aa9d3ea5.png', 'uploads/66301b1ce1478_c5b61da3-6557-4490-b2d7-c083aa9d3ea5.png'),
(7, 'New Balance 530 White Black GS', 22500, 1, 'White', 'Black', 'New Balance', '1', 'uploads/66301dcc56de5_f964fde6-4807-41a0-86a4-fa3f9d8cef12.png', 'uploads/66301dcc5706c_f964fde6-4807-41a0-86a4-fa3f9d8cef12.png', 'uploads/66301dcc572c1_f964fde6-4807-41a0-86a4-fa3f9d8cef12.png', 'uploads/66301dcc57505_f964fde6-4807-41a0-86a4-fa3f9d8cef12.png'),
(8, 'New Balance 530 White Silver Navy', 28900, 1, 'White', 'White', 'New Balance', '1', 'uploads/66301e2866a46_11c39876-db31-4d2e-92b1-b26381496225.png', 'uploads/66301e2866d9b_11c39876-db31-4d2e-92b1-b26381496225.png', 'uploads/66301e286700e_11c39876-db31-4d2e-92b1-b26381496225.png', 'uploads/66301e2867271_11c39876-db31-4d2e-92b1-b26381496225.png'),
(9, 'Lacoste Chaymon Leather', 40800, 1, 'Blue', 'Black', 'Lacoste', '1', 'uploads/66301e62da7dc_40CMA0043_NB0_01-removebg-preview.png', 'uploads/66301e62daa33_40CMA0043_NB0_01-removebg-preview.png', 'uploads/66301e62dac56_40CMA0043_NB0_01-removebg-preview.png', 'uploads/66301e62daea9_40CMA0043_NB0_01-removebg-preview.png'),
(10, 'Air Jordan 1 Retro High OG Yellow Toe', 40000, 1, 'Yellow', 'White', 'Air Jordan', '1', 'uploads/66301e99940e9_b839e493-7571-45b6-9693-770af12c5d97.png', 'uploads/66301e9994508_b839e493-7571-45b6-9693-770af12c5d97.png', 'uploads/66301e9994a82_b839e493-7571-45b6-9693-770af12c5d97.png', 'uploads/66301e9994ca6_b839e493-7571-45b6-9693-770af12c5d97.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
