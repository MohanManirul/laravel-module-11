-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2023 at 06:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_05_150143_create_super_admins_table', 1),
(8, '2023_12_05_150241_create_users_table', 2),
(12, '2023_12_05_150300_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_type` enum('super_admin','user') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `created_user_type`, `post_date`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(22, 'Darjeeling', '1702195639SlBoGEiAArN2.jpeg', 'user', '2023-12-14', 2, 1, '2023-12-10 02:07:19', '2023-12-10 02:07:19'),
(23, 'Darjeeling 2', '1702195665cEbLJZmwZ72h.jpeg', 'user', '2023-12-14', 2, 1, '2023-12-10 02:07:45', '2023-12-10 02:07:45'),
(24, 'Darjeeling 3', '17021956787Fll8m47a7cQ.jpeg', 'user', '2023-12-22', 2, 0, '2023-12-10 02:07:58', '2023-12-10 02:07:58'),
(25, 'Darjeeling 4', '1702195689sVyNmdlEq1k0.jpeg', 'user', '2023-12-23', 2, 1, '2023-12-10 02:08:09', '2023-12-10 02:08:09'),
(26, 'Darjeeling 5', '1702195704cvXmlzXEX3nb.jpg', 'user', '2023-12-18', 2, 1, '2023-12-10 02:08:24', '2023-12-10 02:08:24'),
(27, 'Sikkim 1', '1702195742LjGexTG44sVv.jpeg', 'user', '2023-12-26', 3, 0, '2023-12-10 02:09:02', '2023-12-10 02:09:02'),
(28, 'Sikkim 2', '17021957524yLokw3Yo4Gw.jpg', 'user', '2023-12-10', 3, 1, '2023-12-10 02:09:12', '2023-12-10 02:09:12'),
(29, 'Sikkim 3', '1702195761IIBMChPzzGoH.jpg', 'user', '2023-12-14', 3, 1, '2023-12-10 02:09:21', '2023-12-10 02:09:21'),
(30, 'Sikkim 4', '1702195771CccVyVNt3Z9P.jpg', 'user', '2023-12-14', 3, 1, '2023-12-10 02:09:31', '2023-12-10 02:09:31'),
(31, 'Sikkim 5', '1702195781omL0Yz3LY2og.jpg', 'user', '2023-12-31', 3, 0, '2023-12-10 02:09:41', '2023-12-10 02:09:41'),
(32, 'Ladakh 1', '1702195942v9fuF3o1pA0h.jpeg', 'user', '2023-12-19', 4, 1, '2023-12-10 02:12:22', '2023-12-10 02:12:22'),
(33, 'Ladakh 2', '17021959604F4e3ox3ISr2.jpeg', 'user', '2023-12-21', 4, 0, '2023-12-10 02:12:40', '2023-12-10 02:12:40'),
(34, 'Ladakh 3', '17021959769ZB9At2jZlYJ.jpeg', 'user', '2023-12-22', 4, 1, '2023-12-10 02:12:56', '2023-12-10 02:12:56'),
(35, 'Ladakh 4', '1702195989rvkqtv90NStc.jpeg', 'user', '2023-12-30', 4, 1, '2023-12-10 02:13:09', '2023-12-10 02:13:09'),
(36, 'Ladakh 5', '1702196001F3y1GhoXi7ZJ.jpeg', 'user', '2023-12-20', 4, 1, '2023-12-10 02:13:21', '2023-12-10 02:13:21'),
(37, 'kashmir 1', '1702196102VcyVohzqyA9N.jpeg', 'user', '2023-12-15', 5, 0, '2023-12-10 02:15:02', '2023-12-10 02:15:02'),
(38, 'kashmir 2', '1702196114o9mWrCkLO4e4.jpeg', 'user', '2023-12-23', 5, 1, '2023-12-10 02:15:14', '2023-12-10 02:15:14'),
(39, 'kashmir 3', '170219612783rq2ncSbQsu.jpeg', 'user', '2023-12-29', 5, 1, '2023-12-10 02:15:27', '2023-12-10 02:15:27'),
(40, 'kashmir 4', '17021961375vYgs4uoIVqF.jpeg', 'user', '2023-12-27', 5, 1, '2023-12-10 02:15:38', '2023-12-10 02:15:38'),
(41, 'kashmir 5', '1702196149oFR2FWEQuSXk.jpeg', 'user', '2023-12-14', 5, 1, '2023-12-10 02:15:49', '2023-12-10 02:15:49'),
(42, 'Super Admin Post 1', '1702196114o9mWrCkLO4e4.jpeg', 'super_admin', '2023-12-14', 1, 1, NULL, NULL),
(43, 'admin post 2', '1702216338z6kMtiK8qe3J.jpeg', 'super_admin', '2023-12-10', 1, 0, '2023-12-10 07:52:18', '2023-12-10 07:52:18'),
(44, 'Admin Post 3', '1702216930qLamXYihd4NG.png', 'super_admin', '2023-12-10', 1, 1, '2023-12-10 07:54:41', '2023-12-10 08:02:10'),
(52, 'matching post', '1702289592oicrJoCKODPG.jpg', 'user', '2023-11-30', 1, 1, '2023-12-11 04:13:12', '2023-12-11 04:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `name`, `email`, `phone`, `image`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '01915985336', NULL, '$2y$12$ALgN.znv.B5Fo6.W1jjlT.aCYW0GGHHcCi8wNmOLLUNLgq3Nanj7y', NULL, NULL, '2023-12-05 11:23:16', '2023-12-05 11:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `email`, `image`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md.Saklain Hossain', 'U-312529', 'khairul@gmail.com', NULL, '$2y$12$xKta5zmHixozEKURU605V.KiZyiJpqopFB6jC/mSoLTtXadU4DD9K', 1, 'ibtFjbDVOEvS9qSE7GsM8HUdtG7MrA81kyBinQFH8W8wyW2nc4YF94ze0tKU', '2023-12-06 00:17:08', '2023-12-06 00:17:08'),
(2, 'Md.Zamil Ahmed', 'U-305271', 'zamil@gmail.com', NULL, '$2y$12$N8W796x5U4Bqtu91L3DhWuLIBSILRoMvFTF6hzfP2..s710rnaLfS', 1, 'V5JfjDfefhWpLgo5Nt44GpXdoRkx50I18HRtPz1Rmk3wSF3tz8wcFZ7n6YBJ', '2023-12-06 00:19:31', '2023-12-06 00:19:31'),
(3, 'Mst.Sidratul Munia', 'U-520221', 'munia@gmail.com', NULL, '$2y$12$bUlp6aEu2iE6VCy3lvCr..G1Ao/EWXD/TvDLm/CNvjqa.1XT007KS', 1, 'eAni7S92ttOc7ExkRLqzrXJekYJ4yISmO5Ctel5b81S5YENCJ3kOMRAXi3RT', '2023-12-06 00:21:06', '2023-12-06 00:21:06'),
(4, 'Mst.Maliha Khatun', 'U-791386', 'maliha@gmail.com', NULL, '$2y$12$5eCk0KogCDRKTwcw5m7LeOpPqUHh3iYZI5if4Bcb.GslZYEKKDNwy', 1, 'P4UbtwKtYB9xvkpUfQicjQq7ahCDqI0Exm72huHwg5MtqlppdJSTEv113WYQ', '2023-12-06 00:32:33', '2023-12-06 00:32:33'),
(5, 'Md.Saiful Islam', 'U-943210', 'saiful@gmail.com', NULL, '$2y$12$aiKTCyiyclAQNAt6nTLTeOK7J/0rXZ.Gy/FpT2xgNHNZcF0ry.TUy', 1, 'OmZXfDEYafSb31V8Dgz0xJBMECHfDukdWR5PPcsBIUIdwSt6zcLktT04le0D', '2023-12-06 00:41:15', '2023-12-06 00:41:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `super_admins_email_unique` (`email`),
  ADD UNIQUE KEY `super_admins_phone_unique` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
