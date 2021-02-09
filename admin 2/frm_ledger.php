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
            <h1 class="m-0 text-dark ">Daily Time Record</h1><br>
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
          
                <div class="col-8" style = "resize:both;overflow:auto;" >
          <div class="card card-warning">
               <div class="card-header">
                <h3 class="card-title">Time</h3>
              </div>
                
                      <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>">
                          <div class = "row" style="margin:auto;">
                              
                                 <div class = "col-6" style = "margin:auto;">
                              <h4 id ="full-name"> </h4>
                              <input type = "hidden" readonly id = "hiddenempno" name = "hiddenempno" value = "<?php echo $hidden;?>">                               
                           
                          </div>
                          </div>
                      <div class = "row" style="margin:auto; margin-bottom:50px;">
                     

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
                       
                       
                       <button type="button"  class="btn btn-primary" style = "margin-left:50px;"data-toggle = "modal" data-target = "#printreport"   value="Print">PRINT</button>
                        
                     </div>
                   
                  
                   
                       
                      
               
                 </div>
                       <div class="row">
                       
                        <div  style="overflow-y:auto;height:auto;display: inline-block;margin:auto;">
                            <table id="dtr"  cellpadding="5" cellmargin ="5" class ="table-bordered table-responsive table-hover "style ="position: relative;">
                                <thead style ="font-size:15px;position:sticky;">
                                   
                                        <th>Entry No </th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                       
                                       
                                </thead>
                             <tbody style = "font-size:15px;padding:15px;"id ="dtrbody">
                             </tbody>
                                </table>  
                                <!-- <button id="saveall">SAVE ALL</button> -->
                          
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

  
  $(document).ready(function(){
     var deptId = $('#deptId').val();
     var empstatus = $('#emp_status').val();
  $('#body').load("get_employee_department.php",{
    dept:deptId,
    empstatus:empstatus

  })
     
 $('#deptId').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  $('#body').load("get_employee_department.php",{
    dept:deptId,
    empstatus:empstatus
  })

 });
 });
    function loadDtr(empnum,datefr,dateto){
          $("#dtrbody").load("ajaxcall/frm_dtr.php",{
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
        
            empno.push(cells[0].innerHTML);
       fullname.push(cells[1].innerHTML); 
        var empnum = empno.toString();
        var fullname2= fullname.toString();
        $('#hiddenempno').val(empnum);
        $('#full-name').html(fullname2);
        // $('#empinfo').html(fullname2);
    loadDtr(empnum,datefr,dateto);
    }
   
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
$('#dtr tbody').on('keyup','.tr',function(){
  //UPDATE THE DTR WHEN THE USER CHANGES THE DATA.
  event.preventDefault();
   
       var id = $(this).data('id');
        var empno = $('#hiddenempno').val();
 
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();
     var col3 = currow.find('td:eq(2)').text();
     var col4 = currow.find('td:eq(3)').text();
     var col5 = currow.find('td:eq(4)').text();
     var col6 = currow.find('td:eq(5)').text();
     var col7 = currow.find('td:eq(6)').text();
     var col8 = currow.find('td:eq(7)').text();
     var col9 = currow.find('td:eq(8)').text();
     var col10 = currow.find('td:eq(9)').text();
     var datefr = $('#dtefrom').val();
     var dateto = $('#dteto').val();
      // console.log(col1,col2,col3);
     $.ajax({
      url:'ajaxcall/update_dtr.php',
      type:'POST',
      data:{idpost:id,
            empno:empno,
            date:col1,
            checkin:col3,
            breakout:col4,
            breakin:col5,
            checkout:col6,
            overtimein:col7,
            overtimeout:col8,
            late:col9,
            undertime:col10
      },
      dataType:'json',
      // success:post_notify('Successfully saved', 'success'),
      error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

     })

})
 
    $(document).ready(function(){
    $('#dtr tbody').on( 'click', '.addlogs', function(){
    event.preventDefault();
    $('#edit-dtr').modal('show');
     var id = $(this).data('id');
     var empnum = $('#hiddenempno').val();
     //date column on dtr
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();


     $('#empdate').html(col1);
     $("#findlogs").load("ajaxcall/loadlogs.php",{
      empno:empnum,
      date:col1},
      function(response, status, xhr) {
  if (status == "error") {
      alert(msg + xhr.status + " " + xhr.statusText);
      console.log(msg + xhr.status + " " + xhr.statusText);
  }




   })
   });
 
     
     });
        
    </script>
   
</body>
</html>
