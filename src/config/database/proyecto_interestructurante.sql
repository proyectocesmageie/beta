-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2025 a las 21:08:59
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
-- Base de datos: `proyecto_interestructurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `estrellas` int(11) DEFAULT NULL CHECK (`estrellas` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioforo`
--

CREATE TABLE `comentarioforo` (
  `id_comentario` int(11) NOT NULL,
  `contenido` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_foro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_foro` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveljuego`
--

CREATE TABLE `niveljuego` (
  `id_nivel` int(11) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `contenido_relacionado` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursoeducativo`
--

CREATE TABLE `recursoeducativo` (
  `id_recurso` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo` enum('artículo','video','infografía') DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadojuego`
--

CREATE TABLE `resultadojuego` (
  `id_resultado` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_recurso` (`id_recurso`);

--
-- Indices de la tabla `comentarioforo`
--
ALTER TABLE `comentarioforo`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_foro` (`id_foro`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_foro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `niveljuego`
--
ALTER TABLE `niveljuego`
  ADD PRIMARY KEY (`id_nivel`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `recursoeducativo`
--
ALTER TABLE `recursoeducativo`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `resultadojuego`
--
ALTER TABLE `resultadojuego`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarioforo`
--
ALTER TABLE `comentarioforo`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_foro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `niveljuego`
--
ALTER TABLE `niveljuego`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursoeducativo`
--
ALTER TABLE `recursoeducativo`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultadojuego`
--
ALTER TABLE `resultadojuego`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_recurso`) REFERENCES `recursoeducativo` (`id_recurso`);

--
-- Filtros para la tabla `comentarioforo`
--
ALTER TABLE `comentarioforo`
  ADD CONSTRAINT `comentarioforo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentarioforo_ibfk_2` FOREIGN KEY (`id_foro`) REFERENCES `foro` (`id_foro`);

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `niveljuego`
--
ALTER TABLE `niveljuego`
  ADD CONSTRAINT `niveljuego_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`);

--
-- Filtros para la tabla `resultadojuego`
--
ALTER TABLE `resultadojuego`
  ADD CONSTRAINT `resultadojuego_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `resultadojuego_ibfk_2` FOREIGN KEY (`id_nivel`) REFERENCES `niveljuego` (`id_nivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
