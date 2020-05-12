/*
SQLyog Community Edition- MySQL GUI v6.03
Host - 5.5.5-10.3.16-MariaDB : Database - pmis
*********************************************************************
Server version : 5.5.5-10.3.16-MariaDB
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `pmis`;

USE `pmis`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
  `workScheduleId` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `supervisor` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date_entered` date NOT NULL,
  PRIMARY KEY (`employeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8094 DEFAULT CHARSET=latin1;

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `deptId` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `departmentDescription` varchar(130) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`deptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `EmployeeNo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `firstName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `middleName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `department` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `resAddress` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rezip` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `restelno` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `peraddress` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `perzip` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pertelno` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `civil` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dateofbirth` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sex` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `height` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bloodtype` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `weight` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cnumber` int(20) NOT NULL,
  `pagibig` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pbissued` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `phlhealth` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `phissued` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tin` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gsisnum` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ctc` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gsisumid` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`EmployeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `employeeNo` varchar(50) NOT NULL,
  `image` longtext DEFAULT NULL,
  PRIMARY KEY (`employeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `officialbusiness` */

DROP TABLE IF EXISTS `officialbusiness`;

CREATE TABLE `officialbusiness` (
  `obId` int(50) NOT NULL,
  `employeeNo` varchar(50) NOT NULL,
  `dateFrom` varchar(50) NOT NULL,
  `dateTo` varchar(50) NOT NULL,
  `inAM` varchar(50) NOT NULL,
  `outAM` varchar(50) NOT NULL,
  `inPM` varchar(50) NOT NULL,
  `outPM` varchar(50) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`obId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userId` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `upass` varchar(150) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `userType` varchar(150) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `workschedule` */

DROP TABLE IF EXISTS `workschedule`;

CREATE TABLE `workschedule` (
  `workScheduleId` varchar(50) NOT NULL,
  `workScheduleDescription` varchar(200) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`workScheduleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `workscheduledetail` */

DROP TABLE IF EXISTS `workscheduledetail`;

CREATE TABLE `workscheduledetail` (
  `workScheduleDetail` varchar(50) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `inAM` varchar(50) NOT NULL,
  `outAM` varchar(50) NOT NULL,
  `inPM` varchar(50) NOT NULL,
  `outPM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Procedure structure for procedure `spGetAllEmployee` */

/*!50003 DROP PROCEDURE IF EXISTS  `spGetAllEmployee` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllEmployee`()
BEGIN
	Select b.*,CONCAT(b.firstName,' ',LEFT(b.middleName, 1),'. ',b.lastName) as fullname,d.departmentDescription from bioinfo b
	inner join department d on b.department = d.deptId;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spGetEmployeeDepartment` */

/*!50003 DROP PROCEDURE IF EXISTS  `spGetEmployeeDepartment` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetEmployeeDepartment`(deptCode varchar(50))
BEGIN
	SELECT *,CONCAT(firstName,' ',LEFT(middleName,1),'. ',lastName) as fullName from employee 
	where department = deptCode;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertDayOff` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertDayOff` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertDayOff`(empno varchar(50),worksched varchar(50),ddate varchar(50))
BEGIN
SET @DDate =( Select outAM from workscheduledetail where Day = DATE_FORMAT(ddate,'%W') and workScheduleDetail = worksched );
	IF( @DDate = 'DAY' ) THEN
	
	Update dailytimerecord set outAM = 'DAY', inPM = 'OFF' where employeeNo = empno and Date = ddate;
	
	END IF;
	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertDTR` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertDTR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertDTR`(empno varchar(100),ddate varchar(30))
BEGIN
	SET @chkDate = (SELECT DATE FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate);
	
	if(@chkDate is null) then
	
	 insert  into dailytimerecord (employeeNo,Date) values (empno,ddate);
	end if;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertImage` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertImage` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertImage`(empno varchar(50),image varchar(50))
BEGIN
	INSERT into image VALUES (empno,image);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spinsertNewEmployee` */

/*!50003 DROP PROCEDURE IF EXISTS  `spinsertNewEmployee` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertNewEmployee`(
	empno varchar(50),
	fname varchar(50),
	lname varchar(50),
	mname varchar(50),
	resaddress varchar(50),	
	rzip VARCHAR(50),	
	rstel VARCHAR(50),	
	peraddress VARCHAR(100),
	pzip VARCHAR(50),	
	ptel VARCHAR(50),
	civil VARCHAR(50),	
	bday VARCHAR(50),
	sx VARCHAR(50),	
	height VARCHAR(10),	
	btype VARCHAR(10),	
	weight VARCHAR(10),
	cnum VARCHAR(50),	
	pgibig VARCHAR(50),	
	pgissued VARCHAR(50),	
	phlhealth VARCHAR(50),	
	pissued VARCHAR(10),	
	tin VARCHAR(50),	
	gsisnum VARCHAR(50),	
	ctc VARCHAR(50),	
	gsisuid VARCHAR(50)
						
    )
BEGIN
	insert into employee(EmployeeNo,firstName,lastName,middleName,resAddress,rezip,
	restelno,perAddress,perzip,pertelno,civil,dateofbirth,sex,height,bloodtype,weight,
	cnumber,pagibig,pbissued,phlhealth,phissued,tin,gsisnum,ctc,gsisumid)
	 values(empno,fname,lname,mname,resaddress,rzip,rstel,peraddress,
	pzip,ptel,civil,bday,sx,height,btype,weight,cnum,pgibig,pgissued,phlhealth,
	pissued,tin,gsisnum,ctc,gsisuid);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertTimeIn` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertTimeIn` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeIn`(empno varchar(50),worksched varchar(50),ddate varchar(50),timeIn varchar(50))
BEGIN
SET @DDate =( Select inAM from workscheduledetail where Day = DATE_FORMAT(ddate,'%W') and workScheduleDetail = worksched);
 UPDATE dailytimerecord set inAM = timeIn
 
 where employeeNo=empno and Date = ddate;
set @convertedIn = TIME_FORMAT(timeIn,'%H:%i');
set @convertedDate = TIME_FORMAT(@DDate,'%H:%i');
/*TIME_FORMAT(timeIn,'%H:%i')< TIME_FORMAT(@DDate,'%H:%i')*/
IF(timeIn > @DDate) THEN
/*AND (@inAM != '') */
/*SET @timeLate = (SELECT TIMEDIFF(TIME_FORMAT(@DDate,'%H'),TIME_FORMAT(timeIn,'%H'))AS TOTAL from dailytimerecord where employeeNo = empno and Date = ddate );*/
SET @timeLate = TIMEDIFF(timeIn,@DDate);
UPDATE dailytimerecord set late =  @timeLate where employeeNo = empno and Date = ddate;
END IF;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertTimeInPM` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertTimeInPM` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeInPM`(empno varchar(50),worksched varchar(50),ddate varchar(50),timeIn varchar(50))
BEGIN
SET @DDate =( SELECT inPM FROM workscheduledetail WHERE DAY = DATE_FORMAT(ddate,'%W') AND workScheduleDetail = worksched);
SET @morning =( SELECT late FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate);
	UPDATE dailytimerecord set inPM = timeIn
	where employeeNo=empno and Date = ddate;
	
	IF(timeIn > @DDate) and (@DDate != 'OFF') THEN
	
	SET @timeLate = TIMEDIFF(timeIn,@DDate) + @morning;
	UPDATE dailytimerecord SET late =  @timeLate WHERE employeeNo = empno AND DATE = ddate;
	
	end if;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertTimeOutAM` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertTimeOutAM` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeOutAM`(empno varchar(50),worksched varchar(50),ddate varchar(50),timeIn varchar(50))
BEGIN
SET @DDate =( SELECT outAM FROM workscheduledetail WHERE DAY = DATE_FORMAT(ddate,'%W') AND workScheduleDetail = worksched);
	UPDATE dailytimerecord set outAM = timeIn
	
	where employeeNo=empno and Date = ddate;
	IF(timeIn < @DDate)and(@DDate != 'DAY') THEN
	SET @timeLate = TIMEDIFF(@DDate,timeIn);
	UPDATE dailytimerecord SET undertime =  @timeLate WHERE employeeNo = empno AND DATE = ddate;
	
	end if;
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertTimeOutPM` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertTimeOutPM` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeOutPM`(empno varchar(50),worksched varchar(50),ddate varchar(50),timeIn varchar(50))
BEGIN
SET @DDate =( SELECT outPM FROM workscheduledetail WHERE DAY = DATE_FORMAT(ddate,'%W') AND workScheduleDetail = worksched);
SET @afternoon =( SELECT undertime FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate);
 
UPDATE dailytimerecord set outPM= timeIn
 where employeeNo=empno and Date = ddate;
 IF(timeIn < @DDate) THEN
 
 SET @timeLate = TIMEDIFF(@DDate,timeIn) + @afternoon;
 
 UPDATE dailytimerecord SET undertime =  @timeLate WHERE employeeNo = empno AND DATE = ddate;
 end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertUser` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertUser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUser`(userid varchar(50),uname varchar(150),upass varchar(150),fname varchar(50),lname varchar(50),usertype varchar(30))
BEGIN
 INSERT INTO user VALUES	(userid,uname,upass,fname,lname,usertype);
 END */$$
DELIMITER ;

/* Procedure structure for procedure `spPrintDtr` */

/*!50003 DROP PROCEDURE IF EXISTS  `spPrintDtr` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spPrintDtr`(empno varchar(50),datefrom varchar(50),dateto varchar(50))
BEGIN
 set @ddatefrom = DATE_FORMAT(datefrom, '%Y-%c-%d');
 set @ddateto = DATE_FORMAT(dateto, '%Y-%c-%d');
SELECT CONCAT(e.lastName,', ',e.firstName,', ',LEFT(e.middleName, 1),'.')  AS fullName,d.* FROM bioinfo e 
INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE d.Date BETWEEN @ddatefrom AND @ddateto ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spSearchEmployee` */

/*!50003 DROP PROCEDURE IF EXISTS  `spSearchEmployee` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchEmployee`(userId varchar(50))
BEGIN
 SELECT	*
 FROM `employee` e right join department d on e.department = d.deptId;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `spSearchUser` */

/*!50003 DROP PROCEDURE IF EXISTS  `spSearchUser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchUser`(userId varchar(50))
BEGIN
 SELECT	*
 FROM `user` ;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `spShowDTR` */

/*!50003 DROP PROCEDURE IF EXISTS  `spShowDTR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spShowDTR`(empno varchar(50),dteFrom varchar(50),dteTo varchar(50))
BEGIN
	Select *,DATE_FORMAT(Date,'%W')as Day from dailytimerecord
	where
	employeeNo = empno and 
	Date between dteFrom and dteTo order by Date;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spUpdateDtr` */

/*!50003 DROP PROCEDURE IF EXISTS  `spUpdateDtr` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateDtr`(
	empno varchar(50),ddate varchar(50),cin varchar(50),
	bout varchar(50),bbin varchar(50),cout varchar(50),
	otin varchar(50),otout varchar(50),late TIME,undertime TIME)
BEGIN
	UPDATE dailytimerecord SET
	inAM =cin,
	outAM = bout,
	inPM = bbin,
	outPM = cout,
	otIn = otin,
	otOut = otout,
	late = late,
	undertime = undertime
	where employeeNo=empno and Date = ddate;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
