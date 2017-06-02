-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: ControleDeFrequencia
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.10.1

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
-- Table structure for table `Alertas_Faltas`
--

DROP TABLE IF EXISTS `Alertas_Faltas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alertas_Faltas` (
  `AFid` int(11) NOT NULL AUTO_INCREMENT,
  `dias_consecutivos` tinyint(1) NOT NULL,
  `quantidade_dias` int(11) NOT NULL,
  `dataInicio` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `dataFim` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `matricula` varchar(45) DEFAULT NULL,
  `turma` varchar(45) DEFAULT NULL,
  `curso` varchar(45) DEFAULT NULL,
  `UPid` int(11) NOT NULL,
  PRIMARY KEY (`AFid`),
  KEY `fk_Alertas_Faltas_Usuarios_Permitidos_idx` (`UPid`),
  CONSTRAINT `fk_Alertas_Faltas_Usuarios_Permitidos` FOREIGN KEY (`UPid`) REFERENCES `Usuarios_Permitidos` (`UPid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alertas_Faltas`
--

LOCK TABLES `Alertas_Faltas` WRITE;
/*!40000 ALTER TABLE `Alertas_Faltas` DISABLE KEYS */;
INSERT INTO `Alertas_Faltas` VALUES (2,0,3,'1970-01-01 03:00:01','1970-01-01 03:00:01',NULL,NULL,NULL,2),(3,0,4,'1970-01-01 03:00:01','1970-01-01 03:00:01',NULL,NULL,NULL,1),(4,0,2,'1970-01-01 03:00:01','1970-01-01 03:00:01',NULL,'1234','Tele',2);
/*!40000 ALTER TABLE `Alertas_Faltas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Alertas_Horarios`
--

DROP TABLE IF EXISTS `Alertas_Horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alertas_Horarios` (
  `AHid` int(11) NOT NULL AUTO_INCREMENT,
  `dias_consecutivos` tinyint(1) NOT NULL,
  `quantidade_dias` int(11) NOT NULL,
  `dataInicio` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `dataFim` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `matricula` varchar(45) DEFAULT NULL,
  `turma` varchar(45) DEFAULT NULL,
  `curso` varchar(45) DEFAULT NULL,
  `chegada` tinyint(1) NOT NULL,
  `limiar_tempo` int(11) NOT NULL,
  `UPid` int(11) NOT NULL,
  PRIMARY KEY (`AHid`),
  KEY `fk_Alertas_Horarios_Usuarios_Permitidos1_idx` (`UPid`),
  CONSTRAINT `fk_Alertas_Horarios_Usuarios_Permitidos1` FOREIGN KEY (`UPid`) REFERENCES `Usuarios_Permitidos` (`UPid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alertas_Horarios`
--

LOCK TABLES `Alertas_Horarios` WRITE;
/*!40000 ALTER TABLE `Alertas_Horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Alertas_Horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ocorrencia_Faltas`
--

DROP TABLE IF EXISTS `Ocorrencia_Faltas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ocorrencia_Faltas` (
  `OFid` int(11) NOT NULL AUTO_INCREMENT,
  `dataF` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `RFid` int(11) NOT NULL,
  PRIMARY KEY (`OFid`,`dataF`,`RFid`),
  KEY `fk_Ocorrencia_Faltas_Registro_Faltas1_idx` (`RFid`),
  CONSTRAINT `fk_Ocorrencia_Faltas_Registro_Faltas1` FOREIGN KEY (`RFid`) REFERENCES `Registro_Faltas` (`RFid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ocorrencia_Faltas`
--

LOCK TABLES `Ocorrencia_Faltas` WRITE;
/*!40000 ALTER TABLE `Ocorrencia_Faltas` DISABLE KEYS */;
INSERT INTO `Ocorrencia_Faltas` VALUES (2,'2017-06-01 16:31:21',1),(2,'2017-06-01 16:31:13',2),(2,'2018-03-11 03:00:01',3),(3,'2017-06-02 04:03:17',4),(3,'2017-06-02 04:03:20',5),(3,'2017-06-02 04:03:24',6),(3,'2017-06-02 04:03:28',7),(3,'2017-06-02 04:03:32',8),(3,'2017-06-02 04:03:35',9);
/*!40000 ALTER TABLE `Ocorrencia_Faltas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ocorrencia_Horario`
--

DROP TABLE IF EXISTS `Ocorrencia_Horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ocorrencia_Horario` (
  `OHid` int(11) NOT NULL AUTO_INCREMENT,
  `dataH` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `RHid` int(11) NOT NULL,
  PRIMARY KEY (`OHid`,`dataH`,`RHid`),
  KEY `fk_Ocorrencia_Horario_Registro_Horario1_idx` (`RHid`),
  CONSTRAINT `fk_Ocorrencia_Horario_Registro_Horario1` FOREIGN KEY (`RHid`) REFERENCES `Registro_Horario` (`RHid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ocorrencia_Horario`
--

LOCK TABLES `Ocorrencia_Horario` WRITE;
/*!40000 ALTER TABLE `Ocorrencia_Horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ocorrencia_Horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Registro_Faltas`
--

DROP TABLE IF EXISTS `Registro_Faltas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Registro_Faltas` (
  `RFid` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `AFid` int(11) NOT NULL,
  PRIMARY KEY (`RFid`),
  KEY `fk_Registro_Faltas_Alertas_Faltas1_idx` (`AFid`),
  CONSTRAINT `fk_Registro_Faltas_Alertas_Faltas1` FOREIGN KEY (`AFid`) REFERENCES `Alertas_Faltas` (`AFid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registro_Faltas`
--

LOCK TABLES `Registro_Faltas` WRITE;
/*!40000 ALTER TABLE `Registro_Faltas` DISABLE KEYS */;
INSERT INTO `Registro_Faltas` VALUES (1,'1210058370','1970-01-01 03:00:01',2),(2,'1210058370','1970-01-01 03:00:01',2),(3,'1210058370','1970-01-01 03:00:01',2),(4,'1210087654','1970-01-01 03:00:01',4),(5,'1210080987','1970-01-01 03:00:01',4),(6,'1210080909','1970-01-01 03:00:01',4),(7,'1210080909','2017-06-02 04:00:02',4),(8,'1210080987','2017-06-02 04:00:17',4),(9,'1210080987','2017-06-02 04:00:32',4);
/*!40000 ALTER TABLE `Registro_Faltas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Registro_Horario`
--

DROP TABLE IF EXISTS `Registro_Horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Registro_Horario` (
  `RHid` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `AHid` int(11) NOT NULL,
  PRIMARY KEY (`RHid`),
  KEY `fk_Registro_Horario_Alertas_Horarios1_idx` (`AHid`),
  CONSTRAINT `fk_Registro_Horario_Alertas_Horarios1` FOREIGN KEY (`AHid`) REFERENCES `Alertas_Horarios` (`AHid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registro_Horario`
--

LOCK TABLES `Registro_Horario` WRITE;
/*!40000 ALTER TABLE `Registro_Horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Registro_Horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios_Permitidos`
--

DROP TABLE IF EXISTS `Usuarios_Permitidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios_Permitidos` (
  `UPid` int(11) NOT NULL AUTO_INCREMENT,
  `super_usuario` tinyint(1) NOT NULL,
  `local` tinyint(1) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`UPid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios_Permitidos`
--

LOCK TABLES `Usuarios_Permitidos` WRITE;
/*!40000 ALTER TABLE `Usuarios_Permitidos` DISABLE KEYS */;
INSERT INTO `Usuarios_Permitidos` VALUES (1,1,1,'qwe',NULL,'qwe@email',1),(2,1,1,'abc',NULL,'abc@email',1);
/*!40000 ALTER TABLE `Usuarios_Permitidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-02 15:49:21
