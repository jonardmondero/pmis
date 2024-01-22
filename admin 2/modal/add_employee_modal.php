<?php 

include('./components/textfields.php');
include('../config/config.php');
$get_user_sql = "SELECT * FROM department WHERE status = 'Active'";
$user_data = $con->prepare($get_user_sql);  
$user_data->execute();
$get_schedule = $con->prepare("SELECT * FROM workschedule WHERE Status ='Active'");
$get_schedule->execute();
?>

<div   class="modal fade " id="addemployee">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header bg-dark ">
                <h4 class="modal-title ">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" id = "addEmployeeForm" action="<?php htmlspecialchars("PHP_SELF");?>"
                    id="employee-form">
                    <div class="row">
                    <div class="col-6 p-1">
                        <div class="card">
                            <div class="card">
                                <div class="card-header bg-warning text-center">
                                <h5 class="card-title text-bold font-weight-bold">BASIC INFORMATION</h5>
                                </div>
                              
                            </div>
                            
                            <div class="card-body">
                                
                       
                    <?php textField('Employee No','checkempid','empnum');
                      textField('Last Name','lname','lname');  
                      textField('First Name','fname','fname');
                      textField('Middle Name','mname','mname');   
                      textField('Biometric I.D.','checkbioid','bioid'); ?>
                    </div>
                    </div>
                        </div>
                    <div class="col-6 p-1 ">
                        <div class="card">
                            <div class="card-header bg-primary text-center">
                                <div class="card-title">
                                    <h5>OTHER INFORMATION</h5>
                                </div>
                            </div>
                            <div class="card-body">

                         
                        <div class="form-group ">
                            <label class="col-form-label "  > Department </label>
                            <select class="form-control select2 h-25"  style = "width:100%;font-size:8px"name="department"
                                id="department">
                                <option value="Select Department" selected> Select Department... </option>
                                <?php
           
                   
                        while ($result2 = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result2['deptId'];
                        $deptdesc = $result2['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Has Work Schedule ? </label>
                            <select class="form-control" name="worksched" id="worksched">
                                <option val="Yes">Yes</option>
                                <option val="No">No </option>
                            </select>
                        </div>
                        <div class="form-group ">
                        <label class="col-form-label" >Schedule </label>
                        <select class="form-control select2  " style="width:100%;font-size:8px" name="emp_sched"
                            id="emp_sched">
                            <?php 
                           
                        while($get_sched_result = $get_schedule->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <option

                            <?php if ($get_sched_result['workScheduleId'] == 'CS'){
                                echo "selected";
                            } ?>

                            value="<?php echo $get_sched_result['workScheduleId'];?>">
                                <?php echo $get_sched_result['workScheduleDescription'];?></option>
                            <?php }?>
                        </select>

                        </div>
                        <div class="form-group ">
                            <label class="col-form-label "> Employment Status </label>
                            <select class="form-control " name="estatus" id="estatus">
                                <option val="Regular">Regular</option>
                                <option val="Job Order">Job Order </option>
                            </select>
                        </div>
                        <?php textField(' Supervisor','supervisor','supervisor');?>


                        <div class="form-group ">
                            <label class="col-form-label ">Status </label>
                            <select class="form-control " name="status" id="status">
                                <option val="Active">Active</option>
                                <option val="Not Active">Not Active </option>
                            </select>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer float-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete" id="delete" class="btn btn-danger">Delete</button>
                        <button type="submit" name="save" id="insert" class="btn btn-primary">Save</button>
                        <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
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
    margin-right: 10px;
}
.form-group-margin{
    margin-bottom: 0px;
    margin-top:0px;
}
</style>