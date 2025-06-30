-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2025 a las 16:14:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_lagomancuello`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id`, `descripcion`) VALUES
(1, 'Panel'),
(2, 'Regulador'),
(3, 'Inversor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `mensaje` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `mail`, `mensaje`) VALUES
(13, 'USUARIOTEST', 'usertest@gmail.con', 'Hola, tienen panel de 100w en stock?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `codPostal` varchar(5) NOT NULL,
  `metodoEnvio` varchar(20) NOT NULL,
  `precioEnvio` float(10,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id`, `orderID`, `direccion`, `ciudad`, `provincia`, `codPostal`, `metodoEnvio`, `precioEnvio`, `fecha`) VALUES
(9, 8, 'junin 741', 'Corrientes', 'Corrientes', '3400', '1', 0.00, '2025-06-17'),
(10, 9, 'junin 741', 'Corrientes', 'Corrientes', '3400', '2', 0.00, '2025-06-17'),
(11, 10, 'junin 741', 'Corrientes', 'Corrientes', '3400', '2', 0.00, '2025-06-19'),
(12, 11, 'junin 741', 'Corrientes', 'Corrientes', '3400', '1', 0.00, '2025-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total_venta` float(10,2) NOT NULL,
  `tipoPagoId` int(11) NOT NULL,
  `tarjeta` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`id`, `userID`, `fecha`, `total_venta`, `tipoPagoId`, `tarjeta`) VALUES
(8, 21, '2025-06-17 02:29:43', 120000.00, 1, '1234567891234567'),
(9, 21, '2025-06-17 02:57:48', 120000.00, 2, '1234567891234567'),
(10, 21, '2025-06-19 13:05:54', 120000.00, 1, '1234567891234567'),
(11, 21, '2025-06-25 18:48:17', 2040000.00, 1, '1234567891234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id`, `orderID`, `productID`, `price`, `cantidad`) VALUES
(24, 9, 1, 120000.00, 1),
(25, 10, 1, 120000.00, 1),
(26, 11, 1, 120000.00, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` double NOT NULL,
  `img` varchar(255) NOT NULL,
  `stock` int(224) DEFAULT NULL,
  `categoriaID` int(11) DEFAULT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `descripcion`, `precio`, `img`, `stock`, `categoriaID`, `activado`) VALUES
(1, 'Panel Solar 100W', 'Panel Solar Enertik Monocristalino 100W', 120000, 'assets/img/panelSolar100w.jpg', 100, 2, 1),
(3, 'Panel Solar 200W', 'Panel Solar Monocristalino Tecnología PERC HC 200w 120 Celdas', 12300, 'assets/img/panelSolar200W.jpg', 0, 1, 1),
(5, 'Panel Solar 380W', 'Panel Solar Monocristalino Tecnología PERC HC 380w 120 Celdas', 140000, 'assets/img/panelSolar380W.jpg', 15, 1, 1),
(6, 'Regulador 100V', 'Regulador de Carga Solar MSC MPPT 100V 20A 12/24V', 70000, 'assets/img/regulador100v.jpg', 15, 2, 1),
(7, 'Regulador 200V', 'Regulador de Carga Solar Tracer MPPT 200V 60A 12/24/36/48V', 130000, 'assets/img/regulador200v.jpg', 8, 2, 1),
(8, 'Inversor Cargador 220v', 'Inversor Cargador MultiPlus Compact 12/2000/80-30 220V VE.Bus', 40000, 'assets/img/Inversor220v.jpg', 12, 3, 1),
(9, 'Inversor Cargador 230V ', 'Inversor Cargador Multiplus 12/3000/120-16 230V VE.Bus', 60000, 'assets/img/Inversor230v.jpg', 12, 3, 1),
(17, 'Panel Solar 200W', 'Panel Solar Monocristalino Tecnología PERC HC 200w 120 Celdas', 123000, 'assets/img/panelSolar200W.jpg', 50, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id`, `descripcion`) VALUES
(1, 'debito'),
(2, 'credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `apellido` varchar(64) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `codpostal` varchar(20) DEFAULT NULL,
  `tarjeta` char(16) DEFAULT NULL,
  `usuario` varchar(64) NOT NULL,
  `perfilID` int(11) DEFAULT NULL,
  `baja` tinyint(1) DEFAULT 0,
  `password` varchar(100) NOT NULL,
  `loggedIn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userID`, `nombre`, `apellido`, `mail`, `direccion`, `ciudad`, `provincia`, `codpostal`, `tarjeta`, `usuario`, `perfilID`, `baja`, `password`, `loggedIn`) VALUES
(20, 'admin', 'test', 'admintest@gmail.com', NULL, NULL, NULL, NULL, NULL, 'admintest', 1, 0, '$2y$10$zSTQELmfWAduNlImovjH3uOskw2a0w14kz/S8N/TqGGPC7hPYYB/e', 1),
(21, 'user', 'test', 'usertest@gmail.com', 'Junin', '700', 'Corrientes', '3400', '1234567891234567', 'usertest', 2, 0, '$2y$10$3eA5xVYKAmcrHp/iSkndkOpiz9.2xa2uBVM4W6B7.2kCTDX7aWXFK', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`orderID`);

--
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `fk_tipo_pago` (`tipoPagoId`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaID` (`categoriaID`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `perfilID` (`perfilID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`);

--
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_tipo_pago` FOREIGN KEY (`tipoPagoId`) REFERENCES `tipo_pago` (`id`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoriaID` FOREIGN KEY (`categoriaID`) REFERENCES `categoria_producto` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `perfilID` FOREIGN KEY (`perfilID`) REFERENCES `perfil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
