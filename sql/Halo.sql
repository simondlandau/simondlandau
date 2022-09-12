
/*DROP DATABASE IF EXISTS `Halo`;*/

CREATE DATABASE IF NOT EXISTS `Halo` !40100 DEFAULT CHARACTER SET utf8mb4;

USE `Halo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Facilitators` (
  `Fac_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(15) DEFAULT NULL,
  `LastName` varchar(15) DEFAULT NULL,
  `Salutation` varchar(45) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Status` varchar(40) DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `Signature` varchar(240) DEFAULT NULL,
  `S_Date` date DEFAULT NULL,
  `L_Date` date DEFAULT NULL,
  `Contact` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`Fac_ID`),
  UNIQUE KEY `Fullname_UNIQUE` (`FirstName`,`LastName`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `Status` (`Status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `Facilitators` VALUES (1,'Admin','Halo','Admin','laura@jahara.co.za','99',NULL,NULL,'2022-02-22',NULL,'+27(82)850-7541','Admin','newpass','2022-02-22 09:56:18'),(2,'Laura','Lewis','Admin','laura@jahara.co.za','99',NULL,NULL,'2022-02-26',NULL,'+27(82)850-7541','Laura','Halo','2022-02-22 09:56:18'),(3,'David','Swart','Mr.','david@jahara.co.za','99',NULL,NULL,'2022-02-06',NULL,'+27(65)712-6131','David','Halo','2022-09-06 18:09:35');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Medication` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pat_ID` int(11) NOT NULL,
  `Med_Date` datetime DEFAULT NULL,
  `Medication` mediumtext DEFAULT NULL,
  `Facilitator` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `Medication` VALUES (2,18,'2022-09-05 10:00:00','Aspirin  and Disprin','Laura'),(3,18,'2022-09-06 17:59:51','exlax','Laura');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patients` (
  `Pat_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(54) DEFAULT NULL,
  `A_Date` timestamp NULL DEFAULT NULL,
  `D_Date` timestamp NULL DEFAULT NULL,
  `FirstName` varchar(54) DEFAULT NULL,
  `LastName` varchar(54) DEFAULT NULL,
  `Fac_Name` varchar(54) DEFAULT NULL,
  `Treatment_Type` mediumtext DEFAULT NULL,
  `Admission_Comment` mediumtext DEFAULT NULL,
  `Discharge_Comment` mediumtext DEFAULT NULL,
  `Created` date DEFAULT NULL,
  `Photo` varchar(254) DEFAULT NULL,
  `image_path` varchar(54) DEFAULT NULL,
  PRIMARY KEY (`Pat_ID`),
  UNIQUE KEY `uniquename` (`FirstName`,`LastName`),
  KEY `photo` (`Photo`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `Patients` VALUES (18,'On Site','2022-02-25 22:00:00',NULL,'Brukkle','HALO','Laura','Nil','Limps on front left leg',NULL,'2022-02-26','Brukkle.jpg',NULL),(28,'B','2022-05-31 22:00:00','2022-05-31 22:00:00','Lap','it','Admin','TLC','Not','Left','2022-06-01','Lap.jpg',NULL),(32,NULL,'2022-05-31 22:00:00',NULL,'Land','Scape','Admin',NULL,NULL,NULL,'2022-06-01','Land.jpeg',NULL),(34,NULL,'2022-05-31 22:00:00',NULL,'Photo','Phone','Admin',NULL,NULL,NULL,'2022-06-01','Photo.jpg',NULL),(36,'Status','2022-09-05 23:00:00',NULL,'Irish','Simon','Lewis, Laura','treat','Ad','DIs','2022-09-06','Irish.jpeg',NULL);
