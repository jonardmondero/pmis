<?php
include('../config/config.php');
include ('../config/msconfig.php');

$alert_msg='';
include('generate_record.php');
include('generate_department.php');
include('dtrdesign/header.php');

$st_get_employee = "SELECT CONCAT(firstName,' ', SUBSTRING(middleName,1,1),'.',' ',lastName) as fullName, employeeNo as empno, biometricId as biopin from bioinfo ";
   $result = $con->prepare($st_get_employee);
     $result->execute();
// include('generate_department.php');
$sel_dep = "SELECT * from department";
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
       <div class="col-12">
        <div class = "row">
          <div style="margin:auto;"class ="col-6">
          <div class="card card-warning">
               <div class="card-header">
                <h3 class="card-title">Import Details</h3>
              </div>

              <form   role="form" method="post" name="form" action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class = "col-12">
                  <?php echo $alert_msg;?>
                </div>
                  <div class = "col-8" style="margin:auto;">
              <div style ="margin-bottom:10px"class="input-group date">
                 <label>Date From:</label>
               <div style = "padding-right:5px;"class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                <input type="date"   autocomplete="off" class="form-control pull-right" name="datefrom" id="iddatefrom">
                 </div>
               </div> 
               <div class = "col-8" style="margin:auto;">
                     <div style ="margin-bottom:10px;"class="input-group date">
                  <label style="margin-right:5px">Date To:</label>
                  <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                     </div>
      <input style = "margin-left:25px;"type="date"  autocomplete="off" class="form-control pull-right" name="dateto" id="iddateto">
                 </div>
              </div>
             
            <div class = "col-12">
              <div class="form-group">
             <label> Search Employee:</label>
         <select class="form-control select2" id="select_employee" style="width: 100%;"  name="sel_employee">
                           <option selected="selected"></option>

                               <?php 
                        while ($employee = $result->fetch(PDO::FETCH_ASSOC)) { 
                       
                        $employeefn = $employee['fullName'];
                
                        echo "<option  value = ".$employee['empno'].">" .$employeefn. "</option>";
                         } ?>
                                           
                               </select>
                           </div>    
                       
                    </div>
      <div class = "col-12">

     <input style = "margin:auto; width:100%;"type="submit" class="btn btn-primary" name="import" value="GENERATE EMPLOYEE"> 
</div>
     <div class = "col-12">
      <div class ="form-group">
        <label> Select Department: </label>
        <!--  $list_desc = $get_result['departmentDescription'];
          $list_deptid= $get_result['depId']; -->
        <select class = "form-control" name = "selectdep" id ="selectdep">
          <option value =""></option>
          <?php
          while($get_result = $prep_dep->fetch(PDO::FETCH_ASSOC)){
            $list_depid = $get_result['deptId'];
            $list_desc = $get_result['departmentDescription'];

          echo '<option value ="'.$list_depid.'">'.$list_desc.'</option>';
          }
          ?>
        </select>
      </div>
    </div>
      <div class = "col-12">
       <input style = "margin:auto; width:100%;margin-bottom:10px;"type="submit" class="btn btn-primary" name="import_dep" id = "import_dep" value="GENERATE DEPARTMENT"> 
      </div>
 
        
             
              </form>
           </div>
         </div>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../adminlte2/bower_components/select2/dist/js/select2.full.min.js"></script>
  
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script>
      $(function () {
           $("#employees").DataTable();
//    $('#users').DataTable({
//      "paging": true,
//      "lengthChange": false,
//      "searching": false,
//      "ordering": true,
//      "info": true,
//      "autoWidth": false
//    });
  });
 // function getemployee() {

 //            var employee_list = document.getElementById("select_employee").value;
 //            $('#employeenum').val(employee_list);
 //        }

        $(document).ready(function() {

            // $(document).ajaxStart(function() {
            //     Pace.restart()
            // })

            //select 2
            $('.select2').select2();


        });
  // $('#import_dep').click(function(){
  //   event.preventDefault();
  //   var department = $('#selectdep').val();
  //   var dtefrom = $('#iddatefrom').val();
  //   var dteto = $('#iddateto').val();
    
  //   $.ajax({
  //     url:'generate_department.php',
  //     type:"post",
  //     data:{deptId:department,
  //           datefrom:dtefrom,
  //           dteto:iddateto
  //     },
  //     success:post_notify("Successfully Generated","success"),
  //     error: function (xhr, b, c) {
  //      console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
  //        }

  //   })

  // })

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
    </script>
</body>
</html>
