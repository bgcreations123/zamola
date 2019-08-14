-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2019 at 09:32 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zamola`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(28, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(29, 6, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(30, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(31, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(32, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(33, 7, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(34, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(35, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(36, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(37, 8, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(38, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(39, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(40, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(41, 9, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(42, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(43, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-07-26 23:01:55', '2019-07-26 23:01:55'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-07-26 23:01:55', '2019-07-26 23:01:55'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-07-26 23:01:55', '2019-07-26 23:01:55'),
(6, 'statuses', 'statuses', 'Status', 'Statuses', 'voyager-puzzle', 'App\\Status', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"id\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":\"name\"}', '2019-07-30 23:40:40', '2019-07-30 23:40:40'),
(7, 'packages', 'packages', 'Package', 'Packages', NULL, 'App\\Package', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-08-12 15:17:43', '2019-08-12 15:17:43'),
(8, 'shipment_categories', 'shipment-categories', 'Shipment Category', 'Shipment Categories', 'voyager-tag', 'App\\Shipment_category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-08-12 15:27:23', '2019-08-12 15:32:08'),
(9, 'payment_methods', 'payment-methods', 'Payment Method', 'Payment Methods', 'voyager-credit-card', 'App\\Payment_method', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-08-12 15:27:41', '2019-08-12 15:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-07-26 23:01:57', '2019-07-26 23:01:57'),
(2, 'frontend_menu', '2019-07-27 01:36:18', '2019-07-27 01:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-07-26 23:01:57', '2019-07-26 23:01:57', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2019-07-26 23:01:57', '2019-07-30 23:45:41', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 4, '2019-07-26 23:01:57', '2019-07-30 23:45:41', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 3, '2019-07-26 23:01:57', '2019-07-30 23:45:41', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 6, '2019-07-26 23:01:57', '2019-07-30 23:45:41', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-07-26 23:01:57', '2019-07-30 23:45:22', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-07-26 23:01:57', '2019-07-30 23:45:22', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-07-26 23:01:57', '2019-07-30 23:45:22', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-07-26 23:01:57', '2019-07-30 23:45:22', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 7, '2019-07-26 23:01:57', '2019-07-30 23:45:41', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-07-26 23:02:01', '2019-07-30 23:45:22', 'voyager.hooks', NULL),
(12, 2, 'Home', '', '_self', NULL, '#000000', NULL, 15, '2019-07-27 01:37:02', '2019-07-27 01:39:51', NULL, ''),
(15, 1, 'Statuses', '', '_self', 'voyager-puzzle', NULL, 16, 3, '2019-07-30 23:40:40', '2019-08-12 15:28:19', 'voyager.statuses.index', NULL),
(16, 1, 'Configurations', '', '_self', 'voyager-params', '#000000', NULL, 2, '2019-07-30 23:44:50', '2019-07-30 23:47:08', NULL, ''),
(17, 1, 'Packages', '', '_self', NULL, NULL, 16, 4, '2019-08-12 15:17:44', '2019-08-12 15:28:19', 'voyager.packages.index', NULL),
(18, 1, 'Shipment Categories', '', '_self', 'voyager-tag', '#000000', 16, 1, '2019-08-12 15:27:23', '2019-08-12 15:33:34', 'voyager.shipment-categories.index', 'null'),
(19, 1, 'Payment Methods', '', '_self', 'voyager-credit-card', '#000000', 16, 2, '2019-08-12 15:27:41', '2019-08-12 15:33:45', 'voyager.payment-methods.index', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(55, '2014_10_12_000000_create_users_table', 1),
(56, '2014_10_12_100000_create_password_resets_table', 1),
(57, '2016_01_01_000000_add_voyager_user_fields', 1),
(58, '2016_01_01_000000_create_data_types_table', 1),
(59, '2016_01_01_000000_create_pages_table', 1),
(60, '2016_01_01_000000_create_posts_table', 1),
(61, '2016_02_15_204651_create_categories_table', 1),
(62, '2016_05_19_173453_create_menu_table', 1),
(63, '2016_10_21_190000_create_roles_table', 1),
(64, '2016_10_21_190000_create_settings_table', 1),
(65, '2016_11_30_135954_create_permission_table', 1),
(66, '2016_11_30_141208_create_permission_role_table', 1),
(67, '2016_12_26_201236_data_types__add__server_side', 1),
(68, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(69, '2017_01_14_005015_create_translations_table', 1),
(70, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(71, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(72, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(73, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(74, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(75, '2017_08_05_000000_add_group_to_settings_table', 1),
(76, '2017_11_26_013050_add_user_role_relationship', 1),
(77, '2017_11_26_015000_create_user_roles_table', 1),
(78, '2018_03_11_000000_add_user_settings', 1),
(79, '2018_03_14_000000_add_details_to_data_types_table', 1),
(80, '2018_03_16_000000_make_settings_value_nullable', 1),
(81, '2019_07_26_065542_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `tracer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_category_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status_id`, `tracer`, `shipment_category_id`, `payment_method_id`, `quantity`, `weight`, `description`, `length`, `width`, `height`, `created_at`, `updated_at`) VALUES
(17, 1, 3, 'ZEL-00-00002', 1, 1, 1, 1, NULL, 1, 1, 1, '2019-08-06 11:01:33', '2019-08-06 11:01:33'),
(18, 1, 3, 'ZEL-00-00018', 1, 1, 1, 1, NULL, 1, 1, 1, '2019-08-06 11:02:39', '2019-08-06 11:02:39'),
(19, 1, 3, 'ZEL-00-00019', 1, 1, 1, 1, NULL, 1, 1, 1, '2019-08-06 11:02:43', '2019-08-06 11:02:43'),
(20, 1, 6, 'ZEL-00-00020', 1, 1, 1, 1, NULL, 1, 1, 1, '2019-08-06 11:02:51', '2019-08-06 11:02:51'),
(21, 1, 3, 'ZEL-00-00021', 1, 1, 1, 1, NULL, 1, 1, 1, '2019-08-06 11:02:55', '2019-08-06 11:02:55'),
(22, 1, 3, 'ZEL-00-00022', 5, 1, 1, 1, NULL, 1, 1, 1, '2019-08-06 11:03:34', '2019-08-06 11:03:34'),
(23, 1, 1, 'ZEL-00-00023', 11, 4, 1, 1, NULL, 1, 1, 1, '2019-08-06 15:45:34', '2019-08-06 15:45:34'),
(24, 1, 3, 'ZEL-00-00024', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 06:52:46', '2019-08-07 06:52:46'),
(25, 1, 3, 'ZEL-00-00025', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 06:54:40', '2019-08-07 06:54:40'),
(26, 1, 3, 'ZEL-00-00026', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 07:05:27', '2019-08-07 07:05:27'),
(27, 1, 6, 'ZEL-00-00027', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 07:08:41', '2019-08-07 07:08:41'),
(28, 1, 4, 'ZEL-00-00028', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 07:12:26', '2019-08-13 09:45:36'),
(29, 1, 3, 'ZEL-00-00029', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 07:18:28', '2019-08-07 07:18:28'),
(30, 1, 3, 'ZEL-00-00030', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 07:23:22', '2019-08-07 07:23:22'),
(31, 1, 3, 'ZEL-00-00031', 12, 3, 3, 3, 'testing', 3, 3, 3, '2019-08-07 07:27:16', '2019-08-07 07:27:16'),
(32, 1, 6, 'ZEL-00-00032', 6, 4, 4, 4, 'Test manenos', 4, 4, 4, '2019-08-07 07:28:58', '2019-08-07 07:28:58'),
(33, 1, 3, 'ZEL-00-00033', 5, 2, 1, 1, NULL, 1, 1, 1, '2019-08-07 07:37:54', '2019-08-07 07:37:54'),
(34, 1, 3, 'ZEL-00-00034', 5, 2, 1, 1, NULL, 1, 1, 1, '2019-08-07 07:38:04', '2019-08-07 07:38:04'),
(35, 1, 3, 'ZEL-00-00035', 5, 2, 1, 1, NULL, 1, 1, 1, '2019-08-07 07:45:12', '2019-08-07 07:45:12'),
(36, 1, 3, 'ZEL-00-00036', 5, 2, 1, 1, NULL, 1, 1, 1, '2019-08-07 07:46:34', '2019-08-07 07:46:34'),
(37, 1, 3, 'ZEL-00-00037', 5, 2, 1, 1, NULL, 1, 1, 1, '2019-08-07 07:48:24', '2019-08-07 07:48:24'),
(38, 1, 3, 'ZEL-00-00038', 5, 2, 1, 1, NULL, 1, 1, 1, '2019-08-07 07:48:56', '2019-08-07 07:48:56'),
(39, 1, 3, 'ZEL-00-00039', 5, 4, 2, 2, 'tester', 2, 2, 2, '2019-08-07 07:57:31', '2019-08-07 07:57:31'),
(40, 1, 4, 'ZEL-00-00040', 5, 4, 2, 2, 'tester', 2, 2, 2, '2019-08-07 07:59:20', '2019-08-12 17:21:04'),
(41, 1, 4, 'ZEL-00-00041', 5, 4, 2, 2, 'tester', 2, 2, 2, '2019-08-07 08:00:29', '2019-08-12 17:20:11'),
(42, 1, 3, 'ZEL-00-00042', 4, 4, 2, 30, 'testing', 54, 26, 10, '2019-08-13 10:41:32', '2019-08-13 10:41:32'),
(43, 1, 3, 'ZEL-00-00043', 4, 4, 2, 30, 'testing', 54, 26, 10, '2019-08-13 10:42:12', '2019-08-13 10:42:12'),
(44, 1, 3, 'ZEL-00-00044', 4, 4, 2, 30, 'testing', 54, 26, 10, '2019-08-13 10:54:10', '2019-08-13 10:54:10'),
(45, 2, 3, 'ZEL-00-00045', 6, 4, 1, 1, NULL, 1, 1, 1, '2019-08-13 17:21:44', '2019-08-13 17:21:44'),
(46, 2, 4, 'ZEL-00-00046', 18, 4, 1, 1, NULL, 1, 1, 1, '2019-08-13 17:27:10', '2019-08-13 17:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chipboard packaging', '2019-08-12 15:18:59', '2019-08-12 15:18:59'),
(2, 'Container', '2019-08-12 15:19:19', '2019-08-12 15:19:19'),
(3, 'Corrugated boxes', '2019-08-12 15:19:42', '2019-08-12 15:19:42'),
(4, 'Foil sealed bags', '2019-08-12 15:20:08', '2019-08-12 15:20:08'),
(5, 'Pallets', '2019-08-12 15:20:26', '2019-08-12 15:20:26'),
(6, 'Paper board boxes', '2019-08-12 15:20:53', '2019-08-12 15:20:53'),
(7, 'Plastic boxes', '2019-08-12 15:21:16', '2019-08-12 15:21:16'),
(8, 'Polybags', '2019-08-12 15:21:32', '2019-08-12 15:21:32'),
(9, 'Rigid boxes', '2019-08-12 15:21:55', '2019-08-12 15:21:55'),
(10, 'Envelopes', '2019-08-12 15:22:13', '2019-08-12 15:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Credit Card Payment', '2019-07-30 23:33:00', '2019-07-30 23:35:02'),
(2, 'Online Payment', '2019-07-30 23:33:00', '2019-07-30 23:35:15'),
(3, 'Mobile Money', '2019-07-30 23:33:00', '2019-07-30 23:35:22'),
(4, 'Cash On Delivery', '2019-07-30 23:33:00', '2019-07-30 23:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(2, 'browse_bread', NULL, '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(3, 'browse_database', NULL, '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(4, 'browse_media', NULL, '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(5, 'browse_compass', NULL, '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(6, 'browse_menus', 'menus', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(7, 'read_menus', 'menus', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(8, 'edit_menus', 'menus', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(9, 'add_menus', 'menus', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(10, 'delete_menus', 'menus', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(11, 'browse_roles', 'roles', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(12, 'read_roles', 'roles', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(13, 'edit_roles', 'roles', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(14, 'add_roles', 'roles', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(15, 'delete_roles', 'roles', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(16, 'browse_users', 'users', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(17, 'read_users', 'users', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(18, 'edit_users', 'users', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(19, 'add_users', 'users', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(20, 'delete_users', 'users', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(21, 'browse_settings', 'settings', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(22, 'read_settings', 'settings', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(23, 'edit_settings', 'settings', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(24, 'add_settings', 'settings', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(25, 'delete_settings', 'settings', '2019-07-26 23:01:59', '2019-07-26 23:01:59'),
(26, 'browse_hooks', NULL, '2019-07-26 23:02:01', '2019-07-26 23:02:01'),
(37, 'browse_statuses', 'statuses', '2019-07-30 23:40:40', '2019-07-30 23:40:40'),
(38, 'read_statuses', 'statuses', '2019-07-30 23:40:40', '2019-07-30 23:40:40'),
(39, 'edit_statuses', 'statuses', '2019-07-30 23:40:40', '2019-07-30 23:40:40'),
(40, 'add_statuses', 'statuses', '2019-07-30 23:40:40', '2019-07-30 23:40:40'),
(41, 'delete_statuses', 'statuses', '2019-07-30 23:40:40', '2019-07-30 23:40:40'),
(42, 'browse_packages', 'packages', '2019-08-12 15:17:43', '2019-08-12 15:17:43'),
(43, 'read_packages', 'packages', '2019-08-12 15:17:43', '2019-08-12 15:17:43'),
(44, 'edit_packages', 'packages', '2019-08-12 15:17:43', '2019-08-12 15:17:43'),
(45, 'add_packages', 'packages', '2019-08-12 15:17:43', '2019-08-12 15:17:43'),
(46, 'delete_packages', 'packages', '2019-08-12 15:17:43', '2019-08-12 15:17:43'),
(47, 'browse_shipment_categories', 'shipment_categories', '2019-08-12 15:27:23', '2019-08-12 15:27:23'),
(48, 'read_shipment_categories', 'shipment_categories', '2019-08-12 15:27:23', '2019-08-12 15:27:23'),
(49, 'edit_shipment_categories', 'shipment_categories', '2019-08-12 15:27:23', '2019-08-12 15:27:23'),
(50, 'add_shipment_categories', 'shipment_categories', '2019-08-12 15:27:23', '2019-08-12 15:27:23'),
(51, 'delete_shipment_categories', 'shipment_categories', '2019-08-12 15:27:23', '2019-08-12 15:27:23'),
(52, 'browse_payment_methods', 'payment_methods', '2019-08-12 15:27:41', '2019-08-12 15:27:41'),
(53, 'read_payment_methods', 'payment_methods', '2019-08-12 15:27:41', '2019-08-12 15:27:41'),
(54, 'edit_payment_methods', 'payment_methods', '2019-08-12 15:27:41', '2019-08-12 15:27:41'),
(55, 'add_payment_methods', 'payment_methods', '2019-08-12 15:27:41', '2019-08-12 15:27:41'),
(56, 'delete_payment_methods', 'payment_methods', '2019-08-12 15:27:41', '2019-08-12 15:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-07-26 23:01:57', '2019-07-26 23:01:57'),
(2, 'user', 'Normal User', '2019-07-26 23:01:58', '2019-07-26 23:01:58'),
(3, 'driver', 'Driver', '2019-07-26 23:01:58', '2019-07-26 23:05:01'),
(4, 'staff', 'Staff', '2019-07-26 23:01:58', '2019-07-26 23:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 3, NULL, NULL),
(3, 4, 4, NULL, NULL),
(4, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Zamola Enterprise ltd', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Logistics Tracking Business', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings/August2019/o5KeHEd5qNVpHmtZvJsK.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings/August2019/otMY5wY0T1YIvGifNepC.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Zamola', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Zamola Enterprises LTD. The official Zamola back-end.', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/August2019/mx3dleKz798GfoeEKhvD.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.jumbotron', 'Jumbotron', '<h2>Everything you need to know about the art of Shipping. Free!</h2>\r\n<p class=\"lead\">Subscribe below and start learning.<br />We are ready for you!</p>', NULL, 'rich_text_box', 6, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `order_id`, `staff_id`, `driver_id`, `status_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 32, 1, 3, 6, 3, '2019-08-12 17:06:20', '2019-08-12 17:06:20'),
(2, 41, 1, 3, 4, 3, '2019-08-12 17:16:48', '2019-08-12 17:16:48'),
(7, 40, 1, 3, 4, 3, '2019-08-12 17:21:04', '2019-08-12 17:21:04'),
(8, 28, 4, 3, 4, 5, '2019-08-13 09:45:35', '2019-08-13 09:45:35'),
(9, 46, 4, 3, 4, 9, '2019-08-13 17:28:47', '2019-08-13 17:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_categories`
--

CREATE TABLE `shipment_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipment_categories`
--

INSERT INTO `shipment_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accessory (No Battery)', '2019-07-30 23:19:13', '2019-07-30 23:19:13'),
(2, 'Accessory (With Battery)', '2019-07-30 23:19:31', '2019-07-30 23:19:31'),
(3, 'Audio Visual', '2019-07-30 23:19:50', '2019-07-30 23:19:50'),
(4, 'Bags and Luggage', '2019-07-30 23:20:14', '2019-07-30 23:20:39'),
(5, 'Books & Collections', '2019-07-30 23:21:14', '2019-07-30 23:21:14'),
(6, 'Cameras', '2019-07-30 23:21:37', '2019-07-30 23:21:37'),
(7, 'Computers & Laptops', '2019-07-30 23:21:53', '2019-07-30 23:22:07'),
(8, 'Documents', '2019-07-30 23:22:18', '2019-07-30 23:22:18'),
(9, 'Dry Foods & Supplements', '2019-07-30 23:22:49', '2019-07-30 23:23:02'),
(10, 'Earth & Agricultural products', '2019-07-30 23:23:30', '2019-07-30 23:23:30'),
(11, 'Fashion', '2019-07-30 23:23:45', '2019-07-30 23:23:45'),
(12, 'Gym & Gaming Equipment', '2019-07-30 23:24:32', '2019-07-30 23:24:44'),
(13, 'Health & Beauty', '2019-07-30 23:25:03', '2019-07-30 23:25:03'),
(14, 'Home Appliances', '2019-07-30 23:25:20', '2019-07-30 23:25:20'),
(15, 'Home Decor', '2019-07-30 23:25:35', '2019-07-30 23:25:35'),
(16, 'Jewelry', '2019-07-30 23:25:45', '2019-07-30 23:25:45'),
(17, 'Mobile Phones & Accessories', '2019-07-30 23:26:00', '2019-07-30 23:26:36'),
(18, 'Pet & Accessories', '2019-07-30 23:26:57', '2019-07-30 23:26:57'),
(19, 'Sport & Leisure', '2019-07-30 23:27:30', '2019-07-30 23:27:30'),
(20, 'Tablets', '2019-07-30 23:27:40', '2019-07-30 23:27:40'),
(21, 'Toys', '2019-07-30 23:27:48', '2019-07-30 23:27:48'),
(22, 'Watches', '2019-07-30 23:27:57', '2019-07-30 23:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'paid', '2019-07-30 23:41:01', '2019-07-30 23:41:01'),
(2, 'unpaid', '2019-07-30 23:41:13', '2019-07-30 23:41:13'),
(3, 'pending', '2019-07-30 23:41:23', '2019-07-30 23:41:23'),
(4, 'approved', '2019-07-30 23:41:34', '2019-07-30 23:41:34'),
(5, 'delivered', '2019-07-30 23:41:46', '2019-07-30 23:41:46'),
(6, 'transit', '2019-07-30 23:41:56', '2019-07-30 23:41:56'),
(7, 'Booking', '2019-08-12 08:04:13', '2019-08-12 08:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `termini`
--

CREATE TABLE `termini` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `terminal` enum('origin','destination') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latlong` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termini`
--

INSERT INTO `termini` (`id`, `order_id`, `terminal`, `name`, `email`, `address`, `phone`, `latlong`, `location`, `description`, `created_at`, `updated_at`) VALUES
(29, 17, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 11:01:33', '2019-08-06 11:01:33'),
(30, 17, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 11:01:33', '2019-08-06 11:01:33'),
(31, 18, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 11:02:39', '2019-08-06 11:02:39'),
(32, 18, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 11:02:39', '2019-08-06 11:02:39'),
(33, 19, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 11:02:44', '2019-08-06 11:02:44'),
(34, 19, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 11:02:44', '2019-08-06 11:02:44'),
(35, 20, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 11:02:51', '2019-08-06 11:02:51'),
(36, 20, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 11:02:51', '2019-08-06 11:02:51'),
(37, 21, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 11:02:55', '2019-08-06 11:02:55'),
(38, 21, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 11:02:55', '2019-08-06 11:02:55'),
(39, 22, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 11:03:35', '2019-08-06 11:03:35'),
(40, 22, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 11:03:35', '2019-08-06 11:03:35'),
(41, 23, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-06 15:45:34', '2019-08-06 15:45:34'),
(42, 23, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-06 15:45:35', '2019-08-06 15:45:35'),
(43, 24, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 06:52:47', '2019-08-07 06:52:47'),
(44, 24, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 06:52:47', '2019-08-07 06:52:47'),
(45, 25, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 06:54:40', '2019-08-07 06:54:40'),
(46, 25, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 06:54:40', '2019-08-07 06:54:40'),
(47, 26, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 07:05:27', '2019-08-07 07:05:27'),
(48, 26, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:05:27', '2019-08-07 07:05:27'),
(49, 27, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 07:08:41', '2019-08-07 07:08:41'),
(50, 27, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:08:41', '2019-08-07 07:08:41'),
(51, 28, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 07:12:26', '2019-08-07 07:12:26'),
(52, 28, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:12:26', '2019-08-07 07:12:26'),
(53, 29, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 07:18:28', '2019-08-07 07:18:28'),
(54, 29, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:18:28', '2019-08-07 07:18:28'),
(55, 30, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 07:23:22', '2019-08-07 07:23:22'),
(56, 30, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:23:22', '2019-08-07 07:23:22'),
(57, 31, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-07 07:27:16', '2019-08-07 07:27:16'),
(58, 31, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:27:16', '2019-08-07 07:27:16'),
(59, 32, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kericho', 'No description', '2019-08-07 07:28:58', '2019-08-07 07:28:58'),
(60, 32, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:28:58', '2019-08-07 07:28:58'),
(61, 33, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-07 07:37:54', '2019-08-07 07:37:54'),
(62, 33, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:37:54', '2019-08-07 07:37:54'),
(63, 34, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-07 07:38:04', '2019-08-07 07:38:04'),
(64, 34, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:38:05', '2019-08-07 07:38:05'),
(65, 35, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-07 07:45:12', '2019-08-07 07:45:12'),
(66, 35, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:45:12', '2019-08-07 07:45:12'),
(67, 36, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-07 07:46:34', '2019-08-07 07:46:34'),
(68, 36, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:46:34', '2019-08-07 07:46:34'),
(69, 37, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-07 07:48:24', '2019-08-07 07:48:24'),
(70, 37, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:48:24', '2019-08-07 07:48:24'),
(71, 38, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-07 07:48:57', '2019-08-07 07:48:57'),
(72, 38, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:48:57', '2019-08-07 07:48:57'),
(73, 39, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kericho', 'No description', '2019-08-07 07:57:32', '2019-08-07 07:57:32'),
(74, 39, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:57:32', '2019-08-07 07:57:32'),
(75, 40, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kericho', 'No description', '2019-08-07 07:59:20', '2019-08-07 07:59:20'),
(76, 40, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 07:59:20', '2019-08-07 07:59:20'),
(77, 41, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kericho', 'No description', '2019-08-07 08:00:29', '2019-08-07 08:00:29'),
(78, 41, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-07 08:00:29', '2019-08-07 08:00:29'),
(79, 42, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-13 10:41:32', '2019-08-13 10:41:32'),
(80, 42, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-13 10:41:32', '2019-08-13 10:41:32'),
(81, 43, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-13 10:42:12', '2019-08-13 10:42:12'),
(82, 43, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-13 10:42:12', '2019-08-13 10:42:12'),
(83, 44, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'nrb', 'No description', '2019-08-13 10:54:10', '2019-08-13 10:54:10'),
(84, 44, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-13 10:54:10', '2019-08-13 10:54:10'),
(85, 45, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-13 17:21:45', '2019-08-13 17:21:45'),
(86, 45, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-13 17:21:45', '2019-08-13 17:21:45'),
(87, 46, 'origin', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Nrb', 'No description', '2019-08-13 17:27:10', '2019-08-13 17:27:10'),
(88, 46, 'destination', 'Gabriel Okumu', 'bgcreations123@gmail.com', 'South B', '0722547906', 0, 'Kibuye Market Ksm stall 123', 'No description', '2019-08-13 17:27:10', '2019-08-13 17:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/admin4.png', NULL, '$2y$10$iKk.siqLAGTMUCs4pyiYEu637kvcWkTftLYePbJ1xDqHQ0aJkAYY.', 'x66ApToPQieVi2P3R8xSlsxxDaakh79phYIdQXFLWzRW4ZE83RA9UA7sDRMe', NULL, '2019-07-26 23:24:05', '2019-07-26 23:24:05'),
(2, 2, 'user', 'user@user.com', 'users/staff4.png', NULL, '$2y$10$oDwHwHGjAtcRr0kLn62vjeo1eM2giowz4iFWmDuMbtxDKqEbac4i6', 'g4ZuKaRaOKuEOgK1vuiA4VOtzaQfwrgXoe9Ais7MTf745kNU0UxLFnYOLhk0', NULL, '2019-07-26 23:24:05', '2019-07-26 23:24:05'),
(3, 3, 'Driver', 'driver@driver.com', 'users/courier.png', NULL, '$2y$10$9Vr7ix5I3U8u8qQS/mrfveoW9buxQo.rDowYwn1UUS3p536E724Y2', 'EFr92LNnjWWRG6OzPzLimgawgx413l1Rrxt7gw4dUJpUe481PkO7ZHUlMgna', NULL, '2019-07-26 23:24:06', '2019-07-26 23:24:06'),
(4, 4, 'staff', 'staff@staff.com', 'users/staff1.png', NULL, '$2y$10$L.V9lkSNBetI.nkW6iafi...76qva.aQTbFd0HPqnV17cS5Jfcmu6', 'jMH5Wg2TaChjHnrmXi8cwuNLTcXVyLxZcAs4ufOotfTYeof0uEGjC2ROV6ih', NULL, '2019-07-26 23:24:06', '2019-07-26 23:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_categories`
--
ALTER TABLE `shipment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termini`
--
ALTER TABLE `termini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shipment_categories`
--
ALTER TABLE `shipment_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `termini`
--
ALTER TABLE `termini`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
