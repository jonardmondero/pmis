DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spUpdateSpecificRecord`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateSpecificRecord`(state VARCHAR(50),dtrtime VARCHAR(50),ddate VARCHAR(50),empno VARCHAR(50))
BEGIN
    IF(state = 'inAM')THEN
	UPDATE dailytimerecord SET inAM = dtrtime WHERE DATE = ddate AND employeeNo = empno;
	END IF;
	 IF(state = 'outAM')THEN
	UPDATE dailytimerecord SET outAM = dtrtime WHERE DATE = ddate AND employeeNo = empno;
	END IF;
	 IF(state = 'inPM')THEN
	UPDATE dailytimerecord SET inPM = dtrtime WHERE DATE = ddate AND employeeNo = empno;
	END IF;
	 IF(state = 'outPM')THEN
	UPDATE dailytimerecord SET outPM = dtrtime WHERE DATE = ddate AND employeeNo = empno;
	END IF;
	 IF(state = 'otIn')THEN
	UPDATE dailytimerecord SET otIn = dtrtime WHERE DATE = ddate AND employeeNo = empno;
	END IF;
	 IF(state = 'otOut')THEN
	UPDATE dailytimerecord SET otOut = dtrtime WHERE DATE = ddate AND employeeNo = empno;
	END IF;
    END$$

DELIMITER ;