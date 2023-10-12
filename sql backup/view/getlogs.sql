DELIMITER $$

USE `pmis`$$

DROP VIEW IF EXISTS `getlogs`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getlogs` AS 
SELECT
  `b`.`biometricId` AS `biometricId`,
  DATE_FORMAT(`d`.`Date`,'%c/%e/%Y') AS `dDate`,
  `d`.`Date`        AS `Date`,
  b.employeeNo
FROM (`bioinfo` `b`
   JOIN `dailytimerecord` `d`
     ON (`b`.`employeeNo` = `d`.`employeeNo`))$$

DELIMITER ;