DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spGetAllEmployee`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllEmployee`()
BEGIN
	SELECT b.*,CONCAT(b.firstName,' ',LEFT(b.middleName, 1),'. ',b.lastName) AS fullname,d.departmentDescription FROM bioinfo b
	INNER JOIN department d ON b.department = d.deptId;
    END$$

DELIMITER ;