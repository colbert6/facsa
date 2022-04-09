CREATE TABLE `colaborador` (
  `idcolaborador` int(11) NOT NULL,
  `perfil` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `contacto` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`idcolaborador`);

ALTER TABLE `colaborador`
  MODIFY `idcolaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


CREATE TABLE `seg_modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `nivel` enum('primer','segundo','tercer') DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `id_modulo_padre` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `seg_modulo`
  ADD PRIMARY KEY (`id_modulo`);

ALTER TABLE `seg_modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `seg_perfil`
--
ALTER TABLE `seg_perfil`
  MODIFY `id_perfil` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `seg_perfil` (
  `id_perfil` int(255) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `seg_perfil`
  ADD PRIMARY KEY (`id_perfil`);

INSERT INTO `seg_perfil` (`id_perfil`, `nombre`, `descripcion`) VALUES
(1, 'Master ', NULL),
(2, 'Administrador', NULL);