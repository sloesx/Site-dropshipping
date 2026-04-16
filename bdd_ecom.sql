-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.4.3 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour ecom
CREATE DATABASE IF NOT EXISTS `ecom` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecom`;

-- Listage de la structure de table ecom. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `article_ref` int NOT NULL AUTO_INCREMENT,
  `article_marque` varchar(50) DEFAULT NULL,
  `article_nom` varchar(50) NOT NULL,
  `article_description` text NOT NULL,
  `article_prix_unitaire_HT` decimal(10,2) NOT NULL,
  `article_poids` decimal(10,2) NOT NULL,
  `article_stock` int NOT NULL DEFAULT '0',
  `article_img` varchar(255) NOT NULL,
  `id_categorie` int NOT NULL,
  `id_fournisseur` int NOT NULL,
  PRIMARY KEY (`article_ref`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_fournisseur` (`id_fournisseur`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`categorie_id`),
  CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseurs` (`fournisseur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.articles : ~0 rows (environ)

-- Listage de la structure de table ecom. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `categorie_id` int NOT NULL AUTO_INCREMENT,
  `categorie_nom` varchar(50) NOT NULL,
  `categorie_description` text,
  PRIMARY KEY (`categorie_id`),
  UNIQUE KEY `categorie_nom` (`categorie_nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.categories : ~0 rows (environ)

-- Listage de la structure de table ecom. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `client_nom` varchar(50) NOT NULL,
  `client_prenom` varchar(50) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_adresse_livraison` varchar(100) NOT NULL,
  `client_complement_adresse` varchar(100) DEFAULT NULL,
  `client_code_postal` varchar(5) NOT NULL,
  `client_ville` varchar(50) NOT NULL,
  `client_pays` varchar(50) NOT NULL,
  `client_mot_de_passe` varchar(255) NOT NULL,
  `client_telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_email` (`client_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.clients : ~2 rows (environ)
INSERT INTO `clients` (`client_id`, `client_nom`, `client_prenom`, `client_email`, `client_adresse_livraison`, `client_complement_adresse`, `client_code_postal`, `client_ville`, `client_pays`, `client_mot_de_passe`, `client_telephone`) VALUES
	(1, 'm', 'e', 'e@gmail.com', 'qzdqzdqzd', '2', '54520', 'e', 'France', '3f79bb7b435b05321651daefd374cdc681dc06faa65e374e38337b88ca046dea', '0773853186'),
	(4, 'm', 'e', 't@gmail.com', 'qzdqzdqzd', '2', '54520', 'e', 'France', 'e3b98a4da31a127d4bde6e43033f66ba274cab0eb7eb1c70ec41402bf6273dd8', '0773853186');

-- Listage de la structure de table ecom. commandes
CREATE TABLE IF NOT EXISTS `commandes` (
  `commande_numero` int NOT NULL AUTO_INCREMENT,
  `commande_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commande_status` enum('expedie','en_attente','livre','annule') NOT NULL DEFAULT 'en_attente',
  `commande_montant` decimal(10,2) NOT NULL,
  `id_client` int NOT NULL,
  PRIMARY KEY (`commande_numero`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.commandes : ~0 rows (environ)

-- Listage de la structure de table ecom. contient
CREATE TABLE IF NOT EXISTS `contient` (
  `id_commande` int NOT NULL,
  `id_article` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_commande`,`id_article`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`commande_numero`),
  CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`article_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.contient : ~0 rows (environ)

-- Listage de la structure de table ecom. fournisseurs
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `fournisseur_id` int NOT NULL AUTO_INCREMENT,
  `fournisseur_societe` varchar(50) NOT NULL,
  `fournisseur_telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`fournisseur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.fournisseurs : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
