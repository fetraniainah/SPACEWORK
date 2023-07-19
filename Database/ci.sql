-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 19 juil. 2023 à 20:30
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ci`
--

-- --------------------------------------------------------

--
-- Structure de la table `action_s`
--

CREATE TABLE `action_s` (
  `id` int NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `action_s`
--

INSERT INTO `action_s` (`id`, `user_id`, `adminId`, `action_name`, `updated_at`) VALUES
(7, 'N00020', 'N00019', 'Add new user', '2023-07-19 15:58:56'),
(8, 'N00021', 'N00019', 'Add new user', '2023-07-19 16:02:43'),
(9, 'N00022', 'N00019', 'Add new user', '2023-07-19 16:51:06'),
(10, 'N00023', 'N00019', 'Add new user', '2023-07-19 16:52:09'),
(11, 'N00024', 'N00019', 'Add new user', '2023-07-19 16:53:05'),
(12, 'N00025', 'N00019', 'Add new user', '2023-07-19 16:54:04'),
(13, 'N00026', 'N00019', 'Add new user', '2023-07-19 16:54:46'),
(14, 'N00027', 'N00019', 'Add new user', '2023-07-19 16:55:33'),
(15, 'N00029', 'N00019', 'Add new user', '2023-07-19 16:56:11'),
(16, 'N00030', 'N00019', 'Add new user', '2023-07-19 16:57:32'),
(17, 'N00029', 'N00019', 'Delete user', '2023-07-19 16:57:57'),
(18, 'N00030', 'N00019', 'Delete user', '2023-07-19 16:58:03'),
(19, 'N00027', 'N00019', 'Delete user', '2023-07-19 16:58:07'),
(20, 'N00030', 'N00019', 'Restore user', '2023-07-19 16:58:18'),
(21, 'N00029', 'N00019', 'Restore user', '2023-07-19 16:58:21'),
(22, 'N00023', 'N00019', 'Delete user', '2023-07-19 16:58:27'),
(23, 'N00024', 'N00019', 'Delete user', '2023-07-19 16:58:30'),
(24, 'N00031', 'N00019', 'Add new user', '2023-07-19 17:01:13'),
(25, 'N00032', 'N00019', 'Add new user', '2023-07-19 19:35:25'),
(26, 'N00033', 'N00019', 'Add new user', '2023-07-19 19:36:08'),
(27, 'N00027', 'N00019', 'Restore user', '2023-07-19 19:49:29');

-- --------------------------------------------------------

--
-- Structure de la table `connected_users`
--

CREATE TABLE `connected_users` (
  `matriculId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stack` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `connected_users`
--

INSERT INTO `connected_users` (`matriculId`, `email`, `is_admin`, `firstname`, `lastname`, `stack`, `login_time`) VALUES
('N00019', 'tahiri.fetra@gmail.com', 1, 'Tahirifetrasoa', 'Jean ', 'RH', '2023-07-19 18:07:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `matriculId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`matriculId`, `firstname`, `lastname`, `email`, `access_code`, `stack`, `is_admin`, `timestamp`, `status`) VALUES
('N00019', 'Tahirifetrasoa', 'Jean ', 'tahiri.fetra@gmail.com', 'XN0Y019', 'RH', 1, '2023-07-17 17:10:10', 1),
('N00020', 'Tahirinandrasana', 'Andinirina', 'andi@gmail.com', '5WUL8DXE', 'développeur', 0, '2023-07-19 15:58:56', 1),
('N00021', 'David', 'Rasolomahefa', 'david@gmail.com', 'KNTJ2079', 'Disigner', 0, '2023-07-19 16:02:42', 1),
('N00022', 'Faraniana', 'Andrianantenaina', 'fara@gmail.com', '3H7ZKJWH', 'Integrateur', 0, '2023-07-19 16:51:06', 1),
('N00023', 'Andriamihaja', 'Fanantenana', 'fah@gmail.com', 'LVHMDQWL', 'Disigner', 0, '2023-07-19 16:52:09', 0),
('N00024', 'Andriamihaja', 'Koloina', 'koloina@gmail.com', 'B95O5916', 'Disigner', 0, '2023-07-19 16:53:04', 0),
('N00025', 'Rakoarisoa', 'Kiady', 'kiady@gmail.com', 'FHQ45C97', 'développeur', 0, '2023-07-19 16:54:04', 1),
('N00026', 'Rakotoarivelo', 'Haja aina', 'haja@gmail.com', 'N4T4ZBY1', 'Disigner', 0, '2023-07-19 16:54:46', 1),
('N00027', 'Rakotondrafara', 'Safidy', 'safidy@gmail.com', '8OZJ4CNS', 'développeur', 0, '2023-07-19 16:55:32', 1),
('N00029', 'Fanomezantsoa', 'Mirana', 'mirana@gmail.com', '4P0C9E4V', 'Disigner', 0, '2023-07-19 16:56:10', 1),
('N00030', 'Randrianantenaina', 'Sarobidy', 'sarobidy@gmail.com', '50ELCCD7', 'développeur', 0, '2023-07-19 16:57:32', 1),
('N00031', 'Randrianantenaina', 'jean ', 'jean@gmail.com', '9Y65PL4W', 'développeur', 0, '2023-07-19 17:01:13', 1),
('N00032', 'Rabearimanana', 'Fandresena', 'fandresena@gmail.com', '6E670PY4', 'Integrateur', 0, '2023-07-19 19:35:25', 1),
('N00033', 'Rabearimanana', 'Nomeniavo', 'nomeniavo@gmail.com', '8SRL1GUP', 'Développeur', 0, '2023-07-19 19:36:07', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action_s`
--
ALTER TABLE `action_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Index pour la table `connected_users`
--
ALTER TABLE `connected_users`
  ADD PRIMARY KEY (`matriculId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matriculId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action_s`
--
ALTER TABLE `action_s`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action_s`
--
ALTER TABLE `action_s`
  ADD CONSTRAINT `action_s_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `users` (`matriculId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
