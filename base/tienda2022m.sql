-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2022 a las 23:25:46
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda2022m`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Tecnología'),
(2, 'Alimentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `usr` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `cedula`, `usr`, `pwd`) VALUES
(1, 'Alex', 'Cueva', '1753739695', 'alex', '2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `id` int(10) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `precioVenta` decimal(50,0) NOT NULL,
  `importe` decimal(50,0) NOT NULL,
  `idFactura` int(10) NOT NULL,
  `idProductos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`id`, `cantidad`, `precioVenta`, `importe`, `idFactura`, `idProductos`) VALUES
(1, 2, '15', '30', 1, 2),
(2, 1, '500', '500', 2, 1),
(3, 1, '500', '500', 3, 1),
(4, 1, '15', '15', 3, 2),
(5, 2, '34', '68', 4, 7),
(6, 2, '34', '68', 5, 7),
(7, 1, '300', '300', 5, 3),
(8, 2, '34', '68', 6, 7),
(9, 1, '300', '300', 6, 3),
(10, 2, '34', '68', 7, 7),
(11, 1, '300', '300', 7, 3),
(12, 2, '34', '68', 8, 7),
(13, 1, '300', '300', 8, 3),
(14, 2, '34', '68', 9, 7),
(15, 1, '300', '300', 9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` decimal(50,0) NOT NULL,
  `iva` decimal(50,0) NOT NULL,
  `apagar` decimal(50,0) NOT NULL,
  `idClientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `subtotal`, `iva`, `apagar`, `idClientes`) VALUES
(1, '2022-02-01', '30', '0', '30', 1),
(2, '2022-02-24', '500', '60', '560', 1),
(3, '2022-02-24', '515', '62', '577', 1),
(4, '2022-02-24', '68', '8', '76', 1),
(5, '2022-02-24', '368', '44', '412', 1),
(6, '2022-02-24', '368', '44', '412', 1),
(7, '2022-02-24', '368', '44', '412', 1),
(8, '2022-02-24', '368', '44', '412', 1),
(9, '2022-02-24', '368', '44', '412', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `precio` decimal(25,0) NOT NULL,
  `stock` int(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `importe` varchar(500) NOT NULL,
  `idCategoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `detalle`, `precio`, `stock`, `foto`, `importe`, `idCategoria`) VALUES
(1, 'Tv', 'Hauwei', 'Plasma', '500', 3, 'plasma.jpg', '', 1),
(2, 'Pizza', '', 'Masa delgada', '15', 5, 'pizza.jpg', '', 2),
(3, 'Televicion', 'Samsung', 'TV', '300', 300, 'TV.jpg', '', 1),
(4, 'Pruebas4', '', 'Pruebas4', '300', 300, 'producto.jpg', '', 1),
(5, 'Pruebas5', '', 'Pruebas5', '34', 34, 'producto.jpg', 'r', 2),
(6, 'Pruebas6', '', 'Pruebas6', '34', 34, 'producto.jpg', 'r', 2),
(7, 'Yamaha', 'Yamaha Ninja', 'Moto de carreras', '34', 34, 'yamaha.jpg', 'yu', 1),
(8, 'Yamaha', 'Yamaha Ninja', 'Moto de carreras', '34', 34, 'yamaha.jpg', 'yu', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usr` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `usr`, `pass`) VALUES
(1, 'Alex', 'Cueva', 'admin', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Productos_DetalleFac` (`idProductos`),
  ADD KEY `Factura_DetalleFac` (`idFactura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Clientes_Factura` (`idClientes`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Categoria_productos` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `Factura_DetalleFac` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Productos_DetalleFac` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `Clientes_Factura` FOREIGN KEY (`idClientes`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `Categoria_productos` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
