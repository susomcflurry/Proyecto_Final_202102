<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021

/**
 * Class Instalacion
 */
class Instalacion extends CI_Controller
{

    /**
     * Constructor Instalacion
     * Carga librerias y helpers, para después crear la bd y redirigir a Auth
     */
    function __construct()
    {
        parent::__construct();
        $this->conexion = new mysqli('localhost', 'root', '');
        $consulta = "-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-03-2021 a las 19:50:17
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

DROP DATABASE IF EXISTS `Sys_gestion_conocimiento`;
CREATE DATABASE  `Sys_gestion_conocimiento` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

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
('1.1.1.3', 'Asignatura 1º Daw', 'Asignatura 1º Daw'),
('1.1.1.4', 'Asignatura 2 1º Daw', 'Asignatura 2 1º Daw'),
('1.1.2', '2º Daw', 'Segundo del curso de desarrollo de aplicaciones web'),
('1.2', 'MEI', 'Mantenimiento de equipo industrial'),
('2', 'Bachillerato', 'Conjunto de los 2 cursos de bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` smallint(6) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
";
        $this->conexion->multi_query($consulta);
        $archivoroutes = fopen(APPPATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routes.php', "a+");
        $texto = '$route["default_controller"] = "Auth";';
        fwrite($archivoroutes, "\n");
        fwrite($archivoroutes, $texto);
        fclose($archivoroutes);
        redirect("Auth");
    }
}