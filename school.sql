-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 04:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_names`
--

CREATE TABLE `class_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_names`
--

INSERT INTO `class_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tiếng Anh', NULL, NULL),
(2, 'Tiếng Nhật', NULL, NULL),
(3, 'Tiếng Việt', NULL, NULL),
(4, 'Tiếng Hàn', NULL, NULL),
(5, 'Tiếng Pháp', NULL, NULL),
(6, 'Tiếng Trung', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_28_022026_create_students_table', 2),
(5, '2021_01_28_031124_create_class_names_table', 2),
(6, '2021_02_01_064506_add_attribute_image', 3),
(7, '2021_02_03_020725_add_deleted_to_student', 4);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `class_names_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstName`, `lastName`, `address`, `phone`, `dob`, `class_names_id`, `created_at`, `updated_at`, `image`, `deleted`) VALUES
(1, 'Son', 'Tran', 'hung vuong', '0906424280', '2021-01-14', 1, '2021-01-28 00:37:03', '2021-02-02 19:18:30', '', 0),
(2, 'Don', 'Le', 'quang binh', '0123456789', '2021-01-20', 3, '2021-01-28 01:17:23', '2021-01-28 01:17:23', '', 0),
(4, 'Tai', 'Giảng', 'quang binh', '0906424280', '2021-01-07', 1, '2021-01-28 20:50:03', '2021-01-28 21:27:46', '', 0),
(5, 'Cuong', 'Vo Van', 'quang binh', '0906424280', '2021-01-07', 1, '2021-01-28 20:50:11', '2021-02-01 02:42:55', '\\images\\1612172575.png', 0),
(6, 'Linh', 'Lê Thùy', 'Quảng Trị', '0906424280', '1997-05-01', 1, '2021-01-31 19:15:15', '2021-02-02 03:20:32', '\\images\\1612261232.png', 0),
(7, 'Cường', 'HAHA', 'haha', '0906424280', '2021-03-05', 1, '2021-01-31 19:27:00', '2021-01-31 21:27:10', '', 0),
(8, 'Độ', 'Ấn', 'Ấn độ', '0111112121', '2021-02-11', 3, '2021-01-31 23:59:44', '2021-01-31 23:59:44', '\\images\\1612162784.png', 0),
(14, 'Độ', 'Ấn', 'quang binh', '0906424280', '2021-02-10', 2, '2021-02-01 00:32:16', '2021-02-01 00:32:16', '\\images\\1612164736.png', 0),
(15, 'son', 'Quy Don', 'Quảng Trị', '0906424280', '2021-02-06', 2, '2021-02-01 00:44:18', '2021-02-01 00:44:18', '\\images\\1612165458.jpg', 0),
(16, 'Cuong', 'Vo Van', 'Quảng Trị', '0111112121', '2021-02-11', 4, '2021-02-01 00:45:20', '2021-02-01 00:45:20', '\\images\\1612165520.jpg', 0),
(17, 'Ấn', 'Độ', 'Ấn Độ', '0123456789', '1994-06-10', 1, '2021-02-01 00:55:41', '2021-02-02 02:32:20', '\\images\\1612166141.png', 0),
(18, 'Kim', 'Chi', 'Quảng Trị', '05132185321', '2021-02-26', 4, '2021-02-01 01:46:37', '2021-02-02 02:28:51', '\\images\\1612258109.jpg', 0),
(19, 'Linh', 'Vo Van', 'Quảng Trị', '0111112121', '2021-02-27', 1, '2021-02-01 02:07:01', '2021-02-02 20:04:05', '\\images\\1612321445.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tran Cong Son', 'admin', 'admin@gmail.com', '$2y$10$KY3aEocJ6BEDSiW4v7us9OF8jQNbJXEqIdD1JFgdtoF.JBJhfZL8O', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_names`
--
ALTER TABLE `class_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `class_names`
--
ALTER TABLE `class_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
