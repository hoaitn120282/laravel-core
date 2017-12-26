-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: cms-core
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `site_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_sanmax_hosting` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `contact_info` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (41,0,'','1',NULL,NULL,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_database`
--

DROP TABLE IF EXISTS `site_database`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_database` (
  `site_database_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `database_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `table_prefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`site_database_id`),
  KEY `site_database_site_id_foreign` (`site_id`),
  CONSTRAINT `site_database_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_database`
--

LOCK TABLES `site_database` WRITE;
/*!40000 ALTER TABLE `site_database` DISABLE KEYS */;
INSERT INTO `site_database` VALUES (41,41,'',NULL,'',NULL,'','$2y$10$/vytxw2q5e9y6/A53JXBv.GsaJnjZ5zb3xc09bCVYhbviiQGO20Ea',NULL,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12');
/*!40000 ALTER TABLE `site_database` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_hosting`
--

DROP TABLE IF EXISTS `site_hosting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_hosting` (
  `site_hosting_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`site_hosting_id`),
  KEY `site_hosting_site_id_foreign` (`site_id`),
  CONSTRAINT `site_hosting_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_hosting`
--

LOCK TABLES `site_hosting` WRITE;
/*!40000 ALTER TABLE `site_hosting` DISABLE KEYS */;
INSERT INTO `site_hosting` VALUES (41,41,'',NULL,'henry.tran@qsoft.com.vn','$2y$10$KdBb0sXOYwkTm0Y84i53u.baLOvX1p3QOakIuj0lc0HLAcq06/ePe',NULL,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12');
/*!40000 ALTER TABLE `site_hosting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_info`
--

DROP TABLE IF EXISTS `site_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_info` (
  `site_info_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `telephone` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_slogan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`site_info_id`),
  KEY `site_info_site_id_foreign` (`site_id`),
  CONSTRAINT `site_info_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_info`
--

LOCK TABLES `site_info` WRITE;
/*!40000 ALTER TABLE `site_info` DISABLE KEYS */;
INSERT INTO `site_info` VALUES (41,41,2147483647,'rose test','rose test',NULL,'Rose','rose@gmail.com',NULL,NULL,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12');
/*!40000 ALTER TABLE `site_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_language`
--

DROP TABLE IF EXISTS `site_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_language` (
  `site_language_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`site_language_id`),
  KEY `site_language_site_id_foreign` (`site_id`),
  KEY `site_language_language_id_foreign` (`language_id`),
  CONSTRAINT `site_language_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE,
  CONSTRAINT `site_language_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_language`
--

LOCK TABLES `site_language` WRITE;
/*!40000 ALTER TABLE `site_language` DISABLE KEYS */;
INSERT INTO `site_language` VALUES (106,41,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12',11),(107,41,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12',12),(108,41,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12',13),(109,41,NULL,'2017-03-17 08:02:12','2017-03-17 08:02:12',14);
/*!40000 ALTER TABLE `site_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_theme`
--

DROP TABLE IF EXISTS `site_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_theme` (
  `site_theme_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `theme_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`site_theme_id`),
  KEY `site_theme_site_id_foreign` (`site_id`),
  KEY `site_theme_theme_id_foreign` (`theme_id`),
  CONSTRAINT `site_theme_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `site_theme_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_theme`
--

LOCK TABLES `site_theme` WRITE;
/*!40000 ALTER TABLE `site_theme` DISABLE KEYS */;
INSERT INTO `site_theme` VALUES (107,41,304,'2017-03-17 08:05:53','2017-03-17 08:05:53',NULL);
/*!40000 ALTER TABLE `site_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `parent` bigint(20) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comments_email_unique` (`email`),
  KEY `comments_post_id_index` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `country_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'English','en',NULL,NULL,NULL),(2,'Dutch','nl',NULL,NULL,NULL),(3,'German','de',NULL,NULL,NULL),(4,'French','fr',NULL,NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Gallery Slider',1,NULL,NULL,NULL),(2,'Slider',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) unsigned NOT NULL,
  `image_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_description` text COLLATE utf8_unicode_ci NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_id_index` (`gallery_id`),
  CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'1489465563-Chrysanthemum.jpg','Why do we use it?','http://www.lipsum.com/','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',1,NULL,NULL,NULL),(2,1,'1478182208-images (1).jpg','What is Lorem Ipsum?','http://www.lipsum.com/','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',1,NULL,NULL,NULL),(3,1,'1478182065-images1236346_1926933_787295351331675_9172257670834369168_n.jpg','Where can I get some?','','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',1,NULL,NULL,NULL),(4,1,'1478182081-hurghada.JPG',' Where does it come from?','http://www.lipsum.com/','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',1,NULL,NULL,NULL),(5,1,'1478184014-images.jpg','The standard Lorem Ipsum passage, used since the 1500s','http://www.lipsum.com/','\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"',1,NULL,NULL,NULL),(6,2,'1489053398-content-img.jpg','','','',1,NULL,NULL,NULL),(7,2,'1489053406-content-img.jpg','','','',1,NULL,NULL,NULL),(8,1,'1489737960-Hydrangeas.jpg','','','',1,NULL,NULL,NULL),(9,1,'1489738005-8616670b3f511795137c65ef0151c3f2.jpg','','','',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `language_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`language_id`),
  KEY `language_country_id_foreign` (`country_id`),
  CONSTRAINT `language_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (11,3,'German','','',1,NULL,NULL,NULL),(12,2,'Dutch','','',1,NULL,NULL,NULL),(13,4,'French','','',1,NULL,NULL,NULL),(14,1,'English','','',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_roles_table',1),('2014_10_12_000001_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_06_05_151525_create_table_articles',1),('2016_07_22_213333_create_table_term_relationships',1),('2016_07_23_103628_create_table_term_taxonomy',1),('2016_07_23_103647_create_table_terms',1),('2016_07_23_105531_create_table_article_meta',1),('2016_08_18_143846_create_options_table',1),('2016_08_24_190534_create_table_themes',1),('2016_08_25_151736_create_table_theme_meta',1),('2016_08_26_082921_create_table_widget_groups',1),('2016_08_26_082938_create_table_widget',1),('2016_08_31_100931_create_table_user_meta',1),('2016_08_31_151324_create_table_comments',1),('2016_11_01_081606_galleries',1),('2016_11_01_081617_gallery_images',1),('2016_11_11_035809_add_provider_to_users_table',2),('2017_02_17_072353_create_site_table',2),('2017_02_17_075212_create_site_database_table',2),('2017_02_17_075510_create_site_hosting_table',2),('2017_02_17_075520_create_site_info_table',2),('2017_02_17_091202_create_post_translations_table',2),('2017_02_17_092510_create_countries_table',2),('2017_02_17_092547_create_language_table',2),('2017_02_17_092951_create_site_language_table',2),('2017_02_21_033231_create_theme_type_table',2),('2017_02_21_034328_add_publish_parent_to_theme_table',3),('2016_11_03_153632_create_contacts_table',4),('2017_02_28_071937_drop_theme_id_from_site_table',4),('2017_02_28_080337_create_site_theme_table',4),('2017_02_28_102355_add_status_to_site_table',4),('2017_03_02_121655_add_field_machine_name_to_themes',5),('2017_03_03_074358_add_telephone_to_site_info_table',5),('2017_03_07_071127_update_foreign_key_language_table',5),('2017_03_13_025012_add_status_to_language_table',6),('2017_03_13_033156_translate_table',6),('2017_03_14_125332_create_term_translations_tabel',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'site_title','QSoft Vietnam'),(2,'site_tagline','Content Management System'),(3,'email_administrator','hoaitn@qsoft.com.vn'),(4,'frontpage_blog','0'),(5,'view_post_index','10'),(6,'image_thumbnail_width','150'),(7,'image_thumbnail_height','150'),(8,'image_medium_width','300'),(9,'image_medium_height','300'),(10,'image_large_width','1024'),(11,'image_large_height','800'),(12,'menu_name','a:14:{i:0;s:9:\"main-menu\";i:1;s:11:\"tes-website\";i:2;s:12:\"test-website\";i:3;s:12:\"test-website\";i:4;s:10:\"about-us-2\";i:5;s:12:\"social-media\";i:6;s:5:\"forum\";i:7;s:6:\"doctor\";i:8;s:9:\"test-menu\";i:9;s:9:\"test-menu\";i:10;s:9:\"rose-test\";i:11;s:14:\"rose-test-menu\";i:12;s:16:\"test-create-menu\";i:13;s:8:\"xus-menu\";}'),(13,'show_on_front','page'),(14,'page_on_front','post-12');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('henry.tran@qsoft.com.vn','6a280be624b30307007e1daf901aa8ddb038da3cbec2d853fb0a6b87c37aa51a','2016-11-16 02:12:16');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_meta`
--

DROP TABLE IF EXISTS `post_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_meta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `post_meta_post_id_index` (`post_id`),
  KEY `post_meta_meta_key_index` (`meta_key`),
  CONSTRAINT `post_meta_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=644 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_meta`
--

LOCK TABLES `post_meta` WRITE;
/*!40000 ALTER TABLE `post_meta` DISABLE KEYS */;
INSERT INTO `post_meta` VALUES (221,128,'_nav_item_parent','132'),(222,128,'_nav_item_url','qui-totam-nisi-natus-quaerat-asperiores-laboriosam-modi'),(223,128,'_nav_item_type','post'),(224,129,'_nav_item_parent','132'),(225,129,'_nav_item_url','maiores-voluptatem-alias-non-et-rem'),(226,129,'_nav_item_type','post'),(227,130,'_nav_item_parent','132'),(228,130,'_nav_item_url','ea-quia-corporis-incidunt-voluptatibus'),(229,130,'_nav_item_type','post'),(230,131,'_nav_item_parent','132'),(231,131,'_nav_item_url','nisi-rerum-ut-hic-optio-quisquam-cum'),(232,131,'_nav_item_type','post'),(233,132,'_nav_item_parent',''),(234,132,'_nav_item_url','http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com'),(235,132,'_nav_item_type','home'),(236,133,'_nav_item_parent',''),(237,133,'_nav_item_url','http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com'),(238,133,'_nav_item_type','home'),(252,138,'_file_size','37797'),(253,139,'_file_size','24512'),(263,143,'_file_size','142685'),(272,147,'_file_size','6722979'),(363,183,'_file_size','106600'),(369,186,'_file_size','466252'),(389,194,'_file_size','487886'),(396,197,'_file_size','217859'),(432,211,'_file_size','37797'),(433,212,'_file_size','4658'),(436,214,'_file_size','879394'),(501,238,'_file_size','845941'),(517,246,'_file_size','487886'),(529,252,'_nav_item_parent',''),(530,252,'_nav_item_url',''),(531,252,'_nav_item_type','home'),(535,254,'_nav_item_parent',''),(536,254,'_nav_item_url','contact'),(537,254,'_nav_item_type','page'),(538,255,'_nav_item_parent',''),(539,255,'_nav_item_url','info-for-patient'),(540,255,'_nav_item_type','page'),(541,256,'_nav_item_parent',''),(542,256,'_nav_item_url','news'),(543,256,'_nav_item_type','page'),(550,259,'_nav_item_parent',''),(551,259,'_nav_item_url','dr'),(552,259,'_nav_item_type','category'),(570,266,'_nav_item_parent',''),(571,266,'_nav_item_url','xus-page'),(572,266,'_nav_item_type','page'),(632,287,'layout',''),(633,287,'featured_img',''),(634,288,'layout',''),(635,288,'featured_img',''),(638,290,'layout',''),(639,290,'featured_img',''),(640,291,'layout',''),(641,291,'featured_img',''),(642,292,'layout',''),(643,292,'featured_img','');
/*!40000 ALTER TABLE `post_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_translations`
--

DROP TABLE IF EXISTS `post_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_translations` (
  `post_translations_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `post_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_translations_id`),
  KEY `post_translations_post_id_foreign` (`post_id`),
  CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=430 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_translations`
--

LOCK TABLES `post_translations` WRITE;
/*!40000 ALTER TABLE `post_translations` DISABLE KEYS */;
INSERT INTO `post_translations` VALUES (49,183,'en','8616670b3f511795137c65ef0151c3f2','','',NULL,'2017-03-15 08:24:11','2017-03-15 08:24:11'),(54,186,'en','0205080_PE360076_S5','','',NULL,'2017-03-15 08:42:44','2017-03-15 08:42:44'),(67,194,'en','Chrysanthemum','','',NULL,'2017-03-15 10:03:33','2017-03-15 10:03:33'),(68,197,'en','Creative Bookshelf 211__700','','',NULL,'2017-03-15 10:27:15','2017-03-15 10:27:15'),(117,211,'en','Doctor 2','','',NULL,'2017-03-16 05:56:10','2017-03-16 05:56:10'),(118,212,'en','Logo','','',NULL,'2017-03-16 05:59:23','2017-03-16 05:59:23'),(123,214,'en','Chrysanthemum','','',NULL,'2017-03-16 08:00:28','2017-03-16 08:00:28'),(216,238,'en','Desert','','',NULL,'2017-03-16 08:14:58','2017-03-16 08:14:58'),(245,246,'en','Chrysanthemum','','',NULL,'2017-03-16 08:50:05','2017-03-16 08:50:05'),(266,252,'fr','Home','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(267,252,'en','Home','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(268,252,'nl','Home','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(269,252,'de','Home','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(274,254,'fr','contact us','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(275,254,'en','Contact','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(276,254,'nl','Contact Us','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(277,254,'de','contact german','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(278,255,'fr','Info for patient in French','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(279,255,'en','Info for patient','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(280,255,'nl','Info for patient in Dutch','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(281,255,'de','Info for patient in German','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(282,256,'fr','News in French','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(283,256,'en','News','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(284,256,'nl','News in Dutch','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(285,256,'de','News is German','','',NULL,'2017-03-16 10:11:14','2017-03-16 10:11:14'),(294,259,'fr','Doctor in Fr','','',NULL,'2017-03-16 10:12:38','2017-03-16 10:12:38'),(295,259,'en','Doctor in EN','','',NULL,'2017-03-16 10:12:38','2017-03-16 10:12:38'),(296,259,'nl','Doctor in Du','','',NULL,'2017-03-16 10:12:38','2017-03-16 10:12:38'),(297,259,'de','Doctor in Gr','','',NULL,'2017-03-16 10:12:38','2017-03-16 10:12:38'),(322,266,'fr','','','',NULL,'2017-03-16 10:49:35','2017-03-16 10:49:35'),(323,266,'en','Xu\'s page','','',NULL,'2017-03-16 10:49:35','2017-03-16 10:49:35'),(324,266,'nl','','','',NULL,'2017-03-16 10:49:35','2017-03-16 10:49:35'),(325,266,'de','','','',NULL,'2017-03-16 10:49:35','2017-03-16 10:49:35'),(406,287,'fr','Home_FR','','<p>xzbfuwhdjnsc</p>',NULL,'2017-03-17 07:35:06','2017-03-17 07:35:06'),(407,287,'en','Home_EN','','<p>dskhoiwhkjnxz</p>',NULL,'2017-03-17 07:35:06','2017-03-17 07:35:06'),(408,287,'nl','Home_Du','','<p>sbjckjhldoih</p>',NULL,'2017-03-17 07:35:06','2017-03-17 07:35:06'),(409,287,'de','Home_GR','','<p>bfjheuihklncnzm</p>',NULL,'2017-03-17 07:35:06','2017-03-17 07:35:06'),(410,288,'fr','Contact_FR','','<p>zdgwuidgbhj</p>',NULL,'2017-03-17 07:36:04','2017-03-17 07:36:04'),(411,288,'en','Contact_EN','','<p>scaygdjk nc</p>',NULL,'2017-03-17 07:36:04','2017-03-17 07:36:04'),(412,288,'nl','Contact_Du','','<p>cb ạbdhnjcns</p>',NULL,'2017-03-17 07:36:04','2017-03-17 07:36:04'),(413,288,'de','Contact_Gr','','<p>zjbnjenckznklnj kdnjk</p>',NULL,'2017-03-17 07:36:04','2017-03-17 07:45:08'),(418,290,'fr','Info for Patient_FR','','<p>xgsegbdfb</p>',NULL,'2017-03-17 07:45:38','2017-03-17 07:45:38'),(419,290,'en','Info for patient_EN','','<p>sdgvcbdbv</p>',NULL,'2017-03-17 07:45:38','2017-03-17 07:45:38'),(420,290,'nl','','','',NULL,'2017-03-17 07:45:38','2017-03-17 07:45:38'),(421,290,'de','','','',NULL,'2017-03-17 07:45:38','2017-03-17 07:45:38'),(422,291,'fr','News_Fr','','<p>bdsdgasdubg</p>',NULL,'2017-03-17 07:52:48','2017-03-17 07:52:48'),(423,291,'en','News_EN','','<p>bcvhjsgfuhjxh</p>',NULL,'2017-03-17 07:52:48','2017-03-17 07:52:48'),(424,291,'nl','','','',NULL,'2017-03-17 07:52:48','2017-03-17 07:52:48'),(425,291,'de','','','',NULL,'2017-03-17 07:52:48','2017-03-17 07:52:48'),(426,292,'en','What is this \'Lorem Ipsum\' or \'Lorum Ipsum\' stuff?','','<p style=\"margin-top: 9px; margin-bottom: 9px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; background: transparent; line-height: 18px; font-family: Helvetica, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Videmus igitur ut conquiescere ne infantes quidem possint. An est aliquid per se ipsum flagitiosum, etiamsi nulla comitetur infamia? Idem iste, inquam, de voluptate quid sentit?</p><p style=\"margin-top: 9px; margin-bottom: 9px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; background: transparent; line-height: 18px; font-family: Helvetica, Arial, sans-serif;\">Plane idem, inquit, et maxima quidem, qua fieri nulla maior potest. Tu vero, inquam, ducas licet, si sequetur; Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Ut proverbia non nulla veriora sint quam vestra dogmata. Duo Reges: constructio interrete. Quantum Aristoxeni ingenium consumptum videmus in musicis? Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Est igitur officium eius generis, quod nec in bonis ponatur nec in contrariis. Cur id non ita fit? Aliter enim explicari, quod quaeritur, non potest. Idem iste, inquam, de voluptate quid sentit? Non igitur de improbo, sed de callido improbo quaerimus, qualis Q.</p><p style=\"margin-top: 9px; margin-bottom: 9px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; background: transparent; line-height: 18px; font-family: Helvetica, Arial, sans-serif;\">Haec bene dicuntur, nec ego repugno, sed inter sese ipsa pugnant. Sed ego in hoc resisto; Sed tu istuc dixti bene Latine, parum plane. Si verbum sequimur, primum longius verbum praepositum quam bonum.</p><p style=\"margin-top: 9px; margin-bottom: 9px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; background: transparent; line-height: 18px; font-family: Helvetica, Arial, sans-serif;\">Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Hoc non est positum in nostra actione. Quae similitudo in genere etiam humano apparet. Hinc ceteri particulas arripere conati suam quisque videro voluit afferre sententiam.</p><p style=\"margin-top: 9px; margin-bottom: 9px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; background: transparent; line-height: 18px; font-family: Helvetica, Arial, sans-serif;\">Scisse enim te quis coarguere possit? Animum autem reliquis rebus ita perfecit, ut corpus; Quae cum essent dicta, discessimus. Stuprata per vim Lucretia a regis filio testata civis se ipsa interemit. Hoc non est positum in nostra actione. Cur id non ita fit? Negat esse eam, inquit, propter se expetendam. Etenim semper illud extra est, quod arte comprehenditur. Non potes, nisi retexueris illa</p>',NULL,'2017-03-17 08:03:20','2017-03-17 08:03:20'),(427,292,'fr','What is this \'Lorem Ipsum\' or \'Lorum Ipsum\' stuff?_FR','','<p style=\"text-align: justify; margin-top: 9px; margin-bottom: 9px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; background: transparent; line-height: 18px; font-family: Helvetica, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Videmus igitur ut conquiescere ne infantes quidem possint. An est aliquid per se ipsum flagitiosum, etiamsi nulla comitetur infamia? Idem iste, inquam, de voluptate quid sentit?<br>Plane idem, inquit, et maxima quidem, qua fieri nulla maior potest. Tu vero, inquam, ducas licet, si sequetur; Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Ut proverbia non nulla veriora sint quam vestra dogmata. Duo Reges: constructio interrete. Quantum Aristoxeni ingenium consumptum videmus in musicis? Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Est igitur officium eius generis, quod nec in bonis ponatur nec in contrariis. Cur id non ita fit? Aliter enim explicari, quod quaeritur, non potest. Idem iste, inquam, de voluptate quid sentit? Non igitur de improbo, sed de callido improbo quaerimus, qualis Q.<br>Haec bene dicuntur, nec ego repugno, sed inter sese ipsa pugnant. Sed ego in hoc resisto; Sed tu istuc dixti bene Latine, parum plane. Si verbum sequimur, primum longius verbum praepositum quam bonum.<br>Paulum, cum regem Persem captum adduceret, eodem<img src=\"http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/uploads/chrysanthemum.jpg\" style=\"width: 564px;\"> flumine invectio? Hoc non est positum in nostra actione. Quae similitudo in genere etiam humano apparet. Hinc ceteri particulas arripere conati suam quisque videro voluit afferre sententiam.<br>Scisse enim te quis coarguere possit? Animum autem reliquis rebus ita perfecit, ut corpus; Quae cum essent dicta, discessimus. Stuprata per vim Lucretia a regis filio testata civis se ipsa interemit. Hoc non est positum in nostra actione. Cur id non ita fit? Negat esse eam, inquit, propter se expetendam. Etenim semper illud extra est, quod arte comprehenditur. Non potes, nisi retexueris illa</p>',NULL,'2017-03-17 08:03:20','2017-03-17 08:03:20'),(428,292,'nl','','','',NULL,'2017-03-17 08:03:20','2017-03-17 08:03:20'),(429,292,'de','','','',NULL,'2017-03-17 08:03:20','2017-03-17 08:03:20');
/*!40000 ALTER TABLE `post_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` int(10) unsigned NOT NULL DEFAULT '0',
  `post_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `post_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_parent` bigint(20) NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `menu_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `post_hit` int(11) NOT NULL DEFAULT '0',
  `post_mime_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_post_author_foreign` (`post_author`),
  CONSTRAINT `posts_post_author_foreign` FOREIGN KEY (`post_author`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=293 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (29,1,'','Logo','','inherit','open','','logo.jpg',0,'',0,'','attachment',0,'image/jpeg','2016-11-03 17:24:06','2016-11-03 17:24:06'),(128,1,'','Qui totam nisi natus quaerat asperiores laboriosam modi.','','publish','close','','qui-totam-nisi-natus-quaerat-asperiores-laboriosam-modi',0,'',2,'about-us-2','nav-menu',0,'nav-menu','2017-03-09 03:01:22','2017-03-09 03:02:01'),(129,1,'','Maiores voluptatem alias non et rem.','','publish','close','','maiores-voluptatem-alias-non-et-rem',0,'',3,'about-us-2','nav-menu',0,'nav-menu','2017-03-09 03:01:22','2017-03-09 03:02:01'),(130,1,'','Ea quia corporis incidunt voluptatibus.','','publish','close','','ea-quia-corporis-incidunt-voluptatibus',0,'',4,'about-us-2','nav-menu',0,'nav-menu','2017-03-09 03:01:22','2017-03-09 03:02:01'),(131,1,'','Nisi rerum ut hic optio quisquam cum.','','publish','close','','nisi-rerum-ut-hic-optio-quisquam-cum',0,'',5,'about-us-2','nav-menu',0,'nav-menu','2017-03-09 03:01:22','2017-03-09 03:02:01'),(132,1,'','Home','','publish','close','','home',0,'',1,'about-us-2','nav-menu',0,'nav-menu','2017-03-09 03:01:39','2017-03-09 03:02:01'),(133,1,'','Home','','publish','close','','home',0,'',0,'about-us-2','nav-menu',0,'nav-menu','2017-03-09 03:02:12','2017-03-09 03:02:12'),(138,1,'','Doctor 2','','inherit','open','','doctor-2.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-09 09:55:12','2017-03-09 09:55:12'),(139,1,'','Doctor 1','','inherit','open','','doctor-1.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-09 09:57:34','2017-03-09 09:57:34'),(143,1,'','Content Img','','inherit','open','','content-img.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-09 10:00:53','2017-03-09 10:00:53'),(147,1,'','IMG_5113','','inherit','open','','img-5113.JPG',0,'',0,'','attachment',0,'image/jpeg','2017-03-10 02:56:17','2017-03-10 02:56:17'),(183,1,'','','','inherit','open','','8616670b3f511795137c65ef0151c3f2.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-15 08:24:11','2017-03-15 08:24:11'),(186,1,'','','','inherit','open','','0205080-pe360076-s5.JPG',0,'',0,'','attachment',0,'image/jpeg','2017-03-15 08:42:44','2017-03-15 08:42:44'),(194,1,'','','','inherit','open','','chrysanthemum.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-15 10:03:33','2017-03-15 10:03:33'),(197,1,'','','','inherit','open','','creative-bookshelf-211-700.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-15 10:27:15','2017-03-15 10:27:15'),(211,1,'','','','inherit','open','','doctor-2.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-16 05:56:10','2017-03-16 05:56:10'),(212,1,'','','','inherit','open','','logo.png',0,'',0,'','attachment',0,'image/png','2017-03-16 05:59:23','2017-03-16 05:59:23'),(214,1,'','','','inherit','open','','chrysanthemum.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-16 08:00:28','2017-03-16 08:00:28'),(238,1,'','','','inherit','open','','desert.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-16 08:14:58','2017-03-16 08:14:58'),(246,1,'','','','inherit','open','','chrysanthemum.jpg',0,'',0,'','attachment',0,'image/jpeg','2017-03-16 08:50:05','2017-03-16 08:50:05'),(252,1,'','','','publish','close','','home',0,'',1,'xus-menu','nav-menu',0,'nav-menu','2017-03-16 10:11:14','2017-03-16 10:49:58'),(254,1,'','','','publish','close','','contact-german',0,'',3,'xus-menu','nav-menu',0,'nav-menu','2017-03-16 10:11:14','2017-03-16 10:49:58'),(255,1,'','','','publish','close','','info-for-patient-in-german',0,'',4,'xus-menu','nav-menu',0,'nav-menu','2017-03-16 10:11:14','2017-03-16 10:49:58'),(256,1,'','','','publish','close','','news-is-german',0,'',5,'xus-menu','nav-menu',0,'nav-menu','2017-03-16 10:11:14','2017-03-16 10:49:58'),(259,1,'','','','publish','close','','doctor-in-en',0,'',6,'xus-menu','nav-menu',0,'nav-menu','2017-03-16 10:12:38','2017-03-16 10:49:58'),(266,1,'','','','publish','close','','xus-page',0,'',7,'xus-menu','nav-menu',0,'nav-menu','2017-03-16 10:49:35','2017-03-16 10:49:58'),(287,1,'','','','publish','open','','home-en',0,'',0,'','page',0,'post','2017-03-17 07:35:06','2017-03-17 07:35:06'),(288,1,'','','','publish','open','','contact-en',0,'',0,'','page',0,'post','2017-03-17 07:36:04','2017-03-17 07:36:04'),(290,1,'','','','publish','open','','info-for-patient-en',0,'',0,'','page',0,'post','2017-03-17 07:45:38','2017-03-17 07:45:38'),(291,1,'','','','publish','open','','news-en',0,'',0,'','page',0,'post','2017-03-17 07:52:48','2017-03-17 07:52:48'),(292,1,'','','','publish','close','','what-is-this-lorem-ipsum-or-lorum-ipsum-stuff',0,'',0,'','post',0,'post','2017-03-17 08:03:20','2017-03-17 08:03:20');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','This is super admin',1,NULL,NULL,NULL),(2,'Editor','This is sub-admin who will be manage content',1,NULL,NULL,NULL),(3,'User','This is normal user',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term_relationships`
--

DROP TABLE IF EXISTS `term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_relationships_term_taxonomy_id_index` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term_relationships`
--

LOCK TABLES `term_relationships` WRITE;
/*!40000 ALTER TABLE `term_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term_translations`
--

DROP TABLE IF EXISTS `term_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `term_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `term_translations_term_id_foreign` (`term_id`),
  CONSTRAINT `term_translations_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`term_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term_translations`
--

LOCK TABLES `term_translations` WRITE;
/*!40000 ALTER TABLE `term_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `term_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taxonomy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_group` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `terms_slug_index` (`slug`),
  KEY `terms_name_index` (`name`),
  KEY `terms_taxonomy_index` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms`
--

LOCK TABLES `terms` WRITE;
/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_meta`
--

DROP TABLE IF EXISTS `theme_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme_meta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theme_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `theme_meta_theme_id_index` (`theme_id`),
  KEY `theme_meta_meta_key_index` (`meta_key`),
  CONSTRAINT `theme_meta_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2430 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_meta`
--

LOCK TABLES `theme_meta` WRITE;
/*!40000 ALTER TABLE `theme_meta` DISABLE KEYS */;
INSERT INTO `theme_meta` VALUES (1134,146,'menu_position','menu-top',''),(1135,146,'menu_position','menu-bottom',''),(1136,146,'menu_position','menu-left',''),(1137,146,'menu_position','menu-right',''),(1138,146,'options','general','a:4:{i:0;a:4:{s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:11:\"imageupload\";s:5:\"value\";s:13:\"Default Theme\";s:5:\"label\";s:4:\"Logo\";}i:1;a:4:{s:4:\"name\";s:13:\"feature_image\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:57:\"http://sbd639.loc/uploads/hoangdv-log-checkout-240117.png\";s:5:\"label\";s:13:\"Feature image\";}i:2;a:4:{s:4:\"name\";s:9:\"copyright\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:28:\"Copyright &copy; 2016 ITLSVN\";s:5:\"label\";s:14:\"Copyright Text\";}i:3;a:4:{s:4:\"name\";s:9:\"customcss\";s:4:\"type\";s:8:\"textarea\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:10:\"Custom CSS\";}}'),(1139,146,'options','social_media','a:4:{i:0;a:4:{s:4:\"name\";s:8:\"facebook\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:8:\"Facebook\";}i:1;a:4:{s:4:\"name\";s:7:\"twitter\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Twitter\";}i:2;a:4:{s:4:\"name\";s:11:\"google_plus\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:11:\"Google Plus\";}i:3;a:4:{s:4:\"name\";s:7:\"youtube\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Youtube\";}}'),(1140,146,'options','layouts','a:1:{i:0;a:5:{s:4:\"name\";s:12:\"layout_style\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:5:{s:13:\"right-sidebar\";s:13:\"Right Sidebar\";s:12:\"left-sidebar\";s:12:\"Left Sidebar\";s:12:\"none-sidebar\";s:12:\"None Sidebar\";s:14:\"center-content\";s:14:\"Center Content\";s:7:\"content\";s:7:\"Content\";}s:5:\"value\";s:12:\"none-sidebar\";s:5:\"label\";s:12:\"Layout Style\";}}'),(1141,146,'options','typography','a:6:{i:0;a:4:{s:4:\"name\";s:7:\"general\";s:5:\"label\";s:0:\"\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:2:{i:0;a:4:{s:4:\"name\";s:16:\"background_image\";s:5:\"label\";s:16:\"Background image\";s:5:\"value\";s:57:\"http://sbd639.loc/uploads/hoangdv-log-checkout-240117.png\";s:4:\"type\";s:12:\"input_upload\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:6:\"tahoma\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:2:{s:5:\"arial\";s:5:\"Arial\";s:6:\"tahoma\";s:6:\"Tahoma\";}}}}i:1;a:4:{s:4:\"name\";s:10:\"site_title\";s:5:\"label\";s:10:\"Site title\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:2:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:5:\"Color\";s:5:\"value\";s:7:\"#ff0000\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"16px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:3:{s:4:\"14px\";s:5:\"14 px\";s:4:\"15px\";s:5:\"15 px\";s:4:\"16px\";s:5:\"16 px\";}}}}i:2;a:4:{s:4:\"name\";s:7:\"sologan\";s:5:\"label\";s:7:\"Sologan\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:2:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:5:\"Color\";s:5:\"value\";s:7:\"#cccccc\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"15px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:3:{s:4:\"14px\";s:5:\"14 px\";s:4:\"15px\";s:5:\"15 px\";s:4:\"16px\";s:5:\"16 px\";}}}}i:3;a:4:{s:4:\"name\";s:4:\"text\";s:5:\"label\";s:4:\"Text\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:2:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:5:\"Color\";s:5:\"value\";s:7:\"#26B99A\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"15px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:3:{s:4:\"14px\";s:5:\"14 px\";s:4:\"15px\";s:5:\"15 px\";s:4:\"16px\";s:5:\"16 px\";}}}}i:4;a:4:{s:4:\"name\";s:4:\"link\";s:5:\"label\";s:4:\"Link\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:6:\"Normal\";s:5:\"value\";s:7:\"#f26726\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:4:{s:4:\"name\";s:11:\"color_hover\";s:5:\"label\";s:5:\"Hover\";s:5:\"value\";s:7:\"#6fcf6c\";s:4:\"type\";s:11:\"colorpicker\";}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"15px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:3:{s:4:\"14px\";s:5:\"14 px\";s:4:\"15px\";s:5:\"15 px\";s:4:\"16px\";s:5:\"16 px\";}}}}i:5;a:4:{s:4:\"name\";s:6:\"button\";s:5:\"label\";s:6:\"Button\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:5:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:6:\"Normal\";s:5:\"value\";s:7:\"#27b4f0\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:4:{s:4:\"name\";s:11:\"color_hover\";s:5:\"label\";s:10:\"Text Hover\";s:5:\"value\";s:7:\"#f26726\";s:4:\"type\";s:11:\"colorpicker\";}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"13px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:3:{s:4:\"13px\";s:5:\"13 px\";s:4:\"14px\";s:5:\"14 px\";s:4:\"15px\";s:5:\"15 px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#ea87ed\";s:4:\"type\";s:11:\"colorpicker\";}i:4;a:4:{s:4:\"name\";s:16:\"background_hover\";s:5:\"label\";s:16:\"Background Hover\";s:5:\"value\";s:7:\"#f26726\";s:4:\"type\";s:11:\"colorpicker\";}}}}'),(2398,304,'menu_position','menu-top',''),(2399,304,'menu_position','menu-bottom',''),(2400,304,'menu_position','menu-left',''),(2401,304,'menu_position','menu-right',''),(2402,304,'options','general','a:4:{i:0;a:4:{s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:4:\"Logo\";}i:1;a:4:{s:4:\"name\";s:16:\"background_image\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:16:\"Background image\";}i:2;a:4:{s:4:\"name\";s:9:\"copyright\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:28:\"Copyright &copy; 2016 ITLSVN\";s:5:\"label\";s:14:\"Copyright Text\";}i:3;a:4:{s:4:\"name\";s:9:\"customcss\";s:4:\"type\";s:8:\"textarea\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:10:\"Custom CSS\";}}'),(2403,304,'options','social_media','a:4:{i:0;a:4:{s:4:\"name\";s:8:\"facebook\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:8:\"Facebook\";}i:1;a:4:{s:4:\"name\";s:7:\"twitter\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Twitter\";}i:2;a:4:{s:4:\"name\";s:11:\"google_plus\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:11:\"Google Plus\";}i:3;a:4:{s:4:\"name\";s:7:\"youtube\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Youtube\";}}'),(2404,304,'options','layouts','a:1:{i:0;a:6:{s:4:\"name\";s:12:\"layout_style\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"right-sidebar\";s:13:\"Right Sidebar\";s:12:\"left-sidebar\";s:12:\"Left Sidebar\";s:12:\"none-sidebar\";s:12:\"None Sidebar\";s:14:\"center-content\";s:14:\"Center Content\";}s:5:\"value\";a:4:{s:13:\"right-sidebar\";s:13:\"Right Sidebar\";s:12:\"left-sidebar\";s:12:\"Left Sidebar\";s:12:\"none-sidebar\";s:12:\"None Sidebar\";s:14:\"center-content\";s:14:\"Center Content\";}s:6:\"xvalue\";a:1:{s:7:\"default\";s:13:\"right-sidebar\";}s:5:\"label\";s:12:\"Layout Style\";}}'),(2405,304,'options','typography','a:7:{i:0;a:4:{s:4:\"name\";s:10:\"site_title\";s:5:\"label\";s:10:\"Site title\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"20px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"25px\";s:4:\"25px\";s:4:\"26px\";s:4:\"26px\";s:4:\"27px\";s:4:\"27px\";s:4:\"28px\";s:4:\"28px\";s:4:\"29px\";s:4:\"29px\";s:4:\"30px\";s:4:\"30px\";s:4:\"31px\";s:4:\"31px\";s:4:\"32px\";s:4:\"32px\";s:4:\"33px\";s:4:\"33px\";s:4:\"34px\";s:4:\"34px\";s:4:\"35px\";s:4:\"35px\";}}}}i:1;a:4:{s:4:\"name\";s:6:\"slogan\";s:5:\"label\";s:6:\"Slogan\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:2;a:4:{s:4:\"name\";s:4:\"page\";s:5:\"label\";s:4:\"Text\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:3;a:4:{s:4:\"name\";s:4:\"link\";s:5:\"label\";s:4:\"Link\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";}}i:3;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:11:\"Hover color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:4;a:4:{s:4:\"name\";s:6:\"button\";s:5:\"label\";s:6:\"Button\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:6:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:16:\"Text hover color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:2;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#f48100\";s:4:\"type\";s:11:\"colorpicker\";}i:4;a:4:{s:4:\"name\";s:22:\"background_hover_color\";s:5:\"label\";s:22:\"Background hover color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:5;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:5;a:4:{s:4:\"name\";s:6:\"header\";s:5:\"label\";s:6:\"Header\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:6;a:4:{s:4:\"name\";s:6:\"footer\";s:5:\"label\";s:6:\"Footer\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#fafafa\";s:4:\"type\";s:11:\"colorpicker\";}}}}'),(2406,305,'menu_position','menu-top',''),(2407,305,'menu_position','menu-bottom',''),(2408,305,'menu_position','menu-left',''),(2409,305,'menu_position','menu-right',''),(2410,305,'options','general','a:4:{i:0;a:4:{s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:4:\"Logo\";}i:1;a:4:{s:4:\"name\";s:16:\"background_image\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:100:\"http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/uploads/creative-bookshelf-211-700.jpg\";s:5:\"label\";s:16:\"Background image\";}i:2;a:4:{s:4:\"name\";s:9:\"copyright\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:24:\"Copyright © 2016 ITLSVN\";s:5:\"label\";s:14:\"Copyright Text\";}i:3;a:4:{s:4:\"name\";s:9:\"customcss\";s:4:\"type\";s:8:\"textarea\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:10:\"Custom CSS\";}}'),(2411,305,'options','social_media','a:4:{i:0;a:4:{s:4:\"name\";s:8:\"facebook\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:8:\"Facebook\";}i:1;a:4:{s:4:\"name\";s:7:\"twitter\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Twitter\";}i:2;a:4:{s:4:\"name\";s:11:\"google_plus\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:11:\"Google Plus\";}i:3;a:4:{s:4:\"name\";s:7:\"youtube\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Youtube\";}}'),(2412,305,'options','layouts','a:1:{i:0;a:6:{s:4:\"name\";s:12:\"layout_style\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"right-sidebar\";s:13:\"Right Sidebar\";s:12:\"left-sidebar\";s:12:\"Left Sidebar\";s:12:\"none-sidebar\";s:12:\"None Sidebar\";s:14:\"center-content\";s:14:\"Center Content\";}s:5:\"value\";a:4:{s:13:\"right-sidebar\";s:13:\"right-sidebar\";s:12:\"left-sidebar\";s:12:\"left-sidebar\";s:12:\"none-sidebar\";s:12:\"none-sidebar\";s:14:\"center-content\";s:14:\"center-content\";}s:6:\"xvalue\";a:1:{s:7:\"default\";s:13:\"right-sidebar\";}s:5:\"label\";s:12:\"Layout Style\";}}'),(2413,305,'options','typography','a:7:{i:0;a:4:{s:4:\"name\";s:10:\"site_title\";s:5:\"label\";s:10:\"Site title\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#0015fc\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"35px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"25px\";s:4:\"25px\";s:4:\"26px\";s:4:\"26px\";s:4:\"27px\";s:4:\"27px\";s:4:\"28px\";s:4:\"28px\";s:4:\"29px\";s:4:\"29px\";s:4:\"30px\";s:4:\"30px\";s:4:\"31px\";s:4:\"31px\";s:4:\"32px\";s:4:\"32px\";s:4:\"33px\";s:4:\"33px\";s:4:\"34px\";s:4:\"34px\";s:4:\"35px\";s:4:\"35px\";}}}}i:1;a:4:{s:4:\"name\";s:6:\"slogan\";s:5:\"label\";s:6:\"Slogan\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:2;a:4:{s:4:\"name\";s:4:\"page\";s:5:\"label\";s:4:\"Text\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:3;a:4:{s:4:\"name\";s:4:\"link\";s:5:\"label\";s:4:\"Link\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";}}i:3;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:11:\"Hover color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:4;a:4:{s:4:\"name\";s:6:\"button\";s:5:\"label\";s:6:\"Button\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:6:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:16:\"Text hover color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:2;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#f48100\";s:4:\"type\";s:11:\"colorpicker\";}i:4;a:4:{s:4:\"name\";s:22:\"background_hover_color\";s:5:\"label\";s:22:\"Background hover color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:5;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:5;a:4:{s:4:\"name\";s:6:\"header\";s:5:\"label\";s:6:\"Header\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#8dced9\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:6;a:4:{s:4:\"name\";s:6:\"footer\";s:5:\"label\";s:6:\"Footer\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#87dbe6\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Italic\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#fafafa\";s:4:\"type\";s:11:\"colorpicker\";}}}}'),(2414,306,'menu_position','menu-top',''),(2415,306,'menu_position','menu-bottom',''),(2416,306,'menu_position','menu-left',''),(2417,306,'menu_position','menu-right',''),(2418,306,'options','general','a:4:{i:0;a:4:{s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:4:\"Logo\";}i:1;a:4:{s:4:\"name\";s:16:\"background_image\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:16:\"Background image\";}i:2;a:4:{s:4:\"name\";s:9:\"copyright\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:28:\"Copyright &copy; 2016 ITLSVN\";s:5:\"label\";s:14:\"Copyright Text\";}i:3;a:4:{s:4:\"name\";s:9:\"customcss\";s:4:\"type\";s:8:\"textarea\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:10:\"Custom CSS\";}}'),(2419,306,'options','social_media','a:4:{i:0;a:4:{s:4:\"name\";s:8:\"facebook\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:8:\"Facebook\";}i:1;a:4:{s:4:\"name\";s:7:\"twitter\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Twitter\";}i:2;a:4:{s:4:\"name\";s:11:\"google_plus\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:11:\"Google Plus\";}i:3;a:4:{s:4:\"name\";s:7:\"youtube\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Youtube\";}}'),(2420,306,'options','layouts','a:1:{i:0;a:6:{s:4:\"name\";s:12:\"layout_style\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"right-sidebar\";s:13:\"Right Sidebar\";s:12:\"left-sidebar\";s:12:\"Left Sidebar\";s:12:\"none-sidebar\";s:12:\"None Sidebar\";s:14:\"center-content\";s:14:\"Center Content\";}s:5:\"value\";a:4:{s:13:\"right-sidebar\";s:13:\"right-sidebar\";s:12:\"left-sidebar\";s:12:\"left-sidebar\";s:12:\"none-sidebar\";s:12:\"none-sidebar\";s:14:\"center-content\";s:14:\"center-content\";}s:6:\"xvalue\";a:1:{s:7:\"default\";s:13:\"right-sidebar\";}s:5:\"label\";s:12:\"Layout Style\";}}'),(2421,306,'options','typography','a:7:{i:0;a:4:{s:4:\"name\";s:10:\"site_title\";s:5:\"label\";s:10:\"Site title\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"25px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"25px\";s:4:\"25px\";s:4:\"26px\";s:4:\"26px\";s:4:\"27px\";s:4:\"27px\";s:4:\"28px\";s:4:\"28px\";s:4:\"29px\";s:4:\"29px\";s:4:\"30px\";s:4:\"30px\";s:4:\"31px\";s:4:\"31px\";s:4:\"32px\";s:4:\"32px\";s:4:\"33px\";s:4:\"33px\";s:4:\"34px\";s:4:\"34px\";s:4:\"35px\";s:4:\"35px\";}}}}i:1;a:4:{s:4:\"name\";s:6:\"slogan\";s:5:\"label\";s:6:\"Slogan\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:2;a:4:{s:4:\"name\";s:4:\"page\";s:5:\"label\";s:4:\"Text\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:3;a:4:{s:4:\"name\";s:4:\"link\";s:5:\"label\";s:4:\"Link\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";}}i:3;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:11:\"Hover color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:4;a:4:{s:4:\"name\";s:6:\"button\";s:5:\"label\";s:6:\"Button\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:6:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:16:\"Text hover color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:2;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#f48100\";s:4:\"type\";s:11:\"colorpicker\";}i:4;a:4:{s:4:\"name\";s:22:\"background_hover_color\";s:5:\"label\";s:22:\"Background hover color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:5;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:5;a:4:{s:4:\"name\";s:6:\"header\";s:5:\"label\";s:6:\"Header\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:6;a:4:{s:4:\"name\";s:6:\"footer\";s:5:\"label\";s:6:\"Footer\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#fafafa\";s:4:\"type\";s:11:\"colorpicker\";}}}}'),(2422,307,'menu_position','menu-top','main-menu'),(2423,307,'menu_position','menu-bottom',''),(2424,307,'menu_position','menu-left',''),(2425,307,'menu_position','menu-right',''),(2426,307,'options','general','a:4:{i:0;a:4:{s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:87:\"http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/uploads/chrysanthemum.jpg\";s:5:\"label\";s:4:\"Logo\";}i:1;a:4:{s:4:\"name\";s:16:\"background_image\";s:4:\"type\";s:12:\"input_upload\";s:5:\"value\";s:100:\"http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/uploads/creative-bookshelf-211-700.jpg\";s:5:\"label\";s:16:\"Background image\";}i:2;a:4:{s:4:\"name\";s:9:\"copyright\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:24:\"Copyright © 2016 ITLSVN\";s:5:\"label\";s:14:\"Copyright Text\";}i:3;a:4:{s:4:\"name\";s:9:\"customcss\";s:4:\"type\";s:8:\"textarea\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:10:\"Custom CSS\";}}'),(2427,307,'options','social_media','a:4:{i:0;a:4:{s:4:\"name\";s:8:\"facebook\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:8:\"Facebook\";}i:1;a:4:{s:4:\"name\";s:7:\"twitter\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Twitter\";}i:2;a:4:{s:4:\"name\";s:11:\"google_plus\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:11:\"Google Plus\";}i:3;a:4:{s:4:\"name\";s:7:\"youtube\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";s:5:\"label\";s:7:\"Youtube\";}}'),(2428,307,'options','layouts','a:1:{i:0;a:6:{s:4:\"name\";s:12:\"layout_style\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"right-sidebar\";s:13:\"Right Sidebar\";s:12:\"left-sidebar\";s:12:\"Left Sidebar\";s:12:\"none-sidebar\";s:12:\"None Sidebar\";s:14:\"center-content\";s:14:\"Center Content\";}s:5:\"value\";a:4:{s:13:\"right-sidebar\";s:13:\"right-sidebar\";s:12:\"left-sidebar\";s:12:\"left-sidebar\";s:12:\"none-sidebar\";s:12:\"none-sidebar\";s:14:\"center-content\";s:14:\"center-content\";}s:6:\"xvalue\";a:1:{s:7:\"default\";s:13:\"right-sidebar\";}s:5:\"label\";s:12:\"Layout Style\";}}'),(2429,307,'options','typography','a:7:{i:0;a:4:{s:4:\"name\";s:10:\"site_title\";s:5:\"label\";s:10:\"Site title\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#f51128\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Italic\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"26px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"25px\";s:4:\"25px\";s:4:\"26px\";s:4:\"26px\";s:4:\"27px\";s:4:\"27px\";s:4:\"28px\";s:4:\"28px\";s:4:\"29px\";s:4:\"29px\";s:4:\"30px\";s:4:\"30px\";s:4:\"31px\";s:4:\"31px\";s:4:\"32px\";s:4:\"32px\";s:4:\"33px\";s:4:\"33px\";s:4:\"34px\";s:4:\"34px\";s:4:\"35px\";s:4:\"35px\";}}}}i:1;a:4:{s:4:\"name\";s:6:\"slogan\";s:5:\"label\";s:6:\"Slogan\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:12:\"Raleway-Bold\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:2;a:4:{s:4:\"name\";s:4:\"page\";s:5:\"label\";s:4:\"Text\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:3:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:3;a:4:{s:4:\"name\";s:4:\"link\";s:5:\"label\";s:4:\"Link\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"25px\";s:4:\"25px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";}}i:3;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:11:\"Hover color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:4;a:4:{s:4:\"name\";s:6:\"button\";s:5:\"label\";s:6:\"Button\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:6:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:4:{s:4:\"name\";s:11:\"hover_color\";s:5:\"label\";s:16:\"Text hover color\";s:5:\"value\";s:7:\"#222222\";s:4:\"type\";s:11:\"colorpicker\";}i:2;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Medium\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#f48100\";s:4:\"type\";s:11:\"colorpicker\";}i:4;a:4:{s:4:\"name\";s:22:\"background_hover_color\";s:5:\"label\";s:22:\"Background hover color\";s:5:\"value\";s:7:\"#ffffff\";s:4:\"type\";s:11:\"colorpicker\";}i:5;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"14px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:11:{s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";s:4:\"17px\";s:4:\"17px\";s:4:\"18px\";s:4:\"18px\";s:4:\"19px\";s:4:\"19px\";s:4:\"20px\";s:4:\"20px\";s:4:\"21px\";s:4:\"21px\";s:4:\"22px\";s:4:\"22px\";}}}}i:5;a:4:{s:4:\"name\";s:6:\"header\";s:5:\"label\";s:6:\"Header\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#8dced9\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:13:\"Raleway-Black\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#c2c7d1\";s:4:\"type\";s:11:\"colorpicker\";}}}i:6;a:4:{s:4:\"name\";s:6:\"footer\";s:5:\"label\";s:6:\"Footer\";s:4:\"type\";s:8:\"fieldset\";s:5:\"items\";a:4:{i:0;a:4:{s:4:\"name\";s:5:\"color\";s:5:\"label\";s:10:\"Text color\";s:5:\"value\";s:7:\"#87dbe6\";s:4:\"type\";s:11:\"colorpicker\";}i:1;a:5:{s:4:\"name\";s:11:\"font_family\";s:5:\"label\";s:11:\"Font family\";s:5:\"value\";s:14:\"Raleway-Italic\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:4:{s:13:\"Raleway-Black\";s:13:\"Raleway Black\";s:12:\"Raleway-Bold\";s:12:\"Raleway Bold\";s:14:\"Raleway-Medium\";s:14:\"Raleway Medium\";s:14:\"Raleway-Italic\";s:14:\"Raleway Italic\";}}i:2;a:5:{s:4:\"name\";s:9:\"font_size\";s:5:\"label\";s:9:\"Font size\";s:5:\"value\";s:4:\"12px\";s:4:\"type\";s:8:\"combobox\";s:7:\"options\";a:7:{s:4:\"10px\";s:4:\"10px\";s:4:\"11px\";s:4:\"11px\";s:4:\"12px\";s:4:\"12px\";s:4:\"13px\";s:4:\"13px\";s:4:\"14px\";s:4:\"14px\";s:4:\"15px\";s:4:\"15px\";s:4:\"16px\";s:4:\"16px\";}}i:3;a:4:{s:4:\"name\";s:16:\"background_color\";s:5:\"label\";s:16:\"Background color\";s:5:\"value\";s:7:\"#fafafa\";s:4:\"type\";s:11:\"colorpicker\";}}}}');
/*!40000 ALTER TABLE `theme_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_type`
--

DROP TABLE IF EXISTS `theme_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme_type` (
  `theme_type_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`theme_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_type`
--

LOCK TABLES `theme_type` WRITE;
/*!40000 ALTER TABLE `theme_type` DISABLE KEYS */;
INSERT INTO `theme_type` VALUES (1,'Simple Site',NULL,NULL,NULL,NULL),(2,'Medium Site',NULL,NULL,NULL,NULL),(3,'Default','Hidden in list of templates',NULL,NULL,NULL);
/*!40000 ALTER TABLE `theme_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `machine_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `is_publish` bigint(20) NOT NULL DEFAULT '0',
  `theme_type_id` bigint(20) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_preview` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (146,'',3,1,3,'smallpine','1.0.0','ITLSVN','https://www.facebook.com/hoainam.tran.355','Smallpine Theme','preview.jpg',0),(304,'Sanmax58ca5a5444f9c',0,1,1,'Sanmax Simple','1.0.0','Sanmax','#','site simple template','http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/themes/Sanmax58ca5a5444f9c/images/preview.jpg',0),(305,'Sanmax58ca5b2fc77c4',304,1,1,'simple_Xu 1','1.0.0','Sanmax','#','site simple template','http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/themes/Sanmax58ca5a5444f9c/images/preview.jpg',0),(306,'Sanmax58ca65d19f1c1',304,1,1,'simple_Xu test 2','1.0.0','Sanmax','#','site simple template','http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/themes/Sanmax58ca5a5444f9c/images/preview.jpg',0),(307,'Sanmax58ca6c6236618',304,1,1,'simple_Xu 12','1.0.0','Sanmax','#','site simple template','http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/themes/Sanmax58ca5a5444f9c/images/preview.jpg',1);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translate`
--

DROP TABLE IF EXISTS `translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trans_key` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `trans_meta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translate`
--

LOCK TABLES `translate` WRITE;
/*!40000 ALTER TABLE `translate` DISABLE KEYS */;
/*!40000 ALTER TABLE `translate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_meta`
--

DROP TABLE IF EXISTS `user_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_meta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `user_meta_user_id_index` (`user_id`),
  KEY `user_meta_meta_key_index` (`meta_key`),
  CONSTRAINT `user_meta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_meta`
--

LOCK TABLES `user_meta` WRITE;
/*!40000 ALTER TABLE `user_meta` DISABLE KEYS */;
INSERT INTO `user_meta` VALUES (1,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-04 04:11:57\";s:4:\"desc\";s:20:\"Create page About Us\";}'),(2,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-04 04:12:22\";s:4:\"desc\";s:20:\"Update page About Us\";}'),(3,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:39:19\";s:4:\"desc\";s:20:\"Update page About Us\";}'),(4,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:46:29\";s:4:\"desc\";s:21:\"Create page Test site\";}'),(5,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:47:33\";s:4:\"desc\";s:21:\"Update page Test site\";}'),(6,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:47:58\";s:4:\"desc\";s:18:\"Create page PAge 1\";}'),(7,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:51:37\";s:4:\"desc\";s:20:\"Update page About Us\";}'),(8,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:52:27\";s:4:\"desc\";s:18:\"Delete page id :34\";}'),(9,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 02:52:55\";s:4:\"desc\";s:18:\"Delete page id :41\";}'),(10,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:02:03\";s:4:\"desc\";s:20:\"Create page About us\";}'),(11,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:02:12\";s:4:\"desc\";s:23:\"Create page Minh page 1\";}'),(12,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:04:59\";s:4:\"desc\";s:23:\"Create post Minh post 1\";}'),(13,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:06:23\";s:4:\"desc\";s:20:\"Update page About us\";}'),(14,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:09:15\";s:4:\"desc\";s:20:\"Update page About us\";}'),(15,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:11:17\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(16,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:12:32\";s:4:\"desc\";s:18:\"Delete page id :42\";}'),(17,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:26:46\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(18,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:29:58\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(19,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:35:18\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(20,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:36:00\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(21,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:36:19\";s:4:\"desc\";s:17:\"Delete post id :1\";}'),(22,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:36:35\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(23,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:36:45\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(24,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:36:55\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(25,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:37:03\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(26,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:37:57\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(27,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:38:13\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(28,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:38:53\";s:4:\"desc\";s:48:\"Update post Maiores voluptatem alias non et rem.\";}'),(29,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:41:31\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(30,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:42:05\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(31,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:42:40\";s:4:\"desc\";s:49:\"Create post QSoft Idol: Work hard, play...harder!\";}'),(32,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:56:34\";s:4:\"desc\";s:17:\"Delete post id :2\";}'),(33,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:57:15\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(34,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:57:30\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(35,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:57:47\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(36,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 03:59:58\";s:4:\"desc\";s:23:\"Update post Minh post 1\";}'),(37,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 04:02:31\";s:4:\"desc\";s:45:\"Delete post id :53,48,20,19,18,17,16,15,14,13\";}'),(38,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 04:23:40\";s:4:\"desc\";s:68:\"Update post Repellat autem et incidunt nulla temporibus consequatur.\";}'),(39,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 04:35:11\";s:4:\"desc\";s:40:\"Update post Quibusdam sequi nihil nobis.\";}'),(40,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 04:39:16\";s:4:\"desc\";s:68:\"Update post Qui totam nisi natus quaerat asperiores laboriosam modi.\";}'),(41,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:41:44\";s:4:\"desc\";s:22:\"Create page Contact us\";}'),(42,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:41:48\";s:4:\"desc\";s:23:\"Create post Minh post 2\";}'),(43,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:41:56\";s:4:\"desc\";s:23:\"Create post Minh post 2\";}'),(44,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:42:17\";s:4:\"desc\";s:22:\"Update page Contact us\";}'),(45,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:42:43\";s:4:\"desc\";s:23:\"Create post Minh post 2\";}'),(46,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:43:51\";s:4:\"desc\";s:21:\"Delete post id :77,75\";}'),(47,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 07:44:27\";s:4:\"desc\";s:30:\"Create page Client testimonial\";}'),(48,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 08:15:22\";s:4:\"desc\";s:16:\"Create page Blog\";}'),(49,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 08:15:42\";s:4:\"desc\";s:16:\"Create page Blog\";}'),(50,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 11:39:22\";s:4:\"desc\";s:18:\"Delete page id :88\";}'),(51,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 11:46:13\";s:4:\"desc\";s:16:\"Create page Home\";}'),(52,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 11:48:00\";s:4:\"desc\";s:18:\"Delete page id :92\";}'),(53,1,'user_log','a:2:{s:4:\"date\";s:19:\"2016-11-16 11:49:39\";s:4:\"desc\";s:18:\"Delete page id :89\";}'),(54,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-02-14 04:55:49\";s:4:\"desc\";s:30:\"Update page Client testimonial\";}'),(55,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-02-20 03:02:38\";s:4:\"desc\";s:30:\"Update page Client testimonial\";}'),(56,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-08 09:57:30\";s:4:\"desc\";s:40:\"Update post Quibusdam sequi nihil nobis.\";}'),(57,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-08 09:58:06\";s:4:\"desc\";s:40:\"Update post Quibusdam sequi nihil nobis.\";}'),(58,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-09 09:48:09\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(59,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-09 10:00:56\";s:4:\"desc\";s:28:\"Create page INFO FOR PATIENT\";}'),(60,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-09 11:23:46\";s:4:\"desc\";s:28:\"Update page INFO FOR PATIENT\";}'),(61,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-09 11:33:08\";s:4:\"desc\";s:23:\"Update page Minh page 1\";}'),(62,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 02:53:39\";s:4:\"desc\";s:28:\"Update page INFO FOR PATIENT\";}'),(63,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 02:54:00\";s:4:\"desc\";s:28:\"Update page INFO FOR PATIENT\";}'),(64,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 02:58:03\";s:4:\"desc\";s:21:\"Delete language id :1\";}'),(65,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:12:18\";s:4:\"desc\";s:18:\"Delete page id :46\";}'),(66,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:25:06\";s:4:\"desc\";s:16:\"Create page test\";}'),(67,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:27:00\";s:4:\"desc\";s:16:\"Update page test\";}'),(68,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:27:08\";s:4:\"desc\";s:16:\"Update page test\";}'),(69,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:27:21\";s:4:\"desc\";s:16:\"Update page test\";}'),(70,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:33:05\";s:4:\"desc\";s:19:\"Delete page id :148\";}'),(71,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:39:34\";s:4:\"desc\";s:21:\"Create page rose test\";}'),(72,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 03:49:25\";s:4:\"desc\";s:28:\"Update page INFO FOR PATIENT\";}'),(73,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 07:17:24\";s:4:\"desc\";s:28:\"Update page INFO FOR PATIENT\";}'),(74,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 07:18:46\";s:4:\"desc\";s:28:\"Update page INFO FOR PATIENT\";}'),(75,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 07:21:55\";s:4:\"desc\";s:16:\"Create page News\";}'),(76,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 08:12:00\";s:4:\"desc\";s:16:\"Create post rrrr\";}'),(77,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-10 08:12:04\";s:4:\"desc\";s:19:\"Delete post id :161\";}'),(78,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-13 08:42:43\";s:4:\"desc\";s:24:\"Delete translation id :1\";}'),(79,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 02:42:22\";s:4:\"desc\";s:16:\"Update page News\";}'),(80,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 08:31:05\";s:4:\"desc\";s:24:\"Delete translation id :3\";}'),(81,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 10:46:18\";s:4:\"desc\";s:36:\"Delete page id :150,149,144,79,74,45\";}'),(82,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 10:51:46\";s:4:\"desc\";s:16:\"Create page Home\";}'),(83,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 10:52:11\";s:4:\"desc\";s:12:\"Update page \";}'),(84,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:48:45\";s:4:\"desc\";s:12:\"Update page \";}'),(85,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:52:59\";s:4:\"desc\";s:21:\"Create page News page\";}'),(86,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:53:13\";s:4:\"desc\";s:12:\"Update page \";}'),(87,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:54:24\";s:4:\"desc\";s:39:\"Delete post id :76,12,11,10,9,8,7,6,5,4\";}'),(88,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:54:30\";s:4:\"desc\";s:17:\"Delete post id :3\";}'),(89,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:56:19\";s:4:\"desc\";s:12:\"Create post \";}'),(90,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 11:58:45\";s:4:\"desc\";s:12:\"Create post \";}'),(91,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 12:04:27\";s:4:\"desc\";s:12:\"Update post \";}'),(92,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 12:09:58\";s:4:\"desc\";s:12:\"Update page \";}'),(93,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-14 12:11:53\";s:4:\"desc\";s:28:\"Create page Info for patient\";}'),(94,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 01:27:10\";s:4:\"desc\";s:21:\"Delete language id :5\";}'),(95,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 01:27:17\";s:4:\"desc\";s:21:\"Delete language id :4\";}'),(96,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 01:28:00\";s:4:\"desc\";s:21:\"Delete language id :3\";}'),(97,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 01:28:34\";s:4:\"desc\";s:21:\"Delete language id :2\";}'),(98,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 01:30:50\";s:4:\"desc\";s:14:\"Create page CT\";}'),(99,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:31:58\";s:4:\"desc\";s:12:\"Create post \";}'),(100,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:33:10\";s:4:\"desc\";s:12:\"Update page \";}'),(101,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:33:51\";s:4:\"desc\";s:12:\"Create page \";}'),(102,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:34:44\";s:4:\"desc\";s:12:\"Update page \";}'),(103,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:35:42\";s:4:\"desc\";s:19:\"Delete page id :176\";}'),(104,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:36:02\";s:4:\"desc\";s:19:\"Delete post id :175\";}'),(105,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:46:19\";s:4:\"desc\";s:12:\"Update post \";}'),(106,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 02:46:50\";s:4:\"desc\";s:12:\"Update post \";}'),(107,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 03:10:55\";s:4:\"desc\";s:27:\"Delete language id :9,8,7,6\";}'),(108,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 03:11:02\";s:4:\"desc\";s:21:\"Delete language id :7\";}'),(109,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 04:32:10\";s:4:\"desc\";s:12:\"Update page \";}'),(110,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 06:36:32\";s:4:\"desc\";s:15:\"Create doctor 3\";}'),(111,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 06:36:49\";s:4:\"desc\";s:14:\"Update doctor \";}'),(112,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 06:37:04\";s:4:\"desc\";s:19:\"Delete page id :177\";}'),(113,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:06:18\";s:4:\"desc\";s:12:\"Update page \";}'),(114,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:06:59\";s:4:\"desc\";s:12:\"Create page \";}'),(115,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:16:23\";s:4:\"desc\";s:12:\"Update page \";}'),(116,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:16:34\";s:4:\"desc\";s:19:\"Delete page id :179\";}'),(117,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:17:04\";s:4:\"desc\";s:12:\"Create page \";}'),(118,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:18:05\";s:4:\"desc\";s:12:\"Create page \";}'),(119,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:18:24\";s:4:\"desc\";s:12:\"Update page \";}'),(120,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:22:41\";s:4:\"desc\";s:12:\"Update page \";}'),(121,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:23:04\";s:4:\"desc\";s:23:\"Delete page id :182,181\";}'),(122,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:34:42\";s:4:\"desc\";s:12:\"Update page \";}'),(123,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:34:56\";s:4:\"desc\";s:12:\"Create page \";}'),(124,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 08:43:49\";s:4:\"desc\";s:16:\"Create post dfgs\";}'),(125,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 09:24:56\";s:4:\"desc\";s:12:\"Update post \";}'),(126,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 09:33:49\";s:4:\"desc\";s:23:\"Create page rose german\";}'),(127,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 09:35:19\";s:4:\"desc\";s:12:\"Update post \";}'),(128,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 09:40:39\";s:4:\"desc\";s:19:\"Delete page id :184\";}'),(129,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 09:43:04\";s:4:\"desc\";s:22:\"Delete language id :10\";}'),(130,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 09:50:16\";s:4:\"desc\";s:24:\"Create post Xu post 1_Ge\";}'),(131,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:14:26\";s:4:\"desc\";s:19:\"Delete post id :193\";}'),(132,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:26:06\";s:4:\"desc\";s:12:\"Update post \";}'),(133,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:26:18\";s:4:\"desc\";s:12:\"Update post \";}'),(134,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:29:06\";s:4:\"desc\";s:12:\"Update post \";}'),(135,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:42:08\";s:4:\"desc\";s:16:\"Create doctor ge\";}'),(136,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:43:32\";s:4:\"desc\";s:24:\"Create page Test page_gr\";}'),(137,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:43:50\";s:4:\"desc\";s:12:\"Update page \";}'),(138,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:45:32\";s:4:\"desc\";s:24:\"Create post Post test_Gr\";}'),(139,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:45:41\";s:4:\"desc\";s:19:\"Delete page id :198\";}'),(140,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:46:04\";s:4:\"desc\";s:24:\"Create post Post test_Gr\";}'),(141,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:47:02\";s:4:\"desc\";s:12:\"Update post \";}'),(142,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 10:59:54\";s:4:\"desc\";s:22:\"Create doctor Xu Xu_gr\";}'),(143,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-15 11:33:33\";s:4:\"desc\";s:12:\"Update post \";}'),(144,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 03:21:38\";s:4:\"desc\";s:14:\"Create post ge\";}'),(145,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 03:22:16\";s:4:\"desc\";s:12:\"Update post \";}'),(146,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 05:55:44\";s:4:\"desc\";s:12:\"Update page \";}'),(147,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 05:56:15\";s:4:\"desc\";s:12:\"Update page \";}'),(148,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 05:56:48\";s:4:\"desc\";s:12:\"Update page \";}'),(149,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 06:51:55\";s:4:\"desc\";s:22:\"Delete language id :10\";}'),(150,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 07:56:52\";s:4:\"desc\";s:12:\"Create page \";}'),(151,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 07:57:02\";s:4:\"desc\";s:12:\"Update page \";}'),(152,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 07:57:37\";s:4:\"desc\";s:12:\"Update page \";}'),(153,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 07:57:52\";s:4:\"desc\";s:12:\"Update page \";}'),(154,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 07:58:53\";s:4:\"desc\";s:12:\"Update page \";}'),(155,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 07:59:29\";s:4:\"desc\";s:12:\"Update post \";}'),(156,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:01:10\";s:4:\"desc\";s:12:\"Update post \";}'),(157,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:05:23\";s:4:\"desc\";s:12:\"Create post \";}'),(158,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:05:27\";s:4:\"desc\";s:19:\"Delete post id :216\";}'),(159,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:05:30\";s:4:\"desc\";s:19:\"Delete post id :210\";}'),(160,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:06:14\";s:4:\"desc\";s:12:\"Create post \";}'),(161,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:06:55\";s:4:\"desc\";s:12:\"Create post \";}'),(162,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:10:52\";s:4:\"desc\";s:12:\"Create post \";}'),(163,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:13:29\";s:4:\"desc\";s:12:\"Create post \";}'),(164,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:15:17\";s:4:\"desc\";s:12:\"Create page \";}'),(165,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:15:29\";s:4:\"desc\";s:12:\"Update page \";}'),(166,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:15:40\";s:4:\"desc\";s:12:\"Update page \";}'),(167,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:18:28\";s:4:\"desc\";s:12:\"Create post \";}'),(168,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:18:45\";s:4:\"desc\";s:12:\"Update post \";}'),(169,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:19:37\";s:4:\"desc\";s:12:\"Create post \";}'),(170,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:20:32\";s:4:\"desc\";s:12:\"Create post \";}'),(171,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:20:39\";s:4:\"desc\";s:39:\"Delete post id :242,241,240,235,231,218\";}'),(172,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:21:03\";s:4:\"desc\";s:12:\"Create post \";}'),(173,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:21:07\";s:4:\"desc\";s:19:\"Delete post id :243\";}'),(174,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:25:23\";s:4:\"desc\";s:12:\"Create page \";}'),(175,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:48:01\";s:4:\"desc\";s:12:\"Update page \";}'),(176,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:48:08\";s:4:\"desc\";s:23:\"Delete page id :244,239\";}'),(177,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:48:18\";s:4:\"desc\";s:12:\"Update post \";}'),(178,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:48:25\";s:4:\"desc\";s:27:\"Delete page id :213,199,188\";}'),(179,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:51:16\";s:4:\"desc\";s:12:\"Create page \";}'),(180,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 08:52:42\";s:4:\"desc\";s:12:\"Create post \";}'),(181,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:12:47\";s:4:\"desc\";s:12:\"Update page \";}'),(182,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:18:55\";s:4:\"desc\";s:12:\"Update page \";}'),(183,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:19:05\";s:4:\"desc\";s:19:\"Delete post id :217\";}'),(184,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:19:18\";s:4:\"desc\";s:12:\"Update post \";}'),(185,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:20:01\";s:4:\"desc\";s:12:\"Update post \";}'),(186,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:20:22\";s:4:\"desc\";s:12:\"Update post \";}'),(187,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:21:38\";s:4:\"desc\";s:12:\"Update post \";}'),(188,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:23:09\";s:4:\"desc\";s:12:\"Update page \";}'),(189,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:39:38\";s:4:\"desc\";s:12:\"Update page \";}'),(190,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:52:05\";s:4:\"desc\";s:12:\"Update page \";}'),(191,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:52:59\";s:4:\"desc\";s:12:\"Create page \";}'),(192,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:54:27\";s:4:\"desc\";s:12:\"Update page \";}'),(193,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:54:33\";s:4:\"desc\";s:12:\"Update page \";}'),(194,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:54:45\";s:4:\"desc\";s:12:\"Update page \";}'),(195,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:55:00\";s:4:\"desc\";s:12:\"Update page \";}'),(196,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:55:08\";s:4:\"desc\";s:12:\"Update page \";}'),(197,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:55:20\";s:4:\"desc\";s:12:\"Update page \";}'),(198,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 09:57:12\";s:4:\"desc\";s:12:\"Update page \";}'),(199,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:05:44\";s:4:\"desc\";s:12:\"Create page \";}'),(200,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:06:22\";s:4:\"desc\";s:12:\"Update page \";}'),(201,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:10:21\";s:4:\"desc\";s:12:\"Update page \";}'),(202,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:29:14\";s:4:\"desc\";s:14:\"Update doctor \";}'),(203,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:34:38\";s:4:\"desc\";s:14:\"Create doctor \";}'),(204,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:36:17\";s:4:\"desc\";s:23:\"Delete page id :250,248\";}'),(205,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-16 10:49:18\";s:4:\"desc\";s:12:\"Create page \";}'),(206,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 05:02:30\";s:4:\"desc\";s:12:\"Update page \";}'),(207,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:10:36\";s:4:\"desc\";s:12:\"Update page \";}'),(208,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:22:31\";s:4:\"desc\";s:23:\"Delete page id :265,251\";}'),(209,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:22:49\";s:4:\"desc\";s:19:\"Delete page id :174\";}'),(210,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:24:21\";s:4:\"desc\";s:19:\"Delete page id :168\";}'),(211,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:25:40\";s:4:\"desc\";s:22:\"Delete language id :10\";}'),(212,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:28:06\";s:4:\"desc\";s:19:\"Delete page id :163\";}'),(213,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:28:09\";s:4:\"desc\";s:19:\"Delete page id :162\";}'),(214,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:28:18\";s:4:\"desc\";s:39:\"Delete post id :249,201,200,187,165,164\";}'),(215,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:28:41\";s:4:\"desc\";s:23:\"Delete page id :261,203\";}'),(216,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:29:16\";s:4:\"desc\";s:22:\"Delete language id :10\";}'),(217,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:29:21\";s:4:\"desc\";s:28:\"Delete language id :10,9,8,7\";}'),(218,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:29:45\";s:4:\"desc\";s:30:\"Delete translation id :2,4,5,6\";}'),(219,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:29:52\";s:4:\"desc\";s:28:\"Delete language id :10,9,8,7\";}'),(220,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:30:58\";s:4:\"desc\";s:14:\"Create doctor \";}'),(221,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:31:03\";s:4:\"desc\";s:19:\"Delete page id :285\";}'),(222,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:31:14\";s:4:\"desc\";s:12:\"Create post \";}'),(223,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:31:18\";s:4:\"desc\";s:19:\"Delete post id :286\";}'),(224,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:33:05\";s:4:\"desc\";s:23:\"Delete language id :8,7\";}'),(225,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:35:06\";s:4:\"desc\";s:19:\"Create page Home_GR\";}'),(226,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:36:04\";s:4:\"desc\";s:22:\"Create page Contact_Du\";}'),(227,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:37:32\";s:4:\"desc\";s:12:\"Create page \";}'),(228,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:40:35\";s:4:\"desc\";s:19:\"Delete page id :289\";}'),(229,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:45:08\";s:4:\"desc\";s:12:\"Update page \";}'),(230,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:45:38\";s:4:\"desc\";s:12:\"Create page \";}'),(231,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:52:48\";s:4:\"desc\";s:12:\"Create page \";}'),(232,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 07:53:17\";s:4:\"desc\";s:28:\"Delete language id :10,9,8,7\";}'),(233,1,'user_log','a:2:{s:4:\"date\";s:19:\"2017-03-17 08:03:20\";s:4:\"desc\";s:12:\"Create post \";}');
/*!40000 ALTER TABLE `user_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `provider` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'local',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Administrator','henry.tran@qsoft.com.vn','$2y$10$SFiklwUL/XTbA6pIO73.vOdzuM0wjgYSWdw6aUQx1nW5mKBbWW5yC','default-user.png','',1,'local','LxfLYGFflZUJET5DuDOn3RpZVCC3ShvzKDwa8BsEl3YerpcciyyxDX0Gq5PC',NULL,'2017-03-16 02:53:16'),(3,3,'Hoai Nam Tran','itlsvn@gmail.com','$2y$10$ZNQuXE8MBDfBMv5ijR90huOq5Dx0CzowQqlKPFzcxtWvyUezb0wzu','http://52.221.247.51/uploads/logo.jpg','This is normal user',0,'local',NULL,'2016-11-03 15:16:02','2016-11-04 04:48:08'),(4,1,'Hoai','henry@qsoftvietnam.com','$2y$10$IozdjoG.DGA53fndIfTBHORfO6bTPh7kqtK9POTD617pRN7FGqjJK','','',0,'local',NULL,'2017-02-08 08:51:12','2017-02-08 08:51:12'),(5,1,'thuongnt','tinhbotnghebonbon@gmail.com','$2y$10$orNjTDKw6DjyG9JkULLLs.gBzKoq8TLEtYBCCRDji0LvPpvFkiF3O','','Test',0,'local','k4Zt28sPY7eVMxaX7wJk2glnwzTJKJDNDpqsGb6p0f0rSac2erqNRXQwpBLx','2017-03-15 02:05:04','2017-03-15 02:08:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_groups`
--

DROP TABLE IF EXISTS `widget_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widget_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theme_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `widget_groups_theme_id_index` (`theme_id`),
  CONSTRAINT `widget_groups_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_groups`
--

LOCK TABLES `widget_groups` WRITE;
/*!40000 ALTER TABLE `widget_groups` DISABLE KEYS */;
INSERT INTO `widget_groups` VALUES (147,146,'post_slider'),(148,146,'sidebar'),(350,304,'post_slider'),(351,304,'left_sidebar'),(352,304,'right_sidebar'),(353,305,'post_slider'),(354,305,'left_sidebar'),(355,305,'right_sidebar'),(356,306,'post_slider'),(357,306,'left_sidebar'),(358,306,'right_sidebar'),(359,307,'post_slider'),(360,307,'left_sidebar'),(361,307,'right_sidebar');
/*!40000 ALTER TABLE `widget_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `widgets_group_id_index` (`group_id`),
  CONSTRAINT `widgets_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `widget_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
INSERT INTO `widgets` VALUES (14,147,'App\\Widgets\\defaultWidget\\PostSlider','a:4:{s:6:\"baseID\";s:10:\"wxuJLA1XzW\";s:5:\"title\";s:18:\"Post Slider Widget\";s:4:\"type\";s:7:\"gallery\";s:10:\"gallery_id\";s:1:\"1\";}',1),(15,148,'App\\Widgets\\defaultWidget\\PostSlider','a:4:{s:5:\"title\";s:18:\"Post Slider Widget\";s:4:\"type\";s:13:\"featured-post\";s:10:\"gallery_id\";s:0:\"\";s:6:\"baseID\";s:10:\"ZmPaT1V5kK\";}',1),(17,147,'App\\Widgets\\defaultWidget\\RecentPostWidget','a:4:{s:5:\"title\";s:18:\"Recent Post Widget\";s:4:\"show\";s:1:\"3\";s:11:\"description\";s:0:\"\";s:6:\"baseID\";s:10:\"MWD9uOZUyu\";}',3),(35,355,'App\\Widgets\\Sanmax58ca5a5444f9c\\MakeAppointmentWidget','a:6:{s:6:\"baseID\";s:10:\"CLuPASaI7u\";s:5:\"title\";s:23:\"Make Appointment Widget\";s:6:\"avatar\";s:82:\"http://ec2-52-221-247-51.ap-southeast-1.compute.amazonaws.com/uploads/doctor-2.jpg\";s:16:\"make_appointment\";s:103:\"https://docs.google.com/spreadsheets/d/12TqGO2d8co7OxvhT_Q7ll6GOPVl94w5rC6SW5EzZvvc/edit#gid=1986204890\";s:4:\"name\";s:9:\"rose test\";s:11:\"description\";s:13:\"random doctor\";}',0),(36,353,'App\\Widgets\\Sanmax58ca5a5444f9c\\LightSliderWidget','a:4:{s:6:\"baseID\";s:10:\"tErMIHFxPG\";s:5:\"title\";s:19:\"Light Slider Widget\";s:4:\"type\";s:13:\"featured-post\";s:10:\"gallery_id\";s:1:\"1\";}',0),(38,359,'App\\Widgets\\defaultWidget\\PostSlider','a:4:{s:6:\"baseID\";s:10:\"oQFtoaQUSz\";s:5:\"title\";s:4:\"Rose\";s:4:\"type\";s:2:\"50\";s:10:\"gallery_id\";s:1:\"1\";}',1),(41,359,'App\\Widgets\\Sanmax58ca5a5444f9c\\LightSliderWidget','a:4:{s:6:\"baseID\";s:10:\"OAkRnGj2DH\";s:5:\"title\";s:4:\"Rose\";s:4:\"type\";s:7:\"gallery\";s:10:\"gallery_id\";s:1:\"1\";}',3),(43,361,'App\\Widgets\\defaultWidget\\TextWidget','a:3:{s:6:\"baseID\";s:10:\"Z5vSmrxbSX\";s:5:\"title\";s:11:\"Text Widget\";s:4:\"text\";s:458:\"Release Notes:\r\n- moved hardcoded style to css class- more sensible view handling - view location got cached and caused issues- more sensible css logicKnown bugs:\r\n- please note that the free_html widget is sometimes flakey due to problems with tinymce and dynamic content.  If it\'s not working, move the widget to a wide column and refresh the page.\r\nAlso note - widget manager has a setting to allow Admins to submit unfiltered HTML in the free_html widget\";}',1),(44,361,'App\\Widgets\\defaultWidget\\PostSlider','a:4:{s:6:\"baseID\";s:10:\"KQuuZkm7je\";s:5:\"title\";s:11:\"Latest News\";s:4:\"type\";s:11:\"recent-post\";s:10:\"gallery_id\";s:1:\"1\";}',2),(45,360,'App\\Widgets\\Sanmax58ca5a5444f9c\\LightSliderWidget','a:4:{s:6:\"baseID\";s:10:\"5mIsi0mkHB\";s:5:\"title\";s:22:\"rose test light slider\";s:4:\"type\";s:7:\"gallery\";s:10:\"gallery_id\";s:1:\"1\";}',0);
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-17  8:08:40
