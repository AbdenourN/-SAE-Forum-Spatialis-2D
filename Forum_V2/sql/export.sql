-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 jan. 2024 à 00:22
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_user_id` int DEFAULT NULL,
  `to_user_id` int DEFAULT NULL,
  `village_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`),
  UNIQUE KEY `message_id` (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`message_id`, `from_user_id`, `to_user_id`, `village_id`, `question_id`, `content`, `created_at`) VALUES
(7, 1, NULL, NULL, 4, 'salut', '2024-01-29 20:32:39'),
(9, 2, NULL, NULL, 3, 'salut', '2024-01-29 20:33:35'),
(11, 2, NULL, NULL, 3, 'aaaaaaaaa', '2024-01-29 20:53:36'),
(13, 3, NULL, NULL, 6, 'aaa', '2024-01-29 23:26:23');

-- --------------------------------------------------------

--
-- Structure de la table `private_messages`
--

DROP TABLE IF EXISTS `private_messages`;
CREATE TABLE IF NOT EXISTS `private_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `private_messages`
--

INSERT INTO `private_messages` (`id`, `sender_id`, `receiver_id`, `message`, `sent_at`) VALUES
(1, 2, 1, 'test', '2024-01-30 00:09:33'),
(2, 2, 1, 'salut', '2024-01-30 00:11:19'),
(3, 3, 3, 'salut l\'admin c\'est cyril', '2024-01-30 00:13:35'),
(4, 3, 1, 'sa', '2024-01-30 00:21:00'),
(5, 3, 2, 'as', '2024-01-30 00:21:06');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int DEFAULT NULL,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `titre`, `description`, `contenu`, `id_auteur`, `pseudo_auteur`, `date_publication`) VALUES
(2, 'aaaaaaaaa', 'azzz', 'Je sais pas', 1, 'chrislin12', '2024-01-26 02:14:26'),
(3, 'aaaaaaazzzzzzzzz', 'jesp', 'jsp', 1, 'chrislin12', '2024-01-26 02:52:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  `statut` varchar(50) NOT NULL DEFAULT 'user',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `is_banned` tinyint(1) DEFAULT '0',
  `ban_until` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `users` (`user_id`, `pseudo`, `email`, `password_hash`, `avatar_url`, `created_at`, `last_login`, `statut`, `firstname`, `lastname`, `is_banned`, `ban_until`) VALUES
(1, 'chrislin12', 'chrislin@gmail.com', '$2y$10$KaVtpvcPiFm0493mrqs75uIHRh0vCbRCNgTukeiPSwzdncVvdIyIm', NULL, '2024-01-24 13:05:02', '2024-01-30 00:11:41', 'user', 'lin', 'chris', 0, NULL),
(2, 'admin', 'admin@admin.com', '$2y$10$KaVtpvcPiFm0493mrqs75uIHRh0vCbRCNgTukeiPSwzdncVvdIyIm', NULL, '2024-01-29 18:45:57', '2024-01-29 23:27:15', 'admin', 'Admin', 'Istrator', 0, NULL),
(3, 'cyril', 'cyr@g.com', '$2y$10$9xsyRUv/EsJTnPrAk2DSY.6E070gur87GWfeM0FIDMfv2lQtrSYd2', NULL, '2024-01-29 23:25:40', '2024-01-30 00:13:14', 'user', 'cyr', 'cyril', 0, NULL);



DROP TABLE IF EXISTS `user_village_membership`;
CREATE TABLE IF NOT EXISTS `user_village_membership` (
  `membership_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `village_id` int DEFAULT NULL,
  `joined_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`membership_id`),
  UNIQUE KEY `membership_id` (`membership_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `villages`;
CREATE TABLE IF NOT EXISTS `villages` (
  `village_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `theme` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`village_id`),
  UNIQUE KEY `village_id` (`village_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

