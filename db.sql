-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 06 Septembre 2018 à 07:02
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hellotamilmovie`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `actors` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `commingsoon` tinyint(1) NOT NULL,
  `incinema` tinyint(1) NOT NULL,
  `shortfilm` tinyint(1) NOT NULL,
  `stars` float NOT NULL,
  `imagemain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagesingleview` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagenow` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id`, `name`, `date`, `category`, `actors`, `director`, `age`, `duration`, `description`, `commingsoon`, `incinema`, `shortfilm`, `stars`, `imagemain`, `imagesingleview`, `imagenow`) VALUES
(1, 'Mersal', '2018-03-03 13:42:49', 'Action', 'Vijay, Kajal Agarwal, Samantha, Nithya Menen', 'Atlee', 'public', '150', 'A few individuals in the medical profession are murdered or kidnapped, and the cop investigating the case suspects a doctor and arrests him. But is he the one who is behind these crimes? And why are they being committed?', 1, 1, 0, 3.7, 'mersalmain.jpg', 'mersalsingleview.jpg', 'mersalnow.jpg'),
(2, 'Vikram Vedha', '2018-03-03 13:48:24', 'Action, Thriller', 'Vijay Sethupathi, Mathavan', 'Pushkar-Gayathri', 'public', '140', 'A notorious gangster Vedha surrenders himself to encounter specialist Vikram whom he challenges every step of the way by narrating his life events in the form of riddles that needs to be solved in order to capture him.', 1, 1, 0, 4, 'vikramvedhamain.jpg', 'vikramvedhasingleview.jpg', 'vikramvedhanow.jpg'),
(3, 'Aruvi', '2018-03-03 13:53:10', 'Thriller', 'Aditi Balan, Kavitha Bharathi', 'Arun Prabu Purushothaman', 'public', '120', 'A gentle girl born and brought up amidst the ever growing eco-social-consumeristic environment finds it difficult to fit in the society. She decides to take it hard on the people.', 1, 1, 0, 4, 'aruvimain.jpg', 'aruvisingleview.jpg', 'aruvinow.jpg'),
(4, 'Thani Oruvan', '2018-03-03 13:53:10', 'Thriller, Action', 'Jayam Ravi, Arvind Swamy', 'M. Raja', 'Public', '150', 'An idealistic cop and an ambitious scientist-businessman indulge in a high-stake battle of wits.\r\n', 1, 1, 0, 4, 'thanioruvanmain.jpg', 'thanioruvansingleview.jpg', 'thanioruvannow.jpg'),
(5, 'Iraivi', '2018-03-03 13:58:08', 'Thriller', 'Vijay Sethupathy, S J Surya', 'Karthik Subbaraj', 'public', '160', 'Three men try to overcome the problems in their lives not realising the impact their efforts are having on the women in their lives.', 1, 1, 0, 3.7, 'iraivimain.jpg', 'iraivisingleview.jpg', 'iraivinow.jpg'),
(6, 'Padai Veeran', '2018-03-03 13:58:08', 'Public', 'Vijay Jesudas, Barathi raja', 'Dhana', 'public', '150', 'A care-free youngster sets out to become a cop and comes back to his village to control a riot. He realises that he has to take on people, who are close to him, to manage the situation.', 1, 1, 0, 3.5, 'padaiveeranmain.jpg', 'padaiveeransingleview.jpg', 'padaiveerannow.jpg'),
(7, 'Vedhalam', '2018-03-03 14:00:32', 'Action', 'Ajith, Shruti Haasan, Lakshmi Menon', 'Siva', 'public', '160', 'Ganesh, a cab driver and a doting brother to his sister Tamizh, is hunting down three notorious criminals in Kolkata. Who is he actually and what\'s his motive?\r\n', 1, 1, 0, 3.3, 'vedhalammain.jpg', 'vedhalamsingleview.jpg', 'vedhalamnow.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `slide`
--

INSERT INTO `slide` (`id`, `title`, `content`, `img`) VALUES
(1, 'A satisfied customer', 'is the best business strategy of all.', 'slide1.jpg'),
(2, 'A satisfied customer', 'is the best business strategy of all.', 'slide2.jpg'),
(3, 'A satisfied customer', 'is the best business strategy of all.', 'slide3.jpg'),
(4, 'A satisfied customer', 'is the best business strategy of all.', 'slide4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'jerry', 'jerry', 'jerry', 'jerry', 1, 'iUwFDFR3uZRX4szUvg6lrl/AL55/2EyLMVJQd/87m8Y', 'qT/cAKbogXcMH/p46aR+vAJGpCPBUvPX6w6cF7HyN+oM9HHjWYF4AS/jKV1+vg+C/NdGyNRsxZH5avXPUZ74qw==', '2018-06-10 10:33:31', NULL, NULL, 'a:1:{i:0;s:11:\"NORMAL_USER\";}'),
(2, 'test', 'test', 'test@live.fr', 'test@live.fr', 1, '/DgSirxAnN7dR.7y2Ly.8aA.iVg5DkbJ3jgVaHLnyII', 'YjST1jnHjpI40oB4IPb+jBvSgcAtfYk9v7FvYz+DJ7Guo5sSG1vPvPnGKiLva/5ilsDVY3rd9ZZN+9Kc4iXg9g==', '2018-06-09 15:40:44', NULL, NULL, 'a:1:{i:0;s:11:\"NORMAL_USER\";}'),
(3, 'anderson', 'anderson', 'anderson@test.fr', 'anderson@test.fr', 1, 'fPaOxJjkSozejCa12ZpYQQxneC5IbExfmyYfaZt4ftc', 'BlzxIfwHsFE4gchgpc6ZuPaWsKjYD28dO19X3/gIISg/Tp7h/zJQ3sVT1xS+rMYR7pPNulqBvfdmTo6M3dZ5CA==', '2018-06-09 16:40:48', NULL, NULL, 'a:1:{i:0;s:11:\"NORMAL_USER\";}');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `rate` double DEFAULT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`id`, `rate`, `film_id`, `user_id`, `date`) VALUES
(1, 2, 1, 1, '2018-06-09 16:40:16'),
(2, 4, 2, 1, '2018-06-10 10:33:37'),
(3, 4, 5, 1, '2018-05-04 21:08:27'),
(4, 5, 1, 2, '2018-06-09 15:47:40'),
(5, 4, 1, 3, '2018-06-09 16:41:47'),
(6, 4, 3, 3, '2018-06-03 20:02:00'),
(7, 4, 2, 3, '2018-06-03 20:03:51'),
(8, 4, 6, 3, '2018-06-03 19:57:53'),
(9, 3, 7, 3, '2018-06-03 19:58:26'),
(10, 4, 5, 3, '2018-06-03 20:02:06'),
(11, 4, 4, 3, '2018-06-03 19:59:58'),
(12, 3, 2, 2, '2018-06-09 15:46:59');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962A567F5183` (`film_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A108564567F5183` (`film_id`),
  ADD KEY `IDX_5A108564A76ED395` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `FK_5A108564567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `FK_5A108564A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
