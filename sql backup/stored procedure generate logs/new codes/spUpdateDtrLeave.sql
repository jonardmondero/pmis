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
    DECLARE inmorning VARCHAR(50);
    DECLARE outmorning VARCHAR(50);
    DECLARE inafternoon VARCHAR(50);
    DECLARE outafternoon VARCHAR(50);
    
    
    SELECT inAM,outAM,inPM,outPM INTO inmorning,outmorning,inafternoon,outafternoon FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1 ; 
            
	/*SET @inam = (SELECT inAM FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1);
	SET @outam = (SELECT outAM FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1);
	SET @inpm = (SELECT inPM FROM dailytimerecord WHERE employeeNo = empno AND `Date` = ddate LIMIT 1);
	SET @outpm = (SELECT outPM FROM dailytimerecord WHERE  employeeNo = empno AND `Date` = ddate LIMIT 1);*/
	/*1 START*/
	
	CASE duration
	
	WHEN 'Whole Day' THEN
	IF(inmorning ='') THEN
	UPDATE dailytimerecord SET inAM = leavetype WHERE employeeNo = 	empno AND `Date` = ddate LIMIT 1;
	
	END IF;
	
	IF(outmorning = '') THEN
	UPDATE dailytimerecord SET outAM = leavetype WHERE employeeNo 	= empno AND `Date` = ddate LIMIT 1;
	
	END IF;
	IF(inafternoon = '') THEN
	UPDATE dailytimerecord SET inPM = leavetype WHERE employeeNo = empno AND `Date` = ddate LIMIT 1;
	
	END IF;
	IF(outafternoon = '') THEN
	UPDATE dailytimerecord SET outPM = leavetype WHERE employeeNo = empno AND `Date` = ddate LIMIT 1;
	
	END IF;
	

	/*1 END */
	WHEN 'Morning' THEN
	/*1.2 START */
	IF(inmorning = '')THEN
	UPDATE dailytimerecord SET inAM = leavetype WHERE employeeNo = 	empno AND`Date` = ddate LIMIT 1;
	
	END IF;
	
	IF(outmorning = '')THEN
	UPDATE dailytimerecord SET outAM = leavetype WHERE employeeNo = empno AND `Date` = ddate LIMIT 1;
	
	END IF;
	

	/*1.2 END */
	WHEN 'Afternoon' THEN
	/*1.3 START */
	IF(inafternoon = '')THEN UPDATE dailytimerecord SET inPM = leavetype WHERE employeeNo 	= empno AND`Date` = ddate LIMIT 1;
	
	END IF;
	IF(outafternoon = '')THEN
	UPDATE dailytimerecord SET outPM = leavetype WHERE employeeNo 	= empno AND
	`Date` = ddate LIMIT 1;
	
	END IF;
	
	

	/*1.3 END */
	
	WHEN 'Break Out / Break In' THEN
	
	IF(outmorning = '')THEN
	UPDATE dailytimerecord SET outAM = leavetype WHERE employeeNo 	= empno AND `Date` = ddate LIMIT 1;
	
	END IF;
	IF(inafternoon = '')THEN
	UPDATE dailytimerecord SET inPM = leavetype WHERE employeeNo 	= empno AND `Date` = ddate LIMIT 1;
	
	END IF;

	END CASE;

	
	UPDATE leaveentry SET `status` = 'APPROVED' WHERE entryId = entryno AND employeeNo = empno LIMIT 1;
	
    END$$

DELIMITER ;