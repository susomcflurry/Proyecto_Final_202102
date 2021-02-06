-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-02-2021 a las 18:15:29
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Sys_gestion_conocimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Recurso`
--

CREATE TABLE `Recurso` (
  `id` smallint(6) NOT NULL,
  `título` varchar(100) NOT NULL,
  `descripción` varchar(500) NOT NULL,
  `url` varchar(110) NOT NULL,
  `id_tesauro` varchar(50) NOT NULL,
  `id_usuario` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tesauro`
--

CREATE TABLE `Tesauro` (
  `id` varchar(50) NOT NULL,
  `título` varchar(100) NOT NULL,
  `descripción` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tesauro`
--

INSERT INTO `Tesauro` (`id`, `título`, `descripción`) VALUES
('1', 'Grados de formación superior', 'Conjunto de cursos de grado superior'),
('1.1', 'Daw', 'Desarrollo de aplicaciones web'),
('1.1.1', '1º Daw', 'Primero del curso de desarrollo de aplicaciones web'),
('1.1.1.1', 'BBDD 1ºDAW', 'Asignatura de bases de datos de primero de daw'),
('1.1.1.2', 'IP 1ºDAW', 'Asignatura de introducción a la programación en primero de daw'),
('1.1.2', '2º Daw', 'Segundo del curso de desarrollo de aplicaciones web'),
('1.2', 'MEI', 'Mantenimiento de equipo industrial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` smallint(6) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `correo`, `nombre`, `tipo`) VALUES
(7, 'jcangagalvan.guadalupe@alumnado.fundacionloyola.net', 'Jes�s Canga Galv�n', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Recurso`
--
ALTER TABLE `Recurso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Título` (`título`),
  ADD KEY `Fk_recurso_usuario` (`id_usuario`),
  ADD KEY `Fk_recurso_tesauro` (`id_tesauro`);

--
-- Indices de la tabla `Tesauro`
--
ALTER TABLE `Tesauro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Título` (`título`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Recurso`
--
ALTER TABLE `Recurso`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Recurso`
--
ALTER TABLE `Recurso`
  ADD CONSTRAINT `Fk_recurso_tesauro` FOREIGN KEY (`id_tesauro`) REFERENCES `Tesauro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_recurso_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
