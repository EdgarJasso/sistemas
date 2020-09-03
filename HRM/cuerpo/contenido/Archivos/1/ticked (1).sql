
CREATE TABLE `tkd_area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `tkd_area` (`id_area`, `nombre`) VALUES
(1, 'Administracion'),
(2, 'Marketing'),
(3, 'Contabilidad'),
(4, 'Direccion'),
(6, 'Pruebas'),
(7, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
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
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `tkd_empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_area` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_m` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `tkd_empleado` (`id_empleado`, `id_area`, `nombre`, `apellido_p`, `apellido_m`) VALUES
(9, 1, 'Edgar', 'Jasso', 'Chaparro'),
(10, 2, 'Dulce María', 'Becerril', 'Arana'),
(11, 3, 'Adriana', 'Ramirez', 'Reies'),
(12, 1, 'Josue ', 'Carreno', 'Camacho'),
(14, 7, 'Astrid', 'Hernandez', 'noseq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
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
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `tkd_servicios` (
  `id_servicio` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `tkd_servicios` (`id_servicio`, `descripcion`) VALUES
(1, 'Revision de Laptop'),
(2, 'Actualizacion Programa'),
(3, 'Revision de Correo'),
(4, 'Revision de Celular'),
(5, 'Revision de Outlook');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `tkd_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `permiso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `tkd_usuarios` (`id_usuario`, `nombre`, `pass`, `permiso`) VALUES
(1, 'admin', '1001', 'root'),
(2, 'Dulce', 'SuperRoot1', 'root'),
(4, 'SSSC', 'SuperRoot', 'root'),
(5, 'Prueba', '1234567', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `tkd_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `tkd_bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_bitacora_peticion` (`id_peticion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `tkd_empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fk_area_empleado` (`id_area`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `tkd_peticiones`
  ADD PRIMARY KEY (`id_peticion`),
  ADD KEY `fk_peticion_empleado` (`id_empleado`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `tkd_servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `tkd_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `tkd_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `tkd_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `tkd_empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `tkd_peticiones`
  MODIFY `id_peticion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `tkd_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `tkd_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `tkd_bitacora`
  ADD CONSTRAINT `fk_bitacora_peticion` FOREIGN KEY (`id_peticion`) REFERENCES `tkd_peticiones` (`id_peticion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `tkd_empleado`
  ADD CONSTRAINT `fk_area_empleado` FOREIGN KEY (`id_area`) REFERENCES `tkd_area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `tkd_peticiones`
  ADD CONSTRAINT `fk_peticion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `tkd_empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
