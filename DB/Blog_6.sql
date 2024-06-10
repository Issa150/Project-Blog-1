-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 juin 2024 à 23:01
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
(9, 'DIY2', '', 3),
(10, 'Minimalism is back', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_text` text NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment_text`, `created_at`) VALUES
(3, 3, 6, 'ftgyhuj', 2147483647);

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
(5, 3, 'How: title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsum dolorum sit invenconsequuntur optio dicta non perferendis fuga cor', '70 chars:Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio iusto doloribus quidem. Odio, sit! Corporis ipsum eaque atque quam voluptatibus dolores cumque et culpa totam molestiae dolore eligendi ad excepturi doloribus ipsam omnis ratione aspernatur minima, corrupti libero placeat, officia perferendis inventore deserunt? Ullam nobis debitis ipsa neque consectetur, nulla dolorem? Ratione ullam nihil neque est inventore eveniet quae aperiam explicabo, tempora ipsum ea aliquam! Ipsa natus voluptatibus et necessitatibus distinctio quis quae animi, earum, corporis alias, accusamus quibusdam? Dolor!', '2024-05-30 22:50:58', NULL, 1, 1),
(6, 3, 'Tips: title 2 (update to multiple)', '30 chars:Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis modi qui incidunt ex? Deleniti, autem in hic ipsum adipisci eveniet quo esse, voluptas amet praesentium ab, sequi beatae illum sit.', '2024-05-30 22:50:58', '', 1, 2),
(8, 3, 'How: Title 3', '70 chars:Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio iusto doloribus quidem. Odio, sit! Corporis ipsum eaque atque quam voluptatibus dolores cumque et culpa totam molestiae dolore eligendi ad excepturi doloribus ipsam omnis ratione aspernatur minima, corrupti libero placeat, officia perferendis inventore deserunt? Ullam nobis debitis ipsa neque consectetur, nulla dolorem? Ratione ullam nihil neque est inventore eveniet quae aperiam explicabo, tempora ipsum ea aliquam! Ipsa natus voluptatibus et necessitatibus distinctio quis quae animi, earum, corporis alias, accusamus quibusdam? Dolor!', '2024-06-04 23:39:49', NULL, 0, 1),
(13, 4, 'How: Title 1 Sana', '&#60;p&#62;Body 1&#38;nbsp; sana&#60;/p&#62;', '2024-06-05 11:11:09', NULL, 0, 1),
(17, 4, 'How: Title no category (parameteres are ordered) sana', '&#60;p&#62;Body sana&#60;/p&#62;', '2024-06-05 11:32:56', NULL, 0, 1),
(18, 4, 'How: Title (ordered and image) Sana', '&#60;p&#62;Body sana&#60;/p&#62;', '2024-06-05 11:35:12', NULL, 0, 1),
(19, 4, 'How:Title (test more 40 chars) Sana [azertyuiopqsdfghjklmwxcvbnazertyuiazertyu]', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 11:41:12', '', 0, 1),
(20, 4, 'How: Title (after length test, short test) Sana', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 11:43:01', '', 0, 1),
(22, 4, 'How: Title (after unifying of forms) Sana', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 14:02:16', '', 0, 1),
(23, 4, 'Tips: Title (After joining function for add) Sana', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 20:19:30', '', 1, 2),
(24, 4, 'Tips: Title no category (after join 2) (category deleted)', '&#60;p&#62;body&#60;/p&#62;', '2024-06-05 21:16:43', '', 1, 2),
(25, 4, 'How: Title (after join 3)', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 21:19:26', '', 1, 1),
(26, 4, 'How: Title (after join- no category)', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-05 21:20:06', '', 1, 1),
(27, 4, 'Tips: Title (1 multi category post[ category removed ⛔😃😃😃😃]) Sana', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsum dolorum sit inventore totam ullam. Fugit at harum mollitia dolorem, est blanditiis. Minus ad sunt sapiente, deleniti modi consequuntur optio dicta non perferendis fuga corporis natus incidunt vel est cupiditate? Cumque laboriosam voluptate quis suscipit unde iusto quam sed quaerat.', '2024-06-08 12:33:22', '', 1, 2),
(28, 4, 'How: 2 Multy categorie', '&#60;p&#62;Body&#60;/p&#62;', '2024-06-08 13:39:28', '', 1, 1),
(31, 4, 'How: 3d multy categoy (updated)', '', '2024-06-08 14:03:56', '', 1, 1),
(33, 4, 'Tips:Title 4', '&#60;p&#62;Body 4&#60;/p&#62;', '2024-06-08 16:19:01', '', 1, 2),
(34, 4, 'Tips: Title (test final add)', '', '2024-06-08 16:56:50', '', 1, 2),
(35, 4, 'Tips: Title (Post added without category)', '', '2024-06-08 17:19:45', '', 1, 2),
(36, 4, 'Tips: Title ( 2 try add post NO category)', '', '2024-06-08 17:25:15', '', 1, 2),
(37, 3, 'Tips: Title 4 (multy category) Issa', '', '2024-06-08 18:39:31', '', 1, 2),
(38, 3, 'Tips:Title 5 (multiple) issa', '', '2024-06-08 19:48:21', '', 1, 2),
(39, 3, 'How Title 6 (multiple) issa', '', '2024-06-08 19:49:19', '', 1, 1),
(40, 3, 'How Title 7 (multiple) issa', '', '2024-06-08 19:49:46', '', 1, 1),
(41, 3, 'How Title 8 (multy- add ---modified 3) issa', '', '2024-06-08 19:57:07', '', 1, 1);

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
(42, NULL, 3),
(62, NULL, 3),
(43, NULL, 8),
(63, NULL, 8),
(44, NULL, 9),
(64, NULL, 9),
(10, 5, 3),
(49, 6, 4),
(50, 6, 8),
(51, 6, 9),
(12, 8, 3),
(19, 13, 3),
(13, 13, 4),
(20, 13, 5),
(14, 17, 4),
(15, 18, 4),
(16, 19, 4),
(17, 20, NULL),
(18, 22, 5),
(33, 24, NULL),
(23, 25, 6),
(24, 26, NULL),
(32, 27, NULL),
(36, 33, NULL),
(29, 34, 6),
(30, 34, 7),
(31, 36, NULL),
(47, 38, 3),
(48, 38, 8),
(39, 39, NULL),
(40, 40, NULL),
(59, 41, 8),
(60, 41, 9);

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
(2, 'Top', 'Tips & tricks, presenting, showcase', 3),
(4, 'Updated theme', '', 3);

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
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `users_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `thematics`
--
ALTER TABLE `thematics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
