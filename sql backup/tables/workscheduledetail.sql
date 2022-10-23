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

/*Table structure for table `workscheduledetail` */

DROP TABLE IF EXISTS `workscheduledetail`;

CREATE TABLE `workscheduledetail` (
  `workScheduleDetail` varchar(30) DEFAULT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `inAM` varchar(30) DEFAULT NULL,
  `outAM` varchar(30) DEFAULT NULL,
  `inPM` varchar(30) DEFAULT NULL,
  `outPM` varchar(30) DEFAULT NULL,
  `Status` enum('Active','Deleted') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
