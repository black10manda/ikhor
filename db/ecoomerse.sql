-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ecommerse
CREATE DATABASE IF NOT EXISTS `ecommerse` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecommerse`;

-- Volcando estructura para tabla ecommerse.admon
CREATE TABLE IF NOT EXISTS `admon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `session` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ecommerse.admon: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `admon` DISABLE KEYS */;
INSERT INTO `admon` (`id`, `usuario`, `clave`, `session`) VALUES
	(1, 'juan', '9110ed9c6b51cc5c5f2c4fa1aae8d77b1d0aee7d553d536f7b', NULL),
	(3, 'toño@gmail.com', '12345', NULL),
	(4, 'toño@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
	(5, 'juan', '12345', NULL);
/*!40000 ALTER TABLE `admon` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.atendidos
CREATE TABLE IF NOT EXISTS `atendidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `ate` int(11) NOT NULL DEFAULT '0',
  `idadmon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_atendidos_admon` (`idadmon`),
  CONSTRAINT `FK_atendidos_admon` FOREIGN KEY (`idadmon`) REFERENCES `admon` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ecommerse.atendidos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `atendidos` DISABLE KEYS */;
INSERT INTO `atendidos` (`id`, `nombre`, `ate`, `idadmon`) VALUES
	(1, 'contactos', 3, NULL),
	(2, 'comentarios', 4, NULL),
	(3, 'compras', 3, NULL);
/*!40000 ALTER TABLE `atendidos` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.carrito
CREATE TABLE IF NOT EXISTS `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `num` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grantotal` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_carrito_usuarios` (`idUsuario`),
  KEY `FK_carrito_productos` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ecommerse.carrito: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`, `grantotal`) VALUES
	(4, '1', 'wWr0cUk8t5HIXx9b6qNvaMQPFCBD3i', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 18:06:21', 310),
	(5, '1', 'gh4ZXLtAUSnGvc35CmIQPeBbf0Rwus', 45, 2, 9, 166.00, 6.00, 150.00, '2019-04-04 18:09:29', 1638),
	(6, '1', 'kwhLV90aSogjsNdDx4KmRI2Xfnz8Pc', 45, 2, 7, 166.00, 6.00, 150.00, '2019-04-04 22:12:18', 1306),
	(7, '1', 'Z19467Py2OwFsTtXULImNzK8uAxE5k', 45, 2, 4, 166.00, 6.00, 150.00, '2019-04-04 22:21:22', 808),
	(8, '1', 'fGTNWlVHjRQg5hkPxzUuqdtB3i7srw', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 22:46:11', 310),
	(9, '1', '8CtNGDyf1JYRFv627wqVUSunhik30M', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 22:47:35', 310),
	(10, '1', '2wV8Nztg46PKSFqrEc95fWh3n1vjm0', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 22:50:01', 310),
	(11, '1', 'xVtiKWI8mlybsPRcNuQ71gOqAXJ3k4', 46, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 22:55:25', NULL),
	(12, '1', 'Io2LPXTt3pVKcFr7M9Q6ZybedW4ifH', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 22:58:46', 310),
	(13, '1', 'klm24BPytoz07eubwxWqOTc3aCfn6J', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 22:59:56', 310),
	(14, '1', 'mgzQFAO2CGsvM3Jp6BuTh0w5xn4y8i', 45, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 23:01:12', 310),
	(16, '1', 'YhZc19E834HJX0qeFmRVI5LxkbWvMK', 45, 2, 7, 166.00, 6.00, 150.00, '2019-04-04 23:29:10', 1306),
	(17, '1', 'La4DxWcVCj7wvdy1fAr6tb5mnsl0MY', 45, 2, 5, 166.00, 6.00, 150.00, '2019-04-04 23:30:32', NULL),
	(20, '0', 'inlhgLVBRTdr6X1cIx43bE9UYsQ2JK', 0, 2, 1, 166.00, 6.00, 150.00, '2019-04-05 13:40:45', NULL);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `publicado` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comentario_usuarios` (`idUser`),
  CONSTRAINT `FK_comentario_usuarios` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ecommerse.comentario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` (`id`, `usuario`, `comentario`, `publicado`, `idUser`) VALUES
	(7, 'Juan Argueta', 'muy rico', 1, NULL),
	(8, 'Juan Argueta', 'yes', 1, NULL),
	(9, 'Juan Argueta', 'gfc', 1, NULL);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `asunto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `mensaje` text COLLATE latin1_spanish_ci NOT NULL,
  `idAdat` int(11) DEFAULT NULL,
  `atendido` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contacto_admon` (`idAdat`),
  CONSTRAINT `FK_contacto_admon` FOREIGN KEY (`idAdat`) REFERENCES `admon` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ecommerse.contacto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`id`, `nombre`, `email`, `asunto`, `mensaje`, `idAdat`, `atendido`) VALUES
	(6, 'stiven royer', 'gears_umbrella@hotmail.com', 'holasss', 'khlyjvl', NULL, 'no'),
	(7, 'stiven royer', 'gears_umbrella@hotmail.com', 'holasss', 'tuhkdyu', NULL, 'no');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.historicopedidos
CREATE TABLE IF NOT EXISTS `historicopedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `num` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ecommerse.historicopedidos: ~63 rows (aproximadamente)
/*!40000 ALTER TABLE `historicopedidos` DISABLE KEYS */;
INSERT INTO `historicopedidos` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
	(1, '0', 'v58usnLlmdeYGPZobfT9XMgzxkSjwA', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-05 22:20:12'),
	(2, '0', 'labN9iSh06V5jfZ3QOsDmvxK4zYepr', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-05 22:30:59'),
	(3, '0', 'labN9iSh06V5jfZ3QOsDmvxK4zYepr', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-05 22:30:59'),
	(4, '0', 'labN9iSh06V5jfZ3QOsDmvxK4zYepr', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-05 22:30:59'),
	(5, '0', 'boLtrTRi4mk3HDOfXd8UlvBhswjAQG', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-06 09:23:14'),
	(6, '0', '7yCbRLvkSlpVDJ591fWtKY8EPijAMF', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:03:16'),
	(7, '0', 'qk96WdT40lm3EAcYJRhFDN2xyws1Bb', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:03:22'),
	(8, '0', 'qk96WdT40lm3EAcYJRhFDN2xyws1Bb', 0, 5, 8, 41.00, 0.00, 0.00, '2018-04-09 16:03:22'),
	(9, '0', 'Gxe3ypfVSCO0r54Z6HbQslqP1EcTmD', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 16:03:26'),
	(10, '1', 'iMsOnShJwoK4v8ybpBHYA3LDC72QZl', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 16:03:29'),
	(11, '1', 'K9jx47YFnGUr2wgfLbCIyQhH1D0BsS', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 16:03:32'),
	(12, '1', 'K9jx47YFnGUr2wgfLbCIyQhH1D0BsS', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:03:32'),
	(13, '1', 'K9jx47YFnGUr2wgfLbCIyQhH1D0BsS', 0, 2, 3, 899.00, 0.00, 0.00, '2018-04-09 16:03:32'),
	(14, '1', 'fWj64cZuCXzpAmnvFaMLR7xiOlyoEB', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 16:03:35'),
	(15, '1', 'VfdJCPRv31Gehjr7FixaBy8nkg2Y0T', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 16:03:40'),
	(16, '1', 'VfdJCPRv31Gehjr7FixaBy8nkg2Y0T', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:03:40'),
	(17, '0', '12xMNgVTGDvLmzcH5UfoQ9BAdiP874', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 16:03:44'),
	(18, '0', '12xMNgVTGDvLmzcH5UfoQ9BAdiP874', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:03:44'),
	(19, '0', 'x2sOth9kq4ZfVnv1RClpGPLFEBHcIm', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 16:03:47'),
	(20, '0', 'x2sOth9kq4ZfVnv1RClpGPLFEBHcIm', 0, 58, 1, 659.00, 0.00, 0.00, '2018-04-09 16:03:47'),
	(21, '0', 'x2sOth9kq4ZfVnv1RClpGPLFEBHcIm', 0, 28, 1, 669.00, 0.00, 0.00, '2018-04-09 16:03:47'),
	(22, '0', 'pKZTJhF21XymeaLPtRxN4O3sBGjgC8', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 16:03:50'),
	(23, '0', 'pKZTJhF21XymeaLPtRxN4O3sBGjgC8', 0, 51, 1, 167.00, 0.00, 0.00, '2018-04-09 16:03:50'),
	(24, '0', 'fsL5bWcHhaFlPEiMvIGB13r8Xo0Awt', 0, 45, 1, 214.00, 0.00, 0.00, '2018-04-09 16:03:53'),
	(25, '0', 'fsL5bWcHhaFlPEiMvIGB13r8Xo0Awt', 0, 51, 1, 167.00, 0.00, 0.00, '2018-04-09 16:03:53'),
	(26, '1', 'v6lrGcxDQAJL5fEnuZSK8p3YRMkzVw', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 16:03:58'),
	(27, '0', 'QYqLX7E1BZSzkepmAPJ20GfvVH4hC5', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 16:04:01'),
	(28, '1', '6qwKhDP1BoWdZvTmRcz8OXAeNQYJja', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:04'),
	(29, '0', 'ZcQEqJURNuSfm8IAs6VnGFe7tO2bdC', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:07'),
	(30, '0', 'LMKcNJyIUAE1XSdYp0mfGlRBwsjx8v', 0, 51, 1, 167.00, 0.00, 0.00, '2018-04-09 16:04:11'),
	(31, '0', 'FBQzMIWJKCH1rnUj3Gkt5V6xiYNq7S', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:14'),
	(32, '0', 'bo8ly4vH0zDGMuVPBLkthJFRQC9UEa', 0, 3, 1, 200.00, 0.00, 0.00, '2018-04-09 16:04:18'),
	(33, '0', '4yTMiRGhsYzFrBfOEwnoSlI0KmxujL', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:21'),
	(34, '0', 'MLCSfviNFyQ7xZB1kbsH5VanGYcplg', 0, 43, 1, 31.00, 0.00, 0.00, '2018-04-09 16:04:27'),
	(35, '0', 'MLCSfviNFyQ7xZB1kbsH5VanGYcplg', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 16:04:27'),
	(36, '0', 'MLCSfviNFyQ7xZB1kbsH5VanGYcplg', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 16:04:27'),
	(37, '0', '0wDZfCMUQvHysOALG28cRt31nSFm4r', 0, 3, 1, 200.00, 0.00, 0.00, '2018-04-09 16:04:31'),
	(38, '0', 'NjWV1Zq9vnwkTFXcx4J0oSt3Y8Kum7', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 16:04:36'),
	(39, '0', 'RDt1nAsk90oe2hpN7ESlOaHYjBi5dW', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 16:04:39'),
	(40, '0', '8Snsab1UtAc2QifEk3j0MmlJ7GONYZ', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:43'),
	(41, '0', 'g6V8IO2MuvcjN1Aza5qtEWerHCsm7b', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:46'),
	(42, '0', 'KRlD50xNgv9emfJOEBUqbrdIXntGYc', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:49'),
	(43, '1', 'crTEAz6U1noskBQ49Idl2F5XSMmGNb', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 16:04:54'),
	(44, '1', 'CHFKEGA9qgTlZNOfazpdtm5ij01uIB', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 16:04:57'),
	(45, '1', 'OGACfrBs74H8FJdk0Dn6Q1cohPTWba', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 16:05:00'),
	(46, '0', 'mEfAZK0tkV2IgXD7biOpwj6sCx3eYR', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-10 14:18:33'),
	(47, '1', 'C8T06DOufMeSX5Y4yrgJHLzKNoZph3', 0, 4, 1, 154.00, 0.00, 0.00, '2019-03-25 16:56:19'),
	(48, '1', 'NW0bFT8hzyJRrukZBEKestAp3VmocX', 0, 48, 7, 134.00, 0.00, 0.00, '2019-03-25 16:56:26'),
	(49, '1', 'NW0bFT8hzyJRrukZBEKestAp3VmocX', 0, 2, 6, 1000.00, 400.00, 0.00, '2019-03-25 16:56:26'),
	(50, '1', 'rzKuA5gSOUhRDImak4Qb6pYnXB9iCd', 0, 3, 1, 200.00, 0.00, 0.00, '2019-03-25 16:56:28'),
	(51, '1', 'J4LcNyk8v2ZaW6mdBxtMP5siqpuXAo', 0, 3, 1, 200.00, 0.00, 0.00, '2019-03-25 16:56:31'),
	(52, '1', 'J4LcNyk8v2ZaW6mdBxtMP5siqpuXAo', 0, 51, 4, 167.00, 0.00, 0.00, '2019-03-25 16:56:31'),
	(53, '1', 'RYqPLeXrEuyOzN0GwQ47odxfJHWD25', 0, 2, 1, 1000.00, 400.00, 0.00, '2019-03-25 16:56:41'),
	(54, '1', '8tuaCipg4qcjl29HT76GsWARU0xoXe', 0, 2, 3, 1000.00, 400.00, 0.00, '2019-03-25 16:56:44'),
	(55, '1', 'nhPf0s6RikQDCzZgIeLayxF25mMAGW', 0, 2, 1, 1000.00, 400.00, 0.00, '2019-03-25 16:56:47'),
	(56, '0', 'MfKxPuaq1n7RyOl4TpCrJ29oZG6WVt', 0, 2, 1, 166.00, 6.00, 150.00, '2019-03-29 10:48:06'),
	(57, '1', 'fwb0NVWTP7Goy1Yh5Ar3BEeKJCqH8D', 0, 2, 1, 166.00, 6.00, 150.00, '2019-03-29 10:48:09'),
	(58, '0', 'uj6NxBHTVrK15b2ZOhf3IvwaEX78PG', 0, 2, 3, 166.00, 6.00, 150.00, '2019-03-29 10:48:12'),
	(59, '1', 'w4gXHdWmFLaBtosev9qEOxYrcR1JTn', 0, 2, 1, 166.00, 6.00, 150.00, '2019-03-29 10:48:15'),
	(60, '1', 'CbrpJ3KQEX5AYw08Ii1VUFdj6RnaoT', 0, 2, 3, 166.00, 6.00, 150.00, '2019-03-29 11:44:13'),
	(61, '1', 'EMRFpDmw68BSLlVxiPkKyn3C5qUoJ2', 0, 2, 2, 166.00, 6.00, 150.00, '2019-04-04 18:07:19'),
	(62, '1', 'FlGtipJBEb31kAvaysWChPxjNDw80L', 0, 2, 1, 166.00, 6.00, 150.00, '2019-04-04 18:07:34'),
	(63, '0', 'iv7VoPTcmsaSF6RUH30e4GrCqhBjWx', 0, 2, 4, 166.00, 6.00, 150.00, '2019-04-04 18:08:04');
/*!40000 ALTER TABLE `historicopedidos` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `envio` decimal(10,0) NOT NULL,
  `imagen` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `relacion1` int(11) NOT NULL,
  `relacion2` int(11) NOT NULL,
  `relacion3` int(11) NOT NULL,
  `masvendido` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `nuevos` char(1) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ecommerse.productos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `tipo`, `nombre`, `descripcion`, `precio`, `descuento`, `envio`, `imagen`, `fecha`, `relacion1`, `relacion2`, `relacion3`, `masvendido`, `nuevos`) VALUES
	(2, '0', 'Vino IKHOR', '     Vino artesanal (rosado)\r\n   ', 166, 6, 150, 'vino-ikhor.jpg', '2019-03-26', 2, 2, 2, '1', '1'),
	(4, '0', 'stiven royer', 'dghdgh', 456, 45, 45, 'stiven-royer.jpg', '2019-03-28', 2, 2, 2, '1', '1');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla ecommerse.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `colonia` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `codpos` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `pais` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ecommerse.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `direccion`, `ciudad`, `colonia`, `estado`, `codpos`, `pais`, `clave`) VALUES
	(45, 'Juan', 'Argueta', 'gears_umbrella@hotmail.com', 'Aldama#61', 'AcÃ¡mbaro', 'centro', 'admin', '38600', 'MÃ©xico', '1518a875f0a935204fe4d7558b33f23befc55427a63835e45483790a3c6a38842f853278866e8e439014022521d29d1d9720ea3e4fa724ffedb4839efac9a55d'),
	(46, 'stiven ', 'Royer', 'roy@gmail.com', 'sgh', 'si', 'sfgh', 'sgh', 'sgh', 'sgh', '1518a875f0a935204fe4d7558b33f23befc55427a63835e45483790a3c6a38842f853278866e8e439014022521d29d1d9720ea3e4fa724ffedb4839efac9a55d');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para procedimiento ecommerse.sp_addComentario
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addComentario`(
	IN `_id` INT,
	IN `_usuario` VARCHAR(50),
	IN `_comentario` TEXT,
	IN `_publicado` INT
)
BEGIN
IF (trim(_usuario) = '' or trim(_comentario) = '')   THEN
   SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE
  	
  		insert into comentario (id ,usuario , comentario ,publicado) values(_id ,_usuario,_comentario,_publicado );

    
  END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_addContacto
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addContacto`(
	IN `_id` INT,
	IN `_nombre` VARCHAR(50),
	IN `_email` VARCHAR(50),
	IN `_asunto` VARCHAR(50),
	IN `_mensaje` TEXT
)
BEGIN
IF (trim(_nombre) = '' or trim(_email) = '' or  trim(_asunto) = '' or  trim(_mensaje) = '')   THEN
   SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE
  	
  		insert into contacto (id ,nombre , email ,asunto ,mensaje, atendido) values(_id,_nombre,_email,_asunto,_mensaje,'no');

    
  END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_addProducto
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addProducto`(
	IN `_id` INT,
	IN `_tipo` CHAR(50),
	IN `_nombre` VARCHAR(50),
	IN `_descripcion` TEXT,
	IN `_precio` DECIMAL(10,0),
	IN `_descuento` DECIMAL(10,0),
	IN `_envio` DECIMAL(10,0),
	IN `_imagen` CHAR(50),
	IN `_fecha` DATE,
	IN `_relacion1` INT,
	IN `_relacion2` INT,
	IN `_relacion3` INT,
	IN `_masvendido` CHAR(50),
	IN `_nuevos` CHAR(50)
)
BEGIN
 IF (trim(_tipo) = '' or  trim(_nombre) = '' or  trim(_descripcion) = '' or  trim(_precio) = '' or  trim(_descuento) = ''or  trim(_envio) = ''
 	or  trim(_imagen) = '' or  trim(_fecha) = '') THEN
   SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE
  	
  	INSERT INTO productos (`id`,`tipo`, `nombre`, `descripcion`, `precio`, `descuento`, `envio`, `imagen`, `fecha`, `relacion1`, `relacion2`, `relacion3`, `masvendido`, `nuevos`) 
	  VALUES (_id, `_tipo`, `_nombre`, `_descripcion`, `_precio`, `_descuento`, `_envio`, `_imagen`, `_fecha`, `_relacion1`, `_relacion2`, `_relacion3`, `_masvendido`, `_nuevos`);

    
  END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_addUser
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addUser`(
	IN `_id` INT,
	IN `_nombre` VARCHAR(100),
	IN `_apellido` VARCHAR(100),
	IN `_email` VARCHAR(100),
	IN `_direccion` VARCHAR(100),
	IN `_ciudad` VARCHAR(50),
	IN `_colonia` VARCHAR(50),
	IN `_estado` VARCHAR(50),
	IN `_codpos` VARCHAR(50),
	IN `_pais` VARCHAR(50),
	IN `_clave` VARCHAR(400)



)
BEGIN
IF (trim(_nombre) = '' or  trim(_apellido) = '' or  trim(_email) = '' or  trim(_direccion) = '' or  trim(_ciudad) = '' or  trim(_colonia) = '' or  trim(_estado) = '' or  trim(_codpos) = '' or  trim(_pais) = '' or  trim(_clave) = '') THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE
INSERT INTO usuarios (`nombre`, `apellido`, `email`, `direccion`, `ciudad`, `colonia`, `estado`, `codpos`, `pais`, clave) VALUES
 (_nombre,_apellido,_email,_direccion,_ciudad,_colonia,_estado,_codpos,_pais,_clave);


    
  END IF;


END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_deleteComentario
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteComentario`(
	IN `_id` INT
)
BEGIN
delete from comentario where id=_id;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_deleteContacto
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteContacto`(
	IN `_id` INT
)
BEGIN
delete from contacto where id=_id;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_deleteProducto
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteProducto`(
	IN `_id` INT
)
BEGIN
DELETE FROM productos WHERE id=_id;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_deleteUSer
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteUSer`(
	IN `_id` INT
)
BEGIN
delete from usuarios where id=_id;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_updateContacto
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateContacto`(
	IN `_id` INT,
	IN `_nombre` VARCHAR(50),
	IN `_email` VARCHAR(50),
	IN `_asunto` VARCHAR(50),
	IN `_mensaje` TEXT,
	IN `_atendido` VARCHAR(50)
)
BEGIN
IF (trim(_nombre) = '' or trim(_email) = '' or  trim(_asunto) = '' or  trim(_mensaje) = '' or  trim(_atendido) = '')   THEN
   SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE
  		update contacto set nombre=_nombre , email=_email , asunto=_asunto , mensaje=_mensaje , atendido=_atendido where id=_id;
  END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_updateProducto
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateProducto`(
	IN `_id` INT,
	IN `_nombre` VARCHAR(50),
	IN `_descripcion` TEXT,
	IN `_precio` DECIMAL(10,0),
	IN `_descuento` DECIMAL(10,0),
	IN `_envio` DECIMAL(10,0),
	IN `_imagen` CHAR(50),
	IN `_fecha` DATE,
	IN `_relacion1` INT,
	IN `_relacion2` INT,
	IN `_relacion3` INT,
	IN `_masvendido` CHAR(50),
	IN `_nuevos` CHAR(50)
)
BEGIN
 IF (trim(_nombre) = '' or  trim(_descripcion) = '' or  trim(_precio) = '' or  trim(_descuento) = ''or  trim(_envio) = ''
 	or  trim(_imagen) = '' or  trim(_fecha) = '') THEN
   SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE
  	
  	UPDATE productos set  `nombre`=_nombre, `descripcion`=_descripcion, `precio`=_precio, 
	  `descuento`=_descuento, `envio`=_envio, `imagen`=_imagen, `fecha`=_fecha, `relacion1`=_relacion1, 
	  `relacion2`=_relacion2, `relacion3`=_relacion3, `masvendido`=_masvendido, `nuevos`=_nuevos where id=_id ;
	  
    
  END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_updateUser
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateUser`(
	IN `_id` INT,
	IN `_nombre` VARCHAR(50),
	IN `_apellido` VARCHAR(50),
	IN `_email` VARCHAR(50),
	IN `_direccion` VARCHAR(50),
	IN `_ciudad` VARCHAR(50),
	IN `_colonia` VARCHAR(50),
	IN `_estado` VARCHAR(50),
	IN `_codpos` VARCHAR(50),
	IN `_pais` VARCHAR(50)
)
BEGIN
IF (trim(_nombre) = '' or  trim(_apellido) = '' or  trim(_email) = '' or  trim(_direccion) = '' or  trim(_ciudad) = '' or  trim(_colonia) = '' or  trim(_estado) = '' or  trim(_codpos) = '' or  trim(_pais) = '') THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Falta algun parametro';
  ELSE


update usuarios set nombre=_nombre, apellido=_apellido,email=_email,direccion=_direccion,ciudad=_ciudad,colonia=_colonia,estado=_estado,codpos=_codpos,pais=_pais where id=_id ;
    
  END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecommerse.sp_uupdateComentario
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_uupdateComentario`(
	IN `_id` INT,
	IN `_publicado` INT
)
BEGIN

  		
  		UPDATE comentario set publicado=_publicado WHERE id=_id;
    

END//
DELIMITER ;

-- Volcando estructura para disparador ecommerse.tg_cart
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tg_cart` BEFORE UPDATE ON `usuarios` FOR EACH ROW BEGIN
update carrito set grantotal=(((precio*cantidad)-descuento)+envio) where new.id= idUsuario;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador ecommerse.tg_comentarioos
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tg_comentarioos` AFTER UPDATE ON `comentario` FOR EACH ROW BEGIN
update atendidos set ate=(ate+1) where id=2;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador ecommerse.tg_contactos
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tg_contactos` AFTER DELETE ON `contacto` FOR EACH ROW BEGIN
update atendidos set ate=(ate+1) where id=1;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador ecommerse.tg_produc
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tg_produc` BEFORE INSERT ON `carrito` FOR EACH ROW BEGIN
update atendidos set ate=(new.cantidad + ate) where id=3;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
