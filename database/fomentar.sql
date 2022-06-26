-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Generation Time: Jun 27, 2022 at 12:23 AM

-- Server version: 10.4.24-MariaDB

-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "-03:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `fomentar`

--

-- --------------------------------------------------------

--

-- Table structure for table `actividades`

--

CREATE TABLE `actividades` (
    `idActividad` int(11) NOT NULL,
    `Nro_Orden` int(11) NOT NULL,
    `idDisciplina` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `actividades`

--

INSERT INTO
    `actividades` (`idActividad`, `Nro_Orden`, `idDisciplina`)
VALUES
    (1, 1, 7);

-- --------------------------------------------------------

--

-- Table structure for table `categorias`

--

CREATE TABLE `categorias` (
    `idCategoria` int(11) NOT NULL,
    `Descripcion` varchar(50) DEFAULT NULL,
    `Edad_Inicial` int(11) DEFAULT NULL,
    `Edad_Final` int(11) DEFAULT NULL,
    `idSexo` int(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `categorias`

--

INSERT INTO
    `categorias` (
        `idCategoria`,
        `Descripcion`,
        `Edad_Inicial`,
        `Edad_Final`,
        `idSexo`
    )
VALUES
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

-- Table structure for table `clientes`

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `clientes`

--

INSERT INTO
    `clientes` (
        `Nro_orden`,
        `Apellido`,
        `Nombre`,
        `Domicilio`,
        `DNI`,
        `Fecha_nacimiento`,
        `Fecha_ingreso`,
        `idParametro_Socio`,
        `idEstado`,
        `idCategoria`,
        `idSexo`
    )
VALUES
    (
        1,
        'test',
        'test',
        'calle falsa',
        123456789,
        '1995-10-03',
        '2022-06-26',
        1,
        1,
        7,
        2
    );

-- --------------------------------------------------------

--

-- Table structure for table `disciplinas`

--

CREATE TABLE `disciplinas` (
    `idDisciplina` int(11) NOT NULL,
    `Detalle` varchar(50) DEFAULT NULL,
    `ValorSocio` int(11) DEFAULT NULL,
    `ValorNoSocio` int(11) DEFAULT NULL,
    `idCategoria` int(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `disciplinas`

--

INSERT INTO
    `disciplinas` (
        `idDisciplina`,
        `Detalle`,
        `ValorSocio`,
        `ValorNoSocio`,
        `idCategoria`
    )
VALUES
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

-- Table structure for table `estado`

--

CREATE TABLE `estado` (
    `idEstado` int(11) NOT NULL,
    `Estado` varchar(45) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `estado`

--

INSERT INTO
    `estado` (`idEstado`, `Estado`)
VALUES
    (1, 'activo'),
    (2, 'inactivo');

-- --------------------------------------------------------

--

-- Table structure for table `eventos`

--

CREATE TABLE `eventos` (
    `idevento` int(11) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `fecha_inicio` datetime NOT NULL,
    `fecha_fin` datetime NOT NULL,
    `estado` int(11) NOT NULL DEFAULT 0,
    `pagado` tinyint(1) NOT NULL,
    `importe` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `eventos`

--

INSERT INTO
    `eventos` (
        `idevento`,
        `nombre`,
        `fecha_inicio`,
        `fecha_fin`,
        `estado`,
        `pagado`,
        `importe`
    )
VALUES
    (
        2,
        'test',
        '2022-06-26 16:42:19',
        '2022-06-27 16:37:19',
        1,
        0,
        0
    );

-- --------------------------------------------------------

--

-- Table structure for table `eventos_estado`

--

CREATE TABLE `eventos_estado` (
    `estado` int(11) NOT NULL,
    `descripcion` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `eventos_estado`

--

INSERT INTO
    `eventos_estado` (`estado`, `descripcion`)
VALUES
    (1, 'falta'),
    (2, 'ya pasó'),
    (3, 'esta pasando');

-- --------------------------------------------------------

--

-- Table structure for table `facturacion`

--

CREATE TABLE `facturacion` (
    `idFacturacion` int(11) NOT NULL,
    `Nro_orden` int(11) NOT NULL,
    `idDisciplina` int(11) NOT NULL,
    `Anio` int(11) NOT NULL,
    `Mes` int(11) NOT NULL,
    `Pago` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `parametro_socio`

--

CREATE TABLE `parametro_socio` (
    `idParametro_Socio` int(11) NOT NULL,
    `Detallepar` varchar(45) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `parametro_socio`

--

INSERT INTO
    `parametro_socio` (`idParametro_Socio`, `Detallepar`)
VALUES
    (1, 'socio'),
    (2, 'No socio ');

-- --------------------------------------------------------

--

-- Table structure for table `roles`

--

CREATE TABLE `roles` (
    `idRole` int(11) NOT NULL,
    `Descripcion` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `roles`

--

INSERT INTO
    `roles` (`idRole`, `Descripcion`)
VALUES
    (1, 'presidente'),
    (2, 'usuario');

-- --------------------------------------------------------

--

-- Table structure for table `sexo`

--

CREATE TABLE `sexo` (
    `idSexo` int(11) NOT NULL,
    `detallesex` varchar(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `sexo`

--

INSERT INTO
    `sexo` (`idSexo`, `detallesex`)
VALUES
    (1, 'femenino'),
    (2, 'masculino'),
    (3, 'transformista');

-- --------------------------------------------------------

--

-- Table structure for table `usuarios`

--

CREATE TABLE `usuarios` (
    `idUsuario` int(11) NOT NULL,
    `Usuario` varchar(50) NOT NULL,
    `Password` varchar(45) NOT NULL,
    `idRole` int(11) NOT NULL,
    `LoggedIn` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `usuarios`

--

INSERT INTO
    `usuarios` (
        `idUsuario`,
        `Usuario`,
        `Password`,
        `idRole`,
        `LoggedIn`
    )
VALUES
    (1, 'presidente', 'presidente', 1, 1),
    (2, 'usuario', 'usuario', 2, 2);

--

-- Indexes for dumped tables

--

--

-- Indexes for table `actividades`

--

ALTER TABLE
    `actividades`
ADD
    PRIMARY KEY (`idActividad`),
ADD
    UNIQUE KEY `Nro_orden` (`Nro_Orden`),
ADD
    KEY `idDisciplina` (`idDisciplina`);

--

-- Indexes for table `categorias`

--

ALTER TABLE
    `categorias`
ADD
    PRIMARY KEY (`idCategoria`),
ADD
    KEY `idSexo_fk` (`idSexo`);

--

-- Indexes for table `clientes`

--

ALTER TABLE
    `clientes`
ADD
    UNIQUE KEY `Nro_orden` (`Nro_orden`),
ADD
    KEY `idCategoria` (`idCategoria`),
ADD
    KEY `idParametro_Socio` (`idParametro_Socio`),
ADD
    KEY `idEstado` (`idEstado`),
ADD
    KEY `idSexo` (`idSexo`);

--

-- Indexes for table `disciplinas`

--

ALTER TABLE
    `disciplinas`
ADD
    PRIMARY KEY (`idDisciplina`),
ADD
    KEY `idCategoria_fk` (`idCategoria`);

--

-- Indexes for table `estado`

--

ALTER TABLE `estado` ADD PRIMARY KEY (`idEstado`);

--

-- Indexes for table `eventos`

--

ALTER TABLE
    `eventos`
ADD
    PRIMARY KEY (`idevento`),
ADD
    KEY `estado` (`estado`);

--

-- Indexes for table `eventos_estado`

--

ALTER TABLE `eventos_estado` ADD PRIMARY KEY (`estado`);

--

-- Indexes for table `facturacion`

--

ALTER TABLE
    `facturacion`
ADD
    PRIMARY KEY (`idFacturacion`),
ADD
    UNIQUE KEY `Nro_orden` (`Nro_orden`),
ADD
    UNIQUE KEY `idDisciplina` (`idDisciplina`),
ADD
    KEY `idDisciplina_2` (`idDisciplina`);

--

-- Indexes for table `parametro_socio`

--

ALTER TABLE
    `parametro_socio`
ADD
    PRIMARY KEY (`idParametro_Socio`);

--

-- Indexes for table `roles`

--

ALTER TABLE
    `roles`
ADD
    PRIMARY KEY (`idRole`),
ADD
    KEY `idRole` (`idRole`) USING BTREE;

--

-- Indexes for table `sexo`

--

ALTER TABLE `sexo` ADD PRIMARY KEY (`idSexo`);

--

-- Indexes for table `usuarios`

--

ALTER TABLE
    `usuarios`
ADD
    PRIMARY KEY (`idUsuario`),
ADD
    UNIQUE KEY `idRole` (`idRole`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `actividades`

--

ALTER TABLE
    `actividades`
MODIFY
    `idActividad` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT for table `clientes`

--

ALTER TABLE
    `clientes`
MODIFY
    `Nro_orden` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT for table `eventos`

--

ALTER TABLE
    `eventos`
MODIFY
    `idevento` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--

-- AUTO_INCREMENT for table `facturacion`

--

ALTER TABLE
    `facturacion`
MODIFY
    `idFacturacion` int(11) NOT NULL AUTO_INCREMENT;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `actividades`

--

ALTER TABLE
    `actividades`
ADD
    CONSTRAINT `Nro_orden` FOREIGN KEY (`Nro_Orden`) REFERENCES `clientes` (`Nro_orden`),
ADD
    CONSTRAINT `idDisciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplinas` (`idDisciplina`);

--

-- Constraints for table `categorias`

--

ALTER TABLE
    `categorias`
ADD
    CONSTRAINT `idSexo_fk` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`);

--

-- Constraints for table `clientes`

--

ALTER TABLE
    `clientes`
ADD
    CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `idEstado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `idParametro_Socio` FOREIGN KEY (`idParametro_Socio`) REFERENCES `parametro_socio` (`idParametro_Socio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
    CONSTRAINT `idSexo` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`);

--

-- Constraints for table `disciplinas`

--

ALTER TABLE
    `disciplinas`
ADD
    CONSTRAINT `idCategoria_fk` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--

-- Constraints for table `eventos`

--

ALTER TABLE
    `eventos`
ADD
    CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `eventos_estado` (`estado`);

--

-- Constraints for table `facturacion`

--

ALTER TABLE
    `facturacion`
ADD
    CONSTRAINT `Nro_orden_fkf` FOREIGN KEY (`Nro_orden`) REFERENCES `clientes` (`Nro_orden`),
ADD
    CONSTRAINT `idDisciplina_fkf` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplinas` (`idDisciplina`);

--

-- Constraints for table `usuarios`

--

ALTER TABLE
    `usuarios`
ADD
    CONSTRAINT `idRole_fk` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;