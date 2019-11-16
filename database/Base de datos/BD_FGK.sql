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
  `estado` varchar(1) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`carnet_alumno`),
  KEY `fk-Municipio-Alumno_idx` (`id_municipio`),
  KEY `fk-CentroEducativo-Alumno_idx` (`codigo_centro_educativo`),
  KEY `fk-Class-Alumno_idx` (`id_class`),
  CONSTRAINT `fk-CentroEducativo-Alumno` FOREIGN KEY (`codigo_centro_educativo`) REFERENCES `centro_educativo` (`codigo_centro_educativo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Class-Alumno` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Municipio-Alumno` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES ('2017-SA-FT-001','Class-2017','AMITIR','KUMAR','M','2019-08-19',NULL,'77777777','Direccion #5',1,'AMIT@gmail.com',NULL,20070,'0','1',NULL),('2017-SA-FT-002','Class-2017','ANIRUDH','GUPTA','F','2019-08-19',NULL,'77777777','Direccion #6',1,'GUPTA@gmail.com',NULL,20070,'0','1',NULL),('2017-SA-FT-003','Class-2017','ANUJ ','GARGAVA','F','2019-08-19',NULL,'77777777','Direccion #7',1,'ANUJ@gmail.com','',10399,'0','1',NULL),('2017-SA-FT-004','Class-2017','APOORV','AGARWAL','M','2019-08-19',NULL,'77777777','Direccion #8',1,'AGARWAL@gmail.com',NULL,10399,'0','1',NULL),('2017-SA-FT-005','Class-2017','ASHOK','KUMAR MEENA','M','2019-08-19',NULL,'77777777','Direccion #9',1,'MEENA@gmail.com',NULL,20070,'0','1',NULL),('2018-SA-FT-001','Class-2018','BHOLE','SHRIKANT','M','2019-08-19',NULL,'77777777','Direccion #10',1,'BHOLE@gmail.com',NULL,20070,'0','1',NULL),('2018-SA-FT-002','Class-2018','GAURAV','BABLE','F','2019-08-19',NULL,'77777777','Direccion #11',1,'BABLE@gmail.com',NULL,20070,'0','1',NULL),('2018-SA-FT-003','Class-2018','GHULE ','SUHAS','M','2019-08-19',NULL,'77777777','Direccion #12',1,'SHUHAS@gmal.com',NULL,20058,'0','1',NULL),('2018-SA-FT-004','Class-2018','HUNAID ALI','SHAKKAR WALA','M','2019-08-19',NULL,'77777777','Direccion #13',1,'WALA@gmail.com',NULL,20058,'0','1',NULL),('2018-SA-FT-005','Class-2018','KARAN ','BAGADIYA','M','2019-08-19',NULL,'77777777','Direccion #14',1,'BAGADIYA@gmail.com',NULL,20070,'0','1',NULL),('2019-SA-FT-001','Class-2019','ABHIMANYU','SINGH','M','1997-06-22',NULL,'77774444','ABSLKJDBLAKSHDKJSBDKF',1,'email1@gmail.com',NULL,20058,'0','1',NULL),('2019-SA-FT-002','Class-2019','ABHISEF','SHARAK','F','1995-08-21',NULL,'77774444','KJBLDKFBLSKDBFLSHD',1,'email2@gmail.com',NULL,20058,'0','1',NULL),('2019-SA-FT-003','Class-2019','AJAYPAL','SHINGY','M','1994-04-17',NULL,'22222222','SBKDJBFLKSDBLFKDSB',1,'email3@hotmail.com',NULL,20070,'0','1',NULL),('2019-SA-FT-004','Class-2019','AKSHAY','CRAWLA','F','1996-06-25',NULL,'77771111','LKJABLFKSJDBFJSKDB',1,'email4@hotmail.es',NULL,20070,'0','1',NULL),('2019-SA-FT-005','Class-2019','scizer','execsure','f','2019-07-10',NULL,'77777777','direccion de jhoto',1,'infor2@gmail.com',NULL,20070,'0','1',NULL);
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
  `flotante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`carnet_alumno`,`id_seccion`),
  KEY `fk-Seccion-Alumno_idx` (`id_seccion`),
  CONSTRAINT `fk-Alumno-Seccion` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Seccion-Alumno` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_seccion`
--

LOCK TABLES `alumno_seccion` WRITE;
/*!40000 ALTER TABLE `alumno_seccion` DISABLE KEYS */;
INSERT INTO `alumno_seccion` VALUES ('2019-SA-FT-001','A1-Class-2019','0'),('2019-SA-FT-002','A2-Class-2019','0'),('2019-SA-FT-003','A1-Class-2019','0'),('2019-SA-FT-004','A1-Class-2019','0'),('2019-SA-FT-005','A1-Class-2019','0');
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
  CONSTRAINT `fk-Criterio-Aptitud` FOREIGN KEY (`id_criterio`) REFERENCES `criterio` (`id_criterio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aptitud`
--

LOCK TABLES `aptitud` WRITE;
/*!40000 ALTER TABLE `aptitud` DISABLE KEYS */;
INSERT INTO `aptitud` VALUES (1,1,'Puntual'),(2,1,'Tareas'),(3,1,'Asistencia'),(4,1,'vestimenta'),(6,1,'vestimenta'),(7,1,'vestimenta'),(8,1,'vestimenta');
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
  CONSTRAINT `fk-Alumno-BitacoraCentroEducativo` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-CentroEducativo-BitacoraCentroEducativo` FOREIGN KEY (`codigo_centro_educativo`) REFERENCES `centro_educativo` (`codigo_centro_educativo`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Docente',NULL),(2,'Administrador',NULL),(3,'Ayudante de Administracion',NULL);
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
  CONSTRAINT `fk-Municipio-CentroEscolar` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_educativo`
--

LOCK TABLES `centro_educativo` WRITE;
/*!40000 ALTER TABLE `centro_educativo` DISABLE KEYS */;
INSERT INTO `centro_educativo` VALUES (10399,'Centro Escolar INSA','10° AVENIDA SUR Y 31° CALLE PONIENTE COLONIA EL PALMAR','24458300',1,NULL,'Público','Urbano','Centro Escolar'),(20058,'COLEGIO SALESIANO SAN JOSE','CALLE SALESIANO SAN JOSE, SOBRE FINAL 17 AV SUR','24860800',1,NULL,'Privado','Rural','Complejo Educativo'),(20061,'Liceo Latinoamericano','21 calle pte. entre 12 y 14 av. sur','24405055',1,NULL,'Privado','Urbano','Complejo Educativo'),(20070,'Liseo San Luis','FINAL AVENIDA FRAY FELIPE DE JESUS MORAGA SUR COLONIA SAN LUIS','24010600',1,NULL,'Privado','Urbano','Complejo Educativo'),(20080,'Colegio Santa María','AVENIDA INDEPENDENCIA SUR, 37 CALLE ORIENTE','24401490',1,NULL,'Privado','Urbano','Centro Escolar');
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
INSERT INTO `class` VALUES ('Class-2013',2013,2015,NULL),('Class-2014',2014,2016,NULL),('Class-2015',2015,2017,NULL),('Class-2016',2016,2018,NULL),('Class-2017',2017,2019,NULL),('Class-2018',2018,2020,NULL),('Class-2019',2019,2021,NULL),('Class-2021',2021,2023,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio`
--

LOCK TABLES `criterio` WRITE;
/*!40000 ALTER TABLE `criterio` DISABLE KEYS */;
INSERT INTO `criterio` VALUES (1,'Temple'),(2,'Autocontrol'),(3,'Inteligencia social'),(4,'Respeto'),(5,'Agradecimiento'),(6,'Curiosidad'),(7,'Entusiasmo'),(8,'Optimimo');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Santa Ana'),(2,'San Salvador'),(3,'La Libertad'),(4,'Ahuachapan'),(5,'Sonsonate'),(6,'Chalatenango'),(7,'San Miguel'),(8,'La Union'),(9,'San Vicente'),(10,'La Paz'),(11,'Morazan'),(12,'Cabañas'),(13,'Cuscatlan'),(18,'Usulután');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `docentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_editor` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `docentes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` VALUES (1,'docente1','docente1@gmail.om','$2y$10$zBHdwagBaAm.CJOfo7HQceuTGH0P01YcAxNNKgfs4YJWUAD4ejArO',0,NULL,'2019-10-10 21:40:07','2019-10-10 21:40:07'),(2,'docente2','docente2@gmail.com','$2y$10$K615ZTAxggXOGj/XeJzJQOqHX/HyyhbbTDMGODwHwRnstOezmzQZq',0,NULL,'2019-10-10 21:40:30','2019-10-10 21:40:30');
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
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
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`carnet_empleado`),
  UNIQUE KEY `dui_UNIQUE` (`dui`),
  UNIQUE KEY `nit_UNIQUE` (`nit`),
  KEY `fk-Cargo-Empleado_idx` (`id_cargo`),
  KEY `fk-Municipio-Empleado_idx` (`id_municipio`),
  CONSTRAINT `fk-Cargo-Empleado` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Municipio-Empleado` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('fg12004',2,'04867795-6','0210-121093-102-1','David','Fuentes','M','2019-10-12','78799763','col. la matepec calle ppal zona a',1,NULL,1),('PE12012',1,'005101748-6','0210-211987-102-1','Eduardo','Peña','M','2019-11-06','77777777','direccion de Peña',1,NULL,1),('SS11013',2,'00510174-4','0210-220693-102-1','Nelson Alfredo','Salazar Salazar','M','1993-06-22','70383398','26 av sur entre 45 y 47 calle poniente',1,NULL,1);
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
  CONSTRAINT `fk-Materia-Evaluaciones` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Periodo-Evaluaciones` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk-Evaluacion-Grupo` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Grupo-Evaluacion` FOREIGN KEY (`id_grupo_materia`) REFERENCES `grupo_materia` (`id_grupo_materia`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado_mined`
--

LOCK TABLES `grado_mined` WRITE;
/*!40000 ALTER TABLE `grado_mined` DISABLE KEYS */;
INSERT INTO `grado_mined` VALUES (1,'NOVENO'),(2,'PRIMER AÑO'),(3,'SEGUNDO AÑO');
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
  CONSTRAINT `fk-Aptitud-Empleado` FOREIGN KEY (`carnet_empleado`) REFERENCES `empleado` (`carnet_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Aptitud-Periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Aptitud-Seccion` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk-Empleado-GrupoMateria` FOREIGN KEY (`carnet_empleado`) REFERENCES `empleado` (`carnet_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Materia-GrupoMateria` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_materia`
--

LOCK TABLES `grupo_materia` WRITE;
/*!40000 ALTER TABLE `grupo_materia` DISABLE KEYS */;
INSERT INTO `grupo_materia` VALUES ('A1-Class-2020-FOR','A1-Class-2020',3,'SS11013',2019,NULL),('A1-Class-2020-ING','A1-Class-2020',1,'fg12004',2019,NULL),('B1-Class-2019-COM','B1-Class-2019',4,'SS11013',2020,NULL);
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
  CONSTRAINT `fk-Alumno-Log` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Grupo-Log` FOREIGN KEY (`id_grupo_materia`) REFERENCES `grupo_materia` (`id_grupo_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Periodo-Log` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk-Empleado-Log` FOREIGN KEY (`carnet_empleado`) REFERENCES `empleado` (`carnet_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-GrupoMateria-Log` FOREIGN KEY (`id_grupo_materia`) REFERENCES `grupo_materia` (`id_grupo_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Periodo-LogDocente` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'Ingles'),(2,'Matematica'),(3,'Formacion Linguistica'),(4,'Computacion'),(5,'Valores'),(6,'Lenguaje y Literatura'),(7,'Ciencias Naturales'),(8,'Estudios Sociales');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_100000_create_password_resets_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  CONSTRAINT `fk-Depatamento-Municipio` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,1,'Santa ana'),(2,1,'Chalchuapa'),(3,1,'Ahuachapan'),(6,1,'Metapan'),(7,1,'Candelaria de la Frontera'),(8,1,'El congo'),(9,2,'Santa Tecla');
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
  CONSTRAINT `fk-NotaAp-Alumno` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-NotaAp-Aptitud` FOREIGN KEY (`id_aptitud`) REFERENCES `aptitud` (`id_aptitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-NotaAp-Empleado` FOREIGN KEY (`carnet_docente`) REFERENCES `empleado` (`carnet_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-NotaAp-Periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk-Alumno-Nota` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Evaluacion-Nota` FOREIGN KEY (`id_evaluacion_grupo`) REFERENCES `evaluaciones_grupo` (`id_evaluaciones_grupo`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk-Alumno-Mined` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Grado-Mined` FOREIGN KEY (`id_grado`) REFERENCES `grado_mined` (`id_grado_mined`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Materia-Mined` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Periodo-Mined` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas_mined`
--

LOCK TABLES `notas_mined` WRITE;
/*!40000 ALTER TABLE `notas_mined` DISABLE KEYS */;
INSERT INTO `notas_mined` VALUES (153,'2019-SA-FT-001',1,2,1,1),(154,'2019-SA-FT-001',1,7,1,2),(155,'2019-SA-FT-001',1,8,1,3),(156,'2019-SA-FT-001',1,6,1,4),(157,'2019-SA-FT-001',2,2,1,5),(158,'2019-SA-FT-001',2,7,1,6),(159,'2019-SA-FT-001',2,8,1,7),(160,'2019-SA-FT-001',2,6,1,8),(165,'2019-SA-FT-001',1,2,2,9),(166,'2019-SA-FT-001',1,7,2,9),(167,'2019-SA-FT-001',1,8,2,9),(168,'2019-SA-FT-001',1,6,2,9),(169,'2019-SA-FT-002',1,2,1,7),(170,'2019-SA-FT-002',1,7,1,7),(171,'2019-SA-FT-002',1,8,1,7),(172,'2019-SA-FT-002',1,6,1,7),(205,'2019-SA-FT-003',1,2,1,1),(206,'2019-SA-FT-003',1,7,1,3),(207,'2019-SA-FT-003',1,8,1,5),(208,'2019-SA-FT-003',1,6,1,7),(209,'2019-SA-FT-002',2,2,1,8),(210,'2019-SA-FT-002',2,7,1,9),(211,'2019-SA-FT-002',2,8,1,4),(212,'2019-SA-FT-002',2,6,1,6),(213,'2019-SA-FT-001',3,2,1,7),(214,'2019-SA-FT-001',3,7,1,7),(215,'2019-SA-FT-001',3,8,1,7),(216,'2019-SA-FT-001',3,6,1,7),(217,'2019-SA-FT-003',2,2,1,6),(218,'2019-SA-FT-003',2,7,1,6),(219,'2019-SA-FT-003',2,8,1,6),(220,'2019-SA-FT-003',2,6,1,6),(221,'2019-SA-FT-003',3,2,1,8),(222,'2019-SA-FT-003',3,7,1,7),(223,'2019-SA-FT-003',3,8,1,8),(224,'2019-SA-FT-003',3,6,1,7),(225,'2019-SA-FT-004',1,2,1,7),(226,'2019-SA-FT-004',1,7,1,9),(227,'2019-SA-FT-004',1,8,1,6),(228,'2019-SA-FT-004',1,6,1,5),(229,'2019-SA-FT-002',3,2,1,5),(230,'2019-SA-FT-002',3,7,1,4),(231,'2019-SA-FT-002',3,8,1,3),(232,'2019-SA-FT-002',3,6,1,1),(233,'2019-SA-FT-001',4,2,1,9),(234,'2019-SA-FT-001',4,7,1,8),(235,'2019-SA-FT-001',4,8,1,6),(236,'2019-SA-FT-001',4,6,1,7),(237,'2019-SA-FT-002',4,2,1,9),(238,'2019-SA-FT-002',4,7,1,4),(239,'2019-SA-FT-002',4,8,1,7),(240,'2019-SA-FT-002',4,6,1,8),(249,'2018-SA-FT-001',1,2,2,8),(250,'2018-SA-FT-001',1,7,2,7),(251,'2018-SA-FT-001',1,8,2,9),(252,'2018-SA-FT-001',1,6,2,8),(253,'2018-SA-FT-001',2,2,2,9),(254,'2018-SA-FT-001',2,7,2,7),(255,'2018-SA-FT-001',2,8,2,8),(256,'2018-SA-FT-001',2,6,2,7),(257,'2018-SA-FT-001',3,2,2,7),(258,'2018-SA-FT-001',3,7,2,9),(259,'2018-SA-FT-001',3,8,2,8),(260,'2018-SA-FT-001',3,6,2,9),(261,'2017-SA-FT-001',1,2,1,8),(262,'2017-SA-FT-001',1,7,1,8),(263,'2017-SA-FT-001',1,8,1,8),(264,'2017-SA-FT-001',1,6,1,9),(265,'2017-SA-FT-001',2,2,1,9),(266,'2017-SA-FT-001',2,7,1,9),(267,'2017-SA-FT-001',2,8,1,9),(268,'2017-SA-FT-001',2,6,1,9),(269,'2017-SA-FT-001',3,2,1,8),(270,'2017-SA-FT-001',3,7,1,7),(271,'2017-SA-FT-001',3,8,1,7),(272,'2017-SA-FT-001',3,6,1,7),(273,'2017-SA-FT-001',4,2,1,8),(274,'2017-SA-FT-001',4,7,1,9),(275,'2017-SA-FT-001',4,8,1,4),(276,'2017-SA-FT-001',4,6,1,7),(277,'2017-SA-FT-001',1,2,2,9),(278,'2017-SA-FT-001',1,7,2,9),(279,'2017-SA-FT-001',1,8,2,9),(280,'2017-SA-FT-001',1,6,2,8),(281,'2017-SA-FT-001',2,2,2,8),(282,'2017-SA-FT-001',2,7,2,9),(283,'2017-SA-FT-001',2,8,2,9),(284,'2017-SA-FT-001',2,6,2,8),(285,'2017-SA-FT-001',3,2,2,7),(286,'2017-SA-FT-001',3,7,2,8),(287,'2017-SA-FT-001',3,8,2,8),(288,'2017-SA-FT-001',3,6,2,9),(289,'2017-SA-FT-001',4,2,2,7),(290,'2017-SA-FT-001',4,7,2,7),(291,'2017-SA-FT-001',4,8,2,7),(292,'2017-SA-FT-001',4,6,2,7),(293,'2017-SA-FT-001',1,2,3,8),(294,'2017-SA-FT-001',1,7,3,9),(295,'2017-SA-FT-001',1,8,3,5),(296,'2017-SA-FT-001',1,6,3,7),(297,'2017-SA-FT-001',2,2,3,8),(298,'2017-SA-FT-001',2,7,3,7),(299,'2017-SA-FT-001',2,8,3,6),(300,'2017-SA-FT-001',2,6,3,7),(301,'2017-SA-FT-001',3,2,3,7),(302,'2017-SA-FT-001',3,7,3,6),(303,'2017-SA-FT-001',3,8,3,8),(304,'2017-SA-FT-001',3,6,3,7),(305,'2017-SA-FT-001',4,2,3,7),(306,'2017-SA-FT-001',4,7,3,7),(307,'2017-SA-FT-001',4,8,3,7),(308,'2017-SA-FT-001',4,6,3,7),(309,'2017-SA-FT-002',1,2,1,8),(310,'2017-SA-FT-002',1,7,1,10),(311,'2017-SA-FT-002',1,8,1,6),(312,'2017-SA-FT-002',1,6,1,6),(313,'2017-SA-FT-002',2,2,1,7),(314,'2017-SA-FT-002',2,7,1,9),(315,'2017-SA-FT-002',2,8,1,6),(316,'2017-SA-FT-002',2,6,1,6),(317,'2017-SA-FT-002',3,2,1,7),(318,'2017-SA-FT-002',3,7,1,9),(319,'2017-SA-FT-002',3,8,1,6),(320,'2017-SA-FT-002',3,6,1,6),(321,'2017-SA-FT-002',4,2,1,7),(322,'2017-SA-FT-002',4,7,1,5),(323,'2017-SA-FT-002',4,8,1,4),(324,'2017-SA-FT-002',4,6,1,6),(325,'2017-SA-FT-002',1,2,2,8),(326,'2017-SA-FT-002',1,7,2,9),(327,'2017-SA-FT-002',1,8,2,7),(328,'2017-SA-FT-002',1,6,2,7),(329,'2017-SA-FT-002',2,2,2,8),(330,'2017-SA-FT-002',2,7,2,7),(331,'2017-SA-FT-002',2,8,2,7),(332,'2017-SA-FT-002',2,6,2,7),(333,'2017-SA-FT-002',3,2,2,9),(334,'2017-SA-FT-002',3,7,2,8),(335,'2017-SA-FT-002',3,8,2,8),(336,'2017-SA-FT-002',3,6,2,8),(337,'2017-SA-FT-002',4,2,2,7),(338,'2017-SA-FT-002',4,7,2,7),(339,'2017-SA-FT-002',4,8,2,8),(340,'2017-SA-FT-002',4,6,2,9),(341,'2017-SA-FT-002',1,2,3,7),(342,'2017-SA-FT-002',1,7,3,7),(343,'2017-SA-FT-002',1,8,3,8),(344,'2017-SA-FT-002',1,6,3,9),(345,'2017-SA-FT-002',2,2,3,9),(346,'2017-SA-FT-002',2,7,3,8),(347,'2017-SA-FT-002',2,8,3,7),(348,'2017-SA-FT-002',2,6,3,9),(349,'2017-SA-FT-002',3,2,3,8),(350,'2017-SA-FT-002',3,7,3,8),(351,'2017-SA-FT-002',3,8,3,9),(352,'2017-SA-FT-002',3,6,3,8),(353,'2017-SA-FT-002',4,2,3,7),(354,'2017-SA-FT-002',4,7,3,7),(355,'2017-SA-FT-002',4,8,3,7),(356,'2017-SA-FT-002',4,6,3,8),(357,'2017-SA-FT-002',1,2,3,8),(358,'2017-SA-FT-002',1,7,3,10),(359,'2017-SA-FT-002',1,8,3,4),(360,'2017-SA-FT-002',1,6,3,5);
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` VALUES (1,'Uno',NULL),(2,'Dos',NULL),(3,'Tres',NULL),(4,'Cuatro',NULL);
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
  CONSTRAINT `fk-Alumno-Responsable` FOREIGN KEY (`carnet_alumno`) REFERENCES `alumno` (`carnet_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-Ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-TipoResponsable` FOREIGN KEY (`id_tipo_responsable`) REFERENCES `tipo_responsable` (`id_tipo_responsable`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk-Class-Seccion` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES ('A1-Class-2013','Class-2013',2013,NULL),('A1-Class-2017','Class-2017',2019,NULL),('A1-Class-2018','Class-2018',2019,NULL),('A1-Class-2019','Class-2019',2019,NULL),('A2-Class-2017','Class-2017',2019,NULL),('A2-Class-2018','Class-2018',2019,NULL),('A2-Class-2019','Class-2019',2019,NULL),('B1-Class-2013','Class-2013',2013,NULL),('B1-Class-2019','Class-2019',2019,'Prueba');
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

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carnet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `is_docente` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_carnet_unique` (`carnet`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Alfredo','ss11013','ss11013@gmail.com',NULL,1,0,'$2y$10$e0Jin2CvErIxAiz8.l7U5.n64MC3E/mF6Nour1cWdkjg4BwtXx/Du',NULL,'2019-11-01 02:50:50','2019-11-01 02:50:50'),(2,'David','fg12004','fg12004@gmail.com',NULL,1,0,'$2y$10$Jn1eODgD8GWrV0jnWAT8r.loUf5bZF2qj68c5FH1e02G3DJ49H9Zi',NULL,'2019-11-01 02:50:50','2019-11-01 02:50:50'),(5,'Eduardo','pe12012','pe12000@gmail.com',NULL,1,0,'$2y$10$9gIJufXI.DA7EVamGrHSleslOH6bKDMM32rA1.t6iZDjn76GCS9m2',NULL,'2019-11-01 02:52:14','2019-11-01 02:52:14'),(6,'Docente','dc11013','docente1@gmail.com',NULL,0,1,'$2y$10$K0xr8H5kZchFUUkUeTdedu54DlVzmdSeUhuSKlQ2cEuc0QWnn.wVS',NULL,'2019-11-01 02:52:14','2019-11-01 02:52:14'),(7,'User','us11013','user1@gmail.com',NULL,0,0,'$2y$10$ORYic8BvH840Wrd4ZLmAJeP.cxdRr6U34UhYHghYem98gS0w/bmna',NULL,'2019-11-01 02:52:14','2019-11-01 02:52:14'),(8,'abhiman','2019-SA-FT-001','user2@gmail.com',NULL,0,0,'$2y$10$MpL4r4wNTvehbs22FKpZmusgN.1tj.JUfjhza5GZ6skpjsGfgAVCK',NULL,'2019-11-07 21:53:47','2019-11-07 21:53:47'),(9,'alfredo2','2019-SA-FT-006','pruebaemail@gmail.com',NULL,0,0,'$2y$10$B46nGkGQiyvCE9Da80cFne0YDpQMgAR2MighUhs.C2Py3Peh9hx22',NULL,'2019-11-15 03:01:20','2019-11-15 03:01:20'),(11,'Edwin','ES13013','emaildocente2@gmail.com',NULL,0,1,'$2y$10$BGkEkx3.1I9YJ0tkS5oW0eF1nzOJ89IlDXuCvz.JiBT22pKz30gUG',NULL,'2019-11-15 03:14:42','2019-11-15 03:14:42'),(13,'Asistente1','AA13025','edocente2@gmail.com',NULL,1,1,'$2y$10$e/5BAhE6llSLD1sgh0RiWOx1ZueeTQ1muDJF3tuP3Nnf9A0L79/DS',NULL,'2019-11-15 03:27:13','2019-11-15 03:27:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'expediente_fgk'
--

--
-- Dumping routines for database 'expediente_fgk'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-16 12:20:31
