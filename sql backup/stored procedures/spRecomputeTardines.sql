DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spRecomputeTardiness`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spRecomputeTardiness`(
    empno INT(50),
    ddate VARCHAR(50),
    timeIn VARCHAR(50),
    breakOut VARCHAR(50),
    breakIn VARCHAR(50),
    checkOut VARCHAR(50)
    
    )
BEGIN
DECLARE timeLateMorning TIME DEFAULT '00:00:00';
DECLARE timeUndertimeMorning TIME DEFAULT '00:00:00';
DECLARE timeLateAfternoon TIME DEFAULT '00:00:00';
DECLARE timeUndertimeAfternoon TIME DEFAULT '00:00:00';
SET @getDay = DATE_FORMAT(ddate,'%W');
SET @convertedtimeIn = (SELECT STR_TO_DATE(timeIn, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @convertedbreakOut = (SELECT STR_TO_DATE(breakOut, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @convertedbreakIn = (SELECT STR_TO_DATE(breakIn, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @convertedcheckOut = (SELECT STR_TO_DATE(checkOut, '%h:%i %p')); /*CONVERT THE TIME INTO 24 HOURS FORMAT */
SET @bolsched = (SELECT SCHEDULE FROM bioinfo WHERE employeeNo = empno);
SET @workId = (SELECT workScheduleId FROM bioinfo WHERE employeeNo = empno);  /*GET THE EMPLOYEE SCHEDULE THAT WILL BE USED TO FIND THE SCHEDULE DATE*/
SET @schedInAm = (SELECT inAM FROM workscheduledetail WHERE workScheduleDetail COLLATE latin1_general_ci = @workId AND DAY = @getDay);/*SELECT THE time in on work schedule detail*/
SET @schedOutAm = (SELECT outAM FROM workscheduledetail WHERE  workScheduleDetail COLLATE latin1_general_ci = @workId AND DAY = @getDay);/*SELECT THE time out am on work schedule detail*/
SET @schedInPm = (SELECT inPM FROM workscheduledetail WHERE   workScheduleDetail COLLATE latin1_general_ci = @workId  AND DAY = @getDay);/*SELECT THE time in pm work schedule detail*/
SET @schedOutPm = (SELECT outPM FROM workscheduledetail WHERE  workScheduleDetail COLLATE latin1_general_ci = @workId  AND DAY = @getDay);/*SELECT THE time out pm on work schedule detail*/
SET @lateMorning = (SELECT STR_TO_DATE(@schedInAm, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
SET @undertimeMorning = (SELECT STR_TO_DATE(@schedOutAm, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
SET @lateAfternoon = (SELECT STR_TO_DATE(@schedInPm, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
SET @undertimeAfternoon = (SELECT STR_TO_DATE(@schedOutPm, '%h:%i %p')); /*CONVERT THE TIME FROM SCHEDULE INTO 24 HOURS FORMAT*/
    IF(@bolsched = 'Yes') THEN
    IF(@convertedtimeIn > @lateMorning) AND (@schedInAm != '') AND (timeIn != '') THEN /* COMPUTE LATE IN THE MORNING*/
    SET timeLateMorning = TIMEDIFF(@convertedtimeIn,@lateMorning);
    END IF;
    
    IF(@convertedbreakOut < @undertimeMorning) AND (@schedOutAm != '') AND (breakOut != '')THEN
     SET  timeUndertimeMorning = TIMEDIFF(@undertimeMorning,@convertedbreakOut);
    END IF;
    
     IF(@convertedbreakIn > @lateAfternoon) AND (@schedInPm != '') AND (breakIn != '')THEN
     SET timeLateAfternoon= TIMEDIFF(@convertedbreakIn,@lateAfternoon);
    END IF;
    
      IF(@convertedcheckOut < @undertimeAfternoon) AND (@schedOutPm != '') AND (checkOut != '')THEN
     SET timeUndertimeAfternoon= TIMEDIFF(@undertimeAfternoon,@convertedcheckOut);
    END IF;
    
    SET @finalLate = ADDTIME(timeLateMorning,timeLateAfternoon);
    SET @finalUndertime = ADDTIME(timeUndertimeMorning,timeUndertimeAfternoon);
    
    UPDATE dailytimerecord SET 
    late = @finalLate,
    undertime = @finalUndertime
    WHERE employeeNo = empno
    AND DATE = ddate; 
    
    
    END IF;
    
    END$$

DELIMITER ;