-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2019 a las 02:20:39
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_inventario_bd`
--
CREATE DATABASE IF NOT EXISTS `sistema_inventario_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sistema_inventario_bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitadmin`
--

DROP TABLE IF EXISTS `bitadmin`;
CREATE TABLE `bitadmin` (
  `id` int(11) NOT NULL,
  `dias` varchar(200) NOT NULL,
  `entrada` varchar(200) NOT NULL,
  `activ` text,
  `salida` varchar(200) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitadmin`
--

INSERT INTO `bitadmin` (`id`, `dias`, `entrada`, `activ`, `salida`, `time`) VALUES
(1, '2019-05-02', '12:00', NULL, NULL, '2019-05-08 18:44:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bituser`
--

DROP TABLE IF EXISTS `bituser`;
CREATE TABLE `bituser` (
  `id` int(11) NOT NULL,
  `dias` varchar(200) NOT NULL,
  `entrada` varchar(200) NOT NULL,
  `activ` text,
  `salida` varchar(200) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consult`
--

DROP TABLE IF EXISTS `consult`;
CREATE TABLE `consult` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `age` int(11) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `period` varchar(500) NOT NULL,
  `turn` varchar(255) NOT NULL,
  `enroll` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

DROP TABLE IF EXISTS `dispositivos`;
CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `disp` varchar(500) NOT NULL,
  `ip` varchar(500) NOT NULL,
  `mac` varchar(500) NOT NULL,
  `model` varchar(200) NOT NULL,
  `marc` varchar(500) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `age` int(11) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `enroll` varchar(50) NOT NULL,
  `period` varchar(500) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `turn` varchar(255) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keyboard`
--

DROP TABLE IF EXISTS `keyboard`;
CREATE TABLE `keyboard` (
  `id` int(11) NOT NULL,
  `serials` varchar(500) NOT NULL,
  `marc` varchar(500) NOT NULL,
  `model` varchar(200) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `clave`) VALUES
(1, 'Toni Rosales', '$2y$10$P/RtaICxqLEwduxzIelRl.cX6NTOTwgoLkrizLONhirgSDxvt.YIm'),
(2, 'Luis David', '$2y$10$rxj4yfn6DUp/DH59ccgJkuXqyp/yDSbyJy7NHU3pPvB2kZqQbMQ4a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

DROP TABLE IF EXISTS `monitor`;
CREATE TABLE `monitor` (
  `id` int(11) NOT NULL,
  `serials` varchar(500) NOT NULL,
  `marc` varchar(500) NOT NULL,
  `model` varchar(200) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mouse`
--

DROP TABLE IF EXISTS `mouse`;
CREATE TABLE `mouse` (
  `id` int(11) NOT NULL,
  `serials` varchar(500) NOT NULL,
  `marc` varchar(500) NOT NULL,
  `model` varchar(200) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc`
--

DROP TABLE IF EXISTS `pc`;
CREATE TABLE `pc` (
  `id` int(11) NOT NULL,
  `claver` varchar(500) NOT NULL,
  `ip` varchar(500) NOT NULL,
  `mac` varchar(500) NOT NULL,
  `model` varchar(200) NOT NULL,
  `marc` varchar(500) NOT NULL,
  `so` varchar(500) NOT NULL,
  `express` varchar(500) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `equipo` varchar(500) NOT NULL,
  `claser` varchar(500) NOT NULL,
  `ip` varchar(500) DEFAULT NULL,
  `mac` varchar(500) DEFAULT NULL,
  `marc` varchar(500) NOT NULL,
  `model` varchar(200) NOT NULL,
  `describ` varchar(900) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitadmin`
--
ALTER TABLE `bitadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bituser`
--
ALTER TABLE `bituser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `keyboard`
--
ALTER TABLE `keyboard`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitadmin`
--
ALTER TABLE `bitadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bituser`
--
ALTER TABLE `bituser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consult`
--
ALTER TABLE `consult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `keyboard`
--
ALTER TABLE `keyboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mouse`
--
ALTER TABLE `mouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
