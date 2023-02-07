-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2023 a las 16:04:24
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
  `tarjeta` int(11) NOT NULL,
  `fechaCaducidad` text COLLATE utf8_spanish_ci NOT NULL,
  `csc` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `postal` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_compra` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `tarjeta`, `fechaCaducidad`, `csc`, `status`, `nombre`, `apellido`, `calle`, `direccion`, `postal`, `cedula`, `id_cliente`, `total`, `fecha_compra`) VALUES
(8, 2147483647, '11/28', 445, 'COMPLETED', 'Jair', 'Morocho', 'Av. Quito', 'Cumbaya e2324', 123458, 1723430573, 1, '122.80', '2023-02-05 00:05:36'),
(9, 2147483647, '11/28', 445, 'COMPLETED', 'Jair', 'Morocho', 'Av. Quito', 'Cumbaya e2324', 123458, 1723430573, 1, '850.00', '2023-02-05 00:06:11'),
(10, 2147483647, '11/28', 228, 'COMPLETED', 'Jair', 'Morocho', 'Av. Quito', 'Cumbaya, 2020 E12', 123459, 1723430573, 9, '122.80', '2023-02-06 11:18:00');

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
(35, 8, 3, 'Tarjeta Gráfica', '23.75', 2),
(36, 8, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(37, 9, 4, 'Celular', '850.00', 1),
(38, 10, 1, 'Memoria Corsair Rgb Pro 8gb', '75.30', 1),
(39, 10, 3, 'Tarjeta Gráfica', '23.75', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_login`
--

CREATE TABLE `error_login` (
  `id` int(11) NOT NULL,
  `campo` varchar(100) NOT NULL,
  `error` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `error_login`
--

INSERT INTO `error_login` (`id`, `campo`, `error`, `fecha`) VALUES
(1, 'username', 'Campo vacio', '2023-01-27 11:49:56'),
(2, 'password', 'Campo vacio', '2023-01-27 11:49:56'),
(3, 'password', 'Campo vacio', '2023-01-27 11:59:06'),
(4, 'username', 'Campo vacio', '2023-01-27 11:59:29'),
(5, 'username', 'Campo vacio', '2023-01-27 11:59:40'),
(6, 'password', 'Campo vacio', '2023-01-27 11:59:40'),
(7, 'username', 'menor a 6 caracteres', '2023-01-27 12:06:42'),
(8, 'password', 'menor a 8 caracteres', '2023-01-27 12:06:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_registro`
--

CREATE TABLE `error_registro` (
  `id` int(11) NOT NULL,
  `campo` varchar(100) NOT NULL,
  `error` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `error_registro`
--

INSERT INTO `error_registro` (`id`, `campo`, `error`, `fecha`) VALUES
(58, 'cedula', 'numero incorrecto', '2023-01-23 10:17:07'),
(59, 'cedula', 'numero incorrecto', '2023-01-23 10:22:02'),
(60, 'cedula', 'numero incorrecto', '2023-01-23 10:35:21'),
(61, 'apellidos', 'Contiene numeros', '2023-01-23 10:35:22'),
(62, 'nombres', 'Contiene numeros', '2023-01-23 10:35:22'),
(63, 'cedula', 'numero incorrecto', '2023-01-23 10:57:04'),
(64, 'nombres', 'Contiene numeros', '2023-01-23 10:57:05'),
(65, 'apellidos', 'Contiene numeros', '2023-01-23 10:57:05'),
(66, 'telefono', 'Contiene letras', '2023-01-23 10:57:05'),
(67, 'dni', 'Contiene letras', '2023-01-23 10:57:05'),
(68, 'nombres', 'Contiene numeros', '2023-01-23 11:06:56'),
(69, 'cedula', 'numero incorrecto', '2023-01-23 11:06:56'),
(70, 'apellidos', 'Contiene numeros', '2023-01-23 11:06:56'),
(71, 'nombres', 'Campo vacio', '2023-01-23 11:06:57'),
(72, 'apellidos', 'Campo vacio', '2023-01-23 11:06:57'),
(73, 'username', 'Campo vacio', '2023-01-23 11:06:57'),
(74, 'pass', 'Campo vacio', '2023-01-23 11:06:57'),
(75, 'pass_repeat', 'Campo vacio', '2023-01-23 11:06:57'),
(76, 'email', 'Campo vacio', '2023-01-23 11:06:57'),
(77, 'dni', 'Campo vacio', '2023-01-23 11:06:57'),
(78, 'telefono', 'Campo vacio', '2023-01-23 11:06:57'),
(79, 'cedula', 'numero incorrecto', '2023-01-23 11:07:46'),
(80, 'nombres', 'Contiene numeros', '2023-01-23 11:07:46'),
(81, 'apellidos', 'Contiene numeros', '2023-01-23 11:07:46'),
(82, 'nombres', 'Campo vacio', '2023-01-23 11:07:46'),
(83, 'apellidos', 'Campo vacio', '2023-01-23 11:07:46'),
(84, 'username', 'Campo vacio', '2023-01-23 11:07:46'),
(85, 'pass', 'Campo vacio', '2023-01-23 11:07:46'),
(86, 'pass_repeat', 'Campo vacio', '2023-01-23 11:07:47'),
(87, 'email', 'Campo vacio', '2023-01-23 11:07:47'),
(88, 'dni', 'Campo vacio', '2023-01-23 11:07:47'),
(89, 'telefono', 'Campo vacio', '2023-01-23 11:07:47'),
(90, 'cedula', 'numero incorrecto', '2023-01-23 11:09:16'),
(91, 'nombres', 'Campo vacio', '2023-01-23 11:09:16'),
(92, 'pass', 'Campo vacio', '2023-01-23 11:09:16'),
(93, 'apellidos', 'Campo vacio', '2023-01-23 11:09:16'),
(94, 'username', 'Campo vacio', '2023-01-23 11:09:16'),
(95, 'pass_repeat', 'Campo vacio', '2023-01-23 11:09:16'),
(96, 'email', 'Campo vacio', '2023-01-23 11:09:16'),
(97, 'dni', 'Campo vacio', '2023-01-23 11:09:16'),
(98, 'telefono', 'Campo vacio', '2023-01-23 11:09:16'),
(99, 'nombres', 'Campo vacio', '2023-01-23 11:09:52'),
(100, 'apellidos', 'Campo vacio', '2023-01-23 11:09:52'),
(101, 'username', 'Campo vacio', '2023-01-23 11:09:52'),
(102, 'pass', 'Campo vacio', '2023-01-23 11:09:52'),
(103, 'pass_repeat', 'Campo vacio', '2023-01-23 11:09:52'),
(104, 'email', 'Campo vacio', '2023-01-23 11:09:52'),
(105, 'dni', 'Campo vacio', '2023-01-23 11:09:52'),
(106, 'telefono', 'Campo vacio', '2023-01-23 11:09:52'),
(107, 'nombres', 'Campo vacio', '2023-01-23 23:18:46'),
(108, 'pass_repeat', 'Campo vacio', '2023-01-23 23:18:46'),
(109, 'email', 'Campo vacio', '2023-01-23 23:18:46'),
(110, 'apellidos', 'Campo vacio', '2023-01-23 23:18:46'),
(111, 'pass', 'Campo vacio', '2023-01-23 23:18:46'),
(112, 'username', 'Campo vacio', '2023-01-23 23:18:46'),
(113, 'dni', 'Campo vacio', '2023-01-23 23:18:46'),
(114, 'telefono', 'Campo vacio', '2023-01-23 23:18:46'),
(115, 'telefono', 'sobre pasa numero de caracteres 14', '2023-01-23 23:20:35'),
(116, 'nombres', 'Campo vacio', '2023-01-23 23:20:36'),
(117, 'apellidos', 'Campo vacio', '2023-01-23 23:20:36'),
(118, 'pass', 'Campo vacio', '2023-01-23 23:20:36'),
(119, 'pass_repeat', 'Campo vacio', '2023-01-23 23:20:36'),
(120, 'username', 'Campo vacio', '2023-01-23 23:20:36'),
(121, 'email', 'Campo vacio', '2023-01-23 23:20:36'),
(122, 'dni', 'Campo vacio', '2023-01-23 23:20:36'),
(123, 'cedula', 'numero incorrecto', '2023-01-23 23:24:52'),
(124, 'telefono', 'sobre pasa numero de caracteres 14', '2023-01-23 23:24:52'),
(125, 'cedula', 'numero incorrecto', '2023-01-23 23:25:34'),
(126, 'telefono', 'sobre pasa numero de caracteres 14', '2023-01-23 23:25:34'),
(127, 'telefono', 'sobre pasa numero de caracteres 14', '2023-01-23 23:26:10'),
(128, 'email', 'no contiene el formato', '2023-01-23 23:26:11'),
(129, 'passwords', 'no coinciden', '2023-01-23 23:38:02'),
(130, 'email', 'no contiene el formato', '2023-01-23 23:38:02'),
(131, 'email', 'no contiene el formato', '2023-01-23 23:46:32'),
(132, 'apellidos', 'Campo vacio', '2023-01-23 23:46:32'),
(133, 'pass', 'Campo vacio', '2023-01-23 23:46:32'),
(134, 'nombres', 'Campo vacio', '2023-01-23 23:46:32'),
(135, 'pass_repeat', 'Campo vacio', '2023-01-23 23:46:32'),
(136, 'username', 'Campo vacio', '2023-01-23 23:46:32'),
(137, 'dni', 'Campo vacio', '2023-01-23 23:46:33'),
(138, 'telefono', 'Campo vacio', '2023-01-23 23:46:33'),
(139, 'email', 'no contiene el formato', '2023-01-23 23:46:41'),
(140, 'username', 'Campo vacio', '2023-01-23 23:46:41'),
(141, 'apellidos', 'Campo vacio', '2023-01-23 23:46:41'),
(142, 'pass', 'Campo vacio', '2023-01-23 23:46:41'),
(143, 'nombres', 'Campo vacio', '2023-01-23 23:46:41'),
(144, 'pass_repeat', 'Campo vacio', '2023-01-23 23:46:41'),
(145, 'dni', 'Campo vacio', '2023-01-23 23:46:41'),
(146, 'telefono', 'Campo vacio', '2023-01-23 23:46:41'),
(147, 'usuario', 'usuario existe', '2023-01-27 21:33:20'),
(148, 'usuario', 'usuario existe', '2023-01-27 21:33:25'),
(149, 'usuario', 'usuario existe', '2023-01-27 21:33:47'),
(150, 'email', 'no contiene el formato', '2023-02-06 11:16:05'),
(151, 'email', 'no contiene el formato', '2023-02-06 11:16:09');

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
(18, 'Ha cambiado el avatar', '2023-01-20 20:31:20', 1, 1, 1),
(19, 'Ha cambiado el avatar', '2023-02-06 11:17:02', 1, 1, 9);

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
-- Estructura de tabla para la tabla `registro_errores_sesion`
--

CREATE TABLE `registro_errores_sesion` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `tabla` varchar(100) NOT NULL,
  `campo` varchar(200) NOT NULL,
  `error` varchar(200) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_errores_sesion`
--

INSERT INTO `registro_errores_sesion` (`id`, `id_login`, `tabla`, `campo`, `error`, `fecha`) VALUES
(1, 20, 'miperfil', 'password_new', 'campo vacio', '2023-01-28 17:32:29'),
(2, 20, 'miperfil', 'password_old', 'Campo vacio', '2023-01-28 17:33:01'),
(3, 20, 'miperfil', 'password_nuevo', 'Campo vacio', '2023-01-28 17:33:01'),
(4, 20, 'miperfil', 'password_repeat', 'Campo vacio', '2023-01-28 17:33:01'),
(5, 20, 'miperfil', 'email', 'no contiene el formato', '2023-01-28 17:33:40'),
(6, 20, 'miperfil', 'nombres_mod', 'Campo vacio', '2023-01-28 17:33:40'),
(7, 20, 'miperfil', 'email', 'no contiene el formato', '2023-01-28 17:39:20'),
(8, 20, 'miperfil', 'email', 'no contiene el formato', '2023-01-28 17:39:36'),
(9, 20, 'miperfil', 'email', 'no contiene el formato', '2023-01-28 17:40:15'),
(10, 20, 'miperfil', 'email', 'no contiene el formato', '2023-01-28 17:41:11'),
(11, 20, 'miperfil', 'email', 'no contiene el formato', '2023-01-28 17:41:23'),
(12, 20, 'miperfil', 'cedula', 'numero incorrecto', '2023-01-28 17:45:04'),
(13, 20, 'miperfil', 'cedula', 'numero incorrecto', '2023-01-28 17:45:34'),
(14, 20, 'miperfil', 'apellidos_mod', 'Contiene numeros', '2023-01-28 17:45:34'),
(15, 20, 'miperfil', 'cedula', 'numero incorrecto', '2023-01-28 17:45:53'),
(16, 20, 'miperfil', 'nombres_mod', 'Contiene numeros', '2023-01-28 17:45:53'),
(17, 20, 'miperfil', 'apellidos_mod', 'Contiene numeros', '2023-01-28 17:45:53'),
(18, 20, 'miperfil', 'nombres_mod', 'Contiene numeros', '2023-01-28 17:46:13'),
(19, 20, 'miperfil', 'passwords', 'no coinciden', '2023-01-28 17:46:36'),
(20, 20, 'miperfil', 'pass', 'menor a 8 caracteres', '2023-01-28 17:46:36'),
(21, 20, 'miperfil', 'pass_repeat', 'menor a 8 caracteres', '2023-01-28 17:46:36'),
(22, 20, 'miperfil', 'password_old', 'Campo vacio', '2023-01-28 17:46:36'),
(23, 20, 'miperfil', 'pass', 'menor a 8 caracteres', '2023-01-28 23:01:57'),
(24, 20, 'miperfil', 'pass_repeat', 'menor a 8 caracteres', '2023-01-28 23:01:57'),
(25, 20, 'miperfil', 'password_old', 'Campo vacio', '2023-01-28 23:01:58'),
(26, 20, 'compra', 'tarjeta', 'Campo vacio', '2023-01-28 23:02:21'),
(27, 20, 'compra', 'fechaCaducidad', 'Campo vacio', '2023-01-28 23:02:21'),
(28, 20, 'compra', 'csc', 'Campo vacio', '2023-01-28 23:02:21'),
(29, 20, 'compra', 'nombre', 'Campo vacio', '2023-01-28 23:02:21'),
(30, 20, 'compra', 'apellido', 'Campo vacio', '2023-01-28 23:02:21'),
(31, 20, 'compra', 'calle', 'Campo vacio', '2023-01-28 23:02:21'),
(32, 20, 'compra', 'direccion', 'Campo vacio', '2023-01-28 23:02:21'),
(33, 20, 'compra', 'postal', 'Campo vacio', '2023-01-28 23:02:21'),
(34, 20, 'compra', 'cedula', 'Campo vacio', '2023-01-28 23:02:21'),
(35, 20, 'compra', 'fechaCaducidad', 'Campo vacio', '2023-01-28 23:02:51'),
(36, 20, 'compra', 'nombre', 'Contiene menos de 2 caracteres', '2023-01-28 23:17:35'),
(37, 20, 'compra', 'cedula', 'numero incorrecto', '2023-01-28 23:17:35'),
(38, 20, 'compra', 'apellido', 'Contiene menos de 2 caracteres', '2023-01-28 23:17:35'),
(39, 20, 'compra', 'calle', 'Contiene menos de 2 caracteres', '2023-01-28 23:17:35'),
(40, 20, 'compra', 'direccion', 'Contiene menos de 2 caracteres', '2023-01-28 23:17:35'),
(41, 20, 'compra', 'fecha_caducidad', 'No contiene el formato adecuado', '2023-01-28 23:38:48'),
(42, 20, 'compra', 'fecha_caducidad', 'Año fuera de rango', '2023-01-28 23:39:08'),
(43, 20, 'compra', 'fecha_caducidad', 'Año bien, mes fuera de rango', '2023-01-28 23:39:17'),
(44, 26, 'compra', 'fecha_caducidad', 'No contiene el formato adecuado', '2023-02-06 11:38:51'),
(45, 26, 'compra', 'tarjeta', 'Campo vacio', '2023-02-06 11:38:52'),
(46, 26, 'compra', 'fechaCaducidad', 'Campo vacio', '2023-02-06 11:38:52'),
(47, 26, 'compra', 'csc', 'Campo vacio', '2023-02-06 11:38:52'),
(48, 26, 'compra', 'nombre', 'Campo vacio', '2023-02-06 11:38:52'),
(49, 26, 'compra', 'apellido', 'Campo vacio', '2023-02-06 11:38:52'),
(50, 26, 'compra', 'calle', 'Campo vacio', '2023-02-06 11:38:52'),
(51, 26, 'compra', 'direccion', 'Campo vacio', '2023-02-06 11:38:52'),
(52, 26, 'compra', 'postal', 'Campo vacio', '2023-02-06 11:38:52'),
(53, 26, 'compra', 'cedula', 'Campo vacio', '2023-02-06 11:38:52'),
(54, 26, 'compra', 'fecha_caducidad', 'No contiene el formato adecuado', '2023-02-06 11:39:13'),
(55, 26, 'compra', 'tarjeta', 'Campo vacio', '2023-02-06 11:39:13'),
(56, 26, 'compra', 'nombre', 'Campo vacio', '2023-02-06 11:39:13'),
(57, 26, 'compra', 'apellido', 'Campo vacio', '2023-02-06 11:39:13'),
(58, 26, 'compra', 'fechaCaducidad', 'Campo vacio', '2023-02-06 11:39:13'),
(59, 26, 'compra', 'csc', 'Campo vacio', '2023-02-06 11:39:13'),
(60, 26, 'compra', 'calle', 'Campo vacio', '2023-02-06 11:39:13'),
(61, 26, 'compra', 'direccion', 'Campo vacio', '2023-02-06 11:39:14'),
(62, 26, 'compra', 'postal', 'Campo vacio', '2023-02-06 11:39:14'),
(63, 26, 'compra', 'cedula', 'Campo vacio', '2023-02-06 11:39:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_login`
--

CREATE TABLE `registro_login` (
  `id_login` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `numero_transacciones` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_login`
--

INSERT INTO `registro_login` (`id_login`, `id_usuario`, `fecha`, `numero_transacciones`) VALUES
(1, 1, '2023-01-20 15:08:19', 0),
(2, 1, '2023-01-21 19:09:53', 0),
(3, 1, '2023-01-21 19:09:53', 0),
(4, 1, '2023-01-21 21:39:11', 0),
(5, 1, '2023-01-21 21:41:40', 0),
(6, 1, '2023-01-21 22:20:18', 0),
(7, 1, '2023-01-21 22:39:30', 0),
(8, 1, '2023-01-24 10:27:30', 0),
(9, 1, '2023-01-27 10:46:53', 0),
(10, 1, '2023-01-27 11:50:27', 0),
(11, 1, '2023-01-27 12:20:01', 0),
(12, 1, '2023-01-27 12:24:14', 0),
(13, 1, '2023-01-27 15:38:56', 0),
(14, 1, '2023-01-27 15:41:14', 0),
(15, 1, '2023-01-27 19:01:12', 0),
(16, 1, '2023-01-27 21:02:14', 0),
(17, 1, '2023-01-27 21:05:35', 0),
(18, 1, '2023-01-27 22:07:16', 0),
(19, 1, '2023-01-28 12:12:56', 0),
(20, 1, '2023-01-28 15:25:52', 2),
(21, 1, '2023-02-03 19:25:52', 0),
(22, 1, '2023-02-04 21:15:01', 0),
(23, 1, '2023-02-04 21:16:21', 0),
(24, 1, '2023-02-04 21:29:54', 4),
(25, 8, '2023-02-06 11:15:07', 0),
(26, 9, '2023-02-06 11:16:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_paginas`
--

CREATE TABLE `registro_paginas` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `pagina` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_paginas`
--

INSERT INTO `registro_paginas` (`id`, `id_login`, `pagina`, `fecha`) VALUES
(1, 12, 'index.php', '2023-01-27 15:29:30'),
(2, 1, 'detalles.php', '2023-01-27 15:37:08'),
(3, 1, 'detalles.php', '2023-01-27 15:38:09'),
(4, 1, 'detalles.php', '2023-01-27 15:39:30'),
(5, 14, 'detalles.php', '2023-01-27 15:41:17'),
(6, 14, 'detalles.php', '2023-01-27 15:51:01'),
(7, 14, 'index.php', '2023-01-27 16:12:13'),
(8, 14, 'detalles.php', '2023-01-27 16:12:18'),
(9, 14, 'detalles.php', '2023-01-27 16:12:27'),
(10, 14, 'checkout.php', '2023-01-27 16:12:35'),
(11, 14, 'ayuda.php', '2023-01-27 16:15:14'),
(12, 14, 'ayuda.php', '2023-01-27 16:16:18'),
(13, 14, 'checkout.php', '2023-01-27 16:16:54'),
(14, 14, 'mi_perfil.php', '2023-01-27 16:17:06'),
(15, 14, 'espanol.php', '2023-01-27 16:33:31'),
(16, 14, 'espanol.php', '2023-01-27 16:33:57'),
(17, 14, 'espanol.php', '2023-01-27 16:34:52'),
(18, 14, 'index.php', '2023-01-27 16:34:57'),
(19, 14, 'espanol.php', '2023-01-27 16:35:09'),
(20, 14, 'ingles.php', '2023-01-27 16:35:58'),
(21, 14, 'espanol.php', '2023-01-27 16:36:09'),
(22, 14, 'mi_perfil.php', '2023-01-27 16:36:31'),
(23, 14, 'ingles.php', '2023-01-27 16:47:34'),
(24, 14, 'espanol.php', '2023-01-27 16:47:50'),
(25, 14, 'mi_perfil.php', '2023-01-27 16:47:53'),
(26, 14, 'index.php', '2023-01-27 16:50:14'),
(27, 14, 'mi_perfil.php', '2023-01-27 16:50:17'),
(28, 14, 'index.php', '2023-01-27 16:50:19'),
(29, 14, 'miperfil.php', '2023-01-27 16:50:33'),
(30, 14, 'checkout.php', '2023-01-27 16:50:35'),
(31, 14, 'ingles.php', '2023-01-27 16:50:39'),
(32, 14, 'espanol.php', '2023-01-27 16:50:48'),
(33, 14, 'checkout.php', '2023-01-27 16:51:10'),
(34, 14, 'checkout.php', '2023-01-27 17:20:52'),
(35, 14, 'index.php', '2023-01-27 17:21:04'),
(36, 14, 'checkout.php', '2023-01-27 17:22:26'),
(37, 14, 'index.php', '2023-01-27 17:24:07'),
(38, 14, 'mi_perfil.php', '2023-01-27 17:34:52'),
(39, 14, 'checkout.php', '2023-01-27 17:49:17'),
(40, 14, 'pago.php', '2023-01-27 17:55:02'),
(41, 14, 'index.php', '2023-01-27 18:15:27'),
(42, 14, 'checkout.php', '2023-01-27 18:15:29'),
(43, 14, 'pago.php', '2023-01-27 18:15:31'),
(44, 14, 'index.php', '2023-01-27 18:16:59'),
(45, 14, 'checkout.php', '2023-01-27 18:17:00'),
(46, 14, 'pago.php', '2023-01-27 18:17:02'),
(47, 14, 'checkout.php', '2023-01-27 18:17:17'),
(48, 14, 'pago.php', '2023-01-27 18:17:19'),
(49, 14, 'index.php', '2023-01-27 18:19:13'),
(50, 14, 'logout.php', '2023-01-27 18:43:10'),
(51, 15, 'checkout.php', '2023-01-27 19:01:17'),
(52, 15, 'pago.php', '2023-01-27 19:01:32'),
(53, 15, 'index.php', '2023-01-27 20:01:16'),
(54, 15, 'mi_perfil.php', '2023-01-27 20:03:11'),
(55, 15, 'checkout.php', '2023-01-27 20:43:08'),
(56, 15, 'pago.php', '2023-01-27 20:43:13'),
(57, 15, 'index.php', '2023-01-27 20:53:35'),
(58, 15, 'checkout.php', '2023-01-27 20:53:41'),
(59, 15, 'pago.php', '2023-01-27 20:53:47'),
(60, 15, 'logout.php', '2023-01-27 20:59:55'),
(61, 16, 'checkout.php', '2023-01-27 21:02:18'),
(62, 16, 'pago.php', '2023-01-27 21:02:20'),
(63, 16, 'logout.php', '2023-01-27 21:03:19'),
(64, 17, 'checkout.php', '2023-01-27 21:05:38'),
(65, 17, 'pago.php', '2023-01-27 21:05:41'),
(66, 17, 'logout.php', '2023-01-27 21:33:12'),
(67, 18, 'checkout.php', '2023-01-27 22:07:22'),
(68, 18, 'pago.php', '2023-01-27 22:07:24'),
(69, 19, 'checkout.php', '2023-01-28 12:12:59'),
(70, 19, 'pago.php', '2023-01-28 12:13:01'),
(71, 19, 'checkout.php', '2023-01-28 14:43:25'),
(72, 19, 'checkout.php', '2023-01-28 14:43:31'),
(73, 19, 'index.php', '2023-01-28 14:43:33'),
(74, 19, 'checkout.php', '2023-01-28 14:43:36'),
(75, 19, 'pago.php', '2023-01-28 14:43:38'),
(76, 19, 'checkout.php', '2023-01-28 15:11:46'),
(77, 19, 'pago.php', '2023-01-28 15:11:47'),
(78, 19, 'checkout.php', '2023-01-28 15:12:17'),
(79, 19, 'pago.php', '2023-01-28 15:17:48'),
(80, 19, 'checkout.php', '2023-01-28 15:18:44'),
(81, 19, 'index.php', '2023-01-28 15:18:45'),
(82, 19, 'logout.php', '2023-01-28 15:25:44'),
(83, 20, 'checkout.php', '2023-01-28 15:25:59'),
(84, 20, 'pago.php', '2023-01-28 15:26:10'),
(85, 20, 'checkout.php', '2023-01-28 15:27:25'),
(86, 20, 'pago.php', '2023-01-28 15:27:27'),
(87, 20, 'index.php', '2023-01-28 16:17:30'),
(88, 20, 'mi_perfil.php', '2023-01-28 16:17:35'),
(89, 20, 'checkout.php', '2023-01-28 21:32:36'),
(90, 20, 'pago.php', '2023-01-28 21:32:38'),
(91, 20, 'mi_perfil.php', '2023-01-28 23:01:49'),
(92, 20, 'checkout.php', '2023-01-28 23:02:17'),
(93, 20, 'pago.php', '2023-01-28 23:02:19'),
(94, 20, 'index.php', '2023-01-28 23:17:08'),
(95, 20, 'checkout.php', '2023-01-28 23:17:09'),
(96, 20, 'pago.php', '2023-01-28 23:17:10'),
(97, 20, 'checkout.php', '2023-01-28 23:28:14'),
(98, 20, 'pago.php', '2023-01-28 23:28:17'),
(99, 20, 'checkout.php', '2023-01-28 23:31:31'),
(100, 20, 'pago.php', '2023-01-28 23:31:33'),
(101, 20, 'checkout.php', '2023-01-28 23:35:28'),
(102, 20, 'pago.php', '2023-01-28 23:35:30'),
(103, 20, 'checkout.php', '2023-01-28 23:37:59'),
(104, 20, 'pago.php', '2023-01-28 23:38:02'),
(105, 20, 'logout.php', '2023-01-28 23:43:21'),
(106, 21, 'ayuda.php', '2023-02-03 19:26:51'),
(107, 21, 'index.php', '2023-02-03 19:29:40'),
(108, 22, 'checkout.php', '2023-02-04 21:15:05'),
(109, 22, 'index.php', '2023-02-04 21:15:15'),
(110, 22, 'detalles.php', '2023-02-04 21:15:24'),
(111, 22, 'logout.php', '2023-02-04 21:15:37'),
(112, 23, 'ayuda', '2023-02-04 21:16:25'),
(113, 23, 'ayuda', '2023-02-04 21:16:40'),
(114, 23, 'checkout.php', '2023-02-04 21:17:00'),
(115, 23, 'index.php', '2023-02-04 21:17:03'),
(116, 23, 'logout.php', '2023-02-04 21:17:20'),
(117, 24, 'mi_perfil.php', '2023-02-04 21:29:59'),
(118, 24, 'index.php', '2023-02-04 21:33:35'),
(119, 24, 'ayuda', '2023-02-04 21:33:37'),
(120, 24, 'ayuda', '2023-02-04 21:49:22'),
(121, 24, 'index.php', '2023-02-04 21:49:27'),
(122, 24, 'detalles.php', '2023-02-04 21:55:27'),
(123, 24, 'ayuda', '2023-02-04 21:55:29'),
(124, 24, 'index.php', '2023-02-04 21:55:44'),
(125, 24, 'checkout.php', '2023-02-04 22:01:11'),
(126, 24, 'checkout.php', '2023-02-04 22:01:31'),
(127, 24, 'index.php', '2023-02-04 22:01:34'),
(128, 24, 'checkout.php', '2023-02-04 22:01:52'),
(129, 24, 'index.php', '2023-02-04 22:01:55'),
(130, 24, 'mi_perfil.php', '2023-02-04 22:01:58'),
(131, 24, 'index.php', '2023-02-04 22:13:31'),
(132, 24, 'mi_perfil.php', '2023-02-04 22:13:35'),
(133, 24, 'index.php', '2023-02-04 22:42:11'),
(134, 24, 'checkout.php', '2023-02-04 22:42:15'),
(135, 24, 'pago.php', '2023-02-04 22:42:17'),
(136, 24, 'checkout.php', '2023-02-04 22:46:48'),
(137, 24, 'pago.php', '2023-02-04 22:46:55'),
(138, 24, 'mi_perfil.php', '2023-02-04 23:20:27'),
(139, 24, 'checkout.php', '2023-02-05 00:05:05'),
(140, 24, 'index.php', '2023-02-05 00:05:06'),
(141, 24, 'checkout.php', '2023-02-05 00:05:11'),
(142, 24, 'pago.php', '2023-02-05 00:05:16'),
(143, 24, 'mi_perfil.php', '2023-02-05 00:05:43'),
(144, 24, 'index.php', '2023-02-05 00:05:50'),
(145, 24, 'checkout.php', '2023-02-05 00:05:54'),
(146, 24, 'pago.php', '2023-02-05 00:05:55'),
(147, 24, 'mi_perfil.php', '2023-02-05 00:06:17'),
(148, 26, 'mi_perfil.php', '2023-02-06 11:16:31'),
(149, 26, 'checkout.php', '2023-02-06 11:17:13'),
(150, 26, 'index.php', '2023-02-06 11:17:15'),
(151, 26, 'checkout.php', '2023-02-06 11:17:21'),
(152, 26, 'pago.php', '2023-02-06 11:17:27'),
(153, 26, 'mi_perfil.php', '2023-02-06 11:18:07'),
(154, 26, 'index.php', '2023-02-06 11:18:15'),
(155, 26, 'ayuda', '2023-02-06 11:20:16'),
(156, 26, 'checkout.php', '2023-02-06 11:38:47'),
(157, 26, 'pago.php', '2023-02-06 11:38:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_transaccion`
--

CREATE TABLE `registro_transaccion` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT current_timestamp(),
  `transaccion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_transaccion`
--

INSERT INTO `registro_transaccion` (`id`, `id_login`, `fecha_inicio`, `fecha_fin`, `transaccion`) VALUES
(1, 14, '2023-01-27 18:17:02', '2023-01-27 18:17:02', 0),
(2, 14, '2023-01-27 18:17:19', '2023-01-27 18:17:19', 0),
(3, 15, '2023-01-27 19:01:32', '2023-01-27 19:01:32', 0),
(4, 15, '2023-01-27 20:43:13', '2023-01-27 20:43:13', 0),
(5, 15, '2023-01-27 20:53:47', '2023-01-27 20:53:47', 0),
(6, 16, '2023-01-27 21:02:20', '2023-01-27 21:02:20', 0),
(7, 17, '2023-01-27 21:05:41', '2023-01-27 21:05:41', 0),
(8, 18, '2023-01-27 22:07:25', '2023-01-27 22:07:25', 0),
(9, 19, '2023-01-28 12:13:01', '2023-01-28 12:13:01', 0),
(10, 19, '2023-01-28 14:43:38', '2023-01-28 14:43:38', 0),
(11, 19, '2023-01-28 15:11:47', '2023-01-28 15:11:47', 0),
(12, 19, '2023-01-28 15:17:48', '2023-01-28 15:17:48', 0),
(13, 20, '2023-01-28 15:26:10', '2023-01-28 15:26:27', 1),
(14, 20, '2023-01-28 15:27:27', '2023-01-28 15:27:27', 0),
(15, 20, '2023-01-28 21:32:38', '2023-01-28 21:32:38', 0),
(16, 20, '2023-01-28 23:02:19', '2023-01-28 23:02:19', 0),
(17, 20, '2023-01-28 23:17:11', '2023-01-28 23:17:11', 0),
(18, 20, '2023-01-28 23:28:17', '2023-01-28 23:28:17', 0),
(19, 20, '2023-01-28 23:31:33', '2023-01-28 23:31:33', 0),
(20, 20, '2023-01-28 23:35:30', '2023-01-28 23:35:30', 0),
(21, 20, '2023-01-28 23:38:02', '2023-01-28 23:39:33', 1),
(22, 24, '2023-02-04 22:42:17', '2023-02-04 22:43:04', 1),
(23, 24, '2023-02-04 22:46:55', '2023-02-04 22:47:12', 1),
(24, 24, '2023-02-05 00:05:16', '2023-02-05 00:05:37', 1),
(25, 24, '2023-02-05 00:05:55', '2023-02-05 00:06:11', 1),
(26, 26, '2023-02-06 11:17:27', '2023-02-06 11:18:00', 1),
(27, 26, '2023-02-06 11:38:49', '2023-02-06 11:38:49', 0);

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
(8, 'codewar2', 'AkNPdU/uBMaf76DACNjfoQ==', 'Jair', 'Morocho', NULL, NULL, 1723430573, 'jairmorocho99@gmail.com', 987819453, 'user_default.png', 'A', 2),
(9, 'jairmorocho99', 'AkNPdU/uBMaf76DACNjfoQ==', 'Jair', 'Morocho', NULL, NULL, 1723430573, 'jairmorocho99@gmail.com', 987819453, '63e127fedc282-jair.PNG', 'A', 2);

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
-- Indices de la tabla `error_login`
--
ALTER TABLE `error_login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `error_registro`
--
ALTER TABLE `error_registro`
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
-- Indices de la tabla `registro_errores_sesion`
--
ALTER TABLE `registro_errores_sesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_login_errores_sesion_fk` (`id_login`);

--
-- Indices de la tabla `registro_login`
--
ALTER TABLE `registro_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `registro_paginas`
--
ALTER TABLE `registro_paginas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_login_paginas_registro_fk` (`id_login`);

--
-- Indices de la tabla `registro_transaccion`
--
ALTER TABLE `registro_transaccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_login_registro_transaccion_fk` (`id_login`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `error_login`
--
ALTER TABLE `error_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `error_registro`
--
ALTER TABLE `error_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT de la tabla `registro_errores_sesion`
--
ALTER TABLE `registro_errores_sesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `registro_login`
--
ALTER TABLE `registro_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `registro_paginas`
--
ALTER TABLE `registro_paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `registro_transaccion`
--
ALTER TABLE `registro_transaccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Filtros para la tabla `registro_errores_sesion`
--
ALTER TABLE `registro_errores_sesion`
  ADD CONSTRAINT `registro_login_errores_sesion_fk` FOREIGN KEY (`id_login`) REFERENCES `registro_login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_paginas`
--
ALTER TABLE `registro_paginas`
  ADD CONSTRAINT `registro_login_paginas_registro_fk` FOREIGN KEY (`id_login`) REFERENCES `registro_login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_transaccion`
--
ALTER TABLE `registro_transaccion`
  ADD CONSTRAINT `registro_login_registro_transaccion_fk` FOREIGN KEY (`id_login`) REFERENCES `registro_login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
