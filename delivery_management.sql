-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2018 at 10:32 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vallue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `created_at`, `updated_at`, `ref`, `name`, `symbol`, `vallue`) VALUES
(1, '2018-10-20 10:40:56', '2018-10-20 10:40:56', '001', 'dinar', 'DTN', '1.000'),
(2, '2018-10-20 14:12:32', '2018-10-20 14:12:32', '002', 'euro', '£', '1.00'),
(3, '2018-10-20 14:12:56', '2018-10-20 14:14:16', '0003', 'Dollar', '$', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agents`
--

CREATE TABLE `delivery_agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_company_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dln` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_agents`
--

INSERT INTO `delivery_agents` (`id`, `created_at`, `updated_at`, `delivery_company_id`, `phone`, `cin`, `dln`, `photo`) VALUES
(1, '2018-10-20 20:39:28', '2018-10-20 20:39:28', 2, '71500200', '07377830', '1254', 'uploads/JjAwkxoVrrweQPHVVo8fhmKCCWWZ3U4w5nc2VuUS.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_companies`
--

CREATE TABLE `delivery_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencies_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_companies`
--

INSERT INTO `delivery_companies` (`id`, `created_at`, `updated_at`, `ref`, `company_name`, `tva`, `country`, `county`, `city`, `state`, `address`, `lat`, `lng`, `phone`, `phone2`, `fax`, `logo`, `website`, `currencies_id`) VALUES
(2, '2018-10-20 14:18:12', '2018-11-20 17:57:57', '001', 'Hanete', '120/f/m/000', '7', '10', 'Douar Hicher', 'Region', '2086, Douar Hicher Manouba', '10.21453', '36.1205', '71500200', '71500200', '71500200', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_deposits`
--

CREATE TABLE `delivery_deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_company_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_deposits`
--

INSERT INTO `delivery_deposits` (`id`, `created_at`, `updated_at`, `delivery_company_id`, `name`, `country`, `county`, `city`, `state`, `address`, `lat`, `lng`, `phone`, `fax`) VALUES
(1, '2018-10-20 20:47:10', '2018-10-20 20:47:10', 2, 'jamel Nefzi', NULL, NULL, 'Douar Hicher', 'Region', '2086, Douar Hicher Manouba', NULL, NULL, '71500200', '71500200');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_requests`
--

CREATE TABLE `delivery_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_site_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_client_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_client_address_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_company_id` int(10) UNSIGNED DEFAULT NULL,
  `pricedelivery_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_to_pay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencies_id` int(10) UNSIGNED DEFAULT NULL,
  `statuses_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_requests`
--

INSERT INTO `delivery_requests` (`id`, `created_at`, `updated_at`, `ref`, `sender_company_id`, `sender_site_id`, `sender_client_id`, `sender_client_address_id`, `delivery_company_id`, `pricedelivery_price`, `total_to_pay`, `currencies_id`, `statuses_id`, `description`) VALUES
(1, '2018-11-17 20:57:22', '2018-11-29 20:01:26', 'CD01', 1, 1, 1, 2, 2, '112', '320', 3, 2, 'test'),
(2, '2018-11-17 22:23:22', '2018-11-29 20:01:26', '003', 1, 1, 1, 2, 2, '11200', '11500', 3, 2, NULL),
(4, '2018-11-17 23:00:00', '2018-11-27 18:26:02', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(5, '2018-11-17 23:00:00', '2018-11-29 20:17:02', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(6, '2018-11-17 23:00:00', '2018-11-28 19:53:47', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(7, '2018-11-17 23:00:00', '2018-11-29 19:49:44', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(8, '2018-11-17 23:00:00', '2018-11-29 20:17:02', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(9, '2018-11-17 23:00:00', '2018-11-27 18:49:48', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 4, NULL),
(10, '2018-11-17 23:00:00', '2018-11-29 19:14:32', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(11, '2018-11-17 23:00:00', '2018-11-29 19:17:27', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(13, '2018-11-17 23:00:00', '2018-11-29 18:34:51', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 3, 'azazaz'),
(14, '2018-11-17 23:00:00', '2018-11-27 18:20:22', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(15, '2018-11-17 23:00:00', '2018-11-29 19:47:53', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(16, '2018-11-20 17:58:52', '2018-11-20 17:59:05', 'PC tochiba', 1, 1, 1, 2, 2, '1120', '1150', 1, 2, NULL),
(17, '2018-11-21 21:30:53', '2018-11-24 09:02:36', 'CD017', 1, 2, 1, 2, 2, '112', '1', 2, 2, NULL),
(18, '2018-11-23 22:45:55', '2018-11-23 22:45:55', 'CD018', 2, 1, 1, 2, 2, '112', '115', 1, 2, 'azazazaz'),
(19, '2018-11-24 08:01:11', '2018-11-29 18:31:19', '001', 2, 2, 1, 2, 2, '112', NULL, 1, 3, '1212'),
(20, '2018-11-24 08:03:16', '2018-11-29 20:11:59', 'CD020', 2, 2, 1, 2, 2, '112', '250', 1, 2, 'azert'),
(21, '2018-11-28 19:17:05', '2018-11-29 20:27:43', 'CD0001', 1, 1, 1, 2, 2, '112', '115', 3, 4, 'xxxxqxqq'),
(22, '2018-11-28 20:29:59', '2018-11-29 20:27:43', 'ccc', 1, 1, 1, 2, 2, '111', '1111', 2, 4, '111111111111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_requests_old`
--

CREATE TABLE `delivery_requests_old` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_site_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_client_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_client_address_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_company_id` int(10) UNSIGNED DEFAULT NULL,
  `pricedelivery_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_to_pay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencies_id` int(10) UNSIGNED DEFAULT NULL,
  `statuses_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_requests_old`
--

INSERT INTO `delivery_requests_old` (`id`, `created_at`, `updated_at`, `ref`, `sender_company_id`, `sender_site_id`, `sender_client_id`, `sender_client_address_id`, `delivery_company_id`, `pricedelivery_price`, `total_to_pay`, `currencies_id`, `statuses_id`, `description`) VALUES
(1, '2018-11-17 20:57:22', '2018-11-28 19:12:44', 'CD01', 1, 1, 1, 2, 2, '112', '320', 3, 4, NULL),
(2, '2018-11-17 22:23:22', '2018-11-28 19:45:49', '003', 1, 1, 1, 2, 2, '11200', '11500', 3, 1, NULL),
(4, '2018-11-17 23:00:00', '2018-11-27 18:26:02', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(5, '2018-11-17 23:00:00', '2018-11-27 18:40:06', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 4, NULL),
(6, '2018-11-17 23:00:00', '2018-11-28 19:53:47', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(7, '2018-11-17 23:00:00', '2018-11-27 18:39:58', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 4, NULL),
(8, '2018-11-17 23:00:00', '2018-11-27 18:49:48', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 4, NULL),
(9, '2018-11-17 23:00:00', '2018-11-27 18:49:48', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 4, NULL),
(10, '2018-11-17 23:00:00', '2018-11-29 18:35:00', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(11, '2018-11-17 23:00:00', '2018-11-29 18:35:00', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(13, '2018-11-17 23:00:00', '2018-11-29 18:34:51', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 3, 'azazaz'),
(14, '2018-11-17 23:00:00', '2018-11-27 18:20:22', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 2, NULL),
(15, '2018-11-17 23:00:00', '2018-11-28 19:45:40', 'ref', 1, 1, 1, 1, 1, '1400', '1450', 1, 1, NULL),
(16, '2018-11-20 17:58:52', '2018-11-20 17:59:05', 'PC tochiba', 1, 1, 1, 2, 2, '1120', '1150', 1, 2, NULL),
(17, '2018-11-21 21:30:53', '2018-11-24 09:02:36', 'CD017', 1, 2, 1, 2, 2, '112', '1', 2, 2, NULL),
(18, '2018-11-23 22:45:55', '2018-11-23 22:45:55', 'CD018', 2, 1, 1, 2, 2, '112', '115', 1, 2, 'azazazaz'),
(19, '2018-11-24 08:01:11', '2018-11-29 18:31:19', '001', 2, 2, 1, 2, 2, '112', NULL, 1, 3, '1212'),
(20, '2018-11-24 08:03:16', '2018-11-24 08:04:08', 'CD020', 2, 2, 1, 2, 2, '112', '250', 1, 1, 'azert'),
(21, '2018-11-28 19:17:05', '2018-11-28 19:45:00', 'CD0001', 1, 1, 1, 2, 2, '112', '115', 3, 1, 'xxxxqxqq'),
(22, '2018-11-28 20:29:59', '2018-11-28 20:29:59', 'ccc', 1, 1, 1, 2, 2, '111', '1111', 2, 1, '111111111111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_request_items`
--

CREATE TABLE `delivery_request_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_request_id` int(10) UNSIGNED DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_request_items`
--

INSERT INTO `delivery_request_items` (`id`, `created_at`, `updated_at`, `delivery_request_id`, `ref`, `description`, `qty`, `price`, `total`) VALUES
(1, '2018-11-17 20:58:24', '2018-11-17 20:58:24', 1, '001', 'az', '10', '120', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_users`
--

CREATE TABLE `delivery_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_company_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_users`
--

INSERT INTO `delivery_users` (`id`, `created_at`, `updated_at`, `delivery_company_id`, `phone`, `photo`) VALUES
(1, '2018-10-21 11:28:38', '2018-10-21 11:28:38', 2, '71500200', 'uploads/uRc8ZJvRQXKDudaIU7HXnasnMFzSv1M5Wtalc95o.jpeg'),
(2, '2018-11-17 21:02:13', '2018-11-17 21:02:13', 2, '71500200', 'uploads/eIvRqotdMS9GF3GHrlHGURvmZ304vu5ZYvm2ObPa.ico');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtl` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `created_at`, `updated_at`, `ref`, `name`, `slug`, `rtl`) VALUES
(1, '2018-10-20 10:36:35', '2018-10-20 10:36:35', '001', 'Francais', 'fr', 'oui'),
(2, '2018-11-18 20:21:06', '2018-11-18 20:21:06', '002', 'Anglais', 'en', 'non');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_20_113154_create_currencies_table', 2),
(4, '2018_10_20_113154_create_languages_table', 2),
(5, '2018_10_20_113155_create_delivery_agents_table', 2),
(6, '2018_10_20_113155_create_delivery_companies_table', 2),
(7, '2018_10_20_113155_create_delivery_deposits_table', 2),
(8, '2018_10_20_113156_create_delivery_request_items_table', 2),
(9, '2018_10_20_113156_create_delivery_requests_table', 2),
(10, '2018_10_20_113156_create_delivery_users_table', 2),
(11, '2018_10_20_113156_create_sender_categories_table', 2),
(12, '2018_10_20_113157_create_sender_client_addresses_table', 2),
(13, '2018_10_20_113157_create_sender_clients_table', 2),
(14, '2018_10_20_113157_create_sender_companies_table', 2),
(15, '2018_10_20_113158_create_sender_deliveries_table', 2),
(16, '2018_10_20_113158_create_sender_items_table', 2),
(17, '2018_10_20_113158_create_sender_sites_table', 2),
(18, '2018_10_20_113211_create_sender_users_table', 2),
(19, '2018_10_20_152400_alter_delivery_companies_table_1', 3),
(20, '2018_10_20_153036_alter_sender_companies_table_1', 4),
(21, '2014_10_12_000001_create_users_table_update', 5),
(22, '2018_03_22_105416_create_role_table', 5),
(23, '2018_03_22_105418_create_role_table_update', 5),
(24, '2018_03_22_110038_create_permissions_table', 5),
(25, '2018_03_22_112112_create_permission_objects_table', 5),
(26, '2018_03_22_112802_create_role_permissions_table', 5),
(27, '2018_04_17_155012_create_settings_table', 5),
(28, '2018_11_26_190430_create_statuses_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `object_id`, `created_at`, `updated_at`) VALUES
(13, 'create', 'create', 1, '2018-11-18 13:57:14', '2018-11-18 13:57:14'),
(15, 'show', 'show', 1, '2018-11-18 13:57:52', '2018-11-18 13:57:52'),
(16, 'update', 'update', 1, '2018-11-18 13:57:57', '2018-11-18 13:57:57'),
(17, 'delete', 'delete', 1, '2018-11-18 13:58:07', '2018-11-18 13:58:07'),
(18, 'create', 'create', 2, '2018-11-18 13:58:41', '2018-11-18 13:58:41'),
(19, 'show', 'show', 2, '2018-11-18 13:58:44', '2018-11-18 13:58:44'),
(20, 'update', 'update', 2, '2018-11-18 13:58:47', '2018-11-18 13:58:47'),
(21, 'delete', 'delete', 2, '2018-11-18 13:58:52', '2018-11-18 13:58:52'),
(22, 'create', 'create', 3, '2018-11-18 13:58:59', '2018-11-18 13:58:59'),
(23, 'show', 'show', 3, '2018-11-18 13:59:03', '2018-11-18 13:59:03'),
(24, 'update', 'update', 3, '2018-11-18 13:59:06', '2018-11-18 13:59:06'),
(25, 'delete', 'delete', 3, '2018-11-18 13:59:09', '2018-11-18 13:59:09'),
(26, 'create', 'create', 4, '2018-11-18 13:59:19', '2018-11-18 13:59:19'),
(27, 'show', 'show', 4, '2018-11-18 13:59:22', '2018-11-18 13:59:22'),
(28, 'update', 'update', 4, '2018-11-18 13:59:33', '2018-11-18 13:59:33'),
(29, 'delete', 'delete', 4, '2018-11-18 13:59:47', '2018-11-18 13:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `permission_objects`
--

CREATE TABLE `permission_objects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_objects`
--

INSERT INTO `permission_objects` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'settings', 'settings', '2018-11-18 11:31:42', '2018-11-18 11:31:42'),
(2, 'deliveries', 'deliveries', '2018-11-18 12:11:50', '2018-11-18 12:11:50'),
(3, 'senders', 'senders', '2018-11-18 12:11:58', '2018-11-18 12:11:58'),
(4, 'guest', 'guest', '2018-11-18 12:12:04', '2018-11-18 12:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `description`) VALUES
(1, 'superuser', '2018-11-18 11:29:23', '2018-11-18 11:29:23', 'all access'),
(2, 'delivery company', '2018-11-18 11:29:52', '2018-11-18 11:29:52', 'access delivery campanies'),
(3, 'sender company', '2018-11-18 11:30:19', '2018-11-18 11:30:19', 'access order'),
(4, 'delivery agent', '2018-11-18 11:30:46', '2018-11-18 11:30:46', 'access delivery');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 'settings_view-language', 1, '2018-11-18 11:46:47', '2018-11-18 11:53:44'),
(2, 2, '2', 'settings_edit-language', 1, '2018-11-18 11:46:47', '2018-11-18 11:46:47'),
(3, 2, '3', 'settings_view-currency', 1, '2018-11-18 11:46:48', '2018-11-18 11:46:48'),
(4, 2, '4', 'settings_edit-currency', 1, '2018-11-18 11:46:48', '2018-11-18 11:46:48'),
(5, 2, '13', 'settings_create', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(6, 2, '15', 'settings_show', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(7, 2, '16', 'settings_update', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(8, 2, '17', 'settings_delete', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(9, 2, '18', 'deliveries_create', 0, '2018-11-18 14:01:30', '2018-11-20 17:36:01'),
(10, 2, '19', 'deliveries_show', 1, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(11, 2, '20', 'deliveries_update', 1, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(12, 2, '21', 'deliveries_delete', 0, '2018-11-18 14:01:30', '2018-11-20 17:36:01'),
(13, 2, '22', 'senders_create', 1, '2018-11-18 14:01:30', '2018-11-20 17:36:01'),
(14, 2, '23', 'senders_show', 1, '2018-11-18 14:01:30', '2018-11-20 17:36:02'),
(15, 2, '24', 'senders_update', 1, '2018-11-18 14:01:30', '2018-11-20 17:36:02'),
(16, 2, '25', 'senders_delete', 1, '2018-11-18 14:01:30', '2018-11-20 17:36:02'),
(17, 2, '26', 'guest_create', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(18, 2, '27', 'guest_show', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(19, 2, '28', 'guest_update', 1, '2018-11-18 14:01:30', '2018-11-20 17:36:02'),
(20, 2, '29', 'guest_delete', 0, '2018-11-18 14:01:30', '2018-11-18 14:01:30'),
(21, 3, '13', 'settings_create', 0, '2018-11-18 14:01:57', '2018-11-18 14:01:57'),
(22, 3, '15', 'settings_show', 0, '2018-11-18 14:01:58', '2018-11-18 14:01:58'),
(23, 3, '16', 'settings_update', 0, '2018-11-18 14:01:58', '2018-11-18 14:01:58'),
(24, 3, '17', 'settings_delete', 0, '2018-11-18 14:01:58', '2018-11-18 14:01:58'),
(25, 3, '18', 'deliveries_create', 1, '2018-11-18 14:01:58', '2018-11-20 17:37:16'),
(26, 3, '19', 'deliveries_show', 1, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(27, 3, '20', 'deliveries_update', 1, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(28, 3, '21', 'deliveries_delete', 1, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(29, 3, '22', 'senders_create', 0, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(30, 3, '23', 'senders_show', 0, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(31, 3, '24', 'senders_update', 0, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(32, 3, '25', 'senders_delete', 0, '2018-11-18 14:01:58', '2018-11-20 17:37:17'),
(33, 3, '26', 'guest_create', 0, '2018-11-18 14:01:58', '2018-11-18 14:01:58'),
(34, 3, '27', 'guest_show', 0, '2018-11-18 14:01:58', '2018-11-18 14:01:58'),
(35, 3, '28', 'guest_update', 0, '2018-11-18 14:01:58', '2018-11-18 14:01:58'),
(36, 3, '29', 'guest_delete', 0, '2018-11-18 14:01:59', '2018-11-18 14:01:59'),
(37, 4, '13', 'settings_create', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(38, 4, '15', 'settings_show', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(39, 4, '16', 'settings_update', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(40, 4, '17', 'settings_delete', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(41, 4, '18', 'deliveries_create', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(42, 4, '19', 'deliveries_show', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(43, 4, '20', 'deliveries_update', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(44, 4, '21', 'deliveries_delete', 0, '2018-11-18 14:02:09', '2018-11-18 14:02:09'),
(45, 4, '22', 'senders_create', 0, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(46, 4, '23', 'senders_show', 0, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(47, 4, '24', 'senders_update', 0, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(48, 4, '25', 'senders_delete', 0, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(49, 4, '26', 'guest_create', 0, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(50, 4, '27', 'guest_show', 1, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(51, 4, '28', 'guest_update', 1, '2018-11-18 14:02:10', '2018-11-18 14:02:10'),
(52, 4, '29', 'guest_delete', 0, '2018-11-18 14:02:10', '2018-11-18 14:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `sender_categories`
--

CREATE TABLE `sender_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_categories`
--

INSERT INTO `sender_categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-10-20 19:54:04', '2018-10-20 19:54:04', 'Services'),
(2, '2018-10-20 19:54:14', '2018-10-20 19:54:14', 'Produits'),
(3, '2018-10-20 19:54:24', '2018-10-20 19:54:24', 'Consultations'),
(4, '2018-10-20 19:54:50', '2018-10-20 19:54:50', 'Interventions');

-- --------------------------------------------------------

--
-- Table structure for table `sender_clients`
--

CREATE TABLE `sender_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_clients`
--

INSERT INTO `sender_clients` (`id`, `created_at`, `updated_at`, `sender_company_id`, `name`, `last_name`, `email`, `phone`, `phone2`, `cin`) VALUES
(1, '2018-11-17 19:33:58', '2018-11-17 19:33:58', 1, 'jamel Nefzi', 'Nefzi', 'email@email.com', '71500200', '71500200', '07377830');

-- --------------------------------------------------------

--
-- Table structure for table `sender_client_addresses`
--

CREATE TABLE `sender_client_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_client_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_client_addresses`
--

INSERT INTO `sender_client_addresses` (`id`, `created_at`, `updated_at`, `sender_client_id`, `name`, `country`, `county`, `city`, `state`, `address`, `lat`, `lng`) VALUES
(2, '2018-11-17 19:34:31', '2018-11-17 19:34:31', 1, 'jamel Nefzi', '125', '12', 'Douar Hicher', 'Region', '2086, Douar Hicher Manouba', '10.21453', '36.1205');

-- --------------------------------------------------------

--
-- Table structure for table `sender_companies`
--

CREATE TABLE `sender_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_category_id` int(10) UNSIGNED DEFAULT NULL,
  `currencies_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_companies`
--

INSERT INTO `sender_companies` (`id`, `created_at`, `updated_at`, `ref`, `company_name`, `tva`, `country`, `city`, `state`, `adress`, `lat`, `lng`, `phone`, `phone2`, `fax`, `logo`, `website`, `sender_category_id`, `currencies_id`) VALUES
(1, '2018-10-21 11:34:47', '2018-10-21 11:34:47', '001', 'Delivery', '120/f/m/000', NULL, 'Douar Hicher', 'Region', '2086, Douar Hicher Manouba', '10.21453', '36.1205', '71500200', '71500200', '71500200', NULL, NULL, 2, 1),
(2, '2018-11-20 17:54:43', '2018-11-20 17:54:43', '002', 'Purchase', '122/f/m/000', '1', 'Douar Hicher', 'Region', '2086, Douar Hicher Manouba', '10.21453', '36.1205', '71500200', NULL, '71500200', NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sender_deliveries`
--

CREATE TABLE `sender_deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_company_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_deliveries`
--

INSERT INTO `sender_deliveries` (`id`, `created_at`, `updated_at`, `delivery_company_id`, `sender_company_id`, `status`, `note`) VALUES
(1, '2018-10-21 11:36:51', '2018-11-19 21:25:56', 2, 1, 'Livré', 'azaz'),
(2, '2018-11-17 19:37:22', '2018-11-18 18:06:30', 2, 1, 'Livré', 'azaz'),
(3, '2018-11-18 17:52:05', '2018-11-18 18:06:40', 2, 1, 'En route', NULL),
(4, '2018-11-17 23:00:00', '2018-11-18 18:37:11', 2, 1, 'Livré', 'We will also use the default stub for this method since we are dealing with User model.'),
(5, '2018-11-17 23:00:00', '2018-11-18 18:37:17', 2, 1, 'En depot', 'We will also use the default stub for this method since we are dealing with User model.'),
(6, '2018-11-17 23:00:00', '2018-11-18 18:37:37', 2, 1, 'En route', 'We will also use the default stub for this method since we are dealing with User model.'),
(7, '2018-11-17 23:00:00', '2018-11-18 18:37:31', 2, 1, 'En depot', 'We will also use the default stub for this method since we are dealing with User model.'),
(8, '2018-11-17 23:00:00', '2018-11-18 18:37:25', 2, 1, 'En attente', 'We will also use the default stub for this method since we are dealing with User model.');

-- --------------------------------------------------------

--
-- Table structure for table `sender_items`
--

CREATE TABLE `sender_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_items`
--

INSERT INTO `sender_items` (`id`, `created_at`, `updated_at`, `sender_company_id`, `ref`, `description`, `price`, `img`) VALUES
(1, '2018-10-21 11:38:08', '2018-11-20 17:56:08', 1, 'Huawei mate 10 lite', 'Smart phone', '870', 'az'),
(2, '2018-11-17 19:38:42', '2018-11-20 17:56:33', 2, 'Samsung S9', NULL, '2200', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `sender_sites`
--

CREATE TABLE `sender_sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_sites`
--

INSERT INTO `sender_sites` (`id`, `created_at`, `updated_at`, `sender_company_id`, `name`, `country`, `county`, `city`, `state`, `address`, `lat`, `lng`, `phone`, `phone2`, `fax`) VALUES
(1, '2018-10-21 11:38:24', '2018-11-20 17:55:23', 2, 'TEJ Sameh', '1', '1', 'Ville', 'Region', 'Adresse', NULL, NULL, '71500200', NULL, '71500200'),
(2, '2018-11-17 19:39:58', '2018-11-17 19:39:58', 1, 'jamel Nefzi', NULL, NULL, 'Douar Hicher', 'Region', '2086, Douar Hicher Manouba', '10.21453', '36.1205', '71500200', '71500200', '71500200');

-- --------------------------------------------------------

--
-- Table structure for table `sender_users`
--

CREATE TABLE `sender_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_company_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_users`
--

INSERT INTO `sender_users` (`id`, `created_at`, `updated_at`, `sender_company_id`, `phone`, `cin`) VALUES
(1, '2018-10-21 11:39:47', '2018-10-21 11:39:47', 1, '71500200', '07377830'),
(2, '2018-11-17 19:41:00', '2018-11-17 19:41:00', 1, '71500200', '07377830');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `created_at`, `updated_at`, `name`, `label`) VALUES
(1, '2018-11-26 18:09:15', '2018-11-28 20:00:39', 'Enattente', 'En attente'),
(2, '2018-11-26 18:09:28', '2018-11-26 18:09:28', 'Endepot', 'En depot'),
(3, '2018-11-26 18:09:39', '2018-11-26 18:09:39', 'Enroute', 'En route'),
(4, '2018-11-26 18:10:10', '2018-11-26 18:10:10', 'Livré', 'Livré');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `language_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `status`, `language_id`) VALUES
(1, 'jamel Nefzi', 'djameloter@gmail.com', NULL, '$2y$10$iiTwmm/7mAujN/5j11yB/OPIC2d/QJ23TQBfWT08GF0OwfKieCkV2', 'gJYxHq5VV4Kskx11F8C6FVYk6UOzPvCu3idJz2iiOurxL2ZnDvZ4hHvqj141', '2018-10-20 10:29:49', '2018-10-20 10:29:49', 1, 1, 1),
(2, 'jamel Nefzi', 'nefzijamel85@gmail.com', NULL, '$2y$10$55WwYMWpc/9k/Cx8BUfVxOtPhpmzQIeXaWsrLDEkDRf6uzWz9IDCK', '0908Q29IRu8r8VNP69rvCKkGm3aX9yW9RrbrsHDqCyLZDfm4Gc91AMlwSnA1', '2018-11-08 20:08:39', '2018-11-08 20:08:39', 2, 1, 1),
(3, 'taki', 'taki.nefzi@gmail.com', NULL, '$2y$10$1LxMlTOPJNQTLhNxuhKxuOGoWipF86inHOcFOrBkLhyDyPvcaGtkW', 'Qx8MAyjHprmAxT61vptP3GYSCaFPPrVEXuFv4gHsftY2xyrEAmzSGQo1v1v3', '2018-11-17 13:08:15', '2018-11-17 13:08:15', 3, 1, 1),
(4, 'TEJ Sameh', 'hanen.benamer@bkfood.com.tn', NULL, '$2y$10$nCI1VOO4Yw5WjMpD19T/teIzyph1FsIfe3PeXyVVZhmeNkYZY0AlG', 'yyoK6bOtIA5LpKNfDR34UsoVGg2B1F1Osii7ERxobOXmw1xBXkJa5GSZGOnZ', '2018-11-17 13:40:19', '2018-11-17 13:40:19', 4, 1, 1),
(7, 'sara', 'sara.dridi@gmail.com', NULL, '$2y$10$Ch/nxHMSupCF71fS4gxm7ezRofjTEhH2uShs5Is7vv74kRA6lCVmm', 'MaksqyYTmViIEF3n3zhroXcujFXR5AUQ9KkQjsgs60cIUiAJDIznPITfThfG', '2018-11-18 13:44:09', '2018-11-18 13:44:09', 2, 1, 1),
(8, 'zied', 'zeehee@hotmail.com', NULL, '$2y$10$s7ytFbid2kHOXYT8IpRfUuJGcde6VjMVE0EmyM/yjbALZWtfAc142', 'KcmGFdVTi7S6GIJlK5CXLCZ0YxaJMXUjngpwyPWCXMI8O8JHVVkCK3hBqjGi', '2018-11-19 10:20:31', '2018-11-19 10:20:31', 2, 1, 1),
(9, 'dali', 'dali.dridi@email.com', NULL, '$2y$10$B.I.K9YiE5rGAXIRZY58E.3x/ZeuvG33uyiTQUBIzbOnzOP/VQ/pu', 'ZCY5qKdNqENCIlhVbakhGFRL05FQZCHPdZx8MqTigUr6CifV9rDK4TN4ZvmN', '2018-11-19 21:39:45', '2018-11-19 21:39:45', 3, 1, 1),
(10, 'maher', 'maher@dridi.tn', NULL, '$2y$10$Pz6QLE233fOnzRjeyGEt8OXga3jxWrvLxjIJ454XhdQjlYEEqc/lS', NULL, '2018-11-19 21:43:03', '2018-11-19 21:43:03', 3, 1, 1),
(11, 'Aucune contrat', 'sdfsdf@sdf.sdf', NULL, '$2y$10$4lw6AAMU8Y1sNArMiuW./.18YXVtR9KWlrPc/ODhPJ7AqoPR8b8A6', NULL, '2018-11-19 21:52:09', '2018-11-19 21:52:09', 2, 1, 1),
(12, 'yakin', 'yakin@lamjed.samia', NULL, '$2y$10$4aoNOFG.I0bhykuVHgepEubL9dCdVNnQ.0tzx5v..ODODhyKewFPG', NULL, '2018-11-19 23:59:17', '2018-11-19 23:59:17', 4, 1, 1),
(13, 'Ayoub', 'ayoub@nefzi.com', NULL, '$2y$10$mQUXCqy6sC3mOPArudp3o./hwv3uHKpWVWj6HCrRe.8Me46g21u7u', NULL, '2018-11-20 00:06:31', '2018-11-20 00:06:31', 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_agents`
--
ALTER TABLE `delivery_agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_agents_delivery_company_id_index` (`delivery_company_id`);

--
-- Indexes for table `delivery_companies`
--
ALTER TABLE `delivery_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_companies_currencies_id_index` (`currencies_id`);

--
-- Indexes for table `delivery_deposits`
--
ALTER TABLE `delivery_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_deposits_delivery_company_id_index` (`delivery_company_id`);

--
-- Indexes for table `delivery_requests`
--
ALTER TABLE `delivery_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_requests_sender_company_id_index` (`sender_company_id`),
  ADD KEY `delivery_requests_sender_site_id_index` (`sender_site_id`),
  ADD KEY `delivery_requests_sender_client_id_index` (`sender_client_id`),
  ADD KEY `delivery_requests_sender_client_address_id_index` (`sender_client_address_id`),
  ADD KEY `delivery_requests_delivery_company_id_index` (`delivery_company_id`),
  ADD KEY `delivery_requests_currencies_id_index` (`currencies_id`) USING BTREE,
  ADD KEY `statuses_id_index` (`statuses_id`) USING BTREE;

--
-- Indexes for table `delivery_requests_old`
--
ALTER TABLE `delivery_requests_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_requests_sender_company_id_index` (`sender_company_id`),
  ADD KEY `delivery_requests_sender_site_id_index` (`sender_site_id`),
  ADD KEY `delivery_requests_sender_client_id_index` (`sender_client_id`),
  ADD KEY `delivery_requests_sender_client_address_id_index` (`sender_client_address_id`),
  ADD KEY `delivery_requests_delivery_company_id_index` (`delivery_company_id`),
  ADD KEY `delivery_requests_currencies_id_index` (`currencies_id`) USING BTREE,
  ADD KEY `statuses_id_index` (`statuses_id`) USING BTREE;

--
-- Indexes for table `delivery_request_items`
--
ALTER TABLE `delivery_request_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_request_items_delivery_request_id_index` (`delivery_request_id`);

--
-- Indexes for table `delivery_users`
--
ALTER TABLE `delivery_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_users_delivery_company_id_index` (`delivery_company_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_objects`
--
ALTER TABLE `permission_objects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_objects_slug_unique` (`slug`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sender_categories`
--
ALTER TABLE `sender_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sender_clients`
--
ALTER TABLE `sender_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_clients_sender_company_id_index` (`sender_company_id`);

--
-- Indexes for table `sender_client_addresses`
--
ALTER TABLE `sender_client_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_client_addresses_sender_client_id_index` (`sender_client_id`);

--
-- Indexes for table `sender_companies`
--
ALTER TABLE `sender_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_companies_sender_category_id_index` (`sender_category_id`),
  ADD KEY `sender_companies_currencies_id_index` (`currencies_id`);

--
-- Indexes for table `sender_deliveries`
--
ALTER TABLE `sender_deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_deliveries_delivery_company_id_index` (`delivery_company_id`),
  ADD KEY `sender_deliveries_sender_company_id_index` (`sender_company_id`);

--
-- Indexes for table `sender_items`
--
ALTER TABLE `sender_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_items_sender_company_id_index` (`sender_company_id`);

--
-- Indexes for table `sender_sites`
--
ALTER TABLE `sender_sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_sites_sender_company_id_index` (`sender_company_id`);

--
-- Indexes for table `sender_users`
--
ALTER TABLE `sender_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_users_sender_company_id_index` (`sender_company_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_agents`
--
ALTER TABLE `delivery_agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_companies`
--
ALTER TABLE `delivery_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_deposits`
--
ALTER TABLE `delivery_deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_requests`
--
ALTER TABLE `delivery_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `delivery_requests_old`
--
ALTER TABLE `delivery_requests_old`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `delivery_request_items`
--
ALTER TABLE `delivery_request_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_users`
--
ALTER TABLE `delivery_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permission_objects`
--
ALTER TABLE `permission_objects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sender_categories`
--
ALTER TABLE `sender_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sender_clients`
--
ALTER TABLE `sender_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sender_client_addresses`
--
ALTER TABLE `sender_client_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sender_companies`
--
ALTER TABLE `sender_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sender_deliveries`
--
ALTER TABLE `sender_deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sender_items`
--
ALTER TABLE `sender_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sender_sites`
--
ALTER TABLE `sender_sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sender_users`
--
ALTER TABLE `sender_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;