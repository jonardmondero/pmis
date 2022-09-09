<?php
include('../config/config.php');
include ('../config/msconfig.php');
include('reject_user_account.php');
include('sql/sqlbackup/backup_sql.php');
$progress = '';
$alert_msg='';
$titlename = 'Import Record';
include('sql/generate_record.php');
include('sql/generate_department.php');
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
                    <div class="col-6 " style = "margin:auto;">
                        <div class="row">
                            <div style="margin:auto;" class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Input Date</h3>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="post" name="form"
                                            action="<?php htmlspecialchars("PHP_SELF");?>">

                                            <div class="col-8" style="margin:auto;margin-top:10px">
                                                <div style="margin-bottom:10px" class="input-group date">
                                                    <label>Date From:</label>
                                                    <div style="padding-right:5px;" class="input-group-addon">

                                                    </div>
                                                    <input type="date" autocomplete="off"
                                                        class="form-control pull-right custom_field" name="datefrom"
                                                        id="iddatefrom">
                                                </div>
                                            </div>
                                            <div class="col-8" style="margin:auto;">
                                                <div style="margin-bottom:10px;" class="input-group date">
                                                    <label style="margin-right:5px">Date To:</label>
                                                    <div class="input-group-addon">

                                                    </div>
                                                    <input style="margin-left:25px;" type="date" autocomplete="off"
                                                        class="form-control pull-right" name="dateto" id="iddateto">
                                                </div>
                                            </div>

                                           
                                           
                                            <div class="row">




                                                <div class="col-12">
                                                    <?php echo $alert_msg;?>
                                                </div>
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
                                                aria-controls="custom-tabs-three-home" aria-selected="true">Department</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-three-profile" role="tab"
                                                aria-controls="custom-tabs-three-profile"
                                                aria-selected="false">Employee</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-three-messages" role="tab"
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


        $(document).ready(function() {
        $('.select2').select2();


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
        });
        </script>




</body>

</html>