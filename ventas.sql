-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2018 a las 22:05:03
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `id` int(18) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `grupo` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`id`, `label`, `path`, `image`, `grupo`) VALUES
(1, 'Registrar Usuario', '../managementUserModule/indexRegistrarUsuario.php', 'reguser.png', 'usuario'),
(2, 'Editar Usuario', '../managementUserModule/indexEditarUsuario.php', 'edituser.png', 'usuario'),
(12, 'listar solicitudes pendientes y por atender', '../incidenceModule/indexListIncidenciasPorAtender.php', 'incidenciasporatender.png', 'incidencia'),
(3, 'cambiar password', '../userModule/indexCambiarPassword.php', 'cambiarclave.png', 'usuario'),
(5, 'registrar solicitud de atención', '../incidenceModule/indexRegIncidence.php', 'regincidencia.png', 'incidencia'),
(6, 'Ver reporte de desempeño', '../incidenceModule/indexReporteDesempenio.php', 'verincidenciaspendientes.png', 'incidencia'),
(7, 'reporte  detallado de atencion por usuario', '../managementModule/indexReportUser.php	', 'reportuser.png', 'reportes'),
(8, 'reporte resumen para la gerencia', 'managementModule/indexReportGerencial.php	', 'reportatention.png', 'reportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apaterno` varchar(50) DEFAULT NULL,
  `amaterno` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nombre`, `apaterno`, `amaterno`, `estado`) VALUES
('irubenv', 'faad95253aee7437871781018bdf3309', 'ignacio ruben', 'tacza', 'valverde', '1'),
('gato', '65cc2c8205a05d7379fa3a6386f710e1', 'loro', 'perro', 'rata', '1'),
('perro', '81dc9bdb52d04dc20036dbd8313ed055', 'jose', 'de la torre', 'ugarte', '1'),
('rata', '81dc9bdb52d04dc20036dbd8313ed055', 'olga', 'eugenica', 'usenok', '1'),
('burro', '81dc9bdb52d04dc20036dbd8313ed055', 'amarilis', 'torres', 'torrea', '1'),
('candy', '1e48c4420b7073bc11916c6c1de226bb', 'sofia', 'vergara', 'soliz', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_privilegio`
--

CREATE TABLE `usuario_privilegio` (
  `login` varchar(20) NOT NULL,
  `id` char(18) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_privilegio`
--

INSERT INTO `usuario_privilegio` (`login`, `id`) VALUES
('burro', '12'),
('burro', '2'),
('burro', '3'),
('burro', '6'),
('burro', '7'),
('candy', '1'),
('candy', '12'),
('candy', '2'),
('candy', '6'),
('candy', '7'),
('gato', '1'),
('gato', '12'),
('gato', '3'),
('gato', '6'),
('gato', '7'),
('gato', '8'),
('irubenv', '1'),
('irubenv', '12'),
('irubenv', '2'),
('irubenv', '3'),
('irubenv', '5'),
('irubenv', '6'),
('irubenv', '7'),
('irubenv', '8'),
('perro', '1'),
('perro', '12'),
('perro', '2'),
('perro', '3'),
('rata', '1'),
('rata', '2'),
('rata', '3'),
('rata', '5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `XPKprivilegio` (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `XPKusuario` (`login`);

--
-- Indices de la tabla `usuario_privilegio`
--
ALTER TABLE `usuario_privilegio`
  ADD PRIMARY KEY (`login`,`id`),
  ADD UNIQUE KEY `XPKusuario_privilegio` (`login`,`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
