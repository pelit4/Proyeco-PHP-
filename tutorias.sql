-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2024 a las 18:55:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutorias`
--
CREATE DATABASE IF NOT EXISTS `tutorias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tutorias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tutoria`
--

CREATE TABLE `t_tutoria` (
  `idtutoria` int(11) NOT NULL,
  `alumno` varchar(40) NOT NULL,
  `profesor` varchar(40) NOT NULL,
  `diasemana` varchar(40) NOT NULL,
  `hora` int(2) NOT NULL,
  `asunto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_tutoria`
--
ALTER TABLE `t_tutoria`
  ADD PRIMARY KEY (`idtutoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_tutoria`
--
ALTER TABLE `t_tutoria`
  MODIFY `idtutoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
