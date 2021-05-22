-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: cursos
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `id_carrito` int NOT NULL AUTO_INCREMENT,
  `cursoid` int NOT NULL,
  `usuarioid` int NOT NULL,
  PRIMARY KEY (`id_carrito`),
  KEY `FK_Carrito` (`usuarioid`),
  KEY `FK_Carrito2` (`cursoid`),
  CONSTRAINT `FK_Carrito` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `FK_Carrito2` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'PHP','Cursos de PHP',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatprivado`
--

DROP TABLE IF EXISTS `chatprivado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chatprivado` (
  `id_cp` int NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(255) NOT NULL,
  `usuarioid` int NOT NULL,
  `usuarioid2` int NOT NULL,
  `fechamensaje` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cp`),
  KEY `FK_chatPrivado` (`usuarioid`),
  KEY `FK_chatPrivado2` (`usuarioid2`),
  CONSTRAINT `FK_chatPrivado` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `FK_chatPrivado2` FOREIGN KEY (`usuarioid2`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatprivado`
--

LOCK TABLES `chatprivado` WRITE;
/*!40000 ALTER TABLE `chatprivado` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatprivado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentariocurso`
--

DROP TABLE IF EXISTS `comentariocurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentariocurso` (
  `id_comencurs` int NOT NULL AUTO_INCREMENT,
  `cursoid` int NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `usuid` int NOT NULL,
  PRIMARY KEY (`id_comencurs`),
  KEY `FK_ComentarioCurso2` (`cursoid`),
  KEY `FK_ComentarioCurso3` (`usuid`),
  CONSTRAINT `FK_ComentarioCurso2` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK_ComentarioCurso3` FOREIGN KEY (`usuid`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentariocurso`
--

LOCK TABLES `comentariocurso` WRITE;
/*!40000 ALTER TABLE `comentariocurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentariocurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `comentariosdelcurso`
--

DROP TABLE IF EXISTS `comentariosdelcurso`;
/*!50001 DROP VIEW IF EXISTS `comentariosdelcurso`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `comentariosdelcurso` AS SELECT 
 1 AS `id_comencurs`,
 1 AS `cursoid`,
 1 AS `comentario`,
 1 AS `NombreUsuario`,
 1 AS `usuid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `contrata`
--

DROP TABLE IF EXISTS `contrata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrata` (
  `id_contrata` int NOT NULL AUTO_INCREMENT,
  `usuarioid` int NOT NULL,
  `cursoid` int NOT NULL,
  `calificacioncurso` double DEFAULT '0',
  `contadorLecciones` int DEFAULT '0',
  `progreso` double DEFAULT '0',
  PRIMARY KEY (`id_contrata`),
  KEY `FK_Contrata` (`cursoid`),
  KEY `FK_Contrata2` (`usuarioid`),
  CONSTRAINT `FK_Contrata` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK_Contrata2` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrata`
--

LOCK TABLES `contrata` WRITE;
/*!40000 ALTER TABLE `contrata` DISABLE KEYS */;
INSERT INTO `contrata` VALUES (1,2,1,0,0,0);
/*!40000 ALTER TABLE `contrata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo` double NOT NULL,
  `foto` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `categoriaid` int DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `fechaCreado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuid` int NOT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `FK_Curso` (`categoriaid`),
  KEY `FK_Curso2` (`usuid`),
  CONSTRAINT `FK_Curso` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `FK_Curso2` FOREIGN KEY (`usuid`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'PHP for noobs','Curso dirigido a las personas que desean adentrarse en el mundo de PHP',350,'../imagenes/Cursos/PHP.png','../videos/Cursos/PHP_Presentación.mp4',1,1,'2021-05-21 21:34:42',1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cursosdelusuario`
--

DROP TABLE IF EXISTS `cursosdelusuario`;
/*!50001 DROP VIEW IF EXISTS `cursosdelusuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `cursosdelusuario` AS SELECT 
 1 AS `id_contrata`,
 1 AS `usuarioid`,
 1 AS `cursoid`,
 1 AS `calificacioncurso`,
 1 AS `progreso`,
 1 AS `Nombrecurso`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `elcarrito`
--

DROP TABLE IF EXISTS `elcarrito`;
/*!50001 DROP VIEW IF EXISTS `elcarrito`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `elcarrito` AS SELECT 
 1 AS `id_carrito`,
 1 AS `NombreCurso`,
 1 AS `NombreUsuario`,
 1 AS `usuarioid`,
 1 AS `cursoid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial` (
  `id_historial` int NOT NULL AUTO_INCREMENT,
  `cursoid` int NOT NULL,
  `usuarioid` int NOT NULL,
  `fechaBuscado` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_historial`),
  KEY `FK_Historial` (`usuarioid`),
  KEY `FK_Historial2` (`cursoid`),
  CONSTRAINT `FK_Historial` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `FK_Historial2` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES (1,1,2,'2021-05-21 21:35:16');
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `historialdecursos`
--

DROP TABLE IF EXISTS `historialdecursos`;
/*!50001 DROP VIEW IF EXISTS `historialdecursos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `historialdecursos` AS SELECT 
 1 AS `id_curso`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `costo`,
 1 AS `foto`,
 1 AS `video`,
 1 AS `categoriaid`,
 1 AS `activo`,
 1 AS `fechaCreado`,
 1 AS `usuid`,
 1 AS `NombreUsuario`,
 1 AS `usuarioid`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `lascategorias`
--

DROP TABLE IF EXISTS `lascategorias`;
/*!50001 DROP VIEW IF EXISTS `lascategorias`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `lascategorias` AS SELECT 
 1 AS `id_categoria`,
 1 AS `categoria`,
 1 AS `descripcion`,
 1 AS `activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `laslecciones`
--

DROP TABLE IF EXISTS `laslecciones`;
/*!50001 DROP VIEW IF EXISTS `laslecciones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `laslecciones` AS SELECT 
 1 AS `id_leccion`,
 1 AS `nombre`,
 1 AS `cursoid`,
 1 AS `nivel`,
 1 AS `archivo`,
 1 AS `foto`,
 1 AS `video`,
 1 AS `extra`,
 1 AS `activo`,
 1 AS `fechaCreado`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `leccion`
--

DROP TABLE IF EXISTS `leccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leccion` (
  `id_leccion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cursoid` int NOT NULL,
  `nivel` int NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `video` varchar(255) NOT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `fechaCreado` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_leccion`),
  KEY `FK_Leccion` (`cursoid`),
  CONSTRAINT `FK_Leccion` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leccion`
--

LOCK TABLES `leccion` WRITE;
/*!40000 ALTER TABLE `leccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `leccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `loscursos`
--

DROP TABLE IF EXISTS `loscursos`;
/*!50001 DROP VIEW IF EXISTS `loscursos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `loscursos` AS SELECT 
 1 AS `id_curso`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `costo`,
 1 AS `foto`,
 1 AS `video`,
 1 AS `categoriaid`,
 1 AS `activo`,
 1 AS `fechaCreado`,
 1 AS `usuid`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `loscursosbuscados`
--

DROP TABLE IF EXISTS `loscursosbuscados`;
/*!50001 DROP VIEW IF EXISTS `loscursosbuscados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `loscursosbuscados` AS SELECT 
 1 AS `id_curso`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `costo`,
 1 AS `foto`,
 1 AS `video`,
 1 AS `categoriaid`,
 1 AS `activo`,
 1 AS `fechaCreado`,
 1 AS `usuid`,
 1 AS `CreadorCurso`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `loscursoscarrito`
--

DROP TABLE IF EXISTS `loscursoscarrito`;
/*!50001 DROP VIEW IF EXISTS `loscursoscarrito`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `loscursoscarrito` AS SELECT 
 1 AS `id_carrito`,
 1 AS `NombreCurso`,
 1 AS `FotoCurso`,
 1 AS `DescripcionCurso`,
 1 AS `PrecioCurso`,
 1 AS `cursoid`,
 1 AS `usuarioid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `rol` tinyint(1) DEFAULT '1',
  `activo` tinyint(1) DEFAULT '1',
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,'EdsonPro','Edson','Pro','edsonpro@gmail.com','Sisc0ntr0l#','../imagenes/Perfil/DefaultUser.png'),(2,0,1,'RealDLight','David','Montemayor','eldavid@gmail.com','Sisc0ntr0l#','../imagenes/Perfil/DefaultUser.png'),(3,1,1,'PainChip','Elfen_Official','Betancourt','elmejor@profe.com','Sisc0ntr0l#','../imagenes/Perfil/DefaultUser.png');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `comentariosdelcurso`
--

/*!50001 DROP VIEW IF EXISTS `comentariosdelcurso`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `comentariosdelcurso` AS select `comentariocurso`.`id_comencurs` AS `id_comencurs`,`comentariocurso`.`cursoid` AS `cursoid`,`comentariocurso`.`comentario` AS `comentario`,`usuario`.`nombre` AS `NombreUsuario`,`comentariocurso`.`usuid` AS `usuid` from (`comentariocurso` join `usuario` on((`usuario`.`id_usuario` = `comentariocurso`.`usuid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `cursosdelusuario`
--

/*!50001 DROP VIEW IF EXISTS `cursosdelusuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cursosdelusuario` AS select `contrata`.`id_contrata` AS `id_contrata`,`contrata`.`usuarioid` AS `usuarioid`,`contrata`.`cursoid` AS `cursoid`,`contrata`.`calificacioncurso` AS `calificacioncurso`,`contrata`.`progreso` AS `progreso`,`curso`.`nombre` AS `Nombrecurso` from (`contrata` join `curso` on((`curso`.`id_curso` = `contrata`.`cursoid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `elcarrito`
--

/*!50001 DROP VIEW IF EXISTS `elcarrito`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `elcarrito` AS select `carrito`.`id_carrito` AS `id_carrito`,`curso`.`nombre` AS `NombreCurso`,`usuario`.`nombre` AS `NombreUsuario`,`carrito`.`usuarioid` AS `usuarioid`,`carrito`.`cursoid` AS `cursoid` from ((`carrito` join `usuario` on((`usuario`.`id_usuario` = `carrito`.`usuarioid`))) join `curso` on((`curso`.`id_curso` = `carrito`.`cursoid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `historialdecursos`
--

/*!50001 DROP VIEW IF EXISTS `historialdecursos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `historialdecursos` AS select `curso`.`id_curso` AS `id_curso`,`curso`.`nombre` AS `nombre`,`curso`.`descripcion` AS `descripcion`,`curso`.`costo` AS `costo`,`curso`.`foto` AS `foto`,`curso`.`video` AS `video`,`curso`.`categoriaid` AS `categoriaid`,`curso`.`activo` AS `activo`,`curso`.`fechaCreado` AS `fechaCreado`,`curso`.`usuid` AS `usuid`,`usuario`.`usuario` AS `NombreUsuario`,`historial`.`usuarioid` AS `usuarioid` from ((`historial` join `curso` on((`curso`.`usuid` = `historial`.`cursoid`))) join `usuario` on((`usuario`.`id_usuario` = `curso`.`usuid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `lascategorias`
--

/*!50001 DROP VIEW IF EXISTS `lascategorias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `lascategorias` AS select `categoria`.`id_categoria` AS `id_categoria`,`categoria`.`categoria` AS `categoria`,`categoria`.`descripcion` AS `descripcion`,`categoria`.`activo` AS `activo` from `categoria` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `laslecciones`
--

/*!50001 DROP VIEW IF EXISTS `laslecciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `laslecciones` AS select `leccion`.`id_leccion` AS `id_leccion`,`leccion`.`nombre` AS `nombre`,`leccion`.`cursoid` AS `cursoid`,`leccion`.`nivel` AS `nivel`,`leccion`.`archivo` AS `archivo`,`leccion`.`foto` AS `foto`,`leccion`.`video` AS `video`,`leccion`.`extra` AS `extra`,`leccion`.`activo` AS `activo`,`leccion`.`fechaCreado` AS `fechaCreado` from `leccion` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `loscursos`
--

/*!50001 DROP VIEW IF EXISTS `loscursos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `loscursos` AS select `curso`.`id_curso` AS `id_curso`,`curso`.`nombre` AS `nombre`,`curso`.`descripcion` AS `descripcion`,`curso`.`costo` AS `costo`,`curso`.`foto` AS `foto`,`curso`.`video` AS `video`,`curso`.`categoriaid` AS `categoriaid`,`curso`.`activo` AS `activo`,`curso`.`fechaCreado` AS `fechaCreado`,`curso`.`usuid` AS `usuid` from `curso` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `loscursosbuscados`
--

/*!50001 DROP VIEW IF EXISTS `loscursosbuscados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `loscursosbuscados` AS select `curso`.`id_curso` AS `id_curso`,`curso`.`nombre` AS `nombre`,`curso`.`descripcion` AS `descripcion`,`curso`.`costo` AS `costo`,`curso`.`foto` AS `foto`,`curso`.`video` AS `video`,`curso`.`categoriaid` AS `categoriaid`,`curso`.`activo` AS `activo`,`curso`.`fechaCreado` AS `fechaCreado`,`curso`.`usuid` AS `usuid`,`usuario`.`usuario` AS `CreadorCurso` from (`curso` join `usuario` on((`usuario`.`id_usuario` = `curso`.`usuid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `loscursoscarrito`
--

/*!50001 DROP VIEW IF EXISTS `loscursoscarrito`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `loscursoscarrito` AS select `carrito`.`id_carrito` AS `id_carrito`,`curso`.`nombre` AS `NombreCurso`,`curso`.`foto` AS `FotoCurso`,`curso`.`descripcion` AS `DescripcionCurso`,`curso`.`costo` AS `PrecioCurso`,`carrito`.`cursoid` AS `cursoid`,`carrito`.`usuarioid` AS `usuarioid` from (`carrito` join `curso` on((`curso`.`id_curso` = `carrito`.`cursoid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-21 22:04:05
