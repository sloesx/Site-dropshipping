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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.articles : ~34 rows (environ)
INSERT INTO `articles` (`article_ref`, `article_marque`, `article_nom`, `article_description`, `article_prix_unitaire_HT`, `article_poids`, `article_stock`, `article_img`, `id_categorie`, `id_fournisseur`) VALUES
	(1, 'Optimum Nutrition', 'Whey Protein Isolate (2kg)', 'Une protéine de haute qualité à absorption rapide, idéale pour la récupération musculaire après vos séances de force intenses.', 49.99, 2.00, 100, 'src/prot.jpg', 1, 1),
	(2, 'Cellucor', 'Pre-Workout "Explosive Energy"', 'Boostez votre concentration et votre endurance avec cette formule enrichie en caféine et bêta-alanine pour des entraînements sans limite.', 29.99, 0.30, 50, 'src/preworkout.jpg', 1, 1),
	(3, 'Bowflex', 'Haltères Réglables (24kg)', 'Gagnez de la place avec ce système d\'haltères innovant permettant de varier la charge de 2,5 à 24 kg en un seul clic.', 199.99, 24.00, 20, 'src/halteres.webp', 2, 2),
	(4, 'Inzer', 'Ceinture de Force en Cuir', 'Soutien lombaire maximal pour vos Squats et Soulevés de terre, conçue en cuir véritable pour une durabilité exceptionnelle.', 45.00, 0.80, 30, 'src/ceinture_force.webp', 2, 2),
	(5, 'Gymshark', 'T-Shirt "Oversize" Pump Cover', 'Un t-shirt en coton lourd avec une coupe large moderne, parfait pour vos débuts de séance ou pour un look sportswear au quotidien.', 25.00, 0.20, 150, 'src/tshirt.webp', 3, 7),
	(6, 'Sveltus', 'Pack de Bandes de Résistance', 'Cinq niveaux de résistance différents pour vos échauffements, vos exercices de mobilité ou pour intensifier vos séances à la maison.', 19.99, 0.50, 80, 'src/bandes_res.jpg', 2, 2),
	(7, 'Optimum Nutrition', 'Serious Mass Gainer (5kg)', 'Idéal pour la prise de masse extrême, riche en glucides complexes et protéines.', 55.00, 5.00, 40, 'src/gainer.webp', 1, 4),
	(8, 'MyProteine', 'Créatine Monohydrate (500g)', 'Améliore les performances lors d\'efforts intenses et courts. Poudre pure sans arôme.', 15.99, 0.50, 200, 'src/creatine.webp', 1, 5),
	(9, 'Scitec Nutrition', 'BCAA Xpress (280g)', 'Acides aminés ramifiés pour maximiser la récupération et réduire la fatigue musculaire.', 22.50, 0.28, 150, 'src/bcaa.webp', 1, 10),
	(10, 'FitNutrition', 'Barre Protéinée Chocolat (Boîte de 12)', 'L\'en-cas parfait post-entraînement, 20g de protéines par barre et faible en sucres.', 24.99, 0.72, 80, 'src/barres.webp', 1, 1),
	(11, 'Optimum Nutrition', 'ZMA Récupération Nocturne', 'Complexe de zinc et magnésium pour optimiser le sommeil et la récupération hormonale.', 19.90, 0.15, 120, 'src/zma.webp', 1, 4),
	(12, 'Scitec Nutrition', '100% Casein Complex (920g)', 'Protéine à assimilation lente, idéale à consommer avant le coucher pour nourrir le muscle toute la nuit.', 32.99, 0.92, 60, 'src/casein.webp', 1, 10),
	(13, 'Rogue Fitness', 'Barre Olympique d\'Haltérophilie (20kg)', 'Barre professionnelle avec roulements à aiguilles, supporte jusqu\'à 700kg de charge.', 299.00, 20.00, 15, 'src/barre_oly.webp', 2, 6),
	(14, 'Eleiko', 'Disque Bumper (20kg)', 'Disque olympique en caoutchouc haute densité, conçu pour les drops en haltérophilie.', 89.00, 20.00, 50, 'src/bumper_20.jpg', 2, 8),
	(15, 'Eleiko', 'Disque Bumper (10kg)', 'Disque olympique standard pour vos barres de CrossFit et d\'haltérophilie.', 49.00, 10.00, 50, 'src/bumper_10.jpg', 2, 8),
	(16, 'Gorilla Sports', 'Kettlebell en Fonte (16kg)', 'Outil polyvalent pour le renforcement musculaire et le cardio.', 39.99, 16.00, 30, 'src/kettlebell_16.webp', 2, 3),
	(17, 'Gorilla Sports', 'Kettlebell en Fonte (24kg)', 'Kettlebell lourd pour les pratiquants avancés. Revêtement anti-corrosion.', 59.99, 24.00, 20, 'src/kettlebell_24.webp', 2, 3),
	(18, 'Decathlon Pro', 'Banc de Musculation Inclinable', 'Banc robuste avec 7 niveaux d\'inclinaison pour travailler tous les angles des pectoraux.', 120.00, 15.00, 10, 'src/banc.webp', 2, 9),
	(19, 'IronEquipment', 'Rack à Squat Réglable', 'Chandelles indépendantes pour Squats et Développé Couché. Gain de place maximal.', 149.99, 25.00, 8, 'src/rack.webp', 2, 2),
	(20, 'Gymshark', 'Short de Training Léger', 'Liberté de mouvement totale pour vos séances jambes. Tissu respirant.', 35.00, 0.15, 100, 'src/short.jpg', 3, 7),
	(21, 'Gymshark', 'Débardeur Stringer "Golden Era"', 'Le classique du bodybuilding pour mettre en valeur votre dos et vos épaules.', 22.00, 0.10, 120, 'src/stringer.webp', 3, 7),
	(22, 'Decathlon Pro', 'T-Shirt Compression Manches Longues', 'Maintien musculaire optimal et évacuation de la transpiration.', 19.99, 0.15, 90, 'src/compression.webp', 3, 9),
	(23, 'FitNutrition', 'Sweat à Capuche d\'Entraînement', 'Sweat épais pour vous garder au chaud pendant l\'échauffement.', 45.00, 0.40, 60, 'src/sweat.webp', 3, 1),
	(24, 'Rogue Fitness', 'Chaussettes Hautes Deadlift', 'Protection des tibias garantie lors de vos soulevés de terre lourds.', 14.50, 0.05, 200, 'src/chaussettes.webp', 3, 6),
	(25, 'Gymshark', 'Jogging de Récupération Slim', 'Confort absolu après l\'effort avec une coupe ajustée moderne.', 40.00, 0.35, 75, 'src/jogging.webp', 3, 7),
	(26, 'MyProteine', 'Shaker Pro (700ml) avec Grille', 'Mélange garanti sans grumeaux, plastique sans BPA.', 6.99, 0.10, 300, 'src/shaker.jpg', 4, 5),
	(27, 'IronEquipment', 'Sangles de Tirage (Lifting Straps)', 'Sécurisez votre prise lors des exercices de tirage lourd pour soulager les avant-bras.', 12.50, 0.05, 150, 'src/sangles.webp', 4, 2),
	(28, 'Rogue Fitness', 'Protège-Poignets Élastiques', 'Soutien articulaire indispensable pour vos développés couchés et militaires.', 18.00, 0.08, 120, 'src/poignets.webp', 4, 6),
	(29, 'Gorilla Sports', 'Magnésie Liquide (Flacon 250ml)', 'Grip parfait et autorisé dans les salles qui interdisent la magnésie en poudre.', 9.90, 0.25, 80, 'src/magnesie.webp', 4, 3),
	(30, 'Decathlon Pro', 'Serviette Microfibre Salle de Sport', 'Séchage ultra-rapide et traitement anti-odeur. Compacte pour le sac de sport.', 5.50, 0.10, 400, 'src/serviette.webp', 4, 9),
	(31, 'FitNutrition', 'Gourde XXL (2.2 Litres)', 'Ne soyez plus jamais à court d\'eau pendant vos longues séances.', 14.99, 0.20, 90, 'src/gourde.webp', 4, 1),
	(32, 'Gorilla Sports', 'Gilet Lesté Réglable (10kg)', 'Intensifiez vos tractions, dips et exercices au poids de corps.', 59.90, 10.00, 25, 'src/gilet.webp', 5, 3),
	(33, 'Rogue Fitness', 'Battle Rope (Corde Ondulatoire 15m)', 'Conditionnement métabolique extrême pour brûler les graisses.', 115.00, 12.00, 15, 'src/battlerope.webp', 5, 6),
	(34, 'Eleiko', 'Sandbag Strongman (Jusqu\'à 50kg)', 'Sac de sable renforcé pour l\'entraînement fonctionnel et le Strongman. Vendu vide.', 75.00, 1.50, 30, 'src/sandbag.webp', 5, 8);

-- Listage de la structure de table ecom. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `categorie_id` int NOT NULL AUTO_INCREMENT,
  `categorie_nom` varchar(50) NOT NULL,
  `categorie_description` text,
  PRIMARY KEY (`categorie_id`),
  UNIQUE KEY `categorie_nom` (`categorie_nom`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.categories : ~5 rows (environ)
INSERT INTO `categories` (`categorie_id`, `categorie_nom`, `categorie_description`) VALUES
	(1, 'Compléments', 'Optimisez votre croissance musculaire et votre récupération avec notre sélection de protéines, créatines et acides aminés de haute qualité.'),
	(2, 'Équipement', 'Tout l\'\'équipement nécessaire pour transformer votre espace en salle de sport professionnelle : haltères, bancs et machines de musculation.'),
	(3, 'Vêtements', 'Des textiles techniques conçus pour la performance : t-shirts respirants, shorts de compression et vêtements "pump cover" ultra-confortables.'),
	(4, 'Accessoires', 'Les indispensables du pratiquant : ceintures de force, sangles de tirage, shakers et protections pour des entraînements en toute sécurité.'),
	(5, 'Force et Endurance', 'Matériel spécifique pour le Powerlifting et le Strongman, conçu pour résister aux charges les plus lourdes.');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.clients : ~2 rows (environ)
INSERT INTO `clients` (`client_id`, `client_nom`, `client_prenom`, `client_email`, `client_adresse_livraison`, `client_complement_adresse`, `client_code_postal`, `client_ville`, `client_pays`, `client_mot_de_passe`, `client_telephone`) VALUES
	(1, 'm', 'e', 'e@gmail.com', 'qzdqzdqzd', '2', '54520', 'e', 'France', '3f79bb7b435b05321651daefd374cdc681dc06faa65e374e38337b88ca046dea', '0773853186'),
	(4, 'm', 'e', 't@gmail.com', 'qzdqzdqzd', '2', '54520', 'e', 'France', 'e3b98a4da31a127d4bde6e43033f66ba274cab0eb7eb1c70ec41402bf6273dd8', '0773853186'),
	(6, 'Eloy', 'e', 'et@gmail.com', 'qzdqzdqzd', '2', '54520', 'e', 'France', '0e07cf830957701d43c183f1515f63e6b68027e528f43ef52b1527a520ddec82', '0773853186');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table ecom.fournisseurs : ~10 rows (environ)
INSERT INTO `fournisseurs` (`fournisseur_id`, `fournisseur_societe`, `fournisseur_telephone`) VALUES
	(1, 'FitNutrition SAS', '01 23 45 67 89'),
	(2, 'IronEquipment Pro', '02 34 56 78 90'),
	(3, 'Gorilla Sports France', '03 45 67 89 01'),
	(4, 'Optimum Supplements', '04 56 78 90 12'),
	(5, 'MyProteine Distribution', '05 67 89 01 23'),
	(6, 'Rogue Fitness Europe', '06 78 90 12 34'),
	(7, 'Gymshark Wholesale', '07 89 01 23 45'),
	(8, 'Eleiko Sport', '01 98 76 54 32'),
	(9, 'Decathlon Pro', '09 69 32 33 22'),
	(10, 'Scitec Nutrition Europe', '08 92 89 90 91');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
