DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spUpdateWorkSchedDetails`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateWorkSchedDetails`(
	workId VARCHAR(50),
	days VARCHAR(50),
	inam VARCHAR(50),
	outam VARCHAR(50),
	inpm VARCHAR(50),
	outpm VARCHAR(50))
BEGIN
	SET @getDays =(SELECT DAY FROM workscheduledetail 
	WHERE DAY = days AND workScheduleDetail = workId); 
	
	SET @getcount	=(SELECT COUNT(DAY) FROM workscheduledetail 
	WHERE DAY = days AND workScheduleDetail = workId);
	
	
	IF(@getDays !=	'' )	THEN
	UPDATE workscheduledetail SET 
	inAM	=	inam,
	outAM	=	outam,
	inPM	=	inpm,
	outPM	=	outpm 
	WHERE workScheduleDetail= workId AND DAY=days;
	END IF;
	
	IF(@getcount = 0)THEN
	
	 IF(inam !='' OR outam !='' OR inpm !='' OR outpm !='') THEN
	 INSERT INTO workscheduledetail SET
	 `workscheduleDetail` 	=	workId,
	 `Day` 		=	days,
	 `inAM` 	=	inam,
	 `outAM` 	=	outam,
	  `inPM` 	=	inpm,
	   `outPM` 	=	outPM;
	   
	   END IF;
	   END IF;
	   
	   IF(inam ='' AND outam ='' AND inpm ='' AND outpm= '') THEN
	   
	   DELETE FROM workscheduledetail WHERE workScheduleDetail = workId AND 
	   DAY = days;
	   
	   END IF;
    END$$

DELIMITER ;