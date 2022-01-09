-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 09:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd_project_04`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `name`, `email`, `phone_num`, `address`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', NULL, NULL, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, 'demo_admin', 'Demo Admin', 'admin2@gmail.com', NULL, NULL, '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `teacher_id`, `batch`, `created_at`, `updated_at`) VALUES
(1, 'aniksen_cse', 10, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, 'minhaz_cse', 11, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(3, 'aniksen_cse', 12, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(4, 'demo_teacher', 34, '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `title`, `department_id`, `semester_id`, `type`, `credit`, `created_at`, `updated_at`) VALUES
(1, 'CSE 110', 'Introduction to Computer System', 1, 1, 'Laboratory', 2, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(2, 'EEE 101', 'Electrical Circuits I', 2, 1, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(3, 'MAT 105', 'Engineering Mathematics I', 1, 1, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(4, 'CSE 112', 'Structured Programming Laboratory', 1, 2, 'Laboratory', 2, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(5, 'EEE 211', 'Electronics I', 2, 2, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(6, 'MAT 107', 'Engineering Mathematics II', 1, 2, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(7, 'CSE 222', 'Data Structure Laboratory', 1, 3, 'Laboratory', 1.5, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(8, 'CSE 211', 'Object Oriented Programming', 1, 3, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(9, 'MAT 201', 'Engineering Mathematics III', 1, 3, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(10, 'EEE 311', 'Digital Electronics', 2, 3, 'Theory', 3, '2022-01-09 20:30:11', '2022-01-09 20:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `course_limitations`
--

CREATE TABLE `course_limitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `max_student` int(11) NOT NULL,
  `max_credit` int(11) NOT NULL,
  `cost_per_credit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_limitations`
--

INSERT INTO `course_limitations` (`id`, `max_student`, `max_credit`, `cost_per_credit`, `created_at`, `updated_at`) VALUES
(1, 4, 11, 2100, '2022-01-09 20:30:11', '2022-01-09 20:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullfrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `shortform`, `fullfrom`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 'Computer Science & Engineering', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, 'EEE', 'Electrical and Electronic Engineering', '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `course_id`, `session`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1550', 1, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(2, '1550', 2, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(3, '1550', 3, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(4, '1540', 4, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(5, '1540', 5, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(6, '1540', 6, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(7, '1540', 1, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(8, '1530', 5, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(9, '1530', 6, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(10, '1530', 1, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(11, '1530', 2, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(12, '1520', 8, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(13, '1520', 9, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(14, '1520', 4, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(15, '1520', 1, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(16, '1510', 7, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(17, '1510', 8, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(18, '1510', 9, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(19, '1510', 10, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11'),
(20, '1510', 1, 'Spring 2022', 'Regular', 'Pending', '2022-01-09 20:30:11', '2022-01-09 20:30:11');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_24_194923_create_user_accounts_table', 1),
(6, '2021_11_25_144902_create_teachers_table', 1),
(7, '2021_11_25_144919_create_advisors_table', 1),
(8, '2021_11_25_144929_create_students_table', 1),
(9, '2021_11_25_144958_create_departments_table', 1),
(10, '2021_11_25_145012_create_semesters_table', 1),
(11, '2021_11_25_145028_create_courses_table', 1),
(12, '2021_12_10_143053_create_sessions_table', 1),
(13, '2021_12_12_213701_create_admins_table', 1),
(14, '2021_12_18_185426_create_course_limitations_table', 1),
(15, '2021_12_25_145131_create_enrollments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_no`, `created_at`, `updated_at`) VALUES
(1, '1st', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, '2nd', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(3, '3rd', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(4, '4th', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(5, '5th', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(6, '6th', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(7, '7th', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(8, '8th', '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fall 2021', 0, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, 'Spring 2022', 0, '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `email`, `phone_num`, `address`, `batch`, `created_at`, `updated_at`) VALUES
(1, '1510', 'Anik Barua', 'anikclassroom@gmail.com', '01516710608', 'Nondonkanon 1 no lane, Chattogram', 10, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, '1520', 'Avishek Chowdhury', 'avishekchy45@gmail.com', '01816486550', 'Sadarghat, Chattogram', 10, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(3, '1530', 'Mohammad Ahasan hossen', 'ahasanhossen57@gmail.com', '01842701022', 'Raozan, Chattogram', 11, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(4, '1540', 'Bill Gates', 'bill@gmail.com', '', '', 11, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(5, '1550', 'Elon Musk', 'elon@gmail.com', '', '', 12, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(6, 'demo_student', 'Mark Zuckerberg', 'zuckn@gmail.com', '', '', 34, '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_id`, `name`, `email`, `phone_num`, `address`, `created_at`, `updated_at`) VALUES
(1, 'aniksen_cse', 'Anik Sen', 'aniksen.cuet09@gmail.com', NULL, NULL, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, 'minhaz_cse', 'Syed Md. Minhaz Hossain', 'minhaz027@yahoo.com', NULL, NULL, '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(3, 'demo_teacher', 'Demo Teacher', 'demoteacher@gmail.com', NULL, NULL, '2022-01-09 20:30:10', '2022-01-09 20:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$JkglI4ua.gdrRGC4HY.bR.2x6sScQcDlHKqLXHiQHFtIqh0F5e5nq',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$JQyzsNPg94ch3nntS7pP0.0t2WyO8En/kPo2SyKA8TKuYcZGOMvc6', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(2, 'demo_admin', 'admin', '$2y$10$5cTKrBUEq95YIAs1uRjxOuaiR2YtMo9p67coMap3HVRU2.5zEQOUi', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(3, 'aniksen_cse', 'teacher', '$2y$10$Ka1IbN32/QfcGMlb4ZM/Juq6nTpe40vOKTp6hGgyYIMKw1EHBjHnS', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(4, 'minhaz_cse', 'teacher', '$2y$10$J2yzEMAK/GqePzHeEPXyCu0.2PezV6tocG9CPqv08mCYYhe62QByG', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(5, 'demo_teacher', 'teacher', '$2y$10$ewBgxbnL/6u2ubQ7h.Rsgu5UBVhPBbjCjufFeVHFOixsIjiJm4T3q', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(6, '1510', 'student', '$2y$10$wE4oQm0WSVlI4EiI2eO5U.Oa7YfWJU8H54YXD4HrxcQOrXJi7MIg.', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(7, '1520', 'student', '$2y$10$rTq24yC/x.oen4z1ugC9iuTw.o9SKzrcuVZ21osg5QX3fyo9pxSki', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(8, '1530', 'student', '$2y$10$b0hc4MD.YtYu56AElwGdZOg1AKRXNKa1KccA8rO6BhngAlyeaXhvC', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(9, '1540', 'student', '$2y$10$dmTyuZIPFN.aQXzDJIBKkuF1myVLPMCG0eZbMC2tY2s0naMhQu.W.', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(10, '1550', 'student', '$2y$10$D1cqMJ.KbozPy0aufHFevuT0rVus24T7.9IOScZNzXZjQlZ9nckqu', '2022-01-09 20:30:10', '2022-01-09 20:30:10'),
(11, 'demo_student', 'student', '$2y$10$mJZlYoFJZLX5UNeYLkWQte7HGmw7lrugdH8DKW0SbwMSXoxvymige', '2022-01-09 20:30:10', '2022-01-09 20:30:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_admin_id_unique` (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advisors_batch_unique` (`batch`),
  ADD KEY `advisors_teacher_id_index` (`teacher_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_code_unique` (`code`),
  ADD KEY `courses_department_id_index` (`department_id`),
  ADD KEY `courses_semester_id_index` (`semester_id`);

--
-- Indexes for table `course_limitations`
--
ALTER TABLE `course_limitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_shortform_unique` (`shortform`),
  ADD UNIQUE KEY `departments_fullfrom_unique` (`fullfrom`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrollments_student_id_course_id_unique` (`student_id`,`course_id`),
  ADD KEY `enrollments_session_foreign` (`session`),
  ADD KEY `enrollments_course_id_index` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semesters_semester_no_unique` (`semester_no`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_batch_index` (`batch`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_teacher_id_unique` (`teacher_id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_accounts_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advisors`
--
ALTER TABLE `advisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_limitations`
--
ALTER TABLE `course_limitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `user_accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advisors`
--
ALTER TABLE `advisors`
  ADD CONSTRAINT `advisors_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollments_session_foreign` FOREIGN KEY (`session`) REFERENCES `sessions` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_batch_foreign` FOREIGN KEY (`batch`) REFERENCES `advisors` (`batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `user_accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `user_accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
