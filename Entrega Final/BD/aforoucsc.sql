-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2021 a las 01:59:11
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
-- Estructura Stand-in para la vista `aforo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `aforo` (
`actual` bigint(21)
,`id_edificio` int(11)
);

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
(4, 'Ingenieria', 30),
(5, 'Edificio Central', 100),
(6, 'Facea', 40),
(7, 'Ciencias', 50),
(8, 'Sociales', 70),
(9, 'Derecho', 60),
(10, 'Teologia', 25),
(11, 'Medicina', 60),
(12, 'Casino', 25),
(13, 'Gestion Financiera', 20),
(14, 'Biblioteca', 200),
(15, 'Gimnasio', 150);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `envivo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `envivo` (
`id_edificio` int(5)
,`nombre_edificio` varchar(30)
,`capacidad_maxima_edificio` int(6)
,`actual` bigint(21)
,`porcentaje` decimal(27,4)
);

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
(22, 'Francisco Salazar', 'Alumno'),
(33, 'Hugo Garces', 'Docente'),
(44, 'Alvaro Concha', 'Seguridad'),
(55, 'Nicole Aravena', 'Administrativo'),
(66, 'José Avilán', 'Alumno'),
(77, 'Fabian Espinoza', 'Mantencion'),
(88, 'German Meneses', 'Auxiliar aseo'),
(99, 'Lorenzo Paredes', 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede`
--

CREATE TABLE `puede` (
  `run_personal` int(11) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `id_ingreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puede`
--

INSERT INTO `puede` (`run_personal`, `id_edificio`, `fecha_ingreso`, `hora_ingreso`, `hora_salida`, `id_ingreso`) VALUES
(11, 2, '2021-11-30', '22:00:00', '23:00:00', 1),
(22, 2, '2021-11-30', '22:00:00', '22:30:00', 2),
(33, 3, '2021-12-01', '10:00:00', '12:50:00', 3),
(44, 2, '2021-12-01', '11:20:00', '11:28:00', 4),
(44, 3, '2021-12-01', '11:30:00', '11:31:00', 5),
(44, 2, '2021-12-01', '11:32:00', '11:35:00', 6),
(44, 2, '2021-12-02', '22:40:00', '22:45:00', 7),
(11, 2, '2021-12-09', '19:15:00', '19:25:00', 8),
(11, 2, '2021-12-09', '19:25:00', '20:00:00', 9),
(44, 3, '2021-12-09', '19:26:00', '19:58:00', 10),
(11, 2, '2021-12-14', '11:28:00', '11:50:00', 11),
(11, 2, '2021-12-15', '18:50:00', '19:00:00', 12),
(44, 3, '2021-12-15', '18:50:00', '19:15:00', 13),
(11, 2, '2021-12-15', '19:04:00', '19:50:00', 14),
(33, 3, '2021-12-15', '18:59:00', '19:30:00', 15),
(22, 2, '2021-12-15', '19:24:00', '19:31:00', 16),
(44, 3, '2021-12-15', '19:25:00', '19:35:00', 17),
(11, 2, '2021-12-15', '19:50:00', '20:00:00', 18),
(22, 2, '2021-12-15', '19:50:00', '20:00:00', 19),
(33, 3, '2021-12-15', '19:50:00', '19:55:00', 20),
(44, 3, '2021-12-15', '19:50:00', '20:01:00', 21),
(11, 2, '2021-12-16', '12:03:00', '15:11:00', 22),
(22, 3, '2021-12-16', '12:04:00', '15:12:00', 23),
(33, 3, '2021-12-16', '11:33:00', '16:13:00', 24),
(44, 3, '2021-12-16', '10:25:00', '13:15:00', 25),
(55, 2, '2021-12-16', '12:20:00', '12:55:00', 26),
(55, 3, '2021-12-17', '13:53:39', '13:56:41', 30),
(55, 3, '2021-12-17', '15:02:31', '15:03:01', 39),
(55, 2, '2021-12-17', '23:06:20', '23:06:57', 41),
(44, 3, '2021-12-17', '23:06:26', '23:07:07', 42),
(33, 3, '2021-12-17', '23:39:36', '23:59:59', 43),
(33, 3, '2021-12-18', '00:01:28', '00:29:18', 44),
(22, 3, '2021-12-18', '00:32:22', '00:32:41', 45),
(11, 3, '2021-12-18', '12:02:12', '12:02:41', 46),
(33, 3, '2021-12-18', '18:49:27', '18:50:06', 47),
(11, 2, '2021-12-18', '21:54:49', '21:55:28', 48),
(11, 3, '2021-12-19', '14:18:53', '17:12:58', 49),
(22, 3, '2021-12-19', '14:29:58', '14:31:42', 50),
(22, 2, '2021-12-19', '14:31:56', '17:50:26', 51),
(33, 3, '2021-12-19', '15:32:55', '17:31:14', 52),
(44, 4, '2021-12-19', '15:54:03', '16:44:32', 53),
(44, 3, '2021-12-19', '16:46:23', '16:47:30', 54),
(44, 4, '2021-12-19', '16:47:43', '17:11:36', 55),
(55, 4, '2021-12-19', '17:16:06', '17:16:18', 57),
(55, 4, '2021-12-19', '17:17:02', '17:25:05', 58),
(33, 3, '2021-12-19', '17:31:55', '17:38:46', 59),
(11, 4, '2021-12-19', '17:32:02', '17:32:25', 60),
(33, 3, '2021-12-19', '17:39:05', '17:50:06', 61),
(55, 4, '2021-12-19', '17:39:11', '17:49:44', 62),
(11, 4, '2021-12-19', '17:39:16', '17:49:57', 63),
(44, 5, '2021-12-19', '17:41:39', '17:49:32', 64),
(11, 5, '2021-12-19', '18:30:17', '19:04:17', 65),
(11, 2, '2021-12-22', '10:39:55', '13:24:59', 69),
(22, 4, '2021-12-22', '12:49:49', '13:26:06', 70),
(11, 2, '2021-12-22', '15:49:07', '18:45:56', 71),
(11, 2, '2021-12-22', '18:51:53', '18:52:08', 72);

-- --------------------------------------------------------

--
-- Estructura para la vista `aforo`
--
DROP TABLE IF EXISTS `aforo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aforo`  AS SELECT count(`puede`.`run_personal`) AS `actual`, `puede`.`id_edificio` AS `id_edificio` FROM `puede` WHERE `puede`.`fecha_ingreso` = curdate() AND `puede`.`hora_ingreso` < curtime() AND `puede`.`hora_salida` > curtime() GROUP BY `puede`.`id_edificio` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `envivo`
--
DROP TABLE IF EXISTS `envivo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `envivo`  AS SELECT `edificio`.`id_edificio` AS `id_edificio`, `edificio`.`nombre_edificio` AS `nombre_edificio`, `edificio`.`capacidad_maxima_edificio` AS `capacidad_maxima_edificio`, `aforo`.`actual` AS `actual`, `aforo`.`actual`* 100 / `edificio`.`capacidad_maxima_edificio` AS `porcentaje` FROM (`edificio` join `aforo`) WHERE `edificio`.`id_edificio` = `aforo`.`id_edificio` ;

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
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `fk_run_personal` (`run_personal`),
  ADD KEY `fk_id_edificio` (`id_edificio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edificio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `puede`
--
ALTER TABLE `puede`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
