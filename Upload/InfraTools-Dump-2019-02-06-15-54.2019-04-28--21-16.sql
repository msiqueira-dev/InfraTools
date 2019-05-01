-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 139.82.53.165    Database: INFRATOOLS
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `assoc_ip_address_service`
--
-- ORDER BY:  `AssocIpAddressServiceServiceId`,`AssocIpAddressServiceIp`

LOCK TABLES `assoc_ip_address_service` WRITE;
/*!40000 ALTER TABLE `assoc_ip_address_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `assoc_ip_address_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_ticket_user_requesting`
--
-- ORDER BY:  `AssocTicketUserRequestingUserBond`,`AssocTicketUserRequestingUserEmail`,`AssocTicketUserRequestingTicketId`

LOCK TABLES `assoc_ticket_user_requesting` WRITE;
/*!40000 ALTER TABLE `assoc_ticket_user_requesting` DISABLE KEYS */;
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_COPIED','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',3,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_COPIED','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',8,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_PARTICIPANT','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',2,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_PARTICIPANT','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',16,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_REQUESTER','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',1,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_REQUESTER','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',7,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_requesting` (`AssocTicketUserRequestingUserBond`, `AssocTicketUserRequestingUserEmail`, `AssocTicketUserRequestingTicketId`, `RegisterDate`) VALUES ('TYPE_ASSOC_USER_REQUESTING_REQUESTER','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM',15,'2019-01-08 19:10:55');
/*!40000 ALTER TABLE `assoc_ticket_user_requesting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_ticket_user_responsible`
--
-- ORDER BY:  `AssocTicketUserResponsibleUserEmail`,`AssocTicketUserResponsibleTicketId`

LOCK TABLES `assoc_ticket_user_responsible` WRITE;
/*!40000 ALTER TABLE `assoc_ticket_user_responsible` DISABLE KEYS */;
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('EUGENIOISS@PUC-RIO.BR',3,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('EUGENIOISS@PUC-RIO.BR',7,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('EUGENIOISS@PUC-RIO.BR',8,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('KATIANA.VECIO@PUC-RIO.BR',16,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',2,'2019-01-08 19:10:55');
INSERT INTO `assoc_ticket_user_responsible` (`AssocTicketUserResponsibleUserEmail`, `AssocTicketUserResponsibleTicketId`, `RegisterDate`) VALUES ('MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',15,'2019-01-08 19:10:55');
/*!40000 ALTER TABLE `assoc_ticket_user_responsible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_url_address_service`
--
-- ORDER BY:  `AssocUrlAddressServiceServiceId`,`AssocUrlAddresServiceUrlAddressName`

LOCK TABLES `assoc_url_address_service` WRITE;
/*!40000 ALTER TABLE `assoc_url_address_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `assoc_url_address_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_user_corporation`
--
-- ORDER BY:  `AssocUserCorporationCorporationName`,`AssocUserCorporationUserEmail`

LOCK TABLES `assoc_user_corporation` WRITE;
/*!40000 ALTER TABLE `assoc_user_corporation` DISABLE KEYS */;
INSERT INTO `assoc_user_corporation` (`RegisterDate`, `AssocUserCorporationCorporationName`, `AssocUserCorporationDepartmentName`, `AssocUserCorporationRegistrationDate`, `AssocUserCorporationRegistrationId`, `AssocUserCorporationUserEmail`) VALUES ('2019-01-10 18:00:16','PUC-RIO',NULL,NULL,NULL,'CSMUNIZ@PUC-RIO.BR');
INSERT INTO `assoc_user_corporation` (`RegisterDate`, `AssocUserCorporationCorporationName`, `AssocUserCorporationDepartmentName`, `AssocUserCorporationRegistrationDate`, `AssocUserCorporationRegistrationId`, `AssocUserCorporationUserEmail`) VALUES ('2018-02-21 19:45:46','PUC-Rio','RIO DATA CENTRO',NULL,NULL,'EUGENIOISS@PUC-RIO.BR');
INSERT INTO `assoc_user_corporation` (`RegisterDate`, `AssocUserCorporationCorporationName`, `AssocUserCorporationDepartmentName`, `AssocUserCorporationRegistrationDate`, `AssocUserCorporationRegistrationId`, `AssocUserCorporationUserEmail`) VALUES ('2018-02-20 19:34:26','PUC-Rio','RIO DATA CENTRO','2011-11-15','F21138','MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM');
INSERT INTO `assoc_user_corporation` (`RegisterDate`, `AssocUserCorporationCorporationName`, `AssocUserCorporationDepartmentName`, `AssocUserCorporationRegistrationDate`, `AssocUserCorporationRegistrationId`, `AssocUserCorporationUserEmail`) VALUES ('2019-01-28 07:35:46','PUC-RIO','RIO DATA CENTRO','1988-09-12','f13893','RIET@PUC-RIO.BR');
INSERT INTO `assoc_user_corporation` (`RegisterDate`, `AssocUserCorporationCorporationName`, `AssocUserCorporationDepartmentName`, `AssocUserCorporationRegistrationDate`, `AssocUserCorporationRegistrationId`, `AssocUserCorporationUserEmail`) VALUES ('2019-01-10 18:03:08','PUC-RIO','RIO DATA CENTRO',NULL,NULL,'ROHRBRUNO@GMAIL.COM');
INSERT INTO `assoc_user_corporation` (`RegisterDate`, `AssocUserCorporationCorporationName`, `AssocUserCorporationDepartmentName`, `AssocUserCorporationRegistrationDate`, `AssocUserCorporationRegistrationId`, `AssocUserCorporationUserEmail`) VALUES ('2019-01-18 13:50:27','TECHGRAF',NULL,NULL,NULL,'KATIANA.VECIO@PUC-RIO.BR');
/*!40000 ALTER TABLE `assoc_user_corporation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_user_notification`
--
-- ORDER BY:  `AssocUserNotificationNotificationId`,`AssocUserNotificationUserEmail`

LOCK TABLES `assoc_user_notification` WRITE;
/*!40000 ALTER TABLE `assoc_user_notification` DISABLE KEYS */;
INSERT INTO `assoc_user_notification` (`AssocUserNotificationNotificationId`, `AssocUserNotificationUserEmail`, `AssocUserNotificationRead`, `RegisterDate`) VALUES (1,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-24 17:15:35');
INSERT INTO `assoc_user_notification` (`AssocUserNotificationNotificationId`, `AssocUserNotificationUserEmail`, `AssocUserNotificationRead`, `RegisterDate`) VALUES (2,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',0,'2019-01-24 17:15:32');
INSERT INTO `assoc_user_notification` (`AssocUserNotificationNotificationId`, `AssocUserNotificationUserEmail`, `AssocUserNotificationRead`, `RegisterDate`) VALUES (3,'EUGENIOISS@PUC-RIO.BR',0,'2019-01-24 17:15:52');
INSERT INTO `assoc_user_notification` (`AssocUserNotificationNotificationId`, `AssocUserNotificationUserEmail`, `AssocUserNotificationRead`, `RegisterDate`) VALUES (4,'EUGENIOISS@PUC-RIO.BR',0,'2019-01-24 17:15:14');
INSERT INTO `assoc_user_notification` (`AssocUserNotificationNotificationId`, `AssocUserNotificationUserEmail`, `AssocUserNotificationRead`, `RegisterDate`) VALUES (4,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',0,'2019-01-24 17:19:21');
/*!40000 ALTER TABLE `assoc_user_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_user_preference`
--
-- ORDER BY:  `AssocUserPreferenceUserEmail`,`PreferenceNumber`

LOCK TABLES `assoc_user_preference` WRITE;
/*!40000 ALTER TABLE `assoc_user_preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `assoc_user_preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_user_role`
--
-- ORDER BY:  `AssocUserRoleRoleName`,`AssocUserRoleUserEmail`

LOCK TABLES `assoc_user_role` WRITE;
/*!40000 ALTER TABLE `assoc_user_role` DISABLE KEYS */;
INSERT INTO `assoc_user_role` (`AssocUserRoleRoleName`, `AssocUserRoleUserEmail`, `RegisterDate`) VALUES ('ROLE_SERVICE_TECHNICIAN','EUGENIOISS@PUC-RIO.BR','2019-01-08 19:10:24');
INSERT INTO `assoc_user_role` (`AssocUserRoleRoleName`, `AssocUserRoleUserEmail`, `RegisterDate`) VALUES ('ROLE_SERVICE_TECHNICIAN','MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM','2019-01-08 19:10:24');
/*!40000 ALTER TABLE `assoc_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_user_service`
--
-- ORDER BY:  `AssocUserServiceServiceId`,`AssocUserServiceUserEmail`

LOCK TABLES `assoc_user_service` WRITE;
/*!40000 ALTER TABLE `assoc_user_service` DISABLE KEYS */;
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (1,'EUGENIOISS@PUC-RIO.BR',2,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (1,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (2,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (3,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (4,'EUGENIOISS@PUC-RIO.BR',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (5,'EUGENIOISS@PUC-RIO.BR',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (6,'EUGENIOISS@PUC-RIO.BR',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (7,'EUGENIOISS@PUC-RIO.BR',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (9,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',2,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (10,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (11,'EUGENIOISS@PUC-RIO.BR',1,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (11,'KATIANA.VECIO@PUC-RIO.BR',4,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (11,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',3,'2019-01-08 19:10:24');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (12,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-18 16:14:40');
INSERT INTO `assoc_user_service` (`AssocUserServiceServiceId`, `AssocUserServiceUserEmail`, `AssocUserServiceType`, `RegisterDate`) VALUES (13,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM',1,'2019-01-29 18:13:20');
/*!40000 ALTER TABLE `assoc_user_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assoc_user_team`
--
-- ORDER BY:  `AssocUserTeamTeamId`,`AssocUserTeamUserEmail`

LOCK TABLES `assoc_user_team` WRITE;
/*!40000 ALTER TABLE `assoc_user_team` DISABLE KEYS */;
INSERT INTO `assoc_user_team` (`RegisterDate`, `AssocUserTeamTeamId`, `AssocUserTeamUserEmail`, `AssocUserTeamUserType`) VALUES ('2019-01-08 19:10:24',1,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM','ADMINISTRATOR');
INSERT INTO `assoc_user_team` (`RegisterDate`, `AssocUserTeamTeamId`, `AssocUserTeamUserEmail`, `AssocUserTeamUserType`) VALUES ('2019-01-08 19:10:24',3,'MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM','ADMINISTRATOR');
/*!40000 ALTER TABLE `assoc_user_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `corporation`
--
-- ORDER BY:  `CorporationName`

LOCK TABLES `corporation` WRITE;
/*!40000 ALTER TABLE `corporation` DISABLE KEYS */;
INSERT INTO `corporation` (`CorporationActive`, `CorporationName`, `RegisterDate`) VALUES (1,'INFRATOOLS','2019-01-08 19:10:24');
INSERT INTO `corporation` (`CorporationActive`, `CorporationName`, `RegisterDate`) VALUES (1,'NEW POWER GRUPOS GERADORES','2019-01-08 19:10:24');
INSERT INTO `corporation` (`CorporationActive`, `CorporationName`, `RegisterDate`) VALUES (1,'PUC-RIO','2019-01-08 19:10:24');
INSERT INTO `corporation` (`CorporationActive`, `CorporationName`, `RegisterDate`) VALUES (1,'TECHGRAF','2019-01-08 19:10:24');
/*!40000 ALTER TABLE `corporation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `country`
--
-- ORDER BY:  `CountryAbbreviation`

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AC','ASCENSION ISLAND',NULL,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AD','ANDORRA',376,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AE','UNITED ARAB EMIRATES',971,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AF','AFGHANISTAN',93,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AG','ANTIGUA & BARBUDA',1268,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AI','ANGUILLA',1264,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AL','ALBANIA',355,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AM','ARMENIA',374,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AN','NETHERLANDS ANTILLES',599,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AO','ANGOLA',244,'2019-01-28 08:27:21');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AQ','ANTARCTICA',642,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AR','ARGENTINA',54,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AS','AMERICAN SAMOA',1684,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AT','AUSTRIA',43,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AU','AUSTRALIA',61,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AW','ARUBA',297,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AX','ÅLAND ISLANDSA',358,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('AZ','AZERBAIJAN',994,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BA','BOSNIA & HERZEGOVINA',387,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BB','BARBADOS',1246,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BD','BANGLADESH',880,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BE','BELGIUM',32,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BF','BURKINA FASO',226,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BG','BULGARIA',359,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BH','BAHRAIN',973,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BI','BURUNDI',257,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BJ','BENIN',229,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BL','ST. BARTHÉLEMY',590,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BM','BERMUDA',1441,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BN','BRUNEI',673,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BO','BOLIVIA',591,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BQ','CARIBBEAN NETHERLANDS',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BR','BRAZIL',55,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BS','BAHAMAS',1242,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BT','BHUTAN',975,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BV','BOUVET ISLAND',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BW','BOTSWANA',267,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BY','BELARUS',375,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('BZ','BELIZE',501,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CA','CANADA',1,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CC','COCOS (KEELING) ISLANDS',61,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CD','CONGO (DRC)',243,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CF','CENTRAL AFRICAN REPUBLIC',236,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CG','CONGO (REPUBLIC)',242,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CH','SWITZERLAND',41,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CI','CÔTE D’IVOIRE',225,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CK','COOK ISLANDS',682,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CL','CHILE',56,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CM','CAMEROON',237,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CN','CHINA',86,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CO','COLOMBIA',57,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CP','CLIPPERTON ISLAND',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CR','Costa Rica',506,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CU','CUBA',53,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CV','CAPE VERDE',238,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CW','CURAÇAO',599,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CX','CHRISTMAS ISLAND',61,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CY','CYPRUS',357,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('CZ','CZECH REPUBLIC',420,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DE','GERMANY',49,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DG','DIEGO GARCIA',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DJ','DJIBOUTI',253,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DK','DENMARK',45,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DM','DOMINICA',1767,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DO','DOMINICAN REPUBLIC',1809,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('DZ','ALGERIA',213,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('EA','CEUTA & MELILLA',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('EC','ECUADOR',593,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('EE','ESTONIA',372,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('EG','EGYPT',20,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('EH','WESTERN SAHARA',212,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ER','ERITREA',291,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ES','SPAIN',34,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ET','ETHIOPIA',251,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('FI','FINLAND',358,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('FJ','FIJI',679,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('FK','FALKLAND ISLANDS (ISLAS MALVINAS)',500,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('FM','MICRONESIA',691,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('FO','FAROE ISLANDS',298,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('FR','FRANCE',33,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GA','GABON',241,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GB','UNITED KINGDOM',44,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GD','GRENADA',1473,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GE','GEORGIA',995,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GF','FRENCH GUIANA',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GG','GUERNSEY',441481,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GH','GHANA',233,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GI','GIBRALTAR',350,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GL','GREENLAND',299,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GM','GAMBIA',220,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GN','GUINEA',224,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GP','GUADELOUPE',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GQ','EQUATORIAL GUINEA',240,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GR','GREECE',30,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GS','SOUTH GEORGIA & SOUTH SANDWICH ISLANDS',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GT','GUATEMALA',502,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GU','GUAM',1671,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GW','GUINEA-BISSAU',245,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('GY','GUYANA',592,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('HK','HONG KONG',852,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('HM','HEARD & MCDONALD ISLANDS',509,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('HN','HONDURAS',504,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('HR','CROATIA',385,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('HT','HAITI',509,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('HU','HUNGARY',36,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IC','CANARY ISLANDS',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ID','INDONESIA',62,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IE','IRELAND',353,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IL','ISRAEL',972,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IM','ISLE OF MAN',441624,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IN','INDIA',91,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IO','BRITISH INDIAN OCEAN TERRITORY',246,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IQ','IRAQ',964,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IR','IRAN',98,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IS','ICELAND',354,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('IT','ITALY',39,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('JE','JERSEY',441534,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('JM','JAMAICA',1876,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('JO','JORDAN',962,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('JP','JAPAN',81,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KE','KENYA',254,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KG','KYRGYZSTAN',996,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KH','CAMBODIA',855,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KI','KIRIBATI',686,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KM','COMOROS',269,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KN','ST. KITTS & NEVIS',1869,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KP','NORTH KOREA',850,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KR','SOUTH KOREA',82,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KW','KUWAIT',965,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KY','CAYMAN ISLANDS',1345,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('KZ','KAZAKHSTAN',7,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LA','LAOS',856,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LB','LEBANON',961,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LC','ST. LUCIA',1758,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LI','LIECHTENSTEIN',423,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LK','SRI LANKA',94,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LR','LIBERIA',231,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LS','LESOTHO',266,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LT','LITHUANIA',370,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LU','LUXEMBOURG',352,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LV','LATVIA',371,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('LY','LIBYA',218,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MA','MOROCCO',212,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MC','MONACO',377,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MD','MOLDOVA',373,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ME','MONTENEGRO',382,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MF','ST. MARTIN',590,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MG','MADAGASCAR',261,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MH','MARSHALL ISLANDS',692,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MK','MACEDONIA (FYROM)',389,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ML','MALI',223,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MM','MYANMAR (BURMA)',95,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MN','MONGOLIA',976,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MO','MACAU',853,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MP','NORTHERN MARIANA ISLANDS',1670,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MQ','MARTINIQUE',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MR','MAURITANIA',222,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MS','MONTSERRAT',1664,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MT','MALTA',356,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MU','MAURITIUS',230,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MV','MALDIVES',960,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MW','MALAWI',265,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MX','MEXICO',52,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MY','MALAYSIA',60,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('MZ','MOZAMBIQUE',258,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NA','NAMIBIA',264,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NC','NEW CALEDONIA',687,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NE','NIGER',227,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NF','NORFOLK ISLAND',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NG','NIGERIA',234,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NI','NICARAGUA',505,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NL','NETHERLANDS',31,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NO','NORWAY',47,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NP','NEPAL',977,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NR','NAURU',674,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NU','NIUE',683,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('NZ','NEW ZEALAND',64,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('OM','OMAN',968,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PA','PANAMA',507,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PE','PERU',51,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PF','FRENCH POLYNESIA',689,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PG','PAPUA NEW GUINEA',675,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PH','PHILIPPINES',63,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PK','PAKISTAN',92,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PL','POLAND',48,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PM','ST. PIERRE & MIQUELON',508,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PN','PITCAIRN ISLANDS',64,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PR','PUERTO RICO',1787,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PS','PALESTINE',970,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PT','PORTUGAL',351,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PW','PALAU',680,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('PY','PARAGUAY',595,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('QA','QATAR',974,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('RE','RÉUNION',262,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('RO','ROMANIA',40,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('RS','SERBIA',381,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('RU','RUSSIA',7,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('RW','RWANDA',250,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SA','SAUDI ARABIA',966,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SB','SOLOMON ISLANDS',677,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SC','SEYCHELLES',248,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SD','SUDAN',249,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SE','SWEDEN',46,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SG','SINGAPORE',65,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SH','ST. HELENA',290,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SI','SLOVENIA',386,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SJ','SVALBARD & JAN MAYEN',47,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SK','SLOVAKIA',421,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SL','SIERRA LEONE',232,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SM','SAN MARINO',378,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SN','SENEGAL',221,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SO','SOMALIA',252,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SR','SURINAME',597,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SS','SOUTH SUDAN',211,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ST','SÃO TOMÉ & PRÍNCIPE',239,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SV','EL SALVADOR',503,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SX','SINT MAARTEN',1721,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SY','SYRIA',963,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('SZ','SWAZILAND',268,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TA','TRISTAN DA CUNHA',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TC','TURKS & CAICOS ISLANDS',1649,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TD','CHAD',235,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TF','FRENCH SOUTHERN TERRITORIES',NULL,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TG','TOGO',228,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TH','THAILAND',66,'2019-01-28 08:27:22');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TJ','TAJIKISTAN',992,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TK','TOKELAU',690,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TL','TIMOR-LESTE',NULL,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TM','TURKMENISTAN',993,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TN','TUNISIA',216,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TO','TONGA',676,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TR','TURKEY',90,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TT','TRINIDAD & TOBAGO',1868,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TV','TUVALU',688,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TW','TAIWAN',886,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('TZ','TANZANIA',255,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('UA','UKRAINE',380,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('UG','UGANDA',250,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('UM','U.S. OUTLYING ISLANDS',NULL,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('US','UNITED STATES',1,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('UY','URUGUAY',598,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('UZ','UZBEKISTAN',998,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VA','VATICAN CITY',379,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VC','ST. VINCENT & GRENADINES',1784,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VE','VENEZUELA',58,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VG','BRITISH VIRGIN ISLANDS',1284,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VI','U.S. VIRGIN ISLANDS',1340,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VN','VIETNAM',84,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('VU','VANUATU',678,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('WF','WALLIS & FUTUNA',681,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('WS','SAMOA',685,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('XK','KOSOVO',383,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('YE','YEMEN',967,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('YT','MAYOTTE',262,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ZA','SOUTH AFRICA',27,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ZM','ZAMBIA',260,'2019-01-28 08:27:23');
INSERT INTO `country` (`CountryAbbreviation`, `CountryName`, `CountryRegionCode`, `RegisterDate`) VALUES ('ZW','ZIMBABWE',263,'2019-01-28 08:27:23');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `department`
--
-- ORDER BY:  `DepartmentName`,`DepartmentCorporation`

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','ASSOCIAÇÃO DE ANTIGOS ALUNOS','2019-01-08 19:10:24','AAA');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','COORDENAÇÃO CENTRAL DE COOPERAÇÃO INTERNACIONAL','2019-01-08 19:10:24','CCCI');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','COORDENAÇÃO DE ATIVIDADES COMUNITÁRIAS E CULTURAIS','2019-01-08 19:10:24','CACC');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ARQUITETURA E URBANISMO','2019-01-08 19:10:24','DAU');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ARTES E DESIGN','2019-01-08 19:10:24','DAD');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE CIÊNCIAS SOCIAIS','2019-01-08 19:10:24','CIS');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE COMUNICAÇÃO SOCIAL','2019-01-08 19:10:24','COM');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE DIREITO','2019-01-08 19:10:24','JUR');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ECONOMIA','2019-01-08 19:10:24','ECO');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE EDUCAÇÃO','2019-01-08 19:10:24','EDU');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ENGENHARIA CIVIL E AMBIENTAL','2019-01-08 19:10:24','CIV');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ENGENHARIA ELÉTRICA','2019-01-08 19:10:24','ELE');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ENGENHARIA INDUSTRIAL','2019-01-08 19:10:24','IND');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ENGENHARIA MECÂNICA','2019-01-08 19:10:24','MEC');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE ENGENHARIA QUÍMICA E DE MATERIAIS','2019-01-08 19:10:24','DEQM');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE FILOSOFIA','2019-01-08 19:10:24','FIL');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE FÍSICA','2019-01-08 19:10:24','FIS');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE GEOGRAFIA E MEIO AMBIENTE','2019-01-08 19:10:24','GEO');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE HISTÓRIA','2019-01-08 19:10:24','HIS');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE INFOMÁTICA','2019-01-08 19:10:24','INF');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE LETRAS','2019-01-08 19:10:24','LET');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE MATEMÁTICA','2019-01-08 19:10:24','MAT');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE MEDICINA','2019-01-08 19:10:24','MED');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE PSICOLOGIA','2019-01-08 19:10:24','PSI');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE QUÍMICA','2019-01-08 19:10:24','QUI');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE SERVIÇO SOCIAL','2019-01-08 19:10:24','SER');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','DEPARTAMENTO DE TEOLGIA','2019-01-08 19:10:24','TEO');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','ESCOLA DE NEGÓCIOS','2019-01-08 19:10:24','IAG');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','INSTITUTO DE RELAÇÕES INTERNACIONAIS','2019-01-08 19:10:24','IRI');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','RIO DATA CENTRO','2019-01-08 19:10:24','RDC');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','VICE REITORIA ACADÊMICA','2019-01-08 19:10:24','VRAC');
INSERT INTO `department` (`DepartmentCorporation`, `DepartmentName`, `RegisterDate`, `DepartmentInitials`) VALUES ('PUC-RIO','VICE REITORIA COMUNITÁRIA','2019-01-08 19:10:24','VRC');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `history_monitoring`
--
-- ORDER BY:  `HistoryMonitoringId`

LOCK TABLES `history_monitoring` WRITE;
/*!40000 ALTER TABLE `history_monitoring` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `history_service`
--
-- ORDER BY:  `HistoryServiceId`

LOCK TABLES `history_service` WRITE;
/*!40000 ALTER TABLE `history_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `history_ticket`
--
-- ORDER BY:  `HistoryTicketId`

LOCK TABLES `history_ticket` WRITE;
/*!40000 ALTER TABLE `history_ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `information_service`
--
-- ORDER BY:  `InformationServiceId`

LOCK TABLES `information_service` WRITE;
/*!40000 ALTER TABLE `information_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `information_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ip_address`
--
-- ORDER BY:  `IpAddressIpv4`

LOCK TABLES `ip_address` WRITE;
/*!40000 ALTER TABLE `ip_address` DISABLE KEYS */;
INSERT INTO `ip_address` (`IpAddressDescription`, `IpAddressIpv4`, `IpAddressIpv6`, `IpAddressNetwork`, `RegisterDate`) VALUES (NULL,'139.82.1.2','',NULL,'2019-01-25 14:56:02');
INSERT INTO `ip_address` (`IpAddressDescription`, `IpAddressIpv4`, `IpAddressIpv6`, `IpAddressNetwork`, `RegisterDate`) VALUES ('33 MSIQUEIRA','139.82.33.200',NULL,'REDE 33 MSIQUEIRA','2019-01-28 02:52:00');
INSERT INTO `ip_address` (`IpAddressDescription`, `IpAddressIpv4`, `IpAddressIpv6`, `IpAddressNetwork`, `RegisterDate`) VALUES ('53 EUGENIOISS','139.82.53.160',NULL,'REDE 53','2019-01-28 02:51:58');
INSERT INTO `ip_address` (`IpAddressDescription`, `IpAddressIpv4`, `IpAddressIpv6`, `IpAddressNetwork`, `RegisterDate`) VALUES ('53 MSIQUEIRA','139.82.53.165',NULL,'REDE 53','2019-01-28 02:51:03');
/*!40000 ALTER TABLE `ip_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `monitoring`
--
-- ORDER BY:  `MonitoringId`

LOCK TABLES `monitoring` WRITE;
/*!40000 ALTER TABLE `monitoring` DISABLE KEYS */;
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('PUC-ONLINE SITE HTTP',1,'PUC-ONLINE',7,NULL,'TYPE_STATUS_MONITORING_ONLINE',30,'TYPE_MONITORING_HTTP','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('PUC-ONLINE SITE HTTPS',2,'PUC-ONLINE',7,NULL,'TYPE_STATUS_MONITORING_ONLINE',30,'TYPE_MONITORING_HTTPS','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('PUC-ONLINE SITE',3,'PUC-ONLINE',7,NULL,'TYPE_STATUS_MONITORING_ONLINE',30,'TYPE_MONITORING_HTTP','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('CACTI PING',4,'CACTI',6,NULL,'TYPE_STATUS_MONITORING_ONLINE',30,'TYPE_MONITORING_PING','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('CACTI HTTP',5,'CACTI',6,NULL,'TYPE_STATUS_MONITORING_WARNING',30,'TYPE_MONITORING_HTTP','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('IDS REDE SEGURA PING',6,'IDS REDE SEGURA',5,NULL,'TYPE_STATUS_MONITORING_ONLINE',30,'TYPE_MONITORING_PING','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('InfraTools Application',7,'InfraTools',9,NULL,'TYPE_STATUS_MONITORING_ONLINE',30,'TYPE_MONITORING_PING','2019-01-18 06:33:55');
INSERT INTO `monitoring` (`MonitoringDescription`, `MonitoringId`, `MonitoringName`, `MonitoringService`, `MonitoringSLA`, `MonitoringStatus`, `MonitoringTime`, `MonitoringType`, `RegisterDate`) VALUES ('InfraTools Application',8,'InfraTools',9,NULL,'TYPE_STATUS_MONITORING_ONLINE',60,'TYPE_MONITORING_HTTP','2019-01-18 06:33:55');
/*!40000 ALTER TABLE `monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `network`
--
-- ORDER BY:  `NetworkName`

LOCK TABLES `network` WRITE;
/*!40000 ALTER TABLE `network` DISABLE KEYS */;
INSERT INTO `network` (`NetworkIp`, `NetworkName`, `NetworkNetmask`, `RegisterDate`) VALUES ('139.82.33.198','REDE 33 MSIQUEIRA','27','2019-01-28 02:51:03');
INSERT INTO `network` (`NetworkIp`, `NetworkName`, `NetworkNetmask`, `RegisterDate`) VALUES ('139.82.53.128','REDE 53','26','2019-01-28 02:51:03');
/*!40000 ALTER TABLE `network` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notification`
--
-- ORDER BY:  `NotificationId`

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`NotificationActive`, `NotificationId`, `NotificationText`, `RegisterDate`) VALUES (1,1,'TESTE','2019-01-21 09:53:13');
INSERT INTO `notification` (`NotificationActive`, `NotificationId`, `NotificationText`, `RegisterDate`) VALUES (1,2,'TESTE MSIQUEIRA','2019-01-24 17:09:31');
INSERT INTO `notification` (`NotificationActive`, `NotificationId`, `NotificationText`, `RegisterDate`) VALUES (1,3,'TESTE EUGENIOISS','2019-01-24 17:11:39');
INSERT INTO `notification` (`NotificationActive`, `NotificationId`, `NotificationText`, `RegisterDate`) VALUES (1,4,'TESTE TODOS','2019-01-24 17:11:43');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `preference`
--
-- ORDER BY:  `PreferenceNumber`

LOCK TABLES `preference` WRITE;
/*!40000 ALTER TABLE `preference` DISABLE KEYS */;
INSERT INTO `preference` (`RegisterDate`, `PreferenceDescription`, `PreferenceName`, `PreferenceNumber`) VALUES ('2019-01-28 08:27:23','DEFAULT_PAGE','DEFAULT_PAGE',1);
INSERT INTO `preference` (`RegisterDate`, `PreferenceDescription`, `PreferenceName`, `PreferenceNumber`) VALUES ('2019-01-28 08:27:23','TABLE_MAX_ROWS','TABLE_MAX_ROWS',2);
/*!40000 ALTER TABLE `preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role`
--
-- ORDER BY:  `RoleName`

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`RegisterDate`, `RoleDescription`, `RoleName`) VALUES ('2019-01-28 08:27:23','ROLE_CORPORATION_MANAGER','ROLE_CORPORATION_MANAGER');
INSERT INTO `role` (`RegisterDate`, `RoleDescription`, `RoleName`) VALUES ('2019-01-28 08:27:23','ROLE_DEPARTMENT_MANAGER','ROLE_DEPARTMENT_MANAGER');
INSERT INTO `role` (`RegisterDate`, `RoleDescription`, `RoleName`) VALUES ('2019-01-28 08:27:23','ROLE_SERVICE_TECHNICIAN','ROLE_SERVICE_TECHNICIAN');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `service`
--
-- ORDER BY:  `ServiceId`,`ServiceType`

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,NULL,1,NULL,1,'SISTEMA DE INTEGRAÇÃO DE INFRAESTRUTURA E SUPORTE',1,'INFRATOOLS','WEB_APPLICATION');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',0,NULL,1,NULL,1,'SISTEMA DE TESTE',2,'SISTEMA DE TESTE','WEB_APPLICATION');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',0,NULL,1,NULL,1,'IDS TESTE',3,'IDS_TESTE','INTRUSION_DETECTION_SYSTEM');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-RIO',1,'RIO DATA CENTRO',1,'IDS REDE ABERTA',4,'IDS_REDE_ABERTA','INTRUSION_DETECTION_SYSTEM');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-RIO',1,'RIO DATA CENTRO',1,'IDS REDE SEGURA',5,'IDS_REDE_SEGURA','INTRUSION_DETECTION_SYSTEM');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-RIO',1,'RIO DATA CENTRO',1,'CACTI',6,'CACTI','TRAFFIC_ANALYSER_SYSTEM');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-RIO',1,NULL,1,'SISTEMA DE GESTÃO ACADÊMICA',7,'PUC-ONLINE','WEB_APPLICATION');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-RIO',1,'RIO DATA CENTRO',1,'Site do RDC',8,'SITE RDC','WEB_APPLICATION');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'INFRATOOLS',1,NULL,1,'SISTEMA INFRATOOLS',9,'INFRATOOLS','WEB_APPLICATION');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-RIO',1,'DEPARTAMENTO DE ENGENHARIA MECÂNICA',1,'ROTEADOR DO DEPARTAMENTO DA MECÂNICA',10,'ROTEADOR MECÂNICA','ROUTER');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-08 19:10:24',1,'PUC-Rio',1,'DEPARTAMENTO DE ENGENHARIA CIVIL E AMBIENTAL',1,'ROTEADOR DO DEPARTAMENTO DA CIVÍL',11,'ROTEADOR CIVIL','ROUTER');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-18 16:14:40',0,'PUC-RIO',0,NULL,0,'TEASTA',12,'TESTE','CAMERA_SERVER');
INSERT INTO `service` (`RegisterDate`, `ServiceActive`, `ServiceCorporation`, `ServiceCorporationCanChange`, `ServiceDepartment`, `ServiceDepartmentCanChange`, `ServiceDescription`, `ServiceId`, `ServiceName`, `ServiceType`) VALUES ('2019-01-29 18:13:19',0,'INFRATOOLS',0,NULL,0,'teste dscccc',13,'teste trr','PRINT_SERVER');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `system_configuration`
--
-- ORDER BY:  `SystemConfigurationOptionNumber`

LOCK TABLES `system_configuration` WRITE;
/*!40000 ALTER TABLE `system_configuration` DISABLE KEYS */;
INSERT INTO `system_configuration` (`RegisterDate`, `SystemConfigurationOptionActive`, `SystemConfigurationOptionDescription`, `SystemConfigurationOptionName`, `SystemConfigurationOptionNumber`, `SystemConfigurationOptionValue`) VALUES ('2019-01-28 08:27:23',1,'ENABLE_GOOGLE_MAPS','ENABLE_GOOGLE_MAPS',1,NULL);
INSERT INTO `system_configuration` (`RegisterDate`, `SystemConfigurationOptionActive`, `SystemConfigurationOptionDescription`, `SystemConfigurationOptionName`, `SystemConfigurationOptionNumber`, `SystemConfigurationOptionValue`) VALUES ('2019-01-28 08:27:23',1,'ENABLE_REGISTER','ENABLE_REGISTER',2,NULL);
/*!40000 ALTER TABLE `system_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `team`
--
-- ORDER BY:  `TeamId`

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('SUPPORT',1,'SUPPORT','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('DATABASE ADMINISTRATOR',2,'DATABASE ADMINISTRATOR','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('DEVELOPERS',3,'DEVELOPERS','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('MANAGER',4,'MANAGER','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('TELEPROCESSING',5,'TELEPROCESSING','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('OPERATION',6,'OPERATION','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('ATTENDANT',7,'ATTENDANT','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('LABORATORY',8,'LABORATORY','2019-01-08 19:10:24');
INSERT INTO `team` (`TeamDescription`, `TeamId`, `TeamName`, `RegisterDate`) VALUES ('DIRECTOR',9,'DIRECTOR','2019-01-08 19:10:24');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ticket`
--
-- ORDER BY:  `TicketId`

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_01_DESC',1,NULL,'TYPE_STATUS_TICKET_ASSIGNED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_02_DESC',2,NULL,'TYPE_STATUS_TICKET_ASSIGNED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_03_DESC',3,NULL,'TYPE_STATUS_TICKET_COMPLETED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_04_DESC',4,NULL,'TYPE_STATUS_TICKET_COMPLETED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_05_DESC',5,NULL,'TYPE_STATUS_TICKET_FINISHED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_06_DESC',6,NULL,'TYPE_STATUS_TICKET_FINISHED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_07_DESC',7,NULL,'TYPE_STATUS_TICKET_NEW',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_08_DESC',8,NULL,'TYPE_STATUS_TICKET_NEW',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_09_DESC',9,NULL,'TYPE_STATUS_TICKET_PAUSED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_10_DESC',10,NULL,'TYPE_STATUS_TICKET_PAUSED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_11_DESC',11,NULL,'TYPE_STATUS_TICKET_REJECTED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_12_DESC',12,NULL,'TYPE_STATUS_TICKET_REJECTED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_13_DESC',13,NULL,'TYPE_STATUS_TICKET_WARNING',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_14_DESC',14,NULL,'TYPE_STATUS_TICKET_WARNING',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_15_DESC',15,NULL,'TYPE_STATUS_TICKET_ASSIGNED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
INSERT INTO `ticket` (`RegisterDate`, `TicketDescription`, `TicketId`, `TicketService`, `TicketStatus`, `TicketSuggestion`, `TicketTitle`, `TicketType`) VALUES ('2019-01-08 19:10:55','OS_NUMERO_16_DESC',16,NULL,'TYPE_STATUS_TICKET_ASSIGNED',NULL,'OS_NUMERO_1','TYPE_TICKET_ACCOUNT');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_assoc_user_requesting`
--
-- ORDER BY:  `TypeAssocUserRequestingTypeBond`

LOCK TABLES `type_assoc_user_requesting` WRITE;
/*!40000 ALTER TABLE `type_assoc_user_requesting` DISABLE KEYS */;
INSERT INTO `type_assoc_user_requesting` (`RegisterDate`, `TypeAssocUserRequestingTypeBond`) VALUES ('2019-01-08 19:10:55','TYPE_ASSOC_USER_REQUESTING_COPIED');
INSERT INTO `type_assoc_user_requesting` (`RegisterDate`, `TypeAssocUserRequestingTypeBond`) VALUES ('2019-01-08 19:10:55','TYPE_ASSOC_USER_REQUESTING_PARTICIPANT');
INSERT INTO `type_assoc_user_requesting` (`RegisterDate`, `TypeAssocUserRequestingTypeBond`) VALUES ('2019-01-08 19:10:55','TYPE_ASSOC_USER_REQUESTING_REQUESTER');
/*!40000 ALTER TABLE `type_assoc_user_requesting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_assoc_user_service`
--
-- ORDER BY:  `TypeAssocUserServiceId`

LOCK TABLES `type_assoc_user_service` WRITE;
/*!40000 ALTER TABLE `type_assoc_user_service` DISABLE KEYS */;
INSERT INTO `type_assoc_user_service` (`RegisterDate`, `TypeAssocUserServiceDescription`, `TypeAssocUserServiceId`) VALUES ('2019-01-28 08:27:23','CREATOR',1);
INSERT INTO `type_assoc_user_service` (`RegisterDate`, `TypeAssocUserServiceDescription`, `TypeAssocUserServiceId`) VALUES ('2019-01-28 08:27:23','ADMINISTRATOR',2);
INSERT INTO `type_assoc_user_service` (`RegisterDate`, `TypeAssocUserServiceDescription`, `TypeAssocUserServiceId`) VALUES ('2019-01-28 08:27:23','EDITOR',3);
INSERT INTO `type_assoc_user_service` (`RegisterDate`, `TypeAssocUserServiceDescription`, `TypeAssocUserServiceId`) VALUES ('2019-01-28 08:27:23','VIEWER',4);
/*!40000 ALTER TABLE `type_assoc_user_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_assoc_user_team`
--
-- ORDER BY:  `TypeAssocUserTeamDescription`

LOCK TABLES `type_assoc_user_team` WRITE;
/*!40000 ALTER TABLE `type_assoc_user_team` DISABLE KEYS */;
INSERT INTO `type_assoc_user_team` (`RegisterDate`, `TypeAssocUserTeamDescription`) VALUES ('2019-01-28 08:27:23','ADMINISTRATOR');
INSERT INTO `type_assoc_user_team` (`RegisterDate`, `TypeAssocUserTeamDescription`) VALUES ('2019-01-28 08:27:23','CREATOR');
INSERT INTO `type_assoc_user_team` (`RegisterDate`, `TypeAssocUserTeamDescription`) VALUES ('2019-01-28 08:27:23','EDITOR');
INSERT INTO `type_assoc_user_team` (`RegisterDate`, `TypeAssocUserTeamDescription`) VALUES ('2019-01-28 08:27:23','VIEWER');
/*!40000 ALTER TABLE `type_assoc_user_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_monitoring`
--
-- ORDER BY:  `TypeMonitoringDescription`

LOCK TABLES `type_monitoring` WRITE;
/*!40000 ALTER TABLE `type_monitoring` DISABLE KEYS */;
INSERT INTO `type_monitoring` (`RegisterDate`, `TypeMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_MONITORING_HTTP');
INSERT INTO `type_monitoring` (`RegisterDate`, `TypeMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_MONITORING_HTTPS');
INSERT INTO `type_monitoring` (`RegisterDate`, `TypeMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_MONITORING_PING');
/*!40000 ALTER TABLE `type_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_service`
--
-- ORDER BY:  `TypeServiceName`

LOCK TABLES `type_service` WRITE;
/*!40000 ALTER TABLE `type_service` DISABLE KEYS */;
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','ACCESS_POINT',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','APPLICATION_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','AUTHENTICATION_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','BACKUP_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','CAMERA_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','DATABASE_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','DHCP_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','DNS_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','DOMAIN_CONTROLLER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','FILE_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','FIREWALL',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','HONEYPOT',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','INTRUSION_DETECTION_SYSTEM',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','MAIL',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','MONITORING_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','PRINT_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','PROXY_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','ROUTER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','SCANNER_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','STREAMING_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','TRAFFIC_ANALYSER_SYSTEM',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','VERSION_CONTROLLER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','VIRTUALIZATION_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','VOIP_SERVER',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','WEB_APPLICATION',NULL);
INSERT INTO `type_service` (`RegisterDate`, `TypeServiceName`, `TypeServiceSLA`) VALUES ('2019-01-28 08:27:23','WEB_SERVER',NULL);
/*!40000 ALTER TABLE `type_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_status_monitoring`
--
-- ORDER BY:  `TypeStatusMonitoringDescription`

LOCK TABLES `type_status_monitoring` WRITE;
/*!40000 ALTER TABLE `type_status_monitoring` DISABLE KEYS */;
INSERT INTO `type_status_monitoring` (`RegisterDate`, `TypeStatusMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_MONITORING_CRITICAL');
INSERT INTO `type_status_monitoring` (`RegisterDate`, `TypeStatusMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_MONITORING_OFFLINE');
INSERT INTO `type_status_monitoring` (`RegisterDate`, `TypeStatusMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_MONITORING_ONLINE');
INSERT INTO `type_status_monitoring` (`RegisterDate`, `TypeStatusMonitoringDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_MONITORING_WARNING');
/*!40000 ALTER TABLE `type_status_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_status_ticket`
--
-- ORDER BY:  `TypeStatusTicketDescription`

LOCK TABLES `type_status_ticket` WRITE;
/*!40000 ALTER TABLE `type_status_ticket` DISABLE KEYS */;
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_ASSIGNED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_CANCELED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_COMPLETED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_FINISHED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_IN_PROGRESS');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_NEW');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_NULLFIED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_PAUSED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_REJECTED');
INSERT INTO `type_status_ticket` (`RegisterDate`, `TypeStatusTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_STATUS_TICKET_WARNING');
/*!40000 ALTER TABLE `type_status_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_ticket`
--
-- ORDER BY:  `TypeTicketDescription`

LOCK TABLES `type_ticket` WRITE;
/*!40000 ALTER TABLE `type_ticket` DISABLE KEYS */;
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_ACCOUNT');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_BUG');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_COMPLAINT');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_DOUBT');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_FEATURE_REQUEST');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_GENERAL_COMMERCIAL');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_GENERAL_DOUBT');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_GENERAL_SUGGESTION');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_MONITORING');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_OTHER');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_SECURITY');
INSERT INTO `type_ticket` (`RegisterDate`, `TypeTicketDescription`) VALUES ('2019-01-28 08:27:23','TYPE_TICKET_SERVICE');
/*!40000 ALTER TABLE `type_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_time_monitoring`
--
-- ORDER BY:  `TypeTimeMonitoringValue`

LOCK TABLES `type_time_monitoring` WRITE;
/*!40000 ALTER TABLE `type_time_monitoring` DISABLE KEYS */;
INSERT INTO `type_time_monitoring` (`RegisterDate`, `TypeTimeMonitoringValue`, `TypeTimeMonitoringDescription`) VALUES ('2019-01-28 08:27:23',30,'INTERVAL_30_MINUTES');
INSERT INTO `type_time_monitoring` (`RegisterDate`, `TypeTimeMonitoringValue`, `TypeTimeMonitoringDescription`) VALUES ('2019-01-28 08:27:23',60,'INTERVAL_1_HOURS');
INSERT INTO `type_time_monitoring` (`RegisterDate`, `TypeTimeMonitoringValue`, `TypeTimeMonitoringDescription`) VALUES ('2019-01-28 08:27:23',120,'INTERVAL_2_HOURS');
/*!40000 ALTER TABLE `type_time_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_user`
--
-- ORDER BY:  `TypeUserDescription`

LOCK TABLES `type_user` WRITE;
/*!40000 ALTER TABLE `type_user` DISABLE KEYS */;
INSERT INTO `type_user` (`RegisterDate`, `TypeUserDescription`) VALUES ('2019-01-28 08:27:23','ADMINISTRATOR_ATTENDANT');
INSERT INTO `type_user` (`RegisterDate`, `TypeUserDescription`) VALUES ('2019-01-28 08:27:23','ADMINISTRATOR_TECHNICIAN');
INSERT INTO `type_user` (`RegisterDate`, `TypeUserDescription`) VALUES ('2019-01-28 08:27:23','SUPER_ADMINISTRATOR');
INSERT INTO `type_user` (`RegisterDate`, `TypeUserDescription`) VALUES ('2019-01-28 08:27:23','USER');
/*!40000 ALTER TABLE `type_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `url_address`
--
-- ORDER BY:  `UrlAddressName`

LOCK TABLES `url_address` WRITE;
/*!40000 ALTER TABLE `url_address` DISABLE KEYS */;
INSERT INTO `url_address` (`UrlAddressName`, `UrlAddressDescription`, `RegisterDate`) VALUES ('VIALACTEA.RDC.PUC-RIO.BR','DNS PRIMARIO','2019-01-08 19:10:24');
/*!40000 ALTER TABLE `url_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--
-- ORDER BY:  `Email`

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1978-11-18','PUC-RIO','BR','CSMUNIZ@PUC-RIO.BR','M','078f7f7cf0c1e1fd5af1329c6b38637ccc9164b7c2747f2a938fa1ef243c416d312f674f55cb4b9c6a0b28beb6363cb7052c425b7330576353f4df8d166cbb22','CHRISTIANO MUNIZ','028c0966d606621b578009127713a3962ee3d8fa2ed32946f22ba4c020211943dccbec9cd5d683f47dfb0fb273e498e3fcce8dbd26e2341adc685887cca31976','RIO DE JANEIRO','2019-01-10 17:12:56',0,0,1,1,'981442966','21','','','SUPER_ADMINISTRATOR','CSMUNIZ');
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1945-02-03','PUC-RIO','BR','EUGENIOISS@PUC-RIO.BR','M','d230e5cf83be90ca02aa12321e73e2db20ce2c76b253557b79b995dcac8e5473edcc66e925cca3d91283d08ed454ee05813cf63d3bd3000ed9887445544137d1','EUGÊNIO SILVA','efd61b20b619209a45f10d2a26727a312afa756faa51c4a2fed45e2e0cfe27504ec341b051c951127eeced21f419b4b2511d62cb5840567fc733a64122f537d6','RIO DE JANEIRO','2018-02-21 13:58:29',0,0,1,1,NULL,NULL,NULL,NULL,'SUPER_ADMINISTRATOR','EUGENIOISS');
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1980-06-14','TECHGRAF','BR','KATIANA.VECIO@PUC-RIO.BR','F','11fc5af1729c95548971803b47357d0a4304a72b2de79dacf96b41ef47497918478f2268250fd81613921b5d8eb48231bb526e23293f014ec1dae7b16fc17f8b','KATIANA VECIO','e44b1d176324a87511946cf4eae41aae9bcba6a2c651568ac2d21a01949db58192073c85195973e6537a18c36c77d2372c7e29c768842535ccd682645aaa343c','RIO DE JANEIRO','2018-07-11 11:15:38',0,0,1,1,'','','','','USER','KATIANA.VECIO');
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1988-05-20','PUC-RIO','BR','MARCUSVINICIUSB.SIQUEIRA@GMAIL.COM','M','536a46bf6b005f9f09a9f45ddb7dc71ea782ec5e54e1828a49f26c9cad082bc1fc07de7c57cf4eddd605a46c598f944b63ca08215df6e22ce61b472c80dc2755','MARCUS SIQUEIRA','e396816ae3b6367fe0384bdeaea3d8f3bb692e0869724f1fb2aabb4b93af3c8ab86c57d044aaa238b3bdd2b18e3ee9f26b55180997b93cf7ee11d50c225eb0ac','RIO DE JANEIRO','2016-09-08 18:49:28',0,0,1,1,'982629645','21',NULL,NULL,'SUPER_ADMINISTRATOR','MSIQUEIRA');
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1955-05-06',NULL,'US','MARCUSVINICIUSB.SIQUEIRA@HOTMAIL.COM','M','ecadf0a1633df41e6cbc27c0128edcf19cc9d0f34448f85b9c902a26c039bd7d0ec6cc72c0d08d6ce5aa67da4cdd2d6538b64f27b6187ded9f3a359dc5a6f113','MARCUS TESTE','980fb9b4ae8a6503635122285ff4e27097ec7ce6a4e49c8a407f602fd2aa6dc2a7f212da2d870be9957699819601aef80810992ea28e8d1049ad85143502ad94','ARIZONA','2018-02-22 14:55:41',0,0,1,1,'','','','','USER','MARCUSVINICIUSB.SIQUEIRA');
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1988-05-20',NULL,'BR','MSIQUEIRA@PUC-RIO.BR','M','01b6ed4417930f3cbc897b2ad8a7e276f40ea2e5411c2f590412a2c3ecd3000d9b0de64f39e194d2299a600297082f7aebf70bd0aeb566d53dfc5051071572e0','MARCUS PUC','e396816ae3b6367fe0384bdeaea3d8f3bb692e0869724f1fb2aabb4b93af3c8ab86c57d044aaa238b3bdd2b18e3ee9f26b55180997b93cf7ee11d50c225eb0ac','RIO DE JANEIRO','2019-02-06 11:15:18',0,0,1,1,'982629645','21','','','USER',NULL);
INSERT INTO `user` (`BirthDate`, `Corporation`, `Country`, `Email`, `Gender`, `HashCode`, `Name`, `Password`, `Region`, `RegisterDate`, `SessionExpires`, `TwoStepVerification`, `UserActive`, `UserConfirmed`, `UserPhonePrimary`, `UserPhonePrimaryPrefix`, `UserPhoneSecondary`, `UserPhoneSecondaryPrefix`, `UserType`, `UserUniqueID`) VALUES ('1956-05-05','PUC-RIO','BR','RIET@PUC-RIO.BR','M','4e2a20742ccb1dc9f8b0fc7a2881e6471ad70b5b4821aa195c6271fb20097e242f1977282a4ff02392fe420728dff42afbb84fc94105d65ba9e2fc57ebcace20','NELSON CORREA','089d6bc3d790a5dbac29955211b535365313f21fc54d6cc0a066ebc9f5accefc4da41d516ba5f08769505bc1a862d927df0d9565987f28fa4c08cd81e549cf4f','RIO DE JANEIRO','2019-01-28 07:23:40',0,0,1,1,'24808051','21','','','SUPER_ADMINISTRATOR','RIET');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-06 15:54:21
