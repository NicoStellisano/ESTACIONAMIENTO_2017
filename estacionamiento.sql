-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2017 a las 21:55:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--
CREATE DATABASE IF NOT EXISTS `estacionamiento` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `estacionamiento`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `cochera` int(11) NOT NULL,
  `patente` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ingreso` datetime NOT NULL,
  `egreso` datetime DEFAULT NULL,
  `pago` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`cochera`, `patente`, `color`, `marca`, `foto`, `ingreso`, `egreso`, `pago`) VALUES
(1, 'EOZ-428', '#80ffff', 'Fiat', 'EOZ-428.jpg', '2017-07-09 15:47:32', NULL, NULL),
(0, 'SOS-911', '#ffffff', 'Ford', 'SOS-911.jpg', '2017-07-09 15:48:01', '2017-07-09 15:49:14', 10),
(5, 'GWF-448', '#ffff00', 'Ferrari', 'GWF-448.jpg', '2017-07-09 15:48:24', NULL, NULL),
(3, 'AOX-344', '#ff80ff', 'Citroen', '', '2017-07-09 15:48:56', NULL, NULL),
(0, 'XDS-001', '#8000ff', 'Chevrolet', '', '2017-07-09 16:04:15', '2017-07-09 16:04:27', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocheras`
--

CREATE TABLE `cocheras` (
  `numero` int(11) NOT NULL,
  `auto` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `piso` int(11) NOT NULL,
  `discapacidad` tinyint(1) NOT NULL,
  `contadorUso` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cocheras`
--

INSERT INTO `cocheras` (`numero`, `auto`, `piso`, `discapacidad`, `contadorUso`) VALUES
(1, 'EOZ-428', 1, 1, 7),
(2, NULL, 1, 1, 2),
(3, 'AOX-344', 1, 1, 3),
(4, NULL, 1, 0, 3),
(5, 'GWF-448', 1, 0, 2),
(6, NULL, 1, 0, 3),
(11, NULL, 2, 0, 1),
(12, NULL, 2, 0, 0),
(13, NULL, 2, 0, 0),
(14, NULL, 2, 0, 0),
(15, NULL, 2, 0, 0),
(16, NULL, 2, 0, 0),
(21, NULL, 3, 0, 1),
(22, NULL, 3, 0, 1),
(23, NULL, 3, 0, 0),
(24, NULL, 3, 0, 0),
(25, NULL, 3, 0, 0),
(26, NULL, 3, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `contraseña` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `cantidadOp` int(11) DEFAULT '0',
  `suspendido` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`usuario`, `apellido`, `contraseña`, `admin`, `cantidadOp`, `suspendido`) VALUES
('Rodriguez1', 'Rodriguez', 'rodriguez', 0, 33, 0),
('PerezT', 'Perez', 'perez', 0, 1, 1),
('LopezN', 'Lopez', 'lop', 0, 0, 0),
('admin', 'adminApellido', 'admin', 1, 2, 0),
('NeinerVictor', 'Neiner', 'neiner', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `hora`) VALUES
('Rodriguez1', '2017-07-09 04:12:11'),
('Stellisano3458', '2017-07-09 04:12:22'),
('Stellisano3458', '2017-07-09 19:26:37'),
('admin', '2017-07-09 14:37:00'),
('Rodriguez1', '2017-07-09 14:37:36'),
('admin', '2017-07-09 15:50:20'),
('LopezN', '2017-07-09 16:05:13'),
('LopezN', '2017-07-09 16:40:29'),
('LopezN', '2017-07-09 16:49:18'),
('LopezN', '2017-07-09 16:49:32'),
('LopezN', '2017-07-09 16:49:49'),
('admin', '2017-07-09 16:50:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cocheras`
--
ALTER TABLE `cocheras`
  ADD PRIMARY KEY (`numero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
