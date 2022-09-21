<?php

include ('../config/config.php');
$curdate = date("m/d/Y");
include('session.php');
$titlename = 'Application for Leave';
include ('dtrdesign/header.php');


$curdate = date("m/d/Y");      
$getLeaveType = "CALL spGetLeaveType()";
$prep_leave_type = $con->prepare($getLeaveType);
$prep_leave_type->execute();
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');

  

   ?>




        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid ">
                    <div class=" row ">
                        <div class=" col-12">
                            <div class="justify-content-center">
                                <h1 class="m-0 text-dark ">Application for Leave</h1><br>
                            </div>
                        </div>
                    </div>
                    <div class=" row ">
                        <div class="col-4">


                            <div class="col-12 ">
                                <div class="card card-info">
                                    <div class="wrapper">
                                        <div class="card-header">
                                            <h3 class="card-title">Search Employee</h3>
                                        </div>

                                        <?php include("elements/search_employee.php");?>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-8">

                            <div class="col-12 no-gutters">
                                <div class="card card-primary" style="width:100%">
                                    <div class="card-header">
                                        <h3 class="card-title">Details</h3>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-3"></div>
                                            <div class="col-6" style="background-color:white-grey;">
                                                <input type="text" id="leaveempno" readonly hidden>
                                                <div class="card full_name">
                                                    <h4 id="fullname"> </h4>
                                                </div>
                                            </div>
                                            <div class="col-3"></div>
                                            <div class="row col-12">

                                                <div class="input-group date p-2">
                                                    <span class="input-group-text"> <label
                                                            style="padding-right:10px;padding-left: 10px">From:
                                                        </label>
                                                        <div style="padding-right:10px" class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </span>



                                                    <input style="margin-right:10px;" type="text"
                                                        data-provide="datepicker" class="form-control col-4 "
                                                        style="font-size:13px" autocomplete="off" name="datefrom"
                                                        id="dtefrom" val="<?php echo $curdate; ?> ">

                                                    <span class="input-group-text">
                                                        <label style="padding-right:10px">To:</label>
                                                        <div style="padding-right:10px" class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </span>

                                                    <input type="text" class="form-control col-4 "
                                                        data-provide="datepicker" autocomplete="off" name="dateto"
                                                        id="dteto" val="<?php echo $curdate; ?> ">

                                                    <div style="margin-left:20px">
                                                        <button style="margin:auto;" type="submit" name="addleave"
                                                            id="addleave" class=" btn btn-warning"><i
                                                                class="fa fa-plus"></i></button>



                                                        <label>Specific Date:</label>
                                                        <button type="submit" name="specificdate" id="specificdate"
                                                            class=" btn btn-primary"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>






                                            </div>

                                            <div class="row col-12">

                                                <div class="col-8">
                                                    <div class="form-group ">
                                                        <label>Leave Type</label>
                                                        <select class="form-control select2 " id="leavetype"
                                                            name="leavetype" required>
                                                            <option selected="selected">Select Leave</option>
                                                            <?php while ($get_result = $prep_leave_type->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo $get_result['Category']; ?>">
                                                                <?php echo $get_result['LeaveTypeDescription']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Inclusive Date</label>
                                                        <select class="form-control select2 " id="inclusivedate"
                                                            style="width: 100%;" name="inclusivedate" required>
                                                            <option selected="selected">Whole Day</option>
                                                            <option>Morning</option>
                                                            <option>Afternoon</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <!--
                                          
-->
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Leave Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="margin:auto;">

                                            <table class="table table-hover table-bordered "
                                                style="margin:auto;width:100%;margin-top:20px;" id="leavelist">
                                                <thead style="margin:auto;width:100%;">
                                                    <th>Leave Name</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Inclusive Date</th>
                                                    <th>Remove</th>
                                                </thead>

                                            </table>
                                        </div>

                                        <div class="row" style="margin:auto;padding-top:30px;padding-bottom:30px;">



                                            <button type="submit" name="save_leave" id="save_leave"
                                                class=" custom_button btn btn-primary"><i
                                                    class="fa fa-save"></i></button>


                                        </div>
                                        <div class="row">
                                            <label id="save_notification"
                                                style="text-align:center;margin:auto;"></label>
                                        </div>

                                    </div>



                                </div>
                            </div>

                        </div>






                        <!-- /.content-wrapper -->
            </section>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha

    </footer>


    <?php include('dtrdesign/footer.php') ?>
    <script src="javascript/add_leave.js"></script>

</body>

</html>