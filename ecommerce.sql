-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2017 at 02:03 PM
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
-- Table structure for table `Direccion`
--

CREATE TABLE `Direccion` (
  `id` int(8) NOT NULL,
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
-- Table structure for table `Envios`
--

CREATE TABLE `Envios` (
  `id` int(8) NOT NULL,
  `metodo` varchar(80) NOT NULL,
  `descripcion` varchar(260) DEFAULT NULL,
  `empresa` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Favoritos`
--

CREATE TABLE `Favoritos` (
  `id` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_producto` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ordenes`
--

CREATE TABLE `Ordenes` (
  `id` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_direccion` int(8) NOT NULL,
  `id_envio` int(8) NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'YYYY-MM-DD HH:MI:SS',
  `total` double NOT NULL,
  `metodo` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `guia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Productos_orden`
--

CREATE TABLE `Productos_orden` (
  `id` int(8) NOT NULL,
  `id_orden` int(8) NOT NULL,
  `id_producto` int(8) NOT NULL,
  `cantidad` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(8) NOT NULL,
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
-- Table structure for table `Valoraciones`
--

CREATE TABLE `Valoraciones` (
  `id` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `id_ordenes` int(8) NOT NULL,
  `envio` double NOT NULL,
  `concordancia` double NOT NULL,
  `experiencia` double NOT NULL,
  `promedio` double NOT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Direccion`
--
ALTER TABLE `Direccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indexes for table `Envios`
--
ALTER TABLE `Envios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Favoritos`
--
ALTER TABLE `Favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `producto` (`id_producto`);

--
-- Indexes for table `Ordenes`
--
ALTER TABLE `Ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `direccion` (`id_direccion`),
  ADD KEY `envio` (`id_envio`);

--
-- Indexes for table `Productos_orden`
--
ALTER TABLE `Productos_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden` (`id_orden`),
  ADD KEY `producto` (`id_producto`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Valoraciones`
--
ALTER TABLE `Valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `orden` (`id_ordenes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Direccion`
--
ALTER TABLE `Direccion`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Envios`
--
ALTER TABLE `Envios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Favoritos`
--
ALTER TABLE `Favoritos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ordenes`
--
ALTER TABLE `Ordenes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Productos_orden`
--
ALTER TABLE `Productos_orden`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Valoraciones`
--
ALTER TABLE `Valoraciones`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
