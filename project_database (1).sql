-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 01:00 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unseen_notification` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `unseen_notification`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$VtfS3Zsz5NcIUP9dwA4wwu2u/pzxynNw5m6XFEA6VjyfQxeZXKfYG', NULL, '2019-10-08 22:00:00', '2019-10-08 22:00:00', 0),
(2, 'ali ahmed', 'ali@gmail.com', NULL, '$2y$10$0k5ie7SukyyuSeOtliePsOYoCdWzTMj4Rzhnpf5hXZ9ha.1LPkM7q', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Egypt'),
(2, 'USA'),
(3, 'Emarites'),
(4, 'masr');

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
(3, '2019_10_09_131215_create_systems_table', 1),
(4, '2019_10_09_145511_create_admins_table', 2),
(5, '2019_10_10_090013_create_countries_table', 3),
(6, '2019_10_10_111628_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `seen` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `body`, `header`, `seen`, `created_at`, `updated_at`) VALUES
(2, 'New System Has Been Added', 'By ahmed', '/systems', 1, NULL, NULL),
(3, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(4, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(5, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(6, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(7, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(8, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(9, 'New System Has Been Added', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(10, 'mnbmbnvmbvniuSystem Has Been Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(11, 'system system System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(12, 'mohamed System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(13, 'mohamed System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(14, 'system System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(15, 'systemgjf System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(16, 'mohamed zaki System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(17, 'mohamed zaki System  Updated', 'By  Admin :ahmed', '/systems', 1, NULL, NULL),
(18, 'mohamed haha System  Updated', 'By  Admin :ahmed', '/systems', 0, NULL, NULL),
(19, 'huyuutukjn System  Updated', 'By  Admin :ahmed', '/systems', 0, NULL, NULL),
(20, 'huyuutukjnjnhnh System  Updated', 'By  Admin :ahmed', '/systems', 0, NULL, NULL),
(21, 'New System Has Been Added', 'By  Admin :ali ahmed', '/systems', 0, NULL, NULL),
(22, 'rrrrrryyt System  Updated', 'By  Admin :ali ahmed', '/systems', 0, NULL, NULL),
(23, 'rrrrrryyttt System  Updated', 'By  Admin :ahmed', '/systems', 0, NULL, NULL);

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
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contcat_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hmme_sales_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_no` int(11) NOT NULL,
  `shipping_date` date NOT NULL,
  `installtion_date` date NOT NULL,
  `system_preferences` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `install_options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warrantly_start_date` date NOT NULL,
  `warrantly_end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `name`, `customer_name`, `modality`, `version`, `country`, `contcat_person`, `hmme_sales_person`, `po_no`, `shipping_date`, `installtion_date`, `system_preferences`, `install_options`, `warrantly_start_date`, `warrantly_end_date`, `created_at`, `updated_at`, `attachment`) VALUES
(13, 'mohamed haha', 'mohamedhgjgh', 'fhdddsfh', 'dhdafas', '3', 'dghgdshsd', 'dsfhdf', 234, '2019-10-23', '2019-10-02', 'a\\sdfgdfshgfdh', 'sdagfdhgfd', '2019-10-18', '2019-10-18', '2019-10-10 10:26:24', '2019-10-11 14:59:21', 'attach/ayXav3k9m2N9BawmshAYQbf9LfbusQOOiE3fNLcA.docx'),
(14, 'mohamed ali', 'uguiogui', 'fgjfgjfg', 'fgjfgjs', '3', 'hgdjkhgjkg', 'hfyufyuo', 23432, '2019-10-11', '2019-10-19', 'rtyhuer', 'gfhgfdjhg', '2019-10-28', '2019-10-30', '2019-10-10 10:34:20', '2019-10-10 10:34:20', 'attach/YtuOEtTH7GaY9LpNt6hjSztebVe2gkOUB2bySK7i'),
(15, 'huyuutukjnjnhnh', 'trhytert', 'trytee', 'reyert', '3', 'tureuyu', 'yrtyt', 657, '2019-10-10', '2019-10-19', 'gfjhgfht', 'hjkhgkjhlkjh', '2019-10-15', '2019-10-25', '2019-10-10 10:37:37', '2019-10-11 15:08:01', 'attach/vIHeQBeTqSKKKhov1ODKFYdDmsSphsYCLaYFZO6v.jpeg'),
(16, 'mnbmbnvmbvniu', 'nmbmnbvmnbv', 'vcbmnvbcm', 'mvsfghfs', '4', 'hbfnjhdgdf', 'fghfj', 56879, '2019-10-24', '2019-10-17', 'jhgjdh', 'fjdhgjgf', '2019-10-24', '2019-10-19', '2019-10-10 10:39:35', '2019-10-10 12:15:58', 'attach/cwHLzACyGh4NQiMIriZkpuHPsRqZ66JEVGEOllOI.docx'),
(17, 'rrrrrryyttt', 'rrrrrrrrrrr', 'rrrrrrrrrrrr', 'trrrrrrrrrrr', '3', 'ttttttttttttt', 'hhhhhhg', 3467, '2019-10-11', '2019-10-12', 'cyfbhnjimi', 'gvgubvihju', '2019-10-20', '2019-10-25', '2019-10-11 15:11:23', '2019-10-11 20:57:22', 'attach/1XIiizjiO49mbxwqOSULJsU0FCrVwX88rmRtXIy4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed zaki', 'mohamed@gmail.com', NULL, '$2y$10$VtfS3Zsz5NcIUP9dwA4wwu2u/pzxynNw5m6XFEA6VjyfQxeZXKfYG', NULL, '2019-10-09 12:58:02', '2019-10-09 12:58:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
