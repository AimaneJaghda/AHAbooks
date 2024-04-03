-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ahabooks
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `ahaauthor`
--

DROP TABLE IF EXISTS `ahaauthor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ahaauthor` (
  `idAuthor` int NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `passwordAuthor` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `dateActive` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `profilePicture` text,
  PRIMARY KEY (`idAuthor`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ahaauthor`
--

LOCK TABLES `ahaauthor` WRITE;
/*!40000 ALTER TABLE `ahaauthor` DISABLE KEYS */;
INSERT INTO `ahaauthor` VALUES (2,'katewhite@ahabooks.com','1234567890','White','Kate','1951-09-03','2023-06-08','New York ','United States','2023-06-08',NULL,NULL),(3,'tracywolff@ahabooks.com','1234567890','Wolff','Tracy','1986-11-12','2023-06-08','California','United States','2023-06-08',NULL,NULL),(4,'constanzacasati@ahabooks.com','1234567890','Casati','Costanza','1995-06-18','2023-06-08','Texas','United States','2023-06-08',NULL,NULL),(5,'ritachangeppig@ahabooks.com','1234567890','Chang-Eppig','Rita','1990-12-02','2023-06-08','Manchester','United Kingdom','2023-06-08',NULL,NULL),(6,'jognvaillant@ahabooks.com','1234567890','Vaillant','John','1962-04-02','2023-06-08','Massachusetts','United States','2023-06-08',NULL,'users/ProfilePicture/jogn vaillant.jpg'),(7,'rebeccayarros@ahabooks.com','1234567890','Yarros','Rebecca','1981-10-01','2023-06-08','New York','United States','2023-06-08',NULL,NULL),(8,'jonathaneig@ahabooks.com','1234567890','Eig','Jonathan','1964-04-27','2023-06-08','New York','United States','2023-06-08',NULL,NULL),(9,'dianaurban@ahabooks.com','1234567890','Urban','Diana','1989-11-03','2023-06-08','Virginia','United States','2023-06-08',NULL,NULL),(10,'linsdaycameron@ahabooks.com','1234567890','Cameron','Lindsay','1974-04-06','2023-06-08','New Mexico','United States','2023-06-08',NULL,NULL),(11,'elissasussman@ahabooks.com','1234567890','Sussman','Elissa','1987-07-17','2023-06-08','Pennsylvania','United States','2023-06-08',NULL,NULL),(12,'lunamcnamara@ahabooks.com','1234567890','McNamara','Luna','1970-11-30','2023-06-08','Missouri','United States','2023-06-08',NULL,NULL),(13,'amymatthews@ahabooks.com','1234567890','Matthews','Amy','1984-03-05','2023-06-08','Yekaterinburg','Russia','2023-06-08',NULL,NULL),(14,'davidvondrehle@ahabooks.com','1234567890','von Drehle','David','1961-02-06','2023-06-08','Colorado','United States','2023-06-08',NULL,NULL),(15,'marklawrence@ahabooks.com','1234567890','Lawrence','Mark','1966-01-28','2023-06-08','New Orleans','United States','2023-06-08',NULL,NULL),(16,'jaclyngoldis@ahabooks.com','1234567890','Goldis','Jaclyn','1978-12-03','2023-06-08','Reykjavík','Iceland','2023-06-08',NULL,NULL),(17,'mikkibrammer@ahabooks.com','1234567890','Brammer','Mikki','1962-07-16','2023-06-08','Bangkok','Thailand','2023-06-08',NULL,NULL),(18,'abrahamverghese@ahabooks.com','1234567890','Verghese','Abraham','1955-05-30','2023-06-08','Addis Ababa','Ethopia','2023-06-08',NULL,NULL),(19,'justincronin@ahabooks.com','1234567890','Cronin','Justin','1962-11-25','2023-06-08','New England','United States','2023-06-08',NULL,NULL),(20,'marybethkeane@ahabooks.com','1234567890','Beth Keane','Mary','1977-06-03','2023-06-08','New York','United States','2023-06-08',NULL,NULL),(21,'patticallahanhenry@ahabooks.com','1234567890','Callahan Henry','Patti','1970-01-20','2023-06-08','Salzburg','Austia','2023-06-08',NULL,NULL),(22,'marthawells@ahabooks.com','1234567890','Wells','Martha','1964-01-01','2023-06-08','Texas','United States','2023-06-08',NULL,NULL),(23,'rfkuang@ahabooks.com','1234567890','Kuang','R.F.','1989-03-18','2023-06-08','Mumbai','India','2023-06-08',NULL,NULL),(24,'ahmedmaqri@ahabook.com','1234567890','MAQRI','AHMED','2005-04-11','2023-06-11','Tangier','Morocco','2023-06-11',NULL,'users\\defaultProfilePicture.jpg'),(25,'hamdahamada@ahabook.com','1234567890','barqoli','hamada','2012-12-04','2023-06-11','wad zem','morocco','2023-06-12',NULL,'users\\defaultProfilePicture.jpg'),(26,'hichammatazi@ahabook.com','1234567890','matazi','hicham','2002-10-23','2023-06-12','tangier','morocco','2023-06-12',NULL,'users\\defaultProfilePicture.jpg'),(27,'elmatazi@ahabook.com','1234567890','el matazi','Hicham','2002-01-01','2023-06-12','tangier','Morocco','2023-06-12',NULL,'users/ProfilePicture/hicham.jpg'),(28,'gyuijg@gmail.com','12344567890','el matazi','hicham','2002-05-02','2023-06-12','tanger','morocco','2023-06-12',NULL,'users\\defaultProfilePicture.jpg');
/*!40000 ALTER TABLE `ahaauthor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-03  5:18:23
