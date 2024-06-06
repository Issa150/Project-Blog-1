-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 juin 2024 à 10:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_1`
--
CREATE DATABASE IF NOT EXISTS `blog_1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog_1`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `user_id`) VALUES
(3, 'productivité', NULL, 3),
(4, 'cuisine', NULL, 3),
(5, 'Biology', 'Tutorials of my cours 2024', 4),
(6, 'math', 'Tutorials of my cours 2024', 4),
(7, 'art', 'Tutorials of my cours 2024', 4),
(8, 'DIY', '', 3),
(9, 'DIY2', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image_cover` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `thematic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`, `image_cover`, `published`, `thematic_id`) VALUES
(5, 3, 'title 1', 'body 1', '2024-05-30 22:50:58', NULL, 1, 1),
(6, 3, 'title 2 ', 'body 2', '2024-05-30 22:50:58', NULL, 1, 2),
(8, 3, 'Title 3', '&#60;p&#62;Body 3&#60;/p&#62;', '2024-06-04 23:39:49', NULL, 0, 1),
(13, 4, 'Title 1 Sana', '&#60;p&#62;Body 1&#38;nbsp; sana&#60;/p&#62;', '2024-06-05 11:11:09', NULL, 0, 1),
(17, 4, 'Title (parameteres are ordered) sana', '&#60;p&#62;Body sana&#60;/p&#62;', '2024-06-05 11:32:56', NULL, 0, 1),
(18, 4, 'Title (ordered and image) Sana', '&#60;p&#62;Body sana&#60;/p&#62;', '2024-06-05 11:35:12', 'pexels-rama-khandkar-2113556.jpg', 0, 1),
(19, 4, 'Title (test more 40 chars) Sana [azertyuiopqsdfghjklmwxcvbnazertyuiazertyu]', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 11:41:12', '', 0, 1),
(20, 4, 'Title (after length test, short test) Sana', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 11:43:01', '', 0, 1),
(22, 4, 'Title (after unifying of forms) Sana', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 14:02:16', '', 0, 1),
(23, 4, 'Title (After joining function for add) Sana', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 20:19:30', '', 1, 2),
(24, 4, 'Title (after join 2)', '&#60;p&#62;body&#60;/p&#62;', '2024-06-05 21:16:43', '', 1, 1),
(25, 4, 'Title (after join 3)', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 21:19:26', '', 1, 1),
(26, 4, 'Title (after join- no category)', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 21:20:06', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`) VALUES
(10, 5, 3),
(11, 6, 4),
(12, 8, 3),
(19, 13, 3),
(13, 13, 4),
(20, 13, 5),
(14, 17, 4),
(15, 18, 4),
(16, 19, 4),
(17, 20, NULL),
(18, 22, 5),
(22, 24, 5),
(23, 25, 6),
(24, 26, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tags` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `tags`, `user_id`, `post_id`) VALUES
(1, 'france, cuisine, pas cher, facile', 3, 5),
(2, 'ia, code, programmation', 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `thematics`
--

CREATE TABLE `thematics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `thematics`
--

INSERT INTO `thematics` (`id`, `title`, `description`, `user_id`) VALUES
(1, 'Comment', 'Tutorials', 3),
(2, 'Top', 'Tips & tricks, presenting, showcase', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` enum('owner','member') NOT NULL DEFAULT 'member',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `profile_cover` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `gender` enum('male','female','nb','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `username`, `role`, `email`, `password`, `image`, `profile_cover`, `city`, `country`, `gender`) VALUES
(3, 'Issa', 'JAFARI', 'issa2024', 'owner', 'isajafari76@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$SXdHUk9lLi9JUmFOT0xxVw$xh1Hwqut9qUe/+ls13YmEV66mmwt+oJ94kKc1plUWIA', 'lesly-juarez-RukI4qZGlQs-unsplash.jpg', 'sense-atelier-cvUIRQ0lIAA-unsplash.jpg', 'Paris', 'France', 'male'),
(4, 'sana', 'khakpour', 'sana2024', 'member', 'sanahosseini@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Q2VSdHpUZ0Y3ZlVKYjl3YQ$l7pWGg8/m231TQWMGOI0e5dw8+YHJqvkWSAjVNT66oI', 'irene-strong--FOUPtqP-mY-unsplash.jpg', NULL, 'Berlin', 'Germany', 'female'),
(7, 'reza', 'ahmadi', 'reza2024', 'member', 'rezaahmadi2024@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$SW1tU0ZtWmpkNFZ0Rk5Bcw$mm7fr7uHsfjhwfSuPhRk5hMiie1FVKvRfy6f+b7xlv8', NULL, NULL, NULL, NULL, NULL),
(8, 'raha', 'shokuhi', 'raha2024', 'member', 'rahashokuhi2024@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VlkxQVgzSnhlMlFFaWVkVw$pQAgO1onYLCfKhHU6jAxPoqRmjanKVgJJAYL4pkNVtM', 'Screenshot 2024-02-04 111657.png', NULL, 'Uppsala', 'Sweden', 'female');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`user_id`),
  ADD KEY `thematic_id` (`thematic_id`);

--
-- Index pour la table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tags_ibfk_2` (`post_id`);

--
-- Index pour la table `thematics`
--
ALTER TABLE `thematics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `thematics`
--
ALTER TABLE `thematics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`thematic_id`) REFERENCES `thematics` (`id`);

--
-- Contraintes pour la table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tags_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
