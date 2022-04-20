-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2022 a las 04:20:09
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela_profesional`
--

CREATE TABLE `escuela_profesional` (
  `id_escuela_profesional` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre_escuela` varchar(150) DEFAULT NULL,
  `detalle_escuela` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuela_profesional`
--

INSERT INTO `escuela_profesional` (`id_escuela_profesional`, `codigo`, `nombre_escuela`, `detalle_escuela`) VALUES
(1, 'OBST', 'Obstetricia', 'Obstetricia - UNSM'),
(2, 'ENF', 'Enfermeria', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_plataforma`
--

CREATE TABLE `login_plataforma` (
  `id_login_plataforma` int(11) NOT NULL,
  `fecha_creacion_datetime` datetime DEFAULT current_timestamp(),
  `fecha_creacion_date` date DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `codigo_unsm_usuario` varchar(20) NOT NULL,
  `nombres_usuario` varchar(250) DEFAULT NULL,
  `apellidos_usuario` varchar(250) DEFAULT NULL,
  `categoria_usuario` varchar(100) NOT NULL,
  `categoria_docente` varchar(100) NOT NULL,
  `estado_usuario` varchar(150) NOT NULL,
  `id_escuela_profesional` varchar(150) NOT NULL,
  `nombre_escuela` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login_plataforma`
--

INSERT INTO `login_plataforma` (`id_login_plataforma`, `fecha_creacion_datetime`, `fecha_creacion_date`, `id_usuario`, `codigo_unsm_usuario`, `nombres_usuario`, `apellidos_usuario`, `categoria_usuario`, `categoria_docente`, `estado_usuario`, `id_escuela_profesional`, `nombre_escuela`) VALUES
(1, '2022-04-12 22:09:18', '2022-04-12', 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(2, '2022-04-12 22:09:33', '2022-04-12', 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(3, '2022-04-12 22:32:23', '2022-04-12', 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(4, '2022-04-12 22:33:07', '2022-04-12', 1, '778', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(5, '2022-04-12 22:36:04', '2022-04-12', 1, '778', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(6, '2022-04-14 15:54:05', '2022-04-14', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '1', 'Obstetricia'),
(7, '2022-04-15 14:03:38', '2022-04-15', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '1', 'Obstetricia'),
(8, '2022-04-15 21:27:53', '2022-04-15', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '1', 'Obstetricia'),
(9, '2022-04-16 11:48:12', '2022-04-16', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '1', 'Obstetricia'),
(10, '2022-04-16 12:15:44', '2022-04-16', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '2', 'Obstetricia'),
(11, '2022-04-16 12:17:11', '2022-04-16', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '2', 'Obstetricia'),
(12, '2022-04-16 12:18:16', '2022-04-16', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '2', 'Enfermeria'),
(13, '2022-04-16 16:59:13', '2022-04-16', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '2', 'Enfermeria'),
(14, '2022-04-16 21:06:28', '2022-04-16', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '2', 'Enfermeria'),
(15, '2022-04-17 21:18:34', '2022-04-17', 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '2', 'Enfermeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_enlace_repositorio`
--

CREATE TABLE `log_enlace_repositorio` (
  `id_log_enlace_repositorio` int(11) NOT NULL,
  `fecha_creacion_datetime` datetime DEFAULT current_timestamp(),
  `fecha_creacion_date` date DEFAULT current_timestamp(),
  `id_repositorio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_unsm_usuario` varchar(20) NOT NULL,
  `nombres_usuario` varchar(250) DEFAULT NULL,
  `apellidos_usuario` varchar(250) DEFAULT NULL,
  `categoria_usuario` varchar(100) NOT NULL,
  `categoria_docente` varchar(100) NOT NULL,
  `estado_usuario` varchar(150) NOT NULL,
  `id_escuela_profesional` varchar(150) NOT NULL,
  `nombre_escuela` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log_enlace_repositorio`
--

INSERT INTO `log_enlace_repositorio` (`id_log_enlace_repositorio`, `fecha_creacion_datetime`, `fecha_creacion_date`, `id_repositorio`, `id_usuario`, `codigo_unsm_usuario`, `nombres_usuario`, `apellidos_usuario`, `categoria_usuario`, `categoria_docente`, `estado_usuario`, `id_escuela_profesional`, `nombre_escuela`) VALUES
(1, '2022-04-11 22:13:00', '2022-04-11', 1, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(2, '2022-04-11 22:19:03', '2022-04-11', 1, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(3, '2022-04-11 22:19:28', '2022-04-11', 1, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(4, '2022-04-11 22:19:38', '2022-04-11', 1, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(5, '2022-04-11 22:20:02', '2022-04-11', 2, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(6, '2022-04-11 22:28:25', '2022-04-11', 2, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(7, '2022-04-11 22:28:30', '2022-04-11', 2, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(8, '2022-04-11 22:28:33', '2022-04-11', 1, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(9, '2022-04-11 22:29:16', '2022-04-11', 2, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(10, '2022-04-11 22:32:15', '2022-04-11', 1, 1, '', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(11, '2022-04-12 22:33:21', '2022-04-12', 1, 1, '778', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(12, '2022-04-12 22:39:12', '2022-04-12', 1, 1, '778', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(13, '2022-04-12 22:41:09', '2022-04-12', 3, 1, '778', 'Diego', 'Contreras', 'Administrativo', 'Otros', 'Vigente', '1', 'Obstetricia'),
(14, '2022-04-15 15:11:34', '2022-04-15', 1, 1, '778', 'Diego', 'Contreras', 'Docente', 'Otros', 'Vigente', '1', 'Obstetricia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_repositorio`
--

CREATE TABLE `menu_repositorio` (
  `id_repositorio` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_repositorio`
--

INSERT INTO `menu_repositorio` (`id_repositorio`, `id_perfil`, `priority`) VALUES
(1, 1, 1),
(2, 1, NULL),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositorio`
--

CREATE TABLE `repositorio` (
  `id_repositorio` int(11) NOT NULL,
  `codigo_repositorio` varchar(20) DEFAULT NULL,
  `nombre_repositorio` varchar(250) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `enlace` varchar(250) DEFAULT NULL,
  `imagen_repositorio` varchar(250) NOT NULL,
  `estado` enum('Activo','Inactivo','Otro') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repositorio`
--

INSERT INTO `repositorio` (`id_repositorio`, `codigo_repositorio`, `nombre_repositorio`, `descripcion`, `enlace`, `imagen_repositorio`, `estado`) VALUES
(1, 'RENATI', 'RENATI', 'Renati es un repositorio', 'https://renati.sunedu.gob.pe/', '', 'Activo'),
(2, 'SCIELO', 'SCIELO', 'Scielo es EEUU repositorios. AS dsadadasda asdasd ada', 'https://scielo.org/es/', 'logo-scielo-portal-no-label.svg', 'Activo'),
(3, 'UNSM', 'Tesis UNSM', 'LAS Tesis de UNSM', 'http://repositorio.unsm.edu.pe/', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seg_menus`
--

CREATE TABLE `seg_menus` (
  `id_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seg_menus`
--

INSERT INTO `seg_menus` (`id_modulo`, `id_perfil`, `priority`) VALUES
(2, 1, 2),
(3, 1, 5),
(4, 1, 3),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seg_modulo`
--

CREATE TABLE `seg_modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `nivel` enum('primer','segundo','tercer') DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `id_modulo_padre` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seg_modulo`
--

INSERT INTO `seg_modulo` (`id_modulo`, `nombre`, `url`, `nivel`, `icono`, `id_modulo_padre`, `orden`, `descripcion`) VALUES
(1, 'Inicio', 'principal', 'primer', 'fa-home', NULL, 1, NULL),
(2, 'Reportes', '#', 'primer', 'fa-table', NULL, 2, NULL),
(3, 'Ingresos', 'reportes/reporte_lista_ingresantes', 'segundo', 'fa-home', 2, 1, NULL),
(4, 'Total usuario ingresos', 'reportes/reporte_total_usuarios_ingresantes', 'segundo', NULL, 2, 2, NULL),
(5, 'Lista de usuarios con su estado', 'reportes/reporte_lista_usuarios_estado', 'segundo', 'fa-pencil', 2, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seg_perfil`
--

CREATE TABLE `seg_perfil` (
  `id_perfil` int(255) NOT NULL,
  `nombre_perfil` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seg_perfil`
--

INSERT INTO `seg_perfil` (`id_perfil`, `nombre_perfil`, `descripcion`) VALUES
(1, 'Master ', NULL),
(2, 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres_usuario` varchar(250) DEFAULT NULL,
  `apellidos_usuario` varchar(250) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `codigo_unsm` varchar(20) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `numero_celular` varchar(20) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','No especificado') DEFAULT 'No especificado',
  `estado_usuario` enum('Vigente','Retirado','Egresado') DEFAULT 'Vigente',
  `categoria_usuario` enum('Alumno','Docente','Administrativo','Otros') DEFAULT 'Otros',
  `categoria_docente` enum('Principal','Asociado','Contratado','Otros') DEFAULT NULL,
  `usuario` varchar(150) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `id_perfil` int(11) DEFAULT NULL,
  `id_escuela_profesional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres_usuario`, `apellidos_usuario`, `dni`, `codigo_unsm`, `fecha_nacimiento`, `correo`, `numero_celular`, `foto`, `sexo`, `estado_usuario`, `categoria_usuario`, `categoria_docente`, `usuario`, `clave`, `fecha_creacion`, `id_perfil`, `id_escuela_profesional`) VALUES
(1, 'Diego', 'Contreras', '12345678', '778', '1994-01-01', 'diegocontrerasperu@gmail.com', '973949944', NULL, 'Masculino', 'Vigente', 'Docente', 'Otros', 'admin', 'DiegoC', '2022-04-10 23:37:54', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escuela_profesional`
--
ALTER TABLE `escuela_profesional`
  ADD PRIMARY KEY (`id_escuela_profesional`);

--
-- Indices de la tabla `login_plataforma`
--
ALTER TABLE `login_plataforma`
  ADD PRIMARY KEY (`id_login_plataforma`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `log_enlace_repositorio`
--
ALTER TABLE `log_enlace_repositorio`
  ADD PRIMARY KEY (`id_log_enlace_repositorio`),
  ADD KEY `id_repositorio` (`id_repositorio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `menu_repositorio`
--
ALTER TABLE `menu_repositorio`
  ADD PRIMARY KEY (`id_repositorio`,`id_perfil`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `repositorio`
--
ALTER TABLE `repositorio`
  ADD PRIMARY KEY (`id_repositorio`);

--
-- Indices de la tabla `seg_menus`
--
ALTER TABLE `seg_menus`
  ADD PRIMARY KEY (`id_modulo`,`id_perfil`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `seg_modulo`
--
ALTER TABLE `seg_modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `seg_perfil`
--
ALTER TABLE `seg_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_escuela_profesional` (`id_escuela_profesional`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escuela_profesional`
--
ALTER TABLE `escuela_profesional`
  MODIFY `id_escuela_profesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login_plataforma`
--
ALTER TABLE `login_plataforma`
  MODIFY `id_login_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `log_enlace_repositorio`
--
ALTER TABLE `log_enlace_repositorio`
  MODIFY `id_log_enlace_repositorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `repositorio`
--
ALTER TABLE `repositorio`
  MODIFY `id_repositorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seg_modulo`
--
ALTER TABLE `seg_modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `seg_perfil`
--
ALTER TABLE `seg_perfil`
  MODIFY `id_perfil` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login_plataforma`
--
ALTER TABLE `login_plataforma`
  ADD CONSTRAINT `login_plataforma_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `log_enlace_repositorio`
--
ALTER TABLE `log_enlace_repositorio`
  ADD CONSTRAINT `log_enlace_repositorio_ibfk_1` FOREIGN KEY (`id_repositorio`) REFERENCES `repositorio` (`id_repositorio`),
  ADD CONSTRAINT `log_enlace_repositorio_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `menu_repositorio`
--
ALTER TABLE `menu_repositorio`
  ADD CONSTRAINT `menu_repositorio_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `seg_perfil` (`id_perfil`),
  ADD CONSTRAINT `menu_repositorio_ibfk_2` FOREIGN KEY (`id_repositorio`) REFERENCES `repositorio` (`id_repositorio`);

--
-- Filtros para la tabla `seg_menus`
--
ALTER TABLE `seg_menus`
  ADD CONSTRAINT `seg_menus_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `seg_modulo` (`id_modulo`),
  ADD CONSTRAINT `seg_menus_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `seg_perfil` (`id_perfil`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_escuela_profesional`) REFERENCES `escuela_profesional` (`id_escuela_profesional`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `seg_perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
