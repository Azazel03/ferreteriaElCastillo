-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: hardwarestore
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '''nombre del producto''',
  `description` varchar(500) DEFAULT NULL COMMENT '''descripción del producto''',
  `date` date DEFAULT NULL COMMENT 'fecha del registro',
  `neto` int(11) NOT NULL COMMENT 'valor neto del producto',
  `iva` decimal(65,1) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL,
  `status_product` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`idproduct`),
  UNIQUE KEY `idx_products_name_idproduct` (`name`,`idproduct`),
  KEY `idcategory` (`idcategory`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `categories` (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'prueba','prueba','2021-03-10',120,22.8,'bar.jpg',0,1,'S'),(3,'prueba','prueba','2021-03-10',120,22.8,'bar.jpg',0,1,'S'),(4,'pruebas','pruebas','2021-03-10',1,0.2,'bar.jpg',20,1,'S'),(5,'pruebaA','pruebaA','2021-03-10',120,22.8,'.-',20,1,'S'),(6,'statusResponse','statusResponse','2021-03-10',0,0.0,'.-',0,1,'S'),(7,'a','a','2021-03-10',212,40.3,'.-',0,1,'S'),(8,'aa','aa','2021-03-10',1,0.2,'.-',20,1,'S'),(9,'aaaa','aaaa','2021-03-10',1,0.2,'.-',20,1,'S'),(10,'w','w','2021-03-10',120,22.8,'.-',0,1,'S'),(11,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S'),(12,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S'),(13,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S'),(14,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S'),(15,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S'),(16,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S'),(17,'www','ss','2021-03-10',12,2.3,'.-',0,1,'S');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-15 20:50:43
