-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 01:37 AM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(160, 17, 21, 'Face Mask Salicylic Acid 2 % Masque', '110', '1', 'skin.jpg'),
(179, 21, 24, 'Squalane Cleanser and Makeup Remover', '109000', '1', 'skin5.jpg'),
(180, 18, 21, 'Face Mask Salicylic Acid 2 % Masque', '110000', '1', 'skin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `proof`, `payment_status`) VALUES
(39, 18, 'haikal', '085716609656', 'haikal@gmail.com', 'e-wallet', 'address pamulang, tangerang, banten, Indonesia - 15820', ', Squalane Cleanser and Makeup Remover (1) , Glycolic Acid 7% Toning Solution (1) ', '224000', '05-Jul-2023', 'bukti.jpg', 'completed'),
(40, 19, 'ica', '085628638153', 'annisa@gmail.com', 'e-wallet', 'address Pasar kemis, Tangerang, Banten, Indonesia - 15277', ', Glycolic Acid 7% Toning Solution (1) , Squalane Cleanser and Makeup Remover (1) ', '224000', '05-Jul-2023', 'bukti.jpg', 'completed'),
(41, 18, 'haikal', '085716609656', 'haikal@gmail.com', 'e-wallet', 'address pamulang, tangerang, banten, Indonesia - 15820', ', Face Mask Salicylic Acid 2 % Masque (1) ', '110000', '05-Jul-2023', 'bukti.jpg', 'completed'),
(42, 21, 'riri komalasari', '085716609656', 'ririkomalasari870@gmail.com', 'e-wallet', 'address Legok, tangerang, Banten, Indonesia - 15820', ', Squalane Cleanser and Makeup Remover (1) , Glycolic Acid 7% Toning Solution (1) ', '224000', '05-Jul-2023', 'bukti.jpg', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image`) VALUES
(21, 'Face Mask Salicylic Acid 2 % Masque', 'The Ordinary Salicylic Acid 2% Masque is a skincare product manufactured by the brand The Ordinary. ', '110000', 'skin.jpg'),
(22, 'Glycolic Acid 7% Toning Solution', 'The Ordinary Glycolic Acid 7% Toning Solution is a skincare product manufactured by the brand The Ordinary.', '115000', 'skin4.jpg'),
(24, 'Squalane Cleanser and Makeup Remover', 'The Ordinary Squalane Cleanser and makeup remover is a skincare product manufactured by the brand The Ordinary.', '109000', 'skin5.jpg'),
(26, 'Natural Moisturizing Factors + HA', 'The Ordinary Natural Moisturizing Factors + HA is a skincare product manufactured by the brand The Ordinary.', '117000', 'skin6.jpg'),
(27, 'Serum Alpha Arbutin 2% + HA', 'The Ordinary Glycolic Acid 7% Toning Solution is a skincare product manufactured by the brand The Ordinary.', '120000', 'skin7.jpg'),
(29, 'Buffet Eye Serum copper Peptides 1%', 'The Ordinary buffet copper Peptides 1% is a skincare product manufactured by the brand The Ordinary', '112000', 'skin8.jpg'),
(30, 'Serum Hyaluronic Acid 2% + B5', 'The Ordinary Hyaluronic Acid 2% + B5  is a skincare product manufactured by the brand The Ordinary.', '120000', 'Skin9.jpg'),
(31, 'Cream azelaic acid suspension 10%', 'The Ordinary azelaic acid suspension 10% is a skincare product manufactured by the brand The Ordinary.', '115000', 'skin10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(10, 'admin', 'admin01@gmail.com', '698d51a19d8a121ce581499d7b701668', 'admin'),
(14, 'user A', 'user01@gmail.com', '698d51a19d8a121ce581499d7b701668', 'user'),
(15, 'user B', 'user02@gmail.com', '698d51a19d8a121ce581499d7b701668', 'user'),
(16, 'haikal', 'haikal@gmail.com', '698d51a19d8a121ce581499d7b701668', 'user'),
(19, 'ica', 'annisa@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(20, 'vina', 'vina@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(21, 'riri', 'ririkomalasari870@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(22, 'user', 'user@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `subdistrict` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `post_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `user_id`, `full_name`, `number`, `address`, `subdistrict`, `city`, `province`, `country`, `post_code`) VALUES
(5, 18, 'haikal', '085716609656', 'jl palasari', 'pamulang', 'tangerang', 'banten', 'Indonesia', 15820),
(6, 19, 'ica', '085628638153', 'Jl wisma mas 2', 'Pasar kemis', 'Tangerang', 'Banten', 'Indonesia', 15277),
(7, 20, 'vina', '087382162312', 'jl gtw', 'Serpong', 'Tangerang', 'Banten', 'Indonesia', 15820),
(8, 21, 'riri komalasari', '085716609656', 'jl palasari', 'Legok', 'tangerang', 'Banten', 'Indonesia', 15820);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
