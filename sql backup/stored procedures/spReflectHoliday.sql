DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spReflectHoliday`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spReflectHoliday`(
	holidayId VARCHAR(50), empno VARCHAR(50))
BEGIN
SET @date1 = (SELECT DATE FROM holiday WHERE entryNo = holidayId);	
SET @duration = (SELECT period FROM holiday WHERE entryNo = holidayId);			
SET @inAM = (SELECT inAM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date = @date1);
SET @outAM = (SELECT outAM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date = @date1);
SET @inPM = (SELECT inPM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date =  @date1);
SET @outPM = (SELECT outPM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date =  @date1);
IF(@duration = 'Whole Day') THEN
IF(@outAM = '')THEN
UPDATE dailytimerecord SET outAM = 'HOLI' WHERE employeeNo = empno AND DATE = @date1;
END IF;
IF(@inPM = '')THEN
UPDATE dailytimerecord SET inPM = 'DAY' WHERE employeeNo = empno AND DATE = @date1;
END IF;
END IF;
IF(@duration = 'Morning') THEN
IF(@inAM = '')THEN
UPDATE dailytimerecord SET inAM = 'HOLI' WHERE employeeNo = empno AND DATE = @date1;
END IF;
IF(@outAM = '')THEN
UPDATE dailytimerecord SET outAM = 'DAY' WHERE employeeNo = empno AND DATE = @date1;
END IF;
END IF;
IF(@duration = 'Afternoon') THEN
IF(@inPM = '')THEN
UPDATE dailytimerecord SET inPM = 'HOLI' WHERE employeeNo = @empno AND DATE = @date1;
END IF;
IF(@outPM = '')THEN
UPDATE dailytimerecord SET outPM = 'DAY' WHERE employeeNo = @empno AND DATE = @date1;
END IF;
END IF;
UPDATE dailytimerecord SET outAM = 'HOLI' WHERE employeeNo = empno AND DATE = @date1;
    END$$

DELIMITER ;