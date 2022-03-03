<?php
//include('update_user.php');
// include ("../php_scripts/showdtr.php");
// include('./plugins/TCPDF/User/printdtr.php');
include ('../config/config.php');
$hiddenempno =$dteFrom=$dteTo='';
$timeIn ='';
$timeoutAm ='';
$timeinPm ='';
$timeoutPm='';
$otIn='';
$otOut='';
// $dteFrom ='';
// $dteTo='';
        include ('dtrdesign/header.php');
                  // if(isset()){
                  //     // function post(){
                  //     $hiddenempno = $_POST['hiddenempno'];
                  //     $dteFrom = $_POST['datefrom'];
                  //     $dteTo = $_POST['dateto'];
                  //   }
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
 <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');


   ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <!-- Brand Logo -->


    <!-- Sidebar -->
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row ">
          <div class="col-12" >
          <div class ="justify-content-center">
            <h1 class="m-0 text-dark ">Employee Ledger</h1><br>
              </div>
          </div><!-- /.col -->
            
          <!-- <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
            </ol>
          </div> -->
          <!-- /.col -->
        </div><!-- /.row -->
            <div class="row">
            <div class="col-4 no-gutters" style = "resize:both;overflow:auto;">
            <?php include('elements/employee_table.php');?>
                </div>
                <div class="col-8" style = "resize:both;overflow:auto;margin-top:10px;" >
                    <div class = "card card-primary">
                    <div class="card-header">
                <h3 class="card-title">Date Filter</h3>
               
              </div>
              <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class ="d-flex justify-content-center">
              <div class = "card text-center " style = "height:50px;; width:50%;margin-top:10px;">
                <h4 class = "justify-content-evenly" id ="full-name"> </h4>
                  </div>
                    </div>



                    <div class = "row" style="margin:auto; margin-bottom:10px;">
                     
                     <div class="input-group date">
                             <label style="padding-right:10px;padding-left: 10px">From:  </label> 
                               <div  style = "padding-right:10px" class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                               </div>
                      
        <input  style="margin-right:10px;"type="text" data-provide="datepicker"class="form-control col-3 " style="font-size:13px" autocomplete="off" name="datefrom" id="dtefrom" value = "<?php echo $dteFrom;?>" >
                                    
                         
                         <label style="padding-right:10px">To:</label>
                              <div style = "padding-right:10px" class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                              </div>
         <input type="text" class="form-control col-3 " data-provide="datepicker"  autocomplete="off" name="dateto" id="dteto" value = "<?php echo $dteTo;?>" >
                         
              
                       </div>
                   
                
                   </div>
                    </div>

          <div class="card card-success">
               <div class="card-header">
                <h3 class="card-title">Official Business Records</h3>
            
              </div>
                <div class = "card-body">
                          <div class = "row" style="margin:auto;">
                              
                                 <div class = "col-6" style = "margin:auto;">
                             
                              <input type = "hidden" readonly id = "hiddenempno" name = "hiddenempno" value = "<?php echo $hidden;?>">                               
                           
                          </div>
                          </div>
                     
                       <div class="row" style = "margin:auto;">
                       
                      
                            <table id="" class ="table-bordered table table-hover ">
                                <thead style ="font-size:15px;position:sticky;">
                                   
                                        <th>Entry No </th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                       
                                       
                                </thead>
                             <tbody id ="travel">
                             </tbody>
                                </table>  
                        
                           
                           </div>
                           </div>
                           </div>
                           <div class="card card-success">
               <div class="card-header">
                <h3 class="card-title">Application for Leave</h3>
            
              </div>
                <div class = "card-body">
                           <div class ="row">
                 <div class = "col-12" style = "margin:auto;text-align:center;">
                 <label class = "m-0 text-dark" >Application for Leave</label>
                 </div>
                 </div>
                       <div class="row" style = "margin:auto;">
                       
                      
                            <table id="" class ="table-bordered table table-hover ">
                                <thead style ="font-size:15px;position:sticky;">
                                   
                                        <th>Entry No </th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Type of Leave</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                       
                                       
                                </thead>
                             <tbody id ="travel">
                             </tbody>
                                </table>  
                          
                           
                           </div>
                  </div>
                  </div>
             
           </form>
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
<script>
</script>
<script src="../plugins/moments/moments.js"> </script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>

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

  
  $(document).ready(function(){
     var deptId = $('#deptId').val();
     var empstatus = $('#emp_status').val();
 getEmployees(deptId,empstatus);
     

     
  function getEmployees(dept,status){
var dataTable = $('#employees').DataTable({

paging: true,
destroy: true,
stateSave: true,
processing: true,
serverSide: true,
scrollX: false,
ajax: {
  dataType:"JSON",
  url: "get_employee_department.php",
  type: "POST",
  data:function (d){
    d.department = dept,
    d.empstatus = status
  },
  error: function(xhr, b, c) {
    console.log(
      "xhr=" +
      xhr.responseText +
      " b=" +
      b.responseText +
      " c=" +
      c.responseText
    );
  }
}
});


     }
 $('#deptId').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  // $('#body').load("get_employee_department.php",{
  //   dept:deptId,
  //   empstatus:empstatus
  // })
  getEmployees(deptId,empstatus)
 });

 $('#emp_status').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  getEmployees(deptId,empstatus);

 });
 });
    function loadTravel(empnum,datefr,dateto){
          $("#travel").load("ajaxcall/load_ledger.php",{
           employeeno: empnum,
           dtfr: datefr,
           dtto: dateto
           
  
      }, function(response, status, xhr) {
    if (status == "error") {
        alert(msg + xhr.status + " " + xhr.statusText);
        console.log(msg + xhr.status + " " + xhr.statusText);
    }
});

      }
      function loadleave(empnum,datefr,dateto){
          $("#travel").load("ajaxcall/load_ledger.php",{
           employeeno: empnum,
           dtfr: datefr,
           dtto: dateto
           
  
      }, function(response, status, xhr) {
    if (status == "error") {
        alert(msg + xhr.status + " " + xhr.statusText);
        console.log(msg + xhr.status + " " + xhr.statusText);
    }
});

      }
var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];

    tbody.onclick = function (e) {
    e = e || window.event;
    var empno = [];
   var fullname = [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) { 
        var cells = target.getElementsByTagName("td");
        var datefr = $('#dtefrom').val();
        var dateto = $('#dteto').val();
        var finaldatefr = formatDate(datefr);
        var finaldateto = formatDate(dateto);
            empno.push(cells[0].innerHTML);
       fullname.push(cells[1].innerHTML); 
        var empnum = empno.toString();
        var fullname2= fullname.toString();
        $('#hiddenempno').val(empnum);
        $('#full-name').html(fullname2);
        // $('#empinfo').html(fullname2);
        loadTravel(empnum,finaldatefr,finaldateto);
    }
   
   
  }
  //FORMAT THE DATE
  function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
function post_notify(message, type){

if (type == 'success') {

  $.notify({
    message: message
  },{
    type: 'success',
    delay: 2000
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
