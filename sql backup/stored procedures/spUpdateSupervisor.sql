DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spUpdateSupervisor`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateSupervisor`(
    dept VARCHAR(50),
    super_visor VARCHAR(100)
    )
BEGIN
	UPDATE bioinfo SET supervisor = super_visor WHERE department = dept;
    END$$

DELIMITER ;