<?php include ('../config/config.php');

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
            $record = $result3['recordId'];
            $date = $result3['Date'];
            echo '<tr style="height:10px" class = "tr"> ';
            echo '<td>';
            echo $result3['Date'];
            echo"</td>";

            // echo '<td><button class = "btn btn-success btn-sm btn-flat editdtr"  data-id='.$record.' > <i class = "fa fa-edit"</button> </td>';
              echo '<td>';
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

            echo '<td contenteditable="true">';
            echo $result3['latefinal'];
            echo"</td>";

            echo '<td contenteditable="true">';
            echo $result3['undertimefinal'];
            echo"</td>";
            
        echo '<td><button class = "btn btn-warning btn-sm btn-flat addlogs" data-id='.$recordId.' > <i class = "fa fa-search"</button> </td>';
            echo "</tr>";

        }

      
    }
}

?>