DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertTimeIn`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeIn`(empno VARCHAR(50),worksched VARCHAR(50),ddate VARCHAR(50),timeIn VARCHAR(50),bolsched VARCHAR(10))
BEGIN
SET @timeIn = TIME_FORMAT(timeIn,'%h:%i %p');/*SET THE TIME INTO 12 HOURS FORMAT */
SET @convertedtime = (SELECT STR_TO_DATE(@timeIn, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @DDate =(SELECT inAM FROM workscheduledetail WHERE workscheduleDetail = worksched AND `Day`= DATE_FORMAT(ddate,'%W'));/*GET THE TIME FROM THE WORKSCHEDULE*/
SET @latesched = (SELECT STR_TO_DATE(@DDate, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
SET @morning =( SELECT late FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate);/*GET THE LATE IN THE MORNING*/
SET @checkInAM = (SELECT inAM FROM dailytimerecord WHERE DATE = ddate AND employeeNo = empno);
	IF(@convertedtime < '17:00') THEN
	
	IF(@checkInAM = '') THEN
	
	UPDATE dailytimerecord SET inAM = @timeIn  /*UPDATE THE IN PM*/
	WHERE employeeNo=empno AND DATE = ddate;
	
	
	IF(bolsched = 'Yes')THEN
	IF(@convertedtime > @latesched) AND (@DDate != '') THEN    /*COMPARE THE TIME IN AND SCHEDULE TIME*/
	
	SET @timeLate = TIMEDIFF(@convertedtime,@latesched);  /*GET THE TIME DIFFERENCE*/
	
	/*SET @timeLateFinal= ADDTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(@timeLate ))),SEC_TO_TIME(SUM(TIME_TO_SEC( @morning))));*/
	
	SET @timeLateFinal = ADDTIME(@timeLate,@morning); /*ADD THE TIME MORNING AND AFTERNOON*/
	UPDATE dailytimerecord SET late =  @timeLateFinal WHERE employeeNo = empno AND DATE = ddate; /*UPDATE THE LATE OF THE EMPLOYEE*/
	END IF;
	END IF;
	END IF;
	
	ELSE
	
	UPDATE dailytimerecord SET otIn = @timeIn  /*UPDATE THE IN PM*/
	WHERE employeeNo=empno AND DATE = ddate;
	
	END IF;
	
	END$$

DELIMITER ;