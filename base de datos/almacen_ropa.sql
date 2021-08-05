-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2021 a las 22:09:50
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `desc_almacen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `direccion`, `id_usuario`, `desc_almacen`) VALUES
(2, 'Calle Mijael Suarez 5to pisosss', 1, 'Pantalones jeans'),
(3, 'Calle Nueva Zelanda', 2, 'Chamarras'),
(4, 'calle esteban perales', 1, 'Ropa infantil'),
(7, 'Calle L. Cabrera', 1, 'Manga Sport');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cli` varchar(50) NOT NULL,
  `apellido_pat_cli` varchar(50) NOT NULL,
  `apellido_mat_cli` varchar(50) NOT NULL,
  `ci_cliente` varchar(50) NOT NULL,
  `telefono_cli` varchar(50) NOT NULL,
  `direccion_cli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cli`, `apellido_pat_cli`, `apellido_mat_cli`, `ci_cliente`, `telefono_cli`, `direccion_cli`) VALUES
(3, 'Gorbernacion municipal', '', '', '9632147369', '4124587 -3697842', 'Centro de la plaza'),
(4, 'elmer', 'urtado', 'Zambrana', '123456789', '1111', 'calle siempre viva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `id_venta`, `id_producto`, `precio`, `cantidad`, `importe`) VALUES
(39, 30, 2, '150.00', 2, '300.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_almacen`
--

CREATE TABLE `ingreso_almacen` (
  `id_ingreso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_almacen`
--

INSERT INTO `ingreso_almacen` (`id_ingreso`, `id_producto`, `cantidad`, `id_almacen`, `fecha_hora`) VALUES
(73, 26, 45, 2, '2021-05-17 20:54:18'),
(74, 27, 28, 2, '2021-05-17 20:54:39'),
(75, 26, 80, 2, '2021-05-17 21:08:14'),
(76, 28, 45, 2, '2021-05-18 17:24:09'),
(77, 10, 25, 2, '2021-05-26 17:09:46'),
(78, 25, 31, 2, '2021-05-26 17:11:02'),
(79, 26, 14, 2, '2021-05-27 17:55:38'),
(80, 29, 25, 2, '2021-05-27 17:58:24'),
(81, 30, 80, 2, '2021-05-27 17:59:55'),
(82, 5, 30, 2, '2021-05-29 18:06:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_tienda`
--

CREATE TABLE `ingreso_tienda` (
  `id_ingreso_tienda` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_tienda`
--

INSERT INTO `ingreso_tienda` (`id_ingreso_tienda`, `id_producto`, `cantidad`, `id_tienda`, `fecha_hora`) VALUES
(1, 7, 100, 5, '2021-04-06 21:44:59'),
(2, 7, 100, 5, '2021-04-06 21:48:36'),
(3, 2, 50, 5, '2021-04-06 21:49:16'),
(4, 5, 20, 5, '2021-07-19 17:41:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `categoria` varchar(50) CHARACTER SET utf8 NOT NULL,
  `talla` varchar(20) CHARACTER SET utf8 NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8u;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`, `categoria`, `talla`, `precio`, `color`) VALUES
(2, 'JEANS FIT NIKE', 'Pantalones jeans', '36', '150.00', 'Azul'),
(5, 'JEANS FIT NIKE ', 'Pantalones jeans', '40', '20.00', 'Negro'),
(10, 'Pantalones chup', 'Pantalones jeans', '42', '55.00', 'Azul'),
(12, 'JEANS FIT NIKE', 'Pantalones jeans', '40', '52.00', 'Gris'),
(13, 'JEANS FIT NIKE', 'Pantalones jeans', '38', '56.00', 'Marron'),
(14, 'JEANS FIT NIKE', 'Pantalones jeans', '38', '60.00', 'blanco'),
(15, 'JEANS FIT NIKE', 'Pantalones jeans', '38', '150.00', 'Azul'),
(16, 'JEANS FIT NIKE', 'Pantalones jeans', '40', '150.00', 'Azul'),
(17, 'JEANS FIT NIKE', 'Pantalones jeans', '44', '150.00', 'Azul'),
(18, 'JEANS FIT NIKE', 'Pantalones jeans', '46', '150.00', 'Azul'),
(19, 'JEANS FIT NIKE', 'Pantalones jeans', '48', '150.00', 'Azul'),
(20, 'JEANS FIT NIKE', 'Pantalones jeans', '50', '150.00', 'Azul'),
(21, 'JEANS FIT NIKE', 'Pantalones jeans', '52', '150.00', 'Azul'),
(22, 'JEANS FIT NIKE', 'Pantalones jeans', '54', '150.00', 'Azul'),
(23, 'JEANS FIT NIKE', 'Pantalones jeans', '42', '150.00', 'Azul'),
(25, 'Pantalones chup', 'Pantalones jeans', '42', '55.00', 'Negro'),
(26, 'Pantalones chup', 'Pantalones jeans', '42', '55.00', 'blanco'),
(27, 'Pantalones chup', 'Pantalones jeans', '40', '70.00', 'negro'),
(28, 'Pantalones chup', 'Pantalones jeans', '54', '70.00', 'Azul'),
(29, 'Pantalones chup', 'Pantalones jeans', '50', '60.00', 'Marron'),
(30, 'Pantalones chup', 'Pantalones jeans', '40', '60.00', 'Gris');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_prov` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nit` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8u;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_prov`, `nit`, `telefono`, `direccion`) VALUES
(7, 'Alianza Moda', '456789', '12234', 'Calle Fe y alegria #346');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_almacen`
--

CREATE TABLE `stock_almacen` (
  `id_stock_almacen` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock_almacen`
--

INSERT INTO `stock_almacen` (`id_stock_almacen`, `id_producto`, `id_almacen`, `stock`) VALUES
(11, 2, 2, -15),
(12, 15, 2, -6),
(13, 16, 2, 15),
(14, 23, 2, 17),
(15, 17, 2, 50),
(16, 18, 2, 60),
(17, 19, 2, 70),
(18, 20, 2, 80),
(19, 21, 2, 90),
(20, 22, 2, 135),
(21, 10, 2, 55),
(23, 27, 2, 28),
(24, 28, 2, 20),
(25, 25, 2, 31),
(26, 26, 2, 14),
(27, 29, 2, 25),
(28, 30, 2, 80),
(29, 5, 2, 30),
(30, 2, 4, 25),
(31, 15, 3, 26),
(32, 28, 3, 25),
(33, 23, 4, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_tienda`
--

CREATE TABLE `stock_tienda` (
  `id_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock_tienda`
--

INSERT INTO `stock_tienda` (`id_stock`, `id_producto`, `id_tienda`, `stock`) VALUES
(2, 2, 5, 118),
(5, 16, 5, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id_tienda` int(11) NOT NULL,
  `nombre_tienda` varchar(30) NOT NULL,
  `dir_tienda` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tel_contacto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id_tienda`, `nombre_tienda`, `dir_tienda`, `id_usuario`, `tel_contacto`) VALUES
(5, 'Moda bella', 'Av. Santa Ander', 2, '47845');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspaso_almacen`
--

CREATE TABLE `traspaso_almacen` (
  `id_traspaso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_almacen_origen` int(11) NOT NULL,
  `id_almacen_destino` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspaso_tienda`
--

CREATE TABLE `traspaso_tienda` (
  `id_traspaso_tienda` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_almacen_origen` int(11) NOT NULL,
  `id_tienda_destino` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `traspaso_tienda`
--

INSERT INTO `traspaso_tienda` (`id_traspaso_tienda`, `id_producto`, `cantidad`, `id_almacen_origen`, `id_tienda_destino`, `fecha_hora`) VALUES
(1, 2, 10, 2, 1, '2021-04-05 22:19:59'),
(2, 2, 50, 2, 1, '2021-04-05 23:48:23'),
(3, 2, 5, 2, 5, '2021-04-06 20:09:01'),
(4, 16, 40, 2, 5, '2021-07-19 21:20:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usu` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_pat` varchar(20) NOT NULL,
  `apellido_mat` varchar(20) NOT NULL,
  `ci` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usu`, `password`, `categoria`, `nombre`, `apellido_pat`, `apellido_mat`, `ci`) VALUES
(1, 'admin', 'password', 'administrador', 'wilfredo', 'Saez', 'Garcia', '7904767'),
(2, 'dani', 'admindani', 'cajero', 'Daniel', 'Lanno', 'Artiaga', '659726');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` varchar(100) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `total_venta` decimal(10,2) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_cliente`, `id_tienda`, `total_venta`, `fecha_hora`) VALUES
(30, 'prueba', 5, '300.00', '2021-07-28 19:56:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `ingreso_almacen`
--
ALTER TABLE `ingreso_almacen`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `ingreso_tienda`
--
ALTER TABLE `ingreso_tienda`
  ADD PRIMARY KEY (`id_ingreso_tienda`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `stock_almacen`
--
ALTER TABLE `stock_almacen`
  ADD PRIMARY KEY (`id_stock_almacen`);

--
-- Indices de la tabla `stock_tienda`
--
ALTER TABLE `stock_tienda`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `traspaso_almacen`
--
ALTER TABLE `traspaso_almacen`
  ADD PRIMARY KEY (`id_traspaso`);

--
-- Indices de la tabla `traspaso_tienda`
--
ALTER TABLE `traspaso_tienda`
  ADD PRIMARY KEY (`id_traspaso_tienda`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ingreso_almacen`
--
ALTER TABLE `ingreso_almacen`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `ingreso_tienda`
--
ALTER TABLE `ingreso_tienda`
  MODIFY `id_ingreso_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `stock_almacen`
--
ALTER TABLE `stock_almacen`
  MODIFY `id_stock_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `stock_tienda`
--
ALTER TABLE `stock_tienda`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `traspaso_almacen`
--
ALTER TABLE `traspaso_almacen`
  MODIFY `id_traspaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `traspaso_tienda`
--
ALTER TABLE `traspaso_tienda`
  MODIFY `id_traspaso_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
