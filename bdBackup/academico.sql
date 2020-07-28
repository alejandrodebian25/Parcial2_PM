-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-07-2020 a las 01:31:44
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `cedula` varchar(2) DEFAULT NULL,
  `matricula` varchar(2) DEFAULT NULL,
  `pago` varchar(2) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `ci`, `nombres`, `apellidos`, `cedula`, `matricula`, `pago`, `fecha`) VALUES
(1, 6945027, 'Ale', 'q', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(2, 694502, 'pepe', 'q', NULL, NULL, NULL, '2020-07-27 22:34:07'),
(3, 6945027, 'Ale', 'Flores', NULL, NULL, NULL, '2020-07-27 22:35:26'),
(4, 0, '', '', NULL, NULL, NULL, '2020-07-27 22:36:18'),
(5, 6945027, 'Juan', 'Miranda', NULL, NULL, NULL, '2020-07-27 22:48:55'),
(6, 6945027, 'pepe', 'Miranda', NULL, NULL, NULL, '2020-07-27 22:50:03'),
(7, 6945027, 'Ale', 'Flores', NULL, NULL, NULL, '2020-07-27 22:51:59'),
(8, 6945027, 'Ale', 'q', NULL, NULL, NULL, '2020-07-27 22:52:30'),
(9, 6945027, 'Juan', 'q', NULL, NULL, NULL, '2020-07-27 22:53:27'),
(10, 121212, 'pepe', 'q', NULL, NULL, NULL, '2020-07-27 22:54:06'),
(11, 6945027, 'Ale', 'Reas', '', NULL, NULL, '2020-07-27 22:55:37'),
(12, 0, '', '', NULL, NULL, NULL, '2020-07-27 23:26:26'),
(13, 0, '', '', 'si', NULL, NULL, '2020-07-27 23:26:28'),
(14, 0, '', '', 'si', NULL, NULL, '2020-07-27 23:28:29'),
(15, 0, '', '', NULL, NULL, NULL, '2020-07-27 23:37:28'),
(16, 131313, 'Maria', 'Ramos', 'si', 'si', 'no', '2020-07-27 23:37:48'),
(17, 6945027, 'pepe', 'Flores', 'si', 'si', 'no', '2020-07-28 00:45:30'),
(18, 6945027, 'Alejandro', 'Quea', 'si', 'si', 'no', '2020-07-28 01:11:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `codRol` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `clave`, `codRol`) VALUES
(1, 6945027, '123456', 'E'),
(2, 121212, '222222', 'E'),
(3, 131313, '333333', 'K'),
(4, 141414, '444444', 'E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
