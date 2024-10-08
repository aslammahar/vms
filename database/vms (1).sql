-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2024 at 01:01 PM
-- Server version: 8.3.0
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `drivers_license_number_unique` (`license_number`),
  KEY `drivers_vehicle_id_foreign` (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `license_number`, `vehicle_id`, `created_at`, `updated_at`, `amount`) VALUES
(1, 'Yousuf', '0786', 5, '2024-10-08 04:54:35', '2024-10-08 04:54:58', 50000.00),
(2, 'aslam', '4580', 4, '2024-10-08 04:54:44', '2024-10-08 04:55:09', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NOT NULL,
  `incident_date` datetime NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` enum('Minor','Moderate','Severe') COLLATE utf8mb4_unicode_ci NOT NULL,
  `injuries` text COLLATE utf8mb4_unicode_ci,
  `damage` text COLLATE utf8mb4_unicode_ci,
  `witnesses` text COLLATE utf8mb4_unicode_ci,
  `police_report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Open','Under Review','Closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `photos` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incidents_vehicle_id_foreign` (`vehicle_id`),
  KEY `incidents_driver_id_foreign` (`driver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`id`, `vehicle_id`, `driver_id`, `incident_date`, `location`, `description`, `severity`, `injuries`, `damage`, `witnesses`, `police_report`, `insurance_details`, `status`, `photos`, `created_at`, `updated_at`) VALUES
(7, 5, 1, '2024-10-03 14:59:00', 'Sukkur', 'sd', 'Minor', NULL, NULL, NULL, NULL, NULL, 'Open', NULL, '2024-10-08 04:59:51', '2024-10-08 04:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `incident_followups`
--

DROP TABLE IF EXISTS `incident_followups`;
CREATE TABLE IF NOT EXISTS `incident_followups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `action_type` enum('repair','insurance_claim','driver_disciplinary') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `action_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_followups_incident_id_foreign` (`incident_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident_followups`
--

INSERT INTO `incident_followups` (`id`, `incident_id`, `action_type`, `description`, `action_date`, `created_at`, `updated_at`) VALUES
(3, 2, 'driver_disciplinary', 'company expense', '2024-10-09', '2024-10-08 04:24:44', '2024-10-08 04:24:44'),
(7, 7, 'insurance_claim', 'sdsf', '2024-10-05', '2024-10-08 05:19:19', '2024-10-08 05:19:19'),
(6, 5, 'repair', 'erer', '2024-10-06', '2024-10-08 04:49:45', '2024-10-08 04:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `status` enum('completed','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintenance_vehicle_id_foreign` (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `vehicle_id`, `date`, `description`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(8, 4, '2024-10-04', 'oil change', 5000.00, 'completed', '2024-10-07 08:59:15', '2024-10-07 08:59:15'),
(7, 5, '2024-10-01', 'Oil change And Service', 8000.00, 'completed', '2024-10-03 03:18:49', '2024-10-03 03:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_10_01_092235_create_vehicles_table', 2),
(5, '2024_10_01_092315_create_drivers_table', 2),
(6, '2024_10_01_092353_create_maintenances_table', 2),
(7, '2024_10_02_074026_create_salaries_table', 3),
(8, '2024_10_02_080335_add_salary_to_drivers_table', 4),
(9, '2024_10_07_091800_create_incidents_table', 5),
(10, '2024_10_08_074302_create_incident_followups_table', 6),
(11, '2024_10_08_102629_create_trips_table', 7),
(12, '2024_10_08_112456_add_trip_metrics_to_trips_table', 8),
(13, '2024_10_08_124229_create_routes_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `start_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `driver_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_date` date NOT NULL,
  `status` enum('unpaid','paid') COLLATE utf8mb4_unicode_ci DEFAULT 'paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `salaries_driver_id_foreign` (`driver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `driver_id`, `amount`, `payment_date`, `status`, `created_at`, `updated_at`) VALUES
(14, 1, 50000.00, '2024-10-02', 'paid', '2024-10-03 03:50:43', '2024-10-08 04:54:58'),
(15, 2, 50000.00, '2024-10-06', 'paid', '2024-10-08 04:51:16', '2024-10-08 04:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `driver_id` bigint UNSIGNED NOT NULL,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_time` timestamp NOT NULL,
  `return_time` timestamp NOT NULL,
  `status` enum('completed','not-completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `distance_covered` double(8,2) DEFAULT NULL,
  `fuel_consumption` double(8,2) DEFAULT NULL,
  `performance_metrics` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trips_driver_id_foreign` (`driver_id`),
  KEY `trips_vehicle_id_foreign` (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `driver_id`, `vehicle_id`, `route`, `departure_time`, `return_time`, `status`, `created_at`, `updated_at`, `distance_covered`, `fuel_consumption`, `performance_metrics`) VALUES
(3, 2, 5, 'daharki  se mari', '2024-10-08 14:40:00', '2024-10-08 15:50:00', 'completed', '2024-10-08 06:41:38', '2024-10-08 06:41:38', 40.00, 2500.00, '45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$NLourcYEHi14p4vBw6r9QuKfpHvfgynQNPba2id7gFIK12R70MIqy', NULL, '2024-10-01 04:22:02', '2024-10-01 04:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_registration_number_unique` (`registration_number`),
  KEY `vehicles_owner_id_foreign` (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `make`, `model`, `year`, `registration_number`, `owner_id`, `created_at`, `updated_at`) VALUES
(5, 'Rocco', '2018', '2021', '00145', 1, '2024-10-02 05:13:23', '2024-10-03 04:48:40'),
(4, 'Revo', '2020', '2022', '7979', 1, '2024-10-02 04:56:22', '2024-10-03 04:48:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
