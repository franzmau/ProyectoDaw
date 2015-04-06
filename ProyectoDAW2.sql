-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2015 a las 03:43:18
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ProyectoDAW2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consistente`
--

CREATE TABLE IF NOT EXISTS `consistente` (
`idconsistente` int(11) NOT NULL,
  `descripcion` varchar(160) COLLATE utf8_bin NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `consistente`
--

INSERT INTO `consistente` (`idconsistente`, `descripcion`, `max`, `min`) VALUES
(1, 'Mostró consistencia, todo lo que decía lo realizaba con el paso del tiempo', 100, 90),
(2, 'Fue consistente en la mayoria de los casos, llegan a existir muy pocos cambios.', 89, 85),
(3, 'Mostró la consistencia de manera regular, se hicieron pocos cambios en cuanto lo que decía y hacia', 84, 80),
(4, 'No mostró mucha consistencia, hubo algunos cambios en cuanto lo que decia y hacia dentro de la materia', 79, 75),
(5, 'No se mostró consistencia alguna a lo largo del semestre, la mayoría de las cosas que decía eran muy distintas a las cosas que realizaba ', 74, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demasiadointeresante`
--

CREATE TABLE IF NOT EXISTS `demasiadointeresante` (
`ID` int(11) NOT NULL,
  `VALOR` varchar(18) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `demasiadointeresante`
--

INSERT INTO `demasiadointeresante` (`ID`, `VALOR`) VALUES
(1, 'Muy interesante'),
(2, 'Interesante'),
(3, 'Neutra'),
(4, 'Muy Poco Interesan'),
(5, 'Nada interesante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`id` int(11) NOT NULL,
  `dep` varchar(34) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `dep`) VALUES
(1, 'Administración y finanzas'),
(2, 'Comunicación'),
(3, 'Humanidades'),
(4, 'Mercadotecnia y negocios inter'),
(5, 'Ciencias basicas'),
(6, 'Diseño y arquitectura'),
(7, 'Mecánica e industrial'),
(8, 'Tecnologías de inf y electronica'),
(9, 'ESIABA'),
(10, 'Ingeniería civil'),
(11, 'Emprendimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultadmaestro`
--

CREATE TABLE IF NOT EXISTS `dificultadmaestro` (
`idDificultad` int(2) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_bin NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `dificultadmaestro`
--

INSERT INTO `dificultadmaestro` (`idDificultad`, `descripcion`, `min`, `max`) VALUES
(1, 'Es excelente explicando los temas en muy pocas ocasiones existen dudas, según las alumnos no existe dificultad alguna. ', 90, 100),
(2, 'Explica muy bien, en algunas ocasiones pueden existir dudas', 85, 89),
(3, 'Explica bien sus temas, llegan a existir dudas  de vez en cuando ', 80, 84),
(6, 'En algunas ocasiones llega  a tener algunos problemas  para poder explicar ', 75, 79),
(7, 'Llegan a ocurrir  bastantes problemas para explicar los temas y pueden llegar  a surgir muchas dudas en la materia', 70, 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultadmateria`
--

CREATE TABLE IF NOT EXISTS `dificultadmateria` (
`idDif` int(11) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_bin NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `dificultadmateria`
--

INSERT INTO `dificultadmateria` (`idDif`, `descripcion`, `max`, `min`) VALUES
(1, 'No tiene dificultad para ser entendida, es altamente seguro que la persona encargada de impartir la materia ha hecho un excelente  trabajo', 100, 90),
(2, ' Muy  comprendida por la mayoría de los alumnos casi  en escasas ocasiones existe dificultad ', 89, 85),
(3, 'Entendida por muchos de los alumnos pocos temas llegan a ser complicados', 84, 80),
(4, 'Tiene una dificultad un poco alta algunos de los alumnos algunos temas son complicados', 79, 75),
(5, 'Tiene un gran nivel de complejidad muchos de sus temas no son entendidos por sus alumnos', 74, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluan`
--

CREATE TABLE IF NOT EXISTS `evaluan` (
`idEvaluan` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `IdAlumno` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `habilidades` int(11) NOT NULL,
  `compromiso` int(11) NOT NULL,
  `dificultad` int(11) NOT NULL,
  `consistencia` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `interesante` int(1) NOT NULL,
  `difi` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `evaluan`
--

INSERT INTO `evaluan` (`idEvaluan`, `idProfesor`, `IdAlumno`, `idMateria`, `disponibilidad`, `habilidades`, `compromiso`, `dificultad`, `consistencia`, `fecha`, `interesante`, `difi`) VALUES
(1, 3, 1, 1, 5, 5, 5, 5, 5, '2015-03-31 01:52:10', 5, 5),
(2, 2, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 01:54:28', 5, 5),
(3, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 01:55:56', 5, 5),
(4, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 01:56:40', 5, 5),
(5, 1, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 01:59:41', 5, 5),
(6, 1, 1, 5, 5, 5, 5, 5, 5, '2015-03-31 02:03:00', 5, 5),
(7, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 02:04:11', 5, 5),
(8, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 02:08:13', 5, 5),
(9, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 02:09:01', 5, 5),
(10, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 02:11:38', 5, 5),
(11, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 02:12:10', 5, 5),
(12, 3, 1, 2, 5, 5, 5, 5, 5, '2015-03-31 02:12:30', 5, 5),
(13, 3, 1, 2, 2, 4, 2, 2, 4, '2015-03-31 02:14:31', 4, 3),
(14, 3, 1, 2, 1, 2, 2, 2, 2, '2015-04-02 14:46:34', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habiilidadmateria`
--

CREATE TABLE IF NOT EXISTS `habiilidadmateria` (
`id` int(11) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_bin NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habiilidadmateria`
--

INSERT INTO `habiilidadmateria` (`id`, `descripcion`, `min`, `max`) VALUES
(1, 'La mayoría de los alumnos han desarrollando las habilidades necesarias que son necesarias en la materia ', 90, 100),
(2, 'Muchos de los alumnos han podido desarrollar las habilidades de manera considerable', 85, 89),
(3, 'En promedio los alumnos desarrollan las habilidades que son necesarias para la materia', 80, 84),
(4, 'Algunos alumnos tienen problema para desarrollar las habilidades o desarrollan poca habilidad', 75, 79),
(6, 'Muchos alumnos tienen problema en desarrollar las habilidades necesarias o desarrollan muy poca habilidad ', 70, 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imparten`
--

CREATE TABLE IF NOT EXISTS `imparten` (
`id` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imparten`
--

INSERT INTO `imparten` (`id`, `id_prof`, `id_mat`, `status`) VALUES
(2, 1, 3, 1),
(3, 1, 5, 1),
(4, 1, 7, 1),
(5, 1, 8, 1),
(6, 2, 1, 1),
(7, 2, 1, 1),
(8, 3, 9, 1),
(9, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciativa`
--

CREATE TABLE IF NOT EXISTS `iniciativa` (
`idiniciativa` int(11) NOT NULL,
  `descripcion` varchar(160) COLLATE utf8_bin NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `iniciativa`
--

INSERT INTO `iniciativa` (`idiniciativa`, `descripcion`, `max`, `min`) VALUES
(1, 'Tiene demasiada iniciativa con el estudiante y  demuestra un gran compromiso por el aprendizaje del grupo', 100, 90),
(2, 'Muestra su iniciativa con el estudiante y su compromiso con el grupo ', 89, 85),
(3, 'Tiene la iniciativa y competencia necesaria para el grupo ', 84, 80),
(4, 'Suele mostrar en algunas ocasiones falta de iniciativa o competencia con el grupo ', 79, 75),
(5, 'Muestra en ocasiones repetidas falta de iniciativa y /o compromiso con el grupo ', 74, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interesante`
--

CREATE TABLE IF NOT EXISTS `interesante` (
`idinteresante` int(11) NOT NULL,
  `descripcion` varchar(140) COLLATE utf8_bin NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `interesante`
--

INSERT INTO `interesante` (`idinteresante`, `descripcion`, `max`, `min`) VALUES
(1, 'Los estudiantes consideran que la materia es excesivamente interesante  ', 100, 90),
(2, 'Los estudiantes consideran que la materia es interesante ', 89, 85),
(3, 'Los estudiantes consideran que la materia no es interesante pero tampoco aburrida', 84, 80),
(4, 'Los estudiantes consideran a la materia un poco aburrido en algunos casos tediosa', 79, 75),
(5, 'Los estudiante consideran a la materia nada interesante, muy aburrida y hasta cierto punto tediosa  ', 74, 70);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mat`
--
CREATE TABLE IF NOT EXISTS `mat` (
`Materia` varchar(70)
,`Dificultad` varchar(150)
,`Habilidad` varchar(150)
,`Interesante` varchar(140)
,`Eva` bigint(21)
,`clave` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
`clave` int(11) NOT NULL,
  `descripcion` varchar(70) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dep` int(11) NOT NULL,
  `dificultad` int(11) NOT NULL,
  `habilidad` int(11) NOT NULL,
  `interesante` int(11) NOT NULL,
  `calif` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`clave`, `descripcion`, `dep`, `dificultad`, `habilidad`, `interesante`, `calif`) VALUES
(1, 'Desarrollo de aplicaciones web', 8, 98, 98, 98, 98),
(2, 'Sistemas operativos', 8, 88, 87, 87, 87.3333),
(3, 'Análisis y diseño de algoritmos', 8, 94, 94, 94, 94),
(4, 'Bases de datos', 8, 100, 100, 100, 100),
(5, 'Matemáticas computacionales', 8, 98, 98, 98, 98),
(6, 'Evaluación de proyectos', 8, 100, 100, 100, 100),
(7, 'Programación avanzada', 8, 100, 100, 100, 100),
(8, 'Estructura de datos', 8, 100, 100, 100, 100),
(9, 'Seguridad informática', 8, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta1`
--

CREATE TABLE IF NOT EXISTS `pregunta1` (
`id` int(11) NOT NULL,
  `valor` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pregunta1`
--

INSERT INTO `pregunta1` (`id`, `valor`) VALUES
(1, 'Siempre'),
(2, 'Casi Siempre'),
(3, 'A veces'),
(4, 'Casi Nunca'),
(5, 'Nunca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta2`
--

CREATE TABLE IF NOT EXISTS `pregunta2` (
`id` int(11) NOT NULL,
  `valor` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pregunta2`
--

INSERT INTO `pregunta2` (`id`, `valor`) VALUES
(1, 'Demasiada'),
(2, 'Considerable'),
(3, 'Lo Normal'),
(4, 'Poca'),
(5, 'Muy Poca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta3`
--

CREATE TABLE IF NOT EXISTS `pregunta3` (
`id` int(11) NOT NULL,
  `valor` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pregunta3`
--

INSERT INTO `pregunta3` (`id`, `valor`) VALUES
(1, 'Siempre'),
(2, 'Casi Siempre'),
(3, 'A veces'),
(4, 'Casi Nunca'),
(5, 'Nunca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta4`
--

CREATE TABLE IF NOT EXISTS `pregunta4` (
`id` int(11) NOT NULL,
  `valor` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pregunta4`
--

INSERT INTO `pregunta4` (`id`, `valor`) VALUES
(1, 'Siempre'),
(2, 'Casi Siempre'),
(3, 'A veces'),
(4, 'Casi Nunca'),
(5, 'Nunca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta5`
--

CREATE TABLE IF NOT EXISTS `pregunta5` (
`id` int(11) NOT NULL,
  `valor` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pregunta5`
--

INSERT INTO `pregunta5` (`id`, `valor`) VALUES
(1, 'Siempre'),
(2, 'Casi Siempre'),
(3, 'A veces'),
(4, 'Casi Nunca'),
(5, 'Nunca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preocupacion`
--

CREATE TABLE IF NOT EXISTS `preocupacion` (
`idpreocupacion` int(11) NOT NULL,
  `descripcion` varchar(160) COLLATE utf8_bin NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `preocupacion`
--

INSERT INTO `preocupacion` (`idpreocupacion`, `descripcion`, `max`, `min`) VALUES
(1, 'En la mayoria de los casos si no es que en todos esta disponible para contestar dudas y externa su preocupación al salón', 100, 90),
(2, 'En muchos casos muestra una gran intención de ayudar a los alumnos y muestra su preocupacion', 89, 85),
(3, 'Regularmente se preocupa por las dudas de los estudiante', 84, 80),
(4, 'En algunas ocasiones no muestra la preocupación debida hacia los estudiantes', 79, 75),
(5, 'Falta de preocupación hacia las dudas que le externan los alumnos en muchos de los casos', 74, 70);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `prof`
--
CREATE TABLE IF NOT EXISTS `prof` (
`profesor` varchar(140)
,`consitente` varchar(160)
,`dificultad` varchar(150)
,`iniciativa` varchar(160)
,`preocupacion` varchar(160)
,`Eva` bigint(21)
,`maestro` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
`id_maestro` int(11) NOT NULL,
  `nombre` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `dep` int(11) NOT NULL,
  `Consistente` int(11) NOT NULL,
  `Dificultad` int(11) NOT NULL,
  `iniciativa` int(11) NOT NULL,
  `preocupacion` int(11) NOT NULL,
  `califiacion` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_maestro`, `nombre`, `dep`, `Consistente`, `Dificultad`, `iniciativa`, `preocupacion`, `califiacion`) VALUES
(1, 'Pedro Oscar Pérez Murueta', 8, 98, 98, 98, 98, 98),
(2, 'Eduardo Daniel Juárez Pineda', 8, 92, 92, 92, 92, 92),
(3, 'José Oscar Hernández Pérez', 8, 87, 89, 87, 89, 88),
(4, 'Rocío Alejandra Aldeco Pérez', 8, 100, 100, 100, 100, 100),
(5, 'Ricardo Cortés Espinosa', 8, 100, 100, 100, 100, 100),
(6, 'Benjamín Valdés Aguirre', 8, 100, 100, 100, 100, 100),
(7, 'Luis Miguel Apátiga Castro', 5, 100, 100, 100, 100, 100),
(8, 'Francisco María Roberto Laborde Pérez Treviño', 8, 100, 100, 100, 100, 100),
(9, ' Fabiola Díaz Nieto', 8, 100, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sencillez`
--

CREATE TABLE IF NOT EXISTS `sencillez` (
`id` int(2) NOT NULL,
  `valor` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `sencillez`
--

INSERT INTO `sencillez` (`id`, `valor`) VALUES
(1, 'Muy Sencillo'),
(2, 'Sencillo'),
(3, 'Media'),
(4, 'Difícil'),
(5, 'Muy Difícil ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `matricula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `matricula`, `usuario`, `contraseña`) VALUES
(1, 'a01202413', 'Mauricio Villanueva', 'repoma'),
(2, 'a01206782', 'Nancy Espinosa', 'repoma');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista`
--
CREATE TABLE IF NOT EXISTS `vista` (
`Profesor` varchar(140)
,`Materia` varchar(70)
,`usuario` varchar(20)
,`disponible` varchar(15)
,`habilidades` varchar(13)
,`compromiso` varchar(15)
,`dificultad_prof` varchar(15)
,`consistencia` varchar(15)
,`Interesante` varchar(18)
,`dificultad_mat` varchar(13)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `mat`
--
DROP TABLE IF EXISTS `mat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyectodaw2`.`mat` AS select `m`.`descripcion` AS `Materia`,`dm`.`descripcion` AS `Dificultad`,`h`.`descripcion` AS `Habilidad`,`i`.`descripcion` AS `Interesante`,count(`e`.`idMateria`) AS `Eva`,`m`.`clave` AS `clave` from ((((`proyectodaw2`.`materia` `m` join `proyectodaw2`.`dificultadmateria` `dm`) join `proyectodaw2`.`habiilidadmateria` `h`) join `proyectodaw2`.`interesante` `i`) join `proyectodaw2`.`evaluan` `e`) where ((`dm`.`max` >= `m`.`dificultad`) and (`dm`.`min` <= `m`.`dificultad`) and (`h`.`max` >= `m`.`habilidad`) and (`h`.`min` <= `m`.`habilidad`) and (`i`.`max` >= `m`.`interesante`) and (`i`.`min` <= `m`.`interesante`) and (`e`.`idMateria` = `m`.`clave`)) group by `e`.`idMateria`;

-- --------------------------------------------------------

--
-- Estructura para la vista `prof`
--
DROP TABLE IF EXISTS `prof`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyectodaw2`.`prof` AS select `m`.`nombre` AS `profesor`,`dm`.`descripcion` AS `consitente`,`h`.`descripcion` AS `dificultad`,`i`.`descripcion` AS `iniciativa`,`p`.`descripcion` AS `preocupacion`,count(`e`.`idProfesor`) AS `Eva`,`m`.`id_maestro` AS `maestro` from (((((`proyectodaw2`.`profesor` `m` join `proyectodaw2`.`consistente` `dm`) join `proyectodaw2`.`dificultadmaestro` `h`) join `proyectodaw2`.`iniciativa` `i`) join `proyectodaw2`.`preocupacion` `p`) join `proyectodaw2`.`evaluan` `e`) where ((`dm`.`max` >= `m`.`Consistente`) and (`dm`.`min` <= `m`.`Consistente`) and (`h`.`max` >= `m`.`Dificultad`) and (`h`.`min` <= `m`.`Dificultad`) and (`i`.`max` >= `m`.`iniciativa`) and (`i`.`min` <= `m`.`iniciativa`) and (`p`.`max` >= `m`.`preocupacion`) and (`p`.`min` <= `m`.`preocupacion`) and (`e`.`idProfesor` = `m`.`id_maestro`)) group by `e`.`idProfesor`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista`
--
DROP TABLE IF EXISTS `vista`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyectodaw2`.`vista` AS select `p`.`nombre` AS `Profesor`,`m`.`descripcion` AS `Materia`,`a`.`matricula` AS `usuario`,`s`.`valor` AS `disponible`,`d`.`valor` AS `habilidades`,`p3`.`valor` AS `compromiso`,`p4`.`valor` AS `dificultad_prof`,`p5`.`valor` AS `consistencia`,`i`.`VALOR` AS `Interesante`,`se`.`valor` AS `dificultad_mat` from ((((((((((`proyectodaw2`.`evaluan` `e` join `proyectodaw2`.`materia` `m`) join `proyectodaw2`.`profesor` `p`) join `proyectodaw2`.`usuario` `a`) join `proyectodaw2`.`pregunta1` `s`) join `proyectodaw2`.`demasiadointeresante` `i`) join `proyectodaw2`.`pregunta2` `d`) join `proyectodaw2`.`sencillez` `se`) join `proyectodaw2`.`pregunta3` `p3`) join `proyectodaw2`.`pregunta4` `p4`) join `proyectodaw2`.`pregunta5` `p5`) where ((`e`.`idProfesor` = `p`.`id_maestro`) and (`e`.`idMateria` = `m`.`clave`) and (`e`.`IdAlumno` = `a`.`id`) and (`e`.`disponibilidad` = `d`.`id`) and (`e`.`habilidades` = `s`.`id`) and (`e`.`compromiso` = `p3`.`id`) and (`e`.`dificultad` = `p4`.`id`) and (`e`.`consistencia` = `p5`.`id`) and (`e`.`interesante` = `i`.`ID`) and (`e`.`difi` = `se`.`id`));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consistente`
--
ALTER TABLE `consistente`
 ADD PRIMARY KEY (`idconsistente`);

--
-- Indices de la tabla `demasiadointeresante`
--
ALTER TABLE `demasiadointeresante`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dificultadmaestro`
--
ALTER TABLE `dificultadmaestro`
 ADD PRIMARY KEY (`idDificultad`);

--
-- Indices de la tabla `dificultadmateria`
--
ALTER TABLE `dificultadmateria`
 ADD PRIMARY KEY (`idDif`), ADD KEY `idDif` (`idDif`);

--
-- Indices de la tabla `evaluan`
--
ALTER TABLE `evaluan`
 ADD PRIMARY KEY (`idEvaluan`);

--
-- Indices de la tabla `habiilidadmateria`
--
ALTER TABLE `habiilidadmateria`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imparten`
--
ALTER TABLE `imparten`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iniciativa`
--
ALTER TABLE `iniciativa`
 ADD PRIMARY KEY (`idiniciativa`);

--
-- Indices de la tabla `interesante`
--
ALTER TABLE `interesante`
 ADD PRIMARY KEY (`idinteresante`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
 ADD PRIMARY KEY (`clave`), ADD KEY `clave` (`clave`);

--
-- Indices de la tabla `pregunta1`
--
ALTER TABLE `pregunta1`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta2`
--
ALTER TABLE `pregunta2`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta3`
--
ALTER TABLE `pregunta3`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta4`
--
ALTER TABLE `pregunta4`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta5`
--
ALTER TABLE `pregunta5`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preocupacion`
--
ALTER TABLE `preocupacion`
 ADD PRIMARY KEY (`idpreocupacion`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
 ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `sencillez`
--
ALTER TABLE `sencillez`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `matricula` (`matricula`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consistente`
--
ALTER TABLE `consistente`
MODIFY `idconsistente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `demasiadointeresante`
--
ALTER TABLE `demasiadointeresante`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `dificultadmaestro`
--
ALTER TABLE `dificultadmaestro`
MODIFY `idDificultad` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `dificultadmateria`
--
ALTER TABLE `dificultadmateria`
MODIFY `idDif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `evaluan`
--
ALTER TABLE `evaluan`
MODIFY `idEvaluan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `habiilidadmateria`
--
ALTER TABLE `habiilidadmateria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `imparten`
--
ALTER TABLE `imparten`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `iniciativa`
--
ALTER TABLE `iniciativa`
MODIFY `idiniciativa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `interesante`
--
ALTER TABLE `interesante`
MODIFY `idinteresante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `pregunta1`
--
ALTER TABLE `pregunta1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pregunta2`
--
ALTER TABLE `pregunta2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pregunta3`
--
ALTER TABLE `pregunta3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pregunta4`
--
ALTER TABLE `pregunta4`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pregunta5`
--
ALTER TABLE `pregunta5`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `preocupacion`
--
ALTER TABLE `preocupacion`
MODIFY `idpreocupacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `sencillez`
--
ALTER TABLE `sencillez`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
