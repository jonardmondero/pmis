DELIMITER $$

USE `pmis`$$

DROP VIEW IF EXISTS `viewbioinfo`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewbioinfo` AS (
SELECT
  `b`.`employeeNo`     AS `employeeNo`,
  `b`.`biometricId`    AS `biometricId`,
  `b`.`workScheduleId` AS `workScheduleId`,
  `b`.`department`     AS `department`,
  `d`.`connection`     AS `connection`,
  `b`.`schedule`       AS `schedule`,
   `b`.`status`         AS `bio_status`,
   `d`.`status`         AS `dep_status`
FROM (`bioinfo` `b`
   JOIN `department` `d`
     ON (`b`.`department` = `d`.`deptId`)))$$

DELIMITER ;