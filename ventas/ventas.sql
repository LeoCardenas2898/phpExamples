-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 12-11-2018 a las 01:38:58
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `ventas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `privilegio`
-- 

CREATE TABLE `privilegio` (
  `id` int(18) NOT NULL auto_increment,
  `label` varchar(50) default NULL,
  `path` varchar(100) default NULL,
  `image` varchar(100) default NULL,
  `grupo` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `XPKprivilegio` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Volcar la base de datos para la tabla `privilegio`
-- 

INSERT INTO `privilegio` VALUES (1, 'Registrar Usuario', '../managementUserModule/indexRegistrarUsuario.php', 'reguser.png', 'usuario');
INSERT INTO `privilegio` VALUES (2, 'Editar Usuario', '../managementUserModule/indexEditarUsuario.php', 'edituser.png', 'usuario');
INSERT INTO `privilegio` VALUES (12, 'listar solicitudes pendientes y por atender', '../incidenceModule/indexListIncidenciasPorAtender.php', 'incidenciasporatender.png', 'incidencia');
INSERT INTO `privilegio` VALUES (3, 'cambiar password', '../userModule/indexCambiarPassword.php', 'cambiarclave.png', 'usuario');
INSERT INTO `privilegio` VALUES (5, 'registrar solicitud de atención', '../incidenceModule/indexRegIncidence.php', 'regincidencia.png', 'incidencia');
INSERT INTO `privilegio` VALUES (6, 'Ver reporte de desempeño', '../incidenceModule/indexReporteDesempenio.php', 'verincidenciaspendientes.png', 'incidencia');
INSERT INTO `privilegio` VALUES (7, 'reporte  detallado de atencion por usuario', '../managementModule/indexReportUser.php	', 'reportuser.png', 'reportes');
INSERT INTO `privilegio` VALUES (8, 'reporte resumen para la gerencia', 'managementModule/indexReportGerencial.php	', 'reportatention.png', 'reportes');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `login` varchar(20) NOT NULL,
  `password` varchar(50) default NULL,
  `nombre` varchar(50) default NULL,
  `apaterno` varchar(50) default NULL,
  `amaterno` varchar(50) default NULL,
  `estado` char(1) default NULL,
  PRIMARY KEY  (`login`),
  UNIQUE KEY `XPKusuario` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES ('irubenv', 'faad95253aee7437871781018bdf3309', 'ignacio ruben', 'tacza', 'valverde', '1');
INSERT INTO `usuario` VALUES ('gato', '65cc2c8205a05d7379fa3a6386f710e1', 'loro', 'perro', 'rata', '1');
INSERT INTO `usuario` VALUES ('perro', '81dc9bdb52d04dc20036dbd8313ed055', 'jose', 'de la torre', 'ugarte', '1');
INSERT INTO `usuario` VALUES ('rata', '81dc9bdb52d04dc20036dbd8313ed055', 'olga', 'eugenica', 'usenok', '1');
INSERT INTO `usuario` VALUES ('burro', '81dc9bdb52d04dc20036dbd8313ed055', 'amarilis', 'torres', 'torrea', '1');
INSERT INTO `usuario` VALUES ('candy', '1e48c4420b7073bc11916c6c1de226bb', 'sofia', 'vergara', 'soliz', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario_privilegio`
-- 

CREATE TABLE `usuario_privilegio` (
  `login` varchar(20) NOT NULL,
  `id` char(18) NOT NULL,
  PRIMARY KEY  (`login`,`id`),
  UNIQUE KEY `XPKusuario_privilegio` (`login`,`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuario_privilegio`
-- 

INSERT INTO `usuario_privilegio` VALUES ('burro', '12');
INSERT INTO `usuario_privilegio` VALUES ('burro', '2');
INSERT INTO `usuario_privilegio` VALUES ('burro', '3');
INSERT INTO `usuario_privilegio` VALUES ('burro', '6');
INSERT INTO `usuario_privilegio` VALUES ('burro', '7');
INSERT INTO `usuario_privilegio` VALUES ('candy', '1');
INSERT INTO `usuario_privilegio` VALUES ('candy', '12');
INSERT INTO `usuario_privilegio` VALUES ('candy', '2');
INSERT INTO `usuario_privilegio` VALUES ('candy', '6');
INSERT INTO `usuario_privilegio` VALUES ('candy', '7');
INSERT INTO `usuario_privilegio` VALUES ('gato', '1');
INSERT INTO `usuario_privilegio` VALUES ('gato', '12');
INSERT INTO `usuario_privilegio` VALUES ('gato', '3');
INSERT INTO `usuario_privilegio` VALUES ('gato', '6');
INSERT INTO `usuario_privilegio` VALUES ('gato', '7');
INSERT INTO `usuario_privilegio` VALUES ('gato', '8');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '1');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '12');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '2');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '3');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '5');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '6');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '7');
INSERT INTO `usuario_privilegio` VALUES ('irubenv', '8');
INSERT INTO `usuario_privilegio` VALUES ('perro', '1');
INSERT INTO `usuario_privilegio` VALUES ('perro', '12');
INSERT INTO `usuario_privilegio` VALUES ('perro', '2');
INSERT INTO `usuario_privilegio` VALUES ('perro', '3');
INSERT INTO `usuario_privilegio` VALUES ('rata', '1');
INSERT INTO `usuario_privilegio` VALUES ('rata', '2');
INSERT INTO `usuario_privilegio` VALUES ('rata', '3');
INSERT INTO `usuario_privilegio` VALUES ('rata', '5');
