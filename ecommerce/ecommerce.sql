-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2017 a las 17:00:14
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentarios` int(8) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(8) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `calificacion` int(1) NOT NULL,
  PRIMARY KEY (`id_comentarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentarios`, `id_usuario`, `id_producto`, `comentario`, `calificacion`) VALUES
(1, 0, 4, 'fg', 1),
(2, 0, 4, 'sgf', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustar`
--

CREATE TABLE IF NOT EXISTS `gustar` (
  `id_gustar` int(8) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(8) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `Like` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_gustar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `imagen` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `existencias` int(3) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `imagen`, `precio`, `categoria`, `descripcion`, `fabricante`, `existencias`) VALUES
(2, 'CONTROL LOGITECH F310 PC ALAMBRICO', '500004O-500x500.jpg', '495.93', 'accesorios', '', 'Logitech', 5),
(3, 'CONTROL LOGITECH F710 PC INALAMBRICO', '500004Q-500x500.jpg', '900.55', 'accesorios', '', 'Logitech', 5),
(4, 'CAMARA VIDEOCONFERENCIA LOGITEC BCC950 HD ', '500004Z-500x500.jpg', '4972.83', 'accesorios', '', 'Logitech', 5),
(5, 'CALCULADORA CANON F-604 CIENTIFICA 142 FUNCIONES', '5910049-500x500.jpg', '86.83', 'accesorios', '', 'Canon', 5),
(6, 'CALCULADORA CANON HS-1000TG ECOLOGICA 10 DIGITOS', '59100CG-500x500.jpg', '91.96', 'accesorios', '', 'Canon', 5),
(7, 'CALCULADORA LS100TS 10 DIGITOS DISENO METALICO', '5910065-500x500.jpg', '85.98', 'accesorios', '', 'Canon', 5),
(8, 'FILTRO DE PRIVACIDAD 19.0" PARA NOTEBOOK Y LCD', '4910021-500x500.jpg', '780.36', 'accesorios', '', '3M', 5),
(9, 'FILTRO DE PRIVACIDAD 13.3W9', '491004A-500x500.jpg', '722.62', 'accesorios', '', '3M', 0),
(10, 'FILTRO PF 12.5 W', '491004M-500x500.jpg', '697.60', 'accesorios', '', '3M', 0),
(11, 'INTEL XEON 6C PROCESSOR MODEL E5-2420V2 80W 2.2GHz', '69108XH-500x500.jpg', '17648.16', 'almacenamiento', '', 'Lenovo', 7),
(12, 'KINGSTON 4G DIMM DDR3 1600 ECC LV LENOVO 0C19499', '45400W8-500x500.jpg', '765.61', 'almacenamiento', '', 'Kingston', 99),
(13, 'MICRO SDHC CLASE 4 8GB + ADAPTADOR', '210016J-500x500.jpg', '57.32', 'almacenamiento', '', 'Toshiba', 4),
(14, '3TB CANVIO DESK ESCRITORIO EXTERNAL DRIVE NEGRO', '21000Z1-500x500.jpg', '2208.30', 'almacenamiento', '', 'Toshiba', 2),
(15, '1TB CANVIO SLIM II MAC PLATA ', '21000Z0-500x500.jpg', '1442.68', 'almacenamiento', '', 'Toshiba', 1),
(16, 'DISCO DURO INTERNO WD GREEN 1TB 3.5" SATA 6GB/S, 64', '51400DB-500x500.jpg', '1318.64', 'almacenamiento', '', 'OEM Generic Parts', 66),
(17, 'DISCO DURO TOSHIBA INTERNO 500G B NOTEBOOK 2.5"', '210011Q-500x500.jpg', '1001.07', 'almacenamiento', '', 'Toshiba', 6),
(18, 'IBM 1TB 3.5IN SFF HS 7.2K 6GBPS NL SS SATA', '69106EG-500x500.jpg', '4792.12', 'almacenamiento', '', 'Lenovo', 777),
(19, 'IBM 1TB 7.2K 6GBPS NL SATA 3.5IN G2HS HDD', '69107Y6-500x500.jpg', '3812.87', 'almacenamiento', '', 'Lenovo', 354),
(20, 'CAMARA WEB LOGITECH C930E FULL HD PTZ OPTICO 4X', '500005G-500x500.jpg', '2671.08', 'audio_y_video', '', 'Logitech', 54),
(21, 'CAMARA WEB LOGITECH C525 HD720P FOTO 8MPX', '91400AS-500x500.jpg', '640.72', 'audio_y_video', '', 'Logitech', 32),
(22, 'CAMARA WEB LOGITECH C270 HD720P FOTO 3PMPX', '91400BG-500x500.jpg', '480.32', 'audio_y_video', '', 'Logitech', 1),
(23, 'CAMARA WEB LOGITECH C170 VGA MICROFONO CLIP', '91400AN-500x500.jpg', '229.90', 'audio_y_video', '', 'Logitech', 23),
(24, 'AUTO ESTEREO XPLOD SONY, CD P/SMARTPHONE', '903011G-500x500.jpg', '2999.79', 'audio_y_video', '', 'Sony', 25),
(25, 'AMPLIFICADOR XPLOD SONY N1004 1000W', '903018I-500x500.jpg', '1999.57', 'audio_y_video', '', 'Sony', 111),
(26, 'AUTO ESTEREO XPLOD SONY USB,AUXILIAR,AM/FM', '903011F-500x500.jpg', '1198.89', 'audio_y_video', '', 'Sony', 4),
(27, 'OCINAS XPLOD 85W SONY (1 PAR) COAXIALES,4 VIAS', '903014O-500x500.jpg', '1099.44', 'audio_y_video', '', 'Sony', 8),
(28, 'BOCINA LOGITECH MINI Z50 MULTIM EDIA NEGRO 3.5MM', '91400ER-500x500.jpg', '165.31', 'audio_y_video', '', 'Logitech', 19),
(29, 'HP 705G1 SFF A10PRO 47850B 8GB 1TB WIN8.1PRODW7', '52300RH-500x500.jpg', '11508.10', 'computadoras', '', 'Hewlett Packard', 4),
(30, 'DT ACER AXC-703-MO44 PEN-J29 8G 1T FREEDOS', '34602AL-500x500.jpg', '7386.00', 'computadoras', '', 'Acer', 7),
(31, 'AIO ASPIRE AZ1-611-MW41 19.5" CEL QUAD 4G 500G W8.1', '34602C5-500x500.jpg', '7155.25', 'computadoras', '', 'Acer', 5),
(32, 'HP 205 AIO 18.5" DC AMD E1-6010 4G 500G WIN 8.1 EM', '52300UH-500x500.jpg', '6929.84', 'computadoras', '', 'Hewlett Packard', 5),
(33, 'AIO ASPIRE AZ1-601-MW51 18.5 CEL-QN294 2G 500G 1WTY', '34602BR-500x500.jpg', '5931.13', 'computadoras', '', 'Acer', 6),
(34, 'AIO ACER AZ1-601-MW52A 18.5" CEL N2840 2G 500G W8', '34602AN-500x500.jpg', '5930.91', 'computadoras', '', 'Acer', 8),
(35, 'HP,405G2,MT,E1-6050,4GB 500GB,WIN8.1EM ,1/1/1,SSMULTI', '52300RO-500x500.jpg', '5895.63', 'computadoras', '', 'Hewlett Packard', 8),
(36, 'DT ASPIRE AXC-703-MO52 CQC J1900 2G 500GB W8.1', '34602C2-500x500.jpg', '4684.12', 'computadoras', '', 'Acer', 7),
(37, 'HP260 DMINI,CEL-2957U,4GB,500GB WIFI,FREEDOS,1/1/1', '52300SU-500x500.jpg', '4619.54', 'computadoras', '', 'Hewlett Packard', 0),
(39, 'GEARS TRIPLE PACK XBOX 360 SPAN LATAM NTSC DVD', '47500LY-500x500.jpg', '509.98', 'videojuegos', '', 'Microsoft', 3),
(40, 'XBOX ONE MINECRAFT', '4750101-500x500.jpg', '777.77', 'videojuegos', '', 'Microsoft', 777),
(41, 'HALO REACH XBOX 360 SPANISH RESURTIDO LATAM NTS', '47500KG-500x500.jpg', '339.79', 'videojuegos', '', 'Microsoft', 4),
(42, 'HALO 3 XBOX 360 STD ED STANDAR EDITION SPANISH', '475005R-500x500.jpg', '339.79', 'videojuegos', '', 'Microsoft', 4),
(43, 'GEARS OF WAR 3 XBOX 360 SPANISH LATAM NTSC DVD', '47500LK-500x500.jpg', '339.79', 'videojuegos', '', 'Microsoft', 4),
(44, 'HALO ODST XBOX 360 SPANISH LATAM NTSC DVD', '47500FT-500x500.jpg', '254.40', 'videojuegos', '', 'Microsoft', 2),
(45, 'GEARS OF WAR XBOX 360 SPANISH NTC DVD XBOX360', '475003Z-500x500.jpg', '254.40', 'videojuegos', '', 'Microsoft', 3),
(46, 'FORZA 4 XBOX 360 SPANISH LATAM NTSC DVD', '47500LU-500x500.jpg', '254.40', 'videojuegos', '', 'Microsoft', 2),
(47, 'KINECT DANCE CENTRAL 2 LATAM NTSC DVD', '47500MK-500x500.jpg', '608.72', 'videojuegos', '', 'Microsoft', 7),
(48, 'POWER STRIP 16 CONTACTOS LONG. DEL EQUIPO 48"', '9160021-500x500.jpg', '908.04', 'energia', '', 'Tripp Lite', 3),
(49, 'NOBREAK C/REG ELEC 450VA 17 MIN C/1PC 8 CONTACTOS', '751000K-500x500.jpg', '755.99', 'energia', '', 'Sola Basic', 4),
(50, 'COMPENSADOR DE VOLTAJE PARA REFRIGERADOR', '751001E-500x500.jpg', '726.68', 'energia', '', 'Sola Basic', 7),
(51, 'REG 500 WATS, SUPRESI8N PICOS RUIDOS, 8 CONTACTOS', '91600BM-500x500.jpg', '456.16', 'energia', '', 'Tripp Lite', 23),
(52, 'REGULADOR ELECTR8NICO SLIM VOLT VOLT1300VA', '751000X-500x500.jpg', '235.46', 'energia', '', 'Sola Basic', 6),
(53, 'MONITOR SAMSUNG 46" LED .', '881014G-500x500.jpg', '31304.90', 'pantallas', '', 'Samsung', 1),
(54, 'TV SONY BRAVIA LED 48"SMART TV USB,2 HDMI', '903016P-500x500.jpg', '10150.11', 'pantallas', '', 'Sony', 1),
(55, 'TV LG 43" LED, SMART, 2CH 20 W WEB-OS, 3 HDMI, 3USB', '56300SB-500x500.jpg', '8099.22', 'pantallas', '', 'LG Electronics', 4),
(56, 'TV LED 40 SAMSUNG HD USB HDMI RF COMPONENT', '881014F-500x500.jpg', '7839.37', 'pantallas', '', 'Samsung', 4),
(57, 'TV LED 32 SAMSUNG HD USB HDMI RF COMPONENT', '88100YK-500x500.jpg', '4977.75', 'pantallas', '', 'Samsung', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
