CREATE DATABASE  IF NOT EXISTS `presentlk` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `presentlk`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: presentlk
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_status1_idx` (`status_id`),
  CONSTRAINT `fk_admin_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Sandaru D','Gunathilake G','sandaru','12345',1),(2,'Dilshan','Maduhansa','dilshan','12345',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_image`
--

DROP TABLE IF EXISTS `admin_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `admin_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_image_admin1_idx` (`admin_id`),
  CONSTRAINT `fk_admin_image_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_image`
--

LOCK TABLES `admin_image` WRITE;
/*!40000 ALTER TABLE `admin_image` DISABLE KEYS */;
INSERT INTO `admin_image` VALUES (1,'Resources//admin_img//62c67e05de5fc.jpeg',1),(2,'Resources//admin_img//62c68afdede28.png',2);
/*!40000 ALTER TABLE `admin_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_brand_status1_idx` (`status_id`),
  CONSTRAINT `fk_brand_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Apple',1),(2,'Samsung',1),(3,'Sony',1),(4,'Mars',1),(5,'Snickers',1),(6,'Cadbury',1),(7,'KitKat',1);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `users_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_users1_idx` (`users_id`),
  KEY `fk_cart_status1_idx` (`status_id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_cart_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (3,7,2,1,2),(4,4,1,1,2),(5,5,1,1,2),(6,6,1,1,2),(7,1,1,1,2),(10,8,1,1,2),(11,3,1,1,2);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_status1_idx` (`status_id`),
  CONSTRAINT `fk_category_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cell Phone & Accessories',1),(2,'Chocolate',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Imbulgoda',7),(2,'Kadawatha',7);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'None'),(2,'Silver'),(3,'Rose Gold'),(4,'Space Gray'),(5,'Pacific Blue'),(6,'Jet Black'),(7,'Red'),(8,'White'),(9,'Purple'),(10,'Midnight Blue'),(11,'Sierra Blue'),(12,'Aura Red'),(13,'Burgundy'),(14,'Midnight Green'),(15,'Product [Red]'),(16,'Gold'),(17,'Purple'),(18,'Light Green'),(19,'Pink'),(20,'Yello');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condition`
--

DROP TABLE IF EXISTS `condition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condition`
--

LOCK TABLES `condition` WRITE;
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` VALUES (1,'Brand New'),(2,'Used'),(3,'Refurbished');
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `display_image`
--

DROP TABLE IF EXISTS `display_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `display_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `display_image_type_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_display_image_display_image_type1_idx` (`display_image_type_id`),
  KEY `fk_display_image_status1_idx` (`status_id`),
  CONSTRAINT `fk_display_image_display_image_type1` FOREIGN KEY (`display_image_type_id`) REFERENCES `display_image_type` (`id`),
  CONSTRAINT `fk_display_image_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `display_image`
--

LOCK TABLES `display_image` WRITE;
/*!40000 ALTER TABLE `display_image` DISABLE KEYS */;
INSERT INTO `display_image` VALUES (1,'Resources//admin_img//630a0abdeaf49.jpeg',1,1),(2,'Resources//admin_img//630a0efe16fd1.jpeg',1,1),(3,'Resources//admin_img//630a0f14a0c14.jpeg',1,1),(4,'Resources//admin_img//630a0f35bedf6.jpeg',1,1),(5,'Resources//admin_img//630a0f6fcfde1.jpeg',1,2);
/*!40000 ALTER TABLE `display_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `display_image_type`
--

DROP TABLE IF EXISTS `display_image_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `display_image_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `display_image_type`
--

LOCK TABLES `display_image_type` WRITE;
/*!40000 ALTER TABLE `display_image_type` DISABLE KEYS */;
INSERT INTO `display_image_type` VALUES (1,'Carousel'),(2,'Home');
/*!40000 ALTER TABLE `display_image_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'Ampara',2),(2,'Anuradhapura',3),(3,'Badulla',8),(4,'Batticaloa',2),(5,'Colombo',9),(6,'Galle',7),(7,'Gampaha',9),(8,'Hambantota',7),(9,'Jaffna',5),(10,'Kalutara',9),(11,'Kandy',1),(12,'Kegalle',6),(13,'Kilinochchi',5),(14,'Kurunegala',4),(15,'Mannar',5),(16,'Matale',1),(17,'Matara',7),(18,'Moneragala',8),(19,'Mullaitivu',5),(20,'Nuwara Eliya',1),(21,'Polonnaruwa',3),(22,'Puttalam',4),(23,'Ratnapura',6),(24,'Trincomalee',2),(25,'Vavuniya',5);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `feedback` text,
  `date` datetime DEFAULT NULL,
  `feedback_type_id` int NOT NULL,
  `product_id` int NOT NULL,
  `users_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  KEY `fk_feedback_users1_idx` (`users_id`),
  KEY `fk_feedback_feedback_type1_idx` (`feedback_type_id`),
  CONSTRAINT `fk_feedback_feedback_type1` FOREIGN KEY (`feedback_type_id`) REFERENCES `feedback_type` (`id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Very Good Product','2022-08-24 10:43:24',1,1,1),(2,'Good','2022-08-24 10:50:02',1,2,1),(3,'Very Good And Tasty..','2022-08-24 10:59:33',1,7,1);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_type`
--

DROP TABLE IF EXISTS `feedback_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_type`
--

LOCK TABLES `feedback_type` WRITE;
/*!40000 ALTER TABLE `feedback_type` DISABLE KEYS */;
INSERT INTO `feedback_type` VALUES (1,'Positive'),(2,'Negative'),(3,'Neutral');
/*!40000 ALTER TABLE `feedback_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'Resources//Product_img//62d23c817128e.jpeg',1),(2,'Resources//Product_img//62d23c81a913f.jpeg',1),(3,'Resources//Product_img//62d23c81e749d.jpeg',1),(4,'Resources//Product_img//62d23c822d2a4.jpeg',1),(5,'Resources//Product_img//62d23c82462d1.jpeg',1),(6,'Resources//Product_img//62d247876e1d6.jpeg',2),(7,'Resources//Product_img//s22-1.jpg',3),(8,'Resources//Product_img//62d247879c436.jpeg',2),(9,'Resources//Product_img//s22-2.jpg',3),(10,'Resources//Product_img//62d24787bf838.jpeg',2),(11,'Resources//Product_img//s22-3.jpg',3),(12,'Resources//Product_img//62d24787f3107.jpeg',2),(13,'Resources//Product_img//s22-4.jpg',3),(14,'Resources//Product_img//62d2478837e5a.jpeg',2),(15,'Resources//Product_img//s22-5.jpg',3),(16,'Resources//Product_img//62da2ea6d85ba.jpeg',4),(17,'Resources//Product_img//62da2ea713d1f.jpeg',4),(18,'Resources//Product_img//Mars-01.jpg',4),(19,'Resources//Product_img//Mars-04.jpg',4),(20,'Resources//Product_img//Mars-05.jpg',4),(21,'Resources//Product_img//62da30c200aff.jpeg',5),(22,'Resources//Product_img//62da30c2293f4.jpeg',5),(23,'Resources//Product_img//62da30c25475a.jpeg',5),(24,'Resources//Product_img//62da30c295d07.jpeg',5),(25,'Resources//Product_img//62da30c2dc5b0.jpeg',5),(26,'Resources//Product_img//62da4b574d5fd.png',6),(27,'Resources//Product_img//62da4b57690a9.jpeg',6),(28,'Resources//Product_img//62da4b578289e.jpeg',6),(29,'Resources//Product_img//62da4b579ad3d.jpeg',6),(30,'Resources//Product_img//62da4b57b3426.jpeg',6),(31,'Resources//Product_img//62da4bb47198c.jpeg',7),(32,'Resources//Product_img//62da4bb49e310.jpeg',7),(33,'Resources//Product_img//62da4bb4dc589.jpeg',7),(34,'Resources//Product_img//62da4bb5192d2.jpeg',7),(35,'Resources//Product_img//62da4bb5319de.jpeg',7),(36,'Resources//Product_img//62da4d0de0938.jpeg',8),(37,'Resources//Product_img//62da4d0e11744.jpeg',8),(38,'Resources//Product_img//62da4d0e30691.jpeg',8),(39,'Resources//Product_img//62da4d0e40908.jpeg',8),(40,'Resources//Product_img//62da4d0e5645d.jpeg',8),(41,'Resources//Product_img//63bf9bf37cf3c.jpeg',9),(42,'Resources//Product_img//63bf9bf394731.jpeg',9),(43,'Resources//Product_img//63bf9bf3d01ee.jpeg',9),(44,'Resources//Product_img//63bf9bf3f347e.jpeg',9),(45,'Resources//Product_img//63bf9bf414ddb.jpeg',9);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `order_id` varchar(45) DEFAULT NULL,
  `invoice_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_invoice_status1_idx` (`invoice_status_id`),
  KEY `fk_invoice_users1_idx` (`users_id`),
  CONSTRAINT `fk_invoice_invoice_status1` FOREIGN KEY (`invoice_status_id`) REFERENCES `invoice_status` (`id`),
  CONSTRAINT `fk_invoice_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,1,'2022-08-13 11:47:05','62f741e17b5e1',4),(2,1,'2022-08-13 11:47:11','62f741e7af078',3),(3,1,'2022-08-13 11:47:14','62f741eac12ae',2),(4,1,'2022-08-14 09:05:28','62f86d80ea9bd',1),(5,1,'2022-08-22 09:13:21','6302fb5977a01',0),(6,1,'2022-08-22 09:13:22','6302fb5ab737b',0),(7,1,'2022-08-22 09:13:23','6302fb5b0ab51',0),(8,1,'2022-08-22 09:19:40','6302fcd42676a',0),(9,1,'2022-08-28 10:31:11','630af6975f47c',0),(10,1,'2022-08-28 11:33:15','630b05235e72c',0),(50,1,'2022-11-02 09:48:19','6361ef8b55d2c',0),(51,1,'2022-11-02 10:02:00','6361f2c03c092',0),(52,1,'2022-11-02 10:02:27','6361f2db5add7',0),(53,1,'2022-11-02 10:21:48','6361f764ccb87',0),(54,1,'2022-11-02 12:59:45','63621c696271a',0),(55,1,'2022-11-02 13:27:11','636222d75fb36',0),(56,1,'2022-11-15 10:36:29','63731e5546edc',0),(57,1,'2023-01-08 15:00:13','63ba8d25b2c5d',0),(58,1,'2023-01-10 11:08:20','63bcf9cc04e75',0),(59,1,'2023-01-12 10:59:43','63bf9ac7781d9',0),(60,1,'2023-01-12 11:01:14','63bf9b22814bb',0);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  `invoice_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_item_product1_idx` (`product_id`),
  KEY `fk_invoice_item_invoice1_idx` (`invoice_id`),
  CONSTRAINT `fk_invoice_item_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  CONSTRAINT `fk_invoice_item_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_item`
--

LOCK TABLES `invoice_item` WRITE;
/*!40000 ALTER TABLE `invoice_item` DISABLE KEYS */;
INSERT INTO `invoice_item` VALUES (1,1,1,375000,1),(2,2,1,258000,2),(3,1,1,375000,3),(4,2,1,258000,4),(5,7,1,450,5),(6,1,1,375000,6),(7,2,1,258000,7),(8,7,1,450,8),(9,3,1,358000,9),(10,5,1,350,10),(60,1,1,375000,50),(61,2,1,258000,50),(62,7,2,900,50),(63,4,1,375,50),(64,5,1,350,50),(65,6,1,550,50),(66,6,1,550,51),(67,1,1,375000,52),(68,2,1,258000,52),(69,4,1,375,52),(70,5,1,350,52),(71,4,1,375,53),(72,1,1,375000,54),(73,1,2,750000,55),(74,1,8,300000,56),(75,3,1,358000,57),(76,8,1,295000,58),(77,6,1,550,59),(78,3,1,358000,59),(79,2,1,258000,60);
/*!40000 ALTER TABLE `invoice_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_status`
--

DROP TABLE IF EXISTS `invoice_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_status`
--

LOCK TABLES `invoice_status` WRITE;
/*!40000 ALTER TABLE `invoice_status` DISABLE KEYS */;
INSERT INTO `invoice_status` VALUES (0,'Confirm Order'),(1,'Packing'),(2,'Dispatch'),(3,'Shipping'),(4,'Delivered');
/*!40000 ALTER TABLE `invoice_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `brand_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_status1_idx` (`status_id`),
  KEY `fk_model_brand1_idx` (`brand_id`),
  CONSTRAINT `fk_model_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_model_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,'iPhone 13 Pro',1,1),(2,'iPhone 12',1,1),(3,'iPhone 11',1,1),(4,'iPhone XS Max',1,1),(5,'Galaxy Note 10',2,1),(6,'iPhone 13 Pro Max',1,1),(7,'Galaxy S22 Ultra',2,1),(8,'Mars 51g',4,1),(9,'Snickers Single Size Chocolate Candy Bar',5,1),(10,'Cadbury Dairy Milk',6,1),(11,'KitKat 4 Finger Milk',7,1),(12,'iPhone 12 Pro Max',1,1);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `title` varchar(100) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `category_id` int NOT NULL,
  `model_id` int NOT NULL,
  `condition_id` int NOT NULL,
  `color_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_model1_idx` (`model_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_color1_idx` (`color_id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,375000,0,'Apple iPhone 13 Pro Max 256GB Sierra Blue','iPhone 13 Pro Max','2022-07-16 09:50:17',2350,3750,1,6,1,11,1),(2,258000,4,'Samsung Galaxy Note10 1TB','Galaxy Note10','2022-07-16 10:37:19',2250,3350,1,5,2,12,1),(3,358000,8,'Samsung Galaxy S22 Ultra 1TB','Galaxy S22 Ultra','2022-07-16 10:37:19',3350,4450,1,7,2,13,1),(4,375,20,'INGREDIENTS: SUGAR, GLUCOSE SYRUP, SKIMMED MILK POWDER, COCOA BUTTER, COCOA MASS, SUNFLOWER OIL, MILK FAT, LACTOSE AND PROTEIN FROM WHEY (FROM MILK), WHEY POWDER (FROM MILK), PALM FAT, FAT REDUCED COCOA, BARLEY MALT EXTRACT, EMULSIFIER (SOYA LECITHIN), SALT, EGG WHITE POWDER, MILK PROTEIN, NATURAL VANILLA EXTRACT, MILK CHOCOLATE CONTAINS MILK SOLIDS 14% MINIMUM.\r\nMAY CONTAIN: PEANUT.\r\nMILK CHOCOLATE CONTAINS VEGETABLE FATS IN ADDITION TO COCOA BUTTER.','Mars Chocolate Bar 51g','2022-07-22 10:29:18',150,250,2,8,1,1,1),(5,350,20,'The % Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general advice.\r\nINGREDIENTS: MILK CHOCOLATE (SUGAR, COCOA BUTTER, CHOCOLATE, SKIM MILK, LACTOSE, MILKFAT, SOY LECITHIN), PEANUTS, CORN SYRUP, SUGAR, PALM OIL, SKIM MILK, LACTOSE, SALT, EGG WHITES, ARTIFICIAL FLAVOR.\r\nCONTAINS PEANUTS, MILK, EGG AND SOY. MAY CONTAIN TREE NUTS.','SNICKERS Singles Size Chocolate Candy Bars','2022-07-22 10:38:17',150,250,2,9,1,1,1),(6,550,14,'Our classic bar of deliciously creamy Cadbury Dairy Milk milk chocolate, made with fresh milk. A mouthful of “mmmm” in every piece!','Cadbury Dairy Milk','2022-07-22 12:31:43',170,270,2,10,1,1,1),(7,450,25,'Double up on your break with our KitKat® 4 finger milk chocolate bar. Comprising of a smooth milk chocolate layer and crispy wafer that’s perfect for enjoying with your afternoon cuppa.\r\nIf our KitKat® 4 finger milk chocolate isn’t your ideal breaktime snack, why not try out limited edition Gold or our richly delicious Dark KitKats? Whatever mood you’re in come your next break, you’ll find the perfect companion with our KitKat® 4 finger collection!','KitKat 4 Finger Milk Chocolate Bar','2022-07-22 12:33:16',160,260,2,11,1,1,1),(8,295000,14,'Apple iPhone 12 Pro Max 128GB Sierra Blue','iPhone 12 Pro Max','2022-07-22 12:39:01',4300,5600,1,12,1,11,1),(9,456,10,'dqwdwd','Sneakers','2023-01-12 11:04:43',120,150,2,9,1,1,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_image`
--

DROP TABLE IF EXISTS `profile_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `users_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_image_users1_idx` (`users_id`),
  CONSTRAINT `fk_profile_image_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_image`
--

LOCK TABLES `profile_image` WRITE;
/*!40000 ALTER TABLE `profile_image` DISABLE KEYS */;
INSERT INTO `profile_image` VALUES (1,'Resources//User_Profile_img//62dfea0dd8116.jpeg',1);
/*!40000 ALTER TABLE `profile_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Central'),(2,'Eastern'),(3,'North Central'),(4,'North Western'),(5,'Northern'),(6,'Sabaragamuwa'),(7,'Southern'),(8,'Uva'),(9,'Western');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Active'),(2,'Inactive'),(3,'Done');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_address`
--

DROP TABLE IF EXISTS `user_has_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `city_id` int NOT NULL,
  `users_id` int NOT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  KEY `fk_user_has_address_users1_idx` (`users_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_address`
--

LOCK TABLES `user_has_address` WRITE;
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` VALUES (1,'351/Dabcd','Pahala Imbulgoda, Imbulgoda',1,1,'11856');
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_gender_idx` (`gender_id`),
  KEY `fk_users_status1_idx` (`status_id`),
  CONSTRAINT `fk_users_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_users_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sandaru','Gunathilake','maduhansadilshan@gmail.com','123456789','0701794934','2022-07-23 11:04:27','63bf9c313f5e4',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `users_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  KEY `fk_watchlist_users1_idx` (`users_id`),
  KEY `fk_watchlist_status1_idx` (`status_id`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_watchlist_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watchlist`
--

LOCK TABLES `watchlist` WRITE;
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
INSERT INTO `watchlist` VALUES (8,2,1,1);
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-02 13:28:05
