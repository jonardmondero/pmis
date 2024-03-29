DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spShowDTR`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spShowDTR`(empno VARCHAR(50),dteFrom VARCHAR(50),dteTo VARCHAR(50),dtelimit INT(50))
BEGIN
	SELECT *
	FROM viewDTR
	WHERE
	employeeNo = empno AND 
	DATE BETWEEN dteFrom AND dteTo ORDER BY DATE LIMIT dtelimit;
    END$$

DELIMITER ;