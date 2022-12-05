-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 05:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trafficsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_record`
--

CREATE TABLE IF NOT EXISTS `account_record` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `D_NAME` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACC_TYPE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fines` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_record`
--

INSERT INTO `account_record` (`id`, `tagno`, `D_NAME`, `ACC_TYPE`, `Fines`, `Date`, `Jail`, `created_at`, `updated_at`) VALUES
(1, '2', 'Sabique', 'Car accident', '3000', '25/10/2022', '1 day', '2022-10-23 20:01:14', '2022-11-10 14:02:26'),
(4, '1', 'Pial ali', 'Drink and drive', '7000', '23/10/2022', 'No', '2022-10-23 22:29:49', '2022-10-23 22:31:41'),
(5, '3', 'Shubroto', 'Road rage and fight', '1500', '24/10/2022', 'No', '2022-10-23 22:33:18', '2022-10-23 22:38:18'),
(6, '2', 'Abrar', 'Speeding', '2500', '24/10/2022', 'No', '2022-10-23 23:51:13', '2022-10-23 23:51:13'),
(7, '1', 'Pial', 'Car hijacking', '10,000', '23/10/2022', 'No', '2022-10-23 23:57:53', '2022-10-24 00:00:03'),
(8, '1', 'Shama Rahman', 'crash', '0', '24/10/2022', '1 day', '2022-10-24 02:39:04', '2022-10-24 02:42:43'),
(11, '2', 'Devid', 'Crash', '500', '04/11/2022', 'No', '2022-11-10 13:29:50', '2022-11-10 13:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagno` int(11) NOT NULL,
  `carname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carmodel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carcolor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownertelephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `tagno`, `carname`, `carmodel`, `carcolor`, `ownername`, `ownertelephone`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Toyota Corolla', 'X series', 'black', 'Raju Ahmed', '01345344646', '2', NULL, '2022-11-10 08:01:31'),
(14, 2, 'Honda', 'Honda Civic', 'white', 'Mahabub', '01456789866', '2', '2022-10-23 01:05:24', '2022-10-23 01:05:24'),
(15, 3, 'Marcedes', 'Y series', 'silver', 'Jahid', '01735352355', '2', '2022-10-23 01:06:02', '2022-10-23 01:15:51'),
(16, 4, 'Corolla', 'Premio', 'Red', 'Lablu', '01356789658', '2', '2022-10-23 01:09:20', '2022-10-23 01:11:01'),
(17, 5, 'Mercedes-Benz', 'A-Class', 'white', 'Subroto Saha', '01792445055', '2', '2022-11-10 07:34:17', '2022-11-10 07:34:17'),
(18, 6, 'Audi', 'A4 allroad', 'white', 'Abrar Ahmed', '01736542789', '2', '2022-11-10 07:36:55', '2022-11-10 07:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `Year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tagno`, `driver_name`, `owner_name`, `amount`, `Year`, `purpose`, `updated_at`, `created_at`) VALUES
(1, '1', 'Shorif', 'Sabique', 50026, '2022', 'None', NULL, NULL),
(3, '2', 'Shagor', 'Khan', 5000, '2022', 'None', NULL, NULL),
(4, '5', 'Shurov', 'Subroto Saha', 4444, '2022', 'None', '2022-11-10 11:05:04', '2022-11-10 11:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `mobile_number`, `user`, `address`, `Gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Subroto', 'Saha', 'sri.subrata.saha@gmail.com', '$2y$10$0cLBmg.fgvECem6q1XZ4H.otDB6yvdJFYV4ibTPgQmoWk3NOxlMRu', '01792445055', 'Admin', 'Dr.koffar raod,Saidpur', 'M', NULL, '2022-11-10 00:09:22', '2022-11-12 11:02:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
