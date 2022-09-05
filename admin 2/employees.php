<?php
$titlename = 'Employees';
include_once('reject_user_account.php');
include ('dtrdesign/header.php');
include('../config/config.php');
include('session.php');
$alert_msg='';
include('sql/save_employee.php');
$select_emp = "CALL spGetAllEmployee";
$prep_emp = $con->prepare($select_emp);
$prep_emp->execute();
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
                    <div class="row col-12">
                        <!--  <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employees</h1><br>
              
          </div>-->
                        <div class="col-2">
                            <button class="btn btn-primary" id="addemp" data-toggle="modal"
                                data-target="#addemployee"><i class="fa fa-plus"></i> </button>
                        </div>
                        <div class="form-group has-feedback col-8">
                            <?php echo $alert_msg; ?>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <!-- Small boxes (Stat box) -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 wrapper">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Employees Table</h3>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">
                                            <?php include('elements/tbl_employee.php')?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include('modal/add_employee_modal.php');?>
            <?php include('modal/add_worksched_modal.php');?>
            <?php include('modal/update_supervisor_modal.php');?>

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
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include('dtrdesign/footer.php');?>
    <script src="javascript/employee_script.js"></script>
    <script>
   
    </script>
</body>

</html> 