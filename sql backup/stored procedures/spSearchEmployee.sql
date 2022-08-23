DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spSearchEmployee`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchEmployee`(userId VARCHAR(50))
BEGIN
 SELECT	*
 FROM `employee` e RIGHT JOIN department d ON e.department = d.deptId;
 END$$

DELIMITER ;