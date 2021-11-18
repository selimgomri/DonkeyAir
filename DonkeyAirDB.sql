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
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flight` (
  `id` int NOT NULL AUTO_INCREMENT,
  `flightNumber` varchar(45) NOT NULL,
  `departureAirport` varchar(45) NOT NULL,
  `arrivalAirport` varchar(45) NOT NULL,
  `departureTime` datetime NOT NULL,
  `arrivalTime` datetime NOT NULL,
  `capacitySecondClass` int DEFAULT NULL,
  `capacityFirstClass` int DEFAULT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight`
--

LOCK TABLES `flight` WRITE;
/*!40000 ALTER TABLE `flight` DISABLE KEYS */;
INSERT INTO `flight` VALUES (1,'DA023','CDG - France','MAD -  Madrid','2021-11-27 05:33:00','2021-11-27 08:53:00',150,30,190),(2,'DA054','CDG - France','BCN - Barcelona','2021-11-30 07:30:00','2021-11-30 10:50:00',150,30,221),(3,'DA099','CMN - Casablanca ','CDG - France','2021-12-30 09:20:00','2021-12-30 11:40:00',150,30,90),(4,'DA066','LIS - Lisbon ','CDG - France','2021-11-30 14:40:00','2021-11-30 16:40:00',150,30,77),(5,'DA128','CDG - France','NYC - new york ','2021-02-02 13:05:00','2021-02-02 19:45:00',150,30,530),(6,'DA005','RSS - Russia','CDG - France','2022-11-30 10:45:00','2022-11-30 14:15:00',150,30,433),(7,'DA127','CDG - France','SYD - Sydney ','2021-01-14 07:30:00','2021-01-14 12:30:00',150,30,320),(8,'DA009','CAI - Cairo','CDG - France','2021-12-20 12:55:00','2021-12-20 18:05:00',150,30,570),(9,'DA230','CDG - France','ICN - Seoul','2021-11-28 07:30:00','2021-11-28 15:30:00',150,30,604),(10,'DA333','CDG - France','DOH - Doha','2021-12-12 07:30:00','2021-12-12 14:30:00',150,30,669),(11,'DA409','NOW - Norway','CDG - France','2021-12-20 07:30:00','2021-12-20 15:30:00',150,30,240),(12,'DA006','ITA - Italy','CDG - France','2021-11-29 08:15:00','2021-11-29 10:15:00',150,30,110),(13,'DA700','CDG - France','AMM - Amman','2021-11-29 11:05:00','2021-11-29 17:10:00',150,30,350),(14,'DA222','TUR - Turkey','CDG - France','2022-01-02 17:00:00','2022-01-02 22:10:00',150,30,800),(15,'DA020','DBS - Bali','CDG - France','2021-12-30 06:20:00','2021-12-30 23:30:00',150,30,1200);
/*!40000 ALTER TABLE `flight` ENABLE KEYS */;
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
  `firstName` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'durward.swift@example.org','122cfbe726a184af8ab884f35359616d0e26d233','Cesar','Lakin','2010-12-17'),(2,'keon.feeney@example.net','c1cb96151396b97438c1f39fa07f3631c72639f5','Afton','Upton','0000-00-00'),(3,'zieme.filomena@example.net','481892370fe42a5601810629c6a281a43c578cfa','','Welch','0000-00-00'),(4,'kuhic.raven@example.org','419647e5943e8a4c53666efb08a0eb8953e97168','','McLaughlin','0000-00-00'),(5,'emory07@example.net','ffcba6214708d0d94cc25f4fa132133e8880038f','Conor','Barrows','0000-00-00'),(6,'eula.wisoky@example.com','62877eea8479c1f696ec4369c5b04ae6c57b936c','','Halvorson','0000-00-00'),(7,'shaina.bartell@example.org','d1a51e76f30fec4c88a3ced37541ba872221f434','','Frami','2001-06-05'),(8,'qwaters@example.org','88d0c138bf31473eba84a75da374cfd3f1a65f1a','Gladyce','Ankunding','1977-07-28'),(9,'lowe.hershel@example.com','395f49ef3629f0b70ee94e64f90d75f6aefa1303','Ted','West','0000-00-00'),(10,'kgislason@example.com','afc8cb1c0d35e7b490d60a4079c365a356fe1deb','','Luettgen','0000-00-00'),(11,'flo.glover@example.net','6be3ceea1740ca9d31852cce72727e0692bed677','','Mohr','1997-04-26'),(12,'orn.adeline@example.org','e14d0e8af072e61182e744f43a97de4962b0f55b','','Ziemann','0000-00-00'),(13,'fdeckow@example.net','3c3d4eb69de89650255ba1bca585a970c10261e4','','Mitchell','2015-12-27'),(14,'gutkowski.aurelia@example.net','d15aeab295371b7d00fee846e55014fbf41304b5','','Waters','0000-00-00'),(15,'aryanna69@example.net','c1955ce5bc313fb0626413f25afaf8befe056ed5','Kelly','Corkery','0000-00-00'),(16,'frami.frederik@example.com','7545123ee1b8336067b77f15415ff8e527a6aac5','Marcelino','Boehm','1970-01-16'),(17,'turcotte.willard@example.net','b782fd8122e8beb8659708075e43c97394d88547','','Eichmann','1978-01-10'),(18,'arthur51@example.org','575c561e564be6b8d77f40f27095624a9e91c1c0','','Labadie','0000-00-00'),(19,'hcrist@example.org','706d1d6853b65be5734b258785ec3039a4713762','','Mraz','0000-00-00'),(20,'autumn.hirthe@example.com','d4b46cc3867f6e5e13bbd545cb7441771f62d44f','','Quitzon','2003-08-30'),(21,'gino99@example.net','c3a65abb43a6ba0fb6e352470395339799d3e11d','','Thompson','1982-12-12'),(22,'yschumm@example.net','1b74a2888cd51bdebd6685910e898480a2410618','','Armstrong','2010-11-10'),(23,'kuvalis.wallace@example.net','afe869cf26022a1fe4958b50fc425e92bf4622b0','Kole','Erdman','0000-00-00'),(24,'viola27@example.net','358e435a95f55389c2de19ba99fb86902f4e9a2e','','Nolan','1995-11-26'),(25,'sigrid41@example.net','900798d7e5c6d2a731fb2412bf238364aadd085d','Sonya','Schaden','0000-00-00'),(26,'ygorczany@example.net','7ce233f57fec7f321a79981faf3ca164e1f616f5','Maribel','Langosh','0000-00-00'),(27,'amalia.kutch@example.net','10c0dadd96d018c7814e66b1a7fb233f251feb81','Fae','Ziemann','0000-00-00'),(28,'estefania97@example.com','61f331ff8f4c64b70bfe85bae60600d4e9b859d6','','Trantow','0000-00-00'),(29,'foster.quitzon@example.net','fd06a9d6c17abaf6b131820de34c79854a449758','','Shanahan','0000-00-00'),(30,'josinski@example.com','e54c09dad9404f4662ddfd0fffeec1c1dae03335','','Rempel','0000-00-00'),(31,'kkris@example.com','dddcb9e89e07ab097b8e8fab08d2027fce629881','Arvilla','Leuschke','0000-00-00'),(32,'newton24@example.org','07aeba85b5fa491a07173112828813ca34a2424f','Christine','Goyette','1984-12-08'),(33,'ischumm@example.net','d8d69f7071363952ffaeb542b265ca66372f5e10','','O\'Keefe','1994-09-13'),(34,'alivia46@example.org','2ef412e75f9ffab1ca1f46cb1bdf947bbdaeb8ec','Otha','Flatley','0000-00-00'),(35,'dadams@example.org','52f85c678303fe13c7de606b2b89f9bd7d904624','','Reichert','1996-05-13'),(36,'opal67@example.net','654413270eabcc179fa082fa543c90abbcf38394','Elenor','Jacobson','1983-09-13'),(37,'kari78@example.com','d4083511849b0995f9bc71812dae28cca5ba382d','','Ziemann','1996-02-26'),(38,'vbosco@example.net','5ecffc9f207b09aac9e81ff6d7c90f0481b90d59','','Beatty','1978-05-01'),(39,'xmcdermott@example.net','56952ac195667c5383009fde854355a9c178f3e4','Eldridge','Stiedemann','1988-09-03'),(40,'kirlin.corene@example.org','eb97dca53159deb4c683086aa722b4a6375d692d','Drake','Prosacco','2012-10-01'),(41,'therese.zulauf@example.org','9a25928a1fc13d46a157c87f13699301b45b168e','','Labadie','0000-00-00'),(42,'jbogan@example.com','9a894da4b17e8b79a725d4edef5aa3a97c2840f8','','Witting','2004-08-24'),(43,'nader.einar@example.com','e5f435c98153a945a071a389ce0a59e7f2d1e7c7','Eloise','Spinka','1987-12-31'),(44,'loraine50@example.net','2ac25fc38a31952363154dd28a416c1dbc5d767f','','Friesen','0000-00-00'),(45,'sporer.buster@example.net','039801a9d8e46bd1d31528bede7f4404f3e4368d','','Morissette','1971-11-03'),(46,'marley.kuhlman@example.org','6ca4f3fe39cbacf509dfca7537b5d53a6802b5ef','Korey','Keeling','2010-12-17'),(47,'xshields@example.com','d712fe2bfcaee41197bdc96b4af9c662d526fedc','Coty','Willms','0000-00-00'),(48,'mckenzie.hanna@example.com','637174e1031f4b994b88698696042bedd899d878','Gerhard','Shanahan','0000-00-00'),(49,'jamel.reinger@example.com','7f8695bf2fa17e254abc8ef1139a45ee5490d316','Rickey','Hyatt','0000-00-00'),(50,'bkeeling@example.com','1c34fe8ae34d785571fbd80774814eb71e319513','Jasper','Stamm','0000-00-00'),(51,'conrad.tremblay@example.com','d3b01ccae4dbe3cdfa6e0e1cf346119bd6b14cfb','','Johns','1976-07-13'),(52,'kovacek.albertha@example.net','a1452849545ad619c9ade1006b632b0410a5ad10','Estrella','Mante','0000-00-00'),(53,'umorissette@example.net','1009f144f31c7e16b628ff20cce728c2452703e7','','Mann','2020-05-31'),(54,'lloyd.dach@example.net','823d92246287ecaec555db54302f336b25063b98','','Beer','0000-00-00'),(55,'miller81@example.com','870417accbc1932864e7d5b2a3831301716ed8a8','Arlie','Lemke','0000-00-00'),(56,'dmedhurst@example.org','b393c2ad15f3c2bdb8c4b35fc7a1457219eb14f7','Bethel','Lakin','1979-09-28'),(57,'pacocha.rubie@example.org','30f659372af31911d9cf187ec4cc7d1743621cdc','Treva','Smitham','0000-00-00'),(58,'koepp.austin@example.net','8346728f4ffe129cd6fd031ae947eef7c22d1ea0','Colten','Stark','0000-00-00'),(59,'edyth16@example.com','13b2912e35772b3300fa36f66ba481fd6115c25f','Joelle','Mayer','0000-00-00'),(60,'agustina03@example.com','4776b3e41a0f1ab56f3b3d79ffe3af419fe2eb9d','Christina','Flatley','2004-10-15'),(61,'sdietrich@example.net','c12ac15053725d5eae8bdbe107caf52c9b086cbf','Robert','Hyatt','1980-09-02'),(62,'joesph13@example.com','476a43fb3ff3a7fc88256564ab615fff4bd2419d','','Crona','1988-12-07'),(63,'ron59@example.net','73119632d155be09833053b6c723d22d0a936237','','Hickle','2020-03-25'),(64,'darren51@example.net','a2322f5b2fcb672aaace7ae04c43f58f1ce14237','','Roob','1990-11-19'),(65,'landen03@example.net','a57871ec9f2fe8d253c5142ad85f67c5c49fa467','Hayley','Hamill','0000-00-00'),(66,'alison.pollich@example.com','65d7756e88174361e06fa927a655c6f7259cd60f','Augustine','Hyatt','0000-00-00'),(67,'klocko.kay@example.net','e6a49eb68c55a3f23d76d9fc8e71e5ba6e5f421e','','Grimes','0000-00-00'),(68,'tbauch@example.com','dd905ba52a5e70c86d3ab2f647d7e8b3f1f34f6c','','Effertz','0000-00-00'),(69,'yvette.tremblay@example.com','e3b6e92e4bd04b05b79344fd7fc3b56637cc5ed7','Richmond','King','1982-04-10'),(70,'steuber.lessie@example.net','e52e3b129c6c1f98c19d16416cd92eb464636286','Kathleen','Boehm','2016-12-13'),(71,'schultz.giuseppe@example.com','782289e254dbcd289d4f3ae46a64912c62a72d9f','Bertha','Mraz','1983-11-10'),(72,'summer60@example.com','e8a48dd60b645dee561c927f0f8dc2522bf8821f','Terry','Mitchell','2004-10-10'),(73,'romaine.schmitt@example.com','b7434a186a23b1242538ea2d7020a4aa6089ec5d','','Trantow','0000-00-00'),(74,'ro\'reilly@example.com','b604bbd6225df4488863b1cbb5736f67d3cc2e74','','Powlowski','1980-12-03'),(75,'sabryna42@example.com','b8f699d479de8450d5c97af1726548abb08dadc3','Alessandra','Wunsch','2000-02-17'),(76,'ronny20@example.net','202cbb0b8d8407ac75982e7638422cf3a4c547d1','','Murray','0000-00-00'),(77,'hector.lockman@example.net','a6f461f889ef377253004bba220cb12fb635840d','Molly','Wolf','1971-11-06'),(78,'peyton92@example.org','42b4c8b57f4fc42823955a8096b67c1d12e5bb78','Wanda','Nikolaus','1991-11-24'),(79,'gino48@example.net','ba183dc9cb8339b575a6e05bf269fda20f503ca1','Elmer','Walsh','0000-00-00'),(80,'ubergnaum@example.net','1e14776b02460b56f01bafe72391d31d46a73cef','','Barton','1975-03-24'),(81,'emmie.leannon@example.net','5fd322e46f9a8be5cd0f21e7666decea9c286abe','','Cole','1971-07-25'),(82,'sidney11@example.net','3db323528c82d15e25b81627fa5399db9a0ec389','','Kuvalis','2005-03-29'),(83,'murazik.louisa@example.org','a2aaf555158b29d922d69fffbf4a22471a6c863f','Rey','Braun','1971-11-18'),(84,'rebeka.prosacco@example.com','c10a09eec1f7ecb085865ce18ef51b177ffbc5b1','Michelle','Huel','2021-08-16'),(85,'rparisian@example.net','7da786143744d9fa6b2212f580535f8b03c6c22b','Theodore','Casper','2019-09-16'),(86,'pschultz@example.com','4faf830b9e3fa9c00c1e2a1e29596d3dec13fa99','Kaycee','Corwin','1996-10-20'),(87,'johnathan41@example.org','1f2e2418999e3b719faca8180a6809ebbeba434d','Adan','Tremblay','0000-00-00'),(88,'barrows.josiane@example.org','540a6de2bcd3f6de82f9ec6eed02aa5c276d1d9d','','Pouros','0000-00-00'),(89,'fgerhold@example.net','5ff246a8c15e087646dfb3ed1c2d5d59ad4b34ee','','Schiller','1975-09-25'),(90,'shanon42@example.com','a0bb00682f9dbcbf9ffa4a1864d399d79c2dddcd','','Breitenberg','1984-03-27'),(91,'amacejkovic@example.com','874625f1564b44d607421d9c3eaefebb030ccc42','Ethyl','Leannon','0000-00-00'),(92,'harold.beahan@example.net','e727c554a92933db009c188ba9c6da2f8166e5a5','Payton','Predovic','1978-01-29'),(93,'marlene05@example.org','0bed4bf0c85591117790485495a7470fced4d388','','Cronin','0000-00-00'),(94,'funk.maximillian@example.org','2cc0e3a7860cc8f75b8cebb3add80a4d8a388632','Okey','Stamm','2015-05-27'),(95,'urogahn@example.com','d63617a7e6b71920b73d02aeb60b976277757439','Dejah','Borer','0000-00-00'),(96,'hayden82@example.org','616aad04247bc74d0f5d777f88c52f5aa371a65a','','Rippin','2016-07-23'),(97,'eduardo40@example.net','e7e85f9390d2e119d50ded7c6904fc9c67c39c4f','Matteo','Hahn','0000-00-00'),(98,'anjali47@example.com','e21f758f1a759828e1847e0b58f3e8fa2da1a84a','Glenna','Jones','2006-01-05'),(99,'ssimonis@example.net','7da4ba3bd56cbcd6bb6235a02f88cb896dd8c236','Valerie','Jenkins','0000-00-00'),(100,'madelyn04@example.net','cfa85f9ff63f084c6b8e3d94d3be17ac56898012','','Ziemann','2014-04-04');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_flight`
--

DROP TABLE IF EXISTS `user_flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_flight` (
  `bookingNumber` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `flight_id` int DEFAULT NULL,
  PRIMARY KEY (`bookingNumber`),
  KEY `fk_user_idx` (`user_id`),
  KEY `fk_flight_idx` (`flight_id`),
  CONSTRAINT `fk_flight` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_flight`
--

LOCK TABLES `user_flight` WRITE;
/*!40000 ALTER TABLE `user_flight` DISABLE KEYS */;
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

-- Dump completed on 2021-11-18 10:43:30
