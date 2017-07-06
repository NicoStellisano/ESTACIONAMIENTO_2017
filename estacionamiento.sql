-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2017 a las 00:59:28
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
  `foto` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ingreso` datetime NOT NULL,
  `egreso` datetime DEFAULT NULL,
  `pago` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
(1, NULL, 1, 1, 0),
(2, NULL, 1, 1, 0),
(3, NULL, 1, 1, 0),
(4, NULL, 1, 0, 0),
(5, NULL, 1, 0, 0),
(6, NULL, 1, 0, 0),
(11, NULL, 2, 0, 0),
(12, NULL, 2, 0, 0),
(13, NULL, 2, 0, 0),
(14, NULL, 2, 0, 0),
(15, NULL, 2, 0, 0),
(16, NULL, 2, 0, 0),
(21, NULL, 3, 0, 0),
(22, NULL, 3, 0, 0),
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
('Stellisano3458', 'Stellisano', 'nicolas00', 1, 0, 0),
('Rodriguez1', 'Rodriguez', 'rodriguez', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
