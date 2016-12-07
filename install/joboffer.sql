-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2016 a las 17:29:53
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `joboffer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offer`
--

CREATE TABLE `offer` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `ContactTLF` varchar(12) NOT NULL,
  `ContactMail` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Assentament` varchar(50) NOT NULL,
  `PostCode` int(5) NOT NULL,
  `Province` int(2) NOT NULL,
  `State` varchar(1) NOT NULL,
  `DateCreation` date NOT NULL,
  `DateComunication` date NOT NULL,
  `Psicologist` varchar(50) NOT NULL,
  `Candidate` varchar(50) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `offer`
--

INSERT INTO `offer` (`Id`, `Description`, `Contact`, `ContactTLF`, `ContactMail`, `Address`, `Assentament`, `PostCode`, `Province`, `State`, `DateCreation`, `DateComunication`, `Psicologist`, `Candidate`, `Notes`) VALUES
(97, 'Descripcion 1', 'Contacto 1', '666-666666', 'email1@mail.es', 'Direccion 1', 'Poblacion 1', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 1', 'Candidato 1', 'Notas 1'),
(98, 'Descripcion 2', 'Contacto 2', '666-666666', 'email2@mail.es', 'Direccion 2', 'Poblacion 2', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 2', 'Candidato 2', 'Notas 2'),
(99, 'Descripcion 3', 'Contacto 3', '666-666666', 'email3@mail.es', 'Direccion 3', 'Poblacion 3', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 3', 'Candidato 3', 'Notas 3'),
(100, 'Descripcion 4', 'Contacto 4', '666-666666', 'email4@mail.es', 'Direccion 4', 'Poblacion 4', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 4', 'Candidato 4', 'Notas 4'),
(101, 'Descripcion 5', 'Contacto 5', '666-666666', 'email5@mail.es', 'Direccion 5', 'Poblacion 5', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 5', 'Candidato 5', 'Notas 5'),
(102, 'Descripcion 6', 'Contacto 6', '666-666666', 'email6@mail.es', 'Direccion 6', 'Poblacion 6', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 6', 'Candidato 6', 'Notas 6'),
(103, 'Descripcion 7', 'Contacto 7', '666-666666', 'email7@mail.es', 'Direccion 7', 'Poblacion 7', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 7', 'Candidato 7', 'Notas 7'),
(104, 'Descripcion 8', 'Contacto 8', '666-666666', 'email8@mail.es', 'Direccion 8', 'Poblacion 8', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 8', 'Candidato 8', 'Notas 8'),
(105, 'Descripcion 9', 'Contacto 9', '666-666666', 'email9@mail.es', 'Direccion 9', 'Poblacion 9', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 9', 'Candidato 9', 'Notas 9'),
(106, 'Descripcion 10', 'Contacto 10', '666-666666', 'email10@mail.es', 'Direccion 10', 'Poblacion 10', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 10', 'Candidato 10', 'Notas 10'),
(107, 'Descripcion 11', 'Contacto 11', '666-666666', 'email11@mail.es', 'Direccion 11', 'Poblacion 11', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 11', 'Candidato 11', 'Notas 11'),
(108, 'Descripcion 12', 'Contacto 12', '666-666666', 'email12@mail.es', 'Direccion 12', 'Poblacion 12', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 12', 'Candidato 12', 'Notas 12'),
(109, 'Descripcion 13', 'Contacto 13', '666-666666', 'email13@mail.es', 'Direccion 13', 'Poblacion 13', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 13', 'Candidato 13', 'Notas 13'),
(110, 'Descripcion 14', 'Contacto 14', '666-666666', 'email14@mail.es', 'Direccion 14', 'Poblacion 14', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 14', 'Candidato 14', 'Notas 14'),
(111, 'Descripcion 15', 'Contacto 15', '666-666666', 'email15@mail.es', 'Direccion 15', 'Poblacion 15', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 15', 'Candidato 15', 'Notas 15'),
(112, 'Descripcion 16', 'Contacto 16', '666-666666', 'email16@mail.es', 'Direccion 16', 'Poblacion 16', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 16', 'Candidato 16', 'Notas 16'),
(113, 'Descripcion 17', 'Contacto 17', '666-666666', 'email17@mail.es', 'Direccion 17', 'Poblacion 17', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 17', 'Candidato 17', 'Notas 17'),
(114, 'Descripcion 18', 'Contacto 18', '666-666666', 'email18@mail.es', 'Direccion 18', 'Poblacion 18', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 18', 'Candidato 18', 'Notas 18'),
(115, 'Descripcion 19', 'Contacto 19', '666-666666', 'email19@mail.es', 'Direccion 19', 'Poblacion 19', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 19', 'Candidato 19', 'Notas 19'),
(116, 'Descripcion 20', 'Contacto 20', '666-666666', 'email20@mail.es', 'Direccion 20', 'Poblacion 20', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 20', 'Candidato 20', 'Notas 20'),
(117, 'Descripcion 21', 'Contacto 21', '666-666666', 'email21@mail.es', 'Direccion 21', 'Poblacion 21', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 21', 'Candidato 21', 'Notas 21'),
(118, 'Descripcion 22', 'Contacto 22', '666-666666', 'email22@mail.es', 'Direccion 22', 'Poblacion 22', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 22', 'Candidato 22', 'Notas 22'),
(119, 'Descripcion 23', 'Contacto 23', '666-666666', 'email23@mail.es', 'Direccion 23', 'Poblacion 23', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 23', 'Candidato 23', 'Notas 23'),
(120, 'Descripcion 24', 'Contacto 24', '666-666666', 'email24@mail.es', 'Direccion 24', 'Poblacion 24', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 24', 'Candidato 24', 'Notas 24'),
(121, 'Descripcion 25', 'Contacto 25', '666-666666', 'email25@mail.es', 'Direccion 25', 'Poblacion 25', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 25', 'Candidato 25', 'Notas 25'),
(122, 'Descripcion 26', 'Contacto 26', '666-666666', 'email26@mail.es', 'Direccion 26', 'Poblacion 26', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 26', 'Candidato 26', 'Notas 26'),
(123, 'Descripcion 27', 'Contacto 27', '666-666666', 'email27@mail.es', 'Direccion 27', 'Poblacion 27', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 27', 'Candidato 27', 'Notas 27'),
(124, 'Descripcion 28', 'Contacto 28', '666-666666', 'email28@mail.es', 'Direccion 28', 'Poblacion 28', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 28', 'Candidato 28', 'Notas 28'),
(125, 'Descripcion 29', 'Contacto 29', '666-666666', 'email29@mail.es', 'Direccion 29', 'Poblacion 29', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 29', 'Candidato 29', 'Notas 29'),
(126, 'Descripcion 30', 'Contacto 30', '666-666666', 'email30@mail.es', 'Direccion 30', 'Poblacion 30', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 30', 'Candidato 30', 'Notas 30'),
(127, 'Descripcion 31', 'Contacto 31', '666-666666', 'email31@mail.es', 'Direccion 31', 'Poblacion 31', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 31', 'Candidato 31', 'Notas 31'),
(128, 'Descripcion 32', 'Contacto 32', '666-666666', 'email32@mail.es', 'Direccion 32', 'Poblacion 32', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 32', 'Candidato 32', 'Notas 32'),
(129, 'Descripcion 33', 'Contacto 33', '666-666666', 'email33@mail.es', 'Direccion 33', 'Poblacion 33', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 33', 'Candidato 33', 'Notas 33'),
(130, 'Descripcion 34', 'Contacto 34', '666-666666', 'email34@mail.es', 'Direccion 34', 'Poblacion 34', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 34', 'Candidato 34', 'Notas 34'),
(131, 'Descripcion 35', 'Contacto 35', '666-666666', 'email35@mail.es', 'Direccion 35', 'Poblacion 35', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 35', 'Candidato 35', 'Notas 35'),
(132, 'Descripcion 36', 'Contacto 36', '666-666666', 'email36@mail.es', 'Direccion 36', 'Poblacion 36', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 36', 'Candidato 36', 'Notas 36'),
(133, 'Descripcion 37', 'Contacto 37', '666-666666', 'email37@mail.es', 'Direccion 37', 'Poblacion 37', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 37', 'Candidato 37', 'Notas 37'),
(134, 'Descripcion 38', 'Contacto 38', '666-666666', 'email38@mail.es', 'Direccion 38', 'Poblacion 38', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 38', 'Candidato 38', 'Notas 38'),
(135, 'Descripcion 39', 'Contacto 39', '666-666666', 'email39@mail.es', 'Direccion 39', 'Poblacion 39', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 39', 'Candidato 39', 'Notas 39'),
(136, 'Descripcion 40', 'Contacto 40', '666-666666', 'email40@mail.es', 'Direccion 40', 'Poblacion 40', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 40', 'Candidato 40', 'Notas 40'),
(137, 'Descripcion 41', 'Contacto 41', '666-666666', 'email41@mail.es', 'Direccion 41', 'Poblacion 41', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 41', 'Candidato 41', 'Notas 41'),
(138, 'Descripcion 42', 'Contacto 42', '666-666666', 'email42@mail.es', 'Direccion 42', 'Poblacion 42', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 42', 'Candidato 42', 'Notas 42'),
(139, 'Descripcion 43', 'Contacto 43', '666-666666', 'email43@mail.es', 'Direccion 43', 'Poblacion 43', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 43', 'Candidato 43', 'Notas 43'),
(140, 'Descripcion 44', 'Contacto 44', '666-666666', 'email44@mail.es', 'Direccion 44', 'Poblacion 44', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 44', 'Candidato 44', 'Notas 44'),
(141, 'Descripcion 45', 'Contacto 45', '666-666666', 'email45@mail.es', 'Direccion 45', 'Poblacion 45', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 45', 'Candidato 45', 'Notas 45'),
(142, 'Descripcion 46', 'Contacto 46', '666-666666', 'email46@mail.es', 'Direccion 46', 'Poblacion 46', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 46', 'Candidato 46', 'Notas 46'),
(143, 'Descripcion 47', 'Contacto 47', '666-666666', 'email47@mail.es', 'Direccion 47', 'Poblacion 47', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 47', 'Candidato 47', 'Notas 47'),
(144, 'Descripcion 48', 'Contacto 48', '666-666666', 'email48@mail.es', 'Direccion 48', 'Poblacion 48', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 48', 'Candidato 48', 'Notas 48'),
(145, 'Descripcion 49', 'Contacto 49', '666-666666', 'email49@mail.es', 'Direccion 49', 'Poblacion 49', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 49', 'Candidato 49', 'Notas 49'),
(146, 'Descripcion 50', 'Contacto 50', '666-666666', 'email50@mail.es', 'Direccion 50', 'Poblacion 50', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 50', 'Candidato 50', 'Notas 50'),
(147, 'Descripcion 51', 'Contacto 51', '666-666666', 'email51@mail.es', 'Direccion 51', 'Poblacion 51', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 51', 'Candidato 51', 'Notas 51'),
(148, 'Descripcion 52', 'Contacto 52', '666-666666', 'email52@mail.es', 'Direccion 52', 'Poblacion 52', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 52', 'Candidato 52', 'Notas 52'),
(149, 'Descripcion 53', 'Contacto 53', '666-666666', 'email53@mail.es', 'Direccion 53', 'Poblacion 53', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 53', 'Candidato 53', 'Notas 53'),
(150, 'Descripcion 54', 'Contacto 54', '666-666666', 'email54@mail.es', 'Direccion 54', 'Poblacion 54', 55555, 5, 'P', '2016-12-06', '0000-00-00', 'Psicologo 54', 'Candidato 54', 'Notas 54');

--
-- Disparadores `offer`
--
DELIMITER $$
CREATE TRIGGER `dateCreation` BEFORE INSERT ON `offer` FOR EACH ROW SET NEW.DateCreation = Now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

CREATE TABLE `tbl_provincias` (
  `cod` int(2) NOT NULL COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `tbl_provincias`
--

INSERT INTO `tbl_provincias` (`cod`, `nombre`) VALUES
(1, 'Alava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almera'),
(33, 'Asturias'),
(5, 'Avila'),
(6, 'Badajoz'),
(7, 'Balears (Illes)'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(39, 'Cantabria'),
(12, 'Castellón'),
(51, 'Ceuta'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'Coruña (A)'),
(16, 'Cuenca'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(20, 'Guipzcoa'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(25, 'Lleida'),
(27, 'Lugo'),
(28, 'Madrid'),
(29, 'Málaga'),
(52, 'Melilla'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(34, 'Palencia'),
(35, 'Palmas (Las)'),
(36, 'Pontevedra'),
(26, 'Rioja (La)'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia'),
(47, 'Valladolid'),
(48, 'Vizcaya'),
(49, 'Zamora'),
(50, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `UserType` text NOT NULL,
  `Username` text NOT NULL,
  `Pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Id`, `Name`, `UserType`, `Username`, `Pass`) VALUES
(-1, 'Administrador', 'A', 'administrador', 'administrador'),
(1, 'Usuario 1', 'P', 'User1', 'User1'),
(2, 'Usuario 2', 'P', 'psicologo', 'psicologo'),
(3, 'Usuario 3', 'P', 'User3', 'User3'),
(4, 'Usuario 4', 'P', 'User4', 'User4'),
(5, 'Usuario 5', 'P', 'User5', 'User5'),
(6, 'Usuario 6', 'P', 'User6', 'User6'),
(7, 'Usuario 7', 'P', 'User7', 'User7'),
(8, 'Usuario 8', 'P', 'User8', 'User8'),
(9, 'Usuario 9', 'P', 'User9', 'User9'),
(10, 'Usuario 10', 'P', 'User10', 'User10'),
(11, 'Usuario 11', 'A', 'User11', 'User11'),
(12, 'Usuario 12', 'A', 'User12', 'User12'),
(13, 'Usuario 13', 'A', 'User13', 'User13'),
(14, 'Usuario 14', 'A', 'User14', 'User14'),
(15, 'Usuario 15', 'A', 'User15', 'User15'),
(16, 'Usuario 16', 'A', 'User16', 'User16'),
(17, 'Usuario 17', 'A', 'User17', 'User17'),
(18, 'Usuario 18', 'A', 'User18', 'User18'),
(19, 'Usuario 19', 'A', 'User19', 'User19'),
(20, 'Usuario 20', 'A', 'User20', 'User20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `offer`
--
ALTER TABLE `offer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  MODIFY `cod` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Código de la provincia de dos digitos', AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
