DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertTimeIn`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeIn`(empno VARCHAR(50),worksched VARCHAR(50),ddate VARCHAR(50),timeIn VARCHAR(50),bolsched VARCHAR(10))

BEGIN
DECLARE morning VARCHAR(50);
DECLARE checkInAM  VARCHAR(50);
SELECT late,inAM INTO morning,checkInAM FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate LIMIT 1;

SET @timeIn = TIME_FORMAT(timeIn,'%h:%i %p');/*SET THE TIME INTO 12 HOURS FORMAT */
SET @convertedtime = (SELECT STR_TO_DATE(@timeIn, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @DDate =(SELECT inAM FROM workscheduledetail WHERE workscheduleDetail = worksched AND `Day`= DATE_FORMAT(ddate,'%W') LIMIT 1);/*GET THE TIME FROM THE WORKSCHEDULE*/
SET @latesched = (SELECT STR_TO_DATE(@DDate, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
/*SET @morning =( SELECT late FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate LIMIT 1);GET THE LATE IN THE MORNING*/
/*SET @checkInAM = (SELECT inAM FROM dailytimerecord WHERE DATE = ddate AND employeeNo = empno LIMIT 1);*/
	
	IF(checkInAM = '') THEN
	UPDATE dailytimerecord SET inAM = @timeIn  /*UPDATE THE IN PM*/
	WHERE employeeNo=empno AND DATE = ddate LIMIT 1;
	
	
	IF(bolsched = 'Yes')THEN
	IF(@convertedtime > @latesched) AND (@DDate != '') THEN    /*COMPARE THE TIME IN AND SCHEDULE TIME*/
	
	SET @timeLate = TIMEDIFF(@convertedtime,@latesched);  /*GET THE TIME DIFFERENCE*/
	
	/*SET @timeLateFinal= ADDTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(@timeLate ))),SEC_TO_TIME(SUM(TIME_TO_SEC( @morning))));*/
	
	SET @timeLateFinal = ADDTIME(@timeLate,morning); /*ADD THE TIME MORNING AND AFTERNOON*/
	UPDATE dailytimerecord SET late =  @timeLateFinal WHERE employeeNo = empno AND DATE = ddate LIMIT 1; /*UPDATE THE LATE OF THE EMPLOYEE*/
	END IF;
	END IF;
	END IF;
	
	SET @checkovertimeIn = (SELECT inAM FROM dailytimerecord WHERE DATE = ddate AND employeeNo = empno LIMIT 1);
	SET @formatinAM = (SELECT STR_TO_DATE(@checkovertimeIn, '%h:%i %p'));/*GET THE CHECK IN AND COMPARE IT TO THE ANOTHER CHECK IN TIME */
	
	SET @getOvertimeIn = TIMEDIFF(@convertedtime,@formatinAM);/* GET THE TIME DIFFERENCE TO BE USED AS CONDITION FOR THE ADDING OF OVERTIME*/
	IF(checkInAM != '' AND @getOvertimeIn > '05:00:00')THEN
	
	UPDATE dailytimerecord SET otIn = @timeIn  /*UPDATE THE IN PM*/
	WHERE employeeNo=empno AND DATE = ddate LIMIT 1;
	
	END IF;
	
	END$$

DELIMITER ;