-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 mars 2022 à 08:14
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `star`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `identification` varchar(10) NOT NULL,
  `date_of_launch` date NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `circulations`
--

CREATE TABLE `circulations` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `lane_id` int(11) NOT NULL,
  `date_of_circulation` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `incidents`
--

CREATE TABLE `incidents` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `car_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lanes`
--

CREATE TABLE `lanes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_station_id` int(11) NOT NULL,
  `end_station_id` int(11) NOT NULL,
  `count_stations` smallint(6) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lanes`
--

INSERT INTO `lanes` (`id`, `name`, `start_station_id`, `end_station_id`, `count_stations`) VALUES
(1, 'Ligne A', 1, 2, 2),
(2, 'Ligne B', 9, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lanes_stations`
--

CREATE TABLE `lanes_stations` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `lane_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specifications` text NOT NULL,
  `places` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `lane_id` int(11) NOT NULL,
  `schedule` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stations`
--

INSERT INTO `stations` (`id`, `name`, `longitude`, `latitude`, `address`, `zip`, `city`) VALUES
(1, 'La Poterie', NULL, NULL, 'La Poterie', '35000', 'Rennes'),
(2, 'Villejean-Université', NULL, NULL, 'Rue de l\'université', '35001', 'Villejean'),
(3, 'Triangle', NULL, NULL, 'Rue du triangle', '35000', 'Rennes'),
(4, 'Italie', NULL, NULL, 'Place d\'Italie', '35000', 'Rennes'),
(5, 'Gare', NULL, NULL, 'Avenue Janvier', '35000', 'Rennes'),
(6, 'Saint Anne', NULL, NULL, 'Place Saint Anne', '35000', 'Rennes'),
(7, 'Anatole France', NULL, NULL, 'Boulevard Anatole France', '35200', 'Rennes'),
(8, 'Pontchaillou', NULL, NULL, 'Avenue de l\'Hopital', '35000', 'Rennes'),
(9, 'Atalante', NULL, NULL, 'Boulevard Atalante', '35130', 'Cesson Sévigné'),
(10, 'Gaîté', NULL, NULL, 'Boulevard de la Courrouze', '35110', 'Saint Jacques'),
(11, 'Cleunay', NULL, NULL, 'Boulevard du Leclerc', '35000', 'Rennes'),
(12, 'Mabilais', NULL, NULL, 'Rue de la Mabilais', '35000', 'Rennes');

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_validity` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `subscription_preferences`
--

CREATE TABLE `subscription_preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auto_renewal` tinyint(4) NOT NULL DEFAULT '0',
  `prefered_payment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lane_id` int(11) NOT NULL,
  `in_station_id` int(11) NOT NULL,
  `in_datetime` datetime NOT NULL,
  `out_station_id` int(11) NOT NULL,
  `out_datetime` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `count_travels` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `subscription_id`, `firstname`, `lastname`, `date_of_birth`, `address`, `zip`, `city`, `count_travels`) VALUES
(1, 0, 'M.Arthur', 'Weill', '2022-03-15', '1 rue de l\'etang', '35170', 'Bruz', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `circulations`
--
ALTER TABLE `circulations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lanes`
--
ALTER TABLE `lanes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lanes_stations`
--
ALTER TABLE `lanes_stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `station_id` (`station_id`),
  ADD KEY `lane_id` (`lane_id`);

--
-- Index pour la table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscription_preferences`
--
ALTER TABLE `subscription_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lane_id` (`lane_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `circulations`
--
ALTER TABLE `circulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lanes`
--
ALTER TABLE `lanes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `lanes_stations`
--
ALTER TABLE `lanes_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subscription_preferences`
--
ALTER TABLE `subscription_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
