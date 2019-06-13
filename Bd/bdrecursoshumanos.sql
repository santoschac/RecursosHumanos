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
-- Table structure for table `cambios`
--

DROP TABLE IF EXISTS `cambios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cambios` (
  `IdCambio` int(11) NOT NULL AUTO_INCREMENT,
  `EmpresaAnterior` varchar(50) DEFAULT NULL,
  `SucursalAnterior` varchar(40) DEFAULT NULL,
  `PuestoAnterior` varchar(60) DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `EmpresaNuevo` varchar(50) DEFAULT NULL,
  `SucursalNuevo` varchar(10) DEFAULT NULL,
  `PuestoNuevo` varchar(60) DEFAULT NULL,
  `IdPersonal` int(11) NOT NULL,
  PRIMARY KEY (`IdCambio`),
  KEY `RefPersonal3` (`IdPersonal`),
  CONSTRAINT `RefPersonal3` FOREIGN KEY (`IdPersonal`) REFERENCES `personal` (`IdPersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambios`
--

LOCK TABLES `cambios` WRITE;
/*!40000 ALTER TABLE `cambios` DISABLE KEYS */;
INSERT INTO `cambios` VALUES (9,'Alpina','Suc. Oriente','Almacenista','2019-06-12 00:00:00','1','1','Costos',35),(10,'Alpina','Suc. Oriente','Almacenista','2019-06-13 00:00:00',NULL,NULL,'Auditoría',35),(11,'Alpina','Suc. Oriente','Almacenista','2019-06-13 00:00:00','1','1','Almacenista',35);
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
INSERT INTO `cursos` VALUES (1,'Curso Administración de Proyectos','Descripcion','Interna','2019-05-31 00:00:00'),(3,'Curso Administración','Descripcion','Interna','2019-05-31 00:00:00'),(4,'Curso Análisis ','Descripcion','Interna','2019-05-31 00:00:00'),(5,'Curso Balanced Scorecard','Descripcion','Interna','2019-05-31 00:00:00'),(6,'Curso Cómo Entrevistar','Descripcion','Interna','2019-05-31 00:00:00'),(7,'Curso Desarrollo','Descripcion','Interna','2019-05-31 00:00:00'),(8,'Curso Evaluación ','Descripcion','Interna','2019-05-31 00:00:00'),(9,'Curso Habilidades de Supervisión','Descripcion','Interna','2019-05-31 00:00:00'),(10,'Curso Liderazgo Efectivo','Descripcion','Interna','2019-05-31 00:00:00'),(11,'Curso Los 7 Elementos ','Descripcion','Interna','2019-05-31 00:00:00'),(12,'Curso Planeación Estratégica','Descripcion','Interna','2019-05-31 00:00:00'),(13,'Curso Programa Intensivo ','Descripcion','Interna','2019-05-31 00:00:00'),(14,'Curso Técnicas de Coaching ','Descripcion','Interna','2019-05-31 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
INSERT INTO `incidencias` VALUES (2,'accidente','2019-06-12 00:00:00','juan','pruba','Afectado',22),(4,'se  madreo','2019-06-13 00:00:00','SCANTE','pruba','Responsable',35),(6,'josejoes','2019-06-13 00:00:00','SCANTE','pruba','Afectado',35),(7,'pureba','2019-06-13 00:00:00','SCANTE','pruba','Afectado',35);
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
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
  `Hijos` int(11) DEFAULT NULL,
  `Padre` varchar(90) DEFAULT NULL,
  `Madre` varchar(90) DEFAULT NULL,
  `Departamento` varchar(60) DEFAULT NULL,
  `Jornada` varchar(70) DEFAULT NULL,
  `SueldoDiario` decimal(10,0) DEFAULT NULL,
  `SueldoAnterior` decimal(10,0) DEFAULT NULL,
  `SueldoActual` decimal(10,0) DEFAULT NULL,
  `FechaBaja` datetime DEFAULT NULL,
  `ConceptoBaja` varchar(70) DEFAULT NULL,
  `FechaAlta` datetime DEFAULT NULL,
  `FechaAntiguedad` datetime DEFAULT NULL,
  `UltimaModificacion` datetime DEFAULT NULL,
  `TipoContrato` varchar(70) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (22,'Jose','Chac','Cante','BADD110313HCMLNS09','Empleado','calle 14','Gineres','haha',97360,'VECJ880326','03674922220','2019-06-11','bachillerato','Masculino','Soltero(a)',0,'Santos Chac Chan','Maria Cante Pool','Ti','lunes-viernes',50,50,50,'1970-01-01 00:00:00','hola mundo','2019-06-11 00:00:00','2019-06-11 00:00:00','2019-06-11 00:00:00','Fijo',2,10,2,2),(23,'Jose','Chac','Cante','BADD110313HCMLNS09','Empleado','calle 14','Gineres','haha',97360,'VECJ880326','03674922220','2019-06-11','bachillerato','Masculino','Soltero(a)',0,'Santos Chac Chan','Maria Cante Pool','Ti','lunes-viernes',50,50,50,'1970-01-01 00:00:00','','2019-06-11 00:00:00','2019-06-11 00:00:00','2019-06-11 00:00:00','Temporal',2,11,2,1),(24,'Jose','Chac','Cante','BADD110313HCMLNS09','Empleado','calle 14','Gineres','haha',97360,'VECJ880326','03674922220','2019-06-11','bachillerato','Masculino','Soltero(a)',0,'Santos Chac Chan','Maria Cante Pool','Ti','lunes-viernes',50,50,50,'1970-01-01 00:00:00','','2019-06-11 00:00:00','2019-06-11 00:00:00','2019-06-11 00:00:00','Temporal',2,12,2,1),(25,'Jose','Chac','Cante','BADD110313HCMLNS09','Empleado','calle 14','Gineres','haha',97360,'VECJ880326','03674922220','2019-06-11','bachillerato','Masculino','Soltero(a)',0,'Santos Chac Chan','Maria Cante Pool','Ti','lunes-viernes',50,50,50,'1970-01-01 00:00:00','','2019-06-11 00:00:00','2019-06-11 00:00:00','2019-06-11 00:00:00','Temporal',2,13,2,1),(35,'Santos Ismael','Chac','Cante','BADD110313HCMLNS09','Empleado','calle 14','Gineres','kinchil',97360,'VECJ880326','03674922220','1998-12-16','bachillerato','Masculino','Soltero(a)',0,'Santos Chac Chan','Maria Cante Pool','Tic','lunes-viernes',50,50,50,'1970-01-01 00:00:00','','2019-06-12 00:00:00','2019-06-12 00:00:00','2019-06-12 00:00:00','Temporal',2,23,3,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'Administrativo Cedis'),(2,'Almacenista'),(3,'Asesoría Técnica'),(4,'Auditoría'),(5,'Auxiliar de Herrajes'),(6,'Auxiliar de Ventas'),(7,'Auxiliar General'),(8,'Cajero'),(9,'Cartera'),(10,'Chofer'),(11,'Chofer-Almacenista'),(12,'Compra de Aluminio'),(13,'Compras de Herrajes'),(14,'Contabilidad'),(15,'Contabilidad Fiscal'),(16,'Contralor'),(17,'Costos'),(18,'Diligenciero'),(19,'Dirección'),(20,'Encargado de Almacen'),(21,'Encargado de Aluminio'),(22,'Encargado de Herrajes'),(23,'Encargado General'),(24,'Encargado Operativo'),(25,'Estudiante'),(26,'Operaciones'),(27,'Pintor'),(28,'Químico'),(29,'Recursos Humanos'),(30,'Sistemas'),(31,'Tesorería'),(32,'Tramites'),(33,'Troquelado'),(34,'Ventas'),(35,'Chofer');
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
  `Descripcion` varchar(300) DEFAULT NULL,
  `FechaSolicitud` datetime DEFAULT NULL,
  `FechaAntencion` datetime DEFAULT NULL,
  `Atendido` varchar(100) DEFAULT NULL,
  `VigenteImms` varchar(10) DEFAULT NULL,
  `Estatus` varchar(15) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'Oficina Matriz','yucatán',1,1),(2,'Suc. Azcorra','yucatán',1,1),(3,'Suc. Oriente','yucatán',2,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'SCANTE','$2y$10$3HfB/Qm4gKr9YxM1mYr3vOpMnxkKb2IRjEdQIAJ3dBLnmr1dHVg0W',1),(3,'pruebausuario','VECJ880326',2),(4,'pruebausuario','VECJ880326',2),(5,'pruebausuario','VECJ880326',2),(6,'pruebausuario','VECJ880326',2),(7,'pruebausuario','VECJ880326',2),(8,'pruebausuario','VECJ880326',2),(9,'0','VECJ880326',2),(10,'0','VECJ880326',2),(11,'0','VECJ880326',2),(12,'0','VECJ880326',2),(13,'0','VECJ880326',2),(14,'0','VECJ880326',2),(15,'pruebausuario','VECJ880326',2),(16,'0','VECJ880326',2),(17,'0','VECJ880326',2),(18,'0','VECJ880326',2),(19,'0','VECJ880326',2),(20,'0','VECJ880326',2),(21,'DCHAC','VECJ880326',2),(22,'DCHAC','VECJ880326',2),(23,'SCHAC','VECJ880326',2);
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

-- Dump completed on 2019-06-13 13:04:51
