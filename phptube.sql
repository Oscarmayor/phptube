-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2019 a las 16:09:59
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phptube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usuarios_email` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `usuarios_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_password` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `usuarios_ip` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `usuarios_login` timestamp NULL DEFAULT NULL,
  `usuarios_nombre` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `usuarios_img` varchar(250) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_email`, `usuarios_fecha`, `usuarios_password`, `usuarios_ip`, `usuarios_login`, `usuarios_nombre`, `usuarios_img`) VALUES
(5, 'oo@hotmail.com', '2019-02-14 15:22:57', 'a7d579ba76398070eae654c30ff153a4c273272a', '::1', '2019-02-16 02:29:55', 'Oscar Mayor Jaramillo', 'archivos/hqRMHITj_400x400.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `videos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `videos_url` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `videos_usuario_id` int(6) NOT NULL,
  `videos_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`videos_fecha`, `videos_url`, `videos_usuario_id`, `videos_id`) VALUES
('2019-02-15 21:45:00', 'videos/videoplayback.mp4', 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
