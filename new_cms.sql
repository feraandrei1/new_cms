-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 06:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `is_active`, `author`, `email`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Andrew Blacksmith', 'andrewblacksmith1@gmail.com', 'yeyeyeye', '2022-12-27 17:19:34', '2022-12-27 17:19:34'),
(3, 1, 0, 'Andrew Blacksmith', 'andrewblacksmith1@gmail.com', 'dadadadadada', '2022-12-27 17:43:51', '2022-12-27 17:43:51'),
(5, 27, 0, 'Andrew Blacksmith', 'andrewblacksmith1@gmail.com', 'dsadasdas', '2022-12-28 19:41:10', '2022-12-28 19:41:10'),
(6, 26, 0, 'Andrew Blacksmith', 'andrewblacksmith1@gmail.com', 'dadasdsa', '2022-12-28 19:41:18', '2022-12-28 19:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_15_184121_posts', 1),
(6, '2022_12_24_095400_create_comments_table', 1),
(7, '2022_12_24_095412_create_comment_replies_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General Coding',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `post_image`, `body`, `category`, `created_at`, `updated_at`, `slug`) VALUES
(1, 21, 'Est illo delectus doloribus blanditiis omnis.', 'https://via.placeholder.com/900x300.png/003377?text=HTML', 'Fugiat ut nemo sapiente tempore laborum perspiciatis ipsa. Nam nam cum voluptatem. Sed quo vitae dolore quo omnis.', 'HTML', '2022-12-27 17:16:35', '2022-12-27 17:43:03', 'est-illo-delectus-doloribus-blanditiis-omnis'),
(2, 2, 'Vel rerum nisi et placeat vitae vel impedit.', 'https://via.placeholder.com/900x300.png/000055?text=PHP', 'Dolorem nisi ullam nostrum quisquam omnis atque et accusamus. Similique accusantium vero labore voluptatem sunt qui. Molestiae dolorem atque repellat cum. Harum voluptas id expedita quia rerum laudantium.', 'PHP', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'vel-rerum-nisi-et-placeat-vitae-vel-impedit'),
(3, 3, 'Perferendis sed est quam nihil blanditiis sunt voluptatem.', 'https://via.placeholder.com/900x300.png/009933?text=JavaScript', 'Recusandae nemo cum quia. Sequi perferendis velit deserunt non. Est fuga aperiam exercitationem aliquid alias. Eum voluptas nam est maiores quidem.', 'JavaScript', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'perferendis-sed-est-quam-nihil-blanditiis-sunt-voluptatem'),
(4, 4, 'Eius molestiae in quia ut dolorem vero ipsam.', 'https://via.placeholder.com/900x300.png/006600?text=HTML', 'Ab sit ea et eveniet qui repudiandae. Commodi doloribus aliquam occaecati saepe illum. Laudantium tempore sunt omnis atque dolorum et.', 'HTML', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'eius-molestiae-in-quia-ut-dolorem-vero-ipsam'),
(5, 5, 'Ea officiis corrupti cumque earum.', 'https://via.placeholder.com/900x300.png/0099aa?text=PHP', 'Qui dolorem et omnis cum. Animi voluptatem aperiam voluptatum nobis. Voluptate et maiores similique maiores aut.', 'PHP', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'ea-officiis-corrupti-cumque-earum'),
(6, 6, 'Incidunt repellat quasi tempora adipisci aut fugiat quo.', 'https://via.placeholder.com/900x300.png/003300?text=JavaScript', 'Iste consequatur quia a consectetur officia veritatis tempora aut. Et architecto et assumenda quia dolor. Hic aliquam ratione voluptatum voluptatem. A amet dolorem expedita consequatur laboriosam.', 'JavaScript', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'incidunt-repellat-quasi-tempora-adipisci-aut-fugiat-quo'),
(7, 7, 'Sapiente vel est quae quasi officia.', 'https://via.placeholder.com/900x300.png/0055dd?text=HTML', 'Corrupti dolor ea ullam ea. Tempore qui totam omnis non. Adipisci temporibus alias molestiae.', 'HTML', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'sapiente-vel-est-quae-quasi-officia'),
(8, 8, 'A incidunt dolorum provident quis.', 'https://via.placeholder.com/900x300.png/0000cc?text=PHP', 'Libero et ab in soluta earum. Velit voluptatem itaque tenetur. Doloremque incidunt sed quae qui vel.', 'PHP', '2022-12-27 17:16:35', '2022-12-27 17:16:35', 'a-incidunt-dolorum-provident-quis'),
(9, 9, 'Eligendi impedit voluptatum quod eligendi sint ratione.', 'https://via.placeholder.com/900x300.png/001111?text=JavaScript', 'Expedita qui dolores nam ipsa sit quidem distinctio quod. Similique dolor praesentium incidunt porro autem veniam corporis. Aliquid nostrum deserunt et minima. Est aut repellendus autem quia earum.', 'JavaScript', '2022-12-27 17:16:36', '2022-12-27 17:16:36', 'eligendi-impedit-voluptatum-quod-eligendi-sint-ratione'),
(10, 10, 'Quia fugiat non et animi libero.', 'https://via.placeholder.com/900x300.png/002211?text=HTML', 'Aut suscipit maiores hic. Nisi perferendis nihil in ut quas numquam nisi. Ipsum et dignissimos facilis soluta exercitationem. Dignissimos sunt dolorem quod cumque iste.', 'HTML', '2022-12-27 17:16:36', '2022-12-27 17:16:36', 'quia-fugiat-non-et-animi-libero'),
(23, 21, 'sASasASdad', 'images/sAn2C9vrSnYWAaBCW5rnhgEU1KfLpiZNITjyj2BP.png', 'AsASasASa', 'HTML', '2022-12-28 17:07:47', '2022-12-28 17:07:47', 'sasasasdad'),
(24, 21, 'dasdsadasda', 'images/AXLu8PydWh74vABp8iJQTvkX2HQ9sp6LNpMiiljV.png', 'dadadsadadad', 'HTML', '2022-12-28 17:52:54', '2022-12-28 17:52:54', 'dasdsadasda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Member',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mueller.darrin 2', 'Eddie Weissnat 2', 'bartoletti.krystal222@example.com', 'Member', '2022-12-27 17:16:34', '$2y$10$BI10opil4PYe7brUtLCDzeuQxAOKHo5kbJ3Ap930IT/JjieN641bK', 'bg5AndkZr7', '2022-12-27 17:16:35', '2022-12-27 17:36:32'),
(2, 'ryley.hintz', 'Lila Reinger Jr.', 'fae.okon@example.net', 'Member', '2022-12-27 17:16:34', '$2y$10$kTfyLEfk9x4VkP1PmOIoLOO8WahDMuGKeamTEgZewduEdWt8vWHsa', 'qK0D2mSNL3', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(3, 'jeanie.stiedemann', 'Cortney Spinka', 'ola.klein@example.net', 'Member', '2022-12-27 17:16:34', '$2y$10$6m4qkr6V8aFRnZspQUOpU.a23I.K72lKbMxq/rdIyJzG5dAK2V3m.', 'Unj6ARxAUb', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(4, 'becker.kraig', 'Austin Maggio', 'iwintheiser@example.net', 'Member', '2022-12-27 17:16:34', '$2y$10$OZEFw3Kz53eRSOJrVFxw2u3XUK4k/ksyFQ7P/MwSeYbO9L/1bW5H.', '8K0rUvMQCP', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(5, 'gulgowski.alexander', 'Alexane Murphy', 'nlang@example.org', 'Member', '2022-12-27 17:16:34', '$2y$10$GFbFd5.bjQnTHNHoktXpYuvjkDOAsleSrwyPS0IUs4erZAyXFfpOC', 'rUMbBmmQMV', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(6, 'greenholt.berry', 'Zena Carter', 'thelma63@example.net', 'Member', '2022-12-27 17:16:34', '$2y$10$ZCLXPhEajESfYhy7Zk2m2.aqrf3QeyTPdHGAFGB7St9sEjJWALR.2', 'yOwwr88nTr', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(7, 'amani.sporer', 'Jerry Graham', 'fwisozk@example.com', 'Member', '2022-12-27 17:16:34', '$2y$10$e1WR1F0ZEM82/brmfA/md.SmKCw0hDcOpEHIqNALOyKj1ytI8TcrW', '1iIeSKgOya', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(8, 'fahey.georgianna', 'Mr. Casey Kilback DVM', 'broderick.schimmel@example.net', 'Member', '2022-12-27 17:16:35', '$2y$10$JT1AiXz06r2mKVe6RV6s6uFVCWrnDVIfcbCfFvYRAq9vM/VHOixOW', 'NHaVMwzkRC', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(9, 'esmitham', 'Mackenzie Trantow', 'cleta80@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$lp9FfeFwCT64kUWVa1G1QuvCP7VJ5HBx6s6IxGH.g7Uk8nYkG11pa', '0XFYswHh8F', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(10, 'margie.strosin', 'Roxane Deckow', 'perry.fritsch@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$iFvkkxDQNVzEEYAJ6hzy9OfDLDKp6fyK4WwvZAxUgqO641NmjLmqq', 'x1GaWOuDLP', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(11, 'reichert.nelson', 'Mr. Gayle Lowe DVM', 'desiree.gerhold@example.org', 'Member', '2022-12-27 17:16:35', '$2y$10$3mA2otBbSgWNFr.Q.0jgLO/aNhmS1E1sqb8MqOFiDZyxTVd3ZBWJC', '7wyUN2eRkz', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(12, 'weimann.edward', 'Emmie Hayes MD', 'tillman67@example.org', 'Member', '2022-12-27 17:16:35', '$2y$10$L7ojpbabzOnyZy5vAr/2AuwHDVMzoYE76gZ7BF81fu7hPEJeaSsT.', 'ztBbbCO5ps', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(13, 'gerard35', 'Ms. Tessie Balistreri', 'lcummings@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$2X67ZOJLytWovCE.pO1geOznhItfnF2jaej1d/PSIhKseSP9TszNa', 'sfcBNsmE8p', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(14, 'katherine.bode', 'Ethan O\'Conner DVM', 'lerdman@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$cAkXxUPAC19oiYwNKQwgd.aoxho8W57sMpVpG6n6nBNUQKnOsWTVK', 'HmNfJSNfYl', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(15, 'adonis75', 'Polly Reichert', 'vincenzo.zemlak@example.net', 'Member', '2022-12-27 17:16:35', '$2y$10$SK94gfjXRAx8aDZ4bd/RT.yNTyZpZetSO8nJ35noT7uGHYtxe3EVq', 'UGsn6mdQBo', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(16, 'freeda.kling', 'Prof. Emmitt Oberbrunner', 'maryjane.rutherford@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$BCUT6.OfaHUsOyqZCjR9cuwQ0PSXG4PfkBboveZ08mFxEyiTjazTi', 'P3hQ5O3Y98', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(17, 'gnikolaus', 'Cathryn Lockman', 'felipe82@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$Z5rlRxAh2zYHrl8YLTOfru5KY3SxpmaZp21v7j7FVlVmWpDJzgeoO', 'voYyhXCyly', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(18, 'mroberts', 'Erin Rau', 'adell.moore@example.org', 'Member', '2022-12-27 17:16:35', '$2y$10$oN9yh2n168J0nFk/DskS5.DXZVjl3SPZ7cSRqdFSasxNTVN3vg0Hm', 'CxhJUtUsxc', '2022-12-27 17:16:35', '2022-12-27 17:16:35'),
(19, 'kessler.davon', 'Rhiannon Conn', 'daija47@example.com', 'Member', '2022-12-27 17:16:35', '$2y$10$48qSxKbpacCb52ZzVcY4jOxRbI39Y9Oy0aSYpgTTbnvzvVGOolzOq', 'I3UBevt33Q', '2022-12-27 17:16:36', '2022-12-27 17:16:36'),
(20, 'jacobs.angeline', 'Dr. Brandt Hirthe Sr.', 'gstreich@example.com', 'Member', '2022-12-27 17:16:36', '$2y$10$nhGq1sAsrRMkJCsALZlfmuPx7kFCIt1Kbh09GhsVq/gFipcCVojAm', 'KYO3ISLjK6', '2022-12-27 17:16:36', '2022-12-27 17:16:36'),
(21, 'andrewblacksmith1', 'Andrew Blacksmith', 'andrewblacksmith1@gmail.com', 'Admin', NULL, '$2y$10$e1WR1F0ZEM82/brmfA/md.SmKCw0hDcOpEHIqNALOyKj1ytI8TcrW', NULL, '2022-12-27 17:17:05', '2022-12-28 19:40:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_index` (`comment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
