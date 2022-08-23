DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spGetLeaveType`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetLeaveType`()
BEGIN
	SELECT * FROM leavetype WHERE STATUS = 'Active';
    END$$

DELIMITER ;