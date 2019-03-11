-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2019 a las 08:58:21
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asix2m`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asignaturas` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `login_profe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignaturas`, `nombre`, `login_profe`) VALUES
(1, 'sistemas', 'a.fauquer'),
(2, 'programacio', 'a.fauquer'),
(3, 'bases de dades', 'a.fauquer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_asignaturas` int(11) NOT NULL,
  `alu_login` varchar(20) NOT NULL,
  `nota_1` varchar(20) NOT NULL,
  `nota_2` varchar(20) NOT NULL,
  `nota_Final` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_asignaturas`, `alu_login`, `nota_1`, `nota_2`, `nota_Final`) VALUES
(2, 'g.asbert', '8', '8', '5'),
(3, 'g.auro', '6', '2', '7'),
(3, 'g.asbert', '8', '5', '2'),
(1, 'g.asbert', '7', '6', '1'),
(1, 'g.auro', '4', '9', '5'),
(1, 'p.pep', '6', '6', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `login`, `password`, `categoria`) VALUES
('arnau', 'fauque', 'a.fauquer', '123', 0),
('francesc', 'sanahuja', 'f.sanahuja', '123', 0),
('guiu', 'asbert', 'g.asbert', '123', 5),
('guim', 'auro', 'g.auro', '123', 5),
('pepe', 'pep', 'p.pep', '123', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignaturas`) USING BTREE,
  ADD KEY `proflogin` (`login_profe`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD KEY `asig` (`id_asignaturas`),
  ADD KEY `loginalu` (`alu_login`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`) USING BTREE;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `rel_profe` FOREIGN KEY (`login_profe`) REFERENCES `usuarios` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `rel_alu` FOREIGN KEY (`alu_login`) REFERENCES `usuarios` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel_asi` FOREIGN KEY (`id_asignaturas`) REFERENCES `asignaturas` (`id_asignaturas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
