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

/*Table structure for table `dailytimerecord` */

DROP TABLE IF EXISTS `dailytimerecord`;

CREATE TABLE `dailytimerecord` (
  `recordId` int(250) NOT NULL AUTO_INCREMENT,
  `employeeNo` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `inAM` varchar(50) NOT NULL,
  `outAM` varchar(50) NOT NULL,
  `inPM` varchar(50) NOT NULL,
  `outPM` varchar(50) NOT NULL,
  `otIn` varchar(50) NOT NULL,
  `otOut` varchar(50) NOT NULL,
  `late` time NOT NULL DEFAULT '00:00:00',
  `undertime` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`recordId`)
) ENGINE=InnoDB AUTO_INCREMENT=73574 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
