-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 23:09:18
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre_actividad`) VALUES
(1, 'basquet'),
(2, 'voley'),
(3, 'taekwondo'),
(4, 'arte'),
(5, 'futbol'),
(6, 'patin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_actividad` int(11) NOT NULL,
  `edad_inicial` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `categoria_detalle` varchar(100) DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_actividad`, `edad_inicial`, `id_genero`, `categoria_detalle`, `id_cat`, `id_categoria`) VALUES
(1, 5, 1, 'basquet mixto', 1, 1),
(1, 5, 2, 'basquet mixto', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `num_socio` int(11) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `estado_socio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_actividad`
--

CREATE TABLE `clientes_actividad` (
  `id_clientes_actividad` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_factura`
--

CREATE TABLE `cliente_factura` (
  `id_factura` int(11) NOT NULL,
  `id_cliente_actividad` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `estado_socio` tinyint(4) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_socio`
--

CREATE TABLE `estados_socio` (
  `estado_socio` tinyint(1) NOT NULL,
  `estado_detalle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados_socio`
--

INSERT INTO `estados_socio` (`estado_socio`, `estado_detalle`) VALUES
(0, 'no socio'),
(1, 'socio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_eventos`
--

CREATE TABLE `estado_eventos` (
  `id_estado_evento` int(11) NOT NULL,
  `detalle_estado_evento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_eventos`
--

INSERT INTO `estado_eventos` (`id_estado_evento`, `detalle_estado_evento`) VALUES
(1, 'falta'),
(2, 'está pasando'),
(3, 'ya paso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_estado_evento` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `opciones` int(11) NOT NULL,
  `a_nombre_de` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `genero_descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `name_rol`) VALUES
(1, 'presidente'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla de usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `password`, `id_rol`) VALUES
(1, 'presidente', '1c4708df8cb006d2a007b3920a7b92a5', 1),
(2, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `id_valor` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `estado_socio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`id_valor`, `id_actividad`, `id_categoria`, `valor`, `estado_socio`) VALUES
(1, 1, 1, 500, 0),
(2, 1, 1, 600, 1);

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
  ADD KEY `idx_clientes` (`id_genero`),
  ADD KEY `unq_clientes_estado_socio` (`estado_socio`) USING BTREE;

--
-- Indices de la tabla `clientes_actividad`
--
ALTER TABLE `clientes_actividad`
  ADD PRIMARY KEY (`id_clientes_actividad`),
  ADD KEY `idx_clientes_actividad_id_cliente` (`id_cliente`),
  ADD KEY `idx_clientes_actividad_id_actividad` (`id_actividad`),
  ADD KEY `idx_clientes_actividad` (`id_categoria`);

--
-- Indices de la tabla `cliente_factura`
--
ALTER TABLE `cliente_factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `idx_cliente_factura_id_valor` (`id_valor`),
  ADD KEY `idx_cliente_factura_estado_socio` (`estado_socio`),
  ADD KEY `idx_cliente_factura_id_actividad` (`id_actividad`),
  ADD KEY `idx_cliente_factura_id_categoria` (`id_categoria`),
  ADD KEY `fk_cliente_factura_clientes_actividad_0` (`id_cliente_actividad`);

--
-- Indices de la tabla `estados_socio`
--
ALTER TABLE `estados_socio`
  ADD PRIMARY KEY (`estado_socio`);

--
-- Indices de la tabla `estado_eventos`
--
ALTER TABLE `estado_eventos`
  ADD PRIMARY KEY (`id_estado_evento`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `idx_eventos_id_estado_evento` (`id_estado_evento`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_usuarios_roles_0` (`id_rol`);

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id_valor`),
  ADD KEY `fk_valores_actividades_0` (`id_actividad`),
  ADD KEY `fk_valores_categorias_0` (`id_categoria`),
  ADD KEY `fk_valores_estados_socio` (`estado_socio`);

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
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes_actividad`
--
ALTER TABLE `clientes_actividad`
  MODIFY `id_clientes_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_factura`
--
ALTER TABLE `cliente_factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `id_valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`estado_socio`) REFERENCES `estados_socio` (`estado_socio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clientes_generos` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes_actividad`
--
ALTER TABLE `clientes_actividad`
  ADD CONSTRAINT `fk_clientes_actividad_actividades` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_actividad_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_actividad_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente_factura`
--
ALTER TABLE `cliente_factura`
  ADD CONSTRAINT `fk_cliente_factura_clientes` FOREIGN KEY (`estado_socio`) REFERENCES `clientes` (`estado_socio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_factura_clientes_actividad_0` FOREIGN KEY (`id_cliente_actividad`) REFERENCES `clientes_actividad` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_factura_clientes_actividad_1` FOREIGN KEY (`id_actividad`) REFERENCES `clientes_actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_factura_clientes_actividad_2` FOREIGN KEY (`id_categoria`) REFERENCES `clientes_actividad` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_factura_valores` FOREIGN KEY (`id_valor`) REFERENCES `valores` (`id_valor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_estado_eventos` FOREIGN KEY (`id_estado_evento`) REFERENCES `estado_eventos` (`id_estado_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles_0` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valores`
--
ALTER TABLE `valores`
  ADD CONSTRAINT `fk_valores_actividades_0` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_valores_categorias_0` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_valores_estados_socio` FOREIGN KEY (`estado_socio`) REFERENCES `estados_socio` (`estado_socio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
