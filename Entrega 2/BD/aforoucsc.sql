-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 02:22:28
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
-- Base de datos: `aforoucsc2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede`
--

CREATE TABLE `puede` (
  `run_personal` int(11) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puede`
--

INSERT INTO `puede` (`run_personal`, `id_edificio`, `fecha_ingreso`, `hora_ingreso`, `hora_salida`) VALUES
(11, 2, '2021-11-30', '22:00:00', '23:00:00'),
(22, 2, '2021-11-30', '22:00:00', '22:30:00');

--
-- Índices para tablas volcadas
--

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
