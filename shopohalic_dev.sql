-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 05:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopohalic_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sdsdas', '1685210615.jpg', '2023-05-27 12:33:35', '2023-05-27 12:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `sub_category_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Test', NULL, NULL),
(2, 7, 8, 'M 62 nokia', NULL, NULL),
(3, 11, 12, 'Fair & Lovely', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child` int(11) DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = Active; 0 = Deactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `parent_id`, `child`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'N/A', 1, '0', NULL, '2023-04-30 08:27:44', '2023-04-30 08:27:44'),
(2, 'Sansung', '1', 0, '0', NULL, '2023-04-30 08:27:59', '2023-04-30 08:27:59'),
(3, 'Nokia', '1', 0, '0', NULL, '2023-05-04 23:49:26', '2023-05-04 23:49:26'),
(4, 'Toy', 'N/A', 1, '0', NULL, '2023-05-04 23:49:56', '2023-05-04 23:55:57'),
(5, 'Sanjeev', '4', 0, '0', '2023-05-05 01:02:28', '2023-05-04 23:50:32', '2023-05-05 01:02:28'),
(6, 'manish1', '4', 0, '0', '2023-05-05 01:02:25', '2023-05-04 23:55:57', '2023-05-05 01:02:25'),
(7, 'Mobile 2', 'N/A', 1, '0', NULL, '2023-08-05 05:13:33', '2023-08-05 05:14:00'),
(8, 'Mobile Nokia', '7', 0, '0', NULL, '2023-08-05 05:14:00', '2023-08-05 05:14:00'),
(9, 'Femaile', 'N/A', 1, '0', '2023-08-05 05:34:40', '2023-08-05 05:34:16', '2023-08-05 05:34:40'),
(10, 'Cream', '9', 0, '0', '2023-08-05 05:34:37', '2023-08-05 05:34:29', '2023-08-05 05:34:37'),
(11, 'Cream', 'N/A', 1, '0', NULL, '2023-08-05 05:35:05', '2023-08-05 05:35:47'),
(12, 'Facial Cream', '11', 0, '0', NULL, '2023-08-05 05:35:47', '2023-08-05 05:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `color_code` varchar(191) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`) VALUES
(1, 'Red', '000000'),
(2, 'Green', '#4F7942'),
(3, 'Yellow', '#FFFF00'),
(4, 'White', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commission_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `commission_title`, `commission_percentage`, `created_at`, `updated_at`) VALUES
(1, 'Commission', '3', '2023-04-30 07:57:31', '2023-04-30 07:57:31'),
(2, 'GST', '15', '2023-04-30 07:57:31', '2023-04-30 07:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_08_03_063942_entrust_setup_tables', 1),
(4, '2022_09_03_054743_create_category_table', 1),
(5, '2022_09_03_161741_create_commission_table', 1),
(6, '2022_09_08_075936_create_order_setting_table', 1),
(7, '2022_09_10_115716_create_subscriptions_table', 1),
(9, '2022_09_12_114137_create_product_image_table', 1),
(10, '2022_09_12_161051_create_shipping_costs_table', 1),
(11, '2022_10_01_102520_create_banner_table', 1),
(12, '2022_10_19_191318_create_order_address_table', 1),
(13, '2023_01_08_164448_create_sizes_table', 1),
(14, '2023_01_08_164510_create_brands_table', 1),
(15, '2023_01_08_164714_create_colors_table', 1),
(16, '2023_04_27_142321_create_cart_item_table', 1),
(17, '2023_04_27_142738_create_order_item_table', 1),
(18, '2023_04_27_142837_create_payments_table', 1),
(19, '2023_04_27_143524_create_user_order_address_table', 1),
(20, '2022_09_12_112106_create_products_table', 2),
(21, '2023_05_27_174831_create_order_status_table', 3),
(22, '2023_06_01_191430_create_order_status_log_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `shipping` int(11) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_no`, `product_id`, `quantity`, `price`, `color`, `size`, `shipping`, `shipping_cost`, `session_id`, `ip_address`, `user_id`, `created_at`, `updated_at`) VALUES
(19, 'OR_3-4', 8, 1, 9000, 1, 1, 21, 200, 'lkqkrn694vem4v120sen4ogshk', '::1', '3', '2023-05-27 04:26:15', '2023-05-27 04:26:27'),
(20, NULL, 8, 2, 18000, 2, 2, 21, 200, 'o48ej740k5nt7o1to3m0af2g0l', '::1', '3', '2023-05-28 14:37:49', '2023-05-28 14:37:49'),
(21, NULL, 16, 1, 7000, 1, 1, 28, 100, 'o48ej740k5nt7o1to3m0af2g0l', '::1', '3', '2023-05-29 10:00:35', '2023-05-29 10:00:35'),
(22, 'OR_3-6', 16, 1, 7000, 1, 1, 30, 0, 'ftqmb58fs15540e3t9ali17iit', '::1', '3', '2023-06-03 13:34:42', '2023-06-04 08:36:37'),
(23, 'OR_3-6', 8, 1, 9000, 1, 1, 22, 400, 'ftqmb58fs15540e3t9ali17iit', '::1', '3', '2023-06-04 07:53:20', '2023-06-04 08:36:37'),
(24, 'OR_3-6', 8, 1, 9000, 1, 1, 22, 400, 'ftqmb58fs15540e3t9ali17iit', '::1', '3', '2023-06-04 08:36:23', '2023-06-04 08:36:37'),
(25, 'OR_3-6', 16, 1, 7000, 1, 1, 30, 0, 'ftqmb58fs15540e3t9ali17iit', '::1', '3', '2023-06-04 08:36:24', '2023-06-04 08:36:37'),
(26, NULL, 17, 1, 11000, 1, 1, 32, 0, 't0nfp9tbrnudog4h3jghasr2cp', '::1', '3', '2023-06-05 19:43:33', '2023-06-05 19:43:33'),
(27, NULL, 19, 2, 18000, 2, 2, 34, 100, '76ab3kdq32vkvauqn7odrjodl5', '::1', '3', '2023-07-30 02:52:56', '2023-07-30 02:52:56'),
(28, NULL, 18, 1, 12000, 1, 1, 33, 20, '76ab3kdq32vkvauqn7odrjodl5', '::1', '3', '2023-07-30 02:52:56', '2023-07-30 02:52:56'),
(29, NULL, 23, 4, 720, 4, 4, 37, 10, 'v960l3fle93l6ek43kn6pm3nm9', '::1', '3', '2023-08-05 05:52:06', '2023-08-05 05:52:06'),
(30, 'OR_3-7', 23, 3, 540, 3, 3, 37, 10, 'tndfee1835c563icfr97j470d4', '::1', '3', '2023-08-12 09:17:07', '2023-08-12 09:31:05'),
(31, 'OR_3-7', 24, 3, 180, NULL, NULL, 38, 100, 'tndfee1835c563icfr97j470d4', '::1', '3', '2023-08-12 09:30:11', '2023-08-12 09:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_setting`
--

CREATE TABLE `order_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_tracking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status_name`, `is_delete`) VALUES
(1, 'Canceled', NULL),
(2, 'Cancel Reversal', NULL),
(3, 'Chargeback', NULL),
(4, 'Complete', NULL),
(5, 'Denied', NULL),
(6, 'expired', NULL),
(7, 'Pending', NULL),
(8, 'Processed', NULL),
(9, 'Processing', NULL),
(10, 'Refunded', NULL),
(11, 'Reversed', NULL),
(12, 'Shipped', NULL),
(13, 'Voided', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_log`
--

CREATE TABLE `order_status_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_status_log`
--

INSERT INTO `order_status_log` (`id`, `order_id`, `order_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'OR_3-4', 2, NULL, NULL),
(2, 4, 'OR_3-4', 4, '2023-06-01 14:02:00', NULL),
(3, 4, 'OR_3-4', 9, '2023-06-05 19:34:00', NULL),
(4, 4, 'OR_3-4', 11, '2023-06-05 19:35:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_no`, `session_id`, `amount`, `user_id`, `status`, `response`, `order_date`, `payment_date`, `order_status`, `created_at`, `updated_at`) VALUES
(4, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', 10580, 3, 'succeeded', '{\"amount\":10580,\"balance_transaction\":\"txn_3NCJriK7pBe3EMFY0ZyadbD1\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-05-27 09:56\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NCJriK7pBe3EMFY0VHzM5ET\"}', '2023-05-27 09:56:00', '2023-05-27 09:56:00', 11, NULL, NULL),
(5, 'OR_3-5', 'ftqmb58fs15540e3t9ali17iit', 18860, 3, NULL, NULL, '2023-06-04 01:26:00', NULL, 0, NULL, NULL),
(6, 'OR_3-6', 'ftqmb58fs15540e3t9ali17iit', 18860, 3, 'succeeded', '{\"amount\":18860,\"balance_transaction\":\"txn_3NFHaFK7pBe3EMFY1WSFVRbC\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-06-04 02:07\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NFHaFK7pBe3EMFY1SSEfLpT\"}', '2023-06-04 02:06:00', '2023-06-04 02:07:00', 0, NULL, NULL),
(7, 'OR_3-7', 'tndfee1835c563icfr97j470d4', 1208, 3, NULL, NULL, '2023-08-12 03:01:00', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `special_price` double(8,2) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_type` enum('till_stock_last','date_range') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'till_stock_last' COMMENT 'till_stock_last,date_range',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `expected` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `brand`, `category`, `sub_category_id`, `quantity`, `description`, `color`, `size`, `image`, `price`, `special_price`, `status`, `created_by`, `created_at`, `updated_at`, `stock_type`, `start_date`, `end_date`, `shipping`, `expected`, `pickup`) VALUES
(8, 'product 1', '123', '1', 1, 2, 100, 'rest', '1', '1', '1683269697.jpg', 10000.00, 9000.00, '0', 2, '2023-05-05 01:24:57', '2023-05-05 01:24:57', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(9, 'test', '123', '1', 1, 2, 1, 'rest', '1', '1', '1685270568.jpg', 111.00, 11.00, '0', 2, '2023-05-28 05:12:49', '2023-05-28 05:12:49', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(10, 'test', '123', '1', 1, 2, 1, 'rest', '1', '1', '1685270650.jpg', 111.00, 11.00, '0', 2, '2023-05-28 05:14:10', '2023-05-28 05:14:10', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(11, 'test q', 'dd', '1', 1, 2, 100, 'rest', '1', '1', '1685270782.jpg', 11.00, 231.00, '0', 2, '2023-05-28 05:16:22', '2023-05-28 05:16:22', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(12, 'test q', 'dd', '1', 1, 2, 100, 'rest', '1', '1', '1685270833.jpg', 11.00, 231.00, '0', 2, '2023-05-28 05:17:13', '2023-05-28 05:17:13', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(13, 'test q', 'dd', '1', 1, 2, 100, 'rest', '1', '1', '1685270855.jpg', 11.00, 231.00, '0', 2, '2023-05-28 05:17:35', '2023-05-28 05:17:35', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(14, 'test q', 'dd', '1', 1, 2, 100, 'rest', '1', '1', '1685270963.jpg', 11.00, 231.00, '0', 2, '2023-05-28 05:19:23', '2023-05-28 05:19:23', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(15, 'test q', 'dd', '1', 1, 2, 100, 'rest', '1', '1', '1685271002.jpg', 11.00, 231.00, '0', 2, '2023-05-28 05:20:02', '2023-05-28 05:20:02', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(16, 'Product 4', '1234', '1', 1, 2, 100, 'rest', '1', '1', '1685271126.jpg', 10000.00, 7000.00, '0', 2, '2023-05-28 05:22:06', '2023-05-28 05:22:06', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(17, 'product 10', '123', '1', 1, 2, 100, 'rest', '1', '1', '1686013245.jpg', 12000.00, 11000.00, '0', 2, '2023-06-05 19:30:45', '2023-06-05 19:30:45', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(18, 'wwqwq', '111', '1', 1, 2, 2000, 'rest', '1,2', '1', '1688551505.jpg', 121111.00, 12000.00, '0', 2, '2023-07-05 04:35:05', '2023-07-05 04:35:05', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(19, 'product 11', 'dffds', '1', 1, 2, NULL, 'sdfsdfd', '1,2', NULL, '1689091939.jpg', 10000.00, 9000.00, '0', 2, '2023-07-11 10:42:19', '2023-07-11 10:42:19', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(20, 'testing', '123111', '1', 1, 2, NULL, 'sddsds', '1', NULL, '1690822334.png', 100100.00, 10000.00, '0', 2, '2023-07-31 11:22:14', '2023-07-31 11:22:14', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(21, 'Test Product Manish', '123', '1', 1, 2, NULL, 'test', '1,2', NULL, '1690850593.png', 20000.00, 15000.00, '0', 2, '2023-07-31 19:13:13', '2023-07-31 19:13:13', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(22, 'Test Product Manish', '123', '1', 1, 2, NULL, 'test', '1,2', NULL, '1690850597.png', 20000.00, 15000.00, '0', 2, '2023-07-31 19:13:17', '2023-07-31 19:13:17', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(23, 'Fair & Lovely', 'F&L', '3', 11, 12, NULL, 'test', '4', NULL, '1691233958.jpg', 200.00, 180.00, '0', 2, '2023-08-05 05:42:38', '2023-08-05 05:42:38', 'till_stock_last', NULL, NULL, NULL, NULL, '0'),
(24, 'T-Shirt excel size green', 'ssds', '3', 11, 12, 100, NULL, NULL, NULL, '1691850834.jpg', 100.00, 60.00, '0', 2, '2023-08-12 09:03:54', '2023-08-12 09:03:54', 'till_stock_last', NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, '1682864234.jpg', '2023-04-30 08:47:14', '2023-04-30 08:47:14'),
(2, 1, '1682864234.jpg', '2023-04-30 08:47:14', '2023-04-30 08:47:14'),
(3, 1, '1682864234.jpg', '2023-04-30 08:47:14', '2023-04-30 08:47:14'),
(4, 2, '1682867412.jpg', '2023-04-30 09:40:12', '2023-04-30 09:40:12'),
(5, 2, '1682867412.jpg', '2023-04-30 09:40:12', '2023-04-30 09:40:12'),
(6, 2, '1682867412.jpg', '2023-04-30 09:40:12', '2023-04-30 09:40:12'),
(7, 1, '1682878894.jpg', '2023-04-30 12:51:34', '2023-04-30 12:51:34'),
(8, 1, '1682878894.jpg', '2023-04-30 12:51:34', '2023-04-30 12:51:34'),
(9, 1, '1682878894.jpg', '2023-04-30 12:51:34', '2023-04-30 12:51:34'),
(10, 1, '1682878894.jpg', '2023-04-30 12:51:34', '2023-04-30 12:51:34'),
(11, 2, '1683130602.jpg', '2023-05-03 10:46:42', '2023-05-03 10:46:42'),
(12, 2, '1683130602.jpg', '2023-05-03 10:46:42', '2023-05-03 10:46:42'),
(13, 2, '1683130602.jpg', '2023-05-03 10:46:42', '2023-05-03 10:46:42'),
(14, 2, '1683130602.jpg', '2023-05-03 10:46:42', '2023-05-03 10:46:42'),
(15, 3, '1683130649.jpg', '2023-05-03 10:47:29', '2023-05-03 10:47:29'),
(16, 3, '1683130649.jpg', '2023-05-03 10:47:29', '2023-05-03 10:47:29'),
(17, 3, '1683130649.jpg', '2023-05-03 10:47:29', '2023-05-03 10:47:29'),
(18, 3, '1683130649.jpg', '2023-05-03 10:47:29', '2023-05-03 10:47:29'),
(19, 4, '1683130708.jpg', '2023-05-03 10:48:28', '2023-05-03 10:48:28'),
(20, 4, '1683130708.jpg', '2023-05-03 10:48:28', '2023-05-03 10:48:28'),
(21, 4, '1683130708.jpg', '2023-05-03 10:48:28', '2023-05-03 10:48:28'),
(22, 4, '1683130708.jpg', '2023-05-03 10:48:28', '2023-05-03 10:48:28'),
(23, 5, '1683130987.jpg', '2023-05-03 10:53:07', '2023-05-03 10:53:07'),
(24, 5, '1683130987.jpg', '2023-05-03 10:53:07', '2023-05-03 10:53:07'),
(25, 5, '1683130987.jpg', '2023-05-03 10:53:07', '2023-05-03 10:53:07'),
(26, 5, '1683130987.jpg', '2023-05-03 10:53:07', '2023-05-03 10:53:07'),
(27, 6, '1683137376.jpg', '2023-05-03 12:39:36', '2023-05-03 12:39:36'),
(28, 6, '1683137376.jpg', '2023-05-03 12:39:36', '2023-05-03 12:39:36'),
(29, 6, '1683137376.jpg', '2023-05-03 12:39:36', '2023-05-03 12:39:36'),
(30, 6, '1683137376.jpg', '2023-05-03 12:39:36', '2023-05-03 12:39:36'),
(31, 7, '1683262605.jpg', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(32, 7, '1683262605.jpg', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(33, 7, '1683262605.jpg', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(34, 7, '1683262605.jpg', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(35, 8, '1683269697.jpg', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(36, 8, '1683269697.jpg', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(37, 8, '1683269697.jpg', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(38, 8, '1683269697.jpg', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(39, 11, '1685270782.jpg', '2023-05-28 05:16:22', '2023-05-28 05:16:22'),
(40, 11, '1685270782.jpg', '2023-05-28 05:16:22', '2023-05-28 05:16:22'),
(41, 11, '1685270782.jpg', '2023-05-28 05:16:22', '2023-05-28 05:16:22'),
(42, 11, '1685270782.jpg', '2023-05-28 05:16:22', '2023-05-28 05:16:22'),
(43, 12, '1685270833.jpg', '2023-05-28 05:17:13', '2023-05-28 05:17:13'),
(44, 12, '1685270833.jpg', '2023-05-28 05:17:13', '2023-05-28 05:17:13'),
(45, 12, '1685270834.jpg', '2023-05-28 05:17:14', '2023-05-28 05:17:14'),
(46, 12, '1685270834.jpg', '2023-05-28 05:17:14', '2023-05-28 05:17:14'),
(47, 13, '1685270855.jpg', '2023-05-28 05:17:35', '2023-05-28 05:17:35'),
(48, 13, '1685270855.jpg', '2023-05-28 05:17:35', '2023-05-28 05:17:35'),
(49, 13, '1685270855.jpg', '2023-05-28 05:17:35', '2023-05-28 05:17:35'),
(50, 13, '1685270855.jpg', '2023-05-28 05:17:35', '2023-05-28 05:17:35'),
(51, 14, '1685270964.jpg', '2023-05-28 05:19:24', '2023-05-28 05:19:24'),
(52, 15, '1685271003.jpg', '2023-05-28 05:20:03', '2023-05-28 05:20:03'),
(53, 16, '1685271126.jpg', '2023-05-28 05:22:06', '2023-05-28 05:22:06'),
(54, 16, '1685271126.jpg', '2023-05-28 05:22:06', '2023-05-28 05:22:06'),
(55, 16, '1685271126.jpg', '2023-05-28 05:22:06', '2023-05-28 05:22:06'),
(56, 16, '1685271126.jpg', '2023-05-28 05:22:06', '2023-05-28 05:22:06'),
(57, 17, '1686013245.jpg', '2023-06-05 19:30:45', '2023-06-05 19:30:45'),
(58, 17, '1686013245.jpg', '2023-06-05 19:30:45', '2023-06-05 19:30:45'),
(59, 17, '1686013245.jpg', '2023-06-05 19:30:45', '2023-06-05 19:30:45'),
(60, 17, '1686013245.jpg', '2023-06-05 19:30:45', '2023-06-05 19:30:45'),
(61, 18, '1688551505.jpg', '2023-07-05 04:35:05', '2023-07-05 04:35:05'),
(62, 18, '1688551505.jpg', '2023-07-05 04:35:05', '2023-07-05 04:35:05'),
(63, 18, '1688551505.jpg', '2023-07-05 04:35:05', '2023-07-05 04:35:05'),
(64, 18, '1688551505.jpg', '2023-07-05 04:35:05', '2023-07-05 04:35:05'),
(65, 19, '1689091939.jpg', '2023-07-11 10:42:19', '2023-07-11 10:42:19'),
(66, 19, '1689091939.jpg', '2023-07-11 10:42:19', '2023-07-11 10:42:19'),
(67, 19, '1689091939.jpg', '2023-07-11 10:42:19', '2023-07-11 10:42:19'),
(68, 19, '1689091939.jpg', '2023-07-11 10:42:19', '2023-07-11 10:42:19'),
(69, 20, '1690822334.jpg', '2023-07-31 11:22:14', '2023-07-31 11:22:14'),
(70, 20, '1690822334.jpg', '2023-07-31 11:22:14', '2023-07-31 11:22:14'),
(71, 20, '1690822334.jpg', '2023-07-31 11:22:14', '2023-07-31 11:22:14'),
(72, 20, '1690822334.jpg', '2023-07-31 11:22:14', '2023-07-31 11:22:14'),
(73, 21, '1690850593.jpg', '2023-07-31 19:13:13', '2023-07-31 19:13:13'),
(74, 21, '1690850593.jpg', '2023-07-31 19:13:13', '2023-07-31 19:13:13'),
(75, 21, '1690850593.jpg', '2023-07-31 19:13:13', '2023-07-31 19:13:13'),
(76, 21, '1690850593.jpg', '2023-07-31 19:13:13', '2023-07-31 19:13:13'),
(77, 22, '1690850597.jpg', '2023-07-31 19:13:17', '2023-07-31 19:13:17'),
(78, 22, '1690850597.jpg', '2023-07-31 19:13:17', '2023-07-31 19:13:17'),
(79, 22, '1690850597.jpg', '2023-07-31 19:13:17', '2023-07-31 19:13:17'),
(80, 22, '1690850597.jpg', '2023-07-31 19:13:17', '2023-07-31 19:13:17'),
(81, 23, '1691233958.jpg', '2023-08-05 05:42:38', '2023-08-05 05:42:38'),
(82, 24, '1691850834.jpg', '2023-08-12 09:03:54', '2023-08-12 09:03:54'),
(83, 24, '1691850834.jpg', '2023-08-12 09:03:54', '2023-08-12 09:03:54'),
(84, 24, '1691850834.jpg', '2023-08-12 09:03:54', '2023-08-12 09:03:54'),
(85, 24, '1691850834.jpg', '2023-08-12 09:03:54', '2023-08-12 09:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_item_store`
--

CREATE TABLE `product_item_store` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_item_store`
--

INSERT INTO `product_item_store` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_date`) VALUES
(14, 18, 2, 1, 100, '2023-07-16 14:53:09'),
(15, 18, 2, 2, 200, '2023-07-16 14:53:09'),
(16, 18, 2, 1, 150, '2023-07-16 14:53:35'),
(17, 18, 2, 2, 300, '2023-07-16 14:53:35'),
(18, 18, 2, 1, 200, '2023-07-16 14:57:38'),
(19, 18, 2, 2, 400, '2023-07-16 14:57:38'),
(20, 18, 2, 1, 100, '2023-07-19 18:07:55'),
(21, 18, 2, 1, 100, '2023-07-19 18:08:08'),
(22, 18, 2, 2, 200, '2023-07-19 18:08:09'),
(23, 19, 1, 1, 20, '2023-07-30 08:24:39'),
(24, 19, 1, 2, 10, '2023-07-30 08:24:40'),
(25, 19, 1, 1, 40, '2023-07-30 08:24:47'),
(26, 19, 1, 2, 0, '2023-07-30 08:35:23'),
(27, 19, 1, 1, 0, '2023-07-30 08:36:05'),
(28, 19, 1, 2, 0, '2023-07-30 08:36:05'),
(29, 19, 1, 1, 0, '2023-07-30 08:37:38'),
(30, 19, 1, 2, 0, '2023-07-30 08:37:38'),
(31, 12, 1, 1, 100, '2023-08-01 00:40:00'),
(32, 12, 1, 2, 200, '2023-08-01 00:40:00'),
(33, 22, 1, 1, 100, '2023-08-05 10:42:08'),
(34, 22, 1, 2, 200, '2023-08-05 10:42:08'),
(35, 22, 1, 1, 200, '2023-08-05 11:00:43'),
(36, 22, 1, 2, 300, '2023-08-05 11:00:43'),
(37, 22, 1, 1, 0, '2023-08-05 11:01:06'),
(38, 22, 1, 2, 200, '2023-08-05 11:01:06'),
(39, 23, 4, 4, 100, '2023-08-05 11:16:57'),
(40, 23, 4, 5, 200, '2023-08-05 11:16:57'),
(41, 23, 4, 4, 20, '2023-08-05 11:17:17'),
(42, 23, 4, 5, 40, '2023-08-05 11:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_total_item_store`
--

CREATE TABLE `product_total_item_store` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_total_item_store`
--

INSERT INTO `product_total_item_store` (`id`, `product_id`, `color_id`, `size_id`, `quantity`) VALUES
(5, 18, 2, 1, 650),
(6, 18, 2, 2, 1100),
(7, 19, 1, 1, 60),
(8, 19, 1, 2, 10),
(9, 12, 1, 1, 100),
(10, 12, 1, 2, 200),
(11, 22, 1, 1, 300),
(12, 22, 1, 2, 700),
(13, 23, 4, 4, 120),
(14, 23, 4, 5, 240);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin maintenance complete website', 'This is super admin role for login', '2023-04-30 07:57:31', '2023-04-30 07:57:31'),
(2, 'merchant', 'merchant', 'merchant', '2023-04-30 07:57:31', '2023-04-30 07:57:31'),
(3, 'users', 'users', 'users', '2023-04-30 07:57:31', '2023-04-30 07:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_costs`
--

CREATE TABLE `shipping_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `expected` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shipping_costs`
--

INSERT INTO `shipping_costs` (`id`, `merchant_id`, `product_id`, `location`, `cost`, `expected`, `created_at`, `updated_at`) VALUES
(17, 2, 7, 'location 1', 100.00, '1 days', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(18, 2, 7, 'location 3', 300.00, '3 days', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(19, 2, 7, 'location 2', 200.00, '2 days', '2023-05-04 23:26:45', '2023-05-04 23:26:45'),
(20, 2, 8, 'location 1', 300.00, '1 days', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(21, 2, 8, 'location 2', 200.00, '2 days', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(22, 2, 8, 'location 3', 400.00, '3-4 days', '2023-05-05 01:24:57', '2023-05-05 01:24:57'),
(23, 2, 10, 'test 1', 111.00, '111', '2023-05-28 05:14:10', '2023-05-28 05:14:10'),
(24, 2, 11, 'test 2', 11.00, '1-2 days', '2023-05-28 05:16:22', '2023-05-28 05:16:22'),
(25, 2, 12, 'test 2', 11.00, '1-2 days', '2023-05-28 05:17:14', '2023-05-28 05:17:14'),
(26, 2, 15, 'test 2', 11.00, '1-2 days', '2023-05-28 05:20:03', '2023-05-28 05:20:03'),
(27, 2, 15, 'Pickup', 0.00, '0', '2023-05-28 05:20:03', '2023-05-28 05:20:03'),
(28, 2, 16, 'Location 1', 100.00, '1 days', '2023-05-28 05:22:06', '2023-05-28 05:22:06'),
(29, 2, 16, 'Location 2', 200.00, '1-2 days', '2023-05-28 05:22:07', '2023-05-28 05:22:07'),
(30, 2, 16, 'Pickup', 0.00, '0', '2023-05-28 05:22:07', '2023-05-28 05:22:07'),
(31, 2, 17, 'loc 1', 200.00, '1-2 days', '2023-06-05 19:30:45', '2023-06-05 19:30:45'),
(32, 2, 17, 'Pickup', 0.00, '0 Days', '2023-06-05 19:30:45', '2023-06-05 19:30:45'),
(33, 2, 18, 'location 1', 20.00, '2 days', '2023-07-05 04:35:05', '2023-07-05 04:35:05'),
(34, 2, 19, 'location 1', 100.00, '1 days', '2023-07-11 10:42:20', '2023-07-11 10:42:20'),
(35, 2, 21, 'localtion 1', 200.00, '10 days', '2023-07-31 19:13:13', '2023-07-31 19:13:13'),
(36, 2, 22, 'localtion 1', 200.00, '10 days', '2023-07-31 19:13:17', '2023-07-31 19:13:17'),
(37, 2, 23, 'Location 1', 10.00, '1 day', '2023-08-05 05:42:38', '2023-08-05 05:42:38'),
(38, 2, 24, 'locatin 1', 100.00, '1 days', '2023-08-12 09:03:54', '2023-08-12 09:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `size_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `category_id`, `sub_category_id`, `brand_id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '12 inch', NULL, NULL),
(2, 1, 2, 1, '10 inch', NULL, NULL),
(3, 7, 8, 2, '6 inch', NULL, NULL),
(4, 11, 12, 3, '100g', NULL, NULL),
(5, 11, 12, 3, '200g', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 = Admin, 2 = Merchant 3 = Users ',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `general_layality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1=Male, 2 = Female 0=Special',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=Inactive, 1 = Active',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDelete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=NoDeleted, 1 = Deleted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_superb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_pin` int(11) DEFAULT NULL,
  `pickup_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_superb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_pin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `first_name`, `last_name`, `profile_image`, `address`, `city`, `zip_code`, `general_layality`, `gender`, `status`, `name`, `email`, `email_verified_at`, `password`, `isDelete`, `remember_token`, `created_at`, `updated_at`, `last_login`, `shipping_address`, `shipping_superb`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_pin`, `pickup_address`, `pickup_superb`, `pickup_city`, `pickup_state`, `pickup_country`, `pickup_pin`) VALUES
(1, '1', 'Admin', 'User', 'profile.png', NULL, NULL, NULL, NULL, '0', '0', 'administrator', 'admin@gmail.com', '2023-04-30 07:57:31', '$2y$10$7HxvNzVg/Z7ybu4vfLkaUuOLab78PI2zQ2BbmLozQQk7pVDRXcYsC', '0', NULL, '2023-04-30 07:57:31', '2023-04-30 07:57:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2', 'asassad', 'qq', '1685884628.jpg', 'adadsa', 'sa', 123456, NULL, '0', '0', 'Merchant', 'merchant@yopmail.com', '2023-04-30 07:57:31', '$2y$10$Z0h6e8q4Kh/PhJ3tKfZHCuoBz0aqxEsyHZBN/6UUxqepTqxnNn3fW', '0', NULL, '2023-04-30 07:57:31', '2023-06-04 07:47:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '3', 'User', 'User', 'profile.png', NULL, NULL, NULL, NULL, '0', '0', 'User', 'user@yopmail.com', '2023-04-30 07:57:31', '$2y$10$zOIDwPCdCRgkQbzaegXP1eGDy6p/G8Uc2612F.UuYLa9o4tyYJJB2', '0', NULL, '2023-04-30 07:57:31', '2023-05-27 03:57:46', NULL, 'Jereeth', 'dsdfds', 'gaya', 'gaya', NULL, 123456, 'raj', 'asdsad', 'ss', 'assas', NULL, 12332);

-- --------------------------------------------------------

--
-- Table structure for table `user_order_address`
--

CREATE TABLE `user_order_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suburb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_order_address`
--

INSERT INTO `user_order_address` (`id`, `order_no`, `session_id`, `name`, `address`, `address_type`, `suburb`, `city`, `state`, `country`, `zip_code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'OR_3-1', '22jbepgi0ocv4feopr3basq6ee', 'Sanjeev Kustwar', 'gaya', 'ship_it', 'three', 'gaya', 'Delhi', 'India', '110012', '3', '2023-04-30 08:49:04', '2023-04-30 08:49:09'),
(2, NULL, 'tovc3spjoahl8rcgnu2gi3nfr4', 'sdfds sdf', 'sfdsd', 'ship_it', 'dsds', 'sdsd', 'Delhi', 'India', '123456', '3', '2023-05-03 12:21:09', '2023-05-03 12:21:09'),
(3, NULL, 'tovc3spjoahl8rcgnu2gi3nfr4', 'test ds', 'ss', 'ship_it', 'assad', 'gaya', 'Delhi', 'India', '123456', '3', '2023-05-03 12:41:32', '2023-05-03 12:41:32'),
(4, 'OR_3-3', 'hrsechu9qhuh7a5v1e9va1jsrl', 'test dssd', '1', 'ship_it', '2', '3', 'Delhi', 'India', '3', '3', '2023-05-04 16:04:10', '2023-05-04 23:31:54'),
(5, 'OR_3-3', 'hrsechu9qhuh7a5v1e9va1jsrl', 'test test', 'asa', 'ship_it', 'sd', 'sasa', 'sdfdsfds', NULL, '123456', '3', '2023-05-04 16:46:45', '2023-05-04 23:31:54'),
(6, 'OR_3-3', 'hrsechu9qhuh7a5v1e9va1jsrl', 'Sanjeev kustwar', 'gaya', 'ship_it', 'sdd', 'gaya', 'gaya', NULL, '123456', '3', '2023-05-04 23:28:36', '2023-05-04 23:31:54'),
(7, NULL, 'hrsechu9qhuh7a5v1e9va1jsrl', 'Sanjeev kustwar', 's', 'ship_it', 'as', 'ssadas', 'sdds', NULL, '123456', '3', '2023-05-16 12:27:39', '2023-05-16 12:27:39'),
(8, NULL, 'hrsechu9qhuh7a5v1e9va1jsrl', 'assa sad', 'as', 'ship_it', 'sa', 'sas', '1', NULL, '1111111', '3', '2023-05-16 12:28:29', '2023-05-16 12:28:29'),
(9, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', 'User User', 'test121 1121', 'ship_it', 'tst', 'gaya', 'gaya', NULL, '1234', '3', '2023-05-20 08:40:47', '2023-05-27 04:26:27'),
(10, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', ' ', '1', '', '2', '3', '5', NULL, '4', '3', '2023-05-20 08:43:54', '2023-05-27 04:26:27'),
(11, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', ' ', '1', '', '2', '3', '5', NULL, '4', '3', '2023-05-20 08:44:27', '2023-05-27 04:26:27'),
(12, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-05-27 04:25:43', '2023-05-27 04:26:27'),
(13, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-05-27 04:26:21', '2023-05-27 04:26:27'),
(14, NULL, 'o48ej740k5nt7o1to3m0af2g0l', 'User User', 'raj', 'pick_up', 'asdsad', 'ss', 'assas', NULL, '12332', '3', '2023-05-28 14:37:56', '2023-05-28 14:37:56'),
(15, 'OR_3-6', 'ftqmb58fs15540e3t9ali17iit', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-06-04 07:53:37', '2023-06-04 08:36:37'),
(16, 'OR_3-6', 'ftqmb58fs15540e3t9ali17iit', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-06-04 08:36:31', '2023-06-04 08:36:37'),
(17, NULL, '76ab3kdq32vkvauqn7odrjodl5', 'User User', 'raj', 'pick_up', 'asdsad', 'ss', 'assas', NULL, '12332', '3', '2023-07-30 02:59:14', '2023-07-30 02:59:14'),
(18, 'OR_3-7', 'tndfee1835c563icfr97j470d4', 'User User', 'raj', 'pick_up', 'asdsad', 'ss', 'assas', NULL, '12332', '3', '2023-08-12 09:30:53', '2023-08-12 09:31:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_setting`
--
ALTER TABLE `order_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_log`
--
ALTER TABLE `order_status_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_item_store`
--
ALTER TABLE `product_item_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_total_item_store`
--
ALTER TABLE `product_total_item_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_order_address`
--
ALTER TABLE `user_order_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_setting`
--
ALTER TABLE `order_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_status_log`
--
ALTER TABLE `order_status_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product_item_store`
--
ALTER TABLE `product_item_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_total_item_store`
--
ALTER TABLE `product_total_item_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_order_address`
--
ALTER TABLE `user_order_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
