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
-- Table structure for table `ahauser`
--

DROP TABLE IF EXISTS `ahauser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ahauser` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `passwordUser` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `typeUser` varchar(30) DEFAULT NULL,
  `profilePicture` text,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ahauser`
--

LOCK TABLES `ahauser` WRITE;
/*!40000 ALTER TABLE `ahauser` DISABLE KEYS */;
INSERT INTO `ahauser` VALUES (1,'aimanejaghda@AHAbooks.com','1234567890','JAGHDA','AIMANE','2003-10-22','2023-06-04','Casablanca','Morocco','admin','users/ProfilePicture/image7.jpg'),(6,'katewhite@ahabooks.com','1234567890','White','Kate','1951-09-03','2023-06-08','New York ','United States','author','users/ProfilePicture/kate white.jpg'),(7,'tracywolff@ahabooks.com','1234567890','Wolff','Tracy','1986-11-12','2023-06-08','California','United States','author','users/ProfilePicture/tracy wolf.jpg'),(8,'constanzacasati@ahabooks.com','1234567890','Casati','Costanza','1995-06-18','2023-06-08','Texas','United States','author','users\\defaultProfilePicture.jpg'),(9,'ritachangeppig@ahabooks.com','1234567890','Chang-Eppig','Rita','1990-12-02','2023-06-08','Manchester','United Kingdom','author','users\\defaultProfilePicture.jpg'),(10,'jognvaillant@ahabooks.com','1234567890','Vaillant','John','1962-04-02','2023-06-08','Massachusetts','United States','author','users/ProfilePicture/jogn vaillant.jpg'),(11,'rebeccayarros@ahabooks.com','1234567890','Yarros','Rebecca','1981-10-01','2023-06-08','New York','United States','author','users\\defaultProfilePicture.jpg'),(12,'jonathaneig@ahabooks.com','1234567890','Eig','Jonathan','1964-04-27','2023-06-08','New York','United States','author','users/ProfilePicture/jonathan eig.jpg'),(13,'dianaurban@ahabooks.com','1234567890','Urban','Diana','1989-11-03','2023-06-08','Virginia','United States','author','users\\defaultProfilePicture.jpg'),(14,'linsdaycameron@ahabooks.com','1234567890','Cameron','Lindsay','1974-04-06','2023-06-08','New Mexico','United States','author','users\\defaultProfilePicture.jpg'),(15,'elissasussman@ahabooks.com','1234567890','Sussman','Elissa','1987-07-17','2023-06-08','Pennsylvania','United States','author','users\\defaultProfilePicture.jpg'),(16,'lunamcnamara@ahabooks.com','1234567890','McNamara','Luna','1970-11-30','2023-06-08','Missouri','United States','author','users\\defaultProfilePicture.jpg'),(17,'amymatthews@ahabooks.com','1234567890','Matthews','Amy','1984-03-05','2023-06-08','Yekaterinburg','Russia','author','users\\defaultProfilePicture.jpg'),(18,'davidvondrehle@ahabooks.com','123456789','von Drehle','David','1961-02-06','2023-06-08','Colorado','United States','author','users\\defaultProfilePicture.jpg'),(19,'marklawrence@ahabooks.com','1234567890','Lawrence','Mark','1966-01-28','2023-06-08','New Orleans','United States','author','users/ProfilePicture/mark lawrence.jpg'),(20,'jaclyngoldis@ahabooks.com','1234567890','Goldis','Jaclyn','1978-12-03','2023-06-08','Reykjavík','Iceland','author','users\\defaultProfilePicture.jpg'),(21,'mikkibrammer@ahabooks.com','1234567890','Brammer','Mikki','1962-07-16','2023-06-08','Bangkok','Thailand','author','users\\defaultProfilePicture.jpg'),(22,'abrahamverghese@ahabooks.com','1234567890','Verghese','Abraham','1955-05-30','2023-06-08','Addis Ababa','Ethopia','author','users/ProfilePicture/abraham verghese.jpg'),(23,'justincronin@ahabooks.com','1234567890','Cronin','Justin','1962-11-25','2023-06-08','New England','United States','author','users\\defaultProfilePicture.jpg'),(24,'marybethkeane@ahabooks.com','1234567890','Beth Keane','Mary','1977-06-03','2023-06-08','New York','United States','author','users\\defaultProfilePicture.jpg'),(26,'patticallahanhenry@ahabooks.com','1234567890','Callahan Henry','Patti','1970-01-20','2023-06-08','Salzburg','Austia','author','users\\defaultProfilePicture.jpg'),(27,'marthawells@ahabooks.com','1234567890','Wells','Martha','1964-01-01','2023-06-08','Texas','United States','author','users\\defaultProfilePicture.jpg'),(28,'rfkuang@ahabooks.com','1234567890','Kuang','R.F.','1989-03-18','2023-06-08','Mumbai','India','author','users\\defaultProfilePicture.jpg'),(29,'hamdahamada@ahabook.com','1234567890','barqoli','hamada','2012-12-04','2023-06-11','wad zem','morocco','author','users\\defaultProfilePicture.jpg'),(30,'ahmedmaqri@ahabook.com','1234567890','MAQRI','AHMED','2005-04-11','2023-06-11','Tangier','Morocco','author','users\\defaultProfilePicture.jpg'),(31,'hichammatazi@ahabook.com','1234567890','matazi','hicham','2002-10-23','2023-06-12','tangier','morocco','author','users\\defaultProfilePicture.jpg'),(33,'elmatazi@ahabook.com','1234567890','el matazi','Hicham','2002-01-01','2023-06-12','tangier','Morocco','author','users/ProfilePicture/hicham.jpg'),(34,'hjhjh@gmail.com','1235456789','el matazi','hicham','2001-01-01','2023-06-12','tanger','morocco','user','users\\defaultProfilePicture.jpg'),(35,'agfjjhgkmnbvfghygfdrtg@hotmail.com','123456','abderahman','ahmed','2002-12-12','2023-06-12','tanger','morroco','user','users\\defaultProfilePicture.jpg'),(36,'elmatazihicham@gmail.com','1234567890','hach','hich','2002-02-02','2023-06-12','tanger','Morocco','user','users\\defaultProfilePicture.jpg'),(37,'gyuijg@gmail.com','12344567890','el matazi','hicham','2002-05-02','2023-06-12','tanger','morocco','author','users\\defaultProfilePicture.jpg'),(38,'bilel@gmail.com','123456789','houadar','bilal','2004-02-12','2023-12-15','tanja l3alya','moghrib','admin','users/ProfilePicture/5e89f0b3a3e91a7b76f8fc019fde1ec8.jpg');
/*!40000 ALTER TABLE `ahauser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-03  5:18:22
