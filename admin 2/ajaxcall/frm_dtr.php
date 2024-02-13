<?php 
include_once('../../config/config.php');
 function colorStyle($value){
    $style ;
    switch ($value) {
            case 'SL':
            $style = 'color:red;font-weight:bold';
            break;
            case 'VL':
            $style = 'color:blue;font-weight:bold';
            break;
            case 'SLP':
            $style= 'color:orange;font-weight:bold';
            break;
            case 'FW':
            $style= 'color:#9b870c;font-weight:bold';
            break;
            case 'TOB':
            $style= 'color:green;font-weight:bold';
            break;
            case 'OT':
            $style= 'color:#ff6347;font-weight:bold';
            break;
            case 'ABS':
            $style= 'color:red;font-weight:bold';
            break;
            case 'ENT':
            $style= 'color:red;font-weight:bold';
            break;
            case 'SPL':
            $style= 'color:orange;font-weight:bold';
            break;
        default:
        $style= 'color:black';
            break;
    }
    return $style;
}

if(isset($_POST['employeeno'])) {
    $empno=$_POST['employeeno'];
    $dteFrom=date('Y-m-d', strtotime($_POST['dtfr']));
    $dteTo=date('Y-m-d', strtotime($_POST['dtto']));
    $date1=date_create($dteFrom);
    $date2=date_create($dteTo);
    $diff=date_diff( $date1,$date2);
    $get_time="CALL spShowDTR(:empno,:dtefr,:dteto,:limit)";
    $user_data3=$con->prepare($get_time);
    $user_data3->execute([ ':empno'=>$empno,
        ':dtefr'=> $dteFrom,
        'dteto'=> $dteTo,
        ':limit'=>$diff->format("%a") + 1
    ]);

    while ($result3=$user_data3->fetch(PDO::FETCH_ASSOC)) {
        if($result3==0) {

        }
            
     
    else {
       
        $daystyle;
        $lateStyle;
        $textStyle;
        $undertimeStyle;
        $result3['DAY'] =='Saturday' ||     $result3['DAY'] =='Sunday' ?  $daystyle = 'style="color:red;"' :  $daystyle = 'style="color:black;"';
        $result3['latefinal'] != '00:00' ? $lateStyle = 'color:red; background-color:#ffcccc; ' : $lateStyle = 'color:black; background-color:#ffffff;'; 
        $result3['undertimefinal'] != '00:00' ? $undertimeStyle = 'color:red; background-color:#ffcccc;' : $undertimeStyle = 'color:black;background-color:#ffffff;';
        $result3['latefinal'] >= '08:00' ? $lateStyle = 'color:green;font-weight:bold ' : null; 
        $result3['undertimefinal'] >= '08:00' ? $undertimeStyle = 'color:green;font-weight:bold ' :null; 

        $result3['inAM'] == ""  ||  $result3['outAM'] == "" || $result3['inPM'] == "" ||  $result3['outPM'] == "" ? $cellStyle1 = 'background-color:#66cdaa;' : $cellStyle1 = 'background-color:#ffffff;';
        // $result3['outAM'] == "" ? $cellStyle2 = 'style="background-color:#ffcccc;"' : $cellStyle2 = 'style="background-color:#ffffff;"';
        // $result3['inPM'] == "" ? $cellStyle3 = 'style="background-color:#ffcccc;"' : $cellStyle3 = 'style="background-color:#ffffff;"';
        // $result3['outPM'] == "" ? $cellStyle4 = 'style="background-color:#ffcccc;"' : $cellStyle4 = 'style="background-color:#ffffff;"';
        // $latefinal = "";
        // $undertimefinal ="";
        // $result3['latefinal'] == "00:00" ? $latefinal = "" : $latefinal = $result3['latefinal'];
        // $result3['undertimefinal'] == "00:00" ? $undertimefinal = "" : $undertimefinal = $result3['undertimefinal'];
            echo '<tr  class = "tr"> ';
            echo '<td class = "border border-dark  m-auto p-1" >';
          
            echo $result3['Date'];
           
            echo"</td>";

            echo '<td '.$daystyle.' class = "border border-dark m-auto p-1">';
            echo $result3['DAY'];
            echo"</td>";

            echo '<td  >';
            echo '<input type ="text" 
            class = "text_align border border-dark dtr-input-size" style="'.$cellStyle1.colorStyle($result3['inAM']).'" ondragstart="drag(event)"  ondrop="drop(event)" ondragover="allowDrop(event)" onchange="updateInAm(this.value);"
            onfocus="this.select()"
            value="'.$result3['inAM'].'" >';
            echo"</td>";

            echo '<td >';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size " style="'.$cellStyle1.colorStyle($result3['outAM']).'" onchange="updateOutAm(this.value)" onfocus="this.select()"  value="'.$result3['outAM'].'" >';
            echo"</td>";

            echo '<td >';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size" style="'.$cellStyle1.colorStyle($result3['inPM']).'" onchange="updateInPm(this.value)" onfocus="this.select()"  value="'.$result3['inPM'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size" style="'.$cellStyle1.colorStyle($result3['outPM']).'" onchange="updateOutPm(this.value)" onfocus="this.select()"  value="'.$result3['outPM'].'" >';
            echo"</td>";

            echo '<td >';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size" onchange="updateOtIn(this.value)"  onfocus="this.select()"   value="'.$result3['otIn'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size" onchange="updateOtOut(this.value)" onfocus="this.select()"   value="'.$result3['otOut'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size-sm" onchange="updateLate(this.value)" onfocus="this.select()" class = "" style ="'.$lateStyle.'"  value="'. $result3['latefinal'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" class = "text_align border border-dark dtr-input-size-sm" onchange="updateUndertime(this.value)"  onfocus="this.select()" style ="'.$undertimeStyle.'"  value="'.$result3['undertimefinal'].'" >';
            echo"</td>";
            
           include('../elements/dtr_options.php');

            echo "</tr>";

        }

      
    }
}
    

?>