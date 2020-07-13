<?php

include ('../config/config.php');


        include ('dtrdesign/header.php');
             
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
        <div class="container-fluid">
            
            <div class="row ">
          <div class="col-12" >
          <div class ="justify-content-center" style=>
            <h1 class="m-0 text-dark ">Add Travel Order </h1><br>
              </div>
          </div>
        </div>
            <div class="row">
            <div class="col-5 no-gutters" style = "resize:both;overflow:auto;">
            <div class="card card-info" >
            <div class="card-header">
                <h3 class="card-title">Search Employee</h3>
              </div>
            
          <?php include("elements/search_employee.php");?>
 
          
 </div>
    <!-- /.content -->
  </div>
  <div class="col-7 no-gutters" style = "resize:both;overflow:auto;">
            <div class="card card-warning" >
            <div class="card-header">
                <h3 class="card-title">Details</h3>
              </div>
         <!-- DISPLAY'S THE SECOND SECTION OF THE FORM -->
              <?php include("elements/travelorder_details.php");?>
 
          
 </div>
    <!-- /.content -->
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

  
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery/jquery.js"></script>
<script src="../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../plugins/moments/moments.js"> </script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!-- <script src="../plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="../plugins/knob/jquery.knob.js"></script> -->
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
 
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- REFLECT LOGS SCRIPT -->
<script src="javascript/addlogs.js"></script>
<!-- PRINT REPORTS  SCRIPT -->
<script src="javascript/printreport.js"></script>

    <script language="javascript">

$("#search").keyup(function(){
var keyword = $('#search').val();

$('#tbody').load("ajaxcall/load_employee.php",{keyword:keyword},
function(response, status, xhr) {
  if (status == "error") {
      alert(msg + xhr.status + " " + xhr.statusText);
      console.log(msg + xhr.status + " " + xhr.statusText);
  }
  });


})

$("#tableemp tbody").on('click','#select',function(){

var currow=  $(this).closest('tr');
 var col1 = currow.find('td:eq(0)').text();
 var col2 = currow.find('td:eq(1)').text();
 var table = document.getElementById("employees");
 var row = table.insertRow(1);
 var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = col1;
  cell2.innerHTML = col2;
  cell3.innerHTML = '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
console.log(data);
})

function deleteRow(r) {
  // DELETE SELECTED ROW
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("employees").deleteRow(i);
}
    </script>
   
</body>
</html>
