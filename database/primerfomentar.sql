-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2018 a las 00:40:41
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fomentar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idActividad` int(11) NOT NULL,
  `Nro_Orden` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Edad_Inicial` int(11) DEFAULT NULL,
  `Edad_Final` int(11) DEFAULT NULL,
  `idSexo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `Descripcion`, `Edad_Inicial`, `Edad_Final`, `idSexo`) VALUES
(1, 'pre-mini-basq', 6, 10, 3),
(2, 'mini-mixto-basq', 11, 12, 3),
(3, 'sub-15-fem-basq', 13, 17, 1),
(4, 'sub-15-masc-basq', 13, 15, 2),
(5, 'sub-17-masc-basq', 16, 19, 2),
(6, 'primera-fem-basq', 18, 45, 1),
(7, 'primera-masc-basq', 20, 45, 2),
(8, 'prim-grupo-voley', 6, 40, 3),
(9, 'seg-grupo-voley', 6, 40, 3),
(10, 'terc-grupo-voley', 6, 40, 3),
(11, 'prim-grupo-patin', 3, 45, 1),
(12, 'seg-grupo-patin', 3, 45, 1),
(13, 'intermedio-patin', 3, 45, 1),
(14, 'avanzado-patin', 3, 45, 1),
(15, 'escuelita-patin', 3, 45, 1),
(16, 'menores-taek', 6, 12, 3),
(17, 'mayores-taek', 13, 60, 3),
(18, 'arte', 5, 70, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Nro_orden` int(11) NOT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Domicilio` varchar(50) DEFAULT NULL,
  `DNI` int(11) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Fecha_ingreso` date DEFAULT NULL,
  `idParametro_Socio` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idSexo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `idDisciplina` int(11) NOT NULL,
  `Detalle` varchar(50) DEFAULT NULL,
  `ValorSocio` int(11) DEFAULT NULL,
  `ValorNoSocio` int(11) DEFAULT NULL,
  `idCategoria` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`idDisciplina`, `Detalle`, `ValorSocio`, `ValorNoSocio`, `idCategoria`) VALUES
(1, 'basquet', 290, 390, 1),
(2, 'basquet', 290, 390, 2),
(3, 'basquet', 330, 430, 3),
(4, 'basquet', 330, 430, 4),
(5, 'basquet', 330, 430, 5),
(6, 'basquet', 330, 430, 6),
(7, 'basquet', 330, 430, 7),
(8, 'voley', 280, 380, 8),
(9, 'voley', 320, 420, 9),
(10, 'voley', 320, 420, 10),
(11, 'patin', 300, 400, 11),
(12, 'patin', 300, 400, 12),
(13, 'patin', 300, 430, 13),
(14, 'patin', 420, 520, 14),
(15, 'patin', 170, 170, 15),
(16, 'taekwondo', 400, 500, 16),
(17, 'taekwondo', 400, 500, 17),
(18, 'arte', 300, 300, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `Estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `idFacturacion` int(11) NOT NULL,
  `Nro_orden` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Mes` int(11) NOT NULL,
  `Pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_socio`
--

CREATE TABLE `parametro_socio` (
  `idParametro_Socio` int(11) NOT NULL,
  `Detallepar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parametro_socio`
--

INSERT INTO `parametro_socio` (`idParametro_Socio`, `Detallepar`) VALUES
(1, 'socio'),
(2, 'No socio ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRole`, `Descripcion`) VALUES
(1, 'presidente'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `idSexo` int(11) NOT NULL,
  `detallesex` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idSexo`, `detallesex`) VALUES
(1, 'femenino'),
(2, 'masculino'),
(3, 'transformista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `idRole` int(11) NOT NULL,
  `LoggedIn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Usuario`, `Password`, `idRole`, `LoggedIn`) VALUES
(1, 'presidente', 'presidente', 1, 1),
(2, 'usuario', 'usuario', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `Nro_orden` (`Nro_Orden`),
  ADD KEY `idDisciplina` (`idDisciplina`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `idSexo_fk` (`idSexo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD UNIQUE KEY `Nro_orden` (`Nro_orden`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idParametro_Socio` (`idParametro_Socio`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idSexo` (`idSexo`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`idDisciplina`),
  ADD KEY `idCategoria_fk` (`idCategoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`idFacturacion`),
  ADD UNIQUE KEY `Nro_orden` (`Nro_orden`),
  ADD UNIQUE KEY `idDisciplina` (`idDisciplina`),
  ADD KEY `idDisciplina_2` (`idDisciplina`);

--
-- Indices de la tabla `parametro_socio`
--
ALTER TABLE `parametro_socio`
  ADD PRIMARY KEY (`idParametro_Socio`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`idSexo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Nro_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `idFacturacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `Nro_orden` FOREIGN KEY (`Nro_Orden`) REFERENCES `clientes` (`Nro_orden`),
  ADD CONSTRAINT `idDisciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplinas` (`idDisciplina`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `idSexo_fk` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idEstado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idParametro_Socio` FOREIGN KEY (`idParametro_Socio`) REFERENCES `parametro_socio` (`idParametro_Socio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idSexo` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`);

--
-- Filtros para la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `idCategoria_fk` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `Nro_orden_fkf` FOREIGN KEY (`Nro_orden`) REFERENCES `clientes` (`Nro_orden`),
  ADD CONSTRAINT `idDisciplina_fkf` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplinas` (`idDisciplina`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idRole_fk` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;