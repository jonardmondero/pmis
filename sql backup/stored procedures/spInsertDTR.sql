DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertDTR`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertDTR`(empno VARCHAR(100),ddate VARCHAR(30))
BEGIN
	SET @chkDate = (SELECT DATE FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate);
	
	IF(@chkDate IS NULL) THEN
	
	 INSERT  INTO dailytimerecord (employeeNo,DATE) VALUES (empno,ddate);
	END IF;
	END$$

DELIMITER ;