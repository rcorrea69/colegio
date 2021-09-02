-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 02:37:37
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

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
  `domicilio` varchar(50) NOT NULL,
  `recidente` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `curso`, `apellidos`, `nombres`, `telefono`, `domicilio`, `recidente`) VALUES
('111111', '1b', 'Correa', 'Candela', '111111111111', 'Giribone 22222', ''),
('12121212121', '1b', 'Correa', 'Ruben', '98998', 'Ger', 'Recidente'),
('12345678', '1b', 'Correa', 'Ruben', '989879', 'Giri', ''),
('222', '1a', 'Ra', 'R', '324', 'Ges', 'No Recidente'),
('22805302', '1a', 'Correa', 'Ruben Correa Antocio', '', 'Giribone 2225', ''),
('333', '1b', 'Jjjjj', 'Nuevo', '8976897', 'Oijoais', ''),
('5555555', '1B', 'Buen', 'Prueba', '7777777', 'Giribone', '');

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
(27, 20, 10, 4, 'Cuota mensual', 0.00, 450.00),
(28, 21, 10, 5, 'Cuota mensual', 0.00, 450.00),
(29, 22, 10, 5, 'Cuota mensual', 0.00, 450.00),
(30, 23, 10, 5, 'Cuota mensual', 0.00, 450.00),
(31, 24, 10, 5, 'Cuota mensual', 0.00, 450.00),
(32, 25, 10, 5, 'Cuota mensual', 0.00, 450.00),
(33, 26, 10, 6, 'Cuota mensual', 0.00, 450.00),
(34, 27, 10, 6, 'Cuota mensual', 0.00, 450.00),
(35, 28, 10, 6, 'Cuota mensual', 0.00, 450.00),
(36, 28, 10, 6, 'Cuota mensual', 0.00, 450.00),
(37, 29, 10, 6, 'Cuota mensual', 0.00, 450.00),
(38, 30, 10, 6, 'Cuota mensual', 0.00, 450.00),
(39, 31, 30, 6, 'cooperadoar', 0.00, 350.00),
(40, 32, 30, 6, 'cooperadoar', 0.00, 350.00),
(41, 33, 10, 6, 'Cuota mensual', 0.00, 450.00),
(42, 33, 30, 6, 'cooperadoar', 0.00, 350.00),
(43, 34, 55, 6, 'no se', 0.00, 3333.00),
(44, 35, 10, 6, 'Cuota mensual', 0.00, 450.00);

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

--
-- Volcado de datos para la tabla `op_tmp`
--

INSERT INTO `op_tmp` (`id_tmp`, `id_socio`, `tmp_codigo`, `tmp_concepto`, `tmp_periodo`, `tmp_descuento`, `tmp_importe`) VALUES
(82, '12121212', 10, 'Cuota mensual', 6, 0, 450.00),
(83, '12121212', 10, 'Cuota mensual', 6, 0, 450.00),
(84, '12121212', 10, 'Cuota mensual', 6, 0, 450.00),
(85, '12121212', 10, 'Cuota mensual', 6, 0, 450.00),
(109, '12121212', 55, 'no se', 6, 0, 3333.00);

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
(20, '22805302', '2021-04-25', 900.00, 'P', 2),
(21, '22805302', '2021-05-26', 450.00, 'P', 2),
(22, '22805302', '2021-05-27', 450.00, 'P', 2),
(23, '22805302', '2021-05-27', 450.00, 'P', 2),
(24, '22805302', '2021-05-27', 450.00, 'P', 2),
(25, '22805302', '2021-05-30', 450.00, 'P', 2),
(26, '22805302', '2021-06-13', 450.00, 'P', 2),
(27, '22805302', '2021-06-13', 450.00, 'P', 2),
(28, '222', '2021-06-14', 900.00, 'P', 2),
(29, '222', '2021-06-14', 450.00, 'P', 2),
(30, '222', '2021-06-14', 450.00, 'P', 2),
(31, '5555555', '2021-06-14', 350.00, 'P', 2),
(32, '22805302', '2021-06-14', 350.00, 'P', 2),
(33, '12345678', '2021-06-14', 800.00, 'P', 2),
(34, '222', '2021-06-14', 3333.00, 'P', 2),
(35, '333', '2021-06-14', 450.00, 'P', 2);

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

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pagos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_pagos` (
`id_op` int(11)
,`periodo` int(11)
,`id_codigo` int(11)
,`importe` double(10,2)
,`descripcion` varchar(100)
,`op_fecha` date
,`socio` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pagos`
--
DROP TABLE IF EXISTS `vista_pagos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_pagos`  AS SELECT `de`.`id_op` AS `id_op`, `de`.`periodo` AS `periodo`, `de`.`id_codigo` AS `id_codigo`, `de`.`importe` AS `importe`, `co`.`descripcion` AS `descripcion`, `o`.`op_fecha` AS `op_fecha`, `o`.`socio` AS `socio` FROM ((`op_detalles` `de` join `codigos` `co` on(`de`.`id_codigo` = `co`.`id_codigo`)) join `o_pagos` `o` on(`de`.`id_op` = `o`.`id_op`)) ;

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
  MODIFY `id_opdetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `op_tmp`
--
ALTER TABLE `op_tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `o_pagos`
--
ALTER TABLE `o_pagos`
  MODIFY `id_op` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
