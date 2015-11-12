-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 08 Octobre 2015 à 02:05
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `education`
--

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `user_id`) VALUES
(1, 'math', NULL),
(2, 'science', NULL),
(3, 'French', NULL),
(4, 'BruhCourse', NULL),
(5, 'Philosophie', NULL),
(14, 'Histoire', 5),
(15, 'How to teach the Univers', 5),
(16, 'Programmation Objets', 5);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `number` int(4) NOT NULL,
  `floor` int(100) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `floor`, `course_id`) VALUES
(4, 42, 42, 15),
(5, 2356, 2, 1),
(6, 1632, 1, 2),
(7, 7634, 7, 4),
(8, 1265, 1, 3),
(9, 3425, 3, 5),
(10, 2534, 2, 14),
(11, 3321, 3, 16);

-- --------------------------------------------------------

--
-- Structure de la table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `schools`
--

INSERT INTO `schools` (`id`, `name`, `adress`) VALUES
(1, 'nice school', '1634 Cool Valle'),
(2, 'Universal School', '4242 Quelque part dans l''univers'),
(3, 'Montmorency', '475 Boulevard de l''Avenir, Laval, QC');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`) VALUES
(5, 'admin', '$2a$10$tQ5zwccPukhDaOENMxl4A.v7h7xVOsvno99AF0SmjseadBVo8cgoO', 'admin', 'admin@admin.com', '2015-09-25', '2015-09-25'),
(7, 'test3', '$2a$10$gzQwCpq1tfgiXzvtQS9vV.0gUIrG708q17it6CqVwqahhHWrTjAFm', 'visiteur', 'test@test.com', '2015-10-03', '2015-10-03'),
(12, 'prof', '$2a$10$XMLApLSOug6HCVrjGxw0juR3enRMh8ESefxKGIKDgiPZrZNtVbfMq', 'super-utilisateurs', 'prof@prof.com', '2015-10-04', '2015-10-04'),
(13, 'prof2', '$2a$10$zBDw7WnDEP/XBGDtT19cLeUaHqROKU.OIIhWxUtPFDI60ZvEdqWc2', 'super-utilisateurs', 'prof@prof.com', '2015-10-06', '2015-10-06');

-- --------------------------------------------------------

--
-- Structure de la table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `yearname` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `years`
--

INSERT INTO `years` (`id`, `yearname`, `school_id`) VALUES
(9, '2042', 2),
(11, 'Secondaire 1', 1),
(12, 'secondaire 3', 1),
(13, 'Cégep session 1', 3),
(14, 'Cégep session 4', 3);

-- --------------------------------------------------------

--
-- Structure de la table `years_courses`
--

CREATE TABLE `years_courses` (
  `year_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `years_courses`
--

INSERT INTO `years_courses` (`year_id`, `course_id`, `id`) VALUES
(11, 1, 52),
(11, 2, 53),
(11, 3, 54),
(12, 1, 55),
(12, 2, 56),
(12, 3, 57),
(13, 1, 58),
(13, 3, 60),
(13, 5, 61),
(14, 3, 62),
(14, 5, 63),
(9, 14, 64),
(11, 14, 65),
(12, 14, 66),
(9, 15, 67),
(9, 16, 68),
(13, 16, 69),
(14, 16, 70),
(9, 4, 71),
(9, 1, 72),
(9, 2, 73),
(9, 3, 74),
(9, 5, 75);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `years_courses`
--
ALTER TABLE `years_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `years_courses`
--
ALTER TABLE `years_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
