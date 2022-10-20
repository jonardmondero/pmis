<?php 

$month_array  = ['January','February','March','April','May','June','July','August','September','October','November','December'];
$current_month = date("F");

?>



<div class="modal fade" id="leave_credits">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Check Biometric Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12 d-flex justify-content-center">
                            <label style="margin:auto;font-size:30px" id="emp_name" name="emp_name"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Month</label>
                                <select class="form-control" id="month" name="month">
                                    <?php 
                                    foreach($month_array as $value){
                                    ?>
                                    <option <?php if($value == $current_month){
                                       echo 'selected'; }?> value="<?php echo $value?>"><?php echo $value;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Year</label>
                                <select class="form-control">
                                    <?php for($i = 2019; $i < 2050; $i++){?>
                                    <option <?php if($i == date("Y")){
                                                echo 'selected';}?> value="<?php echo $i;?>">
                                        <?php echo $i?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>VL Balance</label>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>SL Balance</label>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>