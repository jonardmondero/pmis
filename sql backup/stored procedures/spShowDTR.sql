DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spShowDTR`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spShowDTR`(empno VARCHAR(50),dteFrom VARCHAR(50),dteTo VARCHAR(50))
BEGIN
	SELECT *,
	/*Date,
	TIME_FORMAT(inAM,'%h:%i %p') as inAM,
	TIME_FORMAT(outAM,'%h:%i %p') AS outAM,
	TIME_FORMAT(inPM,'%h:%i %p') AS inPM,
	TIME_FORMAT(outPM,'%h:%i %p') AS outPM,
	TIME_FORMAT(otIn,'%h:%i %p') AS otIn,
	TIME_FORMAT(otOut,'%h:%i %p') AS otOut,
	*/
	DATE_FORMAT(DATE,'%W')AS DAY,
	TIME_FORMAT(late,'%H:%i') AS latefinal,
	TIME_FORMAT(undertime,'%H:%i') AS undertimefinal  
	FROM dailytimerecord
	WHERE
	employeeNo = empno AND 
	DATE BETWEEN dteFrom AND dteTo ORDER BY DATE;
    END$$

DELIMITER ;