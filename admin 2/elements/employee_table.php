<div class="card card-primary"  style ="margin-top:10px;">
               <div class="card-header">
                <h3 class="card-title">Department</h3>
              </div>
                <div class="card-body">
                    <div class = "row" style="margin-bottom:20px;height:30px;">
                        <div class = "col-12 ">
                          
                <select class="form-control"  name="department" id = "deptId" >
                <?php
             
                     $get_user_sql = "SELECT * FROM department WHERE status = 'Active'";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {?>
                      
                        <option value='<?php echo $result['deptId'];?>'><?php echo  $deptdesc = $result['departmentDescription'];?></option>;
                    <?php }?>
                </select>
            </div>
            
              </div>
                <div class = "row" style= "margin:auto;margin-bottom:20px;margin-top:30px;">
                <select class = "form-control"  id = "emp_status">
                <option val= "Regular">Regular</option>
                <option val= "Job Order">Job Order</option>
                </select>
                </div>     
             <div class = "row">  
                 <div class = "col-12"  >
            <table id = "employees" class = "table table-bordered table-hover" >
            <thead>
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
            
        </div>  