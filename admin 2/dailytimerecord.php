<?php

include ('../config/config.php');
$hiddenempno =$dteFrom=$dteTo='';
$timeIn ='';
$timeoutAm ='';
$timeinPm ='';
$timeoutPm='';
$otIn='';
$otOut='';

        include ('dtrdesign/header.php');
          
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php 
 include('dtrdesign/sidebar.php');


   ?>

  <div class="content-wrapper">
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
            <div class="col-4 no-gutters" style = "resize:both;overflow:auto;">
            <?php include('elements/employee_table.php');?>
                </div>
          
    <?php include('elements/dtr_table.php');?>
  
  </div>
  </div>
  <?php include('modal/edit_dtr_modal.php');
      include ('print_modal.php');?>
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
<!-- SELECT 2 PLUGINS -->
<script src="../plugins/select2/select2.full.min.js"></script>
    <script language="javascript">
    var date = '';
  
  $(document).ready(function(){
   $("#deptId").select2();
     var deptId = $('#deptId').val();
     var empstatus = $('#emp_status').val();
  // $('#body').load("get_employee_department.php",{
  //   dept:deptId,
  //   empstatus:empstatus
    getEmployees(deptId,empstatus);
  });

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
  getEmployees(deptId,empstatus);

 });

 $('#emp_status').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  getEmployees(deptId,empstatus);

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

} else {

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
 
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();
     date = col1;
    
})

function updateInAm(value){

  const field = 'inAM';
  const empno = $('#hiddenempno').val();
  
  updateDTR(empno,date,field,value);

};

function updateInAm(value){

const field = 'inAM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOutAm(value){

const field = 'outAM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateInPm(value){

const field = 'inPM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOutPm(value){

const field = 'outPM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOtIn(value){

const field = 'otIn';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOtOut(value){

const field = 'otOut';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};


function updateLate(value){

const field = 'late';
const empno = $('#hiddenempno').val();

updateLateUT(empno,date,field,value);

};


function updateUndertime(value){

const field = 'undertime';
const empno = $('#hiddenempno').val();

updateLateUT(empno,date,field,value);

};



function updateDTR(empno,date,field,value){

  $.ajax({
      url:'ajaxcall/update_dtr.php',
      type:'POST',
      data:{
            empno:empno,
            dateofupdate:date,
            field:field,
            value:value
         
      },
      dataType:'json',
      // success:post_notify('Successfully saved', 'success'),
      error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

     })

}

function updateLateUT(empno,date,field,value){

$.ajax({
    url:'ajaxcall/updateLateUT.php',
    type:'POST',
    data:{
          empno:empno,
          dateofupdate:date,
          field:field,
          value:value
       
    },
    dataType:'json',
    // success:post_notify('Successfully saved', 'success'),
    error: function (xhr, b, c) {
   console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
     }

   })

}

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
