-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2017 at 12:32 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

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
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rel_categoria`),
  KEY `id_categoria` (`id_categoria`,`id_supercategoria`),
  KEY `id_categoria_2` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `relacion_categorias`
--

INSERT INTO `relacion_categorias` (`id_rel_categoria`, `id_categoria`, `id_supercategoria`, `estado`) VALUES
(2, 'CABLEADO ESTRUCTURADO', 'Redes de computo/telefonia', 1),
(3, 'ALARMAS', 'Redes de computo/telefonia', 1),
(4, 'DIGITALIZADOR', 'Redes de computo/telefonia', 1),
(5, 'CONMUTADORES', 'Redes de computo/telefonia', 1),
(6, 'CABLES', 'Redes de computo/telefonia', 1),
(7, 'CAMARAS', 'Redes de computo/telefonia', 1),
(8, 'CONTROL DE ACCESO Y ASISTENCIA', 'Redes de computo/telefonia', 1),
(10, 'DISCOS DUROS', 'Redes de computo/telefonia', 1),
(11, 'MULTIFUNCIONALES', 'Redes de computo/telefonia', 1),
(12, 'OPTICOS', 'Redes de computo/telefonia', 1),
(13, 'PRESENTADOR', 'Redes de computo/telefonia', 1),
(14, 'PUNTO DE VENTA', 'Redes de computo/telefonia', 1),
(15, 'RACK', 'Redes de computo/telefonia', 1),
(16, 'REDES', 'Redes de computo/telefonia', 1),
(18, 'TELEFONIA', 'Redes de computo/telefonia', 1),
(19, 'VIDEOGRABADORES', 'Redes de computo/telefonia', 1),
(20, 'ALMACENAMIENTO', 'Almacenamiento', 1),
(21, 'DISCOS DUROS', 'Almacenamiento', 1),
(22, 'MEMORIAS', 'Almacenamiento', 1),
(23, 'SERVIDORES', 'Almacenamiento', 1),
(24, 'TARJETA CONTROLADORA', 'Almacenamiento', 1),
(25, 'TARJETA MADRE', 'Almacenamiento', 1),
(26, 'AIRE ACONDICIONADO', 'Hogar/muebles', 1),
(27, 'CAMARAS', 'Hogar/muebles', 1),
(28, 'IMPRESORAS', 'Hogar/muebles', 1),
(30, 'LINEA BLANCA', 'Hogar/muebles', 1),
(33, 'TELEFONIA', 'Hogar/muebles', 1),
(34, 'TELEVISOR', 'Hogar/muebles', 1),
(35, 'VENTILADORES', 'Hogar/muebles', 1),
(36, 'MOUSE', 'Equipo de computo', 1),
(37, 'BOCINAS', 'Equipo de computo', 1),
(38, 'ALMACENAMIENTO', 'Equipo de computo', 1),
(39, 'MEMORIAS', 'Equipo de computo', 1),
(40, 'GAMES', 'Equipo de computo', 1),
(41, 'CONMUTADORES', 'Equipo de computo', 1),
(42, 'GABINETES', 'Equipo de computo', 1),
(43, 'IMPRESORAS', 'Equipo de computo', 1),
(45, 'MONITORES', 'Equipo de computo', 1),
(46, 'MULTIFUNCIONALES', 'Equipo de computo', 1),
(48, 'PORTATILES', 'Equipo de computo', 1),
(49, 'PROCESADORES', 'Equipo de computo', 1),
(50, 'REPRODUCTORES', 'Equipo de computo', 1),
(51, 'SCANNER', 'Equipo de computo', 1),
(52, 'SOFTWARE', 'Equipo de computo', 1),
(53, 'TABLETAS', 'Equipo de computo', 1),
(54, 'TARJETA CONTROLADORA', 'Equipo de computo', 1),
(55, 'TARJETA MADRE', 'Equipo de computo', 1),
(56, 'TECLADO Y MOUSE', 'Equipo de computo', 1),
(57, 'TECLADOS', 'Equipo de computo', 1),
(58, 'VIDEO', 'Equipo de computo', 1),
(59, 'VIDEOCONFERENCIA', 'Equipo de computo', 1),
(60, 'VIDEOPROYECTOR', 'Equipo de computo', 1),
(61, 'VIDEOPROYECTOR', 'Audio y video', 1),
(62, 'BOCINAS', 'Audio y video', 1),
(63, 'AUDIFONOS Y MICRO', 'Audio y video', 1),
(64, 'VIDEOCONFERENCIA', 'Audio y video', 1),
(65, 'OPTICOS', 'Audio y video', 1),
(66, 'CAMARAS', 'Audio y video', 1),
(67, 'EQUIPOS DE AUDIO', 'Audio y video', 1),
(68, 'TELEVISOR', 'Audio y video', 1),
(69, 'VIDEO', 'Audio y video', 1),
(70, 'VIDEOGRABADORES', 'Audio y video', 1),
(72, 'SCANNER', 'Impresoras/escaner', 1),
(73, 'TELEVISOR', 'Impresoras/escaner', 1),
(74, 'IMPRESORAS', 'Impresoras/escaner', 1),
(75, 'IMPRESORA DE AMPLIO FORMATO (PLOTTER)', 'Impresoras/escaner', 1),
(76, 'ACCESORIOS', 'Accesorios/personal', 1),
(77, 'AUDIFONOS Y MICRO', 'Accesorios/personal', 1),
(78, 'BACK PACK (MOCHILA)', 'Accesorios/personal', 1),
(79, 'CONSUMIBLES', 'Accesorios/personal', 1),
(80, 'FUNDAS', 'Accesorios/personal', 1),
(81, 'HERRAMIENTAS', 'Accesorios/personal', 1),
(83, 'MALETINES', 'Accesorios/personal', 1),
(84, 'MEMORIAS', 'Accesorios/personal', 1),
(86, 'PRODUCTOS DE LIMPIEZA', 'Accesorios/personal', 1),
(87, 'RELOJES', 'Accesorios/personal', 1),
(88, 'VENTILADORES', 'Accesorios/personal', 1),
(89, 'MALETINES', 'Seguridad', 1),
(90, 'ENERGIA', 'Seguridad', 1),
(91, 'ALARMAS', 'Seguridad', 1),
(92, 'CABLEADO ESTRUCTURADO', 'Seguridad', 1),
(93, 'CABLES', 'Seguridad', 1),
(94, 'CAMARAS', 'Seguridad', 1),
(95, 'VIDEO', 'Seguridad', 1),
(96, 'GAMES', 'Software/juegos', 1),
(98, 'SOFTWARE', 'Software/juegos', 1),
(101, 'POLIZA DE SERVICIO', 'Garantias', 1),
(102, 'POLIZAS DE GARANTIA', 'Garantias', 1),
(103, 'POLIZA DE SERVICIO', 'Garantias', 1),
(104, 'CABLES', 'Electronica', 1),
(105, 'CABLEADO ESTRUCTURADO', 'Electronica', 1),
(106, 'ENERGIA', 'Electronica', 1),
(107, 'HERRAMIENTAS', 'Electronica', 1),
(110, 'PCÂ´S', 'Miscelaneo', 1),
(113, 'PIZARRON', 'Miscelaneo', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
