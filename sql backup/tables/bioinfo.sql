/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.24-MariaDB : Database - pmis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pmis` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `pmis`;

/*Table structure for table `bioinfo` */

DROP TABLE IF EXISTS `bioinfo`;

CREATE TABLE `bioinfo` (
  `employeeNo` int(50) NOT NULL,
  `firstName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `middleName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `department` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `biometricId` int(50) NOT NULL,
  `employmentStatus` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `workScheduleId` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `supervisor` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `schedule` varchar(10) NOT NULL,
  `date_entered` date NOT NULL,
  PRIMARY KEY (`employeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
