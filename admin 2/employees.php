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
              
          </div><!-- /.col --> 
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
               <table class = "table table-hover" id = "tableemp">
               	<thead>
               		<th>Employee No</th>
               		<th>Full Name</th>
               		<th>Department</th>
               		<th>Biometric ID</th>
               		<th>Employment Status</th>
               		<th>Work Schedule ID</th>
               		<th>Supervisor</th>
               		<th>Options</th>
               		


               	</thead>
               	<tbody>
               	<?php while($result = $prep_emp->fetch(PDO::FETCH_ASSOC)){?>
               		<tr>
               			<td><?php echo $result['employeeNo']?> </td>
               			<td><?php echo $result['fullname']?> </td>
               			<td><?php echo $result['departmentDescription']?> </td>
               			<td><?php echo $result['biometricId']?> </td>
               			<td><?php echo $result['employmentStatus']?> </td>
               			<td><?php echo $result['workScheduleId']?> </td>
               			<td><?php echo $result['supervisor']?> </td>
               <td><button class = "btn btn-sm btn-primary add_worksched" data-id = "<?php echo $result['employeeNo'];?>" ><i class = "fa fa-edit"></i></button></td>
               		</tr>
               	<?php } ?>
               	</tbody>
               </table>
               
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
    <?php include('add_employee_modal.php');?>
    <?php include('add_worksched_modal.php');?>


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
<script src="../adminlte2/bower_components/select2/dist/js/select2.full.min.js"></script>
  
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../plugins/tagsinput/tagsinput.js"></script>

<script>
	$(document).ready(function(){
      $('.select2').select2();
	$('#tableemp').DataTable({
		'  paging'    : true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    
	});

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
$('.add_worksched').click(function(event){

event.preventDefault();
var id = $(this).data('id');
$('#addemployeesched').modal('show');
$('#empno').val(id);

})
$('#sel_worksched').change(function(){
 var worksched = $('#sel_worksched').val();
  $('#work_body').load('get_workschedule.php',{workcode:worksched},
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