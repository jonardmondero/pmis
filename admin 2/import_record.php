<?php
include('../config/config.php');
include('reject_user_account.php');
include('sql/sqlbackup/backup_sql.php');
$progress = '';
$alert_msg='';
$titlename = 'Import Record';
// include('sql/generate_record.php');
// include('sql/generate_department.php');
include('dtrdesign/header.php');

$st_get_employee = "SELECT CONCAT(firstName,' ', SUBSTRING(middleName,1,1),'.',' ',lastName) as fullName,
 employeeNo as empno, biometricId as biopin from bioinfo where status = 'Active'";
   $result = $con->prepare($st_get_employee);
     $result->execute();
// include('generate_department.php');
$sel_dep = "SELECT * from department where status = 'Active'";
$prep_dep = $con->prepare($sel_dep);
$prep_dep->execute();
$list_desc = '';
$list_depid='';

?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include ('dtrdesign/navbar.php');
        include('dtrdesign/sidebar.php');

        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row md-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Import Biometric Records</h1><br>

                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <!-- Small boxes (Stat box) -->
                    <div class="col-6 " style="margin:auto;">
                        <div class="row">
                            <div style="margin:auto;" class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Input Date</h3>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="post" name="form"
                                            action="<?php htmlspecialchars("PHP_SELF");?>">

                                            <div class="input-group col-12" style="margin-bottom:10px;">


                                                <span class="input-group-text">
                                                    <label style="padding-right:10px;padding-left: 10px">From: </label>
                                                    <div style="padding-right:10px" class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </span>
                                                <input style="margin-right:10px;" type="text" class="form-control"
                                                    style="font-size:13px" autocomplete="off" name="daterange"
                                                    id="dtefrom" value="<?php echo date("m/d/Y");?>">

                                            </div>

                                            <div class="alert alert-info ">

                                                <h5><i class="icon fa fa-info"></i> Notification
                                                </h5>
                                                <label id="import_status">Your importation status will be showed
                                                    here.</label>
                                            </div>






                                    </div>
                                </div>
                            </div>
                            <div style="margin:auto;" class="col-12">
                                <div class="card card-primary card-outline card-tabs">
                                    <div class="card-header p-0 pt-1 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-three-home-tab"
                                                    data-toggle="pill" href="#custom-tabs-three-home" role="tab"
                                                    aria-controls="custom-tabs-three-home"
                                                    aria-selected="true">Department</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-profile-tab"
                                                    data-toggle="pill" href="#custom-tabs-three-profile" role="tab"
                                                    aria-controls="custom-tabs-three-profile"
                                                    aria-selected="false">Employee</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-profile-tab"
                                                    data-toggle="pill" href="#custom-tabs-three-batch" role="tab"
                                                    aria-controls="custom-tabs-three-batch" aria-selected="false">Batch
                                                    Import</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-messages-tab"
                                                    data-toggle="pill" href="#custom-tabs-three-messages" role="tab"
                                                    aria-controls="custom-tabs-three-messages"
                                                    aria-selected="false">Backup</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade active show" id="custom-tabs-three-home"
                                                role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                                <?php include('elements/import_dep_tab.php');?>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-profile-tab">
                                                <?php include('elements/import_emp_tab.php');?>
                                            </div>

                                            <div class="tab-pane fade" id="custom-tabs-three-batch" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-profile-tab">
                                                <?php include('elements/batch_import_tab.php');?>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-messages-tab">
                                                <div class="col-12">


                                                    <input
                                                        style="margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;"
                                                        type="submit" class="btn btn-primary" name="backup_database"
                                                        id="import_dep" value="BACKUP DATABASE">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha
        </div>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <<?php include('dtrdesign/footer.php'); ?> <script language="javascript">

        var datefr = "<?php echo date("m/d/Y");?>";
        var dteto = "<?php echo date("m/d/Y");?>";


        $(document).ready(function() {
        $('.select2').select2();
        $("#select_batch").select2();

        function post_notify(message, type){

        if (type == 'success') {

        $.notify({
        message: message
        },{
        type: 'success',
        delay: 10000
        });

        } else{

        $.notify({
        message: message
        },{
        type: 'danger',
        delay: 2000
        });

        }

        }


        //DATE RANGE
        $('input[name="daterange"]').daterangepicker(
        {
        opens: "left",
        },
        function (start, end, label) {
        datefr = start.format("MM/DD/YYYY");
        dteto = end.format("MM/DD/YYYY");
        console.log(
        "A new date selection was made: " +
        start.format("MM/DD/YYYY") +
        " to " +
        end.format("MM/DD/YYYY")
        );
        }
        );
        //IMPORT INDIVIDUAL EMPLOYEE
        $("#import_individual").on("click",function(){

        event.preventDefault();
        var empno = $('#select_employee').val();
        console.log(empno);
        console.log(datefr);
        console.log(dteto);
        $("#import_individual").prop("disabled",true);
        $('.alert').attr("class","alert alert-danger");
        $("#import_status").html("The system is importing logs. Please wait...");
        $.ajax({
        url: "sql/generate_record.php",
        type: "POST",
        data: {
        sel_employee: empno,
        datefrom: datefr,
        dateto: dteto,
        },
        error: function (xhr, b, c) {
        console.log(
        "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
        );
        },
        }).done(function (e) {
        $("#import_individual").prop("disabled",false);
        $("#import_status").html(e);
        $('.alert').attr("class","alert alert-success");
        });
        // IMPORT BATCH OF DEPARTMENTS
        });
        $("#select_batch").on("change",function(){

        var deptCode = $("#select_batch").val();
        var deptName = $( "#select_batch option:selected" ).text();
        var table = document.getElementById("tblBatchImport");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = deptCode;
        cell2.innerHTML = deptName;
        cell3.innerHTML = datefr;
        cell4.innerHTML = dteto;
        cell5.innerHTML =
        '<button id="remove" class="btn btn-circle btn-sm btn-primary" onclick="deleteRow(this)">Remove</button>';

        });

        //IMPORT THE DEPARTMENT
        $("#import_dep").on("click",function(){

        event.preventDefault();
        var dept = $('#selectdep').val();
        console.log(dept);
        console.log(datefr);
        console.log(dteto);
        $('.alert').attr("class","alert alert-danger");
        $("#import_dep").prop("disabled",true);
        $("#import_status").html("The system is importing logs. Please wait...");
        $.ajax({
        url: "sql/generate_department.php",
        type: "POST",
        data: {
        selectdep: dept,
        datefrom: datefr,
        dateto: dteto,
        },
        error: function (xhr, b, c) {
        console.log(
        "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
        );
        },
        }).done(function (e) {

        $("#import_dep").prop("disabled",false);
        $("#import_status").html(e);
        $('.alert').attr("class","alert alert-success");


        });
        });


// GENERATE THE BATCH OF OFFICES
        $("#import_dep_batch").on("click",function(){

        event.preventDefault();
      
        $('.alert').attr("class","alert alert-danger");
        $("#import_dep_batch").prop("disabled",true);

        $('#tblBatchImport tr').each(function(row, tr) {

         console.log(dept);
        console.log(datefr);
        console.log(dteto);

        var dept = $(tr).find('td:eq(0)').text();
        var datefr = $(tr).find('td:eq(2)').text();
        var dteto = $(tr).find('td:eq(3)').text();

        $.ajax({
        url: "sql/generate_batch.php",
        type: "POST",
        data: {
        selectdep: dept,
        datefrom: datefr,
        dateto: dteto
        },
        error: function (xhr, b, c) {
        console.log(
        "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
        );
        },
        }).done(function(e){
            $("#import_dep_batch").prop("disabled",false);
        $("#import_status").html("You have successfully imported the offices");
        $('.alert').attr("class","alert alert-success");
        });

        })
        });

     

        });




        function deleteRow(r) {
        // DELETE SELECTED ROW
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tblBatchImport").deleteRow(i);
        }



        </script>





</body>

</html>