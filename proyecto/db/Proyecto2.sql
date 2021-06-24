-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 23:17:22
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prog2_2021_1_t`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE `conferencias` (
  `conferencia_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `equipo_id` tinyint(3) UNSIGNED NOT NULL,
  `conferencia_id` tinyint(3) UNSIGNED NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `etiqueta_id` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`etiqueta_id`, `nombre`) VALUES
(1, 'Partido'),
(2, 'Pretemporada'),
(3, 'Playoffs'),
(4, 'Cambios'),
(5, 'Lesiones'),
(6, 'San Antonio Spurs'),
(7, 'Denver Nuggets'),
(8, 'Toronto Raptors'),
(9, 'Houston Rockets');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_tienen_noticias`
--

CREATE TABLE `etiquetas_tienen_noticias` (
  `etiqueta_id` smallint(5) UNSIGNED NOT NULL,
  `noticia_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `etiquetas_tienen_noticias`
--

INSERT INTO `etiquetas_tienen_noticias` (`etiqueta_id`, `noticia_id`) VALUES
(1, 4),
(1, 22),
(2, 19),
(3, 2),
(3, 4),
(6, 1),
(7, 4),
(8, 3),
(9, 2),
(9, 19),
(9, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `noticia_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `seccion_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `titulo` varchar(120) NOT NULL,
  `sinopsis` text NOT NULL,
  `texto` mediumtext NOT NULL,
  `fecha` datetime NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagen_descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`noticia_id`, `usuario_id`, `seccion_id`, `titulo`, `sinopsis`, `texto`, `fecha`, `imagen`, `imagen_descripcion`) VALUES
(1, 1, 1, 'Ginóbili sigue rompiendo récords', 'Emanuel \'Manu\' Ginóbili viene rompiendo algunos récords tanto de su equipo como de la liga.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolore enim et eum magni numquam omnis, quam, ratione sint soluta veritatis vero voluptatum. Accusamus accusantium ad eveniet sit vel. Laborum.', '2021-04-01 10:12:23', 'manu.jpg', 'Manu Ginóbili'),
(2, 3, 1, 'Houston Rockets lidera la conferencia', 'De la mano de James Harden, los Rockets se apuntan como candidatos para ganar los playoff.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolore enim et eum magni numquam omnis, quam, ratione sint soluta veritatis vero voluptatum. Accusamus accusantium ad eveniet sit vel. Laborum.', '2021-04-02 21:25:00', 'rockets-logo.jpg', 'Houston Rockets Logo'),
(3, 2, 1, 'Toronto Raptors queda primero en el Este', 'Los Raptors de Lowry y DeRozan se quedan con el primer lugar de su conferencia.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolore enim et eum magni numquam omnis, quam, ratione sint soluta veritatis vero voluptatum. Accusamus accusantium ad eveniet sit vel. Laborum.', '2021-04-02 22:10:12', 'raptors-logo.jpg', 'Toronto Raptors Logo'),
(4, 1, 1, 'Denver se queda corto por un partido', 'Quedó a una victoria y media de clasificar a los playoff.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolore enim et eum magni numquam omnis, quam, ratione sint soluta veritatis vero voluptatum. Accusamus accusantium ad eveniet sit vel. Laborum.', '2021-04-03 05:03:10', 'nuggets-logo.jpg', 'Denver Nuggets Logo'),
(19, 1, 2, 'Probanding secciones', 'Esperemos que todo ande :)', ':D:D', '2021-06-22 16:28:32', '20210622212832communicating.jpg', ':D:D:D'),
(21, 1, 4, 'lalala', 'lelelel', 'elltlytlyl', '2021-06-22 16:38:29', '20210622213829dog vs cat.jpg', 'dffswf'),
(22, 1, 1, 'Noticia con etiquetas', 'Debería tener las etiquetas 1 y 9 (Partido y Houston Rockets).', 'lalalala', '2021-06-22 17:32:43', '20210622223243nyamero.jpg', 'tralalal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_tienen_equipos`
--

CREATE TABLE `noticias_tienen_equipos` (
  `noticia_id` int(10) UNSIGNED NOT NULL,
  `equipo_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `seccion_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`seccion_id`, `nombre`) VALUES
(1, 'General'),
(2, 'Intercambios'),
(3, 'Partidos'),
(4, 'Post-temporada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `password`, `nombre`, `apellido`) VALUES
(1, 'sara@za.com', '$2y$10$eR4xRG6GdJ2XHnoAFdMjCe2IsSNvoEPm/FVJaLmL5upwh8krob99a', 'Sara', 'Za'),
(2, 'pepe@trueno.com', '$2y$10$eR4xRG6GdJ2XHnoAFdMjCe2IsSNvoEPm/FVJaLmL5upwh8krob99a', NULL, NULL),
(3, 'admin@admin.com', '$2y$10$eR4xRG6GdJ2XHnoAFdMjCe2IsSNvoEPm/FVJaLmL5upwh8krob99a', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  ADD PRIMARY KEY (`conferencia_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`equipo_id`),
  ADD KEY `fk_equipos_conferencias1_idx` (`conferencia_id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`etiqueta_id`);

--
-- Indices de la tabla `etiquetas_tienen_noticias`
--
ALTER TABLE `etiquetas_tienen_noticias`
  ADD PRIMARY KEY (`etiqueta_id`,`noticia_id`),
  ADD KEY `fk_etiquetas_tienen_noticias_noticias1_idx` (`noticia_id`),
  ADD KEY `fk_etiquetas_tienen_noticias_etiquetas1_idx` (`etiqueta_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `fk_noticias_usuarios1_idx` (`usuario_id`),
  ADD KEY `fk_noticias_secciones1_idx` (`seccion_id`);

--
-- Indices de la tabla `noticias_tienen_equipos`
--
ALTER TABLE `noticias_tienen_equipos`
  ADD PRIMARY KEY (`noticia_id`,`equipo_id`),
  ADD KEY `fk_noticias_tienen_equipos_equipos1_idx` (`equipo_id`),
  ADD KEY `fk_noticias_tienen_equipos_noticias1_idx` (`noticia_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`seccion_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  MODIFY `conferencia_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `equipo_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `etiqueta_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noticia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `seccion_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_equipos_conferencias1` FOREIGN KEY (`conferencia_id`) REFERENCES `conferencias` (`conferencia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `etiquetas_tienen_noticias`
--
ALTER TABLE `etiquetas_tienen_noticias`
  ADD CONSTRAINT `fk_etiquetas_tienen_noticias_etiquetas1` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`etiqueta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etiquetas_tienen_noticias_noticias1` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`noticia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_secciones1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticias_tienen_equipos`
--
ALTER TABLE `noticias_tienen_equipos`
  ADD CONSTRAINT `fk_noticias_tienen_equipos_equipos1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_tienen_equipos_noticias1` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`noticia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
