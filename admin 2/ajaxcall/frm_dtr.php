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
        $result3['Day'] =='Saturday' ||     $result3['Day'] =='Sunday' ?  $daystyle = 'style="color:red;"' :  $daystyle = 'style="color:black;"';
        $result3['latefinal'] != '00:00' ? $lateStyle = 'style="color:red; "' : $lateStyle = 'style="color:black; "'; 
        $result3['undertimefinal'] != '00:00' ? $undertimeStyle = 'style="color:red; "' : $undertimeStyle = 'style="color:black; "';
        $result3['latefinal'] >= '08:00' ? $lateStyle = 'style="color:green;font-weight:bold "' : null; 
        $result3['undertimefinal'] >= '08:00' ? $undertimeStyle = 'style="color:green;font-weight:bold "' :null; 

            echo '<tr  class = "tr"> ';
            echo '<td class = "border border-dark col-1" >';
            echo $result3['Date'];
            echo"</td>";

            echo '<td '.$daystyle.' class = "border border-dark col-1">';
            echo $result3['Day'];
            echo"</td>";

            echo '<td contenteditable="true" class = "border border-dark"> ';
            echo $result3['inAM'];
            echo"</td>";

            echo '<td contenteditable="true" class = "border border-dark">';
            echo $result3['outAM'];
            echo"</td>";

            echo '<td contenteditable="true" class = "border border-dark">';
            echo $result3['inPM'];
            echo"</td>";

            echo '<td contenteditable="true" class = "border border-dark">';
            echo $result3['outPM'];
            echo"</td>";

            echo '<td contenteditable="true" class = "border border-dark">';
            echo $result3['otIn'];
            echo"</td>";

            echo '<td contenteditable="true" class = "border border-dark">';
            echo $result3['otOut'];
            echo"</td>";

            echo '<td '.$lateStyle.' contenteditable="true" class = "border border-dark" id= finallate>';
            echo  $result3['latefinal'];
            echo"</td>";

            echo '<td '.$undertimeStyle.'contenteditable="true" class = "border border-dark" id= undertime>';
            echo $result3['undertimefinal'];
            echo"</td>";
            
            echo '<td><button class = "btn btn-warning btn-sm btn-flat addlogs" data-id='.$recordId.' > <i class = "fa fa-search"</button> </td>';
            echo "</tr>";

        }

      
    }
}

?>