

 <div class="modal fade" id="addemployee">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
               <form class="form-horizontal" method = "post" action = "<?php htmlspecialchars("PHP_SELF");?>" id = "employee-form">
              
                <div class ="col-12">
                <div class = "form-group row">
                 <label class = " col-form-label col-3"> Employee No:  </label>
                 <input type = "text" class = "form-control col-9 " required id = "empnum" name = "empnum">
                 <label id = "checkempid" style = "margin-left:115px;padding-top:5px;font-size:13px;color:red;font:Arial;"></label>
                </div>
                  <div class = "form-group row">
                 <label class = " col-form-label col-3"> Last Name: </label>
                 <input type = "text" class = "form-control col-9" required id = "lname" name = "lname">
                </div>
                  <div class = "form-group row">
                 <label class = "col-form-label col-3">First Name:  </label>
                 <input type = "text" class = "form-control col-9" required id = "fname" name = "fname">
                </div>
                  <div class = "form-group row">
                 <label class = "col-form-label col-3"> Middle Name:  </label>
                 <input type = "text" class = "form-control col-9" required  id = "mname" name = "mname">
                </div>
                  <div class = "form-group row">
                 <label class = "col-form-label col-4"> Biometric I.D.:  </label>
                 <input type = "text" class = "form-control col-8" required  id = "bioid" name = "bioid">
                   <label id = "checkbioid" style = "margin-left:115px;padding-top:5px;font-size:13px;color:red;font:Arial;"></label>
               </div>
                <div class = "form-group row">
                 <label class = "col-form-label col-3"> Department:  </label>
                <select class ="form-control col-9" name = "department" id ="department">
                 <?php
                     include('../config/config.php');
                     $get_user_sql = "SELECT * FROM department";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result2 = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result2['deptId'];
                        $deptdesc = $result2['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                </select>
                </div>
                
               <div class = "form-group row">
                 <label class = "col-form-label col-5"> Employment Status:  </label>
                <select class ="form-control col-7" name = "estatus" id ="estatus">
                  <option val = "Regular">Regular</option>
                  <option val ="Job Order">Job Order </option>
                </select>
                </div>
                 <div class = "form-group row">
                 <label class = "col-form-label col-3"> Supervisor:  </label>
                 <input type = "text" class = "form-control col-9" id = "supervisor" name = "supervisor">
                </div>
                <div class = "form-group row">
                 <label class = "col-form-label col-5">Status:  </label>
                <select class ="form-control col-7" name = "status" id ="status">
                  <option val = "Active">Active</option>
                  <option val = "Not Active">Not Active </option>
                </select>
                </div>
               
         
        
        
          
          </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit"   name = "submit" id = "save" class="btn btn-primary">Save</button>
            </div>
             </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <style>
        .label {
          margin-right:10px;
        }
      </style>