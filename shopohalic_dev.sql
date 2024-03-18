-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 06:25 PM
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
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_no` varchar(100) DEFAULT NULL,
  `gst` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `merchant_id`, `bank_name`, `account_no`, `gst`) VALUES
(1, 14, '12345678', '123456', 'w22'),
(2, 15, '12345678', '12345678', 'qeqwq'),
(3, 18, 'sdfd', 'sddsfsdfds', '121111');

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
(3, 11, 12, 'Fair & Lovely', NULL, NULL),
(4, 1, 2, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `delivery_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `product_id`, `quantity`, `color`, `size`, `shipping`, `delivery_type`, `ip_address`, `created_at`, `updated_at`) VALUES
(139, '40', '1', NULL, NULL, 49, 'Delhi', '::1', '2024-02-25 13:12:19', '2024-02-25 13:12:19');

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
(4, 'Toy', 'N/A', 1, '0', '2024-02-06 12:14:55', '2023-05-04 23:49:56', '2024-02-06 12:14:55'),
(5, 'Sanjeev', '4', 0, '0', '2023-05-05 01:02:28', '2023-05-04 23:50:32', '2023-05-05 01:02:28'),
(6, 'manish1', '4', 0, '0', '2023-05-05 01:02:25', '2023-05-04 23:55:57', '2023-05-05 01:02:25'),
(7, 'Mobile 2', 'N/A', 1, '0', NULL, '2023-08-05 05:13:33', '2023-08-05 05:14:00'),
(8, 'Mobile Nokia', '7', 0, '0', NULL, '2023-08-05 05:14:00', '2023-08-05 05:14:00'),
(9, 'Femaile', 'N/A', 1, '0', '2023-08-05 05:34:40', '2023-08-05 05:34:16', '2023-08-05 05:34:40'),
(10, 'Cream', '9', 0, '0', '2023-08-05 05:34:37', '2023-08-05 05:34:29', '2023-08-05 05:34:37'),
(11, 'Cream', 'N/A', 1, '0', NULL, '2023-08-05 05:35:05', '2023-08-05 05:35:47'),
(12, 'Facial Cream', '11', 0, '0', NULL, '2023-08-05 05:35:47', '2023-08-05 05:35:47'),
(13, NULL, 'N/A', 0, '0', '2024-02-25 04:08:40', '2024-02-06 12:10:29', '2024-02-25 04:08:40');

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
  `shipping` int(11) DEFAULT NULL,
  `shipping_cost` int(11) DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_no`, `product_id`, `quantity`, `price`, `color`, `size`, `shipping`, `shipping_cost`, `session_id`, `ip_address`, `user_id`, `created_at`, `updated_at`, `token`, `shipping_address`) VALUES
(104, 'OR_3-24', 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2023-09-18 01:43:02', '2023-09-18 01:45:53', 'J3RRhPTHWI', 'Sanjeev, uttam Nagar, uttam nagar, delhi, delhi, 110059'),
(105, 'OR_3-24', 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2023-09-18 01:43:02', '2023-09-18 01:45:53', 'J3RRhPTHWI', 'manish, noida, noida, noida, UP, 200121'),
(106, NULL, 40, 1, 900, NULL, NULL, 50, 0, NULL, NULL, '3', '2023-09-18 01:48:37', '2023-09-18 01:48:37', '8gLypvCxId', 'Pickup'),
(107, NULL, 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2023-09-18 01:48:38', '2023-09-18 01:48:38', '8gLypvCxId', 'Sanjeev, uttam Nagar, uttam nagar, delhi, delhi, 110059'),
(108, NULL, 40, 3, 2700, NULL, NULL, 49, 100, NULL, NULL, '3', '2023-09-18 11:14:58', '2023-09-18 11:14:58', 'b55buiZOBg', 'rajan, 1, 2, 3, 4, 5'),
(109, NULL, 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2023-09-18 11:14:58', '2023-09-18 11:14:58', 'b55buiZOBg', 'aman, 1, 2, 3, 4, 5'),
(110, NULL, 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2023-09-18 11:16:35', '2023-09-18 11:16:35', '6232yvEzXM', 'anand, 1, 2, 3, 4, 5'),
(111, NULL, 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2023-09-18 11:16:35', '2023-09-18 11:16:35', '6232yvEzXM', 'rajan, 1, 2, 3, 4, 5'),
(112, NULL, 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2023-09-18 11:20:06', '2023-09-18 11:20:06', '9jCYx3GCHY', 'rapeush, 1, 2, , ,'),
(113, NULL, 41, 4, 7200, NULL, NULL, 51, 50, NULL, NULL, '3', '2023-09-18 11:20:06', '2023-09-18 11:20:06', '9jCYx3GCHY', 'anand, 1, 2, 3, 4, 5'),
(114, NULL, 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2023-09-18 11:21:22', '2023-09-18 11:21:22', 'p6yVIYulgq', 'anand, 1, 2, 3, 4, 5'),
(115, NULL, 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2023-09-18 11:21:22', '2023-09-18 11:21:22', 'p6yVIYulgq', 'rapeush, 1, 2, , ,'),
(116, NULL, 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2024-01-06 13:07:49', '2024-01-06 13:07:49', 'X4IKiRZjLI', NULL),
(117, NULL, 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2024-01-06 13:07:49', '2024-01-06 13:07:49', 'X4IKiRZjLI', NULL),
(118, NULL, 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2024-01-06 13:08:24', '2024-01-06 13:08:24', 'uKpsHpMSgl', 'test, test addess, test addess, test addess, test addess, 123456'),
(119, NULL, 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2024-01-06 13:08:24', '2024-01-06 13:08:24', 'uKpsHpMSgl', NULL),
(120, 'OR_3-25', 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2024-01-06 13:08:33', '2024-01-06 13:08:46', 'mrNRs2hD1J', 'test, test addess, test addess, test addess, test addess, 123456'),
(121, 'OR_3-25', 41, 1, 1800, NULL, NULL, 51, 50, NULL, NULL, '3', '2024-01-06 13:08:34', '2024-01-06 13:08:46', 'mrNRs2hD1J', 'test, test addess, test addess, test addess, test addess, 123456'),
(122, 'OR_3-26', 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2024-01-06 13:32:12', '2024-01-06 13:32:16', 'OFLRURm1v1', 'test, test addess, test addess, test addess, test addess, 123456'),
(123, 'OR_19-27', 40, 2, 1800, NULL, NULL, 49, 100, NULL, NULL, '19', '2024-01-06 13:52:10', '2024-01-06 13:52:14', 'ixta1Fe4ph', 'test, test, test, test, test,'),
(124, 'OR_3-28', 40, 1, 900, NULL, NULL, 49, 100, NULL, NULL, '3', '2024-02-25 02:10:33', '2024-02-25 02:10:38', 'ix0QVkpAf0', 'test, test addess, test addess, test addess, test addess, 123456');

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
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `payments` (`id`, `order_no`, `token`, `amount`, `user_id`, `status`, `response`, `order_date`, `payment_date`, `order_status`, `created_at`, `updated_at`) VALUES
(4, 'OR_3-4', 'lkqkrn694vem4v120sen4ogshk', 10580, 3, 'succeeded', '{\"amount\":10580,\"balance_transaction\":\"txn_3NCJriK7pBe3EMFY0ZyadbD1\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-05-27 09:56\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NCJriK7pBe3EMFY0VHzM5ET\"}', '2023-05-27 09:56:00', '2023-05-27 09:56:00', 11, NULL, NULL),
(5, 'OR_3-5', 'ftqmb58fs15540e3t9ali17iit', 18860, 3, NULL, NULL, '2023-06-04 01:26:00', NULL, 0, NULL, NULL),
(6, 'OR_3-6', 'ftqmb58fs15540e3t9ali17iit', 18860, 3, 'succeeded', '{\"amount\":18860,\"balance_transaction\":\"txn_3NFHaFK7pBe3EMFY1WSFVRbC\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-06-04 02:07\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NFHaFK7pBe3EMFY1SSEfLpT\"}', '2023-06-04 02:06:00', '2023-06-04 02:07:00', 0, NULL, NULL),
(7, 'OR_3-7', 'tndfee1835c563icfr97j470d4', 1208, 3, NULL, NULL, '2023-08-12 03:01:00', NULL, 0, NULL, NULL),
(8, 'OR_3-8', 'tndfee1835c563icfr97j470d4', 10465, 3, 'succeeded', '{\"amount\":10465,\"balance_transaction\":\"txn_3NfFpRK7pBe3EMFY0ZXv45BL\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-08-15 05:30\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NfFpRK7pBe3EMFY05r0IgXy\"}', '2023-08-15 05:29:00', '2023-08-15 05:30:00', 0, NULL, NULL),
(9, 'OR_3-9', '9id33c4vfrr5c73suuph9qv3cl', 31395, 3, NULL, NULL, '2023-08-18 06:31:00', NULL, 0, NULL, NULL),
(10, 'OR_3-10', '9id33c4vfrr5c73suuph9qv3cl', 52325, 3, NULL, NULL, '2023-08-18 06:32:00', NULL, 0, NULL, NULL),
(11, 'OR_3-11', 'n719jddvv2egmihcalcoc5ku50', 11615, 3, NULL, NULL, '2023-09-03 12:05:00', NULL, 0, NULL, NULL),
(12, 'OR_3-12', 'n719jddvv2egmihcalcoc5ku50', 10695, 3, 'succeeded', '{\"amount\":10695,\"balance_transaction\":\"txn_3NmJvEK7pBe3EMFY0CicV0A8\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-03 05:17\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NmJvEK7pBe3EMFY074usHpN\"}', '2023-09-03 05:16:00', '2023-09-03 05:17:00', 0, NULL, NULL),
(13, 'OR_3-13', 'n719jddvv2egmihcalcoc5ku50', 10695, 3, 'succeeded', '{\"amount\":10695,\"balance_transaction\":\"txn_3NmK8oK7pBe3EMFY0Q34arWd\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-03 05:31\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NmK8oK7pBe3EMFY0SSDAFOF\"}', '2023-09-03 05:22:00', '2023-09-03 05:31:00', 0, NULL, NULL),
(14, 'OR_3-14', 'n719jddvv2egmihcalcoc5ku50', 9430, 3, NULL, NULL, '2023-09-07 06:59:00', NULL, 0, NULL, NULL),
(15, 'OR_3-15', 'n719jddvv2egmihcalcoc5ku50', 9430, 3, NULL, NULL, '2023-09-07 07:03:00', NULL, 0, NULL, NULL),
(16, 'OR_3-16', 'n719jddvv2egmihcalcoc5ku50', 9200, 3, NULL, NULL, '2023-09-07 07:07:00', NULL, 0, NULL, NULL),
(17, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 9430, 3, 'succeeded', '{\"amount\":9430,\"balance_transaction\":\"txn_3Nnna1K7pBe3EMFY1wTkv4ez\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-07 07:09\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3Nnna1K7pBe3EMFY1ZCIUplM\"}', '2023-09-07 07:08:00', '2023-09-07 07:09:00', 0, NULL, NULL),
(18, 'OR_3-18', 'DeS1fDTCDI', 9200, 3, 'succeeded', '{\"amount\":9200,\"balance_transaction\":\"txn_3NnobYK7pBe3EMFY0aVfU98m\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-07 08:15\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NnobYK7pBe3EMFY0TjKjZWb\"}', '2023-09-07 08:13:00', '2023-09-07 08:15:00', 0, NULL, NULL),
(19, 'OR_3-19', 'M8hu3f2yGe', 2128, 3, NULL, NULL, '2023-09-16 02:31:00', NULL, 0, NULL, NULL),
(20, 'OR_3-20', 'l610H9yEIh', 2128, 3, NULL, NULL, '2023-09-16 02:34:00', NULL, 0, NULL, NULL),
(21, 'OR_3-21', 'sZGWWeOWXF', 2128, 3, NULL, NULL, '2023-09-16 04:36:00', NULL, 0, NULL, NULL),
(22, 'OR_3-22', '7ZXr4J9pEw', 1850, 3, 'succeeded', '{\"amount\":1850,\"balance_transaction\":\"txn_3Nr1dKK7pBe3EMFY1gykGBAZ\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-16 04:46\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3Nr1dKK7pBe3EMFY1pERUzqp\"}', '2023-09-16 04:45:00', '2023-09-16 04:46:00', 0, NULL, NULL),
(23, 'OR_3-23', 's4mgUYQXF1', 5700, 3, 'succeeded', '{\"amount\":5700,\"balance_transaction\":\"txn_3Nr1hdK7pBe3EMFY1RSCY3GY\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-16 04:50\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3Nr1hdK7pBe3EMFY10f2vJSx\"}', '2023-09-16 04:50:00', '2023-09-16 04:50:00', 0, NULL, NULL),
(24, 'OR_3-24', 'J3RRhPTHWI', 2850, 3, 'succeeded', '{\"amount\":2850,\"balance_transaction\":\"txn_3NrbgsK7pBe3EMFY0DZaOnD2\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-09-18 07:16\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3NrbgsK7pBe3EMFY0XUHCWil\"}', '2023-09-18 07:15:00', '2023-09-18 07:16:00', 0, NULL, NULL),
(25, 'OR_3-25', 'mrNRs2hD1J', 2850, 3, 'succeeded', '{\"amount\":2850,\"balance_transaction\":\"txn_3OVem0K7pBe3EMFY0pPGV1q6\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2024-01-06 06:39\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3OVem0K7pBe3EMFY0uJuaSIK\"}', '2024-01-06 06:38:00', '2024-01-06 06:39:00', 0, NULL, NULL),
(26, 'OR_3-26', 'OFLRURm1v1', 1000, 3, 'succeeded', '{\"amount\":1000,\"balance_transaction\":\"txn_3OVf8lK7pBe3EMFY1bXTS7pr\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2024-01-06 07:02\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3OVf8lK7pBe3EMFY1xsjmpjz\"}', '2024-01-06 07:02:00', '2024-01-06 07:02:00', 0, NULL, NULL),
(27, 'OR_19-27', 'ixta1Fe4ph', 2000, 19, 'succeeded', '{\"amount\":2000,\"balance_transaction\":\"txn_3OVfS2K7pBe3EMFY1W1vVZcb\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2024-01-06 07:22\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3OVfS2K7pBe3EMFY12KVMkp2\"}', '2024-01-06 07:22:00', '2024-01-06 07:22:00', 0, NULL, NULL),
(28, 'OR_3-28', 'ix0QVkpAf0', 1000, 3, NULL, NULL, '2024-02-25 07:40:00', NULL, 0, NULL, NULL);

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
(40, 'Product 1', 'pro123', NULL, 11, 12, 100, 'test', NULL, NULL, '1694169691.jpg', 1000.00, 900.00, '0', 2, '2023-09-08 05:11:32', '2023-09-08 05:11:32', 'till_stock_last', NULL, NULL, NULL, NULL, '1'),
(41, 'Product 2', 'pro234', NULL, 11, 12, 200, 'test 2', NULL, NULL, '1694169787.jpg', 2000.00, 1800.00, '0', 2, '2023-09-08 05:13:07', '2023-09-11 12:41:17', 'date_range', '2023-09-06', '2023-09-20', NULL, NULL, '0');

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
(85, 24, '1691850834.jpg', '2023-08-12 09:03:54', '2023-08-12 09:03:54'),
(86, 25, '1692207530.jpg', '2023-08-16 12:08:50', '2023-08-16 12:08:50'),
(87, 25, '1692207530.jpg', '2023-08-16 12:08:50', '2023-08-16 12:08:50'),
(88, 25, '1692207530.jpg', '2023-08-16 12:08:50', '2023-08-16 12:08:50'),
(89, 25, '1692207530.jpg', '2023-08-16 12:08:50', '2023-08-16 12:08:50'),
(90, 1, 'sdsdfsd-1692207927.jpg', '2023-08-16 12:15:27', '2023-08-16 12:15:27'),
(91, 1, 'sdsdfsd-1692207927.jpg', '2023-08-16 12:15:27', '2023-08-16 12:15:27'),
(92, 1, 'sdsdfsd-1692207927.jpg', '2023-08-16 12:15:27', '2023-08-16 12:15:27'),
(93, 1, 'sdsdfsd-1692207927.jpg', '2023-08-16 12:15:27', '2023-08-16 12:15:27'),
(94, 1, 'sdsdfsdrand(1,4)1692208051.jpg', '2023-08-16 12:17:31', '2023-08-16 12:17:31'),
(95, 1, 'sdsdfsdrand(1,4)1692208052.jpg', '2023-08-16 12:17:32', '2023-08-16 12:17:32'),
(96, 1, 'sdsdfsdrand(1,4)1692208052.jpg', '2023-08-16 12:17:32', '2023-08-16 12:17:32'),
(97, 1, 'sdsdfsdrand(1,4)1692208052.jpg', '2023-08-16 12:17:32', '2023-08-16 12:17:32'),
(98, 1, 'E:\\xampp_74\\tmp\\php77F9.tmp-1692209531.jpg', '2023-08-16 12:42:11', '2023-08-16 12:42:11'),
(99, 1, 'E:\\xampp_74\\tmp\\php77FA.tmp-1692209531.jpg', '2023-08-16 12:42:11', '2023-08-16 12:42:11'),
(100, 1, 'E:\\xampp_74\\tmp\\php77FB.tmp-1692209531.jpg', '2023-08-16 12:42:11', '2023-08-16 12:42:11'),
(101, 1, 'E:\\xampp_74\\tmp\\php77FC.tmp-1692209531.jpg', '2023-08-16 12:42:11', '2023-08-16 12:42:11'),
(102, 26, '0-1692210488.jpg', '2023-08-16 12:58:08', '2023-08-16 12:58:08'),
(103, 26, '1-1692210488.jpg', '2023-08-16 12:58:08', '2023-08-16 12:58:08'),
(104, 26, '2-1692210488.jpg', '2023-08-16 12:58:08', '2023-08-16 12:58:08'),
(105, 26, '3-1692210488.jpg', '2023-08-16 12:58:08', '2023-08-16 12:58:08'),
(106, 27, '0-1692375043.jpg', '2023-08-18 10:40:43', '2023-08-18 10:40:43'),
(107, 27, '1-1692375043.jpg', '2023-08-18 10:40:43', '2023-08-18 10:40:43'),
(108, 27, '2-1692375043.jpg', '2023-08-18 10:40:43', '2023-08-18 10:40:43'),
(109, 28, '0-1692981841.jpg', '2023-08-25 11:14:01', '2023-08-25 11:14:01'),
(110, 28, '1-1692981841.jpg', '2023-08-25 11:14:01', '2023-08-25 11:14:01'),
(111, 28, '2-1692981841.jpg', '2023-08-25 11:14:01', '2023-08-25 11:14:01'),
(112, 28, '3-1692981841.jpg', '2023-08-25 11:14:01', '2023-08-25 11:14:01'),
(113, 29, '0-1693120464.jpg', '2023-08-27 01:44:24', '2023-08-27 01:44:24'),
(114, 29, '1-1693120464.jpg', '2023-08-27 01:44:24', '2023-08-27 01:44:24'),
(115, 29, '2-1693120464.jpg', '2023-08-27 01:44:24', '2023-08-27 01:44:24'),
(116, 29, '3-1693120464.jpg', '2023-08-27 01:44:24', '2023-08-27 01:44:24'),
(117, 30, '0-1693125969.jpg', '2023-08-27 03:16:09', '2023-08-27 03:16:09'),
(118, 30, '1-1693125969.jpg', '2023-08-27 03:16:09', '2023-08-27 03:16:09'),
(119, 30, '2-1693125969.jpg', '2023-08-27 03:16:09', '2023-08-27 03:16:09'),
(120, 30, '3-1693125969.jpg', '2023-08-27 03:16:09', '2023-08-27 03:16:09'),
(121, 31, '0-1693126192.jpg', '2023-08-27 03:19:52', '2023-08-27 03:19:52'),
(122, 31, '1-1693126192.jpg', '2023-08-27 03:19:52', '2023-08-27 03:19:52'),
(123, 31, '2-1693126192.jpg', '2023-08-27 03:19:52', '2023-08-27 03:19:52'),
(124, 31, '3-1693126192.jpg', '2023-08-27 03:19:52', '2023-08-27 03:19:52'),
(125, 32, '0-1693126245.jpg', '2023-08-27 03:20:45', '2023-08-27 03:20:45'),
(126, 32, '1-1693126245.jpg', '2023-08-27 03:20:45', '2023-08-27 03:20:45'),
(127, 32, '2-1693126245.jpg', '2023-08-27 03:20:45', '2023-08-27 03:20:45'),
(128, 32, '3-1693126245.jpg', '2023-08-27 03:20:45', '2023-08-27 03:20:45'),
(129, 33, '0-1693126296.jpg', '2023-08-27 03:21:36', '2023-08-27 03:21:36'),
(130, 33, '1-1693126296.jpg', '2023-08-27 03:21:36', '2023-08-27 03:21:36'),
(131, 33, '2-1693126296.jpg', '2023-08-27 03:21:36', '2023-08-27 03:21:36'),
(132, 33, '3-1693126296.jpg', '2023-08-27 03:21:36', '2023-08-27 03:21:36'),
(133, 34, '0-1693126310.jpg', '2023-08-27 03:21:50', '2023-08-27 03:21:50'),
(134, 34, '1-1693126310.jpg', '2023-08-27 03:21:50', '2023-08-27 03:21:50'),
(135, 34, '2-1693126310.jpg', '2023-08-27 03:21:50', '2023-08-27 03:21:50'),
(136, 34, '3-1693126310.jpg', '2023-08-27 03:21:50', '2023-08-27 03:21:50'),
(137, 35, '0-1693126358.jpg', '2023-08-27 03:22:38', '2023-08-27 03:22:38'),
(138, 35, '1-1693126358.jpg', '2023-08-27 03:22:38', '2023-08-27 03:22:38'),
(139, 35, '2-1693126358.jpg', '2023-08-27 03:22:38', '2023-08-27 03:22:38'),
(140, 35, '3-1693126358.jpg', '2023-08-27 03:22:38', '2023-08-27 03:22:38'),
(141, 36, '0-1693134929.jpg', '2023-08-27 05:45:29', '2023-08-27 05:45:29'),
(142, 36, '1-1693134929.jpg', '2023-08-27 05:45:29', '2023-08-27 05:45:29'),
(143, 36, '2-1693134929.jpg', '2023-08-27 05:45:29', '2023-08-27 05:45:29'),
(144, 36, '3-1693134929.jpg', '2023-08-27 05:45:29', '2023-08-27 05:45:29'),
(145, 39, '0-1694030764.jpg', '2023-09-06 14:36:04', '2023-09-06 14:36:04'),
(146, 39, '1-1694030764.jpg', '2023-09-06 14:36:04', '2023-09-06 14:36:04'),
(147, 39, '2-1694030764.jpg', '2023-09-06 14:36:04', '2023-09-06 14:36:04'),
(148, 39, '3-1694030764.jpg', '2023-09-06 14:36:04', '2023-09-06 14:36:04'),
(149, 40, '0-1694169692.jpg', '2023-09-08 05:11:32', '2023-09-08 05:11:32'),
(150, 40, '1-1694169692.jpg', '2023-09-08 05:11:32', '2023-09-08 05:11:32'),
(151, 40, '2-1694169692.jpg', '2023-09-08 05:11:32', '2023-09-08 05:11:32'),
(152, 40, '3-1694169692.jpg', '2023-09-08 05:11:32', '2023-09-08 05:11:32'),
(153, 41, '0-1694169787.jpg', '2023-09-08 05:13:07', '2023-09-08 05:13:07'),
(154, 41, '1-1694169787.jpg', '2023-09-08 05:13:07', '2023-09-08 05:13:07'),
(155, 41, '2-1694169787.jpg', '2023-09-08 05:13:07', '2023-09-08 05:13:07'),
(156, 41, '3-1694169787.jpg', '2023-09-08 05:13:07', '2023-09-08 05:13:07'),
(157, 42, '0-1694872739.jpg', '2023-09-16 08:28:59', '2023-09-16 08:28:59'),
(158, 42, '1-1694872739.jpg', '2023-09-16 08:28:59', '2023-09-16 08:28:59'),
(159, 42, '2-1694872739.jpg', '2023-09-16 08:28:59', '2023-09-16 08:28:59'),
(160, 42, '3-1694872739.jpg', '2023-09-16 08:28:59', '2023-09-16 08:28:59'),
(161, 43, '0-1694873174.jpg', '2023-09-16 08:36:14', '2023-09-16 08:36:14'),
(162, 43, '1-1694873174.jpg', '2023-09-16 08:36:14', '2023-09-16 08:36:14'),
(163, 43, '2-1694873174.jpg', '2023-09-16 08:36:14', '2023-09-16 08:36:14'),
(164, 43, '3-1694873174.jpg', '2023-09-16 08:36:14', '2023-09-16 08:36:14'),
(165, 44, '0-1694873281.jpg', '2023-09-16 08:38:01', '2023-09-16 08:38:01'),
(166, 44, '1-1694873281.jpg', '2023-09-16 08:38:01', '2023-09-16 08:38:01'),
(167, 44, '2-1694873281.jpg', '2023-09-16 08:38:01', '2023-09-16 08:38:01'),
(168, 44, '3-1694873281.jpg', '2023-09-16 08:38:01', '2023-09-16 08:38:01'),
(169, 45, '0-1694873391.jpg', '2023-09-16 08:39:51', '2023-09-16 08:39:51'),
(170, 45, '1-1694873391.jpg', '2023-09-16 08:39:51', '2023-09-16 08:39:51'),
(171, 45, '2-1694873391.jpg', '2023-09-16 08:39:51', '2023-09-16 08:39:51'),
(172, 45, '3-1694873391.jpg', '2023-09-16 08:39:51', '2023-09-16 08:39:51'),
(173, 46, '0-1694873443.jpg', '2023-09-16 08:40:43', '2023-09-16 08:40:43'),
(174, 46, '1-1694873443.jpg', '2023-09-16 08:40:43', '2023-09-16 08:40:43'),
(175, 46, '2-1694873443.jpg', '2023-09-16 08:40:43', '2023-09-16 08:40:43'),
(176, 46, '3-1694873443.jpg', '2023-09-16 08:40:43', '2023-09-16 08:40:43'),
(177, 47, '0-1694873462.jpg', '2023-09-16 08:41:02', '2023-09-16 08:41:02'),
(178, 47, '1-1694873462.jpg', '2023-09-16 08:41:02', '2023-09-16 08:41:02'),
(179, 47, '2-1694873463.jpg', '2023-09-16 08:41:03', '2023-09-16 08:41:03'),
(180, 47, '3-1694873463.jpg', '2023-09-16 08:41:03', '2023-09-16 08:41:03'),
(181, 48, '0-1694873795.jpg', '2023-09-16 08:46:35', '2023-09-16 08:46:35'),
(182, 49, '0-1694874009.jpg', '2023-09-16 08:50:09', '2023-09-16 08:50:09');

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
-- Table structure for table `product_sales_record`
--

CREATE TABLE `product_sales_record` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `product_total_sales_record`
--

CREATE TABLE `product_total_sales_record` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `left_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_total_sales_record`
--

INSERT INTO `product_total_sales_record` (`id`, `product_id`, `product_quantity`, `sales_quantity`, `left_quantity`) VALUES
(1, 27, 100, 55, 45),
(2, 28, 10, 7, 3),
(3, 37, 100, 0, 0),
(4, 39, 150, 102, 48),
(5, 40, 100, 7, 93),
(6, 41, 200, 5, 195),
(7, 42, 200, 0, 200),
(8, 43, 50, 0, 50),
(9, 44, 40, 0, 40),
(10, 45, 60, 0, 60),
(11, 46, 60, 0, 60),
(12, 47, 60, 0, 60),
(13, 48, 700, 0, 700),
(14, 49, 20, 0, 20);

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
(3, 3),
(4, 3),
(6, 3),
(7, 3),
(10, 2),
(12, 2),
(14, 2),
(15, 2),
(16, 3),
(17, 3),
(18, 2),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3);

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
(38, 2, 24, 'locatin 1', 100.00, '1 days', '2023-08-12 09:03:54', '2023-08-12 09:03:54'),
(39, 2, 25, 'testing', 100.00, '1 days', '2023-08-16 12:08:50', '2023-08-16 12:08:50'),
(40, 2, 1, 'd', 11.00, '1', '2023-08-16 12:17:32', '2023-08-16 12:17:32'),
(41, 2, 1, 'sfsdfds', 100.00, '1 days', '2023-08-16 12:42:11', '2023-08-16 12:42:11'),
(42, 2, 26, 'testing', 10.00, '1 days', '2023-08-16 12:58:08', '2023-08-16 12:58:08'),
(43, 2, 26, 'Pickup', 0.00, '0 Days', '2023-08-16 12:58:08', '2023-08-16 12:58:08'),
(44, 2, 27, 'testing', 100.00, '1 days', '2023-08-18 10:40:43', '2023-08-18 10:40:43'),
(45, 2, 28, 'location 1', 200.00, '1 days', '2023-08-25 11:14:01', '2023-08-25 11:14:01'),
(46, 2, 29, 'location 1', 100.00, '1 days', '2023-08-27 01:44:24', '2023-08-27 01:44:24'),
(47, 2, 36, 'localion 1', 200.00, '1 days', '2023-08-27 05:45:29', '2023-08-27 05:45:29'),
(48, 2, 36, 'Pickup', 0.00, '0 Days', '2023-08-27 05:45:29', '2023-08-27 05:45:29'),
(49, 2, 40, 'Delhi', 100.00, '1 days', '2023-09-08 05:11:32', '2023-09-08 05:11:32'),
(50, 2, 40, 'Pickup', 0.00, '0 Days', '2023-09-08 05:11:32', '2023-09-08 05:11:32'),
(51, 2, 41, 'Mumbai', 50.00, '2 days', '2023-09-08 05:13:07', '2023-09-08 05:13:07'),
(52, 2, 49, 'gaya', 100.00, '3 days', '2023-09-16 08:50:09', '2023-09-16 08:50:09'),
(53, 2, 49, 'Pickup', 0.00, '0 Days', '2023-09-16 08:50:09', '2023-09-16 08:50:09');

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

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sanjeevkustwar@gmail.com', '2024-01-03 12:42:24', '2024-01-03 12:42:24'),
(2, 'sanjeevkustwar@gmail.com', '2024-01-03 12:42:25', '2024-01-03 12:42:25');

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
  `phone` bigint(20) DEFAULT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
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

INSERT INTO `users` (`id`, `user_role`, `first_name`, `last_name`, `profile_image`, `address`, `city`, `zip_code`, `general_layality`, `gender`, `status`, `name`, `email`, `phone`, `token`, `email_verified_at`, `password`, `isDelete`, `remember_token`, `created_at`, `updated_at`, `last_login`, `shipping_address`, `shipping_superb`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_pin`, `pickup_address`, `pickup_superb`, `pickup_city`, `pickup_state`, `pickup_country`, `pickup_pin`) VALUES
(1, '1', 'Admin', 'User', 'profile.png', NULL, NULL, NULL, NULL, '0', '0', 'administrator', 'admin@gmail.com', NULL, NULL, '2023-04-30 13:27:31', '$2y$10$7HxvNzVg/Z7ybu4vfLkaUuOLab78PI2zQ2BbmLozQQk7pVDRXcYsC', '0', NULL, '2023-04-30 07:57:31', '2023-04-30 07:57:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2', 'asassad', 'qq', '1685884628.jpg', NULL, NULL, NULL, NULL, '0', '0', 'Merchant', 'merchant@yopmail.com', NULL, NULL, '2023-04-30 13:27:31', '$2y$10$Z0h6e8q4Kh/PhJ3tKfZHCuoBz0aqxEsyHZBN/6UUxqepTqxnNn3fW', '0', NULL, '2023-04-30 07:57:31', '2024-02-25 13:00:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '3', 'User', 'User', 'profile.png', NULL, NULL, NULL, NULL, '0', '0', 'User', 'user@yopmail.com', NULL, NULL, '2023-04-30 13:27:31', '$2y$10$zOIDwPCdCRgkQbzaegXP1eGDy6p/G8Uc2612F.UuYLa9o4tyYJJB2', '0', NULL, '2023-04-30 07:57:31', '2023-05-27 03:57:46', NULL, 'Jereeth', 'dsdfds', 'gaya', 'gaya', NULL, 123456, 'raj', 'asdsad', 'ss', 'assas', NULL, 12332),
(4, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 'Sanjeev', 'sanjeevkustwar@gmail.com', NULL, NULL, '2023-12-07 00:21:37', '$2y$10$zOIDwPCdCRgkQbzaegXP1eGDy6p/G8Uc2612F.UuYLa9o4tyYJJB2', '0', 'qbId29hL8bjqfWGZd1qM3XVsF8KVkByZ8YDWB6fI8yXNjfN942Alu8KIFGSb', '2023-12-18 13:18:49', '2023-12-18 13:18:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 'Rakwsh', 'dfd@dddd.com', NULL, NULL, NULL, '$2y$10$iepR.i.vWBrKmXRHCGF7vebqMz47ZFnuLka2kKaumMJUSk7Q68hyS', '0', NULL, '2023-12-24 03:27:04', '2023-12-24 03:27:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 'Rakwsh', 'dfd@dddd.com1', NULL, NULL, NULL, '$2y$10$L7tdnM03fZ2A5RlRhT9F2uhnpM/NVorwgLVHR9cpovNPu2txC5zAm', '0', NULL, '2023-12-24 03:28:01', '2023-12-24 03:28:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 'repesh', 'repesh@ddd.cc', NULL, NULL, NULL, '$2y$10$6ERIkBgVauMNE/3tj7xRa.DmIS8Us1rJDBaFZAfgKtq6H/HEsxK2.', '0', NULL, '2023-12-24 03:29:54', '2023-12-24 03:29:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 'Sanjeev', 'Kustwar', NULL, '1', '1', 123456, '1', '0', '0', NULL, 'ssss@sddsf.com', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-24 15:15:45', '2023-12-24 15:15:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 'sumar', 'sss', NULL, '11', 'sss', 123456, 'sssd', '0', '0', NULL, 'ddss@wew.cdd', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-24 15:16:58', '2023-12-24 15:16:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 'sumar', 'sss', NULL, '11', 'sss', 123456, 'sssd', '0', '0', NULL, 'ddss@wew.cdd1', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-24 15:17:49', '2023-12-24 15:17:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 'sumar', 'sss', NULL, '11', 'sss', 123456, 'sssd', '0', '0', NULL, 'ddss@wew.cddw', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-24 15:18:20', '2023-12-24 15:18:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2', 'Sanjeev', 'Kustwar', NULL, '12111', '123', 123456, '12345', '0', '0', NULL, 'sanjeevv@dds.cdd', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-24 15:23:04', '2023-12-24 15:23:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '3', 'Sanjeev', 'kustwar', NULL, 'gaya', 'gaya', 123456, 'gaya', '0', '0', NULL, 'ss@ddd.cc', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-28 12:59:40', '2023-12-28 12:59:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '3', 'Sanjeev', 'kustwar', NULL, 'gaya', 'gaya', 123456, 'gaya', '0', '0', NULL, 'ss@ddd.cc1', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-28 13:01:46', '2023-12-28 13:01:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2', 'Rajesh', 'Kumar', NULL, '123456', 'gaya', 123456, 'sddg', '0', '0', NULL, 'rajesh@merchant.ww', 1234567, NULL, NULL, '12345678', '0', NULL, '2023-12-28 13:03:15', '2023-12-28 13:03:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '3', 'Rajesh', 'Kumar', NULL, 'gaya', 'gaya', 123456, '123456', '0', '0', NULL, 'rajesh@sss.dd', 1234567, NULL, NULL, '$2y$10$mi0oPG/S/aIiZYDAotgzY.KF8KRljBe78/NHNaBc1TZ5w2y.HYDkS', '0', NULL, '2024-01-06 13:50:46', '2024-01-06 13:50:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '3', 'Raman', 'Kumar', NULL, 'Delhi', 'Delhi', 123456, 'Delhi', '0', '1', NULL, 'raman@test.test', 1234567, NULL, NULL, '$2y$10$tm0ZSnQ52U/w/8Bxft/bBuxF4ssZd3ury4PX9lms82HC8cTZybOFG', '0', NULL, '2024-01-07 04:27:43', '2024-01-07 04:27:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '3', 'rajesh', 'kumar', NULL, '11', '1', 123456, '1', '0', '0', NULL, 'rajesh@raj.df', 1234567, NULL, NULL, '$2y$10$mCmtoe3fjjpPhjkzGW/qYuY0NOfSi1Y5ob0arWb5DHyGjb1ByrP1G', '0', NULL, '2024-02-17 12:41:04', '2024-02-17 12:41:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '3', 'mukesh', 'kumar', NULL, '1', '1', 123456, '1', '0', '0', NULL, 'mukesh@ddd.dd', 1234567, NULL, NULL, '$2y$10$TbSRQRHPr3yBS6G92iqcxepJNIzi6mJkAGqomkxbtFdhOetvn3WV.', '0', NULL, '2024-02-17 12:55:56', '2024-02-17 12:55:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '3', 'ajay', 'mahto', NULL, '12', 'gsd', 123456, 'asdfgh', '0', '0', NULL, 'ajay@ddd.ssdd', 1234567, NULL, '2024-02-17 06:27:16', '$2y$10$ixjXCoA.GOkTBi/iY5Zv2.fgDrphek/A.7lyHAtQNgTXe4Q8SLOdi', '0', NULL, '2024-02-17 12:57:16', '2024-02-17 12:57:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '3', 'Munna', 'kumar', NULL, '1', '111', 123456, '123456', '0', '0', NULL, 'munnakumar@munna.com', 1234567, '276037', '2024-02-17 06:31:15', '$2y$10$TDeNhUoY5LfVN.g3F4kVEehie0awwwGqCotM9m..adbafAQLqxEzi', '0', NULL, '2024-02-17 13:01:15', '2024-02-17 13:01:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_delivery_address`
--

CREATE TABLE `user_delivery_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_delivery_address`
--

INSERT INTO `user_delivery_address` (`id`, `user_id`, `delivery_address`) VALUES
(38, 19, 'test, test, test, test, test,'),
(39, 3, 'test, test addess, test addess, test addess, test addess, 123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_address`
--

CREATE TABLE `user_order_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `user_order_address` (`id`, `order_no`, `token`, `name`, `address`, `address_type`, `suburb`, `city`, `state`, `country`, `zip_code`, `user_id`, `created_at`, `updated_at`) VALUES
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
(18, 'OR_3-8', 'tndfee1835c563icfr97j470d4', 'User User', 'raj', 'pick_up', 'asdsad', 'ss', 'assas', NULL, '12332', '3', '2023-08-12 09:30:53', '2023-08-14 23:59:43'),
(19, 'OR_3-8', 'tndfee1835c563icfr97j470d4', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-08-14 23:59:39', '2023-08-14 23:59:43'),
(20, 'OR_3-10', '9id33c4vfrr5c73suuph9qv3cl', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-08-18 12:58:29', '2023-08-18 13:02:45'),
(21, 'OR_3-10', '9id33c4vfrr5c73suuph9qv3cl', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-08-18 13:02:35', '2023-08-18 13:02:45'),
(22, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-02 14:41:14', '2023-09-07 13:38:58'),
(23, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-03 06:35:37', '2023-09-07 13:38:58'),
(24, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-03 11:46:52', '2023-09-07 13:38:58'),
(25, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-03 11:52:04', '2023-09-07 13:38:58'),
(26, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 01:46:08', '2023-09-07 13:38:58'),
(27, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:22:15', '2023-09-07 13:38:58'),
(28, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:25:11', '2023-09-07 13:38:58'),
(29, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:25:55', '2023-09-07 13:38:58'),
(30, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:28:43', '2023-09-07 13:38:58'),
(31, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:32:55', '2023-09-07 13:38:58'),
(32, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:35:09', '2023-09-07 13:38:58'),
(33, 'OR_3-17', 'n719jddvv2egmihcalcoc5ku50', 'User User', 'Jereeth', 'ship_it', 'dsdfds', 'gaya', 'gaya', NULL, '123456', '3', '2023-09-07 13:38:43', '2023-09-07 13:38:58'),
(34, 'OR_3-18', 'DeS1fDTCDI', 'User User', 'raj', 'pick_up', 'asdsad', 'ss', 'assas', NULL, '12332', '3', '2023-09-07 14:41:53', '2023-09-07 14:43:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_sales_record`
--
ALTER TABLE `product_sales_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_total_item_store`
--
ALTER TABLE `product_total_item_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_total_sales_record`
--
ALTER TABLE `product_total_sales_record`
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
-- Indexes for table `user_delivery_address`
--
ALTER TABLE `user_delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order_address`
--
ALTER TABLE `user_order_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `product_item_store`
--
ALTER TABLE `product_item_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_sales_record`
--
ALTER TABLE `product_sales_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_total_item_store`
--
ALTER TABLE `product_total_item_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_total_sales_record`
--
ALTER TABLE `product_total_sales_record`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_delivery_address`
--
ALTER TABLE `user_delivery_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_order_address`
--
ALTER TABLE `user_order_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
