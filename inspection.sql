-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 07:40 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inspection`
--

-- --------------------------------------------------------

--
-- Table structure for table `bodyconditions`
--

CREATE TABLE IF NOT EXISTS `bodyconditions` (
  `id` bigint(20) unsigned NOT NULL,
  `bodycondition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bodyconditions`
--

INSERT INTO `bodyconditions` (`id`, `bodycondition`, `created_at`, `updated_at`) VALUES
(1, 'Excellent', '2022-05-25 17:08:44', '2022-05-25 17:08:44'),
(2, 'Good', '2022-05-25 17:08:44', '2022-05-25 17:08:44'),
(3, 'Average', '2022-05-25 17:09:15', '2022-05-25 17:09:15'),
(4, 'Dented', '2022-05-25 17:09:15', '2022-05-18 17:09:15'),
(5, 'Accidental', '2022-05-25 17:09:40', '2022-05-25 17:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `casetypes`
--

CREATE TABLE IF NOT EXISTS `casetypes` (
  `id` bigint(20) unsigned NOT NULL,
  `case_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casetypes`
--

INSERT INTO `casetypes` (`id`, `case_type`, `created_at`, `updated_at`) VALUES
(1, 'Inspection', '2022-05-25 17:00:48', '2022-05-25 17:00:48'),
(2, 'Valuation', '2022-05-25 17:00:48', '2022-05-25 17:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `case_models`
--

CREATE TABLE IF NOT EXISTS `case_models` (
  `id` bigint(20) unsigned NOT NULL,
  `company_name` int(11) NOT NULL,
  `company_branch` int(11) NOT NULL,
  `insurance_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `req_no` int(11) DEFAULT NULL,
  `req_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `req_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `req_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8_unicode_ci,
  `customer_no` int(20) DEFAULT NULL,
  `inspection_address` text COLLATE utf8_unicode_ci,
  `vehicle_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chassis_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `odo_meter` int(11) DEFAULT NULL,
  `rc_verified` tinyint(4) DEFAULT NULL,
  `vehicle_category` int(11) NOT NULL,
  `vehicle_manufacturer` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `vehicle_variant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fuel_used` int(11) DEFAULT NULL,
  `case_type` int(11) DEFAULT NULL,
  `vehicle_colour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine_started` tinyint(4) DEFAULT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci,
  `inspection_status` int(11) DEFAULT NULL,
  `payment_mode` int(11) DEFAULT NULL,
  `conveyance` int(11) DEFAULT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fo_id` int(11) NOT NULL,
  `imgstatus` tinyint(4) NOT NULL DEFAULT '0',
  `pdfstatus` tinyint(4) NOT NULL DEFAULT '0',
  `qc_id` int(11) DEFAULT NULL,
  `case_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `case_models`
--

INSERT INTO `case_models` (`id`, `company_name`, `company_branch`, `insurance_ref`, `req_no`, `req_name`, `req_code`, `req_email`, `customer_name`, `customer_address`, `customer_no`, `inspection_address`, `vehicle_no`, `chassis_no`, `engine_no`, `odo_meter`, `rc_verified`, `vehicle_category`, `vehicle_manufacturer`, `year`, `vehicle_variant`, `fuel_used`, `case_type`, `vehicle_colour`, `engine_started`, `remarks`, `inspection_status`, `payment_mode`, `conveyance`, `from`, `to`, `images`, `fo_id`, `imgstatus`, `pdfstatus`, `qc_id`, `case_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '12345', NULL, NULL, NULL, NULL, 'Krishana', 'ludhiana', 2147483647, NULL, 'PB10AB1454', NULL, NULL, NULL, NULL, 3, 1, NULL, 'Auto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/12/1', 1, 0, 0, NULL, 2, '2022-05-12 11:51:46', '2022-05-22 07:42:13'),
(2, 2, 1, '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PB10AB14556', NULL, NULL, NULL, NULL, 3, 1, NULL, 'Auto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/17/2', 1, 1, 0, NULL, 2, '2022-05-17 10:53:58', '2022-05-25 10:18:21'),
(3, 2, 1, '12345', NULL, NULL, NULL, NULL, 'Bajaj allian', NULL, NULL, NULL, 'PB10AB1454', NULL, NULL, NULL, NULL, 3, 2, NULL, '1210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/22/3', 1, 0, 0, NULL, 2, '2022-05-22 06:57:35', '2022-05-22 06:59:19'),
(4, 1, 2, '12345', NULL, NULL, NULL, NULL, 'Bajaj allian', NULL, NULL, NULL, 'PB10AB1', NULL, NULL, NULL, NULL, 3, 2, NULL, '1210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/24/4', 1, 1, 0, NULL, 5, '2022-05-24 10:30:22', '2022-05-24 10:31:03'),
(5, 2, 1, '12345', NULL, NULL, NULL, NULL, 'New India', NULL, NULL, NULL, 'PB10AB1455', NULL, NULL, NULL, NULL, 3, 1, NULL, 'Auto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/24/5', 1, 0, 0, NULL, 5, '2022-05-24 10:44:40', '2022-05-24 10:44:40'),
(6, 2, 1, '12345', NULL, NULL, NULL, NULL, 'New India', NULL, NULL, NULL, 'PB10AB1455', NULL, NULL, NULL, NULL, 3, 2, NULL, '1210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/24/6', 1, 0, 0, NULL, 7, '2022-05-24 11:17:13', '2022-05-24 11:17:13'),
(7, 1, 2, '12345', NULL, NULL, NULL, NULL, 'Azad', NULL, NULL, NULL, 'PB10AB1454', NULL, NULL, NULL, NULL, 3, 2, NULL, '1210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/2022/May/24/7', 1, 0, 0, NULL, 6, '2022-05-24 11:18:12', '2022-05-24 11:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL,
  `Company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shot_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `Company_name`, `shot_name`, `created_at`, `updated_at`) VALUES
(1, 'Bajaj allianz', 'Bajaj', '2022-05-07 23:23:36', '2022-05-08 03:13:47'),
(2, 'Tata Aig', 'Tata', '2022-05-08 01:54:08', '2022-05-08 01:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `company_branches`
--

CREATE TABLE IF NOT EXISTS `company_branches` (
  `id` bigint(20) unsigned NOT NULL,
  `c_id` int(11) NOT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_branches`
--

INSERT INTO `company_branches` (`id`, `c_id`, `branch_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'New Delhi', '2022-05-08 01:27:10', '2022-05-08 03:14:06'),
(2, 1, 'Delhi', '2022-05-08 01:54:28', '2022-05-08 02:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fos`
--

CREATE TABLE IF NOT EXISTS `fos` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos`
--

INSERT INTO `fos` (`id`, `name`, `mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Azad choubey', 8569003690, 'azad1@gmail.com', 0, '2022-05-12 11:18:59', '2022-05-12 11:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE IF NOT EXISTS `fuels` (
  `id` bigint(20) unsigned NOT NULL,
  `fuel_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`id`, `fuel_type`, `created_at`, `updated_at`) VALUES
(1, 'PETROL', '2022-05-25 16:58:57', '2022-05-25 16:59:00'),
(2, 'DIESEL', '2022-05-25 16:59:28', '2022-05-25 16:59:31'),
(3, 'CNG', '2022-05-25 16:59:34', '2022-05-25 16:59:38'),
(4, 'LPG', '2022-05-25 16:59:42', '2022-05-25 16:59:42'),
(5, 'BATTERY', '2022-05-25 16:59:42', '2022-05-25 16:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `imageparts`
--

CREATE TABLE IF NOT EXISTS `imageparts` (
  `id` bigint(20) unsigned NOT NULL,
  `part_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vp_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imageparts`
--

INSERT INTO `imageparts` (`id`, `part_name`, `vp_id`, `created_at`, `updated_at`) VALUES
(1, 'Front', 1, '2022-05-20 10:48:06', '2022-05-20 10:48:11'),
(2, 'Back', 1, '2022-05-20 10:48:15', '2022-05-20 10:48:15'),
(3, 'Left\r\n', 1, '2022-05-20 10:54:34', '2022-05-20 10:54:34'),
(4, 'Right', 1, '2022-05-20 10:54:53', '2022-05-20 10:54:53'),
(5, 'Odo', 1, '2022-05-20 10:54:53', '2022-05-20 10:54:53'),
(6, 'Selfie', 1, '2022-05-20 10:55:31', '2022-05-20 10:55:31'),
(7, 'Chassis', 1, '2022-05-20 10:55:31', '2022-05-20 10:55:31'),
(8, 'Other', 1, '2022-05-20 10:56:01', '2022-05-20 10:56:01'),
(9, 'Engine', 1, '2022-05-20 10:56:01', '2022-05-20 10:56:01'),
(10, 'Rc', 1, '2022-05-20 10:56:30', '2022-05-20 10:56:30'),
(11, 'Documents', 1, '2022-05-20 10:56:30', '2022-05-20 10:56:30'),
(12, 'Front', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(13, 'Front Left Cover', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(14, 'Front Right Cover', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(15, 'Back', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(16, 'Back Left Cover', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(17, 'Back Right Corner', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(18, 'Dicky', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(19, 'Vin Plate', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(20, 'Chassis', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(21, 'Dashbord', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(22, 'Engine', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(23, 'Under Carriage', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(24, 'Left', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(25, 'Right', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(26, 'Odo', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(27, 'Other', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(28, 'Selfie', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(29, 'Wind Screen', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(30, 'Rc', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(31, 'Documents', 2, '2022-05-20 16:31:49', '2022-05-20 16:31:49'),
(32, 'Front', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(33, 'Front Left Cover', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(34, 'Front Right Cover', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(35, 'Back', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(36, 'Back Left Cover', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(37, 'Back Right Corner', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(38, 'Dicky', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(39, 'Vin Plate', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(40, 'Chassis', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(41, 'Dashbord', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(42, 'Engine', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(43, 'Under Carriage', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(44, 'Left', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(45, 'Right', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(46, 'Odo', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(47, 'Other', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(48, 'Selfie', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(49, 'Wind Screen Inner', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(50, 'Wind Screen Outer', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(51, 'Rc', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54'),
(52, 'Documents', 3, '2022-05-20 16:35:54', '2022-05-20 16:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_statuses`
--

CREATE TABLE IF NOT EXISTS `inspection_statuses` (
  `id` bigint(20) unsigned NOT NULL,
  `inspection_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inspection_statuses`
--

INSERT INTO `inspection_statuses` (`id`, `inspection_status`, `created_at`, `updated_at`) VALUES
(1, 'Recommended', '2022-05-25 17:01:30', '2022-05-25 17:01:30'),
(2, 'Not Recommended', '2022-05-25 17:01:30', '2022-05-25 17:01:30'),
(3, 'Refered to Underwriter', '2022-05-25 17:02:13', '2022-05-25 17:02:13'),
(4, 'No Status', '2022-05-25 17:02:13', '2022-05-25 17:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` bigint(20) unsigned NOT NULL,
  `v_id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `v_id`, `manufacturer_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Bajaj', '2022-05-08 02:36:45', '2022-05-08 03:07:00'),
(2, 3, 'Ashok Leyland', '2022-05-22 04:42:02', '2022-05-22 04:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_07_061906_create_companies_table', 2),
(6, '2022_05_07_082739_api_token', 3),
(7, '2022_05_08_064210_create_company_branches_table', 4),
(12, '2022_05_08_074359_create_vehicle_types_table', 5),
(13, '2022_05_08_074540_create_manufacturers_table', 5),
(14, '2022_05_09_051102_create_roles_table', 6),
(15, '2022_05_09_051910_after_user', 6),
(21, '2022_05_10_073947_create_case_models_table', 7),
(23, '2022_05_12_162431_create_fos_table', 8),
(24, '2022_05_17_172322_create_vehcile_parts_table', 9),
(25, '2022_05_18_162651_create_vehicle_damages_table', 10),
(26, '2022_05_20_103948_create_imageparts_table', 11),
(29, '2022_05_23_064736_alter_user', 13),
(30, '2022_05_22_084008_alter__case', 14),
(31, '2022_05_25_162517_create_fuels_table', 15),
(32, '2022_05_25_162836_create_casetypes_table', 15),
(33, '2022_05_25_163055_create_inspection_statuses_table', 15),
(34, '2022_05_25_163243_create_paymentmodes_table', 15),
(35, '2022_05_25_163604_create_valuationtypes_table', 15),
(36, '2022_05_25_163742_create_rcstatuses_table', 15),
(37, '2022_05_25_163901_create_policytypes_table', 15),
(38, '2022_05_25_164024_create_valuation_models_table', 16),
(39, '2022_05_25_165411_create_bodyconditions_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmodes`
--

CREATE TABLE IF NOT EXISTS `paymentmodes` (
  `id` bigint(20) unsigned NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymentmodes`
--

INSERT INTO `paymentmodes` (`id`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2022-05-25 17:03:07', '2022-05-25 17:03:07'),
(2, 'Billing', '2022-05-25 17:03:07', '2022-05-25 17:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policytypes`
--

CREATE TABLE IF NOT EXISTS `policytypes` (
  `id` bigint(20) unsigned NOT NULL,
  `policy_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `policytypes`
--

INSERT INTO `policytypes` (`id`, `policy_type`, `created_at`, `updated_at`) VALUES
(1, 'Package Policy / Full Insurance', '2022-05-25 17:06:37', '2022-05-25 17:06:37'),
(2, 'Liability Only Policy', '2022-05-25 17:06:37', '2022-05-25 17:06:37'),
(3, 'Nil Depreciation Policy', '2022-05-25 17:07:28', '2022-05-25 17:07:28'),
(4, 'NA', '2022-05-25 17:07:28', '2022-05-25 17:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `rcstatuses`
--

CREATE TABLE IF NOT EXISTS `rcstatuses` (
  `id` bigint(20) unsigned NOT NULL,
  `rc_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rcstatuses`
--

INSERT INTO `rcstatuses` (`id`, `rc_status`, `created_at`, `updated_at`) VALUES
(1, 'Original RC Verified', '2022-05-25 17:05:12', '2022-05-25 17:05:12'),
(2, 'Xerox RC Verified ', '2022-05-25 17:05:12', '2022-05-25 17:05:12'),
(3, 'RC not Available', '2022-05-25 17:05:53', '2022-05-25 17:05:53'),
(4, 'Online RC Verified', '2022-05-25 17:05:53', '2022-05-25 17:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-05-09 16:56:21', '2022-05-09 16:56:21'),
(2, 'Ro', '2022-05-24 15:33:27', '2022-05-24 15:33:27'),
(3, 'User', '2022-05-24 15:33:44', '2022-05-24 15:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `status`, `parent_id`, `created_by`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Azad Choubey', 'azad@gmail.com', 1, 1, 0, 0, NULL, '$2y$10$HlvpsM5rMFpiRtzhbmjHYOr1.6u0UjmRdiXEdJFPvAkvn/ePlDd22', 'JFWgQEX9IozLZvD6Up9K', NULL, '2022-05-07 03:24:54', '2022-05-09 11:27:15'),
(4, 'ap', 'ap@gmail.com', 2, 1, 3, 3, NULL, '$2y$10$eHf1mI7fNcJQSe7WRuueN.7g57teP4dhPIWXyqbArUTkjfp4DxLhC', 'rlH9rJcJhqpCOFYxeJ8s', NULL, '2022-05-24 10:10:02', '2022-05-24 10:10:02'),
(5, 'apuser', 'apuser@gmail.com', 3, 1, 4, 3, NULL, '$2y$10$4WVJUEMYUKH5gBlZnwSVOOpQurEzy9YOzhHQ6dYA8kMkN6hkTIGei', 'SlQCe0AJIt4ZX0ezwUk5', NULL, '2022-05-24 10:10:43', '2022-05-24 10:10:43'),
(6, 'delhi', 'delhi@gmail.com', 2, 1, 3, 3, NULL, '$2y$10$mimJ7jeO8gwmF2UdCivfu.EjuBC0PVYGNiUq5C3UUNwdGK6Ph5bma', 'H3cK0hiPCGQ3Q3MF6pHt', NULL, '2022-05-24 10:11:37', '2022-05-24 10:11:37'),
(7, 'delhiuser', 'delhiuser@gmail.com', 3, 1, 6, 3, NULL, '$2y$10$xAekTZWM0AF7hr7PLIvhQOoTVpoQDDYvpPClu9YbjyCFEFs6Oxrwi', '3hAcYCcrLFHvY6VI2D7Q', NULL, '2022-05-24 10:12:16', '2022-05-24 10:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `valuationtypes`
--

CREATE TABLE IF NOT EXISTS `valuationtypes` (
  `id` bigint(20) unsigned NOT NULL,
  `valuation_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `valuationtypes`
--

INSERT INTO `valuationtypes` (`id`, `valuation_type`, `created_at`, `updated_at`) VALUES
(1, 'Repo', '2022-05-25 17:04:09', '2022-05-25 17:04:09'),
(2, 'Retail Case', '2022-05-25 17:04:09', '2022-05-25 17:04:09'),
(3, 'NA', '2022-05-25 17:04:37', '2022-05-25 17:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `valuation_models`
--

CREATE TABLE IF NOT EXISTS `valuation_models` (
  `id` bigint(20) unsigned NOT NULL,
  `valuation_case_type` tinyint(4) NOT NULL,
  `transmission` tinyint(4) NOT NULL,
  `ownership` tinyint(4) NOT NULL,
  `rc_status` tinyint(4) NOT NULL,
  `insurance_policy` tinyint(4) NOT NULL,
  `insurance_validity` date NOT NULL,
  `body_condition` tinyint(4) NOT NULL,
  `rate_vehicle` tinyint(4) NOT NULL,
  `hpa` tinyint(4) NOT NULL,
  `hpa_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loan_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valuation_price` double(8,2) NOT NULL,
  `valuation_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `v_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qc_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `pdfstatus` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehcile_parts`
--

CREATE TABLE IF NOT EXISTS `vehcile_parts` (
  `id` bigint(20) unsigned NOT NULL,
  `parts_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `v_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehcile_parts`
--

INSERT INTO `vehcile_parts` (`id`, `parts_name`, `v_id`, `created_at`, `updated_at`) VALUES
(1, 'Head Lamp / Rim / Cover', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(2, 'Front Left Indicator Light', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(3, 'Front Right Indicator Light', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(4, 'Front Mudguard', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(5, 'Speedometer / Tachometre', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(6, 'Handle / Bar', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(7, 'Lever Clutch / Head Break', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(8, 'Front Hub / Disel Drum', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(9, 'Front Wheel Rim', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(10, 'Front Shock Absorber', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(11, 'Leg Guard', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(12, 'Left Cover / Shield', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(13, 'Right Cover / Shield', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(14, 'Chassis Frame', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(15, 'Crank Case / Cylinder', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(16, 'Rear Wheel Rim', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(17, 'Rear Shock Absorber', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(18, 'Rear Drum / Disc', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(19, 'Tail Lamp', 1, '2022-05-17 17:47:51', '2022-05-17 17:47:51'),
(20, 'Rear Left Indicator Light', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(21, 'Rear Right Indicator Light', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(22, 'Chain Cover', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(23, 'Seats', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(24, 'Rear View Mirror (LT)', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(25, 'Rear View Mirror (RT)', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(26, 'Fork', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(27, 'Kick Pedal', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(28, 'Rear Cowl Left / Center / Right', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(29, 'Legshield Left', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(30, 'Legshield Right', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(31, 'Fairing', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(32, 'Fuel Tank', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(33, 'Silencer', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(34, 'Rear Mudguard', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(35, 'Saree Guard', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(36, 'Wisor', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(37, 'Stepeny', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(38, 'Stepeny Bracket', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(39, 'Rear Foot Rest', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(40, 'Helmet Box', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(41, 'Tyre Front/Rear', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(42, 'Luggage Carrier', 1, '2022-05-17 17:47:52', '2022-05-17 17:47:52'),
(43, 'Front Bumper', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(44, 'Grill', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(45, 'Head Lamp (LT)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(46, 'Head Lamp (RT)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(47, 'Indicator Light (LT)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(48, 'Indicator Light (RT)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(49, 'Fog Lamp (LT)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(50, 'Fog Lamp (RT)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(51, 'Front Panel', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(52, 'Bonnet', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(53, 'Left Apron', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(54, 'Right Apron', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(55, 'LT Front Fender', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(56, 'LT Front Door', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(57, 'LT Rear Door', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(58, 'LT Pillar Door (A)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(59, 'LT Pillar Center (B)', 2, '2022-05-17 17:48:59', '2022-05-17 17:48:59'),
(60, 'LT Pillar Rear (C)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(61, 'LT Running Board', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(62, 'LT Qtr Panel', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(63, 'Dicky', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(64, 'Rear Bumper', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(65, 'Tail Lamp (LT)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(66, 'Tail Lamp (RT)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(67, 'RT Qtr Panel', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(68, 'RT Rear Door', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(69, 'RT Front Door', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(70, 'RT Pillar Front (A)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(71, 'RT Center Pillar (B)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(72, 'RT Pillar Rear (C)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(73, 'RT Running Board', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(74, 'RT Front Fender', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(75, 'Floor / Silencer', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(76, 'Under Carriage', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(77, 'Rear View Mirror (LT)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(78, 'Rear View Mirror (RT)', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(79, 'Rim', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(80, 'Stereo / Make', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(81, 'CD Changer / Make', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(82, 'Seat Cover', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(83, 'Center Lock', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(84, 'Gear Locking', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(85, 'Front w/s Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(86, 'Left Front Door Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(87, 'Left Rear Door Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(88, 'Back Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(89, 'Tyres', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(90, 'Right Front Door Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(91, 'Right Rear Door Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(92, 'Sun Roof Glass', 2, '2022-05-17 17:49:00', '2022-05-17 17:49:00'),
(93, 'Cowl', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(94, 'Dashboard', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(95, 'Bonnet', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(96, 'Grill', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(97, 'Bumper', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(98, 'Cabin', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(99, 'Body', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(100, 'Left Side Body', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(101, 'Right Side Body', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(102, 'Head Lights', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(103, 'Indicator Lights', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(104, 'W/S Glass', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(105, 'Back Glass', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(106, 'Rear View Mirrors', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(107, 'Excavator Cabin Glass', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(108, 'Crane Cabin Glass', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(109, 'Front Excavator', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(110, 'Crane Bucket', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(111, 'Crane Hook', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(112, 'Boom', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(113, 'AC', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(114, 'Fans', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(115, 'Hydraulic System', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(116, 'Chassis Frame', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(117, 'Fuel Tank', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(118, 'Left Door', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(119, 'Right Door', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(120, 'Seats', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(121, 'Tyres', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(122, 'Stepny', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(123, 'Rear Body', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(124, 'Window Glasses LT', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(125, 'Window Glasses RT', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(126, 'Type of Body', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(127, 'Tail Lamp (LT)', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59'),
(128, 'Tail Lamp (RT)', 3, '2022-05-18 16:06:59', '2022-05-18 16:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_damages`
--

CREATE TABLE IF NOT EXISTS `vehicle_damages` (
  `id` bigint(20) unsigned NOT NULL,
  `vehicle_damages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vp_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle_damages`
--

INSERT INTO `vehicle_damages` (`id`, `vehicle_damages`, `vp_id`, `created_at`, `updated_at`) VALUES
(1, 'Safe', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(2, 'Scratch', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(3, 'Minor Dent', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(4, 'Major Dent', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(5, 'Rusted', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(6, 'Dot/Spot', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(7, 'Dented', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(8, 'Broken', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(9, 'NA', 1, '2022-05-19 16:01:50', '2022-05-19 16:01:50'),
(10, 'Safe', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(11, 'Scratch', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(12, 'Minor Dent', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(13, 'Major Dent', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(14, 'Rusted', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(15, 'Dot/Spot', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(16, 'Dented', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(17, 'Broken', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(18, 'NA', 2, '2022-05-19 16:02:12', '2022-05-19 16:02:12'),
(19, 'Safe', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(20, 'Scratch', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(21, 'Minor Dent', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(22, 'Major Dent', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(23, 'Rusted', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(24, 'Dot/Spot', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(25, 'Dented', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(26, 'Broken', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(27, 'NA', 3, '2022-05-19 16:02:18', '2022-05-19 16:02:18'),
(28, 'Safe', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(29, 'Scratch', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(30, 'Minor Dent', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(31, 'Major Dent', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(32, 'Rusted', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(33, 'Dot/Spot', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(34, 'Dented', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(35, 'Broken', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(36, 'NA', 4, '2022-05-19 16:02:24', '2022-05-19 16:02:24'),
(37, 'Safe', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(38, 'Scratch', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(39, 'Minor Dent', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(40, 'Major Dent', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(41, 'Rusted', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(42, 'Dot/Spot', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(43, 'Dented', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(44, 'Broken', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(45, 'NA', 5, '2022-05-19 16:02:30', '2022-05-19 16:02:30'),
(46, 'Safe', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(47, 'Scratch', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(48, 'Minor Dent', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(49, 'Major Dent', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(50, 'Rusted', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(51, 'Dot/Spot', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(52, 'Dented', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(53, 'Broken', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(54, 'NA', 6, '2022-05-19 16:02:37', '2022-05-19 16:02:37'),
(55, 'Safe', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(56, 'Scratch', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(57, 'Minor Dent', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(58, 'Major Dent', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(59, 'Rusted', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(60, 'Dot/Spot', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(61, 'Dented', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(62, 'Broken', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(63, 'NA', 7, '2022-05-19 16:02:43', '2022-05-19 16:02:43'),
(64, 'Safe', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(65, 'Scratch', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(66, 'Minor Dent', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(67, 'Major Dent', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(68, 'Rusted', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(69, 'Dot/Spot', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(70, 'Dented', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(71, 'Broken', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(72, 'NA', 8, '2022-05-19 16:02:49', '2022-05-19 16:02:49'),
(73, 'Safe', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(74, 'Scratch', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(75, 'Minor Dent', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(76, 'Major Dent', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(77, 'Rusted', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(78, 'Dot/Spot', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(79, 'Dented', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(80, 'Broken', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(81, 'NA', 9, '2022-05-19 16:02:54', '2022-05-19 16:02:54'),
(82, 'Safe', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(83, 'Scratch', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(84, 'Minor Dent', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(85, 'Major Dent', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(86, 'Rusted', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(87, 'Dot/Spot', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(88, 'Dented', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(89, 'Broken', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(90, 'NA', 10, '2022-05-19 16:03:01', '2022-05-19 16:03:01'),
(91, 'Safe', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(92, 'Scratch', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(93, 'Minor Dent', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(94, 'Major Dent', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(95, 'Rusted', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(96, 'Dot/Spot', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(97, 'Dented', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(98, 'Broken', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(99, 'NA', 11, '2022-05-19 16:03:36', '2022-05-19 16:03:36'),
(100, 'Safe', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(101, 'Scratch', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(102, 'Minor Dent', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(103, 'Major Dent', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(104, 'Rusted', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(105, 'Dot/Spot', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(106, 'Dented', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(107, 'Broken', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(108, 'NA', 12, '2022-05-19 16:03:41', '2022-05-19 16:03:41'),
(109, 'Safe', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(110, 'Scratch', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(111, 'Minor Dent', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(112, 'Major Dent', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(113, 'Rusted', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(114, 'Dot/Spot', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(115, 'Dented', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(116, 'Broken', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(117, 'NA', 13, '2022-05-19 16:03:48', '2022-05-19 16:03:48'),
(118, 'Safe', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(119, 'Scratch', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(120, 'Minor Dent', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(121, 'Major Dent', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(122, 'Rusted', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(123, 'Dot/Spot', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(124, 'Dented', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(125, 'Broken', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(126, 'NA', 14, '2022-05-19 16:03:54', '2022-05-19 16:03:54'),
(127, 'Safe', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(128, 'Scratch', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(129, 'Minor Dent', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(130, 'Major Dent', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(131, 'Rusted', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(132, 'Dot/Spot', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(133, 'Dented', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(134, 'Broken', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(135, 'NA', 15, '2022-05-19 16:04:00', '2022-05-19 16:04:00'),
(136, 'Safe', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(137, 'Scratch', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(138, 'Minor Dent', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(139, 'Major Dent', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(140, 'Rusted', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(141, 'Dot/Spot', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(142, 'Dented', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(143, 'Broken', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(144, 'NA', 16, '2022-05-19 16:04:09', '2022-05-19 16:04:09'),
(145, 'Safe', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(146, 'Scratch', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(147, 'Minor Dent', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(148, 'Major Dent', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(149, 'Rusted', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(150, 'Dot/Spot', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(151, 'Dented', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(152, 'Broken', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(153, 'NA', 17, '2022-05-19 16:09:51', '2022-05-19 16:09:51'),
(154, 'Safe', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(155, 'Scratch', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(156, 'Minor Dent', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(157, 'Major Dent', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(158, 'Rusted', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(159, 'Dot/Spot', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(160, 'Dented', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(161, 'Broken', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(162, 'NA', 18, '2022-05-19 16:15:50', '2022-05-19 16:15:50'),
(163, 'Safe', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(164, 'Scratch', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(165, 'Minor Dent', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(166, 'Major Dent', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(167, 'Rusted', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(168, 'Dot/Spot', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(169, 'Dented', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(170, 'Broken', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(171, 'NA', 19, '2022-05-19 16:19:45', '2022-05-19 16:19:45'),
(172, 'Safe', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(173, 'Scratch', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(174, 'Minor Dent', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(175, 'Major Dent', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(176, 'Rusted', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(177, 'Dot/Spot', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(178, 'Dented', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(179, 'Broken', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(180, 'NA', 20, '2022-05-19 16:20:08', '2022-05-19 16:20:08'),
(181, 'Safe', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(182, 'Scratch', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(183, 'Minor Dent', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(184, 'Major Dent', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(185, 'Rusted', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(186, 'Dot/Spot', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(187, 'Dented', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(188, 'Broken', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(189, 'NA', 21, '2022-05-19 16:20:21', '2022-05-19 16:20:21'),
(190, 'Safe', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(191, 'Scratch', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(192, 'Minor Dent', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(193, 'Major Dent', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(194, 'Rusted', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(195, 'Dot/Spot', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(196, 'Dented', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(197, 'Broken', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(198, 'NA', 22, '2022-05-19 16:20:28', '2022-05-19 16:20:28'),
(199, 'Safe', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(200, 'Scratch', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(201, 'Minor Dent', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(202, 'Major Dent', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(203, 'Rusted', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(204, 'Dot/Spot', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(205, 'Dented', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(206, 'Broken', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(207, 'NA', 23, '2022-05-19 16:20:33', '2022-05-19 16:20:33'),
(208, 'Safe', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(209, 'Scratch', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(210, 'Minor Dent', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(211, 'Major Dent', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(212, 'Rusted', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(213, 'Dot/Spot', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(214, 'Dented', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(215, 'Broken', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(216, 'NA', 24, '2022-05-19 16:20:40', '2022-05-19 16:20:40'),
(217, 'Safe', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(218, 'Scratch', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(219, 'Minor Dent', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(220, 'Major Dent', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(221, 'Rusted', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(222, 'Dot/Spot', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(223, 'Dented', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(224, 'Broken', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(225, 'NA', 25, '2022-05-19 16:20:46', '2022-05-19 16:20:46'),
(226, 'Safe', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(227, 'Scratch', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(228, 'Minor Dent', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(229, 'Major Dent', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(230, 'Rusted', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(231, 'Dot/Spot', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(232, 'Dented', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(233, 'Broken', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(234, 'NA', 26, '2022-05-19 16:20:52', '2022-05-19 16:20:52'),
(235, 'Safe', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(236, 'Scratch', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(237, 'Minor Dent', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(238, 'Major Dent', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(239, 'Rusted', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(240, 'Dot/Spot', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(241, 'Dented', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(242, 'Broken', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(243, 'NA', 27, '2022-05-19 16:20:58', '2022-05-19 16:20:58'),
(244, 'Safe', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(245, 'Scratch', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(246, 'Minor Dent', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(247, 'Major Dent', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(248, 'Rusted', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(249, 'Dot/Spot', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(250, 'Dented', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(251, 'Broken', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(252, 'NA', 28, '2022-05-19 16:21:04', '2022-05-19 16:21:04'),
(253, 'Safe', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(254, 'Scratch', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(255, 'Minor Dent', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(256, 'Major Dent', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(257, 'Rusted', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(258, 'Dot/Spot', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(259, 'Dented', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(260, 'Broken', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(261, 'NA', 29, '2022-05-19 16:21:11', '2022-05-19 16:21:11'),
(262, 'Safe', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(263, 'Scratch', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(264, 'Minor Dent', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(265, 'Major Dent', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(266, 'Rusted', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(267, 'Dot/Spot', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(268, 'Dented', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(269, 'Broken', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(270, 'NA', 30, '2022-05-19 16:21:18', '2022-05-19 16:21:18'),
(271, 'Safe', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(272, 'Scratch', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(273, 'Minor Dent', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(274, 'Major Dent', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(275, 'Rusted', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(276, 'Dot/Spot', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(277, 'Dented', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(278, 'Broken', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(279, 'NA', 31, '2022-05-19 16:21:23', '2022-05-19 16:21:23'),
(280, 'Safe', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(281, 'Scratch', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(282, 'Minor Dent', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(283, 'Major Dent', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(284, 'Rusted', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(285, 'Dot/Spot', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(286, 'Dented', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(287, 'Broken', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(288, 'NA', 32, '2022-05-19 16:21:29', '2022-05-19 16:21:29'),
(289, 'Safe', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(290, 'Scratch', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(291, 'Minor Dent', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(292, 'Major Dent', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(293, 'Rusted', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(294, 'Dot/Spot', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(295, 'Dented', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(296, 'Broken', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(297, 'NA', 33, '2022-05-19 16:21:35', '2022-05-19 16:21:35'),
(298, 'Safe', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(299, 'Scratch', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(300, 'Minor Dent', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(301, 'Major Dent', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(302, 'Rusted', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(303, 'Dot/Spot', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(304, 'Dented', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(305, 'Broken', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(306, 'NA', 34, '2022-05-19 16:21:41', '2022-05-19 16:21:41'),
(307, 'Safe', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(308, 'Scratch', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(309, 'Minor Dent', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(310, 'Major Dent', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(311, 'Rusted', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(312, 'Dot/Spot', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(313, 'Dented', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(314, 'Broken', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(315, 'NA', 35, '2022-05-19 16:21:47', '2022-05-19 16:21:47'),
(316, 'Safe', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(317, 'Scratch', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(318, 'Minor Dent', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(319, 'Major Dent', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(320, 'Rusted', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(321, 'Dot/Spot', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(322, 'Dented', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(323, 'Broken', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(324, 'NA', 36, '2022-05-19 16:21:52', '2022-05-19 16:21:52'),
(325, 'Safe', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(326, 'Scratch', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(327, 'Minor Dent', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(328, 'Major Dent', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(329, 'Rusted', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(330, 'Dot/Spot', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(331, 'Dented', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(332, 'Broken', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(333, 'NA', 37, '2022-05-19 16:21:58', '2022-05-19 16:21:58'),
(334, 'Safe', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(335, 'Scratch', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(336, 'Minor Dent', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(337, 'Major Dent', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(338, 'Rusted', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(339, 'Dot/Spot', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(340, 'Dented', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(341, 'Broken', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(342, 'NA', 38, '2022-05-19 16:22:23', '2022-05-19 16:22:23'),
(343, 'Safe', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(344, 'Scratch', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(345, 'Minor Dent', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(346, 'Major Dent', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(347, 'Rusted', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(348, 'Dot/Spot', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(349, 'Dented', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(350, 'Broken', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(351, 'NA', 39, '2022-05-19 16:22:30', '2022-05-19 16:22:30'),
(352, 'Safe', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(353, 'Scratch', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(354, 'Minor Dent', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(355, 'Major Dent', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(356, 'Rusted', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(357, 'Dot/Spot', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(358, 'Dented', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(359, 'Broken', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(360, 'NA', 40, '2022-05-19 16:22:45', '2022-05-19 16:22:45'),
(361, 'Good', 41, '2022-05-19 16:24:50', '2022-05-19 16:24:50'),
(362, 'Average', 41, '2022-05-19 16:24:50', '2022-05-19 16:24:50'),
(363, 'Bad', 41, '2022-05-19 16:24:50', '2022-05-19 16:24:50'),
(364, 'NA', 41, '2022-05-19 16:24:50', '2022-05-19 16:24:50'),
(365, 'Safe', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(366, 'Scratch', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(367, 'Minor Dent', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(368, 'Major Dent', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(369, 'Rusted', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(370, 'Dot/Spot', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(371, 'Dented', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(372, 'Broken', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(373, 'NA', 42, '2022-05-19 16:25:21', '2022-05-19 16:25:21'),
(374, 'Safe', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(375, 'Scratch', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(376, 'Minor Dent', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(377, 'Major Dent', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(378, 'Rusted', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(379, 'Dot/Spot', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(380, 'Dented', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(381, 'Broken', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(382, 'NA', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(383, 'Lock Loose', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(384, 'Lock Broken', 43, '2022-05-19 16:29:46', '2022-05-19 16:29:46'),
(385, 'Safe', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(386, 'Scratch', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(387, 'Minor Dent', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(388, 'Major Dent', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(389, 'Rusted', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(390, 'Dot/Spot', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(391, 'Dented', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(392, 'Broken', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(393, 'NA', 44, '2022-05-19 16:31:33', '2022-05-19 16:31:33'),
(394, 'Safe', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(395, 'Scratch', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(396, 'Minor Dent', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(397, 'Major Dent', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(398, 'Rusted', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(399, 'Dot/Spot', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(400, 'Dented', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(401, 'Broken', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(402, 'NA', 45, '2022-05-19 16:31:38', '2022-05-19 16:31:38'),
(403, 'Safe', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(404, 'Scratch', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(405, 'Minor Dent', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(406, 'Major Dent', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(407, 'Rusted', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(408, 'Dot/Spot', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(409, 'Dented', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(410, 'Broken', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(411, 'NA', 46, '2022-05-19 16:31:44', '2022-05-19 16:31:44'),
(412, 'Safe', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(413, 'Scratch', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(414, 'Minor Dent', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(415, 'Major Dent', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(416, 'Rusted', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(417, 'Dot/Spot', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(418, 'Dented', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(419, 'Broken', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(420, 'NA', 47, '2022-05-19 16:31:49', '2022-05-19 16:31:49'),
(421, 'Safe', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(422, 'Scratch', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(423, 'Minor Dent', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(424, 'Major Dent', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(425, 'Rusted', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(426, 'Dot/Spot', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(427, 'Dented', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(428, 'Broken', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(429, 'NA', 48, '2022-05-19 16:31:55', '2022-05-19 16:31:55'),
(430, 'Safe', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(431, 'Scratch', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(432, 'Minor Dent', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(433, 'Major Dent', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(434, 'Rusted', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(435, 'Dot/Spot', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(436, 'Dented', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(437, 'Broken', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(438, 'NA', 49, '2022-05-19 16:32:00', '2022-05-19 16:32:00'),
(439, 'Safe', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(440, 'Scratch', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(441, 'Minor Dent', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(442, 'Major Dent', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(443, 'Rusted', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(444, 'Dot/Spot', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(445, 'Dented', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(446, 'Broken', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(447, 'NA', 50, '2022-05-19 16:32:06', '2022-05-19 16:32:06'),
(448, 'Safe', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(449, 'Scratch', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(450, 'Minor Dent', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(451, 'Major Dent', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(452, 'Rusted', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(453, 'Dot/Spot', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(454, 'Dented', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(455, 'Broken', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(456, 'NA', 51, '2022-05-19 16:32:11', '2022-05-19 16:32:11'),
(457, 'Safe', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(458, 'Scratch', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(459, 'Minor Dent', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(460, 'Major Dent', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(461, 'Rusted', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(462, 'Dot/Spot', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(463, 'Dented', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(464, 'Broken', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(465, 'NA', 52, '2022-05-19 16:32:16', '2022-05-19 16:32:16'),
(466, 'Safe', 53, '2022-05-19 16:32:21', '2022-05-19 16:32:21'),
(467, 'Scratch', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(468, 'Minor Dent', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(469, 'Major Dent', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(470, 'Rusted', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(471, 'Dot/Spot', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(472, 'Dented', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(473, 'Broken', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(474, 'NA', 53, '2022-05-19 16:32:22', '2022-05-19 16:32:22'),
(475, 'Safe', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(476, 'Scratch', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(477, 'Minor Dent', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(478, 'Major Dent', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(479, 'Rusted', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(480, 'Dot/Spot', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(481, 'Dented', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(482, 'Broken', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(483, 'NA', 54, '2022-05-19 16:32:29', '2022-05-19 16:32:29'),
(484, 'Safe', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(485, 'Scratch', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(486, 'Minor Dent', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(487, 'Major Dent', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(488, 'Rusted', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(489, 'Dot/Spot', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(490, 'Dented', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(491, 'Broken', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(492, 'NA', 55, '2022-05-19 16:32:44', '2022-05-19 16:32:44'),
(493, 'Safe', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(494, 'Scratch', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(495, 'Minor Dent', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(496, 'Major Dent', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(497, 'Rusted', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(498, 'Dot/Spot', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(499, 'Dented', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(500, 'Broken', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(501, 'NA', 56, '2022-05-19 16:32:49', '2022-05-19 16:32:49'),
(502, 'Safe', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(503, 'Scratch', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(504, 'Minor Dent', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(505, 'Major Dent', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(506, 'Rusted', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(507, 'Dot/Spot', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(508, 'Dented', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(509, 'Broken', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(510, 'NA', 57, '2022-05-19 16:32:56', '2022-05-19 16:32:56'),
(511, 'Safe', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(512, 'Scratch', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(513, 'Minor Dent', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(514, 'Major Dent', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(515, 'Rusted', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(516, 'Dot/Spot', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(517, 'Dented', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(518, 'Broken', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(519, 'NA', 58, '2022-05-19 16:33:02', '2022-05-19 16:33:02'),
(520, 'Safe', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(521, 'Scratch', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(522, 'Minor Dent', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(523, 'Major Dent', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(524, 'Rusted', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(525, 'Dot/Spot', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(526, 'Dented', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(527, 'Broken', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(528, 'NA', 59, '2022-05-19 16:33:08', '2022-05-19 16:33:08'),
(529, 'Safe', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(530, 'Scratch', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(531, 'Minor Dent', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(532, 'Major Dent', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(533, 'Rusted', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(534, 'Dot/Spot', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(535, 'Dented', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(536, 'Broken', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(537, 'NA', 60, '2022-05-19 16:33:14', '2022-05-19 16:33:14'),
(538, 'Safe', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(539, 'Scratch', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(540, 'Minor Dent', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(541, 'Major Dent', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(542, 'Rusted', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(543, 'Dot/Spot', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(544, 'Dented', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(545, 'Broken', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(546, 'NA', 61, '2022-05-19 16:33:21', '2022-05-19 16:33:21'),
(547, 'Safe', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(548, 'Scratch', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(549, 'Minor Dent', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(550, 'Major Dent', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(551, 'Rusted', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(552, 'Dot/Spot', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(553, 'Dented', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(554, 'Broken', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(555, 'NA', 62, '2022-05-19 16:33:26', '2022-05-19 16:33:26'),
(556, 'Safe', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(557, 'Scratch', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(558, 'Minor Dent', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(559, 'Major Dent', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(560, 'Rusted', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(561, 'Dot/Spot', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(562, 'Dented', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(563, 'Broken', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(564, 'NA', 63, '2022-05-19 16:33:32', '2022-05-19 16:33:32'),
(565, 'Safe', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(566, 'Scratch', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(567, 'Minor Dent', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(568, 'Major Dent', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(569, 'Rusted', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(570, 'Dot/Spot', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(571, 'Dented', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(572, 'Broken', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(573, 'NA', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(574, 'Lock Loose', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(575, 'Lock Broken', 64, '2022-05-19 16:33:56', '2022-05-19 16:33:56'),
(576, 'Safe', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(577, 'Scratch', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(578, 'Minor Dent', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(579, 'Major Dent', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(580, 'Rusted', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(581, 'Dot/Spot', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(582, 'Dented', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(583, 'Broken', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(584, 'NA', 65, '2022-05-19 16:35:56', '2022-05-19 16:35:56'),
(585, 'Safe', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(586, 'Scratch', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(587, 'Minor Dent', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(588, 'Major Dent', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(589, 'Rusted', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(590, 'Dot/Spot', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(591, 'Dented', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(592, 'Broken', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(593, 'NA', 66, '2022-05-19 16:36:00', '2022-05-19 16:36:00'),
(594, 'Safe', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(595, 'Scratch', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(596, 'Minor Dent', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(597, 'Major Dent', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(598, 'Rusted', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(599, 'Dot/Spot', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(600, 'Dented', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(601, 'Broken', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(602, 'NA', 67, '2022-05-19 16:36:06', '2022-05-19 16:36:06'),
(603, 'Safe', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(604, 'Scratch', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(605, 'Minor Dent', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(606, 'Major Dent', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(607, 'Rusted', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(608, 'Dot/Spot', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(609, 'Dented', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(610, 'Broken', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(611, 'NA', 68, '2022-05-19 16:36:10', '2022-05-19 16:36:10'),
(612, 'Safe', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(613, 'Scratch', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(614, 'Minor Dent', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(615, 'Major Dent', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(616, 'Rusted', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(617, 'Dot/Spot', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(618, 'Dented', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(619, 'Broken', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(620, 'NA', 69, '2022-05-19 16:36:16', '2022-05-19 16:36:16'),
(621, 'Safe', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(622, 'Scratch', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(623, 'Minor Dent', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(624, 'Major Dent', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(625, 'Rusted', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(626, 'Dot/Spot', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(627, 'Dented', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(628, 'Broken', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(629, 'NA', 70, '2022-05-19 16:36:22', '2022-05-19 16:36:22'),
(630, 'Safe', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(631, 'Scratch', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(632, 'Minor Dent', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(633, 'Major Dent', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(634, 'Rusted', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(635, 'Dot/Spot', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(636, 'Dented', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(637, 'Broken', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(638, 'NA', 71, '2022-05-19 16:36:28', '2022-05-19 16:36:28'),
(639, 'Safe', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(640, 'Scratch', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(641, 'Minor Dent', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(642, 'Major Dent', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(643, 'Rusted', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(644, 'Dot/Spot', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(645, 'Dented', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(646, 'Broken', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(647, 'NA', 72, '2022-05-19 16:36:33', '2022-05-19 16:36:33'),
(648, 'Safe', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(649, 'Scratch', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(650, 'Minor Dent', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(651, 'Major Dent', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(652, 'Rusted', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(653, 'Dot/Spot', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(654, 'Dented', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(655, 'Broken', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(656, 'NA', 73, '2022-05-19 16:36:39', '2022-05-19 16:36:39'),
(657, 'Safe', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(658, 'Scratch', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(659, 'Minor Dent', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(660, 'Major Dent', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(661, 'Rusted', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(662, 'Dot/Spot', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(663, 'Dented', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(664, 'Broken', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(665, 'NA', 74, '2022-05-19 16:36:44', '2022-05-19 16:36:44'),
(666, 'Safe', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(667, 'Scratch', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(668, 'Minor Dent', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(669, 'Major Dent', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(670, 'Rusted', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(671, 'Dot/Spot', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(672, 'Dented', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(673, 'Broken', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(674, 'NA', 75, '2022-05-19 16:36:50', '2022-05-19 16:36:50'),
(675, 'Safe', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(676, 'Scratch', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(677, 'Minor Dent', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(678, 'Major Dent', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(679, 'Rusted', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(680, 'Dot/Spot', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(681, 'Dented', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(682, 'Broken', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(683, 'NA', 76, '2022-05-19 16:36:56', '2022-05-19 16:36:56'),
(684, 'Safe', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(685, 'Scratch', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(686, 'Minor Dent', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(687, 'Major Dent', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(688, 'Rusted', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(689, 'Dot/Spot', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(690, 'Dented', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(691, 'Broken', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(692, 'Missing and not fitted', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(693, 'NA', 77, '2022-05-19 16:37:54', '2022-05-19 16:37:54'),
(694, 'Safe', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(695, 'Scratch', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(696, 'Minor Dent', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(697, 'Major Dent', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(698, 'Rusted', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(699, 'Dot/Spot', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(700, 'Dented', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(701, 'Broken', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(702, 'Missing and not fitted', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(703, 'NA', 78, '2022-05-19 16:38:14', '2022-05-19 16:38:14'),
(704, 'Safe', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(705, 'Scratch', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(706, 'Minor Dent', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(707, 'Major Dent', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(708, 'Rusted', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(709, 'Dot/Spot', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(710, 'Dented', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(711, 'Broken', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(712, 'NA', 79, '2022-05-19 16:39:17', '2022-05-19 16:39:17'),
(713, 'Safe', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(714, 'Scratch', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(715, 'Minor Dent', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(716, 'Major Dent', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(717, 'Rusted', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(718, 'Dot/Spot', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(719, 'Dented', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(720, 'Broken', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(721, 'NA', 80, '2022-05-19 16:39:23', '2022-05-19 16:39:23'),
(722, 'Safe', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(723, 'Scratch', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(724, 'Minor Dent', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(725, 'Major Dent', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(726, 'Rusted', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(727, 'Dot/Spot', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(728, 'Dented', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(729, 'Broken', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(730, 'NA', 81, '2022-05-19 16:39:49', '2022-05-19 16:39:49'),
(731, 'Safe', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(732, 'Scratch', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(733, 'Minor Dent', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(734, 'Major Dent', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(735, 'Rusted', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(736, 'Dot/Spot', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(737, 'Dented', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(738, 'Broken', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(739, 'NA', 82, '2022-05-19 16:39:55', '2022-05-19 16:39:55'),
(740, 'Safe', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(741, 'Scratch', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(742, 'Minor Dent', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(743, 'Major Dent', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(744, 'Rusted', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(745, 'Dot/Spot', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(746, 'Dented', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(747, 'Broken', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(748, 'NA', 83, '2022-05-19 16:40:01', '2022-05-19 16:40:01'),
(749, 'Safe', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(750, 'Scratch', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(751, 'Minor Dent', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(752, 'Major Dent', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(753, 'Rusted', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(754, 'Dot/Spot', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(755, 'Dented', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(756, 'Broken', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(757, 'NA', 84, '2022-05-19 16:40:07', '2022-05-19 16:40:07'),
(758, 'Safe', 85, '2022-05-19 16:40:57', '2022-05-19 16:40:57'),
(759, 'Scratch', 85, '2022-05-19 16:40:57', '2022-05-19 16:40:57'),
(760, 'Scar', 85, '2022-05-19 16:40:57', '2022-05-19 16:40:57'),
(761, 'Not Fitted', 85, '2022-05-19 16:40:57', '2022-05-19 16:40:57'),
(762, 'Cracked', 85, '2022-05-19 16:40:57', '2022-05-19 16:40:57'),
(763, 'NA', 85, '2022-05-19 16:40:57', '2022-05-19 16:40:57');
INSERT INTO `vehicle_damages` (`id`, `vehicle_damages`, `vp_id`, `created_at`, `updated_at`) VALUES
(764, 'Safe', 86, '2022-05-19 16:41:27', '2022-05-19 16:41:27'),
(765, 'Scratch', 86, '2022-05-19 16:41:27', '2022-05-19 16:41:27'),
(766, 'Scar', 86, '2022-05-19 16:41:27', '2022-05-19 16:41:27'),
(767, 'Not Fitted', 86, '2022-05-19 16:41:27', '2022-05-19 16:41:27'),
(768, 'Cracked', 86, '2022-05-19 16:41:27', '2022-05-19 16:41:27'),
(769, 'NA', 86, '2022-05-19 16:41:27', '2022-05-19 16:41:27'),
(770, 'Safe', 87, '2022-05-19 16:41:32', '2022-05-19 16:41:32'),
(771, 'Scratch', 87, '2022-05-19 16:41:32', '2022-05-19 16:41:32'),
(772, 'Scar', 87, '2022-05-19 16:41:32', '2022-05-19 16:41:32'),
(773, 'Not Fitted', 87, '2022-05-19 16:41:32', '2022-05-19 16:41:32'),
(774, 'Cracked', 87, '2022-05-19 16:41:32', '2022-05-19 16:41:32'),
(775, 'NA', 87, '2022-05-19 16:41:32', '2022-05-19 16:41:32'),
(776, 'Safe', 88, '2022-05-19 16:41:39', '2022-05-19 16:41:39'),
(777, 'Scratch', 88, '2022-05-19 16:41:39', '2022-05-19 16:41:39'),
(778, 'Scar', 88, '2022-05-19 16:41:39', '2022-05-19 16:41:39'),
(779, 'Not Fitted', 88, '2022-05-19 16:41:39', '2022-05-19 16:41:39'),
(780, 'Cracked', 88, '2022-05-19 16:41:39', '2022-05-19 16:41:39'),
(781, 'NA', 88, '2022-05-19 16:41:39', '2022-05-19 16:41:39'),
(782, 'Good', 89, '2022-05-19 16:43:11', '2022-05-19 16:43:11'),
(783, 'Average', 89, '2022-05-19 16:43:11', '2022-05-19 16:43:11'),
(784, 'Bad', 89, '2022-05-19 16:43:11', '2022-05-19 16:43:11'),
(785, 'NA', 89, '2022-05-19 16:43:11', '2022-05-19 16:43:11'),
(786, 'Safe', 90, '2022-05-19 16:44:27', '2022-05-19 16:44:27'),
(787, 'Scratch', 90, '2022-05-19 16:44:27', '2022-05-19 16:44:27'),
(788, 'Scar', 90, '2022-05-19 16:44:27', '2022-05-19 16:44:27'),
(789, 'Not Fitted', 90, '2022-05-19 16:44:27', '2022-05-19 16:44:27'),
(790, 'Cracked', 90, '2022-05-19 16:44:27', '2022-05-19 16:44:27'),
(791, 'NA', 90, '2022-05-19 16:44:27', '2022-05-19 16:44:27'),
(792, 'Safe', 91, '2022-05-19 16:44:33', '2022-05-19 16:44:33'),
(793, 'Scratch', 91, '2022-05-19 16:44:33', '2022-05-19 16:44:33'),
(794, 'Scar', 91, '2022-05-19 16:44:33', '2022-05-19 16:44:33'),
(795, 'Not Fitted', 91, '2022-05-19 16:44:33', '2022-05-19 16:44:33'),
(796, 'Cracked', 91, '2022-05-19 16:44:33', '2022-05-19 16:44:33'),
(797, 'NA', 91, '2022-05-19 16:44:33', '2022-05-19 16:44:33'),
(798, 'Safe', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(799, 'Scratch', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(800, 'Scar', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(801, 'Cracked', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(802, 'Broken', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(803, 'Not Working', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(804, 'NA', 92, '2022-05-19 16:45:54', '2022-05-19 16:45:54'),
(805, 'Safe', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(806, 'Scratch', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(807, 'Minor Dent', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(808, 'Major Dent', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(809, 'Rusted', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(810, 'Dot/Spot', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(811, 'Dented', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(812, 'Broken', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(813, 'NA', 93, '2022-05-19 16:49:55', '2022-05-19 16:49:55'),
(814, 'Safe', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(815, 'Scratch', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(816, 'Minor Dent', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(817, 'Major Dent', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(818, 'Rusted', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(819, 'Dot/Spot', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(820, 'Dented', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(821, 'Broken', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(822, 'NA', 94, '2022-05-19 16:50:01', '2022-05-19 16:50:01'),
(823, 'Safe', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(824, 'Scratch', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(825, 'Minor Dent', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(826, 'Major Dent', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(827, 'Rusted', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(828, 'Dot/Spot', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(829, 'Dented', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(830, 'Broken', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(831, 'NA', 95, '2022-05-19 16:50:20', '2022-05-19 16:50:20'),
(832, 'Safe', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(833, 'Scratch', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(834, 'Minor Dent', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(835, 'Major Dent', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(836, 'Rusted', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(837, 'Dot/Spot', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(838, 'Dented', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(839, 'Broken', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(840, 'NA', 96, '2022-05-19 16:50:26', '2022-05-19 16:50:26'),
(841, 'Safe', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(842, 'Scratch', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(843, 'Minor Dent', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(844, 'Major Dent', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(845, 'Rusted', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(846, 'Dot/Spot', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(847, 'Dented', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(848, 'Broken', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(849, 'NA', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(850, 'Lock Loose', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(851, 'Lock Broken', 97, '2022-05-19 16:51:08', '2022-05-19 16:51:08'),
(852, 'Safe', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(853, 'Scratch', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(854, 'Minor Dent', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(855, 'Major Dent', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(856, 'Rusted', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(857, 'Dot/Spot', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(858, 'Dented', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(859, 'Broken', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(860, 'NA', 98, '2022-05-19 16:51:51', '2022-05-19 16:51:51'),
(861, 'Safe', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(862, 'Scratch', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(863, 'Minor Dent', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(864, 'Major Dent', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(865, 'Rusted', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(866, 'Dot/Spot', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(867, 'Dented', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(868, 'Broken', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(869, 'NA', 99, '2022-05-19 16:54:28', '2022-05-19 16:54:28'),
(870, 'Safe', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(871, 'Scratch', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(872, 'Minor Dent', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(873, 'Major Dent', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(874, 'Rusted', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(875, 'Dot/Spot', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(876, 'Dented', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(877, 'Broken', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(878, 'NA', 100, '2022-05-19 16:54:35', '2022-05-19 16:54:35'),
(879, 'Safe', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(880, 'Scratch', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(881, 'Minor Dent', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(882, 'Major Dent', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(883, 'Rusted', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(884, 'Dot/Spot', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(885, 'Dented', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(886, 'Broken', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(887, 'NA', 101, '2022-05-19 16:54:45', '2022-05-19 16:54:45'),
(888, 'Safe', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(889, 'Scratch', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(890, 'Minor Dent', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(891, 'Major Dent', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(892, 'Rusted', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(893, 'Dot/Spot', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(894, 'Dented', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(895, 'Broken', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(896, 'NA', 102, '2022-05-19 16:54:52', '2022-05-19 16:54:52'),
(897, 'Safe', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(898, 'Scratch', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(899, 'Minor Dent', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(900, 'Major Dent', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(901, 'Rusted', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(902, 'Dot/Spot', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(903, 'Dented', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(904, 'Broken', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(905, 'NA', 103, '2022-05-19 16:54:58', '2022-05-19 16:54:58'),
(906, 'Safe', 104, '2022-05-19 16:56:18', '2022-05-19 16:56:18'),
(907, 'Scratch', 104, '2022-05-19 16:56:18', '2022-05-19 16:56:18'),
(908, 'Scar', 104, '2022-05-19 16:56:18', '2022-05-19 16:56:18'),
(909, 'Not Fitted', 104, '2022-05-19 16:56:18', '2022-05-19 16:56:18'),
(910, 'Cracked', 104, '2022-05-19 16:56:18', '2022-05-19 16:56:18'),
(911, 'NA', 104, '2022-05-19 16:56:18', '2022-05-19 16:56:18'),
(912, 'Safe', 105, '2022-05-19 16:56:25', '2022-05-19 16:56:25'),
(913, 'Scratch', 105, '2022-05-19 16:56:25', '2022-05-19 16:56:25'),
(914, 'Scar', 105, '2022-05-19 16:56:25', '2022-05-19 16:56:25'),
(915, 'Not Fitted', 105, '2022-05-19 16:56:25', '2022-05-19 16:56:25'),
(916, 'Cracked', 105, '2022-05-19 16:56:25', '2022-05-19 16:56:25'),
(917, 'NA', 105, '2022-05-19 16:56:25', '2022-05-19 16:56:25'),
(918, 'Safe', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(919, 'Scratch', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(920, 'Minor Dent', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(921, 'Major Dent', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(922, 'Rusted', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(923, 'Dot/Spot', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(924, 'Dented', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(925, 'Broken', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(926, 'Dented', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(927, 'Missing and not fitted', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(928, 'NA', 106, '2022-05-19 16:58:41', '2022-05-19 16:58:41'),
(929, 'Safe', 107, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(930, 'Scratch', 107, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(931, 'Scar', 107, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(932, 'Not Fitted', 107, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(933, 'Cracked', 107, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(934, 'NA', 107, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(935, 'Safe', 108, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(936, 'Scratch', 108, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(937, 'Scar', 108, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(938, 'Not Fitted', 108, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(939, 'Cracked', 108, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(940, 'NA', 108, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(941, 'Safe', 109, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(942, 'Scratch', 109, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(943, 'Minor Dent', 109, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(944, 'Major Dent', 109, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(945, 'Rusted', 109, '2022-05-19 17:00:03', '2022-05-19 17:00:03'),
(946, 'Dot/Spot', 109, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(947, 'Dented', 109, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(948, 'Broken', 109, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(949, 'NA', 109, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(950, 'Safe', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(951, 'Scratch', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(952, 'Minor Dent', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(953, 'Major Dent', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(954, 'Rusted', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(955, 'Dot/Spot', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(956, 'Dented', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(957, 'Broken', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(958, 'NA', 110, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(959, 'Safe', 111, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(960, 'Scratch', 111, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(961, 'Minor Dent', 111, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(962, 'Major Dent', 111, '2022-05-19 17:06:39', '2022-05-19 17:06:39'),
(963, 'Rusted', 111, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(964, 'Dot/Spot', 111, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(965, 'Dented', 111, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(966, 'Broken', 111, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(967, 'NA', 111, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(968, 'Safe', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(969, 'Scratch', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(970, 'Minor Dent', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(971, 'Major Dent', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(972, 'Rusted', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(973, 'Dot/Spot', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(974, 'Dented', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(975, 'Broken', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(976, 'NA', 112, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(977, 'Safe', 113, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(978, 'Scratch', 113, '2022-05-19 17:08:52', '2022-05-19 17:08:52'),
(979, 'Minor Dent', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(980, 'Major Dent', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(981, 'Rusted', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(982, 'Dot/Spot', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(983, 'Dented', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(984, 'Broken', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(985, 'NA', 113, '2022-05-19 17:18:41', '2022-05-19 17:18:41'),
(986, 'Safe', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(987, 'Scratch', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(988, 'Minor Dent', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(989, 'Major Dent', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(990, 'Rusted', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(991, 'Dot/Spot', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(992, 'Dented', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(993, 'Broken', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(994, 'NA', 114, '2022-05-19 17:20:44', '2022-05-19 17:20:44'),
(995, 'Safe', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(996, 'Scratch', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(997, 'Minor Dent', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(998, 'Major Dent', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(999, 'Rusted', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(1000, 'Dot/Spot', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(1001, 'Dented', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(1002, 'Broken', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(1003, 'NA', 115, '2022-05-19 17:20:56', '2022-05-19 17:20:56'),
(1004, 'Safe', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1005, 'Scratch', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1006, 'Minor Dent', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1007, 'Major Dent', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1008, 'Rusted', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1009, 'Dot/Spot', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1010, 'Dented', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1011, 'Broken', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1012, 'NA', 116, '2022-05-19 17:21:03', '2022-05-19 17:21:03'),
(1013, 'Safe', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1014, 'Scratch', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1015, 'Minor Dent', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1016, 'Major Dent', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1017, 'Rusted', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1018, 'Dot/Spot', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1019, 'Dented', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1020, 'Broken', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1021, 'NA', 117, '2022-05-19 17:21:11', '2022-05-19 17:21:11'),
(1022, 'Safe', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1023, 'Scratch', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1024, 'Minor Dent', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1025, 'Major Dent', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1026, 'Rusted', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1027, 'Dot/Spot', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1028, 'Dented', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1029, 'Broken', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1030, 'NA', 118, '2022-05-19 17:21:18', '2022-05-19 17:21:18'),
(1031, 'Safe', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1032, 'Scratch', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1033, 'Minor Dent', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1034, 'Major Dent', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1035, 'Rusted', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1036, 'Dot/Spot', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1037, 'Dented', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1038, 'Broken', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1039, 'NA', 119, '2022-05-19 17:21:27', '2022-05-19 17:21:27'),
(1040, 'Safe', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1041, 'Scratch', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1042, 'Minor Dent', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1043, 'Major Dent', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1044, 'Rusted', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1045, 'Dot/Spot', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1046, 'Dented', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1047, 'Broken', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1048, 'NA', 120, '2022-05-19 17:21:33', '2022-05-19 17:21:33'),
(1049, 'Good', 121, '2022-05-19 17:23:43', '2022-05-19 17:23:43'),
(1050, 'Average', 121, '2022-05-19 17:23:43', '2022-05-19 17:23:43'),
(1051, 'Bad', 121, '2022-05-19 17:23:43', '2022-05-19 17:23:43'),
(1052, 'NA', 121, '2022-05-19 17:23:43', '2022-05-19 17:23:43'),
(1053, 'Safe', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1054, 'Scratch', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1055, 'Minor Dent', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1056, 'Major Dent', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1057, 'Rusted', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1058, 'Dot/Spot', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1059, 'Dented', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1060, 'Broken', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1061, 'NA', 122, '2022-05-19 17:24:42', '2022-05-19 17:24:42'),
(1062, 'Safe', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1063, 'Scratch', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1064, 'Minor Dent', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1065, 'Major Dent', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1066, 'Rusted', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1067, 'Dot/Spot', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1068, 'Dented', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1069, 'Broken', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1070, 'NA', 123, '2022-05-19 17:24:50', '2022-05-19 17:24:50'),
(1071, 'Safe', 124, '2022-05-19 17:26:09', '2022-05-19 17:26:09'),
(1072, 'Scratch', 124, '2022-05-19 17:26:09', '2022-05-19 17:26:09'),
(1073, 'Scar', 124, '2022-05-19 17:26:09', '2022-05-19 17:26:09'),
(1074, 'Not Fitted', 124, '2022-05-19 17:26:09', '2022-05-19 17:26:09'),
(1075, 'Cracked', 124, '2022-05-19 17:26:09', '2022-05-19 17:26:09'),
(1076, 'NA', 124, '2022-05-19 17:26:09', '2022-05-19 17:26:09'),
(1077, 'Safe', 125, '2022-05-19 17:26:34', '2022-05-19 17:26:34'),
(1078, 'Scratch', 125, '2022-05-19 17:26:34', '2022-05-19 17:26:34'),
(1079, 'Scar', 125, '2022-05-19 17:26:34', '2022-05-19 17:26:34'),
(1080, 'Not Fitted', 125, '2022-05-19 17:26:34', '2022-05-19 17:26:34'),
(1081, 'Cracked', 125, '2022-05-19 17:26:34', '2022-05-19 17:26:34'),
(1082, 'NA', 125, '2022-05-19 17:26:34', '2022-05-19 17:26:34'),
(1083, 'NA', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1084, 'Truck', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1085, 'Bus', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1086, 'Three Wheeler', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1087, 'Crane', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1088, 'Tanker', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1089, 'LPG Tanker', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1090, 'Tractor', 126, '2022-05-19 17:28:16', '2022-05-19 17:28:16'),
(1091, 'Safe', 127, '2022-05-19 17:29:30', '2022-05-19 17:29:30'),
(1092, 'Scratch', 127, '2022-05-19 17:29:30', '2022-05-19 17:29:30'),
(1093, 'Scar', 127, '2022-05-19 17:29:30', '2022-05-19 17:29:30'),
(1094, 'Cracked', 127, '2022-05-19 17:29:30', '2022-05-19 17:29:30'),
(1095, 'Broken', 127, '2022-05-19 17:29:30', '2022-05-19 17:29:30'),
(1096, 'NA', 127, '2022-05-19 17:29:30', '2022-05-19 17:29:30'),
(1097, 'Safe', 128, '2022-05-19 17:29:37', '2022-05-19 17:29:37'),
(1098, 'Scratch', 128, '2022-05-19 17:29:37', '2022-05-19 17:29:37'),
(1099, 'Scar', 128, '2022-05-19 17:29:37', '2022-05-19 17:29:37'),
(1100, 'Cracked', 128, '2022-05-19 17:29:37', '2022-05-19 17:29:37'),
(1101, 'Broken', 128, '2022-05-19 17:29:37', '2022-05-19 17:29:37'),
(1102, 'NA', 128, '2022-05-19 17:29:37', '2022-05-19 17:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `id` bigint(20) unsigned NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicle_type`, `created_at`, `updated_at`) VALUES
(1, 'Two Wheeler', '2022-05-07 18:30:00', '2022-05-07 18:30:00'),
(2, 'Four Wheeler', '2022-05-07 18:30:00', '2022-05-07 18:30:00'),
(3, 'Commercial', '2022-05-07 18:30:00', '2022-05-07 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodyconditions`
--
ALTER TABLE `bodyconditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casetypes`
--
ALTER TABLE `casetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_models`
--
ALTER TABLE `case_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_branches`
--
ALTER TABLE `company_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fos`
--
ALTER TABLE `fos`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `fos_mobile_unique` (`mobile`), ADD UNIQUE KEY `fos_email_unique` (`email`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imageparts`
--
ALTER TABLE `imageparts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_statuses`
--
ALTER TABLE `inspection_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
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
-- Indexes for table `paymentmodes`
--
ALTER TABLE `paymentmodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`), ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policytypes`
--
ALTER TABLE `policytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcstatuses`
--
ALTER TABLE `rcstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `valuationtypes`
--
ALTER TABLE `valuationtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valuation_models`
--
ALTER TABLE `valuation_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehcile_parts`
--
ALTER TABLE `vehcile_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_damages`
--
ALTER TABLE `vehicle_damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodyconditions`
--
ALTER TABLE `bodyconditions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `casetypes`
--
ALTER TABLE `casetypes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `case_models`
--
ALTER TABLE `case_models`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company_branches`
--
ALTER TABLE `company_branches`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fos`
--
ALTER TABLE `fos`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `imageparts`
--
ALTER TABLE `imageparts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `inspection_statuses`
--
ALTER TABLE `inspection_statuses`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `paymentmodes`
--
ALTER TABLE `paymentmodes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `policytypes`
--
ALTER TABLE `policytypes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rcstatuses`
--
ALTER TABLE `rcstatuses`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `valuationtypes`
--
ALTER TABLE `valuationtypes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `valuation_models`
--
ALTER TABLE `valuation_models`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehcile_parts`
--
ALTER TABLE `vehcile_parts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `vehicle_damages`
--
ALTER TABLE `vehicle_damages`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1103;
--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
