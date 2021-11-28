-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: donkeyAirDB
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

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
-- Table structure for table `airport`
--

DROP TABLE IF EXISTS `airport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airport` (
  `id` char(3) NOT NULL,
  `airport_name` varchar(45) DEFAULT NULL,
  `airport_city` varchar(45) DEFAULT NULL,
  `citty_timezone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airport`
--

LOCK TABLES `airport` WRITE;
/*!40000 ALTER TABLE `airport` DISABLE KEYS */;
INSERT INTO `airport` VALUES ('ALG','Houari Boumediene','Alger, Algérie','GMT+1'),('BCN','Josep Tarradellas','Barcelone, Espagne','GMT+1'),('CAI','Aéroport du Caire','Le Caire, Egypte','GMT+2'),('CDG','Charles de Gaulle','Paris, France','GMT+1'),('CMN','Mohammed V','Casablanca, Maroc','GMT+1'),('CRL','Brussels South Charleroi','Charleroi, Bélgique','GMT+1'),('DJE','Aéroport international de Djerba-Zarzis','Mellita,Tunisie','GMT+1'),('DUS','Düsseldorf International','Düsseldorf, Allemagne','GMT+1'),('FRA','Frankfurt Airport','Frankfurt, Allemagne','GMT+1'),('GVA','Genève Aéroport','Genève, Suisse','GMT+1'),('ISL','Istanbul Atatürk','Istanbul, Turquie','GMT+3'),('LED','Pulkovo','Saint Petersburg, Russie','GMT+3'),('MAD','Adolfo Suárez Madrid','Madrid, Espagne','GMT+1'),('MXB','Malpensa','Milan, Italie','GMT+1'),('ORY','Orly','Paris, France','GMT+1'),('SFO','San Francisco International','Californie, États-Unis\n','GMT-5'),('STN','London Stansted','United Kingdom, Angleterre','GMT');
/*!40000 ALTER TABLE `airport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flight` (
  `id` int NOT NULL AUTO_INCREMENT,
  `flight_number` varchar(45) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `capacity_second_class` int DEFAULT NULL,
  `capacity_first_class` int DEFAULT NULL,
  `departure_airport_id` char(3) NOT NULL,
  `arrival_airport_id` char(3) NOT NULL,
  `price_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_flight_airport1_idx` (`departure_airport_id`),
  KEY `fk_flight_price1_idx` (`price_id`),
  KEY `fk_flight_airport2_idx` (`arrival_airport_id`),
  CONSTRAINT `fk_flight_airport1` FOREIGN KEY (`departure_airport_id`) REFERENCES `airport` (`id`),
  CONSTRAINT `fk_flight_airport2` FOREIGN KEY (`arrival_airport_id`) REFERENCES `airport` (`id`),
  CONSTRAINT `fk_flight_price1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight`
--

LOCK TABLES `flight` WRITE;
/*!40000 ALTER TABLE `flight` DISABLE KEYS */;
INSERT INTO `flight` VALUES (1,'DA000','2021-12-01 18:00:00','2021-12-01 19:00:00',150,30,'CDG','MAD',1),(2,'DA002','2021-12-11 18:00:00','2021-12-11 19:00:00',150,30,'CDG','MAD',2),(3,'DA003','2020-01-01 00:00:00','2020-01-01 01:00:00',NULL,NULL,'ORY','ALG',1),(4,'DA004','2020-01-01 02:00:00','2020-01-01 03:00:00',NULL,NULL,'ALG','ORY',1),(5,'DA005','2021-12-01 20:00:00','2021-12-01 21:00:00',NULL,NULL,'ORY','ALG',1),(13,'DA013','2020-01-01 00:00:00','2020-01-01 01:00:00',NULL,NULL,'ORY','ALG',1),(14,'DA014','2020-01-01 02:00:00','2020-01-01 03:00:00',NULL,NULL,'ALG','ORY',1),(15,'DA015','2021-12-01 20:00:00','2021-12-01 21:00:00',NULL,NULL,'ORY','ALG',1),(16,'DA016','2021-12-01 20:00:00','2021-12-01 21:00:00',NULL,NULL,'ALG','ORY',1),(21,'DA001','2021-12-01 20:00:00','2021-12-01 21:00:00',150,30,'MAD','CDG',3),(22,'DA10','2021-11-28 20:00:00','2021-12-01 20:00:00',NULL,NULL,'BCN','CAI',2);
/*!40000 ALTER TABLE `flight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passenger` (
  `id` int NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price` (
  `id` int NOT NULL,
  `price_business` int DEFAULT NULL,
  `price_economy_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_price__idx` (`price_economy_id`),
  CONSTRAINT `fk_price_` FOREIGN KEY (`price_economy_id`) REFERENCES `price_economy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` VALUES (1,1000,1),(2,1500,2),(3,1900,3);
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_economy`
--

DROP TABLE IF EXISTS `price_economy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price_economy` (
  `id` int NOT NULL,
  `economy1` int DEFAULT NULL,
  `economy2` int DEFAULT NULL,
  `economy3` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_economy`
--

LOCK TABLES `price_economy` WRITE;
/*!40000 ALTER TABLE `price_economy` DISABLE KEYS */;
INSERT INTO `price_economy` VALUES (1,229,275,330),(2,480,576,691),(3,119,143,171),(4,680,816,979),(5,150,180,216),(6,335,402,482),(7,199,239,287),(8,508,610,732),(9,220,264,317),(10,770,924,1109),(11,188,226,271),(12,290,348,418),(13,456,547,657),(14,320,384,461),(15,328,394,472),(16,157,188,226),(17,699,839,1007),(18,549,659,791),(19,344,413,495);
/*!40000 ALTER TABLE `price_economy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ross00@example.net','58574ab5aedc8428211ce46d2a37c6b10285faa3','Jasmin','Buckridge','2005-05-28',NULL),(2,'lorenzo13@example.org','64cfa0e702b0251e819ead5c5bc63bf9e201c7ec','Kenna','McLaughlin','2015-09-04',NULL),(3,'taylor26@example.org','5685282cc06320b4ff883b0f47dd07141272fa5c','Electa','Hagenes','2010-05-22',NULL),(4,'wisozk.rico@example.net','4d8403f3e7771e3b846d0ad2b8ca4394cfa49a59','Caleb','Wehner','2005-06-14',NULL),(5,'laurie53@example.net','96c137653be09115bf9a384d7b9623aab7153f5b','Sydney','Jaskolski','2017-11-24',NULL),(6,'oran.quitzon@example.net','3b51467d27471731df97256ab3edd88a8be7b387','Shea','Welch','2011-01-17',NULL),(7,'wilford.ferry@example.net','e6dd6b06e8f531387f7118bd7aa8e7850d7f709b','Boris','Mohr','2001-03-25',NULL),(8,'hilpert.hildegard@example.com','fe5504e35717d505de34c57a0b5d5db6485efe29','Georgiana','Considine','1994-10-05',NULL),(9,'zakary.considine@example.com','e8bae836136de2adf840ad99d978964642b31089','Celestine','Okuneva','1974-05-12',NULL),(10,'hcrona@example.com','4196539f80acba6ca19cb87882c189076d9c7976','Gerry','Stark','1989-08-19',NULL),(11,'iharber@example.com','07a9958d298fb058b7e0541597a069bf6da9b99a','Corine','McDermott','1993-07-06',NULL),(12,'gonzalo36@example.net','665addaacfe869cb77b281231c34293674059067','Lucio','Vandervort','1978-07-29',NULL),(13,'dickinson.tillman@example.org','5038effb3531f8daa33c1d1ff8fe13dc55d9143b','Bernadette','Prosacco','1982-08-19',NULL),(14,'antonetta.marvin@example.org','3dff0d13ee3ddd5702c22281f95ffeac8a2245d4','Willow','Mann','2007-05-21',NULL),(15,'bernier.naomi@example.com','7e418779e527f4eb7eef2fab077af5af033915c1','Dusty','Hoppe','1981-07-01',NULL),(16,'dchamplin@example.net','485b39842516785c87060076b9a6b6f1b1fdf1da','Vance','Morar','2016-04-30',NULL),(17,'sydney07@example.org','9812c884a1d6d553c375dd9280ccb4040f398b02','Adaline','Marquardt','1995-04-26',NULL),(18,'o\'hara.dulce@example.com','b31991e54b083be8bdba1de75bc7884a34c42708','Noelia','Ryan','1988-06-14',NULL),(19,'verner46@example.org','610660a4dcceea43df095d297b85fb8842045777','Ellsworth','Kuhn','2004-10-12',NULL),(20,'barton.parisian@example.net','9d50a15fefc96739fa9c51b1144b6b9508cf5c2e','Emily','Moen','2010-07-04',NULL),(21,'cleo.kreiger@example.com','a66fb1178bc07d4a6ce3439d010e55b787376820','Chauncey','Hackett','2015-06-06',NULL),(22,'russell.moore@example.net','08483e08e2960c2a910190592479e0b890d70d24','Olaf','Wilkinson','2016-05-05',NULL),(23,'maurine49@example.org','171cc24641cc5c0f16c1ef3aee95ced6a39823f7','Ashley','Harris','1978-09-30',NULL),(24,'hayes.harrison@example.org','e07683e052f08e49783c86896d82e5f26faa7772','Sydnee','Mertz','1994-11-01',NULL),(25,'carolyne.braun@example.org','5b5f2082b25cbdf1c90cb6e4dc9fd0889d03c151','Kallie','Kuphal','2020-01-08',NULL),(26,'parker.ova@example.com','234f447e2fdf00caf32194412d1f13bcadb1d0c5','Elsa','Hartmann','2009-08-24',NULL),(27,'betty.pfannerstill@example.org','c8678d9a3a2bd8249c2a4f93c5bc89d8d1efbe8a','Jaime','Monahan','1985-11-07',NULL),(28,'evans.blick@example.net','c1bb76650dd0150d8bc456fff31a2bef477dd1fa','Valerie','Kiehn','2015-07-31',NULL),(29,'altenwerth.matt@example.com','ea2ba948bb057a943685a22daeb597d8534bdf38','Queenie','Larson','2014-10-30',NULL),(30,'pharvey@example.com','23f41229fd5f5c6ff3b66528ef2be2edf33b41fb','Earnestine','Kuhlman','2018-02-20',NULL),(31,'vgoodwin@example.com','12012d940d0e55d57f3332edfe5701185d4d9260','Billie','Kautzer','2006-01-16',NULL),(32,'jpacocha@example.net','0285dc491c481f3923849c3e5e6ee0126e288c58','Judah','Hoppe','1978-11-06',NULL),(33,'cassin.maymie@example.org','2fef316588c7b89efde88a035cc6c3f50b8bd5c4','Lauretta','Hartmann','1979-11-15',NULL),(34,'marcelino.mante@example.org','d8b5a27cdc4065a39245c320f0e9b15b6de9b37b','Benjamin','Pfannerstill','1994-04-17',NULL),(35,'shemar92@example.org','af7f0046995d694c0b20a3558e7a6433123a051b','Julianne','Hodkiewicz','2012-06-10',NULL),(36,'alice34@example.org','b6e31a28f90125905139d3fc97186dd204ca13c9','Keeley','McKenzie','1996-03-10',NULL),(37,'nico20@example.org','7fbac762448703f4aac1dfaa0abf518074555026','Lisette','Wiegand','2020-07-25',NULL),(38,'haven.barrows@example.com','07e0b59b42219e5669cfed4bb1d614ced0d5764c','Rupert','Botsford','2004-05-05',NULL),(39,'achristiansen@example.com','647a3e384862e47bd475cfa28efdb4557854d754','Evie','Mohr','2021-09-01',NULL),(40,'vtoy@example.net','10700953e27ecb893d5f024dea4adf79d70d75ae','Whitney','Torphy','1984-02-11',NULL),(41,'marge44@example.org','06939394222e2e66d7b03f194e5d6c8c86e78912','Monte','Block','2014-06-20',NULL),(42,'karen.collins@example.com','ffb576003ab725f0f673be87a41c2f6a84fbe779','Amari','Russel','2010-09-15',NULL),(43,'pasquale12@example.com','b3bf93d0f13b20e329625d4538d1442b4ab2f15e','Ervin','Dooley','1978-01-04',NULL),(44,'ines.olson@example.net','e5b4da8df09948e4ae622e35f5711796946ec6c9','Remington','Klocko','2009-11-16',NULL),(45,'hpaucek@example.net','825897baf347f24dc7c26392343427d9febc3dab','Josiah','Prohaska','1970-12-23',NULL),(46,'alysa.pfeffer@example.org','54832dde99abaa3a04d8404041b34a66902d5f17','Muhammad','Gislason','1977-02-17',NULL),(47,'schamberger.dale@example.com','05ef7f14d56782ca0da4437a5444079e2bbdc7a0','Violet','Ortiz','1990-07-17',NULL),(48,'dora.mitchell@example.net','67bc5807a6e2703dab1d3f3320d328af6269d0d6','Colby','Mraz','2011-05-08',NULL),(49,'willa72@example.net','317ca6c4aa19ea20e0bfa1678a7d3760e35f365b','Althea','Corkery','1972-11-28',NULL),(50,'sylvester.bergstrom@example.com','1c70e7bcf18f4cd2b8be8687614b421b3299237d','Amber','Jacobs','1997-02-21',NULL),(51,'yolanda82@example.net','e453064e78cb11568e9d3329c3d489a9b25e2c5b','Fleta','Fadel','2018-01-20',NULL),(52,'kirsten.spinka@example.net','d1e603ef92a5588a005954efdf8206d5df5773f2','Creola','Koss','1984-05-30',NULL),(53,'tamara86@example.org','cac76ba1c1b98901493e0b85c7dadf3049a39ebf','Jace','Glover','1991-10-23',NULL),(54,'marcia.ondricka@example.org','4b67d6dc26ad8713a2310b49359f3367b5961e94','Erwin','Hansen','2000-07-29',NULL),(55,'alehner@example.com','a40c0e8c300233e6a12dffecbc01b22b9b7bf81e','Beatrice','Runolfsdottir','1984-01-24',NULL),(56,'mcummerata@example.com','ee939b5dbc555cddbefd02bb66e40acd3c92bda8','Rowan','Nolan','1998-08-28',NULL),(57,'xerdman@example.org','866a1b204c573fcf6af7a81d8539a5415cb83f1c','Rey','Runolfsson','1992-07-31',NULL),(58,'eleazar.haag@example.net','813f1c9c6a69dda29f1702035f695611cd25128f','Tess','Schulist','2002-06-03',NULL),(59,'uschmidt@example.com','13fe530cde8965ead3cfde821b8acbbcaf011854','Dorthy','Hills','1994-07-16',NULL),(60,'lindsay64@example.net','0bd37f69d6c2e6fe30bea1c444563a014bd4c47d','Darrick','Gerlach','2018-03-12',NULL),(61,'jayce57@example.com','d034a877eee8bfd695759d717e008cc69544870a','Alize','Nienow','1972-07-01',NULL),(62,'tania.boehm@example.net','ceafe13b785e6347039db1a5fccfb21087b77973','Alexandrea','Littel','1989-08-15',NULL),(63,'kristopher58@example.com','c1c71263583b5a407856f997cd56ce00862b2574','Alejandra','Sipes','1980-02-17',NULL),(64,'jerald.von@example.org','dbd55c6ad8d1f741c46d78a60014bf6493fcf6d3','Amelie','Walker','1988-11-09',NULL),(65,'howard.pollich@example.net','69525809d845b9dfc58bd38d14a5d049e82c72e8','Madelyn','Aufderhar','1970-07-17',NULL),(66,'carroll.maegan@example.org','3d59982a6d965245ef9f6c0dd357b130ba774af6','Geovany','Greenfelder','1996-12-25',NULL),(67,'swill@example.org','ef4774e55ee5ff1c83a3dd47700563a17cd8bc93','Abbie','Jakubowski','1973-05-19',NULL),(68,'durgan.annalise@example.net','96424dba097d3c94d46976729c976d50c32e8f96','Coty','Schuppe','2002-12-21',NULL),(69,'pouros.ottis@example.net','b6d0bec0a4b3b6d5fbe50b8f03f3fa92d2e3fe22','Lempi','Shanahan','1987-08-09',NULL),(70,'gino48@example.com','0ca25664fb08e7fc851298ee248659799b093c71','Deon','Schamberger','2013-03-01',NULL),(71,'pollich.antonietta@example.com','d889e7e161e2723ef96cf20e4e1b9b0037b125c2','Gardner','West','2006-09-18',NULL),(72,'wunsch.sienna@example.net','c825319e0f6f5291beef4e541d49a1849e6942eb','Velma','Lakin','1984-07-09',NULL),(73,'idell.mills@example.com','1d02cdfe191ea0e0647ab1ed7db8f3eec84646e0','Elliott','Boyle','1979-08-30',NULL),(74,'frederic.emard@example.com','dcffdcd1d2c00583f3394c14371d7267e85b8819','Orlando','Yost','1981-05-13',NULL),(75,'amely.grant@example.com','279e72c56a827877084e98c033b9cd24e2cb5db1','Burdette','O\'Kon','2019-11-29',NULL),(76,'austen94@example.org','a69d557fcc2ba1a40f51955460c816fc421939d1','Maximus','Ledner','2016-09-14',NULL),(77,'estrella15@example.org','64eff73a48f98fa94cd2a785879256fae239b141','Justus','Gerhold','1975-07-15',NULL),(78,'caleigh93@example.com','5aabda24ca03dfa5d3d39abe4caf9a8b426adfa6','Magnus','Bruen','1992-01-08',NULL),(79,'wgerhold@example.net','13a77b82d42da260faba98897c5be07fa7939570','Else','Dibbert','1984-09-14',NULL),(80,'camila.roob@example.org','037a7d12ca02990451e7d5977b83ec6cca1d7e11','Jarrett','Murray','1975-02-28',NULL),(81,'jacobson.myles@example.org','921dea7f244ff75d01be9794196c389dc0770fde','Casper','Bartoletti','1986-07-21',NULL),(82,'ondricka.rae@example.org','721856a13b58ee59bf1f8eb269917d615a2615c6','Candelario','Parker','1985-01-02',NULL),(83,'sonya66@example.com','b4aec245598887c60800ee884586fae7a4d6d4ef','Bertha','Cummerata','1997-06-20',NULL),(84,'bertram.schoen@example.net','00dc73ce7ef1642511d474da858c1c0d18794ebf','Reece','Jenkins','2005-02-17',NULL),(85,'skye91@example.com','e103d65bb80e5f3b698181212d1e70acd755d5ea','Maribel','Bartell','2000-10-22',NULL),(86,'schneider.alvina@example.net','b24dba2c06a2d5e975b70e4e86baba6d2cd27497','Torey','Paucek','1987-03-01',NULL),(87,'alberto.crooks@example.net','75f0ad7f34dfa3fd477ca49ee837779d83309ba1','Ezra','Quigley','2018-11-27',NULL),(88,'tanner.turner@example.org','b29cf4425369f9e79590a36f33c44107382eeacf','Tomasa','Steuber','1980-06-19',NULL),(89,'blanca.schaefer@example.com','12b8c47f8aa828354607714ac55c061a4c198696','Lacy','West','1985-05-12',NULL),(90,'cwitting@example.com','a14bd3acd81197a13367cb90ab5ae06f3036c347','Vernon','Toy','1994-02-19',NULL),(91,'xblick@example.org','0672c64cd61cbd24fe5d0970435975d09792e58c','Jayson','Powlowski','2004-11-17',NULL),(92,'qnader@example.net','ee2aeb342115169275146078dd0e596a9af9a318','Emmitt','Witting','2015-06-19',NULL),(93,'barton.dolores@example.org','a9b5753ff9473aca37d7a8b007bf29b8f16402d9','Jermain','Beer','2008-07-11',NULL),(94,'flatley.antone@example.net','9d6b53a7524e50d6dbff334a6e061a529dbc2e51','Christine','Kertzmann','1983-02-07',NULL),(95,'brooklyn62@example.net','80c676eea9f8dbed719b7ee162c7a9e5cf85f612','Valentin','Vandervort','2000-07-19',NULL),(96,'al.parisian@example.net','b32632e771d14248b5b729c0d596e123a77ec45f','Kira','Dickens','2001-09-13',NULL),(97,'nico.harber@example.org','76b0ec0a17258f1b5d017a363f8686755a6be6aa','Orion','Abernathy','2002-01-22',NULL),(98,'asha.mohr@example.com','2fa220251a0777c4b7397c29305c374aa07c2721','Everardo','Schmitt','1996-03-30',NULL),(99,'brisa85@example.net','90d3cf71d05182866acb05179523e05eb672f0a1','Sage','Will','1979-02-24',NULL),(100,'gregg63@example.org','c912ab9f50db37afd8c4a91bd33efbe22e1274c4','Erich','Gleason','2008-01-25',NULL),(101,'slimgomri5@gmail.com','azerty','Selim','GOMRI','1992-09-22','0102030405'),(102,'blabla@gmail.com','123','bla','BOU','2001-01-01','12345');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_flight`
--

DROP TABLE IF EXISTS `user_flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_flight` (
  `booking_number` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `flight_id` int DEFAULT NULL,
  `returnflight_id` int DEFAULT NULL,
  `price_paid` int DEFAULT NULL,
  `passenger_id` int DEFAULT NULL,
  PRIMARY KEY (`booking_number`),
  KEY `fk_user_idx` (`user_id`),
  KEY `fk_flight_idx` (`flight_id`),
  KEY `fk_passenger_idx` (`passenger_id`),
  KEY `fk_retunrflight_idx` (`returnflight_id`),
  CONSTRAINT `fk_flight` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`),
  CONSTRAINT `fk_passenger` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`id`),
  CONSTRAINT `fk_retunrflight` FOREIGN KEY (`returnflight_id`) REFERENCES `flight` (`id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_flight`
--

LOCK TABLES `user_flight` WRITE;
/*!40000 ALTER TABLE `user_flight` DISABLE KEYS */;
INSERT INTO `user_flight` VALUES (1,101,5,NULL,999,NULL),(10,101,3,4,504,NULL),(13,101,1,NULL,2000,NULL),(14,101,5,16,504,NULL),(15,101,16,16,550,NULL),(16,101,16,NULL,229,NULL),(17,101,22,NULL,576,NULL),(18,101,1,21,348,NULL),(19,101,1,NULL,1000,NULL),(20,101,1,21,348,NULL),(21,101,1,21,372,NULL);
/*!40000 ALTER TABLE `user_flight` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-28 21:10:16
