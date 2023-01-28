-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_agendador
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `tb_agenda`
--

DROP TABLE IF EXISTS `tb_agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_agenda` (
  `pk_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `dh_ini` datetime DEFAULT NULL,
  `dh_fim` datetime DEFAULT NULL,
  `dh_criacao` datetime DEFAULT current_timestamp(),
  `dh_exclusao` datetime DEFAULT NULL,
  `fk_sala` int(11) DEFAULT NULL,
  `fk_departamento` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_usuario_exc` int(11) DEFAULT NULL,
  `fk_agendamento` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`pk_agenda`),
  KEY `fk_usuario_idx` (`fk_usuario`),
  KEY `fk_sala_idx` (`fk_sala`),
  KEY `fk_setor_idx` (`fk_departamento`),
  KEY `fk_usuario_exc_idx` (`fk_usuario_exc`),
  KEY `fk_agendamento_agenda_idx` (`fk_agendamento`),
  CONSTRAINT `fk_agendamento_agenda` FOREIGN KEY (`fk_agendamento`) REFERENCES `tb_agendamento` (`id_agendamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala` FOREIGN KEY (`fk_sala`) REFERENCES `tb_sala` (`id_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_setor` FOREIGN KEY (`fk_departamento`) REFERENCES `tb_departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_exc` FOREIGN KEY (`fk_usuario_exc`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_agenda`
--

LOCK TABLES `tb_agenda` WRITE;
/*!40000 ALTER TABLE `tb_agenda` DISABLE KEYS */;
INSERT INTO `tb_agenda` VALUES (1,'2023-01-20 15:00:00','2023-01-20 15:16:00','2023-01-19 12:00:16',NULL,2,2,1,NULL,10,1),(2,'0000-00-00 00:00:00','0000-00-00 00:00:00','2023-01-19 12:28:24',NULL,1,3,1,NULL,11,1),(3,'0000-00-00 00:00:00','0000-00-00 00:00:00','2023-01-19 12:30:23',NULL,1,3,1,NULL,12,1),(4,'2023-01-30 12:00:00','2023-01-30 13:00:00','2023-01-19 12:38:18',NULL,4,4,4,NULL,17,1),(5,'2023-02-01 12:00:00','2023-02-01 13:00:00','2023-01-19 12:38:18',NULL,4,4,4,NULL,17,1),(6,'2023-01-24 12:00:00','2023-01-24 16:00:00','2023-01-19 12:39:54',NULL,5,5,1,NULL,18,1),(7,'2023-01-26 12:00:00','2023-01-26 16:00:00','2023-01-19 12:39:54','2023-01-26 10:28:54',5,5,1,NULL,18,1),(8,'2023-01-28 12:00:00','2023-01-28 16:00:00','2023-01-19 12:39:54',NULL,5,5,1,NULL,18,1),(9,'2023-01-30 12:00:00','2023-01-30 16:00:00','2023-01-19 12:39:54','2023-01-26 10:29:00',5,5,1,NULL,18,1),(10,'2023-02-01 12:00:00','2023-02-01 16:00:00','2023-01-19 12:39:54',NULL,5,5,1,NULL,18,1),(11,'2023-02-06 11:00:00','2023-02-06 12:00:00','2023-01-19 12:41:53','2023-01-26 10:45:25',3,4,1,NULL,19,0),(12,'2023-02-08 11:00:00','2023-02-08 12:00:00','2023-01-19 12:41:53','2023-01-26 11:07:58',3,4,1,1,19,0),(13,'2023-02-10 11:00:00','2023-02-10 12:00:00','2023-01-19 12:41:53','2023-01-26 10:43:15',3,4,1,NULL,19,0),(14,'2023-01-23 12:00:00','2023-01-23 13:00:00','2023-01-21 09:40:33',NULL,1,4,1,NULL,20,1),(15,'2023-01-25 12:00:00','2023-01-25 13:00:00','2023-01-21 09:40:33',NULL,1,4,1,NULL,20,1),(16,'2023-01-27 12:00:00','2023-01-27 13:00:00','2023-01-21 09:40:33','2023-01-26 10:32:22',1,4,1,4,20,1),(17,'2023-01-30 15:00:00','2023-01-30 16:00:00','2023-01-21 10:12:37',NULL,5,10,4,NULL,NULL,1),(18,'2023-02-01 15:00:00','2023-02-01 16:00:00','2023-01-21 10:12:37',NULL,5,10,4,NULL,NULL,1),(19,'2023-02-03 15:00:00','2023-02-03 16:00:00','2023-01-21 10:12:37',NULL,5,10,4,NULL,NULL,1),(20,'2023-01-30 15:00:00','2023-01-30 16:00:00','2023-01-21 10:14:17',NULL,5,10,4,NULL,NULL,1),(21,'2023-02-01 15:00:00','2023-02-01 16:00:00','2023-01-21 10:14:17',NULL,5,10,4,NULL,NULL,1),(22,'2023-02-03 15:00:00','2023-02-03 16:00:00','2023-01-21 10:14:17',NULL,5,10,4,NULL,NULL,1),(23,'2023-02-01 12:00:00','2023-02-01 13:00:00','2023-01-21 13:26:57','2023-01-26 10:45:16',3,11,1,NULL,23,0),(24,'2023-02-08 12:00:00','2023-02-08 13:00:00','2023-01-21 13:26:57','2023-01-26 10:38:34',3,11,1,NULL,23,0),(25,'2023-02-15 12:00:00','2023-02-15 13:00:00','2023-01-21 13:26:57',NULL,3,11,1,NULL,23,1),(26,'2023-02-22 12:00:00','2023-02-22 13:00:00','2023-01-21 13:26:57',NULL,3,11,1,NULL,23,1),(27,'2023-03-01 12:00:00','2023-03-01 13:00:00','2023-01-21 13:26:57','2023-01-26 10:47:05',3,11,1,1,23,0);
/*!40000 ALTER TABLE `tb_agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_agendamento`
--

DROP TABLE IF EXISTS `tb_agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `dia_hora_inicio` datetime DEFAULT NULL,
  `dia_hora_fim` datetime DEFAULT NULL,
  `fk_sala` int(11) DEFAULT NULL,
  `fk_departamento` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_usuario_exc` int(11) DEFAULT NULL,
  `recorrente` tinyint(1) DEFAULT 0,
  `observacao` varchar(400) DEFAULT NULL,
  `dh_criacao` datetime DEFAULT current_timestamp(),
  `dh_termino` datetime DEFAULT NULL,
  `dh_exclusao` datetime DEFAULT NULL,
  `dh_rep_especifico` datetime DEFAULT NULL,
  `nu_rep_freq` int(11) DEFAULT NULL,
  `st_rep_dias_semanas` char(7) DEFAULT NULL,
  `tp_rep_ocorrencia` char(1) DEFAULT NULL,
  `tp_rep_ordinal` varchar(1) DEFAULT NULL,
  `tp_ordinal_dia_semana` int(11) DEFAULT NULL,
  `tp_ordinal_mes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_sala_idx` (`fk_sala`),
  KEY `fk_departamento_idx` (`fk_departamento`),
  KEY `fk_tb_agendamento_tb_usuario1_idx` (`fk_usuario`),
  KEY `fk_usuario_exc_agendamento_idx` (`fk_usuario_exc`),
  CONSTRAINT `departamento` FOREIGN KEY (`fk_departamento`) REFERENCES `tb_departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_agendamento_tb_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_exc_agendamento` FOREIGN KEY (`fk_usuario_exc`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `sala` FOREIGN KEY (`fk_sala`) REFERENCES `tb_sala` (`id_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_agendamento`
--

LOCK TABLES `tb_agendamento` WRITE;
/*!40000 ALTER TABLE `tb_agendamento` DISABLE KEYS */;
INSERT INTO `tb_agendamento` VALUES (10,'2023-01-20 15:00:00','2023-01-20 15:16:00',2,2,1,NULL,1,'teste1','2023-01-19 12:00:16',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(11,'2023-01-20 15:16:00','2023-01-20 16:15:00',1,3,1,NULL,1,'teste','2023-01-19 12:28:24',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(12,'2023-01-20 15:16:00','2023-01-20 16:15:00',1,3,1,NULL,1,'teste','2023-01-19 12:30:23',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(13,'2023-01-20 15:16:00','2023-01-20 16:15:00',1,3,1,NULL,1,'teste','2023-01-19 12:31:14',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(14,'2023-01-20 15:16:00','2023-01-20 16:15:00',1,3,1,NULL,1,'teste','2023-01-19 12:33:35',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(15,'2023-01-20 13:00:00','2023-01-20 16:00:00',2,2,1,NULL,1,'teste2','2023-01-19 12:34:22',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(17,'2023-01-30 12:00:00','2023-01-30 13:00:00',4,4,4,NULL,1,'teste 4','2023-01-19 12:38:18',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(18,'2023-01-24 12:00:00','2023-01-24 16:00:00',5,5,1,NULL,1,'teste teste','2023-01-19 12:39:54',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(19,'2023-02-06 11:00:00','2023-02-06 12:00:00',3,4,1,1,1,'123','2023-01-19 12:41:53',NULL,'2023-01-26 11:07:58',NULL,2,NULL,NULL,NULL,NULL,NULL),(20,'2023-01-23 12:00:00','2023-01-23 13:00:00',1,2,4,NULL,1,'teste de numero final','2023-01-21 09:40:33','0000-00-00 00:00:00',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(21,'2023-01-30 15:00:00','2023-01-30 16:00:00',1,10,4,NULL,1,'123','2023-01-21 10:12:37','0000-00-00 00:00:00',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(22,'2023-01-30 15:00:00','2023-01-30 16:00:00',5,10,4,NULL,1,'123','2023-01-21 10:14:17','2023-02-03 16:00:00',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL),(23,'2023-02-01 12:00:00','2023-02-01 13:00:00',3,11,1,NULL,1,'teste semana','2023-01-21 13:26:57','2023-03-01 13:00:00',NULL,NULL,7,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_departamento`
--

DROP TABLE IF EXISTS `tb_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_departamento` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_departamento`
--

LOCK TABLES `tb_departamento` WRITE;
/*!40000 ALTER TABLE `tb_departamento` DISABLE KEYS */;
INSERT INTO `tb_departamento` VALUES (2,'DAF'),(3,'DAE'),(4,'DAO'),(5,'DIJ'),(10,'DPS'),(11,'DAC');
/*!40000 ALTER TABLE `tb_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_perfil`
--

DROP TABLE IF EXISTS `tb_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_perfil`
--

LOCK TABLES `tb_perfil` WRITE;
/*!40000 ALTER TABLE `tb_perfil` DISABLE KEYS */;
INSERT INTO `tb_perfil` VALUES (2,'adm'),(4,'ATI1');
/*!40000 ALTER TABLE `tb_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pessoa`
--

DROP TABLE IF EXISTS `tb_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pessoa`
--

LOCK TABLES `tb_pessoa` WRITE;
/*!40000 ALTER TABLE `tb_pessoa` DISABLE KEYS */;
INSERT INTO `tb_pessoa` VALUES (6,'teste'),(10,'maria betanha'),(11,'enzo'),(12,'teste1'),(14,'beto');
/*!40000 ALTER TABLE `tb_pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sala`
--

DROP TABLE IF EXISTS `tb_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sala` (
  `id_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sala` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sala`
--

LOCK TABLES `tb_sala` WRITE;
/*!40000 ALTER TABLE `tb_sala` DISABLE KEYS */;
INSERT INTO `tb_sala` VALUES (1,'209a'),(2,'02'),(3,'03'),(4,'4'),(5,'04');
/*!40000 ALTER TABLE `tb_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(45) DEFAULT NULL,
  `fk_pessoa` int(11) DEFAULT NULL,
  `fk_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_pessoa_idx` (`fk_pessoa`),
  KEY `fk_tb_usuario_tb_nivel_acesso1_idx` (`fk_perfil`),
  CONSTRAINT `fk_perfil` FOREIGN KEY (`fk_perfil`) REFERENCES `tb_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa` FOREIGN KEY (`fk_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'lksads',10,4),(4,'teste dia',12,4);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-28 20:07:35
