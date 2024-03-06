DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spReflectHoliday`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spReflectHoliday`(
	holidayId VARCHAR(50), empno VARCHAR(50))
BEGIN
DECLARE inmorning VARCHAR(50);
DECLARE outmorning VARCHAR(50);
DECLARE inafternoon VARCHAR(50);
DECLARE outafternoon VARCHAR(50);
DECLARE date1 VARCHAR(50);
DECLARE duration VARCHAR(50);
SELECT DATE,period INTO date1,duration FROM holiday  WHERE entryNo = holidayId LIMIT 1;
SELECT inAM,outAM,inPM,outPM INTO inmorning,outmorning,inafternoon,outafternoon FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date = date1 LIMIT 1;
/*SET @date1 = (SELECT DATE FROM holiday WHERE entryNo = holidayId LIMIT 1);	
SET @duration = (SELECT period FROM holiday WHERE entryNo = holidayId LIMIT 1);			
SET @inAM = (SELECT inAM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date = @date1 LIMIT 1);
SET @outAM = (SELECT outAM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date = @date1 LIMIT 1);
SET @inPM = (SELECT inPM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date =  @date1 LIMIT 1);
SET @outPM = (SELECT outPM FROM dailytimerecord d INNER JOIN bioinfo e ON d.employeeNo = e.employeeNo WHERE e.employeeNo = empno AND d.Date =  @date1 LIMIT 1);*/
CASE duration
WHEN 'Whole Day' THEN
IF(outmorning = '')THEN
UPDATE dailytimerecord SET outAM = 'HOLI' WHERE employeeNo = empno AND DATE = date1 LIMIT 1;
END IF;
IF(inafternoon = '')THEN
UPDATE dailytimerecord SET inPM = 'DAY' WHERE employeeNo = empno AND DATE = date1 LIMIT 1;
END IF;
WHEN 'Morning' THEN
IF(inmorning = '')THEN
UPDATE dailytimerecord SET inAM = 'HOLI' WHERE employeeNo = empno AND DATE = date1 LIMIT 1;
END IF;
IF(outmorning = '')THEN
UPDATE dailytimerecord SET outAM = 'DAY' WHERE employeeNo = empno AND DATE = date1 LIMIT 1;
END IF;
WHEN 'Afternoon' THEN

IF(inafternoon = '')THEN
UPDATE dailytimerecord SET inPM = 'HOLI' WHERE employeeNo = empno AND DATE = date1 LIMIT 1;
END IF;
IF(outafternoon = '')THEN
UPDATE dailytimerecord SET outPM = 'DAY' WHERE employeeNo = empno AND DATE = date1 LIMIT 1;
END IF;
END CASE;
    END$$

DELIMITER ;