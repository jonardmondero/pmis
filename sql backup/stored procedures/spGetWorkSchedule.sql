DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spGetWorkSchedule`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetWorkSchedule`(
    workId VARCHAR(50),
    getDay VARCHAR(50)
    )
BEGIN
	SELECT * FROM workscheduledetail WHERE
workScheduleDetail = workId AND DAY = getDay LIMIT 1;
    END$$

DELIMITER ;