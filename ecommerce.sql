-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 01:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`) VALUES
(1, 'Electronics', 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(11) UNSIGNED NOT NULL,
  `county_code` varchar(10) NOT NULL,
  `county` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county_code`, `county`, `slug`) VALUES
(1, '001', 'Mombasa', 'mombasa'),
(2, '021', 'Murang\'a', 'muranga'),
(3, '020', 'Kirinyaga', 'kirinyaga'),
(4, '002', 'Kwale', 'kwale'),
(5, '003', 'Kilifi', 'kilifi'),
(6, '004', 'Tana River', 'tana-river'),
(7, '005', 'Lamu', 'lamu'),
(8, '006', 'Taita-Taveta', 'taita-taveta'),
(9, '007', 'Garissa', 'garissa'),
(10, '008', 'Wajir', 'wajir'),
(11, '009', 'Mandera', 'mandera'),
(12, '010', 'Marsabit', 'marsabit'),
(13, '011', 'Isiolo', 'isiolo'),
(14, '012', 'Meru', 'meru'),
(15, '013', 'Tharaka-Nithi', 'tharaka-nithi'),
(16, '014', 'Embu', 'embu'),
(17, '015', 'Kitui', 'kitui'),
(18, '016', 'Machakos', 'machakos'),
(19, '017', 'Makueni', 'makueni'),
(20, '018', 'Nyandarua', 'nyandarua'),
(21, '019', 'Nyeri', 'nyeri'),
(22, '022', 'Kiambu', 'kiambu'),
(23, '023', 'Turkana', 'turkana'),
(24, '024', 'West Pokot', 'west-pokot'),
(25, '025', 'Samburu', 'samburu'),
(26, '026', 'Trans Nzoia', 'trans-nzoia'),
(27, '027', 'Uasin Gishu', 'uasin-gishu'),
(28, '028', 'Elgeyo-Marakwet', 'elgeyo-marakwet'),
(29, '029', 'Nandi', 'nandi'),
(30, '030', 'Baringo', 'baringo'),
(31, '031', 'Laikipia', 'laikipia'),
(32, '032', 'Nakuru', 'nakuru'),
(33, '033', 'Narok', 'narok'),
(34, '034', 'Kajiado', 'kajiado'),
(35, '035', 'Kericho', 'kericho'),
(36, '036', 'Bomet', 'bomet'),
(37, '037', 'Kakamega', 'kakamega'),
(38, '038', 'Vihiga', 'vihiga'),
(39, '039', 'Bungoma', 'bungoma'),
(40, '040', 'Busia', 'busia'),
(41, '041', 'Siaya', 'siaya'),
(42, '042', 'Kisumu', 'kisumu'),
(43, '043', 'Homa Bay', 'homa-bay'),
(44, '044', 'Migori', 'migori'),
(45, '045', 'Kisii', 'kisii'),
(46, '046', 'Nyamira', 'nyamira'),
(47, '047', 'Nairobi', 'nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'customer', 'Customer'),
(3, 'vendor', 'Vendor\'s Dashboard'),
(4, 'wholesaler', 'Wholesale Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `field` varchar(128) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `field`, `value`) VALUES
(1, 'site-logo', NULL),
(2, 'name-of-store', 'eCommerce'),
(3, 'phone-number', '+254700000000'),
(4, 'email-address', 'info@ecommerce.com'),
(5, 'location', NULL),
(6, 'site-icon', NULL),
(7, 'currency', 'KES');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `orders` text NOT NULL,
  `total_orders` varchar(20) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `postal_code` varchar(128) NOT NULL,
  `subcounty` varchar(128) NOT NULL,
  `county` varchar(128) NOT NULL,
  `method_of_payment` varchar(128) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL,
  `slug` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_id`, `orders`, `total_orders`, `first_name`, `last_name`, `email`, `phone`, `address`, `postal_code`, `subcounty`, `county`, `method_of_payment`, `status`, `slug`) VALUES
(1, 2, 1560242523, '{\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":1,\"price\":65000,\"name\":\"Fridge\",\"image\":\"fridge_1.jpg\",\"slug\":\"fridge\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":65000}}', '65000', 'Desmond', 'Njuguna', 'desmondnjuguna.m@gmail.com', '0704502454', '219 Sabasaba', '01020', 'Kiambu', 'Kiambu', 'Cash on Delivery', 0, '1560242523'),
(2, 2, 1560850556, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":1,\"price\":10000,\"name\":\"Ukitel\",\"image\":\"c12_phone.jpg\",\"slug\":\"ukitel\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":10000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":1,\"price\":40000,\"name\":\"Hisense\",\"image\":\"hisense_431.jpg\",\"slug\":\"hisense\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":40000}}', '50000', 'Desmond', 'Njuguna', 'desmondnjuguna.m@gmail.com', '0704502454', '219 Sabasaba', '01020', 'Kiambu', 'Kiambu', 'Cash on Delivery', 0, '1560850556');

-- --------------------------------------------------------

--
-- Table structure for table `pd_tags`
--

CREATE TABLE `pd_tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `snippet` varchar(128) DEFAULT NULL,
  `categories` text NOT NULL,
  `tags` text NOT NULL,
  `colors` text,
  `sizes` text,
  `regular_price` varchar(128) NOT NULL,
  `sale_price` varchar(128) NOT NULL,
  `wholesale_price` varchar(128) NOT NULL,
  `date_created` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `available_from` int(11) UNSIGNED DEFAULT NULL,
  `available_to` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `snippet`, `categories`, `tags`, `colors`, `sizes`, `regular_price`, `sale_price`, `wholesale_price`, `date_created`, `slug`, `available_from`, `available_to`, `status`) VALUES
(1, 'fridge_1.jpg', 'Fridge', '<p>Fridge</p>', 'Fridge', '[\"Electronics\",\"Fridges\"]', '[\"Fridge\"]', '[\"\"]', '[\"\"]', '67000', '65000', '63000', 1559400289, 'fridge', NULL, NULL, 1),
(2, 'c12_phone.jpg', 'Ukitel', '<p>6.0\" display</p>', 'Phone', '[\"Electronics\",\"Phones\"]', '[\"Phones\"]', '[\"\"]', '[\"\"]', '12000', '10000', '8500', 1559400519, 'ukitel', NULL, NULL, 1),
(4, 'infinix_smart_2.jpg', 'Infinix Smart 2', '<p>5.5\"</p>', 'Phone', '[\"Electronics\",\"Phones\"]', '[\"Phone\"]', '[\"\"]', '[\"\"]', '15000', '13000', '10000', 1559400769, 'infinix-smart-2', NULL, NULL, 1),
(5, 'hisense_431.jpg', 'Hisense', '<p>43\"</p>', 'Television', '[\"Electronics\",\"Televisions\"]', '[\"Television\"]', '[\"\"]', '[\"\"]', '43000', '40000', '38000', 1559400872, 'hisense', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `review` text NOT NULL,
  `date_created` int(11) UNSIGNED NOT NULL,
  `ratings` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `review`, `date_created`, `ratings`) VALUES
(1, 1, 'Desmond', 'desmondnjuguna.m@gmail.com', 'ha', 1560849502, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `id` int(11) UNSIGNED NOT NULL,
  `ship_to` varchar(128) NOT NULL,
  `fee` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `ship_to`, `fee`, `slug`) VALUES
(1, 'Kiambu', 200, 'kiambu');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) UNSIGNED NOT NULL,
  `subcategory` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory`, `category`, `slug`) VALUES
(1, 'Fridges', 'Electronics', 'fridges'),
(2, 'Televisions', 'Electronics', 'televisions'),
(3, 'Phones', 'Electronics', 'phones'),
(4, 'Laptop', 'Electronics', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(2, '127.0.0.1', 'desmondnjuguna.m@gmail.com', '$2y$12$6uo1DefxPUFrubYBeUD55u/mm8LGZIIugmUdIvqwDyaHlAveiXu2y', 'desmondnjuguna.m@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1556364105, 1561707366, 1, 'Desmond', 'Njuguna', 'ReCode', '0704502454'),
(3, '127.0.0.1', 'morganwagachaki.m@gmail.com', '$2y$10$jT6Y5KXXdBgB9QNdPVoRZu/T5RWqucAVgDi8Kuuc05gvfMQAZfM6q', 'morganwagachaki.m@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1560858486, 1561716241, 1, 'Morgan', 'Wagachaki', NULL, '0706243406'),
(4, '127.0.0.1', 'lennywainaina.m@gmail.com', '$2y$10$UJ1kIFVyNUf8f.jvbn4wbeJXCLJJ3Ckhm4Z4tk54snRGwGVmM0wG6', 'lennywainaina.m@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1561539193, 1561718468, 1, 'Lenny', 'Wainaina', 'ReCode', '0771045082');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(9, 2, 1),
(6, 3, 2),
(8, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field` (`field`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`) USING BTREE;

--
-- Indexes for table `pd_tags`
--
ALTER TABLE `pd_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pd_tags`
--
ALTER TABLE `pd_tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
