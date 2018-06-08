-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 08-06-2018 a les 21:32:37
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
DROP SCHEMA IF EXISTS amazoners;
CREATE DATABASE IF NOT EXISTS `amazoners` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `amazoners`;

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(5) NOT NULL,
  `id_tipo_prod` int(11) NOT NULL,
  `nombre_categoria` varchar(30) COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `id_tipo_prod`, `nombre_categoria`) VALUES
(1, 1, 'SIN CATEGORIA'),
(2, 2, 'SIN CATEGORIA'),
(3, 1, 'Precio Alto'),
(4, 1, 'Precio Medio'),
(5, 1, 'Low Cost'),
(6, 2, 'Familiar'),
(7, 2, 'Individual'),
(8, 2, 'Deportiva'),
(9, 1, 'Restaurante Gourmet');

-- --------------------------------------------------------

--
-- Estructura de la taula `gestiona`
--

CREATE TABLE `gestiona` (
  `id_usuario_gestiona` int(5) NOT NULL,
  `id_producto_gestiona` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `gestiona`
--

INSERT INTO `gestiona` (`id_usuario_gestiona`, `id_producto_gestiona`) VALUES
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Estructura de la taula `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(10) NOT NULL,
  `url_imagen` varchar(50) COLLATE ucs2_spanish_ci NOT NULL,
  `id_producto_img` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `url_imagen`, `id_producto_img`) VALUES
(3, 'img/123123.jpg', 1),
(4, 'img/puenting.jpg', 2),
(5, 'img/5555.jpg', 3),
(6, 'img/121212.jpg', 4),
(7, 'img/2016.jpg', 5),
(8, 'img/454545.jpg', 6),
(9, 'img/4512.jpg', 7),
(10, 'img/foto2.jpg', 7),
(11, 'img/5614.jpg', 8);

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
  `telefono` varchar(10) COLLATE ucs2_spanish_ci NOT NULL,
  `num_habitaciones` varchar(4) COLLATE ucs2_spanish_ci DEFAULT NULL,
  `precio` varchar(6) COLLATE ucs2_spanish_ci NOT NULL,
  `comidas` tinyint(1) NOT NULL DEFAULT '0',
  `piscina` tinyint(1) NOT NULL DEFAULT '0',
  `wifi` tinyint(1) NOT NULL DEFAULT '0',
  `parking` tinyint(1) NOT NULL DEFAULT '0',
  `mascotas` tinyint(1) NOT NULL DEFAULT '0',
  `duracion` varchar(20) COLLATE ucs2_spanish_ci NOT NULL,
  `edad_min` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `ranking` int(10) NOT NULL DEFAULT '0',
  `borrado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `producto`
--

INSERT INTO `producto` (`id_producto`, `id_tipo_prod`, `id_tipo_cat`, `nombre_producto`, `direccion`, `telefono`, `num_habitaciones`, `precio`, `comidas`, `piscina`, `wifi`, `parking`, `mascotas`, `duracion`, `edad_min`, `activo`, `ranking`, `borrado`) VALUES
(1, 1, 3, 'Casa La Granja', 'plaza 3, Gerona', '972111111', '15', '150', 1, 1, 1, 0, 0, '0', 0, 1, 4, 0),
(2, 2, 7, 'Puenting', 'Carretera 5, Lleida', '973555555', NULL, '70', 0, 0, 0, 0, 0, '30 min', 18, 1, 2, 0),
(3, 1, 4, 'Casa Php Nightmare', 'TURULL, 174 1-2', '666778899', '15', '50', 0, 1, 1, 1, 1, '0', 0, 1, 2, 0),
(4, 2, 6, 'Rafting', 'Llavorsí', '9726565656', NULL, '200', 0, 0, 0, 0, 0, '2 horas', 15, 1, 4, 0),
(5, 2, 8, 'Submarinismo', 'La playa 5, Blanes', '666778899', NULL, '150', 0, 0, 0, 0, 0, '1hora', 15, 1, 5, 0),
(6, 1, 5, 'Casa Jacinto', 'Rialp', '666778899', '12', '25', 1, 1, 1, 1, 1, '0', 0, 1, 4, 0),
(7, 1, 4, 'CASA TARRADELLAS', 'Rambla 5, Girona', '666783364', '12', '50', 1, 1, 1, 1, 1, '0', 0, 1, 5, 0),
(8, 1, 9, 'Casa Gourmet', 'SABADELL', '666778899', '3', '50', 1, 1, 1, 1, 1, '0', 0, 1, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(30) COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'casa'),
(2, 'experiencia');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `usuario` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE ucs2_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `num_valoraciones` int(5) NOT NULL,
  `novato` tinyint(1) NOT NULL DEFAULT '1',
  `experto` tinyint(1) NOT NULL DEFAULT '0',
  `profesional` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `apellidos`, `email`, `password`, `fecha_alta`, `num_valoraciones`, `novato`, `experto`, `profesional`, `activo`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', 'admin', '2018-06-01', 2, 1, 0, 0, 1, 1),
(4, 'Pau', 'Pau', 'Castañé', 'pau@pau.com', 'p', '2018-06-07', 10, 1, 0, 0, 1, 0),
(5, 'Ballester', 'david', 'ballester', 'dballesterv@fp.uoc.edu', 'davidballester', '2018-06-07', 0, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `valora`
--

CREATE TABLE `valora` (
  `id_usuario_valora` int(5) NOT NULL,
  `id_producto_valora` int(5) NOT NULL,
  `estrellas` int(1) DEFAULT NULL,
  `valoracion` longtext COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Bolcant dades de la taula `valora`
--

INSERT INTO `valora` (`id_usuario_valora`, `id_producto_valora`, `estrellas`, `valoracion`) VALUES
(4, 1, 4, 'Muy recomendable, buena comida, buenas vistas!'),
(4, 3, 2, 'Buf menuda casa, había PHP por todos lados!!'),
(4, 2, 2, 'Menudo susto, no vuelvo!'),
(4, 4, 4, 'Lo pasamos super bien ! Repetiremos!!'),
(4, 5, 5, 'Ha sido lo más impactante que he hecho!'),
(4, 6, 4, 'No esta nada mal, sobretodo la comida, vale la pena!!'),
(1, 7, 5, 'Fenomenal, una gran casa, la comida genial!!'),
(4, 1, 4, 'Muy bien la verdad, volveremos seguro.'),
(1, 8, 4, 'Restaurante bien si, pero no es para tanto.'),
(4, 7, 3, 'Bastante bien, un poco cara par alo que es.'),
(4, 7, 5, 'Realmente genial, vale la pena pagar lo que piden.');

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
  ADD PRIMARY KEY (`id_imagen`);

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
-- AUTO_INCREMENT per la taula `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la taula `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la taula `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la taula `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`id_tipo_prod`) REFERENCES `tipo_producto` (`id_tipo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restriccions per la taula `gestiona`
--
ALTER TABLE `gestiona`
  ADD CONSTRAINT `gestiona_ibfk_2` FOREIGN KEY (`id_producto_gestiona`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestiona_ibfk_3` FOREIGN KEY (`id_usuario_gestiona`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restriccions per la taula `valora`
--
ALTER TABLE `valora`
  ADD CONSTRAINT `valora_ibfk_1` FOREIGN KEY (`id_usuario_valora`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `valora_ibfk_2` FOREIGN KEY (`id_producto_valora`) REFERENCES `producto` (`id_producto`);
--
-- Base de dades: `dawtelegraph`
--
CREATE DATABASE IF NOT EXISTS `dawtelegraph` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dawtelegraph`;

-- --------------------------------------------------------

--
-- Estructura de la taula `noticias`
--

CREATE TABLE `noticias` (
  `idnoticias` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `subtitulo` varchar(45) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `cuerpo_noticia` longtext,
  `imagen` varchar(45) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `seccion_idseccion` varchar(16) NOT NULL,
  `usuarios_username` varchar(9) NOT NULL,
  `usuarios_username1` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `palabras_clave`
--

CREATE TABLE `palabras_clave` (
  `palabras_clave` varchar(45) NOT NULL,
  `noticias_idnoticias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `seccion`
--

CREATE TABLE `seccion` (
  `idseccion` varchar(16) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `idtipo_usuarios` int(11) NOT NULL,
  `tipo_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `aprellido2` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `telefono` int(9) NOT NULL,
  `password` varchar(8) NOT NULL,
  `admitido` enum('Si','No') NOT NULL,
  `tipousuarios_idtipo_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticias`,`seccion_idseccion`,`usuarios_username`,`usuarios_username1`),
  ADD KEY `fk_noticias_usuarios1_idx` (`usuarios_username`),
  ADD KEY `fk_noticias_usuarios2_idx` (`usuarios_username1`);

--
-- Index de la taula `palabras_clave`
--
ALTER TABLE `palabras_clave`
  ADD PRIMARY KEY (`noticias_idnoticias`);

--
-- Index de la taula `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`idseccion`);

--
-- Index de la taula `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`idtipo_usuarios`);

--
-- Index de la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`,`tipousuarios_idtipo_usuarios`),
  ADD KEY `fk_usuarios_tipousuarios1_idx` (`tipousuarios_idtipo_usuarios`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `idtipo_usuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_seccion1` FOREIGN KEY (`usuarios_username1`) REFERENCES `seccion` (`idseccion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_noticias_usuarios1` FOREIGN KEY (`usuarios_username`) REFERENCES `usuarios` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_usuarios2` FOREIGN KEY (`usuarios_username1`) REFERENCES `usuarios` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restriccions per la taula `palabras_clave`
--
ALTER TABLE `palabras_clave`
  ADD CONSTRAINT `fk_palabras_clave_noticias` FOREIGN KEY (`noticias_idnoticias`) REFERENCES `noticias` (`idnoticias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_tipousuarios1` FOREIGN KEY (`tipousuarios_idtipo_usuarios`) REFERENCES `tipousuarios` (`idtipo_usuarios`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de dades: `electro_tienda`
--
CREATE DATABASE IF NOT EXISTS `electro_tienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `electro_tienda`;

-- --------------------------------------------------------

--
-- Estructura de la taula `acceso`
--

CREATE TABLE `acceso` (
  `id` int(10) NOT NULL,
  `login` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `acceso`
--

INSERT INTO `acceso` (`id`, `login`, `password`) VALUES
(8, 'pau', '123'),
(10, 'pepe', '123'),
(11, 'pau', '111'),
(12, 'PRUEBA', '123');

-- --------------------------------------------------------

--
-- Estructura de la taula `clientes`
--

CREATE TABLE `clientes` (
  `login` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `profesion` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `clientes`
--

INSERT INTO `clientes` (`login`, `nombre`, `apellidos`, `dni`, `telefono`, `direccion`, `profesion`, `email`) VALUES
('pau', 'PAU', 'CASTANE', '44557778G', '666783364', 'RAMBLA 25 - SABADELL', 'PAS', 'paucastane@gmail.com'),
('pau', 'lolo', 'popo', '45545454', '937273382', 'pez 3', 'ninja', 'asplicterly@yahoo.es'),
('', 'PAU', 'MONICO', '66554554', '666783364', 'TURULL, 174 1-2', '', 'paucastane@gmail.com'),
('PAU', 'PAU', 'MONICO', '444444', '666783364', 'TURULL, 174 1-2', '', 'paucastane@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de la taula `ventas`
--

CREATE TABLE `ventas` (
  `nventa` int(5) NOT NULL,
  `login` varchar(20) NOT NULL,
  `articulo` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `ventas`
--

INSERT INTO `ventas` (`nventa`, `login`, `articulo`, `cantidad`, `precio`, `total`) VALUES
(1, 'pau', 'Placa base Gigabyte', 3, '99', '297'),
(1, 'pau', 'Placa base Gigabyte', 2, '99', '198'),
(1, 'pau', 'Tarjeta video NVIDIA', 2, '59', '118'),
(1, 'pau', 'Tarjeta sonido Creative', 1, '39', '39'),
(1, 'pau', 'Tarjeta red WiFi', 4, '39', '156'),
(2, 'pau', 'Placa base Gigabyte', 2, '99', '198'),
(0, '', 'Tarjeta red 3com', 5, '29', '145'),
(3, 'PAU', 'Placa base Gigabyte', 1, '99', '99'),
(3, 'PAU', 'Tarjeta video NVIDIA', 2, '59', '118');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Base de dades: `escuela`
--
CREATE DATABASE IF NOT EXISTS `escuela` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `escuela`;

-- --------------------------------------------------------

--
-- Estructura de la taula `asignatura`
--

CREATE TABLE `asignatura` (
  `codigo` char(3) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `reponsable` varchar(30) NOT NULL,
  `area` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `asignatura`
--

INSERT INTO `asignatura` (`codigo`, `nombre`, `reponsable`, `area`) VALUES
('A15', 'Gestión de proyectos', 'Dionisio Díaz', 'SI'),
('A20', 'Compiladores eléctricos', 'Alfons Rodríguez', 'CE'),
('B12', 'Redes y Servicios ', 'Marta Cabestany', 'AC'),
('G58', 'Algebra Relacional', 'Jesús del Monte', 'M'),
('H76', 'Criptografía informática', 'Raquel Tejero', 'M'),
('K43', 'Bases de datos SQL', 'Ana Garrido', 'EPBD'),
('L12', 'Diseño gráfico', 'Cristina Tello', 'G'),
('M40', 'Comunicaciones', 'Guillermo Baeza', 'AC'),
('W17', 'Inteligencia Robótica', 'Pedro Romero', 'IA');

-- --------------------------------------------------------

--
-- Estructura de la taula `cursan`
--

CREATE TABLE `cursan` (
  `dni` varchar(9) NOT NULL,
  `codigo` char(3) NOT NULL,
  `num_veces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `cursan`
--

INSERT INTO `cursan` (`dni`, `codigo`, `num_veces`) VALUES
('1234567A', 'A15', 1),
('1234567A', 'A20', 1),
('1234567A', 'M40', 2),
('1234567A', 'K43', 1),
('2345678B', 'L12', 1),
('2345678B', 'G58', 2),
('2345678B', 'H76', 1),
('2345678B', 'K43', 1),
('4567890C', 'G58', 1),
('4567890C', 'L12', 1),
('4567890C', 'M40', 1),
('4567890C', 'A20', 1),
('4567890C', 'K43', 1),
('9876554D', 'B12', 3),
('9876554D', 'L12', 1),
('9876554D', 'K43', 1),
('9876554D', 'A20', 3),
('3987413E', 'M40', 1),
('3987413E', 'L12', 1),
('5784939E', 'W17', 1),
('2918273F', 'K43', 1),
('2918273F', 'L12', 2),
('2918273F', 'H76', 1),
('8785792G', 'G58', 1),
('8785792G', 'M40', 1),
('6093821H', 'H76', 2),
('6093821H', 'K43', 2),
('6093821H', 'L12', 2),
('6093821H', 'M40', 3),
('6093821H', 'W17', 1),
('68374839I', 'W17', 1),
('68374839I', 'K43', 1),
('68374839I', 'L12', 1),
('47364581J', 'A20', 1),
('47364581J', 'B12', 2),
('47364581J', 'H76', 1),
('6981433V', 'L12', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `estudiante`
--

CREATE TABLE `estudiante` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `anyo_ini` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `estudiante`
--

INSERT INTO `estudiante` (`dni`, `nombre`, `anyo_ini`) VALUES
('1234567A', 'Marta CollGarcia', 2015),
('2345678B', 'Miriam González', 2012),
('2918273F', 'Rocío Requena Merva', 2015),
('3987413E', 'Cristina cuenca', 2013),
('4567890C', 'Fernando Lopez Romeo', 2016),
('47364581J', 'Antonio Fum de la Roca', 2014),
('5784939E', 'Bienvenido Garcia', 2016),
('6093821H', 'Rodrigo Ramirez Sino', 2013),
('68374839I', 'Carmen Domingo Cruz', 2012),
('6981433V', 'Susanna de la flor rajoy', 2010),
('8785792G', 'CristhoperPearks', 2014),
('9876554D', 'Lycho', 2016);

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`codigo`);

--
-- Index de la taula `cursan`
--
ALTER TABLE `cursan`
  ADD KEY `fk_Cursan_Estudiante` (`dni`),
  ADD KEY `fk_Cursan_Asignatura` (`codigo`);

--
-- Index de la taula `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`dni`);

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `cursan`
--
ALTER TABLE `cursan`
  ADD CONSTRAINT `fk_Cursan_Asignatura` FOREIGN KEY (`codigo`) REFERENCES `asignatura` (`codigo`),
  ADD CONSTRAINT `fk_Cursan_Estudiante` FOREIGN KEY (`dni`) REFERENCES `estudiante` (`dni`);
--
-- Base de dades: `escuelaonline`
--
CREATE DATABASE IF NOT EXISTS `escuelaonline` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `escuelaonline`;

-- --------------------------------------------------------

--
-- Estructura de la taula `asignaturas`
--

CREATE TABLE `asignaturas` (
  `cod_asignatura` char(3) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `responsable` varchar(75) DEFAULT NULL,
  `area` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `asignaturas`
--

INSERT INTO `asignaturas` (`cod_asignatura`, `nombre`, `responsable`, `area`) VALUES
('A15', 'Gestión de proyectos ', 'Dionisio Diaz', 'SI'),
('A20', 'Compiladores electricos', 'AlfonsRodriguez', 'CE'),
('B12', 'Redes y Servicios', 'Marta Cabestany', 'AC'),
('G58', 'Algebra Relacional', 'Jesus del Monte', 'M'),
('H76', 'Criptografiainformatica', 'Raquel Tejero', 'M'),
('K43', 'Bases de Datos SQL', 'Ana Garrido ', 'EPBD'),
('L12', 'Diseño grafico', 'Cristina Tello', 'G'),
('M40', 'Comunicaciones', 'Guillermo Baeza', 'AC'),
('W17', 'Inteligencia Robotica', 'Pedro Romero', 'IA');

-- --------------------------------------------------------

--
-- Estructura de la taula `cursan`
--

CREATE TABLE `cursan` (
  `dni` char(9) NOT NULL,
  `cod_asignatura` char(3) NOT NULL,
  `num_veces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `cursan`
--

INSERT INTO `cursan` (`dni`, `cod_asignatura`, `num_veces`) VALUES
('1234567A', 'A15', 1),
('1234567A', 'A20', 1),
('1234567A', 'K43', 1),
('1234567A', 'M40', 2),
('2918273F', 'H76', 2),
('2918273F', 'K43', 1),
('2918273F', 'L12', 2),
('4567890C', 'A20', 1),
('4567890C', 'G58', 2),
('4567890C', 'K43', 1),
('4567890C', 'L12', 1),
('4567890C', 'M40', 1),
('5784939E', 'L12', 1),
('5784939E', 'M40', 1),
('5784939E', 'W17', 1),
('9876554D', 'A20', 3),
('9876554D', 'B12', 3),
('9876554D', 'K43', 1),
('9876554D', 'L12', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `estudiantes`
--

CREATE TABLE `estudiantes` (
  `dni` char(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `a_inicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `estudiantes`
--

INSERT INTO `estudiantes` (`dni`, `nombre`, `a_inicio`) VALUES
('1234567A', 'Marta CollGarcia', 2015),
('2345678B', 'Miriam Gonzalez ', 2012),
('2918273F', 'Rocío Requena Merva', 2015),
('3987413E', 'Cristina cuenca', 2013),
('4567890C', 'Fernando Lopez Romeo', 2016),
('47364581J', 'Antonio Fum de la Roca', 2014),
('5784939E', 'Bienvenido Garcia', 2016),
('6093821H', 'Rodrigo Ramirez Sino', 2013),
('68374839I', 'Carmen Domingo Cruz', 2012),
('6981433V', 'Susanna de la flor rajoy', 2010),
('8785792G', 'CristhoperPearks', 2014),
('9876554D', 'Lycho', 2016);

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`cod_asignatura`);

--
-- Index de la taula `cursan`
--
ALTER TABLE `cursan`
  ADD PRIMARY KEY (`dni`,`cod_asignatura`),
  ADD KEY `FK_Cursan_Asignaturas` (`cod_asignatura`);

--
-- Index de la taula `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`dni`);

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `cursan`
--
ALTER TABLE `cursan`
  ADD CONSTRAINT `FK_Cursan_Asignaturas` FOREIGN KEY (`cod_asignatura`) REFERENCES `asignaturas` (`cod_asignatura`),
  ADD CONSTRAINT `FK_Cursan_Estudiantes` FOREIGN KEY (`dni`) REFERENCES `estudiantes` (`dni`);
--
-- Base de dades: `kokoro`
--
CREATE DATABASE IF NOT EXISTS `kokoro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kokoro`;

-- --------------------------------------------------------

--
-- Estructura de la taula `misentradas`
--

CREATE TABLE `misentradas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `entrada` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `misentradas`
--

INSERT INTO `misentradas` (`id`, `titulo`, `entrada`, `fecha`) VALUES
(1, 'Entrada 1', 'Esta es la entrada 1', '2017-12-08 16:39:22'),
(2, 'Entrada 2', 'Esta es la entrada 2', '2017-12-08 16:39:28'),
(6, 'Entrada 3', 'MODIFICADOOOO', '2017-12-08 17:59:23');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `misentradas`
--
ALTER TABLE `misentradas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `misentradas`
--
ALTER TABLE `misentradas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Base de dades: `newscrawler`
--
CREATE DATABASE IF NOT EXISTS `newscrawler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `newscrawler`;

-- --------------------------------------------------------

--
-- Estructura de la taula `table_categorias`
--

CREATE TABLE `table_categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcipm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `table_rss`
--

CREATE TABLE `table_rss` (
  `id_rss` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `rss2categoria` int(11) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `xml` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `table_users`
--

CREATE TABLE `table_users` (
  `id_user` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `table_users`
--

INSERT INTO `table_users` (`id_user`, `email`, `password`, `nombre`) VALUES
('248e2', 'pedro@ya.com', '$2y$10$bnlYA879gCCBL/0ALHllweaWa7dwIBWYrZ4ZCfCZzPbQ/qrNBwGcO', 'pedro'),
('i3m8x', 'ab@ab.com', '$2y$10$UFzFjovRaBg2BN/ba6gzJe8zWkJNBTGjE9BvIven/tw1zZO3uUcoC', 'lolo'),
('iwwuv', 'juan@juan.com', '$2y$10$aPEzCTUSExlTuqbIfHO2z.YLq/gT1M9QSkztiHNo4Gsb1te8S2FLm', 'juan'),
('kgiri', 'hola@hola.com', '1234567', 'ana'),
('o91el', 'luis@luis.com', '55555', 'lucas'),
('sxqig', 'a@a.com', '7', 'juan'),
('uwpxo', 'ana@maria.com', '$2y$10$nAqHWU8Cyb4LjQ4vQL4OR.vXIYSbuFOus8ThvFKRhQEdeqE9BySlS', 'ana juana'),
('ztleg', 'a@b.com', '3333333', 'juanito');

-- --------------------------------------------------------

--
-- Estructura de la taula `table_user_feed`
--

CREATE TABLE `table_user_feed` (
  `id_feed` int(11) NOT NULL,
  `userfeed2user` varchar(5) NOT NULL,
  `userfeed2rss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `table_categorias`
--
ALTER TABLE `table_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Index de la taula `table_rss`
--
ALTER TABLE `table_rss`
  ADD PRIMARY KEY (`id_rss`),
  ADD KEY `fk_rss_categoria` (`rss2categoria`);

--
-- Index de la taula `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index de la taula `table_user_feed`
--
ALTER TABLE `table_user_feed`
  ADD PRIMARY KEY (`id_feed`),
  ADD KEY `fk_userfeed_user` (`userfeed2user`),
  ADD KEY `fk_userfeed_rss` (`userfeed2rss`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `table_categorias`
--
ALTER TABLE `table_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `table_rss`
--
ALTER TABLE `table_rss`
  MODIFY `id_rss` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `table_user_feed`
--
ALTER TABLE `table_user_feed`
  MODIFY `id_feed` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `table_rss`
--
ALTER TABLE `table_rss`
  ADD CONSTRAINT `fk_rss_categoria` FOREIGN KEY (`rss2categoria`) REFERENCES `table_categorias` (`id_categoria`);

--
-- Restriccions per la taula `table_user_feed`
--
ALTER TABLE `table_user_feed`
  ADD CONSTRAINT `fk_userfeed_rss` FOREIGN KEY (`userfeed2rss`) REFERENCES `table_rss` (`id_rss`),
  ADD CONSTRAINT `fk_userfeed_user` FOREIGN KEY (`userfeed2user`) REFERENCES `table_users` (`id_user`);
--
-- Base de dades: `parteaccidente`
--
CREATE DATABASE IF NOT EXISTS `parteaccidente` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `parteaccidente`;

-- --------------------------------------------------------

--
-- Estructura de la taula `parte`
--

CREATE TABLE `parte` (
  `cod_parte` char(8) DEFAULT NULL,
  `DNI` char(9) NOT NULL,
  `Fecha_accidente` date DEFAULT NULL,
  `Hora_accidente` time DEFAULT NULL,
  `Causa_accidente` varchar(50) NOT NULL,
  `Tipo_lesion` varchar(30) DEFAULT NULL,
  `Partes_cuerpo_lesionado` varchar(30) NOT NULL,
  `Gravedad` enum('Baja','Normal','Alta') NOT NULL,
  `Baja` enum('Si','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `trabajador`
--

CREATE TABLE `trabajador` (
  `DNI` char(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `sexo` enum('hombre','mujer') NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `com_autonoma` varchar(20) DEFAULT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo_elec` varchar(30) DEFAULT NULL,
  `sector` enum('Auditoria y Consultoria','Banca y Seguros','Construcción e Inmobiliaria','Energia','Educacion','Industria','Farmaceutica','Legal','Recursos Humanos','Servicios Textil y distribucion','Telecomunicaciones y Informatica','Sanidad') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `trabajador`
--

INSERT INTO `trabajador` (`DNI`, `nombre`, `sexo`, `fecha_nacimiento`, `direccion`, `com_autonoma`, `telefono`, `correo_elec`, `sector`) VALUES
('45678934w', 'Maria del Carmen Sanz', 'mujer', '1960-10-03', 'Paseo de los Linares 7', 'Sevilla', '645678765', 'sanzcarmen01@gmail.com', 'Sanidad'),
('89457634R', 'Josep Buenas', 'hombre', '1999-01-15', 'Colinas 45', 'Cataluña', '765340287', 'mcabanyes@hotmail.com', 'Farmaceutica');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `parte`
--
ALTER TABLE `parte`
  ADD PRIMARY KEY (`DNI`);

--
-- Index de la taula `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`DNI`);

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `parte`
--
ALTER TABLE `parte`
  ADD CONSTRAINT `ck_parte_trabajador` FOREIGN KEY (`DNI`) REFERENCES `trabajador` (`DNI`);
--
-- Base de dades: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- Bolcant dades de la taula `pma__bookmark`
--

INSERT INTO `pma__bookmark` (`id`, `dbase`, `user`, `label`, `query`) VALUES
(1, 'escuelaonline', 'root', '1A', 'select `responsable`, count(`nombre`)\r\n\r\nfrom asignaturas \r\n\r\ngroup by nombre;');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Bolcant dades de la taula `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"pin_text\":\"false\",\"side_menu\":\"false\",\"full_screen\":\"on\"}');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Bolcant dades de la taula `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'amazoners', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"categoria\",\"gestiona\",\"imagenes\",\"producto\",\"tipo_producto\",\"usuario\",\"valora\"],\"table_structure[]\":[\"categoria\",\"gestiona\",\"imagenes\",\"producto\",\"tipo_producto\",\"usuario\",\"valora\"],\"table_data[]\":[\"categoria\",\"gestiona\",\"imagenes\",\"producto\",\"tipo_producto\",\"usuario\",\"valora\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la taula @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la taula @TABLE@ (continua)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contingut de la taula @TABLE@\",\"latex_data_continued_caption\":\"Contingut de la taula @TABLE@ (continua)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Bolcant dades de la taula `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('amazoners', 1, 'amazoners');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Bolcant dades de la taula `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"amazoners\",\"table\":\"producto\"},{\"db\":\"amazoners\",\"table\":\"imagenes\"},{\"db\":\"amazoners\",\"table\":\"categoria\"},{\"db\":\"amazoners\",\"table\":\"valora\"},{\"db\":\"amazoners\",\"table\":\"gestiona\"},{\"db\":\"amazoners\",\"table\":\"usuario\"},{\"db\":\"amazoners\",\"table\":\"tipo_producto\"},{\"db\":\"fruitfigthter\",\"table\":\"equiposcombate\"},{\"db\":\"fruitfigthter\",\"table\":\"historialcombates\"},{\"db\":\"newscrawler\",\"table\":\"table_users\"}]');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Bolcant dades de la taula `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('amazoners', 'categoria', 1, 143, 431),
('amazoners', 'gestiona', 1, 239, 185),
('amazoners', 'imagenes', 1, 830, 423),
('amazoners', 'producto', 1, 531, 356),
('amazoners', 'tipo_producto', 1, 137, 337),
('amazoners', 'usuario', 1, 525, 90),
('amazoners', 'valora', 1, 824, 177);

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Bolcant dades de la taula `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'amazoners', 'valora', '{\"sorted_col\":\"`valora`.`estrellas` ASC\"}', '2018-06-07 08:50:34'),
('root', 'escuela', 'cursan', '{\"sorted_col\":\"`cursan`.`dni` ASC\"}', '2017-11-04 21:07:40');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Bolcant dades de la taula `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-10-10 15:16:00', '{\"lang\":\"ca\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de la taula `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Index de la taula `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Index de la taula `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Index de la taula `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Index de la taula `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Index de la taula `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Index de la taula `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Index de la taula `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Index de la taula `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Index de la taula `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Index de la taula `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Index de la taula `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Index de la taula `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Index de la taula `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Index de la taula `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Index de la taula `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Index de la taula `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Index de la taula `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Index de la taula `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de dades: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
