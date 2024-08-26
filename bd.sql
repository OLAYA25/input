-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para input
CREATE DATABASE IF NOT EXISTS `input` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `input`;

-- Volcando estructura para tabla input.actualizarprecios
CREATE TABLE IF NOT EXISTS `actualizarprecios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Producto_id` bigint(20) DEFAULT NULL,
  `Impuesto_id` text DEFAULT NULL,
  `ImpuestoPorcentageTotal` varchar(50) DEFAULT NULL,
  `Principal` varchar(50) DEFAULT NULL,
  `ValorBase` varchar(50) DEFAULT NULL,
  `Utilidad` varchar(50) DEFAULT NULL,
  `UtilidadPorc` varchar(50) DEFAULT NULL,
  `ValorPublico` varchar(50) DEFAULT NULL,
  `Proveedor_id` bigint(20) DEFAULT NULL,
  `Descuento1` varchar(50) DEFAULT NULL,
  `Cantidad1` varchar(50) DEFAULT NULL,
  `Descuento2` varchar(50) DEFAULT NULL,
  `Cantidad2` varchar(50) DEFAULT NULL,
  `Descuento3` varchar(50) DEFAULT NULL,
  `Cantidad3` varchar(50) DEFAULT NULL,
  `PorcentajeVendedor` varchar(50) DEFAULT NULL,
  `ImpuestoPublico` varchar(50) DEFAULT NULL,
  `ValorPublicoConImpuestos` varchar(50) DEFAULT NULL,
  `CantidadVendedor` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__proveedo` (`Proveedor_id`),
  KEY `FK__product` (`Producto_id`),
  CONSTRAINT `FK__product` FOREIGN KEY (`Producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK__proveedo` FOREIGN KEY (`Proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.actualizarprecios: ~2 rows (aproximadamente)
INSERT INTO `actualizarprecios` (`id`, `Producto_id`, `Impuesto_id`, `ImpuestoPorcentageTotal`, `Principal`, `ValorBase`, `Utilidad`, `UtilidadPorc`, `ValorPublico`, `Proveedor_id`, `Descuento1`, `Cantidad1`, `Descuento2`, `Cantidad2`, `Descuento3`, `Cantidad3`, `PorcentajeVendedor`, `ImpuestoPublico`, `ValorPublicoConImpuestos`, `CantidadVendedor`, `created_at`, `updated_at`) VALUES
	(34, 13, '15.00', '5', '0', '10', '275.00', '2750.00', '285.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300', NULL, NULL, '2024-08-22 09:13:41', '2024-08-25 07:21:01'),
	(35, 13, '14.29', '5', '1', '10', '275.71', '2757.10', '285.71', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300', NULL, NULL, '2024-08-25 07:21:01', '2024-08-25 07:21:01');

-- Volcando estructura para tabla input.bancos
CREATE TABLE IF NOT EXISTS `bancos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.bancos: ~0 rows (aproximadamente)
INSERT INTO `bancos` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(2, 'DAVIVIENDA', 'Activo', '2024-07-22 06:44:41', '2024-07-22 06:44:41');

-- Volcando estructura para tabla input.bodegas
CREATE TABLE IF NOT EXISTS `bodegas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `empresa` bigint(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_bodegas_empresa` (`empresa`),
  CONSTRAINT `FK_bodegas_empresa` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.bodegas: ~0 rows (aproximadamente)
INSERT INTO `bodegas` (`id`, `Descripcion`, `empresa`, `estado`, `created_at`, `updated_at`) VALUES
	(2, 'BODEGA1', 2, 'Activo', '2024-07-22 06:46:19', '2024-07-22 06:46:19');

-- Volcando estructura para tabla input.bodegasproductos
CREATE TABLE IF NOT EXISTS `bodegasproductos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Producto` bigint(20) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Bodega` bigint(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Producto` (`Producto`),
  KEY `Bodega` (`Bodega`),
  CONSTRAINT `bodegasproductos_ibfk_1` FOREIGN KEY (`Producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bodegasproductos_ibfk_2` FOREIGN KEY (`Bodega`) REFERENCES `bodegas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.bodegasproductos: ~2 rows (aproximadamente)
INSERT INTO `bodegasproductos` (`id`, `Producto`, `Cantidad`, `Bodega`, `estado`, `created_at`, `updated_at`) VALUES
	(3, 14, 0, 2, 'Activo', '2024-08-13 10:18:56', '2024-08-13 10:18:56'),
	(4, 14, 0, NULL, 'Activo', '2024-08-13 10:18:56', '2024-08-13 10:18:56'),
	(5, 13, 6, NULL, 'Activo', '2024-08-21 21:58:52', '2024-08-21 22:03:52');

-- Volcando estructura para tabla input.cajas
CREATE TABLE IF NOT EXISTS `cajas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Empresas_id` bigint(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_cajas_empresas` (`Empresas_id`),
  CONSTRAINT `FK_cajas_empresas` FOREIGN KEY (`Empresas_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.cajas: ~3 rows (aproximadamente)
INSERT INTO `cajas` (`id`, `Descripcion`, `Empresas_id`, `estado`, `numero`, `created_at`, `updated_at`) VALUES
	(5, 'CAJA1', 2, 'Activo', '01', '2024-07-22 06:44:02', '2024-08-26 00:43:11'),
	(6, 'CAJA02', NULL, 'Activo', 'CAJA02', '2024-08-11 02:48:05', '2024-08-11 02:48:05'),
	(7, 'CAJA03', NULL, 'Activo', '03', '2024-08-11 02:49:10', '2024-08-11 02:49:10'),
	(8, 'CAJA04', NULL, 'Activo', '04', '2024-08-11 02:49:51', '2024-08-11 02:49:51');

-- Volcando estructura para tabla input.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `NombreCargo` varchar(100) DEFAULT NULL,
  `SalarioNominal` decimal(10,2) DEFAULT NULL,
  `DiasTrabajados` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.cargos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.cargosempleados
CREATE TABLE IF NOT EXISTS `cargosempleados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idCargo` bigint(20) DEFAULT NULL,
  `idEmpleado` bigint(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idCargo` (`idCargo`),
  KEY `idEmpleado` (`idEmpleado`),
  CONSTRAINT `cargosempleados_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cargosempleados_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.cargosempleados: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `DireccDomicilio` varchar(255) DEFAULT NULL,
  `Longs` double DEFAULT NULL,
  `Lant` double DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `Departamento` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.clientes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.codigoalternos
CREATE TABLE IF NOT EXISTS `codigoalternos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `producto_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoalterno_producto1_idx` (`producto_id`),
  CONSTRAINT `fk_codigoalterno_producto1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.codigoalternos: ~1 rows (aproximadamente)
INSERT INTO `codigoalternos` (`id`, `Descripcion`, `estado`, `cantidad`, `created_at`, `updated_at`, `producto_id`) VALUES
	(6, '1233312', 'Activo', '1', '2024-08-04 09:19:09', '2024-08-04 09:19:09', 13),
	(7, '66471', 'Activo', '1', '2024-08-04 09:29:34', '2024-08-04 09:29:34', 14);

-- Volcando estructura para tabla input.codigos
CREATE TABLE IF NOT EXISTS `codigos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) DEFAULT NULL,
  `Codigo` varchar(255) NOT NULL,
  `Subcodigo` varchar(45) DEFAULT NULL,
  `Descipcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.codigos: ~0 rows (aproximadamente)
INSERT INTO `codigos` (`id`, `estado`, `Codigo`, `Subcodigo`, `Descipcion`, `created_at`, `updated_at`) VALUES
	(3, 'Activo', 'en1', '1', 'Entrada de mercacia', '2024-07-22 09:05:46', '2024-07-22 09:05:46');

-- Volcando estructura para tabla input.cuentas
CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bancos_id` bigint(20) unsigned DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `numero` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `Valor` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuentas_bancos` (`bancos_id`),
  KEY `FK_cuentas_usuariobasicos` (`usuario_id`),
  CONSTRAINT `FK_cuentas_bancos` FOREIGN KEY (`bancos_id`) REFERENCES `bancos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_cuentas_usuariobasicos` FOREIGN KEY (`usuario_id`) REFERENCES `usuariobasicos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.cuentas: ~0 rows (aproximadamente)
INSERT INTO `cuentas` (`id`, `bancos_id`, `usuario_id`, `descripcion`, `tipo`, `numero`, `estado`, `Valor`, `created_at`, `updated_at`) VALUES
	(3, 2, NULL, 'CAJAMENOR', 'Ahorro', '31312', 'Activo', NULL, '2024-07-22 06:45:26', '2024-07-22 06:45:26');

-- Volcando estructura para tabla input.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nomina` decimal(10,2) DEFAULT NULL,
  `CheckVendedor` tinyint(1) DEFAULT NULL,
  `PercentValorVendedor` decimal(10,2) DEFAULT NULL,
  `PercentValorFacturaV` decimal(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.empleados: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo_regimen` varchar(50) DEFAULT NULL,
  `NRegimen` varchar(50) DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Logo` text DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `NombreReprent` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.empresas: ~0 rows (aproximadamente)
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `tipo_regimen`, `NRegimen`, `Email`, `Direccion`, `Logo`, `Telefono`, `NombreReprent`, `estado`, `created_at`, `updated_at`) VALUES
	(2, '1006456463', 'INPUTSYSTEM', 'Simplificado', '1006456463-7', 'javierlozano2001@hotmail.com', 'cr 13#24-2', 'logos/HqyfQJXHNZOCLFs91NIMjdgGPWYov3CK30aYTZeE.png', '3134402412', 'javier lozano', 'Activo', '2024-07-22 06:43:11', '2024-08-26 04:06:02');

-- Volcando estructura para tabla input.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla input.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.familia1s
CREATE TABLE IF NOT EXISTS `familia1s` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.familia1s: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.familia2s
CREATE TABLE IF NOT EXISTS `familia2s` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.familia2s: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.familia3s
CREATE TABLE IF NOT EXISTS `familia3s` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.familia3s: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.impuestos
CREATE TABLE IF NOT EXISTS `impuestos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Valor` varchar(50) DEFAULT NULL,
  `FechaVigencia` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.impuestos: ~4 rows (aproximadamente)
INSERT INTO `impuestos` (`id`, `Descripcion`, `Valor`, `FechaVigencia`, `estado`, `created_at`, `updated_at`) VALUES
	(2, 'IVA', '19', NULL, 'Activo', '2024-08-19 08:39:36', '2024-08-19 08:46:06'),
	(3, 'Tasa Reducida', '5', NULL, 'Activo', '2024-08-19 08:42:13', '2024-08-19 08:42:13'),
	(4, 'ICA 1.4', '1.4', NULL, 'Activo', '2024-08-19 08:45:13', '2024-08-19 08:45:31'),
	(5, 'ICA 0.2', '0.2', NULL, 'Activo', '2024-08-19 08:45:57', '2024-08-19 08:45:57');

-- Volcando estructura para tabla input.impuestos_productos
CREATE TABLE IF NOT EXISTS `impuestos_productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` text DEFAULT NULL,
  `productos_id` bigint(20) DEFAULT NULL,
  `impuestos_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_impuestos_productos_productos` (`productos_id`),
  KEY `FK_impuestos_productos_impuestos` (`impuestos_id`),
  CONSTRAINT `FK_impuestos_productos_impuestos` FOREIGN KEY (`impuestos_id`) REFERENCES `impuestos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_impuestos_productos_productos` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.impuestos_productos: ~2 rows (aproximadamente)
INSERT INTO `impuestos_productos` (`id`, `Descripcion`, `productos_id`, `impuestos_id`, `created_at`, `updated_at`) VALUES
	(13, NULL, 14, 2, '2024-08-20 19:09:37', '2024-08-20 19:09:37'),
	(15, NULL, 13, 3, '2024-08-22 08:59:03', '2024-08-22 08:59:03');

-- Volcando estructura para tabla input.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla input.migrations: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.movimientos
CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TipoMovimiento_id` bigint(20) DEFAULT NULL,
  `OrigenBodega_id` bigint(20) DEFAULT NULL,
  `OrigenProveedor_id` bigint(20) DEFAULT NULL,
  `UsuarioDestino_id` bigint(20) DEFAULT NULL,
  `DestinoBodega_id` bigint(20) DEFAULT NULL,
  `users_id` bigint(20) unsigned DEFAULT NULL,
  `Caja_id` bigint(20) DEFAULT NULL,
  `Cuenta_id` bigint(20) unsigned DEFAULT NULL,
  `Cuenta_Salida` bigint(20) unsigned DEFAULT NULL,
  `Cuenta_Entrada` bigint(20) unsigned DEFAULT NULL,
  `ValorImpuesto` text DEFAULT NULL,
  `ValorSinImpuesto` text DEFAULT NULL,
  `Total` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `metodoPago` text DEFAULT NULL,
  `medioPago` text DEFAULT NULL,
  `montoRecibido` text DEFAULT NULL,
  `estadoMovimientosCaja` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_movimientos_movimientosbasicos` (`TipoMovimiento_id`),
  KEY `FK_movimientos_bodegas` (`OrigenBodega_id`),
  KEY `FK_movimientos_usuariobasicos` (`UsuarioDestino_id`),
  KEY `FK_movimientos_users` (`users_id`),
  KEY `FK_movimientos_cajas` (`Caja_id`),
  KEY `FK_movimientos_cuentas` (`Cuenta_id`),
  KEY `FK_movimientos_bodegas_2` (`DestinoBodega_id`),
  KEY `FK_movimientos_usuariobasicos_2` (`OrigenProveedor_id`),
  KEY `FK_movimientos_cuentas_2` (`Cuenta_Salida`),
  KEY `FK_movimientos_cuentas_3` (`Cuenta_Entrada`),
  CONSTRAINT `FK_movimientos_bodegas` FOREIGN KEY (`OrigenBodega_id`) REFERENCES `bodegas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_bodegas_2` FOREIGN KEY (`DestinoBodega_id`) REFERENCES `bodegas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_cajas` FOREIGN KEY (`Caja_id`) REFERENCES `cajas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_cuentas` FOREIGN KEY (`Cuenta_id`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_cuentas_2` FOREIGN KEY (`Cuenta_Salida`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_cuentas_3` FOREIGN KEY (`Cuenta_Entrada`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_movimientosbasicos` FOREIGN KEY (`TipoMovimiento_id`) REFERENCES `movimientosbasicos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_proveedores` FOREIGN KEY (`OrigenProveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_usuariobasicos` FOREIGN KEY (`UsuarioDestino_id`) REFERENCES `usuariobasicos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.movimientos: ~1 rows (aproximadamente)
INSERT INTO `movimientos` (`id`, `TipoMovimiento_id`, `OrigenBodega_id`, `OrigenProveedor_id`, `UsuarioDestino_id`, `DestinoBodega_id`, `users_id`, `Caja_id`, `Cuenta_id`, `Cuenta_Salida`, `Cuenta_Entrada`, `ValorImpuesto`, `ValorSinImpuesto`, `Total`, `estado`, `metodoPago`, `medioPago`, `montoRecibido`, `estadoMovimientosCaja`, `created_at`, `updated_at`) VALUES
	(245, 10, 2, 15, 7, 2, 2, 5, NULL, NULL, NULL, '14.29', '285.71', '300', 'Finalizado', 'efectivo', NULL, '300', 'EnEjecucion', '2024-08-25 09:01:07', '2024-08-25 09:01:39');

-- Volcando estructura para tabla input.movimientosbasicos
CREATE TABLE IF NOT EXISTS `movimientosbasicos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CodigoPredetermidao` bigint(20) DEFAULT NULL,
  `Codigo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Descuento` varchar(50) DEFAULT NULL,
  `Agregar` varchar(50) DEFAULT NULL,
  `Alerta` varchar(50) DEFAULT NULL,
  `OrigenBodega` varchar(50) DEFAULT NULL,
  `DestinoBodega` varchar(50) DEFAULT NULL,
  `UsuarioOrigen` varchar(50) DEFAULT NULL,
  `UsuarioDestino` varchar(50) DEFAULT NULL,
  `TituloPiePagina` text DEFAULT NULL,
  `PiePagina` text DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_movimientosbasicos_codigos` (`CodigoPredetermidao`),
  CONSTRAINT `FK_movimientosbasicos_codigos` FOREIGN KEY (`CodigoPredetermidao`) REFERENCES `codigos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.movimientosbasicos: ~2 rows (aproximadamente)
INSERT INTO `movimientosbasicos` (`id`, `CodigoPredetermidao`, `Codigo`, `Descripcion`, `Descuento`, `Agregar`, `Alerta`, `OrigenBodega`, `DestinoBodega`, `UsuarioOrigen`, `UsuarioDestino`, `TituloPiePagina`, `PiePagina`, `updated_at`, `created_at`) VALUES
	(8, 3, 'ENTRADA', 'Entrada de mercancia', NULL, '1', NULL, '1', '1', '1', '1', 'Terminos y Condiciones', 'GRACIAS POR SU COMPRA GARANTÍA DE 30 DÍAS POR DESPERFECTOS DE FÁBRICA PRESENTANDO ESTA FACTURA.AUTORIZACIÓN NUMERO DE FACTURACIÓN POST-VENDIDO HASTA', '2024-07-22 09:06:28', '2024-07-22 07:06:28'),
	(10, 3, 'VENT', 'Ventas', '1', NULL, NULL, '1', NULL, NULL, '1', 'Terminos y Condiciones', 'GRACIAS POR SU COMPRA GARANTÍA DE 30 DÍAS POR DESPERFECTOS DE FÁBRICA PRESENTANDO ESTA FACTURA.AUTORIZACIÓN NUMERO DE FACTURACIÓN POST-VENDIDO HASTA', '2024-08-04 21:57:35', '2024-08-05 02:57:35');

-- Volcando estructura para tabla input.movimientosdatallados
CREATE TABLE IF NOT EXISTS `movimientosdatallados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Movimientos_id` bigint(20) unsigned DEFAULT NULL,
  `Producto_id` bigint(20) DEFAULT NULL,
  `Cantidad_Ingreso` text DEFAULT NULL,
  `Valor_Unitario` text DEFAULT NULL,
  `TotalValor` text DEFAULT NULL,
  `Impuesto_id` text DEFAULT NULL,
  `Cantidad_Egreso` text DEFAULT NULL,
  `Descuento` text DEFAULT NULL,
  `users_id` bigint(20) DEFAULT NULL,
  `Obervacion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_movimientosdatallado_movimientos` (`Movimientos_id`),
  KEY `FK_movimientosdatallados_productos` (`Producto_id`),
  CONSTRAINT `FK_movimientosdatallado_movimientos` FOREIGN KEY (`Movimientos_id`) REFERENCES `movimientos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientosdatallados_productos` FOREIGN KEY (`Producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.movimientosdatallados: ~2 rows (aproximadamente)
INSERT INTO `movimientosdatallados` (`id`, `Movimientos_id`, `Producto_id`, `Cantidad_Ingreso`, `Valor_Unitario`, `TotalValor`, `Impuesto_id`, `Cantidad_Egreso`, `Descuento`, `users_id`, `Obervacion`, `created_at`, `updated_at`) VALUES
	(232, 245, 13, '1', '300', '300', '5', NULL, NULL, 2, 'Epson l311', '2024-08-25 09:01:07', '2024-08-25 09:01:07');

-- Volcando estructura para tabla input.movimientos_impuestos
CREATE TABLE IF NOT EXISTS `movimientos_impuestos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Impuestos_id` bigint(20) unsigned DEFAULT NULL,
  `PorcentajeImpuesto` text DEFAULT NULL,
  `ValorImpuesto` text DEFAULT NULL,
  `ValorSinImpuesto` text DEFAULT NULL,
  `Movimientos_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__impuestos` (`Impuestos_id`),
  KEY `FK_movimientos_impuestos_movimientos` (`Movimientos_id`),
  CONSTRAINT `FK__impuestos` FOREIGN KEY (`Impuestos_id`) REFERENCES `impuestos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_movimientos_impuestos_movimientos` FOREIGN KEY (`Movimientos_id`) REFERENCES `movimientos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.movimientos_impuestos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.parametizarcajas
CREATE TABLE IF NOT EXISTS `parametizarcajas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `caja_id` bigint(20) DEFAULT NULL,
  `bodegad_id` bigint(20) DEFAULT NULL,
  `cuentas_id` bigint(20) unsigned DEFAULT NULL,
  `cuentas_egre` bigint(20) unsigned DEFAULT NULL,
  `usuario_predeterminado` bigint(20) DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_parametizarcajas_cajas` (`caja_id`),
  KEY `FK_parametizarcajas_bodegas` (`bodegad_id`),
  KEY `FK_parametizarcajas_cuentas` (`cuentas_id`),
  KEY `FK_parametizarcajas_cuentas_2` (`cuentas_egre`),
  KEY `FK_parametizarcajas_usuariobasicos` (`usuario_predeterminado`),
  CONSTRAINT `FK_parametizarcajas_bodegas` FOREIGN KEY (`bodegad_id`) REFERENCES `bodegas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_parametizarcajas_cajas` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_parametizarcajas_cuentas` FOREIGN KEY (`cuentas_id`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_parametizarcajas_cuentas_2` FOREIGN KEY (`cuentas_egre`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_parametizarcajas_usuariobasicos` FOREIGN KEY (`usuario_predeterminado`) REFERENCES `usuariobasicos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.parametizarcajas: ~0 rows (aproximadamente)
INSERT INTO `parametizarcajas` (`id`, `caja_id`, `bodegad_id`, `cuentas_id`, `cuentas_egre`, `usuario_predeterminado`, `estado`, `created_at`, `updated_at`) VALUES
	(11, 5, 2, 3, 3, 7, 'Activo', '2024-07-22 09:00:01', '2024-07-22 09:00:01'),
	(12, 6, 2, NULL, 3, 7, 'Activo', '2024-08-10 21:48:27', '2024-08-10 21:48:27');

-- Volcando estructura para tabla input.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla input.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla input.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.preciosproductos
CREATE TABLE IF NOT EXISTS `preciosproductos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idProducto` bigint(20) DEFAULT NULL,
  `CostoBase` decimal(10,2) DEFAULT NULL,
  `PrecioVenta` decimal(10,2) DEFAULT NULL,
  `PercentUtilidad` decimal(10,2) DEFAULT NULL,
  `FechaCambio` date DEFAULT NULL,
  `Seleccionado` tinyint(1) DEFAULT NULL,
  `Proveedor` bigint(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idProducto` (`idProducto`),
  KEY `Proveedor` (`Proveedor`),
  CONSTRAINT `FK_preciosproductos_usuariobasicos` FOREIGN KEY (`Proveedor`) REFERENCES `usuariobasicos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `preciosproductos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.preciosproductos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Existencias` varchar(50) DEFAULT NULL,
  `Stock_Max` varchar(50) DEFAULT NULL,
  `Stock_Min` varchar(50) DEFAULT NULL,
  `VenderNegativos` varchar(50) DEFAULT NULL,
  `DescInventario` varchar(50) DEFAULT NULL,
  `NumeroSerial` varchar(50) DEFAULT NULL,
  `Talla` varchar(50) DEFAULT NULL,
  `Largor` varchar(50) DEFAULT NULL,
  `Alto` varchar(50) DEFAULT NULL,
  `Ancho` varchar(50) DEFAULT NULL,
  `Observaciones` varchar(50) DEFAULT NULL,
  `familia1_id` bigint(20) DEFAULT 0,
  `familia2_id` bigint(20) DEFAULT 0,
  `familia3_id` bigint(20) DEFAULT 0,
  `unidadmedida_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_producto_unidadmedida1_idx` (`unidadmedida_id`),
  KEY `FK_producto_familia1` (`familia1_id`),
  KEY `FK_producto_familia2` (`familia2_id`),
  KEY `FK_producto_familia3` (`familia3_id`),
  CONSTRAINT `FK_producto_familia1` FOREIGN KEY (`familia1_id`) REFERENCES `familia1s` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_producto_familia2` FOREIGN KEY (`familia2_id`) REFERENCES `familia2s` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_producto_familia3` FOREIGN KEY (`familia3_id`) REFERENCES `familia3s` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_productos_unidadmedidas` FOREIGN KEY (`unidadmedida_id`) REFERENCES `unidadmedidas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.productos: ~2 rows (aproximadamente)
INSERT INTO `productos` (`id`, `Descripcion`, `Imagen`, `Estado`, `Existencias`, `Stock_Max`, `Stock_Min`, `VenderNegativos`, `DescInventario`, `NumeroSerial`, `Talla`, `Largor`, `Alto`, `Ancho`, `Observaciones`, `familia1_id`, `familia2_id`, `familia3_id`, `unidadmedida_id`, `created_at`, `updated_at`) VALUES
	(13, 'Mantemientos', NULL, 'Activo', NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-04 09:12:38', '2024-08-20 08:20:49'),
	(14, 'Revisión de Equipo', NULL, 'Activo', NULL, NULL, NULL, NULL, NULL, '12344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-04 09:28:59', '2024-08-20 19:09:46');

-- Volcando estructura para tabla input.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `TipoPersona` varchar(100) DEFAULT NULL,
  `NumeroDocumento` varchar(100) DEFAULT NULL,
  `RazonSocial` varchar(100) DEFAULT NULL,
  `Telefono1` varchar(50) DEFAULT NULL,
  `Telefono2` varchar(100) DEFAULT NULL,
  `CorreoFacturacion` text DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `Departamento` varchar(100) DEFAULT NULL,
  `Regimen` varchar(100) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Observacion` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.proveedores: ~0 rows (aproximadamente)
INSERT INTO `proveedores` (`id`, `TipoPersona`, `NumeroDocumento`, `RazonSocial`, `Telefono1`, `Telefono2`, `CorreoFacturacion`, `Ciudad`, `Departamento`, `Regimen`, `Tipo`, `Observacion`, `estado`, `created_at`, `updated_at`) VALUES
	(15, 'Natural', '1006456463', 'Input', '3134491', 'a3134491', 'javierlozano2201@hotmail.com', '3134491', '3134491', 'Tributario', '3134491', NULL, 'Activo', '2024-07-22 06:50:52', '2024-07-22 06:50:52');

-- Volcando estructura para tabla input.proveedoreusuarios
CREATE TABLE IF NOT EXISTS `proveedoreusuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Usuario_id` bigint(20) DEFAULT NULL,
  `Proveedor_id` bigint(20) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__usuariobasicoss` (`Usuario_id`),
  KEY `FK__proveedoress` (`Proveedor_id`),
  CONSTRAINT `FK__proveedoress` FOREIGN KEY (`Proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK__usuariobasicoss` FOREIGN KEY (`Usuario_id`) REFERENCES `usuariobasicos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.proveedoreusuarios: ~0 rows (aproximadamente)
INSERT INTO `proveedoreusuarios` (`id`, `Usuario_id`, `Proveedor_id`, `estado`, `created_at`, `updated_at`) VALUES
	(12, 7, 15, 'Activo', '2024-07-22 06:50:52', '2024-07-22 06:50:52');

-- Volcando estructura para tabla input.unidadmedidas
CREATE TABLE IF NOT EXISTS `unidadmedidas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.unidadmedidas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla input.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla input.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'javier', 'javierlozano2001@hotmail.com', NULL, '$2y$10$i4sfL9ME1L.C7fd6X2YHeuvhAbYMvAWFr0b.7qw7JF1BhRhmczPia', 'blZexdjvfx06Uajpmn2jY5uZLhxflRqVELg6qpI579whrVTazjsi67Xlk7JO', '2024-07-31 00:51:42', '2024-07-31 00:51:42');

-- Volcando estructura para tabla input.usuariobasicos
CREATE TABLE IF NOT EXISTS `usuariobasicos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `TipoDocumento` varchar(50) DEFAULT NULL,
  `NDocumento` varchar(50) DEFAULT NULL,
  `Nombre1` varchar(100) DEFAULT NULL,
  `Nombre2` varchar(100) DEFAULT NULL,
  `Apellido1` varchar(100) DEFAULT NULL,
  `Apeelido2` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Checkproveedor` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `FechaNacimiento` varchar(20) DEFAULT NULL,
  `Genero` varchar(20) DEFAULT NULL,
  `TelefonoFijo` varchar(20) DEFAULT NULL,
  `TelefonoMovil` varchar(20) DEFAULT NULL,
  `Sexo` varchar(20) DEFAULT NULL,
  `Direccion` varchar(20) DEFAULT NULL,
  `CheckEmpleado` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla input.usuariobasicos: ~0 rows (aproximadamente)
INSERT INTO `usuariobasicos` (`id`, `TipoDocumento`, `NDocumento`, `Nombre1`, `Nombre2`, `Apellido1`, `Apeelido2`, `Telefono`, `Email`, `Checkproveedor`, `estado`, `FechaNacimiento`, `Genero`, `TelefonoFijo`, `TelefonoMovil`, `Sexo`, `Direccion`, `CheckEmpleado`, `created_at`, `updated_at`) VALUES
	(7, 'CC', '1006456463', 'javier', 'alberto', 'lozano', 'Marquez', '313', 'javierlozano2001@hotmail.com', '1', 'Activo', '2024-07-22', 'HOMBRE', NULL, NULL, 'HOMBRE', NULL, NULL, '2024-07-22 06:49:16', '2024-08-25 22:40:33');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
