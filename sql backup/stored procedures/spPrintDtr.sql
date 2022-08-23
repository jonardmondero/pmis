DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spPrintDtr`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spPrintDtr`(empno VARCHAR(50),datefrom VARCHAR(50),dateto VARCHAR(50))
BEGIN
 SET @ddatefrom = DATE_FORMAT(datefrom, '%Y-%c-%d');
 SET @ddateto = DATE_FORMAT(dateto, '%Y-%c-%d');
SELECT CONCAT(e.lastName,', ',e.firstName,', ',LEFT(e.middleName, 1),'.')  AS fullName,d.* FROM bioinfo e 
INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE d.Date BETWEEN @ddatefrom AND @ddateto ;
    END$$

DELIMITER ;