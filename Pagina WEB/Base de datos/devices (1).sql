-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2020 a las 06:09:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `luciano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `ID` int(11) NOT NULL,
  `Target1` int(1) NOT NULL,
  `Target2` int(1) NOT NULL,
  `Target3` int(1) NOT NULL,
  `Slide1` int(255) NOT NULL,
  `Slide2` int(255) NOT NULL,
  `Slide3` int(255) NOT NULL,
  `Slide4` int(255) NOT NULL,
  `temp` float NOT NULL,
  `hum` float NOT NULL,
  `lux` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`ID`, `Target1`, `Target2`, `Target3`, `Slide1`, `Slide2`, `Slide3`, `Slide4`, `temp`, `hum`, `lux`) VALUES
(1, 0, 0, 0, 0, 127, 255, 50, 20.21, 30, 23);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
