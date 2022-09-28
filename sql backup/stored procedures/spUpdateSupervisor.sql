DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spUpdateSupervisor`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateSupervisor`(
    dept VARCHAR(50),
    super_visor VARCHAR(100),
      emp_status VARCHAR(50)
    )
BEGIN
	UPDATE bioinfo SET supervisor = super_visor WHERE department COLLATE latin1_general_ci = dept AND employmentStatus = emp_status COLLATE latin1_general_ci;
    END$$

DELIMITER ;