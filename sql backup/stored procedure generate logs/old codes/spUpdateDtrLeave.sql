DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spUpdateDtrLeave`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateDtrLeave`(
    
    entryno VARCHAR(50),
    empno VARCHAR(50),
    ddate VARCHAR(50),
    leavetype VARCHAR(50),
    duration VARCHAR(50)
    
    
    )
BEGIN
    
	SET @inam = (SELECT inAM FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1);
	SET @outam = (SELECT outAM FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1);
	SET @inpm = (SELECT inPM FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1);
	SET @outpm = (SELECT outPM FROM dailytimerecord WHERE  employeeNo = empno AND `Date` = ddate LIMIT 1);
	/*1 START*/
	
	IF(duration = 'Whole Day') THEN 
	IF(@inam = '')THEN
	UPDATE dailytimerecord SET
	inAM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	
	IF(@outam = '')THEN
	UPDATE dailytimerecord SET
	outAM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	IF(@inpm = '')THEN
	UPDATE dailytimerecord SET
	inPM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	IF(@outpm = '')THEN
	UPDATE dailytimerecord SET
	outPM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	
	END  IF;
	/*1 END */
	IF(duration = 'Morning') THEN
	/*1.2 START */
	IF(@inam = '')THEN
	UPDATE dailytimerecord SET
	inAM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	
	IF(@outam = '')THEN
	UPDATE dailytimerecord SET
	outAM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	
	
	END IF;
	/*1.2 END */
	IF(duration = 'Afternoon') THEN
	/*1.3 START */
	IF(@inpm = '')THEN
	UPDATE dailytimerecord SET
	inPM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	IF(@outpm = '')THEN
	UPDATE dailytimerecord SET
	outPM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	
	
	END IF;
	/*1.3 END */
	IF(duration = 'Break Out / Break In') THEN
	
	IF(@outam = '')THEN
	UPDATE dailytimerecord SET
	outAM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	IF(@inpm = '')THEN
	UPDATE dailytimerecord SET
	inPM 		= 	leavetype
	WHERE 
	employeeNo 	= 	empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	END IF;
	
	
	UPDATE leaveentry SET 
	`status` = 'APPROVED'
	WHERE
	entryId = entryno AND 
	employeeNo = empno;
	
	
    END$$

DELIMITER ;