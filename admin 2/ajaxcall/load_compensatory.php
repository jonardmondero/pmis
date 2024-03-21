<?php 
if(isset($_POST['empno'])){
    include('../../config/config.php');
   $employeeno = $_POST['empno'];
   $status = $_POST['status'];
   $sql = "SELECT * FROM compensatory where employeeNo = :empno and status = :status";
   $stmt = $con->prepare($sql);
   $stmt ->execute(['empno' =>$employeeno,
                    'status' => $status]);
   
   while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
     $date = date_create($result['dateClaimed']);
     $date_value = "";
     if(!empty($result['dateClaimed'])){
      $date_value =  "value = ".date_format($date, "Y-m-d");
     }
         echo "<tr>
       <td>
          ".$result['entryno']."
          </td>
          <td>
          ".$result['dateRendered']."
          </td>
          <td>
          ".$result['inAM']."
          </td>
          <td>
          ".$result['outAM']."
          </td>
          <td>
          ".$result['inPM']."
          </td>
         <td>
         ".$result['outPM']."
          </td>
          <td>
         ".$result['otIn']."
          </td>
          <td>
         ".$result['otOut']."
          </td>
          <td>
          ".$result['status']."
           </td>

           <td>
     
         <input type = 'date' class = ' text-sm w-75' ".$date_value." id = 'date_claim'> 
          
          </td>
          <td>
          
         <button class = 'btn btn-primary btn-sm btn-circle'  id = 'upload_compen'> <i class = 'fa fa-upload'></i></button>
         <button class = 'btn btn-danger btn-sm btn-circle'  id = 'remove_compen'> <i class = 'fa fa-trash'></i></button>
        
          </td>
         </tr>";

   }
   
   
}

