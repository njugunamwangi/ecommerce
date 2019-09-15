-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 10:14 AM
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
  `parent_category` varchar(128) DEFAULT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent_category`, `slug`) VALUES
(1, 'Shoes', '', 'shoes'),
(2, 'Adidas', 'Shoes', 'adidas'),
(3, 'Adidas Shark', 'Adidas', 'adidas-shark'),
(4, 'Nike', 'Shoes', 'nike'),
(5, 'Air Max 97', 'Nike', 'air-max-97'),
(6, 'Air Max 90', 'Nike', 'air-max-90'),
(7, 'Air Force TM', 'Nike', 'air-force-tm'),
(8, 'Air Force Utility', 'Nike', 'air-force-utility'),
(9, 'Household', '', 'household'),
(10, 'Chairs', 'Household', 'chairs'),
(11, 'Buckets', 'Household', 'buckets'),
(12, 'Smartphones', '', 'smartphones'),
(13, 'Android', 'Smartphones', 'android'),
(14, 'iOS', 'Smartphones', 'ios'),
(15, 'Samsung', 'Android', 'samsung'),
(16, 'Tecno', 'Android', 'tecno'),
(17, 'Nokia', 'Android', 'nokia'),
(18, 'iPhones', 'iOS', 'iphones'),
(19, 'Fila', 'Shoes', 'fila'),
(20, 'Disruptor II', 'Fila', 'disruptor-ii'),
(21, 'Pharrel William NMD Human Race', 'Adidas', 'pharrel-william-nmd-human-race'),
(22, 'Gender', '', 'gender'),
(23, 'Male', 'Gender', 'male'),
(24, 'Female', 'Gender', 'female'),
(25, 'Unisex', 'Gender', 'unisex'),
(26, 'Age', '', 'age'),
(27, 'Kids', 'Age', 'kids'),
(28, 'Youths', 'Age', 'youths'),
(29, 'Adults', 'Age', 'adults'),
(30, 'Huarache', 'Nike', 'huarache'),
(31, 'Vans', 'Shoes', 'vans'),
(32, 'Fear of God', 'Vans', 'fear-of-god'),
(33, 'Off the Wall', 'Vans', 'off-the-wall'),
(34, 'VaporMax', 'Nike', 'vapormax'),
(35, 'Just Do It', 'Nike', 'just-do-it');

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
(3, 'phone-number', '+254700000019'),
(4, 'email-address', 'info@ecommerce.com'),
(5, 'location', '<p><em><strong>Emma Daniel Plot No 20201,</strong></em></p>\r\n\r\n<p><em><strong>Thika Road.</strong></em></p>\r\n\r\n<p><em><strong>P.O. Box 455-00232, </strong></em></p>\r\n\r\n<p><em><strong>Ruiru.</strong></em></p>\r\n'),
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
(4, 9, '127.0.0.1', 1563557057),
(5, 7, '127.0.0.1', 1563559234),
(6, 7, '127.0.0.1', 1563559312),
(7, 7, '127.0.0.1', 1563566832),
(8, 7, '127.0.0.1', 1563609866),
(9, 7, '127.0.0.1', 1563711529),
(10, 7, '127.0.0.1', 1563723200),
(11, 7, '127.0.0.1', 1564073389),
(12, 7, '127.0.0.1', 1564396142),
(13, 7, '127.0.0.1', 1564474878),
(14, 7, '127.0.0.1', 1564559550),
(15, 7, '127.0.0.1', 1564570715),
(16, 7, '127.0.0.1', 1564600398),
(17, 8, '127.0.0.1', 1564601154),
(18, 8, '127.0.0.1', 1564601357),
(19, 8, '127.0.0.1', 1564601493),
(20, 8, '127.0.0.1', 1564603247),
(21, 7, '127.0.0.1', 1564606484),
(22, 7, '127.0.0.1', 1564606620),
(23, 8, '127.0.0.1', 1564645501),
(24, 8, '127.0.0.1', 1564660155),
(25, 7, '127.0.0.1', 1564660218),
(26, 7, '127.0.0.1', 1564696540),
(27, 7, '127.0.0.1', 1564728374),
(28, 7, '127.0.0.1', 1564759032),
(29, 7, '127.0.0.1', 1564820225),
(30, 7, '127.0.0.1', 1564872336),
(31, 7, '127.0.0.1', 1564872368),
(32, 7, '127.0.0.1', 1564990334),
(33, 7, '127.0.0.1', 1565021454),
(34, 7, '127.0.0.1', 1565078905),
(35, 7, '127.0.0.1', 1565292202),
(36, 7, '127.0.0.1', 1565928457),
(37, 7, '127.0.0.1', 1565984914),
(38, 7, '127.0.0.1', 1565985152),
(39, 7, '127.0.0.1', 1566167887),
(40, 7, '127.0.0.1', 1566214878),
(41, 7, '127.0.0.1', 1566281564),
(42, 7, '127.0.0.1', 1566308180),
(43, 9, '127.0.0.1', 1566308978),
(44, 7, '127.0.0.1', 1566309493),
(45, 7, '127.0.0.1', 1566366786),
(46, 7, '127.0.0.1', 1566396409),
(47, 7, '127.0.0.1', 1566457154),
(48, 7, '127.0.0.1', 1566539103),
(49, 7, '127.0.0.1', 1566730883),
(50, 7, '127.0.0.1', 1566744611),
(51, 10, '127.0.0.1', 1566745742),
(52, 7, '127.0.0.1', 1566745826),
(53, 7, '127.0.0.1', 1566825703),
(54, 7, '127.0.0.1', 1567163181),
(55, 9, '127.0.0.1', 1567362240),
(56, 7, '127.0.0.1', 1567408351);

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
(1, 7, 1566284078, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":5,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":37500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":4,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":30000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":3,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":16500},\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":2,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":16000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":3000,\"name\":\"Vans Fear of God\",\"image\":\"IMG_20190525_105717.jpg\",\"slug\":\"vans-fear-of-god\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":3000}}', '103000', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '77 Kenol', '01020', 'Kiambu', 'Kiambu', 'Cash on Delivery', 1, '1566284078'),
(2, 7, 1566284175, '{\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":5,\"vendor_id\":\"1563556647\",\"price\":3000,\"name\":\"Vans Fear of God\",\"image\":\"IMG_20190525_105717.jpg\",\"slug\":\"vans-fear-of-god\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":15000},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":7500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":2,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":15000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":3,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":16500},\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":4,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":32000}}', '86000', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '455', '00232', 'Nairobi', 'Nairobi', 'Cheque Deposit', 2, '1566284175'),
(3, 9, 1566309387, '{\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":3,\"vendor_id\":\"1563557036\",\"price\":8500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":25500},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":5500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":7500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":7500},\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":8000}}', '54000', 'Test', 'Account 3', 'testaccount3@gmail.com', '0703030303', '77 Kenol', '00232', 'Nairobi', 'Nairobi', 'Cheque Deposit', 3, '1566309387'),
(5, 10, 1566310513, '{\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":13,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":97500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":15,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":112500},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":10,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":55000}}', '265000', 'Test', 'Account 4', 'testaccount4@gmail.com', '0704040404', '455', '00232', 'Nairobi', 'Nairobi', 'Cheque Deposit', 4, '1566310513'),
(6, 10, 1566480552, '{\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":8000},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":7500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":7,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":52500}}', '68000', 'Test', 'Account 4', 'testaccount4@gmail.com', '0704040404', '455', '00232', 'Nairobi', 'Nairobi', 'Cheque Deposit', 0, '1566480552'),
(7, 10, 1566745801, '{\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":5,\"vendor_id\":\"1563556647\",\"price\":6500,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":32500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":5,\"vendor_id\":\"1563556647\",\"price\":6500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":32500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":5,\"vendor_id\":\"1563556647\",\"price\":6500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":32500},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":5,\"vendor_id\":\"1563556647\",\"price\":4500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":22500},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":5,\"vendor_id\":\"1563557036\",\"price\":7500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":37500}}', '157500', 'Test', 'Account 4', 'testaccount4@gmail.com', '0704040404', '455', '00232', 'Nairobi', 'Nairobi', 'Cheque Deposit', 0, '1566745801'),
(8, 7, 1566826005, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":9,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":67500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":6,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":45000},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":8,\"vendor_id\":\"1563557036\",\"price\":8500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":68000}}', '180500', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '455', '00232', 'Kiambu', 'Kiambu', 'Cash on Delivery', 0, '1566826005'),
(9, 8, 1566826429, '{\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":10,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":75000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":14,\"vendor_id\":\"1563556647\",\"price\":3000,\"name\":\"Vans Fear of God\",\"image\":\"IMG_20190525_105717.jpg\",\"slug\":\"vans-fear-of-god\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":42000}}', '117000', 'Test', 'Account 2', 'testaccount2@gmail.com', '0700020202', '455', '01020', 'Kiambu', 'Kiambu', 'Cheque Deposit', 0, '1566826429');

-- --------------------------------------------------------

--
-- Table structure for table `orders_summary`
--

CREATE TABLE `orders_summary` (
  `id` int(20) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(4) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED NOT NULL,
  `qty` int(20) UNSIGNED NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `subtotal` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_summary`
--

INSERT INTO `orders_summary` (`id`, `order_id`, `customer_id`, `product_id`, `vendor_id`, `qty`, `price`, `subtotal`) VALUES
(1, 0, 7, 2, 1563556647, 5, 7500, 37500),
(2, 0, 7, 1, 1563556647, 4, 7500, 30000),
(3, 0, 7, 5, 1563556647, 3, 5500, 16500),
(4, 0, 7, 3, 1563556647, 2, 8000, 16000),
(5, 0, 7, 4, 1563556647, 1, 3000, 3000),
(6, 0, 7, 4, 1563556647, 5, 3000, 15000),
(7, 0, 7, 2, 1563556647, 1, 7500, 7500),
(8, 0, 7, 1, 1563556647, 2, 7500, 15000),
(9, 0, 7, 5, 1563556647, 3, 5500, 16500),
(10, 0, 7, 3, 1563556647, 4, 8000, 32000),
(11, 0, 9, 6, 1563557036, 3, 8500, 25500),
(12, 0, 9, 5, 1563556647, 1, 5500, 5500),
(13, 0, 9, 1, 1563556647, 1, 7500, 7500),
(14, 0, 9, 2, 1563556647, 1, 7500, 7500),
(15, 0, 9, 3, 1563556647, 1, 8000, 8000),
(16, 0, 10, 1, 1563556647, 13, 7500, 97500),
(17, 0, 10, 2, 1563556647, 15, 7500, 112500),
(18, 0, 10, 5, 1563556647, 10, 5500, 55000),
(19, 0, 10, 3, 1563556647, 1, 8000, 8000),
(20, 0, 10, 1, 1563556647, 1, 7500, 7500),
(21, 0, 10, 2, 1563556647, 7, 7500, 52500),
(22, 0, 10, 3, 1563556647, 5, 6500, 32500),
(23, 0, 10, 2, 1563556647, 5, 6500, 32500),
(24, 0, 10, 1, 1563556647, 5, 6500, 32500),
(25, 0, 10, 5, 1563556647, 5, 4500, 22500),
(26, 0, 10, 6, 1563557036, 5, 7500, 37500),
(27, 8, 7, 2, 1563556647, 9, 7500, 67500),
(28, 8, 7, 1, 1563556647, 6, 7500, 45000),
(29, 8, 7, 6, 1563557036, 8, 8500, 68000),
(30, 9, 8, 1, 1563556647, 10, 7500, 75000),
(31, 9, 8, 4, 1563556647, 14, 3000, 42000);

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
(1, 1563556647, 'IMG_20190525_094149.jpg', 'Adidas Shark', '<p>Shark</p>', 'Adidas', '[\"Shoes\",\"Adidas\",\"Adidas Shark\"]', '[\"Adidas\"]', '[\"Red\"]', '[\"40, 41, 42, 43, 44, 45\"]', '8000', '7500', '6500', 1563568500, NULL, 'adidas-shark', NULL, NULL, 1),
(2, 1563556647, 'IMG_20190525_103358.jpg', 'Adidas Pharrel William', '<p>Pharrel William NMD Human Race</p>', 'Adidas Pharrel William NMD Human Race', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Adidas\",\"Pharrel William NMD Human Race\"]', '[\"Adidas, NMD, Human Race, Pharrel Williams\"]', '[\"Yellow, Black, Purple\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '9000', '7500', '6500', 1563570987, NULL, 'adidas-pharrel-william', NULL, NULL, 1),
(3, 1563556647, 'IMG_20190525_094252.jpg', 'Nike VaporMax', '<p>VaporMax</p>', 'VaporMax', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Nike\",\"VaporMax\"]', '[\"Nike, VaporMax\"]', '[\"Black, Yellow, Luminous Green\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '9000', '8000', '6500', 1563610642, NULL, 'nike-vapormax', NULL, NULL, 1),
(4, 1563556647, 'IMG_20190525_105717.jpg', 'Vans Fear of God', '<p>Vans</p>', 'Fear of God', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Vans\",\"Fear of God\"]', '[\"Vans, Fear of God\"]', '[\"Black and White\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '4500', '3000', '2000', 1563612405, NULL, 'vans-fear-of-god', NULL, NULL, 1),
(5, 1563556647, 'IMG_20190525_100403.jpg', 'Nike Just Do It', '<p>Airforce</p>', 'Airforce Just Do It', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Nike\",\"Just Do It\"]', '[\"Nike, Just Do It, Air Force\"]', '[\"White, Orange, Luminous Green\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '6000', '5500', '4500', 1563613026, NULL, 'nike-just-do-it', NULL, NULL, 1),
(6, 1563557036, 'IMG_20190525_093441.jpg', 'Nike Utility', '<p>Nike</p>', 'Nike Air Force', '[\"Shoes\",\"Nike\",\"Air Force Utility\"]', '[\"Nike, Nike Utility, Utility\"]', '[\"Jungle Green, Matte Black, Sky Blue\"]', '[\"36,37,38,39,40,41,42,43,44,45\"]', '9000', '8500', '7500', 1566309307, NULL, 'nike-utility', NULL, NULL, 1);

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `review`, `date_created`, `ratings`, `status`) VALUES
(1, 2, 'Test', 'testaccount1@gmail.com', 'delivered as ordered', 1566378443, 5.00, 1),
(2, 2, 'Test', 'testaccount1@gmail.com', 'got a different shoe', 1566378463, 0.50, 0);

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
(1, 'Kiambu', 200, 'kiambu'),
(2, 'Nairobi', 100, 'nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, '127.0.0.1', 'testaccount1@gmail.com', '$2y$12$a6sETxL3wsaFN3ThdalIwOmE6ml9S7Dznz0oPHLBbqRj0iixWihhu', 'testaccount1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556647, 1567408351, 1, 'Test', 'Account 1', NULL, '0700010203'),
(8, '127.0.0.1', 'testaccount2@gmail.com', '$2y$10$cWKnrV1lhSSJFQKV02G5Re9IgaKo7EIu7q7BBpQWjKJnS512g6vk.', 'testaccount2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556838, 1564660155, 1, 'Test', 'Account 2', NULL, '0700020202'),
(9, '127.0.0.1', 'testaccount3@gmail.com', '$2y$10$2axejRFIvN2PsFZZ.M8LxesZLcoK9GWk4495CMPgBmGMckI0LEKO6', 'testaccount3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557036, 1567362240, 1, 'Test', 'Account 3', NULL, '0703030303'),
(10, '127.0.0.1', 'testaccount4@gmail.com', '$2y$10$EvTTrf91Mx6KCF6OE96GYezAdLLVpsRnYOr0ZYmTcClowu99IRjgu', 'testaccount4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557142, 1566745742, 1, 'Test', 'Account 4', NULL, '0704040404');

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
(11, 7, 6, 76, 1566457311),
(12, 7, 2, 72, 1566457315),
(13, 7, 5, 75, 1566831881);

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
-- Indexes for table `orders_summary`
--
ALTER TABLE `orders_summary`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders_summary`
--
ALTER TABLE `orders_summary`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
