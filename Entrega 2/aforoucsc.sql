-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 15:31:59
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aforoucsc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `id_edificio` int(5) NOT NULL,
  `nombre_edificio` varchar(30) NOT NULL,
  `capacidad_maxima_edificio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `run` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cargo` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede`
--

CREATE TABLE `puede` (
  `run_personal` int(11) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  `cantidad_maxima_edificio` int(11) NOT NULL,
  `cantidad_minima_edificio` int(11) NOT NULL,
  `tiempo_cant_minima` time NOT NULL,
  `tiempo_cant_maxima` time NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`id_edificio`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`run`);

--
-- Indices de la tabla `puede`
--
ALTER TABLE `puede`
  ADD KEY `fk_run_personal` (`run_personal`),
  ADD KEY `fk_id_edificio` (`id_edificio`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puede`
--
ALTER TABLE `puede`
  ADD CONSTRAINT `fk_id_edificio` FOREIGN KEY (`id_edificio`) REFERENCES `edificio` (`id_edificio`),
  ADD CONSTRAINT `fk_run_personal` FOREIGN KEY (`run_personal`) REFERENCES `personal` (`run`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
