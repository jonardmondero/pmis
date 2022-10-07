DELIMITER $$

USE `pmis`$$

DROP VIEW IF EXISTS `viewbioinfo`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `viewbioinfo` AS (
SELECT
  `b`.`employeeNo`     AS `employeeNo`,
  `b`.`biometricId`    AS `biometricId`,
  `b`.`workScheduleId` AS `workScheduleId`,
  `b`.`department`     AS `department`,
  `d`.`connection`     AS `connection`,
  `b`.`schedule`       AS `schedule`
FROM (`bioinfo` `b`
   JOIN `department` `d`
     ON (`b`.`department` = `d`.`deptId`)))$$

DELIMITER ;