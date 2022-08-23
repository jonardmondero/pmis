DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertDayOff`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertDayOff`(empno VARCHAR(50),worksched VARCHAR(50),ddate VARCHAR(50),bolsched VARCHAR(10))
BEGIN
SET @DDate =( SELECT COUNT(outAM) AS countOff FROM workscheduledetail WHERE DAY = DATE_FORMAT(ddate,'%W') AND workScheduleDetail = worksched LIMIT 1 );
SET @outAM =( SELECT outAM FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate LIMIT 1);	
SET @inPM =( SELECT inPM FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate LIMIT 1 );
	
	IF(bolsched = 'Yes' && @DDate = 0  && @outAM = '' && @inPM = '') THEN
	
	UPDATE dailytimerecord SET outAM = 'DAY', inPM = 'OFF' WHERE employeeNo = empno AND DATE = ddate;
	END IF;
	
	END$$

DELIMITER ;