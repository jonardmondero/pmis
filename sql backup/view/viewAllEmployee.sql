
CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `pmis`.`viewAllEmployee` 
    AS
(SELECT CONCAT(b.firstName,' ',LEFT(b.middleName, 1),'. ',b.lastName) AS fullname,
        b.employeeNo,
        b.biometricId,
        d.departmentDescription,
        b.workScheduleId,
        b.employmentStatus,
        b.supervisor,
        b.lastName  
        FROM bioinfo b 
        INNER JOIN department d ON b.department = d.deptId);
