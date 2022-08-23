DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spUpdateDtr`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateDtr`(
	empno VARCHAR(50),
	ddate VARCHAR(50),
	currentfield VARCHAR(50),
	getvalue VARCHAR(50))
BEGIN
	UPDATE dailytimerecord SET
	`currentfield` =LTRIM(getvalue)
	/*outAM = LTRIM(bout),
	inPM = LTRIM(bbin),
	outPM = LTRIM(cout),
	otIn = ltrim(otin),
	otOut = ltrim(otout),
	late = late,
	undertime = undertime*/
	WHERE employeeNo=empno AND DATE = ddate;
    END$$

DELIMITER ;