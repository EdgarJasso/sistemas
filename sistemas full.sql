-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 02:49:42
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

--
-- Volcado de datos para la tabla `hrm_antiguedad`
--

INSERT INTO `hrm_antiguedad` (`id_antiguedad`, `id_empleado`, `id_puesto`, `activo`, `fecha_inicio`, `fecha_fin`, `aumento`, `comentarios`) VALUES
(8, 9, 8, 'ALTA', '2019-03-01', '', '', ''),
(9, 43, 13, 'alta', '2019-03-01', '', 'denegado', ''),
(10, 34, 8, 'alta', '2018-01-01', '', 'denegado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hrm_area`
--

CREATE TABLE `hrm_area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `hrm_documentos` (
  `id_documento` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tamano` varchar(20) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(36, 51, 'Acta de Nacimiento ', '', 'application/pdf', '1336715', 'Archivos/51/AN.pdf'),
(37, 51, 'Comprobante de domicilio', '', 'application/pdf', '815181', 'Archivos/51/CD.pdf'),
(38, 51, 'CURP', '', 'application/pdf', '961708', 'Archivos/51/CURP.pdf'),
(39, 51, 'Numero de Seguro Social', '', 'application/pdf', '1000072', 'Archivos/51/NSS.pdf'),
(40, 51, 'RFC', '', 'application/pdf', '880213', 'Archivos/51/RFC.pdf'),
(41, 13, 'Acta de Nacimiento ', '', 'application/pdf', '3935122', 'Archivos/13/AN.pdf'),
(42, 13, 'INE', '', 'application/pdf', '621084', 'Archivos/13/INE.pdf'),
(43, 13, 'RFC', '', 'application/pdf', '1073821', 'Archivos/13/RFC.pdf'),
(44, 14, 'Acta de Nacimiento ', '', 'application/pdf', '1146811', 'Archivos/14/AN.pdf'),
(45, 14, 'CURP', '', 'application/pdf', '1014989', 'Archivos/14/CURP.pdf'),
(46, 14, 'INE', '', 'application/pdf', '811954', 'Archivos/14/INE.pdf'),
(47, 14, 'Numero de Seguro Social', '', 'application/pdf', '1057443', 'Archivos/14/NSS.pdf'),
(48, 52, 'Comprobante de domicilio', '', 'application/pdf', '858001', 'Archivos/52/CD.pdf'),
(49, 52, 'CURP', '', 'application/pdf', '1153083', 'Archivos/52/CURP.pdf'),
(50, 15, 'Acta de Nacimiento ', '', 'application/pdf', '1168800', 'Archivos/15/AN.pdf'),
(51, 15, 'CURP', '', 'application/pdf', '4317795', 'Archivos/15/CURP.pdf'),
(52, 15, 'INE', '', 'application/pdf', '606717', 'Archivos/15/INE.pdf'),
(53, 15, 'Numero de Seguro Social', '', 'application/pdf', '615870', 'Archivos/15/NSS.pdf'),
(54, 15, 'RFC', '', 'application/pdf', '985751', 'Archivos/15/RFC.pdf'),
(55, 17, 'Acta de Nacimiento ', '', 'application/pdf', '1813040', 'Archivos/17/AN.pdf'),
(56, 17, 'Comprobante de domicilio', '', 'application/pdf', '924250', 'Archivos/17/CD.pdf'),
(57, 17, 'CURP', '', 'application/pdf', '1018152', 'Archivos/17/CURP.pdf'),
(58, 17, 'INE', '', 'application/pdf', '955216', 'Archivos/17/INE.pdf'),
(59, 17, 'Numero de Seguro Social', '', 'application/pdf', '1634668', 'Archivos/17/NSS.pdf'),
(60, 16, 'Comprobante de domicilio', '', 'application/pdf', '898915', 'Archivos/16/CD.pdf'),
(61, 16, 'CURP', '', 'application/pdf', '905255', 'Archivos/16/CURP.pdf'),
(63, 16, 'INE', '', 'application/pdf', '654591', 'Archivos/16/INE.pdf'),
(64, 16, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '639761', 'Archivos/16/LC.pdf'),
(65, 16, 'Numero de Seguro Social', '', 'application/pdf', '902471', 'Archivos/16/NSS.pdf'),
(66, 16, 'Pasaporte', '', 'application/pdf', '676412', 'Archivos/16/PSPT.pdf'),
(67, 19, 'Acta de Nacimiento ', '', 'application/pdf', '1500255', 'Archivos/19/AN.pdf'),
(68, 19, 'Comprobante de domicilio', '', 'application/pdf', '1856715', 'Archivos/19/CD.pdf'),
(69, 19, 'INE', '', 'application/pdf', '745888', 'Archivos/19/INE.pdf'),
(70, 19, 'Numero de Seguro Social', '', 'application/pdf', '656703', 'Archivos/19/NSS.pdf'),
(71, 18, 'Numero de Seguro Social', '', 'application/pdf', '656703', 'Archivos/18/NSS.pdf'),
(72, 18, 'Acta de Nacimiento ', '', 'application/pdf', '1750530', 'Archivos/18/AN.pdf'),
(73, 18, 'Comprobante de domicilio', '', 'application/pdf', '921600', 'Archivos/18/CD.pdf'),
(74, 18, 'CURP', '', 'application/pdf', '1286884', 'Archivos/18/CURP.pdf'),
(75, 18, 'INE', '', 'application/pdf', '631645', 'Archivos/18/INE.pdf'),
(76, 18, 'Numero de Seguro Social', '', 'application/pdf', '1796640', 'Archivos/18/NSS.pdf'),
(77, 20, 'Acta de Nacimiento ', '', 'application/pdf', '1342977', 'Archivos/20/AN.pdf'),
(78, 20, 'Comprobante de domicilio', '', 'application/pdf', '1235274', 'Archivos/20/CD.pdf'),
(79, 20, 'CURP', '', 'application/pdf', '836647', 'Archivos/20/CURP.pdf'),
(80, 20, 'INE', '', 'application/pdf', '807019', 'Archivos/20/INE.pdf'),
(81, 20, 'LICENCIA DE CONDUCIR', '', 'application/pdf', '557281', 'Archivos/20/LC.pdf'),
(83, 53, 'Comprobante de domicilio', '', 'application/pdf', '1153546', 'Archivos/53/CD.pdf'),
(84, 53, 'CURP', '', 'application/pdf', '962519', 'Archivos/53/CURP.pdf'),
(85, 53, 'Numero de Seguro Social', '', 'application/pdf', '1159846', 'Archivos/53/NSS.pdf'),
(86, 22, 'Acta de Nacimiento ', '', 'application/pdf', '1333739', 'Archivos/22/AN.pdf'),
(89, 22, 'Numero de Seguro Social', '', 'application/pdf', '1452132', 'Archivos/22/NSS.pdf'),
(90, 22, 'CURP', '', 'application/pdf', '1011873', 'Archivos/22/CURP.pdf'),
(91, 22, 'Comprobante de domicilio', '', 'application/pdf', '856863', 'Archivos/22/CD.pdf'),
(92, 23, 'Acta de Nacimiento ', '', 'application/pdf', '1626330', 'Archivos/23/AN.pdf'),
(93, 23, 'Comprobante de domicilio', '', 'application/pdf', '839258', 'Archivos/23/CD.pdf'),
(94, 23, 'CURP', '', 'application/pdf', '1143912', 'Archivos/23/CURP.pdf'),
(95, 23, 'RFC', '', 'application/pdf', '833279', 'Archivos/23/RFC.pdf'),
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
(108, 25, 'Acta de Nacimiento ', '', 'application/pdf', '1402727', 'Archivos/25/AN.pdf'),
(109, 25, 'CURP', '', 'application/pdf', '1250882', 'Archivos/25/CURP.pdf'),
(110, 25, 'Numero de Seguro Social', '', 'application/pdf', '849589', 'Archivos/25/NSS.pdf'),
(111, 25, 'RFC', '', 'application/pdf', '1294961', 'Archivos/25/RFC.pdf'),
(112, 28, 'Acta de Nacimiento ', '', 'application/pdf', '1608968', 'Archivos/28/AN.pdf'),
(113, 28, 'Comprobante de domicilio', '', 'application/pdf', '1070710', 'Archivos/28/CD.pdf'),
(114, 28, 'CURP', '', 'application/pdf', '1113941', 'Archivos/28/CURP.pdf'),
(115, 28, 'Numero de Seguro Social', '', 'application/pdf', '966945', 'Archivos/28/NSS.pdf'),
(116, 28, 'RFC', '', 'application/pdf', '604258', 'Archivos/28/RFC.pdf'),
(117, 27, 'Acta de Nacimiento ', '', 'application/pdf', '1163778', 'Archivos/27/AN.pdf'),
(118, 27, 'CURP', '', 'application/pdf', '858313', 'Archivos/27/CURP.pdf'),
(119, 27, '', '', 'application/pdf', '658768', 'Archivos/27/RFC.pdf'),
(120, 29, 'Acta de Nacimiento ', '', 'application/pdf', '1500453', 'Archivos/29/AN.pdf'),
(121, 29, 'Comprobante de domicilio', '', 'application/pdf', '1140172', 'Archivos/29/CD.pdf'),
(122, 29, 'CURP', '', 'application/pdf', '539168', 'Archivos/29/CURP.pdf'),
(123, 29, 'Numero de Seguro Social', '', 'application/pdf', '539168', 'Archivos/29/NSS.pdf'),
(124, 29, 'RFC', '', 'application/pdf', '539168', 'Archivos/29/RFC.pdf'),
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
(136, 46, 'Comprobante de domicilio', '', 'application/pdf', '1673781', 'Archivos/46/CD.pdf'),
(137, 46, 'CURP', '', 'application/pdf', '1074189', 'Archivos/46/CURP.pdf'),
(138, 46, 'Numero de Seguro Social', '', 'application/pdf', '1074189', 'Archivos/46/NSS.pdf'),
(139, 32, 'Acta de Nacimiento ', '', 'application/pdf', '1348380', 'Archivos/32/AN.pdf'),
(140, 32, 'Comprobante de domicilio', '', 'application/pdf', '769254', 'Archivos/32/CD.pdf'),
(141, 32, 'CURP', '', 'application/pdf', '748236', 'Archivos/32/CURP.pdf'),
(142, 32, 'RFC', '', 'application/pdf', '748236', 'Archivos/32/RFC.pdf'),
(143, 35, 'Acta de Nacimiento ', '', 'application/pdf', '1491691', 'Archivos/35/AN.pdf'),
(144, 35, 'Comprobante de domicilio', '', 'application/pdf', '928733', 'Archivos/35/CD.pdf'),
(145, 35, 'CURP', '', 'application/pdf', '1214118', 'Archivos/35/CURP.pdf'),
(146, 35, 'Numero de Seguro Social', '', 'application/pdf', '695550', 'Archivos/35/NSS.pdf'),
(147, 47, 'Acta de Nacimiento ', '', 'application/pdf', '1724989', 'Archivos/47/AN.pdf'),
(148, 47, 'CURP', '', 'application/pdf', '359234', 'Archivos/47/CURP.pdf'),
(149, 47, 'INE', '', 'application/pdf', '1676234', 'Archivos/47/INE.pdf'),
(150, 34, 'Acta de Nacimiento ', '', 'application/pdf', '2403538', 'Archivos/34/AN.pdf'),
(151, 34, 'Comprobante de domicilio', '', 'application/pdf', '920870', 'Archivos/34/CD.pdf'),
(152, 34, 'CURP', '', 'application/pdf', '1003277', 'Archivos/34/CURP.pdf'),
(153, 36, 'Acta de Nacimiento ', '', 'application/pdf', '1330395', 'Archivos/36/AN.pdf'),
(154, 36, 'INE', '', 'application/pdf', '1224900', 'Archivos/36/INE.pdf'),
(155, 37, 'Acta de Nacimiento ', '', 'application/pdf', '1289929', 'Archivos/37/AN.pdf'),
(156, 37, 'Comprobante de domicilio', '', 'application/pdf', '1111496', 'Archivos/37/CD.pdf'),
(157, 37, 'CURP', '', 'application/pdf', '1183183', 'Archivos/37/CURP.pdf'),
(158, 38, 'Comprobante de domicilio', '', 'application/pdf', '1283703', 'Archivos/38/CD.pdf'),
(159, 38, 'CURP', '', 'application/pdf', '1058779', 'Archivos/38/CURP.pdf'),
(160, 38, 'Numero de Seguro Social', '', 'application/pdf', '1203893', 'Archivos/38/NSS.pdf'),
(161, 39, 'Comprobante de domicilio', '', 'application/pdf', '1184693', 'Archivos/39/CD.pdf'),
(162, 39, 'CURP', '', 'application/pdf', '1108013', 'Archivos/39/CURP.pdf'),
(163, 39, 'RFC', '', 'application/pdf', '669149', 'Archivos/39/RFC.pdf'),
(165, 40, 'Acta de Nacimiento ', '', 'application/pdf', '1942131', 'Archivos/40/AN.pdf'),
(166, 40, 'Comprobante de domicilio', '', 'application/pdf', '1012264', 'Archivos/40/CD.pdf'),
(167, 40, 'CURP', '', 'application/pdf', '702065', 'Archivos/40/CURP.pdf'),
(168, 40, 'RFC', '', 'application/pdf', '505524', 'Archivos/40/RFC.pdf'),
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
(189, 44, 'CURP', '', 'application/pdf', '1021385', 'Archivos/44/CURP.pdf');

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

--
-- Volcado de datos para la tabla `hrm_empleado`
--

INSERT INTO `hrm_empleado` (`id_empleado`, `nombre`, `ape_p`, `ape_m`, `fecha_nac`, `curp`, `rfc`, `nss`, `celular`) VALUES
(8, 'AARON ALEJANDRO', 'MONTENEGRO', 'CANALES', '1992-11-11', 'MOCA921111HMCNNR00', 'MOCA9211115A7', '90129217908', '5546454105'),
(9, 'ANA CRISTINA', 'GONZALEZ', 'AGUADO', '1993-12-30', 'GOAA931230MDFNGN03', 'GOAA931230NY5', '18179349685', '5514925836'),
(10, 'ANTONIO ', 'FERNANDES', 'TEIXEIRA', '1976-11-26', 'FETA761126HNERXN03', 'FETA761126SK0', '03177633470', '5557527094'),
(11, 'ARIANA', 'HERNANDEZ', 'OLVERA', '1997-03-10', 'HEOA970128MTLRLR06', 'HEOA9701281C3', '37169756832', '7491076191'),
(12, 'ASTRID VERENICE', 'HERNANDEZ', 'GUERRERO', '1980-01-06', 'HEGA800106MDFRRS07', 'HEGA800106MN1', '32998061918', '5534702001'),
(13, 'DANAE', 'ALVAREZ', 'JIMENEZ', '1981-05-11', 'AAJD810511HDFLMN03', 'AAJD810511953', '90008102023', '5560783346'),
(14, 'DIEGO ARTURO', 'GALICIA', 'DORANTES', '1990-05-09', 'GADD900509HMCLRG00', 'GADD900509TZ3', '92119007455', '5587257350'),
(15, 'ERICK', 'ZAMORA', 'HERNANDEZ', '1995-06-05', 'ZAHE950605HHGMRR01', 'JACE970928RG0', '16169595991', '7713303311'),
(16, 'FRANSISCO JAVIER', 'PINAA', 'OLMEDO', '1963-09-13', 'PIOF630913HDFXRL07', 'PIOF630913E31', '42826335145', '5500000000'),
(17, 'FERNANDO RAUL', 'PORTER', 'GUTIERREZ', '1971-06-21', 'POGF710621HDFRTR09', 'JACE970928RG1', '37947114288', '5540946422'),
(18, 'GABRIELA GUADALUPE', 'ALDAMA', 'VELAZCO', '1985-06-18', 'AAVG850618MDFLLBO4', 'AAVG8506188M8', '02188586719', '5500000000'),
(19, 'GUILLERMINA', 'HERRERA', 'RAMIREZ', '1962-01-11', 'HERG620111MDFRML00', 'HERG620111UK3', '06796202031', '5500000000'),
(20, 'ISMAEL', 'TERAN ', 'NEPOMUCENO', '1970-06-17', 'TENI700617HMCRPS04', 'TENI700617PN7', '19867008252', '5518173464'),
(22, 'JAVIER', 'HERNANDEZ', 'CERVANTES', '1992-06-13', 'HECJ920613HMCRRV04', 'HECJ920613LHA', '03189216918', '5582359115'),
(23, 'JAVIER JULIAN', 'GARCIA', 'RUIZZ', '1994-02-13', 'GARJ940213HDFRZV05', 'GARJ9402138R8', '96917376939', '5522654002'),
(24, 'JOSE ARMANDO', 'CARRILLO', 'RICOO', '1982-03-07', 'CARA820307HGTRCR02', 'CARA8203077Y4', '55169388791', '5544260251'),
(25, 'JOSE ERNESTO', 'DEJESUS', 'CAMACHO', '1995-01-31', 'JECE950125HDFSMR07', 'JECE950125MX1', '01109515005', '5527827962'),
(26, 'JENIFER ADRIANA', 'REYES', 'RAMIREZ', '1992-07-08', 'RERJ920708MMCYMN00', 'RERJ920708B33', '10159286698', '5518148504'),
(27, 'JUAN CARLOS', 'MATUS', 'GUERRERO', '1979-07-24', 'MAGJ790724HDFTRN07', 'MAGJ790724F97', '37017900889', '5539632552'),
(28, 'JOSUE', 'CARRENO', 'CAMACHO', '1985-05-19', 'CACJ850519HDFRMS02', 'CACJ850519TF1', '92128500078', '5512246166'),
(29, 'KAREN ARIEL', 'CASTILLO', 'ROSAS', '1993-08-05', 'CARK930805MDFSSR06', 'CARK930805PWA', '07119303415', '5549404821'),
(30, 'KAREN BERENICE', 'FUENTES', 'ORTIZ', '1995-11-21', 'FUOK951121MMCNRR07', 'FUOK951121750', '92109533940', '5521839459'),
(31, 'LILIANA ', 'ACOSTA ', 'PENALOZA', '1981-03-20', 'AOPL810320MMCCXL05', 'AOPL810320A54', '68978157839', '5500000000'),
(32, 'LUIS DAVID', 'MILLAN', 'LOPEZ', '1977-08-25', 'MILL770825HDFLPS02', 'MILL770825LS4', '90008102023', '5563578891'),
(33, 'MANUEL', 'ESTRADA', 'FLORES', '1982-06-09', 'EAFM820609HDFSLN08', 'EAFM8206096D0', '90058202681', '5500000000'),
(34, 'MARIEL', 'FERNANDEZ', 'MENDEZ', '1975-05-30', 'FEMM750530MVZRNR00', 'FEMM7505302Z5', '83967518503', '5514749955'),
(35, 'MARIA FERNANDA', 'ALARCON', 'CASTILLEJOS', '1994-10-31', 'AACF941031MDFLSR02', 'AACF941031GF7', '45139433838', '5568052401'),
(36, 'MIGUEL ANGEL', 'FLORES', 'FLORES', '1979-11-19', 'FOFM791119HGRLLG03', 'JACE970928RG2', '32998061918', '5500000000'),
(37, 'ALEJANDRA MILDRED', 'FUENTES', 'ORTIZ', '2001-03-01', 'FUOM000301MMCNRLA9', 'JACE970928RG2', '16169595991', '5527037878'),
(38, 'MONTSERRAT ', 'BRAVO', 'ARZATE', '1991-09-06', 'BAAM910906MDFRRN02', 'JACE970928RG2', '01139105702', '5554943193'),
(39, 'NADIA MONSERRAT', 'HERNANDEZ', 'MONTOYA', '1991-11-20', 'HEMN911120MDFRND09', 'HEMN9111203Z2', '32998061918', '5541457433'),
(40, 'PAULINA', 'OLVERA', 'RAMIREZ', '1984-05-16', 'OEAP840516MDFLLL00', 'OEAP840516PH6', '28058410995', '5518570293'),
(41, 'RICARDO', 'DELVILLAR', 'ALMEIDA', '1989-06-20', 'VIAR890614HDFLLC05', 'VIAR890614JS4', '92078949754', '5575192965'),
(42, 'ROSANGELA', 'BADILLO', 'MUNOZ', '1981-01-13', 'BAMR801206MDFDXS05', 'BAMR801206N69', '11058008282', '5585605460'),
(43, 'ROSANGELA', 'DELCARMEN', 'LOPEZDEDIAZ', '1995-06-16', 'LODR950616MNEPZS06', 'LODR95061643A', '03199558549', '5560269270'),
(44, 'YEIMI', 'RIVERA', 'GONZALEZ', '1997-02-17', 'RIGY970217MDFVNM02', 'HEGA800106MN1', '92159711511', '5564894612'),
(45, 'KARYS', 'MACHADO', 'MALAVE', '1982-06-25', 'JACE970928HMCSHD04', 'MAMK8206257F3', '02188287920', '5514123618'),
(46, 'LIZETTE AKETZALI', 'VEGAA', 'MORAA', '1997-07-07', 'VEML970707MMCGRZ00', 'JACE970928RG2', '03209751787', '5561510400'),
(47, 'MARIA FERNANDA', 'GONGORA', 'FLORES', '1996-11-13', 'GOFF961113MMCNLR03', 'JACE970928RG2', '32998061918', '5520816324'),
(48, 'VANIA PIETRA', 'SANTA', 'MEDINA', '1989-01-18', 'PIMV890118MDFTDN04', 'JACE970928RG2', '05158989607', '5518238357'),
(49, 'ALEJANDRO', 'ESCALONA', 'CASTANEDA', '1995-12-01', 'EACA951201HMCSSL06', 'EACA9512011B1', '02179537424', '5526579260'),
(50, 'AUDRA VANESSA', 'BLANCO', 'GALLARDO', '1977-05-25', 'BAGA770525MNELLD08', 'JACE970928RG2', '02187786617', '5550605792'),
(51, 'BRAYAN ADRIAN', 'NAVARRETE', 'MALTOS', '1995-02-05', 'NAMB950205HDFVLR06', 'NAMB950205IJ7', '16169523558', '5553128475'),
(52, 'EDGAR ', 'JASSO', 'CHAPARRO ', '1997-09-28', 'JACE970928HMCSHD04', 'JACE970328RG2', '90008102023', '5544156213'),
(53, 'IVONNE', 'RAMIREZ', 'GARDUNO ', '1992-07-31', 'RAGI920731MDFMRV07', 'RAGI920731H23', '92119238142', '5531343786'),
(54, 'JONTHAN ALEJANDRO', 'GOMEZ ', 'GARCIA', '1982-12-03', 'GOGJ821203HDFMRN09', 'GOGJ821203IX7', '28988205010', '5574783203');

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

CREATE TABLE `hrm_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `permiso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hrm_usuario`
--

INSERT INTO `hrm_usuario` (`id_usuario`, `id_empleado`, `clave`, `permiso`) VALUES
(8, 9, 'A.GONZALEZ         ', 'admin'),
(9, 43, 'R.DELCARMEN         ', 'objetivos'),
(10, 34, 'M.FERNANDEZ         ', 'admin');

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
  MODIFY `id_antiguedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `hrm_area`
--
ALTER TABLE `hrm_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hrm_asignacion`
--
ALTER TABLE `hrm_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hrm_direccion`
--
ALTER TABLE `hrm_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `hrm_documentos`
--
ALTER TABLE `hrm_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de la tabla `hrm_empleado`
--
ALTER TABLE `hrm_empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `hrm_usuario`
--
ALTER TABLE `hrm_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
