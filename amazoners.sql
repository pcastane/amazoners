-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 09-05-2018 a les 19:08:18
-- Versió del servidor: 10.1.26-MariaDB
-- Versió de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `amazoners`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(5) NOT NULL,
  `id_tipo_prod` int(11) NOT NULL,
  `nombre_categoria` varchar(30) COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `gestiona`
--

CREATE TABLE `gestiona` (
  `id_usuario_gestiona` int(5) NOT NULL,
  `id_producto_gestiona` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(50) NOT NULL,
  `url_imagen` varchar(50) COLLATE ucs2_spanish_ci NOT NULL,
  `id_producto_img` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL,
  `id_tipo_prod` int(11) NOT NULL,
  `id_tipo_cat` int(11) NOT NULL,
  `nombre_producto` varchar(50) COLLATE ucs2_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE ucs2_spanish_ci NOT NULL,
  `num_habitaciones` int(4) DEFAULT NULL,
  `precio` decimal(6,0) NOT NULL,
  `comidas` tinyint(1) NOT NULL DEFAULT '0',
  `piscina` tinyint(1) NOT NULL DEFAULT '0',
  `wifi` tinyint(1) NOT NULL DEFAULT '0',
  `parking` tinyint(1) NOT NULL DEFAULT '0',
  `mascotas` tinyint(1) NOT NULL DEFAULT '0',
  `duración` decimal(10,0) NOT NULL,
  `edad_min` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(30) COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `nombre_apellidos` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `num_valoraciones` int(5) NOT NULL,
  `novato` tinyint(1) NOT NULL DEFAULT '1',
  `experto` tinyint(1) NOT NULL DEFAULT '0',
  `profesional` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `valora`
--

CREATE TABLE `valora` (
  `id_usuario_valora` int(5) NOT NULL,
  `id_producto_valora` int(5) NOT NULL,
  `estrellas` enum('1','2','3','4','5') COLLATE ucs2_spanish_ci DEFAULT NULL,
  `valoracion` longtext COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `categoria`
--
ALTER TABLE `categoria`
  ADD KEY `id_producto_categoria` (`id_categoria`),
  ADD KEY `tipo_producto_categoria` (`id_tipo_prod`);

--
-- Index de la taula `gestiona`
--
ALTER TABLE `gestiona`
  ADD KEY `if_usuario_gestiona` (`id_usuario_gestiona`),
  ADD KEY `id_producto_gestiona` (`id_producto_gestiona`);

--
-- Index de la taula `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_producto_img` (`id_producto_img`);

--
-- Index de la taula `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_tipo_prod` (`id_tipo_prod`),
  ADD KEY `id_tipo_cat` (`id_tipo_cat`);

--
-- Index de la taula `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD KEY `id_producto_tipo` (`id_tipo`);

--
-- Index de la taula `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `valora`
--
ALTER TABLE `valora`
  ADD KEY `id_usuario_valora` (`id_usuario_valora`),
  ADD KEY `id_producto_valora` (`id_producto_valora`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `producto` (`id_tipo_cat`),
  ADD CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`id_tipo_prod`) REFERENCES `tipo_producto` (`id_tipo`);

--
-- Restriccions per la taula `gestiona`
--
ALTER TABLE `gestiona`
  ADD CONSTRAINT `gestiona_ibfk_2` FOREIGN KEY (`id_producto_gestiona`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `gestiona_ibfk_3` FOREIGN KEY (`id_usuario_gestiona`) REFERENCES `usuario` (`id`);

--
-- Restriccions per la taula `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_producto_img`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per la taula `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD CONSTRAINT `tipo_producto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `producto` (`id_tipo_prod`);

--
-- Restriccions per la taula `valora`
--
ALTER TABLE `valora`
  ADD CONSTRAINT `valora_ibfk_1` FOREIGN KEY (`id_usuario_valora`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `valora_ibfk_2` FOREIGN KEY (`id_producto_valora`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
