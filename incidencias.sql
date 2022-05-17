/*
 Navicat Premium Data Transfer

 Source Server         : SICO
 Source Server Type    : MySQL
 Source Server Version : 100240
 Source Host           : 51.222.229.130:3306
 Source Schema         : incidencias

 Target Server Type    : MySQL
 Target Server Version : 100240
 File Encoding         : 65001

 Date: 17/05/2022 14:06:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asignaciones
-- ----------------------------
DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE `asignaciones`  (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `as_fecha_asignacion` datetime(0) NULL DEFAULT NULL,
  `solicitudes_id_solicitud` int(11) NOT NULL,
  `tecnicos_id_tecnico` int(11) NOT NULL,
  PRIMARY KEY (`id_asignacion`) USING BTREE,
  INDEX `fk_asignaciones_solicitudes1_idx`(`solicitudes_id_solicitud`) USING BTREE,
  INDEX `fk_asignaciones_tecnicos1_idx`(`tecnicos_id_tecnico`) USING BTREE,
  CONSTRAINT `fk_asignaciones_solicitudes1` FOREIGN KEY (`solicitudes_id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignaciones_tecnicos1` FOREIGN KEY (`tecnicos_id_tecnico`) REFERENCES `tecnicos` (`id_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6939 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of asignaciones
-- ----------------------------
INSERT INTO `asignaciones` VALUES (6928, '2021-12-29 08:27:33', 7086, 9);
INSERT INTO `asignaciones` VALUES (6929, '2021-12-29 08:27:59', 7087, 9);
INSERT INTO `asignaciones` VALUES (6930, '2021-12-29 08:27:59', 7088, 9);
INSERT INTO `asignaciones` VALUES (6931, '2021-12-29 08:32:52', 7089, 9);
INSERT INTO `asignaciones` VALUES (6932, '2021-12-29 09:27:08', 7092, 9);
INSERT INTO `asignaciones` VALUES (6933, '2022-01-13 15:24:04', 7090, 15);
INSERT INTO `asignaciones` VALUES (6934, '2022-01-13 19:14:30', 7094, 15);
INSERT INTO `asignaciones` VALUES (6935, '2022-01-16 20:57:50', 7095, 15);
INSERT INTO `asignaciones` VALUES (6936, '2022-02-09 11:29:07', 7091, 9);
INSERT INTO `asignaciones` VALUES (6937, '2022-02-09 11:29:33', 7096, 9);
INSERT INTO `asignaciones` VALUES (6938, '2022-02-09 11:43:02', 7097, 9);

-- ----------------------------
-- Table structure for diagnosticos
-- ----------------------------
DROP TABLE IF EXISTS `diagnosticos`;
CREATE TABLE `diagnosticos`  (
  `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `dg_descripcion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dg_fecha_diagnostico` datetime(0) NULL DEFAULT NULL,
  `asignaciones_id_asignacion` int(11) NOT NULL,
  PRIMARY KEY (`id_diagnostico`) USING BTREE,
  INDEX `fk_diagnosticos_asignaciones1_idx`(`asignaciones_id_asignacion`) USING BTREE,
  CONSTRAINT `fk_diagnosticos_asignaciones1` FOREIGN KEY (`asignaciones_id_asignacion`) REFERENCES `asignaciones` (`id_asignacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of diagnosticos
-- ----------------------------
INSERT INTO `diagnosticos` VALUES (1, 'Prueba', '2021-12-29 08:28:37', 6928);
INSERT INTO `diagnosticos` VALUES (2, 'Prueba 2', '2021-12-29 08:31:02', 6929);
INSERT INTO `diagnosticos` VALUES (3, 'Prueba 3', '2021-12-29 08:33:07', 6930);
INSERT INTO `diagnosticos` VALUES (4, 'Prueba 4', '2021-12-29 08:34:21', 6931);
INSERT INTO `diagnosticos` VALUES (5, '12345', '2021-12-29 09:27:16', 6932);
INSERT INTO `diagnosticos` VALUES (6, '12345', '2021-12-29 09:28:37', 6931);
INSERT INTO `diagnosticos` VALUES (7, 'PRUEBA\n', '2022-01-16 20:58:33', 6935);
INSERT INTO `diagnosticos` VALUES (8, '1234', '2022-02-09 11:29:41', 6937);
INSERT INTO `diagnosticos` VALUES (9, '123', '2022-02-09 11:43:19', 6938);

-- ----------------------------
-- Table structure for modulos
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos`  (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `md_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `md_ruta` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `md_icono` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `md_hijode` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_modulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES (1, 'Solicitudes', NULL, 'fa fa-file-text-o', 0);
INSERT INTO `modulos` VALUES (2, 'Reportadas', 'reportadas/', 'fa fa-pencil-square-o', 1);
INSERT INTO `modulos` VALUES (3, 'Asignadas', 'asignadas/', 'fa fa-files-o', 1);
INSERT INTO `modulos` VALUES (4, 'Diagnosticadas', 'diagnosticadas/', 'fa fa-address-book-o', 1);
INSERT INTO `modulos` VALUES (5, 'Resueltas', 'resueltas/', 'fa fa-file-code-o', 1);
INSERT INTO `modulos` VALUES (6, 'Cerradas', 'cerradas/', 'fa fa-file-archive-o', 1);
INSERT INTO `modulos` VALUES (7, 'Reportes', NULL, 'fa fa-filter', 0);
INSERT INTO `modulos` VALUES (8, 'Reporte por área', 'busquedas/', 'fa fa-area-chart', 7);

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `modulos_id_modulo` int(11) NOT NULL,
  `tipos_usuario_id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`, `modulos_id_modulo`, `tipos_usuario_id_tipo_usuario`) USING BTREE,
  INDEX `fk_permisos_modulos1_idx`(`modulos_id_modulo`) USING BTREE,
  INDEX `fk_permisos_tipos_usuario1_idx`(`tipos_usuario_id_tipo_usuario`) USING BTREE,
  CONSTRAINT `fk_permisos_modulos1` FOREIGN KEY (`modulos_id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_permisos_tipos_usuario1` FOREIGN KEY (`tipos_usuario_id_tipo_usuario`) REFERENCES `tipos_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (1, 1, 1);
INSERT INTO `permisos` VALUES (2, 2, 1);
INSERT INTO `permisos` VALUES (3, 3, 1);
INSERT INTO `permisos` VALUES (4, 4, 1);
INSERT INTO `permisos` VALUES (5, 5, 1);
INSERT INTO `permisos` VALUES (6, 6, 1);
INSERT INTO `permisos` VALUES (7, 7, 1);
INSERT INTO `permisos` VALUES (8, 8, 1);
INSERT INTO `permisos` VALUES (9, 1, 2);
INSERT INTO `permisos` VALUES (10, 3, 2);
INSERT INTO `permisos` VALUES (11, 4, 2);
INSERT INTO `permisos` VALUES (12, 5, 2);
INSERT INTO `permisos` VALUES (13, 6, 2);
INSERT INTO `permisos` VALUES (14, 7, 2);
INSERT INTO `permisos` VALUES (15, 8, 2);

-- ----------------------------
-- Table structure for resolutivos
-- ----------------------------
DROP TABLE IF EXISTS `resolutivos`;
CREATE TABLE `resolutivos`  (
  `id_resolutivo` int(11) NOT NULL AUTO_INCREMENT,
  `rs_descripcion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rs_fecha_resolutivo` datetime(0) NULL DEFAULT NULL,
  `asignaciones_id_asignacion` int(11) NOT NULL,
  PRIMARY KEY (`id_resolutivo`) USING BTREE,
  INDEX `fk_resolutivos_asignaciones1_idx`(`asignaciones_id_asignacion`) USING BTREE,
  CONSTRAINT `fk_resolutivos_asignaciones1` FOREIGN KEY (`asignaciones_id_asignacion`) REFERENCES `asignaciones` (`id_asignacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of resolutivos
-- ----------------------------
INSERT INTO `resolutivos` VALUES (1, 'Prueba', '2021-12-29 08:30:18', 6928);
INSERT INTO `resolutivos` VALUES (2, 'Prueba 2', '2021-12-29 08:33:38', 6929);
INSERT INTO `resolutivos` VALUES (3, '12345', '2021-12-29 09:28:44', 6930);
INSERT INTO `resolutivos` VALUES (4, 'le arregle su pc', '2022-01-16 20:59:22', 6931);
INSERT INTO `resolutivos` VALUES (5, '1234', '2022-02-09 11:29:50', 6937);
INSERT INTO `resolutivos` VALUES (6, '1234', '2022-02-09 11:43:30', 6938);

-- ----------------------------
-- Table structure for solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE `solicitudes`  (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `sl_dni` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sl_nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sl_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sl_area` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sl_descripcion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sl_estado` int(11) NULL DEFAULT NULL,
  `sl_fecha_proceso` datetime(0) NULL DEFAULT NULL,
  `sl_observacion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipos_soporte_id_tipo_soporte` int(11) NOT NULL,
  `sl_rol` int(1) NULL DEFAULT NULL,
  `sl_celular` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sl_user` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`) USING BTREE,
  INDEX `fk_solicitudes_tipos_soporte1_idx`(`tipos_soporte_id_tipo_soporte`) USING BTREE,
  CONSTRAINT `fk_solicitudes_tipos_soporte1` FOREIGN KEY (`tipos_soporte_id_tipo_soporte`) REFERENCES `tipos_soporte` (`id_tipo_soporte`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7098 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of solicitudes
-- ----------------------------
INSERT INTO `solicitudes` VALUES (7086, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba', 5, '2021-12-29 08:08:40', 'Prueba', 18, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7087, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba 2', 5, '2021-12-29 08:09:15', '123456', 20, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7088, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba 3', 5, '2021-12-29 08:09:23', '123466', 21, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7089, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba 5', 4, '2021-12-29 08:09:30', NULL, 17, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7090, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba 6', 2, '2021-12-29 08:09:39', NULL, 24, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7091, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba 7', 2, '2021-12-29 08:09:46', NULL, 129, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7092, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba 8', 3, '2021-12-29 08:11:04', NULL, 142, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7093, '75092225', 'LEONARDO ALFREDO DE LA CRUZ VÁSQUEZ', 'leonardo.delacruz@ugel04.gob.pe', 'APP', 'asdasdasd', 1, '2022-01-13 15:42:14', NULL, 22, 1, '', 183);
INSERT INTO `solicitudes` VALUES (7094, '75092225', 'LEONARDO ALFREDO DE LA CRUZ VÁSQUEZ', 'leonardo.delacruz@ugel04.gob.pe', 'APP', '123123', 2, '2022-01-13 15:42:59', NULL, 18, 1, '123456789', 183);
INSERT INTO `solicitudes` VALUES (7095, '75092225', 'LEONARDO ALFREDO DE LA CRUZ VÁSQUEZ', 'leonardo.delacruz@ugel04.gob.pe', 'APP', 'POR FAVOR CAMBIEN MI CONTRASEÑA', 3, '2022-01-16 20:55:34', NULL, 26, 1, '123456789', 183);
INSERT INTO `solicitudes` VALUES (7096, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', 'Prueba ', 5, '2022-02-09 11:28:47', '1234', 18, 1, '123456789', 1);
INSERT INTO `solicitudes` VALUES (7097, '12345678', 'CARLOS MENDOZA SANTOS', 'CARLOS2@GMAIL.COM', 'DIR', '1234', 5, '2022-02-09 11:41:51', '1234', 18, 1, '123456789', 1);

-- ----------------------------
-- Table structure for tecnicos
-- ----------------------------
DROP TABLE IF EXISTS `tecnicos`;
CREATE TABLE `tecnicos`  (
  `id_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `tc_nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tc_apellidos` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tc_dni` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tc_estado` int(11) NULL DEFAULT NULL,
  `tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id_tecnico`) USING BTREE,
  INDEX `fk_tecnicos_tipos_usuario1`(`tipo_id`) USING BTREE,
  CONSTRAINT `fk_tecnicos_tipos_usuario1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tecnicos
-- ----------------------------
INSERT INTO `tecnicos` VALUES (9, 'Carlos Daniel', 'Mendoza Santos', '74326862', 1, 1);
INSERT INTO `tecnicos` VALUES (15, 'Leonardo', 'De La Cruz', '75092225', 1, 1);

-- ----------------------------
-- Table structure for tipos_soporte
-- ----------------------------
DROP TABLE IF EXISTS `tipos_soporte`;
CREATE TABLE `tipos_soporte`  (
  `id_tipo_soporte` int(11) NOT NULL AUTO_INCREMENT,
  `ts_nombre` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ts_padre` int(11) NULL DEFAULT NULL,
  `estado` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_soporte`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 153 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipos_soporte
-- ----------------------------
INSERT INTO `tipos_soporte` VALUES (17, 'Soporte remoto', 0, 1);
INSERT INTO `tipos_soporte` VALUES (18, 'Acceso a internet sin restricciones', 17, 1);
INSERT INTO `tipos_soporte` VALUES (19, 'Restricciones de acceso a redes sociales', 17, 1);
INSERT INTO `tipos_soporte` VALUES (20, 'Restricciones de acceso a youtube', 17, 1);
INSERT INTO `tipos_soporte` VALUES (21, 'Restricciones de acceso a redes sociales y youtube', 17, 1);
INSERT INTO `tipos_soporte` VALUES (22, 'Acceso al sistema NEXUS', 17, 1);
INSERT INTO `tipos_soporte` VALUES (23, 'Acceso al SUP', 17, 1);
INSERT INTO `tipos_soporte` VALUES (24, 'Creación de acceso de computadora asignada', 17, 1);
INSERT INTO `tipos_soporte` VALUES (25, 'Eliminación de accesos de computadora asignada', 17, 1);
INSERT INTO `tipos_soporte` VALUES (26, 'Cambio de contraseña de computadora asignada', 17, 1);
INSERT INTO `tipos_soporte` VALUES (27, 'Soporte remoto directores', 0, 0);
INSERT INTO `tipos_soporte` VALUES (28, 'Apoyo para el ingreso a la plataforma office 365 - directores', 0, 0);
INSERT INTO `tipos_soporte` VALUES (29, 'Actualización del contraseña de la plataforma office 365 - directores', 0, 0);
INSERT INTO `tipos_soporte` VALUES (30, 'Deshabilitación/activación de cuenta de correo electrónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (31, 'Apoyo para crear reuniones', 0, 0);
INSERT INTO `tipos_soporte` VALUES (33, 'Eliminación de cuenta de correo electrónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (34, 'Solicitud de reportes', 0, 0);
INSERT INTO `tipos_soporte` VALUES (126, 'Apoyo para el ingreso a la plataforma office 365 - docente', 126, 0);
INSERT INTO `tipos_soporte` VALUES (127, 'Actualización del contraseña de la plataforma office 365 - docente', 126, 0);
INSERT INTO `tipos_soporte` VALUES (128, 'Mantenimiento de cuenta de correo electrónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (129, 'Cambio de contraseñas de cuenta de correo electrónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (130, 'Creación de accesos del sistema de informacion', 17, 1);
INSERT INTO `tipos_soporte` VALUES (131, 'Eliminación de accesos  del sistema de informacion', 17, 1);
INSERT INTO `tipos_soporte` VALUES (132, 'Modificación de accesos del sistema de informacion', 17, 1);
INSERT INTO `tipos_soporte` VALUES (133, 'Cambio de contraseñas del sistema de informacion', 17, 1);
INSERT INTO `tipos_soporte` VALUES (134, 'Alta de equipo y anexo telefónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (135, 'Baja de equipo y anexo telefónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (136, 'Reemplazo de equipo o modificación del anexo telefónico', 17, 1);
INSERT INTO `tipos_soporte` VALUES (137, 'Creación de cuenta de red', 17, 1);
INSERT INTO `tipos_soporte` VALUES (138, 'Deshabilitación/activación de cuenta de red', 17, 1);
INSERT INTO `tipos_soporte` VALUES (139, 'Eliminación de cuenta de red', 17, 1);
INSERT INTO `tipos_soporte` VALUES (140, 'Cambio de contraseñas de cuenta de red', 17, 1);
INSERT INTO `tipos_soporte` VALUES (141, 'Soporte con la impresion de documentos', 17, 1);
INSERT INTO `tipos_soporte` VALUES (142, 'Soporte con la copia de documentos', 17, 1);
INSERT INTO `tipos_soporte` VALUES (143, 'Soporte con la digitalizacion de documentos', 17, 1);
INSERT INTO `tipos_soporte` VALUES (144, 'Asignación de equipos informaticos ', 17, 1);
INSERT INTO `tipos_soporte` VALUES (145, 'Reasignación de equipos informaticos ', 17, 1);
INSERT INTO `tipos_soporte` VALUES (146, 'Asignación e instalación de equipos informaticos', 17, 1);
INSERT INTO `tipos_soporte` VALUES (147, 'Mantenimiento preventivo de equipos informaticos  ', 17, 1);
INSERT INTO `tipos_soporte` VALUES (148, 'Mantenimiento correctivo de equipos informaticos ', 17, 1);
INSERT INTO `tipos_soporte` VALUES (149, 'Mantenimiento correctivo de software ', 17, 1);
INSERT INTO `tipos_soporte` VALUES (150, 'Mantenimiento evolutivo de software', 17, 1);
INSERT INTO `tipos_soporte` VALUES (151, 'Desarrollo de software', 17, 1);
INSERT INTO `tipos_soporte` VALUES (152, 'Soporte para conexiones remotas', 17, 1);

-- ----------------------------
-- Table structure for tipos_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tipos_usuario`;
CREATE TABLE `tipos_usuario`  (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tu_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipos_usuario
-- ----------------------------
INSERT INTO `tipos_usuario` VALUES (1, 'Responsable');
INSERT INTO `tipos_usuario` VALUES (2, 'Técnico');

-- ----------------------------
-- View structure for v_grafico2
-- ----------------------------
DROP VIEW IF EXISTS `v_grafico2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_grafico2` AS select `s`.`sl_fecha_proceso` AS `sl_fecha_proceso`,month(`s`.`sl_fecha_proceso`) AS `mes`,count(`s`.`sl_estado`) AS `monto`,`asg`.`as_fecha_asignacion` AS `as_fecha_asignacion`,`dag`.`dg_fecha_diagnostico` AS `dg_fecha_diagnostico`,timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) AS `tiempo`,case when timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) <= '24:00:00' then '1' else '0' end AS `Q_CUMPLE`,case when timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) >= '24:00:00' then '1' else '0' end AS `Q_NO_CUMPLE`,year(`asg`.`as_fecha_asignacion`) AS `anios` from ((`solicitudes` `s` join `asignaciones` `asg` on(`asg`.`solicitudes_id_solicitud` = `s`.`id_solicitud`)) join `diagnosticos` `dag` on(`dag`.`asignaciones_id_asignacion` = `asg`.`id_asignacion`)) where `s`.`sl_estado` = 5 group by month(`s`.`sl_fecha_proceso`) order by month(`s`.`sl_fecha_proceso`);

-- ----------------------------
-- View structure for v_reporte1
-- ----------------------------
DROP VIEW IF EXISTS `v_reporte1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_reporte1` AS select `asg`.`as_fecha_asignacion` AS `as_fecha_asignacion`,`dag`.`dg_fecha_diagnostico` AS `dg_fecha_diagnostico`,timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) AS `tiempo`,case when timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) <= '24:00:00' then '1' else '0' end AS `Q_CUMPLE`,case when timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) >= '24:00:00' then '1' else '0' end AS `Q_NO_CUMPLE`,year(`asg`.`as_fecha_asignacion`) AS `anios` from ((`solicitudes` `s` join `asignaciones` `asg` on(`asg`.`solicitudes_id_solicitud` = `s`.`id_solicitud`)) join `diagnosticos` `dag` on(`dag`.`asignaciones_id_asignacion` = `asg`.`id_asignacion`)) where `s`.`sl_estado` = 5;

-- ----------------------------
-- View structure for v_reporte2
-- ----------------------------
DROP VIEW IF EXISTS `v_reporte2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_reporte2` AS select `ts`.`ts_nombre` AS `nombre`,`asg`.`as_fecha_asignacion` AS `as_fecha_asignacion`,`dag`.`dg_fecha_diagnostico` AS `dg_fecha_diagnostico`,timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) AS `tiempo`,case when timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) <= '24:00:00' then '1' else '0' end AS `Q_CUMPLE`,case when timediff(`dag`.`dg_fecha_diagnostico`,`asg`.`as_fecha_asignacion`) >= '24:00:00' then '1' else '0' end AS `Q_NO_CUMPLE`,year(`asg`.`as_fecha_asignacion`) AS `anios` from (((`solicitudes` `s` left join `tipos_soporte` `ts` on(`ts`.`id_tipo_soporte` = `s`.`tipos_soporte_id_tipo_soporte`)) join `asignaciones` `asg` on(`asg`.`solicitudes_id_solicitud` = `s`.`id_solicitud`)) join `diagnosticos` `dag` on(`dag`.`asignaciones_id_asignacion` = `asg`.`id_asignacion`)) where `s`.`sl_estado` = 5;

SET FOREIGN_KEY_CHECKS = 1;
