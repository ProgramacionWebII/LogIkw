-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2017 a las 02:13:35
-- Versión del servidor: 5.7.16-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mslogistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `dni_chofer` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `tipo_licencia_de_conducir` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`dni_chofer`, `nombre`, `apellido`, `fecha_de_nacimiento`, `tipo_licencia_de_conducir`) VALUES
(1, 'hector', 'diaz', '1980-05-06', 'a5'),
(2, 'pepe', 'castañeda', '1970-05-07', 'a5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni_cliente` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `domicilio` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni_cliente`, `nombre`, `apellido`, `telefono`, `domicilio`, `email`) VALUES
(1, 'juan', 'perez', 451215, 'donizeti 5847', 'jp15@gmail.com'),
(2, 'pedro', 'olivera', 444215, 'san jose 452', 'san_jose@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `domicilio` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `telefono`, `domicilio`) VALUES
(1, 'Taller Jose', '451177', 'linares 85'),
(2, 'Taller Juan carlos', '639988', 'escalada 540');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `dni_mecanico` int(11) DEFAULT NULL,
  `patente` varchar(20) DEFAULT NULL,
  `nro_chasis` int(11) DEFAULT NULL,
  `nro_motor` int(11) DEFAULT NULL,
  `fecha_service` date DEFAULT NULL,
  `km_de_la_unidad` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `repuestos_cambiados` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `id_empresa`, `dni_mecanico`, `patente`, `nro_chasis`, `nro_motor`, `fecha_service`, `km_de_la_unidad`, `costo`, `tipo`, `repuestos_cambiados`) VALUES
(1, 1, 777777777, 'ab 123 cd', 10, 20, '2017-05-04', 150000, 20000, 'externo', 'valvula,tubo de escape'),
(2, 5, 444444444, 'kd 456 rr', 20, 10, '2017-04-04', 300000, 50000, 'externo', 'motor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `dni_mecanico` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mecanico`
--

INSERT INTO `mecanico` (`dni_mecanico`, `nombre`, `apellido`) VALUES
(1, 'marcelo', 'quispe'),
(2, 'mauricio', 'santillan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_chofer`
--

CREATE TABLE `reporte_chofer` (
  `id_reporte` int(11) NOT NULL,
  `dni_chofer` int(11) DEFAULT NULL,
  `id_viaje` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `combustible_cargado` int(11) DEFAULT NULL,
  `importe_combustible` int(11) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL,
  `km_unidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reporte_chofer`
--

INSERT INTO `reporte_chofer` (`id_reporte`, `dni_chofer`, `id_viaje`, `fecha`, `combustible_cargado`, `importe_combustible`, `ubicacion`, `km_unidad`) VALUES
(1, 999999999, 2, '2017-09-04', 10, 500, 'san justo', 13000),
(2, 555555555, 3, '2017-11-04', 100, 5000, 'temperley', 130000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `dni_supervisor` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`dni_supervisor`, `nombre`, `apellido`, `fecha_de_nacimiento`) VALUES
(1, 'adrian', 'ortega', '1990-05-06'),
(2, 'pepe', 'castañeda', '1990-04-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `patente` varchar(20) DEFAULT NULL,
  `nro_chasis` int(11) DEFAULT NULL,
  `nro_motor` int(11) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `año_fabricacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `patente`, `nro_chasis`, `nro_motor`, `marca`, `modelo`, `año_fabricacion`) VALUES
(1, 'ab 123 cd', 10, 20, 'ford', 'j2001', 2000),
(2, 'ik 456 pl', 25, 55, 'chevrolet', 'h201', 2002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `dni_supervisor` int(11) DEFAULT NULL,
  `origen` varchar(20) DEFAULT NULL,
  `destino` varchar(20) DEFAULT NULL,
  `tipo_de_carga` varchar(20) DEFAULT NULL,
  `fecha_de_salida_prevista` date DEFAULT NULL,
  `fecha_de_llegada_prevista` date DEFAULT NULL,
  `tiempo_estimado` int(11) DEFAULT NULL,
  `fecha_de_salida_real` date DEFAULT NULL,
  `fecha_de_llegada_real` date DEFAULT NULL,
  `tiempo_real` int(11) DEFAULT NULL,
  `km_recorridos_previstos` int(11) DEFAULT NULL,
  `desviacion_km` int(11) DEFAULT NULL,
  `combustible_consumido_estimado` int(11) DEFAULT NULL,
  `combustible_consumido_real` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `dni_supervisor`, `origen`, `destino`, `tipo_de_carga`, `fecha_de_salida_prevista`, `fecha_de_llegada_prevista`, `tiempo_estimado`, `fecha_de_salida_real`, `fecha_de_llegada_real`, `tiempo_real`, `km_recorridos_previstos`, `desviacion_km`, `combustible_consumido_estimado`, `combustible_consumido_real`) VALUES
(1, 5, 'san juan', 'buenos aires', 'Granel Sólido', '2017-10-05', '2017-10-10', 120, '2017-10-05', '2017-10-11', 130, 1300, 5, 300, 350),
(2, 1, 'la pampa', 'san luis', 'Granel Sólido', '2017-11-05', '2017-11-08', 100, '2017-11-05', '2017-11-09', 105, 1000, 1, 400, 380);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_chofer`
--

CREATE TABLE `viaje_chofer` (
  `id_viaje` int(11) NOT NULL,
  `dni_chofer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje_chofer`
--

INSERT INTO `viaje_chofer` (`id_viaje`, `dni_chofer`) VALUES
(2, 333333333),
(5, 111111111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_vehiculo`
--

CREATE TABLE `viaje_vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje_vehiculo`
--

INSERT INTO `viaje_vehiculo` (`id_vehiculo`, `id_viaje`) VALUES
(5, 1),
(9, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`dni_chofer`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni_cliente`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`dni_mecanico`);

--
-- Indices de la tabla `reporte_chofer`
--
ALTER TABLE `reporte_chofer`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`dni_supervisor`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `patente` (`patente`),
  ADD UNIQUE KEY `nro_chasis` (`nro_chasis`),
  ADD UNIQUE KEY `nro_motor` (`nro_motor`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`);

--
-- Indices de la tabla `viaje_chofer`
--
ALTER TABLE `viaje_chofer`
  ADD PRIMARY KEY (`id_viaje`,`dni_chofer`);

--
-- Indices de la tabla `viaje_vehiculo`
--
ALTER TABLE `viaje_vehiculo`
  ADD PRIMARY KEY (`id_viaje`,`id_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `dni_chofer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `dni_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `dni_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reporte_chofer`
--
ALTER TABLE `reporte_chofer`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `dni_supervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
