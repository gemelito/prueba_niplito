-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.5-10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para empresa
CREATE DATABASE IF NOT EXISTS `empresa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `empresa`;


-- Volcando estructura para tabla empresa.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `IDCLIENTE` int(11) DEFAULT NULL,
  `RAZON_SOCIAL` varchar(50) DEFAULT NULL,
  `RFC` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla empresa.clientes: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
REPLACE INTO `clientes` (`IDCLIENTE`, `RAZON_SOCIAL`, `RFC`) VALUES
	(1, '1232', '123456754324567'),
	(1, '1232', '123456754324567'),
	(1, '1232', '123456754324567'),
	(2, 'djhd', '948576987937493'),
	(2, 'djhd', '948576987937493'),
	(2, 'djhd', '948576987937493');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


-- Volcando estructura para tabla empresa.documento
CREATE TABLE IF NOT EXISTS `documento` (
  `IDCODIGO` int(11) NOT NULL,
  `IDCLIENTE` int(11) DEFAULT NULL,
  `RAZON_SOCIAL` varchar(60) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `SUBTOTAL` double(13,3) DEFAULT NULL,
  `IVA` double(13,3) DEFAULT NULL,
  `TOTAL` double(13,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla empresa.documento: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
REPLACE INTO `documento` (`IDCODIGO`, `IDCLIENTE`, `RAZON_SOCIAL`, `RFC`, `SUBTOTAL`, `IVA`, `TOTAL`) VALUES
	(1, 1, '1232', '123456754324567', 123.000, 2132.000, 12421.000),
	(1, 1, '1232', '123456754324567', 123.000, 2132.000, 12421.000),
	(1, 1, '1232', '123456754324567', 123.000, 2132.000, 12421.000),
	(2, 2, 'djhd', '948576987937493', 123.000, 13.000, 2141243.000),
	(2, 2, 'djhd', '948576987937493', 123.000, 13.000, 2141243.000),
	(2, 2, 'djhd', '948576987937493', 123.000, 13.000, 2141243.000);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;


-- Volcando estructura para tabla empresa.documentoreglon
CREATE TABLE IF NOT EXISTS `documentoreglon` (
  `IDCODIGO` int(11) NOT NULL,
  `IDMATERIAL` varchar(20) DEFAULT NULL,
  `UNIDAD_MEDIDA` varchar(10) DEFAULT NULL,
  `CANTIDAD` double(13,3) DEFAULT NULL,
  `PRECIO1` double(13,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla empresa.documentoreglon: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `documentoreglon` DISABLE KEYS */;
REPLACE INTO `documentoreglon` (`IDCODIGO`, `IDMATERIAL`, `UNIDAD_MEDIDA`, `CANTIDAD`, `PRECIO1`) VALUES
	(1, '1', '21', 32.000, 123.000),
	(1, '1', '21', 32.000, 123.000),
	(1, '1', '21', 32.000, 123.000),
	(2, '2', '342', 3.000, 234.000),
	(2, '2', '342', 3.000, 234.000),
	(2, '2', '342', 3.000, 234.000);
/*!40000 ALTER TABLE `documentoreglon` ENABLE KEYS */;


-- Volcando estructura para tabla empresa.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `IDMATERIAL` int(11) NOT NULL,
  `DESCRIPCION` varchar(60) DEFAULT NULL,
  `UNIDADMEDIDA` varchar(10) DEFAULT NULL,
  `PRECIO1` double(13,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla empresa.productos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
REPLACE INTO `productos` (`IDMATERIAL`, `DESCRIPCION`, `UNIDADMEDIDA`, `PRECIO1`) VALUES
	(1, 'dkvn', '21', 123.000),
	(1, 'dkvn', '21', 123.000),
	(1, 'dkvn', '21', 123.000),
	(2, 'dfovijdfmv', '342', 234.000),
	(2, 'dfovijdfmv', '342', 234.000),
	(2, 'dfovijdfmv', '342', 234.000);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
