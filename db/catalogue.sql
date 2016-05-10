-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: orange-noel
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(60) NOT NULL,
  `description_cat` varchar(255) NOT NULL,
  `image_cat` varchar(100) NOT NULL,
  `route_cat` varchar(100) NOT NULL,
  `id_them` int(11) NOT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `id_them` (`id_them`),
  CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_them`) REFERENCES `thematique` (`id_them`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Protection','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','protection',1),(2,'Chargeurs de secours','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','chargeurs-de-secours',1),(3,'Rester connecté','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','dans-ma-voiture',1),(4,'Homelive','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','homelive',2),(5,'Terminaux fixes','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','terminaux-fixes',2),(6,'Enceintes','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','enceintes',2),(7,'Ampoules','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','ampoules',2),(8,'Montres et bracelets','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','montres-et-bracelets',2),(9,'Les accessoires utiles','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut urna velit, fringilla ut vulputate ullamcorper.','/assets/img/','les-accessoires-utiles',2),(11,'La sélection fun','','','select-fun',4);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `christmasroot`
--

DROP TABLE IF EXISTS `christmasroot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `christmasroot` (
  `ch_idroot` int(11) NOT NULL AUTO_INCREMENT,
  `ch_login` varchar(255) NOT NULL,
  `ch_passwd` varchar(255) NOT NULL,
  PRIMARY KEY (`ch_idroot`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `christmasroot`
--

LOCK TABLES `christmasroot` WRITE;
/*!40000 ALTER TABLE `christmasroot` DISABLE KEYS */;
INSERT INTO `christmasroot` VALUES (1,'catadmin_orange','267de6b58c80f4587981f07bf41feea485c1f54d');
/*!40000 ALTER TABLE `christmasroot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation`
--

DROP TABLE IF EXISTS `operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation` (
  `id_ope` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ope` varchar(100) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `ref_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_ope`),
  KEY `ref_prod` (`ref_prod`),
  CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`ref_prod`) REFERENCES `produit` (`ref_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation`
--

LOCK TABLES `operation` WRITE;
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
INSERT INTO `operation` VALUES (1,'78 &euro; remboursés','',43),(2,'20 &euro; remboursés','',52),(3,'Jusqu\'au 20 novembre, profitez de 30 &euro; remboursés pour l\'achat d\'un Thermostat Netatmo en bouti','',53);
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `ref_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prod` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `prix` varchar(14) NOT NULL,
  `image_prod` varchar(100) NOT NULL,
  `test_video` varchar(35) NOT NULL,
  `selection` int(1) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`ref_prod`),
  KEY `id_cat` (`id_cat`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (33,'Spray nettoyant gris','Format compact, fait pour être transporté. Facile à recharger. Utilisable sur tous les écrans.','9,99 &euro;','','',0,1),(34,'S View Cover Samsung Argent','Protégez votre Samsung Galaxy S6 à 360° !','49,99 &euro;','','',0,1),(35,'Coque Silicone Apple Iphone 6S Plus Noire','La coque en Silicone par Apple pour Iphone 6 et 6S','45,00 &euro;','','',0,1),(36,'2 Films universels V2','L\'accessoire indispensable pour votre smartphone','9,99 &euro;','','',0,1),(37,'Chargeur de secours Light 6A','Rechargez facilement tous vos accessoires!','44,99 &euro;','','',0,2),(38,'Chargeur Samsung Micro USB 1A','Rechargez facilement tous vos accessoires!','24,99 &euro;','','',0,2),(39,'Chargeur de secours Light 2A','Rechargez facilement tous vos accessoires! Coloris : bleu, orange, rose, blanc','9,99 &euro;','','',0,2),(40,'Support Smartphone','Fixez votre téléphone dans votre voiture','19,99 &euro;','','',0,3),(42,'Airbox AUTO 4G','Compatible 4G 150 MBITS , compatible Windows, IOS, Mac, Linux, Android. Jusqu\'à 10 connexions en simultannées en WI FI. Simple d\'utilisation.','74,90 &euro;','','',0,3),(43,'Pack Homelive','- Une prise intelligente pour piloter des appareils électriques à distance.</br />\r\n- Le détecteur d\'ouverture de porte ou de fenêtre.<br />\r\n- Le détecteur de mouvement pour détecter une présence et mesurer la température et la luminosité.','79,00 ?','','',1,4),(44,'Homelive Porte-clé','le porte-clés télécommande vous permet d’un clic de passer votre système Homelive en mode « marche » ou « arrêt ». Vous pouvez également contrôler des objets ou des scénarios via les autres touches.','39,00 &euro;','','',0,4),(45,'Répéteur Z WAVE','Disposez vos objets connectés à des endroits très éloignés de la base.','39,00 &euro;','','',0,4),(46,'Clavier de commande','le clavier de commande permet à tous les membres de votre famille d’activer ou désactiver votre système Homelive grâce à un code confidentiel. Si vous ne souhaitez pas communiquer votre code d’accès, un badge d’activation/Désactivation est également fourni','59,00 &euro;','','',0,4),(47,'Détecteur de fuites','Protégez votre habitation d’une fuite d’eau et soyez alerté pour intervenir au plus vite.','59,00 &euro;','','',0,4),(48,'Détecteur de fumée','Alertez les occupants de votre domicile par une sirène et recevez un email et un sms d’alerte.','39,00 &euro;','','',0,4),(49,'Caméra','Veillez à distance sur ce qui se passe chez vous à l’aide d’un smartphone ou depuis le web. ','99,00 &euro;','','',0,4),(50,'Sirène','Alertez vos voisins et faites fuir les intrus.','99,00 &euro;','','',0,4),(51,'Module volet roulant','Contrôlez vos stores et volets roulants où que vous soyez avec une seule application !','59,00 &euro;','','',0,4),(52,'Station Netatmo','Consultez la température et la qualité de l\'air de chez vous, où que vous soyez !','169,00 &euro;','','',1,4),(53,'Thermostat','Contrôlez votre chauffage à distance','179,00 &euro;','','',0,4),(54,'Gigaset C620 duo','Répertoire 250 contacts / Ecran Retro éclairé / Fonction surveillence d\'une pièce / Journal d\'appels / Mains Libre / personnalisation appel VIP','84,90 &euro;','','',0,5),(55,'Enceinte JBL Flip 2','Redécouvrez l’incontournable enceinte JBL Flip 2 dans sa version black edition ! Plusieurs coloris disponibles','99,99 &euro;','','',0,6),(56,'Enceinte Cubelight','Illuminez votre musique avec classe. Disponible en noir.','29,99 &euro;','','',0,6),(57,'Enceinte Beoplay','Enceinte Bluetooth portable offrant un son True360 et 24 heures d’autonomie.','399,99 &euro;','','',0,6),(58,'Enceinte Omni 10','L\'enceinte sans fil d\'HARMAN ET KARDON équipé d’une qualité studio HD 24-bit/96kHz.','199,99 &euro;','','',0,6),(59,'Ampoule Striim Light Mini Color','Facile à utiliser, avec un son clair et généreux partout où vous pouvez brancher une ampoule. Télécommande en bluetooth','69,99 &euro;','','',0,7),(60,'Ampoule Smart Light color','Créér une ambiance','39,99 &euro;','','',1,7),(61,'Ampoule Aroma Light','Diffuse discrètement et efficacement votre huile essentielle.','49,99 &euro;','','',0,7),(62,'Flower Power Parrot','Avec Parrot Flower Power, n’importe qui peut désormais avoir la main verte.','49,99 &euro;','','',0,9),(63,'Porte clef RecKEY','Ne perdez plus vos clés, ni votre voiture, recKEY vous les retrouve ! Existe en noir','29,99 &euro;','','',0,9),(64,'Perche pour GO PRO','Prenez de la hauteur avec la perche GOPRO','39,99 &euro;','','',0,9),(65,'Montre Samsung Gear S2','Découvrez la première montre connectée équipée d’un cadran rotatif.','349,99 &euro;','','',1,8),(67,'Station météo Climate noir','Le traqueur d\'environnement connecté à votre Smartphone','59,99 &euro;','','',1,4),(69,'Clef USB Dark Vador','La gamme de clef USB Star Wars','19,99 &euro;','','',1,11),(70,'Casque Samsung Gear Réalité Virtuelle','Vivez l\'expérience de la Réalité Virtuelle grâce à ce casque Samsung et plongez en immersion dans les jeux','199,99 &euro;','','',0,11),(71,'Robot BB8 STAR WARS','Le Droid™ contrôlé par application dont les mouvements et la personnalité sont aussi authentiques que révolutionnaires.','169,90 &euro;','','',1,11),(72,'Drone Parrot Rolling Spider Blanc','Laissez-vous tenter par le Mini Drone Rolling Spider, la nouvelle generation de robots connectes !','99,99 &euro;','','',0,11),(73,'Drone Parrot Cargo Mars','Faites voler et personnalisez votre minidrone !','99,99 &euro;','','',0,11);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thematique` (
  `id_them` int(11) NOT NULL AUTO_INCREMENT,
  `nom_them` varchar(60) NOT NULL,
  `img_them` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id_them`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thematique`
--

LOCK TABLES `thematique` WRITE;
/*!40000 ALTER TABLE `thematique` DISABLE KEYS */;
INSERT INTO `thematique` VALUES (1,'Les indispensables pour mon mobile','indsp.png','/indispensables'),(2,'Des cadeaux pour s\'équiper à Noël','utl.png','/utiles'),(3,'La sélection des cadeaux tendance','tdc.png','/tendance'),(4,'La sélection des cadeaux fun','fun.png','/fun/select-fun');
/*!40000 ALTER TABLE `thematique` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-10 10:26:43
