-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2021 a las 02:45:56
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemas`
--
CREATE DATABASE IF NOT EXISTS `sistemas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistemas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_area`
--

CREATE TABLE IF NOT EXISTS `ecsnts_area` (
  `id_area` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_area`
--

INSERT INTO `ecsnts_area` (`id_area`, `nombre`) VALUES
(1, 'General'),
(2, 'Seguridad'),
(3, 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_categoria`
--

CREATE TABLE IF NOT EXISTS `ecsnts_categoria` (
  `Id_categoria` int(2) NOT NULL AUTO_INCREMENT,
  `Id_area` int(2) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_categoria`
--

INSERT INTO `ecsnts_categoria` (`Id_categoria`, `Id_area`, `Descripcion`) VALUES
(1, 1, 'Tronco Común'),
(2, 1, 'Tronco Común Seguridad'),
(3, 2, 'Escolta'),
(4, 3, 'Programador jr'),
(5, 3, 'Contador Senior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_competencias`
--

CREATE TABLE IF NOT EXISTS `ecsnts_competencias` (
  `id_competencia` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_competencia`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
(7, 'H2', 'xxxxx', 'xxxxx'),
(8, 'C1', 'contador ', 'senior'),
(9, 'c2', 'contador', 'senior prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_contesto`
--

CREATE TABLE IF NOT EXISTS `ecsnts_contesto` (
  `id_campo` int(3) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(3) NOT NULL,
  `id_validacion` int(11) NOT NULL,
  `id_registro` int(6) NOT NULL,
  `fecha` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_campo`),
  KEY `fk_validacion_contesto` (`id_validacion`),
  KEY `id_registro` (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_contesto`
--

INSERT INTO `ecsnts_contesto` (`id_campo`, `id_usuario`, `id_validacion`, `id_registro`, `fecha`) VALUES
(4, 1, 3, 1, '05-12-2020 03:48 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_pregunta`
--

CREATE TABLE IF NOT EXISTS `ecsnts_pregunta` (
  `id_pregunta` int(3) NOT NULL AUTO_INCREMENT,
  `competencia` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_area` int(2) NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_pregunta`
--

INSERT INTO `ecsnts_pregunta` (`id_pregunta`, `competencia`, `id_area`, `categoria`, `descripcion`) VALUES
(1, 'F1', 1, 'Tronco Común', 'Tronco Común - 1'),
(2, 'F2', 1, 'Tronco Común', 'Tronco Común - 2'),
(3, 'F3', 1, 'Tronco Común', 'Tronco Común -3'),
(4, 'F4', 1, 'Tronco Común', 'Tronco Común -4'),
(5, 'F5', 1, 'Tronco Común', 'Tronco Común - 5'),
(6, 'F1', 1, 'Tronco Común Seguridad', 'seguridad tc 1'),
(7, 'F2', 1, 'Tronco Común Seguridad', 'seguridad tc 2'),
(8, 'F3', 1, 'Tronco Común Seguridad', 'seguridad tc 3'),
(9, 'F4', 1, 'Tronco Común Seguridad', 'seguridad tc 4'),
(10, 'F5', 1, 'Tronco Común Seguridad', 'seguridad tc 5'),
(11, 'H1', 3, 'Programador jr', 'programador jr -1'),
(12, 'H2', 3, 'Programador jr', 'programador jr -2'),
(13, 'H1', 2, 'Escolta', 'escolta 1'),
(14, 'H2', 2, 'Escolta', 'escolta 2'),
(15, 'C1', 3, 'Contador Senior', 'esto es una prueba de la pregunta a contador senior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_respuestas`
--

CREATE TABLE IF NOT EXISTS `ecsnts_respuestas` (
  `id_respuesta` int(6) NOT NULL AUTO_INCREMENT,
  `id_registro` int(6) NOT NULL,
  `id_pregunta` int(3) NOT NULL,
  `respuesta` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `justificacion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_respuesta`),
  KEY `fk_registro_respuestas` (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_respuestas`
--

INSERT INTO `ecsnts_respuestas` (`id_respuesta`, `id_registro`, `id_pregunta`, `respuesta`, `justificacion`) VALUES
(15, 1, 1, 'Completamente_de_acuerdo', 'Autoevaluación tc1 e'),
(16, 1, 2, 'De_acuerdo', 'Autoevaluación tc2 b'),
(17, 1, 3, 'Ni_acuerdo_ni_en_desacuerdo', 'Autoevaluación tc3 n'),
(18, 1, 4, 'No_estoy_de_acuerdo', 'Autoevaluación tc4 m'),
(19, 1, 5, 'Completamente_en_desacuerdo', 'Autoevaluación tc5 t'),
(20, 1, 11, 'Completamente_de_acuerdo', 'Area 1 esjdjd'),
(21, 1, 12, 'Completamente_de_acuerdo', 'Area 2 ehejeji');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_usuario`
--

CREATE TABLE IF NOT EXISTS `ecsnts_usuario` (
  `id_usuario` int(2) NOT NULL AUTO_INCREMENT,
  `id_area` int(2) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `permiso` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_usuario`
--

INSERT INTO `ecsnts_usuario` (`id_usuario`, `id_area`, `nombre`, `clave`, `permiso`) VALUES
(1, 3, 'Edgar Jasso', 'Alohomora', 'root'),
(2, 2, 'Ismael', 'Alohomora', 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecsnts_validacion`
--

CREATE TABLE IF NOT EXISTS `ecsnts_validacion` (
  `Id_validacion` int(4) NOT NULL AUTO_INCREMENT,
  `Calificador` int(2) NOT NULL,
  `Calificado` int(2) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Validacion` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Area` int(4) NOT NULL,
  `Categoria` int(4) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `periodo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_validacion`),
  KEY `fk_usuario_validacion` (`Calificador`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ecsnts_validacion`
--

INSERT INTO `ecsnts_validacion` (`Id_validacion`, `Calificador`, `Calificado`, `Nombre`, `Validacion`, `Area`, `Categoria`, `tipo`, `periodo`) VALUES
(3, 1, 1, 'Edgar Jasso', 'hecho', 3, 4, 'Autoevaluacion', '2020-2'),
(4, 1, 2, 'Ismael', 'pendiente', 2, 3, 'Cliente', '2020-2'),
(5, 2, 2, 'Ismael', 'pendiente', 2, 3, 'Autoevaluacion', '2020-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_alergias`
--

CREATE TABLE IF NOT EXISTS `hrm_alergias` (
  `id_alergia` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `tipo_sangre` varchar(5) NOT NULL,
  `tel_contacto` varchar(20) NOT NULL,
  PRIMARY KEY (`id_alergia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_alertas`
--

CREATE TABLE IF NOT EXISTS `hrm_alertas` (
  `id_alerta` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `numero` int(2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_alerta`),
  KEY `fk_alertas_empleado` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_antiguedad`
--

CREATE TABLE IF NOT EXISTS `hrm_antiguedad` (
  `id_antiguedad` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `id_puesto` int(3) NOT NULL,
  `jefe_directo` varchar(50) NOT NULL,
  `activo` varchar(10) NOT NULL,
  `fecha_inicio` varchar(15) NOT NULL,
  `fecha_fin` varchar(15) NOT NULL,
  `comentarios` varchar(150) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id_antiguedad`),
  KEY `fk_antiguedad_puesto` (`id_puesto`),
  KEY `fk_antiguedad_empleado` (`id_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_antiguedad`
--

INSERT INTO `hrm_antiguedad` (`id_antiguedad`, `id_empleado`, `id_puesto`, `jefe_directo`, `activo`, `fecha_inicio`, `fecha_fin`, `comentarios`, `color`) VALUES
(1, 9, 20, '8  -  AARON ALEJANDRO  MONTENEGRO', 'alta', '2019-01-01', 'pendiente', '', '#c5327f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_area`
--

CREATE TABLE IF NOT EXISTS `hrm_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_area`
--

INSERT INTO `hrm_area` (`id_area`, `nombre`) VALUES
(1, 'Administracion'),
(2, 'Direccion'),
(3, 'Marketing'),
(4, 'Ventas'),
(5, 'Operaciones'),
(6, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_asignacion`
--

CREATE TABLE IF NOT EXISTS `hrm_asignacion` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `dias_habilies` varchar(2) NOT NULL,
  `periodo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `fk_asignacion_empleado` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_bajas`
--

CREATE TABLE IF NOT EXISTS `hrm_bajas` (
  `id_baja` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  PRIMARY KEY (`id_baja`),
  KEY `id_empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_direccion`
--

CREATE TABLE IF NOT EXISTS `hrm_direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `entre_calles` varchar(100) NOT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `fk_direccion_empleado` (`id_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_direccion`
--

INSERT INTO `hrm_direccion` (`id_direccion`, `id_empleado`, `pais`, `estado`, `municipio`, `colonia`, `calle`, `numero`, `entre_calles`) VALUES
(1, 29, 'MEXICO', 'MEXICO', 'VILLA NICOLAS ROMERO', 'EL TRAFICO', 'PALOMAS', '5', 'NO ESPECIFICA'),
(2, 30, 'MEXICO', 'MEXICO', 'TLALNEPANTLA', 'VALLE CEYLAN', 'GUADALAJARA', '35', 'NO ESPECIFICA'),
(3, 31, 'MEXICO', 'MEXICO', 'NICOLAS ROMERO', 'SAN JUAN', 'GARDENIAS', '39', 'NO ESPECIFICA'),
(4, 32, 'MEXICO', 'MEXICO', 'ATIZAPAN DE ZARAGOZA', 'LA CANADA', 'ALONDRA', ' 31', 'NO ESPECIFICA'),
(5, 33, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'SAN JOSE ', 'SANISIDRO', '5', 'NO ESPECIFICA'),
(6, 34, 'MEXICO', 'QUERETARO', 'MARQUEZ', 'ZIBATA', 'PITAHYAS', '6', 'NO ESPECIFICA'),
(7, 35, 'MEXICO', 'MEXICO', 'BENITO JUAREZ', 'TLALPAN', 'TORRES', '403', 'NO ESPECIFICA'),
(8, 37, 'MEXICO', 'MEXICO', 'MIGUEL HIDALGO', 'LOMAS DE CHAPULTEPEC', 'MANUEL AVILA CAMACHO', '36', 'NO ESPECIFICA'),
(9, 38, 'MEXICO', 'MEXICO', 'AZCAPOTZALCO', 'EL ROSARIO', 'PLANETAS', '155', 'NO ESPECIFICA'),
(10, 39, 'MEXICO', 'MEXICO', 'CUAUTITLAN IZCALLI', 'STA MA GPE', 'TORRE REY DAVID', '186', 'NO ESPECIFICA'),
(11, 40, 'MEXICO', 'MEXICO', 'GUSTAVO A MADERO', 'NACIONAL', 'DEMET TORRE', '18 ', 'NO ESPECIFICA'),
(12, 41, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'SAN JAVIER', 'CUAUHTEMOC', '34', 'NO ESPECIFICA'),
(13, 43, 'MEXICO', 'MEXICO', 'MIGUEL HIDALGO', 'DANIEL GARZA', 'MENDIVIL', '19', 'NO ESPECIFICA'),
(14, 43, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'BOSQUES DE MEXICO', 'BOSQUES DE CHIHUAHUA', '45', 'NO ESPECIFICA'),
(15, 44, 'MEXICO', 'MEXICO', 'CUAUTITLAN IZCALLI', 'INFONAVIT NORTE', 'IZTACCIHUATL Y POPOCATEPETL', '173', 'NO ESPECIFICA'),
(16, 8, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'CONJUNTO MED', 'HOLANDA', '103', 'NO ESPECIFICA'),
(17, 9, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'AMPLIACION VISTA HERMOSA', 'FUENTE', '4', 'NO ESPECIFICA'),
(18, 10, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'BOSQUES DE MEXICO', 'BOSQUES DE CHIHUAHUA', '45', 'NO ESPECIFICA'),
(19, 11, 'MEXICO', 'TLAXCALA', 'TLAXCALA', 'MADERO', 'MARIANO ARISTA', '20', 'NO ESPECIFICA'),
(20, 13, 'MEXICO', 'MEXICO', 'GUSTAVO A MADERO', 'LA PROVIDENCIA', 'NAYARIT', '101', 'NO ESPECIFICA'),
(21, 14, 'MEXICO', 'MEXICO', 'ECATEPEC', 'CUAC TULTEPEC', 'LOMAS DEL LAUREL', '7', 'NO ESPECIFICA'),
(22, 15, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'CIUDAD SATELITE', 'JOAQUIN PESADO', '13', 'NO ESPECIFICA'),
(23, 17, 'MEXICO', 'MEXICO', 'MEXICO', 'TACUBA', 'LAGO ZUG', '101', 'NO ESPECIFICA'),
(24, 18, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'LAS HUERTAS', 'GORRIONES', '47', 'NO ESPECIFICA'),
(25, 19, 'MEXICO', 'MEXICO', 'ATIZAPAN DE ZARAGOZA', 'VILLA HACIENDA', 'COLEADERO', '108', 'NO ESPECIFICA'),
(26, 22, 'MEXICO', 'MEXICO', 'CHICOLOPAN', 'GEOVILLAS ', 'ALAZAN', '11', 'NO ESPECIFICA'),
(27, 23, 'MEXICO', 'MEXICO', 'CHICOLOPAN', 'GEOVILLAS COSTITLAN', 'ALSAN', '11', 'NO ESPECIFICA'),
(28, 24, 'MEXICO', 'MEXICO', 'NICOLAS ROMERO', 'GRANJAS GUADALUPE', 'PAPIRO', '9', 'NO ESPECIFICA'),
(29, 25, 'MEXICO', 'MEXICO', 'MEXICO', 'PRO HOGAR', 'CALLE VEINTICIETE', '150', 'NO ESPECIFICA'),
(30, 26, 'MEXICO', 'MEXICO', 'CUAUTITLAN IZCALLI', 'UNIDAD HABITACIONAL', 'NINOS HEROES', '301', 'NO ESPECIFICA'),
(31, 27, 'MEXICO', 'MEXICO', 'VILLA NICOLAS ROMERO', 'BLVRS DEL LAGO', 'QUETZAL', '29', 'NO ESPECIFICA'),
(32, 28, 'MEXICO', 'MEXICO', 'CUAUTITLAN IZCALLI', 'DEL LAGO', 'CANDELARIA', '18', 'NO ESPECIFICA'),
(33, 45, 'MEXICO', 'MEXICO', 'GUSTAVO A MADERO', 'NUEVA INDUSTRIA VALLEJO', 'ACAPULCO', '406', 'NO ESPECIFICA'),
(34, 46, 'MEXICO', 'MEXICO', 'TEPOTZOTLAN', 'BARRIO SANTA CRUZ', 'TULIPANES', '4', 'NO ESPECIFICA'),
(35, 47, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'LOMAS VERDES', 'JOSE DEL REAL', '402', 'NO ESPECIFICA'),
(36, 48, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'CIUDAD SATELITE', 'JOSE DAMIAN', '12', 'NO ESPECIFICA'),
(37, 49, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'SAN LUCAS PATONI', 'HEROES DE NACOZARIA', '32', 'NO ESPECIFICA'),
(38, 50, 'MEXICO', 'MEXICO', 'GUSTAVO A MADERO', 'GUADALUPE TEPEYAC', 'AMALIA', '125', 'NO ESPECIFICA'),
(39, 51, 'MEXICO', 'MEXICO', 'HUIXQUILUCAN', 'IGNACIO AYENDE', 'LARANPINTA', '0', 'NO ESPECIFICA'),
(40, 52, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'EL MIRADOR', 'IGNACIO ZARAGOZA', '3', 'NO ESPECIFICA'),
(41, 53, 'MEXICO', 'MEXICO', 'TLALNEPANTLA DE BAZ', 'LOS REYES IXTACALA', 'SINNOMBRE', '3', 'NO ESPECIFICA'),
(42, 54, 'MEXICO', 'MEXICO', 'NAUCALPAN DE JUAREZ', 'ALTAMIRA', 'ALCANFORES', '3', 'NO ESPECIFICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_documentos`
--

CREATE TABLE IF NOT EXISTS `hrm_documentos` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tamano` varchar(20) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `fk_documentos_empleados` (`id_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=337 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_documentos`
--

INSERT INTO `hrm_documentos` (`id_documento`, `id_empleado`, `titulo`, `descripcion`, `tipo`, `tamano`, `ruta`) VALUES
(7, 9, 'INE', '', 'application/pdf', '1871423', 'Archivos/9/INE.pdf'),
(8, 9, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '1561938', 'Archivos/9/LICENCIA.pdf'),
(9, 9, 'Numero de Seguro Social', '', 'application/pdf', '1228456', 'Archivos/9/NSS.pdf'),
(10, 9, 'RFC', '', 'application/pdf', '595134', 'Archivos/9/RFC Y CURP Ana Cristina González .pdf'),
(11, 9, 'CURP', '', 'application/pdf', '595134', 'Archivos/9/RFC Y CURP Ana Cristina González .pdf'),
(14, 10, 'Comprobante de domicilio', '', 'application/pdf', '732655', 'Archivos/10/COMPROBATE DOMICILIO.pdf'),
(15, 10, 'Numero de Seguro Social', '', 'application/pdf', '823340', 'Archivos/10/NSS.pdf'),
(16, 10, 'Pasaporte', '', 'application/pdf', '678554', 'Archivos/10/PASAPORTE.pdf'),
(17, 10, 'RFC', '', 'application/pdf', '911017', 'Archivos/10/RFC.pdf'),
(18, 11, 'Comprobante de domicilio', '', 'application/pdf', '1440405', 'Archivos/11/CD.pdf'),
(19, 11, 'INE', '', 'application/pdf', '1167489', 'Archivos/11/INE.pdf'),
(20, 11, 'Numero de Seguro Social', '', 'application/pdf', '945996', 'Archivos/11/NSS.pdf'),
(21, 11, 'RFC', '', 'application/pdf', '1274606', 'Archivos/11/RFC.pdf'),
(22, 8, 'Acta de Nacimiento ', '', 'application/pdf', '1017232', 'Archivos/8/Acta de nacimiento Aron Alejandro Montenegro .pdf'),
(23, 8, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '645202', 'Archivos/8/Licencia para conducir .pdf'),
(24, 8, 'RFC', '', 'application/pdf', '588670', 'Archivos/8/RFC Y CURP .pdf'),
(25, 8, 'CURP', '', 'application/pdf', '588670', 'Archivos/8/RFC Y CURP .pdf'),
(26, 12, 'Acta de Nacimiento ', '', 'application/pdf', '1699609', 'Archivos/12/AN.pdf'),
(27, 12, 'Comprobante de domicilio', '', 'application/pdf', '1876365', 'Archivos/12/CD.pdf'),
(28, 12, 'CURP', '', 'application/pdf', '1021899', 'Archivos/12/CURP.pdf'),
(29, 12, 'INE', '', 'application/pdf', '3755837', 'Archivos/12/INE.pdf'),
(30, 12, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '1260486', 'Archivos/12/LC.pdf'),
(31, 12, 'RFC', '', 'application/pdf', '687152', 'Archivos/12/RFC.pdf'),
(32, 49, 'Acta de Nacimiento ', '', 'application/pdf', '1460993', 'Archivos/49/Acta de Nacimiento.pdf'),
(33, 50, 'Comprobante de domicilio', '', 'application/pdf', '704089', 'Archivos/50/CD.pdf'),
(34, 50, 'CURP', '', 'application/pdf', '1032257', 'Archivos/50/CURP.pdf'),
(35, 50, 'Numero de Seguro Social', '', 'application/pdf', '665252', 'Archivos/50/NSS.pdf'),
(216, 26, 'PASAPORTE', '', 'application/pdf', '215049', 'Archivos/26/PASAPORTE.pdf'),
(215, 26, 'IMSS', '', 'application/pdf', '253779', 'Archivos/26/IMSS.pdf'),
(214, 26, 'INE', '', 'application/pdf', '163495', 'Archivos/26/INE.pdf'),
(213, 26, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '479180', 'Archivos/26/CERTIFICADO DE ESTUDIOS.pdf'),
(44, 14, 'Acta de Nacimiento ', '', 'application/pdf', '1146811', 'Archivos/14/AN.pdf'),
(45, 14, 'CURP', '', 'application/pdf', '1014989', 'Archivos/14/CURP.pdf'),
(46, 14, 'INE', '', 'application/pdf', '811954', 'Archivos/14/INE.pdf'),
(47, 14, 'Numero de Seguro Social', '', 'application/pdf', '1057443', 'Archivos/14/NSS.pdf'),
(48, 52, 'Comprobante de domicilio', '', 'application/pdf', '858001', 'Archivos/52/CD.pdf'),
(49, 52, 'CURP', '', 'application/pdf', '1153083', 'Archivos/52/CURP.pdf'),
(236, 55, 'RFC', '', 'application/pdf', '178563', 'Archivos/55/RFC.pdf'),
(235, 55, 'CURP', '', 'application/pdf', '276694', 'Archivos/55/CURP.pdf'),
(234, 55, 'IMSS', '', 'application/pdf', '351782', 'Archivos/55/IMSS.pdf'),
(233, 55, 'INE', '', 'application/pdf', '134339', 'Archivos/55/INE.pdf'),
(333, 16, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '245787', 'Archivos/16/Comprobante se domicilio Paco Piña.pdf'),
(61, 16, 'CURP', '', 'application/pdf', '905255', 'Archivos/16/CURP.pdf'),
(331, 16, 'INE 1', '', 'application/pdf', '356420', 'Archivos/16/ONE Paco Piña_2 ine.pdf'),
(64, 16, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '639761', 'Archivos/16/LC.pdf'),
(65, 16, 'Numero de Seguro Social', '', 'application/pdf', '902471', 'Archivos/16/NSS.pdf'),
(66, 16, 'Pasaporte', '', 'application/pdf', '676412', 'Archivos/16/PSPT.pdf'),
(67, 19, 'Acta de Nacimiento ', '', 'application/pdf', '1500255', 'Archivos/19/AN.pdf'),
(68, 19, 'Comprobante de domicilio', '', 'application/pdf', '1856715', 'Archivos/19/CD.pdf'),
(69, 19, 'INE', '', 'application/pdf', '745888', 'Archivos/19/INE.pdf'),
(70, 19, 'Numero de Seguro Social', '', 'application/pdf', '656703', 'Archivos/19/NSS.pdf'),
(227, 30, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '370332', 'Archivos/30/CERTIFICADO DE ESTUDIOS.pdf'),
(335, 16, 'INE', '', 'application/pdf', '250888', 'Archivos/16/INE PACO PIÑA.pdf'),
(224, 28, 'LICENCIA', '', 'application/pdf', '256053', 'Archivos/28/LICENCIA.pdf'),
(77, 20, 'Acta de Nacimiento ', '', 'application/pdf', '1342977', 'Archivos/20/AN.pdf'),
(78, 20, 'Comprobante de domicilio', '', 'application/pdf', '1235274', 'Archivos/20/CD.pdf'),
(79, 20, 'CURP', '', 'application/pdf', '836647', 'Archivos/20/CURP.pdf'),
(80, 20, 'INE', '', 'application/pdf', '807019', 'Archivos/20/INE.pdf'),
(81, 20, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '557281', 'Archivos/20/LC.pdf'),
(328, 59, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '246188', 'Archivos/59/CERTIFICADO DE ESTUDIOS.pdf'),
(327, 59, 'RFC', '', 'application/pdf', '142217', 'Archivos/59/RFC.pdf'),
(86, 22, 'Acta de Nacimiento ', '', 'application/pdf', '1333739', 'Archivos/22/AN.pdf'),
(89, 22, 'Numero de Seguro Social', '', 'application/pdf', '1452132', 'Archivos/22/NSS.pdf'),
(90, 22, 'CURP', '', 'application/pdf', '1011873', 'Archivos/22/CURP.pdf'),
(91, 22, 'Comprobante de domicilio', '', 'application/pdf', '856863', 'Archivos/22/CD.pdf'),
(232, 55, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '432410', 'Archivos/55/CERTIFICADO DE ESTUDIOS.pdf'),
(231, 55, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '272977', 'Archivos/55/COMPROBANTE DE DOMICILIO.pdf'),
(97, 26, 'Acta de Nacimiento ', '', 'application/pdf', '1291909', 'Archivos/26/AN.pdf'),
(98, 26, 'Comprobante de domicilio', '', 'application/pdf', '1391421', 'Archivos/26/CD.pdf'),
(99, 26, 'CURP', '', 'application/pdf', '962474', 'Archivos/26/CURP.pdf'),
(100, 26, 'RFC', '', 'application/pdf', '1069857', 'Archivos/26/RFC.pdf'),
(101, 54, 'Acta de Nacimiento ', '', 'application/pdf', '836121', 'Archivos/54/AN.pdf'),
(102, 54, 'Comprobante de domicilio', '', 'application/pdf', '719316', 'Archivos/54/CD.pdf'),
(103, 54, 'CURP', '', 'application/pdf', '810413', 'Archivos/54/CURP.pdf'),
(104, 24, 'Acta de Nacimiento ', '', 'application/pdf', '1632641', 'Archivos/24/AN.pdf'),
(105, 24, 'Comprobante de domicilio', '', 'application/pdf', '878295', 'Archivos/24/CD.pdf'),
(106, 24, 'CURP', '', 'application/pdf', '1165082', 'Archivos/24/CURP.pdf'),
(107, 24, 'RFC', '', 'application/pdf', '2438221', 'Archivos/24/RFC.pdf'),
(230, 55, 'ACTA DE NACIMIENTO', '', 'application/pdf', '333794', 'Archivos/55/ACTA DE NACIMIENTO.pdf'),
(229, 30, 'INE', '', 'application/pdf', '208619', 'Archivos/30/INE.pdf'),
(228, 30, 'PASAPORTE Y VISA', '', 'application/pdf', '383402', 'Archivos/30/PASAPORTE Y VISA.pdf'),
(112, 28, 'Acta de Nacimiento ', '', 'application/pdf', '1608968', 'Archivos/28/AN.pdf'),
(113, 28, 'Comprobante de domicilio', '', 'application/pdf', '1070710', 'Archivos/28/CD.pdf'),
(114, 28, 'CURP', '', 'application/pdf', '1113941', 'Archivos/28/CURP.pdf'),
(115, 28, 'Numero de Seguro Social', '', 'application/pdf', '966945', 'Archivos/28/NSS.pdf'),
(116, 28, 'RFC', '', 'application/pdf', '604258', 'Archivos/28/RFC.pdf'),
(117, 27, 'Acta de Nacimiento ', '', 'application/pdf', '1163778', 'Archivos/27/AN.pdf'),
(118, 27, 'CURP', '', 'application/pdf', '858313', 'Archivos/27/CURP.pdf'),
(119, 27, '', '', 'application/pdf', '658768', 'Archivos/27/RFC.pdf'),
(332, 28, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '145775', 'Archivos/28/COMPROBANTE DE DOMICILIO MATUS.pdf'),
(330, 16, 'INE 2 ', '', 'application/pdf', '320519', 'Archivos/16/ONE Paco Piña_1 (2).pdf'),
(329, 59, 'ACTA DE NACIMIENTO', '', 'application/pdf', '274962', 'Archivos/59/ACTA DE NACIMIENTO.pdf'),
(125, 30, 'Acta de Nacimiento ', '', 'application/pdf', '1720691', 'Archivos/30/AN.pdf'),
(126, 30, 'Comprobante de domicilio', '', 'application/pdf', '1870873', 'Archivos/30/CD.pdf'),
(127, 30, 'CURP', '', 'application/pdf', '1734693', 'Archivos/30/CURP.pdf'),
(128, 30, 'Numero de Seguro Social', '', 'application/pdf', '1346608', 'Archivos/30/NSS.pdf'),
(129, 30, 'RFC', '', 'application/pdf', '1940682', 'Archivos/30/RFC.pdf'),
(130, 45, 'Comprobante de domicilio', '', 'application/pdf', '1000517', 'Archivos/45/CD.pdf'),
(131, 45, 'CURP', '', 'application/pdf', '1061290', 'Archivos/45/CURP.pdf'),
(132, 45, 'Numero de Seguro Social', '', 'application/pdf', '1539436', 'Archivos/45/NSS.pdf'),
(133, 45, 'RFC', '', 'application/pdf', '839532', 'Archivos/45/RFC.pdf'),
(135, 46, 'Acta de Nacimiento ', '', 'application/pdf', '1993495', 'Archivos/46/AN.pdf'),
(303, 46, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '289569', 'Archivos/46/COMPROBANTE DE DOMICILIO.pdf'),
(137, 46, 'CURP', '', 'application/pdf', '1074189', 'Archivos/46/CURP.pdf'),
(138, 46, 'Numero de Seguro Social', '', 'application/pdf', '1074189', 'Archivos/46/NSS.pdf'),
(223, 28, 'INE', '', 'application/pdf', '325197', 'Archivos/28/INE.pdf'),
(222, 28, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '276212', 'Archivos/28/CERTIFICADO DE ESTUDIOS.pdf'),
(143, 35, 'Acta de Nacimiento ', '', 'application/pdf', '1491691', 'Archivos/35/AN.pdf'),
(144, 35, 'Comprobante de domicilio', '', 'application/pdf', '928733', 'Archivos/35/CD.pdf'),
(145, 35, 'CURP', '', 'application/pdf', '1214118', 'Archivos/35/CURP.pdf'),
(146, 35, 'Numero de Seguro Social', '', 'application/pdf', '695550', 'Archivos/35/NSS.pdf'),
(218, 27, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '262976', 'Archivos/27/CERTIFICADO DE ESTUDIOS.pdf'),
(334, 27, 'INE', '', 'application/pdf', '366405', 'Archivos/27/INE CARLOS MATUS.pdf'),
(150, 34, 'Acta de Nacimiento ', '', 'application/pdf', '2403538', 'Archivos/34/AN.pdf'),
(151, 34, 'Comprobante de domicilio', '', 'application/pdf', '920870', 'Archivos/34/CD.pdf'),
(152, 34, 'CURP', '', 'application/pdf', '1003277', 'Archivos/34/CURP.pdf'),
(153, 36, 'Acta de Nacimiento ', '', 'application/pdf', '1330395', 'Archivos/36/AN.pdf'),
(154, 36, 'INE', '', 'application/pdf', '1224900', 'Archivos/36/INE.pdf'),
(155, 37, 'Acta de Nacimiento ', '', 'application/pdf', '1289929', 'Archivos/37/AN.pdf'),
(156, 37, 'Comprobante de domicilio', '', 'application/pdf', '1111496', 'Archivos/37/CD.pdf'),
(157, 37, 'CURP', '', 'application/pdf', '1183183', 'Archivos/37/CURP.pdf'),
(221, 27, 'PASAPORTE Y VISA', '', 'application/pdf', '285593', 'Archivos/27/PASAPORTE Y VISA.pdf'),
(220, 27, 'IMSS', '', 'application/pdf', '303217', 'Archivos/27/IMSS.pdf'),
(219, 27, 'LICENCIA', '', 'application/pdf', '214656', 'Archivos/27/LICENCIA.pdf'),
(325, 58, 'CV', '', 'application/pdf', '236607', 'Archivos/58/CV.pdf'),
(324, 58, 'DATOS BANCARIOS', '', 'application/pdf', '201258', 'Archivos/58/DATOS BNCARIOS.pdf'),
(322, 58, 'AFORE', '', 'application/pdf', '214003', 'Archivos/58/AFORE.pdf'),
(323, 58, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '229498', 'Archivos/58/COMPROBANTE DE DOMICILIO.pdf'),
(326, 59, 'LICENCIA', '', 'application/pdf', '211776', 'Archivos/59/LICENCIA.pdf'),
(169, 41, 'Acta de Nacimiento ', '', 'application/pdf', '1783085', 'Archivos/41/AN.pdf'),
(170, 41, 'Comprobante de domicilio', '', 'application/pdf', '1310797', 'Archivos/41/CD.pdf'),
(171, 41, 'CURP', '', 'application/pdf', '1204733', 'Archivos/41/CURP.pdf'),
(172, 41, 'Numero de Seguro Social', '', 'application/pdf', '1120815', 'Archivos/41/NSS.pdf'),
(173, 42, 'Acta de Nacimiento ', '', 'application/pdf', '1403729', 'Archivos/42/AN.pdf'),
(174, 42, 'CURP', '', 'application/pdf', '765726', 'Archivos/42/CURP.pdf'),
(175, 42, 'Numero de Seguro Social', '', 'application/pdf', '680432', 'Archivos/42/NSS.pdf'),
(176, 42, 'RFC', '', 'application/pdf', '765726', 'Archivos/42/RFC.pdf'),
(177, 43, 'Comprobante de domicilio', '', 'application/pdf', '1541497', 'Archivos/43/CD.pdf'),
(178, 43, 'CURP', '', 'application/pdf', '1025765', 'Archivos/43/CURP.pdf'),
(179, 43, 'Numero de Seguro Social', '', 'application/pdf', '1295392', 'Archivos/43/NSS.pdf'),
(180, 43, 'RFC', '', 'application/pdf', '744603', 'Archivos/43/RFC.pdf'),
(181, 48, 'Acta de Nacimiento ', '', 'application/pdf', '2905753', 'Archivos/48/AN.pdf'),
(182, 48, 'Comprobante de domicilio', '', 'application/pdf', '1204997', 'Archivos/48/CD.pdf'),
(183, 48, 'CURP', '', 'application/pdf', '1008448', 'Archivos/48/CURP.pdf'),
(184, 48, 'Numero de Seguro Social', '', 'application/pdf', '1307520', 'Archivos/48/NSS.pdf'),
(185, 44, 'Acta de Nacimiento ', '', 'application/pdf', '1120323', 'Archivos/44/AN.pdf'),
(186, 44, 'Comprobante de domicilio', '', 'application/pdf', '689215', 'Archivos/44/CD.pdf'),
(188, 44, 'Numero de Seguro Social', '', 'application/pdf', '704187', 'Archivos/44/NSS.pdf'),
(189, 44, 'CURP', '', 'application/pdf', '1021385', 'Archivos/44/CURP.pdf'),
(190, 8, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '246912', 'Archivos/8/CERTIFICADO DE ESTUDIOS.pdf'),
(191, 8, 'INE', '', 'application/pdf', '170535', 'Archivos/8/INE.pdf'),
(192, 9, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '191199', 'Archivos/9/CERTIFICADO DE ESTUDIOS.pdf'),
(193, 11, 'ACTA DE NACIMIENTO', '', 'application/pdf', '313515', 'Archivos/11/ACTA DE NACIMIENTO.pdf'),
(196, 12, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '205236', 'Archivos/12/CERTIFICADO DE ESTUDIOS.pdf'),
(195, 11, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '713237', 'Archivos/11/CERTIFICADO DE ESTUDIOS.pdf'),
(197, 12, 'IMSS', '', 'application/pdf', '304520', 'Archivos/12/IMSS.pdf'),
(202, 14, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '273391', 'Archivos/14/CERTIFICADO DE ESTUDIOS.pdf'),
(203, 14, 'LICENCIA', '', 'application/pdf', '199137', 'Archivos/14/LICENCIA.pdf'),
(204, 14, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '161745', 'Archivos/14/CERTIFICADO DE ESTUDIOS.pdf'),
(205, 16, 'ACTA DE NACIMIENTO', '', 'application/pdf', '483906', 'Archivos/16/ACTA DE NACIMIENTO.pdf'),
(207, 20, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '208836', 'Archivos/20/CERTIFICADO DE ESTUDIOS.pdf'),
(208, 20, 'IMSS', '', 'application/pdf', '311531', 'Archivos/20/IMSS.pdf'),
(209, 22, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '282978', 'Archivos/22/CERTIFICADO DE ESTUDIOS.pdf'),
(210, 22, 'INE', '', 'application/pdf', '205685', 'Archivos/22/INE.pdf'),
(211, 19, 'CURP', '', 'application/pdf', '276694', 'Archivos/19/CURP.pdf'),
(212, 22, 'LICENCIA', '', 'application/pdf', '217768', 'Archivos/22/LICENCIA.pdf'),
(237, 33, 'ACTA DE NACIMIENTO', '', 'application/pdf', '764200', 'Archivos/33/ACTA DE NACIMIENTO.pdf'),
(238, 33, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '250697', 'Archivos/33/COMPROBANTE DE DOMICILIO.pdf'),
(239, 33, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '208195', 'Archivos/33/CERTIFICADO DE ESTUDIOS.pdf'),
(240, 33, 'INE', '', 'application/pdf', '204523', 'Archivos/33/INE.pdf'),
(241, 33, 'IMSS', '', 'application/pdf', '137384', 'Archivos/33/IMSS.pdf'),
(242, 33, 'CURP', '', 'application/pdf', '339299', 'Archivos/33/CURP.pdf'),
(243, 33, 'RFC', '', 'application/pdf', '498687', 'Archivos/33/RFC.pdf'),
(244, 34, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '197945', 'Archivos/34/CERTIFICADO DE ESTUDIOS.pdf'),
(245, 34, 'INE', '', 'application/pdf', '209149', 'Archivos/34/INE.pdf'),
(246, 34, 'IMSS', '', 'application/pdf', '172770', 'Archivos/34/IMSS.pdf'),
(247, 34, 'PASAPORTE Y VISA', '', 'application/pdf', '157788', 'Archivos/34/PASAPORTE Y VISA.pdf'),
(248, 35, 'INE', '', 'application/pdf', '227400', 'Archivos/35/INE.pdf'),
(249, 35, 'PASAPORTE Y VISA', '', 'application/pdf', '218461', 'Archivos/35/PASAPORTE Y VISA.pdf'),
(250, 36, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '317283', 'Archivos/36/COMPROBANTE DE DOMICILIO.pdf'),
(251, 36, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '185406', 'Archivos/36/CERTIFICADO DE ESTUDIOS.pdf'),
(252, 36, 'INE', '', 'application/pdf', '183454', 'Archivos/36/INE.pdf'),
(253, 36, 'PASAPORTE Y VISA', '', 'application/pdf', '155034', 'Archivos/36/PASAPORTE Y VISA.pdf'),
(254, 37, 'INE', '', 'application/pdf', '147405', 'Archivos/37/INE.pdf'),
(255, 37, 'LICENCIA', '', 'application/pdf', '189242', 'Archivos/37/LICENCIA.pdf'),
(321, 58, 'PASAPORTE Y VISA', '', 'application/pdf', '169960', 'Archivos/58/PASAPORTE Y VISA.pdf'),
(320, 58, 'LICENCIA', '', 'application/pdf', '114406', 'Archivos/58/LICENCIA.pdf'),
(319, 58, 'CURP', '', 'application/pdf', '76913', 'Archivos/58/CURP.pdf'),
(318, 58, 'INE', '', 'application/pdf', '148113', 'Archivos/58/INE.pdf'),
(316, 58, 'ACTA DE NACIMIENTO', '', 'application/pdf', '222100', 'Archivos/58/ACTA DE NACIMIENTO.pdf'),
(317, 58, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '206456', 'Archivos/58/CERTIFICADO DE ESTUDIOS.pdf'),
(265, 41, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '246065', 'Archivos/41/CERTIFICADO DE ESTUDIOS.pdf'),
(266, 41, 'INE', '', 'application/pdf', '120515', 'Archivos/41/INE.pdf'),
(267, 41, 'PASAPORTE Y VISA', '', 'application/pdf', '178030', 'Archivos/41/PASAPORTE Y VISA.pdf'),
(268, 41, 'RFC', '', 'application/pdf', '174214', 'Archivos/41/RFC.pdf'),
(269, 42, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '137087', 'Archivos/42/COMPROBANTE DE DOMICILIO.pdf'),
(270, 42, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '182913', 'Archivos/42/CERTIFICADO DE ESTUDIOS.pdf'),
(271, 42, 'INE', '', 'application/pdf', '597120', 'Archivos/42/INE.pdf'),
(272, 42, 'PASAPORTE', '', 'application/pdf', '455184', 'Archivos/42/PASAPORTE.pdf'),
(273, 43, 'PASAPORTE', '', 'application/pdf', '231130', 'Archivos/43/PASAPORTE.pdf'),
(274, 44, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '269754', 'Archivos/44/CERTIFICADO DE ESTUDIOS.pdf'),
(275, 44, 'INE', '', 'application/pdf', '171283', 'Archivos/44/INE.pdf'),
(276, 49, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '209215', 'Archivos/49/CERTIFICADO DE ESTUDIOS.pdf'),
(277, 49, 'INE', '', 'application/pdf', '200158', 'Archivos/49/INE.pdf'),
(278, 49, 'LICENCIA', '', 'application/pdf', '152597', 'Archivos/49/LICENCIA.pdf'),
(279, 49, 'IMSS', '', 'application/pdf', '195325', 'Archivos/49/IMSS.pdf'),
(280, 49, 'CURP', '', 'application/pdf', '387672', 'Archivos/49/CURP.pdf'),
(281, 50, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '215143', 'Archivos/50/CERTIFICADO DE ESTUDIOS.pdf'),
(282, 50, 'PASAPORTE Y VISA', '', 'application/pdf', '182831', 'Archivos/50/PASAPORTE Y VISA.pdf'),
(283, 50, 'RESIDENCIA PERMANENTE', '', 'application/pdf', '102771', 'Archivos/50/RESIDENCIA PERMANENTE.pdf'),
(284, 52, 'ACTA DE NACIMIENTO', '', 'application/pdf', '330010', 'Archivos/52/ACTA DE NACIMIENTO.pdf'),
(285, 52, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '268119', 'Archivos/52/CERTIFICADO DE ESTUDIOS.pdf'),
(286, 52, 'INE', '', 'application/pdf', '175699', 'Archivos/52/INE.pdf'),
(287, 52, 'IMSS', '', 'application/pdf', '253589', 'Archivos/52/IMSS.pdf'),
(288, 54, 'INE', '', 'application/pdf', '149765', 'Archivos/54/INE.pdf'),
(289, 54, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '128517', 'Archivos/54/CERTIFICADO DE ESTUDIOS.pdf'),
(290, 54, 'IMSS', '', 'application/pdf', '221285', 'Archivos/54/IMSS.pdf'),
(291, 56, 'ACTA DE NACIMIENTO', '', 'application/pdf', '317380', 'Archivos/56/ACTA DE NACIMIENTO.pdf'),
(292, 56, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '252759', 'Archivos/56/COMPROBANTE DE DOMICILIO.pdf'),
(293, 56, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '303924', 'Archivos/56/CERTIFICADO DE ESTUDIOS.pdf'),
(294, 56, 'INE', '', 'application/pdf', '187165', 'Archivos/56/INE.pdf'),
(295, 56, 'IMSS', '', 'application/pdf', '225550', 'Archivos/56/IMSS.pdf'),
(296, 56, 'CURP', '', 'application/pdf', '242075', 'Archivos/56/CURP.pdf'),
(297, 56, 'RFC', '', 'application/pdf', '170907', 'Archivos/56/RFC.pdf'),
(298, 45, 'ACTA DE NACIMIENTO', '', 'application/pdf', '435233', 'Archivos/45/ACTA DE NACIMIENTO.pdf'),
(299, 45, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '310029', 'Archivos/45/CERTIFICADO DE ESTUDIOS.pdf'),
(300, 45, 'LICENCIA', '', 'application/pdf', '145605', 'Archivos/45/LICENCIA.pdf'),
(301, 8, 'PASAPORTE Y VISA', '', 'application/pdf', '222078', 'Archivos/8/PASAPORTE Y VISA.pdf'),
(302, 45, 'RESIDENCIA PERMANENTE', '', 'application/pdf', '222322', 'Archivos/45/RESIDENCIA PERMANENTE.pdf'),
(304, 46, 'INE', '', 'application/pdf', '158967', 'Archivos/46/INE.pdf'),
(305, 48, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '167527', 'Archivos/48/CERTIFICADO DE ESTUDIOS.pdf'),
(306, 48, 'INE', '', 'application/pdf', '246668', 'Archivos/48/INE.pdf'),
(307, 48, 'LICENCIA', '', 'application/pdf', '152514', 'Archivos/48/LICENCIA.pdf'),
(308, 48, 'PASAPORTE', '', 'application/pdf', '300759', 'Archivos/48/PASAPORTE.pdf'),
(309, 57, 'ACTA DE NACIMIENTO', '', 'application/pdf', '869028', 'Archivos/57/ACTA DE NACIMIENTO.pdf'),
(310, 57, 'COMPROBANTE DE DOMICILIO', '', 'application/pdf', '395741', 'Archivos/57/COMPROBANTE DE DOMICILIO.pdf'),
(311, 57, 'CERTIFICADO DE ESTUDIOS', '', 'application/pdf', '286768', 'Archivos/57/CERTIFICADO DE ESTUDIOS.pdf'),
(312, 57, 'INE', '', 'application/pdf', '354929', 'Archivos/57/INE.pdf'),
(313, 57, 'IMSS', '', 'application/pdf', '342659', 'Archivos/57/IMSS.pdf'),
(314, 57, 'CURP', '', 'application/pdf', '375454', 'Archivos/57/CURP.pdf'),
(315, 57, 'PASAPORTE', '', 'application/pdf', '139909', 'Archivos/57/PASAPORTE.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_empleado`
--

CREATE TABLE IF NOT EXISTS `hrm_empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `ape_p` varchar(30) NOT NULL,
  `ape_m` varchar(30) DEFAULT NULL,
  `fecha_nac` varchar(15) DEFAULT NULL,
  `curp` varchar(20) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `nss` varchar(12) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_empleado`
--

INSERT INTO `hrm_empleado` (`id_empleado`, `nombre`, `ape_p`, `ape_m`, `fecha_nac`, `curp`, `rfc`, `nss`, `celular`) VALUES
(8, 'AARON ALEJANDRO', 'MONTENEGRO', 'CANALES', '1992-11-11', 'MOCA921111HMCNNR00', 'MOCA9211115A7', '90129217908', '5546454105'),
(9, 'ANA CRISTINA', 'GONZALEZ', 'AGUADO', '1993-12-30', 'GOAA931230MDFNGN03', 'GOAA931230NY5', '18179349685', '5514925836'),
(10, 'ANTONIO ', 'FERNANDES', 'TEIXEIRA', '1976-11-26', 'FETA761126HNERXN03', 'FETA761126SK0', '03177633470', '5557527094'),
(11, 'ARIANA', 'HERNANDEZ', 'OLVERA', '1997-03-10', 'HEOA970128MTLRLR06', 'HEOA9701281C3', '37169756832', '7491076191'),
(12, 'ASTRID VERENICE', 'HERNANDEZ', 'GUERRERO', '1980-01-06', 'HEGA800106MDFRRS07', 'HEGA800106MN1', '32998061918', '5534702001'),
(14, 'DIEGO ARTURO', 'GALICIA', 'DORANTES', '1990-05-09', 'GADD900509HMCLRG00', 'GADD900509TZ3', '92119007455', '5587257350'),
(16, 'FRANCISCO JAVIER', 'PINAA', 'OLMEDO', '1963-09-13', 'PIOF630913HDFXRL07', 'PIOF630913E31', '42826335145', '5500000000'),
(19, 'GUILLERMINA', 'HERRERA', 'RAMIREZ', '1962-01-11', 'HERG620111MDFRML00', 'HERG620111UK3', '06796202031', '5500000000'),
(20, 'ISMAEL', 'TERAN ', 'NEPOMUCENO', '1970-06-17', 'TENI700617HMCRPS04', 'TENI700617PN7', '19867008252', '5518173464'),
(22, 'JAVIER', 'HERNANDEZ', 'CERVANTES', '1992-06-13', 'HECJ920613HMCRRV04', 'HECJ920613LHA', '03189216918', '5582359115'),
(24, 'JOSE ARMANDO', 'CARRILLO', 'RICOO', '1982-03-07', 'CARA820307HGTRCR02', 'CARA8203077Y4', '55169388791', '5544260251'),
(26, 'JENIFER ADRIANA', 'REYES', 'RAMIREZ', '1992-07-08', 'RERJ920708MMCYMN00', 'RERJ920708B33', '10159286698', '5518148504'),
(27, 'JUAN CARLOS', 'MATUS', 'GUERRERO', '1979-07-24', 'MAGJ790724HDFTRN07', 'MAGJ790724F97', '37017900889', '5539632552'),
(28, 'JOSUE', 'CARREÑO', 'CAMACHO', '1985-05-19', 'CACJ850519HDFRMS02', 'CACJ850519TF1', '92128500078', '5512246166'),
(30, 'KAREN BERENICE', 'FUENTES', 'ORTIZ', '1995-11-21', 'FUOK951121MMCNRR07', 'FUOK951121750', '92109533940', '5521839459'),
(56, 'JAZMIN', 'HERNANDEZ', 'FRANCISCO', '2001-12-17', 'HEFY011217MMCRRZA9', 'HEFY0112175T6', '03170130128', '5551841148'),
(57, 'YOLOTZY VIRIDIANA', 'CASTRO', 'MENDOZA', '1998-07-31', 'CAMY980731MMCSNL09', 'CAMY980731IS2', '12169862534', '5554318656'),
(33, 'MANUEL', 'ESTRADA', 'FLORES', '1982-06-09', 'EAFM820609HDFSLN08', 'EAFM8206096D0', '90058202681', '5500000000'),
(34, 'MARIEL', 'FERNANDEZ', 'MENDEZ', '1975-05-30', 'FEMM750530MVZRNR00', 'FEMM7505302Z5', '83967518503', '5514749955'),
(35, 'MARIA FERNANDA', 'ALARCON', 'CASTILLEJOS', '1994-10-31', 'AACF941031MDFLSR02', 'AACF941031GF7', '45139433838', '5568052401'),
(36, 'MIGUEL ANGEL', 'FLORES', 'FLORES', '1979-11-19', 'FOFM791119HGRLLG03', 'JACE970928RG2', '32998061918', '5500000000'),
(37, 'ALEJANDRA MILDRED', 'FUENTES', 'ORTIZ', '2001-03-01', 'FUOM000301MMCNRLA9', 'JACE970928RG2', '16169595991', '5527037878'),
(58, 'VIRGINIA', 'MATUS', 'PINEDA', '1979-01-18', 'MAPV790118MDFTNR07', 'MAPV790118L44', '39017902857', '5520853904'),
(59, 'MARTIN ALFONSO', 'GARCIA', 'LAZOO', '1964-09-02', 'GALM640902HDFRZR08', 'GALM640902954', '37906404134', '5518975484'),
(41, 'RICARDO', 'DELVILLAR', 'ALMEIDA', '1989-06-20', 'VIAR890614HDFLLC05', 'VIAR890614JS4', '92078949754', '5575192965'),
(42, 'ROSANGELA', 'BADILLO', 'MUNOZ', '1981-01-13', 'BAMR801206MDFDXS05', 'BAMR801206N69', '11058008282', '5585605460'),
(43, 'ROSANGELA', 'DELCARMEN', 'LOPEZDEDIAZ', '1995-06-16', 'LODR950616MNEPZS06', 'LODR95061643A', '03199558549', '5560269270'),
(44, 'YEIMI', 'RIVERA', 'GONZALEZ', '1997-02-17', 'RIGY970217MDFVNM02', 'HEGA800106MN1', '92159711511', '5564894612'),
(45, 'KARYS', 'MACHADO', 'MALAVE', '1982-06-25', 'JACE970928HMCSHD04', 'MAMK8206257F3', '02188287920', '5514123618'),
(46, 'LIZETTE AKETZALI', 'VEGAA', 'MORAA', '1997-07-07', 'VEML970707MMCGRZ00', 'JACE970928RG2', '03209751787', '5561510400'),
(48, 'VANIA PIETRA', 'SANTA', 'MEDINA', '1989-01-18', 'PIMV890118MDFTDN04', 'JACE970928RG2', '05158989607', '5518238357'),
(49, 'ALEJANDRO', 'ESCALONA', 'CASTANEDA', '1995-12-01', 'EACA951201HMCSSL06', 'EACA9512011B1', '02179537424', '5526579260'),
(50, 'AUDRA VANESSA', 'BLANCO', 'GALLARDO', '1977-05-25', 'BAGA770525MNELLD08', 'JACE970928RG2', '02187786617', '5550605792'),
(55, 'LILIANA', 'ACOSTA', 'PENALOZA', '1981-03-20', 'AOPL810320MMCCXL05', 'AOPL810320A54', '68978157839', '5516573270'),
(52, 'EDGAR ', 'JASSO', 'CHAPARRO ', '1997-09-28', 'JACE970928HMCSHD04', 'JACE970328RG2', '90008102023', '5544156213'),
(54, 'JONTHAN ALEJANDRO', 'GOMEZ ', 'GARCIA', '1982-12-03', 'GOGJ821203HDFMRN09', 'GOGJ821203IX7', '28988205010', '5574783203');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_horas`
--

CREATE TABLE IF NOT EXISTS `hrm_horas` (
  `id_hora` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `horas` varchar(2) NOT NULL,
  PRIMARY KEY (`id_hora`),
  KEY `fk_horas_empleado` (`id_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_objetivos`
--

CREATE TABLE IF NOT EXISTS `hrm_objetivos` (
  `id_objetivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_puesto` int(3) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `objetivo` varchar(50) NOT NULL,
  `tema` varchar(150) NOT NULL,
  `subtema` varchar(200) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `fecha_asignacion` varchar(20) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `realizado` varchar(20) NOT NULL,
  `comentarios` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_objetivo`),
  KEY `fk_objetivos_puesto` (`id_puesto`),
  KEY `fk_objetivos_empleado` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_puesto`
--

CREATE TABLE IF NOT EXISTS `hrm_puesto` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_area` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `sueldo` varchar(10) NOT NULL,
  `comentarios` varchar(200) NOT NULL,
  PRIMARY KEY (`id_puesto`),
  KEY `fk_puesto_area` (`id_area`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_puesto`
--

INSERT INTO `hrm_puesto` (`id_puesto`, `id_area`, `nombre`, `descripcion`, `sueldo`, `comentarios`) VALUES
(8, 1, 'Gerente Administrativo', 'Planear, organizar actividades de las áreas a cargo para generar mayor rentabilidad', '35000', 'undefined'),
(9, 5, 'Gerente de operaciones', 'Administrar flujo de insumos, sup0rvisando y controlando el área de almacén', '25000', 'undefined'),
(10, 3, 'Gerente de Marketing', 'Colaborar en la implementación de planes estratégicos y operativos del área de mercadotecni8a', '17000', 'undefined'),
(11, 3, 'Gerente de MKT', 'Colaborar en la implementación de los planes estratégicos y operativos del área de mercadotecnia', '17000', 'undefined'),
(12, 4, 'Gerente de ventas', 'Coordinar las actividades de las fuerza de ventas, planes de comercialización y mercado, a fin de lo', '2000', 'undefined'),
(13, 2, 'Asistente de dirección', 'Apoyar al área de dirección en las diversas actividades', '6000', 'undefined'),
(14, 1, 'Analista juridica', 'Apoyo en el área legal', '6000', 'undefined'),
(15, 1, 'Tecnologías de info', 'Coordinar las acciones para proveer solucionhes de tecnologías de información, a través de la planea', '10000', 'undefined'),
(16, 1, 'Soporte y desarrollo', 'Apoyar al área de sistemas en las diversas actividades', '6000', 'undefined'),
(17, 1, 'Logística y adquisiciones', 'Asegurar los bienes, servicios e inventario nbecesario para la operación del negocio', '10000', 'undefined'),
(18, 1, 'Equipos especiales', 'Mantener los equipos en estado óptimo para las cirugías, mantener la flotilla de automóviles en ópti', '10000', 'undefined'),
(19, 1, 'Asistente Administrativo', 'Realizar seguimiento de compras, servicios o materiales que requiera en el área correspondiente', '6000', 'undefined'),
(20, 1, 'Atracción y Talento', 'Atraer candidatos con talento capaces de desarrollar o adquirir aquellas competenbcias necesariasa p', '10500', 'undefined'),
(21, 1, 'Becaria RRHH', 'Apoyo al área de atracción y talento', '6000', 'undefined'),
(22, 1, 'Contador Senior', 'Suministrar información de la situación económica y financiera de la empresa a gerencia administrati', '20000', 'undefined'),
(23, 1, 'Crédito y cobranza', 'Coordinar el área de facturación, cuentas por cobrar y por paga ', '10000', 'undefined'),
(24, 1, 'Contador Junior', 'Llevar la contabilidad general, presentar declaraciones anuales, contabilidad electrónica, presentar', '12000', 'undefined'),
(25, 1, 'Gestor y cobranza', 'Gestionar procesos de facturación y cobros', '6000', 'undefined'),
(26, 5, 'Jefe de almacén', 'Llevar el control de entradas, salidas de consumible y equipos', '10000', 'undefined'),
(27, 5, 'Operador de vehículo', 'Cubrir la logística para realización de cirugias, apoyar al área de operaciones, recolección de insu', '6500', 'undefined'),
(28, 5, 'Mantenimiento de equipos', 'Realizar manbtenimiento de los equipos', '10000', 'undefined'),
(29, 5, 'Auxiliar de mtto', 'Auxiliar en la ejecución de mantenimienhto de equipos', '6000', 'undefined'),
(30, 5, 'Jefe de técnicos', 'Llevar la partee operativa de procedimientos quirúrgicos y garantizar el funcionamiento de los equip', '10000', 'undefined'),
(31, 5, 'Técnico en aplicaciones', 'Realizar procedimientos quirúrgicos, ayudar al médico con la tecnología que ofrecemos', '7500', 'undefined'),
(32, 3, 'Marketing Junior ', 'Examinar cualquier información para toma de decisiones, monitorear las campañas, segmentar bases de ', '10000', 'undefined'),
(33, 3, 'Community Manager', 'Encargado de campañas y redes sociales de Grupo Cryo y sus distribuidores', '11000', 'undefined'),
(34, 3, 'Coordinador Académico', 'Realizar seguimiento en las técnicas y apoyo a los médicos en la difusiónh cientifica', '10000', 'undefined'),
(35, 3, 'Disenador junior', 'Realizar diseños para las diversas campañas con médicos  asaí como con el personal', '6000', 'undefined'),
(36, 4, 'Logística internacional', 'Detectar áreas de oportunidad y evaluar el seguimienhto de visitas de cada ejecutivo, así como envia', '10000', 'undefined'),
(37, 4, 'Coord estratégico ventas', 'Crear estratégias de ventas, mediante el seguimiento del cumplimiento de objetivos de los ejecutivos', '10000', 'undefined'),
(38, 4, 'Coord de distribuidores', 'Desarrollo de distribuidores para generar ventas a través de ellos en sectores públicos y privados', '10000', 'undefined'),
(39, 4, 'Ejecutivo de ventas', 'Incrementar ventas, posicionamiento de marca, penetración de mercado', '25800', 'undefined'),
(40, 6, 'Jefe de escoltas', 'Asegurarse del traslado de personal de manera segura y eficaz', '10000', 'undefined'),
(41, 6, 'Escolta', 'Llevar al personal, documentación o efectivo al lugar indicado de forma eficaz', '10000', 'undefined');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_usuario`
--

CREATE TABLE IF NOT EXISTS `hrm_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `permiso` varchar(10) NOT NULL,
  `nomina` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_empleado` (`id_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_usuario`
--

INSERT INTO `hrm_usuario` (`id_usuario`, `id_empleado`, `clave`, `permiso`, `nomina`) VALUES
(1, 9, 'A.GONZALEZ', 'admin', 'undefined');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_vacaciones`
--

CREATE TABLE IF NOT EXISTS `hrm_vacaciones` (
  `id_vacaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `id_jefe` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `dia` varchar(15) NOT NULL,
  `color` varchar(10) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id_vacaciones`),
  KEY `fk_vacaciones_empleado` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_area`
--

CREATE TABLE IF NOT EXISTS `tkd_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_bitacora`
--

CREATE TABLE IF NOT EXISTS `tkd_bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `id_peticion` int(4) NOT NULL,
  `encargado` varchar(30) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `fk_bitacora_peticion` (`id_peticion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_empleado`
--

CREATE TABLE IF NOT EXISTS `tkd_empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_area` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_m` varchar(30) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_area_empleado` (`id_area`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_peticiones`
--

CREATE TABLE IF NOT EXISTS `tkd_peticiones` (
  `id_peticion` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(3) NOT NULL,
  `area` varchar(30) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_peticion`),
  KEY `fk_peticion_empleado` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_servicios`
--

CREATE TABLE IF NOT EXISTS `tkd_servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tkd_usuarios`
--

CREATE TABLE IF NOT EXISTS `tkd_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `permiso` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
