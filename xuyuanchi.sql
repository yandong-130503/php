-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: xuyuanchi
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `guanli`
--

DROP TABLE IF EXISTS `guanli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guanli` (
  `kouling` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guanli`
--

LOCK TABLES `guanli` WRITE;
/*!40000 ALTER TABLE `guanli` DISABLE KEYS */;
INSERT INTO `guanli` VALUES ('diyi','余晖'),('123456789','张三'),('qwerty','qwerty'),('safawf','faefra'),('afwaegfrae','afrwaef'),('afrawgvrae','areag'),('fjuyjmntd','djjtynj'),('afgaer','sgrae'),('afwaegvager','afvawe'),('afcawefc','avae'),('avcfwag','afew'),('asfaw','asdf'),('asffcaw','avfaer'),('afwe','afwe'),('asfewf','aefw'),('afweaf','afeawfc'),('afweaf','segrfaer'),('afeargf','afearg'),('avgreg','afreg'),('agregrea','dgre'),('asfwef','agre');
/*!40000 ALTER TABLE `guanli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yuanwang`
--

DROP TABLE IF EXISTS `yuanwang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yuanwang` (
  `id` varchar(225) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `yuanwang` varchar(225) DEFAULT NULL,
  `mima` varchar(225) DEFAULT NULL,
  `yanse` varchar(225) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yuanwang`
--

LOCK TABLES `yuanwang` WRITE;
/*!40000 ALTER TABLE `yuanwang` DISABLE KEYS */;
INSERT INTO `yuanwang` VALUES ('1','余晖2','长命百岁长命百岁长命百岁长命百岁','123456','e2d6d6','2022-12-20 04:42:12'),('2','余晖3','万事如意','123456','c4cc94','2022-12-20 04:42:14'),('3','余晖2','步步高升','123456','c194cc','2022-12-20 04:42:15'),('4','张三','333','123456','94ccc1','2022-12-21 12:40:41'),('5','jvhhjgbkn','天下太平','666666','c194cc','2022-12-21 12:41:31'),('6','gbkjhkuhn','国泰民安','666','c4cc94','2022-12-21 12:41:54'),('7','gfuygi','心想事成','666','ccb194','2022-12-21 12:42:33'),('8','jfjg','万事如意','666','ccb194','2022-12-21 12:42:52'),('9','ytdtyfjyg','金身不坏','666','ccb194','2022-12-21 12:43:16'),('10','jhvhjb','环球旅行','666','c194cc','2022-12-21 12:43:54'),('11','vhhj','中彩票','666','c4cc94','2022-12-21 12:44:44'),('12','vhjvjhgjv','过目不忘','666','ccb194','2022-12-21 12:45:03'),('13','djtktyfu','变成x博士','666','94ccc1','2022-12-21 12:45:17'),('14','xfgjfc','变成金刚狼','666','ccb194','2022-12-21 12:45:29'),('15','ncjhvjb','开始修仙','666','c194cc','2022-12-21 12:46:02'),('16','qwer','考试第一','666','ccb194','2022-12-21 12:46:45'),('17','张三','变好看','666','ccb194','2022-12-21 12:53:59'),('18','金刚狼','心想事成','666','ccb194','2022-12-21 12:55:02'),('19','变形女','心想事成','666','c194cc','2022-12-21 12:56:05'),('20','贝爷','长生不老','666','ccb194','2022-12-21 12:56:40'),('21','宝儿姐','找到家人','666','ccb194','2022-12-21 12:57:49'),('22','张锡林','成为普通人','666','ccb194','2022-12-21 12:59:22');
/*!40000 ALTER TABLE `yuanwang` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-21 21:08:42
