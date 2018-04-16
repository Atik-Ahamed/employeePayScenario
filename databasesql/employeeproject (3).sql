-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 09:34 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeeproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `emp_id` int(10) UNSIGNED NOT NULL,
  `street_no` int(11) NOT NULL,
  `street_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`emp_id`, `street_no`, `street_name`, `city`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 90, 'Dhaka Road-201', 'Dhaka', 6000, '2018-04-04 12:29:39', '2018-04-06 11:54:11'),
(2, 202, 'dhakato chittagong', 'dhaka', 2000, '2018-04-04 14:35:17', '2018-04-04 14:35:17'),
(3, 504, 'canberra street', 'canberra', 4520, '2018-04-08 08:03:52', '2018-04-08 08:03:52'),
(4, 123, 'Rajshahi road-200', 'Rajshahi', 1234, '2018-04-06 03:49:33', '2018-04-06 03:49:33'),
(5, 345, 'Dhaka Road-201', 'Dhaka', 9876, '2018-04-06 03:52:20', '2018-04-06 03:52:20'),
(6, 654, 'Bogura Road-123', 'Bogra', 6543, '2018-04-06 03:55:05', '2018-04-06 03:55:05'),
(7, 987, 'Paharpur Road-756', 'paharpur', 9876, '2018-04-06 03:57:08', '2018-04-06 03:57:08'),
(8, 321, 'Chittagong Road-321', 'Chittagong', 3210, '2018-04-06 04:00:16', '2018-04-06 04:00:16'),
(9, 789, 'Khulna Road-789', 'Khulna', 7890, '2018-04-06 04:03:02', '2018-04-06 04:03:02'),
(10, 203, 'butyon-highway', 'burton', 2030, '2018-04-06 20:37:28', '2018-04-06 20:37:28'),
(11, 512, 'mohishbatal', 'Rajshahi', 6204, '2018-04-08 15:36:54', '2018-04-08 15:36:54'),
(12, 512, 'mohishbatal', 'rajshahi', 6201, '2018-04-15 06:03:12', '2018-04-15 06:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$dlCX31nF78vB5wQZhYRmX.imwX2R.HU4HuWk9QV2VFQxDbHwil70a', 'qW9c4kN8PMiE0aYFZe26ABEQRXk2LQc5dzxWghvhtEzZzS577P433fY5Vhhp', '2018-04-04 12:33:21', '2018-04-04 12:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_location`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 'Googong', '2018-04-04 12:34:16', '2018-04-04 12:34:16'),
(2, 'Labour', 'Canberra', '2018-04-04 13:36:43', '2018-04-04 13:36:43'),
(3, 'Foreman', 'Burton Canberra', '2018-04-06 20:38:23', '2018-04-06 20:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `type_of_work` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourlyrate` double DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `dept_id`, `type_of_work`, `hourlyrate`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Atik', 1, 'F', NULL, 'atik@gmail.com', '$2y$10$eNrNE4Bqqi98HqzzBhWMGusDI4K6YymUKHbgQpij5VxekCFow/Q5y', 'QwXPTlyeKx7hfNc8j15TfnLwcGXBPt0iseC7s9TwU4iK1jETxLofJwaAIklr', '2018-04-04 12:29:10', '2018-04-05 22:39:41'),
(2, 'ahamed', 1, 'P', 55, 'ahamed@gmal.com', '$2y$10$5HhtUAQ4hsqtthR7JKmpDeyA/HtsFt4uv8Rc5ZlVrV4DplcIZSqTC', 'qU0eJBcsIMi1yBgqoriwIstbkBK8yBbXotuNqTL61EaATnpZhUiPQhFcLNEH', '2018-04-04 14:34:47', '2018-04-15 06:57:48'),
(3, 'Muktar', 2, 'P', 28, 'muktar@gmail.com', '$2y$10$4BKr0DOQAcsZHFwD53otnOGGDK10F5vqCiQVTcHawHkLElmBzCpmG', 'zeTFbxmNKfhLMF17j9qTvIegrHW0EwkYSp3BBDm0B6rG6XTR4TLqMoLa6pRf', '2018-04-05 23:35:11', '2018-04-08 13:02:38'),
(4, 'Utso', 2, 'F', NULL, 'Utso@gmail.com', '$2y$10$5fhEld9V6nOo8RGuyGyEFO4Ci0PLj2pl2s3ebEogexsuZbPau8JgK', 'UXhLbyFgWM2cq6XqNipSo9GvRHyagw3Ts9bJbmZudvKLAHhaFCmzbGkUgHv5', '2018-04-06 03:47:13', '2018-04-08 06:38:18'),
(5, 'Warso', 1, 'P', 30, 'Warso@gamil.com', '$2y$10$G.T4vGXusTVAEqot19vrcuEjs2B62lg0sGtZdVJBvPOT8Ii4xI8J6', '07hBjisHR7R3ZkdL1j65XG5h5Xn9rFY8JiwwftVDlEk2yGkGV1Ot5MLns7uS', '2018-04-06 03:51:07', '2018-04-06 06:19:05'),
(6, 'Nowfel', 1, 'P', 29, 'nowfel@gmail.com', '$2y$10$AXiLRL7ojvhS2KztMmgQBuidUkx55km8Ho.F17gDc6AAjcihS6l72', 'YJQJv4Ecr5pZn7h11I319UUC8CLbEKCjXQ6IcPH2YL9ButLKk4zzAUqvvHNa', '2018-04-06 03:53:49', '2018-04-06 20:39:19'),
(7, 'Shahed', 2, 'P', 30, 'Shahed@gmail.com', '$2y$10$OdTZQ8xEHWofpbKBh0CdBu/PE5fSNCtbedrokHBAV/mNndLEZCAXu', 'Fwr1wquCOOKmypLatLAPfcXOYzgjyIFd3lzJcCquzxHzgnQYyhMfEu3zwNTF', '2018-04-06 03:55:56', '2018-04-06 20:40:12'),
(8, 'Asif', 1, 'F', NULL, 'Asif@gmail.com', '$2y$10$wx.nvjeE7wGeyzy9W3vBUuivGFbGSsZJhRkHv1cW6KVBeixxGOvPW', 'aO9shi22lzKKvQSlPcJRqIOv2eX05j3FHvfpOD4lINdcHzRQLvdNBKJJMBMJ', '2018-04-06 03:59:34', '2018-04-06 20:40:48'),
(9, 'Ismail', 2, 'P', 40, 'Ismail@gmail.com', '$2y$10$NDpJSrMdRoDTa0eQ9JnW.eruEirt5ct2S2wiSz7icLkiVe3NsNzym', 'BxZfD2FqYBVjf9APugMBFYh6LBXKS0TZEFNAnpAGmZuFhMVaQKKTY49XyFu6', '2018-04-06 04:01:42', '2018-04-08 06:34:21'),
(10, 'deb', 2, 'P', 36, 'deb@gmail.com', '$2y$10$2CK.9Kk8vRg9POZ6HobtKeK1PKxYFRi2FV8AxKrZ6IeKbedg2TY9a', 'DWYIKDZ5sc22RoD3iYbda9qJegtLzjohQf6CfMbGHOnIGvrXzzG1wYrFIO5e', '2018-04-06 20:36:50', '2018-04-06 20:41:32'),
(11, 'shuvo', 3, 'P', 40, 'shuvo@gmail.com', '$2y$10$MZ2ll/SJLXjV0OthADiIFuI1N7GOgfGlDriwnkMvAlu9RsxS5wEke', 'gcDOK1FP1QLgT9ZHMv4RykYrPgq3MG7dE5cjgQUNRAqDzG5KWvlW1ncv1YE3', '2018-04-08 15:36:00', '2018-04-08 15:41:04'),
(12, 'suvo', NULL, NULL, NULL, 'suvo@gmail.com', '$2y$10$kRtDXmrHJxW5cOqttFpq.OsHZaI65O9i.z7zIkt/du5Vtn.aAaXeW', 'G80UUVD55uDVZ52H2MIA6YR4tcTnKCTA6XeTWH97Gs68ChZvJ3P8V9eTzyWE', '2018-04-15 06:02:36', '2018-04-15 06:02:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeesalary`
-- (See below for the actual view)
--
CREATE TABLE `employeesalary` (
`name` varchar(191)
,`dept_name` varchar(191)
,`type_of_work` char(191)
,`basic` double
,`ALLOWENCE` double
,`Deduction` double
,`net_salary` double
);

-- --------------------------------------------------------

--
-- Table structure for table `employee_password_resets`
--

CREATE TABLE `employee_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `full_time_part_times`
--

CREATE TABLE `full_time_part_times` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `num_of_hours` int(11) NOT NULL,
  `works_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `full_time_part_times`
--

INSERT INTO `full_time_part_times` (`id`, `project_id`, `emp_id`, `dept_id`, `num_of_hours`, `works_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 8, '2017-12-05', '2018-04-04 13:12:57', '2018-04-04 13:12:57'),
(2, 1, 1, 1, 8, '2018-04-01', '2018-04-04 13:54:45', '2018-04-04 13:54:45'),
(5, 1, 3, 2, 3, '2016-12-05', '2018-04-05 23:38:12', '2018-04-05 23:38:12'),
(12, 2, 2, 1, 8, '2018-04-01', '2018-04-06 20:43:46', '2018-04-06 20:43:46'),
(13, 2, 3, 1, 6, '2018-04-02', '2018-04-06 20:44:34', '2018-04-06 20:44:34'),
(14, 3, 1, 1, 8, '2018-03-01', '2018-04-06 20:45:23', '2018-04-06 20:45:23'),
(15, 3, 1, 1, 6, '2018-04-01', '2018-04-06 20:46:06', '2018-04-06 20:46:06'),
(16, 3, 2, 2, 5, '2018-04-08', '2018-04-06 20:46:45', '2018-04-06 20:46:45'),
(17, 6, 1, 1, 7, '2018-04-04', '2018-04-06 20:51:54', '2018-04-06 20:51:54'),
(18, 2, 10, 1, 7, '2018-03-24', '2018-04-07 09:05:55', '2018-04-07 09:05:55'),
(19, 2, 1, 1, 8, '2018-04-01', '2018-04-07 09:08:57', '2018-04-07 09:08:57'),
(20, 1, 5, 2, 6, '2018-04-02', '2018-04-07 23:16:48', '2018-04-07 23:16:48'),
(21, 7, 9, 2, 7, '2018-04-02', '2018-04-08 06:35:36', '2018-04-08 06:35:36'),
(22, 2, 4, 2, 8, '2018-04-02', '2018-04-08 06:39:00', '2018-04-08 06:39:00'),
(23, 2, 4, 2, 8, '2018-04-02', '2018-04-08 06:39:29', '2018-04-08 06:39:29'),
(24, 2, 4, 2, 8, '2018-04-03', '2018-04-08 06:39:57', '2018-04-08 06:39:57'),
(25, 2, 4, 2, 8, '2018-04-01', '2018-04-08 06:57:32', '2018-04-08 06:57:32'),
(26, 2, 6, 1, 7, '2018-03-08', '2018-04-08 08:06:34', '2018-04-08 08:06:34'),
(27, 1, 6, 1, 7, '2018-04-01', '2018-04-08 08:18:26', '2018-04-08 08:18:26'),
(28, 2, 7, 2, 5, '2018-04-01', '2018-04-08 08:19:37', '2018-04-08 08:19:37'),
(29, 2, 11, 3, 6, '2018-04-09', '2018-04-08 15:45:42', '2018-04-08 15:45:42'),
(30, 2, 2, 1, 6, '2018-04-01', '2018-04-15 06:33:40', '2018-04-15 06:33:40'),
(31, 3, 12, 1, 8, '2018-04-17', '2018-04-15 06:35:48', '2018-04-15 06:35:48'),
(32, 6, 2, 1, 7, '2018-04-09', '2018-04-15 06:47:00', '2018-04-15 06:47:00');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_03_25_061148_create_departments_table', 1),
(3, '2018_03_25_061211_create_addresses_table', 1),
(4, '2018_03_25_061319_create_projects_table', 1),
(5, '2018_03_25_061349_create_full_time_part_times_table', 1),
(6, '2018_03_25_061413_create_salaries_table', 1),
(7, '2018_03_25_121955_create_admins_table', 1),
(8, '2018_03_25_121956_create_admin_password_resets_table', 1),
(9, '2018_03_25_122007_create_employees_table', 1),
(10, '2018_03_25_122008_create_employee_password_resets_table', 1);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_location`, `created_at`, `updated_at`) VALUES
(1, 'Burton Highway', 'Burton', '2018-04-04 12:35:15', '2018-04-04 12:35:15'),
(2, 'Googong Subdivision', 'Googong', '2018-04-04 12:35:43', '2018-04-04 12:35:43'),
(3, 'Workshop Repair', 'Kotara', '2018-04-04 13:38:18', '2018-04-04 13:38:18'),
(5, 'Kotara Highway', 'Kotara', '2018-04-04 13:39:02', '2018-04-04 13:39:02'),
(6, 'Canberra Street', 'Burton Canberra', '2018-04-06 20:50:06', '2018-04-06 20:50:06'),
(7, 'Sydney Road', 'Sydney', '2018-04-08 06:26:47', '2018-04-08 06:26:47'),
(8, 'Road Repair Luxmipur', 'Rajshahi', '2018-04-08 15:46:45', '2018-04-08 15:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `emp_id` int(10) UNSIGNED NOT NULL,
  `basic` double NOT NULL,
  `net_salary` double NOT NULL,
  `salary_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`emp_id`, `basic`, `net_salary`, `salary_date`, `created_at`, `updated_at`) VALUES
(1, 5100, 6171, '2018-04-13', '2018-04-04 13:19:38', '2018-04-15 06:48:36'),
(2, 1430, 1730.3, '2018-04-06', '2018-04-04 14:45:46', '2018-04-15 06:57:48'),
(3, 168, 203.28000000000003, '0000-00-00', '2018-04-06 20:44:34', '2018-04-08 13:02:38'),
(4, 5000, 6050, '2018-03-04', '2018-04-07 08:51:37', '2018-04-07 08:51:37'),
(5, 180, 217.8, '0000-00-00', '2018-04-07 23:16:48', '2018-04-07 23:16:48'),
(6, 203, 245.63000000000002, '2018-04-02', '2018-04-06 20:39:19', '2018-04-08 08:18:58'),
(7, 150, 181.5, '0000-00-00', '2018-04-06 20:40:12', '2018-04-08 08:19:37'),
(8, 6000, 7260, '2017-12-18', '2018-04-07 09:04:21', '2018-04-07 09:04:21'),
(9, 280, 338.8, '2018-04-08', '2018-04-08 06:34:21', '2018-04-08 06:36:10'),
(10, 252, 304.91999999999996, '0000-00-00', '2018-04-06 20:41:32', '2018-04-07 09:05:56'),
(11, 240, 290.4, '0000-00-00', '2018-04-08 15:41:04', '2018-04-08 15:45:42');

-- --------------------------------------------------------

--
-- Structure for view `employeesalary`
--
DROP TABLE IF EXISTS `employeesalary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeesalary`  AS  select `employees`.`name` AS `name`,`departments`.`dept_name` AS `dept_name`,`employees`.`type_of_work` AS `type_of_work`,`salaries`.`basic` AS `basic`,(0.45 * `salaries`.`basic`) AS `ALLOWENCE`,((0.09 * `salaries`.`basic`) + (0.15 * `salaries`.`basic`)) AS `Deduction`,`salaries`.`net_salary` AS `net_salary` from ((`employees` join `departments`) join `salaries`) where ((`employees`.`id` = `salaries`.`emp_id`) and (`employees`.`dept_id` = `departments`.`dept_id`)) order by `employees`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employee_password_resets`
--
ALTER TABLE `employee_password_resets`
  ADD KEY `employee_password_resets_email_index` (`email`),
  ADD KEY `employee_password_resets_token_index` (`token`);

--
-- Indexes for table `full_time_part_times`
--
ALTER TABLE `full_time_part_times`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `emp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `full_time_part_times`
--
ALTER TABLE `full_time_part_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `emp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
