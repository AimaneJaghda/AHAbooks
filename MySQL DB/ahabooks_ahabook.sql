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
-- Table structure for table `ahabook`
--

DROP TABLE IF EXISTS `ahabook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ahabook` (
  `idBook` int NOT NULL AUTO_INCREMENT,
  `titreBook` varchar(250) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `numberPages` int DEFAULT NULL,
  `editorBook` varchar(30) DEFAULT NULL,
  `ISBN` varchar(40) DEFAULT NULL,
  `publicationDate` date DEFAULT NULL,
  `categoryBook` varchar(250) DEFAULT NULL,
  `langueBook` varchar(30) DEFAULT NULL,
  `idAuthor` int DEFAULT NULL,
  `bookPicture` text,
  `bookDescription` text,
  PRIMARY KEY (`idBook`),
  UNIQUE KEY `ISBN` (`ISBN`),
  KEY `idAuthor` (`idAuthor`),
  CONSTRAINT `ahabook_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `ahaauthor` (`idAuthor`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ahabook`
--

LOCK TABLES `ahabook` WRITE;
/*!40000 ALTER TABLE `ahabook` DISABLE KEYS */;
INSERT INTO `ahabook` VALUES (24,'BETWEEN TWO STRANGERS',10.00,232,'editor1','9780063247369','2023-06-08','Mystery Fiction','English',2,'Books/bookPicture/BETWEEN TWO STRANGERS.jpg',''),(25,'CHERISH',13.99,194,'editor2','9781649373168','2023-06-08','Fantasy Romance','English',3,'Books/bookPicture/CHERISH.jpg',''),(26,'CLYTEMNESTRA',10.00,148,'editor3','9781728268231','2023-06-08','','English',4,'Books/bookPicture/CLYTEMNESTRA.jpg',''),(27,'DEEP AS THE SKY, RED AS THE SEA',18.50,246,'editor4','9781639730377','2023-06-08','Fantasy Fiction History','English',5,'Books/bookPicture/DEEP AS THE SKY, RED AS THE SEA.jpg',''),(28,'FIRE WEATHER',12.55,153,'editor5','9781524732851','2023-06-08','History','English',6,'Books/bookPicture/FIRE WEATHER.jpg',''),(29,'FOURTH WING',11.05,198,'editor6','9781649374042','2023-06-08','Fiction Fantasy Romance','English',7,'Books/bookPicture/FOURTH WING.jpg',''),(30,'KING: A LIFE',19.99,273,'editor7','9780374279295','2023-06-08','History','English',8,'Books/bookPicture/KING A LIFE.jpg',''),(31,'LYING IN THE DEEP',11.50,173,'editor8','9780593527603','2023-06-08','Mystery Romance Fiction','English',9,'Books/bookPicture/LYING IN THE DEEP.jpg',''),(32,'NO ONE NEEDS TO KNOW',15.00,199,'editor9','9780593159101','2023-06-08','Mystery Fiction','English',10,'Books/bookPicture/NO ONE NEEDS TO KNOW.jpg',''),(33,'ONCE MORE WITH FEELING',9.50,124,'editor10','9780593357378','2023-06-08','Romance Fiction','English',11,'Books/bookPicture/ONCE MORE WITH FEELING.jpg',''),(34,'PSYCHE AND EROS',13.00,201,'editor11','9780063295070','2023-06-08','Fantasy Romance Fiction History','English',12,'Books/bookPicture/PSYCHE AND EROS.jpg',''),(35,'SOMEONE ELSE\'S BUCKET LIST',14.35,173,'editor12','9781496742087','2023-06-08','Romance Fiction','English',13,'Books/bookPicture/SOMEONE ELSE\'S BUCKET LIST.jpg',''),(36,'THE BOOK OF CHARLIE',10.55,132,'editor13','9781476773926','2023-06-08','History','English',14,'Books/bookPicture/THE BOOK OF CHARLIE.jpg',''),(37,'THE BOOK THAT WOULDN\'T BURN',17.99,214,'editor14','9780593437919','2023-06-08','Fantasy Fiction','English',15,'Books/bookPicture/THE BOOK THAT WOULDN\'T BURN.jpg',''),(38,'THE CHATEAU',13.45,130,'editor15','9781668013014','2023-06-08','Mystery Fiction','English',16,'Books/bookPicture/THE CHATEAU.jpg',''),(39,'THE COLLECTED REGRETS OF CLOVER',11.10,158,'editor16','9781250284396','2023-06-08','Fiction Romance','English',17,'Books/bookPicture/THE COLLECTED REGRETS OF CLOVER.jpg',''),(40,'THE COVENANT OF THE WATER',16.50,183,'editor17','9780802162175','2023-06-08','Fiction History Mystery','English',18,'Books/bookPicture/THE COVENANT OF THE WATER.jpg',''),(41,'THE FERRYMAN',18.85,236,'editor18','9780525619475','2023-06-08','Fiction Fantasy Mystery','English',19,'Books/bookPicture/THE FERRYMAN.jpg',''),(42,'THE HALF MOON',20.00,227,'editor19','9781982172602','2023-06-08','Fiction Mystery Romance','English',20,'Books/bookPicture/THE HALF MOON.jpg',''),(43,'THE SECRET BOOK OF FLORA LEA',20.50,214,'editor20','9781668011836','2023-06-08','Fiction Mystery Fantasy History','English',21,'Books/bookPicture/THE SECRET BOOK OF FLORA LEA.jpg',''),(45,'WITCH KING',14.70,136,'editor22','9781250826794','2023-06-08','Fantasy Fiction','English',22,'Books/bookPicture/WITCH KING.jpg',''),(46,'YELLOWFACE',10.75,114,'editor23','9780008532772','2023-06-08','','English',23,'Books/bookPicture/YELLOWFACE.jpg','Fiction Mystery'),(47,'book1',19.00,198,'fff','123456789098765432','2023-06-12','Fiction','Français',NULL,'Books/bookPicture/CHERISH.jpg','hadchi ha test'),(48,'book1',19.00,192,'hgg','234567876543234567','2023-06-12','Fiction','English',NULL,'Books/bookPicture/FOURTH WING.jpg','dfghgfdsdfghjkjhgfdfghjk'),(49,'test',19.99,121,'fefefe','1234565432345','2023-06-12','Fantasy','English',NULL,'Books/bookPicture/BETWEEN TWO STRANGERS.jpg','cccccccccccccccccccccccc'),(54,'hayat matazoi',4000.00,23,'editor1','345678765432345678','2023-06-12','Fiction Mystery History','Arabic',26,'Books/bookPicture/hicham.jpg','matazi ya3ich'),(55,'book2',10.05,198,'editor1','1234567898765','2023-06-12','Fiction Fantasy Mystery','Français',28,'Books/bookPicture/DEEP AS THE SKY, RED AS THE SEA.jpg','description1');
/*!40000 ALTER TABLE `ahabook` ENABLE KEYS */;
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
