DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertImage`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertImage`(empno VARCHAR(50),image VARCHAR(50))
BEGIN
	INSERT INTO image VALUES (empno,image);
    END$$

DELIMITER ;