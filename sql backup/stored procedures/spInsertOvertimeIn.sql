DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertOvertimeIn`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertOvertimeIn`(empno VARCHAR(50),worksched VARCHAR(50),ddate VARCHAR(50),timeIn VARCHAR(50))
BEGIN
SET @timeIn = TIME_FORMAT(timeIn,'%h:%i %p');
	UPDATE dailytimerecord SET otIn = @timeIn
	WHERE employeeNo=empno AND DATE = ddate;	
	END$$

DELIMITER ;