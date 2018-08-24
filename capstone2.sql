-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 10:37 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Apparels'),
(2, 'Collectibles'),
(3, 'Gaming'),
(4, 'Accessories'),
(5, 'The International');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `list_price` decimal(13,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `list_price`, `image`, `sub_category_id`) VALUES
(1, 'The International Zipper Hoodie', 'Exclusive Ti8 Hoodie', '1500.00', '2500.00', '/capstone2/img/products/prod1.jpg', 18),
(2, 'Dota 2 Logo Shirt', 'Dota 2 Blue Logo Shirt', '500.00', '1000.00', '/capstone2/img/products/prod2.jpg', 1),
(3, 'Metal Logo Cap Black Hat', 'Customized Black Hat', '1000.00', '1300.00', '/capstone2/img/products/prod3.jpg', 4),
(4, 'Invoker Hoodie', 'Customized Invoker Hoodie', '1500.00', '2500.00', '/capstone2/img/products/prod4.jpg', 3),
(5, 'Natus Vincere Hoodie', 'Na\'vi Team Hoodie', '1500.00', '2500.00', '/capstone2/img/products/prod5.jpg', 18),
(6, 'Team Liquid Hoodie', 'Exclusive Team Liquid Hoodie', '1500.00', '2500.00', '/capstone2/img/products/prod6.jpg', 18),
(7, 'Virtus.Pro Hoodie', 'Exclusive VP Hoodie', '1500.00', '2500.00', '/capstone2/img/products/prod7.jpg', 18),
(8, 'Team Secret Hoodie', 'Exclusive Team Secret Hoodie', '1500.00', '2500.00', '/capstone2/img/products/prod8.jpg', 18),
(9, 'Axe T-Shirt', 'Printed Axe Image Shirt', '500.00', '1000.00', '/capstone2/img/products/prod9.jpg', 1),
(10, 'Juggernaut Shirt', 'T-Shirt with Juggernaut Image Print', '500.00', '1000.00', '/capston2/img/products/prod10.jpg', 1),
(11, 'Team Liquid Pants', 'Exclusive Team Liquid Pants', '1000.00', '1500.00', '/capstone2/img/products/prod11.jpg', 2),
(12, 'Natus Vincere Pants', 'Exclusive Navi Pants', '1000.00', '1500.00', '/capstone2/img/products/prod12.jpg', 2),
(13, 'Nevermore Gray Jacket', 'Exclusive Nevermore Jacket', '1500.00', '2500.00', '/capstone2/img/products/prod13.jpg', 3),
(14, 'Dota 2 Backpack', 'Classic Black Dota 2 Logo Bag', '2000.00', '2500.00', '/capstone2/img/products/prod14.jpg', 5),
(15, 'Pudge Drawstring Bag', 'Exclusive Pudge Drawstring Bag', '1800.00', '2300.00', '/capstone2/img/products/prod15.jpg', 5),
(16, 'Drow Ranger Action Figure', 'Limited Drow Ranger Action Figure', '750.00', '1000.00', '/capstone2/img/product/prod16.jpg', 6),
(17, 'Roshan Action Figure', 'Limited Roshan Action Figure', '750.00', '1000.00', '/capstone2/img/product/prod17.jpg', 6),
(18, 'DOTA 2 Frosted Keypads', 'Exclusive Keypads', '1000.00', '1300.00', '/capstone2/img/products/prod18.jpg', 7),
(19, 'Rubick Mechanical Keypads', 'Limited Rubick Mechanical Keypads', '1500.00', '2000.00', '/capstone2/img/products/prod19.jpg', 7),
(20, 'Steelseries Dota Mechanical Keyboard', 'Limited Steelseries Dota Mechanical Keyboard', '3000.00', '4000.00', '/capstone2/img/products/prod20.jpg', 8),
(21, 'Steelseries Rival Dota 2 Edition', 'Limited Steelseries Rival Dota 2 Edition', '2000.00', '2500.00', '/capstone2/img/products/prod21.jpg', 9),
(22, 'Na\'vi Gaming Chair', 'Leather gaming chair.', '4000.00', '4500.00', '/capstone2/img/products/prod22.jpg', 10),
(23, 'Steelseries Siberia V2 DOTA 2 Edition', 'Limited Gaming Headset', '2500.00', '3000.00', '/capstone2/img/products/prod23.jpg', 11),
(24, 'Steelseries Arctic 5 DOTA 2 Edition', 'Limited Gaming Headset', '3000.00', '3500.00', '/capstone2/img/products/prod24.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`) VALUES
(1, 'Shirts', 1),
(2, 'Pants', 1),
(3, 'Hoodies & Jackets', 1),
(4, 'Caps', 1),
(5, 'Bags', 1),
(6, 'Action Figures', 2),
(7, 'Keycaps', 2),
(8, 'Keyboard', 3),
(9, 'Mouse', 3),
(10, 'Gaming Chairs', 3),
(11, 'Gaming Headsets', 3),
(12, 'Mousepad', 3),
(13, 'Keychains', 4),
(14, 'Ballers', 4),
(15, 'Tumblers', 4),
(16, 'Phone Cases', 4),
(17, 'Wallets', 4),
(18, 'Team Hoodies', 5),
(19, 'Team Shirts', 5),
(20, 'Aegis of the Immortal ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_fk0` (`sub_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_fk0` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_fk0` (`role_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_fk0` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
