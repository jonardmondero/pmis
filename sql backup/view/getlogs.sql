DELIMITER $$

USE `pmis`$$

DROP VIEW IF EXISTS `getlogs`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getlogs` AS 
/*select
  `b`.`biometricId` AS `biometricId`,
  date_format(`d`.`Date`,'%c/%e/%Y') AS `dDate`,
  `d`.`Date`        AS `Date`,
  b.employeeNo
from (`bioinfo` `b`
   join `dailytimerecord` `d`
     on (`b`.`employeeNo` = `d`.`employeeNo`))*/
     
     SELECT employeeNo, biometricId FROM bioinfo;
     $$

DELIMITER ;