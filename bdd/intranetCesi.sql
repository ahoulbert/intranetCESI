-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: intranetcesi
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eleve` (
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(250) COLLATE utf8_bin NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lienLinkedin` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `imgProfil` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  `idPromotion` int(11) NOT NULL,
  `idTypeEleve` int(11) NOT NULL,
  `idSexeEleve` int(11) NOT NULL,
  PRIMARY KEY (`mailCESI`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idPromotion` (`idPromotion`),
  KEY `idTypeEleve` (`idTypeEleve`),
  KEY `idSexeEleve` (`idSexeEleve`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleve`
--

LOCK TABLES `eleve` WRITE;
/*!40000 ALTER TABLE `eleve` DISABLE KEYS */;
INSERT INTO `eleve` VALUES ('clement.azibeiro@viacesi.fr','$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy','AZIBEIRO','Clément','1999-07-13','0611363675','Le Mans','En alternanc',NULL,'5e78db5e19ef1.jpeg',1,1,2,1),('maxime.villermin@viacesi.fr','$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy','VILLERMIN','Maxime','1998-10-26','0611459875','Le Mans','En alternance chez Vinci',NULL,NULL,1,1,2,1),('antoine.houlbert@viacesi.fr','$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy','HOULBERT','Antoine','1999-01-01','0611125675','Spay','En alternance chez Studefi',NULL,NULL,2,1,2,1),('marvyn.rocher@viacesi.fr','$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy','ROCHER','Marvyn','1999-01-01','06765475','Le Mans','En alternance chez ta darone',NULL,NULL,NULL,1,2,1);
/*!40000 ALTER TABLE `eleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eleveevenement`
--

DROP TABLE IF EXISTS `eleveevenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eleveevenement` (
  `idEvenement` int(11) NOT NULL,
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  `estInterese` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEvenement`,`mailCESI`),
  KEY `mailCESI` (`mailCESI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleveevenement`
--

LOCK TABLES `eleveevenement` WRITE;
/*!40000 ALTER TABLE `eleveevenement` DISABLE KEYS */;
INSERT INTO `eleveevenement` VALUES (1,'clement.azibeiro@viacesi.fr',0),(2,'clement.azibeiro@viacesi.fr',0),(3,'clement.azibeiro@viacesi.fr',0),(1,'maxime.villermin@viacesi.fr',0),(2,'maxime.villermin@viacesi.fr',0),(3,'maxime.villermin@viacesi.fr',0),(1,'antoine.houlbert@viacesi.fr',0),(2,'antoine.houlbert@viacesi.fr',0),(3,'antoine.houlbert@viacesi.fr',0),(1,'marvyn.rocher@viacesi.fr',0),(2,'marvyn.rocher@viacesi.fr',0),(3,'marvyn.rocher@viacesi.fr',0),(5,'clement.azibeiro@viacesi.fr',0),(5,'antoine.houlbert@viacesi.fr',0),(5,'marvyn.rocher@viacesi.fr',0),(5,'maxime.villermin@viacesi.fr',0),(6,'clement.azibeiro@viacesi.fr',0),(6,'antoine.houlbert@viacesi.fr',0),(6,'marvyn.rocher@viacesi.fr',0),(6,'maxime.villermin@viacesi.fr',0),(7,'clement.azibeiro@viacesi.fr',0),(7,'antoine.houlbert@viacesi.fr',0),(7,'marvyn.rocher@viacesi.fr',0),(7,'maxime.villermin@viacesi.fr',0),(8,'clement.azibeiro@viacesi.fr',0),(8,'antoine.houlbert@viacesi.fr',0),(8,'marvyn.rocher@viacesi.fr',0),(8,'maxime.villermin@viacesi.fr',0),(9,'clement.azibeiro@viacesi.fr',1),(9,'antoine.houlbert@viacesi.fr',0),(9,'marvyn.rocher@viacesi.fr',0),(9,'maxime.villermin@viacesi.fr',0);
/*!40000 ALTER TABLE `eleveevenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eleverolegroupeevenement`
--

DROP TABLE IF EXISTS `eleverolegroupeevenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eleverolegroupeevenement` (
  `idRole` int(11) NOT NULL,
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  `idEvenement` int(11) DEFAULT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRole`,`mailCESI`),
  KEY `mailCESI` (`mailCESI`),
  KEY `idEvenement` (`idEvenement`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleverolegroupeevenement`
--

LOCK TABLES `eleverolegroupeevenement` WRITE;
/*!40000 ALTER TABLE `eleverolegroupeevenement` DISABLE KEYS */;
INSERT INTO `eleverolegroupeevenement` VALUES (1,'clement.azibeiro@viacesi.fr',NULL,1),(2,'clement.azibeiro@viacesi.fr',NULL,1),(3,'clement.azibeiro@viacesi.fr',NULL,1),(4,'clement.azibeiro@viacesi.fr',NULL,1),(1,'marvyn.rocher@viacesi.fr',NULL,1),(2,'marvyn.rocher@viacesi.fr',NULL,1),(3,'marvyn.rocher@viacesi.fr',NULL,1),(4,'marvyn.rocher@viacesi.fr',NULL,1),(1,'maxime.villermin@viacesi.fr',NULL,1),(2,'maxime.villermin@viacesi.fr',NULL,1),(3,'maxime.villermin@viacesi.fr',NULL,1),(4,'maxime.villermin@viacesi.fr',NULL,1),(1,'antoine.houlbert@viacesi.fr',NULL,1),(2,'antoine.houlbert@viacesi.fr',NULL,1),(3,'antoine.houlbert@viacesi.fr',NULL,1),(4,'antoine.houlbert@viacesi.fr',NULL,1);
/*!40000 ALTER TABLE `eleverolegroupeevenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `siteWeb` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entreprise`
--

LOCK TABLES `entreprise` WRITE;
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT INTO `entreprise` VALUES (1,'Vinci Energies Systemes Informations',NULL),(2,'STUDEFI',NULL),(3,'Chez mon maitre',NULL),(4,'',NULL),(5,'',NULL),(6,'',NULL);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enumsexeeleve`
--

DROP TABLE IF EXISTS `enumsexeeleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enumsexeeleve` (
  `idSexeEleve` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idSexeEleve`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enumsexeeleve`
--

LOCK TABLES `enumsexeeleve` WRITE;
/*!40000 ALTER TABLE `enumsexeeleve` DISABLE KEYS */;
INSERT INTO `enumsexeeleve` VALUES (1,'Homme'),(2,'Femme');
/*!40000 ALTER TABLE `enumsexeeleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enumstatutamitier`
--

DROP TABLE IF EXISTS `enumstatutamitier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enumstatutamitier` (
  `idStatut` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enumstatutamitier`
--

LOCK TABLES `enumstatutamitier` WRITE;
/*!40000 ALTER TABLE `enumstatutamitier` DISABLE KEYS */;
INSERT INTO `enumstatutamitier` VALUES (1,'Accepté'),(2,'En attente'),(3,'Refusé');
/*!40000 ALTER TABLE `enumstatutamitier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enumtypeeleve`
--

DROP TABLE IF EXISTS `enumtypeeleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enumtypeeleve` (
  `idTypeEleve` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTypeEleve`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enumtypeeleve`
--

LOCK TABLES `enumtypeeleve` WRITE;
/*!40000 ALTER TABLE `enumtypeeleve` DISABLE KEYS */;
INSERT INTO `enumtypeeleve` VALUES (1,'Etudiant'),(2,'Alternant');
/*!40000 ALTER TABLE `enumtypeeleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etreamis`
--

DROP TABLE IF EXISTS `etreamis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etreamis` (
  `mailCESIDemandeur` varchar(50) COLLATE utf8_bin NOT NULL,
  `mailCESIReceveur` varchar(50) COLLATE utf8_bin NOT NULL,
  `idStatut` int(11) DEFAULT NULL,
  PRIMARY KEY (`mailCESIDemandeur`,`mailCESIReceveur`),
  KEY `mailCESIReceveur` (`mailCESIReceveur`),
  KEY `idStatut` (`idStatut`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etreamis`
--

LOCK TABLES `etreamis` WRITE;
/*!40000 ALTER TABLE `etreamis` DISABLE KEYS */;
/*!40000 ALTER TABLE `etreamis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `lieu` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idEvenement`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement`
--

LOCK TABLES `evenement` WRITE;
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
INSERT INTO `evenement` VALUES (1,'Vacances','C\'est bientôt les vacances','2020-02-17','2020-02-28','Le Mans'),(2,'Grosse soirée','pump it up','2020-04-17','2020-02-28','Le Mans'),(3,'24h','24h du mans','2020-06-13','2020-02-28','Le Mans');
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupe`
--

LOCK TABLES `groupe` WRITE;
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;
INSERT INTO `groupe` VALUES (1,'ALL','2020-02-27','ALL'),(2,'PFR Madera','2020-02-28','C\'est un groupe pour le PFR'),(14,'Tunning','2020-03-24','tunning');
/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupeeleve`
--

DROP TABLE IF EXISTS `groupeeleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groupeeleve` (
  `idGroupe` int(11) NOT NULL,
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idGroupe`,`mailCESI`),
  KEY `mailCESI` (`mailCESI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupeeleve`
--

LOCK TABLES `groupeeleve` WRITE;
/*!40000 ALTER TABLE `groupeeleve` DISABLE KEYS */;
INSERT INTO `groupeeleve` VALUES (1,'antoine.houlbert@viacesi.fr'),(1,'clement.azibeiro@viacesi.fr'),(1,'marvyn.rocher@viacesi.fr'),(1,'maxime.villermin@viacesi.fr'),(2,'clement.azibeiro@viacesi.fr');
/*!40000 ALTER TABLE `groupeeleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idEvenement` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImage`),
  KEY `idEvenement` (`idEvenement`),
  KEY `idPost` (`idPost`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreation` date DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `titre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`idPost`),
  KEY `mailCESI` (`mailCESI`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (8,'2020-02-20','CECI EST UN TEST','','marvyn.rocher@viacesi.fr',1),(7,'2020-02-21','CECI EST UN TEST','','antoine.houlbert@viacesi.fr',1),(6,'2020-02-22','CECI EST UN TEST','','clement.azibeiro@viacesi.fr',2),(5,'2020-03-23','CECI EST UN TEST','','clement.azibeiro@viacesi.fr',1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posteleve`
--

DROP TABLE IF EXISTS `posteleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posteleve` (
  `idPost` int(11) NOT NULL,
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  `like` tinyint(1) NOT NULL,
  `comment` tinyint(1) NOT NULL,
  `commentaire` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idPost`,`mailCESI`),
  KEY `mailCESI` (`mailCESI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posteleve`
--

LOCK TABLES `posteleve` WRITE;
/*!40000 ALTER TABLE `posteleve` DISABLE KEYS */;
INSERT INTO `posteleve` VALUES (7,'clement.azibeiro@viacesi.fr',0,0,''),(7,'antoine.houlbert@viacesi.fr',0,0,''),(7,'marvyn.rocher@viacesi.fr',0,0,''),(7,'maxime.villermin@viacesi.fr',0,0,''),(8,'marvyn.rocher@viacesi.fr',1,0,''),(8,'antoine.houlbert@viacesi.fr',1,1,''),(8,'clement.azibeiro@viacesi.fr',0,1,''),(8,'maxime.villermin@viacesi.fr',1,0,''),(6,'marvyn.rocher@viacesi.fr',0,0,''),(6,'antoine.houlbert@viacesi.fr',0,0,''),(6,'clement.azibeiro@viacesi.fr',0,0,''),(6,'maxime.villermin@viacesi.fr',0,0,''),(5,'marvyn.rocher@viacesi.fr',0,0,''),(5,'antoine.houlbert@viacesi.fr',0,0,''),(5,'clement.azibeiro@viacesi.fr',0,0,''),(5,'maxime.villermin@viacesi.fr',0,0,''),(14,'clement.azibeiro@viacesi.fr',0,0,NULL),(15,'clement.azibeiro@viacesi.fr',0,0,NULL),(17,'clement.azibeiro@viacesi.fr',0,0,NULL),(17,'antoine.houlbert@viacesi.fr',0,0,NULL),(17,'marvyn.rocher@viacesi.fr',0,0,NULL),(17,'maxime.villermin@viacesi.fr',0,0,NULL),(18,'clement.azibeiro@viacesi.fr',0,0,NULL),(18,'antoine.houlbert@viacesi.fr',0,0,NULL),(18,'marvyn.rocher@viacesi.fr',0,0,NULL),(18,'maxime.villermin@viacesi.fr',0,0,NULL),(19,'clement.azibeiro@viacesi.fr',0,0,NULL),(19,'antoine.houlbert@viacesi.fr',0,0,NULL),(19,'marvyn.rocher@viacesi.fr',0,0,NULL),(19,'maxime.villermin@viacesi.fr',0,0,NULL),(20,'clement.azibeiro@viacesi.fr',0,0,NULL),(20,'antoine.houlbert@viacesi.fr',0,0,NULL),(20,'marvyn.rocher@viacesi.fr',0,0,NULL),(20,'maxime.villermin@viacesi.fr',0,0,NULL),(21,'clement.azibeiro@viacesi.fr',0,0,NULL),(21,'antoine.houlbert@viacesi.fr',0,0,NULL),(21,'marvyn.rocher@viacesi.fr',0,0,NULL),(21,'maxime.villermin@viacesi.fr',0,0,NULL),(22,'clement.azibeiro@viacesi.fr',0,0,NULL),(22,'antoine.houlbert@viacesi.fr',0,0,NULL),(22,'marvyn.rocher@viacesi.fr',0,0,NULL),(22,'maxime.villermin@viacesi.fr',0,0,NULL),(23,'clement.azibeiro@viacesi.fr',0,0,NULL),(23,'antoine.houlbert@viacesi.fr',0,0,NULL),(23,'marvyn.rocher@viacesi.fr',0,0,NULL),(23,'maxime.villermin@viacesi.fr',0,0,NULL),(24,'clement.azibeiro@viacesi.fr',0,0,NULL),(24,'antoine.houlbert@viacesi.fr',0,0,NULL),(24,'marvyn.rocher@viacesi.fr',0,0,NULL),(24,'maxime.villermin@viacesi.fr',0,0,NULL),(25,'clement.azibeiro@viacesi.fr',0,0,NULL),(25,'antoine.houlbert@viacesi.fr',0,0,NULL),(25,'marvyn.rocher@viacesi.fr',0,0,NULL),(25,'maxime.villermin@viacesi.fr',0,0,NULL),(26,'clement.azibeiro@viacesi.fr',0,0,NULL),(26,'antoine.houlbert@viacesi.fr',0,0,NULL),(26,'marvyn.rocher@viacesi.fr',0,0,NULL),(26,'maxime.villermin@viacesi.fr',0,0,NULL),(27,'clement.azibeiro@viacesi.fr',0,0,NULL),(27,'antoine.houlbert@viacesi.fr',0,0,NULL),(27,'marvyn.rocher@viacesi.fr',0,0,NULL),(27,'maxime.villermin@viacesi.fr',0,0,NULL),(28,'clement.azibeiro@viacesi.fr',0,0,NULL),(28,'antoine.houlbert@viacesi.fr',0,0,NULL),(28,'marvyn.rocher@viacesi.fr',0,0,NULL),(28,'maxime.villermin@viacesi.fr',0,0,NULL),(29,'clement.azibeiro@viacesi.fr',0,0,NULL),(29,'antoine.houlbert@viacesi.fr',0,0,NULL),(29,'marvyn.rocher@viacesi.fr',0,0,NULL),(29,'maxime.villermin@viacesi.fr',0,0,NULL),(30,'clement.azibeiro@viacesi.fr',0,0,NULL),(30,'antoine.houlbert@viacesi.fr',0,0,NULL),(30,'marvyn.rocher@viacesi.fr',0,0,NULL),(30,'maxime.villermin@viacesi.fr',0,0,NULL),(31,'clement.azibeiro@viacesi.fr',0,0,NULL),(31,'antoine.houlbert@viacesi.fr',0,0,NULL),(31,'marvyn.rocher@viacesi.fr',0,0,NULL),(31,'maxime.villermin@viacesi.fr',0,0,NULL),(32,'clement.azibeiro@viacesi.fr',0,0,NULL),(32,'antoine.houlbert@viacesi.fr',0,0,NULL),(32,'marvyn.rocher@viacesi.fr',0,0,NULL),(32,'maxime.villermin@viacesi.fr',0,0,NULL),(33,'clement.azibeiro@viacesi.fr',0,0,NULL),(33,'antoine.houlbert@viacesi.fr',0,0,NULL),(33,'marvyn.rocher@viacesi.fr',0,0,NULL),(33,'maxime.villermin@viacesi.fr',0,0,NULL),(34,'clement.azibeiro@viacesi.fr',0,0,NULL),(34,'antoine.houlbert@viacesi.fr',0,0,NULL),(34,'marvyn.rocher@viacesi.fr',0,0,NULL),(34,'maxime.villermin@viacesi.fr',0,0,NULL),(35,'clement.azibeiro@viacesi.fr',0,0,NULL),(35,'antoine.houlbert@viacesi.fr',0,0,NULL),(35,'marvyn.rocher@viacesi.fr',0,0,NULL),(35,'maxime.villermin@viacesi.fr',0,0,NULL),(36,'clement.azibeiro@viacesi.fr',0,0,NULL),(36,'antoine.houlbert@viacesi.fr',0,0,NULL),(36,'marvyn.rocher@viacesi.fr',0,0,NULL),(36,'maxime.villermin@viacesi.fr',0,0,NULL),(37,'clement.azibeiro@viacesi.fr',0,0,NULL),(37,'antoine.houlbert@viacesi.fr',0,0,NULL),(37,'marvyn.rocher@viacesi.fr',0,0,NULL),(37,'maxime.villermin@viacesi.fr',0,0,NULL),(38,'clement.azibeiro@viacesi.fr',0,0,NULL),(38,'antoine.houlbert@viacesi.fr',0,0,NULL),(38,'marvyn.rocher@viacesi.fr',0,0,NULL),(38,'maxime.villermin@viacesi.fr',0,0,NULL),(39,'clement.azibeiro@viacesi.fr',0,0,NULL),(39,'antoine.houlbert@viacesi.fr',0,0,NULL),(39,'marvyn.rocher@viacesi.fr',0,0,NULL),(39,'maxime.villermin@viacesi.fr',0,0,NULL),(40,'clement.azibeiro@viacesi.fr',0,0,NULL),(40,'antoine.houlbert@viacesi.fr',0,0,NULL),(40,'marvyn.rocher@viacesi.fr',0,0,NULL),(40,'maxime.villermin@viacesi.fr',0,0,NULL),(41,'clement.azibeiro@viacesi.fr',0,0,NULL),(41,'antoine.houlbert@viacesi.fr',0,0,NULL),(41,'marvyn.rocher@viacesi.fr',0,0,NULL),(41,'maxime.villermin@viacesi.fr',0,0,NULL),(42,'clement.azibeiro@viacesi.fr',0,0,NULL),(42,'antoine.houlbert@viacesi.fr',0,0,NULL),(42,'marvyn.rocher@viacesi.fr',0,0,NULL),(42,'maxime.villermin@viacesi.fr',0,0,NULL),(43,'clement.azibeiro@viacesi.fr',0,0,NULL),(43,'antoine.houlbert@viacesi.fr',0,0,NULL),(43,'marvyn.rocher@viacesi.fr',0,0,NULL),(43,'maxime.villermin@viacesi.fr',0,0,NULL),(44,'clement.azibeiro@viacesi.fr',0,0,NULL),(44,'antoine.houlbert@viacesi.fr',0,0,NULL),(44,'marvyn.rocher@viacesi.fr',0,0,NULL),(44,'maxime.villermin@viacesi.fr',0,0,NULL),(45,'clement.azibeiro@viacesi.fr',0,0,NULL),(45,'antoine.houlbert@viacesi.fr',0,0,NULL),(45,'marvyn.rocher@viacesi.fr',0,0,NULL),(45,'maxime.villermin@viacesi.fr',0,0,NULL),(46,'clement.azibeiro@viacesi.fr',0,0,NULL),(46,'antoine.houlbert@viacesi.fr',0,0,NULL),(46,'marvyn.rocher@viacesi.fr',0,0,NULL),(46,'maxime.villermin@viacesi.fr',0,0,NULL),(47,'clement.azibeiro@viacesi.fr',0,0,NULL),(47,'antoine.houlbert@viacesi.fr',0,0,NULL),(47,'marvyn.rocher@viacesi.fr',0,0,NULL),(47,'maxime.villermin@viacesi.fr',0,0,NULL),(48,'clement.azibeiro@viacesi.fr',0,0,NULL),(48,'antoine.houlbert@viacesi.fr',0,0,NULL),(48,'marvyn.rocher@viacesi.fr',0,0,NULL),(48,'maxime.villermin@viacesi.fr',0,0,NULL),(49,'clement.azibeiro@viacesi.fr',0,0,NULL),(49,'antoine.houlbert@viacesi.fr',0,0,NULL),(49,'marvyn.rocher@viacesi.fr',0,0,NULL),(49,'maxime.villermin@viacesi.fr',0,0,NULL),(50,'clement.azibeiro@viacesi.fr',1,0,NULL),(50,'antoine.houlbert@viacesi.fr',0,0,NULL),(50,'marvyn.rocher@viacesi.fr',0,0,NULL),(50,'maxime.villermin@viacesi.fr',0,0,NULL),(51,'clement.azibeiro@viacesi.fr',0,0,NULL),(51,'antoine.houlbert@viacesi.fr',0,0,NULL),(51,'marvyn.rocher@viacesi.fr',0,0,NULL),(51,'maxime.villermin@viacesi.fr',0,0,NULL),(52,'clement.azibeiro@viacesi.fr',0,0,NULL),(52,'antoine.houlbert@viacesi.fr',0,0,NULL),(52,'marvyn.rocher@viacesi.fr',0,0,NULL),(52,'maxime.villermin@viacesi.fr',0,0,NULL),(53,'clement.azibeiro@viacesi.fr',0,0,NULL),(53,'antoine.houlbert@viacesi.fr',0,0,NULL),(53,'marvyn.rocher@viacesi.fr',0,0,NULL),(53,'maxime.villermin@viacesi.fr',0,0,NULL),(54,'clement.azibeiro@viacesi.fr',1,0,NULL),(54,'antoine.houlbert@viacesi.fr',0,0,NULL),(54,'marvyn.rocher@viacesi.fr',0,0,NULL),(54,'maxime.villermin@viacesi.fr',0,0,NULL),(55,'clement.azibeiro@viacesi.fr',1,0,NULL),(55,'antoine.houlbert@viacesi.fr',0,0,NULL),(55,'marvyn.rocher@viacesi.fr',0,0,NULL),(55,'maxime.villermin@viacesi.fr',0,0,NULL),(56,'clement.azibeiro@viacesi.fr',1,0,NULL),(56,'antoine.houlbert@viacesi.fr',0,0,NULL),(56,'marvyn.rocher@viacesi.fr',0,0,NULL),(56,'maxime.villermin@viacesi.fr',0,0,NULL),(57,'clement.azibeiro@viacesi.fr',0,0,NULL),(57,'antoine.houlbert@viacesi.fr',0,0,NULL),(57,'marvyn.rocher@viacesi.fr',0,0,NULL),(57,'maxime.villermin@viacesi.fr',0,0,NULL),(58,'clement.azibeiro@viacesi.fr',0,0,NULL),(58,'antoine.houlbert@viacesi.fr',0,0,NULL),(58,'marvyn.rocher@viacesi.fr',0,0,NULL),(58,'maxime.villermin@viacesi.fr',0,0,NULL),(59,'clement.azibeiro@viacesi.fr',0,0,NULL),(59,'antoine.houlbert@viacesi.fr',0,0,NULL),(59,'marvyn.rocher@viacesi.fr',0,0,NULL),(59,'maxime.villermin@viacesi.fr',0,0,NULL),(60,'clement.azibeiro@viacesi.fr',1,0,NULL),(60,'ryo.azibeiro@viacesi.fr',1,0,NULL),(60,'antoine.houlbert@viacesi.fr',0,0,NULL),(60,'marvyn.rocher@viacesi.fr',0,0,NULL),(60,'maxime.villermin@viacesi.fr',0,0,NULL);
/*!40000 ALTER TABLE `posteleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotion` (
  `idPromotion` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `annee` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `effectif` int(4) DEFAULT NULL,
  PRIMARY KEY (`idPromotion`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` VALUES (1,'RIL','2019-2021',48);
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Lire'),(2,'Poster'),(3,'Liker'),(4,'Commenter');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'News'),(2,'Jeux'),(3,'Amis'),(4,'Nouriture'),(5,'Design'),(6,'Art'),(7,'Photos');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tageleve`
--

DROP TABLE IF EXISTS `tageleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tageleve` (
  `mailCESI` varchar(50) COLLATE utf8_bin NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`mailCESI`,`idTag`),
  KEY `idTag` (`idTag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tageleve`
--

LOCK TABLES `tageleve` WRITE;
/*!40000 ALTER TABLE `tageleve` DISABLE KEYS */;
INSERT INTO `tageleve` VALUES ('clement.azibeiro@viacesi.fr',1);
/*!40000 ALTER TABLE `tageleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagpost`
--

DROP TABLE IF EXISTS `tagpost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tagpost` (
  `idPost` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idPost`,`idTag`),
  KEY `idTag` (`idTag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagpost`
--

LOCK TABLES `tagpost` WRITE;
/*!40000 ALTER TABLE `tagpost` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagpost` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-24 17:22:15
