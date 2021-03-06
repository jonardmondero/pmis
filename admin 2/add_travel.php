<?php

include ('../config/config.php');
$curdate = date("m/d/Y");

include ('dtrdesign/header.php');
$curdate = date("m/d/Y");      
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">


 <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');
 include('save_travel.php');

  

   ?>

    


  <div class="content-wrapper">
 
    <section class="content">
        <div class="container-fluid" >
            
            <div class="row ">
          <div class="col-12" >
          <div class ="justify-content-center" >
            <h1 class="m-0 text-dark ">Add Travel Order </h1><br>
              </div>
          </div>
        </div>
            <div class="row">
            <div class="col-4 no-gutters" style = "resize:both;overflow:auto;">
            <div class="card card-info" >
            <div class="card-header">
                <h3 class="card-title">Search Employee</h3>
              </div>
           
          <?php include("elements/search_employee.php");?>
 
          
 </div>
    <!-- /.content -->
  </div>
   <div class ="col-8">
  <form method = "POST" id = "travelform" action = <?php htmlspecialchars("PHP_SELF");?>>
  <div class="col-12 no-gutters"  >
            <div class="card card-warning" > 
            <div class="card-header">
                <h3 class="card-title">Details</h3>
              </div>
              <div class="row">
              <div class = col-12 style = "margin-top:20px;">

<div class="input-group date">
        <label style="padding-right:10px;padding-left: 10px">From:  </label> 
          <div  style = "padding-right:10px" class="input-group-addon">
                 <i class="fa fa-calendar"></i>
          </div>
 
<input  style="margin-right:10px;"type="text" data-provide="datepicker"class="form-control col-4 " style="font-size:13px" autocomplete="off" name="datefrom" id="dtefrom" val = "<?php echo $curdate; ?> " >
               
    
    <label style="padding-right:10px">To:</label>
         <div style = "padding-right:10px" class="input-group-addon">
              <i class="fa fa-calendar"></i>
         </div>
<input type="text" class="form-control col-4 " data-provide="datepicker"  autocomplete="off" name="dateto" id="dteto" val = "<?php echo $curdate; ?> " >
    
    
    </div>
     
  </div>
          </div> 
          <div class = "row col-12" style = "padding-left:10px;padding-top:20px;">
          
        <div class = "form-group col-4">
        <label style="padding-right:10px;padding-left: 10px">Duration  </label> 
        <select class = "form-control" name = "duration" id = "duration">
        <option val = "0"> Whole Day</option>
        <option val = "1">Morning</option>
        <option val = "2"> Afternoon</option>
        <option val = "3"> Break Out / Break In</option>
        </select>
        </div>
        <div class = "form-group col-4">
        <label style="padding-right:10px;padding-left: 10px">Type  </label> 
        <select class = "form-control"  name = "type" id = "type">
        <option val = "FW"> Field Work</option>
        <option val = "TOB">Travel on Official Business</option>
        <option val = "OT"> On Official Time</option>
        <option val = "TOT"> Travel on Official Time</option>
        </select>

        </div>
          </div>
          <div class = "row" style="padding-right:10px;padding-left: 10px">
          <div class = "form-group col-10">
          <label style="padding-right:10px;padding-left: 10px">Details  </label> 
          <input type = "text" name = "details" id = "details" class = "form-control">
          </div>
          </div>
         <!-- DISPLAY'S THE SECOND SECTION OF THE FORM -->
              <?php include("elements/travelorder_details.php");?>
              <div class = "row" style=" margin:auto;padding-top:30px;padding-bottom: 30px">
              <button type ="submit" name = "savetravel" id = "savetravel" class = " btn btn-primary"><i class = "fa fa-save"></i></button>
              </div>
          
 </div>
    <!-- /.content -->
  </div>
  </div>
  </form>
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
var datefrom = $('#dtefrom').val();
var dateto = $('#dteto').val();
var duration = $('#duration').val();
var type = $('#type').val();
var details = $('#details').val();
if(datefrom ==''|| dateto == '' || details == ''){
  post_notify("Please complete the information!","danger");
}else
{
 var col1 = currow.find('td:eq(0)').text();
 var col2 = currow.find('td:eq(1)').text();
 var table = document.getElementById("travellist");
 var row = table.insertRow(1);
 var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  cell1.innerHTML = col1;
  cell2.innerHTML = col2;
  cell3.innerHTML = datefrom;
  cell4.innerHTML = dateto ;
  cell5.innerHTML = duration ;
  cell6.innerHTML = type;
  cell7.innerHTML = '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
  console.log(data);
}
});

$('#savetravel').click(function(){
  //fetch all the data from the table and save it to the database
  var workid = $('#worksched-form').serializeArray();
  event.preventDefault();
$('#travellist tr').each(function(row, tr){
    var details = $('#details').val();
    var empno = $(tr).find('td:eq(0)').text();
     var fname =$(tr).find('td:eq(1)').text();
     var from =$(tr).find('td:eq(2)').text();
     var to =$(tr).find('td:eq(3)').text();
     var duration = $(tr).find('td:eq(4)').text();
     var type = $(tr).find('td:eq(5)').text();
      var newfrom = formatDate(from);
      var newto = formatDate(to);
     $.ajax({
url : 'save_travel.php',
method: 'POST',
data: {
  empno:empno,
  fname:fname,
  from:newfrom,
  to:newto,
  duration:duration,
  type:type,
  details:details
},
dataType: 'json',
error: function (xhr, b, c) {
console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
}
})

});
//reset all the data inside the table;
reset_form_input('travelform');
$("#travellist td").parent().remove();
post_notify("Record Inserted", "success");
});
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
//display notification 
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
//reset the all the data inside the form
function reset_form_input(form_id){
      $( '#'+form_id ).each(function(){
          this.reset();
      });
    }
function deleteRow(r) {
  // DELETE SELECTED ROW
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("travellist").deleteRow(i);
}
    </script>
   
</body>
</html>
