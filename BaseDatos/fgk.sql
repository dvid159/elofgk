CREATE DATABASE  IF NOT EXISTS `expediente_fgk` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `expediente_fgk`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: expediente_fgk
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `alumno` (
  `carnet_alumno` varchar(15) NOT NULL,
  `id_class` varchar(10) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `foto` mediumblob,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `contrasenha` varchar(25) DEFAULT NULL,
  `codigo_centro_educativo` int(11) NOT NULL,
  `turno_educativo` varchar(1) NOT NULL,
  `estado` bit(1) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`carnet_alumno`),
  KEY `fk-Municipio-Alumno_idx` (`id_municipio`),
  KEY `fk-CentroEducativo-Alumno_idx` (`codigo_centro_educativo`),
  KEY `fk-Class-Alumno_idx` (`id_class`),
  CONSTRAINT `fk-CentroEducativo-Alumno` FOREIGN KEY (`codigo_centro_educativo`) REFERENCES `centro_educativo` (`codigo_centro_educativo`),
  CONSTRAINT `fk-Class-Alumno` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`),
  CONSTRAINT `fk-Municipio-Alumno` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_seccion`
--

DROP TABLE IF EXISTS `alumno_seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `alumno_seccion` (
  `carnet_alumno` varchar(15) NOT NULL,
  `id_seccion` varchar(14) NOT NULL,
  PRIMARY KEY (`carnet_alumno`,`id_seccion`),
  KEY `fk-Seccion-Alumno_idx` (`id_seccion`),
  CONSTRAINT `fk-Alumno-Seccion` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-Seccion-Alumno` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_seccion`
--

LOCK TABLES `alumno_seccion` WRITE;
/*!40000 ALTER TABLE `alumno_seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aptitud`
--

DROP TABLE IF EXISTS `aptitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `aptitud` (
  `id_aptitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_criterio` int(11) NOT NULL,
  `nombre_aptitud` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aptitud`),
  KEY `fk-Criterio-Aptitud_idx` (`id_criterio`),
  CONSTRAINT `fk-Criterio-Aptitud` FOREIGN KEY (`id_criterio`) REFERENCES `criterio` (`id_criterio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aptitud`
--

LOCK TABLES `aptitud` WRITE;
/*!40000 ALTER TABLE `aptitud` DISABLE KEYS */;
INSERT INTO `aptitud` VALUES (2,1,'Tareas'),(3,1,'Asistencia');
/*!40000 ALTER TABLE `aptitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_alumno_centro_educativo`
--

DROP TABLE IF EXISTS `bitacora_alumno_centro_educativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bitacora_alumno_centro_educativo` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `carnet_alumno` varchar(15) NOT NULL,
  `codigo_centro_educativo` int(11) NOT NULL,
  `anho` year(4) NOT NULL,
  `grado_cursado` varchar(25) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `fk-Alumno-BitacoraCentroEducativo_idx` (`carnet_alumno`),
  KEY `fk-CentroEducativo-BitacoraCentroEducativo_idx` (`codigo_centro_educativo`),
  CONSTRAINT `fk-Alumno-BitacoraCentroEducativo` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-CentroEducativo-BitacoraCentroEducativo` FOREIGN KEY (`codigo_centro_educativo`) REFERENCES `centro_educativo` (`codigo_centro_educativo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_alumno_centro_educativo`
--

LOCK TABLES `bitacora_alumno_centro_educativo` WRITE;
/*!40000 ALTER TABLE `bitacora_alumno_centro_educativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora_alumno_centro_educativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Administrador',NULL),(2,'Docente',NULL),(4,'Asistente Administrativo',NULL);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centro_educativo`
--

DROP TABLE IF EXISTS `centro_educativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `centro_educativo` (
  `codigo_centro_educativo` int(11) NOT NULL,
  `nombre_centro_educativo` varchar(75) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `sector` varchar(10) DEFAULT NULL,
  `zona` varchar(10) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_centro_educativo`),
  KEY `fk-Municipio-CentroEscolar_idx` (`id_municipio`),
  CONSTRAINT `fk-Municipio-CentroEscolar` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_educativo`
--

LOCK TABLES `centro_educativo` WRITE;
/*!40000 ALTER TABLE `centro_educativo` DISABLE KEYS */;
INSERT INTO `centro_educativo` VALUES (10239,'INSTITUTO NACIONAL JORGE ELISEO AZUCENA ORTEGA','SEGUNDA AV. NORTE CALLE AL TAZUMAL','24440104',18,'Prueba Movil','Privado','Rural','Complejo Educativo'),(10269,'CENTRO ESCOLAR FRANCISCO IGNACIO CORDERO','FINAL CALLE GENERAL RAMON FLORES ORIENTE','24147163',18,NULL,'Público','Urbano','Centro Escolar'),(10399,'CENTRO ESCOLAR INSA','31 CALLE PONIENTE Y 10A AV. SUR COL. EL PALMAR','24458300',19,'Público','Público','Urbano','Centro Escolar');
/*!40000 ALTER TABLE `centro_educativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `class` (
  `id_class` varchar(10) NOT NULL COMMENT 'Class-2019',
  `anho_ingreso` year(4) NOT NULL,
  `anho_egreso` year(4) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES ('Class-2010',2012,2012,'Clase de Prueba Tres'),('Class-2019',2017,2019,'Clase creada de prueba'),('Class-2020',2018,2020,'Clase de prueba dos.');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterio`
--

DROP TABLE IF EXISTS `criterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `criterio` (
  `id_criterio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_criterio` varchar(25) NOT NULL,
  PRIMARY KEY (`id_criterio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio`
--

LOCK TABLES `criterio` WRITE;
/*!40000 ALTER TABLE `criterio` DISABLE KEYS */;
INSERT INTO `criterio` VALUES (1,'Temple'),(2,'Autocontrol'),(3,'Respeto');
/*!40000 ALTER TABLE `criterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Ahuachapán'),(2,'Santa Ana'),(3,'Sonsonate'),(4,'San Salvador'),(5,'La Libertad'),(6,'San Miguel'),(7,'La Union'),(8,'Cabañas'),(9,'Usulutan'),(10,'Chalatenango'),(11,'La Paz'),(12,'Cuscatlan'),(13,'San Vicente'),(14,'Morazan');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `empleado` (
  `carnet_empleado` varchar(15) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `dui` varchar(11) NOT NULL,
  `nit` varchar(17) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`carnet_empleado`),
  KEY `fk-Cargo-Empleado_idx` (`id_cargo`),
  KEY `fk-Municipio-Empleado_idx` (`id_municipio`),
  CONSTRAINT `fk-Cargo-Empleado` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `fk-Municipio-Empleado` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('PE12012',1,'04884994-3','0000-000000-000-0','Eduardo Enrique','Peña Escalante','M','1994-03-07','72358507','Santa Ana',18,'Prueba');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluaciones`
--

DROP TABLE IF EXISTS `evaluaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `evaluaciones` (
  `id_evaluacion` int(11) NOT NULL COMMENT 'EV001-MAT-2019',
  `id_periodo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `nombre_evaluacion` varchar(45) NOT NULL,
  `porcentaje` decimal(2,0) NOT NULL,
  PRIMARY KEY (`id_evaluacion`),
  KEY `fk-Periodo-Evaluaciones_idx` (`id_periodo`),
  KEY `fk-Materia-Evaluaciones_idx` (`id_materia`),
  CONSTRAINT `fk-Materia-Evaluaciones` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`),
  CONSTRAINT `fk-Periodo-Evaluaciones` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluaciones`
--

LOCK TABLES `evaluaciones` WRITE;
/*!40000 ALTER TABLE `evaluaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluaciones_grupo`
--

DROP TABLE IF EXISTS `evaluaciones_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `evaluaciones_grupo` (
  `id_evaluaciones_grupo` varchar(15) NOT NULL COMMENT 'C1-EV-MAT-2019',
  `id_evaluacion` int(11) NOT NULL,
  `id_grupo_materia` varchar(18) NOT NULL,
  PRIMARY KEY (`id_evaluaciones_grupo`),
  KEY `fk-Evaluacion-Grupo_idx` (`id_evaluacion`),
  KEY `fk-Grupo-Evaluacion_idx` (`id_grupo_materia`),
  CONSTRAINT `fk-Evaluacion-Grupo` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id_evaluacion`),
  CONSTRAINT `fk-Grupo-Evaluacion` FOREIGN KEY (`id_grupo_materia`) REFERENCES `grupo_materia` (`id_grupo_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluaciones_grupo`
--

LOCK TABLES `evaluaciones_grupo` WRITE;
/*!40000 ALTER TABLE `evaluaciones_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluaciones_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado_mined`
--

DROP TABLE IF EXISTS `grado_mined`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `grado_mined` (
  `id_grado_mined` int(11) NOT NULL AUTO_INCREMENT,
  `grado_mined` varchar(45) NOT NULL,
  PRIMARY KEY (`id_grado_mined`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado_mined`
--

LOCK TABLES `grado_mined` WRITE;
/*!40000 ALTER TABLE `grado_mined` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado_mined` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_aptitudinal`
--

DROP TABLE IF EXISTS `grupo_aptitudinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `grupo_aptitudinal` (
  `id_grupo_aptitudinal` int(11) NOT NULL,
  `carnet_empleado` varchar(15) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_seccion` varchar(14) NOT NULL,
  PRIMARY KEY (`id_grupo_aptitudinal`),
  KEY `fk-Aptitud-Empleado_idx` (`carnet_empleado`),
  KEY `fk-Aptitud-Periodo_idx` (`id_periodo`),
  KEY `fk-Aptitud-Seccion_idx` (`id_seccion`),
  CONSTRAINT `fk-Aptitud-Empleado` FOREIGN KEY (`carnet_empleado`) REFERENCES `empleado` (`carnet_empleado`),
  CONSTRAINT `fk-Aptitud-Periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`),
  CONSTRAINT `fk-Aptitud-Seccion` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_aptitudinal`
--

LOCK TABLES `grupo_aptitudinal` WRITE;
/*!40000 ALTER TABLE `grupo_aptitudinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo_aptitudinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_materia`
--

DROP TABLE IF EXISTS `grupo_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `grupo_materia` (
  `id_grupo_materia` varchar(18) NOT NULL COMMENT 'C1-CLASS2019-MAT',
  `id_seccion` varchar(14) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `carnet_empleado` varchar(15) NOT NULL,
  `anho` year(4) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_grupo_materia`),
  KEY `fk-Materia-GrupoMateria_idx` (`id_materia`),
  KEY `fk-Empleado-GrupoMateria_idx` (`carnet_empleado`),
  CONSTRAINT `fk-Empleado-GrupoMateria` FOREIGN KEY (`carnet_empleado`) REFERENCES `empleado` (`carnet_empleado`),
  CONSTRAINT `fk-Materia-GrupoMateria` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_materia`
--

LOCK TABLES `grupo_materia` WRITE;
/*!40000 ALTER TABLE `grupo_materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_cambio_grupo_alumno`
--

DROP TABLE IF EXISTS `log_cambio_grupo_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `log_cambio_grupo_alumno` (
  `carnet_alumno` varchar(15) NOT NULL,
  `id_grupo_materia` varchar(18) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`carnet_alumno`,`id_grupo_materia`,`id_periodo`),
  KEY `fk-Grupo-Log_idx` (`id_grupo_materia`),
  KEY `fk-Periodo-Log_idx` (`id_periodo`),
  CONSTRAINT `fk-Alumno-Log` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-Grupo-Log` FOREIGN KEY (`id_grupo_materia`) REFERENCES `grupo_materia` (`id_grupo_materia`),
  CONSTRAINT `fk-Periodo-Log` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_cambio_grupo_alumno`
--

LOCK TABLES `log_cambio_grupo_alumno` WRITE;
/*!40000 ALTER TABLE `log_cambio_grupo_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_cambio_grupo_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_cambio_grupo_docente`
--

DROP TABLE IF EXISTS `log_cambio_grupo_docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `log_cambio_grupo_docente` (
  `carnet_empleado` varchar(15) NOT NULL,
  `id_grupo_materia` varchar(18) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`carnet_empleado`,`id_grupo_materia`,`id_periodo`),
  KEY `fk--GrupoMateria-Log_idx` (`id_grupo_materia`),
  KEY `fk-Periodo-LogDocente_idx` (`id_periodo`),
  CONSTRAINT `fk-Empleado-Log` FOREIGN KEY (`carnet_empleado`) REFERENCES `empleado` (`carnet_empleado`),
  CONSTRAINT `fk-GrupoMateria-Log` FOREIGN KEY (`id_grupo_materia`) REFERENCES `grupo_materia` (`id_grupo_materia`),
  CONSTRAINT `fk-Periodo-LogDocente` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_cambio_grupo_docente`
--

LOCK TABLES `log_cambio_grupo_docente` WRITE;
/*!40000 ALTER TABLE `log_cambio_grupo_docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_cambio_grupo_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(45) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'Ingles');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `fk-Depatamento-Municipio_idx` (`id_departamento`),
  CONSTRAINT `fk-Depatamento-Municipio` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (18,2,'Chalchuapa'),(19,2,'Santa Ana'),(22,2,'El Congo'),(23,5,'San Salvador');
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_aptitudinal`
--

DROP TABLE IF EXISTS `nota_aptitudinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nota_aptitudinal` (
  `carnet_alumno` varchar(15) NOT NULL,
  `carnet_docente` varchar(14) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_aptitud` int(11) NOT NULL,
  `anho` year(4) NOT NULL,
  `nota` decimal(2,0) NOT NULL,
  PRIMARY KEY (`carnet_alumno`,`anho`,`id_aptitud`,`id_periodo`,`carnet_docente`),
  KEY `fk-NotaAp-Empleado_idx` (`carnet_docente`),
  KEY `fk-NotaAp-Periodo_idx` (`id_periodo`),
  KEY `fk-NotaAp-Aptitud_idx` (`id_aptitud`),
  CONSTRAINT `fk-NotaAp-Alumno` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-NotaAp-Aptitud` FOREIGN KEY (`id_aptitud`) REFERENCES `aptitud` (`id_aptitud`),
  CONSTRAINT `fk-NotaAp-Empleado` FOREIGN KEY (`carnet_docente`) REFERENCES `empleado` (`carnet_empleado`),
  CONSTRAINT `fk-NotaAp-Periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_aptitudinal`
--

LOCK TABLES `nota_aptitudinal` WRITE;
/*!40000 ALTER TABLE `nota_aptitudinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_aptitudinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas_fgk`
--

DROP TABLE IF EXISTS `notas_fgk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `notas_fgk` (
  `carnet_alumno` varchar(15) NOT NULL,
  `id_evaluacion_grupo` varchar(15) NOT NULL,
  `nota` decimal(2,0) NOT NULL,
  PRIMARY KEY (`carnet_alumno`),
  KEY `fk-Evaluacion-Nota_idx` (`id_evaluacion_grupo`),
  CONSTRAINT `fk-Alumno-Nota` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-Evaluacion-Nota` FOREIGN KEY (`id_evaluacion_grupo`) REFERENCES `evaluaciones_grupo` (`id_evaluaciones_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas_fgk`
--

LOCK TABLES `notas_fgk` WRITE;
/*!40000 ALTER TABLE `notas_fgk` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas_fgk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas_mined`
--

DROP TABLE IF EXISTS `notas_mined`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `notas_mined` (
  `id_notas_mined` int(11) NOT NULL AUTO_INCREMENT,
  `carnet_alumno` varchar(15) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `nota` decimal(2,0) NOT NULL,
  PRIMARY KEY (`id_notas_mined`),
  KEY `fk-Alumno-Mined_idx` (`carnet_alumno`),
  KEY `fk-Materia-Mined_idx` (`id_materia`),
  KEY `fk-Periodo-Mined_idx` (`id_periodo`),
  KEY `fk-Grado-Mined_idx` (`id_grado`),
  CONSTRAINT `fk-Alumno-Mined` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-Grado-Mined` FOREIGN KEY (`id_grado`) REFERENCES `grado_mined` (`id_grado_mined`),
  CONSTRAINT `fk-Materia-Mined` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`),
  CONSTRAINT `fk-Periodo-Mined` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas_mined`
--

LOCK TABLES `notas_mined` WRITE;
/*!40000 ALTER TABLE `notas_mined` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas_mined` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocupacion`
--

DROP TABLE IF EXISTS `ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `ocupacion` varchar(45) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocupacion`
--

LOCK TABLES `ocupacion` WRITE;
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(45) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `responsable` (
  `dui` varchar(10) NOT NULL,
  `carnet_alumno` varchar(15) NOT NULL,
  `id_tipo_responsable` int(11) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`dui`),
  KEY `fk-Alumno-Responsable_idx` (`carnet_alumno`),
  KEY `fk-TipoResponsable_idx` (`id_tipo_responsable`),
  KEY `fk-Ocupacion_idx` (`id_ocupacion`),
  CONSTRAINT `fk-Alumno-Responsable` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`),
  CONSTRAINT `fk-Ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`),
  CONSTRAINT `fk-TipoResponsable` FOREIGN KEY (`id_tipo_responsable`) REFERENCES `tipo_responsable` (`id_tipo_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsable`
--

LOCK TABLES `responsable` WRITE;
/*!40000 ALTER TABLE `responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `seccion` (
  `id_seccion` varchar(14) NOT NULL COMMENT 'C1-Class-2019',
  `id_class` varchar(10) NOT NULL,
  `anho` year(4) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_seccion`),
  KEY `fk-Class-Seccion_idx` (`id_class`),
  CONSTRAINT `fk-Class-Seccion` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES ('A1-Class-2020','Class-2020',2020,'Prueba'),('B1-Class-2019','Class-2019',2018,'Prueba');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_responsable`
--

DROP TABLE IF EXISTS `tipo_responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_responsable` (
  `id_tipo_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_responsable` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_responsable`
--

LOCK TABLES `tipo_responsable` WRITE;
/*!40000 ALTER TABLE `tipo_responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_responsable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-07 21:50:57
