<?php
include('../config/config.php');
include ('../config/msconfig.php');
$progress = '';
$alert_msg='';
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
       <div class="col-12">
        <div class = "row">
          <div style="margin:auto;"class ="col-6">
          <div class="card card-warning">
               <div class="card-header">
                <h3 class="card-title">Import Details</h3>
              </div>
            <div class ="card-body">
              <form   role="form" method="post" name="form" action="<?php htmlspecialchars("PHP_SELF");?>">
               
                  <div class = "col-8" style="margin:auto;margin-top:10px">
              <div style ="margin-bottom:10px"class="input-group date">
                 <label>Date From:</label>
               <div style = "padding-right:5px;"class="input-group-addon">
      
                </div>
                <input type="date"   autocomplete="off" class="form-control pull-right custom_field" name="datefrom" id="iddatefrom">
                 </div>
               </div> 
               <div class = "col-8" style="margin:auto;">
                     <div style ="margin-bottom:10px;"class="input-group date">
                  <label style="margin-right:5px">Date To:</label>
                  <div class="input-group-addon" >
                  
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
                          $employeefn = $employee['fullName']; ?>
                       
                   <option  value = "<?php echo $employee['empno']?> "> <?php echo $employeefn?></option>
                   <?php  } ?>
                                           
                               </select>
                           </div>    
                       
                    </div>
      <div class = "col-12">

     <input style = "margin:auto; width:100%;"type="submit" class="btn btn-primary" id= "import_individual" name="import" value="GENERATE EMPLOYEE"> 

</div>
     <div class = "col-12">
      <div class ="form-group">
        <label> Select Department: </label>
        <!--  $list_desc = $get_result['departmentDescription'];
          $list_deptid= $get_result['depId']; -->
        <select class = "form-control select2" name = "selectdep" id ="selectdep">
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
    <select class = "form-control select2" name = "emp_status" id ="emp_status">
       <option value = "Regular">Regular</option>
       <option value = "Job Order">Job Order</option>
        </select>

       <input style = "margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;"type="submit" class="btn btn-primary" name="import_dep" id = "import_dep" value="GENERATE DEPARTMENT"> 
       </div>
      <div class = "row">
  
  


                <div class = "col-12">
                  <?php echo $alert_msg;?>
                </div>
      </div>  
             
              </form>
           </div>
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

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<<?php include('dtrdesign/footer.php'); ?>



    <script language="javascript">
    

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
