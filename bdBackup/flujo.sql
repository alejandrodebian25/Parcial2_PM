-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-07-2020 a las 01:28:58
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
-- Base de datos: `flujo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `codFlujo` varchar(3) DEFAULT NULL,
  `codProceso` varchar(4) DEFAULT NULL,
  `codProcesoSiguiente` varchar(4) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `codRol` varchar(4) DEFAULT NULL,
  `pantalla` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`codFlujo`, `codProceso`, `codProcesoSiguiente`, `tipo`, `codRol`, `pantalla`) VALUES
('F1', 'P1', 'P2', 'I', 'E', 'averigua.inc.php'),
('F1', 'P2', 'P3', 'P', 'E', 'listadoc.inc.php'),
('F1', 'P3', 'P4', 'P', 'E', 'presentar.inc.php'),
('F1', 'P4', NULL, 'C', 'K', 'docdia.inc.php'),
('F1', 'P5', 'P7', 'P', 'K', 'psi.inc.php'),
('F1', 'P6', 'P8', 'P', 'K', 'pno.inc.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_cond`
--

CREATE TABLE `proceso_cond` (
  `codFlujo` varchar(3) NOT NULL,
  `codProceso` varchar(4) NOT NULL,
  `codProcesoSi` varchar(4) NOT NULL,
  `codProcesoNo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proceso_cond`
--

INSERT INTO `proceso_cond` (`codFlujo`, `codProceso`, `codProcesoSi`, `codProcesoNo`) VALUES
('F1', 'P4', 'P5', 'P6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
