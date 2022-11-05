-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 16:14:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compsys`
--

-- --------------------------------------------------------
-- CREATE DATABASE compsys CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `surname` char(25) NOT NULL,
  `forename` char(25) NOT NULL,
  `town` char(20) NOT NULL,
  `county` char(20) NOT NULL DEFAULT '',
  `tel` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`cust_id`, `surname`, `forename`, `town`, `county`, `tel`) VALUES
(1, 'Collado', 'Zoraida', 'Salcedo', '055753951', '8093311414'),
(2, 'Blanco', 'Keyla', 'Piantini', '40278978998', '80979820417'),
(3, 'Mercado', 'Carlos', 'Villa Mirabal', '4025789878', '80972183569'),
(4, 'Collado', 'Lorena', 'Villa Mirabal', '4025789878', '80968780756'),
(5, 'Perez', 'Juan', 'Palmarito', '4025789879', '8497718755'),
(6, 'Santana', 'Juan Carlos', 'Naco, distrito nacio', '4027859878', '8097218356'),
(7, 'Perez', 'John', 'Naco, distrito nacio', '40275395147', '849721835'),
(8, 'Diaz', 'Rosa', 'Villa Mella', '40275395147', '8097218354'),
(9, 'Gonzales', 'Daniel', 'Villa consuelo', '05578965478', '8498898052'),
(10, 'Diaz', 'Carolina', 'Distrito nacional', '05578965478', '80971234567'),
(11, 'Pere', 'Juan', 'San juan', '21345678', '8456884833'),
(12, 'Santana', 'Jean', 'Distrito Nacional', '0555789654', '8498898052'),
(13, 'Medina', 'Emilio', 'Mejoramiento Social', '4027536987', '8495789654'),
(14, 'Florentino', 'Juan', 'Mejoramiento Social', '12737843', '845688478');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `monthlyrepairs`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `monthlyrepairs` (
`status` enum('Nuevo','En proceso','Resuelto','Esperando por piezas','Esperando por cliente','Abandonado')
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orderitems`
--

CREATE TABLE `orderitems` (
  `ordItems_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `rep_id` int(11) NOT NULL DEFAULT 0,
  `cust_id` int(11) NOT NULL DEFAULT 0,
  `ordDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`ord_id`, `cust_id`, `staff_id`, `ordDate`) VALUES
(1,  1, 1, '2022-10-19 23:09:11'),
(2,  3, 1, '2022-10-19 23:09:13'),
(3, 4, 1, '2022-10-19 23:11:04'),
(4, 2, 1, '2022-10-19 23:11:05'),
(5, 3, 1, '2022-10-19 23:11:05'),
(6,  1, 1, '2022-10-21 16:20:40'),
(7,  1, 1, '2022-10-26 22:18:19'),
;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repairs`
--

CREATE TABLE `repairs` (
  `Rep_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `DeviceType` enum('Laptop','PC','Impresora','Otros') NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `OS` enum('Windows 7','Windows 8','Windows 10','Windows 11','Otros') NOT NULL,
  `RepairDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CollectionDate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `Status` enum('Nuevo','En proceso','Resuelto','Esperando por piezas','Esperando por cliente','Abandonado') NOT NULL DEFAULT 'Nuevo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repairs`
--

INSERT INTO `repairs` (`Rep_ID`, `Cust_ID`, `Staff_ID`, `Description`, `DeviceType`, `Brand`, `Model`, `OS`, `RepairDate`, `CollectionDate`, `Status`) VALUES
(1, 10, 2, 'Pantalla Rota', 'Laptop', 'HP', 'Pavilio', 'Windows 7', '2022-10-11 19:34:24', '2022-10-19 07:12:54', 'Nuevo'),
(2, 1, 1, 'Motherboard  quemado', 'Laptop', 'HP', '15', 'Windows 10', '2022-10-16 20:45:52', '2022-10-17 22:06:13', 'En proceso'),
(3, 1, 1, 'Instalacion de office', 'Laptop', 'Dell', 'D360', 'Windows 10', '2022-10-16 20:46:24', '2022-10-17 22:07:13', 'Esperando por cliente'),
(4, 1, 1, 'No da video\r\n', 'Laptop', 'Dell', 'XPS', 'Windows 11', '2022-10-16 20:46:26', '2022-10-17 22:09:10', 'Nuevo'),
(5, 1, 1, 'Atasco de papel', 'Impresora', 'HP ', 'deskjet', 'Otros', '2022-10-16 20:46:26', '2022-10-17 22:13:04', 'En proceso'),
(6, 1, 1, 'Base de bisagra rota', 'Laptop', 'Dell', 'inspiron', 'Windows 10', '2022-10-16 20:46:26', '2022-10-17 22:14:29', 'Esperando por cliente'),
(7, 1, 1, 'Error de scanner ', 'Impresora', 'HP', 'OfficeJet', 'Otros', '2022-10-16 20:46:27', '2022-10-17 22:21:39', 'Nuevo'),
(8, 1, 1, 'Reinstalación de window ', 'PC', 'Dell', ' optiplex', 'Windows 11', '2022-10-16 20:46:27', '2022-10-17 22:23:25', 'En proceso'),
(9, 1, 1, 'Error de teclado', 'Laptop', 'Dell', 'inspiron', 'Windows 10', '2022-10-16 20:46:27', '2022-10-17 22:25:33', 'Resuelto'),
(10, 1, 1, 'Papel atascado ', 'Impresora', 'Canon', 'Pixma', 'Windows 10', '2022-10-16 20:46:27', '2022-10-17 22:27:56', 'En proceso'),
(11, 1, 1, 'No detecta wifi', 'Laptop', 'Lenovo ', 'ideapad', 'Windows 11', '2022-10-16 20:46:27', '2022-10-17 22:29:09', 'En proceso'),
(12, 1, 1, 'Pantalla con mancha verde ', 'Laptop', 'Dell', 'D360', 'Windows 7', '2022-10-16 20:46:28', '2022-10-18 19:05:45', 'Nuevo'),
(13, 1, 1, 'Error del power supply', 'PC', 'HP', 'COMPAQ', 'Windows 11', '2022-10-16 20:46:28', '2022-10-17 22:34:26', 'Abandonado'),
(14, 1, 1, 'Error de cartucho', 'Impresora', 'Canon', 'Pixma', 'Otros', '2022-10-16 20:46:28', '2022-10-17 22:37:53', 'Esperando por cliente'),
(15, 1, 1, 'inspiron', 'Laptop', 'Dell', 'D360', 'Windows 10', '2022-10-16 20:46:28', '2022-10-17 22:40:09', 'Esperando por piezas'),
(16, 1, 1, 'Papel atascado', 'Impresora', 'EPSON ', 'L', 'Otros', '2022-10-16 20:46:28', '2022-10-17 22:41:55', 'Esperando por piezas'),
(17, 1, 1, 'Reinstalación del Windows', 'Laptop', 'latitude', 'D360', 'Windows 10', '2022-10-16 20:46:28', '2022-10-17 22:44:35', 'Resuelto'),
(18, 1, 1, 'Error de memoria', 'PC', 'Lenovo ', ' ThinkCenter', 'Windows 10', '2022-10-16 20:46:29', '2022-10-17 22:46:45', 'Esperando por cliente'),
(19, 1, 1, 'No reconoce el disco duro', 'Laptop', 'Lenovo', 'ideapad s340', 'Windows 10', '2022-10-16 20:46:29', '2022-10-17 22:54:09', 'En proceso'),
(20, 1, 1, 'No reconoce USB', 'Laptop', 'HP', 'OfficeJet', 'Otros', '2022-10-16 22:01:07', '2022-10-17 22:57:13', 'Nuevo'),
(21, 2, 1, 'Se calienta demasiado', 'PC', 'PC', 'Clon', 'Windows 11', '2022-12-25 19:29:02', '2022-10-17 22:59:23', 'Nuevo'),
(22, 3, 1, 'Mancha en la pantalla', 'Laptop', 'Toshiba', 'Satellite ', 'Windows 7', '2022-12-25 19:34:24', '2022-10-18 19:07:38', 'Nuevo'),
(23, 13, 3, 'Pantalla parpadea', 'Laptop', 'Lenovo', 'Z270', 'Windows 7', '2022-10-19 00:05:31', '2022-10-19 08:54:21', 'Resuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `forename` char(25) NOT NULL,
  `surname` char(25) NOT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `town` char(20) DEFAULT NULL,
  `county` char(20) DEFAULT NULL,
  `tel` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`staff_id`, `forename`, `surname`, `username`, `password`, `email`, `town`, `county`, `tel`) VALUES
(1, 'Zori', 'Collado', 'admin', 'admin', 'zori_collado@hotmail.com', 'Salcedo', '05545698715', '80933114171'),
(2, 'Emil', 'Medina', 'Admin2', 'admin2', 'emilmedina@hotmail.com', 'Mejoramiento Social', '05545698715', '0879820417'),
(3, 'Jean', 'Santana', 'admin3', 'admin3', 'intento@hotmail.com', 'Distrito Nacional', '0555789654', '8498898052');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL,
  `price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`stock_id`, `description`, `price`) VALUES
(1, 'Instalación de Windows ', '1800.00'),
(2, 'Reparación de motherboard', '3800.00'),
(3, 'Mantenimiento a las PC/Laptop', '1200.00'),
(4, 'Mantenimiento a  impresoras', '2400.00'),
(5, 'Desbloqueo de impresoras', '3500.00'),
(6, 'Backup', '1000.00'),
(7, 'Reparación de bisagras', '4800.00');

-- --------------------------------------------------------

--
-- Estructura para la vista `monthlyrepairs`
--
DROP TABLE IF EXISTS `monthlyrepairs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthlyrepairs`  AS SELECT `repairs`.`Status` AS `status`, count(`repairs`.`Status`) AS `total` FROM `repairs` WHERE month(`repairs`.`RepairDate`) = extract(month from current_timestamp()) GROUP BY `repairs`.`Status` ORDER BY `repairs`.`RepairDate` desc ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indices de la tabla `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`ordItems_id`,`ord_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`,`cust_id`);

--
-- Indices de la tabla `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`Rep_ID`,`Cust_ID`,`Staff_ID`),
  ADD KEY `fk_Repairs_Cust` (`Cust_ID`),
  ADD KEY `fk_Repairs_Staff` (`Staff_ID`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `ordItems_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `repairs`
--
ALTER TABLE `repairs`
  MODIFY `Rep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `fk_Repairs_Cust` FOREIGN KEY (`Cust_ID`) REFERENCES `customers` (`cust_id`),
  ADD CONSTRAINT `fk_Repairs_Staff` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
