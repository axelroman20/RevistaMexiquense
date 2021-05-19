-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2021 a las 05:41:49
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u730030579_revistagcm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrer`
--

CREATE TABLE `carrer` (
  `id` int(10) NOT NULL,
  `carrer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrer`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_article` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_article` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(1) NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typepass` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`, `typepass`) VALUES
(0, 'Visitante', ''),
(1, 'Estudiante', 'GCM21'),
(2, 'Administrador', 'ADMIN1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol`, `name`, `lastname`, `user`, `pass`, `pass_noencrypt`, `email`, `carrer`, `token`, `password_request`, `active`, `created_at`) VALUES
('58dd60', 1, 'Axel', 'Roman', 'axel01', '8cb2237d0679ca88db6464eac60da96345513964', '12345', 'axelroman20@gmail.com', 1, 'af53d4aa0b9131f18f84130767ee5b1dcbcb63be', 0, 1, '2021-04-21 11:41:30'),
('8f9842', 2, 'Admin', 'Revista', 'AdminRevista', '1351c617f92019082add5249ded0e6ad9ea1c717', 'Revista12345', 'admin@revista-gcm.live', 0, 'bd7c809d7d47026e7390ba3c6b253d24efcbe8cf', 0, 1, '2021-04-30 06:42:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `views`
--

CREATE TABLE `views` (
  `id_view` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_article` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `carrer` (`carrer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `carrer`
--
ALTER TABLE `carrer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_article` (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `carrer` (`carrer`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id_view`),
  ADD KEY `id_article` (`id_article`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`carrer`) REFERENCES `users` (`carrer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`carrer`) REFERENCES `carrer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
