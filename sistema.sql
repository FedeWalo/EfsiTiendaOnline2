-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2019 a las 15:04:17
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `Nombre`) VALUES
(10, 'Bermudas'),
(11, 'Zapatillas'),
(12, 'Medias'),
(13, 'Pantalones'),
(14, 'Sweaters'),
(15, 'Botines'),
(16, 'Camisetas de Futbol'),
(17, 'Canilleras'),
(18, 'Calzoncillos'),
(19, 'CorpiÃ±os'),
(20, 'Jeans');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `Producto` varchar(30) NOT NULL,
  `FechaPedido` date NOT NULL,
  `FechaEnvio` date NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`idPedido`),
  UNIQUE KEY `idPedido_UNIQUE` (`idPedido`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `Usuario`, `Producto`, `FechaPedido`, `FechaEnvio`, `Cantidad`, `Precio`, `Estado`) VALUES
(1, 'Solana', 'a', '2018-03-14', '2019-09-11', 5, 10, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Codigo` varchar(10) NOT NULL,
  `Precio` float NOT NULL,
  `Descuento` int(11) NOT NULL,
  `StockMinimo` int(11) NOT NULL,
  `StockActual` int(11) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `DescripcionCorta` varchar(100) NOT NULL,
  `DescripcionLarga` varchar(255) NOT NULL,
  `Destacado` tinyint(4) NOT NULL,
  `OnSale` tinyint(4) NOT NULL,
  `MostrarHome` tinyint(4) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `Nombre`, `Codigo`, `Precio`, `Descuento`, `StockMinimo`, `StockActual`, `Categoria`, `Foto`, `Video`, `DescripcionCorta`, `DescripcionLarga`, `Destacado`, `OnSale`, `MostrarHome`) VALUES
(3, 'e', 'fe', 2, 2, 2, 2, '18', 'camiseta.jfif', '235235', '4thet', 'tuktuyk', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `idSlider` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Fotito` varchar(255) NOT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`idSlider`, `Nombre`, `Fotito`) VALUES
(6, 'slider1', 'slider1'),
(7, 'slider2', 'slider2'),
(8, 'slider3', 'slider3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Contrasenia` varchar(50) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Mail`, `Contrasenia`, `Estado`) VALUES
(1, 'Villagra', 'jmvillagra6@gmail.com', '123', 'Activo'),
(2, 'Solana', 'solizalatinik@gmail.com', '123', 'Activo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
