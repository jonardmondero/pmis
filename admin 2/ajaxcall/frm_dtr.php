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
        $daystyle ;
        $lateStyle;
        $undertimeStyle;
        $result3['Day'] =='Saturday' ||     $result3['Day'] =='Sunday' ?  $daystyle = 'style="color:red;"' :  $daystyle = 'style="color:black;"';
        $result3['latefinal'] != '00:00' ? $lateStyle = 'style="color:red; "' : $lateStyle = 'style="color:black; "'; 
        $result3['undertimefinal'] != '00:00' ? $undertimeStyle = 'style="color:red; "' : $undertimeStyle = 'style="color:black; "';
        $result3['latefinal'] >= '08:00' ? $lateStyle = 'style="color:green;font-weight:bold "' : null; 
        $result3['undertimefinal'] >= '08:00' ? $undertimeStyle = 'style="color:green;font-weight:bold "' :null; 
            // $record = $result3['recordId'];
            // $date = $result3['Date'];
            // $finallate2 = '';
            // $finalut2 = '';
            // $finallate = $result3['latefinal'];
            // if($finallate == '00:00'){
            //     $finallate2 = '';
            // }else{
            //     $finallate2 = $finallate;
            // }
            // $finalut = $result3['undertimefinal'];

            // if($finalut == '00:00'){
            //     $finalut2 = '';
            // }else{
            //     $finalut2 = $finalut;
            // }
            echo '<tr style="height:10px;font-family:Lucida Console;font-size:13px" class = "tr"> ';
            echo '<td bgcolor:red >';
            echo $result3['Date'];
            echo"</td>";

            // echo '<td><button class = "btn btn-success btn-sm btn-flat editdtr"  data-id='.$record.' > <i class = "fa fa-edit"</button> </td>';
              echo '<td '.$daystyle.'>';
            echo $result3['Day'];
            echo"</td>";

            echo '<td contenteditable="true"> ';
            echo $result3['inAM'];
            echo"</td>";

            echo '<td contenteditable="true">';
            echo $result3['outAM'];
            echo"</td>";

            echo '<td contenteditable="true">';
            echo $result3['inPM'];
            echo"</td>";

            echo '<td contenteditable="true">';
            echo $result3['outPM'];
            echo"</td>";

            echo '<td contenteditable="true">';
            echo $result3['otIn'];
            echo"</td>";

            echo '<td contenteditable="true">';
            echo $result3['otOut'];
            echo"</td>";

            echo '<td '.$lateStyle.' contenteditable="true" id= finallate>';
            echo  $result3['latefinal'];
            echo"</td>";

            echo '<td '.$undertimeStyle.'contenteditable="true" id= undertime>';
            echo $result3['undertimefinal'];
            echo"</td>";
            
        echo '<td><button class = "btn btn-warning btn-sm btn-flat addlogs" data-id='.$recordId.' > <i class = "fa fa-search"</button> </td>';
            echo "</tr>";

        }

      
    }
}

?>