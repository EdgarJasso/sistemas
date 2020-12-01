-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 01:25:15
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_area`
--

CREATE TABLE `ecsnts_area` (
  `id_area` int(2) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_area`
--

INSERT INTO `ecsnts_area` (`id_area`, `nombre`) VALUES
(1, 'General'),
(2, 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_categoria`
--

CREATE TABLE `ecsnts_categoria` (
  `Id_categoria` int(2) NOT NULL,
  `Id_area` int(2) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_categoria`
--

INSERT INTO `ecsnts_categoria` (`Id_categoria`, `Id_area`, `Descripcion`) VALUES
(1, 1, 'Tronco Común'),
(2, 1, 'Tronco Común Seguridad'),
(3, 2, 'Programador Jr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_competencias`
--

CREATE TABLE `ecsnts_competencias` (
  `id_competencia` int(3) NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_competencias`
--

INSERT INTO `ecsnts_competencias` (`id_competencia`, `codigo`, `nombre`, `descripcion`) VALUES
(1, 'F1', 'aaaaa', 'aaaaa'),
(2, 'F2', 'bbbbb', 'bbbbb'),
(3, 'F3', 'ccccc', 'ccccc'),
(4, 'F4', 'ddddd', 'ddddd'),
(5, 'F5', 'eeeee', 'eeeee'),
(6, 'H1', 'zzzzz', 'zzzzz'),
(7, 'H2', 'xxxxx', 'xxxxx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_contesto`
--

CREATE TABLE `ecsnts_contesto` (
  `id_campo` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `id_validacion` int(11) NOT NULL,
  `id_registro` int(6) NOT NULL,
  `fecha` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_contesto`
--

INSERT INTO `ecsnts_contesto` (`id_campo`, `id_usuario`, `id_validacion`, `id_registro`, `fecha`) VALUES
(1, 1, 1, 1, '27-11-2020 02:10 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_pregunta`
--

CREATE TABLE `ecsnts_pregunta` (
  `id_pregunta` int(3) NOT NULL,
  `competencia` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_area` int(2) NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_pregunta`
--

INSERT INTO `ecsnts_pregunta` (`id_pregunta`, `competencia`, `id_area`, `categoria`, `descripcion`) VALUES
(1, 'F1', 1, 'Tronco Común', 'Tronco Común - 1'),
(2, 'F2', 1, 'Tronco Común', 'Tronco Común - 2'),
(3, 'F3', 1, 'Tronco Común', 'Tronco Común - 3'),
(4, 'F4', 1, 'Tronco Común', 'Tronco Común - 4'),
(5, 'F5', 1, 'Tronco Común', 'Tronco Común - 5'),
(6, 'H1', 2, 'Programador Jr', 'Programador Jr - 1'),
(7, 'H2', 2, 'Programador Jr', 'Programador Jr - 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_respuestas`
--

CREATE TABLE `ecsnts_respuestas` (
  `id_respuesta` int(6) NOT NULL,
  `id_registro` int(6) NOT NULL,
  `id_pregunta` int(3) NOT NULL,
  `respuesta` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `justificacion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_respuestas`
--

INSERT INTO `ecsnts_respuestas` (`id_respuesta`, `id_registro`, `id_pregunta`, `respuesta`, `justificacion`) VALUES
(1, 1, 1, 'Completamente_de_acuerdo', 'Autoevaluacion Tc - 1 (e)'),
(2, 1, 2, 'De_acuerdo', 'Autoevaluacion Tc - 2 (b)'),
(3, 1, 3, 'Ni_acuerdo_ni_en_desacuerdo', 'Autoevaluacion Tc - 3 (n)'),
(4, 1, 4, 'No_estoy_de_acuerdo', 'Autoevaluacion Tc - 4(m)'),
(5, 1, 5, 'Completamente_en_desacuerdo', 'Autoevaluacion Tc - 5(t)'),
(6, 1, 6, 'Completamente_de_acuerdo', 'Autoevaluacion cat - 1 (e)'),
(7, 1, 7, 'De_acuerdo', 'Autoevaluacion cat - 2 (b)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_usuario`
--

CREATE TABLE `ecsnts_usuario` (
  `id_usuario` int(2) NOT NULL,
  `id_area` int(2) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `permiso` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_usuario`
--

INSERT INTO `ecsnts_usuario` (`id_usuario`, `id_area`, `nombre`, `clave`, `permiso`) VALUES
(1, 2, 'Edgar Jasso', 'Alohomora', 'root'),
(2, 2, 'Mariel Hernandez', 'Alohomora', 'root'),
(3, 2, 'Josue Carreño', 'Alohomora', 'root'),
(4, 2, 'David Millan', 'Alohomora', 'root'),
(5, 2, 'Jennifer RR', 'Alohomora', 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_validacion`
--

CREATE TABLE `ecsnts_validacion` (
  `Id_validacion` int(4) NOT NULL,
  `Calificador` int(2) NOT NULL,
  `Calificado` int(2) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Validacion` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Area` int(4) NOT NULL,
  `Categoria` int(4) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `periodo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_validacion`
--

INSERT INTO `ecsnts_validacion` (`Id_validacion`, `Calificador`, `Calificado`, `Nombre`, `Validacion`, `Area`, `Categoria`, `tipo`, `periodo`) VALUES
(1, 1, 1, 'Edgar Jasso', 'hecho', 2, 3, 'Autoevaluacion', '2020-2'),
(2, 2, 1, 'Edgar Jasso', 'pendiente', 2, 3, 'Jefe', '2020-2'),
(3, 3, 1, 'Edgar Jasso', 'pendiente', 2, 3, 'Compañero', '2020-2'),
(4, 4, 1, 'Edgar Jasso', 'pendiente', 2, 3, 'Subordinado', '2020-2'),
(5, 5, 1, 'Edgar Jasso', 'pendiente', 2, 3, 'Cliente', '2020-2'),
(6, 2, 2, 'Mariel Hernandez', 'pendiente', 2, 3, 'Autoevaluacion', '2020-2'),
(8, 1, 1, 'Edgar Jasso', 'pendiente', 2, 3, 'Autoevaluacion', '2020-2'),
(9, 1, 1, 'Edgar Jasso', 'pendiente', 2, 3, 'Autoevaluacion', '2020-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_alertas`
--

CREATE TABLE `hrm_alertas` (
  `id_alerta` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `numero` int(2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_antiguedad`
--

CREATE TABLE `hrm_antiguedad` (
  `id_antiguedad` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `id_puesto` int(3) NOT NULL,
  `activo` varchar(10) NOT NULL,
  `fecha_inicio` varchar(15) NOT NULL,
  `fecha_fin` varchar(15) NOT NULL,
  `aumento` varchar(10) NOT NULL,
  `comentarios` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_area`
--

CREATE TABLE `hrm_area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_asignacion`
--

CREATE TABLE `hrm_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `dias_habilies` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_direccion`
--

CREATE TABLE `hrm_direccion` (
  `id_direccion` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `entre_calles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_documentos`
--

CREATE TABLE `hrm_documentos` (
  `id_documento` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tamano` varchar(20) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_empleado`
--

CREATE TABLE `hrm_empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ape_p` varchar(30) NOT NULL,
  `ape_m` varchar(30) DEFAULT NULL,
  `fecha_nac` varchar(15) DEFAULT NULL,
  `curp` varchar(20) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `nss` varchar(12) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_horas`
--

CREATE TABLE `hrm_horas` (
  `id_hora` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `horas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_objetivos`
--

CREATE TABLE `hrm_objetivos` (
  `id_objetivo` int(11) NOT NULL,
  `id_puesto` int(3) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `f_limite` varchar(15) NOT NULL,
  `cumplio` varchar(10) NOT NULL,
  `porcentaje` varchar(5) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_puesto`
--

CREATE TABLE `hrm_puesto` (
  `id_puesto` int(11) NOT NULL,
  `id_area` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `sueldo` varchar(10) NOT NULL,
  `comentarios` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_usuario`
--

CREATE TABLE `hrm_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `permiso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_vacaciones`
--

CREATE TABLE `hrm_vacaciones` (
  `id_vacaciones` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `dia` varchar(15) NOT NULL,
  `color` varchar(10) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_area`
--

CREATE TABLE `tkd_area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_bitacora`
--

CREATE TABLE `tkd_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `id_peticion` int(4) NOT NULL,
  `encargado` varchar(30) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `comentarios` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_empleado`
--

CREATE TABLE `tkd_empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_area` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_m` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_peticiones`
--

CREATE TABLE `tkd_peticiones` (
  `id_peticion` int(11) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `area` varchar(30) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_servicios`
--

CREATE TABLE `tkd_servicios` (
  `id_servicio` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_usuarios`
--

CREATE TABLE `tkd_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `permiso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ecsnts_area`
--
ALTER TABLE `ecsnts_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `ecsnts_categoria`
--
ALTER TABLE `ecsnts_categoria`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `ecsnts_competencias`
--
ALTER TABLE `ecsnts_competencias`
  ADD PRIMARY KEY (`id_competencia`);

--
-- Indices de la tabla `ecsnts_contesto`
--
ALTER TABLE `ecsnts_contesto`
  ADD PRIMARY KEY (`id_campo`),
  ADD KEY `fk_validacion_contesto` (`id_validacion`),
  ADD KEY `id_registro` (`id_registro`);

--
-- Indices de la tabla `ecsnts_pregunta`
--
ALTER TABLE `ecsnts_pregunta`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `ecsnts_respuestas`
--
ALTER TABLE `ecsnts_respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_registro_respuestas` (`id_registro`);

--
-- Indices de la tabla `ecsnts_usuario`
--
ALTER TABLE `ecsnts_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ecsnts_validacion`
--
ALTER TABLE `ecsnts_validacion`
  ADD PRIMARY KEY (`Id_validacion`),
  ADD KEY `fk_usuario_validacion` (`Calificador`);

--
-- Indices de la tabla `hrm_alertas`
--
ALTER TABLE `hrm_alertas`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `fk_alertas_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_antiguedad`
--
ALTER TABLE `hrm_antiguedad`
  ADD PRIMARY KEY (`id_antiguedad`),
  ADD KEY `fk_antiguedad_puesto` (`id_puesto`),
  ADD KEY `fk_antiguedad_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_area`
--
ALTER TABLE `hrm_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `hrm_asignacion`
--
ALTER TABLE `hrm_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `fk_asignacion_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_direccion`
--
ALTER TABLE `hrm_direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `fk_direccion_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_documentos`
--
ALTER TABLE `hrm_documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_documentos_empleados` (`id_empleado`);

--
-- Indices de la tabla `hrm_empleado`
--
ALTER TABLE `hrm_empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `hrm_horas`
--
ALTER TABLE `hrm_horas`
  ADD PRIMARY KEY (`id_hora`),
  ADD KEY `fk_horas_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_objetivos`
--
ALTER TABLE `hrm_objetivos`
  ADD PRIMARY KEY (`id_objetivo`),
  ADD KEY `fk_objetivos_puesto` (`id_puesto`),
  ADD KEY `fk_objetivos_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_puesto`
--
ALTER TABLE `hrm_puesto`
  ADD PRIMARY KEY (`id_puesto`),
  ADD KEY `fk_puesto_area` (`id_area`);

--
-- Indices de la tabla `hrm_usuario`
--
ALTER TABLE `hrm_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_empleado` (`id_empleado`);

--
-- Indices de la tabla `hrm_vacaciones`
--
ALTER TABLE `hrm_vacaciones`
  ADD PRIMARY KEY (`id_vacaciones`),
  ADD KEY `fk_vacaciones_empleado` (`id_empleado`);

--
-- Indices de la tabla `tkd_area`
--
ALTER TABLE `tkd_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `tkd_bitacora`
--
ALTER TABLE `tkd_bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_bitacora_peticion` (`id_peticion`);

--
-- Indices de la tabla `tkd_empleado`
--
ALTER TABLE `tkd_empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fk_area_empleado` (`id_area`);

--
-- Indices de la tabla `tkd_peticiones`
--
ALTER TABLE `tkd_peticiones`
  ADD PRIMARY KEY (`id_peticion`),
  ADD KEY `fk_peticion_empleado` (`id_empleado`);

--
-- Indices de la tabla `tkd_servicios`
--
ALTER TABLE `tkd_servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tkd_usuarios`
--
ALTER TABLE `tkd_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ecsnts_area`
--
ALTER TABLE `ecsnts_area`
  MODIFY `id_area` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ecsnts_categoria`
--
ALTER TABLE `ecsnts_categoria`
  MODIFY `Id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ecsnts_competencias`
--
ALTER TABLE `ecsnts_competencias`
  MODIFY `id_competencia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ecsnts_contesto`
--
ALTER TABLE `ecsnts_contesto`
  MODIFY `id_campo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ecsnts_pregunta`
--
ALTER TABLE `ecsnts_pregunta`
  MODIFY `id_pregunta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ecsnts_respuestas`
--
ALTER TABLE `ecsnts_respuestas`
  MODIFY `id_respuesta` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ecsnts_usuario`
--
ALTER TABLE `ecsnts_usuario`
  MODIFY `id_usuario` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ecsnts_validacion`
--
ALTER TABLE `ecsnts_validacion`
  MODIFY `Id_validacion` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `hrm_alertas`
--
ALTER TABLE `hrm_alertas`
  MODIFY `id_alerta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_antiguedad`
--
ALTER TABLE `hrm_antiguedad`
  MODIFY `id_antiguedad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_area`
--
ALTER TABLE `hrm_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_asignacion`
--
ALTER TABLE `hrm_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_direccion`
--
ALTER TABLE `hrm_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_documentos`
--
ALTER TABLE `hrm_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_empleado`
--
ALTER TABLE `hrm_empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_horas`
--
ALTER TABLE `hrm_horas`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_objetivos`
--
ALTER TABLE `hrm_objetivos`
  MODIFY `id_objetivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_puesto`
--
ALTER TABLE `hrm_puesto`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_usuario`
--
ALTER TABLE `hrm_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_vacaciones`
--
ALTER TABLE `hrm_vacaciones`
  MODIFY `id_vacaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tkd_area`
--
ALTER TABLE `tkd_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tkd_bitacora`
--
ALTER TABLE `tkd_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tkd_empleado`
--
ALTER TABLE `tkd_empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tkd_peticiones`
--
ALTER TABLE `tkd_peticiones`
  MODIFY `id_peticion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tkd_servicios`
--
ALTER TABLE `tkd_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tkd_usuarios`
--
ALTER TABLE `tkd_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ecsnts_contesto`
--
ALTER TABLE `ecsnts_contesto`
  ADD CONSTRAINT `fk_validacion_contesto` FOREIGN KEY (`id_validacion`) REFERENCES `ecsnts_validacion` (`Id_validacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ecsnts_respuestas`
--
ALTER TABLE `ecsnts_respuestas`
  ADD CONSTRAINT `fk_registro_respuestas` FOREIGN KEY (`id_registro`) REFERENCES `ecsnts_contesto` (`id_registro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ecsnts_validacion`
--
ALTER TABLE `ecsnts_validacion`
  ADD CONSTRAINT `fk_usuario_validacion` FOREIGN KEY (`Calificador`) REFERENCES `ecsnts_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_alertas`
--
ALTER TABLE `hrm_alertas`
  ADD CONSTRAINT `fk_alertas_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_antiguedad`
--
ALTER TABLE `hrm_antiguedad`
  ADD CONSTRAINT `fk_antiguedad_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_antiguedad_puesto` FOREIGN KEY (`id_puesto`) REFERENCES `hrm_puesto` (`id_puesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_asignacion`
--
ALTER TABLE `hrm_asignacion`
  ADD CONSTRAINT `fk_asignacion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_direccion`
--
ALTER TABLE `hrm_direccion`
  ADD CONSTRAINT `fk_direccion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_documentos`
--
ALTER TABLE `hrm_documentos`
  ADD CONSTRAINT `fk_documentos_empleados` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_horas`
--
ALTER TABLE `hrm_horas`
  ADD CONSTRAINT `fk_horas_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_objetivos`
--
ALTER TABLE `hrm_objetivos`
  ADD CONSTRAINT `fk_objetivos_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_objetivos_puesto` FOREIGN KEY (`id_puesto`) REFERENCES `hrm_puesto` (`id_puesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_puesto`
--
ALTER TABLE `hrm_puesto`
  ADD CONSTRAINT `fk_puesto_area` FOREIGN KEY (`id_area`) REFERENCES `hrm_area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_usuario`
--
ALTER TABLE `hrm_usuario`
  ADD CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hrm_vacaciones`
--
ALTER TABLE `hrm_vacaciones`
  ADD CONSTRAINT `fk_vacaciones_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `hrm_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tkd_bitacora`
--
ALTER TABLE `tkd_bitacora`
  ADD CONSTRAINT `fk_bitacora_peticion` FOREIGN KEY (`id_peticion`) REFERENCES `tkd_peticiones` (`id_peticion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tkd_empleado`
--
ALTER TABLE `tkd_empleado`
  ADD CONSTRAINT `fk_area_empleado` FOREIGN KEY (`id_area`) REFERENCES `tkd_area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tkd_peticiones`
--
ALTER TABLE `tkd_peticiones`
  ADD CONSTRAINT `fk_peticion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `tkd_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
