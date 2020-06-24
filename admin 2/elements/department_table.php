<?php


   $sql = "Select * from department";
   $prep_work= $con->prepare($sql);
   $prep_work->execute();


?>
<div class = "col-12">
 <table id = "department" class = "table table-bordered table-hover" >
            <thead style="font-size:13px" >
            <th> Dept. ID </th>
             <th> Department Name </th>
             <th> Status </th>
             <th> Options </th>
                      </thead>              
                        
                <tbody id = "body"> 
             <?php  while($result = $prep_work->fetch(PDO::FETCH_ASSOC)){?>
                    <tr id = "row" >
                    <td><?php echo $result['deptId']?> </td>
                    <td><?php echo $result['departmentDescription']?> </td>
                    <td><?php echo $result['status']?> </td>
                    <td><button class = "btn btn-danger  btn-sm btn-circle"><i class = "fa fa-edit"></button</td>
                  </tr>
             <?php }?>
           </tbody>
                 
                  
             </table>
         
             </div>