-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2016 at 11:18 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admon`
--

CREATE TABLE `admon` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `admon`
--

INSERT INTO `admon` (`id`, `usuario`, `clave`) VALUES
(1, 'juan', '9110ed9c6b51cc5c5f2c4fa1aae8d77b1d0aee7d553d536f7b'),
(3, 'toño@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'toño@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `estado` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `num` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
(67, '1', 'C8T06DOufMeSX5Y4yrgJHLzKNoZph3', 28, 4, 1, 154.00, 0.00, 0.00, '2018-04-09 21:06:38'),
(69, '1', 'NW0bFT8hzyJRrukZBEKestAp3VmocX', 29, 48, 7, 134.00, 0.00, 0.00, '2018-04-09 22:34:31'),
(70, '1', 'NW0bFT8hzyJRrukZBEKestAp3VmocX', 29, 2, 6, 1000.00, 400.00, 0.00, '2018-04-09 22:36:03'),
(71, '1', 'nhPf0s6RikQDCzZgIeLayxF25mMAGW', 29, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 22:46:58'),
(72, '1', '8tuaCipg4qcjl29HT76GsWARU0xoXe', 31, 2, 3, 1000.00, 400.00, 0.00, '2018-04-10 19:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `usuario`, `comentario`, `publicado`) VALUES
(1, 'Juan Argueta', 'zdfb<zdf<', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `asunto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `mensaje` text COLLATE latin1_spanish_ci NOT NULL,
  `atendido` varchar(4) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `asunto`, `mensaje`, `atendido`) VALUES
(2, 'Stacy Sierra', 'stacy@stacy.com', 'Prueba', 'd<s<fddfzf', 'no'),
(3, 'pedro', 'stacy@stacy.com', 'prueba', 'asdfvdfd', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `historicopedidos`
--

CREATE TABLE `historicopedidos` (
  `id` int(11) NOT NULL,
  `estado` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `num` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `historicopedidos`
--

INSERT INTO `historicopedidos` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
(1, '0', 'v58usnLlmdeYGPZobfT9XMgzxkSjwA', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-06 03:20:12'),
(2, '0', 'labN9iSh06V5jfZ3QOsDmvxK4zYepr', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-06 03:30:59'),
(3, '0', 'labN9iSh06V5jfZ3QOsDmvxK4zYepr', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-06 03:30:59'),
(4, '0', 'labN9iSh06V5jfZ3QOsDmvxK4zYepr', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-06 03:30:59'),
(5, '0', 'boLtrTRi4mk3HDOfXd8UlvBhswjAQG', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-06 14:23:14'),
(6, '0', '7yCbRLvkSlpVDJ591fWtKY8EPijAMF', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:03:16'),
(7, '0', 'qk96WdT40lm3EAcYJRhFDN2xyws1Bb', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:03:22'),
(8, '0', 'qk96WdT40lm3EAcYJRhFDN2xyws1Bb', 0, 5, 8, 41.00, 0.00, 0.00, '2018-04-09 21:03:22'),
(9, '0', 'Gxe3ypfVSCO0r54Z6HbQslqP1EcTmD', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 21:03:26'),
(10, '1', 'iMsOnShJwoK4v8ybpBHYA3LDC72QZl', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 21:03:29'),
(11, '1', 'K9jx47YFnGUr2wgfLbCIyQhH1D0BsS', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 21:03:32'),
(12, '1', 'K9jx47YFnGUr2wgfLbCIyQhH1D0BsS', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:03:32'),
(13, '1', 'K9jx47YFnGUr2wgfLbCIyQhH1D0BsS', 0, 2, 3, 899.00, 0.00, 0.00, '2018-04-09 21:03:32'),
(14, '1', 'fWj64cZuCXzpAmnvFaMLR7xiOlyoEB', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 21:03:35'),
(15, '1', 'VfdJCPRv31Gehjr7FixaBy8nkg2Y0T', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 21:03:40'),
(16, '1', 'VfdJCPRv31Gehjr7FixaBy8nkg2Y0T', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:03:40'),
(17, '0', '12xMNgVTGDvLmzcH5UfoQ9BAdiP874', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 21:03:44'),
(18, '0', '12xMNgVTGDvLmzcH5UfoQ9BAdiP874', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:03:44'),
(19, '0', 'x2sOth9kq4ZfVnv1RClpGPLFEBHcIm', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 21:03:47'),
(20, '0', 'x2sOth9kq4ZfVnv1RClpGPLFEBHcIm', 0, 58, 1, 659.00, 0.00, 0.00, '2018-04-09 21:03:47'),
(21, '0', 'x2sOth9kq4ZfVnv1RClpGPLFEBHcIm', 0, 28, 1, 669.00, 0.00, 0.00, '2018-04-09 21:03:47'),
(22, '0', 'pKZTJhF21XymeaLPtRxN4O3sBGjgC8', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 21:03:50'),
(23, '0', 'pKZTJhF21XymeaLPtRxN4O3sBGjgC8', 0, 51, 1, 167.00, 0.00, 0.00, '2018-04-09 21:03:50'),
(24, '0', 'fsL5bWcHhaFlPEiMvIGB13r8Xo0Awt', 0, 45, 1, 214.00, 0.00, 0.00, '2018-04-09 21:03:53'),
(25, '0', 'fsL5bWcHhaFlPEiMvIGB13r8Xo0Awt', 0, 51, 1, 167.00, 0.00, 0.00, '2018-04-09 21:03:53'),
(26, '1', 'v6lrGcxDQAJL5fEnuZSK8p3YRMkzVw', 0, 2, 1, 899.00, 0.00, 0.00, '2018-04-09 21:03:58'),
(27, '0', 'QYqLX7E1BZSzkepmAPJ20GfvVH4hC5', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 21:04:01'),
(28, '1', '6qwKhDP1BoWdZvTmRcz8OXAeNQYJja', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:04'),
(29, '0', 'ZcQEqJURNuSfm8IAs6VnGFe7tO2bdC', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:07'),
(30, '0', 'LMKcNJyIUAE1XSdYp0mfGlRBwsjx8v', 0, 51, 1, 167.00, 0.00, 0.00, '2018-04-09 21:04:11'),
(31, '0', 'FBQzMIWJKCH1rnUj3Gkt5V6xiYNq7S', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:14'),
(32, '0', 'bo8ly4vH0zDGMuVPBLkthJFRQC9UEa', 0, 3, 1, 200.00, 0.00, 0.00, '2018-04-09 21:04:18'),
(33, '0', '4yTMiRGhsYzFrBfOEwnoSlI0KmxujL', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:21'),
(34, '0', 'MLCSfviNFyQ7xZB1kbsH5VanGYcplg', 0, 43, 1, 31.00, 0.00, 0.00, '2018-04-09 21:04:27'),
(35, '0', 'MLCSfviNFyQ7xZB1kbsH5VanGYcplg', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 21:04:27'),
(36, '0', 'MLCSfviNFyQ7xZB1kbsH5VanGYcplg', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 21:04:27'),
(37, '0', '0wDZfCMUQvHysOALG28cRt31nSFm4r', 0, 3, 1, 200.00, 0.00, 0.00, '2018-04-09 21:04:31'),
(38, '0', 'NjWV1Zq9vnwkTFXcx4J0oSt3Y8Kum7', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 21:04:36'),
(39, '0', 'RDt1nAsk90oe2hpN7ESlOaHYjBi5dW', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 21:04:39'),
(40, '0', '8Snsab1UtAc2QifEk3j0MmlJ7GONYZ', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:43'),
(41, '0', 'g6V8IO2MuvcjN1Aza5qtEWerHCsm7b', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:46'),
(42, '0', 'KRlD50xNgv9emfJOEBUqbrdIXntGYc', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:49'),
(43, '1', 'crTEAz6U1noskBQ49Idl2F5XSMmGNb', 0, 2, 1, 1000.00, 400.00, 0.00, '2018-04-09 21:04:54'),
(44, '1', 'CHFKEGA9qgTlZNOfazpdtm5ij01uIB', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-09 21:04:57'),
(45, '1', 'OGACfrBs74H8FJdk0Dn6Q1cohPTWba', 0, 5, 1, 41.00, 0.00, 0.00, '2018-04-09 21:05:00'),
(46, '0', 'mEfAZK0tkV2IgXD7biOpwj6sCx3eYR', 0, 1, 1, 214.00, 0.00, 0.00, '2018-04-10 19:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
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
  `nuevos` char(1) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `tipo`, `nombre`, `descripcion`, `precio`, `descuento`, `envio`, `imagen`, `fecha`, `relacion1`, `relacion2`, `relacion3`, `masvendido`, `nuevos`) VALUES
(1, '0', 'Limpiador de Brochas Mary Kay', '        Una soluciÃ³n rÃ¡pida para eliminar cualquier residuo de maquillaje y brinda una protecciÃ³n hipoalergÃ©nica.\r\n\r\nAyuda a mantener una aplicaciÃ³n mas exacta de color al cambiar de tonos o texturas.\r\nAcondiciona sus cerdas, prolonga su tiempo de vida.\r\nProporciona una limpieza eficaz, dejando un fresco aroma a las brochas.\r\nSeca rÃ¡pidamente sin daÃ±ar las brochas, regresÃ¡ndolas a su forma original.\r\nElimina la acumulaciÃ³n de maquillaje y color de las brochas.            ', 214, 0, 0, 'limpiador-de-brochas-mary-kay.jpg', '2018-04-01', 2, 3, 0, '0', '1'),
(2, '0', 'Set Esencial de Brochas con Estuche Mary Kay', '           El Set Esencial de Brochas con Estuche Mary KayÂ® incluye cinco brochas de la mÃ¡s alta calidad, perfectas para crear multÃ­ples looks. AdemÃ¡s podrÃ¡s guardarlas en su Estuche para llevarlas a donde sea que vayas.\r\n\r\nLa forma de las brochas y sus cerdas sintÃ©ticas, hacen que los productos se difuminen sobre la piel de forma suave y uniforme.\r\n\r\nEl Set incluye:\r\nBrocha Para Rubor Mary KayÂ®\r\nBrocha para Polvo Mary KayÂ®\r\nBrocha para Ojos Mary KayÂ®\r\nBrocha Difuminadora para Ojos Mary KayÂ®\r\nBrocha Definidora para Ojos Mary KayÂ®         ', 1000, 400, 0, 'set-esencial-de-brochas-con-estuche-mary-kay.jpg', '2018-04-01', 1, 3, 0, '1', '1'),
(3, '0', 'Brocha para Maquillaje LÃ­quido Mary Kay', '   Las cerdas sintÃ©ticas de la Brocha para Maquillaje LÃ­quido son perfectas para aplicar, mezclar y difuminar el maquillaje\r\nlÃ­quido con facilidad. ', 200, 0, 0, 'brocha-para-maquillaje-liquido-mary-kay.jpg', '2018-04-01', 1, 2, 0, '0', '1'),
(4, '0', 'Brocha para Color en Crema Mary Kay', '    La Brocha para Color en Crema Mary KayÂ®, difumina el color en la piel brindando un acabado uniforme y ligero. Puede ser utilizada para aplicar corrector, maquillaje en zonas pequeÃ±as y color en los labios.*\r\n\r\n* Por higiene, es recomendable utilizar diferentes brochas para aplicar cada uno de los productos.  ', 154, 0, 0, 'brocha-para-color-en-crema-mary-kay.jpg', '2018-04-01', 3, 1, 2, '1', '1'),
(5, '0', 'Esponja CosmÃ©tica Mary Kay', '    Usa la Esponja CosmÃ©tica para aplicar y difuminar los maquillajes en crema y lÃ­quidos, correctores, productos compactos y en polvo, incluyendo el Maquillaje en Crema con Acabado en Polvo Endless PerformanceÂ® y el Maquillaje en Polvo TraslÃºcido Mineral Mary KayÂ®.\r\n\r\nTextura microfina diseÃ±ada para una distribuciÃ³ uniforme.\r\nForma Ãºnica para asegurar una aplicaciÃ³n tersa y perfecta.\r\nCreada especÃ­ficamente para caber dentro de todos los estuches cosmÃ©ticos Mary Kay  ', 41, 0, 0, 'esponja-cosmetica-mary-kay.jpg', '2018-04-01', 1, 2, 0, '1', '1'),
(20, '0', 'Brocha Delineadora para Ojos y Cejas Mary Kay', '  Con un extremo puedes moldear y peinar tus cejas; con el otro, dar forma y rellenarlas aplicando color. TambiÃ©n puedes utilizarla para delinear tus ojos', 129, 0, 0, 'brocha-delineadora-para-ojos-y-cejas-mary-kay.jpg', '2018-04-01', 4, 1, 3, '0', '1'),
(21, '0', 'Gel Humectante Botanical Effects', ' Este gel de consistencia ligera y rÃ¡pida absorciÃ³n provee la humectaciÃ³n Ã³ptima para cualquier tipo de piel, dejÃ¡ndola con una apariencia saludable.\r\n\r\n    Contiene extracto de pitaya con antioxidantes que ayudan a defender la piel de los daÃ±inos radicales libres.\r\n    TambiÃ©n contiene extracto de aloe para una dosis extra de antioxidantes.\r\n    FÃ³rmula de consistencia ligera, no se siente grasosa ni deja residuos en la piel y humecta hasta por 12 horas.\r\n    La piel se siente suave y fresca sin sensaciÃ³n de resequedad.\r\n    Libre de aceite, no obstruye los poros ', 209, 0, 0, 'gel-humectante-botanical-effects.jpg', '2018-04-05', 22, 0, 0, '0', '1'),
(22, '0', 'Gel Limpiador Botanical Effects', '  Ingredientes naturales limpian tu piel profundamente y efectivamente, disolviendo cualquier tipo de grasa.\r\n\r\n    Contiene extracto de pitaya con antioxidantes que ayudan a defender la piel de los daÃ±inos radicales libres.\r\n    TambiÃ©n contiene extracto de aloe para una dosis extra de antioxidantes.\r\n    No restira la piel ni la deja con sensaciÃ³n de resequedad.\r\n    La piel se siente suave y limpia.\r\n    Libre de aceite y clÃ­nicamente probado contra irritaciones y alergias.\r\n', 204, 0, 0, 'gel-limpiador-botanical-effects.jpg', '2018-04-05', 21, 0, 0, '0', '1'),
(23, '0', 'TÃ³nico Facial Refrescante Botanical Effects', '  Disminuye visiblemente la apariencia de los poros y remueve el exceso de grasa.\r\n\r\n    Contiene extracto de pitaya con antioxidantes que ayudan a defender la piel de los daÃ±inos radicales libres.\r\n    TambiÃ©n contiene extracto de aloe para una dosis extra de antioxidantes.\r\n    Remueve cualquier rastro de suciedad, asÃ­ como cÃ©lulas de piel muertas para una limpieza completa.\r\n    Contiene ingredientes comÃºnmente usados como astringentes suaves, asÃ­ que la piel no se sentirÃ¡ estirada o seca.\r\n    Ayuda a controlar el brillo facial, dejando la piel con una apariencia saludable y sensaciÃ³n fresca.\r\n', 194, 0, 0, 'tonico-facial-refrescante-botanical-effects.jpg', '2018-04-05', 21, 22, 0, '0', '1'),
(24, '0', 'LociÃ³n Facial Humectante para el DÃ­a FPS 35 TimeWise', '   La LociÃ³n Facial Humectante para el DÃ­a FPS 35 TimeWiseÂ® protege contra los peligrosos rayos UVA/UVB para evitar que daÃ±en la piel y la mantienen hidratada.\r\n\r\n        DermatolÃ³gicamente comprobado.\r\n\r\n        Adecuado para piel sensible.\r\n\r\n        Clinicamente probado para alergias e irritacion.\r\n\r\n        Libre de aceite y fragancia. Hipo alergÃ©nico.\r\n\r\n        No comedogÃ©nico (no tapa los poros).\r\n ', 373, 0, 0, 'locion-facial-humectante-para-el-dia-fps-35-timewise.jpg', '2018-04-05', 25, 0, 0, '0', '1'),
(25, '0', 'Crema Limpiadora Facial 3 en 1 TimeWise piel combinada a grasa', '   Esta limpiadora combina los beneficios que combaten los efectos del paso del tiempo, ademÃ¡s de tres beneficios esenciales para el cuidado de la piel en un solo producto, limpiar, exfoliar y refrescar â€“mostrando una piel que luce mÃ¡s joven.\r\n\r\n    Apta para piel sensible.\r\n    Libre de aceite y fragancia.\r\n    HipoalergÃ©nica.\r\n    ClÃ­nicamente probada contra irritaciones y alergias.\r\n    No comedogÃ©nica (no tapa los poros).\r\n ', 279, 0, 0, 'crema-limpiadora-facial-3-en-1-timewise-piel-combinada-a-grasa.jpg', '2018-04-05', 24, 0, 0, '0', '1'),
(26, '0', 'JabÃ³n Limpiador Facial 3 en 1 TimeWise', '  Remueve efectivamente las impurezas y refresca la piel dejÃ¡ndola suave y tersa.\r\n\r\n    Probado dermatolÃ³gicamente\r\n    Apto para piel sensible\r\n    ClÃ­nicamente probado contra irritaciones en la piel y alergias\r\n    Libre de aceite y fragancia\r\n    HipoalergÃ©nico\r\n    No comedogÃ©nico (no tapa los poros', 289, 0, 0, 'jabon-limpiador-facial-3-en-1-timewise.jpg', '2018-04-05', 24, 25, 0, '0', '1'),
(27, '0', 'Gel Facial Reafirmante Nocturno TimeWise', '  Un sistema Ãºnico de vitaminas y antioxidantes encapsulados, combinados con un pÃ©ptido especial que estimula el colÃ¡geno para suavizar y dar firmeza a la piel.\r\n\r\n    Probado dermatolÃ³gicamente.\r\n    Apto para piel sensible.\r\n    ClÃ­nicamente probado contra irritaciones en la piel y alergias.\r\n    Libre de aceite y fragancia.  HipoalergÃ©nico.\r\n    No comedogÃ©nico  (no tapa los poros)', 373, 0, 0, 'gel-facial-reafirmante-nocturno-timewise.jpg', '2018-04-05', 24, 23, 26, '0', '1'),
(28, '0', 'Sistema para MicroexfoliaciÃ³n Plus TimeWise', 'ObtÃ©n la apariencia de piel mÃ¡s suave, joven y poros visiblemente mÃ¡s pequeÃ±os.\r\n\r\nBeneficios inmediatos:\r\n\r\n    Inmediatamente tu piel luce mÃ¡s joven y los poros mÃ¡s pequeÃ±os.\r\n    Mejora dramÃ¡ticamente la textura de la piel\r\n    Visiblemente mejora la apariencia de finas lÃ­neas de expresiÃ³n.\r\n    Da un efecto de alta definiciÃ³n a tu piel.\r\n  ', 669, 0, 0, 'sistema-para-microexfoliacion-plus-timewise.jpg', '2018-04-05', 26, 23, 24, '0', '1'),
(29, '0', 'CC Cream Crema Correctora de Color con FPS 15 Mary Kay', '   ObtÃ©n fÃ¡cilmente una piel de apariencia impecable.\r\n\r\n    Brinda ocho beneficios en un solo paso.\r\n    Cobertura ligera para una piel con apariencia impecable y natural.\r\n    Es una opciÃ³n fÃ¡cil para obtener un look natural y rÃ¡pido.\r\n    Cuatro tonos que abarcan un amplio rango de tonos de piel.\r\n    Ideal para todos los tipos de piel.\r\n ', 261, 0, 0, 'cc-cream-crema-correctora-de-color-con-fps-15-mary-kay.jpg', '2018-04-05', 30, 0, 0, '0', '1'),
(30, '0', 'Maquillaje LÃ­quido de Cobertura Media Mary Kay', 'Este maquillaje lÃ­quido brinda un color que se queda en tu piel, para lograr una apariencia impecable y natural, y una cobertura uniforme de larga duraciÃ³n. Su fÃ³rmula suave y sedosa brinda una gran cobertura y controla el exceso de brillo facial por al menos ocho horas. Para piel normal a grasa.\r\n\r\n    Apto para piel sensible.\r\n    Libre de Fragancia.\r\n    Libre de Aceite.\r\n    No comedogÃ©nico.\r\n    DermatolÃ³gicamente probado.\r\n  ', 167, 0, 0, 'maquillaje-liquido-de-cobertura-media-mary-kay.jpg', '2018-04-05', 29, 0, 0, '0', '1'),
(31, '0', 'Maquillaje en Crema con Acabado en Polvo Endless Performance', '  El Maquillaje en Crema con Acabado en Polvo Endless PerformanceÂ® Mary KayÂ® es la clave para maquillaje de larga duraciÃ³n y acabado perfecto.\r\n\r\nâ€¢ Apariencia fresa durante 12 horas.\r\nâ€¢ Resistente al calor y la humedad.\r\nâ€¢ Su fÃ³rmula de rÃ¡pida aplicaciÃ³n es resistente al agua.\r\nâ€¢ Es un producto 2 en 1 que se desliza suavemente para ocultar imperfecciones, al secarse da un acabado en polvo con tono mate.\r\nâ€¢ Ayuda a controlar el brillo facial.\r\n', 194, 0, 0, 'maquillaje-en-crema-con-acabado-en-polvo-endless-performance.jpg', '2018-04-05', 30, 29, 0, '0', '1'),
(32, '0', 'Maquillaje en Polvo Suelto Mineral Mary Kay', 'Polvo ligero que perfecciona la piel ayudando a disimular lÃ­neas, arrugas y otras imperfecciones. Obtienes la cobertura de un maquillaje con la comodidad de un polvo.\r\n\r\nâ€¢ Cobertura versÃ¡til que se difumina fÃ¡cilmente en un solo movimiento para lograr un look impecable.\r\nâ€¢ FÃ³rmula de larga duraciÃ³n que no se corre ni se desvanece a mitad del dÃ­a.\r\nâ€¢ Controla el brillo facial y ofrece un acabado mate.  ', 167, 0, 0, 'maquillaje-en-polvo-suelto-mineral-mary-kay.jpg', '2018-04-05', 30, 31, 29, '0', '1'),
(33, '0', 'Polvo Suelto TraslÃºcido Mary Kay', 'Brinda un acabado natural al sellar tu maquillaje.\r\n\r\nâ€¢ Deja una capa invisible en la piel y es perfecto para cualquier tono de piel.\r\n\r\nâ€¢ Reduce el brillo facial.\r\n\r\nâ€¢ Se utiliza sobre el maquillaje para\r\ndar el toque final.\r\n\r\nâ€¢ Es un tono universal que elimina la necesidad de encontrar un tono para cada tipo de piel, ya que este polvo es para cualquier tono.\r\n\r\nâ€¢ Controla el brillo facial, se utiliza sobre el maquillaje para dar un acabado perfecto y naturalmente hermoso.\r\n\r\nâ€¢ Adecuado para todo tipo de piel, incluso la piel sensible: sus partÃ­culas dispersoras de luz suavizan la apariencia de imperfecciones en la piel.   ', 229, 0, 0, 'polvo-suelto-traslucido-mary-kay.jpg', '2018-04-05', 29, 32, 31, '0', '1'),
(34, '0', 'Rubor Mineral Compacto Mary Kay', 'La fÃ³rmula del Rubor Mineral Compacto Mary KayÂ® a base de minerales es famosa por sus propiedades absorbentes de brillo facial, fÃ¡cil aplicaciÃ³n y excelente cobertura.\r\n\r\nâ€¢ Color que se queda en tu piel y define tus pÃ³mulos.\r\nâ€¢ Contiene Vitaminas A, C y E para ayudar a proteger contra las arrugas causadas por los radicales libres.\r\nâ€¢ Se aplica suave, fÃ¡cil y uniformemente.\r\nâ€¢ Su diseÃ±o cabe perfectamente en el Estuche Compacto Mary Kay.  ', 90, 0, 0, 'rubor-mineral-compacto-mary-kay.jpg', '2018-04-05', 33, 31, 29, '0', '1'),
(35, '0', 'Mini Estuche para Cejas Mary Kay', '   Este set incluye unas mini pinzas para dar forma, una mini brocha en espiral para cepillar las cejas y una mini brocha angular para aplicar polvo en las cejas.\r\n\r\n    Las pinzas de punta inclinada son de alta calidad, y son la herramienta perfecta para depilar tus cejas.\r\n    La brocha angular puede ser usada con la Sombra Mineral Compacta Mary Kay para rellenar las cejas. Tienen el tamaÃ±o perfecto para caber en todos los estuches cosmÃ©ticos Mary Kay.\r\n ', 78, 0, 0, 'mini-estuche-para-cejas-mary-kay.jpg', '2018-04-05', 36, 0, 0, '0', '1'),
(36, '0', 'LÃ¡piz Delineador para Cejas Mary Kay', '  Las cejas definidas le dan al rostro un look refinado. El LÃ¡piz Delineador para Cejas Mary KayÂ® es perfecto para rellenar y definir las cejas, realzando tu mirada al instante.\r\n\r\nâ€¢ FÃ³rmula cremosa, a prueba agua.\r\n\r\nâ€¢ Se aplica suavemente.\r\n\r\nâ€¢ LÃ¡piz de madera.\r\n', 124, 0, 0, 'lapiz-delineador-para-cejas-mary-kay.jpg', '2018-04-05', 20, 0, 0, '0', '1'),
(37, '0', 'Gel para Cejas Mary Kay', 'Este gel transparente multifuncional da forma y define las cejas rÃ¡pidamente, las acondiciona con un acabado mate que las mantiene delineadas y en su lugar sin dejar grumos y con una apariencia mÃ¡s abundante.\r\n\r\n    ClÃ­nicamente probada contra irritaciones en la piel y alergias.\r\n    Libre de fragancia.\r\n    Libre de aceite.\r\n    No comedogÃ©nico.  ', 134, 0, 0, 'gel-para-cejas-mary-kay.jpg', '2018-04-05', 36, 20, 0, '0', '1'),
(38, '0', 'Gel Fortalecedor de PestaÃ±as y Cejas Mary Kay', '  Deja que tus pestanas y cejas vivan a su mÃ¡ximo potencial.\r\nÂ¿Tus pestanas perdieron su volumen? Â¿Tus cejas lucen escasas? El Gel Fortalecedor de PestaÃ±as y Cejas Mary KayÂ® da resultados en solo 30 dÃ­as.\r\n\r\nBeneficios Inmediatos:\r\n\r\n    Crea pestaÃ±as de apariencia mÃ¡s tupida\r\n    Mejora la apariencia de pestaÃ±as y cejas delgadas y escasas.\r\n    Mejora el volumen de las pestaÃ±as.\r\n    Las pestaÃ±as lucen al mÃ¡ximo.\r\n    Ayuda a reducir la pÃ©rdida de pestaÃ±as al momento de desmaquillar.\r\n', 414, 0, 0, 'gel-fortalecedor-de-pestanas-y-cejas-mary-kay.jpg', '2018-04-05', 20, 36, 35, '0', '1'),
(39, '0', 'LociÃ³n Desmaquillante de Ojos Libre de Aceite Mary Kay', 'Observa como el maquillaje desaparece en un abrir y cerrar de ojos.\r\n\r\n    FÃ¡cil y efectivamente remueve el maquillaje, incluyendo mascara a prueba de agua\r\n    Remueve suavemente el maquillaje de ojos sin estirar o maltratar la delicada piel de los ojos.\r\n    Ayuda a suavizar la piel, dejando la sensaciÃ³n de hidrataciÃ³n.\r\n  ', 233, 0, 0, 'locion-desmaquillante-de-ojos-libre-de-aceite-mary-kay.jpg', '2018-04-05', 36, 20, 35, '0', '1'),
(40, '0', 'Mascara para PestaÃ±as Lash Intensity', 'MAGNIFICA, MAXIMIZA Y MULTIPLICA TUS PESTAÃ‘AS.\r\n\r\n    Amplifica y alarga tus pestaÃ±as de manera irresistible, con la mascara que definirÃ¡ la forma de lucir tus pestaÃ±as.\r\n    Experimenta 84% PESTAÃ‘AS MÃS LARGAS y 200% MÃS VOLUMEN.\r\n    Cepillo con doble impacto para una mejor aplicaciÃ³n.\r\n    Con vitaminas y emolientes que ayudan a reforzar y evitar el quiebre de las pestaÃ±as.\r\n  ', 274, 0, 0, 'mascara-para-pestanas-lash-intensity.jpg', '2018-04-05', 35, 39, 20, '0', '1'),
(41, '0', 'Delineador LÃ­quido para Ojos Negro Mary Kay', 'Su aplicador tipo tintero y su fÃ³rmula de secado rÃ¡pido te dan el control para una aplicaciÃ³n fÃ¡cil y color intenso por todo el dÃ­a. Con el Delineador LÃ­quido para Ojos Mary KayÂ® logra el delineado que quieras.\r\n\r\n    DermatolÃ³gicamente probado\r\n    Apto para utilizarse con lentes de contacto y en ojos sensibles\r\n    ClÃ­nicamente probado para pieles alÃ©rgicas\r\n    Libre de fragancia\r\n    A prueba de agua\r\n  ', 139, 0, 0, 'delineador-liquido-para-ojos-negro-mary-kay.jpg', '2018-04-05', 40, 36, 20, '0', '1'),
(42, '0', 'Look creado por Luis Casco', 'ObtÃ©n los cuatro looks exclusivos creados por Luis Casco, Embajador de Belleza Global Mary Kay, con la Â¡Nueva! TecnologÃ­a Chromafusion Matrix de las Sombras Mary Kay y llÃ©valos contigo en el Â¡Nuevo! Petite Palette Mary Kay  ', 268, 0, 0, 'look-creado-por-luis-casco.jpg', '2018-04-05', 38, 39, 40, '0', '1'),
(43, '0', 'Aplicadores de Ojos Mary Kay', 'Â¡Disfruta siempre de una perfecta aplicaciÃ³n de los tonos de Sombra Mineral Compacta Mary Kay! Este paquete dos en uno contiene un Aplicador de Ojos en Esponja Mary Kay y un Aplicador de Ojos en Brocha Mary Kay.\r\n\r\n    El Aplicador de Ojos en Esponja estÃ¡ diseÃ±ado para brindar una cobertura en capas y uniforme de sombra mineral para ojos en el pÃ¡rpado.\r\n    El Aplicador de Ojos en Brocha estÃ¡ diseÃ±ado para brindar una cobertura traslÃºcida o en capas de sombra mineral para ojos.\r\n    Su mango estÃ¡ diseÃ±ado especÃ­ficamente para caber en la mano.\r\n    Cabe perfectamente en todos los estuches cosmÃ©ticos Mary Kay.\r\n  ', 31, 0, 0, 'aplicadores-de-ojos-mary-kay.jpg', '2018-04-05', 39, 35, 2, '0', '1'),
(44, '0', 'Labial en Gel Semi Mate Mary Kay', ' Cobertura intensa, color duradero y suave textura gracias a su tecnologÃ­a en gel. El labial que tus labios amarÃ¡n.\r\n\r\n    Proporciona intenso color con acabado semi mate.\r\n    TenologÃ­a de microesferas ultrafinas para integrar y retener el color en tus labios por mÃ¡s tiempo.\r\n    Su fÃ³rmula en gel se desliza suavemente en los labios.\r\n    Formulado para dar un efecto Ã³ptico de difuminado que dispersa la luz y permite reducir visualmente imperfecciones menores.\r\n   ', 186, 0, 0, 'labial-en-gel-semi-mate-mary-kay.jpg', '2018-04-05', 45, 0, 0, '0', '1'),
(45, '0', 'Labial Acabado Sedoso de EdiciÃ³n Limitada Mary Kay', '  EscÃ¡pate a una nueva experiencia de color con el Labial Acabado Sedoso de EdiciÃ³n Limitada Mary KayÂ®\r\n\r\nDisponible en dos tonos: RosÃ© Blush y Mulberry Muse.\r\n', 214, 0, 0, 'labial-acabado-sedoso-de-edicion-limitada-mary-kay.jpg', '2018-04-05', 44, 0, 0, '0', '1'),
(46, '0', 'Labial Mate Mary Kay', '  El Labial Mate Mary KayÂ® une la tradiciÃ³n, calidad y modernidad en un solo producto. Disponible en 11 tonos intensos con un increÃ­ble acabado mate. MÃ¡s que Mate... Mattissimo!\r\n-Acabado Mate\r\n-Tonos a la moda', 209, 0, 0, 'labial-mate-mary-kay.jpg', '2018-04-05', 44, 45, 0, '0', '1'),
(47, '0', 'LÃ¡piz Delineador para Labios Mary Kay', 'Esta fÃ³rmula ultra cremosa que se desliza con tersura tambiÃ©n contiene ingredientes que protegen los labios y combaten el envejecimiento. Incluye un sacapuntas integrado que te brinda la opciÃ³n de elegir quÃ© tan atrevido o quÃ© tan definido deseas que sea tu delineador. â€¢ FÃ³rmula suave y cremosa â€¢ Larga duraciÃ³n â€¢ Evita que el lÃ¡piz labial se corra o se agriete â€¢ No se emborrona ni se corre  ', 159, 0, 0, 'lapiz-delineador-para-labios-mary-kay.jpg', '2018-04-05', 45, 46, 0, '0', '1'),
(48, '0', 'Labial LÃ­quido Mate Mary Kay At Play', 'Â¡ExprÃ©sate sin lÃ­mites con un este labial lÃ­quido que se aplica como un gloss con el acabado mate de un labial!\r\n\r\n    Una increÃ­ble variedad de tonos ideales para cualquier momento.\r\n    FÃ¡cil aplicaciÃ³n.\r\n    Acabado totalmente mate.\r\n  ', 134, 0, 0, 'labial-liquido-mate-mary-kay-at-play.jpg', '2018-04-05', 46, 44, 47, '0', '1'),
(49, '0', 'Labial LÃ­quido Mate Mary Kay At Play', 'Â¡ExprÃ©sate sin lÃ­mites con un este labial lÃ­quido que se aplica como un gloss con el acabado mate de un labial!\r\n\r\n    Una increÃ­ble variedad de tonos ideales para cualquier momento.\r\n    FÃ¡cil aplicaciÃ³n.\r\n    Acabado totalmente mate.\r\n  ', 134, 0, 0, 'labial-liquido-mate-mary-kay-at-play.jpg', '2018-04-05', 48, 46, 44, '0', '1'),
(50, '0', 'Brillo Labial NouriShine Plus Mary Kay', '    ObtÃ©n un brillo luminoso y humectaciÃ³n al instante para dejar los labios sintiÃ©ndose nutridos.\r\n\r\n    Su fÃ³rmula tiene mÃºltiples ingredientes que brindan grandes beneficios.\r\n    Suaviza, protege y acondiciona los labios.\r\n    Tonos ricos, intensos y de larga duraciÃ³n.\r\n    Con tres niveles de acabado: sin destellos, con intensidad media de destellos e intensidad mÃ¡xima de destellos.\r\n    Su diseÃ±o a la medida cabe perfecto en el Estuche CosmÃ©tico Mary Kay  ', 167, 0, 0, 'brillo-labial-nourishine-plus-mary-kay.jpg', '2018-04-05', 49, 44, 48, '0', '1'),
(51, '0', 'Brillo Labial NouriShine Plus Mary Kay', '  ObtÃ©n un brillo luminoso y humectaciÃ³n al instante para dejar los labios sintiÃ©ndose nutridos.\r\n\r\n    Su fÃ³rmula tiene mÃºltiples ingredientes que brindan grandes beneficios.\r\n    Suaviza, protege y acondiciona los labios.\r\n    Tonos ricos, intensos y de larga duraciÃ³n.\r\n    Con tres niveles de acabado: sin destellos, con intensidad media de destellos e intensidad mÃ¡xima de destellos.\r\n    Su diseÃ±o a la medida cabe perfecto en el Estuche CosmÃ©tico Mary Kay    ', 167, 0, 0, 'brillo-labial-nourishine-plus-mary-kay.jpg', '2018-04-05', 45, 49, 47, '0', '1'),
(52, '0', 'Protector Solar para Labios con FPS 15 Mary Kay', '   El Protector Solar para Labios con FPS 15 Mary KayÂ® mantiene los labios perfectamente protegidos. Es ideal para las personas que buscan proteger sus labios de los daÃ±inos efectos de los rayos UVA/UVB. ', 129, 0, 0, 'protector-solar-para-labios-con-fps-15-mary-kay.jpg', '2018-04-05', 53, 0, 0, '0', '1'),
(53, '0', 'Gel Corporal Restaurador para DespuÃ©s de Asolearse Mary Kay', 'El sol le quita a tu piel su humectaciÃ³n vital. Los extractos botÃ¡nicos y antioxidantes del Gel Corporal Restaurador para DespuÃ©s de Asolearse Mary Kay te ayudan a recuperarla.  ', 174, 0, 0, 'gel-corporal-restaurador-para-despues-de-asolearse-mary-kay.jpg', '2018-04-05', 52, 0, 0, '0', '0'),
(54, '0', 'Protector Solar FPS 50 Mary Kay', 'El Protector Solar FPS 50 Mary KayÂ® es un â€œbÃ¡sicoâ€ que todos deben tener, para combatir los signos de envejecimiento prematuro. Es un hecho: dos tercios de la exposiciÃ³n al sol que las personas experimentan durante su vida es casual (menos de una hora de acumulada de exposiciÃ³n al sol durante el dÃ­a, como al ir manejando tu coche, caminando de tu carro a la oficina y viceversa, etc.).   ', 320, 0, 0, 'protector-solar-fps-50-mary-kay.jpg', '2018-04-05', 52, 0, 0, '0', '1'),
(55, '0', 'Domain Eau de Cologne', '   â€œTe sientes perfecto rodeado de las personas que amas y de la comodidad de un hogarâ€. Para el hombre clÃ¡sico y tradicional que disfruta las actividades al aire libre y las tardes frente a una fogata.  ', 426, 0, 0, 'domain-eau-de-cologne.jpg', '2018-04-05', 56, 0, 0, '0', '1'),
(56, '0', 'ColecciÃ³n de Fragancias Feel&Co', 'Vigencia de la EdiciÃ³n Especial y de las Promociones del 1 de marzo al 30 de abril de 2018 o hasta agotar existencias.   ', 635, 0, 0, 'coleccion-de-fragancias-feel&co.jpg', '2018-04-05', 55, 0, 0, '0', '1'),
(57, '0', 'MK High Intensity Eau de Cologne', 'Tu presencia llama la atenciÃ³n y causa fascinaciÃ³n en la gente a tu alrededor.â€ Para el hombre poderoso y fascinante que lo quiere todo y trabaja duro para conseguirlo.  ', 426, 0, 0, 'mk-high-intensity-eau-de-cologne.jpg', '2018-04-05', 55, 56, 0, '0', '1'),
(58, '0', 'Cityscape para ella Eau de Parfum', 'Cityscape Eau de Parfum es una fragancia sofisticada que puede inspirar a cualquier mujer a vivir la experiencia de nuevos destinos y aventuras. Esta fragancia refleja un estilo personal impecable que no es pretencioso, sino elegante y refinado. Vive cada nueva experiencia con un estilo sencillo y sofisticado.   ', 659, 0, 0, 'cityscape-para-ella-eau-de-parfum.jpg', '2018-04-05', 55, 57, 56, '0', '1'),
(59, '0', 'Dream Fearlessly Eau de Parfum', 'Una fragancia inspirada para la etapa de la mujer donde sueÃ±a en grande, donde es moderna e independiente y con un espÃ­ritu optimista e incansable.   ', 424, 0, 0, 'dream-fearlessly-eau-de-parfum.jpg', '2018-04-05', 56, 57, 0, '0', '1'),
(60, '0', 'Hello Brilliant Eau de Toilette', '  Dile \"\"hola\"\" a Hello Brillant Eau de Toilette, la fragancia de Mary Kay para chicas como tÃº. Es perfecta para ti porque te encantarÃ¡ su esencia floral que combina la manzana y la magnolia, ademÃ¡s su caja es divertida y Ãºnica como tÃº.', 299, 0, 0, 'hello-brilliant-eau-de-toilette.jpg', '2018-04-05', 56, 57, 0, '0', '1'),
(61, '0', 'Thinking of Love Eau de Parfum', 'Vive cada momento, ama cada recuerdo. Esta es tu historia de amor. Thinking of Love Eau de Parfum fue creada para inspirar nuevos momentos romÃ¡nticos e innolvidables. UtilÃ­zala en su cumpleaÃ±os, en el dÃ­a del amor y la amistad, en tu aniversario o en cualquier dÃ­a que quieras dejar huella. Y cuando sea momento de irte, deja tu esenciaThinking of Love Eau de Parfum en su almohada o en una nota de amor. El aroma fresco y floral de esta fragancia harÃ¡ que siempre te tenga en su mente.  ', 399, 0, 0, 'thinking-of-love-eau-de-parfum.jpg', '2018-04-05', 57, 56, 59, '0', '1'),
(62, '0', 'True Passion Eau de Toilette', '  Su hermoso empaque estÃ¡ diseÃ±ado a la medida y estÃ¡ inspirado en la fruta de la pasiÃ³n brasileÃ±a, ademÃ¡s su balanceada mezcla de frescura, feminidad y sensualidad celebra la pasiÃ³n de la mujer por la vida y el amor.', 299, 0, 0, 'true-passion-eau-de-toilette.jpg', '2018-04-05', 59, 55, 61, '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `colonia` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `codpos` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `pais` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `direccion`, `ciudad`, `colonia`, `estado`, `codpos`, `pais`, `clave`) VALUES
(21, 'Stacy', 'Sierra', 'Sierra_fidel@yahoo.com', 'Xxxx', 'Xxx', 'Xxxx', 'Xxxx', 'Xxx', 'Xxxx', '1518a875f0a935204fe4d7558b33f23befc55427a63835e45483790a3c6a38842f853278866e8e439014022521d29d1d9720ea3e4fa724ffedb4839efac9a55d'),
(22, 'Juan', 'Argueta', 'gears_umbrella1@hotmail.com', 'Aldama #61', 'Acambaro', 'centro', 'Guanajuato', '38600', 'MÃ©xico', 'efbafe45eac2f5f74ff350f5cb8eddca95fdcc302bb9cfb3285344461e11c0d81a0f9b93b1651268a0ea8df4800121a77ef141506d3b60c67df623897512df79'),
(23, 'andres', 'sierra', 'andres@andres.com', 'Aldama #61', 'Acambaro', 'centro', 'Guanajuato', '38600', 'MÃ©xico', '67218cf02e5cc9df40e908bb089a65b37b3c046f18edc5e04c5d80d01de6c8bab610d3273585c8b5230a7c4b8ab43ae6f85c544963e7022c67ef52c612ae2357'),
(24, 'stacy', 'sierra', 'stacyy@stacy.com', 'xxx', 'xx', 'xx', 'xx', 'xx', 'xx', '9110ed9c6b51cc5c5f2c4fa1aae8d77b1d0aee7d553d536f7b486a0a0c698bae65c21b254c9a093bef8e868f1f5e8bf7239255a5c56198f9f699295021868ffd'),
(25, 'rosa', 'ber', 'xxx@xxx.com', 'xxx', 'xxx', 'xxx', 'xxx', '2765', 'xxx', '9110ed9c6b51cc5c5f2c4fa1aae8d77b1d0aee7d553d536f7b486a0a0c698bae65c21b254c9a093bef8e868f1f5e8bf7239255a5c56198f9f699295021868ffd'),
(26, 'maria', 'db', 'mariadb@ddd.vom', 'xxxx', 'xxxx', 'xxxx', '6xx', '6667', 'xxxx', '9110ed9c6b51cc5c5f2c4fa1aae8d77b1d0aee7d553d536f7b486a0a0c698bae65c21b254c9a093bef8e868f1f5e8bf7239255a5c56198f9f699295021868ffd'),
(27, 'xxxxxx', 'xxxxxxx', 'xxxxxxxx@xxxxxxx.com', 'xxxx', 'xxxx', 'xxx', 'xxxx', 'xxxx', 'xxxx', 'c70da2534b4c8367fb6f3ebb020106a40deda83fe6fa5e001a25ee18bec275fe030fa9a25d5f1c061ddb3c94a7f4d86b39bc3ba88c0d764d32ff6c5861d9ebe6'),
(28, 'xxxxxxxxx', 'xxxxxxxxxx', 'xxxx@xx.xom', 'xxxxx', 'xxxx', 'xxxxxx', 'xxxx', '234', 'xxxx', '8b99ef07198c8cefb62470be396e43531dc343402a16e4b96edba6b6ac2fc8d9ecba2e3ef8aa6f56348541510db0a21c3f0f508117e635bfb5215be98c81ca44'),
(29, 'stacey', 'huerta', 'stacey@stacey.com', 'aldama#61', 'acamba', 'Centro', 'Guanajuato', '38600', 'mexico', '1518a875f0a935204fe4d7558b33f23befc55427a63835e45483790a3c6a38842f853278866e8e439014022521d29d1d9720ea3e4fa724ffedb4839efac9a55d'),
(31, 'Juan', 'Argueta', 'gears_umbrella@hotmail.com', 'Aldama #61', 'Acambaro', 'centro', 'Guanajuato', '38600', 'MÃ©xico', '1518a875f0a935204fe4d7558b33f23befc55427a63835e45483790a3c6a38842f853278866e8e439014022521d29d1d9720ea3e4fa724ffedb4839efac9a55d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admon`
--
ALTER TABLE `admon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historicopedidos`
--
ALTER TABLE `historicopedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admon`
--
ALTER TABLE `admon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `historicopedidos`
--
ALTER TABLE `historicopedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
