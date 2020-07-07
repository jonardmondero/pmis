<?php

include ('dtrdesign/header.php');
include('../config/config.php');
$alert_msg='';
include('save_employee.php');
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
          <div class ="col-2">
            <button class = "btn btn-primary" id = "addemp" data-toggle="modal" data-target="#addemployee">Add Employee </button>
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
        <div class = "row">
          <div style="height: 500px;"class ="col-12" >
          <div class="card card-primary">
               <div class="card-header">
                <h3 class="card-title">Employees Table</h3>
              </div>
              <div class = "card-body">
                <div class ="row">
              <form role="form" method="post" name="form" action="<?php htmlspecialchars("PHP_SELF");?>">
             <?php include('elements/tbl_employee.php')?>
               
              </form>
            </div>
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
<script src="../plugins/jquery/jquery.js"></script>
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
<script src="../plugins/select2/select2.js"></script>
  
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../plugins/tagsinput/tagsinput.js"></script>
<script src="javascript/searchemployee.js"></script>
<script src="javascript/editemployees.js"></script>

<script>
	$(document).ready(function(){
      $('.select2').select2();
	// $('#tableemp').DataTable({
	// 	'  paging'    : true,
  //     'searching'   : true,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : true,
    
	// });
  sel_worksched();
	 function is_valid(element){
      // callback function
      // returns every value
      return element.value;
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
function reset_form_input(form_id){
      $( '#'+form_id ).each(function(){
          this.reset();
      });
    }
    

	
	$('#empnum').keyup(function(){
  var emp = $('#empnum').val();
 
$.ajax({
  type:"POST",
  url:"check_empnumber.php",
  data:{empnum:emp},
  success: function(response){
    var result = jQuery.parseJSON(response);
    if(result.data1!= ''){
      $('#checkempid').html('This employee number is already taken.');
      $('#save').prop('disabled', true);
// console.log(result.data1);
}
else{
  if(emp !=''){
    $('#checkempid').html('This employee number is available.');
    $('#save').prop('disabled', false);
}
}
  },
  error: function (xhr, b, c) {
   console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
     }
})
if(emp == ''){
  $('#checkempid').html('');
  $('#save').prop('disabled', false);
}


})

$('#bioid').keyup(function(){
  var bio = $('#bioid').val();
 
$.ajax({
  type:"POST",
  url:"check_empnumber.php",
  data:{bioid:bio},
  success: function(response){
    var result = jQuery.parseJSON(response);
    if(result.data2!= ''){
      $('#checkbioid').html('This Biometric ID is already taken.');
      $('#save').prop('disabled', true);
// console.log(result.data1);
}
else{
  if(bio !=''){
    $('#checkbioid').html('This Biometric ID is available.');
    $('#save').prop('disabled', false);
}
}
  },
  error: function (xhr, b, c) {
   console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
     }
})
if(bio == ''){
  $('#checkbioid').html('');
  $('#save').prop('disabled', false);
}


})
$('#addemp').click(function(){
reset_form_input('employee-form');
$("#empnum").prop('disabled', false);
$('#insert').prop('hidden',false);
$('#update').prop('hidden',true);
$("#empnum").prop('readonly', false);
})  

$('#tableemp tbody').on( 'click', '.add_worksched', function(){
  event.preventDefault();
  var currow=  $(this).closest('tr');
  var col1 = currow.find('td:eq(0)').text();
  var col2 = currow.find('td:eq(5)').text();
  console.log(col2);
 
// var id = $(this).data('id');
$('#addemployeesched').modal('show');
$(`#sel_worksched option[value='${col2}']`).prop('selected', true);
$('#empno').val(col1);

        });
  function sel_worksched(){
    var worksched = $('#sel_worksched').val();
  $('#work_body').load('get_workschedule.php',{workcode:worksched},
   function(response, status, xhr) {
  if (status == "error") {
      alert(msg + xhr.status + " " + xhr.statusText);
      console.log(msg + xhr.status + " " + xhr.statusText);
  }
});
  }  
$('#sel_worksched').change(function(){
 sel_worksched();
})
$("#tableemp tbody").on("click", ".edit_employee", function () {
    event.preventDefault();
    $("#addemployee").modal('show');
    $('#insert').hide();
    $('#update').prop('hidden',false);
    $("#empnum").prop('readonly', true);
    var currow=  $(this).closest('tr');
    var col1 = currow.find('td:eq(0)').text();
    console.log('hello');
    $.ajax({

        url:'ajaxcall/get_employee.php',
        type:'POST',
        data:{id:col1},
        success:function(response){
        var result = jQuery.parseJSON(response);
        $('#empnum').val(result.employeeno);
        $('#lname').val(result.lastname);
        $('#fname').val(result.firstname);
        $('#mname').val(result.middlename);
        $('#bioid').val(result.bioid);
        // $('#department').val(result.department);
        $(`#department option[value='${result.department}']`).prop('selected', true);
        $('#estatus').val(result.employmentstatus);
        $('#supervisor').val(result.supervisor);
        $('#status').val(result.status);
        },
        error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

    })
});


  });
</script>
</body>
</html>