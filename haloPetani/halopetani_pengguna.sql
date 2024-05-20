CREATE DATABASE  IF NOT EXISTS `halopetani` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `halopetani`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: halopetani
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengguna` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `phonenumber` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `quality_point` int(11) DEFAULT 0,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1542645 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (1542632,123,'$2y$10$pSVJD9u.cj6PykW0n77cGOp.er8iIPRY8sdVzS','semuanya',0),(1542633,123,'$2y$10$6DLf5PEFD2fsSy7Hft46geSndtSyMKCn4NKS1T','adzka',1),(1542634,123,'cok','capek',0),(1542635,12345,'4bb221bce661040c30e9696c9a52ea01','hehe',0),(1542636,0,'d41d8cd98f00b204e9800998ecf8427e','',0),(1542637,1,'92eb5ffee6ae2fec3ad71c777531578f','b',0),(1542638,1,'865c0c0b4ab0e063e5caa3387c1a8741','i',0),(1542639,1,'92eb5ffee6ae2fec3ad71c777531578f','b',0),(1542640,1,'fbade9e36a3f36d3d676c1b808451dd7','a',0),(1542641,1,'fbade9e36a3f36d3d676c1b808451dd7','a',0),(1542642,1,'6391822c9289e1053dedddba1a880936','adzka',0),(1542643,2147483647,'2f3fceb754a3d0d2681927ca8de7baf9','ydd',0),(1542644,17672,'6391822c9289e1053dedddba1a880936','dzikri',0);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20 10:09:49
