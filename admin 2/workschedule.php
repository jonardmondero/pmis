<?php

include ('dtrdesign/header.php');
include('../config/config.php');
$alert_msg='';
$workid='';

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
            <button class = "btn btn-primary" id = "addemp" data-toggle="modal" data-target="#worksched">Add Work Schedule </button>
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
          <div style="margin:auto;"class ="col-12">
          <div class="card card-primary">
               <div class="card-header">
                <h3 class="card-title">Employees Table</h3>
              </div>
              <div class = "card-body">
              <form role="form" method="post" name="form" action="<?php htmlspecialchars("PHP_SELF");?>">
               <table class = "table table-hover" id = "tableemp">
               	<thead>
               		<th>Work Schedule Code</th>
               		<th>Work Schedule Description</th>
               		<th>Remarks</th>
                    <th>Status</th>
               	

               	</thead>
               	<tbody>
               	<?php 
                $sql = "Select * from workschedule";
                $prep_work= $con->prepare($sql);
                $prep_work->execute();
                while($result = $prep_work->fetch(PDO::FETCH_ASSOC)){?>
               		<tr>
               			<td><?php echo $result['workScheduleId']?> </td>
               			<td><?php echo $result['workScheduleDescription']?> </td>
               			<td><?php echo $result['remarks']?> </td>
               			<td><?php echo $result['status']?> </td>
               		
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
    </section>
    <?php include('workschedule_modal.php')?>
  
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
<script src="../plugins/jquery/jquery.json-2.4.min.js"></script>
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
  $('#tableemp').DataTable({
      'paging'    : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'autoHeight'  : true
  });
});
function is_valid(element){
      // callback function
      // returns every value
      return element.value;
    }



	$('#insert').click(function(event){
event.preventDefault();
  var workId = $('#workcode').val();
var status = $('#workstatus').val();
var workid = $('#worksched-form').serializeArray();
  console.log(workid);


     var dataObj = {};
      $(workid).each(function(i, field){
        dataObj[field.name] = field.value;
      });

  workid.push({name : 'status', value : status });
      
      $.ajax({

          url : 'insert_workschedule.php',
          method: 'POST',
          data: $.param(workid),
          dataType: 'json'
        })

 $('#tablesched tr').each(function(row, tr){

    // var currow=  $('#tablesched').closest('tr');
     var col1 = $(tr).find('td:eq(0)').text();
     var col2 =$(tr).find('td:eq(1)').text();
     var col3 =$(tr).find('td:eq(2)').text();
     var col4 =$(tr).find('td:eq(3)').text();
     var col5 = $(tr).find('td:eq(4)').text();
     console.log(col1,col2,col3,col4,col5);
    // TableData = $.toJSON(storeTblValues());
         $.ajax({

          url : 'insert_workscheduledetail.php',
          method: 'POST',
          data: {workId:workId,
            Day:col1,
            CheckIn:col2,
            BreakOut:col3,
            BreakIn:col4,
            CheckOut:col5
          },
          dataType: 'json',
          success:function(){
           
          },
          error: function (xhr, b, c) {
          console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
     }
        })
       })

       window.location.reload();
 
    });

  $('#workcode').keyup(function(){
  // console.log("hello");s
  var workcode = $('#workcode').val();
    $.ajax({
      url:'get_workcode.php',
      type:"POST",
      data:{workcode:workcode},
      success:function(msg){
          console.log(msg);
        if(msg){
         $('#checkworkcode').html(msg);
          $('#insert').prop('disabled', true);

        }
         else if( $('#workcode').val()==''){
       $('#checkworkcode').html('');
       $('#insert').prop('disabled', true);
    }else{
            $('#checkworkcode').html('This work code is available');
           $('#insert').prop('disabled', false);
        }
      },
      error: function (xhr, b, c) {
   console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
     }


    })
   
 })
    //  TableData.shift();  // first row will be empty - so remove
    // return TableData;
    //  console.log(TableData); 

</script>
</body>
</html>