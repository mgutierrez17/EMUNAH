-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2025 a las 23:49:48
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
-- Base de datos: `costeos_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_almacen` varchar(50) NOT NULL,
  `direccion_almacen` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `nom_almacen`, `direccion_almacen`, `created_at`, `updated_at`) VALUES
(1, 'Almacén Norte', 'Calle 1, Zona Norte', '2025-05-12 00:11:10', '2025-05-12 04:20:49'),
(2, 'Almacén Sur', 'Avenida 9, Zona Sur', '2025-05-12 00:11:10', '2025-05-12 00:11:10'),
(3, 'Depósito Central', 'Km 7 Carretera al Norte', '2025-05-12 00:11:10', '2025-05-12 00:11:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_productos`
--

CREATE TABLE `almacen_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `almacen_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `cantidad_optima` int(11) NOT NULL,
  `cantidad_minima` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacen_productos`
--

INSERT INTO `almacen_productos` (`id`, `almacen_id`, `producto_id`, `stock`, `cantidad_optima`, `cantidad_minima`, `ubicacion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 138, 13, 'Estante C5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(2, 2, 1, 0, 142, 13, 'Estante C4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(3, 1, 2, 86, 96, 20, 'Estante B1', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(4, 2, 2, 90, 72, 29, 'Estante A3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(5, 1, 3, 65, 87, 28, 'Estante A4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(6, 2, 3, 29, 77, 28, 'Estante A3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(7, 1, 4, 0, 121, 20, 'Estante B3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(8, 2, 4, 0, 114, 26, 'Estante B4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(9, 1, 5, 0, 117, 39, 'Estante B5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(10, 2, 5, 0, 141, 29, 'Estante A4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(11, 1, 6, 36, 62, 32, 'Estante A2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(12, 2, 6, 0, 113, 35, 'Estante A3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(13, 1, 7, 0, 132, 21, 'Estante C3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(14, 2, 7, 0, 97, 13, 'Estante C4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(15, 1, 8, 87, 135, 34, 'Estante D5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(16, 2, 8, 0, 114, 29, 'Estante B1', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(17, 1, 9, 0, 63, 37, 'Estante B5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(18, 2, 9, 27, 88, 32, 'Estante C4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(19, 1, 10, 0, 113, 36, 'Estante D1', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(20, 2, 10, 17, 52, 32, 'Estante D5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(21, 1, 11, 0, 129, 19, 'Estante C5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(22, 2, 11, 0, 114, 27, 'Estante B2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(23, 1, 12, 0, 84, 21, 'Estante A5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(24, 2, 12, 0, 110, 22, 'Estante C4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(25, 1, 13, 63, 54, 28, 'Estante A5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(26, 2, 13, 0, 70, 15, 'Estante C4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(27, 1, 14, 37, 103, 12, 'Estante C5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(28, 2, 14, 0, 143, 36, 'Estante B2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(29, 1, 15, 0, 118, 26, 'Estante D3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(30, 2, 15, 0, 101, 21, 'Estante B1', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(31, 1, 16, 0, 70, 22, 'Estante D2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(32, 2, 16, 0, 95, 29, 'Estante A4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(33, 1, 17, 69, 50, 10, 'Estante D2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(34, 2, 17, 47, 125, 20, 'Estante A1', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(35, 1, 18, 29, 96, 18, 'Estante B2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(36, 2, 18, 0, 111, 39, 'Estante A2', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(37, 1, 19, 0, 51, 40, 'Estante A4', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(38, 2, 19, 77, 144, 15, 'Estante B5', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(39, 1, 20, 0, 88, 28, 'Estante D3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(40, 2, 20, 0, 99, 39, 'Estante C3', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(41, 1, 23, 0, 0, 0, '', '2025-05-12 05:07:40', '2025-05-12 05:07:40'),
(42, 2, 23, 0, 0, 0, '', '2025-05-12 05:07:40', '2025-05-12 05:07:40'),
(43, 3, 23, 0, 0, 0, '', '2025-05-12 05:07:40', '2025-05-12 05:07:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('emunah_srl_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1750081744),
('emunah_srl_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1750081744;', 1750081744),
('emunah_srl_cache_5dc869d1819b24bd26494b562ccb81c9', 'i:1;', 1750081669),
('emunah_srl_cache_5dc869d1819b24bd26494b562ccb81c9:timer', 'i:1750081669;', 1750081669),
('emunah_srl_cache_83dacac86f5ee86c0d26477f8925853d', 'i:1;', 1750196099),
('emunah_srl_cache_83dacac86f5ee86c0d26477f8925853d:timer', 'i:1750196099;', 1750196099),
('emunah_srl_cache_mgutierrez@levcorp.bo|127.0.0.1', 'i:1;', 1750081669),
('emunah_srl_cache_mgutierrez@levcorp.bo|127.0.0.1:timer', 'i:1750081669;', 1750081669);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_categoria` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nom_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Desinfectantes', '2025-05-11 22:08:33', '2025-05-11 22:08:33'),
(2, 'Detergentes', '2025-05-11 22:08:33', '2025-05-11 22:08:33'),
(3, 'Papel Higiénico', '2025-05-11 22:08:33', '2025-05-11 22:08:33'),
(4, 'Lavavajillas', '2025-05-11 22:08:33', '2025-05-11 22:08:33'),
(5, 'Ambientadores', '2025-05-11 22:08:33', '2025-05-12 03:52:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nom_cliente`, `nit`, `direccion`, `telefono`, `correo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'HOSPITAL DEL SUR', '12345678', 'Av. Blanco Galindo, Cochabamba', '71712345', 'contacto@hospitalsur.bo', 1, NULL, NULL),
(2, 'INDUSTRIAS PACENA S.A.', '10293847', 'Zona industrial, La Paz', '76543210', 'info@pacena.bo', 1, NULL, NULL),
(3, 'MARIA FERNÁNDEZ', '6543210', 'Calle Bolívar, Tarija', '70654321', 'mariaf@gmail.com', 1, NULL, NULL),
(4, 'FARMACIA CRUZ VERDE', '20486092', 'Av. Busch, Santa Cruz', '76439827', 'ventas@cruzverde.bo', 1, NULL, NULL),
(5, 'JUAN PÉREZ', '67890123', 'Av. Aroma, Oruro', '74839102', 'juan.perez@correo.com', 1, NULL, NULL),
(6, 'COOPERATIVA SAN MARTÍN', '12897465', 'Calle Sucre, Cochabamba', '73394012', 'contacto@sanmartin.bo', 1, NULL, NULL),
(7, 'UNIVALLE', '90128374', 'Km 6, Cochabamba', '72727182', 'info@univalle.edu.bo', 1, NULL, NULL),
(8, 'ANA MORALES', '34567891', 'Zona Norte, Santa Cruz', '75820394', 'ana.morales@yahoo.com', 1, NULL, NULL),
(9, 'TIENDA TODO HOGAR', '98345610', 'Calle Landaeta, La Paz', '76592830', 'ventas@todohogar.bo', 1, NULL, NULL),
(10, 'EMPRESA VITAL AGUA', '45321098', 'Av. Villazón, Cochabamba', '76451238', 'info@vitalagua.bo', 1, NULL, NULL),
(11, 'FERRETERÍA CENTRAL', '67584930', 'Zona Villa Fátima, La Paz', '74321984', 'ventas@ferrecentral.bo', 1, NULL, NULL),
(12, 'CLÍNICA SANTA MARÍA', '30948276', 'Av. Circunvalación, Cochabamba', '71123456', 'recepcion@santamaria.bo', 1, NULL, NULL),
(13, 'ESCUELA BÁSICA LOS ANDES', '38492038', 'Calle Colón, Potosí', '73928374', 'direccion@losandes.edu.bo', 1, NULL, NULL),
(14, 'JUVENTUD EMPRENDEDORA', '90127463', 'Av. Petrolera, El Alto', '76839201', 'info@juventud.bo', 1, NULL, NULL),
(15, 'ANA MARÍA QUISPE', '64738291', 'Barrio Ferroviario, Sucre', '75201384', 'ana.quispe@gmail.com', 1, NULL, '2025-05-15 05:23:16'),
(16, 'PAPELERÍA COLORÍN', '78392018', 'Calle Ingavi, Santa Cruz', '74483910', 'ventas@colorin.bo', 1, NULL, NULL),
(17, 'KIOSKO LAS DELICIAS', '98372018', 'Mercado Calatayud, Cochabamba', '73291038', 'kiosko@delicias.bo', 1, NULL, NULL),
(18, 'SOCIEDAD MÉDICA CENTRAL', '57283910', 'Av. San Martín, Beni', '70128347', 'contacto@socmed.bo', 1, NULL, NULL),
(19, 'VICTOR MAMANI', '81230498', 'Calle Pando, La Paz', '73560192', 'victor.mamani@hotmail.com', 1, NULL, NULL),
(20, 'COMERCIAL RUIZ S.R.L.', '74839201', 'Av. Blanco Galindo, Quillacollo', '75028391', 'contacto@comruiz.bo', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `telefono`, `direccion`, `correo`, `nit`, `logo`, `created_at`, `updated_at`) VALUES
(5, 'Emunah SRL', '1123', 'aqfff', 'a@gmail.com', '123456789', 'logo/t8scfHqtzOcqQnSPCrvukUQAIxSjzlnXv8AzxxOs.png', '2025-05-20 23:14:01', '2025-06-16 17:48:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_ingresos`
--

CREATE TABLE `guia_ingresos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_ingreso` varchar(255) DEFAULT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado_ingreso` enum('Pendiente','Completado','Anulado') NOT NULL DEFAULT 'Pendiente',
  `total_ingreso` decimal(10,2) NOT NULL DEFAULT 0.00,
  `descuento_ingreso` decimal(10,2) NOT NULL DEFAULT 0.00,
  `comentario` text DEFAULT NULL,
  `proveedor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guia_ingresos`
--

INSERT INTO `guia_ingresos` (`id`, `descripcion_ingreso`, `fecha_pedido`, `fecha_ingreso`, `estado_ingreso`, `total_ingreso`, `descuento_ingreso`, `comentario`, `proveedor_id`, `created_at`, `updated_at`) VALUES
(1, 'aaaaaaaaa', '2025-05-21', '2025-05-21', 'Pendiente', 11000.00, 0.00, NULL, 2, '2025-05-21 07:05:25', '2025-05-21 07:05:25'),
(2, 'bbbbbb', '2025-05-21', '2025-05-21', 'Pendiente', 1000.00, 0.00, NULL, 7, '2025-05-21 07:20:57', '2025-05-21 07:20:57'),
(3, 'ccccccc', '2025-05-21', '2025-05-21', 'Pendiente', 1500.00, 0.00, NULL, 2, '2025-05-21 07:39:54', '2025-05-21 07:39:54'),
(6, 'qqqqqqqaaaaaaaa', '2025-05-23', '2025-05-30', 'Pendiente', 10700.00, 50.00, NULL, 5, '2025-05-21 07:42:31', '2025-05-21 08:00:55'),
(9, 'rrrrrrrr', '2025-05-21', '2025-05-30', 'Pendiente', 1000.00, 0.00, NULL, 1, '2025-05-21 08:01:53', '2025-05-21 08:01:53'),
(10, 'aaaaaaaa', '2025-05-21', '2025-05-21', 'Anulado', 1200.00, 0.00, 'dddddddddddddd', 9, '2025-05-21 08:13:59', '2025-05-21 08:20:07'),
(11, 'aaaaaaaa', '2025-05-21', '2025-05-21', 'Completado', 1200.00, 0.00, 'dddddddddddddd', 9, '2025-05-21 08:19:58', '2025-05-21 08:19:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_ingreso_detalles`
--

CREATE TABLE `guia_ingreso_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guia_ingreso_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guia_ingreso_detalles`
--

INSERT INTO `guia_ingreso_detalles` (`id`, `guia_ingreso_id`, `producto_id`, `precio_unitario`, `cantidad`, `precio_total`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 10.00, 1100, 11000.00, '2025-05-21 07:05:25', '2025-05-21 07:05:25'),
(2, 2, 12, 10.00, 100, 1000.00, '2025-05-21 07:20:57', '2025-05-21 07:20:57'),
(3, 3, 14, 150.00, 10, 1500.00, '2025-05-21 07:39:54', '2025-05-21 07:39:54'),
(17, 6, 20, 10.00, 1000, 10000.00, '2025-05-21 08:00:55', '2025-05-21 08:00:55'),
(18, 6, 14, 15.00, 50, 750.00, '2025-05-21 08:00:55', '2025-05-21 08:00:55'),
(29, 9, 1, 10.00, 50, 500.00, '2025-05-21 08:13:31', '2025-05-21 08:13:31'),
(30, 9, 2, 5.00, 100, 500.00, '2025-05-21 08:13:31', '2025-05-21 08:13:31'),
(34, 11, 13, 12.00, 100, 1200.00, '2025-05-21 08:19:58', '2025-05-21 08:19:58'),
(35, 10, 13, 12.00, 100, 1200.00, '2025-05-21 08:20:07', '2025-05-21 08:20:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precios`
--

CREATE TABLE `lista_precios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_lista` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_precios`
--

INSERT INTO `lista_precios` (`id`, `nom_lista`, `estado`, `fecha_inicio`, `fecha_final`, `created_at`, `updated_at`) VALUES
(1, 'precios mayo', 0, '2025-05-01', '2025-05-31', '2025-05-18 04:06:43', '2025-05-18 04:06:43'),
(2, 'precios junio', 1, '2025-06-01', '2025-06-30', '2025-05-18 04:06:43', '2025-05-18 04:06:43'),
(6, 'Julio', 0, '2025-07-01', '2025-07-31', '2025-06-17 19:25:14', '2025-06-17 19:25:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precios_productos`
--

CREATE TABLE `lista_precios_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lista_precio_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_precios_productos`
--

INSERT INTO `lista_precios_productos` (`id`, `lista_precio_id`, `producto_id`, `precio`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(2, 1, 2, 15.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(3, 1, 3, 20.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(4, 1, 4, 12.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(5, 1, 5, 8.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(6, 1, 6, 18.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(7, 1, 7, 25.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(8, 1, 8, 30.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(9, 1, 9, 6.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(10, 1, 10, 13.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(11, 1, 11, 9.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(12, 1, 12, 22.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(13, 1, 13, 17.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(14, 1, 14, 11.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(15, 1, 15, 14.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(16, 1, 16, 5.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(17, 1, 17, 16.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(18, 1, 18, 7.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(19, 1, 19, 28.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(20, 1, 20, 19.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(21, 2, 1, 10.50, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(22, 2, 2, 15.75, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(23, 2, 3, 21.00, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(24, 2, 4, 12.60, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(25, 2, 5, 8.40, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(26, 2, 6, 18.90, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(27, 2, 7, 26.25, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(28, 2, 8, 31.50, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(29, 2, 9, 6.30, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(30, 2, 10, 13.65, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(31, 2, 11, 9.45, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(32, 2, 12, 23.10, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(33, 2, 13, 17.85, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(34, 2, 14, 11.55, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(35, 2, 15, 14.70, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(36, 2, 16, 5.25, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(37, 2, 17, 16.80, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(38, 2, 18, 7.35, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(39, 2, 19, 29.40, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(40, 2, 20, 19.95, '2025-05-18 04:14:04', '2025-05-18 04:14:04'),
(41, 6, 1, 10.50, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(42, 6, 2, 15.75, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(43, 6, 3, 21.00, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(44, 6, 4, 12.60, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(45, 6, 5, 8.40, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(46, 6, 6, 18.90, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(47, 6, 7, 26.25, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(48, 6, 8, 31.50, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(49, 6, 9, 6.30, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(50, 6, 10, 13.65, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(51, 6, 11, 9.45, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(52, 6, 12, 23.10, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(53, 6, 13, 17.85, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(54, 6, 14, 11.55, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(55, 6, 15, 14.70, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(56, 6, 16, 5.25, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(57, 6, 17, 16.80, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(58, 6, 18, 7.35, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(59, 6, 19, 29.40, '2025-06-17 19:25:14', '2025-06-17 19:25:14'),
(60, 6, 20, 19.95, '2025-06-17 19:25:14', '2025-06-17 19:25:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_07_024315_add_two_factor_columns_to_users_table', 1),
(5, '2025_03_07_024358_create_personal_access_tokens_table', 1),
(6, '2025_05_11_001915_create_permission_tables', 1),
(12, '2025_05_11_212356_create_categorias_table', 2),
(16, '2025_05_11_212355_create_almacenes_table', 3),
(18, '2025_05_11_212357_create_productos_table', 4),
(19, '2025_05_11_212408_create_almacenes__productos_table', 4),
(20, '2025_05_13_025655_create_proveedores_table', 5),
(21, '2025_05_15_010449_create_clientes_table', 6),
(24, '2025_05_18_035132_create_lista_precios_table', 7),
(26, '2025_05_18_035315_create_pedidos_table', 8),
(27, '2025_05_18_035316_create_pedido_productos_table', 8),
(28, '2025_05_18_035314_create_lista_precios_productos_table', 9),
(31, '2025_05_20_134827_create_empresas_table', 10),
(32, '2025_05_20_205239_create_guia_ingresos_table', 11),
(33, '2025_05_20_205315_create_guia_ingreso_detalles_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `lista_precio_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_pedido` varchar(255) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `estado_pedido` enum('pedido','entregado','facturado') NOT NULL DEFAULT 'pedido',
  `total_pedido` decimal(10,2) NOT NULL DEFAULT 0.00,
  `descuento_pedido` decimal(10,2) NOT NULL DEFAULT 0.00,
  `comentarios` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `lista_precio_id`, `descripcion_pedido`, `fecha_registro`, `fecha_entrega`, `estado_pedido`, `total_pedido`, `descuento_pedido`, `comentarios`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, '2025-05-18', '2025-05-18', 'pedido', 9.00, 0.00, '', '2025-05-19 03:23:53', '2025-05-19 05:17:59'),
(2, 6, 1, NULL, '2025-05-16', '2025-05-18', 'entregado', 95.00, 0.00, '', '2025-05-19 03:25:35', '2025-05-19 05:55:20'),
(3, 1, 1, 'Pedido limpieza', '2025-05-19', '2025-05-22', 'entregado', 2500.00, 0.00, 'entregar en horas de la tarde', '2025-05-19 03:29:04', '2025-05-19 05:17:57'),
(10, 4, 1, 'Limpieza', '2025-05-19', '2025-05-19', 'facturado', 2600.00, 0.00, 'Entrega por la tarde', '2025-05-19 04:50:42', '2025-05-19 05:17:55'),
(11, 4, 1, 'Limpieza', '2025-05-19', '2025-05-19', 'facturado', 2600.00, 0.00, 'Entrega por la tarde', '2025-05-19 05:05:25', '2025-05-19 05:15:04'),
(12, 5, 2, NULL, '2025-05-18', '2025-05-18', 'pedido', 0.00, 0.00, '', '2025-06-18 01:42:27', '2025-06-18 01:42:27'),
(13, 5, 2, NULL, '2025-05-18', '2025-05-18', 'pedido', 0.00, 0.00, '', '2025-06-18 01:42:51', '2025-06-18 01:42:51'),
(14, 5, 2, NULL, '2025-06-18', '2025-06-18', 'pedido', 0.00, 0.00, '', '2025-06-18 01:43:19', '2025-06-18 01:43:19'),
(15, 3, 2, 'qqqqqqqqqqqqqq', '2025-06-17', '2025-06-17', 'pedido', 0.00, 0.00, '', '2025-06-18 01:44:16', '2025-06-18 01:44:16'),
(16, 10, 2, 'rrrrrrrrrrrrrrr', '2025-06-17', '2025-06-17', 'pedido', 0.00, 0.00, '', '2025-06-18 01:45:29', '2025-06-18 01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_productos`
--

INSERT INTO `pedido_productos` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio_unitario`, `precio_total`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 1, 9.00, 9.00, '2025-05-19 03:23:53', '2025-05-19 03:23:53'),
(2, 2, 16, 1, 5.00, 5.00, '2025-05-19 03:25:35', '2025-05-19 03:25:35'),
(3, 2, 11, 10, 9.00, 90.00, '2025-05-19 03:25:35', '2025-05-19 03:25:35'),
(4, 3, 17, 100, 16.00, 1600.00, '2025-05-19 03:29:04', '2025-05-19 03:29:04'),
(5, 3, 9, 150, 6.00, 900.00, '2025-05-19 03:29:04', '2025-05-19 03:29:04'),
(16, 10, 2, 100, 15.00, 1500.00, '2025-05-19 04:50:42', '2025-05-19 04:50:42'),
(17, 10, 12, 50, 22.00, 1100.00, '2025-05-19 04:50:42', '2025-05-19 04:50:42'),
(18, 11, 2, 100, 15.00, 1500.00, '2025-05-19 05:05:25', '2025-05-19 05:05:25'),
(19, 11, 12, 50, 22.00, 1100.00, '2025-05-19 05:05:25', '2025-05-19 05:05:25'),
(20, 12, 11, 1, 0.00, 0.00, '2025-06-18 01:42:27', '2025-06-18 01:42:27'),
(21, 12, 19, 1100, 0.00, 0.00, '2025-06-18 01:42:27', '2025-06-18 01:42:27'),
(22, 13, 11, 1, 0.00, 0.00, '2025-06-18 01:42:51', '2025-06-18 01:42:51'),
(23, 13, 12, 100, 0.00, 0.00, '2025-06-18 01:42:51', '2025-06-18 01:42:51'),
(24, 14, 11, 10, 0.00, 0.00, '2025-06-18 01:43:19', '2025-06-18 01:43:19'),
(25, 14, 19, 1100, 0.00, 0.00, '2025-06-18 01:43:19', '2025-06-18 01:43:19'),
(26, 15, 1, 100, 0.00, 0.00, '2025-06-18 01:44:16', '2025-06-18 01:44:16'),
(27, 16, 12, 10, 0.00, 0.00, '2025-06-18 01:45:29', '2025-06-18 01:45:29'),
(28, 16, 11, 15, 0.00, 0.00, '2025-06-18 01:45:29', '2025-06-18 01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nom_producto` varchar(200) NOT NULL,
  `codigo_venta` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nom_producto`, `codigo_venta`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cloralex Desinfectante 5L', 'CLX-001', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(2, 1, 'Lysoform Líquido 1L', 'LYS-002', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(3, 2, 'Detergente OMO Matic 3L', 'OMO-101', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(4, 3, 'Papel Higiénico Elite 12u', 'PH-501', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(5, 4, 'Lavavajillas Axion Limón 750ml', 'AXN-301', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(6, 5, 'Ambientador Glade Manzana', 'GLD-401', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(7, 2, 'Detergente Ariel Power 2.8L', 'ARL-102', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(8, 3, 'Papel Higiénico Scott 4u', 'PH-502', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(9, 4, 'Lavavajillas Magistral 900ml', 'MGST-302', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(10, 5, 'Ambientador Poett Lavanda', 'POT-402', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(11, 1, 'Desinfectante Pinol 4L', 'PNL-003', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(12, 2, 'Detergente Bolívar 3L', 'BLV-103', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(13, 3, 'Papel Higiénico Suave Max 6u', 'PH-503', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(14, 4, 'Axion Espuma Cítrica 500ml', 'AXN-303', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(15, 5, 'Ambientador Air Wick Vainilla', 'AWK-403', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(16, 1, 'Desinfectante Multiusos Sanpic', 'SPC-004', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(17, 2, 'Detergente Ace 2L', 'ACE-104', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(18, 3, 'Papel Higiénico Rosal Plus', 'PH-504', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(19, 4, 'Lavavajillas Sapolio 750ml', 'SPL-304', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(20, 5, 'Ambientador Rindex Floral', 'RDX-404', '2025-05-12 02:08:11', '2025-05-12 02:08:11'),
(23, 5, 'Prueba 1', '11111111', '2025-05-12 05:07:40', '2025-05-12 05:07:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_proveedor` varchar(50) NOT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nom_proveedor`, `nit`, `direccion`, `telefono`, `correo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Químicos Bolivianos S.R.L.', '1234567890', 'Calle Aroma 102', '76543210', 'ventas@quimicobol.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:44:29'),
(2, 'Distribuciones LIMA', '1029384756', 'Av. Sucre Nº 45', '77445566', 'contacto@lima.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(3, 'Insumos del Norte', '9345678901', 'Av. Cristo Redentor KM 8', '72233444', 'info@insumosnorte.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(4, 'Soluciones Higiénicas', '8899112233', 'Calle 8, San Pedro', '76442121', 'higiene@soluciones.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(5, 'CLEANBO S.A.', '1122334455', 'Zona Industrial P.I. B', '71234567', 'contacto@cleanbo.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(6, 'Bolivia Clean', '3344556677', 'Av. Blanco Galindo KM 4', '79112233', 'ventas@boliviaclean.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(7, 'EcoDistribuciones', '5566778899', 'Calle Camacho 202', '77665544', 'ecodistribuciones@gmail.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(8, 'Higiene Total S.R.L.', '9988776655', 'Av. América Este', '71123344', 'ventas@higienetotal.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(9, 'Rojas CleanTech', '8877665544', 'Calle Litoral Nº 18', '73445566', 'info@rojascleantech.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(10, 'Insumos Andinos', '7766554433', 'Av. Pando, Edif. Andino', '76543211', 'insumos@andinos.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:38:51'),
(11, 'Distribuciones La Paz', '6677889900', 'Av. Arce Nº 321', '72123456', 'lapaz@distri.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(12, 'Proveedores Patzi', '7788990011', 'Villa Fátima', '73445522', 'patzi@provee.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(13, 'Pando Clean', '6655443322', 'Zona Centro Cobija', '77881234', 'ventas@pandoclean.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(14, 'BioSoluciones', '3344221100', 'Av. Banzer, Santa Cruz', '79998877', 'bio@soluciones.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(15, 'SaniPlus Bolivia', '2244668800', 'Zona Sur, Calle 12', '76559988', 'contacto@saniplus.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(16, 'Santa Clean', '8877332211', 'Av. Grigotá Nº 111', '71112233', 'ventas@santaclean.com', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(17, 'HidroAndes', '5566007788', 'Zona Parque Industrial', '78991234', 'info@hidroandes.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(18, 'Ecoplus S.R.L.', '6677990044', 'Calle Murillo, Centro', '72114567', 'ecoplus@servicios.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(19, 'Desinfecta Ya!', '2233445566', 'Av. Villazón KM 3', '76332211', 'contacto@desinfectaya.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(20, 'Ultra Clean', '4433221100', 'Av. Juan Pablo II', '77112233', 'info@ultraclean.bo', 1, '2025-05-13 07:09:09', '2025-05-13 07:09:09'),
(21, 'prueba', '123', 'ninguna', '123456', 'admin@gmail.com', 1, '2025-05-13 07:42:57', '2025-05-13 07:48:28'),
(22, 'prueba 2', '1234', 'aasasa', '154545', 'sdfsdf@gmail.com', 1, '2025-05-13 07:45:08', '2025-05-13 07:48:34'),
(23, 'Químicos Bolivianos S.R.L.', '1234567890', 'Calle Aroma 102', '76543210', 'ventas@quimicobol.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(24, 'Distribuciones LIMA', '1029384756', 'Av. Sucre Nº 45', '77445566', 'contacto@lima.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(25, 'Insumos del Norte', '9345678901', 'Av. Cristo Redentor KM 8', '72233444', 'info@insumosnorte.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(26, 'Soluciones Higiénicas', '8899112233', 'Calle 8, San Pedro', '76442121', 'higiene@soluciones.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(27, 'CLEANBO S.A.', '1122334455', 'Zona Industrial P.I. B', '71234567', 'contacto@cleanbo.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(28, 'Bolivia Clean', '3344556677', 'Av. Blanco Galindo KM 4', '79112233', 'ventas@boliviaclean.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(29, 'EcoDistribuciones', '5566778899', 'Calle Camacho 202', '77665544', 'ecodistribuciones@gmail.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(30, 'Higiene Total S.R.L.', '9988776655', 'Av. América Este', '71123344', 'ventas@higienetotal.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(31, 'Rojas CleanTech', '8877665544', 'Calle Litoral Nº 18', '73445566', 'info@rojascleantech.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(32, 'Insumos Andinos', '7766554433', 'Av. Pando, Edif. Andino', '76543211', 'insumos@andinos.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(33, 'Distribuciones La Paz', '6677889900', 'Av. Arce Nº 321', '72123456', 'lapaz@distri.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(34, 'Proveedores Patzi', '7788990011', 'Villa Fátima', '73445522', 'patzi@provee.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(35, 'Pando Clean', '6655443322', 'Zona Centro Cobija', '77881234', 'ventas@pandoclean.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(36, 'BioSoluciones', '3344221100', 'Av. Banzer, Santa Cruz', '79998877', 'bio@soluciones.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(37, 'SaniPlus Bolivia', '2244668800', 'Zona Sur, Calle 12', '76559988', 'contacto@saniplus.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(38, 'Santa Clean', '8877332211', 'Av. Grigotá Nº 111', '71112233', 'ventas@santaclean.com', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(39, 'HidroAndes', '5566007788', 'Zona Parque Industrial', '78991234', 'info@hidroandes.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(40, 'Ecoplus S.R.L.', '6677990044', 'Calle Murillo, Centro', '72114567', 'ecoplus@servicios.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(41, 'Desinfecta Ya!', '2233445566', 'Av. Villazón KM 3', '76332211', 'contacto@desinfectaya.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(42, 'Ultra Clean', '4433221100', 'Av. Juan Pablo II', '77112233', 'info@ultraclean.bo', 1, '2025-05-15 05:08:44', '2025-05-15 05:08:44'),
(43, 'Químicos Bolivianos S.R.L.', '1234567890', 'Calle Aroma 102', '76543210', 'ventas@quimicobol.com', 1, '2025-05-15 05:09:54', '2025-05-15 05:09:54'),
(44, 'Distribuciones LIMA', '1029384756', 'Av. Sucre Nº 45', '77445566', 'contacto@lima.bo', 1, '2025-05-15 05:09:54', '2025-05-15 05:09:54'),
(45, 'Insumos del Norte', '9345678901', 'Av. Cristo Redentor KM 8', '72233444', 'info@insumosnorte.com', 1, '2025-05-15 05:09:54', '2025-05-15 05:09:54'),
(46, 'Soluciones Higiénicas', '8899112233', 'Calle 8, San Pedro', '76442121', 'higiene@soluciones.com', 1, '2025-05-15 05:09:54', '2025-05-15 05:09:54'),
(47, 'CLEANBO S.A.', '1122334455', 'Zona Industrial P.I. B', '71234567', 'contacto@cleanbo.bo', 1, '2025-05-15 05:09:54', '2025-05-15 05:09:54'),
(48, 'Bolivia Clean', '3344556677', 'Av. Blanco Galindo KM 4', '79112233', 'ventas@boliviaclean.com', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(49, 'EcoDistribuciones', '5566778899', 'Calle Camacho 202', '77665544', 'ecodistribuciones@gmail.com', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(50, 'Higiene Total S.R.L.', '9988776655', 'Av. América Este', '71123344', 'ventas@higienetotal.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(51, 'Rojas CleanTech', '8877665544', 'Calle Litoral Nº 18', '73445566', 'info@rojascleantech.com', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(52, 'Insumos Andinos', '7766554433', 'Av. Pando, Edif. Andino', '76543211', 'insumos@andinos.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(53, 'Distribuciones La Paz', '6677889900', 'Av. Arce Nº 321', '72123456', 'lapaz@distri.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(54, 'Proveedores Patzi', '7788990011', 'Villa Fátima', '73445522', 'patzi@provee.com', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(55, 'Pando Clean', '6655443322', 'Zona Centro Cobija', '77881234', 'ventas@pandoclean.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(56, 'BioSoluciones', '3344221100', 'Av. Banzer, Santa Cruz', '79998877', 'bio@soluciones.com', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(57, 'SaniPlus Bolivia', '2244668800', 'Zona Sur, Calle 12', '76559988', 'contacto@saniplus.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(58, 'Santa Clean', '8877332211', 'Av. Grigotá Nº 111', '71112233', 'ventas@santaclean.com', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(59, 'HidroAndes', '5566007788', 'Zona Parque Industrial', '78991234', 'info@hidroandes.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(60, 'Ecoplus S.R.L.', '6677990044', 'Calle Murillo, Centro', '72114567', 'ecoplus@servicios.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(61, 'Desinfecta Ya!', '2233445566', 'Av. Villazón KM 3', '76332211', 'contacto@desinfectaya.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55'),
(62, 'Ultra Clean', '4433221100', 'Av. Juan Pablo II', '77112233', 'info@ultraclean.bo', 1, '2025-05-15 05:09:55', '2025-05-15 05:09:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3ZgD5j148AkFPUT52DLuDzEf6vwx7BOgO8bi12lm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRGJQZGRTOW0wNExZNnp1eGZJYlB0RVZZMFFWRERsNjdRY1cwWU9DUyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vZW11bmFoLmNvbS92ZW50YXMvcGVkaWRvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkbEN0cFBRTy4vRU1XTDE4Y3o4c1BxZS8zLmh4Lk9GZkhVNVZwWGFtUmZlamtYNzhrZ1J6Vy4iO30=', 1750196732);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Martin Gutierrez', 'martingutierrezc4@gmail.com', NULL, '$2y$12$lCtpPQO./EMWL18cz8sPqe/3.hx.OFfHU5VpXamRfejkX78kgRzW.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-11 04:21:24', '2025-05-11 04:21:24'),
(2, 'Test User', 'test@example.com', '2025-05-13 07:09:10', '$2y$12$2UBudIdnsGX7.YheXxkGSu6yIeoVmFHjM6ISlDaS58jS2d2tvBU8e', NULL, NULL, NULL, 'qsiRiD7x6W', NULL, NULL, '2025-05-13 07:09:11', '2025-05-13 07:09:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `almacen_productos_almacen_id_foreign` (`almacen_id`),
  ADD KEY `almacen_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guia_ingresos_proveedor_id_foreign` (`proveedor_id`);

--
-- Indices de la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guia_ingreso_detalles_guia_ingreso_id_foreign` (`guia_ingreso_id`),
  ADD KEY `guia_ingreso_detalles_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lista_precios_productos_lista_precio_id_foreign` (`lista_precio_id`),
  ADD KEY `lista_precios_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `pedidos_lista_precio_id_foreign` (`lista_precio_id`);

--
-- Indices de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_productos_pedido_id_foreign` (`pedido_id`),
  ADD KEY `pedido_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  ADD CONSTRAINT `almacen_productos_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `almacen_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  ADD CONSTRAINT `guia_ingresos_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  ADD CONSTRAINT `guia_ingreso_detalles_guia_ingreso_id_foreign` FOREIGN KEY (`guia_ingreso_id`) REFERENCES `guia_ingresos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guia_ingreso_detalles_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  ADD CONSTRAINT `lista_precios_productos_lista_precio_id_foreign` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lista_precios_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_lista_precio_id_foreign` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD CONSTRAINT `pedido_productos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
