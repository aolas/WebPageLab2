-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: page_db
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `article_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Article Id',
  `user_id` int(5) unsigned NOT NULL COMMENT 'Creators id',
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Article title',
  `article_text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Article text',
  `wordcount` int(6) unsigned NOT NULL DEFAULT 0 COMMENT 'Artical word count',
  `publication_time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'The time and date the article posted',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Articles table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Comments Id',
  `user_id` int(5) unsigned NOT NULL COMMENT 'Comment originator',
  `article_id` int(5) unsigned NOT NULL COMMENT 'Defines to witch article comment belongs',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Comment text',
  `publication_time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'The time and date the comments registered',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Comments table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `my_tabel`
--

DROP TABLE IF EXISTS `my_tabel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_tabel` (
  `comment_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Comments Id',
  `user_id` int(5) unsigned NOT NULL COMMENT 'Comment originator',
  `article_id` int(5) unsigned NOT NULL COMMENT 'Defines to witch article comment belongs',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Comment text',
  `publication_time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'The time and date the comments registered',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Comments table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'user id',
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'User email ',
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'User password',
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'User displayd name',
  `reg_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) COMMENT 'Registration time',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Users table';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-26 20:13:18
