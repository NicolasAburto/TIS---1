-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2021 a las 03:29:24
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

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`id_edificio`, `nombre_edificio`, `capacidad_maxima_edificio`) VALUES
(2, 'Educacion', 120),
(3, 'Periodismo', 50),
(4, 'Ingeniería', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `run` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cargo` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`run`, `nombre`, `cargo`) VALUES
(11, 'Nicolas Aburto', 'Alumno'),
(22, 'Camilo Fierro', 'Alumno'),
(33, 'Hugo Garces', 'Docente'),
(44, 'Alvaro Concha', 'Seguridad'),
(181460148, 'Camilo Fernando Fierro Montt', 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede`
--

CREATE TABLE `puede` (
  `run_personal` int(11) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puede`
--

INSERT INTO `puede` (`run_personal`, `id_edificio`, `fecha_ingreso`, `hora_ingreso`, `hora_salida`) VALUES
(11, 2, '2021-11-30', '22:00:00', '23:00:00'),
(22, 2, '2021-11-30', '22:00:00', '22:30:00'),
(33, 3, '2021-12-01', '10:00:00', '12:50:00'),
(44, 2, '2021-12-01', '11:20:00', '11:28:00'),
(44, 3, '2021-12-01', '11:30:00', '11:31:00'),
(44, 2, '2021-12-01', '11:32:00', '11:35:00'),
(181460148, 2, '2021-12-07', '22:53:21', '23:28:34'),
(181460148, 2, '2021-12-07', '22:53:25', '23:28:34'),
(181460148, 2, '2021-12-07', '22:54:11', '23:28:34'),
(181460148, 4, '2021-12-07', '23:28:11', '23:28:34');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edificio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
