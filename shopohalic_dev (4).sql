-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 02:56 PM
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
(1, 'first', '1664709724.jpg', '2022-10-01 15:11:03', '2022-10-02 05:52:04'),
(2, 'second', '1664709758.jpg', '2022-10-01 15:37:50', '2022-10-02 05:52:38'),
(3, 'third', '1664709779.jpg', '2022-10-02 05:52:59', '2022-10-02 05:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT 0,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `sub_category_id`, `brand_name`) VALUES
(1, 1, NULL, 'Grant'),
(2, 2, 5, 'frock');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `ip_address`, `session_id`, `product_id`, `quantity`, `color`, `size`, `created_at`, `updated_at`) VALUES
(52, '::1', '2tbrdk51ceknqs0vps3iigcdvs', 25, 1, 4, 2, '2023-04-04 12:23:38', '2023-04-04 12:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = Active; 0 = Deactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `parent_id`, `child`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mobiles', 'N/A', 0, '0', NULL, '2022-09-12 09:08:28', '2022-09-27 11:52:34'),
(2, 'Fashion', 'N/A', 1, '0', NULL, '2022-09-22 13:53:32', '2022-09-27 11:52:36'),
(3, 'Electronics', 'N/A', 0, '0', NULL, '2022-09-22 13:53:48', '2022-09-24 06:45:42'),
(4, 'Male', '2', 0, '0', NULL, '2022-09-24 05:40:45', '2022-09-24 05:40:52'),
(5, 'Female', '2', 0, '0', NULL, '2022-09-24 08:50:04', '2022-09-27 11:52:37'),
(6, 'Special Prices', '2', 0, '0', NULL, '2022-09-24 08:50:30', '2022-09-27 11:52:39'),
(7, 'Grocery', 'N/A', 0, '0', NULL, NULL, '2022-09-27 11:52:41'),
(8, 'Beauty', '7', 0, '0', NULL, NULL, '2022-09-27 11:52:43'),
(9, 'Toys', 'N/A', 0, '0', NULL, NULL, NULL),
(10, NULL, 'N/A', 0, '0', '2022-09-29 12:35:01', '2022-09-29 12:34:55', '2022-09-29 12:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `color_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`) VALUES
(1, 'Green', '#4F7942'),
(2, 'Red', '#ff0000'),
(3, 'Blue', '#0000FF'),
(4, 'Yellow', '#FFFF00'),
(5, 'Orange', '#FFA500');

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
(1, 'Commission', '3', '2022-09-11 14:49:02', '2022-09-11 14:49:02'),
(2, 'GST', '15', '2022-09-11 14:49:02', '2022-09-11 14:49:02');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2021_08_03_063942_entrust_setup_tables', 1),
(14, '2022_04_05_070553_add_column_users_table', 1),
(15, '2022_09_03_054743_create_category_table', 1),
(16, '2022_09_03_161741_create_commission_table', 1),
(17, '2022_09_08_075936_create_order_setting_table', 1),
(18, '2022_09_08_150837_update_users_add_coloumn_is_delete_table', 1),
(19, '2022_09_10_115716_create_subscriptions_table', 1),
(21, '2022_09_12_112106_create_products_table', 2),
(23, '2022_09_12_114137_create_product_image_table', 3),
(24, '2022_09_12_161051_create_shipping_costs_table', 4),
(25, '2022_09_22_184845_update_products_add_column_date_range_table', 5),
(26, '2022_09_24_184912_update_category_add_cloumn_child_table', 6),
(27, '2022_10_01_102520_create_banner_table', 7),
(28, '2022_10_08_213649_create_cart_item_table', 8),
(29, '2022_10_18_185652_create_order_item_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `color` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `session_id` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_no`, `product_id`, `quantity`, `price`, `color`, `size`, `session_id`, `ip_address`, `user_id`, `created_at`, `updated_at`) VALUES
(108, 'OR_3-15', 25, 1, NULL, 1, 1, '29ljiqp4tfueu4hs0o06l6ghb3', '::1', 3, '2023-03-09 08:35:36', '2023-03-09 09:44:14'),
(109, 'OR_3-15', 27, 1, NULL, 1, 1, '29ljiqp4tfueu4hs0o06l6ghb3', '::1', 3, '2023-03-09 08:58:41', '2023-03-09 09:44:14'),
(110, 'OR_3-15', 27, 1, 110, 1, 1, '29ljiqp4tfueu4hs0o06l6ghb3', '::1', 3, '2023-03-09 09:09:19', '2023-03-09 09:44:14'),
(111, 'OR_3-15', 26, 1, 70, 1, 1, '29ljiqp4tfueu4hs0o06l6ghb3', '::1', 3, '2023-03-09 09:43:35', '2023-03-09 09:44:14'),
(112, 'OR_3-16', 27, 3, 330, 3, 3, 'g71c5h72qa59tut7spfem3sto4', '::1', 3, '2023-03-18 12:59:49', '2023-03-18 13:21:46'),
(113, 'OR_3-17', 24, 1, 80, 1, 1, '2tbrdk51ceknqs0vps3iigcdvs', '::1', 3, '2023-04-01 07:20:33', '2023-04-01 07:21:30');

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
  `id` int(11) NOT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `session_id` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `response` text DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_no`, `session_id`, `amount`, `user_id`, `status`, `response`, `order_date`, `payment_date`) VALUES
(1, 'OR_3-1', '', 405, 3, 'pending', NULL, '2023-03-03 07:15:00', NULL),
(2, 'OR_3-2', '', 405, 3, 'pending', NULL, '2023-03-03 07:25:00', NULL),
(3, 'OR_3-3', '', 585, 3, 'pending', NULL, '2023-03-03 07:30:00', NULL),
(4, 'OR_3-4', '', 765, 3, 'pending', NULL, '2023-03-03 07:30:00', NULL),
(5, 'OR_3-5', '', 765, 3, 'pending', NULL, '2023-03-03 07:31:00', NULL),
(6, 'OR_3-6', '', 945, 3, 'pending', NULL, '2023-03-03 07:40:00', NULL),
(7, 'OR_3-7', '', 945, 3, 'pending', NULL, '2023-03-03 07:41:00', NULL),
(8, 'OR_3-8', '', 945, 3, 'pending', NULL, '2023-03-03 07:42:00', NULL),
(9, 'OR_3-9', '', 945, 3, 'succeeded', '{\"amount\":945,\"balance_transaction\":\"txn_3MhfC2K7pBe3EMFY1UrmXesj\",\"calculated_statement_descriptor\":\"SHOPAHOLICSALE\",\"captured\":\"succeeded\",\"payment_date\":\"2023-03-03 08:27\",\"currency\":\"usd\",\"object\":null,\"shopping_card_id\":\"ch_3MhfC2K7pBe3EMFY1wy1Ds9U\"}', '2023-03-03 08:19:00', '2023-03-03 08:27:00'),
(10, 'OR_3-10', '', 195, 3, 'pending', NULL, '2023-03-09 02:14:00', NULL),
(11, 'OR_3-11', '29ljiqp4tfueu4hs0o06l6ghb3', 195, 3, 'pending', NULL, '2023-03-09 02:17:00', NULL),
(12, 'OR_3-12', '29ljiqp4tfueu4hs0o06l6ghb3', 615, 3, 'pending', NULL, '2023-03-09 03:11:00', NULL),
(13, 'OR_3-13', '29ljiqp4tfueu4hs0o06l6ghb3', 615, 3, 'pending', NULL, '2023-03-09 03:12:00', NULL),
(14, 'OR_3-14', '29ljiqp4tfueu4hs0o06l6ghb3', 615, 3, 'pending', NULL, '2023-03-09 03:12:00', NULL),
(15, 'OR_3-15', '29ljiqp4tfueu4hs0o06l6ghb3', 785, 3, 'pending', NULL, '2023-03-09 03:14:00', NULL),
(16, 'OR_3-16', 'g71c5h72qa59tut7spfem3sto4', 225, 3, 'pending', NULL, '2023-03-18 06:51:00', NULL),
(17, 'OR_3-17', '2tbrdk51ceknqs0vps3iigcdvs', 195, 3, 'pending', NULL, '2023-04-01 12:51:00', NULL);

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
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `special_price` double(8,2) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_type` enum('till_stock_last','date_range') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'till_stock_last,date_range',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `shipping` int(11) NOT NULL,
  `expected` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `brand`, `category`, `sub_category_id`, `quantity`, `description`, `color`, `size`, `image`, `price`, `special_price`, `status`, `created_by`, `created_at`, `updated_at`, `stock_type`, `start_date`, `end_date`, `shipping`, `expected`) VALUES
(24, 'Product 2', '123', '1', 1, 0, 100, 'rest', '1,3', '1,3', '1674379314.jpg', 100.00, 80.00, '0', 2, '2023-01-22 03:51:54', '2023-01-22 03:51:54', 'till_stock_last', NULL, NULL, 49, 'Expected Delivery Days 1'),
(25, 'product 3', 'test', '2', 2, 5, 200, 'rest', '4,5', '2', '1674379401.jpg', 100.00, 80.00, '0', 2, '2023-01-22 03:53:21', '2023-01-22 03:53:21', 'till_stock_last', NULL, NULL, 49, 'Expected Delivery Days 1'),
(26, 'Product 3', '898e', '1', 1, 0, 300, 'rest', '2,3,5', '1,3', '1674382186.jpg', 90.00, 70.00, '0', 2, '2023-01-22 04:39:46', '2023-01-22 04:39:46', 'till_stock_last', NULL, NULL, 49, 'Expected Delivery Days 1'),
(27, 'product 10', '123 rdsds', '1', 1, 0, 5, 'rest', '1,2', '1,3', '1676045939.jpg', 100.00, 110.00, '0', 2, '2023-02-10 10:48:59', '2023-02-10 10:48:59', 'till_stock_last', NULL, NULL, 49, 'Expected Delivery Days 1');

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
(26, 20, '1669048828.png', '2022-11-21 11:10:28', '2022-11-21 11:10:28'),
(27, 20, '1669048828.jpg', '2022-11-21 11:10:28', '2022-11-21 11:10:28'),
(28, 20, '1669048828.png', '2022-11-21 11:10:28', '2022-11-21 11:10:28'),
(29, 21, '1671642733.jpg', '2022-12-21 11:42:13', '2022-12-21 11:42:13'),
(30, 21, '1671642733.jpg', '2022-12-21 11:42:13', '2022-12-21 11:42:13'),
(31, 21, '1671642733.jpg', '2022-12-21 11:42:13', '2022-12-21 11:42:13'),
(32, 21, '1671642733.jpg', '2022-12-21 11:42:13', '2022-12-21 11:42:13'),
(33, 22, '1671642820.jpg', '2022-12-21 11:43:40', '2022-12-21 11:43:40'),
(34, 22, '1671642820.jpg', '2022-12-21 11:43:40', '2022-12-21 11:43:40'),
(35, 22, '1671642820.jpg', '2022-12-21 11:43:40', '2022-12-21 11:43:40'),
(36, 22, '1671642820.jpg', '2022-12-21 11:43:40', '2022-12-21 11:43:40'),
(37, 23, '1671643076.jpg', '2022-12-21 11:47:56', '2022-12-21 11:47:56'),
(38, 23, '1671643076.jpg', '2022-12-21 11:47:56', '2022-12-21 11:47:56'),
(39, 23, '1671643076.jpg', '2022-12-21 11:47:56', '2022-12-21 11:47:56'),
(40, 23, '1671643076.jpg', '2022-12-21 11:47:56', '2022-12-21 11:47:56'),
(41, 24, '1674379315.jpg', '2023-01-22 03:51:55', '2023-01-22 03:51:55'),
(42, 24, '1674379315.jpg', '2023-01-22 03:51:55', '2023-01-22 03:51:55'),
(43, 24, '1674379315.jpg', '2023-01-22 03:51:55', '2023-01-22 03:51:55'),
(44, 24, '1674379315.jpg', '2023-01-22 03:51:55', '2023-01-22 03:51:55'),
(45, 25, '1674379401.jpg', '2023-01-22 03:53:21', '2023-01-22 03:53:21'),
(46, 25, '1674379401.jpg', '2023-01-22 03:53:21', '2023-01-22 03:53:21'),
(47, 25, '1674379401.jpg', '2023-01-22 03:53:21', '2023-01-22 03:53:21'),
(48, 25, '1674379401.jpg', '2023-01-22 03:53:21', '2023-01-22 03:53:21'),
(49, 26, '1674382186.jpg', '2023-01-22 04:39:46', '2023-01-22 04:39:46'),
(50, 26, '1674382186.jpg', '2023-01-22 04:39:46', '2023-01-22 04:39:46'),
(51, 26, '1674382186.jpg', '2023-01-22 04:39:46', '2023-01-22 04:39:46'),
(52, 26, '1674382186.jpg', '2023-01-22 04:39:46', '2023-01-22 04:39:46'),
(53, 27, '1676045939.jpg', '2023-02-10 10:48:59', '2023-02-10 10:48:59'),
(54, 27, '1676045939.jpg', '2023-02-10 10:48:59', '2023-02-10 10:48:59'),
(55, 27, '1676045939.jpg', '2023-02-10 10:48:59', '2023-02-10 10:48:59'),
(56, 27, '1676045939.jpg', '2023-02-10 10:48:59', '2023-02-10 10:48:59');

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
(1, 'admin', 'Admin maintenance complete website', 'This is super admin role for login', '2022-09-11 14:49:02', '2022-09-11 14:49:02'),
(2, 'merchant', 'merchant', 'merchant', '2022-09-11 14:49:02', '2022-09-11 14:49:02'),
(3, 'users', 'users', 'users', '2022-09-11 14:49:02', '2022-09-11 14:49:02');

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
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shipping_costs`
--

INSERT INTO `shipping_costs` (`id`, `merchant_id`, `location`, `cost`, `created_at`, `updated_at`) VALUES
(49, 2, 'Test 1', 100.00, '2023-01-22 01:14:05', '2023-01-22 01:14:05'),
(50, 2, 'Test 2', 200.00, '2023-01-22 01:14:05', '2023-01-22 01:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `category_id`, `sub_category_id`, `brand_id`, `size_name`) VALUES
(1, 1, 0, 1, '12 inch'),
(2, 2, 5, 2, '24 inch'),
(3, 1, 0, 1, '8 inch');

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
(1, 'sanjeev@amicusinfotech.com', NULL, NULL),
(2, 'sanjeev@amicusinfotech.com', '2023-04-02 11:00:49', '2023-04-02 11:00:49'),
(3, 'sanjeev@amicusinfotech.com', '2023-04-02 11:02:28', '2023-04-02 11:02:28'),
(4, 'merchant@yopmail.com', '2023-04-02 11:06:27', '2023-04-02 11:06:27'),
(5, 'merchant@yopmail.com', '2023-04-02 11:06:35', '2023-04-02 11:06:35');

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
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_layality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('1','2','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Male, 2 = Female 0=Special ',
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1 = Active',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `isDelete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=NoDeleted, 1 = Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_superb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_pin` int(11) NOT NULL,
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_superb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `first_name`, `last_name`, `profile_image`, `address`, `city`, `zip_code`, `general_layality`, `gender`, `mobile`, `status`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `last_login`, `isDelete`, `created_at`, `updated_at`, `shipping_address`, `shipping_superb`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_pin`, `pickup_address`, `pickup_superb`, `pickup_city`, `pickup_state`, `pickup_country`, `pickup_pin`) VALUES
(1, '1', 'Admin', 'User', 'profile.png', NULL, NULL, NULL, NULL, '1', NULL, '1', 'administrator', 'admin@gmail.com', '2022-09-11 14:49:01', '$2y$10$iB.zaj2IsD72BUJ3QtktQegXeaxs/sTT5IHEAf1t5Tnu30bIr4Y.S', NULL, NULL, '0', '2022-09-11 14:49:01', '2022-09-11 14:49:01', '', '', '0', '0', '0', 0, '', '', '0', '0', '0', 0),
(2, '2', 'Merchant', 'Merchant', 'profile.png', NULL, NULL, NULL, NULL, '1', NULL, '1', 'Merchant', 'merchant@yopmail.com', '2022-09-11 14:49:01', '$2y$10$iB.zaj2IsD72BUJ3QtktQegXeaxs/sTT5IHEAf1t5Tnu30bIr4Y.S', NULL, NULL, '0', '2022-09-11 14:49:01', '2023-03-27 12:42:41', '', '', '0', '0', '0', 0, '', '', '0', '0', '0', 0),
(3, '3', 'User', 'User 123', '1672253484.jpg', 'asdas', 'gaya', '123456', 'sdfds', '2', '8800205349', '0', 'User', 'user@yopmail.com', '2022-09-11 14:49:01', '$2y$10$vxaieDqqBeQXvKk4FQR/YugVNurjK.1MIHHwFstLuLg4EatyyIM4e', NULL, NULL, '0', '2022-09-11 14:49:01', '2023-02-09 11:30:41', 'tedst', 'tsdf eewrew', 'gaya', 'Delhi', 'India', 123456, '', '', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_order_address`
--

CREATE TABLE `user_order_address` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_type` varchar(50) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order_address`
--

INSERT INTO `user_order_address` (`id`, `order_no`, `session_id`, `name`, `address`, `address_type`, `suburb`, `city`, `state`, `country`, `zip_code`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'OR_3-15', '29ljiqp4tfueu4hs0o06l6ghb3', 'dsds sd', 'ssdd', 'ship_it', 'ss', 'sdds', 'Delhi', 'India', 123456, 3, '2023-03-09 09:38:42', '2023-03-09 09:44:14'),
(5, 'OR_3-15', '29ljiqp4tfueu4hs0o06l6ghb3', 'rajesh kumar', '123', 'ship_it', '234', '1', 'Delhi', 'India', 1, 3, '2023-03-09 09:44:10', '2023-03-09 09:44:14'),
(6, 'OR_3-16', 'g71c5h72qa59tut7spfem3sto4', 'Rajesh kumar', '1', 'ship_it', 'ddd', '20', 'Delhi', 'India', 123456, 3, '2023-03-18 13:09:23', '2023-03-18 13:21:46'),
(7, 'OR_3-17', '2tbrdk51ceknqs0vps3iigcdvs', 'rajesh kumar', 'sdfsd', 'ship_it', 'ddsdd', 'sfsd', 'Delhi', 'India', 112211, 3, '2023-04-01 07:21:08', '2023-04-01 07:21:30');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `order_setting`
--
ALTER TABLE `order_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_order_address`
--
ALTER TABLE `user_order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
