CREATE DATABASE  IF NOT EXISTS `text_system` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_danish_ci */;
USE `text_system`;
-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: text_system
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_danish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'en','English'),(2,'aa','Afar'),(3,'ab','Abkhazian'),(4,'af','Afrikaans'),(5,'am','Amharic'),(6,'ar','Arabic'),(7,'as','Assamese'),(8,'ay','Aymara'),(9,'az','Azerbaijani'),(10,'ba','Bashkir'),(11,'be','Belarusian'),(12,'bg','Bulgarian'),(13,'bh','Bihari'),(14,'bi','Bislama'),(15,'bn','Bengali/Bangla'),(16,'bo','Tibetan'),(17,'br','Breton'),(18,'ca','Catalan'),(19,'co','Corsican'),(20,'cs','Czech'),(21,'cy','Welsh'),(22,'da','Danish'),(23,'de','German'),(24,'dz','Bhutani'),(25,'el','Greek'),(26,'eo','Esperanto'),(27,'es','Spanish'),(28,'et','Estonian'),(29,'eu','Basque'),(30,'fa','Persian'),(31,'fi','Finnish'),(32,'fj','Fiji'),(33,'fo','Faeroese'),(34,'fr','French'),(35,'fy','Frisian'),(36,'ga','Irish'),(37,'gd','Scots/Gaelic'),(38,'gl','Galician'),(39,'gn','Guarani'),(40,'gu','Gujarati'),(41,'ha','Hausa'),(42,'hi','Hindi'),(43,'hr','Croatian'),(44,'hu','Hungarian'),(45,'hy','Armenian'),(46,'ia','Interlingua'),(47,'ie','Interlingue'),(48,'ik','Inupiak'),(49,'in','Indonesian'),(50,'is','Icelandic'),(51,'it','Italian'),(52,'iw','Hebrew'),(53,'ja','Japanese'),(54,'ji','Yiddish'),(55,'jw','Javanese'),(56,'ka','Georgian'),(57,'kk','Kazakh'),(58,'kl','Greenlandic'),(59,'km','Cambodian'),(60,'kn','Kannada'),(61,'ko','Korean'),(62,'ks','Kashmiri'),(63,'ku','Kurdish'),(64,'ky','Kirghiz'),(65,'la','Latin'),(66,'ln','Lingala'),(67,'lo','Laothian'),(68,'lt','Lithuanian'),(69,'lv','Latvian/Lettish'),(70,'mg','Malagasy'),(71,'mi','Maori'),(72,'mk','Macedonian'),(73,'ml','Malayalam'),(74,'mn','Mongolian'),(75,'mo','Moldavian'),(76,'mr','Marathi'),(77,'ms','Malay'),(78,'mt','Maltese'),(79,'my','Burmese'),(80,'na','Nauru'),(81,'ne','Nepali'),(82,'nl','Dutch'),(83,'no','Norwegian'),(84,'oc','Occitan'),(85,'om','(Afan)/Oromoor/Oriya'),(86,'pa','Punjabi'),(87,'pl','Polish'),(88,'ps','Pashto/Pushto'),(89,'pt','Portuguese'),(90,'qu','Quechua'),(91,'rm','Rhaeto-Romance'),(92,'rn','Kirundi'),(93,'ro','Romanian'),(94,'ru','Russian'),(95,'rw','Kinyarwanda'),(96,'sa','Sanskrit'),(97,'sd','Sindhi'),(98,'sg','Sangro'),(99,'sh','Serbo-Croatian'),(100,'si','Singhalese'),(101,'sk','Slovak'),(102,'sl','Slovenian'),(103,'sm','Samoan'),(104,'sn','Shona'),(105,'so','Somali'),(106,'sq','Albanian'),(107,'sr','Serbian'),(108,'ss','Siswati'),(109,'st','Sesotho'),(110,'su','Sundanese'),(111,'sv','Swedish'),(112,'sw','Swahili'),(113,'ta','Tamil'),(114,'te','Telugu'),(115,'tg','Tajik'),(116,'th','Thai'),(117,'ti','Tigrinya'),(118,'tk','Turkmen'),(119,'tl','Tagalog'),(120,'tn','Setswana'),(121,'to','Tonga'),(122,'tr','Turkish'),(123,'ts','Tsonga'),(124,'tt','Tatar'),(125,'tw','Twi'),(126,'uk','Ukrainian'),(127,'ur','Urdu'),(128,'uz','Uzbek'),(129,'vi','Vietnamese'),(130,'vo','Volapuk'),(131,'wo','Wolof'),(132,'xh','Xhosa'),(133,'yo','Yoruba'),(134,'zh','Chinese'),(135,'zu','Zulu');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resellers`
--

DROP TABLE IF EXISTS `resellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_danish_ci DEFAULT NULL,
  `default_language_id` int(11) DEFAULT NULL,
  `address` varchar(120) COLLATE utf8_danish_ci DEFAULT NULL,
  `phone` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_resellers_lang_idx` (`default_language_id`),
  CONSTRAINT `fk_resellers_lang` FOREIGN KEY (`default_language_id`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resellers`
--

LOCK TABLES `resellers` WRITE;
/*!40000 ALTER TABLE `resellers` DISABLE KEYS */;
INSERT INTO `resellers` VALUES (1,'Reseller English',1,'Address Uknown','0118 999 881 999 119 725 3',1),(2,'Reseller Danish',22,NULL,'+45 99 88 44 55',1),(3,'Other Reseller',67,NULL,NULL,1);
/*!40000 ALTER TABLE `resellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `texts`
--

DROP TABLE IF EXISTS `texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `key` varchar(45) COLLATE utf8_danish_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `reseller_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `unique_index` (`key`,`reseller_id`,`language_id`),
  KEY `fk_texts_1_idx` (`language_id`),
  KEY `fk_texts_resell_idx` (`reseller_id`),
  CONSTRAINT `fk_texts_lang` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_texts_resell` FOREIGN KEY (`reseller_id`) REFERENCES `resellers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texts`
--

LOCK TABLES `texts` WRITE;
/*!40000 ALTER TABLE `texts` DISABLE KEYS */;
INSERT INTO `texts` VALUES (1,'title','Title',1,1),(2,'title','Tilel',1,22),(3,'title','Título',1,27),(4,'title','Otsikko',1,31),(5,'title','Titre',1,34),(6,'title','DK Titel',2,22),(7,'book','Book',1,1),(8,'book','Bog',1,22),(9,'book','Libro',1,27),(10,'test','Test Example, a bit longer just to try the field',1,1),(11,'description','Description',1,1),(12,'description','Beskrivelse',1,22),(13,'description','説明',1,53);
/*!40000 ALTER TABLE `texts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-12 15:14:56
