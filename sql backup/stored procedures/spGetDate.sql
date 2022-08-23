DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spGetDate`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetDate`(
    empno VARCHAR(50),
    dateFrom VARCHAR(50),
    dateTo VARCHAR(50)
    )
BEGIN
	SELECT DATE,inAM,outAM,inPM,outPM FROM dailytimerecord WHERE employeeNo = empno AND DATE BETWEEN dateFrom AND dateTo;	
    END$$

DELIMITER ;