DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertLeaveCredits`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertLeaveCredits`(
    empno INT(50),
    getMonth VARCHAR(50),
    getYear INT(50),
    vlBalance DOUBLE,
    slBalance DOUBLE
    )
BEGIN
    SET @getTotal = (vlBalance + slBalance);
	INSERT INTO  leavecredits 
	SET
	employeeNo = empno,
	MONTH = getMonth,
	YEAR = getYear,
	VL_balance = vlBalance,
	SL_balance = slBalance,
	total_balance = @getTotal,
	credits_earned  = 1.250,
	UT_deduction = 1.500;
    END$$

DELIMITER ;