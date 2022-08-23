DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertUser`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUser`(userid VARCHAR(50),uname VARCHAR(150),upass VARCHAR(150),fname VARCHAR(50),lname VARCHAR(50),usertype VARCHAR(30))
BEGIN
 INSERT INTO USER VALUES	(userid,uname,upass,fname,lname,usertype);
 END$$

DELIMITER ;