-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2024 at 01:48 AM
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
-- Database: `sierra`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_description` text DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `product_image_1` varchar(255) DEFAULT NULL,
  `product_image_2` varchar(255) DEFAULT NULL,
  `product_image_3` varchar(255) DEFAULT NULL,
  `product_image_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `product_price`, `product_stock`, `product_description`, `size`, `color`, `product_image_1`, `product_image_2`, `product_image_3`, `product_image_4`, `created_at`) VALUES
(9, 'ADIDAS BASKETBALL LONG SLEEVE TEE', 'Men', 8000.00, 20, 'Model wearing - L\r\nModel height - 6ft.', 'XS,S', 'Red,Green', 'uploads/men1.png', NULL, NULL, NULL, '2024-09-20 10:49:33'),
(10, 'Casual Wear Printed Cuban Collar Shirt', 'Men', 3000.00, 10, 'Casual Wear Printed Cuban Collar Shirt\r\n\r\nMade of Printed Viscose\r\nColors may slightly vary from the picture', 'XS', 'Green', 'uploads/product2.png', NULL, NULL, NULL, '2024-09-20 10:50:44'),
(11, 'Button Down Long Sleeve Top', 'Women', 5000.00, 30, 'Wash & Care -Wash dark colors separately.\r\n\r\nFabric Composition -åÊ 100%Polyester \r\n\r\nAbout the Model\r\nModel Wears - size8\r\nHeight - 5.5\"', 'XS,S', 'Red,Green', 'uploads/women1.png', NULL, NULL, NULL, '2024-09-20 10:52:25'),
(12, 'Front Tieup Detail Mini Dress', 'Women', 7000.00, 30, 'Wash & Care -Wash dark colors separately.\r\n\r\nFabric Composition -åÊ 100%Rayon\r\n\r\nAbout the Model\r\nModel Wears - size8', 'XS,S', 'Red,Green', 'uploads/women4.png', NULL, NULL, NULL, '2024-09-20 10:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'laksitha', 'laki@gmail.com', '$2y$10$NMBF8rcGHEAZG.Vbz7aFZ.XlnW3.gr6rEAH13aa9IzyRm3QtST5gG', 'user'),
(41, 'Gamage Hirusha Laksitha Gamage', 'ni@gmail.com', '$2y$10$FmR2tqFz8mx1txxlCMu5f.cWNmSrB5/YaY3p/LlZ8I3DayfBR0Fqy', 'user'),
(42, 'Bim ', 'bim@gmail.com', '$2y$10$W7ldqYqY0jFiWAjqX2mKHemun0ojIbV7Wb67tVDMTxZweB3xI25Lm', 'admin'),
(43, 'hirusha', 'hiru@gmail.com', '$2y$10$S4116Eu6pKeGGwqX.iZU3e7ysCW55esYwjumgc/z1d4Eh5uyUTcBa', 'admin'),
(48, 'lakidu', 'lakidu@gmail.com', '$2y$10$WbJjgkjfTgLtWePhdZobheNAczBwgPuP62BDtw3DimmaIwWS5BPDK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
