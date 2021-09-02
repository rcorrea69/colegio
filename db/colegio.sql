-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 01:33:52
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni` varchar(12) NOT NULL,
  `curso` varchar(2) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `domicilio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `curso`, `apellidos`, `nombres`, `telefono`, `domicilio`) VALUES
('111111', '1b', 'Correa', 'Candela', '111111111111', 'Giribone 22222'),
('22805302', '1a', 'Correa', 'Ruben Correa Antocio', '', 'Giribone 2225'),
('333', '1b', 'Jjjjj', 'Nuevo', '8976897', 'Oijoais'),
('5555555', '1B', 'Buen', 'Prueba', '7777777', 'Giribone');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anos`
--

CREATE TABLE `anos` (
  `ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anos`
--

INSERT INTO `anos` (`ano`) VALUES
(2019),
(2020),
(2021),
(2022),
(2023),
(2024),
(2025),
(2026),
(2027),
(2028),
(2029),
(2030);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id_codigo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cod_precio` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id_codigo`, `descripcion`, `cod_precio`) VALUES
(10, 'Cuota mensual', 450.00),
(30, 'cooperadoar', 350.00),
(55, 'no se', 3333.00),
(210, 'Cuota mensual', 1000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_detalles`
--

CREATE TABLE `op_detalles` (
  `id_opdetalle` int(11) NOT NULL,
  `id_op` int(11) NOT NULL,
  `id_codigo` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `detalle_codigo` varchar(50) NOT NULL,
  `descuento` double(10,2) NOT NULL,
  `importe` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `op_detalles`
--

INSERT INTO `op_detalles` (`id_opdetalle`, `id_op`, `id_codigo`, `periodo`, `detalle_codigo`, `descuento`, `importe`) VALUES
(1, 1, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(2, 2, 55, 4, 'no se', 0.00, 3333.00),
(3, 2, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(4, 3, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(5, 4, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(6, 5, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(7, 5, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(8, 6, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(9, 6, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(10, 7, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(11, 8, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(12, 8, 55, 4, 'no se', 0.00, 3333.00),
(13, 9, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(14, 10, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(15, 10, 55, 4, 'no se', 0.00, 3333.00),
(16, 11, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(17, 12, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(18, 13, 10, 4, 'Cuota mensual', 0.00, 9999.00),
(19, 14, 55, 4, 'no se', 0.00, 100.00),
(20, 15, 10, 4, 'Cuota mensual', 0.00, 450.00),
(21, 16, 10, 4, 'Cuota mensual', 0.00, 100.00),
(22, 17, 10, 4, 'Cuota mensual', 0.00, 450.00),
(23, 17, 55, 4, 'no se', 0.00, 3333.00),
(24, 18, 10, 4, 'Cuota mensual', 0.00, 450.00),
(25, 19, 10, 4, 'Cuota mensual', 0.00, 450.00),
(26, 20, 10, 4, 'Cuota mensual', 0.00, 450.00),
(27, 20, 10, 4, 'Cuota mensual', 0.00, 450.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_tmp`
--

CREATE TABLE `op_tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_socio` varchar(8) NOT NULL,
  `tmp_codigo` int(11) NOT NULL,
  `tmp_concepto` varchar(50) NOT NULL,
  `tmp_periodo` int(11) NOT NULL,
  `tmp_descuento` int(11) NOT NULL,
  `tmp_importe` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `o_pagos`
--

CREATE TABLE `o_pagos` (
  `id_op` int(11) NOT NULL,
  `socio` varchar(10) NOT NULL,
  `op_fecha` date NOT NULL,
  `op_importe` double(10,2) NOT NULL,
  `op_estado` varchar(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `o_pagos`
--

INSERT INTO `o_pagos` (`id_op`, `socio`, `op_fecha`, `op_importe`, `op_estado`, `id_usuario`) VALUES
(1, '22805302', '2021-04-22', 9999.00, 'P', 2),
(2, '22805302', '2021-04-22', 13332.00, 'P', 2),
(3, '22805302', '2021-04-22', 9999.00, 'P', 2),
(4, '22805302', '2021-04-22', 9999.00, 'P', 2),
(5, '22805302', '2021-04-22', 19998.00, 'P', 2),
(6, '22805302', '2021-04-22', 19998.00, 'P', 2),
(7, '22805302', '2021-04-22', 9999.00, 'P', 2),
(8, '22805302', '2021-04-22', 13332.00, 'P', 2),
(9, '22805302', '2021-04-22', 9999.00, 'P', 2),
(10, '22805302', '2021-04-23', 13332.00, 'P', 2),
(11, '22805302', '2021-04-23', 9999.00, 'P', 2),
(12, '22805302', '2021-04-23', 9999.00, 'P', 2),
(13, '22805302', '2021-04-23', 9999.00, 'P', 2),
(14, '111111', '2021-04-23', 100.00, 'P', 2),
(15, '111111', '2021-04-23', 450.00, 'P', 2),
(16, '22805302', '2021-04-23', 100.00, 'P', 2),
(17, '5555555', '2021-04-24', 3783.00, 'P', 2),
(18, '111111', '2021-04-24', 450.00, 'P', 2),
(19, '5555555', '2021-04-24', 450.00, 'P', 2),
(20, '22805302', '2021-04-25', 900.00, 'P', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_usu_tipo` int(3) NOT NULL,
  `tipo_nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_usu_tipo`, `tipo_nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `usu_usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `usu_clave` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `usu_nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `usu_nivel` int(2) NOT NULL,
  `usu_fecha_alta` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usu_usuario`, `usu_clave`, `usu_nombre`, `usu_nivel`, `usu_fecha_alta`) VALUES
(1, 'javier', '1234444', 'Javier Peña', 2, '2016-12-21'),
(2, 'ruben', 'Rcorrea', 'Ruben Correa ', 2, '2016-12-21'),
(3, 'miguel', 'miguel', 'Miguel', 1, '2016-12-21'),
(4, 'cande', 'cande123', 'candela correa', 2, '2019-12-05'),
(5, 'agu co', 'agus', 'agustin ', 1, '2019-12-05'),
(6, 'cande', 'cande', 'Cane', 1, '2019-12-10'),
(7, 'usu', 'pas', 'Otro Usuario', 2, '2019-12-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `anos`
--
ALTER TABLE `anos`
  ADD PRIMARY KEY (`ano`);

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id_codigo`);

--
-- Indices de la tabla `op_detalles`
--
ALTER TABLE `op_detalles`
  ADD PRIMARY KEY (`id_opdetalle`);

--
-- Indices de la tabla `op_tmp`
--
ALTER TABLE `op_tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `o_pagos`
--
ALTER TABLE `o_pagos`
  ADD PRIMARY KEY (`id_op`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_usu_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `op_detalles`
--
ALTER TABLE `op_detalles`
  MODIFY `id_opdetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `op_tmp`
--
ALTER TABLE `op_tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `o_pagos`
--
ALTER TABLE `o_pagos`
  MODIFY `id_op` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_usu_tipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
