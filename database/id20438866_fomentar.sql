-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-11-2023 a las 21:56:50
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20438866_fomentar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(45) NOT NULL,
  `color_act` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre_actividad`, `color_act`) VALUES
(1, 'basquet', 'primary'),
(2, 'futbol', 'secondary'),
(3, 'voley', 'success'),
(4, 'patin', 'danger'),
(5, 'taekwondo', 'warning'),
(6, 'arte', 'info');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `edad_inicial` int(11) NOT NULL,
  `edad_final` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `categoria_detalle` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `precios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `id_actividad`, `edad_inicial`, `edad_final`, `id_genero`, `categoria_detalle`, `id_categoria`, `precios`) VALUES
(5, 1, 6, 10, 1, 'PRE-MINI-BASQ-MIXTO ', 1, 500),
(6, 1, 6, 10, 2, 'PRE-MINI-BASQ-MIXTO ', 1, 500),
(7, 1, 11, 12, 1, 'MINI-BASQ-MIXTO ', 2, 550),
(8, 1, 11, 12, 2, 'MINI-BASQ-MIXTO ', 2, 550),
(9, 1, 13, 17, 1, 'SUB-15-FEM', 3, 600),
(10, 1, 13, 15, 2, 'SUB-15-MASC', 4, 600),
(11, 1, 16, 19, 2, 'SUB-17-MASC', 5, 650),
(12, 1, 18, 45, 1, 'PRIMERA-FEM-BASQ', 6, 700),
(13, 1, 20, 45, 2, 'PRIMERA-MASC-BASQ', 7, 700),
(14, 2, 6, 10, 1, 'PRE-MINI-Fut-MIXTO', 1, 500),
(15, 2, 6, 10, 2, 'PRE-MINI-Fut-MIXTO', 1, 500),
(16, 2, 11, 12, 1, 'MINI-FUT-MIXTO ', 2, 550),
(17, 2, 11, 12, 2, 'MINI-FUT-MIXTO ', 2, 550),
(18, 3, 6, 10, 1, 'PRE-MINI-Voley-MIXTO	', 1, 500),
(19, 3, 6, 10, 2, 'PRE-MINI-Voley-MIXTO	', 1, 500),
(21, 3, 11, 12, 1, 'MINI-Voley-MIXTO', 2, 550),
(22, 3, 11, 12, 2, 'MINI-voley-MIXTO', 2, 550);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `num_socio` int(11) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `domicilio` varchar(32) NOT NULL,
  `num_domicilio` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `DNI` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_actividad`
--

CREATE TABLE `clientes_actividad` (
  `auto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `idfacctura` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `preciototal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `idcli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `genero_descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero_descripcion`) VALUES
(1, 'femenino'),
(2, 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `name_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `name_rol`) VALUES
(1, 'presidente'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `priority` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Transacciones`
--

CREATE TABLE `Transacciones` (
  `TransaccionID` int(11) NOT NULL,
  `PersonaID` int(11) DEFAULT NULL,
  `ActividadID` int(11) DEFAULT NULL,
  `FechaTransaccion` date NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `TipoTransaccion` varchar(20) NOT NULL,
  `SaldoActual` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabla de usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `password`, `id_rol`) VALUES
(1, 'presidente', '1c4708df8cb006d2a007b3920a7b92a5', 1),
(6, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `idx_categorias_id_genero` (`id_genero`),
  ADD KEY `idx_categorias_id_actividad` (`id_actividad`),
  ADD KEY `idx_categorias_id_categoria` (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `idx_clientes` (`id_genero`);

--
-- Indices de la tabla `clientes_actividad`
--
ALTER TABLE `clientes_actividad`
  ADD PRIMARY KEY (`auto`),
  ADD KEY `idx_clientes_actividad_id_cliente` (`id_cliente`),
  ADD KEY `idx_clientes_actividad_id_actividad` (`id_actividad`),
  ADD KEY `idx_clientes_actividad` (`id_categoria`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcat` (`idcat`),
  ADD KEY `fk_idfacctura` (`idfacctura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `idcli` (`idcli`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  ADD PRIMARY KEY (`TransaccionID`),
  ADD KEY `PersonaID` (`PersonaID`),
  ADD KEY `ActividadID` (`ActividadID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_usuarios_roles_0` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes_actividad`
--
ALTER TABLE `clientes_actividad`
  MODIFY `auto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  MODIFY `TransaccionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_actividades` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_generos` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_generos` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes_actividad`
--
ALTER TABLE `clientes_actividad`
  ADD CONSTRAINT `clientes_actividad_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clientes_actividad_actividades` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clientes_actividad_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`idfacctura`) REFERENCES `factura` (`idfactura`),
  ADD CONSTRAINT `fk_detalle_factura_categorias` FOREIGN KEY (`idcat`) REFERENCES `categorias` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  ADD CONSTRAINT `Transacciones_ibfk_1` FOREIGN KEY (`PersonaID`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `Transacciones_ibfk_2` FOREIGN KEY (`ActividadID`) REFERENCES `actividades` (`id_actividad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles_0` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
