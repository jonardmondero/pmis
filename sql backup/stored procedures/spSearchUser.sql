DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spSearchUser`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchUser`(userId VARCHAR(50))
BEGIN
 SELECT	*
 FROM `user` ;
 END$$

DELIMITER ;