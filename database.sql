-- MySQL dump 10.13  Distrib 5.6.37, for Win32 (AMD64)
--
-- Host: localhost    Database: music
-- ------------------------------------------------------
-- Server version	5.6.37

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
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `albumID` int(8) NOT NULL,
  `artistID` int(8) NOT NULL,
  `albumName` char(128) NOT NULL,
  `releaseYear` int(8) NOT NULL,
  `genre` char(128) NOT NULL,
  `albumArt` varchar(2083) DEFAULT NULL,
  PRIMARY KEY (`albumID`),
  KEY `albumName` (`albumName`(8))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,1,'Victory Lap',2017,'Punk','https://img.discogs.com/0RMCHGJHVYe9EROMVRKSqTSLQeI=/fit-in/300x300/filters:strip_icc():format(jpeg):mode_rgb():quality(40)/discogs-images/R-10969554-1507406100-5461.jpeg.jpg'),(2,1,'Supporting Caste',2009,'Punk','https://img.discogs.com/SGs8w28BowTbO29QA3nudLy23io=/fit-in/300x300/filters:strip_icc():format(jpeg):mode_rgb():quality(40)/discogs-images/R-8101461-1455156252-4277.jpeg.jpg');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artists` (
  `artistID` int(8) NOT NULL AUTO_INCREMENT,
  `artistName` char(128) NOT NULL,
  PRIMARY KEY (`artistID`),
  KEY `artistName` (`artistName`(8))
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists`
--

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` VALUES (1,'Propagandhi'),(8,'Western Addiction'),(11,'Creedence Clearwater Revival'),(13,'Notorious BIG'),(14,'Blind Guardian'),(15,'Arcade Fire'),(16,'Galneryus'),(17,'Skullcrack');
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracks` (
  `trackID` int(8) NOT NULL AUTO_INCREMENT,
  `albumID` int(8) NOT NULL,
  `artistID` int(8) NOT NULL,
  `trackNum` int(8) NOT NULL,
  `trackName` char(128) NOT NULL,
  `runtime` char(128) NOT NULL,
  `lyricsURL` varchar(2083) NOT NULL,
  PRIMARY KEY (`trackID`),
  KEY `trackName` (`trackName`(8))
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracks`
--

LOCK TABLES `tracks` WRITE;
/*!40000 ALTER TABLE `tracks` DISABLE KEYS */;
INSERT INTO `tracks` VALUES (1,2,1,1,'Night Letters','3:52','https://genius.com/Propagandhi-night-letters-lyrics'),(2,2,1,2,'Supporting Caste','4:59','https://genius.com/Propagandhi-supporting-caste-lyrics'),(3,2,1,3,'Tertium Non Datur','3:18','https://genius.com/Propagandhi-tertium-non-datur-lyrics'),(4,2,1,4,'Dear Coach\'s Corner','4:52','https://genius.com/Propagandhi-dear-coachs-corner-lyrics'),(5,2,1,5,'This Is Your Life','1:04','https://genius.com/Propagandhi-this-is-your-life-lyrics'),(6,2,1,6,'Human(e) Meat (The Flensing of Sandor Katz)','2:49','https://genius.com/Propagandhi-humane-meat-the-flensing-of-sandor-katz-lyrics'),(7,2,1,7,'Potemkin City Limits','3:50','https://genius.com/Propagandhi-potemkin-city-limits-lyrics'),(8,2,1,8,'The Funeral Procession','4:15','https://genius.com/Propagandhi-the-funeral-procession-lyrics'),(9,2,1,9,'Without Love','3:51','https://genius.com/Propagandhi-without-love-lyrics'),(10,2,1,10,'Incalculable Effects','2:10','https://genius.com/Propagandhi-incalculable-effects-lyrics'),(11,2,1,11,'The Banger\'s Embrace','2:14','https://genius.com/Propagandhi-the-bangers-embrace-lyrics'),(12,2,1,12,'Last Will and Testament','15:16','https://genius.com/Propagandhi-last-will-and-testament-lyrics'),(13,1,1,1,'Victory Lap','2:57','https://genius.com/Propagandhi-victory-lap-lyrics'),(14,1,1,2,'Comply/Resist','3:23','https://genius.com/Propagandhi-comply-resist-lyrics'),(15,1,1,3,'Cop Just Out of Frame','2:47','https://genius.com/Propagandhi-cop-just-out-of-frame-lyrics'),(16,1,1,4,'When All Your Fears Collide','3:18','https://genius.com/Propagandhi-when-all-your-fears-collide-lyrics');
/*!40000 ALTER TABLE `tracks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-22 17:18:44
