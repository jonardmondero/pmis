DELIMITER $$

USE `pmis`$$

DROP PROCEDURE IF EXISTS `spinsertNewEmployee`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertNewEmployee`(
	empno VARCHAR(50),
	fname VARCHAR(50),
	lname VARCHAR(50),
	mname VARCHAR(50),
	resaddress VARCHAR(50),	
	rzip VARCHAR(50),	
	rstel VARCHAR(50),	
	peraddress VARCHAR(100),
	pzip VARCHAR(50),	
	ptel VARCHAR(50),
	civil VARCHAR(50),	
	bday VARCHAR(50),
	sx VARCHAR(50),	
	height VARCHAR(10),	
	btype VARCHAR(10),	
	weight VARCHAR(10),
	cnum VARCHAR(50),	
	pgibig VARCHAR(50),	
	pgissued VARCHAR(50),	
	phlhealth VARCHAR(50),	
	pissued VARCHAR(10),	
	tin VARCHAR(50),	
	gsisnum VARCHAR(50),	
	ctc VARCHAR(50),	
	gsisuid VARCHAR(50)
						
    )
BEGIN
	INSERT INTO employee(EmployeeNo,firstName,lastName,middleName,resAddress,rezip,
	restelno,perAddress,perzip,pertelno,civil,dateofbirth,sex,height,bloodtype,weight,
	cnumber,pagibig,pbissued,phlhealth,phissued,tin,gsisnum,ctc,gsisumid)
	 VALUES(empno,fname,lname,mname,resaddress,rzip,rstel,peraddress,
	pzip,ptel,civil,bday,sx,height,btype,weight,cnum,pgibig,pgissued,phlhealth,
	pissued,tin,gsisnum,ctc,gsisuid);
    END$$

DELIMITER ;