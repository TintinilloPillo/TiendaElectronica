-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2022 a las 03:49:30
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_electronica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id_componente` int(11) NOT NULL,
  `componente` varchar(60) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `costo_compra` decimal(10,0) NOT NULL,
  `costo_venta` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id_componente`, `componente`, `stock`, `id_proveedor`, `estado`, `costo_compra`, `costo_venta`) VALUES
(1, 'Led RGB', 30, 1, 'No', '8', '10'),
(3, 'PIR', 5, 2, 'No', '90', '108');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo_stock`
--

CREATE TABLE `nuevo_stock` (
  `id_nuevo` int(11) NOT NULL,
  `id_componente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nuevo_stock`
--

INSERT INTO `nuevo_stock` (`id_nuevo`, `id_componente`, `cantidad`) VALUES
(1, 1, 20);

--
-- Disparadores `nuevo_stock`
--
DELIMITER $$
CREATE TRIGGER `addstock` AFTER INSERT ON `nuevo_stock` FOR EACH ROW UPDATE componentes SET stock=(stock)+new.cantidad WHERE id_componente=new.id_componente
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_fisicos`
--

CREATE TABLE `pagos_fisicos` (
  `id_pago` int(11) NOT NULL,
  `no_compra` int(11) NOT NULL,
  `pago` decimal(10,0) NOT NULL,
  `cambio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_fisicos`
--

INSERT INTO `pagos_fisicos` (`id_pago`, `no_compra`, `pago`, `cambio`) VALUES
(1, 1, '10', '50'),
(11, 2, '50', '40'),
(12, 2, '500', '490');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `proveedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `proveedor`) VALUES
(1, 'Farnell'),
(2, 'Mouser Electronics'),
(3, 'RS Components'),
(4, 'Digi-Key');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `componente` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `componente`, `cantidad`) VALUES
(1, 'Cautin', 2),
(2, 'Led Rojo', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `no_compra` int(11) NOT NULL,
  `id_componente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cliente`, `no_compra`, `id_componente`, `cantidad`, `fecha_hora`, `subtotal`) VALUES
(1, 'ROSA MELCACHO', 1, 1, 5, '2022-12-21 19:10:50', '50'),
(2, 'ZACARIAS BLANCO', 2, 2, 1, '2022-12-21 20:14:04', '10');

--
-- Disparadores `ventas`
--
DELIMITER $$
CREATE TRIGGER `decremtstock` BEFORE INSERT ON `ventas` FOR EACH ROW UPDATE componentes SET stock=(stock)-new.cantidad WHERE id_componente=new.id_componente
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id_componente`);

--
-- Indices de la tabla `nuevo_stock`
--
ALTER TABLE `nuevo_stock`
  ADD PRIMARY KEY (`id_nuevo`);

--
-- Indices de la tabla `pagos_fisicos`
--
ALTER TABLE `pagos_fisicos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id_componente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nuevo_stock`
--
ALTER TABLE `nuevo_stock`
  MODIFY `id_nuevo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos_fisicos`
--
ALTER TABLE `pagos_fisicos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
