-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2025 at 01:15 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awad_edunext`
--
CREATE DATABASE IF NOT EXISTS `awad_edunext` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `awad_edunext`;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lecturer_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` enum('Mathematics','Physics','Chemistry','Biology','History','Geography','Literature','Economics') COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to_complete` int NOT NULL,
  `file_upload` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapters_lecturer_id_foreign` (`lecturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `lecturer_id`, `name`, `subject`, `time_to_complete`, `file_upload`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Calculus Fundamentals', 'Mathematics', 65, 'calculus_fundamentals.pdf', 'This chapter covers the essential concepts of Calculus Fundamentals in Mathematics, including key theories, practical applications, and assessment methods.', '2025-02-04 02:34:34', '2025-04-06 12:00:46'),
(2, 6, 'Linear Algebra', 'Mathematics', 63, 'linear_algebra.pdf', 'This chapter covers the essential concepts of Linear Algebra in Mathematics, including key theories, practical applications, and assessment methods.', '2025-01-23 02:47:55', '2025-03-28 04:42:50'),
(3, 6, 'Statistics & Probability', 'Mathematics', 79, 'statistics_probability.pdf', 'This chapter covers the essential concepts of Statistics & Probability in Mathematics, including key theories, practical applications, and assessment methods.', '2025-04-03 06:07:38', '2025-04-15 05:26:24'),
(4, 2, 'Classical Mechanics', 'Physics', 88, 'classical_mechanics.pdf', 'This chapter covers the essential concepts of Classical Mechanics in Physics, including key theories, practical applications, and assessment methods.', '2025-04-13 15:51:24', '2025-03-23 03:58:15'),
(5, 1, 'Electromagnetism', 'Physics', 123, 'electromagnetism.pdf', 'This chapter covers the essential concepts of Electromagnetism in Physics, including key theories, practical applications, and assessment methods.', '2025-04-13 07:04:46', '2025-04-20 16:35:05'),
(6, 6, 'Thermodynamics', 'Physics', 70, 'thermodynamics.pdf', 'This chapter covers the essential concepts of Thermodynamics in Physics, including key theories, practical applications, and assessment methods.', '2025-02-27 00:23:37', '2025-03-26 08:37:54'),
(7, 5, 'Organic Chemistry', 'Chemistry', 70, 'organic_chemistry.pdf', 'This chapter covers the essential concepts of Organic Chemistry in Chemistry, including key theories, practical applications, and assessment methods.', '2025-02-11 10:41:48', '2025-04-19 10:21:44'),
(8, 1, 'Inorganic Chemistry', 'Chemistry', 102, 'inorganic_chemistry.pdf', 'This chapter covers the essential concepts of Inorganic Chemistry in Chemistry, including key theories, practical applications, and assessment methods.', '2025-02-02 11:25:55', '2025-04-13 01:49:02'),
(9, 3, 'Biochemistry', 'Chemistry', 39, 'biochemistry.pdf', 'This chapter covers the essential concepts of Biochemistry in Chemistry, including key theories, practical applications, and assessment methods.', '2025-01-29 17:48:23', '2025-04-01 06:35:11'),
(10, 4, 'Cell Biology', 'Biology', 42, 'cell_biology.pdf', 'This chapter covers the essential concepts of Cell Biology in Biology, including key theories, practical applications, and assessment methods.', '2025-01-31 12:23:16', '2025-04-01 11:10:13'),
(11, 3, 'Genetics & DNA', 'Biology', 53, 'genetics_dna.pdf', 'This chapter covers the essential concepts of Genetics & DNA in Biology, including key theories, practical applications, and assessment methods.', '2025-03-15 05:37:00', '2025-03-21 10:26:01'),
(12, 2, 'Human Anatomy', 'Biology', 45, 'human_anatomy.pdf', 'This chapter covers the essential concepts of Human Anatomy in Biology, including key theories, practical applications, and assessment methods.', '2025-03-05 14:41:29', '2025-04-06 07:40:22'),
(13, 4, 'Ancient Civilizations', 'History', 120, 'ancient_civilizations.pdf', 'This chapter covers the essential concepts of Ancient Civilizations in History, including key theories, practical applications, and assessment methods.', '2025-04-13 08:58:33', '2025-03-31 05:15:02'),
(14, 3, 'Medieval Period', 'History', 59, 'medieval_period.pdf', 'This chapter covers the essential concepts of Medieval Period in History, including key theories, practical applications, and assessment methods.', '2025-04-02 21:37:15', '2025-04-15 03:31:40'),
(15, 2, 'Renaissance & Reformation', 'History', 105, 'renaissance_reformation.pdf', 'This chapter covers the essential concepts of Renaissance & Reformation in History, including key theories, practical applications, and assessment methods.', '2025-02-25 19:35:04', '2025-04-15 13:51:14'),
(16, 2, 'Physical Geography', 'Geography', 65, 'physical_geography.pdf', 'This chapter covers the essential concepts of Physical Geography in Geography, including key theories, practical applications, and assessment methods.', '2025-04-09 03:55:21', '2025-04-05 12:36:31'),
(17, 1, 'Human Geography', 'Geography', 98, 'human_geography.pdf', 'This chapter covers the essential concepts of Human Geography in Geography, including key theories, practical applications, and assessment methods.', '2025-03-03 03:49:33', '2025-04-19 21:45:15'),
(18, 3, 'Cartography', 'Geography', 94, 'cartography.pdf', 'This chapter covers the essential concepts of Cartography in Geography, including key theories, practical applications, and assessment methods.', '2025-02-22 15:14:54', '2025-04-01 18:15:39'),
(19, 6, 'Classical Literature', 'Literature', 93, 'classical_literature.pdf', 'This chapter covers the essential concepts of Classical Literature in Literature, including key theories, practical applications, and assessment methods.', '2025-01-24 04:19:18', '2025-03-31 17:05:38'),
(20, 6, 'Modern Fiction', 'Literature', 93, 'modern_fiction.pdf', 'This chapter covers the essential concepts of Modern Fiction in Literature, including key theories, practical applications, and assessment methods.', '2025-03-07 00:27:08', '2025-03-28 04:47:14'),
(21, 4, 'Poetry Analysis', 'Literature', 59, 'poetry_analysis.pdf', 'This chapter covers the essential concepts of Poetry Analysis in Literature, including key theories, practical applications, and assessment methods.', '2025-04-05 14:42:00', '2025-03-24 23:54:48'),
(22, 3, 'Microeconomics', 'Economics', 107, 'microeconomics.pdf', 'This chapter covers the essential concepts of Microeconomics in Economics, including key theories, practical applications, and assessment methods.', '2025-03-26 23:20:45', '2025-04-05 00:47:22'),
(23, 3, 'Macroeconomics', 'Economics', 120, 'macroeconomics.pdf', 'This chapter covers the essential concepts of Macroeconomics in Economics, including key theories, practical applications, and assessment methods.', '2025-02-25 13:48:59', '2025-03-21 02:52:28'),
(24, 4, 'International Trade', 'Economics', 93, 'international_trade.pdf', 'This chapter covers the essential concepts of International Trade in Economics, including key theories, practical applications, and assessment methods.', '2025-04-08 17:55:02', '2025-03-29 00:35:05'),
(25, 1, 'Physical Chemistry', 'Chemistry', 55, 'physical_chemistry.pdf', 'A et eos ut unde necessitatibus. Omnis quo et quos aperiam quis velit.', '2024-12-12 20:18:07', '2025-04-18 16:02:19'),
(26, 2, 'Discrete Mathematics', 'Mathematics', 49, 'discrete_mathematics.pdf', 'Nihil quis sequi rerum aliquid aut odit qui. Qui amet omnis voluptas magnam quaerat velit expedita. Quia dolorum adipisci molestiae reiciendis mollitia.', '2025-04-01 13:54:38', '2025-04-19 02:45:47'),
(27, 4, 'Discrete Mathematics', 'Mathematics', 119, 'discrete_mathematics.pdf', 'Similique qui aut numquam omnis. Voluptatum sunt enim consectetur est.', '2024-12-13 00:59:20', '2025-03-23 21:55:11'),
(28, 4, 'Wave Theory', 'Physics', 64, 'wave_theory.pdf', 'Consectetur dolores eos aliquam aperiam nisi. Est impedit ea ut nobis temporibus. Sint aut cupiditate accusantium voluptate.', '2024-12-01 04:09:28', '2025-03-21 04:15:32'),
(29, 6, 'Quantum Physics', 'Physics', 77, 'quantum_physics.pdf', 'Sit culpa repellat eos voluptas ea at. Reiciendis exercitationem delectus velit quis.', '2025-03-31 02:01:45', '2025-04-10 09:16:13'),
(30, 4, 'Economic Development', 'Economics', 44, 'economic_development.pdf', 'Ea voluptatem deleniti qui cumque autem impedit nisi. Rerum eos ut voluptate qui nulla cum esse.', '2024-11-28 21:16:09', '2025-03-23 05:42:22'),
(31, 1, 'Drama & Theater', 'Literature', 80, 'drama_theater.pdf', 'Hic corrupti ipsam et explicabo exercitationem dolore dolorem. Officia quia non vel fuga quam explicabo doloribus. Hic dolore totam placeat.', '2025-03-12 18:19:52', '2025-04-17 07:47:14'),
(32, 5, 'Ecology Systems', 'Biology', 118, 'ecology_systems.pdf', 'Sapiente modi aut expedita voluptatum odit magnam. Aut perferendis adipisci quam architecto error ipsa. Deserunt aliquam voluptate ut sit quasi omnis.', '2024-10-24 13:18:30', '2025-04-02 02:00:22'),
(33, 1, 'Analytical Methods', 'Chemistry', 70, 'analytical_methods.pdf', 'Suscipit molestias adipisci officiis dolores. Et magni qui dolor eligendi possimus est laborum. Amet esse earum eligendi molestiae.', '2024-12-18 03:48:52', '2025-04-04 21:07:58'),
(34, 5, 'World Wars', 'History', 103, 'world_wars.pdf', 'Fugiat voluptatibus ex tempora architecto blanditiis rerum. Doloribus autem ut est corporis autem quo qui ut.', '2024-12-19 06:09:29', '2025-04-05 07:57:56'),
(35, 1, 'Organic Chemistry', 'Chemistry', 120, 'UECS2363A1_2202899.pdf', 'This topics covers the basics of organic chemistry.', '2025-04-20 16:07:16', '2025-04-20 16:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_04_10_084349_create_chapters_table', 1),
(5, '2025_04_16_150059_create_users_table', 1),
(6, '2025_04_16_153926_create_user_activities_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','private') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('lecturer','student') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `gender`, `bio`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lecturer@edu.com', '$2y$10$y3QMvnpIFOu4K5IVFBZd8eSZK6wAzxw9r5ceMGe74xpxYwEbDsAry', 'Dr. James Wilson', 'male', 'Department head with 15 years of teaching experience in Mathematics and Physics.', 'lecturer', NULL, '2025-04-20 15:50:02', '2025-04-20 15:50:02'),
(2, 'arianna50@example.com', '$2y$10$E/RcgYpZyGU876nCb5ThIOuLz0wvq8O2NlG49bPUimAIBwnIfzK4S', 'Phyllis Quigley', 'female', 'Eaque quod rerum soluta consectetur cum. Vel magnam consequatur rem dolorem et dolorem.', 'lecturer', NULL, '2025-04-20 15:50:02', '2025-04-20 15:50:02'),
(3, 'aschiller@example.org', '$2y$10$zuOfmPztpTXvv.55ygILS.lC2TkGj8m26qJ0mx6/vMthYXQ51Udpm', 'Uriah Marquardt', 'private', 'Tempore aliquid ea qui cupiditate. Tempore voluptatem ipsum quis id.', 'lecturer', NULL, '2025-04-20 15:50:02', '2025-04-20 15:50:02'),
(4, 'kasandra.lynch@example.com', '$2y$10$Bz5BWqXn6CytXYmlLoOYKOcdDsmjz1IaVHo6AUzddBATjl19Y5ejq', 'Ellie Kunde', 'female', 'Magni non aliquid et et omnis. Quia in itaque beatae odio. Aut libero qui quasi non libero.', 'lecturer', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(5, 'garrison.senger@example.org', '$2y$10$/qYYQB/m.t4slzfgJoUmWemMJ4G.4.WjH6LvW7KDbd9FPtG80XefG', 'Prof. Monserrate Swift', 'female', 'Perferendis blanditiis fugiat laudantium laborum. Non et error vel odio. Accusamus itaque illum debitis quia id ex aut iusto.', 'lecturer', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(6, 'jayce.fahey@example.net', '$2y$10$tkq0cWAJmRPhKxX1s.lOT.fiBdzVqoutHinFS.oG/clr0PYazgKZ2', 'Cynthia Reinger', 'private', 'Soluta et voluptas ipsa aut. Sit illo ratione enim quas ipsam repellat voluptate id. Occaecati dolor itaque quaerat alias eius ut.', 'lecturer', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(7, 'student@edu.com', '$2y$10$3JQ1aZ.iqS9lmFY8g8pwGOXRT4NMwIJQ1VYt7hOuZP0eJJuUokBQe', 'Sarah Johnson', 'female', 'Third-year student majoring in Biology with interest in marine ecology.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(8, 'zulauf.missouri@example.net', '$2y$10$6q845aieh3.Iv9YkH8ZJv.O33DN9Dhgy/PkLG3obDX5Xx118mftR6', 'Maribel Stiedemann', 'female', 'Nostrum illum cum voluptas.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(9, 'lurline82@example.com', '$2y$10$z2k3jGNHUx/RP.xd/NUq/e1VXOV73wpRujJK4TGZChYNvtfiPlAcq', 'Marcia Murray', 'private', 'Reiciendis neque voluptatem labore quo. Architecto voluptatem nisi non iure dolores delectus non.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(10, 'grace.cole@example.com', '$2y$10$PbCeeJMU9T0p7ZQcecyvcOEbVegS.zf.FKdllmyq/grDaCWVcGB2K', 'Dereck Runte', 'private', 'Corrupti nam nobis illum labore quo corrupti qui.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(11, 'ed64@example.org', '$2y$10$vPqhgePAxISNyg8TheCkq.NMBLKjePMcVtks1zqYBqPFJqrdilOeG', 'Dewayne Zulauf II', 'female', 'Ullam qui et accusamus aut. Vel eius sequi cupiditate.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(12, 'madisen23@example.org', '$2y$10$qlmfzTHRpQ6krAO6Xqk6o.d9kYTLM.hpNUVFH720mb4LhTupZxIQ6', 'Violet Ortiz', 'male', 'Aliquam fugit et officia nihil perferendis nihil. Ipsa qui et explicabo ut reprehenderit.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(13, 'brekke.edna@example.net', '$2y$10$G3z8SPJN5zGG9K/mx5uLMOYvbbulriX0RcI.9xvRcG4x0NDr2nJ0.', 'Asa Ondricka', 'private', 'Architecto quia quidem id repellat.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(14, 'flossie.simonis@example.com', '$2y$10$EyMsEukn/MMjAOGsebakc.1juCNq5SXZM27xsU6UE4pA8YaNH27ci', 'Gino Feeney', 'female', 'Amet aliquam nulla laudantium ea provident est mollitia. Earum omnis quasi dolore quo.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03'),
(15, 'janie25@example.org', '$2y$10$mvzPXXFONMexsOF4lIOMXuUWxlDNtoit4lNttsbBmUA65WgPmxp5C', 'Kelly Raynor', 'private', 'Possimus modi et et provident.', 'student', NULL, '2025-04-20 15:50:03', '2025-04-20 15:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

DROP TABLE IF EXISTS `user_activities`;
CREATE TABLE IF NOT EXISTS `user_activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `last_activity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_activities_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `user_id`, `last_activity_type`, `activity_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'logout', NULL, 1, '2025-04-16 11:48:12', '2025-04-20 15:50:03'),
(2, 1, 'chapter_create', '34', 1, '2025-03-21 20:36:59', '2025-04-20 15:50:03'),
(3, 1, 'chapter_update', '4', 0, '2025-03-23 02:15:29', '2025-04-20 15:50:03'),
(4, 1, 'chapter_update', '10', 1, '2025-04-14 07:17:43', '2025-04-20 15:50:03'),
(5, 1, 'chapter_update', '1', 1, '2025-04-08 11:02:48', '2025-04-20 15:50:03'),
(6, 2, 'profile_update', NULL, 1, '2025-03-30 11:45:02', '2025-04-20 15:50:03'),
(7, 2, 'logout', NULL, 1, '2025-04-15 13:29:21', '2025-04-20 15:50:03'),
(8, 2, 'chapter_create', '28', 0, '2025-04-20 04:23:49', '2025-04-20 15:50:03'),
(9, 2, 'login', NULL, 0, '2025-04-15 22:31:56', '2025-04-20 15:50:03'),
(10, 2, 'chapter_update', '11', 0, '2025-04-04 02:16:54', '2025-04-20 15:50:03'),
(11, 2, 'profile_update', NULL, 0, '2025-04-08 21:31:08', '2025-04-20 15:50:03'),
(12, 2, 'chapter_update', '15', 1, '2025-04-05 23:28:45', '2025-04-20 15:50:03'),
(13, 3, 'chapter_update', '11', 1, '2025-03-26 19:07:08', '2025-04-20 15:50:03'),
(14, 3, 'login', NULL, 0, '2025-04-18 23:32:57', '2025-04-20 15:50:03'),
(15, 3, 'chapter_update', '11', 0, '2025-04-07 15:40:34', '2025-04-20 15:50:03'),
(16, 3, 'logout', NULL, 1, '2025-04-17 10:07:06', '2025-04-20 15:50:03'),
(17, 3, 'chapter_create', '29', 1, '2025-04-19 16:19:26', '2025-04-20 15:50:03'),
(18, 3, 'chapter_create', '6', 1, '2025-04-04 18:45:19', '2025-04-20 15:50:03'),
(19, 3, 'profile_update', NULL, 1, '2025-04-04 05:22:28', '2025-04-20 15:50:03'),
(20, 4, 'chapter_update', '25', 1, '2025-04-07 02:04:26', '2025-04-20 15:50:03'),
(21, 4, 'logout', NULL, 1, '2025-04-03 09:36:54', '2025-04-20 15:50:03'),
(22, 4, 'chapter_create', '15', 1, '2025-04-04 22:09:14', '2025-04-20 15:50:03'),
(23, 4, 'chapter_update', '32', 0, '2025-03-23 08:29:11', '2025-04-20 15:50:03'),
(24, 4, 'logout', NULL, 1, '2025-04-05 09:12:07', '2025-04-20 15:50:03'),
(25, 5, 'chapter_update', '10', 1, '2025-03-25 10:41:58', '2025-04-20 15:50:03'),
(26, 5, 'profile_update', NULL, 0, '2025-04-03 21:29:48', '2025-04-20 15:50:03'),
(27, 5, 'chapter_create', '33', 1, '2025-03-31 15:12:40', '2025-04-20 15:50:03'),
(28, 5, 'chapter_create', '24', 0, '2025-04-13 20:23:01', '2025-04-20 15:50:03'),
(29, 5, 'login', NULL, 1, '2025-04-04 03:56:24', '2025-04-20 15:50:03'),
(30, 5, 'chapter_create', '25', 1, '2025-03-25 04:46:41', '2025-04-20 15:50:03'),
(31, 5, 'chapter_update', '13', 1, '2025-03-29 09:39:22', '2025-04-20 15:50:03'),
(32, 6, 'chapter_create', '33', 1, '2025-04-16 21:44:14', '2025-04-20 15:50:03'),
(33, 6, 'login', NULL, 1, '2025-03-22 18:39:02', '2025-04-20 15:50:03'),
(34, 6, 'chapter_create', '25', 1, '2025-04-03 01:03:55', '2025-04-20 15:50:03'),
(35, 6, 'logout', NULL, 1, '2025-04-14 15:27:56', '2025-04-20 15:50:03'),
(36, 6, 'chapter_create', '19', 0, '2025-04-11 15:52:52', '2025-04-20 15:50:03'),
(37, 6, 'profile_update', NULL, 0, '2025-04-13 18:13:56', '2025-04-20 15:50:03'),
(38, 7, 'login', NULL, 0, '2025-04-07 14:51:43', '2025-04-20 15:50:03'),
(39, 7, 'logout', NULL, 1, '2025-04-03 19:45:51', '2025-04-20 15:50:03'),
(40, 7, 'login', NULL, 0, '2025-04-18 15:06:57', '2025-04-20 15:50:03'),
(41, 7, 'logout', NULL, 1, '2025-04-20 08:41:00', '2025-04-20 15:50:03'),
(42, 7, 'chapter_view', '16', 1, '2025-04-08 03:55:04', '2025-04-20 15:50:03'),
(43, 7, 'login', NULL, 1, '2025-03-23 13:04:03', '2025-04-20 15:50:03'),
(44, 8, 'profile_update', NULL, 1, '2025-04-19 22:09:25', '2025-04-20 15:50:03'),
(45, 8, 'profile_update', NULL, 0, '2025-03-21 12:04:59', '2025-04-20 15:50:03'),
(46, 8, 'logout', NULL, 1, '2025-04-19 16:56:17', '2025-04-20 15:50:03'),
(47, 8, 'logout', NULL, 1, '2025-04-01 01:35:42', '2025-04-20 15:50:03'),
(48, 9, 'chapter_view', '15', 1, '2025-04-13 14:46:26', '2025-04-20 15:50:03'),
(49, 9, 'profile_update', NULL, 1, '2025-03-27 00:34:10', '2025-04-20 15:50:03'),
(50, 9, 'logout', NULL, 1, '2025-04-17 04:02:27', '2025-04-20 15:50:03'),
(51, 9, 'login', NULL, 1, '2025-04-02 16:43:06', '2025-04-20 15:50:03'),
(52, 10, 'chapter_view', '1', 0, '2025-04-19 20:59:40', '2025-04-20 15:50:03'),
(53, 10, 'chapter_view', '27', 1, '2025-04-13 17:04:01', '2025-04-20 15:50:03'),
(54, 10, 'logout', NULL, 1, '2025-04-15 12:52:15', '2025-04-20 15:50:03'),
(55, 10, 'logout', NULL, 0, '2025-04-12 11:17:58', '2025-04-20 15:50:03'),
(56, 11, 'profile_update', NULL, 1, '2025-03-29 16:38:19', '2025-04-20 15:50:03'),
(57, 11, 'login', NULL, 1, '2025-03-31 00:36:59', '2025-04-20 15:50:03'),
(58, 11, 'profile_update', NULL, 1, '2025-03-29 14:17:55', '2025-04-20 15:50:03'),
(59, 11, 'logout', NULL, 1, '2025-04-20 07:52:18', '2025-04-20 15:50:03'),
(60, 11, 'login', NULL, 1, '2025-03-27 03:45:03', '2025-04-20 15:50:03'),
(61, 11, 'login', NULL, 1, '2025-04-02 06:00:14', '2025-04-20 15:50:03'),
(62, 12, 'chapter_view', '24', 1, '2025-04-15 11:57:06', '2025-04-20 15:50:03'),
(63, 12, 'login', NULL, 1, '2025-03-24 14:25:08', '2025-04-20 15:50:03'),
(64, 12, 'profile_update', NULL, 1, '2025-03-30 01:21:36', '2025-04-20 15:50:03'),
(65, 12, 'logout', NULL, 1, '2025-03-21 18:04:18', '2025-04-20 15:50:03'),
(66, 12, 'login', NULL, 1, '2025-04-17 00:33:19', '2025-04-20 15:50:03'),
(67, 13, 'login', NULL, 1, '2025-03-29 08:35:16', '2025-04-20 15:50:03'),
(68, 13, 'profile_update', NULL, 0, '2025-03-26 19:51:03', '2025-04-20 15:50:03'),
(69, 13, 'chapter_view', '4', 1, '2025-04-14 02:14:23', '2025-04-20 15:50:03'),
(70, 14, 'profile_update', NULL, 0, '2025-03-31 22:47:43', '2025-04-20 15:50:03'),
(71, 14, 'chapter_view', '3', 0, '2025-03-24 12:32:20', '2025-04-20 15:50:03'),
(72, 14, 'logout', NULL, 1, '2025-04-01 09:11:14', '2025-04-20 15:50:03'),
(73, 15, 'logout', NULL, 1, '2025-04-19 17:04:50', '2025-04-20 15:50:03'),
(74, 15, 'chapter_view', '1', 1, '2025-04-11 11:02:34', '2025-04-20 15:50:03'),
(75, 15, 'login', NULL, 1, '2025-04-15 11:23:24', '2025-04-20 15:50:03'),
(76, 15, 'chapter_view', '28', 1, '2025-03-22 12:33:51', '2025-04-20 15:50:03'),
(77, 1, 'login', NULL, 1, '2025-04-20 15:50:36', '2025-04-20 15:50:36'),
(78, 1, 'chapter_update', '5', 1, '2025-04-20 15:51:27', '2025-04-20 15:51:27'),
(79, 1, 'chapter_create', NULL, 1, '2025-04-20 16:07:16', '2025-04-20 16:07:16'),
(80, 1, 'logout', NULL, 0, '2025-04-20 16:26:58', '2025-04-20 16:26:58'),
(81, 1, 'login', NULL, 1, '2025-04-20 16:34:12', '2025-04-20 16:34:12'),
(82, 1, 'chapter_update', '5', 1, '2025-04-20 16:34:53', '2025-04-20 16:34:53'),
(83, 1, 'chapter_update', '5', 1, '2025-04-20 16:35:05', '2025-04-20 16:35:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
