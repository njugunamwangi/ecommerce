-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2019 at 07:26 PM
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
(1, 'Electronics', 'electronics'),
(2, 'Household', 'household');

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
(2, 'name-of-store', 'e-Commerce'),
(3, 'phone-number', '+254700000009'),
(4, 'email-address', 'info@ecommerce.com'),
(5, 'location', NULL),
(6, 'site-icon', NULL),
(7, 'currency', 'KES');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(20) UNSIGNED NOT NULL,
  `customer_id` int(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `ip_address`, `time`) VALUES
(1, 7, '127.0.0.1', 1563556667),
(2, 7, '127.0.0.1', 1563556778),
(3, 8, '127.0.0.1', 1563556892),
(4, 9, '127.0.0.1', 1563557057);

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
  `vendor_id` int(11) UNSIGNED NOT NULL,
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
  `date_updated` int(11) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `available_from` int(11) UNSIGNED DEFAULT NULL,
  `available_to` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `image`, `name`, `description`, `snippet`, `categories`, `tags`, `colors`, `sizes`, `regular_price`, `sale_price`, `wholesale_price`, `date_created`, `date_updated`, `slug`, `available_from`, `available_to`, `status`) VALUES
(1, 1556364105, 'fridge_1.jpg', 'Fridge', '<p>2 door</p>', 'Fridge', '[\"Electronics\",\"Fridges\"]', '[\"electronics, Fridges, Samsung Fridges\"]', '[\"\"]', '[\"\"]', '67000', '65000', '63000', 1559400289, 1563193054, 'fridge', NULL, NULL, 1),
(2, 1556364105, 'c12_phone.jpg', 'Ukitel', '<p>6.0\" display</p>', 'Phone', '[\"Electronics\",\"Phones\"]', '[\"Phones\"]', '[\"\"]', '[\"\"]', '12000', '10000', '8500', 1559400519, NULL, 'ukitel', NULL, NULL, 1),
(4, 1556364105, 'infinix_smart_2.jpg', 'Infinix Smart 2', '<p>5.5\"</p>', 'Phone', '[\"Electronics\",\"Phones\"]', '[\"Phone\"]', '[\"\"]', '[\"\"]', '15000', '13000', '10000', 1559400769, NULL, 'infinix-smart-2', NULL, NULL, 1),
(5, 1556364105, 'hisense_431.jpg', 'Hisense', '<p>43\"</p>', 'Television', '[\"Electronics\",\"Televisions\"]', '[\"Television\"]', '[\"\"]', '[\"\"]', '43000', '40000', '38000', 1559400872, NULL, 'hisense', NULL, NULL, 1),
(6, 1556364105, 'Ezee-Trolley1.gif', 'Kenpoly Ezee Trolley', '<p>4 stack trolley</p>\r\n\r\n<p>4 stands </p>', 'trolley', '[\"Household\",\"Trolley\"]', '[\"Household, Kenpoly, Trolley, Ezee trolley\"]', '[\"Blue, brown, orange, pink\"]', '[\"\"]', '650', '550', '450', 1562928262, NULL, 'kenpoly-ezee-trolley', NULL, NULL, 1),
(7, 1560858486, 'Round-Trolley.gif', 'Kenpoly Round Trolley', '<p>3-4 stack</p>\r\n\r\n<p>4 stands</p>', 'Round Trolley', '[\"Household\",\"Trolley\"]', '[\"Household, Kenpoly, Trolley, Round Trolley\"]', '[\"Blue. Brown, Pink\"]', '[\"\"]', '600', '550', '450', 1563120049, NULL, 'kenpoly-round-trolley', NULL, NULL, 1),
(8, 1556364105, 'Chair-2014.gif', 'Kenpoly Chair 2014', '<p>Chair with arms</p>', 'Chair', '[\"Household\",\"Chairs\"]', '[\"Kenpoly, Chair, Household\"]', '[\"Blue, Green, Yellow, Brown\"]', '[\"\"]', '700', '650', '550', 1563543201, NULL, 'kenpoly-chair-2014', NULL, NULL, 1),
(9, 1556364105, 'Chair-2032-without-arms1.gif', 'Kenpoly Chair 2032', '<p>Armless Chair</p>', 'Armless Chair', '[\"Household\",\"Chairs\"]', '[\"Household, Kenpoly, Chairs, Armless Chair\"]', '[\"Blue, Brown\"]', '[\"\"]', '750', '700', '600', 1563543585, NULL, 'kenpoly-chair-2032', NULL, NULL, 1),
(10, 1556364105, 'Frosty-No-5.gif', 'Kenpoly Frosty Bucket', '<p>Bucket with lid</p>', 'Frosty Bucket', '[\"Household\",\"Buckets\"]', '[\"Household, Kenpoly, buckets, Frosty Bucket\"]', '[\"Purple\"]', '[\"\"]', '500', '400', '350', 1563555365, NULL, 'kenpoly-frosty-bucket', NULL, NULL, 1);

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
  `ratings` float(10,2) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'Laptop', 'Electronics', 'laptop'),
(5, 'Trolley', 'Household', 'trolley'),
(6, 'Chairs', 'Household', 'chairs'),
(7, 'Buckets', 'Household', 'buckets');

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
(7, '127.0.0.1', 'testaccount1@gmail.com', '$2y$12$a6sETxL3wsaFN3ThdalIwOmE6ml9S7Dznz0oPHLBbqRj0iixWihhu', 'testaccount1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556647, 1563556778, 1, 'Test', 'Account 1', NULL, '0700010203'),
(8, '127.0.0.1', 'testaccount2@gmail.com', '$2y$10$cWKnrV1lhSSJFQKV02G5Re9IgaKo7EIu7q7BBpQWjKJnS512g6vk.', 'testaccount2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556838, 1563556892, 1, 'Test', 'Account 2', NULL, '0700020202'),
(9, '127.0.0.1', 'testaccount3@gmail.com', '$2y$10$2axejRFIvN2PsFZZ.M8LxesZLcoK9GWk4495CMPgBmGMckI0LEKO6', 'testaccount3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557036, 1563557057, 1, 'Test', 'Account 3', NULL, '0703030303'),
(10, '127.0.0.1', 'testaccount4@gmail.com', '$2y$10$EvTTrf91Mx6KCF6OE96GYezAdLLVpsRnYOr0ZYmTcClowu99IRjgu', 'testaccount4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557142, NULL, 1, 'Test', 'Account 4', NULL, '0704040404');

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
(13, 7, 1),
(14, 8, 2),
(15, 9, 3),
(16, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `wishlist_code` int(11) UNSIGNED NOT NULL,
  `time` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `wishlist_code`, `time`) VALUES
(15, 6, 1, 61, 1562748994),
(17, 2, 6, 26, 1562928296),
(18, 3, 1, 31, 1563004819),
(19, 4, 1, 41, 1563095242),
(20, 4, 6, 46, 1563095246),
(21, 2, 7, 27, 1563121269),
(22, 2, 4, 24, 1563193439),
(23, 3, 4, 34, 1563434054),
(24, 3, 2, 32, 1563542916);

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
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pd_tags`
--
ALTER TABLE `pd_tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
