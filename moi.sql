-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 11:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moi`
--

-- --------------------------------------------------------

--
-- Table structure for table `amt_denominations`
--

CREATE TABLE `amt_denominations` (
  `id` int(11) NOT NULL,
  `funcation_id` int(11) DEFAULT NULL,
  `one_rs` int(11) DEFAULT NULL,
  `two_rs` int(11) DEFAULT NULL,
  `five_rs` int(11) DEFAULT NULL,
  `ten_rs` int(11) DEFAULT NULL,
  `twenty_rs` int(11) DEFAULT NULL,
  `fifty_rs` int(11) DEFAULT NULL,
  `hundred_rs` int(11) DEFAULT NULL,
  `twohundred_rs` int(11) DEFAULT NULL,
  `fivehundred_rs` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `gender` varchar(155) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `gender`, `email`, `address`, `mobile_no`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'rajkumar', 'male', 'sdsd@gmail.com', 'DFDSFFDS', '8987678900', 1, '2023-11-01 04:33:32', '2023-11-01 23:52:50'),
(3, 'aravindh', 'male', 'aravindkumar@gmail.com', 'raja street', '9898989898', 1, '2023-11-02 03:55:23', '2023-11-02 03:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `empname` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `empemail` varchar(255) NOT NULL,
  `joindate` date NOT NULL,
  `aadharid` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `pannumber` varchar(255) NOT NULL,
  `bankdeatils` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `empname`, `user_id`, `empemail`, `joindate`, `aadharid`, `phonenumber`, `gender`, `bloodgroup`, `pannumber`, `bankdeatils`, `role`, `status`, `updated_at`, `created_at`) VALUES
(9, 'rajkumar', 15, 'raj@gmail.com', '2023-10-25', '7898765678', '9629119037', 'male', 'B+', '89876546578', 'ICICI Bank', 4, '0', '2023-11-01 02:17:10', '2023-10-26 07:14:28'),
(10, 'aravindh', 16, 'tested@gmail.com', '2023-10-26', '987987987987', '9629119036', 'male', 'C+', '9898765467', 'ICICI bank', 4, '0', '2023-10-27 03:20:34', '2023-10-27 03:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_assign_details`
--

CREATE TABLE `employee_assign_details` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(20) NOT NULL,
  `enquiry_id` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `function_name` varchar(255) DEFAULT NULL,
  `function_date_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `function_date_end` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mobile_no` varchar(255) DEFAULT NULL,
  `function_location` varchar(255) DEFAULT NULL,
  `complaint_type_id` bigint(20) DEFAULT NULL,
  `function_type_id` bigint(20) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `enquiry_id`, `customer_id`, `customer_email`, `function_name`, `function_date_start`, `function_date_end`, `mobile_no`, `function_location`, `complaint_type_id`, `function_type_id`, `description`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'EQ-001', 2, 'df@gmail.com', 'dsfdsfsd', '2023-11-03 09:43:55', '2023-11-03 09:43:55', '9898789867', 'ewrewrew bewrew', NULL, NULL, NULL, 1, 1, '2023-11-01 23:46:22', '2023-11-03 04:13:55'),
(2, 'EQ-002', 3, 'tetst@gmail.com', 'marriage  function', '2023-11-03 09:44:34', '2023-11-03 09:44:34', '989898968', 'dsdsf dsfdsfdsf', NULL, NULL, NULL, 1, 1, '2023-11-02 03:56:36', '2023-11-03 04:14:34'),
(3, 'EQ-003', 2, 'fdsfds@gmail.com', 'dsdfds', '2023-11-03 10:00:55', '2023-11-03 10:00:55', '9090909090', 'dsfdsfds', NULL, NULL, NULL, 1, 1, '2023-11-02 04:47:24', '2023-11-03 04:30:55'),
(4, 'EQ-004', 3, 'sds@gmail.com', 'sadsad', '2023-11-03 09:40:59', '2023-11-03 09:40:59', '9898778989', 'sdssd', NULL, NULL, NULL, 0, 1, '2023-11-03 04:03:58', '2023-11-03 04:07:35'),
(5, 'EQ-005', 3, 'sds@gmail.com', 'sadsad', '2023-11-03 09:41:01', '2023-11-03 09:41:01', '9898778989', 'sdssd', NULL, NULL, NULL, 0, 1, '2023-11-03 04:03:58', '2023-11-03 04:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `event_moi_details`
--

CREATE TABLE `event_moi_details` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(255) DEFAULT NULL,
  `visitor_amt` varchar(255) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `amt_denomination` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amt_denomination`)),
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joborder`
--

CREATE TABLE `joborder` (
  `id` int(20) NOT NULL,
  `joborderid` varchar(250) DEFAULT NULL,
  `enquiry_id` int(11) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `function_type_id` int(20) DEFAULT NULL,
  `complaint_type_id` int(20) DEFAULT NULL,
  `employee_id` int(20) DEFAULT NULL,
  `work_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = pending ,\r\n 1 = accepted ,\r\n 2 = rejected ,\r\n 3 = closed ,\r\n4 - work started,\r\n5 - Inhouse reject request , \r\n6 - Not Servicable,\r\n7 - Reached Client Place , 8- completed',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `joborder`
--

INSERT INTO `joborder` (`id`, `joborderid`, `enquiry_id`, `customer_id`, `function_type_id`, `complaint_type_id`, `employee_id`, `work_date`, `description`, `is_active`, `status`, `created_at`, `updated_at`) VALUES
(1, 'JO-001', 1, 2, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-11-03 09:43:55', '2023-11-03 09:43:55'),
(2, 'JO-002', 2, 3, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-11-03 09:44:34', '2023-11-03 09:44:34'),
(3, 'JO-003', 3, 2, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-11-03 10:00:55', '2023-11-03 10:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `joborder_comments`
--

CREATE TABLE `joborder_comments` (
  `id` bigint(20) NOT NULL,
  `joborder_id` int(20) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'customer-index', 'web', '2023-10-24 05:45:06', '2023-10-24 05:45:10'),
(2, 'customer-add', 'web', '2023-10-24 05:45:13', '2023-10-24 05:45:15'),
(3, 'customer-edit', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:40'),
(4, 'customer-delete', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:40'),
(5, 'enquiry-index', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(6, 'enquiry-edit', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(7, 'enquiry-delete', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(8, 'enquiry-add', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(9, 'joborder-index', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(10, 'joborder-edit', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(11, 'joborder-delete', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(12, 'joborder-add', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(13, 'employee-index', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(14, 'employee-delete', 'web', '2023-10-24 05:45:37', '2023-10-24 05:45:37'),
(15, 'employee-edit', 'web', '2023-10-24 07:54:39', '2023-10-24 07:54:39'),
(16, 'employee-add', 'web', '2023-10-24 07:54:39', '2023-10-24 07:54:39'),
(17, 'payment-index', 'web', '2023-10-24 07:56:29', '2023-10-24 07:56:29'),
(18, 'payment-edit', 'web', '2023-10-24 07:56:29', '2023-10-24 07:56:29'),
(19, 'payment-delete', 'web', '2023-10-24 07:57:27', '2023-10-24 07:57:27'),
(20, 'employee-report', 'web', '2023-10-24 07:57:27', '2023-10-24 07:57:27'),
(21, 'customer-report', 'web', '2023-10-24 07:59:32', '2023-10-24 07:59:32'),
(22, 'payment-report', 'web', '2023-10-24 07:59:32', '2023-10-24 07:59:32'),
(23, 'function-report', 'web', '2023-10-24 08:01:09', '2023-10-24 08:01:09'),
(24, 'role-index', 'web', '2023-10-24 08:03:35', '2023-10-24 08:03:35'),
(25, 'role-edit', 'web', '2023-10-24 08:03:35', '2023-10-24 08:03:35'),
(26, 'role-delete', 'web', '2023-10-24 08:04:06', '2023-10-24 08:04:06'),
(27, 'role-add', 'web', '2023-10-24 08:04:06', '2023-10-24 08:04:06'),
(30, 'terms-index', 'web', '2023-10-27 07:36:51', '2023-10-27 07:36:51'),
(31, 'feedback-index', 'web', '2023-10-27 07:36:51', '2023-10-27 07:36:51'),
(32, 'notification-index', 'web', '2023-10-27 07:37:31', '2023-10-27 07:37:31'),
(33, 'joborder-report', 'web', '2023-10-27 07:43:48', '2023-10-27 07:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `guard_name` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin have all access', NULL, 1, '2023-10-25 23:14:55', '2023-10-25 23:14:55'),
(3, 'master', 'master permission', NULL, 1, '2023-10-26 02:17:09', '2023-10-26 02:17:09'),
(4, 'Employee', 'Office worker', NULL, 1, '2023-10-27 03:16:31', '2023-10-27 03:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(38, 20, 1, '2023-10-26 08:29:03', '2023-10-26 08:29:03'),
(39, 22, 1, '2023-10-26 08:29:03', '2023-10-26 08:29:03'),
(40, 23, 1, '2023-10-26 08:29:03', '2023-10-26 08:29:03'),
(41, 5, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(42, 6, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(43, 7, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(44, 8, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(45, 9, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(46, 10, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(47, 11, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(48, 12, 1, '2023-10-26 09:15:09', '2023-10-26 09:15:09'),
(72, 24, 1, '2023-10-26 13:26:57', '2023-10-26 13:26:57'),
(73, 25, 1, '2023-10-26 13:26:57', '2023-10-26 13:26:57'),
(74, 26, 1, '2023-10-26 13:26:57', '2023-10-26 13:26:57'),
(75, 27, 1, '2023-10-26 13:26:57', '2023-10-26 13:26:57'),
(125, 17, 3, '2023-10-27 08:31:47', '2023-10-27 08:31:47'),
(126, 18, 3, '2023-10-27 08:31:47', '2023-10-27 08:31:47'),
(127, 19, 3, '2023-10-27 08:31:47', '2023-10-27 08:31:47'),
(130, 22, 3, '2023-10-27 08:31:47', '2023-10-27 08:31:47'),
(136, 30, 3, '2023-10-27 08:31:47', '2023-10-27 08:31:47'),
(138, 32, 3, '2023-10-27 08:31:47', '2023-10-27 08:31:47'),
(140, 1, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(141, 2, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(142, 3, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(143, 4, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(144, 17, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(145, 18, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(146, 19, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(147, 21, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(148, 30, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(149, 31, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(150, 32, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(151, 33, 1, '2023-10-27 08:47:21', '2023-10-27 08:47:21'),
(161, 15, 4, '2023-11-01 07:56:12', '2023-11-01 07:56:12'),
(162, 16, 4, '2023-11-01 07:56:12', '2023-11-01 07:56:12'),
(163, 13, 4, '2023-11-01 08:38:35', '2023-11-01 08:38:35'),
(164, 14, 4, '2023-11-01 08:38:35', '2023-11-01 08:38:35'),
(169, 5, 4, '2023-11-01 13:43:26', '2023-11-01 13:43:26'),
(170, 6, 4, '2023-11-01 13:43:26', '2023-11-01 13:43:26'),
(171, 7, 4, '2023-11-01 13:43:26', '2023-11-01 13:43:26'),
(172, 8, 4, '2023-11-01 13:43:26', '2023-11-01 13:43:26'),
(175, 13, 1, '2023-11-02 12:45:49', '2023-11-02 12:45:49'),
(176, 14, 1, '2023-11-02 12:45:49', '2023-11-02 12:45:49'),
(177, 15, 1, '2023-11-02 12:45:49', '2023-11-02 12:45:49'),
(178, 16, 1, '2023-11-02 12:45:49', '2023-11-02 12:45:49'),
(179, 9, 4, '2023-11-02 12:51:50', '2023-11-02 12:51:50'),
(180, 10, 4, '2023-11-02 12:51:50', '2023-11-02 12:51:50'),
(181, 11, 4, '2023-11-02 12:51:50', '2023-11-02 12:51:50'),
(182, 12, 4, '2023-11-02 12:51:50', '2023-11-02 12:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `html` varchar(8000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `html`, `status`, `updated_at`, `created_at`) VALUES
(1, 'template1', '<!DOCTYPE html>\n<html>\n<head>\n    <meta charset=\"utf-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <link rel=\"icon\" type=\"image/png\" href=\"http://192.168.2.132:8080/app-0510/public/logo/logom8.png\" />\n    <title>Print</title>\n    <meta name=\"description\" content=\"\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n    <meta name=\"robots\" content=\"all,follow\">\n\n    <style type=\"text/css\">\n        * {\n            font-size: 14px;\n            line-height: 24px;\n            font-family: \'Ubuntu\', sans-serif;\n            text-transform: capitalize;\n        }\n\n        .btn {\n            padding: 7px 10px;\n            text-decoration: none;\n            border: none;\n            display: block;\n            text-align: center;\n            margin: 7px;\n            cursor: pointer;\n        }\n\n        .btn-info {\n            background-color: #999;\n            color: #FFF;\n        }\n\n        .btn-primary {\n            background-color: #6449e7;\n            color: #FFF;\n            width: 100%;\n        }\n\n        td,\n        th,\n        tr,\n        table {\n            border-collapse: collapse;\n        }\n\n        tr {\n            border-bottom: 1px dotted #ddd;\n        }\n\n        td,\n        th {\n            padding: 7px 0;\n            width: 50%;\n        }\n\n        table {\n            width: 100%;\n        }\n\n        tfoot tr th:first-child {\n            text-align: left;\n        }\n\n        .centered {\n            text-align: center;\n            align-content: center;\n        }\n\n        small {\n            font-size: 11px;\n        }\n\n        @media print {\n            * {\n                font-size: 12px;\n                line-height: 20px;\n            }\n            td,\n            th {\n                padding: 5px 0;\n            }\n            .hidden-print {\n                display: none !important;\n            }\n            @page {\n                margin: 0;\n            }\n            body {\n                margin: 0.5cm;\n                margin-bottom: 1.6cm;\n            }\n        }\n    </style>\n</head>\n\n<body>\n\n    <div style=\"max-width:400px;margin:0 auto\">\n\n        <div class=\"hidden-print\">\n            <table>\n                <tr>\n                    <td><a href=\"#\" class=\"btn btn-info\"><i class=\"fa fa-arrow-left\"></i> back</a> </td>\n                    <td><button onclick=\"window.print();\" class=\"btn btn-primary\"><i class=\"dripicons-print\"></i> print</button></td>\n                </tr>\n            </table>\n            <br>\n        </div>\n\n        <div id=\"receipt-data\">\n            <div class=\"centered\">\n\n                <img src=\"http://192.168.2.132:8080/app-0510/public/logo/logom8.png\" height=\"42\" width=\"42\" style=\"margin:10px 0;filter: brightness(0);\">\n\n\n                <h2>{{functionName}}</h2>\n\n                <p>Cost\n                    <br>{{functionCost}}\n                </p>\n            </div>\n			 <div class=\"address-form\">\n                <h3>Address:</h3>\n                <p>{{functionaddress}}</p>\n                \n            </div>\n			<div class=\"content\">\n                <h3>Description:</h3>\n                <p>{{description}}</p>\n            </div>\n           <table>\n            <tbody>\n                \n                <tr><td class=\"centered\" colspan=\"3\">Thank you for shopping with us. Please come again</td></tr>\n                <tr>\n                    <!-- <td class=\"centered\" colspan=\"3\">\n                    <img style=\"margin-top:10px;\" src=\"data:image/png;base64,\' . DNS1D::getBarcodePNG(1234, \'C128\') . \'\" width=\"300\" alt=\"barcode\"   />\n                    <br>\n                    <img style=\"margin-top:10px;\" src=\"data:image/png;base64,\' . DNS2D::getBarcodePNG(1233, \'QRCODE\') . \'\" alt=\"barcode\"   />   \n                    </td> -->\n                </tr>\n            </tbody>\n        </table>\n        </div>\n         \n    </div>\n\n    <script type=\"text/javascript\">\n    </script>\n\n</body>\n\n</html>', 1, '2023-10-05 06:40:12', '2023-10-05 06:40:12'),
(2, 'template2', '<!DOCTYPE html>\n<html>\n<head>\n    <meta charset=\"utf-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <link rel=\"icon\" type=\"image/png\" href=\"http://192.168.2.132:8080/app-0510/public/logo/logom8.png\" />\n    <title>Print</title>\n    <meta name=\"description\" content=\"\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n    <meta name=\"robots\" content=\"all,follow\">\n\n    <style type=\"text/css\">\n        * {\n            font-size: 14px;\n            line-height: 24px;\n            font-family: \'Ubuntu\', sans-serif;\n            text-transform: capitalize;\n        }\n\n        .btn {\n            padding: 7px 10px;\n            text-decoration: none;\n            border: none;\n            display: block;\n            text-align: center;\n            margin: 7px;\n            cursor: pointer;\n        }\n\n        .btn-info {\n            background-color: #999;\n            color: #FFF;\n        }\n\n        .btn-primary {\n            background-color: #6449e7;\n            color: #FFF;\n            width: 100%;\n        }\n\n        td,\n        th,\n        tr,\n        table {\n            border-collapse: collapse;\n        }\n\n        tr {\n            border-bottom: 1px dotted #ddd;\n        }\n\n        td,\n        th {\n            padding: 7px 0;\n            width: 50%;\n        }\n\n        table {\n            width: 100%;\n        }\n\n        tfoot tr th:first-child {\n            text-align: left;\n        }\n\n        .centered {\n            text-align: center;\n            align-content: center;\n        }\n\n        small {\n            font-size: 11px;\n        }\n\n        @media print {\n            * {\n                font-size: 12px;\n                line-height: 20px;\n            }\n            td,\n            th {\n                padding: 5px 0;\n            }\n            .hidden-print {\n                display: none !important;\n            }\n            @page {\n                margin: 0;\n            }\n            body {\n                margin: 0.5cm;\n                margin-bottom: 1.6cm;\n            }\n        }\n    </style>\n</head>\n\n<body>\n\n    <div style=\"max-width:400px;margin:0 auto\">\n\n        <div class=\"hidden-print\">\n            <table>\n                <tr>\n                    <td><a href=\"#\" class=\"btn btn-info\"><i class=\"fa fa-arrow-left\"></i> back</a> </td>\n                    <td><button onclick=\"window.print();\" class=\"btn btn-primary\"><i class=\"dripicons-print\"></i> print</button></td>\n                </tr>\n            </table>\n            <br>\n        </div>\n\n        <div id=\"receipt-data\">\n            <div class=\"centered\">\n\n                <img src=\"http://192.168.2.132:8080/app-0510/public/logo/logom8.png\" height=\"42\" width=\"42\" style=\"margin:10px 0;filter: brightness(0);\">\n\n\n                <h2>{{functionName}}</h2>\n\n                <p>Cost\n                    <br>{{functionCost}}\n                </p>\n            </div>\n			 <div class=\"address-form\">\n                <h3>Address:</h3>\n                <p>{{functionaddress}}</p>\n                \n            </div>\n			<div class=\"content\">\n                <h3>Description:</h3>\n                <p>{{description}}</p>\n            </div>\n           <table>\n            <tbody>\n                \n                <tr><td class=\"centered\" colspan=\"3\">Thank you for shopping with us. Please come again</td></tr>\n                <tr>\n                    <!-- <td class=\"centered\" colspan=\"3\">\n                    <img style=\"margin-top:10px;\" src=\"data:image/png;base64,\' . DNS1D::getBarcodePNG(1234, \'C128\') . \'\" width=\"300\" alt=\"barcode\"   />\n                    <br>\n                    <img style=\"margin-top:10px;\" src=\"data:image/png;base64,\' . DNS2D::getBarcodePNG(1233, \'QRCODE\') . \'\" alt=\"barcode\"   />   \n                    </td> -->\n                </tr>\n            </tbody>\n        </table>\n        </div>\n         \n    </div>\n\n    <script type=\"text/javascript\">\n    </script>\n\n</body>\n\n</html>', 1, '2023-10-09 01:38:50', '2023-10-09 01:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `address` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile_no`, `address`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$joayWvUF9rPmcX2AnK0bgOkLNcvB9lma64n4QFLUHIQCKVsjy.HWC', '1232344545', NULL, '1', NULL, '2023-10-09 05:59:52', '2023-10-13 01:25:35', NULL),
(15, 'rajkumar', 'raj@gmail.com', NULL, '$2y$10$p5NOcST9cYHbRwmvoVvshOkDWqeJGuNlSMCTfIYHFyvrgGXXqSGXW', '9629119037', NULL, '4', NULL, '2023-10-26 07:14:28', '2023-11-01 02:17:10', NULL),
(16, 'aravindh', 'tested@gmail.com', NULL, '$2y$10$l5QPGAqRjF4EtT78kOA3NOBhCx5yLJv5uZgMpGp6e8weuCvFjx772', '9629119036', NULL, '4', NULL, '2023-10-27 03:20:34', '2023-10-27 03:20:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amt_denominations`
--
ALTER TABLE `amt_denominations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_assign_details`
--
ALTER TABLE `employee_assign_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_moi_details`
--
ALTER TABLE `event_moi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joborder`
--
ALTER TABLE `joborder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joborder_comments`
--
ALTER TABLE `joborder_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amt_denominations`
--
ALTER TABLE `amt_denominations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_assign_details`
--
ALTER TABLE `employee_assign_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_moi_details`
--
ALTER TABLE `event_moi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joborder`
--
ALTER TABLE `joborder`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `joborder_comments`
--
ALTER TABLE `joborder_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
