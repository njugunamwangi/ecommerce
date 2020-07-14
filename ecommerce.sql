-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 03:34 AM
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
(1, 'Household', '', 'household'),
(2, 'Trolley', 'Household', 'trolley'),
(3, 'Chairs', 'Household', 'chairs'),
(4, 'Basins', 'Household', 'basins');

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
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `field`, `value`) VALUES
(1, 'site-logo', NULL),
(2, 'name-of-store', 'e-Commerce'),
(3, 'phone-number', '+254700000019'),
(4, 'email-address', 'info@e-commerce.com'),
(5, 'location', '<p><img alt=\"cheeky\" src=\"http://ecommerce.com/public/assets/global/plugins/ckeditor/plugins/smiley/images/tongue_smile.png\" xss=removed title=\"cheeky\"></p>\r\n'),
(6, 'favicon', NULL),
(7, 'currency', 'KES'),
(8, 'consumer-key', 's0fLXwumvi2YsiZ1fxP45musQFCvxsSF'),
(9, 'consumer-secret', 'z0dXkNQ9vIKaJE1a'),
(10, 'till-number', '174379'),
(11, 'pass-key', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919');

-- --------------------------------------------------------

--
-- Table structure for table `lipa`
--

CREATE TABLE `lipa` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `consumer_key` varchar(255) NOT NULL,
  `consumer_secret` varchar(255) NOT NULL,
  `till_number` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(120, 7, '127.0.0.1', 1571759885),
(121, 7, '127.0.0.1', 1572116090),
(122, 7, '127.0.0.1', 1572159742),
(123, 12, '127.0.0.1', 1572186243),
(124, 7, '127.0.0.1', 1572375642),
(125, 7, '127.0.0.1', 1572411881),
(126, 7, '127.0.0.1', 1572435586),
(127, 7, '127.0.0.1', 1572712365),
(128, 7, '127.0.0.1', 1572772297),
(129, 7, '127.0.0.1', 1572866533),
(130, 7, '127.0.0.1', 1573795519),
(131, 7, '127.0.0.1', 1573825149),
(132, 7, '127.0.0.1', 1574612433),
(133, 7, '127.0.0.1', 1575999750),
(134, 7, '127.0.0.1', 1577417305),
(135, 7, '127.0.0.1', 1577453173),
(136, 7, '127.0.0.1', 1577509230),
(137, 7, '127.0.0.1', 1578449904),
(138, 11, '127.0.0.1', 1579972253),
(139, 7, '127.0.0.1', 1579972372),
(140, 7, '127.0.0.1', 1580037928),
(141, 7, '127.0.0.1', 1580664020),
(142, 7, '127.0.0.1', 1582476655),
(143, 7, '127.0.0.1', 1584419695),
(144, 7, '127.0.0.1', 1584658259),
(145, 7, '127.0.0.1', 1584685929),
(146, 7, '127.0.0.1', 1584705602),
(147, 7, '127.0.0.1', 1584769780),
(148, 7, '127.0.0.1', 1589215025),
(149, 7, '127.0.0.1', 1589291158),
(150, 7, '127.0.0.1', 1589894950),
(151, 7, '127.0.0.1', 1593806062),
(152, 7, '127.0.0.1', 1594380351),
(153, 7, '127.0.0.1', 1594467661),
(154, 7, '127.0.0.1', 1594484226),
(155, 7, '127.0.0.1', 1594517396),
(156, 7, '127.0.0.1', 1594603756),
(157, 7, '127.0.0.1', 1594643234);

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
-- Table structure for table `modes_of_payment`
--

CREATE TABLE `modes_of_payment` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mode_of_payment` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modes_of_payment`
--

INSERT INTO `modes_of_payment` (`id`, `image`, `mode_of_payment`, `status`, `slug`) VALUES
(1, '', 'M-Pesa', 1, 'm-pesa'),
(2, '', 'Master Card / Visa', 1, 'master-card-visa'),
(3, '', 'Cheque Deposit', 1, 'cheque-deposit'),
(4, '', 'Pay Pal', 0, 'pay-pal');

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
  `paid` tinyint(1) UNSIGNED DEFAULT '0',
  `slug` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_id`, `total_orders`, `first_name`, `last_name`, `email`, `phone`, `address`, `postal_code`, `subcounty`, `county`, `method_of_payment`, `status`, `paid`, `slug`) VALUES
(1, 7, 1593806166, '6000', 'Test', 'Account 1', 'testaccount1@gmail.com', '254704502454', '455', '00232', 'Nairobi', 'Nairobi', '1', 0, 0, '1593806166'),
(2, 7, 1594380387, '280', 'Test', 'Account 1', 'testaccount1@gmail.com', '254704502454', '455', '00232', 'Kiambu', 'Nairobi', '1', 0, 0, '1594380387'),
(3, 7, 1594467932, '280', 'Test', 'Account 1', 'testaccount1@gmail.com', '254704502454', '455', '00232', 'Kiambu', 'Kiambu', '2', 0, 0, '1594467932'),
(4, 7, 1594608776, '1160', 'Desmond', 'Njuguna', 'testaccount1@gmail.com', '0704502454', '77 Grayston Drive', '2057', 'Kiambu', 'Kiambu', '1', 0, 0, '1594608776');

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
(1, 1, 7, 1, 1563556647, 10, 600, 6000, 0),
(2, 2, 7, 2, 1563556647, 1, 280, 280, 0),
(3, 3, 7, 2, 1563556647, 1, 280, 280, 0),
(4, 4, 7, 2, 1563556647, 2, 280, 560, 0),
(5, 4, 7, 1, 1563556647, 1, 600, 600, 0);

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
(1, 1563556647, 'Chair-2014.gif', 'Chair 2014', '<p>Chair</p>', 'Chair', '[\"Household\",\"Chairs\"]', '[\"Household, Kenpoly, Chairs, Chair 2014\"]', '[\"blue, green, yellow\"]', '[\"\"]', '650', '600', '550', 1589299150, NULL, 'chair-2014', NULL, NULL, 1),
(2, 1563556647, 'Basin-45-Football.gif', 'Football Basin', '<p>Basin</p>', 'Basin', '[\"Household\",\"Basins\"]', '[\"Household, Kenpoly, Basins, Football Basin\"]', '[\"blue, green, yellow\"]', '[\"\"]', '300', '280', '250', 1589299413, NULL, 'football-basin', NULL, NULL, 1),
(3, 1563556647, 'Century-Basin.gif', 'Century Basin', '<p>Basin</p>', 'Basin', '[\"Household\",\"Basins\"]', '[\"Household, Kenpoly, Basins, Century Basin\"]', '[\"\"]', '[\"\"]', '255', '240', '200', 1589300126, 1593806464, 'century-basin', NULL, NULL, 2);

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
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(20) UNSIGNED NOT NULL,
  `product_id` int(20) UNSIGNED NOT NULL,
  `sales` int(20) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `product_id`, `sales`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0);

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
(1, 1, 7, 'hi', 1593806117, 5.00, 1);

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
(7, '127.0.0.1', 'testaccount1@gmail.com', '$2y$12$a6sETxL3wsaFN3ThdalIwOmE6ml9S7Dznz0oPHLBbqRj0iixWihhu', 'testaccount1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556647, 1594643234, 1, 'IMG_20170325_030608_829.jpg', 'Test', 'Account 1', NULL, '254704502454'),
(8, '127.0.0.1', 'testaccount2@gmail.com', '$2y$10$cWKnrV1lhSSJFQKV02G5Re9IgaKo7EIu7q7BBpQWjKJnS512g6vk.', 'testaccount2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563556838, 1564660155, 1, NULL, 'Test', 'Account 2', NULL, '0700020202'),
(9, '127.0.0.1', 'testaccount3@gmail.com', '$2y$10$2axejRFIvN2PsFZZ.M8LxesZLcoK9GWk4495CMPgBmGMckI0LEKO6', 'testaccount3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557036, 1571320479, 1, 'FB_IMG_15444424547751.jpg', 'Test', 'Account 3', NULL, '0703030303'),
(10, '127.0.0.1', 'testaccount4@gmail.com', '$2y$10$EvTTrf91Mx6KCF6OE96GYezAdLLVpsRnYOr0ZYmTcClowu99IRjgu', 'testaccount4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1563557142, 1571053943, 1, NULL, 'Test', 'Account 4', NULL, '0704040404'),
(11, '127.0.0.1', 'testaccount5@gmail.com', '$2y$10$DPHgSu9j1ZLZjPMTEScg..WeZfKelPVMFygGu9CuEjvzPsiQGJaq.', 'testaccount5@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568968668, 1579972253, 1, NULL, 'Test', 'Account 5', NULL, '0705050505'),
(12, '127.0.0.1', 'testaccount6@gmail.com', '$2y$10$H5OY5uzyd.M2OlWRoxJXD.xPV1aqkxznRCRrmutGg4rSZeot92jri', 'testaccount6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568969168, 1572186243, 1, NULL, 'Test', 'Account 6', NULL, '0706060606'),
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
(1, 7, 1, 71, 1593806076),
(2, 7, 2, 72, 1594608739);

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
-- Indexes for table `lipa`
--
ALTER TABLE `lipa`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `modes_of_payment`
--
ALTER TABLE `modes_of_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slg` (`slug`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_summary_order_ids1_idx` (`order_id`);

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
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_sales_products_idx` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews_product_ids1_idx` (`product_id`),
  ADD KEY `fk_reviews_customer_ids1_idx` (`customer_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wishlist_product_ids1_idx` (`product_id`),
  ADD KEY `fk_wishlist_customer_ids1_idx` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lipa`
--
ALTER TABLE `lipa`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modes_of_payment`
--
ALTER TABLE `modes_of_payment`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_summary`
--
ALTER TABLE `orders_summary`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_updates`
--
ALTER TABLE `products_updates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_summary`
--
ALTER TABLE `orders_summary`
  ADD CONSTRAINT `fk_orders_summary_order_ids1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_summary_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_summary_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_summary_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD CONSTRAINT `fk_product_sales_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_customer_ids1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reviews_product_ids1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wishlist_customer_ids1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_wishlist_product_ids1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
