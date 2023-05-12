-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: DATN
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `confirm` enum('No','Yes') NOT NULL DEFAULT 'No',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','Đức 99','admin',0,'0355913199','admin@gmail.com','$2y$10$ZZlTg0OH6NiYct8pgCCbdONAflVJfEIhE.ue83jA1qOzyx.kKQ8vq','36478.jpeg','No',1,NULL,'2023-04-16 00:20:36'),(2,'Test','Vendor','vendor',1,'0822520299','test@gmail.com','$2y$10$ZZlTg0OH6NiYct8pgCCbdONAflVJfEIhE.ue83jA1qOzyx.kKQ8vq','1101.jpeg','Yes',1,NULL,'2023-02-25 06:25:12'),(3,'Đức','Nguyễn','vendor',3,'0123456784','nguyen@gmail.com','$2y$10$BPckKfgdKTu8eVeMkNVKFePxiDQ/tqhciTQxOdaYxAvLzXevEAYT6',NULL,'No',1,'2023-03-12 08:34:56','2023-03-19 03:54:07'),(4,'lam','Nguyen','vendor',4,'0123456766','hoang@gmail.com','$2y$10$xzzYSwIQ/B1X00MWjyr3seCfZDtTwoDc.2DATkvFXQNSdOX2lwFQS','1909.png','Yes',1,'2023-03-12 08:35:50','2023-04-09 01:54:30'),(5,'Đức','Hoan','vendor',5,'01234567645','hoan@gmail.com','$2y$10$MBTm6Wol8SRJJPXGN9udTe.wNsaQHls5kqqURC4ki5rdEdphdkqHa',NULL,'Yes',1,'2023-03-12 08:38:11','2023-03-12 08:38:11'),(6,'hoang','Hoan','vendor',6,'0123456712','hoan1@gmail.com','$2y$10$aGQq.FoWYBWE/bxXbAIFIupHcYmwDTcC8S9Y8m1o77bIuBTITucz2',NULL,'No',1,'2023-03-12 08:40:32','2023-04-08 07:13:17'),(7,'thu','nghiem','vendor',7,'0123765436','thunghiem@gmail.com','$2y$10$12BEPoeMnBlm9jMePfE6u.T1PwYi7i2i1HsADbUMw7g27HpvumjTC',NULL,'No',0,'2023-03-12 08:41:29','2023-03-19 04:13:29'),(8,'nam','test123','vendor',8,'0123456765','test123@gmail.com','$2y$10$qBZ05gIvpZv10sjCyP6h3eTrJiAK4SV9DStnnyHh98VGfR.zTzPD2',NULL,'No',0,'2023-03-12 08:43:30','2023-03-12 08:43:30'),(9,'test','lan cuoi','vendor',0,'0989873746','lancuoi@gmail.com','$2y$10$HCLf9PWHLxwl5bDV..uUYOVBWm4.ZwMbyE2Pzw2UiRruVnBUZej.2',NULL,'No',1,'2023-03-12 14:18:25','2023-03-15 08:11:47'),(10,'test','cuoi','vendor',0,'0999878765','cuoi@gmail.com','$2y$10$ynk5KhPCQIZYjjl4YwJ3l.RD4fFmS1Nv7r4/pKDs89UDjM1FG5zrK',NULL,'No',1,'2023-03-12 14:19:26','2023-03-15 08:13:53'),(11,'cuoi','nha','vendor',0,'0999222883','cuoinha@gmail.com','$2y$10$kutd2ra0sAm9NPfrOs942On0ivsfddArF3Fzz48GMIfitl.PsgQ2W',NULL,'No',0,'2023-03-12 14:21:18','2023-03-12 14:21:18'),(12,'lam','le','vendor',0,'0123456783','code@gmail.com','$2y$10$2WNVeO8TxXWTq12TOBws1.nhow1jetvBhLVzd1n2km6MvtpvAd8EG',NULL,'No',1,'2023-03-15 01:26:34','2023-03-15 08:13:59'),(13,'khong','hieu','vendor',0,'0236545263','khonghieu@gmail.com','$2y$10$imcI4Z6HHUvTS75MHYyTret3OgSi8UI6U14xh/6iHhf56zs0KCd.m',NULL,'No',1,'2023-03-15 01:29:03','2023-03-15 08:11:33'),(14,'hoang','test123','vendor',14,'0123456763','hoangtest1@gmail.com','$2y$10$Zax11TOEIZL/fe0hh/yqeeNshVneLOSO2jcm/jBtTabW.1EFttyfi','22055.png','Yes',1,'2023-03-15 01:34:06','2023-03-18 22:17:22'),(15,'lam','12','vendor',0,'0989878789','lam12@gmail.com','$2y$10$KVKH2dQ90AvPA8p8wjyyiePs6MbCKDlMQ9VzJZeJKgXT/Txu6ypta',NULL,'No',0,'2023-03-25 10:10:12','2023-03-25 10:10:12'),(16,'Đức','12','vendor',0,'0989888777','duc12@gmail.com','$2y$10$DDB2SfZ9K7OOIRzvZ7Cy8uMFxfRgD3i22wosSy4OQXYbStuqgeDgy',NULL,'Yes',0,'2023-03-25 10:11:22','2023-03-25 04:41:32'),(17,'Đức','test123','vendor',0,'0989777889','ductest126@gmail.com','$2y$10$WrvDEALf7XukyA2GiwWFx.85K2JBkQbCGwMjWYGFHizrMr54F.9iy',NULL,'Yes',0,'2023-03-25 12:42:11','2023-03-25 07:19:20'),(20,'tét v','vendor','vendor',23,'0999888027','vendor1@gmail.com','$2y$10$FBNvZEMb83wzLcUVnY3QDO6aLwEnNkpH4vFY1FPoqFv5CT8M71JT6',NULL,'No',0,'2023-03-25 13:31:14','2023-03-25 13:31:14'),(21,'Test lan','1','vendor',24,'0129283746','testvendor@gmail.com','$2y$10$utc8RsR6cr7fWFkndB61XezuquA3ypDZEXjKg2Ht4YIOpVieMbxeS',NULL,'Yes',0,'2023-03-25 13:33:11','2023-03-25 08:03:38');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (3,'4790.png','Slider','Nam','Spring Collection','Spring Collection',1,NULL,'2023-04-17 21:10:04'),(4,'61319.png','Slider','laptop','Tops','Tops',1,NULL,'2023-04-28 02:19:28'),(5,'917.png','Fix','laptop','laptop','laptop',1,'2023-02-26 08:28:30','2023-04-28 02:16:37'),(6,'76460.jpg','Fix','tops11124','top11','top11DFFD',1,'2023-02-26 08:28:46','2023-03-26 18:48:22'),(8,'86832.webp','Slider','dienthoai','Điện Thoại',NULL,1,'2023-04-28 02:23:23','2023-04-28 02:28:05');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Arrow',1,NULL,NULL),(2,'Gap',1,NULL,NULL),(3,'Lee',1,NULL,NULL),(4,'Samsung',1,NULL,NULL),(5,'LG',1,NULL,NULL),(6,'Lenovo',1,NULL,NULL),(7,'MI',1,NULL,NULL),(9,'Apple',1,'2023-04-14 08:21:26','2023-04-14 08:21:26'),(10,'Dell',1,'2023-04-28 01:50:04','2023-04-28 01:50:04'),(11,'Hp',1,'2023-04-28 01:50:10','2023-04-28 01:50:10');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,'c79a11fd19e0061091fd3b5a043048d4',NULL,8,'Medium',1,'2023-03-19 03:14:32','2023-03-19 06:54:13'),(6,'c79a11fd19e0061091fd3b5a043048d4',0,12,'Small',3,'2023-03-19 05:45:01','2023-03-19 07:20:26'),(7,'39cd019b97839bef7a2828ff4fe5c662',13,8,'Small',1,'2023-03-25 06:48:52','2023-03-25 07:49:34'),(65,'8c5d195804e766a10fd88c961bdd58be',0,17,'Small',1,'2023-04-13 22:48:59','2023-04-13 22:48:59'),(81,'90dae25ad1f94523178b0b1c7904b705',21,19,'5 to 5.4 In 512GB',1,'2023-04-22 18:13:27','2023-04-22 18:13:27');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_discount` double(12,2) NOT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,0,1,'Nam','',0.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','Nam',NULL,NULL,NULL,1,NULL,'2023-04-08 02:58:16'),(2,0,1,'Nữ','',0.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','Nu',NULL,NULL,NULL,1,NULL,'2023-03-19 02:26:25'),(3,0,1,'Trẻ Em','',0.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','Kids',NULL,NULL,NULL,1,NULL,'2023-03-19 02:26:11'),(4,0,2,'Điện Thoại Di Động','',0.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','mobiles','mobiles','mobiles','mobiles',1,'2023-02-25 05:41:53','2023-04-14 07:14:04'),(5,4,2,'Điện Thoại','',0.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','smartphones','smartphones','smartphones','smartphones',1,'2023-02-25 05:42:34','2023-04-15 04:18:23'),(6,1,1,'Áo Phông','',10.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','tshirts','tshirts','tshirts','tshirts',1,'2023-02-25 05:45:18','2023-04-08 07:53:30'),(7,1,1,'Áo Sơ Mi','',10.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','shirts','shirts','shirts','shirts',1,'2023-02-25 05:47:28','2023-03-19 02:27:06'),(8,2,1,'Sơ Mi Nữ','',0.00,NULL,'tops',NULL,NULL,NULL,1,'2023-02-25 05:48:36','2023-04-15 04:27:33'),(9,2,1,'Áo Phông Nữ','',0.00,NULL,'denims',NULL,NULL,NULL,1,'2023-02-25 05:49:41','2023-04-15 04:27:49'),(11,0,3,'Laptop','',0.00,NULL,'laptop','laptop',NULL,NULL,1,'2023-02-26 03:47:58','2023-04-28 01:41:43'),(12,4,2,'Điện thoại androi','60070.jpg',0.00,NULL,'dienthoai',NULL,NULL,NULL,1,'2023-04-16 00:36:16','2023-04-16 00:36:16'),(13,0,2,'Apple','',0.00,NULL,'apple',NULL,NULL,NULL,1,'2023-04-28 01:43:50','2023-04-28 01:44:23'),(14,13,2,'Iphone','82840.png',0.00,NULL,'iphone',NULL,NULL,NULL,1,'2023-04-28 01:45:04','2023-04-28 01:45:04'),(15,11,3,'Dell','32102.png',0.00,NULL,'dell',NULL,NULL,NULL,1,'2023-04-28 01:46:50','2023-04-28 01:46:50'),(16,11,3,'HP','51004.png',0.00,NULL,'HP',NULL,NULL,NULL,1,'2023-04-28 01:48:32','2023-04-28 01:48:32');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan',1,NULL,NULL),(2,'AL','Albania',1,NULL,NULL),(3,'DZ','Algeria',1,NULL,NULL),(4,'DS','American Samoa',1,NULL,NULL),(5,'AD','Andorra',1,NULL,NULL),(6,'AO','Angola',1,NULL,NULL),(7,'AI','Anguilla',1,NULL,NULL),(8,'AQ','Antarctica',1,NULL,NULL),(9,'AG','Antigua and Barbuda',1,NULL,NULL),(10,'AR','Argentina',1,NULL,NULL),(11,'AM','Armenia',1,NULL,NULL),(12,'AW','Aruba',1,NULL,NULL),(13,'AU','Australia',1,NULL,NULL),(14,'AT','Austria',1,NULL,NULL),(15,'AZ','Azerbaijan',1,NULL,NULL),(16,'BS','Bahamas',1,NULL,NULL),(17,'BH','Bahrain',1,NULL,NULL),(18,'BD','Bangladesh',1,NULL,NULL),(19,'BB','Barbados',1,NULL,NULL),(20,'BY','Belarus',1,NULL,NULL),(21,'BE','Belgium',1,NULL,NULL),(22,'BZ','Belize',1,NULL,NULL),(23,'BJ','Benin',1,NULL,NULL),(24,'BM','Bermuda',1,NULL,NULL),(25,'BT','Bhutan',1,NULL,NULL),(26,'BA','Bosnia and Herzegovina',1,NULL,NULL),(27,'BO','Bolivia',1,NULL,NULL),(28,'BW','Botswana',1,NULL,NULL),(29,'BV','Bouvet Island',1,NULL,NULL),(30,'BR','Brazil',1,NULL,NULL),(31,'IO','British Indian Ocean Territory',1,NULL,NULL),(32,'BN','Brunei Darussalam',1,NULL,NULL),(33,'BG','Bulgaria',1,NULL,NULL),(34,'BF','Burkina Faso',1,NULL,NULL),(35,'BI','Burundi',1,NULL,NULL),(36,'KH','Cambodia',1,NULL,NULL),(37,'CM','Cameroon',1,NULL,NULL),(38,'CA','Canada',1,NULL,NULL),(39,'CV','Cape Verde',1,NULL,NULL),(40,'KY','Cayman Islands',1,NULL,NULL),(41,'CF','Central African Republic',1,NULL,NULL),(42,'TD','Chad',1,NULL,NULL),(43,'CL','Chile',1,NULL,NULL),(44,'CN','China',1,NULL,NULL),(45,'CX','Christmas Island',1,NULL,NULL),(46,'CC','Cocos (Keeling) Islands',1,NULL,NULL),(47,'CO','Colombia',1,NULL,NULL),(48,'KM','Comoros',1,NULL,NULL),(49,'CD','Democratic Republic of the Congo',1,NULL,NULL),(50,'CG','Republic of Congo',1,NULL,NULL),(51,'CK','Cook Islands',1,NULL,NULL),(52,'CR','Costa Rica',1,NULL,NULL),(53,'HR','Croatia (Hrvatska)',1,NULL,NULL),(54,'CU','Cuba',1,NULL,NULL),(55,'CY','Cyprus',1,NULL,NULL),(56,'CZ','Czech Republic',1,NULL,NULL),(57,'DK','Denmark',1,NULL,NULL),(58,'DJ','Djibouti',1,NULL,NULL),(59,'DM','Dominica',1,NULL,NULL),(60,'DO','Dominican Republic',1,NULL,NULL),(61,'TP','East Timor',1,NULL,NULL),(62,'EC','Ecuador',1,NULL,NULL),(63,'EG','Egypt',1,NULL,NULL),(64,'SV','El Salvador',1,NULL,NULL),(65,'GQ','Equatorial Guinea',1,NULL,NULL),(66,'ER','Eritrea',1,NULL,NULL),(67,'EE','Estonia',1,NULL,NULL),(68,'ET','Ethiopia',1,NULL,NULL),(69,'FK','Falkland Islands (Malvinas)',1,NULL,NULL),(70,'FO','Faroe Islands',1,NULL,NULL),(71,'FJ','Fiji',1,NULL,NULL),(72,'FR','France',1,NULL,NULL),(73,'FX','France, Metropolitan',1,NULL,NULL),(74,'GF','French Guiana',1,NULL,NULL),(75,'PF','French Polynesia',1,NULL,NULL),(76,'TF','French Southern Territories',1,NULL,NULL),(77,'GA','Gabon',1,NULL,NULL),(78,'GM','Gambia',1,NULL,NULL),(79,'GE','Georgia',1,NULL,NULL),(80,'DE','Germany',1,NULL,NULL),(81,'GH','Ghana',1,NULL,NULL),(82,'GI','Gibraltar',1,NULL,NULL),(83,'GK','Guernsey',1,NULL,NULL),(84,'GR','Greece',1,NULL,NULL),(85,'GL','Greenland',1,NULL,NULL),(86,'GD','Grenada',1,NULL,NULL),(87,'GP','Guadeloupe',1,NULL,NULL),(88,'GU','Guam',1,NULL,NULL),(89,'GT','Guatemala',1,NULL,NULL),(90,'GN','Guinea',1,NULL,NULL),(91,'GW','Guinea-Bissau',1,NULL,NULL),(92,'GY','Guyana',1,NULL,NULL),(93,'HT','Haiti',1,NULL,NULL),(94,'HM','Heard and Mc Donald Islands',1,NULL,NULL),(95,'HN','Honduras',1,NULL,NULL),(96,'HK','Hong Kong',1,NULL,NULL),(97,'HU','Hungary',1,NULL,NULL),(98,'IS','Iceland',1,NULL,NULL),(99,'IN','India',1,NULL,NULL),(100,'IM','Isle of Man',1,NULL,NULL),(101,'ID','Indonesia',1,NULL,NULL),(102,'IR','Iran (Islamic Republic of)',1,NULL,NULL),(103,'IQ','Iraq',1,NULL,NULL),(104,'IE','Ireland',1,NULL,NULL),(105,'IL','Israel',1,NULL,NULL),(106,'IT','Italy',1,NULL,NULL),(107,'CI','Ivory Coast',1,NULL,NULL),(108,'JE','Jersey',1,NULL,NULL),(109,'JM','Jamaica',1,NULL,NULL),(110,'JP','Japan',1,NULL,NULL),(111,'JO','Jordan',1,NULL,NULL),(112,'KZ','Kazakhstan',1,NULL,NULL),(113,'KE','Kenya',1,NULL,NULL),(114,'KI','Kiribati',1,NULL,NULL),(115,'KP','Korea, Democratic People\'\'s Republic of',1,NULL,NULL),(116,'KR','Korea, Republic of',1,NULL,NULL),(117,'XK','Kosovo',1,NULL,NULL),(118,'KW','Kuwait',1,NULL,NULL),(119,'KG','Kyrgyzstan',1,NULL,NULL),(120,'LA','Lao People\'\'s Democratic Republic',1,NULL,NULL),(121,'LV','Latvia',1,NULL,NULL),(122,'LB','Lebanon',1,NULL,NULL),(123,'LS','Lesotho',1,NULL,NULL),(124,'LR','Liberia',1,NULL,NULL),(125,'LY','Libyan Arab Jamahiriya',1,NULL,NULL),(126,'LI','Liechtenstein',1,NULL,NULL),(127,'LT','Lithuania',1,NULL,NULL),(128,'LU','Luxembourg',1,NULL,NULL),(129,'MO','Macau',1,NULL,NULL),(130,'MK','North Macedonia',1,NULL,NULL),(131,'MG','Madagascar',1,NULL,NULL),(132,'MW','Malawi',1,NULL,NULL),(133,'MY','Malaysia',1,NULL,NULL),(134,'MV','Maldives',1,NULL,NULL),(135,'ML','Mali',1,NULL,NULL),(136,'MT','Malta',1,NULL,NULL),(137,'MH','Marshall Islands',1,NULL,NULL),(138,'MQ','Martinique',1,NULL,NULL),(139,'MR','Mauritania',1,NULL,NULL),(140,'MU','Mauritius',1,NULL,NULL),(141,'TY','Mayotte',1,NULL,NULL),(142,'MX','Mexico',1,NULL,NULL),(143,'FM','Micronesia, Federated States of',1,NULL,NULL),(144,'MD','Moldova, Republic of',1,NULL,NULL),(145,'MC','Monaco',1,NULL,NULL),(146,'MN','Mongolia',1,NULL,NULL),(147,'ME','Montenegro',1,NULL,NULL),(148,'MS','Montserrat',1,NULL,NULL),(149,'MA','Morocco',1,NULL,NULL),(150,'MZ','Mozambique',1,NULL,NULL),(151,'MM','Myanmar',1,NULL,NULL),(152,'NA','Namibia',1,NULL,NULL),(153,'NR','Nauru',1,NULL,NULL),(154,'NP','Nepal',1,NULL,NULL),(155,'NL','Netherlands',1,NULL,NULL),(156,'AN','Netherlands Antilles',1,NULL,NULL),(157,'NC','New Caledonia',1,NULL,NULL),(158,'NZ','New Zealand',1,NULL,NULL),(159,'NI','Nicaragua',1,NULL,NULL),(160,'NE','Niger',1,NULL,NULL),(161,'NG','Nigeria',1,NULL,NULL),(162,'NU','Niue',1,NULL,NULL),(163,'NF','Norfolk Island',1,NULL,NULL),(164,'MP','Northern Mariana Islands',1,NULL,NULL),(165,'NO','Norway',1,NULL,NULL),(166,'OM','Oman',1,NULL,NULL),(167,'PK','Pakistan',1,NULL,NULL),(168,'PW','Palau',1,NULL,NULL),(169,'PS','Palestine',1,NULL,NULL),(170,'PA','Panama',1,NULL,NULL),(171,'PG','Papua New Guinea',1,NULL,NULL),(172,'PY','Paraguay',1,NULL,NULL),(173,'PE','Peru',1,NULL,NULL),(174,'PH','Philippines',1,NULL,NULL),(175,'PN','Pitcairn',1,NULL,NULL),(176,'PL','Poland',1,NULL,NULL),(177,'PT','Portugal',1,NULL,NULL),(178,'PR','Puerto Rico',1,NULL,NULL),(179,'QA','Qatar',1,NULL,NULL),(180,'RE','Reunion',1,NULL,NULL),(181,'RO','Romania',1,NULL,NULL),(182,'RU','Russian Federation',1,NULL,NULL),(183,'RW','Rwanda',1,NULL,NULL),(184,'KN','Saint Kitts and Nevis',1,NULL,NULL),(185,'LC','Saint Lucia',1,NULL,NULL),(186,'VC','Saint Vincent and the Grenadines',1,NULL,NULL),(187,'WS','Samoa',1,NULL,NULL),(188,'SM','San Marino',1,NULL,NULL),(189,'ST','Sao Tome and Principe',1,NULL,NULL),(190,'SA','Saudi Arabia',1,NULL,NULL),(191,'SN','Senegal',1,NULL,NULL),(192,'RS','Serbia',1,NULL,NULL),(193,'SC','Seychelles',1,NULL,NULL),(194,'SL','Sierra Leone',1,NULL,NULL),(195,'SG','Singapore',1,NULL,NULL),(196,'SK','Slovakia',1,NULL,NULL),(197,'SI','Slovenia',1,NULL,NULL),(198,'SB','Solomon Islands',1,NULL,NULL),(199,'SO','Somalia',1,NULL,NULL),(200,'ZA','South Africa',1,NULL,NULL),(201,'GS','South Georgia South Sandwich Islands',1,NULL,NULL),(202,'SS','South Sudan',1,NULL,NULL),(203,'ES','Spain',1,NULL,NULL),(204,'LK','Sri Lanka',1,NULL,NULL),(205,'SH','St. Helena',1,NULL,NULL),(206,'PM','St. Pierre and Miquelon',1,NULL,NULL),(207,'SD','Sudan',1,NULL,NULL),(208,'SR','Suriname',1,NULL,NULL),(209,'SJ','Svalbard and Jan Mayen Islands',1,NULL,NULL),(210,'SZ','Eswatini',1,NULL,NULL),(211,'SE','Sweden',1,NULL,NULL),(212,'CH','Switzerland',1,NULL,NULL),(213,'SY','Syrian Arab Republic',1,NULL,NULL),(214,'TW','Taiwan',1,NULL,NULL),(215,'TJ','Tajikistan',1,NULL,NULL),(216,'TZ','Tanzania, United Republic of',1,NULL,NULL),(217,'TH','Thailand',1,NULL,NULL),(218,'TG','Togo',1,NULL,NULL),(219,'TK','Tokelau',1,NULL,NULL),(220,'TO','Tonga',1,NULL,NULL),(221,'TT','Trinidad and Tobago',1,NULL,NULL),(222,'TN','Tunisia',1,NULL,NULL),(223,'TR','Turkey',1,NULL,NULL),(224,'TM','Turkmenistan',1,NULL,NULL),(225,'TC','Turks and Caicos Islands',1,NULL,NULL),(226,'TV','Tuvalu',1,NULL,NULL),(227,'UG','Uganda',1,NULL,NULL),(228,'UA','Ukraine',1,NULL,NULL),(229,'AE','United Arab Emirates',1,NULL,NULL),(230,'GB','United Kingdom',1,NULL,NULL),(231,'US','United States',1,NULL,NULL),(232,'UM','United States minor outlying islands',1,NULL,NULL),(233,'UY','Uruguay',1,NULL,NULL),(234,'UZ','Uzbekistan',1,NULL,NULL),(235,'VU','Vanuatu',1,NULL,NULL),(236,'VA','Vatican City State',1,NULL,NULL),(237,'VE','Venezuela',1,NULL,NULL),(238,'VN','Vietnam',1,NULL,NULL),(239,'VG','Virgin Islands (British)',1,NULL,NULL),(240,'VI','Virgin Islands (U.S.)',1,NULL,NULL),(241,'WF','Wallis and Futuna Islands',1,NULL,NULL),(242,'EH','Western Sahara',1,NULL,NULL),(243,'YE','Yemen',1,NULL,NULL),(244,'ZM','Zambia',1,NULL,NULL),(245,'ZW','Zimbabwe',1,NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `coupon_option` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `categories` text NOT NULL,
  `brands` text NOT NULL,
  `users` text NOT NULL,
  `coupon_type` varchar(255) DEFAULT NULL,
  `amount_type` varchar(255) DEFAULT NULL,
  `amount` double(12,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,0,'Manual','test10','1','','','Single','Percentage',10.00,'2022-12-31',1,NULL,NULL),(2,0,'Manual','test20','1,6,7','1,2,3,4','test1292@gmail.com','Single Time','Percentage',20.00,'2023-03-30',1,NULL,'2023-03-30 07:32:11'),(3,0,'Automatic','VFSeURq2','1,6,7,4','1,3','test1999@gmail.com','Multiple Time','Percentage',10.00,'2023-04-28',1,'2023-03-26 07:30:15','2023-04-03 07:29:09'),(4,0,'Manual','test200','6,7,2,8','1,3','test1999@gmail.com','Single Time','Fixed',50000.00,'2023-08-27',1,'2023-03-26 07:31:32','2023-04-08 21:34:55');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_card` (
  `crd_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `expriation_date` varchar(255) DEFAULT NULL,
  `ccd` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`crd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_card`
--

LOCK TABLES `credit_card` WRITE;
/*!40000 ALTER TABLE `credit_card` DISABLE KEYS */;
INSERT INTO `credit_card` VALUES (2,'Lê văn Nam','12/24','123','1213 1212 1212 1212','2023-04-08 22:07:08','2023-04-08 22:07:08'),(6,'baaa','12/25','123','1234 4212 1213 1212','2023-04-08 22:09:21','2023-04-08 22:09:21'),(7,'Khóa Học A','12/25','123','1234 4121 4566 6432','2023-04-08 22:13:37','2023-04-08 22:13:37'),(8,'Khóa Học Ab','12/25','123','1234 1234 1234 1245','2023-04-08 22:17:12','2023-04-08 22:17:12'),(9,'Lê văn Nam','12/25','123','1234 4121 1245 1224','2023-04-08 22:23:30','2023-04-08 22:23:30'),(10,'nnguyễn anm','122','1212','1212','2023-04-08 22:25:31','2023-04-08 22:25:31'),(11,NULL,NULL,NULL,NULL,'2023-04-08 22:26:17','2023-04-08 22:26:17'),(12,'ab','ddss','cc','1231 12321','2023-04-08 22:28:48','2023-04-08 22:28:48'),(13,'ab','ddss','cc','1231 12321','2023-04-08 22:30:49','2023-04-08 22:30:49'),(14,'ab','ddss','cc','1231 12321','2023-04-08 22:31:28','2023-04-08 22:31:28'),(15,'ab','ddss','cc','1231 12321','2023-04-08 22:31:56','2023-04-08 22:31:56'),(16,'ABC','12','331','12','2023-04-08 22:32:27','2023-04-08 22:32:27'),(17,'Duc','10/25','156','1526 3625 2536 2523','2023-04-09 00:39:55','2023-04-09 00:39:55'),(18,NULL,NULL,NULL,NULL,'2023-04-09 00:42:32','2023-04-09 00:42:32'),(20,'abc','1212','1212','1234212121212','2023-04-09 07:28:12','2023-04-09 07:28:12'),(21,'abcâs','10/25','123','1222 3121 3321 1223','2023-04-11 23:27:16','2023-04-11 23:27:16'),(22,NULL,NULL,NULL,NULL,'2023-04-11 23:28:02','2023-04-11 23:28:02'),(23,'check','102','120','1243212121211','2023-04-15 07:34:37','2023-04-15 07:34:37'),(24,NULL,NULL,NULL,NULL,'2023-04-15 07:37:54','2023-04-15 07:37:54'),(25,'Lê văn Nam','121212','123','1231123212321222','2023-04-15 08:31:36','2023-04-15 08:31:36'),(26,NULL,NULL,NULL,NULL,'2023-04-16 06:38:03','2023-04-16 06:38:03'),(27,NULL,NULL,NULL,NULL,'2023-04-16 06:39:47','2023-04-16 06:39:47'),(28,NULL,NULL,NULL,NULL,'2023-04-16 07:01:35','2023-04-16 07:01:35'),(29,NULL,NULL,NULL,NULL,'2023-04-16 07:02:19','2023-04-16 07:02:19'),(30,NULL,NULL,NULL,NULL,'2023-04-16 07:04:14','2023-04-16 07:04:14'),(31,NULL,NULL,NULL,NULL,'2023-04-16 07:05:22','2023-04-16 07:05:22'),(32,NULL,NULL,NULL,NULL,'2023-04-16 07:06:16','2023-04-16 07:06:16'),(33,NULL,NULL,NULL,NULL,'2023-04-17 21:19:36','2023-04-17 21:19:36'),(38,NULL,NULL,NULL,NULL,'2023-04-17 21:24:57','2023-04-17 21:24:57'),(39,NULL,NULL,NULL,NULL,'2023-04-17 21:27:10','2023-04-17 21:27:10'),(40,'Khóa Học A','1225','123','122121212122123','2023-04-17 21:31:17','2023-04-17 21:31:17'),(41,NULL,NULL,NULL,NULL,'2023-04-17 21:49:38','2023-04-17 21:49:38'),(42,NULL,NULL,NULL,NULL,'2023-04-17 22:06:00','2023-04-17 22:06:00'),(43,'Nguyễn văn nam','1025','123','1235563525362523','2023-04-22 18:14:14','2023-04-22 18:14:14'),(44,'duc bui','1211','123','121221212121212','2023-04-28 03:19:10','2023-04-28 03:19:10'),(45,'duc bui','1212','121','121231212121212','2023-04-28 03:20:27','2023-04-28 03:20:27'),(46,NULL,NULL,NULL,NULL,'2023-05-03 08:01:08','2023-05-03 08:01:08'),(47,NULL,NULL,NULL,NULL,'2023-05-03 08:50:34','2023-05-03 08:50:34'),(48,NULL,NULL,NULL,NULL,'2023-05-04 01:30:03','2023-05-04 01:30:03');
/*!40000 ALTER TABLE `credit_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_address`
--

DROP TABLE IF EXISTS `delivery_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_address` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_address`
--

LOCK TABLES `delivery_address` WRITE;
/*!40000 ALTER TABLE `delivery_address` DISABLE KEYS */;
INSERT INTO `delivery_address` VALUES (1,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012',1,NULL,NULL),(2,18,'12Duc','Nam Dan12','Vinh','Nghe An','Vietnam','141001','024681012',1,NULL,'2023-04-01 02:37:10'),(3,18,'abcc12','ccc','Vinh','Ha Tinh','Yemen','1000111','0999888777',1,'2023-04-01 02:40:05','2023-04-01 03:07:23'),(6,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888',1,'2023-04-03 07:20:01','2023-04-03 07:21:40'),(7,19,'Duc Bui','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912873645',1,'2023-04-03 07:22:20','2023-04-03 07:22:20'),(8,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789',1,'2023-04-08 02:03:03','2023-04-08 02:03:03'),(9,19,'Đức 111','Bùi','Vinh','Nghệ An','Vietnam','141001','0900098890',1,'2023-05-03 08:07:03','2023-05-03 08:07:19');
/*!40000 ALTER TABLE `delivery_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (196,'2014_10_12_000000_create_users_table',1),(197,'2014_10_12_100000_create_password_resets_table',1),(198,'2019_08_19_000000_create_failed_jobs_table',1),(199,'2019_12_14_000001_create_personal_access_tokens_table',1),(200,'2023_02_14_155144_create_vendors_table',1),(201,'2023_02_14_155714_create_admins_table',1),(202,'2023_02_15_105859_create_vendors_business_details_table',1),(203,'2023_02_15_140619_create_vendors_bank_details',1),(204,'2023_02_16_145028_create_countries_table',1),(205,'2023_02_17_014025_create_table_sections_table',1),(206,'2023_02_17_091852_create_table_categories_table',1),(207,'2023_02_19_085024_create_brands_table',1),(208,'2023_02_19_144826_create_products_table',1),(209,'2023_02_25_154555_create_products_attributes_table',2),(210,'2023_02_26_053045_create_products_images_table',3),(212,'2023_02_26_141919_create_banners_table',4),(214,'2023_03_04_084533_update_banners_table',5),(215,'2023_03_04_114338_update_products_table',6),(216,'2023_03_05_091214_create_products_filters_table',7),(217,'2023_03_05_091424_create_products_filters_values_table',8),(219,'2023_03_12_142327_add_column_confirm_admins_table',9),(221,'2023_03_12_143125_add_column_confirm_vendors_table',10),(222,'2023_03_19_080948_create_recently_view_products_table',11),(223,'2023_03_19_084252_add_column_group_code_products_table',12),(224,'2023_03_19_094100_create_carts_table',13),(225,'2023_03_21_134751_add_column_to_user',14),(228,'2023_03_26_120318_create_coupons_table',15),(229,'2023_03_31_133238_create_delivery_address_table',16),(230,'2023_04_01_115230_create_orders_table',17),(231,'2023_04_01_115801_create_orders_products_table',18),(232,'2023_04_02_041539_create_order_status_table',19),(233,'2023_04_02_044122_create_order_item_status_table',20),(234,'2023_04_02_045038_add_column_item_status_orders_products_table',21),(235,'2023_04_02_090302_create_order_logs_table',22),(236,'2023_04_02_091414_update_orders_table',23),(238,'2023_04_02_094734_add_column_tracking_number_and_courier_name_orders_products_table',24),(239,'2023_04_02_095754_create_order_logs_table',25),(241,'2023_04_05_134823_create_shipping_charges_table',26),(242,'2023_04_08_144013_create_table_credit_card_table',27),(243,'2023_04_08_144057_add_colum_credit_cart_orders_table',27),(244,'2023_04_13_131420_drop_column_from_shipping_charges_table',28),(245,'2023_04_13_131554_add_column_to_shiping_charges_table',29),(246,'2023_04_18_045738_add_columns_id_nhan_vien_orders_table',30),(248,'2023_04_18_133150_create_staff_table',31);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item_status`
--

DROP TABLE IF EXISTS `order_item_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_item_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item_status`
--

LOCK TABLES `order_item_status` WRITE;
/*!40000 ALTER TABLE `order_item_status` DISABLE KEYS */;
INSERT INTO `order_item_status` VALUES (1,'Chua Giai Quyet',1,NULL,NULL),(2,'Dang Tien Hanh',1,NULL,NULL),(3,'Van Chuyen',1,NULL,NULL),(4,'Da Giao Hang',1,NULL,NULL);
/*!40000 ALTER TABLE `order_item_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_logs`
--

DROP TABLE IF EXISTS `order_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_item_id` int(11) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_logs`
--

LOCK TABLES `order_logs` WRITE;
/*!40000 ALTER TABLE `order_logs` DISABLE KEYS */;
INSERT INTO `order_logs` VALUES (3,5,2,'Shipped','2023-04-02 03:14:17','2023-04-02 03:14:17'),(4,5,NULL,'Shipped','2023-04-02 03:23:33','2023-04-02 03:23:33'),(5,4,NULL,'Shipped','2023-04-02 03:51:22','2023-04-02 03:51:22'),(6,11,10,'Shipped','2023-04-02 03:56:10','2023-04-02 03:56:10'),(7,11,11,'Shipped','2023-04-02 03:56:33','2023-04-02 03:56:33'),(8,9,8,'Shipped','2023-04-02 04:33:51','2023-04-02 04:33:51'),(9,37,NULL,'Delivered','2023-04-08 21:01:47','2023-04-08 21:01:47'),(10,61,NULL,'Delivered','2023-04-11 23:29:10','2023-04-11 23:29:10'),(11,62,NULL,'Chua Giai Quyet','2023-04-15 07:35:28','2023-04-15 07:35:28'),(12,62,NULL,'Da Huy','2023-04-15 07:35:41','2023-04-15 07:35:41'),(13,62,NULL,'Da Giao Hang','2023-04-15 07:36:00','2023-04-15 07:36:00'),(14,81,NULL,'Dang Tien Hanh','2023-04-17 22:06:32','2023-04-17 22:06:32'),(15,81,NULL,'Da Giao Hang','2023-04-22 06:50:54','2023-04-22 06:50:54'),(16,6,NULL,'Da Giao Hang','2023-04-22 18:10:24','2023-04-22 18:10:24'),(17,84,NULL,'Van Chuyen','2023-05-01 00:35:12','2023-05-01 00:35:12'),(18,87,NULL,'Van Chuyen','2023-05-04 01:32:07','2023-05-04 01:32:07'),(19,87,NULL,'Da Huy','2023-05-04 01:32:45','2023-05-04 01:32:45');
/*!40000 ALTER TABLE `order_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'Moi',1,NULL,NULL),(2,'Chua Giai Quyet',1,NULL,NULL),(3,'Da Huy',1,NULL,NULL),(4,'Dang Tien Hanh',1,NULL,NULL),(5,'Van Chuyen',1,NULL,NULL),(7,'Da Giao Hang',1,NULL,NULL);
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shipping_charges` double(12,2) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_amount` double(12,2) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `order_card_id` bigint(20) unsigned DEFAULT NULL,
  `id_NV` bigint(20) unsigned DEFAULT NULL,
  `grand_total` double(12,2) DEFAULT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (4,18,'test','Nam Dan','Vinh','Delhi','Vietnam','10001','024681012','test1292@gmail.com',0.00,NULL,NULL,'Van Chuyen','COD','COD',NULL,NULL,166500.00,'Order 4','444444','2023-04-01 06:12:18','2023-04-18 07:23:07'),(5,18,'test','Nam Dan','Vinh','Delhi','Vietnam','10001','024681012','test1292@gmail.com',0.00,NULL,NULL,'Van Chuyen','Prepaid','Paypal',NULL,NULL,166500.00,'ABC','1298912812128','2023-04-01 06:12:26','2023-04-02 03:23:33'),(6,18,'test','Nam Dan','Vinh','Delhi','Vietnam','10001','024681012','test1292@gmail.com',0.00,NULL,NULL,'Da Giao Hang','Prepaid','Paypal',NULL,NULL,166500.00,'','','2023-04-01 06:21:36','2023-04-22 18:10:24'),(7,18,'abcc12','ccc','Vinh','Delhi','Yemen','1000111','0999888777','test1292@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,166500.00,'','','2023-03-01 06:27:02','2023-04-01 06:27:02'),(8,18,'abcc12','ccc','Vinh','Delhi','Yemen','1000111','0999888777','test1292@gmail.com',0.00,NULL,NULL,'Chua Giai Quyet','COD','COD',NULL,NULL,400500.00,'','','2023-03-01 07:17:56','2023-04-01 21:58:46'),(9,18,'abcc12','ccc','Vinh','Delhi','Yemen','1000111','0999888777','test1292@gmail.com',0.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Paypal',NULL,NULL,400500.00,'','','2023-03-01 07:20:11','2023-04-01 07:20:11'),(10,18,'test','Nam Dan','Vinh','Delhi','Vietnam','10001','024681012','test1292@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,225000.00,'','','2023-03-02 01:13:57','2023-04-02 01:13:57'),(11,18,'12Duc','Nam Dan12','Vinh','Delhi','Vietnam','141001','024681012','test1292@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,355500.00,'','','2023-03-02 01:22:18','2023-04-02 01:22:18'),(12,18,'test','Nam Dan','Vinh','Delhi','Vietnam','10001','024681012','test1292@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,391500.00,NULL,NULL,'2023-03-02 06:43:51','2023-04-02 06:43:51'),(13,18,'abcc12','ccc','Vinh','Delhi','Yemen','1000111','0999888777','test1292@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,225000.00,NULL,NULL,'2023-04-02 06:53:42','2023-04-02 06:53:42'),(14,19,'Duc Bui','Nam Dan','Vinh','tot','Vietnam','092829','0912873645','test1999@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,234000.00,NULL,NULL,'2023-04-03 07:22:31','2023-04-03 07:22:31'),(15,19,'Duc','Nam Dan','Vinh','good','Vietnam','999888','0900999888','test1999@gmail.com',0.00,'VFSeURq2',23400.00,'Moi','COD','COD',NULL,NULL,210600.00,NULL,NULL,'2023-04-03 07:36:03','2023-04-03 07:36:03'),(16,19,'Duc Bui','Nam Dan','Vinh','tot','Vietnam','092829','0912873645','test1999@gmail.com',0.00,'test200',20000.00,'Moi','COD','COD',NULL,NULL,205000.00,NULL,NULL,'2023-04-03 07:37:06','2023-04-03 07:37:06'),(17,19,'Duc Bui','Nam Dan','Vinh','tot','Vietnam','092829','0912873645','test1999@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,234000.00,NULL,NULL,'2023-04-03 07:41:36','2023-04-03 07:41:36'),(18,19,'Duc Bui','Nam Dan','Vinh','tot','Vietnam','092829','0912873645','test1999@gmail.com',0.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Paypal',NULL,NULL,225000.00,NULL,NULL,'2023-04-03 08:07:27','2023-04-03 08:07:27'),(19,19,'Duc Bui','Nam Dan','Vinh','tot','Vietnam','092829','0912873645','test1999@gmail.com',0.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Paypal',NULL,NULL,234000.00,NULL,NULL,'2023-04-03 08:09:42','2023-04-03 08:09:42'),(20,19,'Duc','Nam Dan','Vinh','good','Vietnam','999888','0900999888','test1999@gmail.com',0.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Paypal',NULL,NULL,166500.00,NULL,NULL,'2023-04-03 08:15:26','2023-04-03 08:15:26'),(21,18,'abcc12','ccc','Vinh','Delhi','Yemen','1000111','0999888777','test1292@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,459000.00,NULL,NULL,'2023-04-05 03:27:00','2023-04-05 03:27:00'),(22,18,'abcc12','ccc','Vinh','Ha Tinh','Yemen','1000111','0999888777','test1292@gmail.com',30000.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,991500.00,NULL,NULL,'2023-04-08 02:22:40','2023-04-08 02:22:40'),(23,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,991500.00,NULL,NULL,'2023-04-08 02:27:09','2023-04-08 02:27:09'),(24,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,264000.00,NULL,NULL,'2023-04-08 02:57:56','2023-04-08 02:57:56'),(25,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Moi','COD','COD',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:53:57','2023-04-08 07:53:57'),(26,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','credit_card',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:54:09','2023-04-08 07:54:09'),(27,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','credit_card',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:54:23','2023-04-08 07:54:23'),(28,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Paypal',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:54:45','2023-04-08 07:54:45'),(29,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','PayPal','Paypal',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:55:07','2023-04-08 07:55:07'),(30,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','PayPal','Paypal',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:58:08','2023-04-08 07:58:08'),(31,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','PayPal','Paypal',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:58:19','2023-04-08 07:58:19'),(32,18,'test','Nam Dan','Vinh','Nghe An','Vietnam','10001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Chua Giai Quyet','PayPal','Paypal',NULL,NULL,171000.00,NULL,NULL,'2023-04-08 07:59:52','2023-04-08 07:59:52'),(33,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Chua Giai Quyet','PayPal','credit_card',NULL,NULL,166000.00,NULL,NULL,'2023-04-08 08:00:27','2023-04-08 08:00:27'),(34,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Chua Giai Quyet','PayPal','credit_card',NULL,NULL,166000.00,NULL,NULL,'2023-04-08 08:55:45','2023-04-08 08:55:45'),(35,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Chua Giai Quyet','PayPal','credit_card',NULL,NULL,166000.00,NULL,NULL,'2023-04-08 08:56:36','2023-04-08 08:56:36'),(37,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Da Giao Hang','PayPal','credit_card',NULL,NULL,264000.00,NULL,NULL,'2023-04-08 20:37:36','2023-04-08 21:01:47'),(42,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Chua Giai Quyet','PayPal','credit_card',NULL,NULL,384000.00,NULL,NULL,'2023-04-08 22:07:08','2023-04-08 22:07:08'),(45,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Chua Giai Quyet','PayPal','credit_card',6,NULL,264000.00,NULL,NULL,'2023-04-08 22:09:21','2023-04-08 22:09:21'),(46,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Chua Giai Quyet','PayPal','Credit Card',7,NULL,196500.00,NULL,NULL,'2023-04-08 22:13:37','2023-04-08 22:13:37'),(47,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',8,NULL,196500.00,NULL,NULL,'2023-04-08 22:17:12','2023-04-08 22:17:12'),(48,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',9,NULL,264000.00,NULL,NULL,'2023-04-08 22:23:30','2023-04-08 22:23:30'),(49,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',10,NULL,264000.00,NULL,NULL,'2023-04-08 22:25:31','2023-04-08 22:25:31'),(50,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Moi','COD','COD',11,NULL,264000.00,NULL,NULL,'2023-04-08 22:26:17','2023-04-08 22:26:17'),(51,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',12,NULL,264000.00,NULL,NULL,'2023-04-08 22:28:48','2023-04-08 22:28:48'),(52,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',13,NULL,264000.00,NULL,NULL,'2023-04-08 22:30:49','2023-04-08 22:30:49'),(53,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',14,NULL,264000.00,NULL,NULL,'2023-04-08 22:31:28','2023-04-08 22:31:28'),(54,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',15,NULL,264000.00,NULL,NULL,'2023-04-08 22:31:56','2023-04-08 22:31:56'),(55,18,'12Duc','Nam Dan12','Vinh','Nghe An','Vietnam','141001','024681012','test1292@gmail.com',35000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',16,NULL,269000.00,NULL,NULL,'2023-04-08 22:32:27','2023-04-08 22:32:27'),(56,19,'Duc Bui','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912873645','test1999@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',17,NULL,264000.00,NULL,NULL,'2023-04-09 00:39:55','2023-04-09 00:39:55'),(57,19,'Duc Bui','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912873645','test1999@gmail.com',30000.00,NULL,NULL,'Moi','COD','COD',18,NULL,264000.00,NULL,NULL,'2023-04-09 00:42:32','2023-04-09 00:42:32'),(59,19,'Duc Bui','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912873645','test1999@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',20,NULL,5421000.00,NULL,NULL,'2023-04-09 07:28:12','2023-04-09 07:28:12'),(60,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Dang Tien Hanh','Credit Card','Credit_Card',21,NULL,264000.00,NULL,NULL,'2023-04-11 23:27:16','2023-04-11 23:27:16'),(61,18,'Duc','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912348789','test1292@gmail.com',30000.00,NULL,NULL,'Da Giao Hang','COD','COD',22,NULL,196500.00,NULL,NULL,'2023-04-11 23:28:02','2023-04-11 23:29:10'),(62,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',20000.00,NULL,NULL,'Da Giao Hang','Credit Card','Credit_Card',23,NULL,479000.00,NULL,NULL,'2023-04-15 07:34:37','2023-04-15 07:36:00'),(63,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',24,NULL,27705000.00,NULL,NULL,'2023-04-15 07:37:54','2023-04-15 07:37:54'),(64,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',18000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Credit_Card',25,NULL,252000.00,NULL,NULL,'2023-04-15 08:31:36','2023-04-15 08:31:36'),(65,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',26,NULL,40915000.00,NULL,NULL,'2023-04-16 06:38:03','2023-04-16 06:38:03'),(66,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',27,NULL,290000.00,NULL,NULL,'2023-04-16 06:39:47','2023-04-16 06:39:47'),(67,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',28,NULL,27705000.00,NULL,NULL,'2023-04-16 07:01:35','2023-04-16 07:01:35'),(68,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',29,NULL,27705000.00,NULL,NULL,'2023-04-16 07:02:19','2023-04-16 07:02:19'),(69,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',30,NULL,27705000.00,NULL,NULL,'2023-04-16 07:04:14','2023-04-16 07:04:14'),(70,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',31,NULL,27705000.00,NULL,NULL,'2023-04-16 07:05:22','2023-04-16 07:05:22'),(71,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',32,NULL,27705000.00,NULL,NULL,'2023-04-16 07:06:16','2023-04-16 07:06:16'),(72,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',33,NULL,27705000.00,NULL,NULL,'2023-04-17 21:19:36','2023-04-17 21:19:36'),(77,19,'Duc Bui','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912873645','test1999@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',38,NULL,280000.00,NULL,NULL,'2023-04-17 21:24:57','2023-04-17 21:24:57'),(78,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Moi','COD','COD',39,NULL,295000.00,NULL,NULL,'2023-04-17 21:27:10','2023-04-17 21:27:10'),(79,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Credit_Card',40,NULL,295000.00,NULL,NULL,'2023-04-17 21:31:17','2023-04-17 21:31:17'),(80,19,'Duc Bui','Nam Dan','Vinh','Ha Noi','Vietnam','092829','0912873645','test1999@gmail.com',0.00,NULL,NULL,'Moi','COD','COD',41,NULL,280000.00,NULL,NULL,'2023-04-17 21:49:38','2023-04-17 21:49:38'),(81,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Da Giao Hang','COD','COD',42,NULL,290000.00,NULL,NULL,'2023-04-17 22:06:00','2023-04-22 06:50:54'),(82,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',18000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Credit_Card',43,NULL,32843000.00,NULL,NULL,'2023-04-22 18:14:14','2023-04-22 18:14:14'),(83,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',20000.00,NULL,NULL,'Chua Giai Quyet','Credit Card','Credit_Card',44,NULL,25809000.00,NULL,NULL,'2023-04-28 03:19:10','2023-04-28 03:19:10'),(84,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',22000.00,NULL,NULL,'Van Chuyen','Credit Card','Credit_Card',45,NULL,23922000.00,'J & T','253651452','2023-04-28 03:20:27','2023-05-01 00:35:12'),(85,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',20000.00,NULL,NULL,'Moi','COD','COD',46,NULL,25809000.00,NULL,NULL,'2023-05-03 08:01:08','2023-05-03 08:01:08'),(86,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',22000.00,NULL,NULL,'Moi','COD','COD',47,NULL,64822000.00,NULL,NULL,'2022-05-03 08:50:34','2022-05-03 08:50:34'),(87,19,'Duc','Nam Dan','Vinh','Nghe An','Vietnam','999888','0900999888','test1999@gmail.com',15000.00,NULL,NULL,'Da Huy','COD','COD',48,NULL,30455000.00,'Shoppe','14554545','2023-05-04 01:30:03','2023-05-04 01:32:45');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_price` double(12,2) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `item_status` varchar(255) DEFAULT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products`
--

LOCK TABLES `orders_products` WRITE;
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` VALUES (1,4,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,'Van Chuyen',NULL,NULL,'2023-05-01 06:12:18','2023-05-01 03:03:33'),(2,5,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,'Van Chuyen','tést','122234577555','2023-04-01 06:12:26','2023-04-02 03:14:17'),(3,6,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-01 06:21:36','2023-04-01 06:21:36'),(4,7,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-01 06:27:02','2023-04-01 06:27:02'),(5,8,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,'Chua Giai Quyet',NULL,NULL,'2023-04-01 07:17:56','2023-04-01 21:58:49'),(6,8,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,'Dang Tien Hanh',NULL,NULL,'2023-04-01 07:17:56','2023-04-01 21:58:52'),(7,9,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-01 07:20:11','2023-04-01 07:20:11'),(8,9,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Large',175500.00,1,'Van Chuyen','Fedex','4312121212','2023-04-01 07:20:11','2023-04-02 04:33:51'),(9,10,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-02 01:13:57','2023-04-02 01:13:57'),(10,11,18,0,1,6,'AL1113','Áo Phông Màu Blue','Xanh Blue','Medium',180000.00,1,'Van Chuyen','chuyển phát 11 AL1123','111111','2023-04-02 01:22:18','2023-04-02 03:56:10'),(11,11,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Large',175500.00,1,'Van Chuyen','chuyển phát 11 Ap11','1111222','2023-04-02 01:22:18','2023-04-02 03:56:33'),(12,12,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-02 06:43:51','2023-04-02 06:43:51'),(13,12,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-02 06:43:51','2023-04-02 06:43:51'),(14,13,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-02 06:53:42','2023-04-02 06:53:42'),(15,14,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-03 07:22:31','2023-04-03 07:22:31'),(16,15,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-03 07:36:03','2023-04-03 07:36:03'),(17,16,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-03 07:37:06','2023-04-03 07:37:06'),(18,17,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-03 07:41:36','2023-04-03 07:41:36'),(19,18,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-03 08:07:27','2023-04-03 08:07:27'),(20,19,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-03 08:09:42','2023-04-03 08:09:42'),(21,20,19,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-03 08:15:26','2023-04-03 08:15:26'),(22,21,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-05 03:27:00','2023-04-05 03:27:00'),(23,21,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-05 03:27:00','2023-04-05 03:27:00'),(24,22,18,0,1,8,'AL1113','Tshit 011','Đỏ','Large',184500.00,3,NULL,NULL,NULL,'2023-04-08 02:22:40','2023-04-08 02:22:40'),(25,22,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,3,NULL,NULL,NULL,'2023-04-08 02:22:40','2023-04-08 02:22:40'),(26,23,18,0,1,8,'AL1113','Tshit 011','Đỏ','Large',184500.00,3,NULL,NULL,NULL,'2023-04-08 02:27:09','2023-04-08 02:27:09'),(27,23,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,3,NULL,NULL,NULL,'2023-04-08 02:27:09','2023-04-08 02:27:09'),(28,24,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 02:57:56','2023-04-08 02:57:56'),(29,25,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:53:57','2023-04-08 07:53:57'),(30,26,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:54:09','2023-04-08 07:54:09'),(31,27,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:54:23','2023-04-08 07:54:23'),(32,28,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:54:45','2023-04-08 07:54:45'),(33,29,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:55:07','2023-04-08 07:55:07'),(34,30,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:58:08','2023-04-08 07:58:08'),(35,31,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:58:19','2023-04-08 07:58:19'),(36,32,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 07:59:52','2023-04-08 07:59:52'),(37,33,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 08:00:27','2023-04-08 08:00:27'),(38,34,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 08:55:45','2023-04-08 08:55:45'),(39,35,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Medium',136000.00,1,NULL,NULL,NULL,'2023-04-08 08:56:36','2023-04-08 08:56:36'),(40,37,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 20:37:36','2023-04-08 20:37:36'),(41,2,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:07:08','2023-04-08 22:07:08'),(42,2,18,0,1,2,'RC001','Áo Phông Nam','Đỏ','Small',120000.00,1,NULL,NULL,NULL,'2023-04-08 22:07:08','2023-04-08 22:07:08'),(43,6,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:09:21','2023-04-08 22:09:21'),(44,7,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-08 22:13:37','2023-04-08 22:13:37'),(45,8,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-08 22:17:12','2023-04-08 22:17:12'),(46,9,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:23:30','2023-04-08 22:23:30'),(47,10,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:25:31','2023-04-08 22:25:31'),(48,11,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:26:17','2023-04-08 22:26:17'),(49,12,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:28:48','2023-04-08 22:28:48'),(50,52,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:30:49','2023-04-08 22:30:49'),(51,53,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:31:28','2023-04-08 22:31:28'),(52,54,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:31:56','2023-04-08 22:31:56'),(53,55,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-08 22:32:27','2023-04-08 22:32:27'),(54,56,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-09 00:39:55','2023-04-09 00:39:55'),(55,57,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-09 00:42:32','2023-04-09 00:42:32'),(57,59,19,4,4,18,'A32','SamSung A32','Xanh','5 to 5.4 In 4GB',5391000.00,1,NULL,NULL,NULL,'2023-04-09 07:28:12','2023-04-09 07:28:12'),(58,60,18,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-11 23:27:16','2023-04-11 23:27:16'),(59,61,18,4,4,15,'AP11','Áo Phông AP11','Đỏ','Medium',166500.00,1,NULL,NULL,NULL,'2023-04-11 23:28:02','2023-04-11 23:28:02'),(60,62,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Small',225000.00,1,NULL,NULL,NULL,'2023-04-15 07:34:37','2023-04-15 07:34:37'),(61,62,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-15 07:34:37','2023-04-15 07:34:37'),(62,63,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-15 07:37:54','2023-04-15 07:37:54'),(63,64,19,0,1,17,'APN11','Áo Phông Nam','Đỏ','Medium',234000.00,1,NULL,NULL,NULL,'2023-04-15 08:31:36','2023-04-15 08:31:36'),(64,65,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 1TB',40900000.00,1,NULL,NULL,NULL,'2023-04-16 06:38:03','2023-04-16 06:38:03'),(65,66,19,0,1,20,'LG','Sản Phẩm LG','Đen','Medium',275000.00,1,NULL,NULL,NULL,'2023-04-16 06:39:47','2023-04-16 06:39:47'),(66,67,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-16 07:01:35','2023-04-16 07:01:35'),(67,68,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-16 07:02:19','2023-04-16 07:02:19'),(68,69,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-16 07:04:14','2023-04-16 07:04:14'),(69,70,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-16 07:05:22','2023-04-16 07:05:22'),(70,71,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-16 07:06:16','2023-04-16 07:06:16'),(71,72,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-04-17 21:19:36','2023-04-17 21:19:36'),(74,77,19,0,1,20,'LG','Sản Phẩm LG','Đen','Large',280000.00,1,NULL,NULL,NULL,'2023-04-17 21:24:57','2023-04-17 21:24:57'),(75,78,19,0,1,20,'LG','Sản Phẩm LG','Đen','Large',280000.00,1,NULL,NULL,NULL,'2023-04-17 21:27:10','2023-04-17 21:27:10'),(76,79,19,0,1,20,'LG','Sản Phẩm LG','Đen','Large',280000.00,1,NULL,NULL,NULL,'2023-04-17 21:31:17','2023-04-17 21:31:17'),(77,80,19,0,1,20,'LG','Sản Phẩm LG','Đen','Large',280000.00,1,NULL,NULL,NULL,'2023-04-17 21:49:38','2023-04-17 21:49:38'),(78,81,19,0,1,20,'LG','Sản Phẩm LG','Đen','Medium',275000.00,1,NULL,NULL,NULL,'2023-04-17 22:06:00','2023-04-17 22:06:00'),(79,82,19,0,1,1,'RM11','Redmi Note 11','Xanh Blue','64GB-4GB',135000.00,1,NULL,NULL,NULL,'2023-04-22 18:14:14','2023-04-22 18:14:14'),(80,82,19,1,2,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 512GB',32690000.00,1,NULL,NULL,NULL,'2023-04-22 18:14:14','2023-04-22 18:14:14'),(81,83,19,0,1,22,'Dell-V','Dell Vostro 3510','Bạc','15.6 Inh',25789000.00,1,NULL,NULL,NULL,'2023-04-28 03:19:10','2023-04-28 03:19:10'),(82,84,19,0,1,21,'HP-P','Laptop HP 15 DW3033dx','Bạc','15.6 Inh',23900000.00,1,NULL,NULL,NULL,'2023-04-28 03:20:27','2023-04-28 03:20:27'),(83,85,19,0,1,22,'Dell-V','Dell Vostro 3510','Bạc','15.6 Inh',25789000.00,1,NULL,NULL,NULL,'2023-05-03 08:01:08','2023-05-03 08:01:08'),(84,86,19,0,1,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 1TB',40900000.00,18,NULL,NULL,NULL,'2022-05-03 08:50:34','2022-05-03 08:50:34'),(85,86,19,0,1,21,'HP-P','Laptop HP 15 DW3033dx','Bạc','15.6 Inh',23900000.00,1,NULL,NULL,NULL,'2022-05-03 08:50:34','2022-05-03 08:50:34'),(86,87,19,0,1,20,'LG','Sản Phẩm LG','Đen','Medium',275000.00,10,NULL,NULL,NULL,'2023-05-04 01:30:03','2023-05-04 01:30:03'),(87,87,19,0,1,19,'IP','iPhone 14 Pro Max','Tím','5 to 5.4 In 256GB',27690000.00,1,NULL,NULL,NULL,'2023-05-04 01:30:03','2023-05-04 01:30:03');
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_price` double(12,2) DEFAULT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `product_weight` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `screen_size` varchar(255) DEFAULT NULL,
  `occassion` varchar(255) DEFAULT NULL,
  `fit` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `sleeve` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') NOT NULL,
  `is_bestseller` enum('No','Yes') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,2,5,7,0,1,'admin','Redmi Note 11','RM11','Xanh Blue',5000000.00,10,500,'73724.jpeg','',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','Android','4.5 to 4.9 in',NULL,NULL,NULL,NULL,'4 GB',NULL,NULL,NULL,NULL,'Yes','No',1,NULL,'2023-03-19 02:29:41'),(2,1,1,2,0,1,'admin','Áo Phông Nam Đỏ','RC001','Đỏ',187000.00,20,200,'79652.jpg','','100','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cotton',NULL,NULL,NULL,'Yes','Yes',1,NULL,'2023-05-05 00:18:17'),(6,1,8,1,0,1,'admin','Áo Phông Màu Blue','AL1113','Xanh Blue',170000.00,0,0,'15042.jpg','Giới thiệu CoinVlog (Video 5s).mp4-1947912447-mp4','100','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,NULL,NULL,NULL,NULL,'Yes','Yes',1,'2023-02-25 07:21:45','2023-04-01 05:19:07'),(8,1,6,4,0,1,'admin','Tshit 011','AL1113','Đỏ',150000.00,0,0,'22413.jpg','55171.mp4','100','Lorem ipsum dolor Tesst',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Polyester','Mobile','Mobile','SmartPhone','Yes','Yes',1,'2023-02-25 07:38:44','2023-03-19 02:23:10'),(10,1,7,1,0,1,'admin','Sơ Mi Nam','SM','Trắng',200000.00,0,250,'49846.jpg',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'Polyester',NULL,NULL,NULL,'No','No',1,'2023-03-04 06:44:26','2023-04-14 07:07:43'),(11,1,6,1,0,1,'admin','Tesst','t1','Xanh Lá',5000000.00,0,0,'11855.jpg',NULL,'100',NULL,NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'cotton',NULL,NULL,NULL,'No','No',1,'2023-03-05 01:04:58','2023-03-19 02:23:35'),(12,1,6,2,0,1,'admin','Áo Phông Nam Đen','AP115','Đen',234000.00,10,160,'23035.webp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Polyester',NULL,NULL,NULL,'Yes','Yes',1,'2023-03-05 01:05:17','2023-05-05 00:18:08'),(13,1,9,3,0,1,'admin','ÁO THUN ADLV TAY NGẮN TEDDY BEAR (BEAR DOLL) ĐEN','APN','Trắng',350000.00,0,150,'61261.jpg',NULL,NULL,'THÔNG TIN SẢN PHẨM\r\nTÊN SẢN PHẨM	ÁO THUN ADLV TAY NGẮN TEDDY BEAR (BEAR DOLL) ĐEN\r\nMÃ SẢN PHẨM	ADLV-21SS-SSADBK-TBD\r\nCHẤT LIỆU	COTTON 100%',NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'cotton',NULL,NULL,NULL,'Yes','No',1,'2023-03-18 02:25:48','2023-04-15 04:31:02'),(14,1,8,3,0,1,'admin','Sơ mi chồng cổ đính cúc đá','SMN','Trắng',579000.00,5,160,'44445.jpg',NULL,NULL,'Chất liệu  Lụa satin\r\nMàu sắc  Trắng\r\nĐặc điểm nổi bật\r\n\r\nKhông dừng lại ở sự basic, các mẫu áo sơ mi nữ của LEIKA được tập trung đầu tư về cả chất liệu và kiểu dáng, mang đến cho nàng những item “giàu tiềm năng” nhất trong tủ đồ khi có thể giữ nguyên, đổi chiều hay hòa mình trong những bản phối đa dạng.\r\nTrong thời điểm chuyển mùa, áo sơ mi lụa là item chiếm lợi thế lớn trong tủ đồ của mỗi Quý cô. Tạo ra hiệu ứng thị giác bắt mắt cùng xúc cảm mê hoặc của chất liệu lụa, áo sơ mi chồng cổ đính cúc đá sẽ giúp nàng hòa mình vào không khí thời trang “đa sắc thái”.\r\n\r\nMang sắc trắng an toàn và “dễ chịu” với mọi sắc tố da để bất cứ cô gái nào cũng có thể mặc đẹp, nhấn nhá cúc đá được đính tinh tế, nàng có thể phối áo sơ mi chồng cổ đính cúc đá với mọi trang phục – từ đơn giản đến phức tạp để có được outfit thời thượng cho ngày đi làm của mình.\r\nCách giặt và bảo quản\r\nƯu tiên chế độ giặt nhẹ nhàng, hạn chế để chế độ giặt mạnh. Khi giặt nên lộn trái, đóng khuy, kéo khóa.\r\nKhông ngâm sản phẩm quá lâu để tránh phai màu, không dùng thuốc tẩy.\r\nPhân loại vải trắng và vải màu để giặt riêng\r\nPhơi ở nơi thoáng mát',NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'cotton',NULL,NULL,NULL,'Yes','No',1,'2023-03-18 04:01:36','2023-04-15 04:24:56'),(15,1,6,1,4,4,'vendor','Áo Phông AP11','AP11','Đỏ',175000.00,0,0,'54724.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'Polyester',NULL,NULL,NULL,'No','No',1,'2023-03-18 21:44:20','2023-03-26 20:23:57'),(16,1,6,2,1,2,'vendor','Áo Thun Cao Cấp Basic Wash','APT','Trắng',360000.00,0,0,'62015.jpg',NULL,NULL,'Basic Wash – 4 màu\r\nChất liệu : Cotton wash acid\r\nHình in cao Nhung công nghệ mới\r\n4 size : S – M – L  ( form rộng )',NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'cotton',NULL,NULL,NULL,'No','Yes',1,'2023-03-18 21:46:48','2023-04-15 04:10:15'),(17,1,6,1,0,1,'admin','Áo Phông Nam','APN11','Đỏ',250000.00,0,800,'9197.jpeg',NULL,'100',NULL,NULL,NULL,NULL,NULL,NULL,'Full Sleeve',NULL,'cotton',NULL,NULL,NULL,'No','No',1,'2023-03-19 02:33:21','2023-04-13 06:31:03'),(18,2,4,4,4,4,'vendor','SamSung A32','A32','Xanh',5990000.00,0,0,'26774.jpg',NULL,'Moblile',NULL,'Android','5 to 5.4 in',NULL,NULL,NULL,NULL,'8 GB',NULL,NULL,NULL,NULL,'No','No',1,'2023-04-09 00:57:48','2023-04-09 00:58:00'),(19,2,14,9,0,1,'admin','iPhone 14 Pro Max','IP','Tím',27690000.00,0,206,'89936.webp',NULL,NULL,NULL,'Ios','5 to 5.4 in',NULL,NULL,NULL,NULL,'4 GB',NULL,NULL,NULL,NULL,'Yes','No',1,'2023-04-15 04:13:38','2023-04-28 01:45:23'),(20,2,12,5,0,1,'admin','Sản Phẩm LG','LG','Đen',250000.00,0,100,'75770.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-04-16 00:37:09','2023-04-16 00:37:09'),(21,3,16,11,0,1,'admin','Laptop HP 15 DW3033dx','HP-P','Bạc',23900000.00,0,2300,'84735.png',NULL,NULL,'Laptop HP 15 DW3033dx (405F6UA)(i3 1115G4/8GB/256GB SSD/15.6 FHD/Win/Bạc)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','No',1,'2023-04-28 01:51:59','2023-04-28 02:24:30'),(22,3,15,10,0,1,'admin','Dell Vostro 3510','Dell-V','Bạc',25789000.00,0,1200,'1297.jpg',NULL,NULL,'Laptop Dell Vostro 3510 i5 1135G7/8GB/512GB/2GB MX350/OfficeHS/Win11 (P112F002BBL)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','No',1,'2023-04-28 01:54:46','2023-04-28 03:18:21');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_attributes`
--

LOCK TABLES `products_attributes` WRITE;
/*!40000 ALTER TABLE `products_attributes` DISABLE KEYS */;
INSERT INTO `products_attributes` VALUES (1,2,'Small',150000.00,0,'RC001-S',1,NULL,'2023-04-08 22:07:08',0),(2,2,'Medium',170000.00,80,'RC001-M',1,NULL,'2023-04-08 08:56:36',80),(3,2,'Large',190000.00,10,'RC001-L',0,NULL,'2023-04-08 01:54:51',10),(4,8,'Small',150000.00,15,'AL1113-S',1,'2023-02-25 21:15:05','2023-04-08 07:50:40',15),(5,8,'Medium',190000.00,10,'AL1113-M',1,'2023-02-25 21:15:05','2023-04-08 07:50:40',10),(6,8,'Large',205000.00,50,'AL1113-L',1,'2023-02-25 21:15:05','2023-04-08 07:50:40',50),(7,1,'64GB-4GB',150000.00,99,'RN11644',1,'2023-03-12 02:53:53','2023-04-22 18:14:14',100),(8,1,'128GB-4GB',180000.00,150,'RN111284',1,'2023-03-12 02:53:53','2023-03-12 02:53:53',150),(9,12,'Small',150000.00,150,'AT01S',0,'2023-03-12 04:36:36','2023-04-14 07:10:40',150),(10,15,'Small',170000.00,100,'AP11-S',1,'2023-03-26 20:22:45','2023-03-26 20:22:45',100),(11,15,'Medium',185000.00,46,'AP11-M',1,'2023-03-26 20:22:45','2023-04-11 23:28:09',46),(12,15,'Large',195000.00,49,'AP11-L',1,'2023-03-26 20:22:45','2023-04-08 22:26:23',49),(13,6,'Small',170000.00,100,'AL-S',1,'2023-04-01 05:17:31','2023-04-01 05:17:31',100),(14,6,'Medium',180000.00,49,'AL-M',1,'2023-04-01 05:17:31','2023-04-08 22:26:22',49),(15,6,'Large',190000.00,30,'AL-L',1,'2023-04-01 05:17:31','2023-04-01 05:17:31',30),(16,17,'Small',250000.00,99,'APN11-S',1,'2023-04-01 07:17:14','2023-04-15 07:34:37',99),(17,17,'Medium',260000.00,30,'APN11-M',1,'2023-04-01 07:17:14','2023-04-15 08:31:36',30),(18,18,'5 to 5.4 In',5990000.00,50,'A32-4',1,'2023-04-09 01:00:41','2023-04-09 01:00:41',50),(19,18,'5 to 5.4 In 4GB',5990000.00,49,'A32-4GB',1,'2023-04-09 01:01:36','2023-04-09 07:28:12',49),(20,18,'5 to 5.4 In 8GB',6490000.00,30,'A32-8GB',1,'2023-04-09 01:01:36','2023-04-09 01:01:36',30),(21,10,'Small',200000.00,50,'SM-S',1,'2023-04-14 07:06:35','2023-04-14 07:06:35',50),(22,10,'Medium',220000.00,30,'SM-M',1,'2023-04-14 07:06:35','2023-04-14 07:06:35',30),(23,10,'Large',230000.00,30,'SM-L',1,'2023-04-14 07:06:35','2023-04-14 07:06:35',30),(24,12,'Medium',256000.00,50,'AP115-M',1,'2023-04-14 07:12:08','2023-04-14 07:12:08',50),(25,12,'Large',265000.00,30,'AP115-L',1,'2023-04-14 07:12:08','2023-04-14 07:12:08',30),(26,16,'Small',360000.00,100,'APT-S',1,'2023-04-15 04:11:10','2023-04-15 04:11:10',100),(27,16,'Medium',375000.00,50,'APT-M',1,'2023-04-15 04:11:10','2023-04-15 04:11:10',50),(28,16,'Large',380000.00,30,'APT-L',1,'2023-04-15 04:11:10','2023-04-15 04:11:10',30),(29,19,'5 to 5.4 In 256GB',27690000.00,35,'IP-256GB',1,'2023-04-15 04:15:35','2023-05-04 01:30:09',48),(30,19,'5 to 5.4 In 512GB',32690000.00,29,'IP-512GB',1,'2023-04-15 04:15:35','2023-04-22 18:14:14',30),(31,19,'5 to 5.4 In 1TB',40900000.00,17,'IP-1TB',1,'2023-04-15 04:15:35','2023-05-03 08:50:39',20),(32,14,'Small',579000.00,150,'SMN-S',1,'2023-04-15 04:25:50','2023-04-15 04:25:50',150),(33,14,'Medium',589000.00,100,'SMN-M',1,'2023-04-15 04:25:50','2023-04-15 04:25:50',100),(34,14,'Large',599000.00,20,'SMN-L',1,'2023-04-15 04:25:50','2023-04-15 04:25:50',20),(35,13,'Small',350000.00,45,'APN-S',1,'2023-04-15 04:31:57','2023-04-15 04:31:57',45),(36,13,'Medium',365000.00,20,'APN-M',1,'2023-04-15 04:31:57','2023-04-15 04:31:57',20),(37,13,'Large',375000.00,18,'APN-L',1,'2023-04-15 04:31:57','2023-04-15 04:31:57',18),(38,20,'Small',250000.00,105,'LG-S',1,'2023-04-16 05:57:04','2023-04-16 05:57:04',105),(39,20,'Medium',275000.00,16,'LG-M',1,'2023-04-16 05:59:46','2023-05-04 01:30:09',30),(40,20,'Large',280000.00,13,'LG-L',1,'2023-04-16 05:59:46','2023-04-17 21:49:48',20),(41,21,'15.6 Inh',23900000.00,23,'HP-P',1,'2023-04-28 02:26:26','2023-05-03 08:50:39',25),(42,22,'15.6 Inh',25789000.00,32,'Dell-V',1,'2023-04-28 02:27:03','2023-05-03 08:01:13',35);
/*!40000 ALTER TABLE `products_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_filters`
--

DROP TABLE IF EXISTS `products_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_filters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_ids` varchar(255) NOT NULL,
  `filter_name` varchar(255) NOT NULL,
  `filter_column` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_filters`
--

LOCK TABLES `products_filters` WRITE;
/*!40000 ALTER TABLE `products_filters` DISABLE KEYS */;
INSERT INTO `products_filters` VALUES (1,'1,6,7,2,9','Fabric','fabric',1,'2023-03-05 05:16:01','2023-03-05 05:16:01'),(2,'4,5','Ram','ram',1,'2023-03-05 05:16:30','2023-03-05 05:16:30'),(3,'1,6,7,2,8,9,3','Sleeve','sleeve',1,'2023-03-05 05:17:39','2023-03-05 05:17:39'),(4,'1,6,7,2,8,9,3','Pattern','pattern',1,'2023-03-05 05:18:01','2023-03-05 05:18:01'),(5,'1,6,7,2,8,9,3','Fit','fit',1,'2023-03-05 05:18:18','2023-03-05 05:18:18'),(6,'1,6,7,2,8,9,3','Occassion','occassion',1,'2023-03-05 05:19:06','2023-03-05 05:19:06'),(16,'4,5','Screen Size','screen_size',1,'2023-03-05 05:42:34','2023-03-05 05:42:34'),(17,'4,5','Operating System','operating_system',1,'2023-03-05 05:44:39','2023-03-05 05:44:39');
/*!40000 ALTER TABLE `products_filters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_filters_values`
--

DROP TABLE IF EXISTS `products_filters_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_filters_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filter_id` int(11) NOT NULL,
  `filter_value` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_filters_values`
--

LOCK TABLES `products_filters_values` WRITE;
/*!40000 ALTER TABLE `products_filters_values` DISABLE KEYS */;
INSERT INTO `products_filters_values` VALUES (5,1,'cotton',1,'2023-03-05 05:39:28','2023-03-05 05:39:28'),(6,1,'Polyester',1,'2023-03-05 05:40:42','2023-03-05 05:40:42'),(7,1,'Wool',1,'2023-03-05 05:41:02','2023-03-05 05:41:02'),(8,3,'Full Sleeve',1,'2023-03-05 05:41:21','2023-03-05 05:41:21'),(9,2,'4 GB',1,'2023-03-05 05:41:38','2023-03-05 05:41:38'),(10,2,'8 GB',1,'2023-03-05 05:41:54','2023-03-05 05:41:54'),(11,16,'Up to 3.9 in',1,'2023-03-05 05:43:11','2023-03-05 05:43:11'),(12,16,'4 to 4.4 in',1,'2023-03-05 05:45:29','2023-03-05 05:45:29'),(13,17,'Android',1,'2023-03-05 05:45:38','2023-03-05 05:45:38'),(14,17,'Ios',1,'2023-03-05 05:45:57','2023-03-05 05:45:57'),(15,17,'Windowns',1,'2023-03-05 05:46:14','2023-03-05 05:46:14'),(16,16,'4.5 to 4.9 in',1,'2023-03-05 05:45:29','2023-03-05 05:45:29'),(17,16,'5 to 5.4 in',1,'2023-03-05 05:45:29','2023-03-05 05:45:29'),(18,16,'5.5 in and above',1,'2023-03-05 05:45:29','2023-03-05 05:45:29');
/*!40000 ALTER TABLE `products_filters_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES (11,8,'do3.jpeg75645.jpeg',1,'2023-03-19 02:16:06','2023-03-19 02:16:06'),(12,8,'do2.jpeg23554.jpeg',1,'2023-03-19 02:16:07','2023-03-19 02:16:07'),(13,8,'do1.jpeg4581.jpeg',1,'2023-03-19 02:16:07','2023-03-19 02:16:07'),(14,6,'xanh1.jpg14564.jpg',1,'2023-03-19 02:19:11','2023-03-19 02:19:11'),(15,6,'sizes.jpg71874.jpg',1,'2023-03-19 02:19:11','2023-03-19 02:19:11'),(16,6,'xanhx.jpg45856.jpg',1,'2023-03-19 02:19:12','2023-03-19 02:19:12'),(17,6,'xax.jpg16039.jpg',1,'2023-03-19 02:19:12','2023-03-19 02:19:12'),(18,11,'Screenshot from 2023-03-19 16-20-30.png52265.png',1,'2023-03-19 02:21:05','2023-03-19 02:21:05'),(19,11,'Screenshot from 2023-03-19 16-20-26.png84977.png',1,'2023-03-19 02:21:05','2023-03-19 02:21:05'),(20,11,'Screenshot from 2023-03-19 16-20-23.png28829.png',1,'2023-03-19 02:21:06','2023-03-19 02:21:06'),(21,2,'images (3).jpeg80726.jpeg',1,'2023-03-19 02:22:31','2023-03-19 02:22:31'),(22,2,'images (2).jpeg56493.jpeg',1,'2023-03-19 02:22:31','2023-03-19 02:22:31'),(23,2,'images (1).jpeg3519.jpeg',1,'2023-03-19 02:22:31','2023-03-19 02:22:31'),(24,1,'download (3).jpeg63772.jpeg',1,'2023-03-19 02:29:51','2023-03-19 02:29:51'),(25,1,'xiaomi-redmi-no_main_199_1020.png.webp29601.webp',1,'2023-03-19 02:29:51','2023-03-19 02:29:51'),(26,1,'REDMI-NOTE-11-21.webp21431.webp',1,'2023-03-19 02:29:52','2023-03-19 02:29:52'),(27,15,'xiaomi-redmi-no_main_199_1020.png.webp88504.webp',1,'2023-03-26 20:24:12','2023-03-26 20:24:12'),(28,15,'images (3).jpeg68405.jpeg',1,'2023-03-26 20:24:13','2023-03-26 20:24:13'),(29,15,'images (2).jpeg59160.jpeg',1,'2023-03-26 20:24:13','2023-03-26 20:24:13'),(30,15,'images (1).jpeg88301.jpeg',1,'2023-03-26 20:24:13','2023-03-26 20:24:13'),(31,10,'images (5).jpeg45835.jpeg',1,'2023-04-14 07:07:09','2023-04-14 07:07:09'),(32,10,'images (4).jpeg27804.jpeg',1,'2023-04-14 07:07:09','2023-04-14 07:07:09'),(33,19,'638025697714065864_iPhone 14 Promax (4).webp80892.webp',1,'2023-04-15 04:16:56','2023-04-15 04:16:56'),(34,19,'638025697716104054_iPhone 14 Promax (3).webp15517.webp',1,'2023-04-15 04:16:57','2023-04-15 04:16:57'),(35,19,'638025697710590920_iPhone 14 Promax (2).webp88307.webp',1,'2023-04-15 04:16:57','2023-04-15 04:16:57'),(36,14,'somi-chong-co-dinh-cuc-da-1-1 (1).jpg62330.jpg',1,'2023-04-15 04:26:26','2023-04-15 04:26:26'),(37,14,'somi-chong-co-dinh-cuc-da-2-1.jpg88247.jpg',1,'2023-04-15 04:26:26','2023-04-15 04:26:26'),(38,14,'somi-chong-co-dinh-cuc-da-3-1.jpg34862.jpg',1,'2023-04-15 04:26:26','2023-04-15 04:26:26'),(39,13,'000-ADLV-21SS-SSADBK-TBD-model2_1.jpg99958.jpg',1,'2023-04-15 04:32:41','2023-04-15 04:32:41'),(40,13,'000-ADLV-21SS-SSADBK-TBD-model3_1.jpg63599.jpg',1,'2023-04-15 04:32:42','2023-04-15 04:32:42'),(41,13,'000-ADLV-21SS-SSADBK-TBD-add3_1.jpg75549.jpg',1,'2023-04-15 04:32:42','2023-04-15 04:32:42'),(42,13,'000-ADLV-21SS-SSADBK-TBD-add1_1.jpg30032.jpg',1,'2023-04-15 04:32:42','2023-04-15 04:32:42'),(43,22,'vi-vn-dell-vostro-3510-i5-p112f002bbl-9.jpg42849.jpg',1,'2023-04-28 02:13:56','2023-04-28 02:13:56'),(44,22,'vi-vn-dell-vostro-3510-i5-p112f002bbl-8.jpg40446.jpg',1,'2023-04-28 02:13:56','2023-04-28 02:13:56'),(45,22,'vi-vn-dell-vostro-3510-i5-p112f002bbl-7.jpg14042.jpg',1,'2023-04-28 02:13:56','2023-04-28 02:13:56'),(46,22,'vi-vn-dell-vostro-3510-i5-p112f002bbl-6.jpg21373.jpg',1,'2023-04-28 02:13:57','2023-04-28 02:13:57'),(47,21,'Screenshot from 2023-04-28 16-24-58.png51941.png',1,'2023-04-28 02:25:06','2023-04-28 02:25:06'),(48,21,'Screenshot from 2023-04-28 16-24-49.png91472.png',1,'2023-04-28 02:25:06','2023-04-28 02:25:06'),(49,21,'Screenshot from 2023-04-28 16-24-45.png58043.png',1,'2023-04-28 02:25:06','2023-04-28 02:25:06');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recently_view_products`
--

DROP TABLE IF EXISTS `recently_view_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recently_view_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recently_view_products`
--

LOCK TABLES `recently_view_products` WRITE;
/*!40000 ALTER TABLE `recently_view_products` DISABLE KEYS */;
INSERT INTO `recently_view_products` VALUES (1,15,'64335e20c19bacd596a1e1fb80ec2bbb',NULL,NULL),(2,8,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(3,14,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(4,15,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(5,12,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(6,13,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(7,11,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(8,2,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(9,17,'c79a11fd19e0061091fd3b5a043048d4',NULL,NULL),(10,8,'39cd019b97839bef7a2828ff4fe5c662',NULL,NULL),(11,2,'fd9cd75a66085b6df0789ba73ae165e4',NULL,NULL),(12,8,'fd9cd75a66085b6df0789ba73ae165e4',NULL,NULL),(13,17,'fd9cd75a66085b6df0789ba73ae165e4',NULL,NULL),(14,11,'fd9cd75a66085b6df0789ba73ae165e4',NULL,NULL),(15,6,'fd9cd75a66085b6df0789ba73ae165e4',NULL,NULL),(16,8,'51fe9e51dd1f31ed4d883e179a578932',NULL,NULL),(17,15,'51fe9e51dd1f31ed4d883e179a578932',NULL,NULL),(18,17,'51fe9e51dd1f31ed4d883e179a578932',NULL,NULL),(19,16,'51fe9e51dd1f31ed4d883e179a578932',NULL,NULL),(20,2,'51fe9e51dd1f31ed4d883e179a578932',NULL,NULL),(21,1,'544b390b72d105224aa73e5ca1abaf56',NULL,NULL),(22,15,'6cd7015bad70a30f7260535d218c66af',NULL,NULL),(23,17,'6cd7015bad70a30f7260535d218c66af',NULL,NULL),(24,14,'6cd7015bad70a30f7260535d218c66af',NULL,NULL),(25,6,'6cd7015bad70a30f7260535d218c66af',NULL,NULL),(26,15,'98a763689c163773d51932eb55bcd2a0',NULL,NULL),(27,17,'077d6b3edefc00b289021293b6d6f287',NULL,NULL),(28,15,'077d6b3edefc00b289021293b6d6f287',NULL,NULL),(29,6,'077d6b3edefc00b289021293b6d6f287',NULL,NULL),(30,17,'2f3a6a191222a8dcccc0bec995636df0',NULL,NULL),(31,15,'2f3a6a191222a8dcccc0bec995636df0',NULL,NULL),(32,17,'cb13be4a904d4be6542da3f12b08ab42',NULL,NULL),(33,2,'6d38546044133e7d8ba0e5b653c3911d',NULL,NULL),(34,8,'6d38546044133e7d8ba0e5b653c3911d',NULL,NULL),(35,17,'6d38546044133e7d8ba0e5b653c3911d',NULL,NULL),(36,15,'6d38546044133e7d8ba0e5b653c3911d',NULL,NULL),(37,17,'05aaf0613c703ce227ddf603afb92a6e',NULL,NULL),(38,15,'05aaf0613c703ce227ddf603afb92a6e',NULL,NULL),(39,2,'05aaf0613c703ce227ddf603afb92a6e',NULL,NULL),(40,1,'05aaf0613c703ce227ddf603afb92a6e',NULL,NULL),(41,17,'b3887310f79aa6da4cbf1401774c2f51',NULL,NULL),(42,2,'b3887310f79aa6da4cbf1401774c2f51',NULL,NULL),(43,1,'b3887310f79aa6da4cbf1401774c2f51',NULL,NULL),(44,17,'8d350c78e9c1475f053e68ecfcdea37d',NULL,NULL),(45,15,'8d350c78e9c1475f053e68ecfcdea37d',NULL,NULL),(46,17,'ff8d9791b8fc72abf9bb36124cb0d75c',NULL,NULL),(47,16,'ff8d9791b8fc72abf9bb36124cb0d75c',NULL,NULL),(48,18,'7d4d9cc11634ade3c4b8ff86f8a97a83',NULL,NULL),(49,17,'f8c5fcab32d64b3d1dbf4594a621a37b',NULL,NULL),(50,17,'cf187f8178a0c70cf5289f657dc6b9ae',NULL,NULL),(51,15,'cf187f8178a0c70cf5289f657dc6b9ae',NULL,NULL),(52,17,'8c5d195804e766a10fd88c961bdd58be',NULL,NULL),(53,17,'443a633ae2ab4783b2cc09837a06930b',NULL,NULL),(54,19,'69b49bcd70c798f4e5d8e949c249bbd1',NULL,NULL),(55,17,'69b49bcd70c798f4e5d8e949c249bbd1',NULL,NULL),(56,19,'a94d9e03579417017397017e1433a35e',NULL,NULL),(57,19,'f0634e6d9e5d3894bc99034b28ad6fc6',NULL,NULL),(58,20,'f0634e6d9e5d3894bc99034b28ad6fc6',NULL,NULL),(59,17,'f0634e6d9e5d3894bc99034b28ad6fc6',NULL,NULL),(60,19,'d3239dbd3aa7dfbc180cafc68ce92ec4',NULL,NULL),(61,20,'d3239dbd3aa7dfbc180cafc68ce92ec4',NULL,NULL),(62,1,'d3239dbd3aa7dfbc180cafc68ce92ec4',NULL,NULL),(63,19,'90dae25ad1f94523178b0b1c7904b705',NULL,NULL),(64,21,'cb2f3c5b9bcdd76265d906a631974071',NULL,NULL),(65,22,'cb2f3c5b9bcdd76265d906a631974071',NULL,NULL),(66,1,'cb2f3c5b9bcdd76265d906a631974071',NULL,NULL),(67,2,'cb2f3c5b9bcdd76265d906a631974071',NULL,NULL),(68,22,'b531afe41f252978168812ad8e599b8e',NULL,NULL),(69,21,'b531afe41f252978168812ad8e599b8e',NULL,NULL),(70,19,'b531afe41f252978168812ad8e599b8e',NULL,NULL),(71,19,'77401940f50d4f3ea37d1e5050b05190',NULL,NULL),(72,20,'77401940f50d4f3ea37d1e5050b05190',NULL,NULL);
/*!40000 ALTER TABLE `recently_view_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'Quần Áo',1,NULL,'2023-03-19 02:27:45'),(2,'Thiết Bị Điện Tử',1,NULL,'2023-03-19 02:27:59'),(3,'Laptop',1,NULL,'2023-04-28 01:41:11');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_charges`
--

DROP TABLE IF EXISTS `shipping_charges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_charges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `0_500g` double(8,2) NOT NULL,
  `501_1000g` double(8,2) NOT NULL,
  `1001_2000g` double(8,2) NOT NULL,
  `2001_5000g` double(8,2) NOT NULL,
  `above_5000g` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_charges`
--

LOCK TABLES `shipping_charges` WRITE;
/*!40000 ALTER TABLE `shipping_charges` DISABLE KEYS */;
INSERT INTO `shipping_charges` VALUES (1,'Nghe An','Vietnam',15000.00,18000.00,20000.00,22000.00,25000.00,1,NULL,'2023-04-13 06:30:28'),(2,'An Giang','Vietnam',20000.00,25000.00,27500.00,29000.00,35000.00,1,NULL,'2023-04-15 08:04:34'),(3,'Bac Lieu','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(4,'Ha Noi','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,'2023-04-05 07:34:44'),(5,'Thanh Pho HCM','Vietnam',0.00,0.00,0.00,0.00,0.00,0,NULL,'2023-04-05 07:34:43'),(6,'Quang Binh','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(7,'Ninh Binh','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(8,'Ha Tinh','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(9,'Kon Tum','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(10,'Ha Giang','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(11,'Vinh Phuc','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(12,'Thanh Hoa','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL),(13,'Ha Nam','Vietnam',0.00,0.00,0.00,0.00,0.00,1,NULL,NULL);
/*!40000 ALTER TABLE `shipping_charges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Nguyen Van Nam','','',1,NULL,NULL),(2,'Tran Van Bao','','',1,NULL,NULL),(3,'Nguyen Van Hoang','','',1,NULL,NULL),(4,'Nguyen Thi Ngoc','','',1,NULL,NULL),(5,'Thai Van Hoang','','',1,NULL,NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test12',NULL,NULL,NULL,NULL,NULL,'0123456712','no@gmail.com',NULL,'$2y$10$1wQSh4DjU7mVxfZW0qBiaOWv5VAVcM/ilWQac1mGaEBhjIn2v7usG',1,NULL,'2023-03-25 02:23:09','2023-04-08 07:13:59'),(3,'user1',NULL,NULL,NULL,NULL,NULL,'01293938121','user@gmail.com',NULL,'$2y$10$4a8Mzrtmm7MhmGEEG5eZcu0xskt1jtZRYTVUMKBcVUjyfb7znMrMy',1,NULL,'2023-03-25 02:24:11','2023-03-30 08:18:32'),(6,'Test user1',NULL,NULL,NULL,NULL,NULL,'0123456743','user1@gmail.com',NULL,'$2y$10$q5.7hI30ufM6HMAcbG8xae7Ys7BGRAILj8XP5IzrGiomNGFJWe1Qq',0,NULL,'2023-03-25 02:26:54','2023-03-30 08:18:26'),(18,'Bui Duc','','','','Vietnam','123456','0909998887','test1292@gmail.com',NULL,'$2y$10$BmXX6uZbVeLpFHGGxD9Ht.WtkN6KhffirQmtHmzSjEOLLQynIDbey',1,NULL,'2023-03-25 08:35:38','2023-03-26 02:46:34'),(19,'Duc Bui 99',NULL,NULL,NULL,NULL,NULL,'0900999089','test1999@gmail.com',NULL,'$2y$10$4iFN6peqFygA8hms9tMOge9c/TTuuHEKufgxNoIIGowSDCR.txuaS',1,NULL,'2023-04-03 07:08:02','2023-04-03 07:08:48'),(20,'Test 123',NULL,NULL,NULL,NULL,NULL,'0236526365','check@gmail.com',NULL,'$2y$10$2fbVyngDKx1vCtHzzl7VvuwcVOUty8Wc.Va8FPwtww7d16PkmSske',0,NULL,'2023-04-22 06:28:30','2023-04-22 06:28:30'),(21,'Bui Duc',NULL,NULL,NULL,NULL,NULL,'0355913199','ducbui1211@gmail.com',NULL,'$2y$10$yak0fbV8DRzpNZgKg8ioCOwFO0BhuyzgBY7UwBrerh33m/c/Kmnui',1,NULL,'2023-04-22 18:07:16','2023-04-22 18:11:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `confirm` enum('No','Yes') DEFAULT 'No',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'Test','Vendor','An Duong Vuong','Vinh','Delhi',NULL,'110001','0822520299','duc@gmail.com','No',0,NULL,'2023-02-25 06:25:12'),(3,'Đức','Nguyễn',NULL,NULL,NULL,NULL,NULL,'0123456784','nguyen@gmail.com','No',0,'2023-03-12 08:34:56','2023-03-12 08:34:56'),(4,'lam','Nguyen',NULL,NULL,NULL,NULL,NULL,'0123456766','hoang@gmail.com','No',1,'2023-03-12 08:35:50','2023-04-09 01:54:30'),(5,'Đức','Hoan',NULL,NULL,NULL,NULL,NULL,'01234567645','hoan@gmail.com','No',0,'2023-03-12 08:38:11','2023-03-12 08:38:11'),(6,'hoang','Hoan',NULL,NULL,NULL,NULL,NULL,'0123456712','hoan1@gmail.com','No',1,'2023-03-12 08:40:32','2023-04-08 07:13:17'),(14,'hoang','test123',NULL,'Vinh','Nghe An','Vietnam',NULL,'0123456763','hoangtest1@gmail.com','Yes',0,'2023-03-15 01:34:06','2023-03-18 22:17:22');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors_bank_details`
--

DROP TABLE IF EXISTS `vendors_bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors_bank_details`
--

LOCK TABLES `vendors_bank_details` WRITE;
/*!40000 ALTER TABLE `vendors_bank_details` DISABLE KEYS */;
INSERT INTO `vendors_bank_details` VALUES (1,1,'Admin Test','VTB','0243530500022','24353563',NULL,NULL),(2,4,'Test Đức','VINH','123456564','VN1',NULL,NULL);
/*!40000 ALTER TABLE `vendors_bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors_business_details`
--

DROP TABLE IF EXISTS `vendors_business_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors_business_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_city` varchar(255) DEFAULT NULL,
  `shop_state` varchar(255) DEFAULT NULL,
  `shop_country` varchar(255) DEFAULT NULL,
  `shop_pincode` varchar(255) DEFAULT NULL,
  `shop_mobile` varchar(255) DEFAULT NULL,
  `shop_website` varchar(255) DEFAULT NULL,
  `shop_email` varchar(255) DEFAULT NULL,
  `address_proof` varchar(255) DEFAULT NULL,
  `address_proof_image` varchar(255) DEFAULT NULL,
  `business_license_number` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors_business_details`
--

LOCK TABLES `vendors_business_details` WRITE;
/*!40000 ALTER TABLE `vendors_business_details` DISABLE KEYS */;
INSERT INTO `vendors_business_details` VALUES (1,1,'Store1 111','An Duong Vuong','Vinh','Nghe An',NULL,'110001','0355913199','datn.com','admin@gmail.com','Passpost','','132435355','446466446','242355346',NULL,'2023-02-25 06:31:41'),(2,4,'Store Đức','Phan Bội Châu','Vinh','Nghệ An','Vietnam','PBC99','0129483374','PBC99.com','pbc@gmail.com','Passpost','','0125364',NULL,NULL,NULL,'2023-04-09 02:14:40'),(3,14,'Shop Test','Phan Bội Châu','Vinh','Nghệ An','Vietnam','PBC99','0129483374','PBC99.com','pbc@gmail.com','Passpost','','112345',NULL,NULL,NULL,'2023-03-18 21:41:09'),(15,14,'Shop Test111','Phan Bội Châu','Vinh','Nghệ An','Vietnam','PBC99','0129483374','PBC99.com','pbc@gmail.com','Passpost','','112345',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `vendors_business_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-05 21:50:20
