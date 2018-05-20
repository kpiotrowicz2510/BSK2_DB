# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.31-MariaDB)
# Database: bsk2
# Generation Time: 2018-05-20 16:13:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table application_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `application_users`;

CREATE TABLE `application_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clearanceId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `application_users` WRITE;
/*!40000 ALTER TABLE `application_users` DISABLE KEYS */;

INSERT INTO `application_users` (`id`, `email`, `password`, `clearanceId`, `created_at`, `updated_at`)
VALUES
	(1,'test@test.pl','$2y$10$arG1I7DPMOEHHkMuQhLCMuwQZWVaWIX9OSMUvIOfaLXhfFbAUZge.',1,'2018-05-20 15:15:28','2018-05-20 16:09:05'),
	(2,'1','test123',3,'2018-05-20 15:04:49','2018-05-20 15:35:51'),
	(3,'123','test123',2,'2018-05-20 15:05:06','2018-05-20 15:35:48'),
	(4,'123','test123',1,'2018-05-20 15:05:13','2018-05-20 15:05:13');

/*!40000 ALTER TABLE `application_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table clearances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clearances`;

CREATE TABLE `clearances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `clearances` WRITE;
/*!40000 ALTER TABLE `clearances` DISABLE KEYS */;

INSERT INTO `clearances` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'ADMIN',NULL,NULL),
	(2,'MANAGER',NULL,NULL),
	(3,'USER',NULL,NULL);

/*!40000 ALTER TABLE `clearances` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dataset_clearances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dataset_clearances`;

CREATE TABLE `dataset_clearances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clearanceId` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',2),
	(3,'2018_05_20_141623_create_application_users_table',2),
	(4,'2018_05_20_141716_create_reservations_table',2),
	(5,'2018_05_20_141722_create_reservation_seats_table',2),
	(6,'2018_05_20_141748_create_clearances_table',2),
	(7,'2018_05_20_141801_create_dataset_clearances_table',2),
	(8,'2018_05_20_141810_create_user_clearances_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table reservation_seats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservation_seats`;

CREATE TABLE `reservation_seats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clearanceId` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL,
  `seatNumber` int(11) NOT NULL,
  `seatRow` int(11) NOT NULL,
  `reservationStatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `reservation_seats` WRITE;
/*!40000 ALTER TABLE `reservation_seats` DISABLE KEYS */;

INSERT INTO `reservation_seats` (`id`, `clearanceId`, `reservationId`, `seatNumber`, `seatRow`, `reservationStatus`, `created_at`, `updated_at`)
VALUES
	(1,2,5,1,1,0,'2018-05-20 15:29:11','2018-05-20 15:29:11'),
	(2,2,5,2,2,0,'2018-05-20 15:29:11','2018-05-20 15:29:11');

/*!40000 ALTER TABLE `reservation_seats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reservations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clearanceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservationStatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;

INSERT INTO `reservations` (`id`, `clearanceId`, `userId`, `name`, `reservationStatus`, `created_at`, `updated_at`)
VALUES
	(2,3,123,'New super reservation',2,'2018-05-20 15:28:18','2018-05-20 15:29:59'),
	(3,2,1,'New super reservation',2,'2018-05-20 15:28:40','2018-05-20 15:29:48'),
	(5,2,1,'New super reservation',1,'2018-05-20 15:29:11','2018-05-20 15:29:41');

/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_clearances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_clearances`;

CREATE TABLE `user_clearances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clearanceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
