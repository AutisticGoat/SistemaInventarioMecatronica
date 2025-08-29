-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2025 a las 21:18:14
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
-- Base de datos: `sistemamecatronica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `IDDevolución` int(11) NOT NULL,
  `TipoHerramienta` varchar(30) NOT NULL,
  `IDHerramienta` varchar(6) NOT NULL,
  `AprobadorDevolución` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionsoldadura`
--

CREATE TABLE `estacionsoldadura` (
  `ID` varchar(6) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente`
--

CREATE TABLE `fuente` (
  `ID` varchar(6) NOT NULL,
  `Estado` varchar(15) NOT NULL DEFAULT 'Activo',
  `Disponible` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fuente`
--

INSERT INTO `fuente` (`ID`, `Estado`, `Disponible`) VALUES
('1', 'Averiado', 1),
('342', 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentedual`
--

CREATE TABLE `fuentedual` (
  `ID` varchar(6) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimetro`
--

CREATE TABLE `multimetro` (
  `ID` varchar(6) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimetrogancho`
--

CREATE TABLE `multimetrogancho` (
  `ID` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `osciloscopio`
--

CREATE TABLE `osciloscopio` (
  `ID` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL DEFAULT 'Disponible',
  `Disponible` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `osciloscopio`
--

INSERT INTO `osciloscopio` (`ID`, `Estado`, `Disponible`) VALUES
(1, 'Activo', 1),
(2, 'Activo', 1),
(3, 'Activo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `préstamo`
--

CREATE TABLE `préstamo` (
  `IDPréstamo` int(11) NOT NULL,
  `TipoHerramienta` varchar(30) NOT NULL,
  `IDHerramienta` varchar(6) NOT NULL,
  `AprobadorPréstamo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` varchar(5) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `ContraseñaUsuario` varchar(20) NOT NULL,
  `TipoUsuario` varchar(13) NOT NULL DEFAULT 'Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NombreUsuario`, `ContraseñaUsuario`, `TipoUsuario`) VALUES
('', '', '', ''),
('PA241', 'Santiago Herrera', '12345', 'Usuario'),
('PA948', 'Bianca Managan', '12345', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`IDDevolución`);

--
-- Indices de la tabla `estacionsoldadura`
--
ALTER TABLE `estacionsoldadura`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `fuente`
--
ALTER TABLE `fuente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `fuentedual`
--
ALTER TABLE `fuentedual`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `multimetro`
--
ALTER TABLE `multimetro`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `multimetrogancho`
--
ALTER TABLE `multimetrogancho`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `osciloscopio`
--
ALTER TABLE `osciloscopio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `préstamo`
--
ALTER TABLE `préstamo`
  ADD PRIMARY KEY (`IDPréstamo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NombreUsuario` (`NombreUsuario`),
  ADD KEY `ContraseñaUsuario` (`ContraseñaUsuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `IDDevolución` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `multimetrogancho`
--
ALTER TABLE `multimetrogancho`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `préstamo`
--
ALTER TABLE `préstamo`
  MODIFY `IDPréstamo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
