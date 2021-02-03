<div class="card card-primary" >
               <div class="card-header">
                <h3 class="card-title">Department</h3>
              </div>
                <form role="form" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class="card-body">
                    <div class = "row">
                        <div class = "col-12">
                            <div class = "input-group">
                <select class="form-control select2" style="margin-bottom:20px" name="department" id = "deptId" placeholder="Select" value="<?php echo $department; ?>">
                <?php
             
                     $get_user_sql = "SELECT * FROM department WHERE status = 'Active'";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result['deptId'];
                        $deptdesc = $result['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                </select>
            </div>
             </div>
              </div>
                    
             <div class = "row">  
                 <div class = "col-12"  style="overflow-y:auto;height: 500px;">
            <table id = "employees" class = "table table-bordered table-hover" >
            <thead style="font-size:13px" >
            <th> Employee No. </th>
                <th> Full Name </th>
                      </thead>              
                        
                <tbody id = "body"> 
                    <tr id = "row" >              
                  </tr>
       
           </tbody>
                 
                  
             </table>
              </div>
                 </div>   

                     </div>
                </form>
        </div>  