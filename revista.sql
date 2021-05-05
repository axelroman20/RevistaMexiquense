-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6255
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para u730030579_revistagcm
CREATE DATABASE IF NOT EXISTS `u730030579_revistagcm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `u730030579_revistagcm`;

-- Volcando estructura para tabla u730030579_revistagcm.article
CREATE TABLE IF NOT EXISTS `article` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrer` int(10) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(10) NOT NULL,
  `likes` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `carrer` (`carrer`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`carrer`) REFERENCES `users` (`carrer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla u730030579_revistagcm.article: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `id_user`, `user`, `carrer`, `title`, `description`, `thumb`, `file`, `views`, `likes`, `created_at`, `updated_at`) VALUES
	('588aff', '58dd60', 'axel01', 1, 'Articulo de Pruebas', 'Descripcion de Pruebas', '588aff_thumb.jpg', '588aff_doc.pdf', 870, 2, '2021-04-30 01:55:09', '2021-05-03 20:21:15'),
	('c2ca54', '58dd60', 'axel01', 1, 'Editar Articulos', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasda', 'c2ca54_thumb.jpg', 'c2ca54_doc.pdf', 24, 1, '2021-04-30 01:59:20', '2021-05-03 20:16:02');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Volcando estructura para tabla u730030579_revistagcm.carrer
CREATE TABLE IF NOT EXISTS `carrer` (
  `id` int(10) NOT NULL,
  `carrer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla u730030579_revistagcm.carrer: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `carrer` DISABLE KEYS */;
INSERT INTO `carrer` (`id`, `carrer`) VALUES
	(0, 'Ninguno'),
	(1, 'Ingeniería En Sistemas'),
	(2, 'Ingenieria Industrial'),
	(3, 'Psicologia'),
	(4, 'Derecho'),
	(5, 'Arquitectura'),
	(6, 'Ciencias de la Educación'),
	(7, 'Contaduria'),
	(8, 'Diseño Digital'),
	(9, 'Enfermeria'),
	(10, 'Informática Administrativa'),
	(11, 'Mercadotecnia'),
	(12, 'Negocios Internacionales'),
	(13, 'Pedagogía');
/*!40000 ALTER TABLE `carrer` ENABLE KEYS */;

-- Volcando estructura para tabla u730030579_revistagcm.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_article` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_comments_article` (`id_article`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_comments_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla u730030579_revistagcm.comments: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `id_article`, `id_user`, `username`, `comment`, `created_at`) VALUES
	('1aca98', '588aff', '58dd60', 'axel01', 'Comentario de Pruebas 2', '2021-04-30 02:37:13'),
	('893dc8', '588aff', '58dd60', 'axel01', 'Comentario de Pruebas 1', '2021-04-30 02:37:06');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Volcando estructura para tabla u730030579_revistagcm.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_article` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_like`),
  KEY `id_article` (`id_article`),
  KEY `id_user` (`id_user`),
  KEY `user` (`user`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla u730030579_revistagcm.likes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id_like`, `id_article`, `id_user`, `user`, `created_at`) VALUES
	('9e398d', '588aff', '58dd60', 'axel01', '2021-05-03 00:27:53');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Volcando estructura para tabla u730030579_revistagcm.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(1) NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typepass` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla u730030579_revistagcm.rol: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id`, `rol`, `typepass`) VALUES
	(0, 'Visitante', ''),
	(1, 'Estudiante', 'GCM21'),
	(2, 'Administrador', 'ADMIN1');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla u730030579_revistagcm.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rol` int(1) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_noencrypt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrer` int(10) DEFAULT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_request` int(1) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `carrer` (`carrer`),
  KEY `rol` (`rol`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`carrer`) REFERENCES `carrer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla u730030579_revistagcm.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `rol`, `name`, `lastname`, `user`, `pass`, `pass_noencrypt`, `email`, `carrer`, `token`, `password_request`, `active`, `created_at`) VALUES
	('58dd60', 1, 'Axel', 'Roman', 'axel01', '8cb2237d0679ca88db6464eac60da96345513964', '12345', 'axelroman20@gmail.com', 1, 'af53d4aa0b9131f18f84130767ee5b1dcbcb63be', 0, 1, '2021-04-21 06:41:30'),
	('8f9842', 2, 'Admin', 'Revista', 'AdminRevista', '1351c617f92019082add5249ded0e6ad9ea1c717', 'Revista12345', 'admin@revista-gcm.live', 0, 'bd7c809d7d47026e7390ba3c6b253d24efcbe8cf', 0, 1, '2021-04-30 01:42:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
