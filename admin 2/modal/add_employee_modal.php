<?php 

include('./components/textfields.php');
?>

<div class="modal fade" id="addemployee">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php htmlspecialchars("PHP_SELF");?>"
                    id="employee-form">

                    <div class="col-12">
                        <?php textField('Emp No:','checkempid','empnum');
                      textField('Last Name:','lname','lname');  
                      textField('First Name:','fname','fname');
                      textField('Mdle Name:','mname','mname');   
                      textField('Bio I.D.:','bioid','bioid'); ?>

                        <div class="form-group row">
                            <label class="col-form-label" style="margin-right:70px;margin-left:5px;"> Dept: </label>
                            <select class="form-control select2 col-5" style="width:75%;height:50px;" name="department"
                                id="department">
                                <option value="Select Department" selected> Select Department </option>
                                <?php
                     include('../config/config.php');
                     $get_user_sql = "SELECT * FROM department WHERE status = 'Active'";
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

                        <div class="form-group row">
                            <label class="col-form-label col-5"> Employment Status: </label>
                            <select class="form-control col-7" name="estatus" id="estatus">
                                <option val="Regular">Regular</option>
                                <option val="Job Order">Job Order </option>
                            </select>
                        </div>
                        <?php textField(' Supervisor:','supervisor','supervisor');?>
                        <div class="form-group row">
                            <label class="col-form-label col-5">Has Work Schedule? </label>
                            <select class="form-control col-7" name="worksched" id="worksched">
                                <option val="Yes">Yes</option>
                                <option val="No">No </option>
                            </select>
                        </div>



                        <div class="form-group row">
                            <label class="col-form-label col-5">Status: </label>
                            <select class="form-control col-7" name="status" id="status">
                                <option val="Active">Active</option>
                                <option val="Not Active">Not Active </option>
                            </select>
                        </div>





                    </div>
                    <div class="modal-footer justify-content-between">
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
</style>