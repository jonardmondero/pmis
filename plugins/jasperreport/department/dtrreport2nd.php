<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");
include_once ('../setting.php');
include('../reportconnection.php');
//get the date info and combined it into string
$dept = $_GET['dept'];  
$date = $_GET['year'];
$days = $_GET['days'];
$datefrom 	=		$date."-16";
$dateto 	= 		$date."-31";
$emp_status = $_GET['empstatus'];		
//sql statement for 2nd half report
$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
// $PHPJasperXML->arrayParameter=array("employeeNo"=>'12345678');
if($days == '31'){$xml = $PHPJasperXML->load_xml_file("dtrreport2nd.jrxml");}
if($days == '30'){$xml = $PHPJasperXML->load_xml_file("dtrreport2nd-30.jrxml");}
if($days == '29'){$xml = $PHPJasperXML->load_xml_file("dtrreport2nd-29.jrxml");}
if($days == '28'){$xml = $PHPJasperXML->load_xml_file("dtrreport2nd-28.jrxml");}

// $PHPJasperXML->xml_dismantle($xml);
$PHPJasperXML->sql ="
SELECT CONCAT(e.lastName,', ',e.firstName,', ',LEFT(e.middleName, 1),'.')  AS fullName,e.supervisor,
d.inAM,
d.outAM,
d.inPM,
d.outPM,
d.otIn,
d.otOut,
DATE_FORMAT(d.Date,'%d')AS DAY,
DATE_FORMAT(d.Date,'%M,%Y')AS month,
(SELECT TIME_FORMAT(ADDTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(late))),SEC_TO_TIME(SUM(TIME_TO_SEC(undertime)))),'%H:%i')FROM DAILYTIMERECORD
WHERE DATE BETWEEN '".$datefrom."' AND '".$dateto."' AND employeeNo = e.employeeNo  GROUP BY DAY) AS totallate,
TIME_FORMAT(ADDTIME(late,undertime),'%H:%i') AS late
FROM bioinfo e INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE e.department = '".$dept."'  AND Date  BETWEEN '".$datefrom."' AND '".$dateto."' AND e.status = 'Active' AND e.employmentStatus = '".$emp_status."' GROUP BY fullName,Date";
// $PHPJasperXML->sql = "CALL spPrintDtr('12345678','2019-10-01','2019-10-31')";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);

$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>