-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 01:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `email`, `password`, `remember_token`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'pradeep', 'pradeep.r@indianic.com', '$2y$10$nac946YuO.l7ZvKluTZPjeX9Vf8nYMIv57Ng7gR1yoyhb2hxbW922', NULL, '26.845823799999998', '75.81094639999999', '2020-08-29 03:34:21', '2020-08-29 03:34:21'),
(2, 'pradeep', 'prade1ep.r@indianic.com', '$2y$10$yWNzUrwIneR15.q/2XpEEefPwgECXN56CAnoyiI0TTyWOb0/O5g8S', NULL, NULL, NULL, '2020-08-29 03:36:15', '2020-08-29 03:36:15'),
(3, 'pradeep', 'pradeq1ep.r@indianic.com', '$2y$10$u6CM4X2Yd9zl19Ag1jj8VuWkoKeJNjaPXT2cxRGMdlxJFJs2.CAdW', NULL, NULL, NULL, '2020-08-29 03:38:28', '2020-08-29 03:38:28'),
(4, 'pradeep', 'praqdeq1ep.r@indianic.com', '$2y$10$o80qjjMMEeSu9dKC8MNCSedja3xJo3KZuzAugLjAU8cTHZo1KWRZ.', NULL, NULL, NULL, '2020-08-29 03:38:51', '2020-08-29 03:38:51'),
(5, 'pradeep', 'praqdeq1eqp.r@indianic.com', '$2y$10$tU7r0pd2FFghbHZ.WxmmweZpD5uEmniirVPPZxIYk8nQjkpKKqG1C', NULL, NULL, NULL, '2020-08-29 03:41:01', '2020-08-29 03:41:01'),
(6, 'pradeep', 'praqdeq1eqwp.r@indianic.com', '$2y$10$DN5OLiyFWroEVqrXsa4KVu742ublah1ybLPL4e45eAX8BLlVuYEi.', NULL, NULL, NULL, '2020-08-29 03:41:49', '2020-08-29 03:41:49'),
(7, 'pradeep', 'praqdaeq1eqwp.r@indianic.com', '$2y$10$Hf9cf3y.2R79M4svTC58jOPUBawZI.MK/EGEfUA2XmmG8bZOku6Ra', NULL, NULL, NULL, '2020-08-29 03:42:21', '2020-08-29 03:42:21'),
(8, 'pradeep', 'praqsdaeq1eqwp.r@indianic.com', '$2y$10$/NNX8r/LgJ.KQxgZzM1Zp.wH9w9mssTnbV6iIxxUGom.5L3gjkaCe', NULL, NULL, NULL, '2020-08-29 03:43:04', '2020-08-29 03:43:04'),
(9, 'pradeep', 'praqsadaeq1eqwp.r@indianic.com', '$2y$10$e/BtB9tI2bSVA0iLMdnhWOo/uiFqzYot8h3TjjOtFKSU1D8ZF4.Gi', NULL, NULL, NULL, '2020-08-29 03:43:59', '2020-08-29 03:43:59'),
(10, 'Pradeep relwani', 'praqsadaeaq1eqwp.r@indianic.com', '$2y$10$D/A8sPkkDhVt4ixrtHkU5OnV80NH5Rq62drGEeEd1HRnSw/YscS02', NULL, NULL, NULL, '2020-08-29 03:44:31', '2020-08-29 03:44:31'),
(11, 'Pradeep relwani', 'praqsadaeasq1eqwp.r@indianic.com', '$2y$10$VNL76A5UteQyRm9.YIQYxuA2eDk8m/uD7ekxrGoRUaIxG0dsgZ.F.', NULL, NULL, NULL, '2020-08-29 03:45:12', '2020-08-29 03:45:12'),
(12, 'pradeep', 'pradeepa.r@indianic.com', '$2y$10$HTOKzUJ8KRABlPbBx9gUK.540QJRAmzrhAOH1M1qnyZhw12mXTiMq', NULL, NULL, NULL, '2020-08-29 03:58:24', '2020-08-29 03:58:24'),
(13, 'pradeep', 'pradeepa.ra@indianic.com', '$2y$10$JTDaf//sxPt31hrPTuvI5utV3uMEvvjy0gJHUM0Qi7.UXiPdZRUti', NULL, NULL, NULL, '2020-08-29 03:58:58', '2020-08-29 03:58:58'),
(14, 'pradeep', 'pradeepaa.ra@indianic.com', '$2y$10$VCLl0v3a99rUqRC6WjOH3udW09Wl0qsz0loJqIn4hcvzDtAVfnmKq', NULL, NULL, NULL, '2020-08-29 03:59:29', '2020-08-29 03:59:29'),
(15, 'pradeep', 'pradeaaep.r@indianic.com', '$2y$10$wLAI58meOUd/nUoT2cOple7tPScUdO1wncp/lZNycEbk7jY3/D5pa', NULL, NULL, NULL, '2020-08-29 03:59:51', '2020-08-29 03:59:51'),
(16, 'pradeep', 'praadeaaep.r@indianic.com', '$2y$10$PeY6LxHFjwOmSoZnI6TeFuAIpOHrEcqwZ3tBkkaKJdQoiUg2QChs2', NULL, NULL, NULL, '2020-08-29 04:00:10', '2020-08-29 04:00:10'),
(17, 'pradeep', 'praaaadeep.r@indianic.com', '$2y$10$fARgRpaZ/rPr86YAF7qT0eyfLIwGM79NjLzYCd/dbbEY1o1v05R8q', NULL, NULL, NULL, '2020-08-29 04:00:21', '2020-08-29 04:00:21'),
(18, 'pradeep', 'praaaaadeep.r@indianic.com', '$2y$10$YrTFzl2b7MoSFFlsOYxzwuhYcQY45lgQyjLVz9OPErVdyPnUZ0v3u', NULL, NULL, NULL, '2020-08-29 04:00:46', '2020-08-29 04:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `driver_password_resets`
--

CREATE TABLE `driver_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Reading', 'Active', NULL, NULL),
(2, 'Writing', 'Active', NULL, NULL),
(3, 'Dancing', 'Active', NULL, NULL),
(4, 'Singing', 'Active', NULL, NULL),
(5, 'Traveling  ', 'Active', NULL, NULL);

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
(1, '2014_10_12_000000_create_riders_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_23_103953_create_hobbies_table', 1),
(4, '2020_08_23_103953_create_rider_hobbies_table', 1),
(5, '2020_08_23_103953_create_rider_cards_table', 2),
(6, '2020_08_29_084826_create_drivers_table', 3),
(7, '2014_10_12_100000_create_driver_password_resets_table', 4),
(10, '2020_08_29_101701_create_rides_table', 5);

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
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_day` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_month` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `name`, `email`, `profile_pic`, `phone`, `birth_day`, `birth_month`, `birth_year`, `gender`, `email_verified_at`, `about_me`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'pradeep', 'pradeep.r@indianic.com', '1598685858.img_lights.jpg', '8233382001', '3', '2', '1952', 'Male', NULL, '123', '$2y$10$oWbrqRcbL.ArNZkTTfd6ku3yMgMTtqBv6LHXlUiv08.cgaq8h6P/i', NULL, '2020-08-29 01:54:18', '2020-08-29 01:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `rider_cards`
--

CREATE TABLE `rider_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rider_id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider_cards`
--

INSERT INTO `rider_cards` (`id`, `rider_id`, `card_number`, `card_holder`, `expiry_month`, `expiry_year`, `cvv`, `created_at`, `updated_at`) VALUES
(1, 4, '4111111111111', '11', '2', '2021', '111', '2020-08-29 02:57:16', '2020-08-29 02:57:16'),
(2, 4, '4111111111111111', '111', '1', '2024', '111', '2020-08-29 03:08:38', '2020-08-29 03:08:38'),
(3, 4, '4111111111111111', '111111111', '2', '2021', '111', '2020-08-29 03:10:37', '2020-08-29 03:10:37'),
(4, 4, '4111111111111111', '1111', '1', '2020', '111', '2020-08-29 03:10:51', '2020-08-29 03:10:51'),
(5, 4, '4111111111111111', '111', '2', '2021', '111', '2020-08-29 03:12:25', '2020-08-29 03:12:25'),
(6, 4, '1232111111111111', '1', '1', '2020', '123', '2020-08-29 23:37:46', '2020-08-29 23:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `rider_hobbies`
--

CREATE TABLE `rider_hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rider_id` bigint(20) UNSIGNED NOT NULL,
  `hobby_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider_hobbies`
--

INSERT INTO `rider_hobbies` (`id`, `rider_id`, `hobby_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, NULL, NULL),
(2, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `source_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`id`, `rider_id`, `driver_id`, `source_lat`, `source_long`, `source_address`, `destination_lat`, `destination_long`, `destination_address`, `status`, `created_at`, `updated_at`) VALUES
(72, 4, NULL, '26.9641734', '75.7612915', 'Gourav Tower, Dahar Ka Balaji, Jaipur, Rajasthan 302039, India', '26.9242026', '75.81344639999999', 'Chandpol, Jaipur, Rajasthan 302001, India', 'pending', '2020-08-30 03:23:09', '2020-08-30 03:23:09'),
(73, 4, 1, '26.8459292', '75.8125184', 'Amer, Jaipur, Rajasthan, India', '26.9880', '75.86171709999999', 'Apex Cir, Usha Colony, Sector 1, Malviya Nagar, Jaipur, Rajasthan 302017, India', 'rejected', '2020-08-30 03:23:30', '2020-08-30 06:23:35'),
(74, 4, 1, '26.8459292', '75.8125184', 'Girdhar Marg, Sector 12, Malviya Nagar, Jaipur, Rajasthan 302017, India', '26.8176736', '75.86171709999999', 'Jagatpura, Jaipur, Rajasthan, India', 'rejected', '2020-08-30 03:24:20', '2020-08-30 06:23:36'),
(75, 4, 1, '26.8548662', '75.8242966', 'Malviya Nagar, Jaipur, Rajasthan 302017, India', '26.8503865', '75.8042646', 'JLN marg, Genpact-JLN Building, Siddharth Nagar, Sector 9, Malviya Nagar, Jaipur, Rajasthan 302017, India', 'accepted', '2020-08-30 06:20:40', '2020-08-30 06:22:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_email_unique` (`email`);

--
-- Indexes for table `driver_password_resets`
--
ALTER TABLE `driver_password_resets`
  ADD KEY `driver_password_resets_email_index` (`email`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
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
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riders_email_unique` (`email`);

--
-- Indexes for table `rider_cards`
--
ALTER TABLE `rider_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rider_cards_rider_id_foreign` (`rider_id`);

--
-- Indexes for table `rider_hobbies`
--
ALTER TABLE `rider_hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rider_hobbies_rider_id_foreign` (`rider_id`),
  ADD KEY `rider_hobbies_hobby_id_foreign` (`hobby_id`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rides_rider_id_foreign` (`rider_id`),
  ADD KEY `rides_driver_id_foreign` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rider_cards`
--
ALTER TABLE `rider_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rider_hobbies`
--
ALTER TABLE `rider_hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rider_cards`
--
ALTER TABLE `rider_cards`
  ADD CONSTRAINT `rider_cards_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `riders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rider_hobbies`
--
ALTER TABLE `rider_hobbies`
  ADD CONSTRAINT `rider_hobbies_hobby_id_foreign` FOREIGN KEY (`hobby_id`) REFERENCES `hobbies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rider_hobbies_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `riders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rides_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `riders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
