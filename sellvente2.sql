-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 mars 2020 à 19:30
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sellvente2`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `realization_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `article_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_picture_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_picture_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_picture_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_picture_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_picture_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `name`, `description`, `price`, `realization_place`, `duration`, `article_state`, `link_picture_1`, `link_picture_2`, `link_picture_3`, `link_picture_4`, `link_picture_5`, `type`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 1, 'Bugatti Chiron', 'Voiture prestigieuse pour bien paraître.', '3000099.00', NULL, NULL, 'En Stock', 'image/bugatti_chirron-1-700-400.jpg', 'image/bugatti_chirron-2-100-100.jpg', 'image/bugatti_chirron-3-100-100.jpg', 'image/bugatti_chirron-4-100-100.jpg', 'image/bugatti_chirron-5-100-100.jpg', '1', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 1),
(2, 1, 'Bugatti Centodieci', 'Voiture de la noblesse pressée.', '3050900.00', NULL, NULL, 'En Stock', 'image/bugatti_centodieci-1-700-400.jpg', 'image/bugatti_centodieci-2-100-100.jpg', 'image/bugatti_centodieci-3-100-100.jpg', 'image/bugatti_centodieci-4-100-100.jpg', 'image/bugatti_centodieci-5-100-100.jpg', '1', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 1),
(3, 1, 'Mercedes Avatar', 'Voiture du futur pour les cinéphiles nostalgiques.', '5000000.99', NULL, NULL, 'En Stock', 'image/mercedes_concept_avatar-1-700-400.jpg', 'image/mercedes_concept_avatar-2-100-100.jpg', 'image/mercedes_concept_avatar-3-100-100.jpg', 'image/mercedes_concept_avatar-4-100-100.jpg', 'image/mercedes_concept_avatar-5-100-100.jpg', '1', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 1),
(4, 2, 'BMW', 'Voiture concept pour ceux qui aiment la marque.', '999000.00', NULL, NULL, 'En Stock', 'image/BMW_Concept_2020-1-700-400.jpg', 'image/BMW_Concept_2020-2-100-100.jpg', 'image/BMW_Concept_2020-3-100-100.jpg', 'image/BMW_Concept_2020-4-100-100.jpg', 'image/BMW_Concept_2020-5-100-100.jpg', '1', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 1),
(5, 2, 'Cours de Yoga', 'Lorem ipsum dolor sit amet.', '19.99', 'Montréal', 3, 'En Stock', 'image/yoga-1-700-400.jpg', 'image/yoga-2-100-100.jpg', 'image/yoga-3-100-100.jpg', 'image/yoga-4-100-100.jpg', 'image/yoga-5-100-100.jpg', '0', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 2),
(6, 2, 'Traitements énergétiques', 'Ut enim ad minim veniam.', '120.00', 'Laval', 1, 'En Stock', 'image/energetique-1-700-400.jpg', 'image/energetique-2-100-100.jpg', 'image/energetique-3-100-100.jpg', 'image/energetique-4-100-100.jpg', 'image/energetique-5-100-100.jpg', '0', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 4),
(7, 2, 'Méditation', 'Duis aute irure dolor in reprehenderit.', '150.00', 'Longueil', 7, 'En Stock', 'image/meditation-1-700-400.jpg', 'image/meditation-2-100-100.jpg', 'image/meditation-3-100-100.jpg', 'image/meditation-4-100-100.jpg', 'image/meditation-5-100-100.jpg', '0', '2020-03-11 01:02:08', '2020-03-11 01:02:08', 3),
(9, 2, 'javascript modifié', 'Cours Javascript modifié', '1.00', NULL, NULL, 'Vendu', NULL, NULL, NULL, NULL, NULL, '1', '2020-03-12 22:10:19', '2020-03-13 01:27:29', 1),
(10, 2, 'PHP cours', 'cours pour apprendre le PHP', '15.00', NULL, NULL, 'Vendu', NULL, NULL, NULL, NULL, NULL, '1', '2020-03-12 23:35:24', '2020-03-12 23:35:24', 2),
(12, 1, 'annonce notation', 'annonce pour tester', '123546.00', NULL, NULL, 'Vendu', NULL, NULL, NULL, NULL, NULL, '1', '2020-03-13 22:16:16', '2020-03-13 22:16:16', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'voiture', '2020-03-03 11:05:32', '2020-03-03 11:05:32'),
(2, 'cours', '2020-03-04 05:01:59', '0000-00-00 00:00:00'),
(3, 'meditation', '2020-03-04 05:01:59', '0000-00-00 00:00:00'),
(4, 'soins', '2020-03-04 05:01:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_seller` bigint(20) UNSIGNED NOT NULL,
  `id_buyer` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `username_sender`, `id_sender`, `id_seller`, `id_buyer`, `ad_id`, `created_at`, `updated_at`) VALUES
(1, 'test message de amine à walid', 'Aminned1', '4', 1, 4, 3, '2020-03-08 19:38:57', '2020-03-08 19:38:57'),
(2, 'test Amine 222', 'Aminned1', '4', 1, 4, 3, '2020-03-08 19:41:22', '2020-03-08 19:41:22'),
(3, 'test jerome vers walid', 'JeromeJ1', '3', 1, 3, 3, '2020-03-08 20:12:37', '2020-03-08 20:12:37'),
(4, 'test 2sdfsdfsfd', 'JeromeJ1', '3', 1, 3, 3, '2020-03-08 20:13:42', '2020-03-08 20:13:42'),
(5, 'test de walid vers jerome1', 'Waliduser1', '1', 1, 3, 3, '2020-03-08 21:01:00', '2020-03-08 21:01:00'),
(6, 'test 1000001', 'JeromeJ1', '3', 1, 3, 3, '2020-03-08 21:01:43', '2020-03-08 21:01:43'),
(7, 'test', 'JeromeJ1', '3', 1, 3, 4, '2020-03-08 21:05:24', '2020-03-08 21:05:24'),
(8, 'test mercedes 222222 de walid', 'Waliduser1', '1', 1, 3, 4, '2020-03-08 21:06:12', '2020-03-08 21:06:12'),
(9, 'hello world', 'Waliduser1', '1', 1, 4, 3, '2020-03-08 21:06:29', '2020-03-08 21:06:29'),
(10, 'amine test final', 'Aminned1', '4', 1, 4, 3, '2020-03-08 21:15:51', '2020-03-08 21:15:51'),
(11, 'test amine mercedes', 'Aminned1', '4', 1, 4, 4, '2020-03-08 21:17:17', '2020-03-08 21:17:17'),
(12, 'test reponse walid mercedes', 'Waliduser1', '1', 1, 4, 4, '2020-03-08 21:17:48', '2020-03-08 21:17:48'),
(13, 'test', 'JeromeJ1', '3', 2, 3, 7, '2020-03-08 21:19:22', '2020-03-08 21:19:22'),
(14, 'ça marche message', 'Saiduser1', '2', 2, 3, 7, '2020-03-08 21:20:06', '2020-03-08 21:20:06'),
(15, 'ok tant mieux alors', 'JeromeJ1', '3', 2, 3, 7, '2020-03-08 21:20:26', '2020-03-08 21:20:26'),
(16, 'dernier test', 'JeromeJ1', '3', 1, 3, 4, '2020-03-10 09:58:02', '2020-03-10 09:58:02'),
(17, 'test final', 'Aminned1', '4', 1, 4, 4, '2020-03-10 10:06:23', '2020-03-10 10:06:23'),
(18, 'test demessage', 'Aminned1', '4', 2, 4, 5, '2020-03-10 12:51:39', '2020-03-10 12:51:39'),
(19, 'Salut , je suis intéressé par votre produit', 'JeromeJ1', '3', 2, 3, 6, '2020-03-10 14:19:13', '2020-03-10 14:19:13'),
(20, 'OK', 'Saiduser1', '2', 2, 3, 6, '2020-03-10 14:20:16', '2020-03-10 14:20:16'),
(21, 'test message', 'JeromeJ1', '3', 2, 3, 5, '2020-03-11 04:35:05', '2020-03-11 04:35:05'),
(37, 'Bonjour, je suis intéressé.', 'Waliduser1', '1', 1, 3, 3, '2020-03-12 06:25:29', '2020-03-12 06:25:29'),
(38, 'pour un message', 'Saiduser1', '2', 2, 3, 7, '2020-03-12 06:39:23', '2020-03-12 06:39:23'),
(39, 'Bonjour je suis intéressé', 'JeromeJ1', '3', 2, 3, 9, '2020-03-12 22:12:16', '2020-03-12 22:12:16'),
(40, 'Bonjour, je veux conclure la vente', 'Aminned1', '4', 2, 4, 9, '2020-03-12 22:19:28', '2020-03-12 22:19:28'),
(41, 'd\'accord, on fixe une rendez-vous', 'Saiduser1', '2', 2, 4, 9, '2020-03-12 22:20:28', '2020-03-12 22:20:28');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_28_000924_create_ads_table', 1),
(5, '2020_02_28_174940_create_categories_table', 1),
(6, '2020_03_01_054039_ads_category_id_foreign_to_ads_table', 1),
(7, '2020_03_03_211216_create_messages_table', 1),
(8, '2020_03_09_182620_create_purchases_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `id_buyer` bigint(20) UNSIGNED NOT NULL,
  `id_seller` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `purchases`
--

INSERT INTO `purchases` (`id`, `ad_id`, `id_buyer`, `id_seller`, `state`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 2, 'vendu à cet acheteur', '2020-03-11 01:03:23', '2020-03-11 01:03:23'),
(2, 7, 4, 2, 'vendu à un autre acheteur', '2020-03-11 01:17:51', '2020-03-11 01:17:51'),
(3, 9, 3, 2, 'vendu à un autre acheteur', '2020-03-12 22:12:25', '2020-03-12 22:12:25'),
(4, 9, 4, 2, 'vendu à cet acheteur', '2020-03-12 22:15:58', '2020-03-12 22:15:58'),
(5, 10, 3, 2, 'vendu à cet acheteur', '2020-03-12 23:40:34', '2020-03-12 23:40:34'),
(6, 12, 5, 1, 'vendu à cet acheteur', '2020-03-13 22:16:55', '2020-03-13 22:16:55');

-- --------------------------------------------------------

--
-- Structure de la table `scorings`
--

CREATE TABLE `scorings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_buyer` bigint(20) UNSIGNED NOT NULL,
  `id_seller` bigint(20) UNSIGNED NOT NULL,
  `scoring` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `scorings`
--

INSERT INTO `scorings` (`id`, `id_buyer`, `id_seller`, `scoring`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 4, '2020-03-12 23:33:20', '2020-03-12 23:33:20'),
(2, 3, 2, 1, '2020-03-12 23:44:05', '2020-03-12 23:44:05'),
(3, 5, 1, 3, '2020-03-13 22:28:23', '2020-03-13 22:28:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_nb` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `phone`, `join_preference`, `company`, `company_nb`, `address`, `link_website`, `link_facebook`, `link_linkedin`, `role`, `privilege`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Walid', 'walid@exemple.com', NULL, '$2y$10$3rNjUeStQFq147nS3yEEfOyg.7K0zBbNquXz6S3iKRA3.Mo0faWtS', 'Waliduser1', '135465', NULL, 'Cie_1', 12345, '123, rue Unetelle, Laville QC  H1W 3S1', 'www.test.com', 'www.test.com', 'www.test.com', 'Fournisseur', 'usager', 'Oui', NULL, '2020-03-03 16:03:28', '2020-03-12 07:31:18'),
(2, 'Said', 'said@exemple.com', NULL, '$2y$10$3rNjUeStQFq147nS3yEEfOyg.7K0zBbNquXz6S3iKRA3.Mo0faWtS', 'Saiduser1', '135465', NULL, 'Cie_2', 12345, '456, rue Deuxtelle, Laville QC  H1W 3S2', 'www.test.com', 'www.test.com', 'www.test.com', 'Fournisseur', 'usager', 'Oui', NULL, '2020-03-03 16:03:28', '2020-03-13 00:56:53'),
(3, 'Jerome', 'jerome@exemple.com', NULL, '$2y$10$72q/E9jhh4okt/.Y/kJfz./pakotljSZ9tr2FeD2XWwC2OX6laBR2', 'JeromeJ1', '12345', NULL, 'Cie_3', 12345, '789, rue Troistelle, Laville QC  H1W 3S3', 'www.test.com', 'www.test.com', 'www.test.com', 'Acheteur', 'usager', 'Oui', NULL, '2020-03-08 04:33:12', '2020-03-13 01:04:04'),
(4, 'Amine', 'amine@exemple.com', NULL, '$2y$10$72q/E9jhh4okt/.Y/kJfz./pakotljSZ9tr2FeD2XWwC2OX6laBR2', 'Aminned1', '12345', NULL, 'Cie_4', 12345, '987, rue Quatretelle, Laville QC  H1W 3S4', 'www.test.com', 'www.test.com', 'www.test.com', 'Acheteur', 'usager', 'Oui', NULL, '2020-03-08 04:33:12', '2020-03-13 01:03:20'),
(5, 'Guillaume', 'guillaume@exemple.com', NULL, '$2y$10$72q/E9jhh4okt/.Y/kJfz./pakotljSZ9tr2FeD2XWwC2OX6laBR2', 'Guillaumed1', '12345', NULL, 'Cie_5', 12345, '654, rue Cinqtelle, Laville QC  H1W 3S5', 'www.test.com', 'www.test.com', 'www.test.com', 'Acheteur', 'usager', 'Oui', NULL, '2020-03-08 04:33:12', '2020-03-13 01:03:15'),
(6, 'user', 'user@exemple.com', NULL, '$2y$10$ryWJkoT6IxPNSyZRrdLz.OZKkQCu5A7NxUHWLJ2KML7HHMQ5L2yVW', 'Userpseudo3', '4505551717', 'Téléphone', 'user compagny', 231654, '6595,street', 'www.test.com', 'www.test.com', 'www.test.com', 'Acheteur', 'usager', 'Non', NULL, '2020-03-13 17:01:02', '2020-03-13 17:01:02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_user_id_foreign` (`user_id`),
  ADD KEY `ads_category_id_foreign` (`category_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_ad_id_foreign` (`ad_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_ad_id_foreign` (`ad_id`),
  ADD KEY `purchases_id_seller_foreign` (`id_seller`),
  ADD KEY `purchases_id_buyer_foreign` (`id_buyer`);

--
-- Index pour la table `scorings`
--
ALTER TABLE `scorings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scorings_id_seller_foreign` (`id_seller`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `scorings`
--
ALTER TABLE `scorings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_id_buyer_foreign` FOREIGN KEY (`id_buyer`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_id_seller_foreign` FOREIGN KEY (`id_seller`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
