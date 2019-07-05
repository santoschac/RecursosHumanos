-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bdrecursoshumanos
-- ------------------------------------------------------
-- Server version	5.7.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignarjornada`
--

DROP TABLE IF EXISTS `asignarjornada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignarjornada` (
  `IdAsignarJornada` int(11) NOT NULL AUTO_INCREMENT,
  `IdPersonal` int(11) NOT NULL,
  `IdJornada` int(11) NOT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`IdAsignarJornada`),
  KEY `RefJornada18` (`IdJornada`),
  KEY `RefPersonal17` (`IdPersonal`),
  CONSTRAINT `RefJornada18` FOREIGN KEY (`IdJornada`) REFERENCES `jornada` (`IdJornada`),
  CONSTRAINT `RefPersonal17` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignarjornada`
--

LOCK TABLES `asignarjornada` WRITE;
/*!40000 ALTER TABLE `asignarjornada` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignarjornada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bonos`
--

DROP TABLE IF EXISTS `bonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonos` (
  `IdBono` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Monto` varchar(15) DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  PRIMARY KEY (`IdBono`),
  KEY `RefPersonal24` (`IdPersonal`),
  CONSTRAINT `RefPersonal24` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonos`
--

LOCK TABLES `bonos` WRITE;
/*!40000 ALTER TABLE `bonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `bonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambios`
--

DROP TABLE IF EXISTS `cambios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cambios` (
  `IdCambio` int(11) NOT NULL AUTO_INCREMENT,
  `FechaInicio` datetime DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdPuesto` int(11) NOT NULL,
  `Descripcion` varchar(230) DEFAULT NULL,
  PRIMARY KEY (`IdCambio`),
  KEY `RefSucursal21` (`IdSucursal`),
  KEY `RefPuestos22` (`IdPuesto`),
  KEY `RefPersonal3` (`IdPersonal`),
  CONSTRAINT `RefPersonal3` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`),
  CONSTRAINT `RefPuestos22` FOREIGN KEY (`IdPuesto`) REFERENCES `puestos` (`IdPuesto`),
  CONSTRAINT `RefSucursal21` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursal` (`IdSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambios`
--

LOCK TABLES `cambios` WRITE;
/*!40000 ALTER TABLE `cambios` DISABLE KEYS */;
/*!40000 ALTER TABLE `cambios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitacion`
--

DROP TABLE IF EXISTS `capacitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitacion` (
  `IdCapacitacion` int(11) NOT NULL AUTO_INCREMENT,
  `Evaluacion` varchar(100) DEFAULT NULL,
  `FechaCapacitacion` datetime DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  PRIMARY KEY (`IdCapacitacion`),
  KEY `RefPersonal4` (`IdPersonal`),
  KEY `RefCursos10` (`IdCurso`),
  CONSTRAINT `RefCursos10` FOREIGN KEY (`IdCurso`) REFERENCES `cursos` (`IdCurso`),
  CONSTRAINT `RefPersonal4` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitacion`
--

LOCK TABLES `capacitacion` WRITE;
/*!40000 ALTER TABLE `capacitacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `capacitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(35) DEFAULT NULL,
  `DescripcionCurso` varchar(200) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`IdCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Curso Administración de Proyectos','Descripcion','Interna','2019-05-31 00:00:00'),(2,'Curso Administración ','Descripcion','Interna','2019-05-31 00:00:00'),(3,'Curso Administración','Descripcion','Interna','2019-05-31 00:00:00'),(4,'Curso Análisis ','Descripcion','Interna','2019-05-31 00:00:00'),(5,'Curso Balanced Scorecard','Descripcion','Interna','2019-05-31 00:00:00'),(6,'Curso Cómo Entrevistar','Descripcion','Interna','2019-05-31 00:00:00'),(7,'Curso Desarrollo','Descripcion','Interna','2019-05-31 00:00:00'),(8,'Curso Evaluación ','Descripcion','Interna','2019-05-31 00:00:00'),(9,'Curso Habilidades de Supervisión','Descripcion','Interna','2019-05-31 00:00:00'),(10,'Curso Liderazgo Efectivo','Descripcion','Interna','2019-05-31 00:00:00'),(11,'Curso Los 7 Elementos ','Descripcion','Interna','2019-05-31 00:00:00'),(12,'Curso Planeación Estratégica','Descripcion','Interna','2019-05-31 00:00:00'),(13,'Curso Programa Intensivo ','Descripcion','Interna','2019-05-31 00:00:00'),(14,'Curso Técnicas de Coaching ','Descripcion','Interna','2019-05-31 00:00:00'),(15,'Curso Técnicas de Negociación','Descripcion','Interna','2019-05-31 00:00:00');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEmpresa` varchar(30) DEFAULT NULL,
  `ClaveEmpresa` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`IdEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Almacen','APZ'),(2,'Alpina','ALP'),(3,'Alumayab','DAM'),(4,'Alumik','ALU'),(5,'Argentum','AME'),(6,'Armadora','AMA'),(7,'Circuito','CIR'),(8,'Herramax','HER'),(9,'Mayalum','AVM'),(10,'Valsi','VAL'),(11,'LaViga','VVI');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `IdEstado` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(40) DEFAULT NULL,
  `IDPais` int(11) NOT NULL,
  PRIMARY KEY (`IdEstado`),
  KEY `RefPais8` (`IDPais`),
  CONSTRAINT `RefPais8` FOREIGN KEY (`IDPais`) REFERENCES `pais` (`IDPais`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Yucatán',1),(2,'Quintana Roo',1),(3,'Campeche',1),(4,'Tabasco',1),(5,'Veracruz',1),(6,'Chiapas',1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incapacidad`
--

DROP TABLE IF EXISTS `incapacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incapacidad` (
  `IdIncapacidad` int(11) NOT NULL AUTO_INCREMENT,
  `DiaInicio` datetime DEFAULT NULL,
  `DiaFinal` datetime DEFAULT NULL,
  `Descripcion` char(10) DEFAULT NULL,
  `Documento` varchar(70) DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  PRIMARY KEY (`IdIncapacidad`),
  KEY `RefPersonal23` (`IdPersonal`),
  CONSTRAINT `RefPersonal23` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incapacidad`
--

LOCK TABLES `incapacidad` WRITE;
/*!40000 ALTER TABLE `incapacidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `incapacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencias` (
  `IdIncidencias` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(300) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Reporta` varchar(100) DEFAULT NULL,
  `Autoriza` varchar(100) DEFAULT NULL,
  `Accidentes` varchar(30) DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  PRIMARY KEY (`IdIncidencias`),
  KEY `RefPersonal1` (`IdPersonal`),
  CONSTRAINT `RefPersonal1` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornada`
--

DROP TABLE IF EXISTS `jornada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jornada` (
  `IdJornada` int(11) NOT NULL AUTO_INCREMENT,
  `FechaInicio` varchar(30) DEFAULT NULL,
  `FechaFin` varchar(30) DEFAULT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraFin` time DEFAULT NULL,
  PRIMARY KEY (`IdJornada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornada`
--

LOCK TABLES `jornada` WRITE;
/*!40000 ALTER TABLE `jornada` DISABLE KEYS */;
/*!40000 ALTER TABLE `jornada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `IDPais` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePais` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`IDPais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'Mexico');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `IdPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `Dia` datetime DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Devolucion` varchar(100) DEFAULT NULL,
  `Estatus` varchar(30) DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  PRIMARY KEY (`IdPermiso`),
  KEY `RefPersonal25` (`IdPersonal`),
  CONSTRAINT `RefPersonal25` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (2,'2019-07-05 00:00:00','fff','Devolución de días','Aprobado',10),(18,'2019-07-05 00:00:00','bcbcbnmjhj','Cuenta de vacaciones','Aprobado',10);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `IdPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(60) DEFAULT NULL,
  `ApellidoMaterno` varchar(60) DEFAULT NULL,
  `Curp` varchar(20) DEFAULT NULL,
  `Tipo` varchar(60) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Colonia` varchar(150) DEFAULT NULL,
  `Delegacion` varchar(150) DEFAULT NULL,
  `CodigoPostal` int(11) DEFAULT NULL,
  `Rfc` varchar(200) DEFAULT NULL,
  `Imss` varchar(70) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `NivelAcademico` varchar(70) DEFAULT NULL,
  `Sexo` varchar(15) DEFAULT NULL,
  `EstadoCivil` varchar(50) DEFAULT NULL,
  `Hijos` varchar(10) DEFAULT NULL,
  `Padre` varchar(90) DEFAULT NULL,
  `Madre` varchar(90) DEFAULT NULL,
  `Departamento` varchar(60) DEFAULT NULL,
  `SueldoDiario` decimal(10,0) DEFAULT NULL,
  `SueldoAnterior` decimal(10,0) DEFAULT NULL,
  `SueldoActual` decimal(10,0) DEFAULT NULL,
  `FechaBaja` datetime DEFAULT NULL,
  `ConceptoBaja` varchar(70) DEFAULT NULL,
  `FechaAlta` datetime DEFAULT NULL,
  `FechaAntiguedad` datetime DEFAULT NULL,
  `UltimaModificacion` datetime DEFAULT NULL,
  `TipoContrato` varchar(70) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `IdPuesto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdPoblacion` int(11) NOT NULL,
  PRIMARY KEY (`IdPersonal`),
  KEY `RefPuestos7` (`IdPuesto`),
  KEY `RefUsuario11` (`IdUsuario`),
  KEY `RefSucursal15` (`IdSucursal`),
  KEY `RefPoblacion16` (`IdPoblacion`),
  CONSTRAINT `RefPoblacion16` FOREIGN KEY (`IdPoblacion`) REFERENCES `poblacion` (`IdPoblacion`),
  CONSTRAINT `RefPuestos7` FOREIGN KEY (`IdPuesto`) REFERENCES `puestos` (`IdPuesto`),
  CONSTRAINT `RefSucursal15` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursal` (`IdSucursal`),
  CONSTRAINT `RefUsuario11` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'Angel Jesus','Perez','Cazanova',NULL,'Empleado','65 B No 334 X 8 Y 10','Fraccionamiento Villas Oriente','Merida',97160,NULL,NULL,NULL,NULL,'Masculino','Soltero(a)',NULL,NULL,NULL,'Centro Aluminio',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,2,1,1),(2,'Aidee Marisela','Cauich','Cauich',NULL,'Empleado','REG 515 MZA 8 LOTE 17 C 54','Benito Juarez','Benito Juarez',77516,NULL,NULL,NULL,NULL,'Masculino','Soltero(a)',NULL,NULL,NULL,'Coordinadores',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,3,1,1),(3,'Eric Fernando','Euan','Toledano',NULL,'Empleado','Calle 23 A Por 14 y 16  Diag 235','Fracc Pinos del Norte','Merida',97138,NULL,NULL,NULL,NULL,'Masculino','Casado(a)',NULL,'Fernando Euan Alonzo','Blanca Estela Toledano Herrera','Oficina',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,4,1,1),(4,'Ana Gabriela','Castillo','Dorantes',NULL,'Empleado','Calle 77 No 502 x 50 y 54','Fracc Pacabtun','Merida',97160,NULL,NULL,NULL,NULL,'Femenino','Soltero(a)',NULL,'Esteban Castillo Mendoza','Aurora Dorantes Chuc','Oficina',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,5,1,1),(5,'Francisco Odilon','Cauich','Borges',NULL,'Empleado','Calle 24 No 99 A x 21 y 19','Mococha','Mococha',97454,NULL,NULL,NULL,NULL,'Masculino','Soltero(a)',NULL,'Pascual Odilon Cauich Martinez','Maria Isabel Borges Canche','Sur Aluminio',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,6,1,1),(6,'Rosario de Fátima','Gorocica','Zapata',NULL,'Empleado','CALLE 79 X 28 Y 30','VICENTE SOLIS','Merida',97180,NULL,NULL,NULL,NULL,'Femenino','Soltero(a)',NULL,'GOROCICA MOURE MANUEL DE JESUS','ZAPATA GURUBEL JULIA YOLANDA','Oficina',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,7,1,1),(7,'Angel Ignacio','Tzuc','Cordero',NULL,'Empleado','Calle 14 x17 y 19','Mococha','Mococha',97454,NULL,NULL,NULL,NULL,'Masculino','Casado(a)',NULL,'Tzuc May Jose Felipe','Cordero Baak Librada','Oficina',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,8,1,1),(8,'Raul Arturo','Mendoza','Guemes',NULL,'Empleado','Calle 67 F x 128 y 128 B','Bosques Yucalpeten','Merida',97248,NULL,NULL,NULL,NULL,'Masculino','Casado(a)',NULL,'Mendoza Rivero Raul Arturo','Guemes Urive Maria Isabel','Oficina',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,9,1,1),(9,'Rafael','Chiang Sam','Echeverria',NULL,'Empleado','Calle 69 x 62 A y 64','La Herradura','Caucel',97300,NULL,NULL,NULL,NULL,'Masculino','Casado(a)',NULL,'Chiang Sam Rafael Arturo','Echeverria Ortiz Maria del Consuelo','Oficina',NULL,NULL,NULL,NULL,NULL,'2019-07-02 00:00:00',NULL,'2019-07-02 00:00:00','Fijo',NULL,1,10,1,1),(10,'Jose','Chac','Cante','BADD110313HCMLNS09','Empleado','calle 14','Gineres','ffy',97360,'VECJ880326','03674922220','1997-02-02','bachillerato','Masculino','Soltero(a)','','Santos Chac Chan','Maria Cante Pool','Ti',50,50,50,'1970-01-01 00:00:00','','2019-07-05 00:00:00',NULL,'2019-07-05 00:00:00','Temporal','',2,11,50,1);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poblacion`
--

DROP TABLE IF EXISTS `poblacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poblacion` (
  `IdPoblacion` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePoblacion` varchar(40) DEFAULT NULL,
  `IdEstado` int(11) NOT NULL,
  PRIMARY KEY (`IdPoblacion`),
  KEY `RefEstado9` (`IdEstado`),
  CONSTRAINT `RefEstado9` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poblacion`
--

LOCK TABLES `poblacion` WRITE;
/*!40000 ALTER TABLE `poblacion` DISABLE KEYS */;
INSERT INTO `poblacion` VALUES (1,'Mérida',1),(2,'Kanasín',1),(3,'Tizimín',1),(4,'Ticul',1),(5,'Cancún',2),(6,'Felipe Carrillo Puerto',2),(7,'Cozumel',2),(8,'Playa del Carmen',2),(9,'Kantunilkín',2),(10,'Ciudad del Carmen',3),(11,'San Francisco de Campeche',3),(12,'Villahermosa',4),(13,'Coatzacoalcos',5),(14,'Minatitlán',5),(15,'Palenque',6);
/*!40000 ALTER TABLE `poblacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puestos` (
  `IdPuesto` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePuesto` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`IdPuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'Administrativo Cedis'),(2,'Almacenista'),(3,'Asesoría Técnica'),(4,'Auditoría'),(5,'Auxiliar de Herrajes'),(6,'Auxiliar de Ventas'),(7,'Auxiliar General'),(8,'Cajero'),(9,'Cartera'),(10,'Chofer'),(11,'Chofer-Almacenista'),(12,'Compra de Aluminio'),(13,'Compras de Herrajes'),(14,'Contabilidad'),(15,'Contabilidad Fiscal'),(16,'Contralor'),(17,'Costos'),(18,'Diligenciero'),(19,'Dirección'),(20,'Encargado de Almacen'),(21,'Encargado de Aluminio'),(22,'Encargado de Herrajes'),(23,'Encargado General'),(24,'Encargado Operativo'),(25,'Estudiante'),(26,'Operaciones'),(27,'Pintor'),(28,'Químico'),(29,'Recursos Humanos'),(30,'Sistemas'),(31,'Tesorería'),(32,'Tramites'),(33,'Troquelado'),(34,'Ventas');
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `IdSolicitudes` int(11) NOT NULL AUTO_INCREMENT,
  `Solicitud` char(40) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `FechaSolicitud` datetime DEFAULT NULL,
  `FechaAtencion` datetime DEFAULT NULL,
  `Atendido` varchar(100) DEFAULT NULL,
  `VigenteImms` varchar(10) DEFAULT NULL,
  `Estatus` varchar(15) DEFAULT NULL,
  `Documento` varchar(70) DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  PRIMARY KEY (`IdSolicitudes`),
  KEY `RefPersonal2` (`IdPersonal`),
  CONSTRAINT `RefPersonal2` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursal` (
  `IdSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSucursal` varchar(30) DEFAULT NULL,
  `Region` varchar(40) DEFAULT NULL,
  `IdEmpresa` int(11) NOT NULL,
  `IdPoblacion` int(11) NOT NULL,
  PRIMARY KEY (`IdSucursal`),
  KEY `RefEmpresa12` (`IdEmpresa`),
  KEY `RefPoblacion13` (`IdPoblacion`),
  CONSTRAINT `RefEmpresa12` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`),
  CONSTRAINT `RefPoblacion13` FOREIGN KEY (`IdPoblacion`) REFERENCES `poblacion` (`IdPoblacion`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'Oficina Matriz','YUCATAN',1,1),(2,'Suc. Azcorra','YUCATAN',1,1),(3,'Suc. CEDIS','YUCATAN',1,1),(4,'Suc. Cordemex','YUCATAN',2,1),(5,'Suc. Oriente','YUCATAN',2,1),(6,'Suc. Chichi Suarez','YUCATAN',2,1),(7,'Suc. Aleman','YUCATAN',2,1),(8,'Suc. Portes Gil','YUCATAN',2,1),(9,'Suc. Prado Norte','YUCATAN',2,1),(10,'Suc. Donde','YUCATAN',2,1),(11,'Suc. Montejo1','YUCATAN',2,1),(12,'Suc. Centro','YUCATAN',2,1),(13,'Suc. Chenku','YUCATAN',2,1),(14,'Suc. Montejo2','YUCATAN',2,1),(15,'Suc. Itzimna','YUCATAN',2,1),(16,'Suc. Montecristo','YUCATAN',2,1),(17,'Suc. Pinos','YUCATAN',2,1),(18,'Suc. Santiago','YUCATAN',2,1),(19,'Suc. Caucel','YUCATAN',2,1),(20,'Suc. Las Americas','YUCATAN',2,1),(21,'Suc.  San Ramon Norte','YUCATAN',2,1),(22,'Suc. Mayoreo Merida','YUCATAN',2,1),(23,'Suc. Cedis Merida','YUCATAN',2,1),(24,'Suc. Dorada','YUCATAN',2,1),(25,'Suc. Canek','YUCATAN',2,1),(26,'Suc. FiestaII','YUCATAN',2,1),(27,'Suc. Buenavista','YUCATAN',2,1),(28,'Suc. Xelpac','YUCATAN',2,2),(29,'Suc. Sur','YUCATAN',2,1),(30,'Suc. Portillo2','Q.Roo',2,5),(31,'Suc. Portillo3','Q.Roo',2,5),(32,'Suc. La Luna','Q.Roo',2,5),(33,'Suc. Playa','Q.Roo',2,8),(34,'Suc. Playa Centro','Q.Roo',2,8),(35,'Suc.  Portillo1','Q.Roo',2,5),(36,'Suc. Chichen','Q.Roo',2,5),(37,'Suc. Zazil-Ha','Q.Roo',2,8),(38,'Suc. Zazil-Ha','Q.Roo',2,5),(39,'Suc. Cd Carmen','Campeche',2,10),(40,'Suc. Cd Carmen 2','Campeche',2,10),(41,'Oficina Matriz','YUCATAN',3,1),(42,'Suc. Circuito','YUCATAN',3,1),(43,'Suc. Oriente','YUCATAN',3,1),(44,'Suc. Centro','YUCATAN',3,1),(45,'Suc. Itzaes','YUCATAN',3,1),(46,'Suc. Sur','YUCATAN',3,1),(47,'Suc. Turquesa','YUCATAN',3,1),(48,'Suc. Talleres','Q.Roo',3,5),(49,'Suc. Portillo','Q.Roo',3,5),(50,'Oficina Matriz','Q.Roo',4,5),(51,'Suc. Andres Q.Roo','Q.Roo',4,5),(52,'Suc. Portillo','Q.Roo',4,5),(53,'Suc. Torcasita','Q.Roo',4,5),(54,'Oficina Matriz','YUCATAN',5,1),(55,'Suc. Quetzalcoalt','YUCATAN',5,1),(56,'Suc. Tanlum','YUCATAN',5,1),(57,'Suc. Canek','YUCATAN',5,1),(58,'Suc. Los Reyes','YUCATAN',5,1),(59,'Oficina Matriz','YUCATAN',6,1),(60,'Suc. Circuito','YUCATAN',6,1),(61,'Suc.  Calle 30','YUCATAN',6,1),(62,'Suc. Circuito','YUCATAN',7,1),(63,'Suc. Itzaes','YUCATAN',7,1),(64,'Suc. 99','YUCATAN',7,1),(65,'Oficina Matriz','YUCATAN',8,1),(66,'Suc. Circuito','YUCATAN',8,1),(67,'Oficina Matriz','YUCATAN',9,1),(68,'Suc. Juan B. Sosa','YUCATAN',9,1),(69,'Oficina Matriz','YUCATAN',10,1),(70,'Suc. Chuburna','YUCATAN',10,1),(71,'Suc. Xoclan','YUCATAN',10,1),(72,'Oficina Matriz','YUCATAN',11,1),(73,'Suc. Centro','YUCATAN',11,1),(74,'Suc. Itzaes','YUCATAN',11,1);
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `IdTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IdTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Administrador'),(2,'Empleado');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(70) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  `IdTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `RefTipoUsuario5` (`IdTipoUsuario`),
  CONSTRAINT `RefTipoUsuario5` FOREIGN KEY (`IdTipoUsuario`) REFERENCES `tipousuario` (`IdTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'SCANTE','$2y$10$mhw61sj7rm702E/yKiA3WuVS36U8jwXe7mk9wj4XcKlKU9hq16YKu',1),(2,'APEREZ','123',2),(3,'ACAUICH','123',2),(4,'EEUAN','123',2),(5,'ACASTILLO','123',2),(6,'FCAUICH','123',2),(7,'FGOROCICA','123',2),(8,'ATZUC','123',2),(9,'RMENDOZA','123',2),(10,'RCHIANGSAM','123',2),(11,'JCANTE','$2y$10$L9MaSFZJl.CJnLK76AESDOSFUDYB8yE.sAj.YrnxqC6f3KpRtsQi2',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-05 11:43:52
