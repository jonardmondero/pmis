<?php include ('../../config/config.php');

if(isset($_POST['employeeno'])) {
    $empno=$_POST['employeeno'];
    $dteFrom=date('Y-m-d', strtotime($_POST['dtfr']));
    $dteTo=date('Y-m-d', strtotime($_POST['dtto']));
    $get_time="CALL spShowDTR(:empno,:dtefr,:dteto)";
    $user_data3=$con->prepare($get_time);
    $user_data3->execute([ ':empno'=>$empno,
        ':dtefr'=> $dteFrom,
        'dteto'=> $dteTo]);

    while ($result3=$user_data3->fetch(PDO::FETCH_ASSOC)) {
        if($result3==0) {
           
        }
            
     
    else {
       
        $daystyle;
        $lateStyle;
        $undertimeStyle;
        $result3['DAY'] =='Saturday' ||     $result3['DAY'] =='Sunday' ?  $daystyle = 'style="color:red;"' :  $daystyle = 'style="color:black;"';
        $result3['latefinal'] != '00:00' ? $lateStyle = 'color:red; ' : $lateStyle = 'color:black; '; 
        $result3['undertimefinal'] != '00:00' ? $undertimeStyle = 'color:red; ' : $undertimeStyle = 'color:black;';
        $result3['latefinal'] >= '08:00' ? $lateStyle = 'color:green;font-weight:bold ' : null; 
        $result3['undertimefinal'] >= '08:00' ? $undertimeStyle = 'color:green;font-weight:bold ' :null; 

            echo '<tr  class = "tr"> ';
            echo '<td class = "border border-dark col-1" >';
            echo $result3['Date'];
            echo"</td>";

            echo '<td '.$daystyle.' class = "border border-dark col-1">';
            echo $result3['DAY'];
            echo"</td>";

            echo '<td  >';
            echo '<input type ="text" onchange="updateInAm(this.value);" id = "inam" class = " border border-dark" style ="height:30px; width:100px;" value="'.$result3['inAM'].'" >';
            echo"</td>";

            echo '<td >';
            echo '<input type ="text" onchange="updateOutAm(this.value)"  class = " border border-dark" style ="height:30px; width:100px;" value="'.$result3['outAM'].'" >';
            echo"</td>";

            echo '<td >';
            echo '<input type ="text" onchange="updateInPm(this.value)" class = "border border-dark" style ="height:30px; width:100px;" value="'.$result3['inPM'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" onchange="updateOutPm(this.value)" class = "border border-dark" style ="height:30px; width:100px;" value="'.$result3['outPM'].'" >';
            echo"</td>";

            echo '<td >';
            echo '<input type ="text" onchange="updateOtIn(this.value)" class = "border border-dark" style ="height:30px; width:100px;" value="'.$result3['otIn'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" onchange="updateOtOut(this.value)" class = "border border-dark" style ="height:30px; width:100px;" value="'.$result3['otOut'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" onchange="updateLate(this.value)" class = "border border-dark" style ="height:30px; width:70px;'.$lateStyle.'"  value="'.$result3['latefinal'].'" >';
            echo"</td>";

            echo '<td>';
            echo '<input type ="text" onchange="updateUndertime(this.value)" class = "border border-dark" style ="height:30px; width:70px;'.$undertimeStyle.'"  value="'.$result3['undertimefinal'].'" >';
            echo"</td>";
            
           include('../elements/dtr_options.php');

            echo "</tr>";

        }

      
    }
}

?>