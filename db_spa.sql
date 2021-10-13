-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 13 oct. 2021 à 08:44
-- Version du serveur :  8.0.21
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_spa`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `inserted_at`) VALUES
(1, 'canelle20214', '$2y$16$bb2SxVZ5e3a.8dWubF5xt.04lBKVFvWidMInwxfhBgw6vdw11NVLC', '2021-03-29 20:29:02');

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `sexe` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `specie` varchar(50) DEFAULT NULL,
  `breed` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int NOT NULL,
  `arrived_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `name`, `sexe`, `birthday`, `specie`, `breed`, `description`, `status`, `arrived_at`) VALUES
(1, 'cookie', 'mâle', '2021-01-04', 'chien', 'labrador', 'Ce gentil chien saura remplir votre quotidien de bonheur et n\'attend que votre l\'amour en retour. Il a été abandonné par sa précédente famille. Méfiant au début, il s\'est fait quelques amis au refuge et est un compagnon de vie très sage.', 2, '2021-08-23 07:41:25'),
(2, 'ada', 'femelle', '2021-12-08', 'chien', 'croisé', 'Ada est vive et adore jouer ! Elle a beaucoup d\'amour à offrir et sera votre plus fidèle compagnon. Elle est parfois peureuse et nous soupçonnons ses anciens propriétaires de l\'avoir maltraîtée. Elle a besoin d\'une famille douce.', 0, '2021-09-28 15:04:06'),
(3, 'red', 'mâle', '2019-03-23', 'chien', 'teckel', 'Ce chien est tout simplement une petite fusée ! Plein de bonne humeur et d\'énergie, il sera le plus heureux du monde quand vous irez le promener. Malgré son enthousiasme débordant, il est très obéisant et comprend tout ce qu\'on lui dit.', 0, '2021-10-02 16:40:51'),
(4, 'hendrix', 'mâle', '2015-10-13', 'chat', 'européen', 'Sa fourure est incroyablement douce. Vous ne trouverez pas de chat plus câlin. On peut qualifier Hendrix d\'énorme boule de poil, mais c\'est prendre le rique qu\'il se vexe.', 1, '2021-09-13 11:19:48');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_mail` (`mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `phone`, `firstname`, `lastname`, `inserted_at`) VALUES
(1, 'canelledelbreil@gmail.com', '$2y$16$bb2SxVZ5e3a.8dWubF5xt.04lBKVFvWidMInwxfhBgw6vdw11NVLC', '0787679904', 'canelle', 'delbreil', '2021-10-13 08:40:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
