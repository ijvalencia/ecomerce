-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2017 at 12:29 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `relacion_categorias`
--

CREATE TABLE IF NOT EXISTS `relacion_categorias` (
  `id_rel_categoria` int(8) NOT NULL AUTO_INCREMENT,
  `id_categoria` varchar(40) NOT NULL,
  `id_supercategoria` varchar(40) NOT NULL,
  PRIMARY KEY (`id_rel_categoria`),
  KEY `id_categoria` (`id_categoria`,`id_supercategoria`),
  KEY `id_categoria_2` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `relacion_categorias`
--

INSERT INTO `relacion_categorias` (`id_rel_categoria`, `id_categoria`, `id_supercategoria`) VALUES
(76, 'ACCESORIOS', 'Accesorios/personal'),
(26, 'AIRE ACONDICIONADO', 'Hogar/muebles'),
(3, 'ALARMAS', 'Redes de computo/telefonia'),
(91, 'ALARMAS', 'Seguridad'),
(20, 'ALMACENAMIENTO', 'Almacenamiento'),
(38, 'ALMACENAMIENTO', 'Equipo de computo'),
(77, 'AUDIFONOS Y MICRO', 'Accesorios/personal'),
(63, 'AUDIFONOS Y MICRO', 'Audio y video'),
(78, 'BACK PACK (MOCHILA)', 'Accesorios/personal'),
(62, 'BOCINAS', 'Audio y video'),
(37, 'BOCINAS', 'Equipo de computo'),
(105, 'CABLEADO ESTRUCTURADO', 'Electronica'),
(2, 'CABLEADO ESTRUCTURADO', 'Redes de computo/telefonia'),
(92, 'CABLEADO ESTRUCTURADO', 'Seguridad'),
(104, 'CABLES', 'Electronica'),
(6, 'CABLES', 'Redes de computo/telefonia'),
(93, 'CABLES', 'Seguridad'),
(66, 'CAMARAS', 'Audio y video'),
(27, 'CAMARAS', 'Hogar/muebles'),
(7, 'CAMARAS', 'Redes de computo/telefonia'),
(94, 'CAMARAS', 'Seguridad'),
(41, 'CONMUTADORES', 'Equipo de computo'),
(5, 'CONMUTADORES', 'Redes de computo/telefonia'),
(79, 'CONSUMIBLES', 'Accesorios/personal'),
(8, 'CONTROL DE ACCESO Y ASISTENCIA', 'Redes de computo/telefonia'),
(9, 'CONTROLES', 'Redes de computo/telefonia'),
(4, 'DIGITALIZADOR', 'Redes de computo/telefonia'),
(21, 'DISCOS DUROS', 'Almacenamiento'),
(10, 'DISCOS DUROS', 'Redes de computo/telefonia'),
(106, 'ENERGIA', 'Electronica'),
(90, 'ENERGIA', 'Seguridad'),
(67, 'EQUIPOS DE AUDIO', 'Audio y video'),
(71, 'FAX', 'Impresoras/escaner'),
(1, 'FAX', 'Redes de computo/telefonia'),
(80, 'FUNDAS', 'Accesorios/personal'),
(42, 'GABINETES', 'Equipo de computo'),
(40, 'GAMES', 'Equipo de computo'),
(96, 'GAMES', 'Software/juegos'),
(81, 'HERRAMIENTAS', 'Accesorios/personal'),
(107, 'HERRAMIENTAS', 'Electronica'),
(75, 'IMPRESORA DE AMPLIO FORMATO (PLOTTER)', 'Impresoras/escaner'),
(43, 'IMPRESORAS', 'Equipo de computo'),
(28, 'IMPRESORAS', 'Hogar/muebles'),
(74, 'IMPRESORAS', 'Impresoras/escaner'),
(97, 'JUGUETES', 'Software/juegos'),
(82, 'KIOSKO', 'Accesorios/personal'),
(44, 'KIOSKO', 'Equipo de computo'),
(29, 'KIOSKO', 'Hogar/muebles'),
(30, 'LINEA BLANCA', 'Hogar/muebles'),
(83, 'MALETINES', 'Accesorios/personal'),
(89, 'MALETINES', 'Seguridad'),
(31, 'MAQUINAS DE COSER', 'Hogar/muebles'),
(84, 'MEMORIAS', 'Accesorios/personal'),
(22, 'MEMORIAS', 'Almacenamiento'),
(39, 'MEMORIAS', 'Equipo de computo'),
(45, 'MONITORES', 'Equipo de computo'),
(36, 'MOUSE', 'Equipo de computo'),
(32, 'MUEBLES PARA OFICINA', 'Hogar/muebles'),
(46, 'MULTIFUNCIONALES', 'Equipo de computo'),
(11, 'MULTIFUNCIONALES', 'Redes de computo/telefonia'),
(65, 'OPTICOS', 'Audio y video'),
(12, 'OPTICOS', 'Redes de computo/telefonia'),
(47, 'PCS', 'Equipo de computo'),
(85, 'PIZARRON', 'Accesorios/personal'),
(100, 'POLIZA DE GARANTIAS COMPUTO GHIA 1 ANIO', 'Garantias'),
(99, 'POLIZA DE GARANTIAS COMPUTO GHIA 2 ANIOS', 'Garantias'),
(101, 'POLIZA DE SERVICIO', 'Garantias'),
(103, 'POLIZA DE SERVICIO', 'Garantias'),
(102, 'POLIZAS DE GARANTIA', 'Garantias'),
(48, 'PORTATILES', 'Equipo de computo'),
(13, 'PRESENTADOR', 'Redes de computo/telefonia'),
(49, 'PROCESADORES', 'Equipo de computo'),
(86, 'PRODUCTOS DE LIMPIEZA', 'Accesorios/personal'),
(14, 'PUNTO DE VENTA', 'Redes de computo/telefonia'),
(15, 'RACK', 'Redes de computo/telefonia'),
(16, 'REDES', 'Redes de computo/telefonia'),
(87, 'RELOJES', 'Accesorios/personal'),
(50, 'REPRODUCTORES', 'Equipo de computo'),
(51, 'SCANNER', 'Equipo de computo'),
(72, 'SCANNER', 'Impresoras/escaner'),
(17, 'SERVICIOS METROCARRIER', 'Redes de computo/telefonia'),
(23, 'SERVIDORES', 'Almacenamiento'),
(52, 'SOFTWARE', 'Equipo de computo'),
(98, 'SOFTWARE', 'Software/juegos'),
(53, 'TABLETAS', 'Equipo de computo'),
(24, 'TARJETA CONTROLADORA', 'Almacenamiento'),
(54, 'TARJETA CONTROLADORA', 'Equipo de computo'),
(25, 'TARJETA MADRE', 'Almacenamiento'),
(55, 'TARJETA MADRE', 'Equipo de computo'),
(56, 'TECLADO Y MOUSE', 'Equipo de computo'),
(57, 'TECLADOS', 'Equipo de computo'),
(33, 'TELEFONIA', 'Hogar/muebles'),
(18, 'TELEFONIA', 'Redes de computo/telefonia'),
(68, 'TELEVISOR', 'Audio y video'),
(34, 'TELEVISOR', 'Hogar/muebles'),
(73, 'TELEVISOR', 'Impresoras/escaner'),
(88, 'VENTILADORES', 'Accesorios/personal'),
(35, 'VENTILADORES', 'Hogar/muebles'),
(69, 'VIDEO', 'Audio y video'),
(58, 'VIDEO', 'Equipo de computo'),
(95, 'VIDEO', 'Seguridad'),
(64, 'VIDEOCONFERENCIA', 'Audio y video'),
(59, 'VIDEOCONFERENCIA', 'Equipo de computo'),
(70, 'VIDEOGRABADORES', 'Audio y video'),
(19, 'VIDEOGRABADORES', 'Redes de computo/telefonia'),
(61, 'VIDEOPROYECTOR', 'Audio y video'),
(60, 'VIDEOPROYECTOR', 'Equipo de computo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
