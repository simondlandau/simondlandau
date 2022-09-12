
/*!40000 DROP DATABASE IF EXISTS `Halo`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `Halo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

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
INSERT INTO `Facilitators` VALUES (1,'Admin','Halo','Admin','halo@halo.mail','99',NULL,NULL,'2022-02-22',NULL,'123','Admin','newpass','2022-02-22 09:56:18');
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
INSERT INTO `Medication` VALUES (2,18,'2022-09-05 10:00:00','Aspirin  and Disprin','Admin'),(3,18,'2022-09-06 17:59:51','exlax','Admin');
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
INSERT INTO `Patients` VALUES (18,'On Site','2022-02-25 22:00:00',NULL,'Brukkle','HALO','Laura','Nil','Limps on front left leg',NULL,'2022-02-26','Brukkle.jpg',NULL);
