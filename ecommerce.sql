-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2017 at 01:32 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentarios` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `comentario` text NOT NULL,
  `calificacion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `celular` int(10) NOT NULL,
  `telefono` int(10) DEFAULT NULL,
  `calle` varchar(120) NOT NULL,
  `exterior` varchar(5) NOT NULL,
  `interior` varchar(5) DEFAULT NULL,
  `cp` int(5) NOT NULL,
  `estado` int(2) NOT NULL,
  `ciudad` varchar(80) NOT NULL,
  `colonia` varchar(80) DEFAULT NULL,
  `cruce1` varchar(80) DEFAULT NULL,
  `cruce2` varchar(80) DEFAULT NULL,
  `refrencia` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `envios`
--

CREATE TABLE `envios` (
  `id_envios` int(8) NOT NULL,
  `metodo` varchar(80) NOT NULL,
  `descripcion` varchar(260) DEFAULT NULL,
  `empresa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favoritos` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_producto` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gustar`
--

CREATE TABLE `gustar` (
  `id_gustar` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `comentario` text,
  `megusta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordenes`
--

CREATE TABLE `ordenes` (
  `id_ordenes` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_direccion` int(8) NOT NULL,
  `id_envio` int(8) NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'YYYY-MM-DD HH:MM:SS',
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `guia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(5) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `imagen` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `existencias` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productos_orden`
--

CREATE TABLE `productos_orden` (
  `id_productos_orden` int(8) NOT NULL,
  `id_orden` int(8) NOT NULL,
  `id_producto` int(8) NOT NULL,
  `cantidad` smallint(2) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(8) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `dia` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `contra` varchar(80) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id_valoraciones` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_ordenes` int(8) NOT NULL,
  `envio` decimal(3,3) NOT NULL,
  `concordancia` decimal(3,3) NOT NULL,
  `experiencia` decimal(3,3) NOT NULL,
  `promedio` decimal(3,3) NOT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentarios`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indexes for table `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envios`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favoritos`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `producto` (`id_producto`);

--
-- Indexes for table `gustar`
--
ALTER TABLE `gustar`
  ADD PRIMARY KEY (`id_gustar`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_ordenes`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `direccion` (`id_direccion`),
  ADD KEY `envio` (`id_envio`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `productos_orden`
--
ALTER TABLE `productos_orden`
  ADD PRIMARY KEY (`id_productos_orden`),
  ADD KEY `orden` (`id_orden`),
  ADD KEY `producto` (`id_producto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id_valoraciones`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `orden` (`id_ordenes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentarios` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envios` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favoritos` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gustar`
--
ALTER TABLE `gustar`
  MODIFY `id_gustar` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_ordenes` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `productos_orden`
--
ALTER TABLE `productos_orden`
  MODIFY `id_productos_orden` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoraciones` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
