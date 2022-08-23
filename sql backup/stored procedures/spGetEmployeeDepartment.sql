DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spGetEmployeeDepartment`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetEmployeeDepartment`(deptCode VARCHAR(50),empstatus VARCHAR(10))
BEGIN
	SELECT *,CONCAT(firstName,' ',LEFT(middleName,1),'. ',lastName) AS fullName FROM bioinfo 
	WHERE department = deptCode AND employmentStatus = empstatus;
    END$$

DELIMITER ;