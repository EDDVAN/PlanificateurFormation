CREATE DATABASE IF NOT EXISTS `planforma` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `planforma`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: planforma
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!50503 SET NAMES utf8 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `cours` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idSujet` int(11) NOT NULL,
    `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `content` text COLLATE utf8mb4_unicode_ci,
    `description` text COLLATE utf8mb4_unicode_ci,
    `audience` text COLLATE utf8mb4_unicode_ci,
    `duration` int(11) DEFAULT NULL,
    `testIncluded` tinyint(4) DEFAULT NULL,
    `testContent` text COLLATE utf8mb4_unicode_ci,
    `logo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_cours_sujet_idx` (`idSujet`),
    CONSTRAINT `fk_cours_sujet` FOREIGN KEY (`idSujet`) REFERENCES `sujet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `cours`
--

LOCK TABLES `cours` WRITE;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */
;

/*!40000 ALTER TABLE `cours` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `domaine` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
    `description` text CHARACTER SET latin1,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `domaine`
--

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */
;
/*!40000 ALTER TABLE `domaine` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `formateur` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `firstName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `lastName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description` text COLLATE utf8mb4_unicode_ci,
    `photo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `formateur`
--

LOCK TABLES `formateur` WRITE;
/*!40000 ALTER TABLE `formateur` DISABLE KEYS */
;

/*!40000 ALTER TABLE `formateur` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `formation` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idFormateur` int(11) NOT NULL,
    `idCours` int(11) NOT NULL,
    `price` double DEFAULT NULL,
    `mode` enum('Remote', 'On-Site') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_formation_cours_idx` (`idCours`),
    KEY `fk_formation_formateur_idx` (`idFormateur`),
    CONSTRAINT `fk_formation_cours` FOREIGN KEY (`idCours`) REFERENCES `cours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_formation_formateur` FOREIGN KEY (`idFormateur`) REFERENCES `formateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `formation`
--

LOCK TABLES `formation` WRITE;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */
;

/*!40000 ALTER TABLE `formation` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `formation_date`
--

DROP TABLE IF EXISTS `formation_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `formation_date` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idFormation` int(11) NOT NULL,
    `idVille` int(11) NOT NULL,
    `date` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_date_formation_idx` (`idFormation`),
    KEY `fk_date_ville_idx` (`idVille`),
    CONSTRAINT `fk_date_formation` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_date_ville` FOREIGN KEY (`idVille`) REFERENCES `ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 8 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `formation_date`
--

LOCK TABLES `formation_date` WRITE;
/*!40000 ALTER TABLE `formation_date` DISABLE KEYS */
;

/*!40000 ALTER TABLE `formation_date` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `inscription` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idFormationDate` int(11) NOT NULL,
    `firstName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `lastName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `paid` tinyint(4) DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `fk_inscription_date_idx` (`idFormationDate`),
    CONSTRAINT `fk_inscription_date` FOREIGN KEY (`idFormationDate`) REFERENCES `formation_date` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `inscription`
--

LOCK TABLES `inscription` WRITE;
/*!40000 ALTER TABLE `inscription` DISABLE KEYS */
;

/*!40000 ALTER TABLE `inscription` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `pays` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sigle` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */
;

/*!40000 ALTER TABLE `pays` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `sujet` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idDomaine` int(11) NOT NULL,
    `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `shortDescription` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `longDescription` text COLLATE utf8mb4_unicode_ci,
    `individualBenefit` text COLLATE utf8mb4_unicode_ci,
    `businessBenefit` text COLLATE utf8mb4_unicode_ci,
    `logo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_sujet_domaine_idx` (`idDomaine`),
    CONSTRAINT `fk_sujet_domaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 8 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `sujet`
--

LOCK TABLES `sujet` WRITE;
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */
;

/*!40000 ALTER TABLE `sujet` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */
;

/*!40000 ALTER TABLE `user` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Temporary view structure for view `vformation`
--

DROP TABLE IF EXISTS `vformation`;
/*!50001 DROP VIEW IF EXISTS `vformation`*/
;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */
;
/*!50001 CREATE VIEW `vformation` AS SELECT 
1 AS `formateur`,
1 AS `formateurPhoto`,
1 AS `formateurDescription`,
1 AS `cours`,
1 AS `idSujet`,
1 AS `sujet`,
1 AS `sujetDescription`,
1 AS `sujetLogo`,
1 AS `idDomaine`,
1 AS `domaineDescription`,
1 AS `domaine`,
1 AS `id`,
1 AS `idFormateur`,
1 AS `idCours`,
1 AS `coursDescription`,
1 AS `coursLogo`,
1 AS `price`,
1 AS `mode`,
1 AS `upcomingDates`*/
;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vformation_date`
--

DROP TABLE IF EXISTS `vformation_date`;
/*!50001 DROP VIEW IF EXISTS `vformation_date`*/
;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */
;
/*!50001 CREATE VIEW `vformation_date` AS SELECT 
1 AS `id`,
1 AS `idFormation`,
1 AS `idVille`,
1 AS `date`,
1 AS `formateur`,
1 AS `cours`,
1 AS `idSujet`,
1 AS `sujet`,
1 AS `idDomaine`,
1 AS `domaine`,
1 AS `idFormateur`,
1 AS `idCours`,
1 AS `price`,
1 AS `mode`,
1 AS `ville`,
1 AS `villeSigle`,
1 AS `pays`,
1 AS `paysSigle`*/
;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `ville` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idPays` int(11) NOT NULL,
    `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sigle` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_ville_pays_idx` (`idPays`),
    CONSTRAINT `fk_ville_pays` FOREIGN KEY (`idPays`) REFERENCES `pays` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `ville`
--

LOCK TABLES `ville` WRITE;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */
;

/*!40000 ALTER TABLE `ville` ENABLE KEYS */
;
UNLOCK TABLES;

insert into
    user (username, password)
values (
        'admin',
        '$2y$10$4iLT5fD9SHhj6cqnwezk7uaTxl0MoKFPYFhlSODAfj7jQwHHnSLS2'
    );

--
-- Final view structure for view `vformation`
--

/*!50001 DROP VIEW IF EXISTS `vformation`*/
;
/*!50001 SET @saved_cs_client          = @@character_set_client */
;
/*!50001 SET @saved_cs_results         = @@character_set_results */
;
/*!50001 SET @saved_col_connection     = @@collation_connection */
;
/*!50001 SET character_set_client      = utf8mb4 */
;
/*!50001 SET character_set_results     = utf8mb4 */
;
/*!50001 SET collation_connection      = utf8mb4_general_ci */
;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vformation` AS select concat(`uf`.`firstName`,' ',`uf`.`lastName`) AS `formateur`,`uf`.`photo` AS `formateurPhoto`,`uf`.`description` AS `formateurDescription`,`c`.`name` AS `cours`,`s`.`id` AS `idSujet`,`s`.`name` AS `sujet`,`s`.`longDescription` AS `sujetDescription`,`s`.`logo` AS `sujetLogo`,`d`.`id` AS `idDomaine`,`d`.`description` AS `domaineDescription`,`d`.`name` AS `domaine`,`f`.`id` AS `id`,`f`.`idFormateur` AS `idFormateur`,`f`.`idCours` AS `idCours`,`c`.`description` AS `coursDescription`,`c`.`logo` AS `coursLogo`,`f`.`price` AS `price`,`f`.`mode` AS `mode`,(select ifnull(count(0),0) from `formation_date` `fd` where ((`fd`.`idFormation` = `f`.`id`) and (`fd`.`date` >= curdate()))) AS `upcomingDates` from ((((`formation` `f` join `formateur` `uf` on((`f`.`idFormateur` = `uf`.`id`))) join `cours` `c` on((`f`.`idCours` = `c`.`id`))) join `sujet` `s` on((`c`.`idSujet` = `s`.`id`))) join `domaine` `d` on((`s`.`idDomaine` = `d`.`id`))) */
;
/*!50001 SET character_set_client      = @saved_cs_client */
;
/*!50001 SET character_set_results     = @saved_cs_results */
;
/*!50001 SET collation_connection      = @saved_col_connection */
;

--
-- Final view structure for view `vformation_date`
--

/*!50001 DROP VIEW IF EXISTS `vformation_date`*/
;
/*!50001 SET @saved_cs_client          = @@character_set_client */
;
/*!50001 SET @saved_cs_results         = @@character_set_results */
;
/*!50001 SET @saved_col_connection     = @@collation_connection */
;
/*!50001 SET character_set_client      = utf8mb4 */
;
/*!50001 SET character_set_results     = utf8mb4 */
;
/*!50001 SET collation_connection      = utf8mb4_general_ci */
;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vformation_date` AS select `fd`.`id` AS `id`,`fd`.`idFormation` AS `idFormation`,`fd`.`idVille` AS `idVille`,`fd`.`date` AS `date`,`f`.`formateur` AS `formateur`,`f`.`cours` AS `cours`,`f`.`idSujet` AS `idSujet`,`f`.`sujet` AS `sujet`,`f`.`idDomaine` AS `idDomaine`,`f`.`domaine` AS `domaine`,`f`.`idFormateur` AS `idFormateur`,`f`.`idCours` AS `idCours`,`f`.`price` AS `price`,`f`.`mode` AS `mode`,`v`.`name` AS `ville`,`v`.`sigle` AS `villeSigle`,`p`.`name` AS `pays`,`p`.`sigle` AS `paysSigle` from (((`formation_date` `fd` join `vformation` `f` on((`fd`.`idFormation` = `f`.`id`))) join `ville` `v` on((`fd`.`idVille` = `v`.`id`))) join `pays` `p` on((`v`.`idPays` = `p`.`id`))) */
;
/*!50001 SET character_set_client      = @saved_cs_client */
;
/*!50001 SET character_set_results     = @saved_cs_results */
;
/*!50001 SET collation_connection      = @saved_col_connection */
;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2025-05-25 23:29:18