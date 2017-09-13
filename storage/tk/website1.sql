-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 11:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aspiration`
--

CREATE TABLE `aspiration` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspiration`
--

INSERT INTO `aspiration` (`id`, `student_id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 20138028, 'Company', NULL, NULL),
(2, 20138027, 'Company', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `intern_management_teacher_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representation_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_confirm` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `student_id`, `intern_management_teacher_id`, `company_id`, `topic_id`, `representation_id`, `company_confirm`, `status`, `created_at`, `updated_at`) VALUES
(8, 20138026, 'manager1', 'company1001', '59801364', 'company1001', 'Approved', 'Approved', '2017-05-13 11:37:12', '2017-05-13 11:37:12'),
(11, 20138027, 'manager1', 'company1001', '41850532', 'company1001', 'Approved', 'Approved', NULL, NULL),
(12, 20138026, NULL, 'company1001', '41850532', 'company1001', 'Approved', 'Pending', NULL, NULL),
(13, 20138026, NULL, 'company1001', '43698714', 'company1001', 'Approved', 'Pending', NULL, NULL),
(14, 20138028, NULL, 'company1001', '41850532', 'company1001', 'Approved', 'Approved', NULL, NULL),
(15, 20138028, NULL, 'company1001', '90656545', 'company1001', 'Approved', 'Approved', NULL, NULL),
(16, 92692824, 'manager1', 'company1001', '67567368', 'company1001', 'Pending', 'Approve', '2017-05-18 00:23:23', '2017-05-18 00:23:23'),
(17, 20138027, 'manager1', 'company1001', '90656545', 'company1001', 'Pending', 'Approve', '2017-05-18 00:23:25', '2017-05-18 00:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_id`, `company_name`, `address`, `information`, `created_at`, `updated_at`) VALUES
(1, '48429739', 'Frami', '8924 Okuneva Pine Apt. 033\nNorth Lenora, NM 74324', 'Quasi voluptatibus sed qui.', NULL, NULL),
(2, '59082242', 'Cummings', '669 Fatima Overpass Suite 363\nThielburgh, SC 55050', 'Enim voluptates vel quibusdam a quaerat.', NULL, NULL),
(3, '23493272', 'Gorczany', '43286 Dave Highway\nPort Frederiquetown, MN 69798', 'Aliquid iste illum vel rerum.', NULL, NULL),
(4, '55508955', 'Bailey', '17137 Blick Spurs\nSouth Axelport, VA 82168-7224', 'Nesciunt maxime voluptatem ipsum rerum quod.', NULL, NULL),
(5, '92490457', 'Gaylord', '82662 Arlie Center\nJanieborough, MD 19071', 'Minima dolorem aliquam voluptatem ut delectus iure qui quasi.', NULL, NULL),
(6, 'company1001', 'company1', NULL, NULL, '2017-05-10 02:46:38', '2017-05-10 02:46:38'),
(7, 'company 2001', 'company 2', NULL, NULL, '2017-05-18 02:14:12', '2017-05-18 02:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `content_instructor` text COLLATE utf8mb4_unicode_ci,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_lecturer` text COLLATE utf8mb4_unicode_ci,
  `lecturer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `student_id`, `content_instructor`, `instructor_id`, `content_lecturer`, `lecturer_id`, `created_at`, `updated_at`) VALUES
(1, 20138026, NULL, NULL, 'asd', 'lecturer1', '2017-05-18 02:05:52', '2017-05-10 02:28:13'),
(2, 20138027, NULL, NULL, NULL, NULL, '2017-05-10 02:28:18', '2017-05-10 02:28:18'),
(3, 20138028, NULL, NULL, NULL, NULL, '2017-05-10 02:28:22', '2017-05-10 02:28:22'),
(4, 20030003, NULL, NULL, NULL, NULL, '2017-05-11 02:21:40', '2017-05-11 02:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Website Developer', NULL, NULL),
(2, 'IoT', NULL, NULL),
(3, 'Security', NULL, NULL),
(4, 'Mobile Developer', NULL, NULL),
(5, 'System Adminstrator', NULL, NULL),
(6, 'Android', NULL, NULL),
(7, 'IOS', NULL, NULL),
(8, 'Data Engineer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_company`
--

CREATE TABLE `instructor_company` (
  `id` int(10) UNSIGNED NOT NULL,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_company`
--

INSERT INTO `instructor_company` (`id`, `instructor_id`, `first_name`, `last_name`, `email`, `phone_number`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'company1002', 'Tuan', 'Anh', 'ins1@gmail.com', '123123123', 'company1001', '2017-05-12 03:03:31', '2017-05-12 03:03:31'),
(2, 'company 2002', 'khong', 'biet', 'kk@gmail.com', NULL, 'company 2001', '2017-05-18 02:16:08', '2017-05-18 02:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `intern_management_teacher`
--

CREATE TABLE `intern_management_teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `intern_management_teacher_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intern_management_teacher`
--

INSERT INTO `intern_management_teacher` (`id`, `first_name`, `last_name`, `date_of_birth`, `intern_management_teacher_id`, `gender`, `phone_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'manager3', NULL, NULL, 'manager3@gmail.com', NULL, '2017-05-12 03:18:41', '2017-05-12 03:18:41'),
(2, NULL, NULL, NULL, 'manager1', NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `lecturer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `first_name`, `last_name`, `date_of_birth`, `lecturer_id`, `gender`, `phone_number`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'lecturer1', NULL, NULL, 'lecturer1@gmail.com', NULL, '2017-05-10 02:28:33', '2017-05-10 02:28:33'),
(2, NULL, NULL, NULL, 'lecturer2', NULL, NULL, 'lecturer2@gmail.com', NULL, '2017-05-10 02:28:37', '2017-05-10 02:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Beginer', NULL, NULL),
(2, 'Professional', NULL, NULL),
(3, 'Intermediate', NULL, NULL),
(4, 'Advanced', NULL, NULL),
(5, 'Fluent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `activity`, `author`, `role`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Updated Student\'s results', 'lecturer1', 'lecturer', 'lecturer1', '2017-05-18 02:27:57', '2017-05-18 02:27:57'),
(2, 'Updated Student\'s results', 'lecturer1', 'lecturer', 'lecturer1', '2017-05-18 02:28:04', '2017-05-18 02:28:04'),
(3, 'Updated Student\'s results', 'lecturer1', 'lecturer', 'lecturer1', '2017-05-18 02:30:48', '2017-05-18 02:30:48'),
(4, 'Updated Student\'s results', 'lecturer1', 'lecturer', 'lecturer1', '2017-05-18 02:30:52', '2017-05-18 02:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark_instructor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark_instructor_link` text COLLATE utf8mb4_unicode_ci,
  `instructor_note` mediumtext COLLATE utf8mb4_unicode_ci,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark_lecturer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lecturer_note` text COLLATE utf8mb4_unicode_ci,
  `lecturer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `student_id`, `mark_instructor`, `mark_instructor_link`, `instructor_note`, `instructor_id`, `mark_lecturer`, `lecturer_note`, `lecturer_id`, `created_at`, `updated_at`) VALUES
(1, 20138026, 'A', NULL, NULL, NULL, 'A', NULL, 'lecturer1', '2017-05-18 02:05:52', '2017-05-10 02:28:12'),
(2, 20138027, 'A', NULL, NULL, NULL, 'A', NULL, NULL, '2017-05-10 02:28:18', '2017-05-10 02:28:18'),
(3, 20138028, 'F', NULL, NULL, NULL, 'C', NULL, NULL, '2017-05-10 02:28:22', '2017-05-10 02:28:22'),
(4, 20030003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-11 02:21:40', '2017-05-11 02:21:40');

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
(3, '2017_02_21_065044_create_students_table', 1),
(4, '2017_02_24_061845_create_intern_management_teacher_table', 1),
(5, '2017_02_24_061910_create_lecturer_table', 1),
(6, '2017_02_27_062135_create_admin_table', 1),
(7, '2017_02_27_062202_create_company_table', 1),
(8, '2017_02_27_062219_create_skills_table', 1),
(9, '2017_02_27_062404_create_student_cv_table', 1),
(10, '2017_02_27_062441_create_topic_table', 1),
(11, '2017_02_27_062507_create_assignment_table', 1),
(12, '2017_02_27_062552_create_aspiration_table', 1),
(13, '2017_02_27_062737_create_report_table', 1),
(14, '2017_02_27_070605_create_level_table', 1),
(15, '2017_02_27_075644_create_student_cv_skills_table', 1),
(16, '2017_02_27_075707_create_topic_skills_table', 1),
(17, '2017_02_27_080815_create_representation_company_table', 1),
(18, '2017_02_27_081258_create_instructor_company_table', 1),
(19, '2017_02_27_081528_create_mark_table', 1),
(20, '2017_02_27_081609_create_evaluation_table', 1),
(21, '2017_02_27_084525_create_student_instructor_company_table', 1),
(22, '2017_04_01_063711_create_timekeeping_table', 1),
(23, '2017_04_01_090109_create_outline_table', 1),
(24, '2017_04_07_022647_create_periods_table', 1),
(25, '2017_04_07_022702_create_periods_students_table', 1),
(26, '2017_04_09_060202_create_field_table', 1),
(27, '2017_04_09_060219_create_student_cv_field_table', 1),
(28, '2017_04_09_060232_create_topic_field_table', 1),
(29, '2017_04_20_072219_create_period_table', 1),
(30, '2017_05_11_153547_create_test_table', 2),
(31, '2017_05_15_112410_add_status_column_to_assignment_table', 3),
(32, '2017_05_15_115459_create_logs_table', 3),
(33, '2017_05_18_041259_add_company_confirm_column_to_assignment_table', 4),
(34, '2017_05_18_042320_add_company_name_to_aspiration_table', 4),
(35, '2017_05_18_092232_create_logs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `outline`
--

CREATE TABLE `outline` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outline`
--

INSERT INTO `outline` (`id`, `link`, `topic_id`, `instructor_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, '1000', '90656545', 'company1002', 20138026, NULL, NULL),
(2, 'link outline 20138027', '41850532', 'company1002', 20138027, NULL, NULL);

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
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'asdadasd', '2017-05-03', '2017-05-25', '2017-05-13 04:52:32', '2017-05-13 04:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `periods_students`
--

CREATE TABLE `periods_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `period_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods_students`
--

INSERT INTO `periods_students` (`id`, `period_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 20138026, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `student_id`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, 20138026, 'Not submit yet', NULL, '2017-05-10 02:28:12', '2017-05-10 02:28:12'),
(2, 20138027, 'Not submit yet', NULL, '2017-05-10 02:28:18', '2017-05-10 02:28:18'),
(3, 20138028, 'Not submit yet', NULL, '2017-05-10 02:28:22', '2017-05-10 02:28:22'),
(4, 20030003, 'Not submit yet', NULL, '2017-05-11 02:21:40', '2017-05-11 02:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `representation_company`
--

CREATE TABLE `representation_company` (
  `id` int(10) UNSIGNED NOT NULL,
  `representation_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representation_company`
--

INSERT INTO `representation_company` (`id`, `representation_id`, `first_name`, `last_name`, `email`, `phone_number`, `position`, `company_id`, `created_at`, `updated_at`) VALUES
(7, 'company1001', 'representation1', NULL, 'rep1@gmail.com', NULL, NULL, 'company1001', '2017-05-10 02:46:38', '2017-05-10 02:46:38'),
(8, 'company 2001', 'tuan anh', NULL, 'rep222@gmail.com', NULL, NULL, 'company 2001', '2017-05-18 02:14:12', '2017-05-18 02:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Java', NULL, NULL),
(2, 'C', NULL, NULL),
(3, 'PHP', NULL, NULL),
(4, 'HTML-CSS', NULL, NULL),
(5, 'Python', NULL, NULL),
(6, 'C#', NULL, NULL),
(7, '.NET', NULL, NULL),
(8, 'Ruby', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `date_of_birth`, `student_id`, `gender`, `phone_number`, `email`, `semester`, `class`, `about_me`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Jon', 'Gutkowski', '2007-03-21 11:25:39', 97080787, '0', 9, 'sherman@gmail.com', '0', 'Et cupiditate illum ex tempora voluptas et iusto.', NULL, NULL, NULL, NULL),
(2, 'Kevin', 'Koepp', '1976-10-23 11:29:10', 58728152, '0', 6, 'ywest@hotmail.com', '1', 'Nemo reiciendis quasi fuga aut et.', NULL, NULL, NULL, NULL),
(3, 'Aiyana', 'Dickens', '1976-06-18 10:05:34', 35609450, '0', 4, 'jenkins.domingo@effertz.biz', '9', 'Est ut eius labore ut consequatur expedita quam.', NULL, NULL, NULL, NULL),
(4, 'Shana', 'Kemmer', '1999-02-13 16:33:46', 22239899, '0', 1, 'tupton@gmail.com', '1', 'Asperiores tempora aliquam rerum corporis dignissimos quo.', NULL, NULL, NULL, NULL),
(5, 'Arden', 'Block', '2008-05-18 05:09:36', 10258305, '1', 8, 'tremaine.hilpert@hotmail.com', '0', 'Cupiditate et provident perferendis aut rerum.', NULL, NULL, NULL, NULL),
(6, 'Ilene', 'D\'Amore', '1988-11-27 07:29:27', 73067814, '1', 5, 'stracke.esmeralda@koelpin.com', '7', 'Maiores eligendi dolores fugit voluptas quibusdam placeat eligendi.', NULL, NULL, NULL, NULL),
(7, 'Bettie', 'Wisozk', '1991-03-15 10:28:16', 36635115, '1', 7, 'zziemann@kulas.com', '2', 'Maxime impedit autem ipsum aliquam odio inventore.', NULL, NULL, NULL, NULL),
(8, 'Gerard', 'Kunde', '1982-07-06 02:50:06', 7200423, '1', 9, 'reynold.schneider@hotmail.com', '6', 'Vel est et nihil inventore repellendus unde quae.', NULL, NULL, NULL, NULL),
(9, 'Rhianna', 'Osinski', '1983-08-05 23:20:49', 92692824, '0', 5, 'zpadberg@gmail.com', '2', 'Est et quibusdam quibusdam eius ex explicabo.', NULL, NULL, NULL, NULL),
(10, 'Frederik', 'Renner', '2002-11-23 00:15:45', 72723898, '0', 1, 'ritchie.gianni@hotmail.com', '3', 'Impedit quia ad dolorem explicabo et.', NULL, NULL, NULL, NULL),
(11, 'Nam', 'tuan', NULL, 20138026, NULL, NULL, '20138026@gmail.com', NULL, NULL, NULL, NULL, '2017-05-10 02:28:12', '2017-05-10 02:28:12'),
(12, 'Name', 'minh', NULL, 20138027, NULL, NULL, '20138027@gmail.com', NULL, NULL, NULL, NULL, '2017-05-10 02:28:18', '2017-05-10 02:28:18'),
(13, NULL, NULL, NULL, 20138028, NULL, NULL, '20138028@gmail.com', NULL, NULL, NULL, NULL, '2017-05-10 02:28:22', '2017-05-10 02:28:22'),
(14, NULL, NULL, NULL, 20030003, NULL, NULL, '20030003@gmail.com', NULL, NULL, NULL, NULL, '2017-05-11 02:21:40', '2017-05-11 02:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_cv`
--

CREATE TABLE `student_cv` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `other_skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_cv`
--

INSERT INTO `student_cv` (`id`, `student_id`, `name`, `info`, `other_skills`, `email`, `phone_number`, `purpose`, `status`, `created_at`, `updated_at`) VALUES
(1, 7200423, 'Kenneth', 'Perspiciatis vero accusamus odio.', 'Veniam odio libero rerum voluptatem veritatis expedita maiores dolor.', 'corkery.olga@hotmail.com', 40702830, 'Aut adipisci natus id quia vel.', 'Waiting', NULL, NULL),
(2, 10258305, 'Carolyn', 'Molestiae velit sit dolorum et.', 'Aliquam nemo nihil quia error necessitatibus est.', 'morar.daphnee@hotmail.com', 19119984, 'Eaque et unde ipsa earum vel vel.', 'Applied', NULL, NULL),
(3, 22239899, 'Aiyana', 'Modi id non sed sit autem numquam.', 'Minus libero ut assumenda temporibus.', 'spinka.chanelle@hotmail.com', 75165147, 'Rerum aut sit et eligendi.', 'Not apply', NULL, NULL),
(4, 35609450, 'Jaylan', 'Dolore dolorum et qui eligendi perspiciatis.', 'Itaque non omnis quo qui dicta.', 'tremaine.hintz@kub.com', 57531656, 'Ex iure quis vel eos asperiores iusto aut.', 'Applied', NULL, NULL),
(5, 36635115, 'Jacky', 'Laboriosam incidunt cupiditate voluptates est.', 'Provident praesentium error error magnam illo dolores temporibus quia.', 'ludwig.greenholt@hayes.com', 69236170, 'Vel molestiae impedit accusantium consectetur beatae et.', 'Applied', NULL, NULL),
(6, 58728152, 'Cierra', 'Sint id sunt et labore odio expedita.', 'Unde quasi non fuga et esse ex velit.', 'ubruen@gmail.com', 71607973, 'Ex vel assumenda est labore.', 'Applied', NULL, NULL),
(7, 72723898, 'Kassandra', 'Ea eum et voluptas minima quos voluptatem.', 'Quidem odit veniam odit quibusdam.', 'eulah.luettgen@gmail.com', 95676331, 'Provident impedit pariatur quo.', 'Not apply', NULL, NULL),
(8, 73067814, 'Kailee', 'Modi animi odit dignissimos expedita cumque quos.', 'Non est est officia recusandae quidem.', 'santina.mraz@breitenberg.com', 74579228, 'Possimus modi deleniti facilis rerum tempora.', 'Not apply', NULL, NULL),
(9, 92692824, 'Brigitte', 'Asperiores vel et sunt assumenda sunt rerum ea.', 'Ipsam ipsum commodi ex nisi ab quis consectetur.', 'rogelio37@gleason.com', 86819572, 'Saepe perferendis et minus sit.', 'Applied', NULL, NULL),
(10, 97080787, 'Saepe ea modi tenetur incidunt tempora.', 'Non iusto aut illo voluptas.', 'Saepe ea modi tenetur incidunt tempora.', 'carolyn.emmerich@beer.info', 63389328, 'Tenetur ipsum est voluptatum nam odit veniam aperiam facilis.', 'Waiting', NULL, NULL),
(12, 20138027, 'Brigitte', 'Perspiciatis vero accusamus odio.', 'Saepe ea modi tenetur incidunt tempora.', '20138027@gmail.com', NULL, 'Tenetur ipsum est voluptatum nam odit veniam aperiam facilis.', NULL, '2017-05-10 02:28:18', '2017-05-10 02:28:18'),
(13, 20138028, NULL, NULL, NULL, '20138028@gmail.com', NULL, NULL, NULL, '2017-05-10 02:28:22', '2017-05-10 02:28:22'),
(14, 20030003, NULL, NULL, NULL, '20030003@gmail.com', NULL, NULL, NULL, '2017-05-11 02:21:40', '2017-05-11 02:21:40'),
(15, 20138026, 'tuan tuan', 'asdklsajdklasdasdasdasdasdasdasdad', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_cv_field`
--

CREATE TABLE `student_cv_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_cv_field`
--

INSERT INTO `student_cv_field` (`id`, `field_name`, `student_id`, `created_at`, `updated_at`) VALUES
(3, 'IoT', 20138027, NULL, NULL),
(4, 'Website Developer', 36635115, NULL, NULL),
(5, 'System Adminstrator', 72723898, NULL, NULL),
(6, 'IoT', 35609450, NULL, NULL),
(7, 'IoT', 10258305, NULL, NULL),
(8, 'IoT', 7200423, NULL, NULL),
(9, 'Data Engineer', 92692824, NULL, NULL),
(10, 'IOS', 10258305, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_cv_skills`
--

CREATE TABLE `student_cv_skills` (
  `student_id` int(11) NOT NULL,
  `skills_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_cv_skills`
--

INSERT INTO `student_cv_skills` (`student_id`, `skills_name`, `level_name`) VALUES
(36635115, 'PHP', 'Professional'),
(92692824, 'PHP', 'Fluent'),
(73067814, 'PHP', 'Intermediate'),
(58728152, 'Python', 'Advanced'),
(92692824, 'C', 'Beginer'),
(10258305, '.NET', 'Beginer'),
(22239899, 'HTML-CSS', 'Professional'),
(72723898, 'Ruby', 'Intermediate'),
(92692824, '.NET', 'Beginer'),
(36635115, 'PHP', 'Fluent'),
(20138027, 'HTML-CSS', 'Beginer');

-- --------------------------------------------------------

--
-- Table structure for table `student_instructor_company`
--

CREATE TABLE `student_instructor_company` (
  `student_id` int(11) NOT NULL,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_instructor_company`
--

INSERT INTO `student_instructor_company` (`student_id`, `instructor_id`) VALUES
(20138026, 'company1002'),
(20138027, 'company1002'),
(20138026, 'company1002'),
(20138026, 'company1002'),
(20138028, 'company1002'),
(20138028, 'company1002'),
(20138028, 'company1002'),
(20138027, 'company1002'),
(20138027, 'company1002'),
(20138028, 'company1002'),
(20138028, 'company1002');

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping`
--

CREATE TABLE `timekeeping` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timekeeping`
--

INSERT INTO `timekeeping` (`id`, `link`, `instructor_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, '', 'company1002', 20138026, NULL, NULL),
(2, 'link timekeeping 20138027', 'company1002', 20138027, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) DEFAULT NULL,
  `otherRequire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representation_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `topic_id`, `title`, `content`, `quantity`, `otherRequire`, `status`, `representation_id`, `created_at`, `updated_at`) VALUES
(1, '41850532', 'Distinctio sint et sit non voluptas.', 'Adipisci dolores perspiciatis iusto consequuntur.', -3, 'Consequuntur praesentium possimus ducimus.', 'Approved', 'company1001', NULL, NULL),
(2, '67567368', 'Fugiat nulla odit itaque totam deleniti non incidunt.', 'Voluptatem quia et quis ipsam.', 7, 'Velit libero dolorem earum rerum autem laboriosam.', 'Approved', 'company1001', NULL, NULL),
(3, '90656545', 'Sed et sequi distinctio sit aut.', 'Ratione iste consequuntur placeat ut.', 3, 'Voluptas id eligendi labore omnis.', 'Approved', 'company1001', NULL, NULL),
(4, '72553554', 'Voluptatem voluptas nihil repellat exercitationem placeat.', 'Non tempora sint dolorem libero vero.', 5, 'Nisi ex error voluptatem voluptas esse.', 'Approved', 'company1001', NULL, NULL),
(5, '43698714', 'Velit illo et qui sapiente eveniet rerum quae.', 'Saepe cumque reprehenderit.', 5, 'Eos iure sit assumenda quia aperiam.', 'Approved', 'company1001', NULL, NULL),
(6, '15801573', 'Dolorem vero ad nisi voluptatibus earum aut et.', 'Explicabo ducimus vel nobis est.', 9, 'Eos ut aut omnis sapiente nisi eius quasi.', 'Approved', 'company1001', NULL, NULL),
(7, '44532008', 'Quis perspiciatis enim rerum et.', 'Repellat id dignissimos cupiditate.', 3, 'Ex nihil sit similique amet voluptatem.', 'Approved', 'company1001', NULL, NULL),
(8, '63808610', 'Sed voluptatem excepturi at et aliquid.', 'Recusandae ea eos officiis.', 4, 'Cumque voluptas beatae accusantium.', 'Approved', 'company1001', NULL, NULL),
(9, '59801364', 'Eligendi ut consequatur quia sit expedita tenetur nostrum dolore.', 'Molestiae sit soluta rerum dolor.', 5, 'Numquam et eos illo dicta repellat sit.', 'Approved', 'company1001', NULL, NULL),
(10, '89871777', 'Libero autem veritatis fugiat a commodi.', 'Ea sed ipsa sed dolores.', 1, 'Omnis quibusdam delectus est distinctio voluptatibus.', 'Approved', 'company1001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_field`
--

CREATE TABLE `topic_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_field`
--

INSERT INTO `topic_field` (`id`, `field_name`, `topic_id`, `created_at`, `updated_at`) VALUES
(1, 'Security', '41850532', NULL, NULL),
(2, 'System Adminstrator', '41850532', NULL, NULL),
(3, 'Mobile Developer', '90656545', NULL, NULL),
(4, 'IOS', '67567368', NULL, NULL),
(5, 'Mobile Developer', '63808610', NULL, NULL),
(6, 'Website Developer', '15801573', NULL, NULL),
(7, 'Mobile Developer', '44532008', NULL, NULL),
(8, 'Data Engineer', '59801364', NULL, NULL),
(9, 'Mobile Developer', '89871777', NULL, NULL),
(10, 'System Adminstrator', '72553554', NULL, NULL),
(11, 'IOS', '15801573', NULL, NULL),
(12, 'Data Engineer', '41850532', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_skills`
--

CREATE TABLE `topic_skills` (
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_skills`
--

INSERT INTO `topic_skills` (`topic_id`, `skills_name`, `level_name`) VALUES
('63808610', 'Java', 'Beginer'),
('89871777', 'C#', 'Intermediate'),
('63808610', '.NET', 'Professional'),
('90656545', 'Python', 'Fluent'),
('90656545', 'Ruby', 'Professional'),
('90656545', 'Ruby', 'Professional'),
('72553554', 'Java', 'Intermediate'),
('72553554', 'C', 'Professional'),
('72553554', '.NET', 'Professional'),
('67567368', '.NET', 'Fluent'),
('15801573', 'C', 'Beginer'),
('41850532', 'Java', 'Beginer'),
('67567368', 'HTML-CSS', 'Beginer'),
('90656545', 'Python', 'Beginer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$BgnL4W8jYYi4LqASgW3PmOnwlAKG9jV4QDwv3uJhNaX3i/y8U9rkO', 'admin', 'admin', 'QpGSWpy8XRPbbeidH00rgF25UqkSS2iflKQfaOx976xMvUeUx0zxREghbCpN', NULL, NULL),
(2, NULL, 'manager1@gmail.com', '$2y$10$wbbgEHxVDlv/sI/N7gnInuN94.mhpuYn8n7UtdXy3IwnsWqa8zoK2', 'manager', 'manager1', '8UKVxxgBI5on2ZT7VFvhtFulcmuaSITRBNfvxgGWO9S0WJijYrIWVlz4lKL9', '2017-05-10 02:27:34', '2017-05-10 02:27:34'),
(3, NULL, 'manager2@gmail.com', '$2y$10$QUthpTB6B26xhyMXG2rfZu1uTU0yOtmSeC3gh7ONHAMkSGqzRYbA6', 'manager', 'manager2', NULL, '2017-05-10 02:27:42', '2017-05-10 02:27:42'),
(4, NULL, 'student1@gmail.com', '$2y$10$DIoLCX6wKneEFw2O7ABheu80WkABIEDzT5WpPoZdfQRjlLwkxYpJO', 'student', 'student1', NULL, '2017-05-10 02:27:52', '2017-05-10 02:27:52'),
(5, NULL, '20138026@gmail.com', '$2y$10$qUil5vzFnf9.CfeFfpewjuUwe74eIUFVcuINKHoRj6E.O8jBstJPC', 'student', '20138026', 'hHAz7scArc0jsN5oAlo274gOZKA1os4IEIA4qbpyRrD7bnMt9g6OYb4Kwh6A', '2017-05-10 02:28:12', '2017-05-10 02:28:12'),
(6, NULL, '20138027@gmail.com', '$2y$10$3dOw5dEu6ie97PK.2UgDIOohq8gA80vqh0R.QGhE2KLKKG/BAVPv6', 'student', '20138027', 'khdcKeDnMq4o2rCDaGBOit3R0hTLYS8BeHYvgvJSHF89blfXL96QuJOy8IrH', '2017-05-10 02:28:18', '2017-05-10 02:28:18'),
(7, NULL, '20138028@gmail.com', '$2y$10$PHWN3ewrco2Yna39sQFETOzrG7NSjO0i99ZbKLM4drSsl1pOvoucu', 'student', '20138028', 'GOQ4Ypz5RfHLlCdZlLPC0vz7BYZS26xuL9vnK6keRujpLyBwmJzZmQahJXGK', '2017-05-10 02:28:22', '2017-05-10 02:28:22'),
(8, NULL, 'lecturer1@gmail.com', '$2y$10$mzVJMtef9/dW9lE4xfNOMuq7QaSFZc6AkIIklj37b2g85TER2mIbq', 'lecturer', 'lecturer1', '7KS1Fy9VB8uKRkG2spQsmC8OQFds1BwMMueL9pKhqp0X3t95FT2vNyV9WzpW', '2017-05-10 02:28:32', '2017-05-10 02:28:32'),
(9, NULL, 'lecturer2@gmail.com', '$2y$10$GRXzG9JOizBXoYD.vT.jluJKbDIqUu00TB1F6Zz/toTGTw4qFEGKm', 'lecturer', 'lecturer2', NULL, '2017-05-10 02:28:36', '2017-05-10 02:28:36'),
(10, 'representation1', 'rep1@gmail.com', '$2y$10$Qq.17jXzwlMyX2C34GgDoOq7A4rU9X4/BK8K6N8asRoF/HCrBh8OK', 'company', 'company1001', 'SIEF1ZEQZGplvyxNAeAuwOwbXKGG9ZfHEfbJC5TfkxG8nu63w5H4V8Ui44jk', '2017-05-10 02:46:38', '2017-05-10 02:46:38'),
(11, 'Tuan Anh', '20030003@gmail.com', '$2y$10$ACtYyYSHhkeHCFb2Q1dBL.DZBgufoFtGp5yjCIVNBHUl70U0g7zQa', 'student', '20030003', NULL, '2017-05-11 02:21:39', '2017-05-11 02:21:39'),
(12, 'Tuan', 'ins1@gmail.com', '$2y$10$pa9YcS0JwZM8lD094Kl9fO36SxCWP6KNsJdWnPvJx4R/hSi83uBn2', 'instructor', 'company1002', '9YkJ2xL8fzcCohjbMtHHxfZJLPn3M52LTZfxfHaFRI2ZuF3xVbnrGeNcmXEZ', '2017-05-12 03:03:31', '2017-05-12 03:03:31'),
(14, 'Tran Tuan Nam', 'manager3@gmail.com', '$2y$10$cQcK.eR2ZKWpLyI4H.vZSe9kpy1QD1KDQeigQAG9LyDtFd7yNM5AG', 'manager', 'manager3', 'lky9IiBFqsX8r6oUaZJ6dOuCYKSIAvG61pT03aThvjOrjHcLnNUOSB3aYKdT', '2017-05-12 03:18:41', '2017-05-12 03:18:41'),
(15, 'tuan anh', 'rep222@gmail.com', '$2y$10$thyqko.Zz9oo5xEmzzitweWBTyAMuXSpxqGyuiAI0Ia6Si.DVzC4i', 'company', 'company 2001', 'aXxgCkXLBrX75SL7G1d5gvL2VJigh2NzyctUNavKFyYumeWFWew1vlxQsazQ', '2017-05-18 02:14:12', '2017-05-18 02:14:12'),
(16, 'khong', 'kk@gmail.com', '$2y$10$z2WgpVnzTAYUwV1iklYX4.4IB6e42d2nJa/rx43XC776IuYcOqM5S', 'instructor', 'company 2002', NULL, '2017-05-18 02:16:08', '2017-05-18 02:16:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspiration`
--
ALTER TABLE `aspiration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aspiration_student_id_foreign` (`student_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_student_id_foreign` (`student_id`),
  ADD KEY `assignment_intern_management_teacher_id_foreign` (`intern_management_teacher_id`),
  ADD KEY `assignment_company_id_foreign` (`company_id`),
  ADD KEY `assignment_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_company_id_unique` (`company_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_instructor_id_foreign` (`instructor_id`),
  ADD KEY `evaluation_student_id_foreign` (`student_id`),
  ADD KEY `evaluation_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `field_name_unique` (`name`);

--
-- Indexes for table `instructor_company`
--
ALTER TABLE `instructor_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructor_company_instructor_id_unique` (`instructor_id`),
  ADD UNIQUE KEY `instructor_company_email_unique` (`email`),
  ADD KEY `instructor_company_company_id_foreign` (`company_id`);

--
-- Indexes for table `intern_management_teacher`
--
ALTER TABLE `intern_management_teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `intern_management_teacher_intern_management_teacher_id_unique` (`intern_management_teacher_id`),
  ADD UNIQUE KEY `intern_management_teacher_email_unique` (`email`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturer_lecturer_id_unique` (`lecturer_id`),
  ADD UNIQUE KEY `lecturer_email_unique` (`email`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level_name_unique` (`name`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_instructor_id_foreign` (`instructor_id`),
  ADD KEY `mark_student_id_foreign` (`student_id`),
  ADD KEY `mark_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outline`
--
ALTER TABLE `outline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outline_topic_id_foreign` (`topic_id`),
  ADD KEY `outline_instructor_id_foreign` (`instructor_id`),
  ADD KEY `outline_student_id_foreign` (`student_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods_students`
--
ALTER TABLE `periods_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report_student_id_unique` (`student_id`);

--
-- Indexes for table `representation_company`
--
ALTER TABLE `representation_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `representation_company_representation_id_unique` (`representation_id`),
  ADD UNIQUE KEY `representation_company_email_unique` (`email`),
  ADD KEY `representation_company_company_id_foreign` (`company_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_cv`
--
ALTER TABLE `student_cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_cv_student_id_unique` (`student_id`);

--
-- Indexes for table `student_cv_field`
--
ALTER TABLE `student_cv_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_cv_field_field_name_foreign` (`field_name`),
  ADD KEY `student_cv_field_student_id_index` (`student_id`);

--
-- Indexes for table `student_cv_skills`
--
ALTER TABLE `student_cv_skills`
  ADD KEY `student_cv_skills_student_id_index` (`student_id`),
  ADD KEY `student_cv_skills_skills_name_index` (`skills_name`),
  ADD KEY `student_cv_skills_level_name_index` (`level_name`);

--
-- Indexes for table `student_instructor_company`
--
ALTER TABLE `student_instructor_company`
  ADD KEY `student_instructor_company_student_id_index` (`student_id`),
  ADD KEY `student_instructor_company_instructor_id_index` (`instructor_id`);

--
-- Indexes for table `timekeeping`
--
ALTER TABLE `timekeeping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timekeeping_instructor_id_foreign` (`instructor_id`),
  ADD KEY `timekeeping_student_id_foreign` (`student_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topic_topic_id_unique` (`topic_id`);

--
-- Indexes for table `topic_field`
--
ALTER TABLE `topic_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_field_field_name_foreign` (`field_name`),
  ADD KEY `topic_field_topic_id_index` (`topic_id`);

--
-- Indexes for table `topic_skills`
--
ALTER TABLE `topic_skills`
  ADD KEY `topic_skills_topic_id_index` (`topic_id`),
  ADD KEY `topic_skills_skills_name_index` (`skills_name`),
  ADD KEY `topic_skills_level_name_index` (`level_name`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aspiration`
--
ALTER TABLE `aspiration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `instructor_company`
--
ALTER TABLE `instructor_company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `intern_management_teacher`
--
ALTER TABLE `intern_management_teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `outline`
--
ALTER TABLE `outline`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `periods_students`
--
ALTER TABLE `periods_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `representation_company`
--
ALTER TABLE `representation_company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student_cv`
--
ALTER TABLE `student_cv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student_cv_field`
--
ALTER TABLE `student_cv_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `timekeeping`
--
ALTER TABLE `timekeeping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `topic_field`
--
ALTER TABLE `topic_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspiration`
--
ALTER TABLE `aspiration`
  ADD CONSTRAINT `aspiration_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_company` (`instructor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `instructor_company`
--
ALTER TABLE `instructor_company`
  ADD CONSTRAINT `instructor_company_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE;

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_company` (`instructor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `outline`
--
ALTER TABLE `outline`
  ADD CONSTRAINT `outline_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_company` (`instructor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `outline_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `outline_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `representation_company`
--
ALTER TABLE `representation_company`
  ADD CONSTRAINT `representation_company_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_cv_field`
--
ALTER TABLE `student_cv_field`
  ADD CONSTRAINT `student_cv_field_field_name_foreign` FOREIGN KEY (`field_name`) REFERENCES `field` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_cv_field_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_cv` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_cv_skills`
--
ALTER TABLE `student_cv_skills`
  ADD CONSTRAINT `student_cv_skills_level_name_foreign` FOREIGN KEY (`level_name`) REFERENCES `level` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_cv_skills_skills_name_foreign` FOREIGN KEY (`skills_name`) REFERENCES `skills` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_cv_skills_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_cv` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_instructor_company`
--
ALTER TABLE `student_instructor_company`
  ADD CONSTRAINT `student_instructor_company_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_company` (`instructor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_instructor_company_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `timekeeping`
--
ALTER TABLE `timekeeping`
  ADD CONSTRAINT `timekeeping_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_company` (`instructor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timekeeping_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `topic_field`
--
ALTER TABLE `topic_field`
  ADD CONSTRAINT `topic_field_field_name_foreign` FOREIGN KEY (`field_name`) REFERENCES `field` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `topic_field_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE;

--
-- Constraints for table `topic_skills`
--
ALTER TABLE `topic_skills`
  ADD CONSTRAINT `topic_skills_level_name_foreign` FOREIGN KEY (`level_name`) REFERENCES `level` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `topic_skills_skills_name_foreign` FOREIGN KEY (`skills_name`) REFERENCES `skills` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `topic_skills_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
