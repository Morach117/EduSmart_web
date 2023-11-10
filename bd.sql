-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para edusmart_v2
CREATE DATABASE IF NOT EXISTS `edusmart_v2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `edusmart_v2`;

-- Volcando estructura para tabla edusmart_v2.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(50) NOT NULL DEFAULT '',
  `⁯id_institucion` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL DEFAULT '',
  `sexo` enum('F','M') DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`id_alumno`) USING BTREE,
  UNIQUE KEY `matricula` (`matricula`),
  KEY `FK_alumnos_institucion` (`⁯id_institucion`),
  KEY `matricula2` (`matricula`),
  CONSTRAINT `FK_alumnos_institucion` FOREIGN KEY (`⁯id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=613 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.alumnos: ~44 rows (aproximadamente)
INSERT INTO `alumnos` (`id_alumno`, `matricula`, `⁯id_institucion`, `nombre`, `app`, `apm`, `correo`, `contrasena`, `foto`, `telefono`, `sexo`, `fecha_nac`) VALUES
	(1, '092010192', 1, 'Jesus', 'Garcia', 'Caballero', 'nose@nose', '$2b$10$42Q6I3CUhMiH4QTiZyxRKOUGkwETcUurjz8t5NkpjbMQ1O6hlDQqa', 'Avatar2.jpg', '9191236916', 'M', '2023-08-28'),
	(2, '092010640', 1, 'Dilmar', 'González', 'Hernández', 'dilmar@gmail.com', '$2b$10$42Q6I3CUhMiH4QTiZyxRKOUGkwETcUurjz8t5NkpjbMQ1O6hlDQqa', 'Avatar2.jpg', '9622221558', 'M', '2023-08-30'),
	(3, '092010610', 1, 'Octavio', 'Solorzano', 'Roblero', 'octavio@gmail.com', '$2b$10$42Q6I3CUhMiH4QTiZyxRKOUGkwETcUurjz8t5NkpjbMQ1O6hlDQqa', 'Avatar2.jpg', '1234567890', 'M', '2023-08-30'),
	(212, '52933321', NULL, 'Juan', 'Lopez', 'Sanchez', 'juan128@example.com', '$2y$10$yuS8fR3YZ.I5r5KyM.RaMuvI9sP7gD6j.eGgyCXqmPc9JUAAn7sFm', NULL, '918293161', 'F', '1998-10-30'),
	(213, '80829276', NULL, 'Maria', 'Lopez', 'Gomez', 'maria855@example.com', '$2y$10$/.0Tv2ebojx9f1i9IjualehWHIrmNkgBb7otQ0D8dsSHGASxMDzZu', NULL, '925365044', 'F', '2002-10-30'),
	(214, '53324660', NULL, 'Luis', 'Lopez', 'Gomez', 'luis365@example.com', '$2y$10$J.c021Bc2j/AUkGwiI5oFuO9YtEOg/.vkpqvhXzvR4V3BUh87.iCi', NULL, '955650198', 'F', '2003-10-30'),
	(215, '98216038', NULL, 'Luis', 'Rodriguez', 'Gomez', 'luis147@example.com', '$2y$10$6ZZx9ZLfzKZx39yg/FXyZONT.tfhzSFqXcqoOwwf3eLkA.FB9CVHq', NULL, '940945654', 'M', '2002-10-30'),
	(216, '22645853', NULL, 'Ana', 'Fernandez', 'Torres', 'ana746@example.com', '$2y$10$Ymxo5f7YEP9l4I3AouaLmOMvILOQiB3fx3TQEIDVvnhKjExF/N8/u', NULL, '922582148', 'M', '2004-10-30'),
	(217, '68780255', NULL, 'Ana', 'Lopez', 'Molina', 'ana638@example.com', '$2y$10$BeQ6Xxlvh4n58QmNWR8gm.PtrkuKf4B6rBF6TUHLcYgX/rufGJI/e', NULL, '954308495', 'M', '2005-10-30'),
	(218, '38986790', NULL, 'Ana', 'Garcia', 'Torres', 'ana816@example.com', '$2y$10$Xt//zsAAGWUSMmnIbcEQB.jawtxMEVpbUO/YiUrAuu1O85PnFUEPe', NULL, '924102360', 'F', '2001-10-30'),
	(219, '20649359', NULL, 'Sofia', 'Lopez', 'Molina', 'sofia440@example.com', '$2y$10$Wws27dfXUxx94EVP2wmgR.VJ05x/zoq.mSNguX/2cMCSzQsFcxlxy', NULL, '984301859', 'F', '1999-10-30'),
	(220, '40815190', NULL, 'Pedro', 'Perez', 'Torres', 'pedro535@example.com', '$2y$10$p8MYalGniOOVs.ETXXDLxedZcBw4Dzoc29qR3xCpB0/br4cp0.ytG', NULL, '975666141', 'M', '2002-10-30'),
	(221, '48627904', NULL, 'Juan', 'Fernandez', 'Gomez', 'juan597@example.com', '$2y$10$gTMW/ZY2F4Vn/eyfB.alCebWUcSkDLv05CKPVFXjMXXDWBcF0UK0i', NULL, '920114620', 'F', '2004-10-30'),
	(222, '11968628', NULL, 'Laura', 'Fernandez', 'Diaz', 'laura252@example.com', '$2y$10$GAddSHDfNE/5YIGTqAOEv.3KzGQLSX7wxkQYIgpZgSHx1nqXdScF6', NULL, '915684356', 'M', '1999-10-30'),
	(223, '68624230', NULL, 'Maria', 'Fernandez', 'Vargas', 'maria863@example.com', '$2y$10$00cbe/fWrEmziBdozfp8b.hs9DTbEU2fBqMy7LBHhEs1k6Ho1M9x.', NULL, '988015752', 'F', '2000-10-30'),
	(224, '72985835', NULL, 'Laura', 'Lopez', 'Sanchez', 'laura194@example.com', '$2y$10$CMo6H0nLW6XETUkTVWTATewdIAvS/6w3aOhquUprZa6m7tCcA8B3u', NULL, '912792055', 'M', '2004-10-30'),
	(225, '24922012', NULL, 'Luis', 'Martinez', 'Sanchez', 'luis278@example.com', '$2y$10$oL12L4lAyMTpX/67EoeWtevn0sMiRJYrDeCsPQx5o3A2KmGOloYwS', NULL, '984026539', 'M', '2003-10-30'),
	(226, '81103602', NULL, 'Luis', 'Fernandez', 'Molina', 'luis204@example.com', '$2y$10$KVhM0u45ccuH4ceAnCGunOTIr6Qlly5ful5fz6sew7BvkeTm6geV.', NULL, '985481029', 'F', '2005-10-30'),
	(227, '76015777', NULL, 'Sofia', 'Perez', 'Vargas', 'sofia139@example.com', '$2y$10$TPptYEuLcmpqLXe5H/zzu.5qYqEwqfgJFUztpghaoQkS.h90IBgJm', NULL, '987428465', 'M', '2003-10-30'),
	(228, '93599523', NULL, 'Pedro', 'Martinez', 'Torres', 'pedro641@example.com', '$2y$10$rK7Rz4.byjGTYyUKO.FqKOhZE.fbf1Peq0/TdnMaoCyPszv.uempu', NULL, '917474030', 'M', '2003-10-30'),
	(229, '54355454', NULL, 'Sofia', 'Garcia', 'Vargas', 'sofia663@example.com', '$2y$10$O74RdR0mIEXnIzKchSfSAueBBb252MNCzHXxzrWllsWpnxnmWnY..', NULL, '981775324', 'F', '2002-10-30'),
	(230, '87511898', NULL, 'Maria', 'Garcia', 'Vargas', 'maria917@example.com', '$2y$10$J1PISnOZ5z79citqrhvKe.7QBgWwpgp5NlUU38gVXjGdmc9BNe.V6', NULL, '939215062', 'M', '2005-10-30'),
	(231, '72402380', NULL, 'Juan', 'Fernandez', 'Gomez', 'juan650@example.com', '$2y$10$yCgQThIGTauS2OEPCtURx./NIC8FsSvG3sIDQ5qyOt7DScmTioAFS', NULL, '958591833', 'M', '2000-10-30'),
	(232, '58084872', NULL, 'Laura', 'Martinez', 'Vargas', 'laura169@example.com', '$2y$10$9NSshpXjtYBJSLepbvMMyeu1BDDCmtAAwWtZ24Hnv/MeVJam0XrhO', NULL, '927190845', 'F', '2000-10-30'),
	(233, '53530023', NULL, 'Juan', 'Perez', 'Vargas', 'juan952@example.com', '$2y$10$rve1kQTm7sEYtQ2zpolp7eayDOGeS0y0.Al.Z6Xh4wAINM3sZnTo2', NULL, '922443639', 'M', '1998-10-30'),
	(234, '81941757', NULL, 'Laura', 'Rodriguez', 'Diaz', 'laura822@example.com', '$2y$10$mA5dyFaHqs7BBhdfs6WDfuxGz7uhvEnnv6BGhHW9cU7Kqz2Z2JC.6', NULL, '990624243', 'M', '2005-10-30'),
	(235, '46862071', NULL, 'Carlos', 'Perez', 'Sanchez', 'carlos513@example.com', '$2y$10$XE49oqdTmisdDvlwJXkY8.5T69SG26sXSKxoar9t..ef5Lxf2BcWG', NULL, '931244799', 'M', '2005-10-30'),
	(236, '76857686', NULL, 'Luis', 'Perez', 'Sanchez', 'luis427@example.com', '$2y$10$PsUIAlHvavqJvWrPtfYo/uvv/t1fnfEUSFMwrCTfuoGTpxxDDH2D6', NULL, '967466526', 'M', '2001-10-30'),
	(237, '55546632', NULL, 'Luis', 'Martinez', 'Torres', 'luis686@example.com', '$2y$10$DpYQu286Bj2XKrqc1TOfA.fnOEMh2Onfk55fawVkqTsCJkfRFpBCa', NULL, '914004441', 'M', '2005-10-30'),
	(238, '11902377', NULL, 'Maria', 'Rodriguez', 'Vargas', 'maria339@example.com', '$2y$10$CiBXGzukGnROCuBL0D6ulOR3HjO4xI84PeqFAAPDJUmrb5VMu7TKS', NULL, '927484361', 'M', '1998-10-30'),
	(239, '86561926', NULL, 'Laura', 'Fernandez', 'Molina', 'laura413@example.com', '$2y$10$X7jNWGpgixcXMb.guPuaBO4oLMcY0VrPjbzwGILqPUOKHzfl.xm2S', NULL, '955583385', 'F', '2004-10-30'),
	(240, '34325677', NULL, 'Luis', 'Rodriguez', 'Sanchez', 'luis757@example.com', '$2y$10$ZbJbO/SDBmkOMnZ93gZaD.4NfO4kHmMQMXGqRq5DscihbORDfcLTC', NULL, '970699241', 'F', '2001-10-30'),
	(241, '65965772', NULL, 'Ana', 'Perez', 'Gomez', 'ana761@example.com', '$2y$10$kZqAuvrJ0lrvp.q0oAR0TeYn5SVUCwjQCL81lclgejvawlqLq8ZMG', NULL, '986243591', 'F', '2004-10-30'),
	(242, '73993052', NULL, 'Carlos', 'Lopez', 'Gomez', 'carlos698@example.com', '$2y$10$SchBB0yjx8oqJLqPbV.t.OX0NH3Ma/DpbjEHu1wuXnljDF87aLSky', NULL, '988050777', 'M', '2000-10-30'),
	(243, '25483544', NULL, 'Pedro', 'Fernandez', 'Molina', 'pedro305@example.com', '$2y$10$qDkxTfhzauT3JY0UXr9wt.6gZWdR7CevvtsgVWuQtL050/JWz5/pC', NULL, '942226862', 'F', '2005-10-30'),
	(244, '22986573', NULL, 'Sofia', 'Rodriguez', 'Diaz', 'sofia226@example.com', '$2y$10$UjrWivz2I6CvKNqTdLcDEuWGUPooWQI6sw/4Oo5joI/nNI35HpMRq', NULL, '966104916', 'F', '2005-10-30'),
	(245, '32036078', NULL, 'Carlos', 'Garcia', 'Diaz', 'carlos780@example.com', '$2y$10$P2T4lGLziKLnvg.KiDTh2eEV.dTvWbcVUDQHNUrO6BjmQJsYRiiqe', NULL, '935710938', 'F', '1999-10-30'),
	(246, '70383906', NULL, 'Ana', 'Garcia', 'Torres', 'ana626@example.com', '$2y$10$TPydeWpI/rBL4UL/c3k2hOxLOXI77g9kikoH5K2v7j6WpKpNmkbiO', NULL, '927273519', 'M', '2002-10-30'),
	(247, '54283960', NULL, 'Pedro', 'Lopez', 'Torres', 'pedro639@example.com', '$2y$10$pRK1EYNpuPB32yJq5HvNgOPVhR4ILB0pVuO2DuPRAvUR3sMw9hy4O', NULL, '982347591', 'M', '2000-10-30'),
	(248, '81771397', NULL, 'Laura', 'Garcia', 'Torres', 'laura743@example.com', '$2y$10$ID0Z2YhODffCJBPDbEwwlO8m0wfOz2e89o2bXHbu9YIGzAVM6qqKC', NULL, '912678249', 'M', '2003-10-30'),
	(249, '41666750', NULL, 'Carlos', 'Martinez', 'Torres', 'carlos542@example.com', '$2y$10$W2r77MiwRmZyL5ZamWNqJ.duIOG2f4Q3FrwELc7GossEJPMwi3ST2', NULL, '926368595', 'F', '1998-10-30'),
	(250, '46302888', NULL, 'Laura', 'Garcia', 'Molina', 'laura976@example.com', '$2y$10$23otSBmGd1AyVMjGkOGtYu0X.u/SclWx5eunYe2Ku1qmCouJ7BW3i', NULL, '915337253', 'M', '2001-10-30'),
	(251, '30793803', NULL, 'Juan', 'Garcia', 'Gomez', 'juan501@example.com', '$2y$10$mGAwrukRSuTAFgruq57acuiFhciiXsXf/av7aSR7cXjCZrZYscgq2', NULL, '922464585', 'M', '1998-10-30'),
	(252, '45547805', NULL, 'Carlos', 'Rodriguez', 'Torres', 'carlos896@example.com', '$2y$10$.QpW6pi6UEvnCXT6n/xwkeU23FO5x36N1tIaCcfDTutksb8TLg/Hi', NULL, '966541168', 'M', '1999-10-30');

-- Volcando estructura para tabla edusmart_v2.calificaciones
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id_calificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `id_examen` int(11) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `tipo` enum('Individual','Equipo') DEFAULT NULL,
  PRIMARY KEY (`id_calificacion`),
  KEY `matricula` (`matricula`),
  KEY `FK_calificaciones_examenes` (`id_examen`),
  KEY `FK_calificaciones_alumnos` (`id_alumno`),
  CONSTRAINT `FK_calificaciones_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.calificaciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.contenido_tematico
CREATE TABLE IF NOT EXISTS `contenido_tematico` (
  `id_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `id_subtema` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `nombre_archivo` varchar(50) DEFAULT NULL,
  `tipo` enum('Video','infografia') DEFAULT NULL,
  PRIMARY KEY (`id_contenido`),
  KEY `FK_contenido_tematico_unidades_tematicas` (`id_subtema`) USING BTREE,
  CONSTRAINT `FK_contenido_tematico_subtemas` FOREIGN KEY (`id_subtema`) REFERENCES `subtemas` (`id_subtema`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.contenido_tematico: ~3 rows (aproximadamente)
INSERT INTO `contenido_tematico` (`id_contenido`, `id_subtema`, `titulo`, `descripcion`, `nombre_archivo`, `tipo`) VALUES
	(1, 1, 'Introduccion a sql', 'Video de instroducción', 'https://www.youtube.com/watch?v=gmdgvtQC89o', 'Video'),
	(2, 1, 'Concepto básico', 'Infografia de introdución', 'concepto1.pdf', 'infografia'),
	(3, 1, 'usuario de la BD', 'Infografia sobre el usuarioa de la BD', 'prueba.pdf', 'infografia');

-- Volcando estructura para tabla edusmart_v2.docentes
CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_institucion` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `FK_docentes_institucion` (`id_institucion`),
  CONSTRAINT `FK_docentes_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.docentes: ~6 rows (aproximadamente)
INSERT INTO `docentes` (`id_docente`, `id_institucion`, `nombre`, `app`, `apm`, `correo_electronico`, `contrasena`) VALUES
	(1, 1, 'Jesus', 'Dominguez', 'Gutu', 'nose@nose', 'xd'),
	(2, 1, 'Maria', 'Perez', 'Lopez', 'maria@gmail.com', '12345678'),
	(3, NULL, 'Adrian', '', '', 'morach117@gmail.com', '2209691a0f52928b05604a5c7dfd910aa0572c301aeae5092b7a51103cd645ac'),
	(4, NULL, 'Adrian', 'Morales', 'Morales', 'morach1171@gmail.com', '2209691a0f52928b05604a5c7dfd910aa0572c301aeae5092b7a51103cd645ac'),
	(5, NULL, 'Adrian', '123', 'Morales', 'moracsh117@gmail.com', '2209691a0f52928b05604a5c7dfd910aa0572c301aeae5092b7a51103cd645ac'),
	(6, NULL, 'Adrian', '123', 'Morales', 'morach1c17@gmail.com', '2209691a0f52928b05604a5c7dfd910aa0572c301aeae5092b7a51103cd645ac');

-- Volcando estructura para tabla edusmart_v2.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(100) DEFAULT NULL,
  `numero_integrantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.equipos: ~1 rows (aproximadamente)
INSERT INTO `equipos` (`id_equipo`, `nombre_equipo`, `numero_integrantes`) VALUES
	(4, 'Equipo 1', 5);

-- Volcando estructura para tabla edusmart_v2.equipoxalumno
CREATE TABLE IF NOT EXISTS `equipoxalumno` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  KEY `FK_equipoxalumno_alumnos` (`id_alumno`),
  KEY `FK_equipoxalumno_equipos` (`id_equipo`),
  CONSTRAINT `FK_equipoxalumno_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_equipoxalumno_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.equipoxalumno: ~1 rows (aproximadamente)
INSERT INTO `equipoxalumno` (`id_alumno`, `id_equipo`) VALUES
	(2, 4);

-- Volcando estructura para tabla edusmart_v2.examenes
CREATE TABLE IF NOT EXISTS `examenes` (
  `id_examen` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `tipo_examen` enum('Individual','Equipo') DEFAULT NULL,
  `fecha_examen` date DEFAULT NULL,
  PRIMARY KEY (`id_examen`),
  KEY `FK_examenes_unidades_tematicas` (`id_unidad`),
  KEY `FK_examenes_docentes` (`id_docente`),
  KEY `FK_examenes_materias` (`id_materia`),
  CONSTRAINT `FK_examenes_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_examenes_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_examenes_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.examenes: ~1 rows (aproximadamente)
INSERT INTO `examenes` (`id_examen`, `id_docente`, `id_materia`, `id_unidad`, `tipo_examen`, `fecha_examen`) VALUES
	(2, 2, 2, 2, 'Equipo', '2023-10-13');

-- Volcando estructura para tabla edusmart_v2.gamificacion
CREATE TABLE IF NOT EXISTS `gamificacion` (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ranking`),
  KEY `FK_gamificacion_examenes` (`id_examen`),
  KEY `FK_gamificacion_alumnos` (`id_alumno`),
  KEY `FK_gamificacion_materias` (`id_materia`),
  CONSTRAINT `FK_gamificacion_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_examenes` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.gamificacion: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.gamificacion_equipos
CREATE TABLE IF NOT EXISTS `gamificacion_equipos` (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ranking`),
  KEY `FK_gamificacion_equipos_examenes` (`id_examen`),
  KEY `FK_gamificacion_equipos_equipos` (`id_equipo`),
  KEY `FK_gamificacion_equipos_materias` (`id_materia`),
  CONSTRAINT `FK_gamificacion_equipos_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_equipos_examenes` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_equipos_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.gamificacion_equipos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_institucion`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.institucion: ~1 rows (aproximadamente)
INSERT INTO `institucion` (`id_institucion`, `nombre`, `tipo`, `correo`) VALUES
	(1, 'UTS', 'Universidad Tecnologica', 'uts@uts');

-- Volcando estructura para tabla edusmart_v2.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.materias: ~3 rows (aproximadamente)
INSERT INTO `materias` (`id_materia`, `nombre_materia`, `img`) VALUES
	(1, 'Base de datos', '65483dec5e288.jpg'),
	(2, 'Desarrollo Web', '65483de7cf539.jpg'),
	(4, 'Desarrollo web Progresivo', '65483ddb7c418.jpg');

-- Volcando estructura para tabla edusmart_v2.materiaxalumno
CREATE TABLE IF NOT EXISTS `materiaxalumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  KEY `FK_materiaxalumno_materias` (`id_materia`),
  KEY `FK_materiaxalumno_docentes` (`id_docente`),
  KEY `FK_materiaxalumno_alumnos` (`id_alumno`),
  CONSTRAINT `FK_materiaxalumno_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  CONSTRAINT `FK_materiaxalumno_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_materiaxalumno_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.materiaxalumno: ~0 rows (aproximadamente)
INSERT INTO `materiaxalumno` (`id_alumno`, `id_materia`, `id_docente`) VALUES
	(1, 2, 2),
	(3, 2, 2),
	(2, 1, 1);

-- Volcando estructura para tabla edusmart_v2.planes_pago
CREATE TABLE IF NOT EXISTS `planes_pago` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.planes_pago: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `tiempo_respuesta` time DEFAULT NULL,
  `enunciado` varchar(255) DEFAULT NULL,
  `inciso_a` varchar(255) DEFAULT NULL,
  `inciso_b` varchar(255) DEFAULT NULL,
  `inciso_c` varchar(255) DEFAULT NULL,
  `inciso_d` varchar(255) DEFAULT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `multimedia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `FK_preguntas_examenes` (`id_examen`),
  KEY `FK_preguntas_unidades_tematicas` (`id_unidad`),
  CONSTRAINT `FK_preguntas_examenes` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_preguntas_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.preguntas: ~2 rows (aproximadamente)
INSERT INTO `preguntas` (`id_pregunta`, `id_examen`, `id_unidad`, `tiempo_respuesta`, `enunciado`, `inciso_a`, `inciso_b`, `inciso_c`, `inciso_d`, `respuesta`, `multimedia`) VALUES
	(5, 2, 2, '00:00:59', 'Pregunta 5', NULL, NULL, NULL, NULL, 'A', 'https://www.youtube.com/watch?v=gmdgvtQC89o'),
	(6, 2, 2, '00:00:59', 'Pregunta 6', 'A', 'B', 'C', 'D', 'B', NULL);

-- Volcando estructura para tabla edusmart_v2.respuesta
CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `respuestas` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_respuesta`),
  KEY `FK_respuesta_preguntas` (`id_pregunta`),
  CONSTRAINT `FK_respuesta_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.respuesta: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.subtemas
CREATE TABLE IF NOT EXISTS `subtemas` (
  `id_subtema` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_subtema`),
  KEY `FK_subtemas_tema` (`id_tema`),
  CONSTRAINT `FK_subtemas_tema` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.subtemas: ~4 rows (aproximadamente)
INSERT INTO `subtemas` (`id_subtema`, `id_tema`, `nombre`) VALUES
	(1, 1, 'Conceptos básicos'),
	(2, 1, 'Usuario de la BD'),
	(3, 1, 'Modelo  de datos'),
	(4, 2, 'Cardinalidad');

-- Volcando estructura para tabla edusmart_v2.tema
CREATE TABLE IF NOT EXISTS `tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tema`),
  KEY `FK_tema_unidades_tematicas` (`id_unidad`),
  CONSTRAINT `FK_tema_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.tema: ~3 rows (aproximadamente)
INSERT INTO `tema` (`id_tema`, `id_unidad`, `nombre`) VALUES
	(1, 1, 'Introducción'),
	(2, 1, 'Modelo Entidad-Relación'),
	(3, 2, 'Introducción a GitHub');

-- Volcando estructura para tabla edusmart_v2.unidades_tematicas
CREATE TABLE IF NOT EXISTS `unidades_tematicas` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `nombre_unidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`),
  KEY `FK_unidades_tematicas_materias` (`id_materia`),
  CONSTRAINT `FK_unidades_tematicas_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.unidades_tematicas: ~3 rows (aproximadamente)
INSERT INTO `unidades_tematicas` (`id_unidad`, `id_materia`, `nombre_unidad`) VALUES
	(1, 1, 'Manejo de SQL'),
	(2, 2, 'Versionamiento'),
	(3, 2, 'Docker');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
