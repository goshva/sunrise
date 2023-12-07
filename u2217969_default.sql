-- MySQL dump 10.13  Distrib 5.7.27-30, for Linux (x86_64)
--
-- Host: localhost    Database: u2217969_default
-- ------------------------------------------------------
-- Server version	5.7.27-30

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
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Table structure for table `common_tests`
--

DROP TABLE IF EXISTS `common_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `competetion_id` int(11) NOT NULL,
  `created_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `competetion_test_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_tests`
--

LOCK TABLES `common_tests` WRITE;
/*!40000 ALTER TABLE `common_tests` DISABLE KEYS */;
INSERT INTO `common_tests` VALUES (2,146,'auto',NULL,NULL,'Ледовое плавание','2023-11-21 12:32:47','2023-11-21 12:32:47'),(3,147,'auto',NULL,NULL,'Диагностика и ремонт','2023-11-21 12:34:58','2023-11-21 12:34:58');
/*!40000 ALTER TABLE `common_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competetion_levels`
--

DROP TABLE IF EXISTS `competetion_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competetion_levels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `position_id` bigint(20) unsigned NOT NULL,
  `level` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `competetion_levels_competetion_id_foreign` (`competetion_id`),
  KEY `competetion_levels_position_id_foreign` (`position_id`),
  CONSTRAINT `competetion_levels_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `competetion_levels_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=650 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competetion_levels`
--

LOCK TABLES `competetion_levels` WRITE;
/*!40000 ALTER TABLE `competetion_levels` DISABLE KEYS */;
INSERT INTO `competetion_levels` VALUES (633,146,289,4,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(634,146,290,3,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(635,146,291,2,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(636,146,292,1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(637,147,289,1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(638,147,290,1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(639,147,291,1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(640,147,292,1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(645,146,295,1,'2023-11-22 07:33:07','2023-11-22 07:33:07'),(646,147,295,1,'2023-11-22 07:33:07','2023-11-22 07:33:07'),(647,146,296,4,'2023-11-22 07:35:49','2023-11-22 07:35:49'),(648,147,296,2,'2023-11-22 07:35:49','2023-11-22 07:35:49'),(649,150,298,1,'2023-11-27 18:13:53','2023-11-27 18:13:53');
/*!40000 ALTER TABLE `competetion_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competetion_position`
--

DROP TABLE IF EXISTS `competetion_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competetion_position` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `position_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `competetion_position_position_id_foreign` (`position_id`),
  KEY `competetion_position_competetion_id_foreign` (`competetion_id`),
  CONSTRAINT `competetion_position_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `competetion_position_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competetion_position`
--

LOCK TABLES `competetion_position` WRITE;
/*!40000 ALTER TABLE `competetion_position` DISABLE KEYS */;
INSERT INTO `competetion_position` VALUES (110,146,289,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(111,146,290,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(112,146,291,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(113,146,292,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(114,147,289,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(115,147,290,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(116,147,291,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(117,147,292,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(122,146,295,'2023-11-22 07:33:07','2023-11-22 07:33:07'),(123,147,295,'2023-11-22 07:33:07','2023-11-22 07:33:07'),(124,146,296,'2023-11-22 07:35:49','2023-11-22 07:35:49'),(125,147,296,'2023-11-22 07:35:49','2023-11-22 07:35:49'),(128,150,298,'2023-11-27 18:13:53','2023-11-27 18:13:53');
/*!40000 ALTER TABLE `competetion_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competetion_tests`
--

DROP TABLE IF EXISTS `competetion_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competetion_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `common_test_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `created_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `competetion_tests_competetion_id_foreign` (`competetion_id`),
  CONSTRAINT `competetion_tests_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competetion_tests`
--

LOCK TABLES `competetion_tests` WRITE;
/*!40000 ALTER TABLE `competetion_tests` DISABLE KEYS */;
INSERT INTO `competetion_tests` VALUES (2,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:47','2023-11-21 12:32:47'),(3,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:47','2023-11-21 12:32:47'),(4,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:47','2023-11-21 12:32:47'),(5,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(6,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(7,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(8,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(9,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(10,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(11,2,'Ледовое плавание',146,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(12,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(13,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(14,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(15,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(16,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(17,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(18,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(19,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(20,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(21,3,'Диагностика и ремонт',147,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(22,NULL,'Ручная сборка',146,'handle','2023-11-22 17:58:09','2023-11-22 17:58:09');
/*!40000 ALTER TABLE `competetion_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competetions`
--

DROP TABLE IF EXISTS `competetions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competetions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `complex_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competetions`
--

LOCK TABLES `competetions` WRITE;
/*!40000 ALTER TABLE `competetions` DISABLE KEYS */;
INSERT INTO `competetions` VALUES (146,'Ледовое плавание',1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(147,'Диагностика и ремонт',1,'2023-09-27 10:25:34','2023-09-27 10:25:34'),(150,'Компетенция 1',NULL,'2023-11-27 18:13:50','2023-11-27 18:13:50');
/*!40000 ALTER TABLE `competetions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complexes`
--

DROP TABLE IF EXISTS `complexes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complexes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complexes`
--

LOCK TABLES `complexes` WRITE;
/*!40000 ALTER TABLE `complexes` DISABLE KEYS */;
INSERT INTO `complexes` VALUES (1,'Судовая служба'),(2,'Буровой комплекс '),(3,'Комплекс механического оборудования'),(4,'Комплекс электромеханического оборудования');
/*!40000 ALTER TABLE `complexes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `last_time_message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversations_sender_id_foreign` (`sender_id`),
  KEY `conversations_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `conversations_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `conversations_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversations`
--

LOCK TABLES `conversations` WRITE;
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
INSERT INTO `conversations` VALUES (1,14,1,'2023-11-23 08:54:59','2023-09-01 14:37:43','2023-11-23 05:54:59'),(2,15,1,'2023-11-20 11:49:37','2023-09-01 14:37:43','2023-11-20 08:49:37'),(26,14,34,'2023-10-14 19:35:21',NULL,'2023-10-14 16:35:21'),(27,15,34,'2023-09-21 19:22:53',NULL,NULL),(28,14,35,'2023-09-21 19:22:53',NULL,NULL),(29,15,35,'2023-09-21 19:22:53',NULL,NULL),(30,14,36,'2023-11-21 20:24:55',NULL,'2023-11-21 17:24:55'),(31,15,36,'2023-09-21 19:22:53',NULL,NULL),(32,14,37,'2023-09-21 19:22:53',NULL,NULL),(33,15,37,'2023-09-21 19:22:53',NULL,NULL),(34,14,38,'0','2023-11-14 16:08:50','2023-11-14 16:08:50'),(35,15,38,'0','2023-11-14 16:08:50','2023-11-14 16:08:50'),(36,14,39,'0','2023-11-16 16:33:20','2023-11-16 16:33:20'),(37,15,39,'0','2023-11-16 16:33:20','2023-11-16 16:33:20'),(40,14,44,'0','2023-11-22 07:15:49','2023-11-22 07:15:49'),(41,15,44,'0','2023-11-22 07:15:49','2023-11-22 07:15:49'),(78,14,68,'0','2023-11-22 11:27:40','2023-11-22 11:27:40'),(79,15,68,'0','2023-11-22 11:27:40','2023-11-22 11:27:40'),(80,14,69,'0','2023-11-22 18:56:54','2023-11-22 18:56:54'),(81,15,69,'0','2023-11-22 18:56:54','2023-11-22 18:56:54');
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicators`
--

DROP TABLE IF EXISTS `indicators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `indicators_group_id` bigint(20) unsigned DEFAULT NULL,
  `level` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `indicators_competetion_id_foreign` (`competetion_id`),
  KEY `group_id` (`indicators_group_id`),
  CONSTRAINT `indicators_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicators`
--

LOCK TABLES `indicators` WRITE;
/*!40000 ALTER TABLE `indicators` DISABLE KEYS */;
INSERT INTO `indicators` VALUES (1,'Осведомлен об основных закономерностях образования льда',146,1,1,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(2,'Знает зависимость плотности льда от его температуры и солености',146,2,2,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(3,'Использует ледовую карту для определения границ ледяных полей',146,3,3,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(4,'Контролирует скорость дрейфа льдов по метеорологическим данным',146,4,4,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(5,'Оценивает влияние маневрирования на безопасность корпуса судна',146,5,5,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(6,'Осведомлен о категориях транспортных судов  ледового плавания',146,1,1,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(7,'Знает Правила плавания на акватории Северного морского пути',146,2,2,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(8,'Руководствуется Правилами плавания в акватории Северного морского пути при определении сроков получения разрешения',146,3,3,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(9,'Осуществляет маневры, направленные на освобождение судна от заклинивания во льдах',146,4,4,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(10,'Оценивает готовность судна к ледовому плаванию',146,5,5,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(11,'Имеет представление о диагностике и ремонте судовых двигателей внутреннего сгорания',147,1,1,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(12,'Знает порядок проверки балластной и осушительной систем',147,2,2,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(13,'Устраняет неисправности в работе судовых насосов',147,3,3,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(14,'Анализирует результаты индицирования судового дизеля: средние индикаторные давления',147,4,4,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(15,'Определяет необходимость диагностики и ремонта энергетических установок и вспомогательных механизмов',147,5,5,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(16,'Имеет представление о диагностике и ремонте судовых механизмов',147,1,1,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(17,'Знает порядок проверки топливной системы и системы водяного охлаждения судового дизеля',147,2,2,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(18,'Устраняет неисправности в системе охлаждения судового дизеля',147,3,3,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(19,'Анализирует результаты индицирования судового дизеля: температура выпускных газов',147,4,4,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(20,'Проводит экспертную оценку состояния энергетической установки, после диагностики и ремонта',147,5,5,'2023-09-30 21:25:58','2023-09-30 21:25:58'),(25,'индикатор 1',150,1,1,'2023-11-27 18:24:02','2023-11-27 18:24:02');
/*!40000 ALTER TABLE `indicators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicators_group`
--

DROP TABLE IF EXISTS `indicators_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicators_group` (
  `id` bigint(20) unsigned NOT NULL,
  `group_name` text NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicators_group`
--

LOCK TABLES `indicators_group` WRITE;
/*!40000 ALTER TABLE `indicators_group` DISABLE KEYS */;
INSERT INTO `indicators_group` VALUES (1,'a.','Осведомленность\r\n'),(2,'b.','Знания\r\n'),(3,'c.','Опыт\r\n'),(4,'d.','Мастерство\r\n'),(5,'e.','Эксперт\r\n');
/*!40000 ALTER TABLE `indicators_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `literatures`
--

DROP TABLE IF EXISTS `literatures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `literatures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `literatures`
--

LOCK TABLES `literatures` WRITE;
/*!40000 ALTER TABLE `literatures` DISABLE KEYS */;
INSERT INTO `literatures` VALUES (13,146,'https://u2217969.isp.regruhosting.ru/storage/literature//thpTe4MZwdAXQBilqfs7YDRZvbK0kTEq4WkoZF39.pdf','Бурение нефтяных и газовых скважин','2023-09-28 14:28:17','2023-10-27 17:34:16'),(14,147,'https://u2217969.isp.regruhosting.ru/storage/literature//DiywrPgPAHdhcGrMlGdu86Mtts4vHg1uEUZdJbyC.pdf','Справочник по бурению скважин на воду','2023-09-28 14:29:31','2023-11-22 19:22:33'),(18,150,'https://u2217969.isp.regruhosting.ru/storage/app/public/literature/4r9ijuZIh8wj4wqsvoJ53vI3M5LjT17YDx7B4TMF.xlsx','1111','2023-11-27 19:06:13','2023-11-27 19:06:13');
/*!40000 ALTER TABLE `literatures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Самара',NULL,NULL),(2,'Москва',NULL,NULL),(3,'Санкт-Петербург',NULL,NULL),(4,'Мурманск',NULL,NULL);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conversation_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_sender_id_foreign` (`sender_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`),
  KEY `messages_conversation_id_foreign` (`conversation_id`),
  CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (53,14,34,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с работой сайта.',1,'text',26,'2023-09-25 13:31:27','2023-10-14 16:38:22'),(54,15,34,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с обучением на платформе.',1,'text',27,'2023-09-25 13:31:27','2023-10-14 16:38:23'),(55,14,35,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с работой сайта.',1,'text',28,'2023-09-25 13:31:27','2023-10-01 15:12:29'),(56,15,35,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с обучением на платформе.',1,'text',29,'2023-09-25 13:31:27','2023-10-01 20:38:41'),(57,14,36,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с работой сайта.',1,'text',30,'2023-09-25 13:31:27','2023-11-22 08:23:07'),(58,15,36,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с обучением на платформе.',1,'text',31,'2023-09-25 13:31:27','2023-11-22 08:24:02'),(59,14,37,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с работой сайта.',1,'text',32,'2023-09-25 13:31:27','2023-11-22 19:10:04'),(60,15,37,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с обучением на платформе.',1,'text',33,'2023-09-25 13:31:27','2023-11-22 19:10:05'),(61,14,1,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с работой сайта.',1,'text',1,'2023-09-25 13:31:27','2023-11-23 05:56:09'),(62,15,1,'Добро пожаловать на нашу платформу! Здесь вы можете задать любые вопросы, связанные с обучением на платформе.',1,'text',2,'2023-09-25 13:31:27','2023-11-30 20:51:02'),(63,1,14,'привет',1,NULL,1,'2023-10-10 13:10:31','2023-11-23 05:57:57'),(64,1,14,'Спасибо)',1,NULL,1,'2023-10-12 19:52:57','2023-11-23 05:57:57'),(65,34,14,'Добрый день , спасибо',1,NULL,26,'2023-10-14 16:35:14','2023-11-23 05:57:45'),(66,34,14,'https://u2217969.isp.regruhosting.ru/storage/app/public/images/1697301321-135.jpg',1,'image',26,'2023-10-14 16:35:21','2023-11-23 05:57:45'),(67,1,15,'спасибо',0,NULL,2,'2023-10-27 17:31:49','2023-10-27 17:31:49'),(68,1,15,'привет',0,NULL,2,'2023-11-01 11:55:04','2023-11-01 11:55:04'),(69,1,15,'Добрый день',0,NULL,2,'2023-11-04 10:03:41','2023-11-04 10:03:41'),(70,1,15,'https://u2217969.isp.regruhosting.ru/storage/app/public/images/1699092229-571.jpg',0,'image',2,'2023-11-04 10:03:49','2023-11-04 10:03:49'),(71,1,15,'https://u2217969.isp.regruhosting.ru/storage/app/public/files/1699092259-33.xlsx',0,'file',2,'2023-11-04 10:04:19','2023-11-04 10:04:19'),(72,14,38,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными',1,'text',34,'2023-11-14 16:08:50','2023-11-15 12:11:03'),(73,15,38,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте',1,'text',35,'2023-11-14 16:08:50','2023-11-17 15:44:39'),(74,14,39,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными',0,'text',36,'2023-11-16 16:33:20','2023-11-16 16:33:20'),(75,15,39,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте',0,'text',37,'2023-11-16 16:33:20','2023-11-16 16:33:20'),(78,1,15,'https://u2217969.isp.regruhosting.ru/storage/app/public/files/1700253421-67.xlsx',0,'file',2,'2023-11-17 20:37:01','2023-11-17 20:37:01'),(79,1,15,'https://u2217969.isp.regruhosting.ru/storage/app/public/files/1700253435-574.xlsx',0,'file',2,'2023-11-17 20:37:15','2023-11-17 20:37:15'),(80,1,15,'hello',0,NULL,2,'2023-11-20 08:49:37','2023-11-20 08:49:37'),(81,36,14,'https://u2217969.isp.regruhosting.ru/storage/app/public/files/1700587495-558.xlsx',1,'file',30,'2023-11-21 17:24:55','2023-11-23 05:57:43'),(82,14,44,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными',0,'text',40,'2023-11-22 07:15:49','2023-11-22 07:15:49'),(83,15,44,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте',0,'text',41,'2023-11-22 07:15:49','2023-11-22 07:15:49'),(120,14,68,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными',0,'text',78,'2023-11-22 11:27:40','2023-11-22 11:27:40'),(121,15,68,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте',0,'text',79,'2023-11-22 11:27:40','2023-11-22 11:27:40'),(122,14,69,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными',0,'text',80,'2023-11-22 18:56:54','2023-11-22 18:56:54'),(123,15,69,'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте',0,'text',81,'2023-11-22 18:56:54','2023-11-22 18:56:54'),(124,1,14,'у меня есть вопрос',1,NULL,1,'2023-11-22 19:12:27','2023-11-23 05:57:57'),(125,1,14,'https://u2217969.isp.regruhosting.ru/storage/app/public/files/1700680359-137.xlsx',1,'file',1,'2023-11-22 19:12:39','2023-11-23 05:57:57'),(126,1,14,'hi',1,NULL,1,'2023-11-23 05:52:42','2023-11-23 05:57:57'),(127,14,1,'hello',1,NULL,1,'2023-11-23 05:54:09','2023-11-23 05:56:09'),(128,14,1,'https://u2217969.isp.regruhosting.ru/storage/app/public/images/1700718874-36.jpg',1,'image',1,'2023-11-23 05:54:34','2023-11-23 05:56:09'),(129,1,14,'https://u2217969.isp.regruhosting.ru/storage/app/public/images/1700718899-81.jpg',1,'image',1,'2023-11-23 05:54:59','2023-11-23 05:57:57');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_07_17_083520_create_positions_table',1),(6,'2023_07_18_104106_create_competetions_table',1),(7,'2023_07_18_104127_create_indicators_table',1),(8,'2023_07_18_111648_create_roles_table',1),(9,'2023_07_19_115034_create_objects_table',1),(10,'2023_07_19_115036_create_subdivisions_table',1),(11,'2023_07_19_131526_create_competetion_tests_table',1),(12,'2023_07_19_135019_create_competetion_position',1),(13,'2023_07_20_115310_create_tests_table',1),(14,'2023_07_20_115441_create_test_questions_table',1),(15,'2023_07_21_094659_create_test_question_variations_table',1),(16,'2023_07_22_121001_create_user_tests_table',1),(17,'2023_07_22_121041_create_user_test_answers_table',1),(18,'2023_07_23_112428_create_test_question_files_table',1),(19,'2023_07_24_172015_create_conversations_table',1),(20,'2023_07_24_172032_create_messages_table',1),(21,'2023_07_25_082402_create_literatures_table',1),(22,'2023_07_30_052411_create_user_competetions_table',1),(23,'2023_07_30_133440_create_user_literatures_table',1),(24,'2023_07_31_113057_create_user_notifications_table',1),(25,'2023_08_01_171015_create_user_reposts_table',1),(26,'2023_08_13_151622_create_subdivision_user_table',1),(27,'2023_08_13_153728_create_user_objects_table',1),(28,'2023_08_14_155032_create_competetion_levels_table',1),(29,'2023_09_12_101407_create_questions_table',2),(30,'2023_09_13_085440_create_question_variations_table',3),(31,'2023_09_14_135700_create_locations_table',4),(32,'2023_09_20_112803_create_common_tests_table',5),(33,'2023_09_30_133553_create_user_competetion_archives_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (12,'Блок организационных вопросов','2023-08-27 09:19:21','2023-08-27 09:19:21');
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (259,'Поддержка','2023-09-23 14:01:53','2023-09-23 14:01:53'),(289,'Капитан','2023-09-27 10:25:34','2023-09-27 10:25:34'),(290,'Старший помощник капитана','2023-09-27 10:25:34','2023-09-27 10:25:34'),(291,'Второй помощник капитана','2023-09-27 10:25:34','2023-09-27 10:25:34'),(292,'Третий помощник капитана','2023-09-27 10:25:34','2023-09-27 10:25:34'),(295,'Рулевой','2023-11-22 07:33:07','2023-11-22 07:33:07'),(296,'Рулевой правого руля','2023-11-22 07:35:49','2023-11-22 07:35:49'),(298,'Тест','2023-11-27 18:13:43','2023-11-27 18:13:43');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_variations`
--

DROP TABLE IF EXISTS `question_variations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_variations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_true` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_variations`
--

LOCK TABLES `question_variations` WRITE;
/*!40000 ALTER TABLE `question_variations` DISABLE KEYS */;
INSERT INTO `question_variations` VALUES (1,1,' 0ْ  С',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(2,1,'Минус 1,8ْ  С',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(3,1,'4ْ  С',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(4,2,' 0ْ  С',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(5,2,'Минус 1,8ْ  С',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(6,2,'4ْ  С',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(7,3,' 0ْ  С',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(8,3,'Минус 1,8ْ  С',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(9,3,'4ْ  С',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(10,4,'Соленые',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(11,4,'Солоноватые',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(12,4,'Температура замерзания одинаковая',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(13,5,'Соленые',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(14,5,'Пресные',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(15,5,'Температура замерзания одинаковая',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(16,6,'От 0 до 5%',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(17,6,'От 5 до 13%',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(18,6,'От 13 до 20%',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(19,7,'Уменьшается ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(20,7,'Не изменяется',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(21,7,'Увеличивается',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(22,8,'Уменьшается ',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(23,8,'Не изменяется',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(24,8,'Увеличивается',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(25,9,'Уменьшается ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(26,9,'Не изменяется',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(27,9,'Увеличивается',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(28,10,'9/10 - пресные и морские льды',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(29,10,'5/6 - пресные и морские льды',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(30,10,'5/6 - морские льды, 9/10 - пресные льды',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(31,11,'Трещина в ледовом поле, положение которой определено предположительно',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(32,11,'Трещина в ледовом поле, положение которой определено',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(33,11,'Заметная трещина в ледовом поле',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(34,12,'Свободный ото льда ледовый канал',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(35,12,'Замерзший ледовый канал',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(36,12,'Канал с плавающими льдинами',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(37,13,'Кромка льда, зафиксированная визуально',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(38,13,'Кромка льда, зафиксированная по радиолокатору',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(39,13,'Кромка льда, зафиксированная любым доступным способом',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(40,14,'Пояс торосов',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(41,14,'Граница многолетних льдов',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(42,14,'Пояс стамух',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(43,15,'Канал во льду, проложенный судном или ледоколом',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(44,15,'Проектируемый ледовый канал',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(45,15,'Широкая трещина в ледовом поле',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(46,16,'Вправо',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(47,16,'Влево',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(48,16,'Оба направления совпадают',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(49,17,'Вправо на 28ْ',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(50,17,'Влево на 45ْ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(51,17,'Влево на 20ْ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(52,18,'Одна десятая',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(53,18,'Одна двадцатая',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(54,18,'Одна пятидесятая',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(55,19,'Вдоль изобар так, что область повышенного давления остается справа, а область пониженного давления слева от линии дрейфа',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(56,19,'Вдоль изобар так, что область пониженного давления остается справа, а область повышенного давления слева от линии дрейфа',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(57,19,'Перпендикулярно к изобарам в сторону пониженного давления',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(58,20,'Скорость дрейфа обратно пропорциональна градиенту атмосферного давления',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(59,20,'Скорость дрейфа прямо пропорциональна градиенту атмосферного давления',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(60,20,'Скорость дрейфа льдов не зависит от атмосферного давления',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(61,21,'Воздействие пресноводного льда сильнее',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(62,21,'Воздействие старого морского льда сильнее',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(63,21,'Воздействие примерно одинаковое',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(64,22,'Деформация корпуса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(65,22,'Царапины на корпусе',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(66,22,'Поступление воды внутрь судна',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(67,23,'При выборе режима движения судна учитывается, что такой лед обладает пониженной прочностью',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(68,23,'При выборе режима движения судна учитывается, что такой лед обладает повышенной прочностью',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(69,23,'Наличие снега на поверхности льда не должно влиять на выбор режима движения судна',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(70,24,'Перпендикулярно оси сжатия',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(71,24,'Параллельно оси сжатия',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(72,24,'Под углом 45ْ к сои сжатия',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(73,25,'Сильный ветер',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(74,25,'Понижение температуры',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(75,25,'Острые углы льдин, упирающиеся в борт судна',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(76,26,'ЛУ1, ЛУ2, ЛУ3',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(77,26,'ЛУ4, ЛУ5, ЛУ6',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(78,26,'ЛУ7, ЛУ8, ЛУ9',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(79,27,'ЛУ1, ЛУ2, ЛУ3',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(80,27,'ЛУ4, ЛУ5, ЛУ6, ЛУ7, ЛУ8, ЛУ9',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(81,27,'Только ЛУ7, ЛУ8, ЛУ9',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(82,28,'Арктические лед толщиной до 1 м',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(83,28,'Неарктический лед толщиной до 0,4 м',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(84,28,'Неарктический лед толщиной до 0,7 м',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(85,29,'1,0 м',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(86,29,'1,7 м',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(87,29,'3,5 м',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(88,30,'1,0 м',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(89,30,'1,7 м',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(90,30,'3,5 м',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(91,31,'Уведомительный',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(92,31,'Разрешительный',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(93,31,'Свободный',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(94,32,'Капитания любого арктического морского порта',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(95,32,'Министерство транспорта Российской Федерации',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(96,32,'Администрация Северного морского пути',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(97,33,'На срок заявленного рейса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(98,33,'Не более чем на 365 календарных дней',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(99,33,'Не более чем на 182 календарных дня',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(100,34,'На Администрацию Северного морского пути',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(101,34,'На федеральный орган исполнительной власти, осуществляющий функции по оказанию государственных услуг в сфере морского транспорта',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(102,34,'На федеральный орган исполнительной власти в области обороны',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(103,35,'На Администрацию Северного морского пути',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(104,35,'На федеральный орган исполнительной власти в области гидрометеорологии и мониторинга окружающей среды',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(105,35,'На федеральный орган исполнительной власти в области обороны',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(106,36,'Не ранее чем за 60 календарных дней и не позднее, чем за 7 рабочих дней до захода судна в акваторию',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(107,36,'Не ранее чем за 180 календарных дней и не позднее, чем за 7 рабочих дней до захода судна в акваторию',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(108,36,'Не ранее чем за120 календарных дней и не позднее, чем за 15 рабочих дней до захода судна в акваторию',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(109,37,'За 72 часа',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(110,37,'За 36 часов',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(111,37,'За 24 часа',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(112,38,'16 канал',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(113,38,'12 канал',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(114,38,'26 канал',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(115,39,'В течение 30 календарных дней',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(116,39,'В течение 10 рабочих дней',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(117,39,'В течение 5 рабочих дней',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(118,40,'Не позднее двух рабочих дней',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(119,40,'Не позднее трех рабочих дней',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(120,40,'Не позднее пяти рабочих дней',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(121,41,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(122,41,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(123,41,'Перекладывать руль с борта на борт, работая двигателем на полный ход',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(124,42,'Резко менять ход с полного хода «вперед» до полного «назад», и наоборот',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(125,42,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(126,42,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(127,43,'Провести кренование или дифферентование',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(128,43,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(129,43,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(130,44,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(131,44,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(132,44,'Применить ледовые якоря',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(133,45,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(134,45,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(135,45,'Разрушить лед взрывами',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(136,46,'Предусмотреть возможность буксировки',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(137,46,'Иметь запасной концевой вал, запасной винт или комплект съемных лопастей',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(138,46,'Иметь дополнительные спасательные шлюпки',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(139,47,'Иметь дополнительные спасательные шлюпки',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(140,47,'Иметь дополнительный запас быстросхватывающегося цемента и песка, укрепить корпус судна',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(141,47,'Иметь запасной концевой вал, запасной винт или комплект съемных лопастей',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(142,48,'Должен обеспечить постоянный дифферент на корму',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(143,48,'Должен обеспечить постоянный дифферент на нос',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(144,48,'Должен обеспечить возможность менять дифферент перемещением груза ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(145,49,'Должен обеспечить возможность менять дифферент судна перемещением груза ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(146,49,'Должен обеспечить быстрый доступ к месту повреждения обшивки и набора',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(147,49,'Должен способствовать укреплению корпуса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(148,50,'Грузы, не боящиеся ударов',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(149,50,'Грузы, не боящиеся подмочки',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(150,50,'Грузы, которые могут быть использованы для усиления корпуса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(151,51,'Совокупность методов и средств, позволяющих контролировать и оценивать состояние двигателя с его разборкой',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(152,51,'Совокупность методов и средств, позволяющих контролировать и оценивать состояние двигателя с его частичной разборкой',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(153,51,'Совокупность методов и средств, позволяющих контролировать и оценивать состояние двигателя без разборки',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(154,52,'Цвет выхлопных газов',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(155,52,'Цвет воды системы охлаждения ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(156,52,'Цвет топлива',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(157,53,'Давление выхлопных газов',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(158,53,'Давление охлаждающей жидкости',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(159,53,'Давление масла',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(160,54,'Звук при простукивании неработающего двигателя',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(161,54,'Звук работающего двигателя ',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(162,54,'Звук при прокручивании двигателя ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(163,55,'Температура топлива',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(164,55,'Температура воздуха в машинном помещении',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(165,55,'Температура двигателя',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(166,56,'Поддержанием чистоты в танках и льялах',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(167,56,'Поддержанием чистоты в клинкетах',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(168,56,'Поддержанием чистоты сливных горловин',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(169,57,'Исправность дистанционных приводов забортных клапанов',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(170,57,'Исправность дистанционных приводов запорных клапанов',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(171,57,'Исправность дистанционных приводов люковых закрытий',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(172,58,'После выгрузки и перед погрузкой',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(173,58,'Ежедневно',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(174,58,'Еженедельно',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(175,59,'Гидравлические затворы люковых закрытий помещений',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(176,59,'Гидравлические затворы охлаждаемых помещений',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(177,59,'Гидравлические затворы танков',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(178,60,'Проверку приёмных сеток решеток, сточных колодцев, грязевых коробок системы осушения и льял в машинном и котельном отделениях ',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(179,60,'Давление в трубопроводах',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(180,60,'Давление на выходе из системы',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(181,61,'Заменить манжеты',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(182,61,'Заменить набивку сальников',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(183,61,'Залить насос перекачиваемой жидкостью',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(184,62,'Отцентровать ротор насоса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(185,62,'Залить всасывающий трубопровод перекачиваемой жидкостью',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(186,62,'Отцентровать муфты',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(187,63,'Отрегулировать предохранительный клапан',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(188,63,'Зачистить и притереть поверхности опорного и уплотнительного колец',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(189,63,'Открыть задвижку',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(190,64,'Заменить манометр (мановакуумметр)',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(191,64,'Уменьшить высоту всасывания',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(192,64,'Устранить неплотности в трубопроводах',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(193,65,'Заменить рабочее колесо',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(194,65,'Исправность дистанционных приводов запорных клапанов',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(195,65,'Изменить направление вращения',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(196,66,'2,5',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(197,66,'3.5',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(198,66,'4.5',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(199,67,'Нарушение в работе масляного насоса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(200,67,'Форсунки. Плохое распыливание топлива',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(201,67,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(202,68,'Форсунки. Плохое распыливание топлива',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(203,68,'Нарушение в работе масляного насоса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(204,68,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(205,69,'Нарушение в работе масляного насоса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(206,69,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(207,69,'Пропуски в топливном насосе высокого давления. Износ плунжерной пары',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(208,70,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(209,70,'Плохое качество топлива',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(210,70,'Нарушение в работе масляного насоса',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(211,71,'Проверке правильности функционирования и поиска неисправностей непосредственно в условиях эксплуатации',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(212,71,'Проверке правильности функционирования и поиска неисправностей с полной разборкой',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(213,71,'Проверке правильности функционирования и поиска неисправностей с частичной разборкой',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(214,72,'Топливную систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(215,72,'Детали цилиндропоршневой группы',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(216,72,'Систему наддува',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(217,73,'Топливной системы',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(218,73,'Системы смазки',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(219,73,'Цилиндропоршневой группы',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(220,74,'Результаты предремонтной дефектации',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(221,74,'Доклады вахтенного механика',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(222,74,'Результаты осмотра ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(223,75,'Капитана',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(224,75,'Старший механик',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(225,75,'Старший помощник капитана',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(226,76,'Подача',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(227,76,'Раздача',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(228,76,'Предподача',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(229,77,'Скорость жидкости',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(230,77,'Напор',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(231,77,'Масса жидкости',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(232,78,'Среднее давление',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(233,78,'Давление на две трети',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(234,78,'Полное давление',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(235,79,'Удержанием руля в диаметральной плоскости судна в течении 1 мин.',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(236,79,'Удержанием руля попеременно в крайних положениях в течении 1 мин.',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(237,79,'Перекладки руля на оба борта на максимальный угол',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(238,80,'Гладкость поверхности',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(239,80,'Наличие смазки на поверхности',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(240,80,'Наличие краски на поверхности',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(241,81,'После того, как судовой дизель выйдет на установившийся режим работы',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(242,81,'До пуска судового дизеля',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(243,81,'В режиме максимальной нагрузки',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(244,82,'Температуру охлаждающей пресной воды',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(245,82,'Температуру охлаждающей забортной воды',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(246,82,'Температуру воздуха, поступающего в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(247,83,'65',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(248,83,'55',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(249,83,'45',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(250,84,'Температуре около 20',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(251,84,'9-15',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(252,84,'Температуре около 30',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(253,85,'90',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(254,85,'80',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(255,85,'70',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(256,86,'Добавить щёлочь в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(257,86,'Устранить неисправность терморегулятора или уменьшить открытие перепускных клапанов',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(258,86,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(259,87,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(260,87,'Добавить щёлочь в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(261,87,'Довести давление в системе охлаждения до нормального',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(262,88,'Выключить топливо на цилиндр',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(263,88,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(264,88,'Добавить щёлочь в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(265,89,'Долить воду ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(266,89,'Устранить течи в системе',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(267,89,'Слить воду ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(268,90,'Добавить щёлочь в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(269,90,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(270,90,'Добавить антикоррозионное средство в систему',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(271,91,'2.5',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(272,91,'3.5',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(273,91,'5',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(274,92,'Низкое давление наддува',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(275,92,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(276,92,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(277,93,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(278,93,'Потеря плотности выпускных клапанов',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(279,93,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(280,94,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(281,94,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(282,94,'Форсунки. Ухудшение распыливания топлива',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(283,95,'Высокая температура наддувочного воздуха',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(284,95,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(285,95,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(286,96,'Участвовать в промежуточных приемках ответственных деталей и узлов',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(287,96,'Участвовать в обсуждении планов ремонта',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(288,96,'Участвовать в составлении планов ремонта',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(289,97,'Капитана',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(290,97,'Судовладельца',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(291,97,'Портовых властей',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(292,98,'Классификационным обществом и согласовывается с судоремонтным предприятием и судовладельцем ',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(293,98,'Судовладельцем  и согласовывается с судоремонтным предприятием и Классификационным обществом',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(294,98,'Судоремонтным предприятием и согласовывается с судовладельцем и Классификационным обществом',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(295,99,'Судоремонтный завод',1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(296,99,'Портовая администрация',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(297,99,'Экипаж судна',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(298,100,'Заводская команда',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(299,100,'Экспертная комиссия Квалификационного общества',0,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(300,100,'Экипаж судна.',1,'2023-11-21 12:31:18','2023-11-21 12:31:18');
/*!40000 ALTER TABLE `question_variations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `points` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'При какой температуре пресной воды начинается ледообразование?','text',1,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(2,'При какой температуре пресной воды достигается ее наибольшая плотность?','text',1,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(3,'При какой температуре замерзает морская вода, имеющая соленость, равную средней солености Мирового океана?','text',1,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(4,'Какие воды при прочих равных условиях замерзают при более низкой температуре: солоноватые или соленые?','text',1,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(5,'Какие воды при прочих равных условиях замерзают при более низкой температуре: пресные или соленые?','text',1,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(6,'В каких пределах может колебаться пористость морского льда?','text',2,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(7,'Как изменяется плотность пресного льда при понижении его температуры?','text',2,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(8,'Как изменяется плотность соленого льда при понижении его температуры от  0 до  -23ْ С?','text',2,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(9,'Как изменяется плотность соленого льда при понижении его температуры от  -23ْ С и ниже?','text',2,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(10,'Какова осадка (погруженность) плавающих льдов?','text',2,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(11,'Что обозначает на ледовой карте приведенный  символ (Рис. 11)?','text',3,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(12,'Что обозначает на ледовой карте приведенный  символ (Рис. 12)?','text',3,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(13,'Что обозначает на ледовой карте приведенный выше символ (Рис. 15)?','text',3,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(14,'Что обозначает на ледовой карте приведенный выше символ (Рис. 14)?','text',3,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(15,'Что обозначает на ледовой карте приведенный  символ (Рис. 13)?','text',3,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(16,'В какую сторону от направления ветра в открытом море отклоняется вектор скорости льдов?','text',4,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(17,'На какой угол от направления ветра в открытом море отклоняется вектор скорости льдов?','text',4,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(18,'Чему равно отношение скорости дрейфа льда к скорости ветра?','text',4,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(19,'В каком направлении по отношению к изобарам происходит дрейф льдов?','text',4,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(20,'Как соотносится скорость дрейфа льдов в открытом море с атмосферным давлением?','text',4,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(21,'Дать сравнительную оценку разрушительного воздействия пресноводного льда и старого морского льда','text',5,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(22,'Какой признак является основным при оценке разрушительного воздействия на корпус судна?','text',5,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(23,'Как учитывается наличие снега на поверхности льда при самостоятельном ледовом плавании?','text',5,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(24,'Как следует направлять путь судна в зоне сжатия льдов, для того чтобы снизить риск повреждения корпуса?','text',5,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(25,'Что представляет основную опасность для корпуса судна при его стоянке в мелкобитом льду?','text',5,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(26,'Какие из перечисленных знаков относятся к судам, предназначенным только для плавания в замерзающих неарктических морях?','text',6,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(27,'Какие из перечисленных знаков относятся к судам арктического плавания?','text',6,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(28,'При какой максимальной толщине мелкобитого разреженного льда допустимо самостоятельно плавать судам категории ЛУ3?','text',6,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(29,'При какой толщине сплоченного однолетнего льда в летне-осеннюю навигацию допустимо преодолевать ледовые перемычки судам категории ЛУ7?','text',6,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(30,'При какой толщине сплоченного  льда в зимне-весеннюю навигацию допустимо преодолевать ледовые перемычки судам категории ЛУ9?','text',6,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(31,'Какой порядок плавания судов действует на акватории Северного морского пути?','text',7,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(32,'Какая организация выдает разрешение на плавание судна в акватории Северного морского пути?','text',7,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(33,'На какой максимальный срок уполномоченная организация выдает разрешение на плавание в акватории Северного морского пути?','text',7,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(34,'На кого возложено навигационно-гидрографическое обеспечение плавания судов в акватории Северного морского пути?','text',7,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(35,'На кого возложено гидрометеорологическое обеспечение плавания судов в акватории Северного морского пути?','text',7,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(36,'За какое время до предполагаемого захода судна в акваторию Северного морского пути необходимо подать заявку установленного образца в Администрацию Северного морского пути?','text',8,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(37,'За какое время до подхода судна с запада или с востока к границам акватории Северного морского пути требуется сообщить Администрации Северного морского пути о планируемом времени подхода к границе?','text',8,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(38,'На каком канале осуществляется связь между судами, ледоколами и Администрацией Северного морского пути во время плавания судов в акватории Северного морского пути?','text',8,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(39,'В течение какого времени Администрация Северного рассматривает заявление о разрешении плавания судна в акватории Северного морского пути? ','text',8,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(40,'В течение какого времени после принятия решения об отказе в выдаче разрешения на плавание судна в акватории Северного морского пути Администрация Северного морского пути обязано поместить эту информацию на официальном сайте? ','text',8,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(41,'1. Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',9,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(42,'2. Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',9,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(43,'3. Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',9,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(44,'4. Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',9,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(45,'5. Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',9,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(46,'Какие меры предосторожности следует предпринять при подготовке судна к ледовому плаванию на случай потери винта?','text',10,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(47,'Какие меры предосторожности следует предпринять при подготовке судна к ледовому плаванию на случай повреждения корпуса?','text',10,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(48,'Как должен быть распределен груз по трюмам, чтобы во время ледового плавания предохранить гребной винт и руль от ударов о лед?','text',10,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(49,'Как должен быть размещен на судне груз в трюмах на случай возможного повреждения корпуса судна?','text',10,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(50,'Какие виды груза следует размещать в носовых трюмах при их перевозке в режиме ледового плавания?','text',10,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(51,'1. Диагностика судового двигателя внутреннего сгорания это:','text',11,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(52,'2. Диагностическим параметром судового двигателя внутреннего сгорания является:','text',11,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(53,'3. Диагностическим параметром судового двигателя внутреннего сгорания является:','text',11,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(54,'4. Диагностическим параметром судового двигателя внутреннего сгорания является:','text',11,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(55,'5. Диагностическим параметром судового двигателя внутреннего сгорания является:','text',11,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(56,'Исправное действие балластной и осушительной систем обеспечивается:','text',12,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(57,'При диагностике балластной и осушительной систем  проверяют:','text',12,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(58,'Проверку трубопроводов в трюмах выполняют:','text',12,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(59,'При диагностике балластной и осушительной систем  проверяют:','text',12,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(60,'При диагностике балластной и осушительной систем  проверяют:','text',12,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(61,'Роторный насос не засасывает жидкость.','text',13,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(62,'Центробежный насос не подаёт жидкость','text',13,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(63,'Шестерённый насос не обеспечивает спецификационной подачи:','text',13,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(64,'Значительные колебания стрелки манометра (мановакууммера)','text',13,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(65,'Срыв подачи центробежного насоса','text',13,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(66,'1. Отклонение от среднего величин средних индикаторных давлений по цилиндрам  не должны отличаться от среднего на величину большую, чем:','text',14,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(67,'2. Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое.','text',14,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(68,'3. Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое. Температура выпускных газов высокая','text',14,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(69,'4. Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое. Температура выпускных газов высокая','text',14,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(70,'5. Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое. Температура выпускных газов высокая','text',14,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(71,'Метод функционального диагноза заключается в','text',15,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(72,'Наибольшее число повреждений судовых дизелей приходится на:','text',15,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(73,'Наиболее затратным является ремонт','text',15,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(74,'Исходными материалами для составления ведомости  ремонтных работ являются','text',15,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(75,'Руководство работами по подготовке судна к ремонту осуществляет','text',15,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(76,'1. Диагностическим параметром судового насоса является:','text',16,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(77,'2. Диагностическим параметром судового насоса является:','text',16,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(78,'3. Диагностическим параметром судового вентилятора является:','text',16,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(79,'4. Рулевое устройство диагностируется путём:','text',16,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(80,'5. Диагностическим параметром кнехтов, швартовных клюзов, киповых планок, направляющих роульсов является: ','text',16,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(81,'Уровень воды в расширительной цистерне контура пресной воды проверяют:','text',17,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(82,'Перед пуском судового дизеля проверяют:','text',17,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(83,'Перед пуском судового дизеля температура охлаждающей пресной воды должна быть около:','text',17,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(84,'Перед пуском судового дизеля высоковязкое топливо должно иметь вязкость, соответствующую:','text',17,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(85,'Температура высоковязкого топлива перед сепаратором должна быть не выше:','text',17,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(86,'Температура охлаждающей (пресной) воды на входе в дизель повышена','text',18,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(87,'Температура воды (масла), выходящей из дизеля, отдельных цилиндров или поршней, повышена','text',18,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(88,'Температура воды (масла), выходящей из поршней отдельных цилиндров, резко понизилась','text',18,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(89,'В расширительной цистерне упал уровень воды','text',18,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(90,'Концентрация ингибитора ниже нормы','text',18,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(91,'1. Отклонение от среднего величин максимальных давлений сгорания по цилиндрам  не должны отличаться от среднего на величину большую, чем:','text',19,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(92,'2. Температура выпускных газов повышена','text',19,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(93,'3. Температура выпускных газов повышена','text',19,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(94,'4. Температура выпускных газов повышена','text',19,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(95,'5. Температура выпускных газов повышена','text',19,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(96,'Во время ремонта судна на судоремонтном предприятии  старший механик обязан:','text',20,0.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(97,'Ремонт судна на судоремонтном предприятии проводится под надзором:','text',20,1,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(98,'Программа испытаний судна после ремонта разрабатывается:','text',20,1.5,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(99,'Ответственность за проведение испытаний после ремонта и исправную работу судовых технических средств, корпусных конструкций и систем, отремонтированных заводом, несет:','text',20,2,'2023-11-21 12:31:18','2023-11-21 12:31:18'),(100,'Обслуживание судовых технических средств, корпусных конструкций и систем во время испытаний обеспечивает: ','text',20,2.5,'2023-11-21 12:31:18','2023-11-21 12:31:18');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Студент',NULL,NULL),(2,'Администратор',NULL,NULL),(3,'Суперадмин',NULL,NULL),(4,'Руководитель','2023-11-14 16:36:06',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subdivision_users`
--

DROP TABLE IF EXISTS `subdivision_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subdivision_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `subdivision_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subdivision_users_user_id_foreign` (`user_id`),
  KEY `subdivision_users_subdivision_id_foreign` (`subdivision_id`),
  CONSTRAINT `subdivision_users_subdivision_id_foreign` FOREIGN KEY (`subdivision_id`) REFERENCES `subdivisions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subdivision_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subdivision_users`
--

LOCK TABLES `subdivision_users` WRITE;
/*!40000 ALTER TABLE `subdivision_users` DISABLE KEYS */;
INSERT INTO `subdivision_users` VALUES (65,37,21,NULL,NULL),(66,37,22,NULL,NULL),(67,34,22,NULL,NULL),(68,34,21,NULL,NULL),(71,35,22,NULL,NULL),(72,35,21,NULL,NULL),(73,36,22,NULL,NULL),(74,36,21,NULL,NULL),(138,1,21,'2023-10-31 16:10:15','2023-10-31 16:10:15'),(139,38,21,'2023-11-14 16:08:50','2023-11-14 16:08:50'),(140,39,22,'2023-11-16 16:33:20','2023-11-16 16:33:20'),(141,39,22,'2023-11-16 16:33:20','2023-11-16 16:33:20'),(143,41,21,'2023-11-21 13:44:15','2023-11-21 13:44:15'),(144,41,22,'2023-11-21 13:44:15','2023-11-21 13:44:15'),(157,44,21,'2023-11-22 07:15:49','2023-11-22 07:15:49'),(158,44,22,'2023-11-22 07:15:49','2023-11-22 07:15:49'),(159,45,21,'2023-11-22 07:31:41','2023-11-22 07:31:41'),(160,45,22,'2023-11-22 07:31:41','2023-11-22 07:31:41'),(161,46,21,'2023-11-22 08:22:09','2023-11-22 08:22:09'),(162,46,22,'2023-11-22 08:22:09','2023-11-22 08:22:09'),(163,47,21,'2023-11-22 08:51:59','2023-11-22 08:51:59'),(164,47,22,'2023-11-22 08:51:59','2023-11-22 08:51:59'),(167,49,21,'2023-11-22 08:58:26','2023-11-22 08:58:26'),(168,49,22,'2023-11-22 08:58:26','2023-11-22 08:58:26'),(175,58,21,'2023-11-22 09:20:17','2023-11-22 09:20:17'),(176,58,22,'2023-11-22 09:20:17','2023-11-22 09:20:17'),(195,68,21,'2023-11-22 11:27:40','2023-11-22 11:27:40'),(196,68,22,'2023-11-22 11:27:40','2023-11-22 11:27:40'),(197,69,21,'2023-11-22 18:56:54','2023-11-22 18:56:54'),(198,69,22,'2023-11-22 18:56:54','2023-11-22 18:56:54');
/*!40000 ALTER TABLE `subdivision_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subdivisions`
--

DROP TABLE IF EXISTS `subdivisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subdivisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subdivisions_object_id_foreign` (`object_id`),
  CONSTRAINT `subdivisions_object_id_foreign` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subdivisions`
--

LOCK TABLES `subdivisions` WRITE;
/*!40000 ALTER TABLE `subdivisions` DISABLE KEYS */;
INSERT INTO `subdivisions` VALUES (21,'Управление по работе с персоналом',12,NULL,NULL),(22,'Отдел обучения и развития',12,NULL,NULL);
/*!40000 ALTER TABLE `subdivisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_question_files`
--

DROP TABLE IF EXISTS `test_question_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_question_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_question_id` bigint(20) unsigned NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` tinyint(1) NOT NULL DEFAULT '0',
  `points` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_question_files_test_question_id_foreign` (`test_question_id`),
  CONSTRAINT `test_question_files_test_question_id_foreign` FOREIGN KEY (`test_question_id`) REFERENCES `test_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_question_files`
--

LOCK TABLES `test_question_files` WRITE;
/*!40000 ALTER TABLE `test_question_files` DISABLE KEYS */;
INSERT INTO `test_question_files` VALUES (3,102,'https://u2217969.isp.regruhosting.ru/storage/app/public/images/1700675908-81.jpg',0,0,'2023-11-22 17:58:34','2023-11-22 17:58:34'),(4,103,'https://u2217969.isp.regruhosting.ru/storage/app/public/images/1700675922-81.jpg',0,0,'2023-11-22 17:58:51','2023-11-22 17:58:51');
/*!40000 ALTER TABLE `test_question_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_question_variations`
--

DROP TABLE IF EXISTS `test_question_variations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_question_variations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_question_id` bigint(20) unsigned NOT NULL,
  `variation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_true` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_question_variations_test_question_id_foreign` (`test_question_id`),
  CONSTRAINT `test_question_variations_test_question_id_foreign` FOREIGN KEY (`test_question_id`) REFERENCES `test_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_question_variations`
--

LOCK TABLES `test_question_variations` WRITE;
/*!40000 ALTER TABLE `test_question_variations` DISABLE KEYS */;
INSERT INTO `test_question_variations` VALUES (1,1,' 0ْ  С',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(2,1,'Минус 1,8ْ  С',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(3,1,'4ْ  С',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(4,2,' 0ْ  С',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(5,2,'Минус 1,8ْ  С',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(6,2,'4ْ  С',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(7,3,' 0ْ  С',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(8,3,'Минус 1,8ْ  С',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(9,3,'4ْ  С',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(10,4,'Соленые',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(11,4,'Солоноватые',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(12,4,'Температура замерзания одинаковая',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(13,5,'Соленые',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(14,5,'Пресные',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(15,5,'Температура замерзания одинаковая',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(16,6,'От 0 до 5%',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(17,6,'От 5 до 13%',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(18,6,'От 13 до 20%',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(19,7,'Уменьшается ',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(20,7,'Не изменяется',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(21,7,'Увеличивается',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(22,8,'Уменьшается ',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(23,8,'Не изменяется',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(24,8,'Увеличивается',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(25,9,'Уменьшается ',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(26,9,'Не изменяется',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(27,9,'Увеличивается',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(28,10,'9/10 - пресные и морские льды',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(29,10,'5/6 - пресные и морские льды',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(30,10,'5/6 - морские льды, 9/10 - пресные льды',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(31,11,'Трещина в ледовом поле, положение которой определено предположительно',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(32,11,'Трещина в ледовом поле, положение которой определено',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(33,11,'Заметная трещина в ледовом поле',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(34,12,'Свободный ото льда ледовый канал',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(35,12,'Замерзший ледовый канал',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(36,12,'Канал с плавающими льдинами',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(37,13,'Кромка льда, зафиксированная визуально',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(38,13,'Кромка льда, зафиксированная по радиолокатору',1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(39,13,'Кромка льда, зафиксированная любым доступным способом',0,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(40,14,'Пояс торосов',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(41,14,'Граница многолетних льдов',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(42,14,'Пояс стамух',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(43,15,'Канал во льду, проложенный судном или ледоколом',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(44,15,'Проектируемый ледовый канал',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(45,15,'Широкая трещина в ледовом поле',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(46,16,'Вправо',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(47,16,'Влево',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(48,16,'Оба направления совпадают',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(49,17,'Вправо на 28ْ',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(50,17,'Влево на 45ْ',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(51,17,'Влево на 20ْ',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(52,18,'Одна десятая',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(53,18,'Одна двадцатая',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(54,18,'Одна пятидесятая',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(55,19,'Вдоль изобар так, что область повышенного давления остается справа, а область пониженного давления слева от линии дрейфа',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(56,19,'Вдоль изобар так, что область пониженного давления остается справа, а область повышенного давления слева от линии дрейфа',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(57,19,'Перпендикулярно к изобарам в сторону пониженного давления',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(58,20,'Скорость дрейфа обратно пропорциональна градиенту атмосферного давления',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(59,20,'Скорость дрейфа прямо пропорциональна градиенту атмосферного давления',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(60,20,'Скорость дрейфа льдов не зависит от атмосферного давления',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(61,21,'Воздействие пресноводного льда сильнее',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(62,21,'Воздействие старого морского льда сильнее',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(63,21,'Воздействие примерно одинаковое',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(64,22,'Деформация корпуса',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(65,22,'Царапины на корпусе',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(66,22,'Поступление воды внутрь судна',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(67,23,'При выборе режима движения судна учитывается, что такой лед обладает пониженной прочностью',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(68,23,'При выборе режима движения судна учитывается, что такой лед обладает повышенной прочностью',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(69,23,'Наличие снега на поверхности льда не должно влиять на выбор режима движения судна',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(70,24,'Перпендикулярно оси сжатия',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(71,24,'Параллельно оси сжатия',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(72,24,'Под углом 45ْ к сои сжатия',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(73,25,'Сильный ветер',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(74,25,'Понижение температуры',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(75,25,'Острые углы льдин, упирающиеся в борт судна',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(76,26,'ЛУ1, ЛУ2, ЛУ3',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(77,26,'ЛУ4, ЛУ5, ЛУ6',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(78,26,'ЛУ7, ЛУ8, ЛУ9',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(79,27,'ЛУ1, ЛУ2, ЛУ3',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(80,27,'ЛУ4, ЛУ5, ЛУ6, ЛУ7, ЛУ8, ЛУ9',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(81,27,'Только ЛУ7, ЛУ8, ЛУ9',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(82,28,'Арктические лед толщиной до 1 м',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(83,28,'Неарктический лед толщиной до 0,4 м',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(84,28,'Неарктический лед толщиной до 0,7 м',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(85,29,'1,0 м',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(86,29,'1,7 м',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(87,29,'3,5 м',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(88,30,'1,0 м',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(89,30,'1,7 м',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(90,30,'3,5 м',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(91,31,'Уведомительный',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(92,31,'Разрешительный',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(93,31,'Свободный',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(94,32,'Капитания любого арктического морского порта',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(95,32,'Министерство транспорта Российской Федерации',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(96,32,'Администрация Северного морского пути',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(97,33,'На срок заявленного рейса',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(98,33,'Не более чем на 365 календарных дней',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(99,33,'Не более чем на 182 календарных дня',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(100,34,'На Администрацию Северного морского пути',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(101,34,'На федеральный орган исполнительной власти, осуществляющий функции по оказанию государственных услуг в сфере морского транспорта',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(102,34,'На федеральный орган исполнительной власти в области обороны',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(103,35,'На Администрацию Северного морского пути',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(104,35,'На федеральный орган исполнительной власти в области гидрометеорологии и мониторинга окружающей среды',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(105,35,'На федеральный орган исполнительной власти в области обороны',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(106,36,'Не ранее чем за 60 календарных дней и не позднее, чем за 7 рабочих дней до захода судна в акваторию',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(107,36,'Не ранее чем за 180 календарных дней и не позднее, чем за 7 рабочих дней до захода судна в акваторию',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(108,36,'Не ранее чем за120 календарных дней и не позднее, чем за 15 рабочих дней до захода судна в акваторию',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(109,37,'За 72 часа',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(110,37,'За 36 часов',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(111,37,'За 24 часа',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(112,38,'16 канал',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(113,38,'12 канал',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(114,38,'26 канал',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(115,39,'В течение 30 календарных дней',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(116,39,'В течение 10 рабочих дней',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(117,39,'В течение 5 рабочих дней',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(118,40,'Не позднее двух рабочих дней',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(119,40,'Не позднее трех рабочих дней',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(120,40,'Не позднее пяти рабочих дней',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(121,41,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(122,41,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(123,41,'Перекладывать руль с борта на борт, работая двигателем на полный ход',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(124,42,'Резко менять ход с полного хода «вперед» до полного «назад», и наоборот',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(125,42,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(126,42,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(127,43,'Провести кренование или дифферентование',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(128,43,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(129,43,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(130,44,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(131,44,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(132,44,'Применить ледовые якоря',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(133,45,'Продолжить работу двигателя вперед от самого малого до полного, не меняя положение руля',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(134,45,'Перейти за задний ход на самой малой частоте вращения',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(135,45,'Разрушить лед взрывами',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(136,46,'Предусмотреть возможность буксировки',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(137,46,'Иметь запасной концевой вал, запасной винт или комплект съемных лопастей',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(138,46,'Иметь дополнительные спасательные шлюпки',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(139,47,'Иметь дополнительные спасательные шлюпки',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(140,47,'Иметь дополнительный запас быстросхватывающегося цемента и песка, укрепить корпус судна',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(141,47,'Иметь запасной концевой вал, запасной винт или комплект съемных лопастей',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(142,48,'Должен обеспечить постоянный дифферент на корму',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(143,48,'Должен обеспечить постоянный дифферент на нос',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(144,48,'Должен обеспечить возможность менять дифферент перемещением груза ',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(145,49,'Должен обеспечить возможность менять дифферент судна перемещением груза ',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(146,49,'Должен обеспечить быстрый доступ к месту повреждения обшивки и набора',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(147,49,'Должен способствовать укреплению корпуса',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(148,50,'Грузы, не боящиеся ударов',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(149,50,'Грузы, не боящиеся подмочки',1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(150,50,'Грузы, которые могут быть использованы для усиления корпуса',0,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(151,51,'Совокупность методов и средств, позволяющих контролировать и оценивать состояние двигателя с его разборкой',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(152,51,'Совокупность методов и средств, позволяющих контролировать и оценивать состояние двигателя с его частичной разборкой',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(153,51,'Совокупность методов и средств, позволяющих контролировать и оценивать состояние двигателя без разборки',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(154,52,'Цвет выхлопных газов',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(155,52,'Цвет воды системы охлаждения ',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(156,52,'Цвет топлива',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(157,53,'Давление выхлопных газов',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(158,53,'Давление охлаждающей жидкости',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(159,53,'Давление масла',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(160,54,'Звук при простукивании неработающего двигателя',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(161,54,'Звук работающего двигателя ',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(162,54,'Звук при прокручивании двигателя ',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(163,55,'Температура топлива',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(164,55,'Температура воздуха в машинном помещении',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(165,55,'Температура двигателя',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(166,56,'Поддержанием чистоты в танках и льялах',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(167,56,'Поддержанием чистоты в клинкетах',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(168,56,'Поддержанием чистоты сливных горловин',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(169,57,'Исправность дистанционных приводов забортных клапанов',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(170,57,'Исправность дистанционных приводов запорных клапанов',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(171,57,'Исправность дистанционных приводов люковых закрытий',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(172,58,'После выгрузки и перед погрузкой',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(173,58,'Ежедневно',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(174,58,'Еженедельно',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(175,59,'Гидравлические затворы люковых закрытий помещений',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(176,59,'Гидравлические затворы охлаждаемых помещений',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(177,59,'Гидравлические затворы танков',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(178,60,'Проверку приёмных сеток решеток, сточных колодцев, грязевых коробок системы осушения и льял в машинном и котельном отделениях ',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(179,60,'Давление в трубопроводах',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(180,60,'Давление на выходе из системы',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(181,61,'Заменить манжеты',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(182,61,'Заменить набивку сальников',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(183,61,'Залить насос перекачиваемой жидкостью',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(184,62,'Отцентровать ротор насоса',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(185,62,'Залить всасывающий трубопровод перекачиваемой жидкостью',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(186,62,'Отцентровать муфты',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(187,63,'Отрегулировать предохранительный клапан',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(188,63,'Зачистить и притереть поверхности опорного и уплотнительного колец',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(189,63,'Открыть задвижку',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(190,64,'Заменить манометр (мановакуумметр)',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(191,64,'Уменьшить высоту всасывания',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(192,64,'Устранить неплотности в трубопроводах',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(193,65,'Заменить рабочее колесо',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(194,65,'Исправность дистанционных приводов запорных клапанов',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(195,65,'Изменить направление вращения',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(196,66,'2,5',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(197,66,'3.5',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(198,66,'4.5',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(199,67,'Нарушение в работе масляного насоса',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(200,67,'Форсунки. Плохое распыливание топлива',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(201,67,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(202,68,'Форсунки. Плохое распыливание топлива',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(203,68,'Нарушение в работе масляного насоса',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(204,68,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(205,69,'Нарушение в работе масляного насоса',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(206,69,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(207,69,'Пропуски в топливном насосе высокого давления. Износ плунжерной пары',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(208,70,'Нарушение в работе турбокомпрессора наддува',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(209,70,'Плохое качество топлива',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(210,70,'Нарушение в работе масляного насоса',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(211,71,'Проверке правильности функционирования и поиска неисправностей непосредственно в условиях эксплуатации',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(212,71,'Проверке правильности функционирования и поиска неисправностей с полной разборкой',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(213,71,'Проверке правильности функционирования и поиска неисправностей с частичной разборкой',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(214,72,'Топливную систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(215,72,'Детали цилиндропоршневой группы',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(216,72,'Систему наддува',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(217,73,'Топливной системы',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(218,73,'Системы смазки',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(219,73,'Цилиндропоршневой группы',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(220,74,'Результаты предремонтной дефектации',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(221,74,'Доклады вахтенного механика',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(222,74,'Результаты осмотра ',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(223,75,'Капитана',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(224,75,'Старший механик',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(225,75,'Старший помощник капитана',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(226,76,'Подача',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(227,76,'Раздача',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(228,76,'Предподача',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(229,77,'Скорость жидкости',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(230,77,'Напор',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(231,77,'Масса жидкости',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(232,78,'Среднее давление',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(233,78,'Давление на две трети',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(234,78,'Полное давление',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(235,79,'Удержанием руля в диаметральной плоскости судна в течении 1 мин.',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(236,79,'Удержанием руля попеременно в крайних положениях в течении 1 мин.',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(237,79,'Перекладки руля на оба борта на максимальный угол',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(238,80,'Гладкость поверхности',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(239,80,'Наличие смазки на поверхности',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(240,80,'Наличие краски на поверхности',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(241,81,'После того, как судовой дизель выйдет на установившийся режим работы',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(242,81,'До пуска судового дизеля',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(243,81,'В режиме максимальной нагрузки',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(244,82,'Температуру охлаждающей пресной воды',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(245,82,'Температуру охлаждающей забортной воды',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(246,82,'Температуру воздуха, поступающего в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(247,83,'65',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(248,83,'55',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(249,83,'45',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(250,84,'Температуре около 20',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(251,84,'9-15',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(252,84,'Температуре около 30',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(253,85,'90',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(254,85,'80',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(255,85,'70',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(256,86,'Добавить щёлочь в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(257,86,'Устранить неисправность терморегулятора или уменьшить открытие перепускных клапанов',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(258,86,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(259,87,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(260,87,'Добавить щёлочь в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(261,87,'Довести давление в системе охлаждения до нормального',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(262,88,'Выключить топливо на цилиндр',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(263,88,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(264,88,'Добавить щёлочь в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(265,89,'Долить воду ',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(266,89,'Устранить течи в системе',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(267,89,'Слить воду ',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(268,90,'Добавить щёлочь в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(269,90,'Добавить дистиллированную воду в систему',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(270,90,'Добавить антикоррозионное средство в систему',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(271,91,'2.5',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(272,91,'3.5',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(273,91,'5',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(274,92,'Низкое давление наддува',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(275,92,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(276,92,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(277,93,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(278,93,'Потеря плотности выпускных клапанов',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(279,93,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(280,94,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(281,94,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(282,94,'Форсунки. Ухудшение распыливания топлива',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(283,95,'Высокая температура наддувочного воздуха',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(284,95,'Недостаточный угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(285,95,'Большой угол опережения подачи топлива в цилиндр',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(286,96,'Участвовать в промежуточных приемках ответственных деталей и узлов',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(287,96,'Участвовать в обсуждении планов ремонта',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(288,96,'Участвовать в составлении планов ремонта',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(289,97,'Капитана',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(290,97,'Судовладельца',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(291,97,'Портовых властей',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(292,98,'Классификационным обществом и согласовывается с судоремонтным предприятием и судовладельцем ',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(293,98,'Судовладельцем  и согласовывается с судоремонтным предприятием и Классификационным обществом',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(294,98,'Судоремонтным предприятием и согласовывается с судовладельцем и Классификационным обществом',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(295,99,'Судоремонтный завод',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(296,99,'Портовая администрация',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(297,99,'Экипаж судна',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(298,100,'Заводская команда',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(299,100,'Экспертная комиссия Квалификационного общества',0,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(300,100,'Экипаж судна.',1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(301,101,'Вопрос продолжение 1',0,'2023-11-22 17:58:09','2023-11-22 17:58:09'),(302,101,'Вопрос продолжение 2',0,'2023-11-22 17:58:09','2023-11-22 17:58:09'),(303,101,'Вопрос продолжение 3',1,'2023-11-22 17:58:09','2023-11-22 17:58:09'),(304,102,'Вопрос продолжение 1',0,'2023-11-22 17:58:34','2023-11-22 17:58:34'),(305,102,'Вопрос продолжение 2',0,'2023-11-22 17:58:34','2023-11-22 17:58:34'),(306,102,'Вопрос продолжение 3',1,'2023-11-22 17:58:34','2023-11-22 17:58:34'),(307,103,'1',0,'2023-11-22 17:58:51','2023-11-22 17:58:51'),(308,103,'2',0,'2023-11-22 17:58:51','2023-11-22 17:58:51'),(309,103,'3',1,'2023-11-22 17:58:51','2023-11-22 17:58:51'),(310,104,'1',0,'2023-11-22 17:58:58','2023-11-22 17:58:58'),(311,104,'2',0,'2023-11-22 17:58:58','2023-11-22 17:58:58'),(312,104,'3',1,'2023-11-22 17:58:58','2023-11-22 17:58:58'),(313,105,'1',0,'2023-11-22 17:59:05','2023-11-22 17:59:05'),(314,105,'2',0,'2023-11-22 17:59:05','2023-11-22 17:59:05'),(315,105,'3',1,'2023-11-22 17:59:05','2023-11-22 17:59:05'),(316,106,'1',1,'2023-11-22 17:59:48','2023-11-22 17:59:48'),(317,106,'2',0,'2023-11-22 17:59:48','2023-11-22 17:59:48'),(318,106,'3',0,'2023-11-22 17:59:48','2023-11-22 17:59:48'),(319,107,'1',1,'2023-11-22 17:59:54','2023-11-22 17:59:54'),(320,107,'2',0,'2023-11-22 17:59:54','2023-11-22 17:59:54'),(321,107,'3',0,'2023-11-22 17:59:54','2023-11-22 17:59:54'),(322,108,'1',1,'2023-11-22 17:59:58','2023-11-22 17:59:58'),(323,108,'2',0,'2023-11-22 17:59:58','2023-11-22 17:59:58'),(324,108,'3',0,'2023-11-22 17:59:58','2023-11-22 17:59:58'),(325,109,'1',1,'2023-11-22 18:00:01','2023-11-22 18:00:01'),(326,109,'2',0,'2023-11-22 18:00:01','2023-11-22 18:00:01'),(327,109,'3',0,'2023-11-22 18:00:01','2023-11-22 18:00:01'),(328,110,'1',1,'2023-11-22 18:00:05','2023-11-22 18:00:05'),(329,110,'2',0,'2023-11-22 18:00:05','2023-11-22 18:00:05'),(330,110,'3',0,'2023-11-22 18:00:05','2023-11-22 18:00:05');
/*!40000 ALTER TABLE `test_question_variations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_questions`
--

DROP TABLE IF EXISTS `test_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) unsigned NOT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` int(11) NOT NULL,
  `points` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_questions_test_id_foreign` (`test_id`),
  CONSTRAINT `test_questions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_questions`
--

LOCK TABLES `test_questions` WRITE;
/*!40000 ALTER TABLE `test_questions` DISABLE KEYS */;
INSERT INTO `test_questions` VALUES (1,2,1,'При какой температуре пресной воды начинается ледообразование?','text',6,0.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(2,2,1,'При какой температуре пресной воды достигается ее наибольшая плотность?','text',6,1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(3,2,1,'При какой температуре замерзает морская вода, имеющая соленость, равную средней солености Мирового океана?','text',6,1.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(4,2,1,'Какие воды при прочих равных условиях замерзают при более низкой температуре: солоноватые или соленые?','text',6,2,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(5,2,1,'Какие воды при прочих равных условиях замерзают при более низкой температуре: пресные или соленые?','text',6,2.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(6,3,2,'В каких пределах может колебаться пористость морского льда?','text',6,0.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(7,3,2,'Как изменяется плотность пресного льда при понижении его температуры?','text',6,1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(8,3,2,'Как изменяется плотность соленого льда при понижении его температуры от  0 до  -23ْ С?','text',6,1.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(9,3,2,'Как изменяется плотность соленого льда при понижении его температуры от  -23ْ С и ниже?','text',6,2,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(10,3,2,'Какова осадка (погруженность) плавающих льдов?','text',6,2.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(11,4,3,'Что обозначает на ледовой карте приведенный  символ (Рис. 11)?','text',6,0.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(12,4,3,'Что обозначает на ледовой карте приведенный  символ (Рис. 12)?','text',6,1,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(13,4,3,'Что обозначает на ледовой карте приведенный выше символ (Рис. 15)?','text',6,1.5,'2023-11-21 12:32:47','2023-11-21 12:32:47'),(14,4,3,'Что обозначает на ледовой карте приведенный выше символ (Рис. 14)?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(15,4,3,'Что обозначает на ледовой карте приведенный  символ (Рис. 13)?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(16,5,4,'В какую сторону от направления ветра в открытом море отклоняется вектор скорости льдов?','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(17,5,4,'На какой угол от направления ветра в открытом море отклоняется вектор скорости льдов?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(18,5,4,'Чему равно отношение скорости дрейфа льда к скорости ветра?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(19,5,4,'В каком направлении по отношению к изобарам происходит дрейф льдов?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(20,5,4,'Как соотносится скорость дрейфа льдов в открытом море с атмосферным давлением?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(21,6,5,'Дать сравнительную оценку разрушительного воздействия пресноводного льда и старого морского льда','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(22,6,5,'Какой признак является основным при оценке разрушительного воздействия на корпус судна?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(23,6,5,'Как учитывается наличие снега на поверхности льда при самостоятельном ледовом плавании?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(24,6,5,'Как следует направлять путь судна в зоне сжатия льдов, для того чтобы снизить риск повреждения корпуса?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(25,6,5,'Что представляет основную опасность для корпуса судна при его стоянке в мелкобитом льду?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(26,7,6,'Какие из перечисленных знаков относятся к судам, предназначенным только для плавания в замерзающих неарктических морях?','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(27,7,6,'Какие из перечисленных знаков относятся к судам арктического плавания?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(28,7,6,'При какой максимальной толщине мелкобитого разреженного льда допустимо самостоятельно плавать судам категории ЛУ3?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(29,7,6,'При какой толщине сплоченного однолетнего льда в летне-осеннюю навигацию допустимо преодолевать ледовые перемычки судам категории ЛУ7?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(30,7,6,'При какой толщине сплоченного  льда в зимне-весеннюю навигацию допустимо преодолевать ледовые перемычки судам категории ЛУ9?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(31,8,7,'Какой порядок плавания судов действует на акватории Северного морского пути?','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(32,8,7,'Какая организация выдает разрешение на плавание судна в акватории Северного морского пути?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(33,8,7,'На какой максимальный срок уполномоченная организация выдает разрешение на плавание в акватории Северного морского пути?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(34,8,7,'На кого возложено навигационно-гидрографическое обеспечение плавания судов в акватории Северного морского пути?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(35,8,7,'На кого возложено гидрометеорологическое обеспечение плавания судов в акватории Северного морского пути?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(36,9,8,'За какое время до предполагаемого захода судна в акваторию Северного морского пути необходимо подать заявку установленного образца в Администрацию Северного морского пути?','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(37,9,8,'За какое время до подхода судна с запада или с востока к границам акватории Северного морского пути требуется сообщить Администрации Северного морского пути о планируемом времени подхода к границе?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(38,9,8,'На каком канале осуществляется связь между судами, ледоколами и Администрацией Северного морского пути во время плавания судов в акватории Северного морского пути?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(39,9,8,'В течение какого времени Администрация Северного рассматривает заявление о разрешении плавания судна в акватории Северного морского пути? ','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(40,9,8,'В течение какого времени после принятия решения об отказе в выдаче разрешения на плавание судна в акватории Северного морского пути Администрация Северного морского пути обязано поместить эту информацию на официальном сайте? ','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(41,10,9,'Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(42,10,9,'Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(43,10,9,'Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(44,10,9,'Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(45,10,9,'Какие действия следует предпринять, если при форсировании льда с разбега судно заклинится и будет сжато льдом в скуловой части корпуса?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(46,11,10,'Какие меры предосторожности следует предпринять при подготовке судна к ледовому плаванию на случай потери винта?','text',6,0.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(47,11,10,'Какие меры предосторожности следует предпринять при подготовке судна к ледовому плаванию на случай повреждения корпуса?','text',6,1,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(48,11,10,'Как должен быть распределен груз по трюмам, чтобы во время ледового плавания предохранить гребной винт и руль от ударов о лед?','text',6,1.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(49,11,10,'Как должен быть размещен на судне груз в трюмах на случай возможного повреждения корпуса судна?','text',6,2,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(50,11,10,'Какие виды груза следует размещать в носовых трюмах при их перевозке в режиме ледового плавания?','text',6,2.5,'2023-11-21 12:32:48','2023-11-21 12:32:48'),(51,12,11,'Диагностика судового двигателя внутреннего сгорания это:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(52,12,11,'Диагностическим параметром судового двигателя внутреннего сгорания является:','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(53,12,11,'Диагностическим параметром судового двигателя внутреннего сгорания является:','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(54,12,11,'Диагностическим параметром судового двигателя внутреннего сгорания является:','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(55,12,11,'Диагностическим параметром судового двигателя внутреннего сгорания является:','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(56,13,12,'Исправное действие балластной и осушительной систем обеспечивается:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(57,13,12,'При диагностике балластной и осушительной систем  проверяют:','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(58,13,12,'Проверку трубопроводов в трюмах выполняют:','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(59,13,12,'При диагностике балластной и осушительной систем  проверяют:','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(60,13,12,'При диагностике балластной и осушительной систем  проверяют:','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(61,14,13,'Роторный насос не засасывает жидкость.','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(62,14,13,'Центробежный насос не подаёт жидкость','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(63,14,13,'Шестерённый насос не обеспечивает спецификационной подачи:','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(64,14,13,'Значительные колебания стрелки манометра (мановакууммера)','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(65,14,13,'Срыв подачи центробежного насоса','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(66,15,14,'Отклонение от среднего величин средних индикаторных давлений по цилиндрам  не должны отличаться от среднего на величину большую, чем:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(67,15,14,'Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое.','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(68,15,14,'Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое. Температура выпускных газов высокая','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(69,15,14,'Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое. Температура выпускных газов высокая','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(70,15,14,'Индекс ТНВД показывает большую подачу, среднее индикаторное давление низкое. Температура выпускных газов высокая','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(71,16,15,'Метод функционального диагноза заключается в','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(72,16,15,'Наибольшее число повреждений судовых дизелей приходится на:','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(73,16,15,'Наиболее затратным является ремонт','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(74,16,15,'Исходными материалами для составления ведомости  ремонтных работ являются','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(75,16,15,'Руководство работами по подготовке судна к ремонту осуществляет','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(76,17,16,'Диагностическим параметром судового насоса является:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(77,17,16,'Диагностическим параметром судового насоса является:','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(78,17,16,'Диагностическим параметром судового вентилятора является:','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(79,17,16,'Рулевое устройство диагностируется путём:','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(80,17,16,'Диагностическим параметром кнехтов, швартовных клюзов, киповых планок, направляющих роульсов является: ','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(81,18,17,'Уровень воды в расширительной цистерне контура пресной воды проверяют:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(82,18,17,'Перед пуском судового дизеля проверяют:','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(83,18,17,'Перед пуском судового дизеля температура охлаждающей пресной воды должна быть около:','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(84,18,17,'Перед пуском судового дизеля высоковязкое топливо должно иметь вязкость, соответствующую:','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(85,18,17,'Температура высоковязкого топлива перед сепаратором должна быть не выше:','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(86,19,18,'Температура охлаждающей (пресной) воды на входе в дизель повышена','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(87,19,18,'Температура воды (масла), выходящей из дизеля, отдельных цилиндров или поршней, повышена','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(88,19,18,'Температура воды (масла), выходящей из поршней отдельных цилиндров, резко понизилась','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(89,19,18,'В расширительной цистерне упал уровень воды','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(90,19,18,'Концентрация ингибитора ниже нормы','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(91,20,19,'Отклонение от среднего величин максимальных давлений сгорания по цилиндрам  не должны отличаться от среднего на величину большую, чем:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(92,20,19,'Температура выпускных газов повышена','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(93,20,19,'Температура выпускных газов повышена','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(94,20,19,'Температура выпускных газов повышена','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(95,20,19,'Температура выпускных газов повышена','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(96,21,20,'Во время ремонта судна на судоремонтном предприятии  старший механик обязан:','text',6,0.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(97,21,20,'Ремонт судна на судоремонтном предприятии проводится под надзором:','text',6,1,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(98,21,20,'Программа испытаний судна после ремонта разрабатывается:','text',6,1.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(99,21,20,'Ответственность за проведение испытаний после ремонта и исправную работу судовых технических средств, корпусных конструкций и систем, отремонтированных заводом, несет:','text',6,2,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(100,21,20,'Обслуживание судовых технических средств, корпусных конструкций и систем во время испытаний обеспечивает: ','text',6,2.5,'2023-11-21 12:34:58','2023-11-21 12:34:58'),(101,22,NULL,'Вопрос','text',1,0.5,'2023-11-22 17:58:09','2023-11-22 17:58:09'),(102,22,NULL,'Второй вопрос','image',2,1,'2023-11-22 17:58:34','2023-11-22 17:58:34'),(103,22,NULL,'третий вопрос','image',3,1.5,'2023-11-22 17:58:51','2023-11-22 17:58:51'),(104,22,NULL,'4 вопрос','text',4,2,'2023-11-22 17:58:58','2023-11-22 17:58:58'),(105,22,NULL,'5ый вопрос','text',5,2.5,'2023-11-22 17:59:05','2023-11-22 17:59:05'),(106,23,NULL,'Вопрос 1','text',1,0.5,'2023-11-22 17:59:48','2023-11-22 17:59:48'),(107,23,NULL,'вопрос','text',2,1,'2023-11-22 17:59:54','2023-11-22 17:59:54'),(108,23,NULL,'вопрос','text',3,1.5,'2023-11-22 17:59:58','2023-11-22 17:59:58'),(109,23,NULL,'вопрос','text',4,2,'2023-11-22 18:00:01','2023-11-22 18:00:01'),(110,23,NULL,'вопрос','text',5,2.5,'2023-11-22 18:00:05','2023-11-22 18:00:05');
/*!40000 ALTER TABLE `test_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `competetion_test_id` bigint(20) unsigned DEFAULT NULL,
  `common_test_id` int(11) DEFAULT NULL,
  `indicator_id` bigint(20) unsigned NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `max_points` double(8,2) NOT NULL DEFAULT '7.00',
  `recomended_points` double(8,2) NOT NULL DEFAULT '7.00',
  `created_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tests_competetion_id_foreign` (`competetion_id`),
  KEY `tests_competetion_test_id_foreign` (`competetion_test_id`),
  KEY `tests_indicator_id_foreign` (`indicator_id`),
  CONSTRAINT `tests_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`),
  CONSTRAINT `tests_competetion_test_id_foreign` FOREIGN KEY (`competetion_test_id`) REFERENCES `competetion_tests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tests_indicator_id_foreign` FOREIGN KEY (`indicator_id`) REFERENCES `indicators` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (2,'Ледовое плавание',146,2,2,1,1,1,7.00,7.00,'auto','2023-11-21 12:32:47','2023-11-21 12:32:47'),(3,'Ледовое плавание',146,3,2,2,1,1,7.00,7.00,'auto','2023-11-21 12:32:47','2023-11-21 12:32:47'),(4,'Ледовое плавание',146,4,2,3,1,1,7.00,7.00,'auto','2023-11-21 12:32:47','2023-11-21 12:32:48'),(5,'Ледовое плавание',146,5,2,4,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(6,'Ледовое плавание',146,6,2,5,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(7,'Ледовое плавание',146,7,2,6,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(8,'Ледовое плавание',146,8,2,7,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(9,'Ледовое плавание',146,9,2,8,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(10,'Ледовое плавание',146,10,2,9,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(11,'Ледовое плавание',146,11,2,10,1,1,7.00,7.00,'auto','2023-11-21 12:32:48','2023-11-21 12:32:48'),(12,'Диагностика и ремонт',147,12,3,11,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(13,'Диагностика и ремонт',147,13,3,12,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(14,'Диагностика и ремонт',147,14,3,13,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(15,'Диагностика и ремонт',147,15,3,14,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(16,'Диагностика и ремонт',147,16,3,15,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(17,'Диагностика и ремонт',147,17,3,16,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(18,'Диагностика и ремонт',147,18,3,17,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(19,'Диагностика и ремонт',147,19,3,18,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(20,'Диагностика и ремонт',147,20,3,19,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(21,'Диагностика и ремонт',147,21,3,20,1,1,7.00,7.00,'auto','2023-11-21 12:34:58','2023-11-21 12:34:58'),(22,'Ручная сборка',146,22,NULL,1,5,1,7.00,7.00,'handle','2023-11-22 17:58:09','2023-11-22 17:59:05'),(23,'Ручная сборка',146,22,NULL,6,5,1,7.00,7.00,'handle','2023-11-22 17:59:48','2023-11-22 18:00:05');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_competetion_archives`
--

DROP TABLE IF EXISTS `user_competetion_archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_competetion_archives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `points` float NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL,
  `competetion_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_competetion_archives_user_id_foreign` (`user_id`),
  KEY `user_competetion_archives_competetion_id_foreign` (`competetion_id`),
  CONSTRAINT `user_competetion_archives_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`),
  CONSTRAINT `user_competetion_archives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_competetion_archives`
--

LOCK TABLES `user_competetion_archives` WRITE;
/*!40000 ALTER TABLE `user_competetion_archives` DISABLE KEYS */;
INSERT INTO `user_competetion_archives` VALUES (3,'2023-11-21 08:23:18','2023-11-21 08:23:18','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',4,3,36,147),(4,'2023-11-21 08:24:04','2023-11-21 08:24:04','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',4,3,36,146),(5,'2023-11-21 12:37:31','2023-11-21 12:37:31','2023-11-21','Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии',6,3,1,146),(6,'2023-11-21 12:37:57','2023-11-21 12:37:57','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',4,3,1,147),(7,'2023-11-21 12:46:41','2023-11-21 12:46:41','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',4,3,1,147),(8,'2023-11-21 12:47:02','2023-11-21 12:47:02','2023-11-21','Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии',6,3,1,146),(9,'2023-11-21 12:58:18','2023-11-21 12:58:18','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',4,3,1,147),(10,'2023-11-21 12:58:55','2023-11-21 12:58:55','2023-11-21','Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии',4,3,1,146),(11,'2023-11-21 13:03:18','2023-11-21 13:03:18','2023-11-21','Вы получили НИЗКИЕ результаты по данной компетенции.',0.5,1,1,146),(12,'2023-11-21 13:40:00','2023-11-21 13:40:00','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',8.5,4,36,147),(13,'2023-11-21 13:44:53','2023-11-21 13:44:53','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',6.5,4,36,146),(14,'2023-11-21 16:53:48','2023-11-21 16:53:48','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',15,5,36,147),(15,'2023-11-21 16:58:33','2023-11-21 16:58:33','2023-11-21','Вы получили ВЫСОКИЕ результаты по данной компетенции',15,5,36,146),(16,'2023-11-21 21:10:15','2023-11-21 21:10:15','2023-11-22','Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии',4.5,3,1,146),(17,'2023-11-22 07:06:16','2023-11-22 07:06:16','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',3.5,3,1,147),(18,'2023-11-22 07:47:28','2023-11-22 07:47:28','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',15,5,45,146),(19,'2023-11-22 07:50:10','2023-11-22 07:50:10','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',15,5,45,147),(20,'2023-11-22 10:25:03','2023-11-22 10:25:03','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',7,4,37,147),(21,'2023-11-22 10:36:34','2023-11-22 10:36:34','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',3,2,37,147),(22,'2023-11-22 10:43:48','2023-11-22 10:43:48','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',5.5,3,37,147),(23,'2023-11-22 10:52:43','2023-11-22 10:52:43','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',3.5,3,37,146),(24,'2023-11-22 18:47:22','2023-11-22 18:47:22','2023-11-22','Вы получили ВЫСОКИЕ результаты по данной компетенции',14.5,5,37,146),(25,'2023-11-22 18:50:27','2023-11-22 18:50:27','2023-11-22','Вы СООТВЕТСТВУЕТЕ данной компетенции',1,1,37,147);
/*!40000 ALTER TABLE `user_competetion_archives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_competetions`
--

DROP TABLE IF EXISTS `user_competetions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_competetions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `competetion_test_id` int(12) DEFAULT NULL,
  `common_test_id` int(11) DEFAULT NULL,
  `progress` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `performance` double(8,2) NOT NULL DEFAULT '0.00',
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `max_points` double(8,2) NOT NULL DEFAULT '0.00',
  `points` float DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_competetions_user_id_foreign` (`user_id`),
  KEY `user_competetions_competetion_id_foreign` (`competetion_id`),
  CONSTRAINT `user_competetions_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_competetions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_competetions`
--

LOCK TABLES `user_competetions` WRITE;
/*!40000 ALTER TABLE `user_competetions` DISABLE KEYS */;
INSERT INTO `user_competetions` VALUES (12,1,147,3,3,2,'2023-11-27','2023-11-30',23.00,1,15.00,3.5,3,'Вы получили ВЫСОКИЕ результаты по данной компетенции','2023-11-21 12:57:46','2023-11-27 12:45:42'),(13,1,146,2,2,2,'2023-11-27','2023-11-30',30.00,1,15.00,4.5,3,'Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии','2023-11-21 12:57:46','2023-11-27 12:45:42'),(14,36,147,3,3,2,'2023-11-22','2023-11-26',100.00,1,15.00,15,5,'Вы получили ВЫСОКИЕ результаты по данной компетенции','2023-11-21 13:35:58','2023-11-22 10:43:14'),(15,36,146,2,2,2,'2023-11-22','2023-11-26',100.00,1,15.00,15,5,'Вы получили ВЫСОКИЕ результаты по данной компетенции','2023-11-21 13:35:58','2023-11-22 10:43:14'),(35,34,147,3,3,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(36,35,147,3,3,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(37,38,147,3,3,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(38,41,147,3,3,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(39,44,147,3,3,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(41,39,147,3,3,0,'2023-10-31','2023-12-02',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-27 18:57:24'),(43,34,146,2,2,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(44,35,146,2,2,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(45,38,146,2,2,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(46,41,146,2,2,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(47,44,146,2,2,0,'2023-11-22','2023-11-26',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(49,39,146,2,2,0,'2023-10-31','2023-12-02',0.00,0,15.00,0,0,NULL,'2023-11-22 10:43:14','2023-11-27 18:57:24');
/*!40000 ALTER TABLE `user_competetions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_literatures`
--

DROP TABLE IF EXISTS `user_literatures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_literatures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `literature_id` bigint(20) unsigned NOT NULL,
  `page` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `literature_id` (`literature_id`),
  CONSTRAINT `user_literatures_ibfk_1` FOREIGN KEY (`literature_id`) REFERENCES `literatures` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_literatures`
--

LOCK TABLES `user_literatures` WRITE;
/*!40000 ALTER TABLE `user_literatures` DISABLE KEYS */;
INSERT INTO `user_literatures` VALUES (6,1,13,3,'2023-10-01 10:58:41','2023-11-04 10:04:46'),(7,1,14,8,'2023-10-05 16:14:52','2023-11-27 19:30:38'),(8,36,13,1,'2023-10-12 11:07:07','2023-10-12 11:07:07'),(9,34,13,5,'2023-10-14 16:34:49','2023-10-14 16:34:49');
/*!40000 ALTER TABLE `user_literatures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_notifications`
--

DROP TABLE IF EXISTS `user_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `notification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications_user_id_foreign` (`user_id`),
  CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1047 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notifications`
--

LOCK TABLES `user_notifications` WRITE;
/*!40000 ALTER TABLE `user_notifications` DISABLE KEYS */;
INSERT INTO `user_notifications` VALUES (60,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(61,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(62,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(63,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(64,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(65,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(66,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(67,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(68,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(69,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:54','2023-10-01 20:38:48'),(100,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(101,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(102,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(103,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(104,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(105,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(106,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(107,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(108,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(109,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 18:50:59','2023-10-01 20:38:48'),(140,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(141,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(142,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(143,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(144,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(145,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(146,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(147,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(148,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(149,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(180,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(181,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(182,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(183,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:29','2023-10-01 20:38:48'),(184,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:30','2023-10-01 20:38:48'),(185,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:30','2023-10-01 20:38:48'),(186,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:30','2023-10-01 20:38:48'),(187,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:30','2023-10-01 20:38:48'),(188,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:30','2023-10-01 20:38:48'),(189,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 19:07:30','2023-10-01 20:38:48'),(214,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 20:25:04','2023-10-01 20:38:48'),(215,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-27 20:25:04','2023-10-01 20:38:48'),(232,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:23:36','2023-10-01 20:38:48'),(243,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(244,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(245,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(246,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(247,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(248,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(249,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(250,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:39','2023-10-01 20:38:48'),(277,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(278,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(279,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(280,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(281,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(282,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(283,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(284,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(285,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(286,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 09:34:40','2023-10-01 20:38:48'),(313,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 13:53:03','2023-10-01 20:38:48'),(314,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 13:53:03','2023-10-01 20:38:48'),(327,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(328,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(329,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(330,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(331,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(332,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(333,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(334,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(335,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(336,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:31','2023-10-01 20:38:48'),(367,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(368,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(369,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(370,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(371,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(372,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(373,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(374,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(375,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(376,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:19:33','2023-10-01 20:38:48'),(407,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:57','2023-10-01 20:38:48'),(408,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(409,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(410,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(411,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(412,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(413,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(414,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(415,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(416,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:36:58','2023-10-01 20:38:48'),(447,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(448,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(449,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(450,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(451,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(452,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(453,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(454,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(455,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(456,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:00','2023-10-01 20:38:48'),(479,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:30','2023-10-01 20:38:48'),(480,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 14:37:30','2023-10-01 20:38:48'),(496,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(497,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(498,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(499,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(500,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(501,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(502,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(503,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(504,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(505,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:14:43','2023-10-01 20:38:48'),(546,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(547,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(548,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(549,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(550,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(551,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(552,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(553,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(554,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(555,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(556,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(557,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(558,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(559,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(560,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(561,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(562,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(563,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(564,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(565,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:20:12','2023-10-01 20:38:48'),(607,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:31:06','2023-10-01 20:38:48'),(611,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 15:31:41','2023-10-01 20:38:48'),(631,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 19:12:38','2023-10-01 20:38:48'),(635,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 19:13:12','2023-10-01 20:38:48'),(646,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 20:07:39','2023-10-01 20:38:48'),(650,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 20:07:58','2023-10-01 20:38:48'),(654,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 20:12:13','2023-10-01 20:38:48'),(658,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 20:12:43','2023-10-01 20:38:48'),(662,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 20:17:52','2023-10-01 20:38:48'),(666,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 20:18:10','2023-10-01 20:38:48'),(675,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-28 21:37:41','2023-10-01 20:38:48'),(679,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-29 10:41:15','2023-10-01 20:38:48'),(683,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-29 10:44:33','2023-10-01 20:38:48'),(697,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 15:54:30','2023-10-01 20:38:48'),(702,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 15:55:12','2023-10-01 20:38:48'),(708,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 16:02:09','2023-10-01 20:38:48'),(720,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 16:32:47','2023-10-01 20:38:48'),(725,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 16:46:50','2023-10-01 20:38:48'),(730,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 16:51:47','2023-10-01 20:38:48'),(735,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 16:53:44','2023-10-01 20:38:48'),(740,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 16:57:08','2023-10-01 20:38:48'),(745,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 17:02:29','2023-10-01 20:38:48'),(750,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 17:02:29','2023-10-01 20:38:48'),(761,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 20:31:06','2023-10-01 20:38:48'),(765,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 20:36:34','2023-10-01 20:38:48'),(769,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 20:36:34','2023-10-01 20:38:48'),(773,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 21:19:27','2023-10-01 20:38:48'),(778,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 21:19:28','2023-10-01 20:38:48'),(783,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 21:27:10','2023-10-01 20:38:48'),(788,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-09-30 21:27:11','2023-10-01 20:38:48'),(793,14,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-10-01 14:16:56','2023-10-01 14:16:56'),(794,15,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-10-01 14:16:56','2023-10-01 14:16:56'),(796,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-10-01 14:16:56','2023-10-01 20:38:48'),(800,14,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-10-01 14:16:57','2023-10-01 14:16:57'),(801,15,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-10-01 14:16:57','2023-10-01 14:16:57'),(803,35,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-10-01 14:16:57','2023-10-01 20:38:48'),(900,35,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-17 18:21:52','2023-11-17 18:21:52'),(903,38,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-11-17 18:21:52','2023-11-21 17:36:23'),(904,39,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-17 18:21:52','2023-11-17 18:21:52'),(1009,45,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-11-22 07:40:14','2023-11-22 07:54:09'),(1010,45,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-11-22 07:40:14','2023-11-22 07:54:09'),(1012,34,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1013,35,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1014,38,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1015,41,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1016,44,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1017,58,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1018,39,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:13:26','2023-11-22 10:13:26'),(1020,34,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1021,35,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1022,38,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1023,41,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1024,44,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1025,58,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1026,39,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:36:06','2023-11-22 10:36:06'),(1028,34,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1029,35,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1030,38,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1031,41,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1032,44,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1033,58,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1034,39,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1036,34,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1037,35,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1038,38,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1039,41,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1040,44,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1041,58,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1042,39,'Уважаемый пользователь, вам назначено новое тестирование.',0,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(1045,37,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-11-22 18:24:05','2023-11-22 18:49:02'),(1046,37,'Уважаемый пользователь, вам назначено новое тестирование.',1,'2023-11-22 18:50:04','2023-11-22 19:10:09');
/*!40000 ALTER TABLE `user_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_objects`
--

DROP TABLE IF EXISTS `user_objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_objects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `object_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_objects_user_id_foreign` (`user_id`),
  KEY `user_objects_object_id_foreign` (`object_id`),
  CONSTRAINT `user_objects_object_id_foreign` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_objects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_objects`
--

LOCK TABLES `user_objects` WRITE;
/*!40000 ALTER TABLE `user_objects` DISABLE KEYS */;
INSERT INTO `user_objects` VALUES (5,34,12,'2023-09-23 18:29:56','2023-09-23 18:29:56'),(6,35,12,'2023-09-23 18:29:56','2023-09-23 18:29:56'),(7,36,12,'2023-09-23 18:29:56','2023-09-23 18:29:56'),(9,37,12,'2023-09-23 18:29:56','2023-09-23 18:29:56'),(13,1,12,'2023-10-01 15:00:33','2023-10-01 15:00:47'),(14,38,12,'2023-11-14 16:08:50','2023-11-14 16:08:50'),(15,39,12,'2023-11-16 16:33:20','2023-11-16 16:33:20'),(17,41,12,'2023-11-21 13:44:15','2023-11-21 13:44:15'),(20,44,12,'2023-11-22 07:15:49','2023-11-22 07:15:49'),(21,45,12,'2023-11-22 07:31:41','2023-11-22 07:31:41'),(22,46,12,'2023-11-22 08:22:09','2023-11-22 08:22:09'),(23,47,12,'2023-11-22 08:51:59','2023-11-22 08:51:59'),(25,49,12,'2023-11-22 08:58:26','2023-11-22 08:58:26'),(29,58,12,'2023-11-22 09:20:17','2023-11-22 09:20:17'),(39,68,12,'2023-11-22 11:27:40','2023-11-22 11:27:40'),(40,69,12,'2023-11-22 18:56:54','2023-11-22 18:56:54');
/*!40000 ALTER TABLE `user_objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_reposts`
--

DROP TABLE IF EXISTS `user_reposts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_reposts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_reposts_user_id_foreign` (`user_id`),
  CONSTRAINT `user_reposts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=351 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_reposts`
--

LOCK TABLES `user_reposts` WRITE;
/*!40000 ALTER TABLE `user_reposts` DISABLE KEYS */;
INSERT INTO `user_reposts` VALUES (31,36,'2023-09-30 21:37:08','2023-09-30 21:37:08'),(32,36,'2023-09-30 21:37:29','2023-09-30 21:37:29'),(33,35,'2023-10-01 15:12:25','2023-10-01 15:12:25'),(34,36,'2023-10-01 15:28:40','2023-10-01 15:28:40'),(35,37,'2023-10-01 15:30:51','2023-10-01 15:30:51'),(36,34,'2023-10-02 07:23:09','2023-10-02 07:23:09'),(37,34,'2023-10-02 11:36:24','2023-10-02 11:36:24'),(38,34,'2023-10-05 17:01:36','2023-10-05 17:01:36'),(39,1,'2023-10-12 19:54:04','2023-10-12 19:54:04'),(40,1,'2023-10-14 16:36:24','2023-10-14 16:36:24'),(41,1,'2023-10-23 11:46:09','2023-10-23 11:46:09'),(42,34,'2023-10-24 13:17:03','2023-10-24 13:17:03'),(43,34,'2023-10-24 13:17:04','2023-10-24 13:17:04'),(44,15,'2023-10-25 10:51:46','2023-10-25 10:51:46'),(45,15,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(46,14,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(47,1,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(48,34,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(49,35,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(50,36,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(51,37,'2023-10-25 10:52:16','2023-10-25 10:52:16'),(52,34,'2023-10-26 15:06:43','2023-10-26 15:06:43'),(53,35,'2023-10-26 15:06:43','2023-10-26 15:06:43'),(54,15,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(55,14,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(56,1,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(57,34,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(58,35,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(59,36,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(60,37,'2023-10-26 17:02:21','2023-10-26 17:02:21'),(61,34,'2023-10-27 11:15:34','2023-10-27 11:15:34'),(62,35,'2023-10-27 11:15:34','2023-10-27 11:15:34'),(63,1,'2023-10-27 11:50:02','2023-10-27 11:50:02'),(64,34,'2023-10-27 11:50:23','2023-10-27 11:50:23'),(65,15,'2023-10-27 14:25:59','2023-10-27 14:25:59'),(66,14,'2023-10-27 14:25:59','2023-10-27 14:25:59'),(67,1,'2023-10-27 14:25:59','2023-10-27 14:25:59'),(68,34,'2023-10-27 14:25:59','2023-10-27 14:25:59'),(69,15,'2023-10-27 17:29:11','2023-10-27 17:29:11'),(70,1,'2023-10-27 17:29:21','2023-10-27 17:29:21'),(71,36,'2023-10-30 06:02:23','2023-10-30 06:02:23'),(72,34,'2023-10-31 16:12:10','2023-10-31 16:12:10'),(73,1,'2023-10-31 16:44:10','2023-10-31 16:44:10'),(74,15,'2023-10-31 16:44:46','2023-10-31 16:44:46'),(75,14,'2023-10-31 16:44:46','2023-10-31 16:44:46'),(76,1,'2023-10-31 16:44:46','2023-10-31 16:44:46'),(77,34,'2023-10-31 16:44:46','2023-10-31 16:44:46'),(78,1,'2023-11-04 09:53:35','2023-11-04 09:53:35'),(79,1,'2023-11-04 09:56:12','2023-11-04 09:56:12'),(80,1,'2023-11-04 09:59:23','2023-11-04 09:59:23'),(81,1,'2023-11-04 10:02:09','2023-11-04 10:02:09'),(82,1,'2023-11-14 14:48:32','2023-11-14 14:48:32'),(83,34,'2023-11-14 14:48:32','2023-11-14 14:48:32'),(84,35,'2023-11-14 14:48:32','2023-11-14 14:48:32'),(85,1,'2023-11-14 14:54:02','2023-11-14 14:54:02'),(86,34,'2023-11-14 14:54:02','2023-11-14 14:54:02'),(87,35,'2023-11-14 14:54:02','2023-11-14 14:54:02'),(88,1,'2023-11-14 15:19:49','2023-11-14 15:19:49'),(89,34,'2023-11-14 15:19:49','2023-11-14 15:19:49'),(90,1,'2023-11-14 15:23:28','2023-11-14 15:23:28'),(91,1,'2023-11-14 15:24:17','2023-11-14 15:24:17'),(92,1,'2023-11-14 15:25:03','2023-11-14 15:25:03'),(93,1,'2023-11-14 15:26:51','2023-11-14 15:26:51'),(94,1,'2023-11-14 15:27:12','2023-11-14 15:27:12'),(95,1,'2023-11-14 15:27:46','2023-11-14 15:27:46'),(96,1,'2023-11-14 15:28:11','2023-11-14 15:28:11'),(97,1,'2023-11-14 15:29:16','2023-11-14 15:29:16'),(98,1,'2023-11-14 15:29:57','2023-11-14 15:29:57'),(99,1,'2023-11-14 15:30:40','2023-11-14 15:30:40'),(100,34,'2023-11-14 15:30:40','2023-11-14 15:30:40'),(101,1,'2023-11-14 15:31:44','2023-11-14 15:31:44'),(102,34,'2023-11-14 15:31:44','2023-11-14 15:31:44'),(103,34,'2023-11-14 16:54:29','2023-11-14 16:54:29'),(104,38,'2023-11-14 18:40:28','2023-11-14 18:40:28'),(105,38,'2023-11-15 16:35:59','2023-11-15 16:35:59'),(106,38,'2023-11-15 16:54:31','2023-11-15 16:54:31'),(107,38,'2023-11-15 16:54:42','2023-11-15 16:54:42'),(108,38,'2023-11-15 17:02:08','2023-11-15 17:02:08'),(109,37,'2023-11-15 19:04:55','2023-11-15 19:04:55'),(110,1,'2023-11-15 19:05:03','2023-11-15 19:05:03'),(111,38,'2023-11-15 19:05:17','2023-11-15 19:05:17'),(112,15,'2023-11-15 19:10:01','2023-11-15 19:10:01'),(113,38,'2023-11-16 14:36:28','2023-11-16 14:36:28'),(114,1,'2023-11-16 16:24:59','2023-11-16 16:24:59'),(115,38,'2023-11-16 16:25:16','2023-11-16 16:25:16'),(116,38,'2023-11-16 16:26:10','2023-11-16 16:26:10'),(117,34,'2023-11-17 06:44:55','2023-11-17 06:44:55'),(118,1,'2023-11-17 07:09:53','2023-11-17 07:09:53'),(119,39,'2023-11-17 08:25:13','2023-11-17 08:25:13'),(120,39,'2023-11-17 08:25:38','2023-11-17 08:25:38'),(122,35,'2023-11-17 08:28:04','2023-11-17 08:28:04'),(123,36,'2023-11-17 08:28:04','2023-11-17 08:28:04'),(124,39,'2023-11-17 08:29:17','2023-11-17 08:29:17'),(125,38,'2023-11-17 08:29:31','2023-11-17 08:29:31'),(126,34,'2023-11-17 08:29:39','2023-11-17 08:29:39'),(127,38,'2023-11-17 08:31:22','2023-11-17 08:31:22'),(128,38,'2023-11-17 08:34:20','2023-11-17 08:34:20'),(129,39,'2023-11-17 08:35:22','2023-11-17 08:35:22'),(130,38,'2023-11-17 08:35:32','2023-11-17 08:35:32'),(131,39,'2023-11-17 08:35:34','2023-11-17 08:35:34'),(132,38,'2023-11-17 08:35:56','2023-11-17 08:35:56'),(133,38,'2023-11-17 08:36:05','2023-11-17 08:36:05'),(134,39,'2023-11-17 08:36:35','2023-11-17 08:36:35'),(135,38,'2023-11-17 08:36:35','2023-11-17 08:36:35'),(136,36,'2023-11-17 11:04:41','2023-11-17 11:04:41'),(137,36,'2023-11-17 11:06:15','2023-11-17 11:06:15'),(138,36,'2023-11-17 11:06:22','2023-11-17 11:06:22'),(139,36,'2023-11-17 11:06:40','2023-11-17 11:06:40'),(140,36,'2023-11-17 11:07:28','2023-11-17 11:07:28'),(141,36,'2023-11-17 11:07:57','2023-11-17 11:07:57'),(142,36,'2023-11-17 11:08:19','2023-11-17 11:08:19'),(143,36,'2023-11-17 11:08:20','2023-11-17 11:08:20'),(144,36,'2023-11-17 11:09:00','2023-11-17 11:09:00'),(145,36,'2023-11-17 11:10:16','2023-11-17 11:10:16'),(146,36,'2023-11-17 11:11:40','2023-11-17 11:11:40'),(147,36,'2023-11-17 11:17:23','2023-11-17 11:17:23'),(148,36,'2023-11-17 11:17:50','2023-11-17 11:17:50'),(149,36,'2023-11-17 11:18:00','2023-11-17 11:18:00'),(150,36,'2023-11-17 11:19:26','2023-11-17 11:19:26'),(151,36,'2023-11-17 11:20:10','2023-11-17 11:20:10'),(152,36,'2023-11-17 11:21:28','2023-11-17 11:21:28'),(153,36,'2023-11-17 11:21:30','2023-11-17 11:21:30'),(154,36,'2023-11-17 11:23:28','2023-11-17 11:23:28'),(155,36,'2023-11-17 11:25:44','2023-11-17 11:25:44'),(156,36,'2023-11-17 11:25:53','2023-11-17 11:25:53'),(157,36,'2023-11-17 11:26:47','2023-11-17 11:26:47'),(158,36,'2023-11-17 11:26:48','2023-11-17 11:26:48'),(159,36,'2023-11-17 11:30:28','2023-11-17 11:30:28'),(160,36,'2023-11-17 11:33:20','2023-11-17 11:33:20'),(161,36,'2023-11-17 11:36:12','2023-11-17 11:36:12'),(162,36,'2023-11-17 11:37:08','2023-11-17 11:37:08'),(163,36,'2023-11-17 11:37:20','2023-11-17 11:37:20'),(164,36,'2023-11-17 11:37:40','2023-11-17 11:37:40'),(165,36,'2023-11-17 11:37:58','2023-11-17 11:37:58'),(166,36,'2023-11-17 11:38:13','2023-11-17 11:38:13'),(167,36,'2023-11-17 11:39:24','2023-11-17 11:39:24'),(168,36,'2023-11-17 11:39:56','2023-11-17 11:39:56'),(169,36,'2023-11-17 11:49:20','2023-11-17 11:49:20'),(170,36,'2023-11-17 11:51:53','2023-11-17 11:51:53'),(171,36,'2023-11-17 11:52:22','2023-11-17 11:52:22'),(172,36,'2023-11-17 11:54:35','2023-11-17 11:54:35'),(173,36,'2023-11-17 11:54:42','2023-11-17 11:54:42'),(174,36,'2023-11-17 11:57:00','2023-11-17 11:57:00'),(175,36,'2023-11-17 11:57:29','2023-11-17 11:57:29'),(176,36,'2023-11-17 11:57:40','2023-11-17 11:57:40'),(177,36,'2023-11-17 11:57:48','2023-11-17 11:57:48'),(178,36,'2023-11-17 11:58:19','2023-11-17 11:58:19'),(179,36,'2023-11-17 11:59:09','2023-11-17 11:59:09'),(180,36,'2023-11-17 11:59:19','2023-11-17 11:59:19'),(181,36,'2023-11-17 11:59:21','2023-11-17 11:59:21'),(182,36,'2023-11-17 11:59:59','2023-11-17 11:59:59'),(183,36,'2023-11-17 12:01:00','2023-11-17 12:01:00'),(184,36,'2023-11-17 12:01:54','2023-11-17 12:01:54'),(185,36,'2023-11-17 12:02:08','2023-11-17 12:02:08'),(186,36,'2023-11-17 12:02:26','2023-11-17 12:02:26'),(187,36,'2023-11-17 12:02:34','2023-11-17 12:02:34'),(188,36,'2023-11-17 12:15:47','2023-11-17 12:15:47'),(189,36,'2023-11-17 12:16:40','2023-11-17 12:16:40'),(190,36,'2023-11-17 12:18:43','2023-11-17 12:18:43'),(191,36,'2023-11-17 12:20:42','2023-11-17 12:20:42'),(192,36,'2023-11-17 12:30:27','2023-11-17 12:30:27'),(193,36,'2023-11-17 12:30:32','2023-11-17 12:30:32'),(194,36,'2023-11-17 12:30:46','2023-11-17 12:30:46'),(195,36,'2023-11-17 12:32:26','2023-11-17 12:32:26'),(196,36,'2023-11-17 12:32:34','2023-11-17 12:32:34'),(197,36,'2023-11-17 12:32:57','2023-11-17 12:32:57'),(198,36,'2023-11-17 12:33:42','2023-11-17 12:33:42'),(199,36,'2023-11-17 12:33:45','2023-11-17 12:33:45'),(200,36,'2023-11-17 12:34:30','2023-11-17 12:34:30'),(201,36,'2023-11-17 12:44:18','2023-11-17 12:44:18'),(202,36,'2023-11-17 12:48:14','2023-11-17 12:48:14'),(203,36,'2023-11-17 12:50:07','2023-11-17 12:50:07'),(204,36,'2023-11-17 12:52:32','2023-11-17 12:52:32'),(205,36,'2023-11-17 12:53:35','2023-11-17 12:53:35'),(206,36,'2023-11-17 12:55:24','2023-11-17 12:55:24'),(207,36,'2023-11-17 12:55:29','2023-11-17 12:55:29'),(208,36,'2023-11-17 12:56:33','2023-11-17 12:56:33'),(209,39,'2023-11-17 12:57:27','2023-11-17 12:57:27'),(210,1,'2023-11-17 12:57:27','2023-11-17 12:57:27'),(211,39,'2023-11-17 12:59:24','2023-11-17 12:59:24'),(212,38,'2023-11-17 12:59:24','2023-11-17 12:59:24'),(213,1,'2023-11-17 12:59:24','2023-11-17 12:59:24'),(214,34,'2023-11-17 12:59:24','2023-11-17 12:59:24'),(215,35,'2023-11-17 12:59:25','2023-11-17 12:59:25'),(216,36,'2023-11-17 12:59:25','2023-11-17 12:59:25'),(217,37,'2023-11-17 12:59:25','2023-11-17 12:59:25'),(218,39,'2023-11-17 13:00:19','2023-11-17 13:00:19'),(219,1,'2023-11-17 13:00:19','2023-11-17 13:00:19'),(220,1,'2023-11-17 13:00:34','2023-11-17 13:00:34'),(221,34,'2023-11-17 13:00:34','2023-11-17 13:00:34'),(222,1,'2023-11-17 13:34:39','2023-11-17 13:34:39'),(223,35,'2023-11-17 14:05:32','2023-11-17 14:05:32'),(224,35,'2023-11-17 14:06:57','2023-11-17 14:06:57'),(225,1,'2023-11-17 14:39:41','2023-11-17 14:39:41'),(226,35,'2023-11-20 08:27:33','2023-11-20 08:27:33'),(227,36,'2023-11-20 09:02:20','2023-11-20 09:02:20'),(228,34,'2023-11-20 09:08:02','2023-11-20 09:08:02'),(229,39,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(230,38,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(231,1,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(232,34,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(233,35,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(234,36,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(235,37,'2023-11-20 09:09:19','2023-11-20 09:09:19'),(236,39,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(237,38,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(238,1,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(239,34,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(240,35,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(241,36,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(242,37,'2023-11-20 09:27:02','2023-11-20 09:27:02'),(243,39,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(244,38,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(245,1,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(246,34,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(247,35,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(248,36,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(249,37,'2023-11-20 09:28:15','2023-11-20 09:28:15'),(250,1,'2023-11-20 11:41:19','2023-11-20 11:41:19'),(251,1,'2023-11-20 11:42:41','2023-11-20 11:42:41'),(252,1,'2023-11-20 11:57:09','2023-11-20 11:57:09'),(253,1,'2023-11-20 12:00:34','2023-11-20 12:00:34'),(254,39,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(255,38,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(256,1,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(257,34,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(258,35,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(259,36,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(260,37,'2023-11-20 12:02:18','2023-11-20 12:02:18'),(262,38,'2023-11-20 12:23:34','2023-11-20 12:23:34'),(263,1,'2023-11-20 12:23:34','2023-11-20 12:23:34'),(264,34,'2023-11-20 12:23:34','2023-11-20 12:23:34'),(265,35,'2023-11-20 12:23:34','2023-11-20 12:23:34'),(266,36,'2023-11-20 12:23:34','2023-11-20 12:23:34'),(267,37,'2023-11-20 12:23:34','2023-11-20 12:23:34'),(268,39,'2023-11-20 16:54:58','2023-11-20 16:54:58'),(269,1,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(270,34,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(271,35,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(272,36,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(273,37,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(274,38,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(275,39,'2023-11-20 17:00:40','2023-11-20 17:00:40'),(276,1,'2023-11-20 20:21:00','2023-11-20 20:21:00'),(277,1,'2023-11-20 20:24:10','2023-11-20 20:24:10'),(278,1,'2023-11-20 20:26:13','2023-11-20 20:26:13'),(279,1,'2023-11-20 20:27:05','2023-11-20 20:27:05'),(280,1,'2023-11-20 20:43:39','2023-11-20 20:43:39'),(281,1,'2023-11-20 20:45:03','2023-11-20 20:45:03'),(282,36,'2023-11-21 06:36:09','2023-11-21 06:36:09'),(283,36,'2023-11-21 07:03:32','2023-11-21 07:03:32'),(284,34,'2023-11-21 07:05:38','2023-11-21 07:05:38'),(285,34,'2023-11-21 07:06:44','2023-11-21 07:06:44'),(286,36,'2023-11-21 07:24:55','2023-11-21 07:24:55'),(287,37,'2023-11-21 07:29:18','2023-11-21 07:29:18'),(288,35,'2023-11-21 07:45:10','2023-11-21 07:45:10'),(289,35,'2023-11-21 07:46:18','2023-11-21 07:46:18'),(290,35,'2023-11-21 07:47:00','2023-11-21 07:47:00'),(291,35,'2023-11-21 07:51:06','2023-11-21 07:51:06'),(292,35,'2023-11-21 07:56:11','2023-11-21 07:56:11'),(293,35,'2023-11-21 07:56:33','2023-11-21 07:56:33'),(294,35,'2023-11-21 08:09:44','2023-11-21 08:09:44'),(295,35,'2023-11-21 08:13:07','2023-11-21 08:13:07'),(296,35,'2023-11-21 08:15:54','2023-11-21 08:15:54'),(297,35,'2023-11-21 08:18:21','2023-11-21 08:18:21'),(298,35,'2023-11-21 08:19:12','2023-11-21 08:19:12'),(299,35,'2023-11-21 08:19:34','2023-11-21 08:19:34'),(300,35,'2023-11-21 08:20:42','2023-11-21 08:20:42'),(301,35,'2023-11-21 08:20:49','2023-11-21 08:20:49'),(302,35,'2023-11-21 08:21:06','2023-11-21 08:21:06'),(303,35,'2023-11-21 08:22:00','2023-11-21 08:22:00'),(304,35,'2023-11-21 08:24:07','2023-11-21 08:24:07'),(305,35,'2023-11-21 08:26:30','2023-11-21 08:26:30'),(306,36,'2023-11-21 08:28:53','2023-11-21 08:28:53'),(307,36,'2023-11-21 08:29:03','2023-11-21 08:29:03'),(308,34,'2023-11-21 09:48:01','2023-11-21 09:48:01'),(309,1,'2023-11-21 12:52:01','2023-11-21 12:52:01'),(310,1,'2023-11-21 13:01:28','2023-11-21 13:01:28'),(311,1,'2023-11-21 13:03:31','2023-11-21 13:03:31'),(312,36,'2023-11-21 13:45:59','2023-11-21 13:45:59'),(313,1,'2023-11-21 13:48:10','2023-11-21 13:48:10'),(314,36,'2023-11-21 13:48:21','2023-11-21 13:48:21'),(315,36,'2023-11-21 13:50:13','2023-11-21 13:50:13'),(316,36,'2023-11-21 13:59:10','2023-11-21 13:59:10'),(317,36,'2023-11-21 14:01:02','2023-11-21 14:01:02'),(318,36,'2023-11-21 14:03:33','2023-11-21 14:03:33'),(319,36,'2023-11-21 14:03:33','2023-11-21 14:03:33'),(320,36,'2023-11-21 14:03:41','2023-11-21 14:03:41'),(321,36,'2023-11-21 14:05:08','2023-11-21 14:05:08'),(322,36,'2023-11-21 14:05:26','2023-11-21 14:05:26'),(323,36,'2023-11-21 17:21:54','2023-11-21 17:21:54'),(324,1,'2023-11-22 06:40:24','2023-11-22 06:40:24'),(325,1,'2023-11-22 06:42:24','2023-11-22 06:42:24'),(326,36,'2023-11-22 07:17:11','2023-11-22 07:17:11'),(327,1,'2023-11-22 07:17:45','2023-11-22 07:17:45'),(328,45,'2023-11-22 07:50:57','2023-11-22 07:50:57'),(329,36,'2023-11-22 07:57:59','2023-11-22 07:57:59'),(330,39,'2023-11-22 18:19:32','2023-11-22 18:19:32'),(331,1,'2023-11-22 18:23:11','2023-11-22 18:23:11'),(332,14,'2023-11-22 19:48:57','2023-11-22 19:48:57'),(333,69,'2023-11-22 19:56:43','2023-11-22 19:56:43'),(334,69,'2023-11-27 17:55:47','2023-11-27 17:55:47'),(339,39,'2023-11-27 19:01:32','2023-11-27 19:01:32'),(340,1,'2023-11-27 19:27:30','2023-11-27 19:27:30'),(341,34,'2023-11-27 19:27:30','2023-11-27 19:27:30'),(342,35,'2023-11-27 19:27:30','2023-11-27 19:27:30'),(343,36,'2023-11-27 19:27:30','2023-11-27 19:27:30'),(344,37,'2023-11-27 19:27:31','2023-11-27 19:27:31'),(345,38,'2023-11-27 19:27:31','2023-11-27 19:27:31'),(346,39,'2023-11-27 19:27:31','2023-11-27 19:27:31'),(347,41,'2023-11-27 19:27:31','2023-11-27 19:27:31'),(348,44,'2023-11-27 19:27:31','2023-11-27 19:27:31'),(349,68,'2023-11-27 19:27:31','2023-11-27 19:27:31'),(350,69,'2023-11-27 19:27:31','2023-11-27 19:27:31');
/*!40000 ALTER TABLE `user_reposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_test_answers`
--

DROP TABLE IF EXISTS `user_test_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_test_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_test_id` bigint(20) unsigned NOT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `competetion_id` bigint(20) unsigned NOT NULL,
  `is_true` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_test_answers_user_test_id_foreign` (`user_test_id`),
  KEY `user_test_answers_question_id_foreign` (`question_id`),
  KEY `user_test_answers_competetion_id_foreign` (`competetion_id`),
  CONSTRAINT `user_test_answers_competetion_id_foreign` FOREIGN KEY (`competetion_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_test_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `test_questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_test_answers_user_test_id_foreign` FOREIGN KEY (`user_test_id`) REFERENCES `user_tests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_test_answers`
--

LOCK TABLES `user_test_answers` WRITE;
/*!40000 ALTER TABLE `user_test_answers` DISABLE KEYS */;
INSERT INTO `user_test_answers` VALUES (41,21,51,147,0,'2023-11-21 12:57:58','2023-11-21 12:57:58'),(42,21,52,147,1,'2023-11-21 12:57:59','2023-11-21 12:57:59'),(43,21,53,147,0,'2023-11-21 12:58:01','2023-11-21 12:58:01'),(44,21,54,147,0,'2023-11-21 12:58:03','2023-11-21 12:58:03'),(45,21,55,147,0,'2023-11-21 12:58:04','2023-11-21 12:58:04'),(46,22,76,147,1,'2023-11-21 12:58:07','2023-11-21 12:58:07'),(47,22,77,147,0,'2023-11-21 12:58:09','2023-11-21 12:58:09'),(48,22,78,147,0,'2023-11-21 12:58:12','2023-11-21 12:58:12'),(49,22,79,147,0,'2023-11-21 12:58:15','2023-11-21 12:58:15'),(50,22,80,147,1,'2023-11-21 12:58:18','2023-11-21 12:58:18'),(51,23,16,146,1,'2023-11-21 12:58:38','2023-11-21 12:58:38'),(52,23,17,146,1,'2023-11-21 12:58:41','2023-11-21 12:58:41'),(53,23,18,146,0,'2023-11-21 12:58:42','2023-11-21 12:58:42'),(54,23,19,146,0,'2023-11-21 12:58:45','2023-11-21 12:58:45'),(55,23,20,146,1,'2023-11-21 12:58:46','2023-11-21 12:58:46'),(56,24,41,146,0,'2023-11-21 12:58:49','2023-11-21 12:58:49'),(57,24,42,146,0,'2023-11-21 12:58:50','2023-11-21 12:58:50'),(58,24,43,146,0,'2023-11-21 12:58:51','2023-11-21 12:58:51'),(59,24,44,146,0,'2023-11-21 12:58:53','2023-11-21 12:58:53'),(60,24,45,146,0,'2023-11-21 12:58:55','2023-11-21 12:58:55'),(61,23,16,146,1,'2023-11-21 13:03:00','2023-11-21 13:03:00'),(62,23,17,146,0,'2023-11-21 13:03:02','2023-11-21 13:03:02'),(63,23,18,146,0,'2023-11-21 13:03:05','2023-11-21 13:03:05'),(64,23,19,146,0,'2023-11-21 13:03:06','2023-11-21 13:03:06'),(65,23,20,146,0,'2023-11-21 13:03:08','2023-11-21 13:03:08'),(66,24,41,146,0,'2023-11-21 13:03:11','2023-11-21 13:03:11'),(67,24,42,146,0,'2023-11-21 13:03:12','2023-11-21 13:03:12'),(68,24,43,146,0,'2023-11-21 13:03:13','2023-11-21 13:03:13'),(69,24,44,146,0,'2023-11-21 13:03:16','2023-11-21 13:03:16'),(70,24,45,146,0,'2023-11-21 13:03:18','2023-11-21 13:03:18'),(71,25,51,147,0,'2023-11-21 13:36:14','2023-11-21 13:36:14'),(72,25,52,147,1,'2023-11-21 13:36:45','2023-11-21 13:36:45'),(73,25,53,147,0,'2023-11-21 13:36:46','2023-11-21 13:36:46'),(74,25,54,147,1,'2023-11-21 13:36:48','2023-11-21 13:36:48'),(75,25,55,147,0,'2023-11-21 13:36:49','2023-11-21 13:36:49'),(76,25,51,147,0,'2023-11-21 13:37:47','2023-11-21 13:37:47'),(77,25,52,147,1,'2023-11-21 13:38:08','2023-11-21 13:38:08'),(78,25,53,147,0,'2023-11-21 13:38:20','2023-11-21 13:38:20'),(79,25,54,147,1,'2023-11-21 13:38:33','2023-11-21 13:38:33'),(80,25,55,147,0,'2023-11-21 13:38:52','2023-11-21 13:38:52'),(81,26,76,147,1,'2023-11-21 13:39:12','2023-11-21 13:39:12'),(82,26,77,147,1,'2023-11-21 13:39:26','2023-11-21 13:39:26'),(83,26,78,147,1,'2023-11-21 13:39:37','2023-11-21 13:39:37'),(84,26,79,147,0,'2023-11-21 13:39:46','2023-11-21 13:39:46'),(85,26,80,147,1,'2023-11-21 13:40:00','2023-11-21 13:40:00'),(86,27,6,146,1,'2023-11-21 13:40:44','2023-11-21 13:40:44'),(87,27,7,146,0,'2023-11-21 13:40:53','2023-11-21 13:40:53'),(88,27,8,146,1,'2023-11-21 13:41:05','2023-11-21 13:41:05'),(89,27,9,146,0,'2023-11-21 13:43:10','2023-11-21 13:43:10'),(90,27,10,146,0,'2023-11-21 13:43:27','2023-11-21 13:43:27'),(91,28,31,146,0,'2023-11-21 13:44:05','2023-11-21 13:44:05'),(92,28,32,146,0,'2023-11-21 13:44:17','2023-11-21 13:44:17'),(93,28,33,146,0,'2023-11-21 13:44:32','2023-11-21 13:44:32'),(94,28,34,146,1,'2023-11-21 13:44:42','2023-11-21 13:44:42'),(95,28,35,146,1,'2023-11-21 13:44:53','2023-11-21 13:44:53'),(96,25,51,147,1,'2023-11-21 16:52:00','2023-11-21 16:52:00'),(97,25,52,147,1,'2023-11-21 16:52:19','2023-11-21 16:52:19'),(98,25,53,147,1,'2023-11-21 16:52:28','2023-11-21 16:52:28'),(99,25,54,147,1,'2023-11-21 16:52:35','2023-11-21 16:52:35'),(100,25,55,147,1,'2023-11-21 16:52:40','2023-11-21 16:52:40'),(101,26,76,147,1,'2023-11-21 16:53:09','2023-11-21 16:53:09'),(102,26,77,147,1,'2023-11-21 16:53:17','2023-11-21 16:53:17'),(103,26,78,147,1,'2023-11-21 16:53:27','2023-11-21 16:53:27'),(104,26,79,147,1,'2023-11-21 16:53:40','2023-11-21 16:53:40'),(105,26,80,147,1,'2023-11-21 16:53:48','2023-11-21 16:53:48'),(106,27,6,146,1,'2023-11-21 16:57:05','2023-11-21 16:57:05'),(107,27,7,146,1,'2023-11-21 16:57:11','2023-11-21 16:57:11'),(108,27,8,146,1,'2023-11-21 16:57:31','2023-11-21 16:57:31'),(109,27,9,146,1,'2023-11-21 16:57:40','2023-11-21 16:57:40'),(110,27,10,146,1,'2023-11-21 16:57:50','2023-11-21 16:57:50'),(111,28,31,146,1,'2023-11-21 16:58:05','2023-11-21 16:58:05'),(112,28,32,146,1,'2023-11-21 16:58:10','2023-11-21 16:58:10'),(113,28,33,146,1,'2023-11-21 16:58:18','2023-11-21 16:58:18'),(114,28,34,146,1,'2023-11-21 16:58:26','2023-11-21 16:58:26'),(115,28,35,146,1,'2023-11-21 16:58:33','2023-11-21 16:58:33'),(116,23,16,146,1,'2023-11-21 21:09:53','2023-11-21 21:09:53'),(117,23,17,146,1,'2023-11-21 21:09:55','2023-11-21 21:09:55'),(118,23,18,146,0,'2023-11-21 21:09:58','2023-11-21 21:09:58'),(119,23,19,146,1,'2023-11-21 21:10:00','2023-11-21 21:10:00'),(120,23,20,146,0,'2023-11-21 21:10:02','2023-11-21 21:10:02'),(121,24,41,146,0,'2023-11-21 21:10:05','2023-11-21 21:10:05'),(122,24,42,146,1,'2023-11-21 21:10:07','2023-11-21 21:10:07'),(123,24,43,146,0,'2023-11-21 21:10:08','2023-11-21 21:10:08'),(124,24,44,146,0,'2023-11-21 21:10:11','2023-11-21 21:10:11'),(125,24,45,146,0,'2023-11-21 21:10:14','2023-11-21 21:10:14'),(126,21,51,147,0,'2023-11-22 07:05:55','2023-11-22 07:05:55'),(127,21,52,147,1,'2023-11-22 07:05:57','2023-11-22 07:05:57'),(128,21,53,147,0,'2023-11-22 07:05:59','2023-11-22 07:05:59'),(129,21,54,147,0,'2023-11-22 07:06:01','2023-11-22 07:06:01'),(130,21,55,147,0,'2023-11-22 07:06:03','2023-11-22 07:06:03'),(131,22,76,147,0,'2023-11-22 07:06:07','2023-11-22 07:06:07'),(132,22,77,147,0,'2023-11-22 07:06:11','2023-11-22 07:06:11'),(133,22,78,147,0,'2023-11-22 07:06:13','2023-11-22 07:06:13'),(134,22,79,147,0,'2023-11-22 07:06:14','2023-11-22 07:06:14'),(135,22,80,147,1,'2023-11-22 07:06:16','2023-11-22 07:06:16');
/*!40000 ALTER TABLE `user_test_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tests`
--

DROP TABLE IF EXISTS `user_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `test_id` bigint(20) unsigned NOT NULL,
  `competetion_id` int(20) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `points` double(8,2) NOT NULL DEFAULT '0.00',
  `performance` double(8,2) NOT NULL DEFAULT '0.00',
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_tests_user_id_foreign` (`user_id`),
  KEY `user_tests_test_id_foreign` (`test_id`),
  CONSTRAINT `user_tests_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tests`
--

LOCK TABLES `user_tests` WRITE;
/*!40000 ALTER TABLE `user_tests` DISABLE KEYS */;
INSERT INTO `user_tests` VALUES (21,1,289,1,12,147,5,1.00,14.00,'Вы получили ВЫСОКИЕ результаты по данной компетенции',2,'2023-11-21 12:57:46','2023-11-22 07:06:03'),(22,1,289,1,17,147,5,2.50,35.00,'Вы получили ВЫСОКИЕ результаты по данной компетенции',2,'2023-11-21 12:57:46','2023-11-22 07:06:16'),(23,1,289,4,5,146,5,3.50,50.00,'Вы СООТВЕТСТВУЕТЕ данной компетенции',3,'2023-11-21 12:57:46','2023-11-21 21:10:02'),(24,1,289,4,10,146,5,1.00,14.00,'Компетенция НЕДОСТАТОЧНО выражена. Рекомендуем сделать акцент на ее развитии',3,'2023-11-21 12:57:46','2023-11-21 21:10:15'),(25,36,291,1,12,147,5,7.50,100.00,'Вы получили ВЫСОКИЕ результаты по данной компетенции',3,'2023-11-21 13:35:58','2023-11-21 16:52:40'),(26,36,291,1,17,147,5,7.50,100.00,'Вы получили ВЫСОКИЕ результаты по данной компетенции',2,'2023-11-21 13:35:58','2023-11-21 16:53:48'),(27,36,291,2,3,146,5,7.50,100.00,'Вы получили ВЫСОКИЕ результаты по данной компетенции',2,'2023-11-21 13:35:58','2023-11-21 16:57:50'),(28,36,291,2,8,146,5,7.50,100.00,'Вы получили ВЫСОКИЕ результаты по данной компетенции',2,'2023-11-21 13:35:58','2023-11-21 16:58:33'),(64,34,289,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(65,34,289,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(66,35,290,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(67,35,290,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(68,38,290,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(69,38,290,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(70,41,289,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(71,41,289,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(72,44,289,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(73,44,289,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(74,58,289,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(75,58,289,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(76,39,292,1,12,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(77,39,292,1,17,147,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(80,34,289,4,5,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(81,34,289,4,10,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(82,35,290,3,4,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(83,35,290,3,9,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(84,38,290,3,4,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(85,38,290,3,9,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(86,41,289,4,5,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(87,41,289,4,10,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(88,44,289,4,5,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(89,44,289,4,10,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(90,58,289,4,5,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(91,58,289,4,10,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(92,39,292,1,2,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(93,39,292,1,7,146,0,0.00,0.00,NULL,1,'2023-11-22 10:43:14','2023-11-22 10:43:14'),(102,39,292,1,22,146,0,0.00,0.00,NULL,1,'2023-11-27 18:29:03','2023-11-27 18:29:03'),(103,39,292,1,23,146,0,0.00,0.00,NULL,1,'2023-11-27 18:29:03','2023-11-27 18:29:03'),(104,37,292,1,22,146,0,0.00,0.00,NULL,1,'2023-11-27 18:56:38','2023-11-27 18:56:38'),(105,37,292,1,23,146,0,0.00,0.00,NULL,1,'2023-11-27 18:56:38','2023-11-27 18:56:38');
/*!40000 ALTER TABLE `user_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `position_id` bigint(20) unsigned NOT NULL,
  `admin_user_id` bigint(20) unsigned DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'menua777menua@gmail.com','Егор','Давыдов','Елисеевич','Мурманск',NULL,'3',289,36,'https://ui-avatars.com/api/?name=ЕД&background=104772&color=fff&size=50',NULL,'$2y$10$KbnFQPe2vL.Z96B4QURNRu3weK1Q1F5E/lN46Fv9nDhMpqGHvBvju',NULL,'2023-08-27 09:17:56','2023-11-17 09:54:34'),(14,'tech@smtk.com','Техническая поддержка','','','Самара',NULL,'3',259,1,'https://ui-avatars.com/api/?name=ТП&background=104772&color=fff&size=50',NULL,'$2y$10$2Z/bs7JAIyIE/GAo2rGA8.e8qbmlZIzr0aiGk96Otg2c3IrdG4I/C',NULL,'2023-09-01 14:36:10','2023-11-23 05:53:26'),(15,'help@smtk.com','Вопросы по обучению','','','Самара',NULL,'3',259,1,'https://ui-avatars.com/api/?name=ВО&background=104772&color=fff&size=50',NULL,'$2y$10$KR7OA4cWQMvfHdUvxjvplOHuJ2ANHf/ZWkhyc4T203rsaRsOjboKe',NULL,'2023-09-01 14:36:50','2023-10-01 15:29:40'),(34,'samogina.an@gazprom-shelfproject.ru','Алина','Самогина','Николаевна','(Санкт-Петербург_КПП 784045001_Б. Морская 24)',NULL,'3',289,34,'https://ui-avatars.com/api/?name=АС&background=104772&color=fff&size=50',NULL,'$2y$10$KbnFQPe2vL.Z96B4QURNRu3weK1Q1F5E/lN46Fv9nDhMpqGHvBvju',NULL,NULL,'2023-11-21 13:44:15'),(35,'vericheva.aa@gazprom-shelfproject.ru','Алла','Веричева','Александровна','(Санкт-Петербург_КПП 784045001_Б. Морская 24)',NULL,'2',290,34,'https://ui-avatars.com/api/?name=АВ&background=104772&color=fff&size=50',NULL,'$2y$10$KbnFQPe2vL.Z96B4QURNRu3weK1Q1F5E/lN46Fv9nDhMpqGHvBvju',NULL,NULL,'2023-11-21 13:54:27'),(36,'vobolis.mi@gazprom-shelfproject.ru','Марина\r\n','Воболис','Ивановна','(Санкт-Петербург_КПП 784045001_Б. Морская 24)',NULL,'4',291,34,'https://ui-avatars.com/api/?name=МВ&background=104772&color=fff&size=50',NULL,'$2y$10$KbnFQPe2vL.Z96B4QURNRu3weK1Q1F5E/lN46Fv9nDhMpqGHvBvju',NULL,NULL,'2023-11-21 17:33:55'),(37,'kurinnoy.si@gazprom-shelfproject.ru','Станислав','Куринной','Иванович','(Мурманск)',NULL,'2',292,34,'https://ui-avatars.com/api/?name=СК&background=104772&color=fff&size=50',NULL,'$2y$10$If9WgsEdVKdA5cmh0AwMk.wNlWJzV7KqAa9EGaZd3OI/cHrvw5QcS',NULL,NULL,'2023-11-22 10:15:17'),(38,'filatov@gmail.com','Олег','Филатов','Анатольевич','Мурманск',NULL,'4',290,1,'https://ui-avatars.com/api/?name=ОФ&background=104772&color=fff&size=50',NULL,'$2y$10$HpCr6QrtQL/i9xxb27.Xg.62iBo/1p78rSXH00LmFLniohv2xtwg6',NULL,'2023-11-14 16:08:47','2023-11-21 17:36:01'),(39,'bilyashkina@yandex.ru','Анастасия','Попова','Леонидовна','Мурманск',NULL,'1',292,1,'https://ui-avatars.com/api/?name=АП&background=104772&color=fff&size=50',NULL,'$2y$10$5HzgWtHem2ewiv7QQm/muOBWlRPeAAWjtKAKNtOCQBU/DWaT2q58G',NULL,'2023-11-16 16:33:16','2023-11-16 16:33:16'),(41,'testovich@test.ru','Иван','Иванов','Иванович','Санкт-Петербург',NULL,'1',289,1,'https://ui-avatars.com/api/?name=ИИ&background=104772&color=fff&size=50',NULL,'$2y$10$X6yC02ToA4PJu1.RbI88wO3Q2uvgEFvUt4dgQzhsowUuZm5ZCNnGu',NULL,'2023-11-21 13:44:15','2023-11-27 19:55:28'),(44,'petr@theded.ru','Петр','Петров','Петрович','Санкт-Петербург',NULL,'1',289,1,'https://ui-avatars.com/api/?name=ПП&background=104772&color=fff&size=50',NULL,'$2y$10$meEd.zqpIDE7DoRJSqizE.hcilfNpDodzheiqgdADeFIvrMzniZmq',NULL,'2023-11-22 07:15:47','2023-11-22 07:15:49'),(68,'ivan@theded.ru\n','Иван','Иванов','Петрович','Санкт-Петербург',NULL,'1',289,36,'https://ui-avatars.com/api/?name=ИИ&background=104772&color=fff&size=50',NULL,'$2y$10$M9bYYDh0Of5dJzuuT9.KR.q6s5CDNOgTXFNvgxTmh.x9/MmKjoQMO',NULL,'2023-11-22 11:27:40','2023-11-22 11:29:43'),(69,'afanasii@theded.ru','Афанасий','Киреев','Игоревич','Санкт-Петербург',NULL,'1',295,1,'https://ui-avatars.com/api/?name=АК&background=104772&color=fff&size=50',NULL,'$2y$10$vVADmOWKINrp3ACkgYqfwuDWvc5x5V6lpqzqxYs05KjcDJ5CLKJhe',NULL,'2023-11-22 18:56:54','2023-11-27 17:55:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07  9:27:20
