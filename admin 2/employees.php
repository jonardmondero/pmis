<?php

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
          <div class ="col-12" >
          <div class="card card-primary">
               <div class="card-header">
                <h3 class="card-title">Employees Table</h3>
              </div>
              <div class = "card-body">
              
     
              <div class = "row">
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

<!-- jQuery -->
<?php include('dtrdesign/footer.php');?>

<script>
	$(document).ready(function(){
     
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
  url:"ajaxcall/check_empnumber.php",
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
  url:"ajaxcall/check_empnumber.php",
  data:{bioid:bio},
  success: function(response){
    var result = jQuery.parseJSON(response);
    if(result.data2!= ''){
      $('#checkbioid').html('This Biometric ID is already taken.');
      $('#save').prop('disabled', true);
// console.log(result.data1);
}
else{
//   if(bio !=''){
//     $('#checkbioid').html('This Biometric ID is available.');
//     $('#save').prop('disabled', false);
// }
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
$('#delete').prop('hidden',true);
$('#update').prop('hidden',true);
$("#empnum").prop('readonly', false);

$('#department').select2({
        dropdownParent: $('#addemployee')
      });

})  

$('#table_employee tbody').on( 'click', '.add_worksched', function(){
        event.preventDefault();
     
  var currow=  $(this).closest('tr');
  var col1 = currow.find('td:eq(0)').text();
  var col2 = currow.find('td:eq(5)').text();
  console.log(col2);
 
// var id = $(this).data('id');
$('#addemployeesched').modal('show');
$(`#sel_worksched option[value='${col2}']`).prop('selected', 'true');
$('#empno').val(col1);


$('#sel_worksched').select2({
        dropdownParent: $('#addemployeesched')
      });
      sel_worksched();
})  
   


function sel_worksched(){
    var worksched = $('#sel_worksched').val();
  $('#work_body').load('ajaxcall/get_workschedule.php',{workcode:worksched},
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





$("#table_employee tbody").on("click", ".edit_employee", function () {
  //SHOWS THE ADD EMPLOYEE MODAL AND DISPLAY THE EMPLOYEE'S INFORMATION
    event.preventDefault();
    $("#addemployee").modal('show');
    $('#insert').hide();
    $('#update').prop('hidden',false);
    $('#delete').prop('hidden',false);
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
        $('#department').val(result.department);
        $(`#department option[value='${result.department}']`).prop('selected', true);
        $('#estatus').val(result.employmentstatus);
        $('#supervisor').val(result.supervisor);
        $('#status').val(result.status);
        $('#worksched').val(result.worksched);

        $('#department').select2({
        dropdownParent: $('#addemployee')
      });
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