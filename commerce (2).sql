-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2023 a las 05:05:49
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`, `id_provincia`) VALUES
(1, 'Quito', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES
(1, '7JU23351GL552662W', '2023-01-19 05:11:46', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '362.60'),
(2, '2DH73695CR4544357', '2023-01-19 05:21:32', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '231.70'),
(3, '2ND530095E9872445', '2023-01-20 04:36:21', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '118.75'),
(4, '62H69352T7558815P', '2023-01-20 18:12:59', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '99.05'),
(5, '0FD643178M327574G', '2023-01-20 18:17:44', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '122.80'),
(6, '7TJ22515MC1774004', '2023-01-20 18:24:34', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '249.65'),
(7, '2YX171563B3720226', '2023-01-20 18:28:41', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '324.95'),
(8, '6N084680R53291420', '2023-01-20 18:36:45', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '194.05'),
(9, '7WG55727265953641', '2023-01-20 18:38:37', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '194.05'),
(10, '1TS61790T7900004W', '2023-01-20 18:42:56', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '194.05'),
(11, '4F074511RM840103R', '2023-01-20 19:14:34', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '570.55'),
(12, '5NN80481YN732721H', '2023-01-20 21:29:35', 'COMPLETED', 'sb-pkazc22343450@business.example.com', 'S5W3YKM7PJU3A', '372.45'),
(13, '64397031GE520643K', '2023-01-20 21:42:31', 'COMPLETED', 'jsalgadoa12901@gmail.com', '8N7YMSHYC6H6L', '71.25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'SIERRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 1, 'Memoria Corsair Rgb Pro 8gb', '112.95', 3),
(2, 1, 3, 'teclado', '23.75', 1),
(3, 2, 3, 'teclado', '23.75', 5),
(4, 2, 1, 'Memoria Corsair Rgb Pro 8gb', '112.95', 1),
(5, 3, 3, 'Tarjeta Gráfica', '23.75', 5),
(6, 4, 3, 'Tarjeta Gráfica', '23.75', 1),
(7, 4, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(8, 5, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(9, 5, 3, 'Tarjeta Gráfica', '23.75', 2),
(10, 6, 3, 'Tarjeta Gráfica', '23.75', 1),
(11, 6, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 3),
(12, 7, 3, 'Tarjeta Gráfica', '23.75', 1),
(13, 7, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 4),
(14, 8, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(15, 8, 3, 'Tarjeta Gráfica', '23.75', 5),
(16, 9, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(17, 9, 3, 'Tarjeta Gráfica', '23.75', 5),
(18, 10, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(19, 10, 3, 'Tarjeta Gráfica', '23.75', 5),
(20, 11, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 6),
(21, 11, 3, 'Tarjeta Gráfica', '23.75', 5),
(22, 12, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 4),
(23, 12, 3, 'Tarjeta Gráfica', '23.75', 3),
(24, 13, 3, 'Tarjeta Gráfica', '23.75', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tipo_historial` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `descripcion`, `fecha`, `id_tipo_historial`, `id_modulo`, `id_usuario`) VALUES
(1, 'Cambiaste tu avatar de usuario', '2023-01-16 11:14:11', 1, 1, 1),
(2, 'Compraste un celular iphone 11', '2023-01-03 11:14:11', 2, 2, 1),
(3, 'Se elimino una direccion', '2023-01-03 11:24:40', 3, 1, 1),
(4, 'Se creo una direccion', '2023-01-15 11:24:40', 2, 1, 1),
(7, 'Cambiaste de nombre', '2023-01-15 11:25:36', 1, 1, 1),
(8, 'Cambiaste de numero de celular', '2023-01-01 11:25:36', 1, 1, 1),
(9, 'Compraste una licuadora', '2022-01-05 11:26:14', 2, 2, 1),
(10, 'Ha eliminado la dirección: Av. Americana', '2023-01-20 12:28:09', 3, 1, 1),
(11, 'Ha creado una nueva dirección Cumbaya e2324', '2023-01-20 12:29:05', 2, 1, 1),
(12, 'Ha cambiado el avatar', '2023-01-20 13:32:15', 1, 1, 1),
(13, 'Ha cambiado datos de sus perfil', '2023-01-20 13:32:25', 1, 1, 1),
(14, 'Ha cambiado el avatar', '2023-01-20 13:32:25', 1, 1, 1),
(15, 'Ha cambiado la contraseña', '2023-01-20 13:46:22', 1, 1, 1),
(16, 'Ha cambiado el avatar', '2023-01-20 17:01:19', 1, 1, 1),
(17, 'Ha cambiado el avatar', '2023-01-20 17:35:56', 1, 1, 1),
(18, 'Ha cambiado el avatar', '2023-01-20 20:31:20', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id`, `nombre`, `icono`, `estado`) VALUES
(1, 'Mi perfil', '<i class=\"fas fa-user bg-info\"></i>', 'A'),
(2, 'Mis compras', '<i class=\"fas fa-shopping-cart bg-success\"></i>', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `activo`) VALUES
(1, 'Memoria Corsair Rgb Pro 8gb', '16gb (2x8gb) Ddr4 3200mhz.', '125.50', 40, 1, 1),
(3, 'Tarjeta Gráfica', 'Es un teclado RGB', '25.00', 5, 1, 1),
(4, 'Celular', '12 GB\r\n1 TB\r\nTactil', '850.00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`, `id_departamento`) VALUES
(2, 'Pichincha', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_login`
--

CREATE TABLE `registro_login` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_login`
--

INSERT INTO `registro_login` (`id`, `id_usuario`, `fecha`) VALUES
(1, 1, '2023-01-20 15:08:19'),
(2, 1, '2023-01-21 19:09:53'),
(3, 1, '2023-01-21 19:09:53'),
(4, 1, '2023-01-21 21:39:11'),
(5, 1, '2023-01-21 21:41:40'),
(6, 1, '2023-01-21 22:20:18'),
(7, 1, '2023-01-21 22:39:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_historial`
--

CREATE TABLE `tipo_historial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_historial`
--

INSERT INTO `tipo_historial` (`id`, `nombre`, `icono`, `estado`) VALUES
(1, 'Editar', '<i class=\"far fa-edit\"></i>', 'A'),
(2, 'Crear', '<i class=\"fas fa-plus\"></i>', 'A'),
(3, 'Borrar', '<i class=\"far fa-trash-alt\"></i>', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`, `estado`) VALUES
(1, 'Root', 'A'),
(2, 'Cliente', 'A'),
(3, 'Vendedor', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `dni` int(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` int(12) DEFAULT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'user_default.png',
  `estado` varchar(100) NOT NULL DEFAULT 'A',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pass`, `nombres`, `apellidos`, `direccion`, `referencia`, `dni`, `email`, `telefono`, `avatar`, `estado`, `id_tipo`) VALUES
(1, 'codewar', 'ETxBe8vpOQjVQkrW1Ee/rQ==', 'Jair Alexis XD', 'Morocho Duran ', 'Calle Simon ', 'A la altura de la mansion del dean', 1723430573, 'jairmorocho99@gmail.com', 987819453, '63cb4068a6084-My photo - Fecha (1).jpg', 'A', 2),
(8, 'codewar2', 'AkNPdU/uBMaf76DACNjfoQ==', 'Jair', 'Morocho', NULL, NULL, 1723430573, 'jairmorocho99@gmail.com', 987819453, 'user_default.png', 'A', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ciudad`
--

CREATE TABLE `usuario_ciudad` (
  `id` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `referencia` varchar(250) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A',
  `latitud` varchar(100) DEFAULT NULL,
  `longitud` varchar(100) DEFAULT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_ciudad`
--

INSERT INTO `usuario_ciudad` (`id`, `direccion`, `referencia`, `estado`, `latitud`, `longitud`, `id_ciudad`, `id_usuario`) VALUES
(4, 'Cumbaya, 2020 E20', '', 'I', NULL, NULL, 1, 1),
(5, 'Cumbaya, 2020 E12', '', 'I', NULL, NULL, 1, 1),
(6, 'Cumbaya e2324', '', 'I', NULL, NULL, 1, 1),
(7, 'Cumbaya J20J12', '', 'I', NULL, NULL, 1, 1),
(8, 'Av. Americana', 'Frente al edificio x', 'I', NULL, NULL, 1, 1),
(9, 'Av Moran', 'frente al colegio San Isac', 'A', NULL, NULL, 1, 5),
(10, 'Av. Americana', 'Frente al edificio x', 'A', NULL, NULL, 1, 6),
(11, 'Av Moran', 'Frente al edificio x', 'A', NULL, NULL, 1, 7),
(12, 'Av. America', 'US edificio', 'I', NULL, NULL, 1, 1),
(13, 'Cumbaya e2324', 'Frente al edificio x', 'A', NULL, NULL, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_historial` (`id_tipo_historial`,`id_modulo`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `registro_login`
--
ALTER TABLE `registro_login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_historial`
--
ALTER TABLE `tipo_historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `usuario_ciudad`
--
ALTER TABLE `usuario_ciudad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ciudad` (`id_ciudad`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_login`
--
ALTER TABLE `registro_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_historial`
--
ALTER TABLE `tipo_historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario_ciudad`
--
ALTER TABLE `usuario_ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_tipo_historial`) REFERENCES `tipo_historial` (`id`),
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`);

--
-- Filtros para la tabla `usuario_ciudad`
--
ALTER TABLE `usuario_ciudad`
  ADD CONSTRAINT `usuario_ciudad_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_ciudad_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
