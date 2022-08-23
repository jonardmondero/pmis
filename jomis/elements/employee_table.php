<div class="card_employee card-primary"  style ="margin-top:10px;">
               <div class="card-header">
                <h3 class="card-title capitalize" >Department</h3>
              </div>
                <div class="card-body">
                    <div class = "row" style="margin-bottom:20px;height:30px;">
                        <div class = "col-12 ">
                          
                <select class="form-control select2"  name="department" id = "deptId" >
                <?php
             
                     $get_user_sql = "SELECT * FROM department ";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {?>
                      
                        <option value='<?php echo $result['department'];?>'><?php echo  $deptdesc = $result['department'];?></option>;
                    <?php }?>
                </select>
            </div>
            
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