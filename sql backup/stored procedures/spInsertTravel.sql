DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertTravel`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTravel`(empno VARCHAR(50), 
    fname VARCHAR(100),ffrom VARCHAR(50),tto VARCHAR(50),
    duration VARCHAR(20),ttype VARCHAR(50),detail VARCHAR(500))
BEGIN
	
	SET @converttobtype = ttype;
	IF(ttype = 'Field Work')THEN
	SET @convertobtype = 'FW';
	END IF;
	IF(ttype = 'Travel on Official Business') THEN
	SET @convertobtype = 'TOB';
	END IF;
	IF(ttype = 'On Official Time') THEN
	SET @convertobtype = 'OT';
	END IF;
	IF(ttype = 'Travel on Official Time') THEN
	SET @convertobtype = 'TOT';
	END IF;
    SET @chkEmployeeTravel = (SELECT COUNT(EmployeeNo) FROM officialbusiness 
    WHERE employeeNo = empno AND datefrom = ffrom AND
	dateto = tto AND 
	details = detail);
    
	/*INSERT INTO officialbusiness (employeeNo,fullname,datefrom,dateto,duration,obtype,details,STATUS)
	VALUES(empno,fname,ffrom,tto,duration,ttype,detail,'PENDING');*/
	IF (@chkEmployeeTravel = 0 ) THEN
	IF(empno != '' && fname !='' && ffrom != '' && tto !='') THEN 
	
	INSERT INTO officialbusiness SET
	employeeNo = empno,
	fullname = fname,
	datefrom =  ffrom,
	dateto= tto,
	duration = duration,
	obtype = @convertobtype,
	details = detail,
	STATUS = 'PENDING';
	
	END IF;
	
	END IF;
	
    END$$

DELIMITER ;