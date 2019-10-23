-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 07:40 AM
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
(35, 'Just Do It', 'Nike', 'just-do-it'),
(36, 'Black Berry', 'Smartphones', 'black-berry'),
(37, 'Air Jordan', 'Nike', 'air-jordan'),
(38, 'Smiley Bucket', 'Buckets', 'smiley-bucket'),
(39, 'Dish Racks', 'Household', 'dish-racks'),
(40, 'Trolleys', 'Household', 'trolleys'),
(41, 'Ezee Trolley', 'Trolleys', 'ezee-trolley'),
(42, 'Round Trolley', 'Trolleys', 'round-trolley'),
(43, 'Triangle Trolley', 'Trolleys', 'triangle-trolley'),
(44, 'Basins', 'Household', 'basins');

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
(3, 'phone-number', '+254700000019'),
(4, 'email-address', 'info@e-commerce.com'),
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
(56, 7, '127.0.0.1', 1567408351),
(57, 7, '127.0.0.1', 1568536213),
(58, 7, '127.0.0.1', 1568698056),
(59, 7, '127.0.0.1', 1568700359),
(60, 7, '127.0.0.1', 1568710674),
(61, 7, '127.0.0.1', 1568784355),
(62, 7, '127.0.0.1', 1568805395),
(63, 7, '127.0.0.1', 1568960980),
(64, 12, '127.0.0.1', 1568990640),
(65, 7, '127.0.0.1', 1568990751),
(66, 7, '127.0.0.1', 1569046412),
(67, 7, '127.0.0.1', 1569501576),
(68, 11, '127.0.0.1', 1569503509),
(69, 7, '127.0.0.1', 1569503632),
(70, 11, '127.0.0.1', 1569566912),
(71, 7, '127.0.0.1', 1569566959),
(72, 7, '127.0.0.1', 1569585477),
(73, 12, '127.0.0.1', 1569586971),
(74, 7, '127.0.0.1', 1569587043),
(75, 7, '127.0.0.1', 1569757078),
(76, 7, '127.0.0.1', 1569776502),
(77, 7, '127.0.0.1', 1569905472),
(78, 7, '127.0.0.1', 1569942712),
(79, 7, '127.0.0.1', 1569959038),
(80, 7, '127.0.0.1', 1569997189),
(81, 7, '127.0.0.1', 1570079721),
(82, 7, '127.0.0.1', 1570101507),
(83, 7, '127.0.0.1', 1570127405),
(84, 7, '127.0.0.1', 1570174733),
(85, 7, '127.0.0.1', 1570194022),
(86, 7, '127.0.0.1', 1570259757),
(87, 7, '127.0.0.1', 1570343737),
(88, 7, '127.0.0.1', 1570525186),
(89, 7, '127.0.0.1', 1570606390),
(90, 7, '127.0.0.1', 1570626155),
(91, 9, '127.0.0.1', 1570626995),
(92, 7, '127.0.0.1', 1570627133),
(93, 7, '127.0.0.1', 1570689779),
(94, 7, '127.0.0.1', 1570709571),
(95, 9, '127.0.0.1', 1570959618),
(96, 7, '127.0.0.1', 1570959998),
(97, 7, '127.0.0.1', 1570961591),
(98, 7, '127.0.0.1', 1570961718),
(99, 13, '127.0.0.1', 1570962266),
(100, 13, '127.0.0.1', 1570962581),
(101, 13, '127.0.0.1', 1571053651),
(102, 9, '127.0.0.1', 1571053738),
(103, 7, '127.0.0.1', 1571053797),
(104, 10, '127.0.0.1', 1571053943),
(105, 7, '127.0.0.1', 1571054008),
(106, 7, '127.0.0.1', 1571062524),
(107, 7, '127.0.0.1', 1571145326),
(108, 7, '127.0.0.1', 1571293419),
(109, 7, '127.0.0.1', 1571319498),
(110, 9, '127.0.0.1', 1571320479),
(111, 7, '127.0.0.1', 1571321182),
(112, 7, '127.0.0.1', 1571340521),
(113, 7, '127.0.0.1', 1571378274),
(114, 7, '127.0.0.1', 1571429069),
(115, 7, '127.0.0.1', 1571492445),
(116, 7, '127.0.0.1', 1571550531),
(117, 7, '127.0.0.1', 1571565167),
(118, 7, '127.0.0.1', 1571639552),
(119, 7, '127.0.0.1', 1571744359),
(120, 7, '127.0.0.1', 1571759885);

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
(1, 7, 1569943058, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":7500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":7500},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":5500},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":1,\"vendor_id\":\"1563557036\",\"price\":8500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":8500},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":3000,\"name\":\"Vans Fear of God\",\"image\":\"IMG_20190525_105717.jpg\",\"slug\":\"vans-fear-of-god\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":3000},\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":8000}}', '40000', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '455', '00232', 'Kiambu', 'Kiambu', 'Cash on Delivery', 4, '1569943058'),
(2, 7, 1569943248, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":3,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":22500},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":2,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":15000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":3,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":16500},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":4,\"vendor_id\":\"1563557036\",\"price\":8500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":34000},\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":8000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":3000,\"name\":\"Vans Fear of God\",\"image\":\"IMG_20190525_105717.jpg\",\"slug\":\"vans-fear-of-god\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":3000}}', '99000', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '455', '00232', 'Kiambu', 'Kiambu', 'Cheque Deposit', 1, '1569943248'),
(3, 9, 1569943545, '{\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":10,\"vendor_id\":\"1563556647\",\"price\":5500,\"name\":\"Nike Just Do It\",\"image\":\"IMG_20190525_100403.jpg\",\"slug\":\"nike-just-do-it\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":55000},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":12,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":90000}}', '145000', 'Test', 'Account 3', 'testaccount3@gmail.com', '0703030303', '219 Sabasaba', '01020', 'Nairobi', 'Nairobi', 'Cheque Deposit', 3, '1569943545'),
(4, 8, 1569946146, '{\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":14,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":112000},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"qty\":10,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Shark\",\"image\":\"IMG_20190525_094149.jpg\",\"slug\":\"adidas-shark\",\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":75000}}', '187000', 'Test', 'Account 2', 'testaccount2@gmail.com', '0700020202', '455', '01020', 'Kiambu', 'Nairobi', 'Cheque Deposit', 4, '1569946146'),
(5, 11, 1569948916, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":18,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":135000},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":8,\"vendor_id\":\"1563557036\",\"price\":8500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":68000}}', '203000', 'Test', 'Account 5', 'testaccount5@gmail.com', '0705050505', '455', '01020', 'Kiambu', 'Kiambu', 'Cash on Delivery', 2, '1569948916'),
(6, 7, 1570628742, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":7500},\"c9f0f895fb98ab9159f51fd0297e236d\":{\"id\":\"8\",\"qty\":1,\"vendor_id\":\"1563557036\",\"price\":6500,\"name\":\"Nike Air Force\",\"image\":\"IMG_20190525_092145.jpg\",\"slug\":\"nike-air-force\",\"rowid\":\"c9f0f895fb98ab9159f51fd0297e236d\",\"subtotal\":6500},\"8f14e45fceea167a5a36dedd4bea2543\":{\"id\":\"7\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":9500,\"name\":\"Nike Air Jordan\",\"image\":\"IMG_20190525_090626.jpg\",\"slug\":\"nike-air-jordan\",\"rowid\":\"8f14e45fceea167a5a36dedd4bea2543\",\"subtotal\":9500},\"eccbc87e4b5ce2fe28308fd9f2a7baf3\":{\"id\":\"3\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":8000,\"name\":\"Nike VaporMax\",\"image\":\"IMG_20190525_094252.jpg\",\"slug\":\"nike-vapormax\",\"rowid\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3\",\"subtotal\":8000}}', '31500', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '455', '00232', 'Kiambu', 'Kiambu', 'Cash on Delivery', 0, '1570628742'),
(7, 7, 1571313379, '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":1,\"vendor_id\":\"1563556647\",\"price\":7500,\"name\":\"Adidas Pharrel William\",\"image\":\"IMG_20190525_103358.jpg\",\"slug\":\"adidas-pharrel-william\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":7500},\"c9f0f895fb98ab9159f51fd0297e236d\":{\"id\":\"8\",\"qty\":10,\"vendor_id\":\"1563557036\",\"price\":6500,\"name\":\"Nike Air Force\",\"image\":\"IMG_20190525_092145.jpg\",\"slug\":\"nike-air-force\",\"rowid\":\"c9f0f895fb98ab9159f51fd0297e236d\",\"subtotal\":65000}}', '72500', 'Test', 'Account 1', 'testaccount1@gmail.com', '0700010203', '455', '00232', 'Kiambu', 'Kitui', 'Cheque Deposit', 1, '1571313379'),
(8, 8, 1571321233, '{\"c9f0f895fb98ab9159f51fd0297e236d\":{\"id\":\"8\",\"qty\":15,\"vendor_id\":\"1563557036\",\"price\":6500,\"name\":\"Nike Air Force\",\"image\":\"IMG_20190525_092145.jpg\",\"slug\":\"nike-air-force\",\"rowid\":\"c9f0f895fb98ab9159f51fd0297e236d\",\"subtotal\":97500},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":16,\"vendor_id\":\"1563557036\",\"price\":8500,\"name\":\"Nike Utility\",\"image\":\"IMG_20190525_093441.jpg\",\"slug\":\"nike-utility\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":136000}}', '233500', 'Test', 'Account 2', 'testaccount2@gmail.com', '0700020202', '455', '00232', 'Kiambu', 'Kiambu', 'Cash on Delivery', 0, '1571321233');

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
  `subtotal` int(20) UNSIGNED NOT NULL,
  `status` int(11) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_summary`
--

INSERT INTO `orders_summary` (`id`, `order_id`, `customer_id`, `product_id`, `vendor_id`, `qty`, `price`, `subtotal`, `status`) VALUES
(1, 1, 7, 2, 1563556647, 1, 7500, 7500, 2),
(2, 1, 7, 1, 1563556647, 1, 7500, 7500, 2),
(3, 1, 7, 5, 1563556647, 1, 5500, 5500, 2),
(4, 1, 7, 6, 1563557036, 1, 8500, 8500, 2),
(5, 1, 7, 4, 1563556647, 1, 3000, 3000, 2),
(6, 1, 7, 3, 1563556647, 1, 8000, 8000, 2),
(7, 2, 7, 2, 1563556647, 3, 7500, 22500, 0),
(8, 2, 7, 1, 1563556647, 2, 7500, 15000, 0),
(9, 2, 7, 5, 1563556647, 3, 5500, 16500, 0),
(10, 2, 7, 6, 1563557036, 4, 8500, 34000, 2),
(11, 2, 7, 3, 1563556647, 1, 8000, 8000, 0),
(12, 2, 7, 4, 1563556647, 1, 3000, 3000, 0),
(13, 3, 9, 5, 1563556647, 10, 5500, 55000, 0),
(14, 3, 9, 2, 1563556647, 12, 7500, 90000, 0),
(15, 4, 8, 3, 1563556647, 14, 8000, 112000, 0),
(16, 4, 8, 1, 1563556647, 10, 7500, 75000, 0),
(17, 5, 11, 2, 1563556647, 18, 7500, 135000, 0),
(18, 5, 11, 6, 1563557036, 8, 8500, 68000, 1),
(19, 6, 7, 2, 1563556647, 1, 7500, 7500, 0),
(20, 6, 7, 8, 1563557036, 1, 6500, 6500, 0),
(21, 6, 7, 7, 1563556647, 1, 9500, 9500, 0),
(22, 6, 7, 3, 1563556647, 1, 8000, 8000, 0),
(23, 7, 7, 2, 1563556647, 1, 7500, 7500, 0),
(24, 7, 7, 8, 1563557036, 10, 6500, 65000, 0),
(25, 8, 8, 8, 1563557036, 15, 6500, 97500, 0),
(26, 8, 8, 6, 1563557036, 16, 8500, 136000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
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
(1, 1563556647, 'IMG_20190525_094149.jpg', 'Adidas Shark', '<p>Shark</p>', 'Adidas', '[\"Shoes\",\"Adidas\",\"Adidas Shark\"]', '[\"Adidas\"]', '[\"Red\"]', '[\"40, 41, 42, 43, 44, 45\"]', '8000', '7500', '6500', 1563568500, NULL, 'adidas-shark', NULL, NULL, 1),
(2, 1563556647, 'IMG_20190525_103358.jpg', 'Adidas Pharrel William', '<p>Pharrel William NMD Human Race</p>', 'Adidas Pharrel William NMD Human Race', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Adidas\",\"Pharrel William NMD Human Race\"]', '[\"Adidas, NMD, Human Race, Pharrel Williams\"]', '[\"Yellow, Black, Purple\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '9000', '7500', '6500', 1563570987, 1569911497, 'adidas-pharrel-william', NULL, NULL, 1),
(3, 1563556647, 'IMG_20190525_094252.jpg', 'Nike VaporMax', '<p>VaporMax</p>', 'VaporMax', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Nike\",\"VaporMax\"]', '[\"Nike, VaporMax\"]', '[\"Black, Yellow, Luminous Green\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '9000', '8000', '6500', 1563610642, 1570709695, 'nike-vapormax', NULL, NULL, 1),
(4, 1563556647, 'IMG_20190525_105717.jpg', 'Vans Fear of God', '<p>Vans</p>', 'Fear of God', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Vans\",\"Fear of God\"]', '[\"Vans, Fear of God\"]', '[\"Black and White\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '4500', '3000', '2000', 1563612405, 1571063060, 'vans-fear-of-god', NULL, NULL, 2),
(5, 1563556647, 'IMG_20190525_100403.jpg', 'Nike Just Do It', '<p>Airforce</p>', 'Airforce Just Do It', '[\"Age\",\"Adults\",\"Youths\",\"Gender\",\"Unisex\",\"Shoes\",\"Nike\",\"Just Do It\"]', '[\"Nike, Just Do It, Air Force\"]', '[\"White, Orange, Luminous Green\"]', '[\"36, 37, 38, 39, 40, 41, 42, 43, 44, 45\"]', '6000', '5500', '4500', 1563613026, 1570082620, 'nike-just-do-it', NULL, NULL, 1),
(6, 1563557036, 'IMG_20190525_093441.jpg', 'Nike Utility', '<p>Nike</p>', 'Nike Air Force', '[\"Shoes\",\"Nike\",\"Air Force Utility\"]', '[\"Nike, Nike Utility, Utility\"]', '[\"Jungle Green, Matte Black, Sky Blue\"]', '[\"36,37,38,39,40,41,42,43,44,45\"]', '9000', '8500', '7500', 1566309307, NULL, 'nike-utility', NULL, NULL, 1),
(7, 1563556647, 'IMG_20190525_090626.jpg', 'Nike Air Jordan', '<p>Nike</p>', 'Jordan', '[\"Shoes\",\"Nike\",\"Air Jordan\"]', '[\"Nike, Jordan, Air Jordan\"]', '[\"Red\"]', '[\"40\"]', '10000', '9500', '8500', 1570626939, 1570628516, 'nike-air-jordan', NULL, NULL, 1),
(8, 1563557036, 'IMG_20190525_092145.jpg', 'Nike Air Force', '<p>Air Force</p>', 'Air Force', '[\"Shoes\",\"Nike\",\"Air Force TM\"]', '[\"nike, Air Force\"]', '[\"White, Black, Jungle Green\"]', '[\"42\"]', '7500', '6500', '5500', 1570627099, 1570628428, 'nike-air-force', NULL, NULL, 1),
(9, 1563556647, 'Smiley-Bucket-20.gif', 'Smiley Bucket', '<p>Bucket</p>', 'Bucket', '[\"Household\",\"Buckets\",\"Smiley Bucket\"]', '[\"Kenpoly, Bucket, Smiley Bucket\"]', '[\"Blue\"]', '[\"\"]', '650', '550', '450', 1571062795, NULL, 'smiley-bucket', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_updates`
--

CREATE TABLE `products_updates` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `action` varchar(128) NOT NULL,
  `time` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `date_created` int(11) UNSIGNED NOT NULL,
  `ratings` float(10,2) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_id`, `review`, `date_created`, `ratings`, `status`) VALUES
(1, 1, 7, 'Awesome Shoe', 1569501897, 5.00, 1),
(2, 1, 7, 'Great', 1569502064, 4.00, 1),
(3, 1, 11, 'Smooth', 1569503526, 5.00, 1),
(4, 5, 12, 'did it ', 1569586993, 4.00, 1),
(5, 2, 7, 'naaah\r\n\r\n\r\n', 1569597235, 0.50, 1),
(6, 9, 7, 'best', 1571566087, 5.00, 0);

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

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `slug`) VALUES
(1, 'Adidas', 'adidas');

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
  `image` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `image`, `first_name`, `last_name`, `company`, `phone`) VALUES
(7, '127.0.0.1', 'testaccount1@gmail.com', '$2y$12$a6sETxL3wsaFN3ThdalIwOmE6ml9S7Dznz0oPHLBbqRj0iixWihhu', 'testaccount1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556647, 1571759885, 1, 'IMG_20170325_030608_829.jpg', 'Test', 'Account 1', NULL, '0700010203'),
(8, '127.0.0.1', 'testaccount2@gmail.com', '$2y$10$cWKnrV1lhSSJFQKV02G5Re9IgaKo7EIu7q7BBpQWjKJnS512g6vk.', 'testaccount2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556838, 1564660155, 1, NULL, 'Test', 'Account 2', NULL, '0700020202'),
(9, '127.0.0.1', 'testaccount3@gmail.com', '$2y$10$2axejRFIvN2PsFZZ.M8LxesZLcoK9GWk4495CMPgBmGMckI0LEKO6', 'testaccount3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557036, 1571320479, 1, 'FB_IMG_15444424547751.jpg', 'Test', 'Account 3', NULL, '0703030303'),
(10, '127.0.0.1', 'testaccount4@gmail.com', '$2y$10$EvTTrf91Mx6KCF6OE96GYezAdLLVpsRnYOr0ZYmTcClowu99IRjgu', 'testaccount4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557142, 1571053943, 1, NULL, 'Test', 'Account 4', NULL, '0704040404'),
(11, '127.0.0.1', 'testaccount5@gmail.com', '$2y$10$DPHgSu9j1ZLZjPMTEScg..WeZfKelPVMFygGu9CuEjvzPsiQGJaq.', 'testaccount5@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568968668, 1569566912, 1, NULL, 'Test', 'Account 5', NULL, '0705050505'),
(12, '127.0.0.1', 'testaccount6@gmail.com', '$2y$10$H5OY5uzyd.M2OlWRoxJXD.xPV1aqkxznRCRrmutGg4rSZeot92jri', 'testaccount6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568969168, 1569586971, 1, NULL, 'Test', 'Account 6', NULL, '0706060606'),
(13, '127.0.0.1', 'testaccount7@gmail.com', '$2y$10$mzvUTmxfmMLSBJhTazWYfehKy.MJ6azuGiCA134bpydGFAGwHl2I6', 'testaccount7@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1570962246, 1571053651, 1, NULL, 'Test', 'Account 7', NULL, '0702512454');

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
(16, 10, 4),
(17, 11, 2),
(18, 12, 2),
(19, 13, 2);

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
(14, 12, 6, 126, 1568990651),
(15, 12, 1, 121, 1568990655),
(17, 11, 2, 112, 1569503619),
(21, 12, 3, 123, 1569587008),
(22, 7, 8, 78, 1570628445),
(23, 7, 5, 75, 1570628451),
(24, 7, 2, 72, 1570628457),
(25, 7, 7, 77, 1570628537),
(26, 7, 3, 73, 1570628711),
(27, 7, 9, 79, 1571062813);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `products_updates`
--
ALTER TABLE `products_updates`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_summary`
--
ALTER TABLE `orders_summary`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_updates`
--
ALTER TABLE `products_updates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
