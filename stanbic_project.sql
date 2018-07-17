-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 04:51 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stanbic_project`
--

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
(11, '2018_07_03_090600_add_template_to_projects', 2),
(12, '2018_07_06_102836_create_image_models_table', 3),
(13, '2018_07_06_112836_create_image_models_table', 4),
(14, '2018_07_06_155411_create_forms_table', 5),
(15, '2018_07_06_163523_create_image_models_table', 6),
(16, '2018_07_08_183250_create_projects_photos_table', 7),
(32, '2014_10_12_000000_create_users_table', 8),
(33, '2014_10_12_100000_create_password_resets_table', 8),
(34, '2018_06_28_153109_create_projects_table', 8),
(35, '2018_07_08_183251_create_projects_photos_table', 8);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Saved',
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `event_name`, `category`, `type`, `start_date`, `end_date`, `description`, `venue`, `contact_person`, `contact_no`, `user_id`, `status`, `latitude`, `longitude`, `template`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Seedstar Accra', 'Conference', 'external', '2018-07-13 00:00:00', '2018-07-13 00:00:00', 'Seedstars World is coming to Accra!\r\nThe 10 best startups from Accra will be invited to pitch in front of an investment panel and compete to be crowned the most promising seed-stage startup of Seedstars Accra 2018. The winning startup will join the global Seedstars Family and take part in the regional and global Seedstars Summits that include our tried and tested bootcamp and investor forum. It\'s a catalytic platform for high growth emerging market startups.', 'Business Incubation Center, 5th floor Joshua Alabi Library Accra, UPSA', 'Foster Akugri', '0540198049', '1', 'Saved', '5.6618605', '-0.16550400000005538', 1, 'https://www.seedstarsworld.com/event/seedstars-accra-2018', '2018-07-09 15:31:31', '2018-07-09 15:31:31'),
(2, 'Women In Tech Week 2018', 'Conference', 'internal', '2018-09-18 00:00:00', '2018-09-22 00:00:00', 'Women in Tech Week Festival, is the flagship festive event of Women in Tech Africa. It is an annual week long festive season for women across the globe that is celebrated simultaneously across the globe physically and virtually as it urges towards being at the forefront of Africa’s growth Agenda.', 'Accra', 'Foster Akugri', '0540198049', '1', 'Saved', NULL, NULL, 1, 'http://www.womenintechweek.com', '2018-07-09 16:06:01', '2018-07-09 16:10:50'),
(3, 'Tech In Ghana Conference', 'Conference', 'internal', '2018-10-08 00:00:00', '2018-10-12 00:00:00', 'The Tech in Ghana Conference is at the cutting edge of Ghana\'s technology landscape, priding itself on being at the cusp of the country’s next generation of entrepreneurs, industry investors and global collaborators.', 'Accra', 'Foster Akugri', '0540198049', '1', 'Saved', NULL, NULL, 1, 'http://techinghanaconference.com', '2018-07-10 14:29:10', '2018-07-10 14:33:14'),
(4, 'Stanbic Jazz Festival', 'Conference', 'internal', '2018-11-16 00:00:00', '2018-11-17 00:00:00', 'The 2018 edition of the elite jazz concert, the Stanbic Jazz Festival provides a platform for top flight musicians bringing global legends and local icons together in keeping with the tradition of the Standard bank group.', 'AICC', 'Foster Akugri', '0540198049', '1', 'Saved', NULL, NULL, 1, NULL, '2018-07-10 15:25:34', '2018-07-10 16:38:16'),
(5, 'Lionesses Of Africa Meetup 3', 'Conference', 'internal', '2018-11-30 00:00:00', '2018-11-30 00:00:00', 'Lionesses of Africa is a community passionate about women\'s entrepreneurship in Africa and supports the start-up dreams of all women on the continent.', 'Accra', 'Foster Akugri', '0540198049', '1', 'Saved', NULL, NULL, 1, 'https://www.lionessesofafrica.com', '2018-07-10 15:38:31', '2018-07-10 15:55:28'),
(6, 'Google Developer Network KNUST Meetup', 'Conference', 'internal', '2018-07-07 00:00:00', '2018-07-07 00:00:00', 'DSC is a Google Developers program for university students, designed to help them build their mobile and web development skills and knowledge. It is open to any student, ranging from novice developers who are just starting, to advanced developers who want to further their skills. It is intended to be a space for students to learn and collaborate as they solve mobile and web development problems.', 'Stanbic Heights , Airportcity', 'Foster Akugri', '0540198049', '1', 'Saved', '5.5994831', '-0.1781955999999809', 1, NULL, '2018-07-10 16:27:25', '2018-07-10 16:27:25'),
(7, 'Stanbic- Otumfuo Invitational Golf Tournament', 'CommunityEngagement', 'internal', '2018-04-20 00:00:00', '2018-04-22 00:00:00', 'The Stanbic – Otumfou Invitational Golf Tournament is an annual event organised in collaboration with The Royal Golf Club of Kumasi. The tournament is one of features over 150 Amateur and Pro Golfers including Customers or Stanbic Bank Ghana from clubs across the country and the West African Region.', 'Royal Golf Club, Kumasi', 'Stanbic Bank Ghana', '0205050054', '1', 'Saved', '6.675812199999999', '-1.6226449000000684', 1, 'https://www.stanbicrsvp.com/event/stanbic-otumfuo-invitational-golf-tournament/', '2018-07-12 09:29:54', '2018-07-12 09:29:54'),
(8, 'Open Banking Forum', 'Conference', 'internal', '2018-05-30 00:00:00', '2018-05-30 00:00:00', 'Open Banking is a financial services term as part of financial technology that refers to: The use of Open APIs that enable third party developers to build applications and services around the financial institution. \r\n\r\nThe UK’s open banking regulations came into effect on 13 January 2018, bringing changes to the sector that could transform financial services. Open banking forces UK banks to open their data via a set of secure application programming interfaces (APIs). This will force banks to shift from being one-stop-shops for financial services to open platforms where consumers can start to embrace a more modular approach to banking by giving verified third-parties direct access to this data.', 'Stanbic Heights', 'Foster Akugri', '0540198049', '1', 'Saved', '5.5994831', '-0.1781955999999809', 1, 'https://www.stanbicrsvp.com/event/open-banking-forum/', '2018-07-12 09:35:35', '2018-07-12 09:35:35'),
(9, 'Stanbic Open Banking Hackathon', 'Conference', 'internal', '2018-06-01 00:00:00', '2018-06-02 00:00:00', 'Open Banking is a financial services term as part of financial technology that refers to: The use of Open APIs that enable third party developers to build applications and services around the financial institution.', 'Stanbic Heights', 'Foster Akugri', '0540198049', '1', 'Saved', '5.5994831', '-0.1781955999999809', 1, 'https://www.stanbicrsvp.com/event/stanbic-open-banking-hack/', '2018-07-12 09:58:41', '2018-07-12 09:58:41'),
(10, 'BootCamp with DIV', 'competition', 'internal', '2018-07-21 00:00:00', '2018-07-23 00:00:00', 'Are you a lady an interested in building apps? The Stanbic Business Incubator and devinvogue are bringing you an exciting 10 days Bootcamp from 4th to 15th June 2018 at the Stanbic Heights, Accra.', 'Stanbic Heights', 'Foster Akugri', '0540198049', '1', 'Saved', NULL, NULL, 1, NULL, '2018-07-12 11:08:12', '2018-07-12 11:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `projects_photos`
--

CREATE TABLE `projects_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_photos`
--

INSERT INTO `projects_photos` (`id`, `project_id`, `filename`, `created_at`, `updated_at`) VALUES
(1, 1, 'photos/EQQfLv4bllMBLd0T6gJ2KqTQMuk7kbI3XL4Yzy4D.jpeg', '2018-07-09 15:31:31', '2018-07-09 15:31:31'),
(2, 2, 'photos/BiNOwAo6dqROzn1MSWcR6kFabitFwX4fdjhHcH8L.jpeg', '2018-07-09 16:06:01', '2018-07-09 16:06:01'),
(3, 3, 'photos/CNFH7YNd8fsqu1EWZPUKrZQso3ZY24ohnUUAkjyr.jpeg', '2018-07-10 14:29:10', '2018-07-10 14:29:10'),
(4, 4, 'photos/RDciH0Ht6nBLaZVdolRMM2lcNJQ1QKjCAL1ByQSx.jpeg', '2018-07-10 15:25:34', '2018-07-10 15:25:34'),
(5, 5, 'photos/FKsdrzVYU8Hjwq7qFOFr4jifEyItKgbgafR77Kxu.jpeg', '2018-07-10 15:38:31', '2018-07-10 15:38:31'),
(6, 6, 'photos/CsRraNm0N2LjPlThOoDMtID2Z3ctSNVtE5oTgq7M.jpeg', '2018-07-10 16:27:25', '2018-07-10 16:27:25'),
(7, 7, 'photos/r3PPOs2SQXbofYyNtFOZhrseZCD4rbWJXTUGpyhA.jpeg', '2018-07-12 09:29:55', '2018-07-12 09:29:55'),
(8, 8, 'photos/mwyFlAeMt18SBXWofKEqrICNfXvDMhknVICeyuyr.jpeg', '2018-07-12 09:35:35', '2018-07-12 09:35:35'),
(9, 9, 'photos/MGeNNtGVAS9ht0ubpQkwTKgkpnKlbGopDHiOpUYc.jpeg', '2018-07-12 09:58:41', '2018-07-12 09:58:41'),
(10, 10, 'photos/yFqk7fL7pi3HGAwxvMS8ugev2d5p7FHfd5mUfFRm.jpeg', '2018-07-12 11:08:13', '2018-07-12 11:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sap_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `sap_no`, `department`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Foster', 'a@b.c', '$2y$10$yPBjmfn/FeUfwKSHV8ElCed.QTmiL69kERO4BsOcxNrns2e3pM8J2', '1234', 'Digital Banking', 'QBJtSfdVoECZ2zoS2ZxcyLFJZrUhZdK9tJK2UtlFK4uyEKd85swKQ3yLwWwZ', '2018-07-09 15:07:58', '2018-07-09 15:07:58');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_photos`
--
ALTER TABLE `projects_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_photos_project_id_foreign` (`project_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects_photos`
--
ALTER TABLE `projects_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects_photos`
--
ALTER TABLE `projects_photos`
  ADD CONSTRAINT `projects_photos_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
