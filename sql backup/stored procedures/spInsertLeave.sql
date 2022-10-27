DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertLeave`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertLeave`(
empno	VARCHAR(50),
leavetype VARCHAR(50),
dtefrom	VARCHAR(50),
dteto	VARCHAR(50),
dration VARCHAR(50))
BEGIN
				
INSERT INTO leaveentry SET
	`employeeNo`	=	empno,
	`leaveType` 	=	leaveType,
	`dateFrom`	=	dtefrom,
	`dateTo` 	=	dteto,
	`duration` 	=	dration;
	
    END$$

DELIMITER ;