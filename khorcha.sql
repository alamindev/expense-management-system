-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 01:27 PM
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
-- Database: `khorcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `basics`
--

CREATE TABLE `basics` (
  `basic_id` int(10) UNSIGNED NOT NULL,
  `basic_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `expcate_id` int(11) NOT NULL,
  `expense_details` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` date NOT NULL,
  `creator_id` int(11) NOT NULL,
  `expense_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `expcate_id` int(10) UNSIGNED NOT NULL,
  `expcate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expcate_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expcate_creator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expcate_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` int(10) UNSIGNED NOT NULL,
  `incate_id` int(11) NOT NULL,
  `income_details` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_date` date NOT NULL,
  `creator_id` int(11) NOT NULL,
  `income_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `incate_id` int(10) UNSIGNED NOT NULL,
  `incate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incate_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_creator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incate_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaners`
--

CREATE TABLE `loaners` (
  `loaner_id` int(10) UNSIGNED NOT NULL,
  `loaner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaner_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaner_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaner_remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaner_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaners`
--

INSERT INTO `loaners` (`loaner_id`, `loaner_name`, `loaner_phone`, `loaner_email`, `loaner_remarks`, `loaner_status`, `created_at`, `updated_at`) VALUES
(1, 'Shahin Alom', '01725-191028', 'shahin@gmail.com', '', 1, '2018-01-20 07:51:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_paids`
--

CREATE TABLE `loan_paids` (
  `loan_paid_id` int(10) UNSIGNED NOT NULL,
  `loaner_id` int(11) NOT NULL,
  `loan_paid_amount` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_paid_date` date NOT NULL,
  `loan_paid_replay_date` date DEFAULT NULL,
  `loan_paid_remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_paid_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_receiveds`
--

CREATE TABLE `loan_receiveds` (
  `loan_rec_id` int(10) UNSIGNED NOT NULL,
  `loaner_id` int(11) NOT NULL,
  `loan_rec_amount` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_rec_date` date NOT NULL,
  `loan_replay_date` date NOT NULL,
  `loan_remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_rec_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2017_10_18_090249_create_income_categories_table', 1),
(4, '2017_10_19_052444_create_incomes_table', 1),
(5, '2017_10_24_070838_create_expenses_table', 1),
(6, '2017_10_24_072018_create_expense_categories_table', 1),
(7, '2017_11_04_031546_create_basics_table', 1),
(8, '2017_11_13_050824_create_loaners_table', 1),
(9, '2018_01_20_065138_create_loan_receiveds_table', 1),
(10, '2018_01_20_072741_create_loan_paids_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saidul Islam Uzzal', 'uzzalbd.cit@gmail.com', '$2y$10$LiDYxyq1.6TRHwVmVK71d.q6Rxv0p6LK0QTHv0jmbT.Leas344Y/2', 1, NULL, NULL, NULL, '2018-01-20 01:42:32', '2018-01-20 01:42:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basics`
--
ALTER TABLE `basics`
  ADD PRIMARY KEY (`basic_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`expcate_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`incate_id`);

--
-- Indexes for table `loaners`
--
ALTER TABLE `loaners`
  ADD PRIMARY KEY (`loaner_id`),
  ADD UNIQUE KEY `loaners_loaner_phone_unique` (`loaner_phone`);

--
-- Indexes for table `loan_paids`
--
ALTER TABLE `loan_paids`
  ADD PRIMARY KEY (`loan_paid_id`);

--
-- Indexes for table `loan_receiveds`
--
ALTER TABLE `loan_receiveds`
  ADD PRIMARY KEY (`loan_rec_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basics`
--
ALTER TABLE `basics`
  MODIFY `basic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `expcate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `incate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaners`
--
ALTER TABLE `loaners`
  MODIFY `loaner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_paids`
--
ALTER TABLE `loan_paids`
  MODIFY `loan_paid_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_receiveds`
--
ALTER TABLE `loan_receiveds`
  MODIFY `loan_rec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
