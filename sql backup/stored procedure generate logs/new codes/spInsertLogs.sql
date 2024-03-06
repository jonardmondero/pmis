DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertLogs`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertLogs`(
    empno VARCHAR(50),
    worksched VARCHAR(50),
    ddate VARCHAR(50),
    checktime VARCHAR(50),
    bolsched VARCHAR(50),
    state VARCHAR(50)
    )
BEGIN
	CASE state
	WHEN 'O' THEN
	CALL spInsertTimeIn(empno,worksched,ddate,checktime,bolsched);
	
	WHEN '0' THEN
	CALL	spInsertTimeOutAM(empno,worksched,ddate,checktime,bolsched);
	
	WHEN '1' THEN
	CALL	spInsertTimeInPM(empno,worksched,ddate,checktime,bolsched);
	
	WHEN 'i' THEN 
	CALL spInsertTimeOutPM(empno,worksched,ddate,checktime,bolsched);
	
	END CASE;
    END$$

DELIMITER ;