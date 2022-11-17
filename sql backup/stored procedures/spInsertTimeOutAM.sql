DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spInsertTimeOutAM`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTimeOutAM`(empno VARCHAR(50),worksched VARCHAR(50),ddate VARCHAR(50),timeIn VARCHAR(50),bolsched VARCHAR(10))
BEGIN
SET @timeIn = TIME_FORMAT(timeIn,'%h:%i %p');/*SET THE TIME INTO 12 HOURS FORMAT */
SET @convertedtime = (SELECT STR_TO_DATE(@timeIn, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @DDate =(SELECT outAM FROM workscheduledetail WHERE workscheduleDetail = worksched AND `Day`= DATE_FORMAT(ddate,'%W') LIMIT 1);/*GET THE TIME FROM THE WORKSCHEDULE*/
SET @latesched = (SELECT STR_TO_DATE(@DDate, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
SET @morning =( SELECT undertime FROM dailytimerecord WHERE employeeNo = empno AND DATE = ddate LIMIT 1);/*GET THE LATE IN THE MORNING*/
SET @checkoutAM = (SELECT outAM FROM dailytimerecord WHERE DATE = ddate AND employeeNo = empno LIMIT 1);
	IF(@checkoutAM = '' OR @checkoutAM = 'DAY') THEN 
	
	UPDATE dailytimerecord SET outAM = @timeIn  /*UPDATE THE IN PM*/
	WHERE employeeNo=empno AND DATE = ddate LIMIT 1;
	
/*SET @DDate = ADDTIME(@DDate,'');*/
	IF(bolsched = 'Yes') THEN	
	IF(@convertedtime < @latesched) AND (@DDate != '') THEN    /*COMPARE THE TIME IN AND SCHEDULE TIME*/
	
	SET @timeLate = TIMEDIFF(@latesched,@convertedtime);  /*GET THE TIME DIFFERENCE*/
	
	/*SET @timeLateFinal= ADDTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(@timeLate ))),SEC_TO_TIME(SUM(TIME_TO_SEC( @morning))));*/
	
	SET @timeLateFinal = ADDTIME(@timeLate,@morning); /*ADD THE TIME MORNING AND AFTERNOON*/
	UPDATE dailytimerecord SET undertime =  @timeLateFinal WHERE employeeNo = empno AND DATE = ddate LIMIT 1; /*UPDATE THE LATE OF THE EMPLOYEE*/
	
	
	END IF;
	END IF;
	END IF;
	END$$

DELIMITER ;