DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertScheduleDetail`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertScheduleDetail`(
    workid VARCHAR(50),
    DAY VARCHAR(50),
    inam VARCHAR(50),
    outam VARCHAR(50),
    inpm VARCHAR(50),
    outpm VARCHAR(50)
    
    )
BEGIN
	IF(inam != '' && outam != '' && inpm != '' && outpm != '') THEN 
	INSERT INTO workscheduledetail SET 
	`workScheduleDetail` = workid,
	`Day` = DAY,
	`inAM` = inam,
	`outAM` = outam,
	`inPM` = inpm,
	`outPM` = outpm;
	
	END IF;
    END$$

DELIMITER ;