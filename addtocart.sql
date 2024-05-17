-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 03:25 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22125927_addtocart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carddetail`
--

CREATE TABLE `carddetail` (
  `C_ID` varchar(16) NOT NULL,
  `CVN` int(3) NOT NULL,
  `Exp_Date` date NOT NULL,
  `Nameoncard` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_billing_data`
--

CREATE TABLE `c_billing_data` (
  `C_ID` int(16) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Postalcode` int(6) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Contactno` int(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
(10, 'Air Jordan 1 Retro High OG Yellow Toe', 40000, 1, 'Yellow', 'White', 'Air Jordan', '1', 'uploads/66301e9994508_b839e493-7571-45b6-9693-770af12c5d97.png', 'uploads/443014c5-41b9-4763-8718-1e7a9f8c59e9.png', 'uploads/3f9e38b7-74ac-4e39-8163-5d29dd270e38.png', 'uploads/3bd90e16-7d0d-4a20-b2a2-de09bada7831.png'),
(12, 'Dunk Low Next Nature SE', 35000, 5, 'White', 'Green', 'Nike', 'DX4361-004', 'uploads/663285cead73d_image_6-removebg-preview.png', 'uploads/663285ceae35c_dunk-low-next-nature-se-womens-shoes-8Dk7Jr-removebg-preview.png', 'uploads/663285ceaeac4_dunk-low-next-nature-se-womens-shoes-8Dk7Jr-removebg-preview (2).png', 'uploads/663285ceaefe8_dunk-low-next-nature-se-womens-shoes-8Dk7Jr-removebg-preview (1).png'),
(13, 'Nike Air More Uptempo', 19500, 5, 'White', 'White', 'Nike', 'FD9884-101', 'uploads/6632ad9474652_image_21-removebg-preview.png', 'uploads/6632ad9474ed4_air-more-uptempo-mens-slides-47mMCm-removebg-preview.png', 'uploads/6632ad947534c_air-more-uptempo-mens-slides-47mMCm-removebg-preview (2).png', 'uploads/6632ad947581d_air-more-uptempo-mens-slides-47mMCm-removebg-preview (1).png'),
(14, 'Air Jordan Sophia', 25800, 5, 'Pink', 'Pink', 'Air Jordan ', 'FZ7012-600', 'uploads/6632af16f4158_image_24-removebg-preview.png', 'uploads/6632af17005a3_jordan-sophia-womens-slides-8DlFQl-removebg-preview (1).png', 'uploads/6632af1700d5b_jordan-sophia-womens-slides-8DlFQl-removebg-preview (2).png', 'uploads/6632af1701501_jordan-sophia-womens-slides-8DlFQl-removebg-preview.png'),
(15, 'Nike Dunk Low', 34500, 5, 'Black', 'White', 'Nike', 'DD1503-10', 'uploads/6632b0cddf506_image_25-removebg-preview.png', 'uploads/6632b0cddfa8b_dunk-low-womens-shoes-ppQwKZ-removebg-preview.png', 'uploads/6632b0cddfe8a_dunk-low-womens-shoes-ppQwKZ-removebg-preview (2).png', 'uploads/6632b0cde0446_dunk-low-womens-shoes-ppQwKZ-removebg-preview (1).png'),
(16, 'Winflo 9 Premium', 39000, 5, 'Black', 'While', 'Nike', 'DR9831-001', 'uploads/6632b43172ef4_wio-9-premium-womens-road-running-shoes-0MS1bT-removebg-preview (1).png', 'uploads/6632b431735e0_wio-9-premium-womens-road-running-shoes-0MS1bT-removebg-preview (2).png', 'uploads/6632b43173989_wio-9-premium-womens-road-running-shoes-0MS1bT-removebg-preview (3).png', 'uploads/6632b43173cfa_wio-9-premium-womens-road-running-shoes-0MS1bT-removebg-preview.png'),
(17, ' Post cool', 22500, 5, 'White', 'Green', 'Air Jordan', ' FZ6511-300', 'uploads/6632b72a4266c_jordan-post-womens-slides-G7XlRc-removebg-preview.png', 'uploads/6632b72a42b50_jordan-post-womens-slides-G7XlRc-removebg-preview (4).png', 'uploads/6632b72a42f3c_jordan-post-womens-slides-G7XlRc-removebg-preview (3).png', 'uploads/6632b72a433e9_jordan-post-womens-slides-G7XlRc-removebg-preview (1).png'),
(18, 'Pegasus Trail 4', 42000, 5, 'Green', 'Blue', 'Adidas', ' DJ6159-403', 'uploads/6632b876f1b6c_pegasus-trail-4-womens-trail-running-shoes-CQT261-removebg-preview.png', 'uploads/6632b876f2336_pegasus-trail-4-womens-trail-running-shoes-CQT261-removebg-preview (4).png', 'uploads/6632b876f286f_pegasus-trail-4-womens-trail-running-shoes-CQT261-removebg-preview (2).png', 'uploads/6632b876f2d23_pegasus-trail-4-womens-trail-running-shoes-CQT261-removebg-preview (1).png'),
(19, 'Calm greyet', 26000, 4, 'Green', 'Green', 'Lacoste', 'FD5130-300', 'uploads/6632babeaf712_calm-mens-mules-m5tTKn-removebg-preview.png', 'uploads/6632babeafc65_calm-mens-mules-m5tTKn-removebg-preview (3).png', 'uploads/6632babeb00bc_calm-mens-mules-m5tTKn-removebg-preview (2).png', 'uploads/6632babeb04ae_calm-mens-mules-m5tTKn-removebg-preview (1).png'),
(20, 'Zoom Fly 5', 36500, 4, 'White', 'Orange', 'Air Jordan', ' DM8974-100', 'uploads/6632bcdf20a3d_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview.png', 'uploads/6632bcdf20f0c_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview (3).png', 'uploads/6632bcdf21465_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview (2).png', 'uploads/6632bcdf219c6_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview (1).png'),
(21, 'Tatum 2 \"Vortex\"', 370400, 5, 'Pink', 'White', 'Air Jordan', 'FJ6457-300', 'uploads/6632bea8207df_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview.png', 'uploads/6632bea820c40_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview (3).png', 'uploads/6632bea82102c_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview (2).png', 'uploads/6632bea82154c_zoom-fly-5-womens-road-running-shoes-ShXjdb-removebg-preview (1).png'),
(22, 'Merrel Trail glove 7', 10000, 10, 'Black', 'Pink', 'Merrel', 'Trail glove 7', 'uploads/663644e799ba6_1.PNG', 'uploads/663644e79a2d1_Capture.PNG', 'uploads/663644e79ae19_Capture3.PNG', 'uploads/663644e79ba6e_Capture4.PNG'),
(23, 'Adidas Lite racer adapt', 16500, 10, 'Black', 'Gold', 'Adidas', 'Lite racer adapt', 'uploads/66364e7ebefdb_2.PNG', 'uploads/66364e7ebf6f2_2.1.PNG', 'uploads/66364e7ebffc1_2.3.PNG', 'uploads/66364e7ec08b2_2.4.PNG'),
(24, 'Adidas Swift run 22', 22000, 10, 'White', 'Black', 'Adidas', 'Swift run 22', 'uploads/66364eed7c7f4_3.PNG', 'uploads/66364eed7d22d_3.1.PNG', 'uploads/66364eed7db5c_3.2.PNG', 'uploads/66364eed7e3ae_3.3.PNG'),
(25, 'Vans Classic Slip-on', 15000, 10, 'White', 'White', 'Vans', 'Classic Slip-on', 'uploads/663650718d2d9_4.PNG', 'uploads/663650718dc19_1.PNG', 'uploads/663650718e751_2.PNG', 'uploads/663650718f117_3.PNG'),
(26, 'Skechers twinkle sparks', 12500, 10, 'White', 'Pink', 'Skechers', 'twinkle sparks', 'uploads/663662d9063fb_5.PNG', 'uploads/663662d90729c_1.PNG', 'uploads/663662d907c63_2.PNG', 'uploads/663662d90847f_3.PNG'),
(27, 'Vans Slip-on v', 18900, 10, 'White', 'Yellow', 'Vans', 'Slip-on v', 'uploads/66366349e1da4_6.PNG', 'uploads/66366349e27d3_1.PNG', 'uploads/66366349e2f55_2.PNG', 'uploads/66366349e38ae_3.PNG'),
(28, 'Vans Classic Slip-on', 10800, 10, 'White', 'Red', 'Vans', 'Classic Slip-on', 'uploads/663663aa69289_7.PNG', 'uploads/663663aa69cfe_1.PNG', 'uploads/663663aa6a5e5_2.PNG', 'uploads/663663aa6ae72_3.PNG'),
(29, 'Vans Classic Slip-on', 40000, 10, 'White', 'Green', 'Vans', 'Classic Slip-on', 'uploads/663663f090845_8.PNG', 'uploads/663663f091277_1.PNG', 'uploads/663663f091bd3_2.PNG', 'uploads/663663f092511_3.PNG'),
(30, 'Adidas Duramo SL', 13600, 10, 'Black', 'Pink', 'Adidas', 'Duramo SL', 'uploads/6636644ce6099_9.PNG', 'uploads/6636644ce6be0_1.PNG', 'uploads/6636644ce74d4_2.PNG', 'uploads/6636644ce7bf2_3.PNG'),
(31, 'Puma r-78 hook and loop', 18900, 10, 'White', 'Orange', 'Puma', 'r-78 hook and loop', 'uploads/663664b535d40_10.PNG', 'uploads/663664b536e3f_1.PNG', 'uploads/663664b537b96_2.PNG', 'uploads/663664b538406_3.PNG'),
(32, 'Skechers spot lighted', 13200, 10, 'White', 'Pink', 'Skechers', 'spot lighted', 'uploads/66366535912c6_12.PNG', 'uploads/6636653591ad0_1.PNG', 'uploads/6636653592238_2.PNG', 'uploads/66366535928a2_3.PNG'),
(33, 'Skechers twinkle spark ice', 23500, 10, 'White', 'Pink', 'Skechers', 'twinkle spark ice', 'uploads/66366597a1ba2_13.PNG', 'uploads/66366597a2798_1.PNG', 'uploads/66366597a340e_2.PNG', 'uploads/66366597a3e0c_3.PNG'),
(34, 'Nike cushioned crew socks', 3000, 10, 'White', 'White', 'Nike', 'Nike cushioned crew ', 'uploads/663670b07d307_1.PNG', 'uploads/663670b07d93e_2.PNG', 'uploads/663670b07dfee_3.PNG', 'uploads/663670b07e6c5_8.PNG'),
(35, 'Adidas socks', 2100, 10, 'White', 'White', 'Adidas', 'Adidas socks', 'uploads/6636711998cc1_1.PNG', 'uploads/6636711999345_5.PNG', 'uploads/6636711999951_3.PNG', 'uploads/663671199a4db_2.PNG'),
(36, 'Nike socks', 2000, 10, 'Black', 'Black', 'Nike', 'Nike socks', 'uploads/66367164e8e78_1.PNG', 'uploads/66367164e9a89_2.PNG', 'uploads/66367164ea110_3.PNG', 'uploads/66367164ea761_6.PNG'),
(37, 'SOF Sole', 1250, 10, 'White', 'White', 'SOF', 'sloe', 'uploads/663671ae1ea17_2.PNG', 'uploads/663671ae1f02e_3.PNG', 'uploads/663671ae1f62b_7.PNG', 'uploads/663671ae1fe42_Capture.PNG'),
(38, 'Socks', 1590, 10, 'Black', 'Black', 'Socks', 'Copper fit', 'uploads/6636720c48d93_4.PNG', 'uploads/6636720c4938e_6.PNG', 'uploads/6636720c49a25_10.PNG', 'uploads/6636720c4a077_Capture.PNG'),
(39, 'Nike No Snow', 2800, 10, 'Black', 'Black', 'Nike', 'No Snow', 'uploads/6636725599770_4.PNG', 'uploads/6636725599ec2_3.PNG', 'uploads/663672559a8d9_2.PNG', 'uploads/663672559b067_5.PNG'),
(40, 'Nike Ankle socks', 2500, 10, 'White', 'Black', 'Nike', 'Ankle socks', 'uploads/663672a5c627d_2.PNG', 'uploads/663672a5c6c02_3.PNG', 'uploads/663672a5c7236_7.PNG', 'uploads/663672a5c7d22_Capture.PNG'),
(41, 'Nike Quarter socks', 2100, 10, 'Black', 'Black', 'Nike', 'Quarter socks', 'uploads/663672ec7e551_2.PNG', 'uploads/663672ec7efb4_3.PNG', 'uploads/663672ec7f8c4_1.PNG', 'uploads/663672ec803f1_14.PNG'),
(42, 'Nike Quarter socks', 1900, 10, 'Black', 'Pink', 'Nike', 'Quarter socks', 'uploads/6636733dc8b4f_14.PNG', 'uploads/6636733dc9a14_4.PNG', 'uploads/6636733dca36d_3.PNG', 'uploads/6636733dcac81_14.PNG'),
(43, 'SOLE Black', 1500, 10, 'Black', 'Black', 'SOLE', 'SOLE Black', 'uploads/6636739c33e5a_4.PNG', 'uploads/6636739c346c2_6.PNG', 'uploads/6636739c34ddf_10.PNG', 'uploads/6636739c35701_Capture.PNG'),
(44, 'Apara 5 pr women’s', 900, 10, 'Black', 'White', 'APARA', '5 pr women’s', 'uploads/663673e9dd663_1.PNG', 'uploads/663673e9de3fe_2.PNG', 'uploads/663673e9dec3b_3.PNG', 'uploads/663673e9df45c_11.PNG'),
(45, 'Nike Quarter socks', 1500, 10, 'Black', 'Pink', 'Nike', 'Quarter socks', 'uploads/66367425984cd_14.PNG', 'uploads/6636742599044_3.PNG', 'uploads/66367425998ae_2.PNG', 'uploads/663674259a1f4_1.PNG');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `c_billing_data`
--
ALTER TABLE `c_billing_data`
  ADD PRIMARY KEY (`C_ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `c_billing_data`
--
ALTER TABLE `c_billing_data`
  MODIFY `C_ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
